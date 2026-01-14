<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Position; 
use App\Models\Division;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(10);
        return view('karyawans.index', compact('karyawans'));
    }

    public function create()
    {
       
        $positions = Position::all();
        $divisions = Division::all();
        
        
        return view('karyawans.create', compact('positions', 'divisions'));
    }

    
   public function store(Request $request)
{
    $request->validate([
        'name' => 'required',
        'gender' => 'required',      
        'alamat' => 'required',        
        'position_id' => 'required',
        'division_id' => 'required',
        'salary' => 'required|numeric',
    ]);

    Karyawan::create($request->all());

    return redirect()->route('karyawans.index')
                     ->with('success', 'Karyawan berhasil ditambahkan.');
}
    
    public function edit(Karyawan $karyawan)
{
   
    $positions = Position::all();
    $divisions = Division::all();

   
    return view('karyawans.edit', compact('karyawan', 'positions', 'divisions'));
}

    
  public function update(Request $request, Karyawan $karyawan)
    {
       
        $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'alamat' => 'required',
            'position_id' => 'required',
            'division_id' => 'required',
            'salary' => 'required|numeric',
        ]);

        $karyawan->update($request->all());

      
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