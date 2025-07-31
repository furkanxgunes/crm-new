<?php

namespace App\Http\Controllers;

use App\Models\Pet;
use App\Models\Customer;
use Illuminate\Http\Request;

class PetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Customer $customer)
    {
        //
        return view('pets.create', compact('customer'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Customer $customer)
    {
        // 1. Formdan gelen veriyi doğrula
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'species' => 'required|string|in:Köpek,Kedi', // Sadece bu iki değer kabul edilsin
            'breed' => 'nullable|string|max:255',
            'age' => 'nullable|numeric|max:50', // Yaş 50'den büyük olmasın
            'gender' => 'nullable|string|in:Erkek,Dişi',
            'weight_kg' => 'nullable|numeric',
            'medical_notes' => 'nullable|string|max:1000',
        ]);
        
        // 2. Müşteri ID'sini doğrulanmış veriye ekle
        $validatedData['customer_id'] = $customer->id;

        // 3. Yeni Pet'i oluştur ve kaydet
        Pet::create($validatedData);

        // 4. Kullanıcıyı pet'i eklediği Müşteri Detay sayfasına geri yönlendir
        return redirect()->route('customers.show', $customer)->with('success', 'Evcil hayvan başarıyla eklendi.');
}

    /**
     * Display the specified resource.
     */
    public function show(Pet $pet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pet $pet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pet $pet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pet $pet)
    {
        //
    }
}
