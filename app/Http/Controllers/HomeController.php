<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Customer;
use App\Reservation;
use App\Transportation;
use App\Rute;
use Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::user()->role == '1') {
            $users = User::all();
            $customers = Customer::all();
            $reservations = Reservation::all();
            $rutes = Rute::all();
            $transportations = Transportation::all();
            return view('home', compact('users','customers','reservations', 'rutes', 'transportations'));
        }elseif(Auth::user()->role == '2')
        {
            if (Auth::user()->customer_id == null) {
                return redirect()->route('validation.customer');
            }else{
                $rutes = Rute::all();
                $q = $request->get('qfrom');
                if ($request->get('qfrom') && $request->get('qto')) {
                   $hasil = Rute::when($q, function ($query) use ($request) {
                    $query->where('rute_from', 'like', "%{$request->qfrom}%")->orWhere('rute_to', 'like', "%{$request->qto}%");
                        })->get();
                    return view('home-user', compact('rutes', 'hasil'));      
                }
                $hasil = null;
                return view('home-user', compact('rutes', 'hasil'));      
            }
        }
    }
}
