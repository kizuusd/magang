@extends('karyawans.layout')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Data Karyawan</h2>

    {{-- Perbaikan: Gunakan $karyawan->id --}}
    <form action="{{ route('karyawans.update', $karyawan->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="name" value="{{ $karyawan->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
            <select name="gender" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                <option value="Laki-laki" {{ $karyawan->gender == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                <option value="Perempuan" {{ $karyawan->gender == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat</label>
            <textarea name="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>{{ $karyawan->alamat }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Posisi / Jabatan</label>
            <select name="position_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}" {{ $karyawan->position_id == $position->id ? 'selected' : '' }}>
                        {{ $position->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Divisi</label>
            <select name="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}" {{ $karyawan->division_id == $division->id ? 'selected' : '' }}>
                        {{ $division->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gaji (Angka)</label>
            <input type="number" name="salary" value="{{ $karyawan->salary }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('karyawans.index') }}" class="text-gray-500 hover:text-gray-700">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                Update Data
            </button>
        </div>
    </form>
</div>
@endsection