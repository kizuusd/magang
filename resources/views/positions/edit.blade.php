@extends('karyawans.layout')

@section('content')
<div class="max-w-lg mx-auto bg-white p-8 rounded-lg shadow-md">
    <h2 class="text-2xl font-bold mb-6 text-gray-800">Edit Posisi</h2>

    <form action="{{ route('positions.update', $position->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Nama Posisi / Jabatan</label>
            <input type="text" name="name" value="{{ $position->name }}" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
        </div>

        <div class="flex items-center justify-between">
            <a href="{{ route('positions.index') }}" class="text-gray-500 hover:text-gray-700">Batal</a>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition">
                Update
            </button>
        </div>
    </form>
</div>
@endsection