<!-- Footer -->
<footer class="bg-[#0c2d57] text-white py-12">
    <div class="container mx-auto px-6 grid md:grid-cols-3 gap-10">

        <!-- Kolom 1 -->
        <div class="text-center md:text-left">
            <img src="{{ asset('image/WordmarkLogoOrange.png') }}" 
                 alt="HALUin Logo" 
                 class="mx-auto md:mx-0 h-[50px] mb-4">
            <p class="font-semibold text-lg leading-relaxed">
                HALUin Aja Dulu Semua Akan Terwujud!
            </p>
        </div>

        <!-- Kolom 2 -->
        <div class="text-center md:text-left">
            <h4 class="text-2xl font-bold mb-4">Profil</h4>
            <ul class="space-y-2">
                <li>
                    <a href="/tentang-kami" class="text-[#FC6736] hover:underline">
                        Tentang Kami
                    </a>
                </li>
                <li>
                    <a href="/#services" class="text-[#FC6736] hover:underline">
                        Layanan Kami
                    </a>
                </li>
            </ul>
        </div>

        <!-- Kolom 3 Sosial Media -->
        <div class="text-center">
            <h4 class="text-2xl font-bold mb-4">Sosial Media</h4>

            <div class="flex flex-col items-center space-y-3">

                <a href="https://instagram.com/haluiners" 
                   class="flex items-center text-[#FC6736] hover:underline">
                    <i class="fab fa-instagram text-2xl mr-3"></i>
                    <span>@haluiners</span>
                </a>

                <a href="https://wa.me/6281111150201" 
                   class="flex items-center text-[#FC6736] hover:underline">
                    <i class="fab fa-whatsapp text-2xl mr-3"></i>
                    <span>0811-1115-0201</span>
                </a>

                <a href="https://www.tiktok.com/@haluiners" 
                   class="flex items-center text-[#FC6736] hover:underline">
                    <i class="fa-brands fa-tiktok text-2xl mr-3"></i>
                    <span>Haluiners</span>
                </a>

                <a href="mailto:haluin.service@gmail.com" 
                   class="flex items-center text-[#FC6736] hover:underline">
                    <i class="fas fa-envelope text-2xl mr-3"></i>
                    <span>haluin.service@gmail.com</span>
                </a>

            </div>
        </div>

    </div>

    <p class="text-center text-white mt-10 text-sm opacity-80">
        &copy; 2024 HALUin. Semua Hak Dilindungi.
    </p>
</footer>