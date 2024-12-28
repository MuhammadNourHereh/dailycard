<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        return Order::all(); // Fetch all orders (admin)
    }

    public function userOrders($userId)
    {
        return Order::where('user_id', $userId)->get(); // Fetch orders for a specific user
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'item_id' => 'required|exists:items,item_id',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0',
            'order_type' => 'required|string|max:50',
        ]);

        $order = Order::create($validated);
        return response()->json(['message' => 'Order placed successfully', 'order' => $order]);
    }

    public function update(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $order->update($request->only(['status', 'completed_at']));
        return response()->json(['message' => 'Order updated successfully', 'order' => $order]);
    }
}
