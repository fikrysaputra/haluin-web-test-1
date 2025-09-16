<!DOCTYPE html>
<html lang="en"> 

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Haluin</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<style>
:root {
    --main-color: #FC6736;
    --secondary-color: #FFA07A;
    --light-color: #FFF3EE;
    --dark-color: #333333;
}    
section {
    padding: 5rem 2rem;
}
.section-title {
    text-align: center;
    margin-bottom: 3rem;
}
.section-title h2 {
    font-size: 2.5rem;
    color: var(--navy);
    margin-bottom: 1rem;
}
.section-title .underline {
    height: 4px;
    width: 80px;
    background-color: var(--orange);
    margin: 0 auto;
}
.underline-1 {
    width: 100px;
    height: 10px;  /* ketebalan garis */
    background-color: #FC6736; /* warna underline */
    margin: 0 auto; /* agar di tengah secara horizontal */
}
.feature-card {
    height: 100%;
    min-height: 450px; /* atur sesuai kebutuhan */
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}
.feature-card .card-body {
    flex: 1;
    display: flex;
    flex-direction: column;
}
.row > [class*='col-'] {
    display: flex;
    flex-direction: column;
}
.card-img-fixed {
    height: 300px;
    object-fit: cover;
    width: 100%;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
}
.img-fit {
  object-fit: cover;
  object-position: center;
  display: block;
}
.header {
    text-align: center;
    margin-bottom: 50px;
}
.header h1 {
    color: #FC6736;
    font-size: 2.5rem;
    margin-bottom: 15px;
    font-weight: 700;
}
.header p {
    color: #77777;
    font-size: 1.1rem;
}
ul.dot-list {
    list-style-type: disc;
    padding-left: 20px;
}
body {
    font-family: 'Poppins', sans-serif;
    scroll-behavior: smooth;
}
.service-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 10px 20px rgba(12, 45, 87, 0.2);
}
.service-card {
    transition: all 0.3s ease;
}
.btn-primary {
    transition: all 0.3s ease;
}
.btn-primary:hover {
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(252, 103, 54, 0.4);
}
.nav-link {
    position: relative;
}
.nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -2px;
    left: 0;
    background-color: #FC6736;
    transition: width 0.3s ease;
}
.nav-link:hover::after {
    width: 100%;
}
</style>

