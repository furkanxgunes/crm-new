<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    

    public function index()
    {
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */public function create()
{
    return view('customers.create');
}

public function store(Request $request)
{
    // 1. Veriyi doğrula
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers', // email benzersiz olmalı
        'phone' => 'nullable|string|max:255|unique:customers',        
        'address' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    // 2. Müşteriyi yarat
    Customer::create($request->all());

    // 3. Listeye başarı mesajıyla yönlendir
    return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla eklendi.');
}

    /**
     * Display the specified resource.
     */
        public function show(Customer $customer)
        {
            // Müşterinin pet'lerini de birlikte yükle (Eager Loading)
            $customer->load('pets'); 

            return view('customers.show', compact('customer'));
        }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Customer $customer)
    {
        //
            return view('customers.edit', compact('customer'));

    }

    /**
     * Update the specified resource in storage.
     */
 public function update(Request $request, Customer $customer)
{
    // 1. Veriyi doğrula (email'in benzersizlik kontrolü güncellenen kişi hariç tutulmalı)
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:customers,email,' . $customer->id,
        'phone' => 'nullable|string|max:255|unique:customers,phone,' . $customer->id,
        'address' => 'nullable|string',
        'notes' => 'nullable|string',
    ]);

    // 2. Müşteriyi güncelle
    $customer->update($request->all());

    // 3. Yönlendir
    return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla güncellendi.');
}
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Customer $customer)
    {
        //
        $customer->delete();
        return redirect()->route('customers.index')->with('success', 'Müşteri başarıyla silindi.');
    }
}
