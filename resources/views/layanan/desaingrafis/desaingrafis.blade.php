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

        body {
        font-family: 'Inter', sans-serif;
    }
    .gradient-text {
        background: linear-gradient(135deg, #FC6736 0%, #0c2d57 100%);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
    }
    @keyframes float {
        0%, 100% { transform: translateY(0px); }
        50% { transform: translateY(-20px); }
    }

    @keyframes pulse {
        0%, 100% { opacity: 1; }
        50% { opacity: 0.7; }
    }
    .shape {
        position: absolute;
        border-radius: 50%;
        filter: blur(40px);
        opacity: 0.3;
        animation: shape-move 10s ease-in-out infinite;
    }
    @keyframes shape-move {
        0%, 100% { transform: translate(0, 0) scale(1); }
        33% { transform: translate(30px, -30px) scale(1.1); }
        66% { transform: translate(-20px, 20px) scale(0.9); }
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

<body>
    @include('header')

    <!-- Hero -->
    <section class="relative bg-[#FAF6F2] h-[70vh] flex items-center overflow-hidden">
        <!-- Decorative Shapes Background -->  
        <div class="container mx-auto px-6 py-20 relative z-10">
            <div class="flex flex-col lg:flex-row items-center gap-12">
                
                <!-- Left Content -->
                <div class="lg:w-1/2 text-left">
                    
                    <!-- Main Heading -->
                    <h1 class="text-5xl md:text-6xl lg:text-7xl font-black text-[#0c2d57] leading-tight mb-6">
                        Wujudkan Desain
                        <span class="gradient-text block">Impianmu!</span>
                    </h1>
                    
                    <!-- Subheading -->
                    <p class="text-xl md:text-2xl text-gray-600 mb-8 max-w-xl">
                        Kami mengubah ide kreatifmu menjadi karya visual yang profesional
                    </p>
                    
                    <!-- Features List -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#FC6736] bg-opacity-10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#FC6736]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-[#0c2d57] font-medium">Logo & Branding</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#FC6736] bg-opacity-10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#FC6736]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-[#0c2d57] font-medium">Social Media Design</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#FC6736] bg-opacity-10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#FC6736]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-[#0c2d57] font-medium">UI/UX Design</span>
                        </div>
                        <div class="flex items-center gap-3">
                            <div class="w-8 h-8 bg-[#FC6736] bg-opacity-10 rounded-lg flex items-center justify-center">
                                <svg class="w-5 h-5 text-[#FC6736]" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="text-[#0c2d57] font-medium">Print Design</span>
                        </div>
                    </div>
                    
                    <!-- CTA Buttons -->
                    <div class="flex flex-wrap gap-4">
                        <button class="bg-white text-[#0c2d57] border-2 border-[#0c2d57] px-4 py-2 rounded-2xl font-bold text-lg hover:bg-[#0c2d57] hover:text-white transition shadow-lg">
                            Lihat Portfolio
                        </button>
                    </div>
                    
                </div>
                
                <!-- Right Content - Visual -->
                <div class="lg:w-1/2 relative">
                    <div class="relative floating-animation">
                        <!-- Main Image Container -->
                        <div class="relative bg-white rounded-lg shadow-xl p-8">
                            <img src="https://images.unsplash.com/photo-1626785774573-4b799315345d?w=800" 
                                 alt="Design Workspace" 
                                 class="w-full rounded-lg shadow-lg">
                        </div>
                        
                        <!-- Color Palette Decoration -->
                        <div class="absolute top-1/2 -right-8 bg-white rounded-2xl shadow-xl p-3 transform translate-y-[-50%]">
                            <div class="flex flex-col gap-2">
                                <div class="w-10 h-10 bg-[#FC6736] rounded-lg"></div>
                                <div class="w-10 h-10 bg-[#0c2d57] rounded-lg"></div>
                                <div class="w-10 h-10 bg-[#FAF6F2] rounded-lg border-2 border-gray-200"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
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
            <div class="p-6 flex flex-col flex-1 bg-[#fde8e3]">
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
                <i class="fas fa-paint-brush text-white text-2xl"></i>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-1 bg-[#fde8e3]">
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
                <i class="fas fa-paint-brush text-white text-2xl"></i>
                </div>
            </div>
            <div class="p-6 flex flex-col flex-1 bg-[#fde8e3]">
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