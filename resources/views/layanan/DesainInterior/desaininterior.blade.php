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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.1/font/bootstrap-icons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
</head>

<style>
:root {
    --main-color: #FAF6F2 ;
}
    
.scrolling-wrapper {
overflow-x: auto;
justify-content: center;
}

.scrolling-wrapper .card {
width: 250px; /* ukuran kartu tetap */
margin-right: 1rem;
flex: 0 0 auto;
}

.scrolling-container {
display: flex;
padding: 1rem 0;
}

.card-img-top {
height: 180px;
object-fit: cover;
}

#hero {
padding-top: 25px;
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

body {
    display: flex;
    flex-direction: column;
    min-height: 100vh;
    background-color: transparent;
    overflow-x: hidden;
    width: 100%;
    margin: 0;
    padding: 0;
}

.nav-container {
    width: 100%;
    background: #fff;
    padding: 1rem;
    display: flex;
    justify-content: center;
    box-sizing: border-box;
    justify-content: center;
    align-items: center; 
}


.tabs {
    display: flex;
    list-style: none;
    background-color: #FC6736;
    border-radius: 5px;
    width: 100%;
    position: relative;
    justify-content: space-between;
}

.tab-item {
    flex: 1;
    text-align: center;
    min-width: 100px;
}

.tab-btn {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 100%;
    padding: 15px 5px;
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 14px;
    font-weight: 500;
    color: #ffffff;
    transition: all 0.3s ease;
    position: relative;
    outline: none;
}

.tab-btn:hover {
    color: #ff7e00;
}

.tab-btn.active {
    color: #0c2d57;
}

.tab-btn i {
    font-size: 22px;
    margin-bottom: 5px;
}

.content-section {
    width: 100%;
    background: #FAF6F2;
    padding: 30px;
    display: none;
    flex: 1;
    min-height: calc(100vh - 80px);
}

.content-section.active {
    display: block;
}

.content-section h2 {
    color: #ff7e00;
    margin-bottom: 20px;
    font-size: 32px;
    padding-bottom: 10px;
    text-align: center;
}

.content-section p {
    color: #555;
    line-height: 1.6;
    margin-bottom: 15px;
}

.content-section .image-placeholder {
    width: 100%;
    height: 40vh;
    background-color: #f0f0f0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #aaa;
    margin: 20px 0;
}

@media (max-width: 600px) {
    .tab-btn {
        font-size: 12px;
    }
    
    .tab-btn i {
        font-size: 18px;
    }
    
    .content-section {
        padding: 20px;
        margin-top: 70px;
        min-height: calc(100vh - 70px);
    }
}

@keyframes fadeSlideUp {
  from {
    opacity: 0;
    transform: translateY(30px);
  }
  to {
    opacity: 1;
    transform: translateY(0);
  }
}
</style>

<body>
@include('header')

