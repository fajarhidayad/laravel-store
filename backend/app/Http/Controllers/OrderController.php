<?php

namespace App\Http\Controllers;

use App\Models\Orders;
use App\Traits\ApiResponses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    use ApiResponses;

    public function index()
    {
        $orders = Orders::where('user_id', Auth::id())->get();

        return $this->success_data($orders);
    }

    public function store(Request $request)
    {
        $request->validate([
            "total" => "required|numeric",
            "shipping_cost" => "required|numeric",
            "address_id" => "required|exists:App\Models\Address,id",
        ]);

        $order = Orders::create([
            "total" => $request->total,
            "shipping_cost" => $request->shipping_cost,
            "address_id" => $request->address_id,
            "user_id" => Auth::id(),
        ]);

        return $this->success_data($order, 201);
    }
}
