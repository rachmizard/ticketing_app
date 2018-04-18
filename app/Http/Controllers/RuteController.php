<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Reservation;
use App\Transportation;
use Response;

class RuteController extends Controller
{   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rutes = Rute::orderBy('created_at', 'DESC')->paginate('25');
        $trans = Transportation::all();
        return view('admin.rute.index', compact('rutes', 'customers', 'trans'));
    }

    public function searchrute(Request $request)
    {
        $term = trim($request->q);

        if (empty($term)) {
            return \Response::json([]);
        }

        $tags = Rute::search($term)->limit(5)->get();

        $formatted_tags = [];

        foreach ($tags as $tag) {
            $formatted_tags[] = ['id' => $tag->id, 'rute_from' => $tag->rute_from, 'rute_to' => $tag->rute_to];
        }

        return \Response::json($formatted_tags);
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
        $rute = Rute::create($request->all());
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
        $rute = Rute::find($id);
        $rute->update($request->all());        

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
        $rute = Rute::find($id);
        $rute->delete();
        return back()->with('messages', 'Berhasil di hapus!');
    }


    public function destroychecked(Request $request)
    {
        $rute = Rute::destroy($request->check);
        return back()->with('messages', 'Berhasil di hapus!');
    }
}
