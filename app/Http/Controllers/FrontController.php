<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Brand;
use App\Models\Payment;
use App\Models\Rental;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {   
        $brands = Brand::all();
        $cars = Car::latest()->take(6)->get();
        return view('pages.index', compact('brands', 'cars'));
    }

    public function rentCars()
    {
        $cars = Car::all();
        return view('pages.rent-cars', compact('cars'));
    }

    public function about()
    {
        return view('pages.about');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function rentals(Request $request)
    {
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'pickup_date' => 'required|date',
            'return_date' => 'required|date|after:pickup_date',
            'total_price' => 'required|numeric|min:0',
        ]);

        // Buat data rental
        $rental = Rental::create([
            'car_id' => $request->car_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'pickup_date' => $request->pickup_date,
            'return_date' => $request->return_date,
            'total_price' => $request->total_price,
        ]);

        Car::where('id', $request->car_id)->update(['status' => 'rented']);

        return redirect()->route('front.payment', ['rental' => $rental->id])->with('success', 'Rental berhasil!');
    }

    public function payment(Rental $rental)
    {
        $rental->load('car');
        $totalDays = ceil((strtotime($rental->return_date) - strtotime($rental->pickup_date)) / (60 * 60 * 24));
        $name = $rental->name;
        $email = $rental->email;
        $phone = $rental->phone;

        return view('pages.payment', compact('rental', 'totalDays', 'name', 'email', 'phone'));
    }

    public function paymentStore(Rental $rental, Request $request)
    {
        $request->validate([
            'total_amount' => 'required|numeric|min:0',
            'proof' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        Payment::create([
            'rental_id' => $rental->id,
            'total_amount' => $request->total_amount,
            'proof' => $request->file('proof')->store('public/proofs'),
        ]);

        return redirect()->back()->with('success', 'Payment successful!');
    }
}
