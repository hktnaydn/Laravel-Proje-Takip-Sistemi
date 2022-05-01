<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\projekonuları;
use Auth;

class projelerContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=admin::orderBy('id','ASC')->get();
        $konular=projekonuları::orderBy('id','ASC')->get();
        return view('projeler.bitenprojeler',compact('admins','konular'));
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
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $onerilenkonular=projekonuları::findOrFail($id);
        $konular=projekonuları::all();
        return view('projelerim.oner-proje-update',compact('konular','onerilenkonular'));
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
            'icerik'=>'min:200',
            'olanak'=>'min:300',
        ]);
        $konu=projekonuları::findOrFail($id);
        $konu->projename=$request->name;
        $konu->icerik=$request->icerik;
        $konu->olanak=$request->olanak;
        $konu->ogretmenid=$request->ogretmenid;
        $konu->ogrno=$request->ogrno;
        $konu->status="0";
        $konu->save();
        toastr()->success('Başarılı', 'Öneri Başarıyla Güncellendi');

        return redirect()->route('projeler.show',Auth::User()->id);
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
