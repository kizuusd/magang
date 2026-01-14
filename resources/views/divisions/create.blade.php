@extends('karyawans.layout')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Tambah Karyawan Baru</h2>

    <form action="{{ route('karyawans.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Lengkap</label>
            <input type="text" name="name" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Nama Karyawan" required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Jenis Kelamin</label>
            <select name="gender" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                <option value="">-- Pilih Gender --</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Alamat Domisili</label>
            <textarea name="alamat" rows="3" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Masukkan alamat lengkap..." required></textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Posisi / Jabatan</label>
            <select name="position_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                <option value="">-- Pilih Posisi --</option>
                @foreach ($positions as $position)
                    <option value="{{ $position->id }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Divisi</label>
            <select name="division_id" class="shadow border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline bg-white" required>
                <option value="">-- Pilih Divisi --</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Gaji (Rp)</label>
            <input type="number" name="salary" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Contoh: 5000000" required>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('karyawans.index') }}" class="text-gray-500 hover:text-gray-700">Kembali</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                Simpan Data
            </button>
        </div>
    </form>
</div>
@endsection