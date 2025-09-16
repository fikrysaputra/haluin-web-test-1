<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="{{ asset('image/IconLogo.png') }}" type="image/png">
    <title>Katalog</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/js/all.min.js"></script>
    <style>
        :root {
            --main-color: #FAF6F2;
            --accent-color: #FC6736;
            --text-color: #000000;
            --light-accent: #EAE1D8;
            --dark-accent: #0c2d57;
        }
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--main-color);
            color: var(--text-color);
            line-height: 1.6;
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 2rem;
        }
        
        .hero {
            text-align: center;
            padding: 3rem 1rem;
            margin-bottom: 2rem;
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .hero h1 {
            font-size: 2.5rem;
            font-weight: 600;
            margin-bottom: 1rem;
            color: var(--dark-accent);
        }
        
        .hero p {
            font-size: 1.1rem;
            max-width: 700px;
            margin: 0 auto;
            color: var(--text-color);
        }
        
        .filters {
            display: flex;
            flex-wrap: wrap;
            gap: 1rem;
            margin-bottom: 2rem;
            justify-content: center;
        }
        
        .filter-btn {
            background-color: white;
            border: 1px solid var(--light-accent);
            padding: 0.5rem 1.5rem;
            border-radius: 25px;
            font-family: 'Poppins', sans-serif;
            font-size: 0.9rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background-color: var(--accent-color);
            color: white;
        }
        
        .gallery {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
        
        .gallery-item {
            background-color: white;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
            transition: transform 0.3s ease;
        }
        
        .gallery-item:hover {
            transform: translateY(-5px);
        }
        
        .gallery-img {
            height: 250px;
            width: 100%;
            object-fit: cover;
        }
        
        .gallery-info {
            padding: 1.5rem;
        }
        
        .gallery-title {
            font-size: 1.2rem;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }
        
        .gallery-desc {
            font-size: 0.9rem;
            margin-bottom: 1rem;
            color: #666;
        }
        
        .gallery-meta {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 0.85rem;
            color: #888;
        }
        
        .price {
            font-weight: 600;
            color: var(--dark-accent);
        }
        
        .view-btn {
            display: inline-block;
            padding: 0.5rem 1.5rem;
            background-color: var(--accent-color);
            color: white;
            border-radius: 25px;
            text-decoration: none;
            font-size: 0.9rem;
            transition: background-color 0.3s ease;
        }
        
        .view-btn:hover {
            background-color: var(--dark-accent);
        }
        
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 3rem;
            gap: 0.5rem;
        }
        
        .page-btn {
            width: 40px;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            border: 1px solid var(--light-accent);
            background-color: white;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .page-btn:hover, .page-btn.active {
            background-color: var(--accent-color);
            color: white;
        }
        
        .newsletter {
            background-color: white;
            margin-top: 4rem;
            padding: 3rem;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .newsletter h2 {
            font-size: 1.8rem;
            margin-bottom: 1rem;
            color: var(--dark-accent);
        }
        
        .newsletter p {
            margin-bottom: 1.5rem;
        }
        
        .newsletter-form {
            display: flex;
            max-width: 500px;
            margin: 0 auto;
        }
        
        .newsletter-input {
            flex: 1;
            padding: 0.8rem 1.5rem;
            border: 1px solid var(--light-accent);
            border-radius: 25px 0 0 25px;
            font-family: 'Poppins', sans-serif;
        }
        
        .newsletter-btn {
            padding: 0.8rem 1.5rem;
            background-color: var(--accent-color);
            color: white;
            border: none;
            border-radius: 0 25px 25px 0;
            cursor: pointer;
            font-family: 'Poppins', sans-serif;
        }
        
        .newsletter-btn:hover {
            background-color: var(--dark-accent);
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .gallery {
                grid-template-columns: repeat(auto-fill, minmax(250px, 1fr));
            }
            
            .newsletter-form {
                flex-direction: column;
                gap: 1rem;
            }
            
            .newsletter-input, .newsletter-btn {
                border-radius: 25px;
            }
        }
    </style>
</head>

<body>
@include('header')
    <!-- Content Start -->
    <div class="container">
        <!-- Hero Section -->
        <div class="hero">
            <h1>Interior Design Collection</h1>
            <p>Lihat semua</p>
        </div>
        
        <!-- Filters -->
        <div class="filters">
            <button class="filter-btn active">All</button>
            <button class="filter-btn">Living Room</button>
            <button class="filter-btn">Bedroom</button>
            <button class="filter-btn">Kitchen</button>
            <button class="filter-btn">Bathroom</button>
            <button class="filter-btn">Office</button>
        </div>
        
        <!-- Gallery -->
        <div class="gallery">
            <!-- Item 1 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Scandinavian Living Room" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Scandinavian Living Room</h3>
                    <p class="gallery-desc">Minimalist design with natural materials and neutral tones for a calm, inviting space.</p>
                    <div class="gallery-meta">
                        <span class="price">$3,500</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Item 2 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Modern Kitchen" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Modern Kitchen</h3>
                    <p class="gallery-desc">Sleek cabinetry, smart appliances and contemporary finishes for efficient cooking.</p>
                    <div class="gallery-meta">
                        <span class="price">$5,200</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Item 3 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Bohemian Bedroom" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Bohemian Bedroom</h3>
                    <p class="gallery-desc">Eclectic design with layered textiles, natural elements and rich colors.</p>
                    <div class="gallery-meta">
                        <span class="price">$2,800</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Item 4 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Minimalist Office" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Minimalist Office</h3>
                    <p class="gallery-desc">Clean lines, functional furniture and clutter-free environment for productivity.</p>
                    <div class="gallery-meta">
                        <span class="price">$1,950</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Item 5 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Luxury Bathroom" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Luxury Bathroom</h3>
                    <p class="gallery-desc">High-end fixtures, marble surfaces and elegant lighting for a spa-like experience.</p>
                    <div class="gallery-meta">
                        <span class="price">$4,300</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
            
            <!-- Item 6 -->
            <div class="gallery-item">
                <img src="https://www.kitchensetminimalis.id/wp-content/uploads/2023/04/kitchen-set-modern.jpg" alt="Industrial Living Room" class="gallery-img">
                <div class="gallery-info">
                    <h3 class="gallery-title">Industrial Living Room</h3>
                    <p class="gallery-desc">Raw materials, exposed features and vintage elements for an urban aesthetic.</p>
                    <div class="gallery-meta">
                        <span class="price">$3,800</span>
                        <a href="#" class="view-btn">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <div class="pagination">
            <button class="page-btn active">1</button>
            <button class="page-btn">2</button>
            <button class="page-btn">3</button>
            <button class="page-btn">4</button>
            <button class="page-btn">
                <i class="fas fa-ellipsis-h"></i>
            </button>
        </div>
        
        <!-- Newsletter -->
        <div class="newsletter">
            <h2>Get Inspiration Delivered</h2>
            <p>Subscribe to our newsletter for the latest design trends, tips, and exclusive offers.</p>
            <form class="newsletter-form">
                <input type="email" placeholder="Your email address" class="newsletter-input" required>
                <button type="submit" class="newsletter-btn">Subscribe</button>
            </form>
        </div>
    </div>
    
    <script>
        // Simple Filter Functionality
        const filterBtns = document.querySelectorAll('.filter-btn');
        
        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class from all buttons
                filterBtns.forEach(b => b.classList.remove('active'));
                
                // Add active class to clicked button
                btn.classList.add('active');
                
                // In a real application, this would filter the gallery items
                // For this demo, we're just toggling the active state
            });
        });
        
        // Simple Pagination Functionality
        const pageBtns = document.querySelectorAll('.page-btn');
        
        pageBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                if (btn.textContent.trim() !== "…") {
                    // Remove active class from all buttons
                    pageBtns.forEach(b => b.classList.remove('active'));
                    
                    // Add active class to clicked button
                    btn.classList.add('active');
                    
                    // In a real application, this would load new gallery items
                    // For this demo, we're just toggling the active state
                }
            });
        });
    </script>
    @include('footer')
</body>
</html>