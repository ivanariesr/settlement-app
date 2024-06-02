<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\data_customer;
use App\Models\data_pic;


class omTGController extends Controller
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
        $datacust = data_customer::select('no_idc','unit')->get();
        $datapic_idpni = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPNI%')->get();
        $datapic_idpre = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPRE%')->get();
        $datapic_idppm = data_pic::select('no_idp','nama')->where('no_idp', 'LIKE', '%IDPPM%')->get();
        return view('/data-om/data-om-tg/input-data', compact('datacust','datapic_idpni','datapic_idpre','datapic_idppm'));        
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
        //
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
