<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Interior Design</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#F3F4F6'
                    }
                }
            }
        }
    </script>
    <style>
        .floating-nav {
            position: fixed;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            z-index: 50;
        }
        
        .nav-menu {
            transition: all 0.3s ease;
        }
        
        .nav-menu.hidden {
            opacity: 0;
            transform: translateX(-100%);
        }
        
        .nav-menu.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .card-content {
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        
        .card-text {
            word-wrap: break-word;
            overflow-wrap: break-word;
            hyphens: auto;
        }
        
        .price-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 1.5rem;
        }
        
        @media (min-width: 768px) {
            .price-grid-3 {
                grid-template-columns: repeat(3, 1fr);
            }
            
            .price-grid-4 {
                grid-template-columns: repeat(4, 1fr);
            }
        }
        
        .content-section {
            scroll-margin-top: 2rem;
        }
        
        .card-title {
            min-height: 3rem;
            display: flex;
            align-items: center;
        }
        
        .card-list {
            min-height: 120px;
        }
        
        .card-price {
            min-height: 60px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
                .nav-item {
            color: #6b7280;
        }
        .nav-item:hover {
            background-color: #fef3c7;
            color: #0c2d57;
        }
        .nav-item.active {
            background-color: #0c2d57;
            color: white;
        }
        .content-section {
            display: none;
        }
        .content-section.active {
            display: block;
        }
    </style>
</head>
<body class="min-h-screen bg-gray-50">
    @include('header')

<div class="flex min-h-screen bg-gray-50">

    <!-- Sidebar -->
    <aside class="w-64 bg-[#faf6f2] flex-shrink-0">
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-[#0c2d57] rounded-xl flex items-center justify-center">
                    <i class="fas fa-home text-white"></i>
                </div>
                <span class="text-xl font-bold text-gray-800">Interior Design</span>
            </div>
        </div>

        <!-- Menu -->
        <nav class="p-4 space-y-2">
            <button onclick="showSection('kitchen', this)" class="nav-item w-full text-left px-4 py-3 rounded-lg transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-utensils w-5"></i>
                <span>Kitchen Set</span>
            </button>
            <button onclick="showSection('backdrop', this)" class="nav-item w-full text-left px-4 py-3 rounded-lg transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-tv w-5"></i>
                <span>Backdrop</span>
            </button>
            <button onclick="showSection('bedroom', this)" class="nav-item w-full text-left px-4 py-3 rounded-lg transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-bed w-5"></i>
                <span>Bedroom</span>
            </button>
            <button onclick="showSection('accessories', this)" class="nav-item w-full text-left px-4 py-3 rounded-lg transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-puzzle-piece w-5"></i>
                <span>Accessories</span>
            </button>
            <button onclick="showSection('design', this)" class="nav-item w-full text-left px-4 py-3 rounded-lg transition-all duration-300 flex items-center space-x-3">
                <i class="fas fa-drafting-compass w-5"></i>
                <span>Design</span>
            </button>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">

    <!-- Main Content -->
    <div class="pl-4 pr-4 py-8">
        <!-- Kitchen Set Section -->
        <div id="kitchen" class="content-section mb-16">
            <section class="max-w-6xl mx-auto p-8 rounded-lg" style="background-color: #FAF6F2;">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">KITCHEN SET</h2>
                <img 
                    src="https://sosialita.id/assets/uploads/webp/fotoproduk/crop/fg0bxOVB20240305154836.jpeg.webp" 
                    class="w-full max-w-md mx-auto mb-8 rounded-lg border-4 border-gray-300" 
                    alt="Kitchen Set"
                />
                
                <div class="price-grid price-grid-3 mb-8">
                    <!-- Silver Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-gray-600 border-b-2 border-gray-300 pb-2">PAKET SILVER</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard</li>
                                        <li>• Finishing dalam Blockmin</li>
                                        <li>• Finishing luar HPL CARTA (Wood/Solid)</li>
                                        <li>• Aksesoris Standard</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 2,3 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Gold Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-amber-600 border-b-2 border-amber-300 pb-2">PAKET GOLD</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard</li>
                                        <li>• Finishing dalam Blockmin</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Premium</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 2,5 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Platinum Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-purple-600 border-b-2 border-purple-300 pb-2">PAKET PLATINUM</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Plywood</li>
                                        <li>• Finishing dalam Plymin / Full HPL</li>
                                        <li>• Finishing luar HPL AICA/Duco (Wood/Solid)</li>
                                        <li>• Aksesoris Premium - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 3,2 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add-ons Section -->
                <div class="bg-white rounded-lg p-6 shadow-lg">
                    <h2 class="text-2xl font-bold mb-6 text-gray-800 uppercase">Add Ons</h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h4 class="text-lg font-semibold mb-4 text-gray-700">TOP TABLE</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li>Granit / Marmer <strong>2.1jt - 2.7jt/m²</strong></li>
                                <li>Solid Surface <strong>1.9jt - 2.2jt/m²</strong></li>
                                <li>Tough Top AICA <strong>1.5jt/m²</strong></li>
                                <li>HPL <strong>700rb/m²</strong></li>
                            </ul>
                        </div>
                        <div>
                            <h4 class="text-lg font-semibold mb-4 text-gray-700">BACKSPLASH</h4>
                            <ul class="space-y-2 text-sm text-gray-700">
                                <li>Granit / Marmer <strong>2.1jt - 2.7jt/m²</strong></li>
                                <li>Solid Surface <strong>1.9jt - 2.2jt/m²</strong></li>
                                <li>Tough Top AICA <strong>1.5jt/m²</strong></li>
                                <li>Keramik <strong>900rb/m² - 1.5jt/m²</strong></li>
                            </ul>
                        </div>
                    </div>
                    <button class="mt-6 bg-blue-600 hover:bg-blue-700 text-white py-2 px-6 rounded-lg transition-colors font-medium">
                        Pesan Sekarang
                    </button>
                </div>
            </section>
        </div>

        <!-- Backdrop Section -->
        <div id="backdrop" class="content-section mb-16">
            <section class="max-w-6xl mx-auto p-8 rounded-lg" style="background-color: #FAF6F2;">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">BACKDROP</h2>
                <img 
                    src="https://img.mbizmarket.co.id/products/thumbs/800x800/2021/07/19/cc70fb666340653cf14337bda05fb759.jpg" 
                    class="w-full max-w-md mx-auto mb-8 rounded-lg border-4 border-gray-300" 
                    alt="Backdrop"
                />
                
                <div class="price-grid price-grid-3">
                    <!-- Silver Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-gray-600 border-b-2 border-gray-300 pb-2">PAKET SILVER</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard</li>
                                        <li>• Finishing dalam Blockmin</li>
                                        <li>• Finishing luar HPL CARTA (Wood/Solid)</li>
                                        <li>• Aksesoris Standard</li>
                                        <li>• Desain Small</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 1,8 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Gold Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-amber-600 border-b-2 border-amber-300 pb-2">PAKET GOLD</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard</li>
                                        <li>• Finishing dalam Blockmin</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Premium</li>
                                        <li>• Desain Medium</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 2,5 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Platinum Package -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-xl font-semibold text-purple-600 border-b-2 border-purple-300 pb-2">PAKET PLATINUM</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Plywood</li>
                                        <li>• Finishing dalam Plymin / Full HPL</li>
                                        <li>• Finishing luar HPL AICA/Duco (Wood/Solid)</li>
                                        <li>• Aksesoris Premium - Ultimate</li>
                                        <li>• Desain High</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-2xl font-bold text-gray-800">IDR. 2,8 Juta <span class="text-base font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Bedroom Set Section -->
        <div id="bedroom" class="content-section mb-16">
            <section class="max-w-6xl mx-auto p-8 rounded-lg" style="background-color: #FAF6F2;">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">BEDROOM SET</h2>
                <img 
                    src="https://www.arjuna.co.id/sites/default/files/images/furniture-set/bedroom-set/ruang-dtlpkumplitjpg-sets-show.jpg" 
                    class="w-full max-w-md mx-auto mb-8 rounded-lg border-4 border-gray-300" 
                    alt="Bedroom Set"
                />
                
                <div class="price-grid price-grid-4">
                    <!-- Dipan -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">DIPAN</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard/Plywood</li>
                                        <li>• Finishing dalam Blockmin/Plymin/HPL</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 2,3 JUTA <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Wardrobe -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">WARDROBE</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard/Plywood</li>
                                        <li>• Finishing dalam Blockmin/Plymin/HPL</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid) / Cermin</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 2,7 Juta <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Meja Rias -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">MEJA RIAS</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard/Plywood</li>
                                        <li>• Finishing dalam Blockmin/Plymin/HPL</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 1,8 Juta <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Side Table/Nakas -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">SIDE TABLE/NAKAS</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard/Plywood</li>
                                        <li>• Finishing dalam Blockmin/Plymin/HPL</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 1,7 Juta <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Accessories Section -->
        <div id="accessories" class="content-section mb-16">
            <section class="max-w-6xl mx-auto p-8 rounded-lg" style="background-color: #FAF6F2;">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">ACCESSORIES</h2>
                <img 
                    src="https://foyr.com/learn/wp-content/uploads/2022/01/importance-of-accessories-in-interior-design.jpg" 
                    class="w-full max-w-md mx-auto mb-8 rounded-lg border-4 border-gray-300" 
                    alt="Accessories"
                />
                
                <div class="price-grid price-grid-4">
                    <!-- Laci -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">LACI</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Blockboard/Plywood</li>
                                        <li>• Finishing dalam Blockmin/Plymin/HPL</li>
                                        <li>• Finishing luar HPL TACO (Wood/Solid)</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 300 RIBU <span class="text-sm font-normal">/laci</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- LED Strips -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">LED STRIPS</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Alumunium Frame (Rulam)</li>
                                        <li>• Huben / Taco / Brand Standard</li>
                                        <li>• Aksesoris Standard - Ultimate</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 150 RIBU <span class="text-sm font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Moulding -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">MOULDING</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Kayu</li>
                                        <li>• List Gold</li>
                                        <li>• PVC</li>
                                        <li>• Gypsum</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 80-200 RIBU <span class="text-sm font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Wall/Door/Window/Cat -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-sm font-semibold text-gray-700 border-b-2 border-gray-300 pb-2 break-all">
                                        WALL/DOOR/WINDOW/CAT
                                    </h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Material Cat Standard-Ultimate</li>
                                        <li>• Finishing Doff/Matte/Glossy</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 175 RIBU <span class="text-sm font-normal">/m¹</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Design Only Section -->
        <div id="design" class="content-section mb-16">
            <section class="max-w-6xl mx-auto p-8 rounded-lg" style="background-color: #FAF6F2;">
                <h2 class="text-3xl font-bold mb-8 text-center text-gray-800">DESIGN ONLY</h2>
                <img 
                    src="https://masteredukasi.com/wp-content/uploads/2022/12/sketchup.jpg" 
                    class="w-full max-w-md mx-auto mb-8 rounded-lg border-4 border-gray-300" 
                    alt="Design Only"
                />
                
                <div class="price-grid price-grid-3">
                    <!-- Jasa Gambar Arsitektur -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">JASA GAMBAR ARSITEKTUR</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Denah</li>
                                        <li>• Tampak</li>
                                        <li>• MEP (Mechanical, Electrical, Plumbing)</li>
                                        <li>• Render IMG (menyesuaikan ruangan utama)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 120-180 RIBU <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Jasa Gambar Desain Interior -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">JASA GAMBAR DESAIN INTERIOR</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Konsep</li>
                                        <li>• Denah</li>
                                        <li>• Tampak</li>
                                        <li>• Potongan</li>
                                        <li>• MEP (Mechanical, Electrical, Plumbing)</li>
                                        <li>• Render IMG (menyesuaikan ruangan utama)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 100-240 RIBU <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Jasa Gambar Custom Furniture -->
                    <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                        <div class="card-content p-6">
                            <div class="mb-4">
                                <div class="card-title">
                                    <h3 class="text-lg font-semibold text-gray-700 border-b-2 border-gray-300 pb-2">JASA GAMBAR CUSTOM FURNITURE</h3>
                                </div>
                                <div class="card-list mt-4">
                                    <ul class="space-y-2 text-sm text-gray-700 card-text">
                                        <li>• Konsep</li>
                                        <li>• Tampak</li>
                                        <li>• Potongan</li>
                                        <li>• Render IMG (menyesuaikan ruangan utama)</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="mt-auto">
                                <div class="card-price mb-4">
                                    <span class="text-sm text-gray-600">Start from</span>
                                    <div class="text-xl font-bold text-gray-800">IDR. 100-150 RIBU <span class="text-sm font-normal">/m²</span></div>
                                </div>
                                <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg transition-colors font-medium">
                                    Pesan Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>


    </main>
</div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
        // Saat halaman pertama kali dimuat, tampilkan section Kitchen Set
        showSection('kitchen', document.querySelector('.nav-item'));
        });
        // Navigation functionality
        let isMenuOpen = false;
        let activeSection = 'kitchen';

        const menuToggle = document.getElementById('menuToggle');
        const navMenu = document.getElementById('navMenu');
        const menuIcon = document.getElementById('menuIcon');
        const closeIcon = document.getElementById('closeIcon');

        function toggleMenu() {
            isMenuOpen = !isMenuOpen;
            
            if (isMenuOpen) {
                navMenu.classList.remove('hidden');
                navMenu.classList.add('visible');
                menuIcon.classList.add('hidden');
                closeIcon.classList.remove('hidden');
            } else {
                navMenu.classList.remove('visible');
                navMenu.classList.add('hidden');
                menuIcon.classList.remove('hidden');
                closeIcon.classList.add('hidden');
            }
        }

        function scrollToSection(sectionId) {
            activeSection = sectionId;
            const element = document.getElementById(sectionId);
            if (element) {
                element.scrollIntoView({ behavior: 'smooth' });
            }
            
            // Close menu after clicking
            if (isMenuOpen) {
                toggleMenu();
            }
            
            // Update active nav item
            updateActiveNavItem(sectionId);
        }

        function updateActiveNavItem(sectionId) {
            const navItems = document.querySelectorAll('.nav-item');
            navItems.forEach(item => {
                const itemSection = item.getAttribute('data-section');
                if (itemSection === sectionId) {
                    item.classList.add('bg-blue-100', 'text-blue-700', 'border-l-4', 'border-blue-600');
                    item.classList.remove('text-gray-600', 'hover:bg-gray-100');
                } else {
                    item.classList.remove('bg-blue-100', 'text-blue-700', 'border-l-4', 'border-blue-600');
                    item.classList.add('text-gray-600', 'hover:bg-gray-100');
                }
            });
        }

        // Scroll detection
        function handleScroll() {
            const sections = ['kitchen', 'backdrop', 'bedroom', 'accessories', 'design'];
            const scrollPosition = window.scrollY + 100;

            for (const sectionId of sections) {
                const element = document.getElementById(sectionId);
                if (element) {
                    const offsetTop = element.offsetTop;
                    const offsetBottom = offsetTop + element.offsetHeight;
                    
                    if (scrollPosition >= offsetTop && scrollPosition < offsetBottom) {
                        if (activeSection !== sectionId) {
                            activeSection = sectionId;
                            updateActiveNavItem(sectionId);
                        }
                        break;
                    }
                }
            }
        }

        // Event listeners
        menuToggle.addEventListener('click', toggleMenu);
        window.addEventListener('scroll', handleScroll);

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            updateActiveNavItem(activeSection);
        });

        function showSection(sectionId) {
            // Hide all sections
            document.querySelectorAll('.content-section').forEach(section => {
                section.classList.remove('active');
            });

            // Show selected section
            document.getElementById(sectionId).classList.add('active');

            // Update active nav item
            document.querySelectorAll('.nav-item').forEach(item => {
                item.classList.remove('active');
            });
            event.target.closest('.nav-item').classList.add('active');
        }

        function toggleMobileMenu() {
            const sidebar = document.getElementById('mobile-sidebar');
            const overlay = document.getElementById('mobile-overlay');
            
            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Mobile menu button handler
        document.getElementById('mobile-menu-button').addEventListener('click', toggleMobileMenu);
    </script>
@include('footer')
</body>
</html>