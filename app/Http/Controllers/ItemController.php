<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    public function index()
    {
        return Item::where('item_availability', true)->get(); // Fetch all available items
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'description' => 'required|string',
            'item_price' => 'required|numeric|min:0',
            'item_quantity' => 'required|integer|min:0',
        ]);

        $item = Item::create($validated);
        return response()->json(['message' => 'Item created successfully', 'item' => $item]);
    }

    public function show($id)
    {
        return Item::findOrFail($id); // Fetch a specific item
    }

    public function update(Request $request, $id)
    {
        $item = Item::findOrFail($id);
        $item->update($request->only(['item_name', 'description', 'item_price', 'item_quantity', 'item_availability']));
        return response()->json(['message' => 'Item updated successfully', 'item' => $item]);
    }

    public function destroy($id)
    {
        Item::findOrFail($id)->delete();
        return response()->json(['message' => 'Item deleted successfully']);
    }
}
