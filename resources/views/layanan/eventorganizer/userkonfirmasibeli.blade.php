<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Checkout Tiket</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    
</head>

<body class="bg-[#FAF6F2] font-sans">
@include('header')

<section class="min-h-screen py-12 px-6">
    <div class="max-w-3xl mx-auto">

        <!-- Header -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-black text-[#0c2d57]">Checkout Tiket</h1>
            <p class="text-gray-600">Pastikan detail pembelian Anda benar</p>
        </div>

        <div class="bg-white rounded-lg shadow-2xl p-8">

            <!-- THUMBNAIL EVENT -->
            <div class="w-full mb-6">
                <img 
                    src="{{ $event->thumbnail_url ?? asset('image/noimage.png') }}"
                    class="w-full h-60 object-cover rounded-lg shadow"
                >
            </div>

            <!-- Informasi Akun -->
            <div class="mb-6">
                <h2 class="text-xl font-bold text-[#0c2d57] mb-4">Informasi Pembeli</h2>
                <div class="bg-[#FAF6F2] rounded-lg p-4 space-y-1">
                    <p><span class="font-bold">Username:</span> {{ auth()->user()->username }}</p>
                    <p><span class="font-bold">Nama:</span> {{ auth()->user()->name }}</p>
                    <p>
                        <span class="font-bold">Jenis Kelamin:</span> 
                        {{ auth()->user()->gender === 'male' ? 'Laki-laki' : (auth()->user()->gender === 'female' ? 'Perempuan' : '-') }}
                    </p>
                    <p><span class="font-bold">Email:</span> {{ auth()->user()->email }}</p>
                </div>
            </div>

            <!-- Form Checkout -->
            <form method="POST" action="{{ route('user_ticket.store') }}" class="space-y-6">
                @csrf
                <input type="hidden" name="ticket_id" value="{{ $ticket->id }}">

                <div>
                    <h2 class="text-xl font-bold text-[#0c2d57] mb-4">Detail Tiket</h2>
                    <div class="border-2 rounded-lg p-5 bg-[#FAF6F2] space-y-2">
                        <p><span class="font-bold">Acara:</span> {{ $event->title }}</p>
                        <p><span class="font-bold">Jenis Tiket:</span> {{ $ticket->type }}</p>
                        <p><span class="font-bold">Harga:</span> Rp {{ number_format($ticket->price, 0, ',', '.') }}</p>
                        <p><span class="font-bold">Quota Tersisa:</span> {{ $ticket->quota }}</p>
                        <p><span class="font-bold">Waktu Mulai:</span> 
                            {{ \Carbon\Carbon::parse($event->start_time)->format('d M Y H:i') }}
                        </p>
                        <p><span class="font-bold">Waktu Selesai:</span> 
                            {{ \Carbon\Carbon::parse($event->end_time)->format('d M Y H:i') }}
                        </p>

                        <!-- Pilih jumlah tiket -->
                        <div class="mt-3">
                            <label class="font-bold">Jumlah Tiket</label>
                            <input type="number" 
                                name="quantity" 
                                value="1" 
                                min="1" 
                                max="{{ $ticket->quota }}" 
                                class="w-full p-2 border rounded mt-1" 
                                required>
                        </div>
                    </div>
                </div>

                <button type="submit" 
                        class="w-full bg-[#FC6736] text-white py-4 rounded-lg font-bold text-lg hover:bg-[#e55a2d] transition">
                    BELI
                </button>
            </form>

        </div>
    </div>
</section>

</body>
</html>