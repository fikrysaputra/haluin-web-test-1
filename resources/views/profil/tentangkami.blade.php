<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Tentang Kami</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<style>
</style>

<body>
    <!-- Header -->
    @include('header')

    <!-- Section Tentang Kami -->
    <section id="about-us" class="about-section bg-[#FAF6F2]">
        <div class="container bg-[#FAF6F2]">
            <h1 class="section-title">Tentang Kami</h1>
            <p class="section-subtitle">Kenalan dengan Haluin</p>

            <div class="content">
                <div class="text-content">
                    <h2>Siapa Kami?</h2>
                    <p class="justify-text">
                        Haluin adalah sebuah agency kreatif yang hadir untuk membantu mewujudkan ide-ide Anda menjadi kenyataan.
                        Kami menyediakan layanan lengkap dan profesional, termasuk jasa desain, pengembangan teknologi, dan instalasi.
                        Dengan berfokus pada detail, estetika, serta kualitas, kami siap mendukung proyek Anda dari awal hingga selesai.
                        Sebagai perusahaan baru, kami memahami bahwa langkah awal adalah kunci.
                        Kami memiliki semangat, dedikasi, dan inovasi tanpa batas.
                        Kami percaya bahwa setiap proyek adalah peluang untuk menciptakan karya terbaik, membangun kepercayaan, dan menghadirkan nilai yang nyata bagi klien kami.
                    </p>

                    <h2>Layanan Kami</h2>
                    <p>
                        <ul>
                            <li>Desain Interior & Furniture</li>
                            <li>Desain Produk</li>
                            <li>Desain Grafis</li>
                            <li>Desain Arsitektur</li>
                            <li>Digital Teknologi</li>
                            <li>Photograpghy</li>
                        </ul>
                    </p>

                    <h2>Visi Kami</h2>
                    <p>
                        Menjadi agency kreatif dan teknis yang mampu memberikan solusi inovatif, berkualitas, dan memberikan dampak positif bagi setiap klien.
                    </p>

                    <h2>Misi Kami</h2>
                    <ul>
                        <li>Memberikan layanan yang profesional, transparan, dan berorientasi pada kebutuhan klien</li>
                        <li>Mengembangkan solusi kreatif yang memenuhi standar estetika dan fungsionalitas</li>
                        <li>Berinovasi untuk mengikuti perkembangan teknologi dan tren desain</li>
                        <li>Berkontribusi pada perkembangan industri kreatif dan teknologi melalui karya-karya inspiratif</li>
                    </ul>

                    <h2>Kenapa Haluin ?</h2>
                    <ul>
                        <li>Komitmen Penuh: Kami bekerja keras untuk memberikan hasil terbaik pada setiap proyek.</li>
                        <li>Solusi: Setiap layanan kami dirancang khusus untuk memenuhi kebutuhan klien.</li>
                        <li>Inovasi Tanpa Batas: Kami selalu menghadirkan ide-ide segar dan kreatif.</li>
                        <li>Kualitas : Memberikan hasil proyek yang berkualitas demi kebutuhan dan kepuasan klien</li>
                    </ul>
                </div>

                <div class="image-content">
                    <img src="{{ asset('image/logokotak.jpg') }}" alt="Tentang Kami" class="about-image">
                </div>
            </div>
        </div>
    </section>

  <!-- Team Section -->
  <section id="team" class="py-16">
    <div class="max-w-6xl mx-auto px-6">
      <!-- Title -->
      <div class="text-center mb-12">
        <h1 class="text-3xl md:text-4xl font-bold text-slate-900 tracking-tight">TIM KAMI</h1>
        <p class="text-slate-600 text-lg max-w-2xl mx-auto">
          Bertemu dengan tim profesional kami yang berdedikasi untuk memberikan layanan terbaik
        </p>
      </div>

    <!-- Grid Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
                <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
                <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
                <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
                <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
                <!-- Card 1 -->
        <article class="group bg-white rounded-md overflow-hidden shadow-sm ring-1 ring-slate-900/5 hover:shadow-glow transition-all duration-300 flex flex-col">
            <div class="relative w-full aspect-[3/4] overflow-hidden">
                <!-- Foto dari assets -->
                <div
                    class="absolute inset-0 bg-center bg-cover"
                    data-photo
                    style="background-image: url('{{ asset('image/fikry.jpg') }}');"
                ></div>
                <!-- Overlay gradient -->
                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-black/10 to-transparent"></div>
            </div>

            <div class="p-6 md:p-7 flex flex-col gap-1">
                <h3 class="text-xl font-bold text-brand-600 tracking-tight">FIKRY</h3>
                <p class="text-sm text-slate-600">Digital Teknologi</p>
            </div>
        </article>
    </div>

    </div>
  </section>


    <!-- Footer -->
    @include('footer')
</body>
</html>
