@if (Auth::check())
    @if (Auth::user()->role_id == 1)
        <!-- Dashboard Admin -->
        <x-app-layout>
            <x-slot name="header">
                <div class="flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                    <h2 class="text-xl font-semibold leading-tight">
                        {{ __('Dashboard Admin') }}
                    </h2>
                </div>
            </x-slot>

            <div class="p-6 overflow-hidden bg-white rounded-md shadow-md dark:bg-dark-eval-1">
                <p>Welcome to the admin dashboard!</p>
                <p>Here you can manage users, view transactions, and more.</p>
            </div>
        </x-app-layout>
    @elseif (Auth::user()->role_id == 2)
        <!-- Dashboard User Normal -->
        <!DOCTYPE html>
        <html lang="id">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
            <title>Dashboard</title>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
            <script src="https://cdn.tailwindcss.com"></script>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <style>
                body {
                    font-family: 'Inter', sans-serif;
                }
                .gradient-bg {
                    background: linear-gradient(135deg, #FC6736 0%, #0c2d57 100%);
                }
            </style>
            <script>
                tailwind.config = {
                    theme: {
                        extend: {
                            colors: {
                                primary: '#FC6736',
                                secondary: '#0c2d57',
                                background: '#FAF6F2'
                            }
                        }
                    }
                }
            </script>
        </head>
        <body class="bg-[#FAF6F2]">
        @include('header')

        @guest
            <div class="max-w-5xl mx-auto mt-10 px-4">

                <div class="bg-red-100 border border-red-400 text-red-700 px-6 py-4 rounded-md text-center shadow-md mb-6">
                    ⚠️ Anda harus login untuk mengecek dashboard.
                </div>

                @include('akun.loginform')
            </div>

            @php return; @endphp
        @endguest

            <!-- Main Container -->
            <div class="container mx-auto px-6 py-8">
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-8">
                    
                    <!-- Sidebar -->
                    <div class="lg:col-span-1">
                        <div class="bg-white rounded-2xl shadow-md p-6 sticky top-8">
                        <div class="text-center mb-6">
                            @if(Auth::user()->profile_photo)
                                <!-- Tampilkan foto profil dari database -->
                                <img 
                                    src="{{ Auth::user()->profile_photo }}" 
                                    alt="Profile" 
                                    class="w-24 h-24 rounded-full mx-auto mb-4 object-cover border-4 border-[#FC6736]">
                            @else
                                <!-- Tampilkan icon default jika foto tidak ada -->
                                <div class="w-24 h-24 rounded-full mx-auto mb-4 flex items-center justify-center border-4 border-[#FC6736] bg-gray-200 text-[#0c2d57] text-4xl">
                                    <i class="fa-solid fa-user"></i>
                                </div>
                            @endif

                            <!-- Nama User -->
                            <h3 class="font-bold text-[#0c2d57] text-lg">
                                {{ Auth::user()->name ?? 'Guest' }}
                            </h3>
                        </div>

                            
                            <nav class="space-y-2">
                                <button onclick="showTab('tickets')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-ticket"></i> Tiket Saya
                                </button>
                                <button onclick="showTab('history')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-clock-rotate-left"></i> Riwayat Transaksi
                                </button>
                                <button onclick="showTab('profile')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-user-gear"></i> Profil Akun
                                </button>
                                <button onclick="showTab('security')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-lock"></i> Keamanan
                                </button>
                                <button onclick="showTab('invoice')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-money-bill"></i> Invoice
                                </button>
                                <button onclick="showTab('refund')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-sack-xmark"></i> Refund
                                </button>
                                <button onclick="showTab('membership')" class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                    <i class="fa-solid fa-star" style="color:#FC6736;"></i> Membership
                                </button>
                                <!-- Tombol Delete Akun -->
                                <form id="deleteAccountForm" action="{{ route('account.delete') }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" 
                                        onclick="confirmDelete()" 
                                        class="w-full text-left px-4 py-3 rounded-lg hover:bg-[#FAF6F2] transition flex items-center gap-3 font-medium text-[#0c2d57]">
                                        <i class="fa-solid fa-trash-can" style="color:#FF0F0F;"></i> Hapus Akun
                                    </button>
                                </form>

                            </nav>

                            <button class="w-full mt-6 px-4 py-3 bg-red-50 text-red-600 rounded-lg hover:bg-red-100 transition font-medium">
                                Keluar
                            </button>
                        </div>
                    </div>

                    <!-- Main Content -->
                    <div class="lg:col-span-3">
                        
                    <!-- Tab: Tiket Saya -->
                    <div id="tickets" class="tab-content">
                        @include('components.tiketuser')
                    </div>


                        <!-- Tab: Riwayat Transaksi -->
                        <div id="history" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">📋 Riwayat Transaksi</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Riwayat semua transaksi pembelian tiket</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab: Profil Akun -->
                        <div id="profile" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">👤 Profil Akun</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Form edit profil pengguna (nama, email, telepon, dll)</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab: Keamanan -->
                        <div id="security" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">🔒 Pengaturan Keamanan</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Ubah password, 2FA, riwayat login</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab: Invoice -->
                        <div id="invoice" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">📄 Invoice & Bukti Pembayaran</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Daftar invoice dan bukti pembayaran</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab: Refund -->
                        <div id="refund" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">🔄 Refund / Cancel Ticket</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Ajukan pembatalan tiket dan refund</p>
                                </div>
                            </div>
                        </div>

                        <!-- Tab: Membership -->
                        <div id="membership" class="tab-content hidden">
                            <div class="bg-white rounded-2xl shadow-md p-8">
                                <h2 class="text-2xl font-bold text-[#0c2d57] mb-6">⭐ Membership / Loyalty</h2>
                                <div class="text-center py-20">
                                    <p class="text-6xl font-black text-gray-300">CONTOH</p>
                                    <p class="text-gray-500 mt-4">Status membership, poin reward, benefit</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <script>
                function showTab(tabName) {
                    // Hide all tabs
                    document.querySelectorAll('.tab-content').forEach(tab => {
                        tab.classList.add('hidden');
                    });
                    
                    // Show selected tab
                    document.getElementById(tabName).classList.remove('hidden');
                }

                // Show first tab by default
                showTab('tickets');

                function confirmDelete() {
                    if (confirm("APAKAH YAKIN HAPUS AKUN ?")) {
                        document.getElementById('deleteAccountForm').submit();
                    }
                    // Jika user pilih 'Tidak', tidak terjadi apa-apa
                }
            </script>
        @include('footer')
        </body>
        </html>
    @else
        <!-- Jika Role Tidak Dikenal -->
        <div class="bg-gray-100 p-6 rounded-md shadow-md">
            <h3 class="text-xl font-semibold">Role tidak ditemukan</h3>
        </div>
    @endif
@else
    <!-- Jika Guest, Tampilkan Login Form -->
    <div class="bg-gray-100 p-6 rounded-md shadow-md">
        <h3 class="text-xl font-semibold">Anda harus login terlebih dahulu</h3>
        <a href="{{ route('login') }}" class="text-blue-500">Login di sini</a>
    </div>
@endif
