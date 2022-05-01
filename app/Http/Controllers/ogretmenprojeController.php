<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\projekonuları;
use App\Models\Admin;

class ogretmenprojeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('projeler.onerilenprojeler');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $admins=admin::orderBy('id','ASC')->get();
        $konular=projekonuları::orderBy('id','ASC')->get();
        return view('projeler.onerilenprojeler',compact('admins','konular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $konu=projekonuları::find($id);
        $konu->status="2";
        $konu->save();
        $konular=projekonuları::orderBy('id','ASC')->get();
        toastr()->success('Başarılı', 'Konu Reddedildi');
        return view('projeler.onerilenprojeler',compact('konular'));
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    public function switch(Request $request)
    {
        $konu=projekonuları::findOrFail($request->id);
        $konu->status=$request->statu=="true" ? 1 : 0;
        $konu->save();
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function reddet($id)
     {
       


     }
    public function destroy($id)
    {
        //
    }
}
