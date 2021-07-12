<?php

namespace App\Http\Controllers;

use App\Models\Table;
use App\Imports\ImportDu;
use App\Imports\ImportJordan;
use App\Imports\ImportMalysiaUmobile;
use App\Imports\ImportMobilink;
use App\Imports\ImportOoredoo;
use App\Imports\ImportSaudiaMobily;
use App\Imports\ImportSaudiaStc;
use App\Imports\ImportSaudiaZain;
use App\Imports\ImportTelenore;
use App\Imports\ImportUaeEhtsiat;
use App\Imports\ImportUfone;
use App\Imports\ImportZong;
use Facade\Ignition\Tabs\Tab;
use Illuminate\Http\Request;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;


class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request, $tableName)
    {
        
            if($tableName == 'Du'){

            }elseif($tableName == 'jordan'){

                Excel::import(new ImportJordan, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'malysia_umobile'){

                Excel::import(new ImportMalysiaUmobile, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'mobilink'){

                Excel::import(new ImportMobilink, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'ooredoo'){

                Excel::import(new ImportOoredoo, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'saudia_mobily'){
                
                Excel::import(new ImportSaudiaMobily, $request->file('csv_file'));
                return back();
                

            }elseif($tableName == 'saudia_stc'){

                Excel::import(new ImportSaudiaStc, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'saudia_zain'){

                Excel::import(new ImportSaudiaZain, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'telenore'){

                Excel::import(new ImportTelenore, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'uae_ehtsiat'){

                Excel::import(new ImportUaeEhtsiat, $request->file('csv_file'));
                return back();
                
            }elseif($tableName == 'ufone'){

                Excel::import(new ImportUfone, $request->file('csv_file'));
                return back();
                

            }elseif($tableName == 'zong'){

                Excel::import(new ImportZong, $request->file('csv_file'));
                return back();
                
            }

            return back();
            
        }
    
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tables= Table::all();
        return view('table.create',compact('tables'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //saving name of table in the table Table
        Table::create($request->all());

        // creating a table with the given name
        Schema::connection('mysql')->create($request->name, function($table)
        {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('city')->nullable();
            $table->text('address')->nullable();
            $table->string('sharing_status')->nullable();
            $table->string('omo')->nullable();
            $table->string('omo_id')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->timestamps();
        });
        $command = 'make:model '.$request->name ;
        Artisan::call($command);
        return back()->with('success','table is created successfully !');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function show(Table $table)
    {
        $collection = DB::table($table->name)->get();
        
        return view('table.show',compact('table','collection'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Table  $table
     * @return \Illuminate\Http\Response
     */
    public function destroy(Table $table)
    {
        //
    }
}