<section class="min-h-screen flex items-center justify-center px-6 lg:px-16 py-12">
    <div class="max-w-7xl w-full grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
        
        <!-- Content Section -->
        <div class="slide-in-left space-y-8">
            <!-- Badge -->
            <div class="inline-flex items-center px-4 py-2 bg-amber-100 rounded-full text-amber-800 text-sm font-medium">
                <span class="w-2 h-2 bg-amber-600 rounded-full mr-2"></span>
                Solusi Desain Terpercaya
            </div>
            
            <!-- Main Heading -->
            <h1 class="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight text-shadow">
                Desain Interior & 
                <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-600 to-orange-500">
                    Arsitektur
                </span> 
                <br>Modern
            </h1>
            
            <!-- Description -->
            <p class="text-xl text-gray-600 leading-relaxed max-w-xl">
                Wujudkan hunian impian Anda dengan perpaduan estetika, fungsionalitas, dan inovasi. Tim profesional kami siap mewujudkan ruang yang menggambarkan karakter dan kenyamanan Anda.
            </p>
            
            <!-- Features List -->
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-gray-700">
                <div class="flex items-center space-x-3">
                    <div class="w-5 h-5 bg-amber-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs">✓</span>
                    </div>
                    <span>Konsultasi Gratis</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-5 h-5 bg-amber-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs">✓</span>
                    </div>
                    <span>Desain 3D Realistis</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-5 h-5 bg-amber-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs">✓</span>
                    </div>
                    <span>Garansi Kepuasan</span>
                </div>
                <div class="flex items-center space-x-3">
                    <div class="w-5 h-5 bg-amber-600 rounded-full flex items-center justify-center">
                        <span class="text-white text-xs">✓</span>
                    </div>
                    <span>Tim Berpengalaman</span>
                </div>
            </div>
            
            <!-- CTA Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 pt-4">
                <button onclick="showPortfolio()" class="group bg-gradient-to-r from-amber-600 to-orange-500 text-white px-8 py-4 rounded-2xl text-lg font-semibold shadow-xl hover:shadow-2xl transition-all duration-300 transform hover:scale-105 glow-effect">
                    <span class="flex items-center justify-center">
                        🎨 Lihat Portofolio
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                        </svg>
                    </span>
                </button>
                <button onclick="showConsultation()" class="group border-2 border-gray-300 text-gray-800 px-8 py-4 rounded-2xl text-lg font-semibold hover:border-amber-600 hover:text-amber-600 transition-all duration-300 transform hover:scale-105">
                    <span class="flex items-center justify-center">
                        💬 Konsultasi Gratis
                        <svg class="w-5 h-5 ml-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"></path>
                        </svg>
                    </span>
                </button>
            </div>
            
            <!-- Stats -->
            <div class="grid grid-cols-3 gap-6 pt-8 border-t border-gray-200">
                <div class="text-center">
                    <div class="text-3xl font-bold text-amber-600">500+</div>
                    <div class="text-sm text-gray-600">Proyek Selesai</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-amber-600">15+</div>
                    <div class="text-sm text-gray-600">Tahun Pengalaman</div>
                </div>
                <div class="text-center">
                    <div class="text-3xl font-bold text-amber-600">98%</div>
                    <div class="text-sm text-gray-600">Kepuasan Klien</div>
                </div>
            </div>
        </div>

        <!-- Visual Section -->
        <div class="slide-in-right relative">
            <!-- Main Image Container -->
            <div class="relative floating-animation">
                <div class="aspect-w-4 aspect-h-5 rounded-3xl overflow-hidden shadow-2xl bg-gradient-to-br from-amber-50 to-orange-50 p-8">
                    <!-- Logo/Brand Placeholder -->
                    <div class="flex items-center justify-center h-full">
                        <div class="text-center space-y-6">
                            <!-- Modern Logo Design -->
                            <div class="w-32 h-32 mx-auto bg-gradient-to-br from-amber-600 to-orange-500 rounded-3xl flex items-center justify-center shadow-xl">
                                <div class="text-white text-4xl font-bold">H</div>
                            </div>
                            <div class="space-y-2">
                                <h3 class="text-2xl font-bold text-gray-800">HALUIN</h3>
                                <p class="text-amber-600 font-medium">Interior & Architecture</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Decorative Elements -->
                <div class="absolute -top-6 -left-6 w-24 h-24 rounded-full bg-gradient-to-br from-amber-400 to-orange-400 opacity-20 blur-xl"></div>
                <div class="absolute -bottom-8 -right-8 w-32 h-32 rounded-full bg-gradient-to-br from-orange-400 to-red-400 opacity-15 blur-2xl"></div>
            </div>
            
            <!-- Floating Cards -->
            <div class="absolute -left-8 top-1/4 bg-white rounded-2xl shadow-xl p-4 transform rotate-3 hover:rotate-0 transition-transform duration-300">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center">
                        <span class="text-green-600 text-lg">🏠</span>
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-gray-800">Residential</div>
                        <div class="text-xs text-gray-500">Modern Living</div>
                    </div>
                </div>
            </div>
            
            <div class="absolute -right-8 bottom-1/4 bg-white rounded-2xl shadow-xl p-4 transform -rotate-3 hover:rotate-0 transition-transform duration-300">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center">
                        <span class="text-blue-600 text-lg">🏢</span>
                    </div>
                    <div>
                        <div class="text-sm font-semibold text-gray-800">Commercial</div>
                        <div class="text-xs text-gray-500">Office Design</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="bg-[#FAF6F2]">
    <div class="nav-container bg-[#FAF6F2]">
        <ul class="tabs">
            <div class="indicator"></div>
            <li class="tab-item">
                <button class="tab-btn active" data-tab="kitchen">
                    <i class="fas fa-kitchen-set"></i>
                    Kitchen Set
                </button>
            </li>
            <li class="tab-item">
                <button class="tab-btn" data-tab="backdrop">
                    <i class="fas fa-image"></i>
                    Backdrop
                </button>
            </li>
            <li class="tab-item">
                <button class="tab-btn" data-tab="bedroom">
                    <i class="fas fa-bed"></i>
                    Bedroom Set
                </button>
            </li>
            <li class="tab-item">
                <button class="tab-btn" data-tab="accessories">
                    <i class="fas fa-couch"></i>
                    Accessories
                </button>
            </li>
            <li class="tab-item">
                <button class="tab-btn" data-tab="design">
                    <i class="fas fa-pencil-ruler"></i>
                    Design Only
                </button>
            </li>
        </ul>
    </div>

    <!-- Content Sections -->
    <div id="kitchen" class="content-section active" >
        <section class="price-section" style="background-color: #FAF6F2;">
            <h2 class="price-title"></i>KITCHEN SET</h2>
            <img src="https://sosialita.id/assets/uploads/webp/fotoproduk/crop/fg0bxOVB20240305154836.jpeg.webp" 
            class="card-img-top" 
            alt="Kitchen Set" 
            style="border: 5px solid #ccc; border-radius: 5px; margin-bottom: 20px;"><div class="price-card">
            <div class="package">
                <h3 class="silver">PAKET SILVER</h3>
                <ul>
                    <li>Material Blockboard</li>
                    <li>Finishing dalam Blockmin</li>
                    <li>Finishing luar HPL CARTA (Wood/Solid)</li>
                    <li>Aksesoris Standard</li>
                </ul>
                </div>
                <div class="price">
                    <span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>
                    IDR. 2,3 Juta <span>/m&sup1;</span>
                </div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="gold">PAKET GOLD</h3>
                <ul>
                    <li>Material Blockboard</li>
                    <li>Finishing dalam Blockmin</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Premium</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 2,5 Juta<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="platinum">PAKET PLATINUM</h3>
                <ul>
                    <li>Material Plywood</li>
                    <li>Finishing dalam Plymin / Full HPL</li>
                    <li>Finishing luar HPL AICA/Duco (Wood/Solid)</li>
                    <li>Aksesoris Premium - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 3,2 Juta<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            
            <div class="add-ons">
                <h2>add ons</h2>
                <div class="table-section">
                <h4>TOP TABLE</h4>
                <ul>
                    <li>Granit / Marmer <strong>2.1jt - 2.7jt/m&sup2;</strong></li>
                    <li>Solid Surface <strong>1.9jt - 2.2jt/m&sup2;</strong></li>
                    <li>Tough Top AICA <strong>1.5jt/m&sup2;</strong></li>
                    <li>HPL <strong>700rb/m&sup2;</strong></li>
                </ul>
                </div>
                <div class="table-section">
                <h4>BACKSPLASH</h4>
                <ul>
                    <li>Granit / Marmer <strong>2.1jt - 2.7jt/m&sup2;</strong></li>
                    <li>Solid Surface <strong>1.9jt - 2.2jt/m&sup2;</strong></li>
                    <li>Tough Top AICA <strong>1.5jt/m&sup2;</strong></li>
                    <li>Keramik <strong>900rb/m&sup2; - 1.5jt/m&sup2;</strong></li>
                </ul>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
                </div>
            </div>
        </section>
    </div>

    <div id="backdrop" class="content-section">
        <section class="price-section" style="background-color: #FAF6F2;">
            <h2 class="price-title">Backdrop</h2>
            <img src="https://img.mbizmarket.co.id/products/thumbs/800x800/2021/07/19/cc70fb666340653cf14337bda05fb759.jpg" 
            class="card-img-top" 
            alt="Backdrop" 
            style="border: 5px solid #ccc; border-radius: 5px; margin-bottom: 20px;"><div class="price-card">
            <div class="package">
                <h3 class="silver">PAKET SILVER</h3>
                <ul>
                    <li>Material Blockboard</li>
                    <li>Finishing dalam Blockmin</li>
                    <li>Finishing luar HPL CARTA (Wood/Solid)</li>
                    <li>Aksesoris Standard</li>
                    <li>Desain Small</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 1,8 Juta <span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="gold">PAKET GOLD</h3>
                <ul>
                    <li>Material Blockboard</li>
                    <li>Finishing dalam Blockmin</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Premium</li>
                    <li>Desain Medium/li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 2,5 Juta<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="platinum">PAKET PLATINUM</h3>
                <ul>
                    <li>Material Plywood</li>
                    <li>Finishing dalam Plymin / Full HPL</li>
                    <li>Finishing luar HPL AICA/Duco (Wood/Solid)</li>
                    <li>Aksesoris Premium - Ultimate</li>
                    <li>Desain High</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 2,8 Juta<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </section>
    </div>

    <div id="bedroom" class="content-section">
        <section class="price-section" style="background-color: #FAF6F2;">
            <h2 class="price-title">BEDROOM SET</h2>
            <img src="https://www.arjuna.co.id/sites/default/files/images/furniture-set/bedroom-set/ruang-dtlpkumplitjpg-sets-show.jpg"
            class="card-img-top" 
            alt="Bedroom Set" 
            style="border: 5px solid #ccc; border-radius: 5px; margin-bottom: 20px;"><div class="price-card">
            <div class="package">
                <h3 class="normal_set">DIPAN</h3>
                <ul>
                    <li>Material Blockboard/Plywood</li>
                    <li>Finishing dalam Blockmin/Plymin/HPL</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 2,3 JUTA <span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">WARDROBE</h3>
                <ul>
                    <li>Material Blockboard/Plywood</li>
                    <li>Finishing dalam Blockmin/Plymin/HPL</li>
                    <li>Finishing luar HPL TACO (Wood/Solid) / Cermin</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 2,7 Juta<span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">MEJA RIAS</h3>
                <ul>
                    <li>Material Blockboard/Plywood</li>
                    <li>Finishing dalam Blockmin/Plymin/HPL</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 1,8 Juta<span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">SIDE TABLE/NAKAS</h3>
                <ul>
                    <li>Material Blockboard/Plywood</li>
                    <li>Finishing dalam Blockmin/Plymin/HPL</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 1,7 Juta<span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </section>
    </div>

    <div id="accessories" class="content-section">
        <section class="price-section" style="background-color: #FAF6F2;">
            <h2 class="price-title">ACCESORIES</h2>
            <img src="https://foyr.com/learn/wp-content/uploads/2022/01/importance-of-accessories-in-interior-design.jpg"
            class="card-img-top" 
            alt="accessories" 
            style="border: 5px solid #ccc; border-radius: 5px; margin-bottom: 20px;"><div class="price-card">
            <div class="package">
                <h3 class="normal_set">LACI</h3>
                <ul>
                    <li>Material Blockboard/Plywood</li>
                    <li>Finishing dalam Blockmin/Plymin/HPL</li>
                    <li>Finishing luar HPL TACO (Wood/Solid)</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 300 RIBU <span>/laci;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">LED STRIPS</h3>
                <ul>
                    <li>Alumunium Frame (Rulam)</li>
                    <li>Huben / Taco / Brand Standard</li>
                    <li>Aksesoris Standard - Ultimate</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 150 RIBU<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">MOULDING</h3>
                <ul>
                    <li>Kayu</li>
                    <li>List Gold</li>
                    <li>PVC</li>
                    <li>Gypsum</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 80-200 RIBU<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">WALL/DOOR/WINDOW/CAT</h3>
                <ul>
                    <li>Material Cat Standard-Ultimate</li>
                    <li>Finishing Doff/Matte/Glossy</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 175 RIBU<span>/m&sup1;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </section>
    </div>

    <div id="design" class="content-section">
        <section class="price-section" style="background-color: #FAF6F2;">
            <h2 class="price-title">DESIGN ONLY</h2>
            <img src="https://masteredukasi.com/wp-content/uploads/2022/12/sketchup.jpg" class="card-img-top" alt="Design Only"
            class="card-img-top" 
            alt="Design Only" 
            style="border: 5px solid #ccc; border-radius: 5px; margin-bottom: 20px;"><div class="price-card">
            <div class="package">
                <h3 class="normal_set">JASA GAMBAR ARSITEKTUR</h3>
                <ul>
                    <li>Denah</li>
                    <li>Tampak</li>
                    <li>MEP (Mechanical, Electrical, Plumbing)</li>
                    <li>Render IMG (menyesuaikan ruangan utama)</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 120-180 RIBU <span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>

            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">JASA GAMBAR DESAIN INTERIOR</h3>
                <ul>
                    <li>Konsep</li>
                    <li>Denah</li>
                    <li>Tampak</li>
                    <li>Potongan</li>
                    <li>MEP (Mechanical, Electrical, Plumbing)</li>
                    <li>Render IMG (menyesuaikan ruangan utama)</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 100-240 RIBU<span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
            <div class="price-card">
                <div class="package">
                <h3 class="normal_set">JASA GAMBAR CUSTOM FURNITURE</h3>
                <ul>
                    <li>Konsep</li>
                    <li>Tampak</li>
                    <li>Potongan</li>
                    <li>Render IMG (menyesuaikan ruangan utama)</li>
                </ul>
                </div>
                <div class="price"><span style="font-weight: normal; font-size: 18px; color: #746d69;">Start from</span>IDR. 100-150 RIBU<span>/m&sup2;</span></div>
                <button type="button" class="btn btn-primary">Pesan Sekarang</button>
            </div>
        </section>
    </div>
</section>

<section style="background-color: #FAF6F2;">
    <div class="text-center my-4">
        <button type="button" class="btn btn-outline-danger">KATALOG DESAIN</button>
    </div>
</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    const tabs = document.querySelectorAll('.tab-btn');
    const indicator = document.querySelector('.indicator');
    const contentSections = document.querySelectorAll('.content-section');
    
    function setIndicator(element) {
        const index = Array.from(tabs).indexOf(element);
        indicator.style.transform = `translateX(${index * 100}%)`;
    }
    
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            // Update active tab
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            setIndicator(tab);
            
            // Show corresponding content
            const tabId = tab.getAttribute('data-tab');
            contentSections.forEach(section => {
                section.classList.remove('active');
                if (section.id === tabId) {
                    section.classList.add('active');
                }
            });
        });
    });
</script>


    @include('footer')
</body>

</html>