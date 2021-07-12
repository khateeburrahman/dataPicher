@extends('layouts.app')

@section('content')
<div class="container">

  <div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header bg-primary header-main">
                    <h5>@yield('form-heading', 'Form')</h5>
                </div>
                <form class="needs-validation " method="POST" action="{{ route('import',$table->name) }}"
                      enctype="multipart/form-data" novalidate>
                    <div class="card-body">
                      @csrf
                      <div class="form-group">
                        <input type="file" class="form-control-file" name="csv_file" required>
                    </div>
                  </div>
                  <div class="card-footer">
                      <button type="submit" class="btn btn-primary">upload</button>
                      </div>
                </form>
            </div>
        </div>
    </div>
</div>
  @isset($table)
      <div>
          Table Name: {{ $table->name }} | create Date: {{date('j F, Y', strtotime( $table->created_at)) }} | updated date: {{ date('j F, Y', strtotime( $table->updated_at )) }}
      </div>
  @endisset

  @isset($collection)
  <table class="table" class="table-responsive-sm" id="table_id" class="display">
    <thead>
      <tr>
        <th scope="col">site_name</th>
        <th scope="col">city</th>
        <th scope="col">address</th>
        <th scope="col">sharing_status</th>
        <th scope="col">omo</th>
        <th scope="col">omo_id</th>
        <th scope="col">latitude</th>
        <th scope="col">longitude</th>
      </tr>
    </thead>
    <tbody>
        @foreach ($collection as $row)
        <tr>
            <th scope="row">{{ $row->site_name }}</th>
            <th scope="row">{{ $row->city }}</th>
            <th scope="row">{{ $row->address }}</th>
            <th scope="row">{{ $row->sharing_status }}</th>
            <th scope="row">{{ $row->omo }}</th>
            <th scope="row">{{ $row->omo_id }}</th>
            <th scope="row">{{ $row->latitude }}</th>
            <th scope="row">{{ $row->longitude }}</th>
          </tr>
        @endforeach

    </tbody>
  </table>
  


 
  @endisset
</div>
<script>
  $(document).ready( function () {
    $('#table_id').DataTable();
} );
</script>
@endsection
