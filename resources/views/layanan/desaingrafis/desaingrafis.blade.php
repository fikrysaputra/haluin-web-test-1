<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Desain Interior</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
    :root {
    --main-color: #FAF6F2 ;
    }
    
    @keyframes float {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-20px); }
    }
    
    @keyframes slowSpin {
      from { transform: rotate(0deg); }
      to { transform: rotate(360deg); }
    }
    
    @keyframes fadeInDown {
      0% { opacity: 0; transform: translateY(-20px); }
      100% { opacity: 1; transform: translateY(0); }
    }

    @keyframes pulseOpacity {
      0%, 100% { opacity: 0.6; }
      50% { opacity: 0.2; }
    }
    
    .anim-float {
      animation: float 6s ease-in-out infinite;
    }
    
    .anim-spin {
      animation: slowSpin 20s linear infinite;
    }
    
    .anim-fade-in {
      animation: fadeInDown 1s ease-out forwards;
    }
    
    .anim-pulse {
      animation: pulseOpacity 4s ease-in-out infinite;
    }
    
    .delay-200 {
      animation-delay: 0.2s;
    }
    
    .delay-400 {
      animation-delay: 0.4s;
    }
    
    .delay-600 {
      animation-delay: 0.6s;
    }
    
    /* Custom colors */
    .bg-hero-base {
      background-color: #FAF6F2;
    }
    
    .text-hero-accent {
      color: #FC6736;
    }
    
    .bg-hero-accent {
      background-color: #FC6736;
    }
    
    .border-hero-accent {
      border-color: #FC6736;
    }

    .service-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }
    .service-card {
        transition: all 0.3s ease;
    }
</style>

<body>
    @include('header')

<!-- Hero -->
<section class="min-h-[70vh] flex items-center justify-center relative bg-white">
  <div class="w-full max-w-6xl mx-auto px-4 py-20 relative z-10 text-center">
    
    <!-- Corner decorations -->
    <div class="absolute top-10 left-10">
      <div class="w-20 h-20 relative">
        <div class="absolute top-0 left-0 w-2 h-10 bg-hero-accent bg-opacity-20 anim-pulse"></div>
        <div class="absolute top-0 left-0 w-10 h-2 bg-hero-accent bg-opacity-20 anim-pulse"></div>
      </div>
    </div>
    <div class="absolute top-10 right-10">
      <div class="w-20 h-20 relative">
        <div class="absolute top-0 right-0 w-2 h-10 bg-hero-accent bg-opacity-20 anim-pulse"></div>
        <div class="absolute top-0 right-0 w-10 h-2 bg-hero-accent bg-opacity-20 anim-pulse"></div>
      </div>
    </div>
    <div class="absolute bottom-10 left-10">
      <div class="w-20 h-20 relative">
        <div class="absolute bottom-0 left-0 w-2 h-10 bg-hero-accent bg-opacity-20 anim-pulse"></div>
        <div class="absolute bottom-0 left-0 w-10 h-2 bg-hero-accent bg-opacity-20 anim-pulse"></div>
      </div>
    </div>
    <div class="absolute bottom-10 right-10">
      <div class="w-20 h-20 relative">
        <div class="absolute bottom-0 right-0 w-2 h-10 bg-hero-accent bg-opacity-20 anim-pulse"></div>
        <div class="absolute bottom-0 right-0 w-10 h-2 bg-hero-accent bg-opacity-20 anim-pulse"></div>
      </div>
    </div>

    <!-- Center content -->
    <div class="relative anim-float">
      <!-- Image -->
      <h1 class="text-6xl md:text-7xl font-bold tracking-wider text-hero-accent mb-4 anim-fade-in"><img src="{{ asset('image/wordmarklogo.png') }}" alt="Desain Grafis" class="mx-auto mb-8 w-auto h-40 md:w-52 anim-fade-in" /></h1>
      <!-- Line -->
      <div class="flex justify-center items-center w-full mb-6 anim-fade-in delay-200">
        <div class="h-px w-16 bg-hero-accent bg-opacity-30"></div>
        <div class="h-1 w-24 bg-hero-accent mx-4 rounded-full"></div>
        <div class="h-px w-16 bg-hero-accent bg-opacity-30"></div>
      </div>

      <!-- Subtitle changed -->
      <p class="text-xl md:text-2xl text-gray-700 mb-8 font-light anim-fade-in delay-400">Desain Grafis</p>
    </div>

    <div class="flex justify-center">
      <button class="bg-hero-accent text-white font-medium py-3 px-8 rounded-[5px] transition duration-300 transform hover:scale-105 hover:bg-white hover:text-black hover:shadow-lg hover:-translate-y-1 anim-fade-in delay-600">
        Jelajahi
      </button>
    </div>
  </div>
</section>

<section>
  <div class="container mx-auto px-4 py-10">
    <h1 class="text-4xl font-bold text-center text-[#FC6736] mb-3">Layanan Desain Grafis Umum</h1>
    <p class="text-center text-gray-600 mb-10 max-w-2xl mx-auto">Solusi desain grafis profesional untuk semua kebutuhan branding dan visual Anda</p>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-paint-brush text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-print text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-laptop-code text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
                <!-- Card Template -->
                <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-hashtag text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>

        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-box-open text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
                <!-- Card Template -->
                <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-tshirt text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
                <!-- Card Template -->
                <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-chart-pie text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-envelope-open-text text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
        <!-- Card Template -->
        <div class="service-card bg-white rounded-lg overflow-hidden shadow-md hover:shadow-lg flex flex-col">
        <div class="bg-[#fde8e3] p-6"> 
            <div class="rounded-full bg-[#FC6736] w-16 h-16 flex items-center justify-center mx-auto">
            <i class="fas fa-book-open text-white text-2xl"></i>
            </div>
        </div>
        <div class="p-6 flex flex-col flex-1">
            <h3 class="text-xl font-bold text-[#FC6736] mb-3">Desain Logo & Identitas Brand</h3>
            <ul class="text-gray-600 space-y-2 mb-6">
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Logo utama & variasinya</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Panduan brand (brand guideline)</span>
            </li>
            <li class="flex items-start">
                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                <span>Kartu nama, kop surat, amplop</span>
            </li>
            </ul>
            <div class="mt-auto">
            <button class="w-full py-2 bg-[#FC6736] hover:bg-[#e65a2e] text-white rounded-md font-medium transition duration-300">
                Lihat Detail
            </button>
            </div>
        </div>
        </div>
    </div>
  </div>
</section>


<script>
    document.addEventListener('DOMContentLoaded', function() {
        const cards = document.querySelectorAll('.service-card');
        cards.forEach(card => {
            card.addEventListener('mouseover', function() {
                this.classList.add('scale-105');
            });
            card.addEventListener('mouseout', function() {
                this.classList.remove('scale-105');
            });
        });
    });
</script>

    @include('footer')
</body>

</html>