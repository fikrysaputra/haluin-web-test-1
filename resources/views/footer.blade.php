<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        #footer {
            margin: 0;
            padding: 40px 0;
            background-color: #0c2d57;
            color: white;
            font-size: 14px;
        }

        footer {
            background-color: #0c2d57;
            color: #fff;

        }

        #footer {
            background-color: #0c2d57;
            color: white;
            text-align: center;
        }

        #footer h3,
        #footer h4 {
            font-weight: bold;
        }

        #footer a {
            color: #FC6736;
            text-decoration: none;
        }

        #footer .social-icons a {
            margin-right: 10px;
        }

        #footer .social-icons i {
            font-size: 24px;
        }

        #footer .container {
            max-width: 1200px;
        }

        #footer ul {
            list-style: none;
            padding: 0;
        }

        #footer ul li {
            margin-bottom: 10px;
        }

        #footer p {
            margin-bottom: 10px;
        }

        @media (max-width: 768px) {
            #footer .row {
                text-align: center;
            }
        }
    </style>
</head>

<body>
    <!-- Footer -->
    <footer id="footer" style="background-color: #0c2d57; color: white;">
        <div class="container">
            <div class="row">
                <!-- Column 1 -->
                <div class="col-md-4">
                    <h3 class="font-bold text-center">
                        <img src="{{ asset('image/WordmarkLogoOrange.png') }}" alt="HALUin Logo" class="mx-auto h-[50px] w-auto">
                    </h3>
                    <p><strong>HALUin Aja Dulu Semua Akan Terwujud !</strong></p>
                </div>

                <!-- Column 2 -->
                <div class="col-md-4">
                    <h4 style="font-weight: bold;">Profil</h4>
                    <ul>
                        <li><a href="tentang-kami" style="color: #FC6736;">Tentang Kami</a></li>
                        <li><a href="/#services" style="color: #FC6736;">Layanan Kami</a></li>
                    </ul>
                </div>

                <!-- Column 3 -->
                <div class="col-md-4 text-center">
                    <h4 style="font-weight: bold;">Sosial Media</h4>
                    <div class="d-flex flex-column align-items-center">
                        <a href="https://instagram.com/haluiners" class="d-flex align-items-center mb-2" style="color: #FC6736; text-decoration: none;">
                            <i class="fab fa-instagram" style="font-size: 24px; margin-right: 10px;"></i>
                            <span>@haluiners</span>
                        </a>
                        <a href="https://wa.me/6281111150201" class="d-flex align-items-center mb-2" style="color: #FC6736; text-decoration: none;">
                            <i class="fab fa-whatsapp" style="font-size: 24px; margin-right: 10px;"></i>
                            <span>0811-1115-0201</span>
                        </a>
                        <a href="https://www.tiktok.com/@haluiners" class="d-flex align-items-center mb-2" style="color: #FC6736; text-decoration: none;">
                            <i class="fa-brands fa-tiktok" style="font-size: 24px; margin-right: 10px;"></i>
                            <span>Haluiners</span>
                        </a>
                        <a href="mailto:haluin.service@gmail.com" class="d-flex align-items-center" style="color: #FC6736; text-decoration: none;">
                            <i class="fas fa-envelope" style="font-size: 24px; margin-right: 10px;"></i>
                            <span>haluin.service@gmail.com</span>
                        </a>
                    </div>
                </div>

            </div>
            <p class="text-center">&copy; 2024 HALUin. Semua Hak Dilindungi.</p>
        </div>
    </footer>
</body>

</html>
