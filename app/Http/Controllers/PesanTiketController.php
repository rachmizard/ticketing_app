<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rute;
use App\Customer;
use App\Transportation;
use App\Reservation;
use App\User;
use Auth;

class PesanTiketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function pesanTiket(Request $request, $id)
    {
        $pesan = Rute::find($id);
        $customers = Customer::where('id', Auth::user()->customer_id)->get();
        return view('user.pesan-tiket', compact('pesan', 'customers'));
    }

    public function konfirmasi(Request $request)
    {

        $customer = Customer::find(Auth::user()->customer_id);
        $customer->update($request->all());

        $transportasi = Transportation::find($request->transportation_id);
        $transportasi->update([
            'seat_qty' =>- $request->jumlah_penumpang
        ]);

        $reservasi = Reservation::create([
            'reservation_code' => $request->reservation_code,
            'seat_code' => $request->seat_code,
            'customer_id' => Auth::user()->customer_id,
            'reservation_date' => $request->reservation_date,
            'rute_id' => $request->rute_id,
            'user_id' => Auth::id(),
        ]);

        return redirect('/user/home');
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

