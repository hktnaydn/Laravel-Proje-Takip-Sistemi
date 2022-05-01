<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\projekonuları;
use App\Models\raporlar;
use Auth;


class projeekleContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=Admin::orderBy('id','ASC')->get();
        return view('projelerim.oner-proje',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projelerim.oner-proje');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=str_word_count($request->icerik,0,'öçşığüÖÇŞİĞÜ');
        $dataolanak=str_word_count($request->olanak,0,'öçşığüÖÇŞİĞÜ');
        if($data<200)
        {
            $kalankelime=200-$data;
            toastr()->error('Başarısız', 'İçerik '.$kalankelime.' kelime eksik');
            return view('projelerim.oner-proje');
        }
        if($dataolanak<300)
        {
            $kalankelime=300-$dataolanak;
            toastr()->error('Başarısız', 'Olanak '.$kalankelime.' kelime eksik');
            return view('projelerim.oner-proje');
        }
      
        $konu=new projekonuları;
        $konu->projename=$request->name;
        $konu->icerik=$request->icerik;
        $konu->olanak=$request->olanak;
        $konu->ogretmenid=$request->ogretmenid;
        $konu->ogrno=$request->ogrno;
       
        $konu->save();
        toastr()->success('Başarılı', 'Öneri Başarıyla Oluşturuldu');

        return redirect()->route('projeler.show',Auth::User()->id);
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
        $raporlar=raporlar::orderBy('id','ASC')->get();
        $konular=projekonuları::orderBy('id','ASC')->get();
        return view('projelerim.onerdiklerim',compact('admins','konular','raporlar'));
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
        //
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
