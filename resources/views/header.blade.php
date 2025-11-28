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
            <a href="/event-menarik" class="block px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition no-underline">Event/Acara</a>
          </div>
        </div>

        <a href="/katalog" class="text-black no-underline hover:text-peach transition">Galeri</a>
        <a href="/tentang-kami" class="text-black no-underline hover:text-peach transition">Tentang Kami</a>
        <a href="#contact" class="text-black no-underline hover:text-peach transition">Kontak</a>
        @auth
          <div class="relative inline-block text-left">
              <!-- Tombol utama -->
              <button id="userDropdownButton" 
                  class="flex items-center gap-2 bg-background px-4 py-2 rounded-md">
                  
                  <!-- Icon Avatar -->
                  <div class="w-8 h-8 bg-[#FC6736] rounded-md flex items-center justify-center">
                      <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                          <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"/>
                      </svg>
                  </div>

                  <!-- Nama User -->
                  <span class="text-secondary font-medium">{{ Auth::user()->name ?? 'User' }}</span>

                  <!-- Panah Dropdown -->
                  <svg id="dropdownArrow" class="w-4 h-4 text-secondary transition-transform duration-200" fill="none" stroke="currentColor" stroke-width="2"
                      viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                  </svg>
              </button>

              <!-- Dropdown Menu -->
              <div id="userDropdownMenu" 
                  class="absolute right-0 mt-2 w-48 bg-white shadow-md rounded-md ring-1 ring-black ring-opacity-5 hidden z-50">
                  <a href="/dashboard"
                    class="block px-4 py-2 text-sm no-underline text-gray-700 hover:bg-peach hover:text-white transition rounded-md">
                    Dashboard
                  </a>
                  <form action="/logout" method="POST">
                      @csrf
                      <button type="submit"
                          class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-peach hover:text-white transition rounded-md">
                          Keluar Akun
                      </button>
                  </form>
              </div>
          </div>

          <script>
              const userButton = document.getElementById('userDropdownButton');
              const userMenu = document.getElementById('userDropdownMenu');
              const arrow = document.getElementById('dropdownArrow');

              userButton.addEventListener('click', () => {
                  userMenu.classList.toggle('hidden');
                  arrow.classList.toggle('rotate-180');
              });

              // Tutup dropdown jika klik di luar
              document.addEventListener('click', (e) => {
                  if (!userButton.contains(e.target) && !userMenu.contains(e.target)) {
                      userMenu.classList.add('hidden');
                      arrow.classList.remove('rotate-180');
                  }
              });
          </script>

        @else
            <a href="/login" class="text-black no-underline hover:text-peach transition font-bold">
                Login
            </a>
        @endauth
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
  @if(!Auth::check())
      <script>
          document.getElementById('preloader').style.display = 'none';
      </script>
  @endif


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
    window.addEventListener("load", function() {
        const loader = document.getElementById("preloader");

        loader.classList.add("opacity-0");
        loader.classList.add("pointer-events-none");

        setTimeout(() => {
            loader.style.display = "none";
        }, 500); // transisi 0.5 detik
    });
  </script>
  @endpush

  @stack('scripts')
</body>
</html>