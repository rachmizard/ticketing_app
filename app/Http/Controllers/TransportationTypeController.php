<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation_Type;

class TransportationTypeController extends Controller
{/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trans = Transportation_Type::paginate('25');
        return view('admin.trans.index-transportation-type', compact('trans'));
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
        $trans = Transportation_Type::create($request->all());
        return back()->with('messages', 'Berhasil di tambahkan!');
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
        $trans = Transportation_Type::find($id);
        $trans->update($request->all());        

        return back()->with('messages', 'Berhasil di rubah data tersebut!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trans = Transportation_Type::find($id);
        $trans->delete();
        return back()->with('messages', 'Berhasil di hapus!');
    }


    public function destroychecked(Request $request)
    {
        $trans = Transportation_Type::destroy($request->check);
        return back()->with('messages', 'Berhasil di hapus!');
    }
}
