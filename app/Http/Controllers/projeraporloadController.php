<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\projekonuları;
use Auth;
use App\Models\raporlar;
class projeraporloadController extends Controller
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
    { $request->validate([
        
        'rapor'=>'required|file|mimes:pdf',
       
    ]);
  
    $rapor=new raporlar;
    $rapor->ogrno=$request->ogrno;
    $rapor->ogretmenid=$request->ogretmenid;
    $rapor->onerino=$request->onerino;
    if($request->hasFile('rapor')){
        $raporname=Str_slug($request->ogrno).'.'.$request->rapor->getClientOriginalExtension();
        $request->rapor->move(public_path('uploads'),$raporname);
        $rapor->projerapor='uploads/'.$raporname;
    }
    $rapor->yuklendistatus="1";
    $rapor->save();


    $raporiki=new raporlar;
    $raporiki->ogrno=$request->ogrno;
    $raporiki->ogretmenid=$request->ogretmenid;
    $raporiki->onerino=$request->onerino;
    if($request->hasFile('raporiki')){
        $rapornameiki=Str_slug($request->ogrno).'.'.'iki'.$request->raporiki->getClientOriginalExtension();
        $request->raporiki->move(public_path('uploads'),$rapornameiki);
        $raporiki->projerapor='uploads/'.$rapornameiki;
    }
    $raporiki->yuklendistatus="1";
    $raporiki->save();
    



    $raporuc=new raporlar;
    $raporuc->ogrno=$request->ogrno;
    $raporuc->ogretmenid=$request->ogretmenid;
    $raporuc->onerino=$request->onerino;
    if($request->hasFile('raporuc')){
        $rapornameuc=Str_slug($request->ogrno).'.'.'uc'.$request->raporuc->getClientOriginalExtension();
        $request->raporuc->move(public_path('uploads'),$rapornameuc);
        $raporuc->projerapor='uploads/'.$rapornameuc;
    }
    $raporuc->yuklendistatus="1";
    $raporuc->save();
  


    toastr()->success('Başarılı', 'Kullanıcı Bilgileri Oluşturuldu');
    
    return redirect()->route('ogrencibilgiler.create');
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
    
         return view('projelerim.raporyukle',compact('konular'));
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
