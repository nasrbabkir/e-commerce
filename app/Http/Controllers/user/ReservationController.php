<?php

namespace App\Http\Controllers\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Reservation;

class ReservationController extends Controller
{
  
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

    
    public function store(Reservation $reservation, Request $request)
    {
        $validate = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'phone' => 'required|numeric|unique:reservations,phone',
            'date' => 'required|date',
            'time' => 'required',
            'message' => 'required',
        ]);

        $reservation->create($request->all());
        session()->flash('success', 'تم إضافة البيانات بنجاح');
        return redirect()->back();



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
