<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\Category;
use App\Models\Storage;
use Illuminate\Foundation\Validation\ValidatesRequests;

class ItemController extends Controller
{
    use ValidatesRequests;

    // Show all items paginated
    public function index()
    {
        $items = Item::paginate(5);
        return view('partials.item', compact('storages'));
    }

    // Show form to add item
    public function create()
    {
        $categories = Category::all();
        $storages = Storage::all(); // Use correct model

        return view('items.item-add', compact('categories', 'storages'));
    }

    // Store new item
    public function store(Request $request)
    {
        $request->validate([
            'item_name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,category_id',
            'unit_id' => 'required|exists:storage_units,unit_id',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'date_stored' => 'required|date',
        ]);

        Item::create([
            'item_name' => $request->item_name,
            'category_id' => $request->category_id,
            'unit_id' => $request->unit_id,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'date_stored' => $request->date_stored,
        ]);

        return redirect('/')->with('success', 'Item added successfully.');
    }

    // Show form to edit item
    public function edit($id)
    {
        $item = Item::findOrFail($id);
        $categories = Category::all();
        $storages = Storage::all();

        return view('items.item-edit', compact('item', 'categories', 'storages'));
    }

    // Update item
    public function update(Request $request, $id)
    {
        $request->validate([
            'item_name' => 'required|string|max:100',
            'category_id' => 'required|exists:categories,category_id',
            'unit_id' => 'required|exists:storage_units,unit_id',
            'description' => 'nullable|string',
            'quantity' => 'required|integer|min:0',
            'date_stored' => 'required|date',
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->only([
            'item_name', 'category_id', 'unit_id', 'description', 'quantity', 'date_stored'
        ]));

        return redirect('/')->with('success', 'Item updated successfully.');
    }

    // Delete item
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect('/')->with('success', 'Item deleted successfully.');
    }
}
