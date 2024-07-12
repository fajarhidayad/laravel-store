<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AddressController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $address = Address::where('user_id', Auth::id())->get();

        return $this->success_data($address);
    }

    public function show(Address $address)
    {
        return $this->success_data($address);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => "required",
            "address" => "required|max:255",
            "kecamatan" => "required|max:100",
            "city" => "required|max:100",
            "province" => "required|max:100",
            "zipcode" => "required|max:6",
        ]);

        $address = Address::create([
            "name" => $request->name,
            "address" => $request->address,
            "kecamatan" => $request->kecamatan,
            "city" => $request->city,
            "province" => $request->province,
            "zipcode" => $request->zipcode,
            "user_id" => Auth::id()
        ]);

        return $this->success_data($address, 201);
    }

    public function update(Request $request, Address $address)
    {
        $data = $request->validate([
            "name" => "required",
            "address" => "required|max:255",
            "kecamatan" => "required|max:100",
            "city" => "required|max:100",
            "province" => "required|max:100",
            "zipcode" => "required|max:6",
        ]);

        $address->update($data);

        return $this->success_data($address);
    }

    public function destroy(Address $address)
    {
        $address->delete();
        return $this->ok("success");
    }
}
