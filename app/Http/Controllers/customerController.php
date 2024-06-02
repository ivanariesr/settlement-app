<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\data_customer;

class customerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        $displaydata = data_customer::all();
        return view('/data-customer/list-data', compact('displaydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {  
        return view('/data-customer/input-data');
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
            'customer' => 'required',
            'cust_type' => 'required',
            'area' => 'required',
            'unit' => 'required|unique:data_customers',
            'no_idc' => 'required'
        ]);
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else { 

            $Cust = new data_customer;
            $Cust->customer = $request->customer;
            $Cust->cust_type = $request->cust_type;
            $Cust->area = $request->area;
            $Cust->unit = $request->unit;
            $Cust->no_idc = $request->no_idc;
            $Cust->save();

        return redirect()->route('data-customer.index')
        ->with(['sucess' => 'Data Customer Berhasil Di Simpan']);
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
        $dc = data_customer::findOrFail($id);
        return view('/data-customer/edit-data',compact('dc'));
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
        $validator = Validator::make($request->all(), [
            'customer' => 'required',
            'cust_type' => 'required',
            'area' => 'required',
            'unit' => ['required',Rule::unique('data_customers')->ignore($id)],
            'no_idc' => 'required'
        ]);
        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else { 

            $Cust = data_customer::find($id);
            $Cust->customer = $request->customer;
            $Cust->cust_type = $request->cust_type;
            $Cust->area = $request->area;
            $Cust->unit = $request->unit;
            $Cust->no_idc = $request->no_idc;
            $Cust->save();

        return redirect()->route('data-customer.index')
        ->with(['sucess' => 'Data Customer Berhasil Di Update']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $displaydata = data_customer::findOrFail($id);
        $displaydata->delete();
        
        if ($displaydata) {
            return back()->with(['success' => 'Data Customer Berhasil Di Hapus']);;
        }
        else {
            return back()->with(['error' => 'Data Customer Gagal Di Hapus']);;
       }

    }

    public function listdata(Request $request) 
    {
        $displaydata = data_customer::all();
        return view('/data-customer/datatables-customer', compact('displaydata'));
    }

}