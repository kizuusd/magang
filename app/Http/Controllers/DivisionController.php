<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;

class DivisionController extends Controller
{
    public function index()
    {
        $divisions = Division::latest()->paginate(10);
        return view('divisions.index', compact('divisions'));
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate(['name' => 'required']);
        Division::create($request->all());
        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil dibuat.');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate(['name' => 'required']);
        $division->update($request->all());
        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil diupdate.');
    }

    public function destroy(Division $division)
    {
        $division->delete();
        return redirect()->route('divisions.index')->with('success', 'Divisi berhasil dihapus.');
    }
}