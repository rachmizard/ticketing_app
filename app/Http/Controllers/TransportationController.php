<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transportation;
use App\Transportation_Type;
use File;
use Storage;

class TransportationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transportations = Transportation::orderBy('created_at', 'DESC')->paginate('25');
        $types = Transportation_Type::all();
        return view('admin.trans.index', compact('transportations', 'types'));
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
        if (!$request->hasFile('photo') == null) {
            $filename           = time() . '.' . $request->photo->getClientOriginalExtension();
            
            $destinationPath = base_path() . '/public/img';
            // resize gambar ke ukuran 100x100px
            $request->photo->move($destinationPath, $filename);
        }else{
            $filename = null;
        }

        $transportation = Transportation::create([
            'code' => $request->code,
            'seat_qty' => $request->seat_qty,
            'description' => $request->description,
            'transportation_type_id' => $request->transportation_type_id,
            'photo' => $filename,
        ]);
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
        if ($request->hasFile('photo')) {
            $filename           = time() . '.' . $request->photo->getClientOriginalExtension();
            
            $destinationPath = base_path() . '/public/img';
            $request->photo->move($destinationPath, $filename);
        }else{
                $filename = $request->photoRequest;   
        }

        $transportation = Transportation::find($id);
        $transportation->update([
            'code' => $request->code,
            'seat_qty' => $request->seat_qty,
            'description' => $request->description,
            'photo' => $filename,
        ]);

        return back()->with('messages', 'Berhasil di edit!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transportation = Transportation::find($id);
        $transportation->delete();
        return back()->with('messages', 'Berhasil di hapus!');
    }


    public function destroychecked(Request $request)
    {
        $transportation = Transportation::destroy($request->check);
        return back()->with('messages', 'Berhasil di hapus!');
    }

    public function deletePhoto(Request $request, $id)
    {
            $transportation = Transportation::find($id);
            $transportation->update([
                'photo' => null
            ]);
            return back()->with('messages', 'Foto transportasi berhasil di hapus!');
    }
}
