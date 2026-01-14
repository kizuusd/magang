<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem HR Management</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" />
</head>
<body class="bg-gray-100 font-sans leading-normal tracking-normal">

    <div class="flex h-screen overflow-hidden">
        <aside class="w-64 bg-gray-800 text-white flex flex-col shadow-lg transition-all duration-300">
            <div class="h-16 flex items-center justify-center border-b border-gray-700">
                <h1 class="text-xl font-bold tracking-wider">HR SYSTEM</h1>
            </div>
            
            <nav class="flex-1 px-2 py-4 space-y-2 overflow-y-auto">
                <a href="{{ route('karyawans.index') }}" 
                   class="flex items-center px-4 py-3 rounded-md transition-colors duration-200 
                   {{ request()->routeIs('karyawans*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <i class="fas fa-users w-6 text-center"></i>
                    <span class="ml-3 font-medium">Data Karyawan</span>
                </a>

                <a href="{{ route('positions.index') }}" 
                   class="flex items-center px-4 py-3 rounded-md transition-colors duration-200
                   {{ request()->routeIs('positions*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <i class="fas fa-briefcase w-6 text-center"></i>
                    <span class="ml-3 font-medium">Data Posisi</span>
                </a>

                <a href="{{ route('divisions.index') }}" 
                   class="flex items-center px-4 py-3 rounded-md transition-colors duration-200
                   {{ request()->routeIs('divisions*') ? 'bg-blue-600 text-white' : 'text-gray-300 hover:bg-gray-700' }}">
                    <i class="fas fa-building w-6 text-center"></i>
                    <span class="ml-3 font-medium">Data Divisi</span>
                </a>
            </nav>

            <div class="p-4 border-t border-gray-700">
                <p class="text-xs text-gray-500 text-center">&copy; 2026 HR System</p>
            </div>
        </aside>

        <main class="flex-1 flex flex-col overflow-hidden relative">
            <header class="bg-white shadow p-4 flex justify-between items-center">
                <h2 class="text-xl font-semibold text-gray-800">
                    @if(request()->routeIs('karyawans*')) Manajemen Karyawan
                    @elseif(request()->routeIs('positions*')) Manajemen Posisi Jabatan
                    @elseif(request()->routeIs('divisions*')) Manajemen Divisi Perusahaan
                    @else Dashboard
                    @endif
                </h2>
                <div class="text-sm text-gray-600">Admin</div>
            </header>

            <div class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-100 p-6">
                @if ($message = Session::get('success'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6 rounded shadow-sm" role="alert">
                        <p>{{ $message }}</p>
                    </div>
                @endif

                @yield('content')
            </div>
        </main>
    </div>

</body>
</html>