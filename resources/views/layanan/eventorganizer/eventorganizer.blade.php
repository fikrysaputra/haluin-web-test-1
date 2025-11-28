<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Event Menarik</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-[#FAF6F2]">
    @include('header')

    <!-- Hero Section with Background Image & Slider -->
    <section class="relative py-10 bg-cover bg-center" 
             style="background-image: linear-gradient(rgba(12, 45, 87, 0.85), rgba(12, 45, 87, 0.85)), url('{{ asset('image/kajian.png') }}');">
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 right-0 w-64 h-64 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary/10 rounded-full blur-3xl"></div>
        <div class="container mx-auto flex flex-col md:flex-row items-center px-6 gap-12 relative z-10">
            
            <!-- Kiri: teks hero -->
            <div class="md:w-1/2 space-y-6 text-white">
                <h1 class="text-5xl md:text-6xl font-bold leading-tight drop-shadow-lg">
                    Temukan Event Kajian Islam <span class="text-primary drop-shadow-lg">Favoritmu</span>
                </h1>
                <p class="text-white/90 text-lg drop-shadow">
                    Pilih tiket VIP atau Reguler untuk menghadiri event yang kamu sukai. Tingkatkan pemahaman agama bersama ustadz terbaik.
                </p>
                <a href="#semua" class="inline-block bg-[#FC6736] text-white px-8 py-3 rounded-lg hover:bg-opacity-90 transition shadow-md font-medium hover:shadow-xl transform hover:scale-105">
                    Lihat Semua Event
                </a>
            </div>

            <!-- Kanan: Fixed Single Card -->
            <div class="md:w-1/2 flex justify-center">
                @php
                    $nearestEvent = $events->sortBy('start_date')->first();
                @endphp
                @if($nearestEvent)
                <div class="w-full max-w-xs px-2">
                    <div class="bg-white rounded-md shadow-xl overflow-hidden hover:shadow-2xl transition-all duration-300">
                        <div class="relative aspect-[3/4] overflow-hidden">
                            <span class="absolute top-2 left-2 bg-[#FC6736] text-white text-xs font-semibold px-3 py-1 rounded-md shadow-md">
                                Featured
                            </span>
                            <img src="{{ asset('images/' . $nearestEvent->thumbnail) }}"
                                 alt="{{ $nearestEvent->name }}"
                                 class="w-full h-full object-cover hover:scale-110 transition duration-500">
                        </div>
                        <div class="p-3">
                            <h2 class="font-bold text-lg text-secondary mb-2 line-clamp-2 hover:text-primary transition">
                                {{ $nearestEvent->name }}
                            </h2>
                            @if($nearestEvent->artists && $nearestEvent->artists->count() > 0)
                                <div class="text-xs text-gray-700 mb-2">
                                    <span class="font-semibold text-primary">Pengisi Acara:</span>
                                    {{ $nearestEvent->artists->pluck('name')->join(', ') }}
                                </div>
                            @else
                                <div class="text-xs text-gray-500 mb-2 italic">
                                    Belum ada daftar pengisi acara.
                                </div>
                            @endif
                            <div class="flex items-center text-gray-500 text-xs mb-3 bg-background rounded-md px-2 py-1">
                                {{ $nearestEvent->start_date->format('d M Y') }}
                            </div>
                            <a href="{{ route('event.show', $nearestEvent->id) }}"
                               class="no-underline block w-full text-center bg-[#FC6736] text-white px-4 py-2 rounded-md hover:bg-opacity-90 transition font-semibold shadow-md hover:shadow-lg transform hover:scale-[1.02] text-sm">
                                Beli Tiket Sekarang
                            </a>
                        </div>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </section>

    <!-- Search -->
    <section class="py-6 bg-[#FAF6F2]">
        <div class="container mx-auto px-4">
            <div class="max-w-2xl mx-auto relative">
                <input type="text"
                       placeholder="Cari event kajian..."
                       id="search"
                       class="w-full pl-12 pr-4 py-4 border-2 border-gray-200 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#FC6736]">
            </div>
        </div>
    </section>

    <!-- Event Section -->
    <section id="semua" class="py-12 bg-[#FAF6F2]">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-2 lg:grid-cols-5 gap-6">
                @foreach($events as $event)
                <div class="group bg-white rounded-xl shadow-md overflow-hidden max-w-[260px] mx-auto">
                    <div class="relative aspect-[3/4] w-full overflow-hidden">
                        <img src="{{ asset('images/' . $event->thumbnail) }}" class="w-full h-full object-cover">
                    </div>
                    <div class="p-4">
                        <h3 class="font-bold text-lg text-[#0c2d57] mb-2 leading-snug">
                            {{ $event->name }}
                        </h3>
                        <div class="flex items-center text-gray-500 text-xs mb-2">
                            <svg class="w-4 h-4 mr-2 text-[#FC6736]" fill="currentColor">
                                <path fill-rule="evenodd"
                                    d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1z" />
                            </svg>
                            {{ $event->start_date->format('d M Y, H:i') }}
                        </div>
                        <p class="text-gray-600 text-xs mb-3 leading-relaxed">
                            {{ \Illuminate\Support\Str::limit($event->description, 80) }}
                        </p>
                        <div class="flex flex-wrap items-start gap-1.5 mb-3">
                            @foreach($event->artists as $artist)
                                <div class="flex items-center bg-[#f6f6f6] px-2 py-1 rounded-md">
                                    <div class="w-5 h-5 bg-[#FC6736] rounded-md flex items-center justify-center mr-2">
                                        <svg class="w-3 h-3 text-white" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"/>
                                        </svg>
                                    </div>
                                    <span class="text-xs text-gray-700 font-medium">{{ $artist->name }}</span>
                                </div>
                            @endforeach
                        </div>
                        <a href="{{ route('event.show', $event->id) }}"
                           class="no-underline bg-[#FC6736] text-white px-4 py-2 rounded-md hover:bg-opacity-90 shadow-md block w-fit text-sm">
                            Beli Tiket
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    @include('footer')

</body>
</html>
