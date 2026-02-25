<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Denifa | Creative Digital Agency</title>
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- GSAP Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

    <!-- Tailwind Config for Custom Colors -->
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        denifa: {
                            black: '#050505',
                            dark: '#0a0a0a',
                            purple: '#8b5cf6',
                            blue: '#3b82f6',
                            cyan: '#06b6d4'
                        }
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                        display: ['Space Grotesk', 'sans-serif'],
                    },
                    backgroundImage: {
                        'neon-gradient': 'linear-gradient(to right, #8b5cf6, #3b82f6)',
                        'glass': 'linear-gradient(145deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%)',
                    },
                    boxShadow: {
                        'glow': '0 0 20px rgba(139, 92, 246, 0.5)',
                        'glow-blue': '0 0 20px rgba(59, 130, 246, 0.5)',
                    }
                }
            }
        }
    </script>

    <style>
        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #050505; 
        }
        ::-webkit-scrollbar-thumb {
            background: #333; 
            border-radius: 4px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #8b5cf6; 
        }

        /* Glassmorphism Utilities */
        .glass-panel {
            background: rgba(255, 255, 255, 0.03);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
        }

        /* Loader Animation */
        .loader-ring {
            display: inline-block;
            width: 64px;
            height: 64px;
        }
        .loader-ring:after {
            content: " ";
            display: block;
            width: 46px;
            height: 46px;
            margin: 8px;
            border-radius: 50%;
            border: 5px solid #fff;
            border-color: #8b5cf6 transparent #8b5cf6 transparent;
            animation: ring 1.2s linear infinite;
        }
        @keyframes ring {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }

        /* Cursor blink */
        .cursor-blink {
            animation: blink 1s step-end infinite;
        }
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }

        /* Text Gradient */
        .text-gradient {
            background: linear-gradient(to right, #8b5cf6, #3b82f6, #06b6d4);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Hide elements initially for scroll reveal */
        .reveal-up {
            opacity: 0;
            transform: translateY(30px);
        }
    </style>
</head>
<body class="bg-denifa-black text-gray-300 overflow-x-hidden selection:bg-denifa-purple selection:text-white">

    <!-- Loading Screen -->
    <div id="loading-screen" class="fixed inset-0 z-50 flex flex-col items-center justify-center bg-denifa-black transition-opacity duration-500">
        <div class="loader-ring"></div>
        <h2 class="mt-4 text-2xl font-display font-bold tracking-widest text-white">DENIFA</h2>
        <p class="text-xs text-denifa-purple mt-2 tracking-widest uppercase">Loading Experience</p>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-40 transition-all duration-300 py-4" id="navbar">
        <div class="container mx-auto px-6 flex justify-between items-center">
            <a href="#" class="text-2xl font-display font-bold text-white tracking-tighter">
                DENIFA<span class="text-denifa-purple">.</span>
            </a>
            <div class="hidden md:flex space-x-8 text-sm font-medium">
                <a href="#about" class="hover:text-denifa-purple transition-colors">About</a>
                <a href="#services" class="hover:text-denifa-purple transition-colors">Services</a>
                <a href="#portfolio" class="hover:text-denifa-purple transition-colors">Portfolio</a>
                <a href="#pricing" class="hover:text-denifa-purple transition-colors">Pricing</a>
            </div>
            <a href="#contact" class="hidden md:inline-block px-6 py-2 rounded-full border border-denifa-purple text-denifa-purple hover:bg-denifa-purple hover:text-white hover:shadow-glow transition-all duration-300 text-sm font-semibold">
                Start Project
            </a>
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden text-white text-2xl">
                <i class="fas fa-bars"></i>
            </button>
        </div>
        <!-- Mobile Menu Dropdown -->
        <div id="mobile-menu" class="hidden absolute top-full left-0 w-full bg-denifa-dark/95 backdrop-blur-xl border-b border-white/10 p-6 flex-col space-y-4 md:hidden">
            <a href="#about" class="block hover:text-denifa-purple">About</a>
            <a href="#services" class="block hover:text-denifa-purple">Services</a>
            <a href="#portfolio" class="block hover:text-denifa-purple">Portfolio</a>
            <a href="#contact" class="block text-denifa-purple font-bold">Start Project</a>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative h-screen flex items-center justify-center overflow-hidden">
        <!-- Background Video -->
        <div class="absolute inset-0 z-0">
            <video autoplay muted loop playsinline class="w-full h-full object-cover opacity-40">
                <!-- Abstract tech video background -->
                <source src="https://videos.pexels.com/video-files/3129671/3129671-hd_1920_1080_30fps.mp4" type="video/mp4">
            </video>
            <!-- Overlay Gradient -->
            <div class="absolute inset-0 bg-gradient-to-b from-denifa-black/80 via-denifa-black/50 to-denifa-black"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10 text-center">
            <p class="text-denifa-cyan tracking-[0.3em] text-sm md:text-base mb-4 reveal-up">DIGITAL CREATIVE AGENCY</p>
            <h1 class="text-5xl md:text-7xl lg:text-8xl font-display font-bold text-white mb-6 leading-tight reveal-up">
                We Create <br>
                <span class="text-gradient" id="typing-text"></span><span class="cursor-blink text-denifa-purple">|</span>
            </h1>
            <p class="text-gray-400 max-w-2xl mx-auto text-lg md:text-xl mb-10 reveal-up" style="animation-delay: 0.5s;">
                Mengubah visi Anda menjadi realitas digital dengan sentuhan modern, futuristik, dan berdampak.
            </p>
            <div class="flex flex-col md:flex-row justify-center gap-4 reveal-up" style="animation-delay: 0.7s;">
                <a href="#portfolio" class="group relative px-8 py-4 bg-white text-denifa-black font-bold rounded-full overflow-hidden transition-all hover:scale-105 hover:shadow-glow">
                    <span class="relative z-10 group-hover:text-white transition-colors">Lihat Karya</span>
                    <div class="absolute inset-0 bg-neon-gradient transform scale-x-0 group-hover:scale-x-100 transition-transform origin-left duration-300 ease-out"></div>
                </a>
                <a href="#contact" class="px-8 py-4 border border-white/20 hover:border-white text-white font-semibold rounded-full backdrop-blur-sm transition-all hover:bg-white/10">
                    Hubungi Kami
                </a>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-10 left-1/2 transform -translate-x-1/2 flex flex-col items-center animate-bounce">
            <span class="text-xs tracking-widest mb-2 text-gray-500">SCROLL</span>
            <div class="w-[1px] h-12 bg-gradient-to-b from-denifa-purple to-transparent"></div>
        </div>
    </section>

    <!-- About Section -->
    <section id="about" class="py-24 bg-denifa-black relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <!-- Image / Visual -->
                <div class="w-full lg:w-1/2 relative reveal-up">
                    <div class="relative rounded-2xl overflow-hidden shadow-2xl shadow-denifa-purple/20 group">
                        <img src="https://picsum.photos/seed/tech/800/600" alt="Denifa Team" class="w-full h-auto transform transition-transform duration-700 group-hover:scale-110">
                        <div class="absolute inset-0 bg-gradient-to-t from-denifa-purple/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-end p-8">
                            <p class="text-white font-display font-bold text-xl">Inovasi Tanpa Batas</p>
                        </div>
                    </div>
                    <!-- Decorative Elements -->
                    <div class="absolute -top-6 -right-6 w-24 h-24 border-t-2 border-r-2 border-denifa-purple rounded-tr-3xl"></div>
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 border-b-2 border-l-2 border-denifa-blue rounded-bl-3xl"></div>
                </div>

                <!-- Content -->
                <div class="w-full lg:w-1/2 reveal-up">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">Tentang <span class="text-transparent bg-clip-text bg-neon-gradient">Denifa</span></h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        Kami adalah kolektif kreatif yang bergerak di persimpangan seni dan teknologi. Denifa hadir untuk membantu brand menemukan suara unik mereka di dunia digital yang padat ini. Dengan pendekatan sinematik dan data-driven, kami tidak hanya membuat desain, kami menciptakan pengalaman.
                    </p>
                    
                    <!-- Stats -->
                    <div class="grid grid-cols-3 gap-6 border-t border-white/10 pt-8">
                        <div class="text-center">
                            <h3 class="text-4xl font-display font-bold text-white counter" data-target="120">0</h3>
                            <span class="text-sm text-denifa-purple uppercase tracking-wider">Project</span>
                        </div>
                        <div class="text-center border-l border-white/10">
                            <h3 class="text-4xl font-display font-bold text-white counter" data-target="50">0</h3>
                            <span class="text-sm text-denifa-blue uppercase tracking-wider">Clients</span>
                        </div>
                        <div class="text-center border-l border-white/10">
                            <h3 class="text-4xl font-display font-bold text-white counter" data-target="5">0</h3>
                            <span class="text-sm text-denifa-cyan uppercase tracking-wider">Years</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 bg-denifa-dark relative overflow-hidden">
        <!-- BG Blob -->
        <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-denifa-purple/10 rounded-full blur-[100px] pointer-events-none"></div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="text-center mb-16 reveal-up">
                <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-4">Layanan <span class="text-denifa-purple">Premium</span></h2>
                <p class="text-gray-400 max-w-2xl mx-auto">Solusi komprehensif untuk kebutuhan digital Anda, dikurasi dengan presisi.</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Cards -->
                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up" 
                     onclick="openModal('Videografi', 'Produksi video sinematik untuk iklan, company profile, dan dokumentasi event dengan kualitas 4K dan storytelling yang mendalam.', 'fas fa-video')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-denifa-purple to-blue-600 flex items-center justify-center mb-6 group-hover:shadow-glow transition-shadow">
                        <i class="fas fa-video text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Videografi</h3>
                    <p class="text-gray-400 text-sm">Cinematic storytelling dengan kualitas 4K.</p>
                </div>

                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up" 
                     onclick="openModal('Fotografi', 'Sesi fotografi profesional untuk produk, fashion, dan korporat dengan pencahayaan dan komposisi modern.', 'fas fa-camera')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-600 to-cyan-400 flex items-center justify-center mb-6 group-hover:shadow-glow-blue transition-shadow">
                        <i class="fas fa-camera text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Fotografi</h3>
                    <p class="text-gray-400 text-sm">Visual yang tajam dan berkonsep tinggi.</p>
                </div>

                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up"
                     onclick="openModal('Design Logo', 'Penciptaan identitas visual yang ikonik, minimalis, dan mudah diingat untuk merek Anda.', 'fas fa-pen-nib')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-purple-600 to-pink-500 flex items-center justify-center mb-6 group-hover:shadow-glow transition-shadow">
                        <i class="fas fa-pen-nib text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Design Logo</h3>
                    <p class="text-gray-400 text-sm">Identitas visual yang ikonik & timeless.</p>
                </div>

                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up"
                     onclick="openModal('Branding Kit', 'Panduan lengkap brand Anda termasuk palet warna, tipografi, dan aturan penggunaan.', 'fas fa-swatchbook')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-orange-500 to-red-500 flex items-center justify-center mb-6 group-hover:shadow-glow transition-shadow">
                        <i class="fas fa-swatchbook text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Branding Kit</h3>
                    <p class="text-gray-400 text-sm">Konsistensi visual di seluruh aset.</p>
                </div>

                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up"
                     onclick="openModal('Social Media Design', 'Konten feed dan story yang menarik perhatian audiens di Instagram, TikTok, dan LinkedIn.', 'fas fa-hashtag')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-blue-400 to-indigo-600 flex items-center justify-center mb-6 group-hover:shadow-glow-blue transition-shadow">
                        <i class="fas fa-hashtag text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Social Media</h3>
                    <p class="text-gray-400 text-sm">Konten yang engaging & viral-ready.</p>
                </div>

                <div class="service-card glass-panel p-8 rounded-2xl hover:-translate-y-2 transition-transform duration-300 cursor-pointer group reveal-up"
                     onclick="openModal('Motion Graphic', 'Animasi 2D/3D yang halus untuk explainer video, intro, dan iklan digital.', 'fas fa-film')">
                    <div class="w-14 h-14 rounded-full bg-gradient-to-br from-green-400 to-blue-500 flex items-center justify-center mb-6 group-hover:shadow-glow transition-shadow">
                        <i class="fas fa-film text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-white mb-3">Motion Graphic</h3>
                    <p class="text-gray-400 text-sm">Animasi yang membawa ide menjadi hidup.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio Section -->
    <section id="portfolio" class="py-24 bg-denifa-black">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row justify-between items-end mb-12 reveal-up">
                <div>
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-2">Karya <span class="text-denifa-cyan">Terpilih</span></h2>
                    <p class="text-gray-400">Jelajahi proyek terbaru kami.</p>
                </div>
                <!-- Filters -->
                <div class="flex flex-wrap gap-2 mt-6 md:mt-0" id="portfolio-filters">
                    <button class="filter-btn active px-4 py-2 rounded-full text-sm font-medium border border-denifa-purple bg-denifa-purple text-white transition-all" data-filter="all">All</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-white/20 hover:border-white text-gray-400 hover:text-white transition-all" data-filter="video">Video</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-white/20 hover:border-white text-gray-400 hover:text-white transition-all" data-filter="photo">Foto</button>
                    <button class="filter-btn px-4 py-2 rounded-full text-sm font-medium border border-white/20 hover:border-white text-gray-400 hover:text-white transition-all" data-filter="branding">Branding</button>
                </div>
            </div>

            <!-- Masonry Grid -->
            <div class="columns-1 md:columns-2 lg:columns-3 gap-6 space-y-6" id="portfolio-grid">
                <!-- Item 1 -->
                <div class="portfolio-item relative group rounded-xl overflow-hidden cursor-pointer break-inside-avoid" data-category="video" onclick="openLightbox(this)">
                    <img src="https://picsum.photos/seed/d1/600/800" alt="Project 1" class="w-full h-auto transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center">
                        <h4 class="text-white font-bold text-xl translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Neon City Video</h4>
                        <p class="text-denifa-purple text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Videografi</p>
                    </div>
                </div>
                <!-- Item 2 -->
                <div class="portfolio-item relative group rounded-xl overflow-hidden cursor-pointer break-inside-avoid" data-category="photo" onclick="openLightbox(this)">
                    <img src="https://picsum.photos/seed/d2/600/400" alt="Project 2" class="w-full h-auto transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center">
                        <h4 class="text-white font-bold text-xl translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Fashion Editorial</h4>
                        <p class="text-denifa-purple text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Fotografi</p>
                    </div>
                </div>
                <!-- Item 3 -->
                <div class="portfolio-item relative group rounded-xl overflow-hidden cursor-pointer break-inside-avoid" data-category="branding" onclick="openLightbox(this)">
                    <img src="https://picsum.photos/seed/d3/600/600" alt="Project 3" class="w-full h-auto transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center">
                        <h4 class="text-white font-bold text-xl translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Alpha Tech Logo</h4>
                        <p class="text-denifa-purple text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Branding</p>
                    </div>
                </div>
                <!-- Item 4 -->
                <div class="portfolio-item relative group rounded-xl overflow-hidden cursor-pointer break-inside-avoid" data-category="video" onclick="openLightbox(this)">
                    <img src="https://picsum.photos/seed/d4/600/500" alt="Project 4" class="w-full h-auto transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center">
                        <h4 class="text-white font-bold text-xl translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Commercial Ad</h4>
                        <p class="text-denifa-purple text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Video</p>
                    </div>
                </div>
                <!-- Item 5 -->
                <div class="portfolio-item relative group rounded-xl overflow-hidden cursor-pointer break-inside-avoid" data-category="branding" onclick="openLightbox(this)">
                    <img src="https://picsum.photos/seed/d5/600/750" alt="Project 5" class="w-full h-auto transition-transform duration-500 group-hover:scale-110">
                    <div class="absolute inset-0 bg-black/70 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex flex-col items-center justify-center">
                        <h4 class="text-white font-bold text-xl translate-y-4 group-hover:translate-y-0 transition-transform duration-300">Coffee Shop Identity</h4>
                        <p class="text-denifa-purple text-sm translate-y-4 group-hover:translate-y-0 transition-transform duration-300 delay-75">Branding</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Pricing Section -->
    <section id="pricing" class="py-24 bg-denifa-dark relative">
        <div class="container mx-auto px-6">
            <div class="text-center mb-12 reveal-up">
                <h2 class="text-4xl font-display font-bold text-white mb-4">Investasi <span class="text-gradient">Kreatif</span></h2>
                
                <!-- Toggle -->
                <div class="flex items-center justify-center gap-4 mt-6">
                    <span class="text-sm text-gray-400">Bulanan</span>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" id="pricing-toggle" class="sr-only peer" checked>
                        <div class="w-14 h-7 bg-gray-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[4px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-6 after:w-6 after:transition-all peer-checked:bg-denifa-purple"></div>
                    </label>
                    <span class="text-sm text-white font-semibold">Per Project</span>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 max-w-6xl mx-auto">
                <!-- Basic -->
                <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-white/20 transition-all reveal-up">
                    <h3 class="text-xl font-bold text-white mb-2">Starter</h3>
                    <p class="text-gray-400 text-sm mb-6">Cocok untuk UMKM & Personal.</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-white price-display" data-monthly="2.5jt" data-project="5jt">5jt</span>
                        <span class="text-gray-500 text-sm">/ project</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-denifa-purple mr-3"></i> Logo Design</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-purple mr-3"></i> Kartu Nama Digital</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-purple mr-3"></i> 2 Revisi</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-purple mr-3"></i> File JPG & PNG</li>
                    </ul>
                    <button class="w-full py-3 rounded-lg border border-white/20 hover:bg-white hover:text-black transition-colors font-semibold">Pilih Paket</button>
                </div>

                <!-- Pro (Featured) -->
                <div class="glass-panel p-8 rounded-2xl border border-denifa-purple relative transform md:-translate-y-4 shadow-glow reveal-up" style="animation-delay: 0.1s;">
                    <div class="absolute top-0 right-0 bg-denifa-purple text-white text-xs font-bold px-3 py-1 rounded-bl-lg rounded-tr-lg">POPULAR</div>
                    <h3 class="text-xl font-bold text-white mb-2">Business</h3>
                    <p class="text-gray-400 text-sm mb-6">Untuk perusahaan berkembang.</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-white price-display" data-monthly="8jt" data-project="15jt">15jt</span>
                        <span class="text-gray-500 text-sm">/ project</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-denifa-cyan mr-3"></i> Full Branding Kit</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-cyan mr-3"></i> Social Media Kit (10 Post)</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-cyan mr-3"></i> Company Profile Video (1 min)</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-cyan mr-3"></i> 5 Revisi</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-cyan mr-3"></i> Source File</li>
                    </ul>
                    <button class="w-full py-3 rounded-lg bg-neon-gradient text-white font-bold hover:shadow-glow transition-all">Pilih Paket</button>
                </div>

                <!-- Enterprise -->
                <div class="glass-panel p-8 rounded-2xl border border-white/5 hover:border-white/20 transition-all reveal-up" style="animation-delay: 0.2s;">
                    <h3 class="text-xl font-bold text-white mb-2">Enterprise</h3>
                    <p class="text-gray-400 text-sm mb-6">Solusi total untuk korporasi.</p>
                    <div class="mb-6">
                        <span class="text-4xl font-bold text-white price-display" data-monthly="25jt" data-project="50jt">50jt</span>
                        <span class="text-gray-500 text-sm">/ project</span>
                    </div>
                    <ul class="space-y-3 mb-8 text-sm text-gray-300">
                        <li class="flex items-center"><i class="fas fa-check text-denifa-blue mr-3"></i> Semua fitur Business</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-blue mr-3"></i> TVC Production</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-blue mr-3"></i> Website Design</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-blue mr-3"></i> Unlimited Revisi</li>
                        <li class="flex items-center"><i class="fas fa-check text-denifa-blue mr-3"></i> Dedicated Manager</li>
                    </ul>
                    <button class="w-full py-3 rounded-lg border border-white/20 hover:bg-white hover:text-black transition-colors font-semibold">Hubungi Kami</button>
                </div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="py-24 bg-denifa-black overflow-hidden">
        <div class="container mx-auto px-6 mb-12">
            <h2 class="text-4xl font-display font-bold text-white text-center">Kata <span class="text-denifa-purple">Mereka</span></h2>
        </div>
        
        <div class="relative w-full overflow-hidden">
            <div class="flex gap-8 animate-scroll hover:pause w-max" id="testimonial-track">
                <!-- Card 1 -->
                <div class="w-[350px] glass-panel p-8 rounded-2xl flex-shrink-0">
                    <div class="flex text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-300 italic mb-6">"Denifa mengubah brand kami total. Desainnya sangat fresh dan videonya sinematik sekali. Sangat recommended!"</p>
                    <div class="flex items-center gap-4">
                        <img src="https://picsum.photos/seed/user1/50/50" class="w-10 h-10 rounded-full" alt="User">
                        <div>
                            <h5 class="text-white font-bold text-sm">Andi Pratama</h5>
                            <p class="text-gray-500 text-xs">CEO, TechNova</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="w-[350px] glass-panel p-8 rounded-2xl flex-shrink-0">
                    <div class="flex text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-300 italic mb-6">"Kerjasama yang luar biasa. Tim sangat responsif dan hasil motion graphic-nya melebihi ekspektasi."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://picsum.photos/seed/user2/50/50" class="w-10 h-10 rounded-full" alt="User">
                        <div>
                            <h5 class="text-white font-bold text-sm">Siti Aminah</h5>
                            <p class="text-gray-500 text-xs">Founder, GlowSkin</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="w-[350px] glass-panel p-8 rounded-2xl flex-shrink-0">
                    <div class="flex text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i>
                    </div>
                    <p class="text-gray-300 italic mb-6">"Website profil perusahaan kami jadi terlihat sangat mahal dan modern berkat jasa Denifa."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://picsum.photos/seed/user3/50/50" class="w-10 h-10 rounded-full" alt="User">
                        <div>
                            <h5 class="text-white font-bold text-sm">Budi Santoso</h5>
                            <p class="text-gray-500 text-xs">Marketing Dir., ArchiLine</p>
                        </div>
                    </div>
                </div>
                 <!-- Card 4 (Duplicate for smooth loop) -->
                 <div class="w-[350px] glass-panel p-8 rounded-2xl flex-shrink-0">
                    <div class="flex text-yellow-400 mb-4 text-sm">
                        <i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i>
                    </div>
                    <p class="text-gray-300 italic mb-6">"Denifa mengubah brand kami total. Desainnya sangat fresh dan videonya sinematik sekali."</p>
                    <div class="flex items-center gap-4">
                        <img src="https://picsum.photos/seed/user1/50/50" class="w-10 h-10 rounded-full" alt="User">
                        <div>
                            <h5 class="text-white font-bold text-sm">Andi Pratama</h5>
                            <p class="text-gray-500 text-xs">CEO, TechNova</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 bg-denifa-dark relative">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Contact Info -->
                <div class="lg:w-1/2 reveal-up">
                    <h2 class="text-4xl md:text-5xl font-display font-bold text-white mb-6">Mari <span class="text-gradient">Bicara</span></h2>
                    <p class="text-gray-400 mb-10 text-lg">Punya ide gila? Kami siap merealisasikannya. Isi formulir atau kunjungi studio kami.</p>
                    
                    <div class="space-y-6">
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-denifa-purple text-xl flex-shrink-0">
                                <i class="fas fa-map-marker-alt"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Lokasi</h4>
                                <p class="text-gray-400 text-sm">Jl. Sudirman No. 45, Jakarta Selatan, Indonesia</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-denifa-purple text-xl flex-shrink-0">
                                <i class="fas fa-envelope"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Email</h4>
                                <p class="text-gray-400 text-sm">hello@denifa.com</p>
                            </div>
                        </div>
                        <div class="flex items-start gap-4">
                            <div class="w-12 h-12 rounded-full bg-white/5 flex items-center justify-center text-denifa-purple text-xl flex-shrink-0">
                                <i class="fas fa-phone"></i>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">Telepon</h4>
                                <p class="text-gray-400 text-sm">+62 812 3456 7890</p>
                            </div>
                        </div>
                    </div>

                    <!-- Map Placeholder -->
                    <div class="mt-10 h-48 w-full rounded-xl overflow-hidden relative group">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126907.0866183119!2d106.787034!3d-6.284200!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f1ec2422b423%3A0xbc0c44d6216448f5!2sJakarta%20Selatan%2C%20South%20Jakarta%20City%2C%20Jakarta!5e0!3m2!1sen!2sid!4v1689000000000!5m2!1sen!2sid" width="100%" height="100%" style="border:0; filter: grayscale(100%) invert(92%) contrast(83%);" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>

                <!-- Form -->
                <div class="lg:w-1/2 reveal-up">
                    <form class="glass-panel p-8 rounded-2xl border border-white/10" id="contactForm" onsubmit="handleFormSubmit(event)">
                        <div class="relative mb-6 group">
                            <input type="text" id="name" required class="w-full bg-transparent border-b border-gray-600 text-white py-3 focus:outline-none focus:border-denifa-purple transition-colors peer placeholder-transparent" placeholder="Nama">
                            <label for="name" class="absolute left-0 top-3 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-denifa-purple peer-valid:-top-4 peer-valid:text-xs">Nama Lengkap</label>
                        </div>
                        <div class="relative mb-6 group">
                            <input type="email" id="email" required class="w-full bg-transparent border-b border-gray-600 text-white py-3 focus:outline-none focus:border-denifa-purple transition-colors peer placeholder-transparent" placeholder="Email">
                            <label for="email" class="absolute left-0 top-3 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-denifa-purple peer-valid:-top-4 peer-valid:text-xs">Email Address</label>
                        </div>
                        <div class="relative mb-6 group">
                            <select id="service" class="w-full bg-transparent border-b border-gray-600 text-white py-3 focus:outline-none focus:border-denifa-purple transition-colors [&>option]:bg-black">
                                <option value="" disabled selected>Pilih Layanan</option>
                                <option value="videografi">Videografi</option>
                                <option value="fotografi">Fotografi</option>
                                <option value="branding">Branding</option>
                                <option value="other">Lainnya</option>
                            </select>
                        </div>
                        <div class="relative mb-8 group">
                            <textarea id="message" rows="3" required class="w-full bg-transparent border-b border-gray-600 text-white py-3 focus:outline-none focus:border-denifa-purple transition-colors peer placeholder-transparent" placeholder="Pesan"></textarea>
                            <label for="message" class="absolute left-0 top-3 text-gray-500 text-sm transition-all peer-placeholder-shown:text-base peer-placeholder-shown:top-3 peer-focus:-top-4 peer-focus:text-xs peer-focus:text-denifa-purple peer-valid:-top-4 peer-valid:text-xs">Ceritakan detail project</label>
                        </div>
                        
                        <button type="submit" id="submitBtn" class="w-full py-4 bg-neon-gradient rounded-lg text-white font-bold tracking-wide hover:shadow-glow hover:scale-[1.02] transition-all flex justify-center items-center">
                            <span>Kirim Pesan</span>
                            <i class="fas fa-paper-plane ml-2"></i>
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-black py-12 border-t border-white/10 relative overflow-hidden">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl font-display font-bold text-white mb-6">DENIFA</h2>
            <div class="flex justify-center gap-6 mb-8">
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-denifa-purple hover:text-white hover:scale-110 transition-all"><i class="fab fa-instagram"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-blue-600 hover:text-white hover:scale-110 transition-all"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-red-600 hover:text-white hover:scale-110 transition-all"><i class="fab fa-youtube"></i></a>
                <a href="#" class="w-10 h-10 rounded-full bg-white/5 flex items-center justify-center hover:bg-blue-400 hover:text-white hover:scale-110 transition-all"><i class="fab fa-twitter"></i></a>
            </div>
            <p class="text-gray-500 text-sm mb-4">&copy; 2023 Denifa Creative Agency. All rights reserved.</p>
            <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" class="text-white hover:text-denifa-purple transition-colors">
                <i class="fas fa-arrow-up"></i> Back to Top
            </button>
        </div>
    </footer>

    <!-- Service Modal Popup -->
    <div id="service-modal" class="fixed inset-0 z-50 hidden items-center justify-center px-4">
        <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" onclick="closeModal()"></div>
        <div class="glass-panel bg-denifa-dark border border-white/10 rounded-2xl p-8 max-w-lg w-full relative transform scale-95 opacity-0 transition-all duration-300" id="modal-content">
            <button onclick="closeModal()" class="absolute top-4 right-4 text-gray-400 hover:text-white"><i class="fas fa-times text-xl"></i></button>
            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-denifa-purple to-blue-600 flex items-center justify-center mb-6 text-white text-2xl" id="modal-icon">
                <i class="fas fa-star"></i>
            </div>
            <h3 class="text-2xl font-bold text-white mb-4" id="modal-title">Service Title</h3>
            <p class="text-gray-300 leading-relaxed mb-6" id="modal-desc">Service description goes here.</p>
            <button onclick="closeModal()" class="px-6 py-2 rounded-full border border-denifa-purple text-denifa-purple hover:bg-denifa-purple hover:text-white transition-all">Tutup</button>
        </div>
    </div>

    <!-- Lightbox Portfolio -->
    <div id="lightbox" class="fixed inset-0 z-50 hidden items-center justify-center px-4">
        <div class="absolute inset-0 bg-black/95 backdrop-blur-md" onclick="closeLightbox()"></div>
        <button onclick="closeLightbox()" class="absolute top-6 right-6 text-white hover:text-denifa-purple z-50"><i class="fas fa-times text-3xl"></i></button>
        <div class="relative max-w-5xl w-full max-h-[90vh] flex flex-col items-center">
            <img id="lightbox-img" src="" alt="Full view" class="max-w-full max-h-[80vh] object-contain rounded-lg shadow-2xl shadow-denifa-purple/20">
            <h3 id="lightbox-title" class="text-white text-xl mt-4 font-display font-bold"></h3>
        </div>
    </div>

    <!-- Notification Toast -->
    <div id="toast" class="fixed bottom-10 right-10 z-50 transform translate-y-20 opacity-0 transition-all duration-500">
        <div class="glass-panel bg-green-900/80 border border-green-500/50 text-white px-6 py-4 rounded-lg flex items-center gap-3 shadow-glow">
            <i class="fas fa-check-circle text-green-400 text-xl"></i>
            <div>
                <h4 class="font-bold text-sm">Berhasil!</h4>
                <p class="text-xs text-gray-200">Pesan Anda telah terkirim.</p>
            </div>
        </div>
    </div>

    <script>
        // --- 1. Loading Screen ---
        window.addEventListener('load', () => {
            const loader = document.getElementById('loading-screen');
            setTimeout(() => {
                loader.style.opacity = '0';
                setTimeout(() => {
                    loader.style.display = 'none';
                    initAnimations(); // Start animations after load
                }, 500);
            }, 1500);
        });

        // --- 2. Typing Animation ---
        const words = ["Digital Experience", "Visual Branding", "Future Motion"];
        let i = 0;
        let timer;

        function typeWriter() {
            const element = document.getElementById("typing-text");
            const word = words[i];
            let currentText = element.innerText;
            
            if (this.isDeleting) {
                currentText = word.substring(0, currentText.length - 1);
            } else {
                currentText = word.substring(0, currentText.length + 1);
            }
            
            element.innerText = currentText;
            
            let delta = 150 - Math.random() * 100;
            if (this.isDeleting) delta /= 2;
            
            if (!this.isDeleting && currentText === word) {
                delta = 2000; // Pause at end of word
                this.isDeleting = true;
            } else if (this.isDeleting && currentText === "") {
                this.isDeleting = false;
                i = (i + 1) % words.length;
                delta = 500;
            }
            
            timer = setTimeout(typeWriter, delta);
        }
        
        // Start Typing
        typeWriter();


        // --- 3. GSAP Animations ---
        gsap.registerPlugin(ScrollTrigger);

        function initAnimations() {
            // Reveal Up Animation
            gsap.utils.toArray('.reveal-up').forEach(elem => {
                gsap.to(elem, {
                    scrollTrigger: {
                        trigger: elem,
                        start: "top 85%",
                        toggleActions: "play none none reverse"
                    },
                    y: 0,
                    opacity: 1,
                    duration: 1,
                    ease: "power3.out"
                });
            });

            // Navbar Scroll Effect
            const navbar = document.getElementById('navbar');
            window.addEventListener('scroll', () => {
                if (window.scrollY > 50) {
                    navbar.classList.add('bg-denifa-black/90', 'backdrop-blur-md', 'shadow-lg');
                } else {
                    navbar.classList.remove('bg-denifa-black/90', 'backdrop-blur-md', 'shadow-lg');
                }
            });

            // Counter Animation
            const counters = document.querySelectorAll('.counter');
            counters.forEach(counter => {
                const target = +counter.getAttribute('data-target');
                gsap.to(counter, {
                    scrollTrigger: {
                        trigger: counter,
                        start: "top 90%",
                    },
                    innerHTML: target,
                    duration: 2,
                    snap: { innerHTML: 1 },
                    ease: "power1.inOut"
                });
            });
        }


        // --- 4. Portfolio Filter ---
        const filterBtns = document.querySelectorAll('.filter-btn');
        const portfolioItems = document.querySelectorAll('.portfolio-item');

        filterBtns.forEach(btn => {
            btn.addEventListener('click', () => {
                // Remove active class
                filterBtns.forEach(b => {
                    b.classList.remove('bg-denifa-purple', 'text-white', 'border-denifa-purple');
                    b.classList.add('text-gray-400', 'border-white/20');
                });
                // Add active class
                btn.classList.remove('text-gray-400', 'border-white/20');
                btn.classList.add('bg-denifa-purple', 'text-white', 'border-denifa-purple');

                const filterValue = btn.getAttribute('data-filter');

                portfolioItems.forEach(item => {
                    if (filterValue === 'all' || item.getAttribute('data-category') === filterValue) {
                        gsap.to(item, { scale: 1, opacity: 1, display: 'block', duration: 0.4 });
                    } else {
                        gsap.to(item, { scale: 0.8, opacity: 0, display: 'none', duration: 0.4 });
                    }
                });
            });
        });


        // --- 5. Pricing Toggle ---
        const pricingToggle = document.getElementById('pricing-toggle');
        const priceDisplays = document.querySelectorAll('.price-display');
        const unitLabels = document.querySelectorAll('.text-gray-500'); // Assuming these are the "/ project" labels

        pricingToggle.addEventListener('change', () => {
            const isMonthly = !pricingToggle.checked; // Checked = Project, Unchecked = Monthly
            
            priceDisplays.forEach((display, index) => {
                const newVal = isMonthly ? display.getAttribute('data-monthly') : display.getAttribute('data-project');
                // Simple animation for text change
                gsap.to(display, {
                    opacity: 0,
                    duration: 0.2,
                    onComplete: () => {
                        display.innerText = newVal;
                        unitLabels[index].innerText = isMonthly ? '/ bulan' : '/ project';
                        gsap.to(display, { opacity: 1, duration: 0.2 });
                    }
                });
            });
        });


        // --- 6. Modals & Lightboxes ---
        
        // Service Modal
        const modal = document.getElementById('service-modal');
        const modalContent = document.getElementById('modal-content');
        const modalTitle = document.getElementById('modal-title');
        const modalDesc = document.getElementById('modal-desc');
        const modalIcon = document.getElementById('modal-icon');

        window.openModal = function(title, desc, iconClass) {
            modalTitle.innerText = title;
            modalDesc.innerText = desc;
            modalIcon.innerHTML = `<i class="${iconClass}"></i>`;
            
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        window.closeModal = function() {
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            setTimeout(() => {
                modal.classList.add('hidden');
                modal.classList.remove('flex');
            }, 300);
        }

        // Lightbox
        const lightbox = document.getElementById('lightbox');
        const lightboxImg = document.getElementById('lightbox-img');
        const lightboxTitle = document.getElementById('lightbox-title');

        window.openLightbox = function(element) {
            const imgSrc = element.querySelector('img').src;
            const title = element.querySelector('h4').innerText;
            
            lightboxImg.src = imgSrc;
            lightboxTitle.innerText = title;
            
            lightbox.classList.remove('hidden');
            lightbox.classList.add('flex');
            gsap.fromTo(lightboxImg, {scale: 0.8, opacity: 0}, {scale: 1, opacity: 1, duration: 0.3});
        }

        window.closeLightbox = function() {
            gsap.to(lightboxImg, {scale: 0.8, opacity: 0, duration: 0.3, onComplete: () => {
                lightbox.classList.add('hidden');
                lightbox.classList.remove('flex');
            }});
        }


        // --- 7. Contact Form Handling ---
        window.handleFormSubmit = function(e) {
            e.preventDefault();
            const btn = document.getElementById('submitBtn');
            const originalContent = btn.innerHTML;
            
            // Loading State
            btn.innerHTML = '<div class="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div> Mengirim...';
            btn.disabled = true;

            // Simulate API Call
            setTimeout(() => {
                // Reset Button
                btn.innerHTML = originalContent;
                btn.disabled = false;
                document.getElementById('contactForm').reset();

                // Show Toast
                const toast = document.getElementById('toast');
                toast.classList.remove('translate-y-20', 'opacity-0');
                setTimeout(() => {
                    toast.classList.add('translate-y-20', 'opacity-0');
                }, 4000);
            }, 2000);
        }

        // Mobile Menu
        const mobileBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        
        mobileBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
            mobileMenu.classList.toggle('flex');
        });

        // Infinite Scroll for Testimonials (CSS Animation controlled by JS for Pause)
        const track = document.getElementById('testimonial-track');
        track.addEventListener('mouseenter', () => track.style.animationPlayState = 'paused');
        track.addEventListener('mouseleave', () => track.style.animationPlayState = 'running');

    </script>

    <style>
        /* CSS Keyframes for Auto Scroll Testimonial */
        @keyframes scroll {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        .animate-scroll {
            animation: scroll 20s linear infinite;
        }
    </style>
</body>
</html>