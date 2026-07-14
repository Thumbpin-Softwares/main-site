@extends('layout.visitor', [
    'title' => 'Leading Branding & Advertising Agency in Gurugram | Thumbpin',
    'description' => 'Thumbpin is a 360 creative and digital advertising agency in Gurugram that will help your business flourish with its effective strategy and ideas.',
    'keywords' => 'Thumbpin,
branding agency Gurgaon,
branding agency Gurugram,
advertising agency Gurgaon,
advertising agency Gurugram,
digital marketing agency Gurgaon,
digital marketing agency Gurugram,
creative agency Gurgaon,
creative agency Gurugram,
360 advertising agency,
video production agency Gurgaon,
video production agency Gurugram,
real estate advertising agency,
real estate marketing agency,
web design agency Gurgaon,
web design agency Gurugram,
website development Gurgaon,
website development Gurugram,
social media marketing Gurgaon,
social media marketing Gurugram,
branding services Gurgaon,
creative advertising agency,
marketing agency Gurgaon',
    'footer_black' => 'footer-black',
    'hideWhatsApp' => true,
])

@section('head')
    <!-- Google Fonts: Manrope -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- AOS Animation CSS -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

    <link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/index-new.css') }}">

    <!-- LocalBusiness Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "LocalBusiness",
      "name": "Thumbpin",
      "image": "",
      "@id": "",
      "url": "https://www.thumbpin.in/",
      "telephone": "9773511447",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "Spaze Itech Park, Tower B1, 6th floor, office 657, sector- 49 Gurugram - 122018",
        "addressLocality": "Gurugram",
        "postalCode": "122018",
        "addressCountry": "IN"
      },
      "geo": {
        "@type": "GeoCoordinates",
        "latitude": 28.4132213,
        "longitude": 77.0434993
      },
      "openingHoursSpecification": {
        "@type": "OpeningHoursSpecification",
        "dayOfWeek": [
          "Monday",
          "Tuesday",
          "Wednesday",
          "Thursday",
          "Friday",
          "Saturday"
        ],
        "opens": "10:00",
        "closes": "19:00"
      } 
    }
    </script>
 @endsection

