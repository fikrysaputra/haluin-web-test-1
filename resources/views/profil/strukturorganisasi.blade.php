<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tim & Divisi Perusahaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#FC6736',
                        secondary: '#0c2d57'
                    }
                }
            }
        }
    </script>
    <style>
        .team-card {
            transition: all 0.3s ease;
            cursor: pointer;
        }
        .team-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(252, 103, 54, 0.2);
        }
        .division-tab {
            transition: all 0.3s ease;
        }
        .division-tab.active {
            background: linear-gradient(135deg, #FC6736, #ff8a5c);
            color: white;
        }
        .modal {
            transition: all 0.3s ease;
        }
        .modal.show {
            opacity: 1;
            visibility: visible;
        }
        .modal-content {
            transform: translateY(50px);
            transition: all 0.3s ease;
        }
        .modal.show .modal-content {
            transform: translateY(0);
        }
        .skill-tag {
            background: linear-gradient(135deg, #FC6736, #ff8a5c);
        }
    </style>
</head>
<body>
@include('header')    
    <!-- Header -->
    <section class="relative bg-gradient-to-r from-blue-600 to-indigo-700 text-white">
    <div class="container mx-auto px-6 py-20 flex flex-col items-center text-center">
        <!-- Judul -->
        <h1 class="text-4xl md:text-5xl font-extrabold mb-6">
        Kenali <span class="text-yellow-300">Tim Hebat</span> Kami
        </h1>

        <!-- Deskripsi -->
        <p class="max-w-2xl text-lg md:text-xl mb-8">
        Kami adalah tim profesional yang berdedikasi untuk menciptakan solusi inovatif, 
        berkolaborasi, dan memberikan yang terbaik untuk perusahaan maupun klien.
        </p>

        <!-- Tombol CTA -->
        <div class="flex gap-4">
        <a href="#team"
            class="px-6 py-3 bg-yellow-400 text-blue-900 font-semibold rounded-2xl shadow-lg hover:bg-yellow-300 transition">
            Lihat Tim
        </a>
        <a href="#contact"
            class="px-6 py-3 border-2 border-white font-semibold rounded-2xl hover:bg-white hover:text-blue-700 transition">
            Hubungi Kami
        </a>
        </div>
    </div>

    <!-- Background dekorasi -->
    <div class="absolute inset-0 opacity-10 bg-[url('https://www.toptal.com/designers/subtlepatterns/patterns/dots.png')]"></div>
    </section>


    <!-- Division Tabs -->
    <div class="container mx-auto px-6 py-8">
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button class="division-tab active px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('semua', this)">
                Semua Tim
            </button>
            <button class="division-tab px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('manajemen', this)">
                Manajemen
            </button>
            <button class="division-tab px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('teknologi', this)">
                Teknologi
            </button>
            <button class="division-tab px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('pemasaran', this)">
                Finance
            </button>
            <button class="division-tab px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('keuangan', this)">
                
            </button>
            <button class="division-tab px-6 py-3 rounded-full font-semibold bg-gray-200 text-secondary" onclick="showDivision('operasional', this)">
                Operasional
            </button>
        </div>

        <!-- Team Grid -->
        <div id="team-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
            <!-- Team Member Cards will be populated by JavaScript -->
        </div>
    </div>

    <!-- Company Stats -->
    <section class="bg-primary text-white py-16 mt-16">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                <div>
                    <div class="text-4xl font-bold mb-2">14</div>
                    <div class="text-lg opacity-90">Anggota Tim</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">5</div>
                    <div class="text-lg opacity-90">Divisi</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">100%</div>
                    <div class="text-lg opacity-90">Dedikasi</div>
                </div>
                <div>
                    <div class="text-4xl font-bold mb-2">24/7</div>
                    <div class="text-lg opacity-90">Komitmen</div>
                </div>
            </div>
        </div>
    </section>

    <!-- Profile Modal -->
    <div id="profileModal" class="modal fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 opacity-0 invisible">
        <div class="modal-content bg-white rounded-2xl max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="relative">
                <!-- Modal Header -->
                <div class="bg-gradient-to-r from-primary to-orange-500 text-white p-6 rounded-t-2xl relative">
                    <button onclick="closeProfile()" class="absolute top-4 right-4 text-white hover:text-gray-200 text-2xl font-bold">×</button>
                    <div class="flex items-center gap-6">
                        <!-- Avatar -->
                        <div class="w-24 h-24 rounded-full overflow-hidden border-2 border-white">
                            <img id="modalAvatar" src="" alt="Foto Profil" class="w-full h-full object-cover">
                        </div>
                        
                        <!-- Info -->
                        <div>
                            <h2 id="modalName" class="text-3xl font-bold mb-2">SONYA NADA FADHILAH</h2>
                            <p id="modalPosition" class="text-xl opacity-90">GENERAL MANAJEMEN</p>
                            <p id="modalDivision" class="text-lg opacity-75">Desain Interior</p>
                        </div>
                    </div>
                </div>

                <!-- Modal Body -->
                <div class="p-6">
                    <!-- Contact Info -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-secondary mb-4">Informasi Kontak</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <span class="text-2xl">📧</span>
                                <div>
                                    <p class="text-sm text-gray-600">Email</p>
                                    <p id="modalEmail" class="font-semibold text-secondary"></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <span class="text-2xl">📱</span>
                                <div>
                                    <p class="text-sm text-gray-600">Telepon</p>
                                    <p id="modalPhone" class="font-semibold text-secondary"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bio -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-secondary mb-4">Tentang</h3>
                        <p id="modalBio" class="text-gray-700 leading-relaxed"></p>
                    </div>

                    <!-- Skills -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-secondary mb-4">Keahlian</h3>
                        <div id="modalSkills" class="flex flex-wrap gap-2"></div>
                    </div>

                    <!-- Experience -->
                    <div class="mb-6">
                        <h3 class="text-xl font-bold text-secondary mb-4">Pengalaman</h3>
                        <div class="space-y-3">
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <span class="text-2xl">🏢</span>
                                <div>
                                    <p class="text-sm text-gray-600">Pengalaman Kerja</p>
                                    <p id="modalExperience" class="font-semibold text-secondary"></p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3 p-3 bg-gray-50 rounded-lg">
                                <span class="text-2xl">🎓</span>
                                <div>
                                    <p class="text-sm text-gray-600">Pendidikan</p>
                                    <p id="modalEducation" class="font-semibold text-secondary"></p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex gap-4">
                        <button onclick="contactMemberFromModal()" class="flex-1 bg-primary hover:bg-orange-600 text-white py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                            Hubungi Sekarang
                        </button>
                        <button onclick="closeProfile()" class="flex-1 bg-gray-200 hover:bg-gray-300 text-secondary py-3 px-6 rounded-lg font-semibold transition-colors duration-300">
                            Tutup
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const teamMembers = [
            // Manajemen
            {
                "name": "Muhamad Fikry Saputra, S.Kom",
                "position": "Frontend Developer",
                "division": "IT",
                "email": "fikry@haluin.com",
                "phone": "+62 813-4567-8901",
                "bio": "Bio adalah singkatan dari biografi",
                "skills": ["Tailwind"],
                "experience": "12+ tahun dalam IT",
                "education": "S2 Telkom University"
            },
            {
                "name": "Azman Fatahillah, S.Komp.",
                "position": "Web Developer",
                "division": "IT",
                "email": "azman@haluin.com",
                "phone": "+62 812-1111-1111",
                "bio": "Berpengalaman dalam pengembangan website.",
                "skills": ["HTML", "CSS", "JavaScript"],
                "experience": "10+ tahun dalam IT",
                "education": "S1 Informatika"
            },
            {
                "name": "Rd Muhammad Sopian Putra Pratama, S.Kom., M.Ds.",
                "position": "Web Designer",
                "division": "IT",
                "email": "sopian@haluin.com",
                "phone": "+62 812-2222-2222",
                "bio": "Menguasai desain web modern dan UI/UX.",
                "skills": ["Figma", "UI/UX"],
                "experience": "8+ tahun dalam desain web",
                "education": "S2 Desain"
            },
            {
                "name": "Muhammad Ilham Ferdiansyah, S.Komp.",
                "position": "Programmer",
                "division": "IT",
                "email": "ilham@haluin.com",
                "phone": "+62 812-3333-3333",
                "bio": "Fokus pada pengembangan sistem backend.",
                "skills": ["PHP", "Laravel", "MySQL"],
                "experience": "6+ tahun dalam programming",
                "education": "S1 Informatika"
            },
            {
                "name": "Wulan Yulianita Firdaus, S.Hum.",
                "position": "Chief Financial Officer",
                "division": "Finance",
                "email": "wulan@haluin.com",
                "phone": "+62 812-4444-4444",
                "bio": "Bertanggung jawab atas keuangan perusahaan.",
                "skills": ["Finance", "Accounting"],
                "experience": "12+ tahun dalam keuangan",
                "education": "S1 Humaniora"
            },
            {
                "name": "Lisnawati",
                "position": "Marketing",
                "division": "Marketing",
                "email": "lisna@haluin.com",
                "phone": "+62 812-5555-5555",
                "bio": "Membangun strategi pemasaran digital.",
                "skills": ["Digital Marketing", "SEO"],
                "experience": "7+ tahun dalam marketing",
                "education": "S1 Ekonomi"
            },
            {
                "name": "Moh. Rizky Taufik Hidayat, S.Ars.",
                "position": "Senior Architect",
                "division": "Architecture",
                "email": "rizky@haluin.com",
                "phone": "+62 812-6666-6666",
                "bio": "Spesialis dalam desain arsitektur modern.",
                "skills": ["AutoCAD", "SketchUp"],
                "experience": "9+ tahun dalam arsitektur",
                "education": "S1 Arsitektur"
            },
            {
                "name": "Sonya Nada Fadhilah, S.Ds.",
                "position": "Interior Designer",
                "division": "Interior",
                "email": "sonya@haluin.com",
                "phone": "+62 812-7777-7777",
                "bio": "Menghadirkan desain interior estetik dan fungsional.",
                "skills": ["3D Design", "Interior Planning"],
                "experience": "6+ tahun dalam interior design",
                "education": "S1 Desain Interior",
                "photo": "image/sonya.jpg"
            },
            {
                "name": "Filsa Andiani Kurniawan, S.Ds.",
                "position": "Interior Designer",
                "division": "Interior",
                "email": "filsa@haluin.com",
                "phone": "+62 812-8888-8888",
                "bio": "Menciptakan ruang nyaman dengan estetika tinggi.",
                "skills": ["Interior Design", "3D Modelling"],
                "experience": "5+ tahun dalam interior design",
                "education": "S1 Desain Interior"
            },
            {
                "name": "Revanny Puja Rezky, S.Ds.",
                "position": "Interior Designer",
                "division": "Interior",
                "email": "revanny@haluin.com",
                "phone": "+62 812-9999-9999",
                "bio": "Berpengalaman di dekorasi dan desain ruang kerja.",
                "skills": ["Furniture Design", "AutoCAD"],
                "experience": "5+ tahun dalam interior design",
                "education": "S1 Desain Interior"
            },
            {
                "name": "Ryias Ikhlasanudin, S.Ds.",
                "position": "Product Designer",
                "division": "Product",
                "email": "ryias@haluin.com",
                "phone": "+62 813-0000-1111",
                "bio": "Mendesain produk dengan fokus pada fungsionalitas.",
                "skills": ["Product Design", "Prototyping"],
                "experience": "7+ tahun dalam product design",
                "education": "S1 Desain Produk"
            },
            {
                "name": "Adrian Wiranata, S.Ds.",
                "position": "Graphic Designer",
                "division": "Graphic Design",
                "email": "adrian@haluin.com",
                "phone": "+62 813-0000-2222",
                "bio": "Membuat desain visual kreatif dan estetik.",
                "skills": ["Photoshop", "Illustrator"],
                "experience": "6+ tahun dalam graphic design",
                "education": "S1 Desain Komunikasi Visual"
            },
            {
                "name": "Muhammad Habib Al Farizi",
                "position": "Graphic Designer",
                "division": "Graphic Design",
                "email": "habib@haluin.com",
                "phone": "+62 813-0000-3333",
                "bio": "Berpengalaman dalam branding dan desain visual.",
                "skills": ["CorelDraw", "Illustrator"],
                "experience": "5+ tahun dalam graphic design",
                "education": "S1 Desain"
            },
            {
                "name": "Wicky Pratama Riadi",
                "position": "Graphic Designer",
                "division": "Graphic Design",
                "email": "wicky@haluin.com",
                "phone": "+62 813-0000-4444",
                "bio": "Fokus pada ilustrasi dan desain kreatif.",
                "skills": ["Illustration", "Photoshop"],
                "experience": "4+ tahun dalam graphic design",
                "education": "S1 Desain"
            },
            {
                "name": "Indra Maulana",
                "position": "Graphic Designer",
                "division": "Graphic Design",
                "email": "indra@haluin.com",
                "phone": "+62 813-0000-5555",
                "bio": "Menguasai tipografi dan desain komunikasi visual.",
                "skills": ["Typography", "Branding"],
                "experience": "4+ tahun dalam graphic design",
                "education": "S1 Desain"
            },
            {
                "name": "Alfandy Septiansyah Putra",
                "position": "Photographer & Videographer",
                "division": "Photography & Videography",
                "email": "alfandy@haluin.com",
                "phone": "+62 813-0000-6666",
                "bio": "Spesialis dalam fotografi produk dan videografi event.",
                "skills": ["Photography", "Videography"],
                "experience": "6+ tahun dalam fotografi & videografi",
                "education": "S1 Multimedia"
            },
            {
                "name": "M. Nasrulluddin Al Anwary",
                "position": "Photographer & Videographer",
                "division": "Photography & Videography",
                "email": "nasrul@haluin.com",
                "phone": "+62 813-0000-7777",
                "bio": "Mengabadikan momen visual dengan profesionalisme.",
                "skills": ["Video Editing", "Photography"],
                "experience": "5+ tahun dalam fotografi & videografi",
                "education": "S1 Multimedia"
            }
            ];


        function getInitials(name) {
            return name.split(' ').map(word => word[0]).join('').toUpperCase();
        }

        function getRandomColor() {
            const colors = ['bg-blue-500', 'bg-green-500', 'bg-purple-500', 'bg-pink-500', 'bg-indigo-500', 'bg-yellow-500', 'bg-red-500'];
            return colors[Math.floor(Math.random() * colors.length)];
        }

        function createTeamCard(member) {
            let avatarHTML = '';

            if (member.photo) {
                // kalau ada foto
                avatarHTML = `
                    <div class="w-30 h-40 rounded-full overflow-hidden mx-auto mb-4 border-2 border-gray-200">
                        <img src="${member.photo}" alt="${member.name}" class="w-full h-full object-cover" 
                            onerror="this.onerror=null; this.src='https://via.placeholder.com/150?text=${getInitials(member.name)}'">
                    </div>
                `;
            } else {
                // fallback ke inisial
                avatarHTML = `
                    <div class="w-50 h-50 ${getRandomColor()} rounded-full flex items-center justify-center text-white text-2xl font-bold mx-auto mb-4">
                        ${getInitials(member.name)}
                    </div>
                `;
            }

            return `
                <div class="team-card bg-white rounded-2xl p-6 shadow-lg border border-gray-100" data-division="${member.division}" onclick="showProfile('${member.name}')">
                    <div class="text-center">
                        ${avatarHTML}
                        <h3 class="text-lg sm:text-xl md:text-2xl font-bold text-secondary mb-2">${member.name}</h3>
                        <p class="text-sm sm:text-base md:text-lg text-primary font-semibold mb-4">${member.position}</p>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex items-center justify-center gap-2">
                                <span>📧</span>
                                <span>${member.email}</span>
                            </div>
                            <div class="flex items-center justify-center gap-2">
                                <span>📱</span>
                                <span>${member.phone}</span>
                            </div>
                        </div>
                        <div class="mt-4 flex gap-2">
                            <button class="flex-1 bg-primary hover:bg-orange-600 text-white px-4 py-2 rounded-lg transition-colors duration-300 text-sm" onclick="event.stopPropagation(); contactMember('${member.name}')">
                                Hubungi
                            </button>
                            <button class="flex-1 bg-secondary hover:bg-blue-800 text-white px-4 py-2 rounded-lg transition-colors duration-300 text-sm" onclick="event.stopPropagation(); showProfile('${member.name}')">
                                Profil
                            </button>
                        </div>
                    </div>
                </div>
            `;
        }


        function showDivision(division, clickedTab = null) {
            const teamGrid = document.getElementById('team-grid');
            const tabs = document.querySelectorAll('.division-tab');
            
            // Update active tab
            tabs.forEach(tab => tab.classList.remove('active'));
            if (clickedTab) {
                clickedTab.classList.add('active');
            } else {
                // Default to "Semua Tim" tab
                tabs[0].classList.add('active');
            }
            
            // Filter and display team members
            let filteredMembers = division === 'semua' ? teamMembers : teamMembers.filter(member => member.division === division);
            
            teamGrid.innerHTML = filteredMembers.map(member => createTeamCard(member)).join('');
        }

        let currentMember = null;

        function showProfile(name) {
            currentMember = teamMembers.find(member => member.name === name);
            if (!currentMember) return;

            // Populate modal with member data
            document.getElementById('modalName').textContent = currentMember.name;
            document.getElementById('modalPosition').textContent = currentMember.position;
            document.getElementById('modalDivision').textContent = getDivisionName(currentMember.division);
            document.getElementById('modalEmail').textContent = currentMember.email;
            document.getElementById('modalPhone').textContent = currentMember.phone;
            document.getElementById('modalBio').textContent = currentMember.bio;
            document.getElementById('modalExperience').textContent = currentMember.experience;
            document.getElementById('modalEducation').textContent = currentMember.education;
            
            // 🔹 Set avatar pakai foto (kalau ada)
            const avatarEl = document.getElementById('modalAvatar');
            if (currentMember.photo) {
                avatarEl.src = currentMember.photo;
                avatarEl.alt = currentMember.name;
            } else {
                // fallback: kalau gak ada foto → generate initial
                avatarEl.src = `https://via.placeholder.com/150?text=${getInitials(currentMember.name)}`;
            }

            // Populate skills
            const skillsContainer = document.getElementById('modalSkills');
            skillsContainer.innerHTML = currentMember.skills.map(skill => 
                `<span class="skill-tag text-white px-3 py-1 rounded-full text-sm font-medium">${skill}</span>`
            ).join('');

            // Show modal
            document.getElementById('profileModal').classList.add('show');
            document.body.style.overflow = 'hidden';
        }


        function closeProfile() {
            document.getElementById('profileModal').classList.remove('show');
            document.body.style.overflow = 'auto';
            currentMember = null;
        }

        function getDivisionName(division) {
            const divisionNames = {
                'teknologi': 'Information Technology (IT)',
                'interior': 'Interior Design',
                'arsitek': 'Senior Architect',
                'prodak': 'Product Designer',
                'marketing': 'Marketing',
                'finance' : 'Chief Financial Officer',
                'dekdok': 'Photograpghy and  Videography',
                'grafis': 'Graphic Design'  
            };
            return divisionNames[division] || division;
        }

        function contactMember(name) {
            alert(`Menghubungi ${name}... Fitur ini akan segera tersedia!`);
        }

        function contactMemberFromModal() {
            if (currentMember) {
                alert(`Menghubungi ${currentMember.name}... Fitur ini akan segera tersedia!`);
            }
        }

        // Close modal when clicking outside
        document.addEventListener('click', function(event) {
            const modal = document.getElementById('profileModal');
            if (event.target === modal) {
                closeProfile();
            }
        });

        // Close modal with Escape key
        document.addEventListener('keydown', function(event) {
            if (event.key === 'Escape') {
                closeProfile();
            }
        });

        // Initialize page
        document.addEventListener('DOMContentLoaded', function() {
            showDivision('semua');
        });
    </script>

    <script>
    (function () {
        function c() {
            var b = a.contentDocument || a.contentWindow.document;
            if (b) {
                var d = b.createElement('script');
                d.innerHTML = "window.__CF$cv$params = { r:'9785bc8c32b73e47', t:'MTc1NjczOTg2Ny4wMDAwMDA=' }; " +
                            "var a = document.createElement('script'); " +
                            "a.nonce = ''; " +
                            "a.src = '/cdn-cgi/challenge-platform/scripts/jsd/main.js'; " +
                            "document.getElementsByTagName('head')[0].appendChild(a);";
                b.getElementsByTagName('head')[0].appendChild(d);
            }
        }

        if (document.body) {
            var a = document.createElement('iframe');
            a.height = 1;
            a.width = 1;
            a.style.position = 'absolute';
            a.style.top = 0;
            a.style.left = 0;
            a.style.border = 'none';
            a.style.visibility = 'hidden';

            document.body.appendChild(a);

            if (document.readyState !== 'loading') {
                c();
            } else if (window.addEventListener) {
                document.addEventListener('DOMContentLoaded', c);
            } else {
                var e = document.onreadystatechange || function () {};
                document.onreadystatechange = function (b) {
                    e(b);
                    if (document.readyState !== 'loading') {
                        document.onreadystatechange = e;
                        c();
                    }
                };
            }
        }
    })();
    </script>


@include('footer')
</body>
</html>
