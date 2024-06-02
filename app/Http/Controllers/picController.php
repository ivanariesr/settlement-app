<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\data_pic;

class picController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displaydata = data_pic::all();
        return view('/data-pic/list-data', compact('displaydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/data-pic/input-data');
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
            'nama' => 'required|unique:data_pics',
            'posisi' => 'required',
            'no_idp' => 'required'
        ]);

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else { 

            $PIC = new data_pic;
            $PIC->nama = $request->nama;
            $PIC->posisi = $request->posisi;
            $PIC->no_idp = $request->no_idp;
            $PIC->save();

            return redirect()->route('data-pic.index')
            ->with(['sucess' => 'Data PIC Berhail Di Simpan']);
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dc = data_pic::findOrFail($id);
        return view('/data-pic/edit-data',compact('dc'));
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
            'nama' => ['required',Rule::unique('data_pics')->ignore($id)],
            'posisi' => 'required',
            'no_idp' => 'required'
        ]);

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else { 
            $PIC = data_pic::find($id);
            $PIC->nama = $request->nama;
            $PIC->posisi = $request->posisi;
            $PIC->no_idp = $request->no_idp;
            $PIC->save();
            return redirect()->route('data-pic.index')
            ->with(['sucess' => 'Data PIC Berhasil Di Update']);
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
        $displaydata = data_pic::findOrFail($id);
        $displaydata->delete();
        
        if ($displaydata) {
            return back()->withInput(['success' => 'Data Customer Berhasil Di Hapus']);;
        }
        else {
            return back()->withInput(['error' => 'Data Customer Gagal Di Hapus']);;
       }
    }

    public function listdata(Request $request) 
    {
        $displaydata = data_pic::all();
        return view('/data-pic/datatables-pic', compact('displaydata'));
    }

}
