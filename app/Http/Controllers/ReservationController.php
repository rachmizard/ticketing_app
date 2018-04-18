<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Reservation;
use App\Transportation;
use App\Customer;
use App\Rute;
use Auth;

class ReservationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reservations = Reservation::orderBy('created_at', 'DESC')->paginate('25');
        $customers = Customer::all();
        $rutes = Rute::all();
        $trans = Transportation::all();
        return view('admin.reservation.index', compact('reservations', 'customers', 'rutes', 'trans'));
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

        $reservation = Reservation::create([
                'reservation_code' => $request->reservation_code,
                'reservation_at' => $request->reservation_at,
                'reservation_date' => $request->reservation_date,
                'customer_id' => $request->customer_id,
                'seat_code' => $request->seat_code,
                'price' => $request->price,
                'rute_id' => $request->rute_id,
                'user_id' => Auth::id(),
                'depart_at' => $request->depart_at,
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
        $detail = Reservation::find($id);
        return view('admin.reservation.detail', compact('detail'));
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
        $reservation = Reservation::find($id);
        $reservation->update($request->all());        

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
        $reservation = Reservation::find($id);
        $reservation->delete();
        return back()->with('messages', 'Berhasil di hapus!');
    }


    public function destroychecked(Request $request)
    {
        $reservation = Reservation::destroy($request->check);
        return back()->with('messages', 'Berhasil di hapus!');
    }
}
