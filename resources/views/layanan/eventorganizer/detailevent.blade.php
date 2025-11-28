<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Detail Event - {{ $events->name }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
<body class="bg-background">

@include('header')

<div class="container mx-auto px-6 py-12">
    <div class="grid lg:grid-cols-3 gap-8">
        <!-- Kiri: Info Event -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Poster dengan Overlay Info -->
            <div class="relative rounded-md overflow-hidden shadow-md">
                <img src="{{ asset('images/' . $events->poster) }}" alt="{{ $events->name }}" class="w-full h-96 object-cover">
                <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/40 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-8 text-white">
                    <div class="inline-block bg-primary px-4 py-2 rounded-full text-sm font-semibold mb-4">
                        Kajian Islam
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold mb-3">{{ $events->name }}</h1>
                    <div class="flex flex-wrap gap-4 text-sm">
                        <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"/>
                            </svg>
                            {{ $events->start_date->format('d M Y, H:i') }}
                        </div>
                        <div class="flex items-center bg-white/20 backdrop-blur-sm px-4 py-2 rounded-full">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/>
                            </svg>
                            {{ $events->location }}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Deskripsi Event -->
            <div class="bg-white rounded-md shadow-md p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-md flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-secondary">Tentang Event</h2>
                </div>
                <p class="text-gray-700 leading-relaxed text-lg">{{ $events->description }}</p>
            </div>

            <!-- Jadwal Event -->
            <div class="bg-white rounded-md shadow-md p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-md flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-secondary">Jadwal Acara</h2>
                </div>
                <div class="space-y-4">
                    <div class="flex items-start gap-4 p-4 bg-background rounded-md">
                        <div class="bg-primary text-white px-4 py-2 rounded-md text-center min-w-[80px]">
                            <div class="text-2xl font-bold">{{ $events->start_date->format('d') }}</div>
                            <div class="text-xs">{{ $events->start_date->format('M Y') }}</div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-secondary mb-1">Mulai Acara</h3>
                            <p class="text-gray-600">{{ $events->start_date->format('l, d F Y - H:i') }} WIB</p>
                        </div>
                    </div>
                    <div class="flex items-start gap-4 p-4 bg-background rounded-md">
                        <div class="bg-secondary text-white px-4 py-2 rounded-md text-center min-w-[80px]">
                            <div class="text-2xl font-bold">{{ $events->end_date->format('d') }}</div>
                            <div class="text-xs">{{ $events->end_date->format('M Y') }}</div>
                        </div>
                        <div class="flex-1">
                            <h3 class="font-bold text-secondary mb-1">Selesai Acara</h3>
                            <p class="text-gray-600">{{ $events->end_date->format('l, d F Y - H:i') }} WIB</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Artists -->
            <div class="bg-white rounded-md shadow-md p-8">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-md flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-secondary">Pengisi Acara</h2>
                </div>
                <div class="grid md:grid-cols-2 gap-4">
                    @foreach($events->artists as $artist)
                    <div class="flex items-center gap-4 p-4 bg-background rounded-md hover:shadow-md transition">
                        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white" fill="#FC6736" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="font-bold text-secondary">{{ $artist->name }}</h3>
                            <p class="text-sm text-gray-600">Ustadz / Pemateri</p>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>

        <!-- Kanan: Tiket -->
        <div class="lg:col-span-1">
            <div class="bg-white rounded-md shadow-md p-8 sticky top-24">
                <div class="flex items-center gap-3 mb-6">
                    <div class="w-12 h-12 bg-primary/10 rounded-md flex items-center justify-center">
                        <svg class="w-6 h-6 text-primary" fill="currentColor" viewBox="0 0 20 20">
                            <path d="M2 6a2 2 0 012-2h12a2 2 0 012 2v2a2 2 0 100 4v2a2 2 0 01-2 2H4a2 2 0 01-2-2v-2a2 2 0 100-4V6z"/>
                        </svg>
                    </div>
                    <h2 class="text-2xl font-bold text-secondary">Pilih Tiket</h2>
                </div>
                    <div class="space-y-4">
                    @foreach($events->tickets as $tickets)
                        <div class="bg-gradient-to-br from-background to-white rounded-md p-6 border-2 
                            {{ $tickets->quota > 0 ? 'border-primary/20 hover:border-primary hover:shadow-xl' : 'border-gray-200' }} 
                            transition-all duration-300">
                            <!-- Header -->
                            <div class="flex justify-between items-start mb-4">
                                <div>
                                    <h3 class="text-xl font-bold text-secondary mb-1">{{ $tickets->type }}</h3>

                                    <div class="flex items-center gap-2 text-sm text-gray-600">
                                        <span>Sisa {{ $tickets->quota }} tiket</span>
                                    </div>
                                </div>
                                @if($tickets->quota > 0)
                                    <span class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Tersedia
                                    </span>
                                @else
                                    <span class="bg-red-100 text-red-700 px-3 py-1 rounded-full text-xs font-semibold">
                                        Habis
                                    </span>
                                @endif
                            </div>
                            <!-- Harga -->
                            <div class="mb-4 pb-4 border-b border-gray-200">
                                <div class="flex items-baseline gap-1">
                                    <span class="text-3xl font-bold text-primary">
                                        Rp {{ number_format($tickets->price, 0, ',', '.') }}
                                    </span>
                                    <span class="text-gray-500 text-sm">/tiket</span>
                                </div>
                            </div>
                            <!-- Jika habis -->
                            @if($tickets->quota <= 0)
                                <button type="button" class="w-full bg-gray-300 text-gray-500 rounded-md px-6 py-3 font-semibold cursor-not-allowed">
                                    Tiket Habis
                                </button>
                            @else
                                <!-- USER LOGIN -->
                                @if(auth()->check())
                                    {{-- BELI SEKARANG → langsung checkout --}}
                                    <form action="{{ route('user.ticket.buy', $tickets->id) }}" method="POST" class="mb-3">
                                        @csrf
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $tickets->quota }}"
                                            class="w-full p-2 border rounded-md text-center mb-3">
                                        <button type="submit" 
                                            class="w-full bg-primary text-white rounded-md px-6 py-3 font-semibold hover:bg-opacity-90 transition shadow-md">
                                            Beli Sekarang
                                        </button>
                                    </form>
                                    {{-- ADD TO CART --}}
                                    <form action="{{ route('carts.add') }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="ticket_id" value="{{ $tickets->id }}">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $tickets->quota }}"
                                            class="w-full p-2 border rounded-md text-center mb-3">
                                        <button type="submit"
                                            class="w-full bg-secondary text-white rounded-md px-6 py-3 font-semibold hover:bg-opacity-90 transition shadow-md">
                                            Add to Cart
                                        </button>
                                    </form>

                                @else
                                    <!-- GUEST -->
                                    {{-- BELI SEKARANG → ke form guest --}}
                                    <form action="{{ route('tiket.guest.form', $tickets->id) }}" method="GET" class="mb-3">
                                        <input type="number" name="quantity" value="1" min="1" max="{{ $tickets->quota }}"
                                            class="w-full p-2 border rounded-md text-center mb-3">
                                        <button type="submit"
                                            class="w-full bg-primary text-white rounded-md px-6 py-3 font-semibold hover:bg-opacity-90">
                                            Beli Sekarang
                                        </button>
                                    </form>
                                    {{-- ADD TO CART → perlu login --}}
                                    <a href="{{ route('login') }}"
                                    class="block w-full bg-gray-200 text-gray-600 text-center rounded-md px-6 py-3 font-semibold hover:bg-gray-300 transition">
                                        Login untuk memasukkan ke keranjang
                                    </a>
                                @endif
                            @endif
                        </div>
                    @endforeach
                    </div>

                <!-- Info Tambahan -->
                <div class="mt-6 p-4 bg-blue-50 rounded-md border border-blue-100">
                    <div class="flex items-start gap-3">
                        <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"/>
                        </svg>
                        <div class="text-sm text-blue-800">
                            <p class="font-semibold mb-1">Informasi Penting:</p>
                            <ul class="space-y-1 text-blue-700">
                                <li>• Tiket tidak dapat direfund</li>
                                <li>• Harap datang 15 menit lebih awal</li>
                                <li>• Tunjukkan e-tickets saat masuk</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
</body>
</html>
