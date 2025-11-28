<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Desain Interior</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
  .gradient-bg {
      background: linear-gradient(135deg, #FC6736 0%, #FF9468 100%);
  }
  
  .blur-circle {
      filter: blur(100px);
      opacity: 0.6;
  }
  
  @keyframes float {
      0% { transform: translateY(0px) rotate(0deg); }
      50% { transform: translateY(-20px) rotate(5deg); }
      100% { transform: translateY(0px) rotate(0deg); }
  }
  
  .clip-diagonal {
      clip-path: polygon(0 0, 100% 0, 100% 85%, 0 100%);
  }

  .service-card {
      transition: all 0.4s ease;
      border-radius: 12px;
  }
  
  .service-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
  }
  
  .portfolio-item {
      overflow: hidden;
      border-radius: 12px;
      transition: all 0.4s ease;
  }
  
  .portfolio-item:hover {
      transform: scale(1.03);
  }
</style>

<body>
    @include('header')

    <!-- Hero Section -->
    <section class="relative overflow-hidden bg-[#FAF6F2] h-[70vh] flex items-center">
      <!-- Hero Content -->
      <div class="container mx-auto px-6 py-24 md:py-32 flex flex-col md:flex-row items-center relative z-10">
        <!-- Text Content -->
        <div class="md:w-1/2 mb-16 md:mb-0 md:pr-10">
          <h1 class="text-4xl md:text-6xl font-bold mb-6 text-gray-800 leading-tight">
            <span class="block">Solusi Digital</span>
            <span class="block text-[#FC6736]">untuk Era Modern</span>
          </h1>
          <p class="text-xl text-gray-600 mb-8">
            Jelajahi inovasi teknologi yang dirancang untuk mengubah pengalaman digital Anda secara luar biasa.
          </p>
          <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-4">
            <button class="bg-[#FC6736] text-white font-semibold py-4 px-8 rounded-[5px] shadow-md hover:shadow-xl transform hover:-translate-y-1 transition duration-300">
              Konsultasi Sekarang
            </button>
            <button class="bg-white text-[#FC6736] border-2 border-[#FC6736] font-semibold py-4 px-8 rounded-[5px] shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300">
              Pelajari Layanan
            </button>
          </div>
        </div>

        <!-- Image Content -->
        <div class="md:w-1/2 relative">
          <div class="bg-white backdrop-blur-lg rounded-2xl shadow-2xl p-6 transition-transform duration-500 hover:scale-105">
            <img 
              src="{{ asset('image/wordmarklogo.png') }}" 
              alt="Futuristic Device" 
              class="w-auto h-full object-contain rounded-lg transition duration-300 hover:shadow-lg"
            />
            <div class="mt-6 flex justify-between items-center px-2">
              <div>
                <h3 class="text-xl font-bold text-gray-800">Digital Teknologi</h3>
              </div>
              <div class="w-12 h-12 rounded-full bg-[#FC6736] flex items-center justify-center shadow-lg hover:scale-110 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section id="services" class="py-20 bg-white">
      <div class="container mx-auto px-6">
        <div class="text-center mb-16">
          <h2 class="text-3xl md:text-4xl font-bold mb-6">Layanan Digital Kami</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Solusi teknologi komprehensif untuk memenuhi kebutuhan digital bisnis Anda dengan pendekatan inovatif dan terkini.
          </p>
          <div class="section-title mx-auto"></div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          <!-- Service -->
          <div class="service-card bg-white p-8 shadow-lg rounded-2xl">
            <div class="text-[#FC6736] mb-4">
              <i class="fas fa-code text-4xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-4 text-[#FC6736]">Pengembangan Website</h3>
            <p class="text-gray-600 mb-4">
              Website responsif dengan desain kustom, optimasi SEO, dan solusi e-commerce yang meningkatkan kehadiran online Anda.
            </p>
            <div class="border-t border-gray-200 pt-4 mt-4">
              <p class="font-semibold text-gray-800">Mulai dari</p>
              <p class="text-[#FC6736] text-2xl font-bold">Rp 8.500.000</p>
              <ul class="mt-3 space-y-2 text-sm text-gray-600">
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Desain Kustom</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Responsif Mobile</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Optimasi SEO</li>
              </ul>
            </div>
          </div>

            <!-- Service -->
            <div class="service-card bg-white p-8 shadow-lg rounded-2xl">
            <div class="text-[#FC6736] mb-4">
              <i class="fas fa-code text-4xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-4 text-[#FC6736]">Pengembangan Website</h3>
            <p class="text-gray-600 mb-4">
              Website responsif dengan desain kustom, optimasi SEO, dan solusi e-commerce yang meningkatkan kehadiran online Anda.
            </p>
            <div class="border-t border-gray-200 pt-4 mt-4">
              <p class="font-semibold text-gray-800">Mulai dari</p>
              <p class="text-[#FC6736] text-2xl font-bold">Rp 8.500.000</p>
              <ul class="mt-3 space-y-2 text-sm text-gray-600">
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Desain Kustom</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Responsif Mobile</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Optimasi SEO</li>
              </ul>
            </div>
          </div>

                    <!-- Service -->
                    <div class="service-card bg-white p-8 shadow-lg rounded-2xl">
            <div class="text-[#FC6736] mb-4">
              <i class="fas fa-code text-4xl"></i>
            </div>
            <h3 class="text-xl font-bold mb-4 text-[#FC6736]">Pengembangan Website</h3>
            <p class="text-gray-600 mb-4">
              Website responsif dengan desain kustom, optimasi SEO, dan solusi e-commerce yang meningkatkan kehadiran online Anda.
            </p>
            <div class="border-t border-gray-200 pt-4 mt-4">
              <p class="font-semibold text-gray-800">Mulai dari</p>
              <p class="text-[#FC6736] text-2xl font-bold">Rp 8.500.000</p>
              <ul class="mt-3 space-y-2 text-sm text-gray-600">
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Desain Kustom</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Responsif Mobile</li>
                <li class="flex items-center"><i class="fas fa-check text-[#FC6736] mr-2"></i>Optimasi SEO</li>
              </ul>
            </div>
          </div>


        </div>
      </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Portofolio Kami</h2>
                <p class="text-gray-600 max-w-2xl mx-auto">Berbagai proyek terbaik yang telah kami kerjakan untuk klien dari berbagai industri.</p>
                <div class="section-title mx-auto"></div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Portfolio Item 1 -->
                <div class="portfolio-item shadow-lg">
                    <img src="https://jessup.edu/wp-content/uploads/2024/01/Is-Web-Development-Oversaturated.jpg" alt="Web App Project" class="w-full h-56 object-cover">
                    <div class="p-6 bg-white">
                        <h3 class="text-xl font-bold mb-2">Fintech Dashboard</h3>
                        <p class="text-gray-600 mb-4">Sistem dashboard keuangan dengan visualisasi data real-time untuk perusahaan fintech terkemuka.</p>
                        <span class="text-sm text-[#FC6736] font-medium">Web Application</span>
                    </div>
                </div>

                <!-- Portfolio Item 2 -->
                <div class="portfolio-item shadow-lg">
                    <img src="https://jessup.edu/wp-content/uploads/2024/01/Is-Web-Development-Oversaturated.jpg" alt="Mobile App Project" class="w-full h-56 object-cover">
                    <div class="p-6 bg-white">
                        <h3 class="text-xl font-bold mb-2">HealthConnect</h3>
                        <p class="text-gray-600 mb-4">Aplikasi mobile kesehatan yang menghubungkan pasien dengan dokter untuk konsultasi jarak jauh.</p>
                        <span class="text-sm text-[#FC6736] font-medium">Mobile App</span>
                    </div>
                </div>

                <!-- Portfolio Item 3 -->
                <div class="portfolio-item shadow-lg">
                    <img src="https://jessup.edu/wp-content/uploads/2024/01/Is-Web-Development-Oversaturated.jpg" alt="E-commerce Project" class="w-full h-56 object-cover">
                    <div class="p-6 bg-white">
                        <h3 class="text-xl font-bold mb-2">FashionStore</h3>
                        <p class="text-gray-600 mb-4">Platform e-commerce fashion dengan fitur AR untuk mencoba produk secara virtual.</p>
                        <span class="text-sm text-[#FC6736] font-medium">E-commerce</span>
                    </div>
                </div>
            </div>

            <div class="text-center mt-12">
                <a href="#" class="text-[#FC6736] font-medium hover:text-[#e55a2b] transition duration-300">Lihat Semua Proyek <i class="fas fa-arrow-right ml-2"></i></a>
            </div>
        </div>
    </section>

<script>
</script>
    @include('footer')
</body>

</html>