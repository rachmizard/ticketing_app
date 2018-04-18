<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Auth;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (Auth::user()->role == 1) {
                return view('admin.profile.index');
            }elseif(Auth::user()->role == 2)
            {
                return view('user.profile.index');
            }
        }
        
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
    public function update(Request $request)
    {
        if (!$request->hasFile('photo') == null) {
            $filename           = Auth::user()->name . time() . '.' . $request->photo->getClientOriginalExtension();
            
            $destinationPath = base_path() . '/public/img';
            $request->photo->move($destinationPath, $filename);
            if (File::exists(public_path(). 'img/' . $request->photoRequest)) {
                unlink(public_path(public_path(). 'img/' . $request->photoRequest));
            }
        }else{
            $filename = $request->photoRequest;
        }

        $profile = User::find(Auth::id());
        $profile->update([
            'photo' => $filename,
            'name' => $request->name,
            'email' => $request->email
        ]);
        return back()->with('messages', 'Berhasil di ganti!');
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
