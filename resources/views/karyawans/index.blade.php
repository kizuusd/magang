@extends('karyawans.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Karyawan</h2>
        <a href="{{ route('karyawans.create') }}" class="bg-gray-600 hover:bg-blue-900 text-white font-bold py-2 px-4 rounded transition">
            + Tambah Karyawan
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Posisi</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Divisi</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Gaji</th>
                    <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                
                @foreach ($karyawans as $karyawan)
                <tr>
                    <td class="py-4 px-6 text-gray-700">{{ $karyawan->name }}</td>
                    
                    <td class="py-4 px-6 text-gray-700">
                        {{ $karyawan->position ? $karyawan->position->name : '-' }}
                    </td>
                    <td class="py-4 px-6 text-gray-700">
                        {{ $karyawan->division ? $karyawan->division->name : '-' }}
                    </td>
                    
                    <td class="py-4 px-6 text-gray-700 font-mono">Rp {{ number_format($karyawan->salary, 0, ',', '.') }}</td>
                    
                    <td class="py-4 px-6 text-center flex justify-center space-x-2">
                        <a href="{{ route('karyawans.edit', $karyawan->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                        
                        <form action="{{ route('karyawans.destroy', $karyawan->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $karyawans->links() }}
    </div>
</div>
@endsection