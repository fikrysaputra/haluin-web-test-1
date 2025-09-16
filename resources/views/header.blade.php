<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet" />

  <!-- Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            peach: '#FC6736',
            'dark-blue': '#0c2d57',
          },
          fontFamily: {
            poppins: ['Poppins', 'sans-serif'],
          },
        },
      },
    };
  </script>

  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
</head>

<body class="font-poppins bg-white text-black">
  <!-- Header -->
<header class="sticky top-0 z-50 bg-white shadow-sm border-l border-r border-gray-200">
  <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
      <a href="/" class="flex items-center space-x-2">
        <img src="{{ asset('image/wordmarklogo.png') }}" alt="Haluin Logo" class="h-8 w-auto" />
      </a>
      <div class="hidden md:flex space-x-6 items-center relative">
        <a href="/" class="text-black no-underline hover:text-peach transition">Beranda</a>

        <!-- Dropdown Fitur -->
        <div class="relative group">
          <button id="fiturDropdownButton" class="text-black no-underline hover:text-peach transition flex items-center gap-1">
            Fitur
            <svg id="fiturArrow" class="w-4 h-4 transition-transform duration-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
            </svg>
          </button>
          <div id="fiturDropdownMenu" class="absolute left-0 mt-2 w-56 rounded-md shadow-lg bg-white ring-1 ring-black ring-opacity-5 hidden z-50">
            <a href="/desain-interior" class="block px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition no-underline">Desain Interior & Arsitektur</a>
            <a href="/teknologi-digital" class="block px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition no-underline">Digital Teknologi</a>
            <a href="/desain-grafis" class="block px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition no-underline">Desain Grafis</a>
            <a href="/digital-teknologi" class="block px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition no-underline">Digital Teknologi</a>
          </div>
        </div>

        <a href="/katalog" class="text-black no-underline hover:text-peach transition">Galeri</a>
        <a href="/tentang-kami" class="text-black no-underline hover:text-peach transition">Tentang Kami</a>
        <a href="#contact" class="text-black no-underline hover:text-peach transition">Kontak</a>
      </div>

      <!-- Mobile Menu Button -->
      <div class="md:hidden">
        <button id="mobile-menu-button" class="text-2xl text-black focus:outline-none">
          <i class="fas fa-bars"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Mobile Menu -->
  <div id="mobile-menu" class="md:hidden hidden px-4 pb-4 space-y-2">
    <a href="#" class="block text-black no-underline hover:text-peach">Beranda</a>
    <a href="#" class="block text-black no-underline hover:text-peach">Fitur</a>
    <a href="#" class="block text-black no-underline hover:text-peach">Galeri</a>
    <a href="#" class="block text-black no-underline hover:text-peach">Kontak</a>
  </div>
</header>


  <!-- Preloader -->
  <div id="preloader" class="fixed inset-0 bg-white flex items-center justify-center z-50 transition-opacity duration-500">
    <img src="{{ asset('image/preloader.png') }}" alt="Loading" class="w-16 h-16 animate-pulse preloader-image" />
  </div>

  <!-- Scripts -->
  <script>
    document.getElementById('mobile-menu-button').addEventListener('click', function () {
      const menu = document.getElementById('mobile-menu');
      menu.classList.toggle('hidden');
    });

    const fiturBtn = document.getElementById('fiturDropdownButton');
    const fiturMenu = document.getElementById('fiturDropdownMenu');
    const fiturArrow = document.getElementById('fiturArrow');

    fiturBtn.addEventListener('click', (e) => {
      e.preventDefault();
      fiturMenu.classList.toggle('hidden');
      fiturArrow.classList.toggle('rotate-180');
    });

    document.addEventListener('click', function (e) {
      if (!fiturBtn.contains(e.target) && !fiturMenu.contains(e.target)) {
        fiturMenu.classList.add('hidden');
        fiturArrow.classList.remove('rotate-180');
      }
    });
  </script>

  @push('scripts')
  <script>
    document.addEventListener("DOMContentLoaded", function () {
      const preloader = document.getElementById('preloader');
      if (preloader) {
        preloader.style.opacity = '0';
        setTimeout(() => {
          preloader.style.display = 'none';
        }, 500);
      }
    });
  </script>
  @endpush

  @stack('scripts')
</body>
</html>
