<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\projekonuları;
use Auth;
use App\Models\raporlar;

class tezraporloadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $konular=projekonuları::orderBy('id','ASC')->find($id);
    
        return view('projelerim.tezyukle',compact('konular'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
        
            'rapor'=>'required|file|mimes:pdf',
           
        ]);
        $tez=projekonuları::findOrFail($id);
      
        if($request->hasFile('rapor')){
            $tezname=Str_slug($request->ogrno).'.'.$request->rapor->getClientOriginalExtension();
            $request->rapor->move(public_path('uploads'),$tezname);
            $tez->tezraporu='uploads/'.$tezname;
        }
        $tez->save();
        toastr()->success('Başarılı', 'Tez Yüklendi');

        return redirect()->route('ogrencibilgiler.create');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
