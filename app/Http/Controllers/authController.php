<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use DB;

use App\Models\data_monitoring;
use App\Models\data_surat;
use App\Models\data_nilai;

class authController extends Controller
{
    function loginView()
    {
        return view("login");
    }

    function doLogin(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required', // required and number field validation

        ]); // create the validations
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed try login using laravel auth attemp
            if (\Auth::attempt($request->only(["username","password"]))) {
                return redirect("dashboard")->with('success', 'Berhasil Login');
            } else {
                return back()->withErrors( "Username / Password Anda Salah"); // auth fail redirect with error
            }
        }
    }

    function doRegister(Request $request)
    {
//        dd($request->all());
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'role' => 'required',
            'username' => 'required|unique:users',
            'email' => 'required|email|unique:users',   // required and email format validation
            'password' => 'required|min:8', // required and number field validation
            'confirm_password' => 'required|same:password',
        ]); // create the validations
        
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form

        } else {
            //validations are passed, save new user in database
            $User = new User;
            $User->username = $request->username;
            $User->name = $request->name;
            $User->email = $request->email;
            $User->role = $request->role;
            $User->password = Hash::make($request->password);
            $User->password_text = $request->password;
            $User->save();
            return redirect()->route('data-user.index')
            ->with(['sucess' => 'Data User Berhasil di Registrasi']);        
        }
    }
   // show dashboard
    function dashboard()
    {
        $pendapatan = data_nilai::join('data_monitorings', 'data_nilais.no_idn', '=', 'data_monitorings.no_idn')
        ->select(DB::raw("SUM(terbayar) as total, YEAR(tgl_akhir) as tahun"))
        ->groupBy(DB::raw('YEAR(tgl_akhir) ASC'))
        ->pluck('total', 'tahun');        

        $labels_pendapatan = $pendapatan->keys();
        $data_pendapatan = $pendapatan->values();

        $deadline = data_monitoring::select(DB::raw('COUNT(tgl_akhir) as data'), 
        DB::raw('MONTH(tgl_akhir) as bulan'))
        ->where('tgl_akhir', 'LIKE', '%2022%')
        ->groupBy(DB::raw('MONTH(tgl_akhir) ASC'))
        ->pluck('data','bulan');
        $labels_deadline = $deadline->keys();
        $data_deadline = $deadline->values();

        $SA1 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Belum Ada Permintaan')->pluck('total_stts');
        $savalue1 = $SA1->values();
        $SA2 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'RAB')->pluck('total_stts');
        $savalue2 = $SA2->values();
        $SA3 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Pricing')->pluck('total_stts');
        $savalue3 = $SA3->values();
        $SA4 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Penawaran')->pluck('total_stts');
        $savalue4 = $SA4->values();
        $SA5 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Nego')->pluck('total_stts');
        $savalue5 = $SA5->values();
        $SA6 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Belum Kontrak')->pluck('total_stts');
        $savalue6 = $SA6->values();
        $SA7 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Kesepakatan Harga')->pluck('total_stts');
        $savalue7 = $SA7->values();
        $SA8 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'BA Kesepakatan')->pluck('total_stts');
        $savalue8 = $SA8->values();
        $SA9 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Kontrak')->pluck('total_stts');
        $savalue9 = $SA9->values();
        $SA10 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Laporan / BA')->pluck('total_stts');
        $savalue10 = $SA10->values();
        $SA11 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Tagihan')->pluck('total_stts');
        $savalue11 = $SA11->values();
        $SA12 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Terbayar')->pluck('total_stts');
        $savalue12 = $SA12->values();
        $SA13 = data_monitoring::select(DB::raw("COUNT(stts_admin) as total_stts"))
        ->where('stts_admin', '=', 'Cancel')->pluck('total_stts');
        $savalue13 = $SA13->values();

        $SP1 = data_monitoring::select(DB::raw("COUNT(stts_pkerjaan) as total_sttsp"))
        ->where('stts_pkerjaan', '=', 'Batal')->pluck('total_sttsp');
        $spvalue1 = $SP1->values();
        $SP2 = data_monitoring::select(DB::raw("COUNT(stts_pkerjaan) as total_sttsp"))
        ->where('stts_pkerjaan', '=', 'Belum Jalan')->pluck('total_sttsp');
        $spvalue2 = $SP2->values();
        $SP3 = data_monitoring::select(DB::raw("COUNT(stts_pkerjaan) as total_sttsp"))
        ->where('stts_pkerjaan', '=', 'Running')->pluck('total_sttsp');
        $spvalue3 = $SP3->values();
        $SP4 = data_monitoring::select(DB::raw("COUNT(stts_pkerjaan) as total_sttsp"))
        ->where('stts_pkerjaan', '=', 'Selesai')->pluck('total_sttsp');
        $spvalue4 = $SP4->values();
        return view('/layout-adm/index',compact(
            'data_pendapatan','labels_pendapatan',
            'savalue1','savalue2','savalue3','savalue4','savalue5','savalue6','savalue7',
            'savalue8','savalue9','savalue10','savalue11','savalue12','savalue13',
            'spvalue1','spvalue2','spvalue3','spvalue4', 'labels_deadline', 'data_deadline'
        ));
    }

    // logout method to clear the sesson of logged in user
    function logout()
    {
        \Auth::logout();
        return redirect("login")->with('success', 'Berhasil Logout');;
    }
}