<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;

class ogrencibilgileriContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=admin::orderBy('id','ASC')->get();
        return view('projelerim.bilgilerim',compact('admins'));
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard');
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
        return view('projelerim.bilgilerigoruntule');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin=Admin::findOrFail($id);
        
        $admins=Admin::all();
        return view('projelerim.bilgilerim',compact('admins'));
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
            'ogrno'=>'min:9',
            'foto'=>'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
        $admin=Admin::findOrFail($id);
        $admin->ogrno=$request->ogrno;
        $admin->fakulte=$request->fakultead;
        $admin->bolum=$request->bolumad;
        $admin->sinif=$request->sinif;
        $admin->cepno= $request->telno;
        if($request->hasFile('foto')){
            $imagename=Str_slug($request->ogrno).'.'.$request->foto->getClientOriginalExtension();
            $request->foto->move(public_path('uploads'),$imagename);
            $admin->ppimage='uploads/'.$imagename;
        }
       
        $admin->save();
        toastr()->success('Başarılı', 'Kullanıcı Bilgileri Oluşturuldu');

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
