<?php

namespace App\Http\Controllers;


use App\Models\Karyawan;
use App\Models\Position;
use App\Models\Division;


use App\Http\Requests\KaryawanRequest; 
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    public function index()
    {
       
        $karyawans = Karyawan::with(['position', 'division'])->latest()->paginate(10);
        
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
        
        $positions = Position::all();
        $divisions = Division::all();
        
        return view('karyawans.create', compact('positions', 'divisions'));
    }

    public function store(KaryawanRequest $request)
    {
      
        Karyawan::create($request->validated());

        return redirect()->route('karyawans.index')
                         ->with('success', 'Karyawan berhasil ditambahkan.');
    }

    public function edit(Karyawan $karyawan)
    {
        $positions = Position::all();
        $divisions = Division::all();

        return view('karyawans.edit', compact('karyawan', 'positions', 'divisions'));
    }

       public function update(KaryawanRequest $request, Karyawan $karyawan)
    {
        $karyawan->update($request->validated());

        return redirect()->route('karyawans.index')
                         ->with('success', 'Data karyawan berhasil diperbarui.');
    }

    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawans.index')
                         ->with('success', 'Karyawan berhasil dihapus.');
    }
}