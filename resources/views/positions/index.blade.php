@extends('karyawans.layout')

@section('content')
<div class="bg-white p-6 rounded-lg shadow-md">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-semibold text-gray-800">Daftar Posisi</h2>
        <a href="{{ route('positions.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded transition">
            + Tambah Posisi
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border border-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">No</th>
                    <th class="py-3 px-6 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nama Posisi</th>
                    <th class="py-3 px-6 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @forelse ($positions as $index => $position)
                <tr>
                    <td class="py-4 px-6 text-gray-700">{{ $positions->firstItem() + $index }}</td>
                    <td class="py-4 px-6 text-gray-700 font-medium">{{ $position->name }}</td>
                    <td class="py-4 px-6 text-center flex justify-center space-x-2">
                        <a href="{{ route('positions.edit', $position->id) }}" class="text-indigo-600 hover:text-indigo-900 font-medium">Edit</a>
                        
                        <form action="{{ route('positions.destroy', $position->id) }}" method="POST" onsubmit="return confirm('Hapus posisi ini? Karyawan dengan posisi ini mungkin ikut terhapus/error.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900 font-medium ml-2">Hapus</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="3" class="py-4 px-6 text-center text-gray-500">Belum ada data posisi.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div class="mt-4">
        {{ $positions->links() }}
    </div>
</div>
@endsection