@section('content')
    <main>

    <!-- BreadcrumbList Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org/", 
      "@type": "BreadcrumbList", 
      "itemListElement": [{
        "@type": "ListItem", 
        "position": 1, 
        "name": "Home",
        "item": "https://www.thumbpin.in/"  
      },{
        "@type": "ListItem", 
        "position": 2, 
        "name": "About",
        "item": "https://www.thumbpin.in/about"  
      },{
        "@type": "ListItem", 
        "position": 3, 
        "name": "Services",
        "item": "https://www.thumbpin.in/services"  
      },{
        "@type": "ListItem", 
        "position": 4, 
        "name": "Work",
        "item": "https://www.thumbpin.in/work"  
      },{
        "@type": "ListItem", 
        "position": 5, 
        "name": "Blog",
        "item": "https://www.thumbpin.in/blog"  
      },{
        "@type": "ListItem", 
        "position": 6, 
        "name": "Contact",
        "item": "https://www.thumbpin.in/contact"  
      },{
        "@type": "ListItem", 
        "position": 7, 
        "name": "Social Media Marketing",
        "item": "https://www.thumbpin.in/services/social-media-marketing"  
      },{
        "@type": "ListItem", 
        "position": 8, 
        "name": "Performance Marketing",
        "item": "https://www.thumbpin.in/services/performance-marketing"  
      },{
        "@type": "ListItem", 
        "position": 9, 
        "name": "Web Design",
        "item": "https://www.thumbpin.in/services/web-design"  
      },{
        "@type": "ListItem", 
        "position": 10, 
        "name": "Search Engine Optimization",
        "item": "https://www.thumbpin.in/services/seo"  
      }]
    }
    </script>

    <!-- VideoObject Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "VideoObject",
      "name": "Thumbpin — Creative & Digital Advertising Agency Showreel",
      "description": "Thumbpin transforms your vision into digital reality — a look at our branding, advertising, and video production work.",
      "thumbnailUrl": [
        "https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/place.png"
      ],
      "contentUrl": "https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4",
      "embedUrl": "https://www.thumbpin.in/"
    }
    </script>

    <!-- Reels ItemList VideoObject Structured Data for SEO -->
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "ItemList",
      "itemListElement": [
        {
          "@type": "ListItem", "position": 1,
          "item": {
            "@type": "VideoObject",
            "name": "Ramaeri Digital Film",
            "description": "Short-form digital film reel produced by Thumbpin for Ramaeri.",
            "thumbnailUrl": "https://img.youtube.com/vi/_UagDA4XyFM/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/_UagDA4XyFM"
          }
        },
        {
          "@type": "ListItem", "position": 2,
          "item": {
            "@type": "VideoObject",
            "name": "Fashion Film",
            "description": "Short-form fashion film reel produced by Thumbpin.",
            "thumbnailUrl": "https://img.youtube.com/vi/MoEvrnlSy7U/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/MoEvrnlSy7U"
          }
        },
        {
          "@type": "ListItem", "position": 3,
          "item": {
            "@type": "VideoObject",
            "name": "College Vidya Film",
            "description": "Short-form brand film reel produced by Thumbpin for College Vidya.",
            "thumbnailUrl": "https://img.youtube.com/vi/sQcTZugZne0/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/sQcTZugZne0"
          }
        },
        {
          "@type": "ListItem", "position": 4,
          "item": {
            "@type": "VideoObject",
            "name": "Vserv Brand Reel",
            "description": "Short-form brand reel produced by Thumbpin for Vserv.",
            "thumbnailUrl": "https://img.youtube.com/vi/V_-e9JaCnuM/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/V_-e9JaCnuM"
          }
        },
        {
          "@type": "ListItem", "position": 5,
          "item": {
            "@type": "VideoObject",
            "name": "Short-Form Social Content",
            "description": "Short-form social media content reel produced by Thumbpin.",
            "thumbnailUrl": "https://img.youtube.com/vi/Oj4FmmUoCKA/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/Oj4FmmUoCKA"
          }
        },
        {
          "@type": "ListItem", "position": 6,
          "item": {
            "@type": "VideoObject",
            "name": "Short Film Reel",
            "description": "Short-form film reel produced by Thumbpin.",
            "thumbnailUrl": "https://img.youtube.com/vi/CiKv3ezY9b8/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/CiKv3ezY9b8"
          }
        },
        {
          "@type": "ListItem", "position": 7,
          "item": {
            "@type": "VideoObject",
            "name": "Vserv Dubai Reel",
            "description": "Short-form brand reel produced by Thumbpin for Vserv Dubai.",
            "thumbnailUrl": "https://img.youtube.com/vi/ee1nPF5evyQ/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/ee1nPF5evyQ"
          }
        },
        {
          "@type": "ListItem", "position": 8,
          "item": {
            "@type": "VideoObject",
            "name": "Short Film Reel",
            "description": "Short-form film reel produced by Thumbpin.",
            "thumbnailUrl": "https://img.youtube.com/vi/4T8YyPqliog/hqdefault.jpg",
            "embedUrl": "https://www.youtube.com/embed/4T8YyPqliog"
          }
        }
      ]
    }
    </script>





        {{-- ====================== 1. FIXED HERO (VIDEO BACKGROUND) ====================== --}}
        <div class="fixed inset-0 w-full h-screen -z-10 overflow-hidden bg-black max-[991px]:relative max-[991px]:h-[80vh] max-[991px]:z-10 max-[768px]:h-[60vh]" id="sec-hero">
            {{-- Desktop Video --}}
            <video id="hero-video-bg" class="block w-full h-full absolute inset-0 object-cover max-[768px]:hidden" src="https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4" autoplay muted loop playsinline preload="auto" fetchpriority="high"></video>
            {{-- Mobile Video - Only loaded on small screens via JS --}}
            <div id="hero-video-mobile-container" class="hidden max-[768px]:block w-full h-full absolute inset-0 [&>video]:block [&>video]:w-full [&>video]:h-full [&>video]:object-cover"></div>
            <template id="hero-video-mobile-template">
                <video id="hero-video-mobile" src="https://assets.thumbpin.in/thumbpin-videos/optimisedforsmallerscreens.mp4" autoplay muted loop playsinline preload="none"></video>
            </template>
            <div class="absolute inset-0 bg-black/80 z-[1] max-[768px]:hidden"></div>

            <!-- Headline Overlay - Centered with Inline Video -->
            <h1 class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[90%] max-w-[1400px] text-center z-[5] pointer-events-none flex flex-col items-center justify-center gap-0 max-[991px]:w-[95%] max-[991px]:top-[55%] max-[768px]:hidden">
                <!-- Line 1: THUMBPIN -->
                <div class="flex items-center justify-center font-black uppercase leading-none text-white tracking-[-3px] text-[clamp(32px,8vw,100px)] gap-[clamp(10px,2vw,25px)] opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:0.4s] max-[1280px]:text-[clamp(28px,6vw,72px)] max-[1280px]:tracking-[-2px] max-[1280px]:gap-[clamp(8px,1.5vw,18px)] max-[1024px]:text-[clamp(24px,5.5vw,56px)] max-[1024px]:tracking-[-1.5px] max-[1024px]:gap-[clamp(6px,1.2vw,14px)]">
                    <span class="inline-block">THUMBPIN</span>
                </div>

                <!-- Line 2: TRANSFORMS [VIDEO] YOUR -->
                <div class="flex items-center justify-center font-black uppercase leading-none text-white tracking-[-3px] text-[clamp(32px,8vw,100px)] gap-[clamp(10px,2vw,25px)] opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:0.6s] max-[1280px]:text-[clamp(28px,6vw,72px)] max-[1280px]:tracking-[-2px] max-[1280px]:gap-[clamp(8px,1.5vw,18px)] max-[1024px]:text-[clamp(24px,5.5vw,56px)] max-[1024px]:tracking-[-1.5px] max-[1024px]:gap-[clamp(6px,1.2vw,14px)]">
                    <span class="inline-block">TRANSFORMS</span>
                    <div class="inline-flex items-center justify-center w-[clamp(80px,16vw,220px)] h-[clamp(40px,7vw,100px)] rounded-full overflow-hidden mx-[clamp(5px,1vw,15px)] shrink-0 pointer-events-auto shadow-[0_10px_40px_rgba(0,0,0,0.5)] border-2 border-white/20 -translate-y-[5%] cursor-pointer [&>video]:w-full [&>video]:h-full [&>video]:object-cover max-[1280px]:w-[clamp(70px,14vw,160px)] max-[1280px]:h-[clamp(35px,6vw,75px)] max-[1024px]:w-[clamp(60px,12vw,130px)] max-[1024px]:h-[clamp(30px,5vw,60px)]" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4')">
                        <video id="hero-video-pill" muted loop playsinline preload="none">
                            <source src="https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4" type="video/mp4">
                        </video>
                    </div>
                    <span class="inline-block">YOUR</span>
                </div>

                <!-- Line 3: VISION INTO -->
                <div class="flex items-center justify-center font-black uppercase leading-none text-white tracking-[-3px] text-[clamp(32px,8vw,100px)] gap-[clamp(10px,2vw,25px)] opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:0.8s] max-[1280px]:text-[clamp(28px,6vw,72px)] max-[1280px]:tracking-[-2px] max-[1280px]:gap-[clamp(8px,1.5vw,18px)] max-[1024px]:text-[clamp(24px,5.5vw,56px)] max-[1024px]:tracking-[-1.5px] max-[1024px]:gap-[clamp(6px,1.2vw,14px)]">
                    <span class="inline-block text-tp-red">VISION</span>
                    <span class="inline-block">INTO</span>
                </div>

                <!-- Line 4: DIGITAL REALITY -->
                <div class="flex items-center justify-center font-black uppercase leading-none text-white tracking-[-3px] text-[clamp(32px,8vw,100px)] gap-[clamp(10px,2vw,25px)] opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:1.0s] max-[1280px]:text-[clamp(28px,6vw,72px)] max-[1280px]:tracking-[-2px] max-[1280px]:gap-[clamp(8px,1.5vw,18px)] max-[1024px]:text-[clamp(24px,5.5vw,56px)] max-[1024px]:tracking-[-1.5px] max-[1024px]:gap-[clamp(6px,1.2vw,14px)]">
                    <span class="inline-block">DIGITAL</span>
                    <span class="inline-block text-tp-red">REALITY.</span>
                </div>
            </h1>

            <div class="absolute bottom-0 left-0 w-full h-2/5 bg-gradient-to-t from-white to-transparent z-[1] pointer-events-none opacity-0"></div>
            <div class="absolute bottom-10 left-1/2 -translate-x-1/2 text-white uppercase text-xs tracking-[3px] z-[2] [mix-blend-mode:difference] animate-scroll-hint max-[768px]:hidden">Scroll Down</div>
        </div>

        {{-- ====================== 2. MAIN CONTENT ====================== --}}
        <div class="main-content-wrapper">
            
            <section class="relative bg-white px-5 py-[120px] max-[768px]:px-[15px] max-[768px]:py-20 max-[480px]:py-[60px]" id="what-we-do">
                <div class="max-w-[1300px] mx-auto flex items-center justify-between gap-20 max-[768px]:flex-col max-[768px]:gap-10 max-[768px]:text-center">
                    <div class="reveal flex-[1.5] bg-[#f0f0f0] rounded-[20px] overflow-hidden relative aspect-video shadow-[0_30px_60px_rgba(0,0,0,0.15)] cursor-pointer transition-transform duration-500 ease-out hover:-translate-y-2.5 max-[768px]:w-full max-[768px]:max-w-[500px] [&:hover_.play-overlay]:bg-black/10" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/whatwedo2optimised.mp4')">
                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/place.png" alt="Video Placeholder" class="w-full h-full object-cover">
                        <div class="play-overlay absolute inset-0 w-full h-full bg-black/30 flex items-center justify-center transition-colors duration-300 z-[2]">
                            <div class="w-20 h-20 bg-white/20 backdrop-blur-[10px] rounded-full flex items-center justify-center transition-transform duration-300 border-2 border-white/50">
                                <svg viewBox="0 0 24 24" class="w-[30px] h-[30px] fill-white ml-1"><path d="M8 5v14l11-7z"></path></svg>
                            </div>
                        </div>
                    </div>

                    <div class="reveal flex-1" style="transition-delay: 0.2s;">
                        <h2 class="text-[72px] font-black leading-[0.9] text-black uppercase mb-[30px] max-[768px]:text-5xl max-[768px]:leading-[1.1] max-[480px]:text-4xl max-[480px]:mb-5">WHAT<br>WE DO</h2>
                        <p class="text-lg text-[#555] leading-[1.7] mb-10 max-[768px]:text-base max-[768px]:max-w-full max-[480px]:text-[15px] max-[480px]:mb-[30px]">
                            We don't just make things look pretty. We solve business problems with creative solutions. Our approach is data-driven, design-led, and focused on growth.
                        </p>
                        <a href="#sec-work-filter" class="inline-block px-10 py-[15px] rounded-full font-bold uppercase transition-all duration-300 hover:-translate-y-1 hover:shadow-[0_10px_30px_rgba(230,57,70,0.3)] max-[768px]:px-[30px] max-[768px]:py-3 max-[768px]:text-sm bg-black text-white">Explore Work</a>
                    </div>
                </div>

            {{-- Client Logos Marquee --}}
            <section class="relative bg-white overflow-hidden mt-20 -mb-10 pt-[50px] pb-5 before:content-[''] before:absolute before:top-0 before:left-0 before:w-[150px] before:h-full before:z-[2] before:pointer-events-none before:bg-gradient-to-r before:from-white before:to-transparent after:content-[''] after:absolute after:top-0 after:right-0 after:w-[150px] after:h-full after:z-[2] after:pointer-events-none after:bg-gradient-to-l after:from-white after:to-transparent max-[768px]:px-[15px] max-[768px]:py-[60px] max-[480px]:px-[15px] max-[480px]:py-[50px]">
                <div class="container">
                    <div class="text-center mb-[30px]">
                        <h2 class="relative inline-block text-2xl font-normal uppercase tracking-[4px] text-[#333] m-0 pb-2.5 after:content-[''] after:absolute after:bottom-0 after:left-1/2 after:-translate-x-1/2 after:w-10 after:h-0.5 after:bg-tp-red">Trusted By <span class="font-bold text-black">Industry Leaders</span></h2>
                    </div>
                </div>
                {{-- Row 1: Fast Moving --}}
                <div class="w-full overflow-hidden whitespace-nowrap relative mb-[30px]">
                    <div class="flex gap-8 w-max animate-marquee-fast hover:[animation-play-state:paused]">
                        <!-- Original Set -->
                        @for ($i = 1; $i <= 11; $i++)
                            <div class="flex-none flex items-center justify-center">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'" class="h-[100px] w-auto max-w-[150px] object-contain grayscale opacity-60 transition-all duration-[400ms] hover:grayscale-0 hover:opacity-100 hover:scale-110 max-[768px]:max-w-[180px] max-[480px]:max-w-[80px]">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for ($i = 1; $i <= 11; $i++)
                            <div class="flex-none flex items-center justify-center">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'" class="h-[100px] w-auto max-w-[150px] object-contain grayscale opacity-60 transition-all duration-[400ms] hover:grayscale-0 hover:opacity-100 hover:scale-110 max-[768px]:max-w-[180px] max-[480px]:max-w-[80px]">
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Row 2: Slower Moving --}}
                <div class="w-full overflow-hidden whitespace-nowrap relative">
                    <div class="flex gap-8 w-max animate-marquee-slow hover:[animation-play-state:paused]">
                        <!-- Original Set -->
                        @for ($i = 12; $i <= 22; $i++)
                            <div class="flex-none flex items-center justify-center">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'" class="{{ in_array($i, [21, 22]) ? 'h-[60px] max-w-[120px]' : 'h-[100px] max-w-[150px]' }} w-auto object-contain grayscale opacity-60 transition-all duration-[400ms] hover:grayscale-0 hover:opacity-100 hover:scale-110 max-[768px]:max-w-[180px] max-[480px]:max-w-[80px]">
                            </div>
                        @endfor
                        <!-- Duplicate Set for Seamless Loop -->
                        @for ($i = 12; $i <= 22; $i++)
                            <div class="flex-none flex items-center justify-center">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy" onerror="this.style.display='none'" class="{{ in_array($i, [21, 22]) ? 'h-[60px] max-w-[120px]' : 'h-[100px] max-w-[150px]' }} w-auto object-contain grayscale opacity-60 transition-all duration-[400ms] hover:grayscale-0 hover:opacity-100 hover:scale-110 max-[768px]:max-w-[180px] max-[480px]:max-w-[80px]">
                            </div>
                        @endfor
                    </div>
                </div>
            </section>
            </section>

            {{-- STRATEGIC CTA SECTION --}}
            <section class="reveal relative overflow-hidden bg-[#0F0F0F] text-white py-[100px] max-[991px]:py-20">
                <div class="container">
                    <div class="flex justify-between items-center max-w-[1100px] mx-auto px-5 max-[991px]:flex-col max-[991px]:text-center max-[991px]:gap-10">
                        <div>
                            <h2 class="text-4xl font-semibold mb-4 leading-[1.1] text-white max-[991px]:text-4xl">Have a <span class="text-tp-red">vision</span> in mind?</h2>
                            <p class="text-[24px] text-[#888] m-0 font-normal max-w-[500px] max-[991px]:mx-auto">Let's turn your ideas into digital reality. We are ready when you are.</p>
                        </div>
                        <div>
                            <a href="#sec-contact" class="inline-flex items-center gap-[15px] bg-white text-black py-[18px] px-[45px] rounded-full font-bold text-base uppercase tracking-wider transition-all duration-[400ms] ease-[cubic-bezier(0.165,0.84,0.44,1)] no-underline border border-transparent hover:bg-tp-red hover:text-black hover:-translate-y-1.5 hover:shadow-[0_15px_30px_rgba(230,57,70,0.3)]">Start Your Project <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
            </section>

            {{-- CINEMATIC FILMS GALLERY --}}
            <section class="films-showcase-section sec-padding" id="sec-work-filter">
                <div class="container">
                    <div class="section-header-modern" style="margin-bottom: 60px;">
                        <h2 style="color: #111; font-size: 48px; text-transform: uppercase;">Directing <br><span class="txt-red">Attention.</span></h2>
                    </div>

                    <div class="cinema-grid">
                        
                        <!-- Featured Film: Ramaeri (Best Work) -->
                        <div class="film-item wide" style="border: 1px solid rgba(229, 9, 20, 0.3); background: rgba(229, 9, 20, 0.05); position: relative; margin-bottom: 60px;">
                            <div class="film-badge" style="position: absolute; top: -12px; left: 30px; background: #e50914; color: #fff; padding: 4px 12px; font-weight: 700; font-size: 11px; text-transform: uppercase; border-radius: 2px; letter-spacing: 1px; z-index: 5;">
                                Masterpiece
                            </div>
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="UJtRgvgHdxQ">
                                        <img src="https://img.youtube.com/vi/UJtRgvgHdxQ/hqdefault.jpg" alt="Ramaeri Shoot" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-content">
                                    <h3 style="color: #e50914;">Ramaeri Brand Shoot</h3>
                                    <p>Our best work to date. A cinematic journey.</p>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Film 01: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="NyQYfrLnvvQ">
                                        <img src="https://img.youtube.com/vi/NyQYfrLnvvQ/hqdefault.jpg" alt="Film 1" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">01</div>
                                <div class="film-content">
                                    <h3>Film Shoot - Monko Dog</h3>
                                    <p>A masterpiece of motion and emotion.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Film 02: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="7OiAfYltdRU">
                                        <img src="https://img.youtube.com/vi/7OiAfYltdRU/hqdefault.jpg" alt="Film 2" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">02</div>
                                <div class="film-content">
                                    <h3>Coporate Film - Good Earth Infra</h3>
                                    <p>Corporate film for Good Earth Infra.</p>
                                </div>
                            </div>
                        </div>
                        <!-- Film 03: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="uOqppmAt2eI">
                                        <img src="https://img.youtube.com/vi/uOqppmAt2eI/hqdefault.jpg" alt="Film 3" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">03</div>
                                <div class="film-content">
                                    <h3>Impact Production</h3>
                                    <p>High stakes, higher quality.</p>
                                </div>
                            </div>
                        </div>

                        <!-- Film 04: The Closer (Wide) -->

                        <!-- Film 0: Medium -->
                        <div class="film-item medium">
                            <div class="film-card-cinema">
                                <div class="film-iframe-wrap">
                                    <div class="youtube-facade" data-video-id="-SHrTmRWpaI">
                                        <img src="https://img.youtube.com/vi/-SHrTmRWpaI/hqdefault.jpg" alt="Film 4" loading="lazy">
                                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                    </div>
                                </div>
                            </div>
                            <div class="film-meta">
                                <div class="film-index">04</div>
                                <div class="film-content">
                                    <h3>Corporate Shoot - Bollhoff</h3>
                                    <p>Industrial excellence captured.</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- REELS SHOWCASE SECTION --}}
            <section class="reels-showcase-section sec-padding">
                <div class="container">
                    <div class="section-header-modern" style="margin-bottom: 60px;">
                        <h2 style="color: #111; font-size: 48px; text-transform: uppercase;">Micro <br><span class="txt-red">Moments.</span></h2>
                        <p class="sub-text">Reels, short-form video ads and social media video production for brands in Gurgaon and Gurugram — built to stop the scroll.</p>
                    </div>

                    <div class="reels-grid">
                        <!-- Reel 1 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="_UagDA4XyFM">
                                    <img src="https://img.youtube.com/vi/_UagDA4XyFM/hqdefault.jpg" alt="Ramaeri digital film reel — Thumbpin short-form video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Ramaeri Digital Film</h3>
                            <div class="reel-index">01</div>
                        </div>

                        <!-- Reel 2 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="MoEvrnlSy7U">
                                    <img src="https://img.youtube.com/vi/MoEvrnlSy7U/hqdefault.jpg" alt="Fashion film reel — Thumbpin short-form video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Fashion Film</h3>
                            <div class="reel-index">02</div>
                        </div>

                        <!-- Reel 3 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="sQcTZugZne0">
                                    <img src="https://img.youtube.com/vi/sQcTZugZne0/hqdefault.jpg" alt="College Vidya brand film reel — Thumbpin short-form video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">College Vidya Film</h3>
                            <div class="reel-index">03</div>
                        </div>

                        <!-- CTA CARD: Unique Placement -->
                        <!-- CTA CARD: Unique Placement -->
                        <div class="reel-item-modern reel-cta-box" style="display: flex; align-items: center; justify-content: center; background: #fff; border: 2px solid #eee; position: relative; overflow: hidden; min-height: 480px; box-shadow: 0 10px 30px rgba(0,0,0,0.05);">
                            
                            <div class="reel-cta-content" style="text-align: center; position: relative; z-index: 2; padding: 30px;">
                                <div class="cta-icon" style="color: var(--tp-red); font-size: 48px; margin-bottom: 25px; line-height: 1;">
                                    ✦
                                </div>
                                <h3 style="color: #111; font-size: 32px; font-weight: 800; margin-bottom: 12px; line-height: 1.1; text-transform: uppercase;">Your Brand.<br> <span style="color: var(--tp-red);">Next.</span></h3>
                                <p style="color: #666; font-size: 16px; margin-bottom: 35px; font-weight: 500;">Create impact with every second.</p>
                                <a href="#sec-contact" class="btn-primary" style="padding: 14px 35px; font-size: 14px; letter-spacing: 1px; text-transform: uppercase; font-weight: 700; background: var(--tp-red); color: #fff; border: none; border-radius: 4px; box-shadow: 0 5px 15px rgba(229,9,20,0.3);">Get Started</a>
                            </div>
                        </div>

                        <!-- Reel 4 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="V_-e9JaCnuM">
                                    <img src="https://img.youtube.com/vi/V_-e9JaCnuM/hqdefault.jpg" alt="Vserv brand reel — Thumbpin short-form video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Vserv Brand Reel</h3>
                            <div class="reel-index">04</div>
                        </div>

                        <!-- Reel 5 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="Oj4FmmUoCKA">
                                    <img src="https://img.youtube.com/vi/Oj4FmmUoCKA/hqdefault.jpg" alt="Short-form social media content reel — Thumbpin video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Short-Form Social Content</h3>
                            <div class="reel-index">05</div>
                        </div>

                        <!-- Reel 6 -->
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="CiKv3ezY9b8">
                                    <img src="https://img.youtube.com/vi/CiKv3ezY9b8/hqdefault.jpg" alt="Short film reel — Thumbpin video production Gurgaon" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Short Film Reel</h3>
                            <div class="reel-index">06</div>
                        </div>
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="ee1nPF5evyQ">
                                    <img src="https://img.youtube.com/vi/ee1nPF5evyQ/hqdefault.jpg" alt="Vserv Dubai brand reel — Thumbpin short-form video production" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Vserv Dubai Reel</h3>
                            <div class="reel-index">07</div>
                        </div>
                        <div class="reel-item-modern">
                            <div class="reel-card-modern">
                                <div class="youtube-facade" data-video-id="4T8YyPqliog">
                                    <img src="https://img.youtube.com/vi/4T8YyPqliog/hqdefault.jpg" alt="Short film reel — Thumbpin video production Gurgaon" loading="lazy">
                                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                                </div>
                            </div>
                            <h3 class="sr-only">Short Film Reel</h3>
                            <div class="reel-index">08</div>
                        </div>
                    </div>
                </div>
            </section>

            {{-- ================= QUICK LINKS SECTION ================= --}}
            <section class="bg-white py-[100px] px-6">
                <div class="container max-w-5xl mx-auto">
                    <div class="mb-[60px] pl-5 border-l-[3px] border-tp-red max-[768px]:mb-10">
                        <h2 class="text-2xl uppercase tracking-[2px] m-0 font-extrabold">Explore Our Work</h2>
                    </div>
                    <ul class="list-none p-0 m-0 border-t border-black max-[768px]:border-t max-[768px]:border-[#ccc]">
                        @foreach ([
                            ['route' => 'digital', 'label' => 'Digital'],
                            ['route' => 'branding', 'label' => 'Branding'],
                            ['route' => 'print', 'label' => 'Print'],
                            ['route' => 'website', 'label' => 'Website'],
                            ['route' => 'film', 'label' => 'Film'],
                            ['route' => 'awards', 'label' => 'Awards'],
                        ] as $link)
                        <li class="group border-b border-black transition-colors duration-300 hover:bg-black max-[768px]:border-[#ccc]">
                            <a href="{{ route($link['route']) }}" class="flex justify-between items-center py-[30px] px-5 no-underline text-black relative overflow-hidden">
                                <h3 class="text-[clamp(32px,5vw,80px)] font-black uppercase m-0 leading-none transition-transform duration-[400ms] ease-[cubic-bezier(0.165,0.84,0.44,1)] group-hover:text-white group-hover:translate-x-5 max-[768px]:text-3xl">{{ $link['label'] }}</h3>
                                <div class="text-4xl opacity-0 -translate-x-5 transition-all duration-[400ms] ease-[cubic-bezier(0.165,0.84,0.44,1)] text-tp-red group-hover:opacity-100 group-hover:translate-x-0 max-[768px]:text-2xl">&rarr;</div>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </section>

            
            <div class="sec-works" id="sec-works">
                 <div class="services-header hee">
                    <h2 style="color: #fff;">Featured <span class="text-red">Work</span></h2>
                    <p style="color: #999;">Big ideas. Bigger results.</p>
                </div>

                <div class="square-gallery">
                    <div class="marquee-row marquee-row-1">
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                        @for ($i = 1; $i <= 4; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                    </div>

                    <div class="marquee-row marquee-row-2">
                        @for ($i = 5; $i <= 8; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                        @for ($i = 5; $i <= 8; $i++)
                            <div class="square-item">
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                            </div>
                        @endfor
                    </div>
                </div>

                {{-- Mobile Vertical Marquee Grid --}}
                <div class="social-vertical-grid">
                    <div class="social-col">
                        <div class="social-col-inner animate-up">
                            @for ($j=0; $j<4; $j++)
                                @for ($i = 1; $i <= 4; $i++) 
                                    <div class="square-item">
                                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                                    </div>
                                @endfor
                            @endfor
                        </div>
                    </div>
                    <div class="social-col">
                        <div class="social-col-inner animate-down">
                            @for ($j=0; $j<4; $j++)
                                @for ($i = 5; $i <= 8; $i++) 
                                    <div class="square-item">
                                        <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                                    </div>
                                @endfor
                            @endfor
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="featured-work-grid">
                        <!-- Item 1 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-content">
                                    <span class="work-cat">Branding / Identity</span>
                                    <h3 class="work-title">Tobako House</h3>
                                    <p class="work-desc">Premium retail assortment of cigars and hookah. Redefining luxury for the modern consumer.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-1.webp" alt="Tobako House">
                                </div>
                            </div>
                        </a>
                        <!-- Item 2 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-2.webp" alt="Mr Furniture" id="mr-furniture-img">
                                </div>
                                <div class="work-content">
                                    <span class="work-cat">Manufacturing</span>
                                    <h3 class="work-title">Mr Furniture</h3>
                                    <p class="work-desc">Dubai-based office furniture customisation. Streamlining the workspace with elegance.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                            </div>
                        </a>
                        <!-- Item 3 -->
                        <a href="{{ route('work') }}" class="work-item-link">
                            <div class="work-item">
                                <div class="work-content">
                                    <span class="work-cat">App Design / UI</span>
                                    <h3 class="work-title">Bloom</h3>
                                    <p class="work-desc">App designed to guide healthy habits & peace. A journey to self-discovery.</p>
                                    <span class="work-link">View Case Study</span>
                                </div>
                                <div class="work-img">
                                    <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/our-work-3.webp" alt="Bloom">
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>









            {{-- Portfolio Section - Featured Work --}}
            {{-- Portfolio Section - NEW Minimal Design --}}
            <section class="bg-[#050505] py-[120px] overflow-hidden" id="portfolio">
                <div class="container">
                    <div class="reveal text-left mb-[100px] pb-5 border-b border-white/10">
                        <h2 class="text-[clamp(32px,5vw,64px)] font-light text-white m-0 tracking-[-1px]">Selected <strong class="font-extrabold text-tp-red">Work.</strong></h2>
                    </div>

                    <div class="flex flex-col gap-[150px] max-[991px]:gap-[100px]">

                        <!-- Case 1 -->
                        <div class="reveal group grid grid-cols-[1.2fr_0.8fr] gap-[60px] items-center max-[991px]:grid-cols-1 max-[991px]:gap-[30px]">
                            <div class="relative bg-black rounded overflow-hidden aspect-video shadow-[0_30px_60px_rgba(0,0,0,0.5)] border border-white/[0.08] cursor-pointer transition-transform duration-[600ms] ease-[cubic-bezier(0.2,1,0.3,1)] hover:scale-[1.02] hover:border-white/20 [&:hover_.play-btn]:opacity-100 [&:hover_.play-btn]:scale-100" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/casestudy2.mp4')">
                                <video muted loop playsinline preload="none" class="lazy-video w-full h-full object-contain block">
                                    <source data-src="https://assets.thumbpin.in/thumbpin-videos/casestudy2.mp4" type="video/mp4">
                                </video>
                                <div class="play-btn absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-90 w-[70px] h-[70px] bg-white/10 backdrop-blur-[10px] rounded-full flex items-center justify-center text-white opacity-0 transition-all duration-[400ms] border border-white/20 max-[991px]:opacity-100 max-[991px]:bg-black/50">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current ml-1"><path d="M8 5v14l11-7z"></path></svg>
                                </div>
                            </div>
                            <div class="flex flex-col justify-center items-start p-[60px] bg-[#0d0d0d] rounded border border-white/5 h-full max-[991px]:p-[40px_30px]">
                                <span class="text-[11px] uppercase tracking-[2px] text-tp-red font-bold mb-[25px] inline-block relative">Strategic Branding</span>
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/mr.png" class="w-[140px] h-auto object-contain invert brightness-[2] mb-[30px] opacity-90" alt="Mr Furniture">
                                <h3 class="text-3xl font-normal text-white mb-5 leading-[1.3]">From Newcomer to<br>Industry Leader.</h3>
                                <p class="text-base text-[#888] font-light leading-[1.7] max-w-[400px] max-[991px]:max-w-full">Strategic branding and sharp marketing helped this brand carve its niche in a competitive market.</p>
                            </div>
                        </div>

                        <!-- Case 2 (Alt Layout) -->
                        <div class="reveal group grid grid-cols-[0.8fr_1.2fr] gap-[60px] items-center max-[991px]:grid-cols-1 max-[991px]:gap-[30px]">
                            <div class="order-2 relative bg-black rounded overflow-hidden aspect-video shadow-[0_30px_60px_rgba(0,0,0,0.5)] border border-white/[0.08] cursor-pointer transition-transform duration-[600ms] ease-[cubic-bezier(0.2,1,0.3,1)] hover:scale-[1.02] hover:border-white/20 [&:hover_.play-btn]:opacity-100 [&:hover_.play-btn]:scale-100 max-[991px]:order-1" onclick="openVideoModal('https://assets.thumbpin.in/thumbpin-videos/casestudy1.mp4')">
                                <video muted loop playsinline preload="none" class="lazy-video w-full h-full object-contain block">
                                    <source data-src="https://assets.thumbpin.in/thumbpin-videos/casestudy1.mp4" type="video/mp4">
                                </video>
                                <div class="play-btn absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 scale-90 w-[70px] h-[70px] bg-white/10 backdrop-blur-[10px] rounded-full flex items-center justify-center text-white opacity-0 transition-all duration-[400ms] border border-white/20 max-[991px]:opacity-100 max-[991px]:bg-black/50">
                                    <svg viewBox="0 0 24 24" class="w-6 h-6 fill-current ml-1"><path d="M8 5v14l11-7z"></path></svg>
                                </div>
                            </div>
                            <div class="order-1 flex flex-col justify-center items-end text-right p-[60px] bg-[#0d0d0d] rounded border border-white/5 h-full max-[991px]:order-2 max-[991px]:items-start max-[991px]:text-left max-[991px]:p-[40px_30px]">
                                <span class="text-[11px] uppercase tracking-[2px] text-tp-red font-bold mb-[25px] inline-block relative">Viral Campaign</span>
                                <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/21.png" class="w-[140px] h-auto object-contain invert brightness-[2] mb-[30px] opacity-90" alt="College Vidya">
                                <h3 class="text-3xl font-normal text-white mb-5 leading-[1.3]">An April Fool's Prank<br>That Sparked Conversation.</h3>
                                <p class="text-base text-[#888] font-light leading-[1.7] max-w-[400px] max-[991px]:max-w-full">Record-breaking engagement and real impact through a bold and calculated viral marketing campaign.</p>
                            </div>
                        </div>

                    </div>
                </div>
            </section>

            {{-- CONTACT --}}
            <section class="relative overflow-hidden bg-[#f7f7f7] py-[120px] before:content-[''] before:absolute before:-top-[150px] before:-right-[100px] before:w-[600px] before:h-[600px] before:[background:radial-gradient(circle,rgba(206,45,51,0.06)_0%,transparent_65%)] before:pointer-events-none after:content-[''] after:absolute after:-bottom-[150px] after:-left-[100px] after:w-[500px] after:h-[500px] after:[background:radial-gradient(circle,rgba(206,45,51,0.04)_0%,transparent_65%)] after:pointer-events-none max-[860px]:py-20 max-[480px]:py-[60px]" id="sec-contact">
                <div class="absolute inset-0 bg-transparent"></div>
                <div class="relative z-[2] max-w-[1100px] mx-auto grid grid-cols-[1fr_1.1fr] gap-[60px] items-start px-5 max-[860px]:grid-cols-1 max-[860px]:gap-10" data-aos="fade-up">

                    {{-- LEFT: Copy & Perks --}}
                    <div class="pt-2.5">
                        <span class="text-[11px] font-bold tracking-[3px] uppercase text-tp-red mb-5 inline-block bg-tp-red/[0.06] py-1.5 px-3.5 rounded">Let's Create Together</span>
                        <h2 class="text-[clamp(38px,5vw,58px)] font-extrabold uppercase leading-[1.05] text-[#111] mb-6 tracking-[-2px] max-[480px]:text-[30px] max-[480px]:tracking-[-1px]">Ready to Build<br>Something <span class="text-tp-red">Great?</span></h2>
                        <p class="text-[#666] text-[15px] leading-[1.7] mb-4 max-w-[400px] max-[860px]:max-w-full">You have a vision — we have the strategy, creativity, and firepower to make it real. Drop us a brief — no strings attached.</p>
                        <div class="flex flex-col gap-3 pt-2 border-t border-[#e0e0e0]">
                            <a href="https://www.google.com/maps/search/?api=1&query=Beyond+Just+Work+Tower+A+Spaze+iTech+park+Sector+49+Gurgaon" target="_blank" class="text-sm text-[#888] no-underline transition-colors duration-[250ms] flex items-start gap-2.5 font-medium hover:text-tp-red [&_svg]:text-tp-red">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="mt-[3px] shrink-0"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"/><circle cx="12" cy="10" r="3"/></svg>
                                <span>6th Floor, office no. 657, Tower B1, Spaze I-Tech Park, Sector 49, Gurugram, Haryana 122018</span>
                            </a>
                            <a href="tel:+919773511447" class="text-sm text-[#888] no-underline transition-colors duration-[250ms] flex items-center gap-2.5 font-medium hover:text-tp-red [&_svg]:text-tp-red">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.81a16 16 0 0 0 6.29 6.29l.95-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                                +91 97735 11447
                            </a>
                            <a href="mailto:brajesh@thumbpin.in" class="text-sm text-[#888] no-underline transition-colors duration-[250ms] flex items-center gap-2.5 font-medium hover:text-tp-red [&_svg]:text-tp-red">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                                brajesh@thumbpin.in
                            </a>
                        </div>
                    </div>

                    {{-- RIGHT: Form Card --}}
                    <div class="relative bg-white border border-[#eaeaea] rounded-[20px] p-11 shadow-[0_20px_60px_rgba(0,0,0,0.06),0_1px_3px_rgba(0,0,0,0.04)] before:content-[''] before:absolute before:top-0 before:left-0 before:right-0 before:h-1 before:[background:linear-gradient(90deg,#ce2d33,#ff6b6b,#ce2d33)] before:rounded-t-[20px] max-[860px]:p-7 max-[860px]:px-5 max-[480px]:p-6 max-[480px]:px-4 max-[480px]:rounded-2xl">
                        <div id="form-messages" class="form-messages"></div>

                        <form action="{{ route('project-form') }}" method="post" id="homeContactForm">
                            @csrf
                            <input type="hidden" name="url" value="{{ Request::url() }}">
                            <div class="grid grid-cols-2 gap-3.5 max-[860px]:grid-cols-1 max-[860px]:gap-0">
                                <div class="relative mb-5"><input type="text" id="inp-name" name="name" placeholder="Your Name *" required class="w-full bg-[#f9f9f9] border-[1.5px] border-[#e8e8e8] rounded-[10px] text-[#222] text-[15px] font-[family-name:var(--font-body)] py-4 px-[18px] transition-[border-color,background,box-shadow] duration-[250ms] appearance-none box-border placeholder:text-[#aaa] placeholder:text-[13px] placeholder:tracking-[0.3px] focus:outline-none focus:border-tp-red focus:bg-white focus:shadow-[0_0_0_3px_rgba(206,45,51,0.08)] max-[860px]:py-[14px] max-[860px]:px-[15px] max-[860px]:text-sm"></div>
                                <div class="relative mb-5"><input type="text" name="company_name" placeholder="Brand / Company" class="w-full bg-[#f9f9f9] border-[1.5px] border-[#e8e8e8] rounded-[10px] text-[#222] text-[15px] font-[family-name:var(--font-body)] py-4 px-[18px] transition-[border-color,background,box-shadow] duration-[250ms] appearance-none box-border placeholder:text-[#aaa] placeholder:text-[13px] placeholder:tracking-[0.3px] focus:outline-none focus:border-tp-red focus:bg-white focus:shadow-[0_0_0_3px_rgba(206,45,51,0.08)] max-[860px]:py-[14px] max-[860px]:px-[15px] max-[860px]:text-sm"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-3.5 max-[860px]:grid-cols-1 max-[860px]:gap-0">
                                <div class="relative mb-5"><input type="email" name="email" placeholder="Email Address *" required class="w-full bg-[#f9f9f9] border-[1.5px] border-[#e8e8e8] rounded-[10px] text-[#222] text-[15px] font-[family-name:var(--font-body)] py-4 px-[18px] transition-[border-color,background,box-shadow] duration-[250ms] appearance-none box-border placeholder:text-[#aaa] placeholder:text-[13px] placeholder:tracking-[0.3px] focus:outline-none focus:border-tp-red focus:bg-white focus:shadow-[0_0_0_3px_rgba(206,45,51,0.08)] max-[860px]:py-[14px] max-[860px]:px-[15px] max-[860px]:text-sm"></div>
                                <div class="relative mb-5"><input type="tel" name="mobile" placeholder="Phone Number *" required class="w-full bg-[#f9f9f9] border-[1.5px] border-[#e8e8e8] rounded-[10px] text-[#222] text-[15px] font-[family-name:var(--font-body)] py-4 px-[18px] transition-[border-color,background,box-shadow] duration-[250ms] appearance-none box-border placeholder:text-[#aaa] placeholder:text-[13px] placeholder:tracking-[0.3px] focus:outline-none focus:border-tp-red focus:bg-white focus:shadow-[0_0_0_3px_rgba(206,45,51,0.08)] max-[860px]:py-[14px] max-[860px]:px-[15px] max-[860px]:text-sm"></div>
                            </div>
                            <div class="relative mb-5">
                                <textarea name="requirement" id="inp-req" rows="3" placeholder="Tell us about your project... *" required class="w-full bg-[#f9f9f9] border-[1.5px] border-[#e8e8e8] rounded-[10px] text-[#222] text-[15px] font-[family-name:var(--font-body)] py-4 px-[18px] transition-[border-color,background,box-shadow] duration-[250ms] appearance-none box-border placeholder:text-[#aaa] placeholder:text-[13px] placeholder:tracking-[0.3px] focus:outline-none focus:border-tp-red focus:bg-white focus:shadow-[0_0_0_3px_rgba(206,45,51,0.08)] resize-y min-h-[90px] max-[860px]:py-[14px] max-[860px]:px-[15px] max-[860px]:text-sm"></textarea>
                            </div>

                            <button type="submit" class="w-full py-4 bg-tp-red text-white border-none rounded-[10px] text-[15px] font-bold tracking-wider uppercase cursor-pointer transition-all duration-300 mt-1.5 shadow-[0_4px_15px_rgba(206,45,51,0.2)] hover:bg-[#b22228] hover:-translate-y-0.5 hover:shadow-[0_8px_25px_rgba(206,45,51,0.3)] max-[860px]:py-[14px] max-[860px]:text-sm">Send Message &rarr;</button>

                            <div class="flex gap-2.5 mt-3.5">
                                <button type="button" onclick="resetHomeForm()" class="flex-1 flex items-center justify-center gap-1.5 py-3 bg-[#f4f4f4] border border-[#e0e0e0] rounded-[10px] text-[#888] text-xs font-bold uppercase cursor-pointer transition-colors duration-[250ms] hover:bg-[#e8e8e8] hover:text-[#555]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                                    Reset
                                </button>
                                <a href="https://api.whatsapp.com/send?phone=919773511447" target="_blank" class="flex-1 flex items-center justify-center gap-1.5 py-3 bg-[#25d366]/[0.06] border border-[#25d366]/20 rounded-[10px] text-[#1da851] text-xs font-bold uppercase no-underline transition-colors duration-[250ms] hover:bg-[#25d366]/[0.12] hover:text-[#178a42]">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.34-1.272l-.31-.186-2.828.84.84-2.828-.186-.31A8 8 0 1112 20z"/></svg>
                                    WhatsApp Us
                                </a>
                            </div>
                        </form>
                    </div>

                </div>
            </section>


            {{-- Testimonials Section --}}
            <section class="testimonials-section">
                <div class="services-header">
                    <h2 style="color: #000;">Testimonials</h2>
                </div>

                @php
                $testimonials = [
                    ['name' => 'Sarthak garg', 'role' => 'Co-founder, College Vidya', 'img' => '21.png', 'text' => 'Brajesh has a very sharp eye to find out whats hidden, Their team did our brand audit and since then we grown as a brand then just a name. The energy is at peak at even 2AM. More Power to team.'],
                    ['name' => 'Prasad Duja Bhandari', 'role' => 'CEO, Mr. Furniture', 'img' => 'mr.png', 'text' => 'Thumbpin have helped us grow through five years they handled all things for us. Not just marketing but ideas for business and understand better at strategy front we have loved.  More years to go together.'],
                    ['name' => 'Vidur Khanna', 'role' => 'Director, Good Earth', 'img' => '6.png', 'text' => 'We did Rebranding from Galaxy Group to Good Earth Infra - "Building Tomorrow, Today", They did Brand Identity and Corporate Film. The Uniqueness they have it self driven. Love the energy they bring on table.'],
                    ['name' => 'Ujjwal Sitlani', 'role' => 'Founder, Ramaeri', 'img' => '22.png', 'text' => 'Thumbpin transformed our digital presence. Their innovative approach to marketing and branding helped us connect with our audience in meaningful ways, resulting in increased conversions.'],
                    ['name' => 'Anirudh Agrwal', 'role' => 'Senior Unit Manager, Bajaj Finserv', 'img' => '3.png', 'text' => 'I really appreciate the team for quick ideas as we keep running many campaigns. Should starting giving credits will be helpful for Brands. Totally recommend! 👍'],
                ];
                @endphp

                <div class="testimonials-wrapper">
                    <div class="testimonial-track" id="testiTrack">
                        @foreach($testimonials as $index => $t)
                        <div class="testi-card-v2 {{ $index == 1 ? 'active' : ($index == 0 ? 'prev' : 'next') }}" data-index="{{ $index }}">
                            <img src="https://assets.thumbpin.in/thumbpin-photos/thumbpin-upload/clients/{{$t['img']}}" alt="{{$t['name']}}" class="testi-v2-logo" loading="lazy" onerror="this.src='https://placehold.co/100?text=C'">
                            <div class="testi-v2-meta">
                                <div class="testi-v2-role">{{$t['role']}}</div>
                                <div class="testi-v2-name">{{$t['name']}}</div>
                            </div>
                            <div class="testi-v2-quote-area">
                                <p class="testi-v2-text">{{$t['text']}}</p>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="testi-controls">
                        <button class="testi-btn" id="testiPrev">&#8249;</button>
                        <button class="testi-btn" id="testiNext">&#8250;</button>
                    </div>
                </div>
            </section>


        </div> 
    </main>
    
    {{-- Video Modal --}}
    <div id="videoModal" class="video-modal">
        <div class="modal-content" id="modalContent">
            <span class="close-modal" onclick="closeVideoModal()">&times;</span>
        </div>
    </div>

@endsection

@section('script')
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <!-- iso-Tope Filter -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" xintegrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" xintegrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>
    <script src="{{ asset('assets/js/index-new.js') }}"></script>
@endsection
