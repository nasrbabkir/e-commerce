<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
    public function __construct()
    {
        //create read update delete
       $this->middleware(['permission:reservations_read'])->only('index');
        $this->middleware(['permission:reservations_create'])->only('create');
       $this->middleware(['permission:reservations_update'])->only('edit');
       $this->middleware(['permission:reservations_delete'])->only('destroy');

    }//end of constructor

    public function index()
    {
        $reservations = Reservation::paginate(5);
        return view('dashboard.reservations.index', compact('reservations'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
