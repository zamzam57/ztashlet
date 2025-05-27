<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Storage;
use Illuminate\Foundation\Validation\ValidatesRequests;

class StorageController extends Controller
{
    use ValidatesRequests;

    public function index()
    {
        $storages = Storage::paginate(5);
        return view('partials.storage', compact('storages')); // partial view for ajax load
    }

    public function create()
    {
        return view('partials.storage-add'); // form to add storage
    }

    public function store(Request $request)
    {
        $request->validate([
            'unit_name' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:50',
        ]);

        Storage::create([
            'unit_name' => $request->unit_name,
            'location' => $request->location,
            'size' => $request->size,
        ]);

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Storage added successfully.']);
        }

        return redirect('/')->with('success', 'Storage added successfully.');
    }

    public function edit($id)
    {
        $storage = Storage::findOrFail($id);
        return view('partials.storage-edit', compact('storage'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'unit_name' => 'required|string|max:100',
            'location' => 'required|string|max:255',
            'size' => 'required|string|max:50',
        ]);

        $storage = Storage::findOrFail($id);
        $storage->update($request->only('unit_name', 'location', 'size'));

        if ($request->expectsJson()) {
            return response()->json(['success' => true, 'message' => 'Storage updated successfully.']);
        }

        return redirect('/')->with('success', 'Storage updated successfully.');
    }

    public function destroy($id)
    {
        $storage = Storage::findOrFail($id);
        $storage->delete();

        return redirect('/')->with('success', 'Storage deleted successfully.');
    }
}