<body>
    @include('header')

    <!-- Hero Section -->
    <section id="home" class="pt-28 md:pt-32 pb-16 md:pb-24 bg-[#FAF6F2]">
    <div class="container mx-auto px-6 flex flex-col md:flex-row items-center md:items-start">
        <div class="md:w-1/2 text-left mb-12 md:mb-0">
            <p><img src="{{ asset('image/wordmarklogo.png') }}" alt="Haluin Logo" style="height: 100px; width: auto;"></p>
            <h1 class="text-3xl md:text-4xl lg:text-5xl font-bold text-[#FC6736] leading-tight mb-6">
                MAU EKSPEKTASI DESAINMU TERWUJUD ?
            </h1>
            <p class="text-lg md:text-xl text-[#0c2d57] mb-8">
                SINI <span style="color: #FC6736;">HALUIN</span> AJA DULU, SEMUA AKAN TERWUJUD !
            </p>
            <div class="flex flex-wrap justify-start gap-4">
                <a href="#contact" class="no-underline btn-primary bg-peach text-white font-medium py-3 px-8 rounded-[10px] inline-block">
                    Hubungi Kami
                </a>
                <a href="#services" class="no-underline border-2 border-[#0c2d57] text-[#0c2d57] font-medium py-3 px-8 rounded-[10px] inline-block hover:bg-black hover:text-[#FC6736] transition duration-300">
                    Layanan Kami
                </a>
            </div>
        </div>
        <div class="md:w-1/2">
        <img src="{{ asset('image/hero_home.png') }}" alt="Haluin Logo"
                                class="img-fit rounded w-100 h-100";
                                style="box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);"/>
        </div>
    </div>
    </section>

    <!-- Keunggulan Section -->
    <section id="services" class="py-20 bg-[#FAF6F2]">
    <div class="max-w-6xl mx-auto px-4">
        <h2 class="text-3xl font-bold text-center text-[#0c2d57] mb-12">KENAPA HARUS <span class="text-peach">KAMI</span> ?</h2>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Card 1 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col items-center text-center hover:shadow-xl transition duration-300">
            <div class="bg-[#0c2d57] w-16 h-16 flex items-center justify-center rounded-full mb-4">
            <i class="fas fa-user-tie text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-[#0c2d57]">Dikerjakan Profesional oleh Ahlinya Sesuai Bidangnya</h3>
        </div>

        <!-- Card 2 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col items-center text-center hover:shadow-xl transition duration-300">
            <div class="bg-[#0c2d57] w-16 h-16 flex items-center justify-center rounded-full mb-4">
            <i class="fas fa-award text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-[#0c2d57]">Kualitas Terbaik</h3>
        </div>

        <!-- Card 3 -->
        <div class="bg-white rounded-xl shadow-sm p-6 flex flex-col items-center text-center hover:shadow-xl transition duration-300">
            <div class="bg-[#0c2d57] w-16 h-16 flex items-center justify-center rounded-full mb-4">
            <i class="fas fa-lightbulb text-white text-2xl"></i>
            </div>
            <h3 class="text-lg font-semibold text-[#0c2d57]">Mewujudkan Ekspektasi Anda</h3>
        </div>
        </div>
    </div>
    </section>

    <!-- Services Section -->
    <section id="layanan" class="py-20 bg-gray-50">
        <div class="container mx-auto px-4">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">LAYANAN <span class="text-peach">KAMI</span></h2>
                <div class="w-20 h-1 bg-peach mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">
                    Kami menawarkan berbagai layanan profesional untuk Anda
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Service 1 -->
                <a href="/desain-interior" class="no-underline block bg-white p-6 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:scale-105 transform flex flex-col items-center text-center cursor-pointer">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSo1CfzKdRZtCgTH20_IonbMuoXhJrn8KL07g&s" alt="Desain Interior" class="w-full h-48 object-cover rounded-md mb-4">
                    <div class="text-peach text-4xl mb-4">
                        <i class="fas fa-home"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-[#0c2d57]">Desain Interior & Arsitektur</h3>
                    <span class="text-peach font-medium flex items-center">
                        Lihat Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </a>

                <!-- Service 2 -->
                <a href="/teknologi-digital" class="no-underline block bg-white p-6 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:scale-105 transform flex flex-col items-center text-center cursor-pointer">
                    <img src="https://youngontop.com/wp-content/uploads/2024/08/Evolution-of-Coding-scaled-1.jpg" alt="Digital Teknologi" class="w-full h-48 object-cover rounded-md mb-4">
                    <div class="text-peach text-4xl mb-4">
                        <i class="fas fa-laptop-code"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-[#0c2d57]">Digital Teknologi</h3>
                    <span class="text-peach font-medium flex items-center">
                        Lihat Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </a>

                <!-- Service 3 -->
                <a href="/desain-grafis" class="no-underline block bg-white p-6 rounded-lg shadow-sm transition duration-300 hover:shadow-md hover:scale-105 transform flex flex-col items-center text-center cursor-pointer">
                    <img src="https://trainingkomputer.co.id/wp-content/uploads/2024/09/grafis3.jpg" alt="Desain Grafis" class="w-full h-48 object-cover rounded-md mb-4">
                    <div class="text-peach text-4xl mb-4">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3 class="text-xl font-semibold mb-2 text-[#0c2d57]">Desain Grafis</h3>
                    <span class="text-peach font-medium flex items-center">
                        Lihat Selengkapnya <i class="fas fa-arrow-right ml-2"></i>
                    </span>
                </a>
            </div>
        </div>
    </section>

    <!-- About Us Section -->
    <section id="tentang" class="py-20">
        <div class="container mx-auto px-4">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="md:w-1/2">
                    <img src="{{ asset('image/caplogo.png') }}" alt="Haluin Logo" style="height: auto; width: auto;">
                </div>
                <div class="md:w-1/2">
                    <h2 class="text-3xl md:text-4xl font-bold mb-4">Tentang <span class="text-peach">Kami</span></h2>
                    <div class="w-20 h-1 bg-peach mb-6"></div>
                    <p class="text-gray-600 mb-6">
                        Haluin adalah sebuah agency kreatif yang hadir untuk membantu mewujudkan ide-ide 
                        Anda menjadi kenyataan. Kami menyediakan layanan lengkap dan profesional, termasuk jasa desain, pengembangan teknologi, 
                        dan instalasi. Dengan berfokus pada detail, estetika, serta kualitas, kami siap mendukung proyek Anda dari awal hingga selesai.
                        Sebagai perusahaan baru, kami memahami bahwa langkah awal adalah kunci. Kami memiliki semangat, dedikasi, dan inovasi tanpa batas.
                        Kami percaya bahwa setiap proyek adalah peluang untuk menciptakan karya terbaik, membangun kepercayaan, dan menghadirkan nilai yang nyata bagi klien kami.
                    </p>
                    <div class="grid grid-cols-2 gap-4 mb-8">
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-peach mr-2"></i>
                            <span>Tim Profesional</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-peach mr-2"></i>
                            <span>Mewujudkan Ekspektasi</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-peach mr-2"></i>
                            <span>Kualitas Terjamin</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-check-circle text-peach mr-2"></i>
                            <span>Dukungan Tiap Waktu</span>
                        </div>
                    </div>
                    <a href="/tentang-kami" class="bg-[#FC6736] no-underline text-[#fff] font-medium py-3 px-8 rounded-[10px] inline-block hover:bg-black hover:text-[#FC6736] transition duration-300">
                        Kenali Kami Lebih Dekat
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Workflow -->
    <section id="workflow" style="background-color: #FAF6F2;">
        <div class="container">
            <div class="header">
                <h1 class="display-4" style="font-size: 2rem;">Workflow</h1>
                <p class="lead" style="font-size: 1rem;">Alur kerja kami dalam mewujudkan desain Impian Anda.</p>
            </div>
            
            <div class="workflow-container">
                <!-- Center line -->
                <div class="center-line"></div>
                
                <!-- Step 1 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">1</div>
                    <div class="row align-items-center">
                        <div class="col-md-6 img-side">
                            <div class="img-holder ">
                                <i class="fas fa-comments" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Konsultasi</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Deskripsikan kebutuhan project impian</li>
                                    <li>kondisi eksisting/lokasi</li>
                                    <li>Preview ukuran ruang serta foto dan video</li>
                                    <li>kondisi eksisting/lokasi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 2 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">2</div>
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-file-contract" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Surat Penawaran + Penawaran Desain</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Membuat estimasi Biaya</li>
                                    <li>Penawaran Konsep Desain</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Step 3 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">3</div>
                    <div class="row align-items-center">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-search" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Visit Survey</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Melakukan pengukuran ulang dan cek kondisi eksisting/lokasi</li>
                                    <li>Pembayaran booking fee 5% dari harga total project</li>
                                    <li>Booking fee mengurangi total biaya project</li>
                                    <li>Jika project dibatalkan booking fee akan dialihkan ke jasa desain</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 4 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">4</div>
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-cubes" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Design 3D + Revisi</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Jika ada perubahan dari penawaran design sebelumnya diharapkan tidak merubah total desain. Jika itu terjadi akan ada perubahan harga total project tersebut.</li>
                                    <li>Maksimal revisi sebanyak 3x (tiga kali)</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 5 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">5</div>
                    <div class="row align-items-center">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-handshake" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Deal (DP 50%)</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Apabila revisi design sudah tidak ada perubahan dan disetujui oleh kostumer</li>
                                    <li>Down payment 50% dari harga total project</li>
                                    <li>dibuatkan gambar kerja, untuk kebutuhan produksi</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 6 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">6</div>
                    <div class="row align-items-center flex-row-reverse">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-hammer" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Produksi</h3>
                                <p style="font-size: 0.9rem;">Proses produksi di Workshop kurang lebih dalam waktu 2 - 4 minggu , tergantung dengan desain serta banyaknya projek</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Step 7 -->
                <div class="workflow-step" style="margin-bottom: 20px;">
                    <div class="circle-connector"></div>
                    <div class="step-number" style="font-size: 1.5rem;">7</div>
                    <div class="row align-items-center">
                        <div class="col-md-6 img-side">
                            <div class="img-holder">
                                <i class="fas fa-truck-loading" style="font-size: 2rem; color: #fff;"></i>
                            </div>
                        </div>
                        <div class="col-md-6 content-side">
                            <div class="step-content">
                                <h3 class="step-title" style="font-size: 1.25rem;">Instalasi</h3>
                                <ul class="dot-list" style="font-size: 0.9rem;">
                                    <li>Setelah produksi selesai, selanjutnya akan melakukan proses instalasi di lokasi</li>
                                    <li>Sebelum Instalasi, melakukan pelunasan 45% terlebih dahulu dari harga total project</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-20 bg-[#FAF6F2] text-[#0c2d57]]">
        <div class="container mx-auto px-4 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Siap Untuk Memulai Proyek Anda?</h2>
            <p class="text-xl mb-12 max-w-2xl mx-auto">
                Beri tahu kami tentang proyek Anda dan mari wujudkan visi kreatif Anda bersama tim profesional kami.
            </p>
            <a href="" class="bg-[#FC6736] no-underline text-[#fff] font-medium py-3 px-10 rounded-[10px] inline-block hover:bg-black hover:text-[#FC6736] transition duration-300">
                Hubungi Kami Sekarang
            </a>
        </div>
    </section>
    
    <!-- Contact Section -->
    <section id="contact" class="py-20">
         <div class="container mx-auto max-w-4xl px-2">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold mb-4">Hubungi <span class="text-peach">Kami</span></h2>
                <div class="w-20 h-1 bg-peach mx-auto mb-6"></div>
                <p class="text-lg max-w-2xl mx-auto text-gray-600">
                    Ada pertanyaan atau ingin memulai proyek? Hubungi kami atau kirim pesan melalui formulir di bawah ini.
                </p>
            </div>
            
            <div class="flex flex-col md:flex-row gap-12">
                <div class="md:w-1/2">
                    <div class="bg-gray-50 p-8 rounded-lg h-full">
                        <h3 class="text-2xl font-semibold mb-6">Informasi Kontak</h3>
                        
                        <div class="space-y-6">
                            <div class="flex items-start">
                                <div class="text-peach text-xl mr-4">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Alamat</h4>
                                    <p class="text-gray-600">
                                        Jl. Jendral Sudirman No.81, Sukamentri, Kec. Garut Kota, Kabupaten Garut, Jawa Barat 44116
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="text-peach text-xl mr-4">
                                    <i class="fas fa-phone-alt"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Telepon</h4>
                                    <p class="text-gray-600">
                                        0811-1115-0201
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="text-peach text-xl mr-4">
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Email</h4>
                                    <p class="text-gray-600">
                                        haluin.service@gmail.com
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex items-start">
                                <div class="text-peach text-xl mr-4">
                                    <i class="fas fa-clock"></i>
                                </div>
                                <div>
                                    <h4 class="font-semibold mb-1">Jam Kerja</h4>
                                    <p class="text-gray-600">
                                        Senin - Jumat: 09:00 - 17:00 <br>
                                        Sabtu: 09:00 - 13:00
                                    </p>
                                </div>
                            </div>
                        </div>
 
                        <div class="mt-8">
                            <h4 class="font-semibold mb-4">Ikuti Kami</h4>
                            <div class="flex space-x-4">
                                <a href="https://web.facebook.com/profile.php?id=61575972325146" class="w-10 h-10 bg-dark-blue text-white flex items-center justify-center rounded-full hover:bg-peach transition duration-300 no-underline">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://www.instagram.com/haluiners/" class="w-10 h-10 bg-dark-blue text-white flex items-center justify-center rounded-full hover:bg-peach transition duration-300 no-underline">
                                    <i class="fab fa-instagram"></i>
                                </a>
                                <a href="https://www.tiktok.com/@haluiners" class="w-10 h-10 bg-dark-blue text-white flex items-center justify-center rounded-full hover:bg-peach transition duration-300 no-underline">
                                    <i class="fab fa-tiktok"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="md:w-1/2">
                    <form class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="name" class="block text-gray-700 mb-2">Nama Lengkap</label>
                                <input type="text" id="name" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-peach">
                            </div>
                            <div>
                                <label for="email" class="block text-gray-700 mb-2">Email</label>
                                <input type="email" id="email" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-peach">
                            </div>
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-700 mb-2">Subjek</label>
                            <input type="text" id="subject" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-peach">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Pesan</label>
                            <textarea id="message" rows="5" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-peach"></textarea>
                        </div>
                        <button type="submit" class="cta-button bg-peach text-white px-6 py-4 rounded-[15px] font-semibold transition duration-300 inline-block w-full md:w-auto">
                            Kirim Pesan
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            'peach': '#FC6736',
            'dark-blue': '#0c2d57',
          },
          fontFamily: {
            'poppins': ['Poppins', 'sans-serif'],
          },
        }
      }
    }
    </script>
        @include('footer')
</body>

</html>