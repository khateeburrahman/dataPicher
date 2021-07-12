@extends('layouts.app')

@section('content')
<div class="container">
    <form action="{{ route('store.table') }}">
    @csrf
    <div class="form-row align-items-center">
        <div class="col-auto">
          <label class="sr-only" for="inlineFormInput">Name</label>
          <input type="text" name="name" class="form-control mb-2" id="inlineFormInput" placeholder="table name">
        </div>
      
        
        <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-2">create table</button>
        </div>
      </div>
    </form>
    @isset($tables)
    <ol>
        @foreach ($tables as $table)
    
           <a href="{{ route('show.table',$table->id) }}"><li>{{ $table->name }}</li></a>  
        @endforeach
    </ol>
    @endisset
</div>
@endsection
