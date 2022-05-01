<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use DB;
use Illuminate\Support\Facades\Mail;


class kullanicilarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins=admin::orderBy('id','ASC')->get();
        return view('usereklegoster.userlist',compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usereklegoster.user-add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admins=Admin::all();
        $ogretmenbir=DB::table('admins')->where('ogretmenid',1)->count();
        $ogretmenbir--;


        $ogretmeniki=DB::table('admins')->where('ogretmenid',2)->count();
        $ogretmeniki--;


        $ogretmenuc=DB::table('admins')->where('ogretmenid',3)->count();
        $ogretmenuc--;



        $admin=new admin;
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->role="ogrenci";
        $admin->ogretmenid=$request->ogretid;
        $admin->password= bcrypt($request->password);
       
        $to_email = $request->email;
        $name = $request->name;
        $email = $request->email;
        $password = $request->password;
        if($request->ogretid==1)
        {

            if($ogretmenbir>9)
                {
                    toastr()->error('Başarısız', 'Öğretmen kontenjanı dolu');
                    return redirect()->route('kullanicilar.index');
                }
            else 
            {
                $admin->save();
                toastr()->success('Başarılı', 'Kullanıcı Başarıyla Oluşturuldu');
                $data = array("name" => $admin->name, "body" => "Eposta", 'password' => $password);
                Mail::send("emails.mail", $data, function($message) use ($admin){
                  $message->to($admin->email);
                  $message->subject("Parola");
                  $message->from('protakip123@gmail.com','ProTakip');
                });
                return redirect()->route('kullanicilar.index');
            }
        }
    
        else if($request->ogretid==2)
        {

            if($ogretmeniki>9)
                {
                   
                    toastr()->error('Başarısız', 'Öğretmen kontenjanı dolu');
                    return redirect()->route('kullanicilar.index');
                }
                else 
                {
                    $admin->save();
                    toastr()->success('Başarılı', 'Kullanıcı Başarıyla Oluşturuldu');
                    $data = array("name" => $admin->name, "body" => "Eposta", 'password' => $password);
                    Mail::send("emails.mail", $data, function($message) use ($admin){
                      $message->to($admin->email);
                      $message->subject("Parola");
                      $message->from('protakip123@gmail.com','ProTakip');
                    });
                    return redirect()->route('kullanicilar.index');
                }
        }
        else if($request->ogretid==3)
        {

            if($ogretmenuc>9)
                {
                    
                    toastr()->error('Başarısız', 'Öğretmen kontenjanı dolu');
                    return redirect()->route('kullanicilar.index');
                }
                else 
                {
                    $admin->save();
                    toastr()->success('Başarılı', 'Kullanıcı Başarıyla Oluşturuldu');
                    $data = array("name" => $admin->name, "body" => "Eposta", 'password' => $password);
                    Mail::send("emails.mail", $data, function($message) use ($admin){
                      $message->to($admin->email);
                      $message->subject("Parola");
                      $message->from('protakip123@gmail.com','ProTakip');
                    });
                    return redirect()->route('kullanicilar.index');
                }
        }
    
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admins=Admin::all();
        return view('projelerim.bilgilerim.edit',compact('admins'));
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
