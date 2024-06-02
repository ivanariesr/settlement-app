<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;


class userController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $displaydata = User::all();
        return view('/data-user/list-data', compact('displaydata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/data-user/input-data');
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
        $dc = User::findOrFail($id);
        return view('/data-user/edit-password',compact('dc'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dc = User::findOrFail($id);
        return view('/data-user/edit-data',compact('dc'));
    }

    public function edit_user($id)
    {
        $dc = User::findOrFail($id);
        return view('/data-user/edit-user',compact('dc'));
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
            'username' => ['required',Rule::unique('users')->ignore($id)],
            'name' => 'required'
        ]);

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } else { 
            $usr = user::find($id);
            $usr->username = $request->username;
            $usr->name = $request->name;
            $usr->email= $request->email;
            $usr->role = $request->role;
            $usr->save();
            return redirect()->route('data-user.index')
            ->with(['sucess' => 'Data User Berhasil Di Update']);
        }
    }

    public function update_password(Request $request, $id)
    {   
        $validator = Validator::make($request->all(), [
            'old_password' => 'required',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
        ]);

        if ($validator->fails())   //check all validations are fine, if not then redirect and show error messages
        {
            return back()->withInput()->withErrors($validator);
            // validation failed redirect back to form
        } 
        elseif ((!Hash::check($request->old_password, auth()->user()->password))) {
            return back()->withInput()->withErrors("Data Password Lama Salah!");
        }
        else { 

            User::whereId(auth()->user()->id)->update([
                'password' => Hash::make($request->password),
                'password_text' => $request->password
            ]);

            return redirect()->route('edit_user',auth()->user()->id)
            ->with(['sucess' => 'Password Berhasil Di Update']);
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

        $displaydata = User::findOrFail($id);
        $displaydata->delete();
        
        if ($displaydata) {
            return back()->withInput(['success' => 'Data User Berhasil Di Hapus']);;
        }
        else {
            return back()->withInput(['error' => 'Data User Gagal Di Hapus']);;
       }
    }

    public function listdata(Request $request) 
    {
        $displaydata = User::all();
        return view('/data-user/datatables-user', compact('displaydata'));
    }
}
