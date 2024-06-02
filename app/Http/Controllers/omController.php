<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\File;

use App\Http\Controllers\Controller;

use App\Models\data_monitoring;
use App\Models\data_surat;
use App\Models\data_nilai;
use App\Models\data_customer;
use App\Models\data_pic;

class omController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displaydata = data_monitoring::all();
        return view('/data-om/list-data', compact('displaydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'no_idm' => 'required',
            'no_idn' => 'required',
            'no_idc' => 'required',
            'no_ids' => 'required',
            'no_idpre' => 'required',
            'no_idpni' => 'required',
            'no_idppm' => 'required',
            'nm_pekerjaan' => 'required|unique:data_monitorings',
            'rkap' => 'required',
            'stts_pkerjaan' => 'required',
            'prktype' => 'required',
            'no_PRKorWO' => 'required|unique:data_monitorings',
            'stts_admin' => 'required',

            'dok_penugasan' => 'nullable|mimes:doc,docx,pdf|max:2048',
            'dok_kspktn' => 'nullable|mimes:doc,docx,pdf|max:5120',
            'dok_pp' => 'nullable|mimes:doc,docx,pdf|max:5120',   
            'dok_stp' => 'nullable|mimes:doc,docx,pdf|max:5120',
            'dok_rab' => 'nullable|mimes:doc,docx,xlx,xls,xlsx,pdf|max:10000',
            'dok_pnwrn' => 'nullable|mimes:doc,docx,pdf|max:10000',
            'dok_kontrak' => 'nullable|mimes:doc,docx,pdf|max:10000'

        ]);

         if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        else {

            $Mon = new data_monitoring();
            $Sur = new data_surat();
            $Nil = new data_nilai();

            if ($request->hasFile('dok_penugasan')) {
            $dok_penugasan = date('Ymd-Hi').'_'.$request->file('dok_penugasan')->getClientOriginalName();
            $dok_penugasan = str_replace(' ', '_', $dok_penugasan);
            $request->file('dok_penugasan')->storeAs('public/files', $dok_penugasan);

            $Sur->dok_penugasan = $dok_penugasan;
            }

            else {
                $Sur->dok_penugasan = '-';
            }

            if ($request->hasFile('dok_kspktn')) {
            $dok_kspktn = date('Ymd-Hi').'_'.$request->file('dok_kspktn')->getClientOriginalName();
            $dok_kspktn = str_replace(' ', '_', $dok_kspktn);
            $request->file('dok_kspktn')->storeAs('public/files', $dok_kspktn);

            $Sur->dok_kspktn = $dok_kspktn;
            }

            else {
            $Sur->dok_kspktn = '-';
            }

            if ($request->hasFile('dok_pp')) {
            $dok_pp = date('Ymd-Hi').'_'.$request->file('dok_pp')->getClientOriginalName();
            $dok_pp = str_replace(' ', '_', $dok_pp);
            $request->file('dok_pp')->storeAs('public/files', $dok_pp);

            $Sur->dok_pp = $dok_pp;
            }
            
            else{
                $Sur->dok_pp = '-';
            }

            if ($request->hasFile('dok_stp')) {
            $dok_stp = date('Ymd-Hi').'_'.$request->file('dok_stp')->getClientOriginalName();
            $dok_stp = str_replace(' ', '_', $dok_stp);
            $request->file('dok_stp')->storeAs('public/files', $dok_stp);
            
            $Sur->dok_stp = $dok_stp;
            }
            
            else {
                $Sur->dok_stp = '-';
            }
            
            if ($request->hasFile('dok_rab')) {
            $dok_rab = date('Ymd-Hi').'_'.$request->file('dok_rab')->getClientOriginalName();
            $dok_rab = str_replace(' ', '_', $dok_rab);
            $request->file('dok_rab')->storeAs('public/files', $dok_rab);
            
            $Nil->dok_rab = $dok_rab;
            }
            
            else {
                $Nil->dok_rab = '-';
            }

            if ($request->hasFile('dok_pnwrn')) {
            $dok_pnwrn = date('Ymd-Hi').'_'.$request->file('dok_pnwrn')->getClientOriginalName();
            $dok_pnwrn = str_replace(' ', '_', $dok_pnwrn);
            $request->file('dok_pnwrn')->storeAs('public/files', $dok_pnwrn);
            
            $Nil->dok_pnwrn = $dok_pnwrn;
            }

            else {
            $Nil->dok_pnwrn = '-';
            }

            if ($request->hasFile('dok_kontrak')) {
            $dok_kontrak = date('Ymd-Hi').'_'.$request->file('dok_kontrak')->getClientOriginalName();
            $dok_kontrak = str_replace(' ', '_', $dok_kontrak);
            $request->file('dok_kontrak')->storeAs('public/files', $dok_kontrak);

            $Nil->dok_kontrak = $dok_kontrak;
            }
            else {
            $Nil->dok_kontrak = '-';
            }
/*
            $Mon = data_monitoring::create($request->all());
            $Sur = data_surat::create($request->all());
            $Nil = data_nilai::create($request->all());
*/
            $Mon->no_idm = $request->no_idm;
            $Mon->no_idn = $request->no_idn;
            $Mon->no_idc = $request->no_idc;
            $Mon->no_idpre = $request->no_idpre;
            $Mon->no_idpni = $request->no_idpni;
            $Mon->no_idppm = $request->no_idppm;
            $Mon->no_ids = $request->no_ids;
            $Mon->prktype = $request->prktype;
            $Mon->no_PRKorWO = $request->no_PRKorWO;
            $Mon->nm_pekerjaan = $request->nm_pekerjaan;
            $Mon->rkap = $request->rkap;
            $Mon->stts_pkerjaan = $request->stts_pkerjaan;
            $Mon->tgl_mulai = $request->tgl_mulai;
            $Mon->tgl_akhir = $request->tgl_akhir;
            $Mon->stts_admin = $request->stts_admin;
            $Mon->ket_progress = $request->ket_progress;
            $Mon->originator = auth()->user()->name;
            $Mon->save();

            $Sur->no_ids = $request->no_ids;
            $Sur->no_penugasan = $request->no_penugasan;
            $Sur->tgl_penugasan = $request->tgl_penugasan;
            
            $Sur->noba_kspktn = $request->noba_kspktn;
            $Sur->tglk_dok = $request->tglk_dok;

            $Sur->noba_pp = $request->noba_pp;
            $Sur->tglp_dok = $request->tglp_dok;

            $Sur->noba_stp = $request->noba_stp;
            $Sur->tgls_dok = $request->tgls_dok;
            $Sur->save();
            
            if ($request->rab=="") {
                $rab =null;
            }
            else {
                $rab = preg_replace("/[^0-9]/", "", $request->rab );
            }

            if ($request->pnwrn=="") {
                $pnwrn =null;
            }
            else {
                $pnwrn = preg_replace("/[^0-9]/", "", $request->pnwrn );
            }

            if ($request->hpp=="") {
                $hpp =null;
            }
            else {
                $hpp = preg_replace("/[^0-9]/", "", $request->hpp );
            }

            if ($request->kontrak==""){
                $kontrak =null;
            }
            else {
                $kontrak = preg_replace("/[^0-9]/", "", $request->kontrak );
            }

            if ($request->tagihan=="") {
                $tagihan =null;
            }
            else {
                $tagihan = preg_replace("/[^0-9]/", "", $request->tagihan );
            }
            if ($request->terbayar=="") {
                $terbayar =null;
            }            
            else {
                $terbayar = preg_replace("/[^0-9]/", "", $request->terbayar );
            }

            $Nil->no_idn = $request->no_idn;
            $Nil->rab = $rab;
            
            $Nil->pnwrn = $pnwrn;
            $Nil->hpp = $hpp;
            $Nil->lr = $request->lr;
            $Nil->kontrak = $kontrak;

            $Nil->tagihan = $tagihan;
            $Nil->terbayar = $terbayar;
            $Nil->save();

            return redirect()->route('data-om.index')
            ->with(['sucess' => 'Data Monitoring Berhasil Di Simpan']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($no_idm)
    {
        $dc = 
        data_monitoring::join('data_nilais','data_monitorings.no_idn', '=', 'data_nilais.no_idn')
        ->join('data_surats', 'data_monitorings.no_ids', '=', 'data_surats.no_ids')
        ->join('data_customers', 'data_monitorings.no_idc', '=', 'data_customers.no_idc')
        ->where('data_monitorings.no_idm', '=', $no_idm)->get();
       
        $datapic_idpni = data_monitoring::join('data_pics','data_monitorings.no_idpni', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();
        $datapic_idpre = data_monitoring::join('data_pics','data_monitorings.no_idpre', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();
        $datapic_idppm = data_monitoring::join('data_pics','data_monitorings.no_idppm', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();

        return view('/data-om/detail-data', compact('dc','datapic_idpni','datapic_idpre','datapic_idppm'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($no_idm)
    {
        $dc = 
        data_monitoring::join('data_nilais','data_monitorings.no_idn', '=', 'data_nilais.no_idn')
        ->join('data_surats', 'data_monitorings.no_ids', '=', 'data_surats.no_ids')
        ->join('data_customers', 'data_monitorings.no_idc', '=', 'data_customers.no_idc')
        ->where('data_monitorings.no_idm', '=', $no_idm)->get();
        
        $idm = data_monitoring::select('id')->where('data_monitorings.no_idm',$no_idm)->get();

        $datapic_idpni = data_monitoring::join('data_pics','data_monitorings.no_idpni', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();
        $datapic_idpre = data_monitoring::join('data_pics','data_monitorings.no_idpre', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();
        $datapic_idppm = data_monitoring::join('data_pics','data_monitorings.no_idppm', '=', 'data_pics.no_idp')->select('data_pics.nama')->get();

        $datacust = data_customer::select('no_idc','unit')->get();
        $dp1 = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPNI%')->get();
        $dp2 = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPRE%')->get();
        $dp3 = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPPM%')->get();


        return view('/data-om/edit-data', compact('dc','datapic_idpni','datapic_idpre','datapic_idppm','datacust','dp1','dp2','dp3','no_idm','idm'));
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
        $no_idn = data_monitoring::join('data_nilais','data_monitorings.no_idn', '=', 'data_nilais.no_idn')->where('data_monitorings.id', '=', $id)->select('data_nilais.id')->get();
        $no_ids = data_monitoring::join('data_surats','data_monitorings.no_ids', '=', 'data_surats.no_ids')->where('data_monitorings.id', '=', $id)->select('data_surats.id')->get();
        $validator = Validator::make($request->all(), [

            'dok_penugasan' => 'nullable|mimes:doc,docx,pdf|max:2048',
            'dok_kspktn' => 'nullable|mimes:doc,docx,pdf|max:5120',
            'dok_pp' => 'nullable|mimes:doc,docx,pdf|max:5120',   
            'dok_stp' => 'nullable|mimes:doc,docx,pdf|max:5120',
            'dok_rab' => 'nullable|mimes:doc,docx,xlx,xls,xlsx,pdf|max:10000',
            'dok_pnwrn' => 'nullable|mimes:doc,docx,pdf|max:10000',
            'dok_kontrak' => 'nullable|mimes:doc,docx,pdf|max:10000'

        ]);

         if ($validator->fails()) {
            return back()->withInput()->withErrors($validator);
        }
        else {
/*
            $Mon = data_monitoring::find($id)->first()->fill($request->all())->save();
            $Sur = data_surat::findOrFail($no_ids)->first()->fill($request->all())->save();
            $Nil = data_nilai::findOrFail($no_idn)->first()->fill($request->all())->save();
*/
            $Mon = data_monitoring::find($id);
            $Sur = data_surat::find($no_ids);
            $Nil = data_nilai::find($no_idn);

//            $Sur = data_surat::where('id', $no_ids)->first();
//            $Nil = data_nilai::where('id', $no_idn)->first();

//            dd($Mon,$Sur,$Nil);

                if ($request->hasFile('dok_penugasan')) {
                $dok_penugasan = date('Ymd-Hi').'_'.$request->file('dok_penugasan')->getClientOriginalName();
                $dok_penugasan = str_replace(' ', '_', $dok_penugasan);
                $request->file('dok_penugasan')->storeAs('public/files', $dok_penugasan);

                $Sur[0]->dok_penugasan = $dok_penugasan;
                }

                if ($request->hasFile('dok_kspktn')) {
                $dok_kspktn = date('Ymd-Hi').'_'.$request->file('dok_kspktn')->getClientOriginalName();
                $dok_kspktn = str_replace(' ', '_', $dok_kspktn);
                $request->file('dok_kspktn')->storeAs('public/files', $dok_kspktn);

                $Sur[0]->dok_kspktn = $dok_kspktn;
                }


                if ($request->hasFile('dok_pp')) {
                $dok_pp = date('Ymd-Hi').'_'.$request->file('dok_pp')->getClientOriginalName();
                $dok_pp = str_replace(' ', '_', $dok_pp);
                $request->file('dok_pp')->storeAs('public/files', $dok_pp);

                $Sur[0]->dok_pp = $dok_pp;
                }

                if ($request->hasFile('dok_stp')) {
                $dok_stp = date('Ymd-Hi').'_'.$request->file('dok_stp')->getClientOriginalName();
                $dok_stp = str_replace(' ', '_', $dok_stp);
                $request->file('dok_stp')->storeAs('public/files', $dok_stp);
                
                $Sur[0]->dok_stp = $dok_stp;
                }
                                
                if ($request->hasFile('dok_rab')) {
                $dok_rab = date('Ymd-Hi').'_'.$request->file('dok_rab')->getClientOriginalName();
                $dok_rab = str_replace(' ', '_', $dok_rab);
                $request->file('dok_rab')->storeAs('public/files', $dok_rab);
                
                $Nil[0]->dok_rab = $dok_rab;
                }
                
                if ($request->hasFile('dok_pnwrn')) {
                $dok_pnwrn = date('Ymd-Hi').'_'.$request->file('dok_pnwrn')->getClientOriginalName();
                $dok_pnwrn = str_replace(' ', '_', $dok_pnwrn);
                $request->file('dok_pnwrn')->storeAs('public/files', $dok_pnwrn);
                
                $Nil[0]->dok_pnwrn = $dok_pnwrn;
                }

                if ($request->hasFile('dok_kontrak')) {
                $dok_kontrak = date('Ymd-Hi').'_'.$request->file('dok_kontrak')->getClientOriginalName();
                $dok_kontrak = str_replace(' ', '_', $dok_kontrak);
                $request->file('dok_kontrak')->storeAs('public/files', $dok_kontrak);

                $Nil[0]->dok_kontrak = $dok_kontrak;
                }

            $Mon->no_idm = $request->no_idm;
            $Mon->no_idn = $request->no_idn;
            $Mon->no_idc = $request->no_idc;
            $Mon->no_idpre = $request->no_idpre;
            $Mon->no_idpni = $request->no_idpni;
            $Mon->no_idppm = $request->no_idppm;
            $Mon->no_ids = $request->no_ids;
            $Mon->prktype = $request->prktype;
            $Mon->no_PRKorWO = $request->no_PRKorWO;
            $Mon->nm_pekerjaan = $request->nm_pekerjaan;
            $Mon->rkap = $request->rkap;
            $Mon->stts_pkerjaan = $request->stts_pkerjaan;
            $Mon->tgl_mulai = $request->tgl_mulai;
            $Mon->tgl_akhir = $request->tgl_akhir;
            $Mon->stts_admin = $request->stts_admin;
            $Mon->ket_progress = $request->ket_progress;

            $Sur[0]->no_ids = $request->no_ids;
            $Sur[0]->no_penugasan = $request->no_penugasan;
            $Sur[0]->tgl_penugasan = $request->tgl_penugasan;         
            $Sur[0]->noba_kspktn = $request->noba_kspktn;
            $Sur[0]->tglk_dok = $request->tglk_dok;
            $Sur[0]->noba_pp = $request->noba_pp;
            $Sur[0]->tglp_dok = $request->tglp_dok;
            $Sur[0]->noba_stp = $request->noba_stp;
            $Sur[0]->tgls_dok = $request->tgls_dok;

            if ($request->rab=="") {
                $rab =null;
            }
            else {
                $rab = preg_replace("/[^0-9]/", "", $request->rab );
            }

            if ($request->pnwrn=="") {
                $pnwrn =null;
            }
            else {
                $pnwrn = preg_replace("/[^0-9]/", "", $request->pnwrn );
            }

            if ($request->hpp=="") {
                $hpp =null;
            }
            else {
                $hpp = preg_replace("/[^0-9]/", "", $request->hpp );
            }

            if ($request->kontrak==""){
                $kontrak =null;
            }
            else {
                $kontrak = preg_replace("/[^0-9]/", "", $request->kontrak );
            }

            if ($request->tagihan=="") {
                $tagihan =null;
            }
            else {
                $tagihan = preg_replace("/[^0-9]/", "", $request->tagihan );
            }
            if ($request->terbayar=="") {
                $terbayar =null;
            }            
            else {
                $terbayar = preg_replace("/[^0-9]/", "", $request->terbayar );
            }


            $Nil[0]->no_idn = $request->no_idn;
            $Nil[0]->rab = $rab;
            $Nil[0]->pnwrn = $pnwrn;
            $Nil[0]->hpp = $hpp;
            $Nil[0]->lr = $request->lr;
            $Nil[0]->kontrak = $kontrak;
            $Nil[0]->tagihan = $tagihan;
            $Nil[0]->terbayar = $terbayar;
            
            $Sur[0]->save();
            $Nil[0]->save();
            $Mon->save();

            return redirect()->route('data-om.index')
            ->with(['sucess' => 'Data Monitoring Berhasil Di Update']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($no_idm)
    {   
        $dan = data_monitoring::select('no_idn')->where('no_idm', $no_idm)->get();
        $das = data_monitoring::select('no_ids')->where('no_idm', $no_idm)->get();
        $dc2 = data_nilai::where('no_idn', $dan[0]->no_idn)->delete();
        $dc3 = data_surat::where('no_ids', $das[0]->no_ids)->delete();
        $dc = data_monitoring::where('no_idm', $no_idm)->delete();

        if ($dc && $dc2 && $dc3) {
            return back()->withInput(['success' => 'Data Monitoring Berhasil Di Hapus']);;
        }
        else {
            return back()->withInput(['error' => 'Data Monitoring Gagal Di Hapus']);;
        }
    }

    public function listdata(Request $request) 
    {
        $displaydata = 
        data_monitoring::join('data_customers', 'data_monitorings.no_idc', '=', 'data_customers.no_idc')
        ->get();

        return view('/data-om/datatables-om', compact('displaydata'));
    }

    public function download_file($request) 
    {
        return $ret = Storage::download('public/files/'.$request);
    }
}