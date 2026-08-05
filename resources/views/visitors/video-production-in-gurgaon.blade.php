@extends('layout.visitor', [
    'title' => 'Top Video Production House in Gurgaon | Cinematic Commercials & Corporate Films | Thumbpin',
    'description' => 'Thumbpin is a premier video production house in Gurgaon specializing in high-end corporate films, TV commercials, product shoots, and creative storytelling. Transform your brand with cinematic excellence.',
    'keywords' => 'video production house in gurgaon, corporate film makers in gurgaon, ad filmmaking gurgaon, product shoot gurgaon, podcast production gurgaon, video agency gurgaon, Thumbpin Studios',
    'hideDefaultHeader' => true,
    'hideDefaultFooter' => true,
    'hideWhatsApp' => true,
])

@section('head')
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Preconnect to external domains to save DNS/TCP/TLS handshake time -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preconnect" href="https://www.youtube.com">
<link rel="preconnect" href="https://i.ytimg.com">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Oswald:wght@500;700&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&family=Oswald:wght@500;700&display=swap" rel="stylesheet">
</noscript>

<script src="https://unpkg.com/lenis@1.1.20/dist/lenis.min.js" defer></script> 

<!-- SEO & Social Metadata -->
<meta property="og:title" content="Top Video Production House in Gurgaon | Thumbpin Studios">
<meta property="og:description" content="Cinematic corporate films, ad commercials, and creative video production services in Gurgaon.">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ Request::url() }}">
<meta property="og:image" content="{{ asset('assets/img/og-image-video-production.jpg') }}">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="Video Production House in Gurgaon | Thumbpin Studios">
<meta name="twitter:description" content="High-end corporate films and commercials. We turn concepts into cinematic reality.">

<!-- Preload LCP Asset -->
<link rel="preload" href="{{ asset('assets/video/hero-bg-new.mp4') }}" as="video" type="video/mp4">

<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@graph": [
    {
      "@type": "LocalBusiness",
      "name": "Thumbpin",
      "image": "{{ asset('assets/img/logo/favicon.jpeg') }}",
      "@id": "{{ config('app.url') }}/#organization",
      "url": "{{ config('app.url') }}/",
      "telephone": "+91 97735 11447",
      "address": {
        "@type": "PostalAddress",
        "streetAddress": "6th Floor, Office No. 657, Tower B1, Spaze I-Tech Park, Sector 49",
        "addressLocality": "Gurugram",
        "addressRegion": "Haryana",
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
        "opens": "09:00",
        "closes": "19:00"
      },
      "sameAs": [
        "https://www.facebook.com/thumbpinstudios",
        "https://www.instagram.com/thumbpinstudios",
        "https://www.linkedin.com/company/thumbpinstudios"
      ]
    },
    {
      "@type": "Service",
      "serviceType": "Video Production",
      "provider": {
        "@id": "{{ config('app.url') }}/#organization"
      },
      "areaServed": "Gurgaon",
      "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Video Production Services",
        "itemListElement": [
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Corporate Film Production"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Ad Commercials & TVC"
            }
          },
          {
            "@type": "Offer",
            "itemOffered": {
              "@type": "Service",
              "name": "Product Photography & Videography"
            }
          }
        ]
      }
    },
    {
      "@type": "BreadcrumbList",
      "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "{{ config('app.url') }}"
      },{
        "@type": "ListItem",
        "position": 2,
        "name": "Video Production Gurgaon",
        "item": "{{ Request::url() }}"
      }]
    }
  ]
}
</script>

<style>
:root {
    --primary-red: #E50914; /* Netflix Red style */
    --primary-red-dim: #b2070f;
    --dark-bg: #050505;
    --card-bg: #111;
    --text-white: #ffffff;
    --text-black: #111111;
    --white-bg: #f4f4f4;
    --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
}

* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

html {
    overflow-x: hidden;
    width: 100%;
}

@media (min-width: 768px) {
    html {
        scroll-behavior: smooth;
    }
}

html, body {
    margin: 0;
    padding: 0;
    font-family: 'Poppins', sans-serif;
    background-color: #030303;
    color: #fff;
    overflow-x: hidden;
    touch-action: pan-y; /* Ensure vertical swipe is always captured by the browser */
}

/* === ENSURE SMOOTH SCROLL IS NEVER BLOCKED === */
video, .noise-overlay, .hero-overlay {
    pointer-events: none;
}

.lenis-scrolling iframe, 
.lenis-scrolling .youtube-facade, 
.lenis-scrolling .magnetic-wrap,
.lenis-scrolling .perf-card,
.lenis-scrolling .genre-card,
.lenis-scrolling .podcast-card,
.lenis-scrolling .product-item {
    pointer-events: none !important; /* Block all interactions while scrolling */
}

.magnetic-wrap, .play-reel-btn, .nav-cta, .nav-link, button, input, select, textarea, a, .youtube-facade {
    pointer-events: auto;
}


/* === CINEMATIC NOISE OVERLAY === */
.noise-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 9000;
    opacity: 0.05;
    background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 200 200' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='noiseFilter'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.65' numOctaves='3' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23noiseFilter)'/%3E%3C/svg%3E");
    will-change: transform; /* Performance optimization */
}


/* Hide default header */
.main-header, .navbar, nav:not(.custom-nav), header {
    display: none !important;
}



/* === UTILITY === */
.text-red { color: var(--primary-red) !important; }
.font-oswald { font-family: 'Oswald', sans-serif; }
.bg-white-section { background-color: var(--white-bg); color: var(--text-black); }

.reveal {
    opacity: 0;
    transform: translateY(40px);
    transition: all 0.8s ease;
}

.reveal.active {
    opacity: 1;
    transform: translateY(0);
}

/* === NAVBAR === */
.custom-nav {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    padding: 25px 50px;
    display: flex;
    justify-content: space-between;
    align-items: center;
    z-index: 1000;
    transition: var(--transition-smooth);
    background: linear-gradient(to bottom, rgba(0,0,0,0.8), transparent);
}

.custom-nav.scrolled {
    background: rgba(0, 0, 0, 0.9);
    border-bottom: 1px solid #222;
    padding: 15px 50px;
}

/* Added Flex Layout for Nav Menu */
.nav-menu {
    display: flex;
    align-items: center;
}

.nav-link {
    color: #fff;
    text-decoration: none;
    font-size: 13px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin: 0 15px;
    position: relative;
    mix-blend-mode: difference;
}

.nav-link::after {
    content: '';
    position: absolute;
    width: 0;
    height: 2px;
    bottom: -5px;
    left: 0;
    background-color: var(--primary-red);
    transition: width 0.3s;
}

.nav-link:hover::after {
    width: 100%;
}

.nav-cta {
    padding: 12px 30px;
    background: var(--primary-red);
    color: #fff;
    font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    clip-path: polygon(10% 0, 100% 0, 100% 100%, 0% 100%);
    transition: 0.3s;
    display: inline-block;
}

.nav-cta:hover {
    background: #fff;
    color: #000;
}

/* MAGNETIC BUTTON */
.magnetic-wrap {
    display: inline-block;
}

/* === CINEMATIC HERO === */
.hero-section {
    height: 100vh;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
    background: #000;
}

.hero-bg-video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
    opacity: 0.5;
    filter: contrast(1.2) saturate(0);
    transition: 0.5s;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: radial-gradient(circle, transparent 0%, #000 90%);
    z-index: 1;
}

.hero-content {
    position: relative;
    z-index: 3;
    text-align: center;
    max-width: 1400px;
    padding: 0 20px;
}

/* GLITCH TEXT EFFECT */
.glitch-wrapper {
    position: relative;
}

.hero-title {
    font-family: 'Oswald', sans-serif;
    font-size: 130px;
    font-weight: 700;
    line-height: 0.85;
    text-transform: uppercase;
    margin-bottom: 30px;
    position: relative;
    color: #fff;
    mix-blend-mode: lighten;
}

.hero-title span {
    color: transparent;
    -webkit-text-stroke: 2px rgba(255,255,255,0.8);
}

.play-reel-btn {
    display: inline-flex;
    align-items: center;
    gap: 20px;
    margin-top: 40px;
    cursor: pointer;
    transition: 0.3s;
}

.play-icon {
    width: 70px;
    height: 70px;
    border: 1px solid rgba(255,255,255,0.3);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: 0.3s;
    backdrop-filter: blur(5px);
}

.play-reel-btn:hover .play-icon {
    background: var(--primary-red);
    border-color: var(--primary-red);
    transform: scale(1.1);
}

/* === MANIFESTO SECTION (NEW - WHITE) === */
.manifesto-section {
    background-color: var(--white-bg);
    color: var(--text-black);
    padding: 100px 20px;
    position: relative;
    overflow: hidden;
}

.manifesto-text {
    font-size: 60px;
    font-family: 'Oswald', sans-serif;
    line-height: 1.1;
    text-transform: uppercase;
    max-width: 1100px;
    margin: 0 auto;
    font-weight: 700;
}
.manifesto-text span {
    color: var(--primary-red);
}

.marquee-container {
    overflow: hidden;
    white-space: nowrap;
    position: absolute;
    bottom: 20px;
    left: 0;
    width: 100%;
    opacity: 0.1;
    font-size: 150px;
    font-family: 'Oswald', sans-serif;
    font-weight: 900;
    pointer-events: none;
}

/* === CLIENT LOGO STRIP === */
.client-strip {
    background: #0a0a0a;
    padding: 60px 0;
    border-bottom: 1px solid #222;
}
.client-grid-top {
    max-width: 1300px;
    margin: 0 auto 40px;
    text-align: center;
}
.client-grid {
    display: flex;
    flex-direction: column;
    gap: 40px;
    max-width: 1400px;
    margin: 0 auto;
    padding: 0 20px;
}
.client-row {
    display: flex;
    justify-content: center;
    align-items: center;
    flex-wrap: wrap;
    gap: 30px;
}
.client-logo {
    width: 180px;
    height: 100px;
    opacity: 0.6;
    filter: grayscale(100%) invert(1);
    transition: 0.3s;
    object-fit: contain;
}
@media (max-width: 991px) {
    .client-logo { width: 140px; height: 60px; }
    .client-row { gap: 30px; }
    .client-grid { gap: 30px; }
}
@media (max-width: 767px) {
    .client-strip { padding: 40px 0; }
    .client-grid-top { margin-bottom: 20px; }
    .client-grid-top h2 { font-size: 24px; padding: 0 20px; }
    
    .client-grid {
        overflow-x: auto;
        padding-bottom: 20px;
        -webkit-overflow-scrolling: touch;
        scroll-snap-type: x mandatory;
        width: 100vw;
        margin-left: -20px;
        padding-left: 20px;
    }
    .client-grid::-webkit-scrollbar { display: none; }
    .client-grid { -ms-overflow-style: none; scrollbar-width: none; }

    .client-row {
        flex-wrap: nowrap;
        width: max-content;
        gap: 20px;
        padding-right: 20px;
    }
    .client-logo { 
        width: 150px; 
        height: 60px; 
        scroll-snap-align: center;
        opacity: 0.8; /* Slightly higher visibility on mobile */
    }
}
.client-logo:hover {
    opacity: 1;
    filter: grayscale(0%) invert(1);
    transform: scale(1.1);
}

/* === MARQUEE LOGOS === */
.marquee-container-logos {
    width: 100vw;
    max-width: 100%;
    overflow: hidden;
    position: relative;
    padding: 20px 0;
    mask-image: linear-gradient(to right, transparent, black 15%, black 85%, transparent);
}

.marquee-wrapper {
    display: flex;
    white-space: nowrap;
    width: max-content;
    will-change: transform;
}

.marquee-row-1 {
    animation: marquee-left 40s linear infinite;
}

.marquee-row-2 {
    animation: marquee-right 45s linear infinite;
    margin-top: 30px;
}

.marquee-wrapper:hover {
    animation-play-state: paused;
}

.marquee-content {
    display: flex;
    align-items: center;
    gap: 60px;
    padding-right: 60px;
}

@keyframes marquee-left {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

@keyframes marquee-right {
    0% { transform: translateX(-50%); }
    100% { transform: translateX(0); }
}

@media (max-width: 767px) {
    .marquee-content { gap: 30px; padding-right: 30px; }
    .marquee-row-2 { margin-top: 20px; }
    .marquee-row-1 { animation-duration: 25s; }
    .marquee-row-2 { animation-duration: 30s; }
}

/* === PIPELINE SECTION (WHITE VAR) === */
.pipeline-section {
    padding: 120px 20px;
    background: var(--white-bg);
    color: var(--text-black);
}

.section-header h2 {
    font-size: 60px;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    color: var(--text-black);
}

.pipeline-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    max-width: 1300px;
    margin: 0 auto;
}

.pipe-card {
    background: #fff;
    border: 1px solid #ddd;
    padding: 50px 40px;
    position: relative;
    transition: 0.4s;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
}

.pipe-card::before {
    content: '';
    position: absolute;
    top: 0; left: 0; width: 4px; height: 0%;
    background: var(--primary-red);
    transition: 0.4s;
}

.pipe-card:hover::before {
    height: 100%;
}

.pipe-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}

.pipe-step {
    font-family: 'Oswald', sans-serif;
    font-size: 60px;
    opacity: 0.1;
    position: absolute;
    top: 20px;
    right: 30px;
    color: #000;
}

/* === KINETIC TEXT DIVIDER === */
.kinetic-text-wrap {
    background: var(--primary-red);
    padding: 20px 0;
    overflow: hidden;
    transform: rotate(2deg) scale(1.1);
    margin: 50px 0;
}
.kinetic-text {
    white-space: nowrap;
    font-size: 80px;
    font-family: 'Oswald', sans-serif;
    font-weight: 700;
    color: #000;
    animation: moveText 10s linear infinite;
}
@keyframes moveText {
    0% { transform: translateX(0); }
    100% { transform: translateX(-50%); }
}

/* === THE GEAR LOCKER === */
.gear-section {
    padding: 120px 20px;
    background: #000;
    position: relative;
}
.gear-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    gap: 50px;
}
.gear-list {
    flex: 1;
}
.gear-item {
    font-size: 40px;
    font-weight: 700;
    color: #444;
    padding: 20px 0;
    border-bottom: 1px solid #222;
    cursor: pointer;
    transition: 0.3s;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
}
.gear-item:hover {
    color: #fff;
    padding-left: 20px;
}
.gear-item.active {
    color: var(--primary-red);
}
.gear-preview {
    flex: 1;
    height: 500px;
    background: #111;
    position: relative;
    overflow: hidden;
    border: 1px solid #333;
}
.gear-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0; left: 0;
    opacity: 0;
    transition: 0.5s;
    transform: scale(1.1);
}
.gear-img.show {
    opacity: 1;
    transform: scale(1);
}

/* === REVIEWS / CRITICS SECTION (NEW - WHITE) === */
.reviews-section {
    background: var(--white-bg);
    padding: 100px 20px;
    color: #111;
    text-align: center;
}
.review-grid {
    display: flex;
    justify-content: center;
    gap: 40px;
    flex-wrap: wrap;
    max-width: 1200px;
    margin: 0 auto;
}
.review-card {
    flex: 1;
    min-width: 300px;
    padding: 30px;
    background: #fff;
    border: 1px solid #eee;
    text-align: left;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}
.stars {
    color: var(--primary-red);
    margin-bottom: 15px;
    font-size: 20px;
}
.review-text {
    font-size: 18px;
    font-style: italic;
    margin-bottom: 20px;
    line-height: 1.6;
}
.reviewer {
    font-weight: 700;
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
}

/* ================= GENRE SECTIONS SHARED ================= */
.genre-section { padding: 100px 0; position: relative; overflow: hidden; }
.genre-section .container { max-width: 1300px; margin: 0 auto; padding: 0 20px; }
.genre-header { margin-bottom: 60px; }
.genre-header h2 {
    font-size: clamp(36px, 5vw, 56px);
    font-family: 'Oswald', sans-serif;
    text-transform: uppercase;
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 10px;
}
.genre-header .genre-subtitle {
    font-size: 16px;
    color: #888;
    font-weight: 400;
    max-width: 500px;
}
.genre-cta-wrap {
    text-align: center;
    margin-top: 60px;
}
.genre-cta-btn {
    display: inline-flex;
    align-items: center;
    gap: 12px;
    background: transparent;
    border: 2px solid var(--primary-red);
    color: #fff;
    padding: 16px 40px;
    font-family: 'Oswald', sans-serif;
    font-size: 16px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    text-decoration: none;
    transition: 0.3s cubic-bezier(0.23, 1, 0.32, 1);
    border-radius: 4px;
}
.genre-cta-btn:hover {
    background: var(--primary-red);
    color: #fff;
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(229,9,20,0.3);
}
.genre-cta-btn svg { width: 20px; height: 20px; transition: 0.3s; }
.genre-cta-btn:hover svg { transform: translateX(5px); }
.genre-tag {
    display: inline-block;
    font-size: 10px;
    font-weight: 700;
    letter-spacing: 2px;
    text-transform: uppercase;
    padding: 5px 12px;
    border-radius: 2px;
    margin-bottom: 15px;
}

/* === 1. PERFORMANCE / ADS / UGC — Horizontal Carousel === */
.genre-performance { background: #0a0a0a; }
.perf-scroll {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
    width: 100%;
}
.perf-scroll-wrap { 
    position: relative; 
    padding: 40px 0; 
    max-width: 1200px; 
    margin: 0 auto;
    width: 100%;
    overflow: hidden;
}
.perf-play-btn {
    position: absolute; top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 50px; height: 50px;
    background: rgba(229,9,20,0.9);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 20px; color: #fff;
    z-index: 3;
    transition: 0.3s;
}
.perf-card-thumb:hover .perf-play-btn { transform: translate(-50%,-50%) scale(1.15); }
.perf-card {
    width: 100%;
    border-radius: 16px;
    overflow: hidden;
    background: #111;
    border: 1px solid rgba(255,255,255,0.06);
    transition: transform 0.4s ease, border-color 0.3s;
    position: relative;
}
.perf-card:hover { transform: translateY(-8px); border-color: var(--primary-red); }
.perf-card-thumb {
    position: relative;
    width: 100%;
    padding-bottom: 177.77%; /* 9:16 */
    background: #000;
    overflow: hidden;
}
.perf-card-thumb img,
.perf-card-thumb video {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 100%;
    object-fit: cover;
    transition: transform 0.4s ease;
}
.perf-card:hover .perf-card-thumb img,
.perf-card:hover .perf-card-thumb video { transform: scale(1.05); }
.perf-card-thumb .youtube-facade { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.perf-card-play {
    position: absolute; top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 50px; height: 50px;
    background: rgba(229,9,20,0.9);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
}
.perf-card:hover .perf-card-play { opacity: 1; }
.perf-card-play svg { width: 18px; height: 18px; fill: #fff; margin-left: 2px; }
.perf-card-info { padding: 16px; }
.perf-card-info h4 { font-size: 15px; font-weight: 600; color: #fff; margin-bottom: 4px; }
.perf-card-info span { font-size: 11px; color: #666; text-transform: uppercase; letter-spacing: 1px; }
.perf-card .perf-type-badge {
    position: absolute; top: 12px; left: 12px;
    background: rgba(0,0,0,0.7); backdrop-filter: blur(8px);
    padding: 4px 10px; border-radius: 4px;
    font-size: 10px; font-weight: 700; color: var(--primary-red);
    text-transform: uppercase; letter-spacing: 1px; z-index: 2;
}

/* === 2. PRODUCT SHOOTS — Masonry Grid === */
.genre-product { background: #f5f5f5; }
.genre-product .genre-header h2 { color: #111; }
.genre-product .genre-subtitle { color: #666; }
.genre-product .genre-cta-btn { color: #111; }
.genre-product .genre-cta-btn:hover { color: #fff; }
.product-masonry {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    grid-template-rows: 400px 400px;
    gap: 20px;
    height: 820px;
    position: relative;
}
.product-item {
    border-radius: 8px;
    overflow: hidden;
    background: #000;
    box-shadow: 0 10px 40px rgba(0,0,0,0.06);
    transition: height 0.5s cubic-bezier(0.4, 0, 0.2, 1),
                opacity 0.4s ease,
                box-shadow 0.3s ease;
    position: relative;
    height: 400px;
    z-index: 1;
}
.product-item[data-row="bottom"] {
    align-self: end;
}
.product-item.expanded {
    height: 750px;
    z-index: 10;
    box-shadow: 0 30px 80px rgba(0,0,0,0.3);
}
.product-item.hidden-pair {
    opacity: 0;
    pointer-events: none;
}
.product-item img,
.product-item video {
    width: 100%; height: 100%; object-fit: cover; display: block;
    transition: transform 0.5s ease;
}
.product-item:hover img,
.product-item:hover video { transform: scale(1.04); }
.product-item-overlay {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 20px;
    background: linear-gradient(transparent, rgba(0,0,0,0.8));
    color: #fff;
    transition: opacity 0.3s ease;
}
.product-item-overlay h4 { font-size: 18px; font-weight: 700; margin-bottom: 2px; }
.product-item-overlay span { font-size: 12px; color: #ccc; text-transform: uppercase; letter-spacing: 1px; }

/* === 3. CORPORATE SHOOTS — Cinema Filmstrip === */
.genre-corporate { background: #060606; }
.corp-list { display: flex; flex-direction: column; gap: 80px; }
.corp-card {
    display: flex;
    align-items: center;
    gap: 50px;
    position: relative;
}
.corp-card.reverse { flex-direction: row-reverse; }
.corp-card-num {
    font-size: 120px; font-weight: 900;
    color: rgba(255,255,255,0.03);
    font-family: 'Oswald', sans-serif;
    position: absolute;
    top: -40px; left: -20px;
    line-height: 1; z-index: 0;
    transition: color 0.4s ease;
}
.corp-card:hover .corp-card-num { color: rgba(229,9,20,0.1); }
.corp-card.reverse .corp-card-num { left: auto; right: -20px; }
.corp-card-visual {
    width: 60%;
    position: relative; z-index: 1;
    border-radius: 4px; overflow: hidden;
    background: #000;
    aspect-ratio: 16/9;
}
.corp-card-visual img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.5s ease;
}
.corp-card:hover .corp-card-visual img { transform: scale(1.03); }
.corp-card-info {
    width: 40%;
    position: relative; z-index: 1;
    padding-left: 30px;
    border-left: 2px solid var(--primary-red);
}
.corp-card.reverse .corp-card-info {
    padding-left: 0; padding-right: 30px;
    border-left: none; border-right: 2px solid var(--primary-red);
    text-align: right;
}
.corp-card-info h4 { font-size: 28px; font-weight: 800; color: #fff; margin-bottom: 8px; text-transform: uppercase; font-family: 'Oswald', sans-serif; }
.corp-card-info p { font-size: 15px; color: #777; line-height: 1.6; }

/* === 4. SHORT CONTENT / ORGANIC — Phone Frame Grid === */
.genre-short { background: #0d0d0d; }
.phone-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 30px;
}
.phone-frame {
    background: #1a1a1a;
    border-radius: 24px;
    overflow: hidden;
    padding: 10px;
    border: 2px solid #222;
    transition: border-color 0.3s, transform 0.4s;
    position: relative;
}
.phone-frame:hover { border-color: var(--primary-red); transform: translateY(-6px); }
.phone-notch {
    width: 100px; height: 20px;
    background: #1a1a1a;
    border-radius: 0 0 12px 12px;
    margin: 0 auto;
    position: relative; z-index: 2;
}
.phone-screen {
    position: relative;
    width: 100%;
    padding-bottom: 177.77%; /* 9:16 */
    background: #000;
    border-radius: 16px;
    overflow: hidden;
}
.phone-screen img {
    position: absolute; top: 0; left: 0;
    width: 100%; height: 100%;
    object-fit: cover;
}
.phone-meta {
    padding: 12px 8px;
    display: flex; justify-content: space-between; align-items: center;
}
.phone-meta h4 { font-size: 13px; color: #fff; font-weight: 600; }
.phone-meta .phone-views { font-size: 11px; color: #666; }
.phone-play-overlay {
    position: absolute; top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 46px; height: 46px;
    background: rgba(255,255,255,0.15);
    backdrop-filter: blur(8px);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    opacity: 0; transition: opacity 0.3s;
}
.phone-frame:hover .phone-play-overlay { opacity: 1; }
.phone-play-overlay svg { width: 16px; height: 16px; fill: #fff; margin-left: 2px; }

/* === 5. LIFESTYLE VIDEOS — Immersive Stacked === */
.genre-lifestyle { background: #f0ede8; }
.genre-lifestyle .genre-header h2 { color: #2a2a2a; }
.genre-lifestyle .genre-subtitle { color: #777; }
/* === 5+6. LIFESTYLE & BRAND — Unified Bento Grid === */
.genre-lifestyle-brand { background: #080808; }
.genre-lifestyle-brand .genre-header h2 { color: #fff; }
.genre-lifestyle-brand .genre-subtitle { color: #888; }
.lb-bento {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-auto-rows: 220px;
    gap: 16px;
}
.lb-item {
    position: relative;
    border-radius: 10px;
    overflow: hidden;
    background: #111;
    border: 1px solid rgba(255,255,255,0.06);
    transition: border-color 0.3s ease, transform 0.3s ease;
    cursor: pointer;
}
.lb-item:hover {
    border-color: var(--primary-red);
    transform: translateY(-3px);
}
.lb-item.portrait { grid-row: span 2; }
.lb-item.landscape { grid-column: span 2; }
.lb-item.hero { grid-column: span 2; grid-row: span 2; }
.lb-item video, .lb-item img {
    width: 100%; height: 100%; object-fit: cover;
    display: block;
}
.lb-item-overlay {
    position: absolute; bottom: 0; left: 0; right: 0;
    padding: 16px;
    background: linear-gradient(transparent, rgba(0,0,0,0.85));
    display: flex; align-items: flex-end; justify-content: space-between;
}
.lb-item-overlay .lb-text h4 {
    font-size: 15px; font-weight: 700; color: #fff;
    font-family: 'Oswald', sans-serif; text-transform: uppercase;
}
.lb-item-overlay .lb-text span { font-size: 11px; color: #999; }
.lb-play-btn {
    width: 36px; height: 36px;
    background: var(--primary-red);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    flex-shrink: 0;
    cursor: pointer;
    transition: transform 0.3s ease, box-shadow 0.3s ease;
    margin-left: 10px;
}
.lb-play-btn:hover {
    transform: scale(1.15);
    box-shadow: 0 0 20px rgba(229,9,20,0.5);
}
.lb-play-btn svg { width: 14px; height: 14px; fill: #fff; margin-left: 2px; }
/* MP4 Video Modal */
#mp4Modal {
    display: none; position: fixed; inset: 0;
    background: rgba(0,0,0,0.95); z-index: 10000;
    align-items: center; justify-content: center;
}
#mp4Modal .mp4-modal-inner {
    position: relative; width: 90%; max-width: 700px;
}
#mp4Modal .mp4-close {
    position: absolute; top: -40px; right: 0;
    color: #fff; font-size: 36px; cursor: pointer;
    transition: color 0.2s;
}
#mp4Modal .mp4-close:hover { color: var(--primary-red); }
#mp4Modal video {
    width: 100%; max-height: 85vh;
    border-radius: 8px; background: #000;
}

/* === 7. PODCAST SHOOTS — Horizontal Split === */
.genre-podcast { background: #0b0b0b; }
.podcast-list { display: flex; flex-direction: column; gap: 50px; }
.podcast-card {
    display: flex;
    gap: 40px;
    align-items: center;
    background: #111;
    border-radius: 12px;
    overflow: hidden;
    border: 1px solid rgba(255,255,255,0.05);
    transition: border-color 0.3s;
}
.podcast-card:hover { border-color: rgba(255,255,255,0.15); }
.podcast-card.reverse { flex-direction: row-reverse; }
.podcast-visual {
    width: 55%;
    position: relative;
    aspect-ratio: 16/10;
    background: #000;
    flex-shrink: 0;
    overflow: hidden;
}
.podcast-visual img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.5s ease;
}
.podcast-card:hover .podcast-visual img { transform: scale(1.04); }
.podcast-info {
    width: 45%;
    padding: 40px 40px 40px 0;
}
.podcast-card.reverse .podcast-info { padding: 40px 0 40px 40px; }
.podcast-ep-badge {
    display: inline-block;
    background: var(--primary-red);
    color: #fff;
    font-size: 11px; font-weight: 700;
    padding: 4px 12px;
    border-radius: 3px;
    margin-bottom: 15px;
    letter-spacing: 1px;
}
.podcast-info h4 {
    font-size: 26px; font-weight: 800; color: #fff;
    text-transform: uppercase; font-family: 'Oswald', sans-serif;
    margin-bottom: 10px; line-height: 1.3;
}
.podcast-info p { font-size: 15px; color: #777; line-height: 1.6; margin-bottom: 20px; }
.podcast-waveform {
    height: 30px;
    background: repeating-linear-gradient(
        90deg,
        rgba(229,9,20,0.3) 0px, rgba(229,9,20,0.3) 2px,
        transparent 2px, transparent 6px
    );
    border-radius: 4px;
    opacity: 0.5;
}

/* === 8. AI VIDEOS — Futuristic Grid === */
.genre-ai { background: #050508; position: relative; }
.genre-ai::before {
    content: '';
    position: absolute; top: 0; left: 0; right: 0; bottom: 0;
    background:
        linear-gradient(rgba(0,255,136,0.02) 1px, transparent 1px),
        linear-gradient(90deg, rgba(0,255,136,0.02) 1px, transparent 1px);
    background-size: 40px 40px;
    pointer-events: none;
}
.ai-scroll-wrap {
    width: 100%;
    overflow-x: auto;
    padding: 10px 0 40px;
    cursor: grab;
    -webkit-overflow-scrolling: touch;
    scrollbar-width: none;
}
.ai-scroll-wrap::-webkit-scrollbar { display: none; }

.ai-scroll-hint {
    display: flex;
    align-items: center;
    gap: 12px;
    color: #00ff88;
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    margin-bottom: 25px;
    padding: 0 50px;
    opacity: 1;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
}
.ai-scroll-hint.hidden {
    opacity: 0;
    transform: translateX(-20px);
    pointer-events: none;
}
.ai-scroll-hint svg {
    width: 20px;
    height: 20px;
    animation: slidePrompt 2s infinite;
}
@keyframes slidePrompt {
    0%, 20%, 50%, 80%, 100% {transform: translateX(0);}
    40% {transform: translateX(8px);}
    60% {transform: translateX(4px);}
}
@media (max-width: 991px) {
    .ai-scroll-hint { padding: 0 20px; margin-bottom: 15px; }
}

.ai-grid {
    display: flex;
    gap: 24px;
    width: max-content;
    padding: 0 50px;
    position: relative; z-index: 1;
}
.ai-card {
    width: 380px;
    flex-shrink: 0;
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(0,255,136,0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.4s ease;
    position: relative;
}
.ai-card:hover {
    border-color: rgba(0,255,136,0.4);
    box-shadow: 0 0 30px rgba(0,255,136,0.08);
}
.ai-card-thumb {
    position: relative;
    aspect-ratio: 4/5;
    background: #000;
    overflow: hidden;
}
.ai-card-thumb img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.5s;
}
.ai-card:hover .ai-card-thumb img { transform: scale(1.06); }
.ai-badge {
    position: absolute; top: 12px; right: 12px;
    background: rgba(0,255,136,0.15);
    border: 1px solid rgba(0,255,136,0.3);
    color: #00ff88;
    font-size: 9px; font-weight: 700;
    padding: 3px 8px; border-radius: 3px;
    text-transform: uppercase; letter-spacing: 1.5px;
    z-index: 2;
}
.ai-card-info { padding: 18px; }
.ai-card-info h4 { font-size: 16px; font-weight: 700; color: #e0e0e0; margin-bottom: 4px; }
.ai-card-info p { font-size: 13px; color: #555; }
.ai-glow { color: #00ff88; }

/* === AI HORIZONTAL ROW (16:9 Videos) === */
.ai-horizontal-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    max-width: 860px;
    margin: 40px auto 0;
}
.ai-h-card {
    background: rgba(255,255,255,0.02);
    border: 1px solid rgba(0,255,136,0.1);
    border-radius: 8px;
    overflow: hidden;
    transition: all 0.4s ease;
    cursor: pointer;
}
.ai-h-card:hover {
    border-color: rgba(0,255,136,0.4);
    box-shadow: 0 0 30px rgba(0,255,136,0.08);
}
.ai-h-card-thumb {
    position: relative;
    aspect-ratio: 16/9;
    background: #000;
    overflow: hidden;
}
.ai-h-card-thumb img {
    width: 100%; height: 100%; object-fit: cover;
    transition: transform 0.5s;
}
.ai-h-card:hover .ai-h-card-thumb img { transform: scale(1.04); }
.ai-h-card-info { padding: 14px 18px; }
.ai-h-card-info h4 { font-size: 14px; font-weight: 700; color: #e0e0e0; margin-bottom: 3px; }
.ai-h-card-info p { font-size: 12px; color: #555; }
@media (max-width: 680px) {
    .ai-horizontal-row { grid-template-columns: 1fr; max-width: 100%; padding: 0 20px; }
    .ai-horizontal-row { margin-top: 24px; }
}
@keyframes glitch {
    0%, 100% { transform: translate(0); }
    20% { transform: translate(-2px, 2px); }
    40% { transform: translate(2px, -2px); }
    60% { transform: translate(-1px, -1px); }
    80% { transform: translate(1px, 1px); }
}
.ai-card:hover .ai-card-thumb img {
    animation: glitch 0.3s ease-in-out;
}

/* === GENRE SECTIONS RESPONSIVE === */
@media (max-width: 991px) {
    .genre-section { padding: 70px 0; }
    .product-masonry { grid-template-columns: repeat(2, 1fr); grid-template-rows: auto auto auto; height: auto; }
    .product-item { height: 300px; }
    .product-item.expanded { height: 300px; }
    .product-item.hidden-pair { opacity: 1; pointer-events: auto; }
    .corp-card, .corp-card.reverse { flex-direction: column; gap: 30px; }
    .corp-card-visual, .corp-card-info { width: 100%; }
    .corp-card-info { padding-left: 20px; border-left: 2px solid var(--primary-red); }
    .corp-card.reverse .corp-card-info { padding-left: 20px; padding-right: 0; border-left: 2px solid var(--primary-red); border-right: none; text-align: left; }
    .corp-card-num { font-size: 80px; top: -20px; }
    .phone-grid { grid-template-columns: repeat(2, 1fr); gap: 16px; }
    .bento-grid { grid-template-columns: repeat(2, 1fr); }
    .bento-item.hero { grid-column: span 2; grid-row: span 1; }
    .bento-item.hero img { min-height: 250px; }
    .ai-grid { padding: 0 20px; gap: 16px; }
    .ai-card { width: 300px; }
    .podcast-card, .podcast-card.reverse { flex-direction: column; }
    .podcast-visual, .podcast-info { width: 100%; }
    .podcast-info { padding: 30px !important; }
    .lb-bento { grid-template-columns: repeat(2, 1fr); grid-auto-rows: 180px; }
}
@media (max-width: 576px) {
    .phone-grid { grid-template-columns: repeat(2, 1fr); gap: 12px; }
    .bento-grid { grid-template-columns: 1fr; }
    .bento-item.hero { grid-column: span 1; }
    .ai-card { width: 260px; }
    .perf-card { min-width: 240px; max-width: 240px; }
}

/* ================= YOUTUBE FACADE (Performance) ================= */
.youtube-facade {
    position: relative;
    width: 100%;
    height: 100%;
    cursor: pointer;
    background: #000;
    overflow: hidden;
}
.youtube-facade img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.3s ease, filter 0.3s ease;
    background: #000;
}
.youtube-facade:hover img {
    transform: scale(1.05);
    filter: brightness(0.8);
}
.youtube-facade .yt-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 68px;
    height: 48px;
    background: rgba(255, 0, 0, 0.9);
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
    z-index: 2;
}
.youtube-facade:hover .yt-play-btn {
    background: #ff0000;
    transform: translate(-50%, -50%) scale(1.1);
}
.youtube-facade .yt-play-btn svg {
    width: 24px;
    height: 24px;
    fill: #fff;
    margin-left: 3px;
}

/* ================= FILMS SHOWCASE SECTION ================= */
.films-showcase-section { background: #f9f9f9; border-top: 1px solid #e0e0e0; position: relative; overflow: hidden; }
.films-showcase-section::before {
    content: "FILMS"; position: absolute; top: -20px; right: -20px;
    font-size: 200px; font-weight: 900; color: rgba(0,0,0,0.03);
    z-index: 0; pointer-events: none; line-height: 1;
}
.films-showcase-section:hover::before {
    content: "FILMS"; position: absolute; top: -20px; right: -20px;
    font-size: 200px; font-weight: 900; color: var(--primary-red);
    z-index: 0; pointer-events: none; line-height: 1; transition: color 0.5s ease;
}

@media (max-width: 991px) {
    .films-showcase-section::before,
    .films-showcase-section:hover::before {
        font-size: 120px;
        top: 0;
    }
}
@media (max-width: 768px) {
    .films-showcase-section::before,
    .films-showcase-section:hover::before {
        font-size: 80px;
        top: 10px;
        opacity: 0.3;
    }
}

.cinema-grid {
    display: flex; flex-wrap: wrap; gap: 40px; margin-top: 60px;
    position: relative; z-index: 1;
}

.film-item { position: relative; margin-bottom: 40px; }
.film-item.wide { width: 100%; display: flex; align-items: flex-end; }
.film-item.medium { width: calc(50% - 20px); }
.film-item.featured { width: 60%; }
.film-item.compact { width: 35%; align-self: center; }

.film-card-cinema {
    background: #fff; box-shadow: 0 20px 60px rgba(0,0,0,0.08);
    border-radius: 0; overflow: hidden;
    transition: transform 0.5s cubic-bezier(0.2, 1, 0.3, 1);
}
.film-card-cinema:hover { box-shadow: 0 30px 80px rgba(0,0,0,0.12); }

.film-iframe-wrap { position: relative; padding-bottom: 56.25%; background: #000; }
.film-iframe-wrap iframe { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }
.film-iframe-wrap .youtube-facade { position: absolute; top: 0; left: 0; width: 100%; height: 100%; }

.film-meta { padding: 30px 0; position: relative; }
.film-index {
    font-size: 60px; font-weight: 600; color: #eee;
    position: absolute; top: -50px; left: 0; line-height: 1;
    z-index: -1; font-family: 'Oswald', sans-serif;
}
.film-item:hover .film-index { color: var(--primary-red); transform: translateX(10px); transition: all 0.4s ease; }

.film-content { padding-left: 20px; border-left: 2px solid var(--primary-red); margin-left: 10px; }
.film-content h3 { font-size: 28px; font-weight: 800; color: #111; margin-bottom: 5px; text-transform: uppercase; letter-spacing: -0.5px; }
.film-content p { font-size: 15px; color: #555; font-weight: 500; margin: 0; }

.film-item.wide .film-card-cinema { width: 70%; }
.film-item.wide .film-meta { width: 30%; padding: 0 0 0 40px; margin-bottom: 40px; }
.film-item.medium .film-card-cinema { width: 85%; margin-left: auto; }

@media (max-width: 991px) {
    .film-item.wide, .film-item.medium, .film-item.featured, .film-item.compact { width: 100%; display: block; }
    .film-item.wide .film-card-cinema { width: 100%; }
    .film-item.wide .film-meta { width: 100%; padding: 20px 0; }
    .film-item.medium .film-card-cinema { width: 100%; margin-left: 0; }
}

/* ================= MINIMAL PORTFOLIO (Selected Work) ================= */
.portfolio-section-minimal {
    background: #050505;
    padding: 120px 0;
    overflow: hidden;
}

.portfolio-mineral-header {
    text-align: left;
    margin-bottom: 100px;
    padding-bottom: 20px;
    border-bottom: 1px solid rgba(255,255,255,0.1);
}

.portfolio-mineral-header h2 {
    font-size: clamp(32px, 5vw, 64px);
    font-weight: 300;
    color: #fff;
    margin: 0;
    letter-spacing: -1px;
}

.portfolio-mineral-header h2 strong {
    font-weight: 800;
    color: #fff;
}

.case-minimal-wrapper {
    display: flex;
    flex-direction: column;
    gap: 150px;
}

.case-card-minimal {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 60px;
    align-items: center;
    opacity: 0;
    transform: translateY(30px);
    transition: 0.8s ease-out;
}
.case-card-minimal.active {
    opacity: 1;
    transform: translateY(0);
}

/* Alternate Layout */
.case-card-minimal.alt-layout {
    grid-template-columns: 0.8fr 1.2fr;
}
.case-card-minimal.alt-layout .case-minimal-video {
    order: 2;
}
.case-card-minimal.alt-layout .case-minimal-info {
    order: 1;
    text-align: right;
    align-items: flex-end;
    padding: 60px;
}

.case-minimal-video {
    background: #000;
    border-radius: 4px;
    overflow: hidden;
    position: relative;
    aspect-ratio: 16/9;
    box-shadow: 0 30px 60px rgba(0,0,0,0.5);
    border: 1px solid rgba(255,255,255,0.08);
    cursor: pointer;
    transition: transform 0.6s cubic-bezier(0.2, 1, 0.3, 1), border-color 0.3s;
}

.case-minimal-video:hover {
    transform: scale(1.02);
    border-color: rgba(255,255,255,0.2);
}

.case-minimal-video video {
    width: 100%;
    height: 100%;
    object-fit: contain;
    display: block;
}

.case-play-btn {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%) scale(0.9);
    width: 70px;
    height: 70px;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #fff;
    opacity: 0;
    transition: all 0.4s ease;
    border: 1px solid rgba(255,255,255,0.2);
}

.case-play-btn svg {
    width: 24px;
    height: 24px;
    fill: currentColor;
    margin-left: 4px;
}

.case-minimal-video:hover .case-play-btn {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1);
}

.case-minimal-info {
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: flex-start;
    padding: 60px;
    background: #0d0d0d;
    border-radius: 4px;
    border: 1px solid rgba(255,255,255,0.05);
    height: 100%;
}

.case-min-tag {
    font-size: 11px;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: var(--primary-red);
    font-weight: 700;
    margin-bottom: 25px;
    display: inline-block;
    position: relative;
}

.case-min-client-logo {
    width: 140px;
    height: auto;
    object-fit: contain;
    filter: invert(1) brightness(2);
    margin-bottom: 30px;
    opacity: 0.9;
}

.case-min-title {
    font-size: 32px;
    font-weight: 400;
    color: #fff;
    margin-bottom: 20px;
    line-height: 1.3;
}

.case-min-desc {
    font-size: 16px;
    color: #888;
    font-weight: 300;
    line-height: 1.7;
    max-width: 400px;
}

/* Responsive Minimal Portfolio */
@media (max-width: 991px) {
    .case-minimal-wrapper { gap: 100px; }
    .case-card-minimal {
        grid-template-columns: 1fr;
        gap: 30px;
    }
    .case-card-minimal.alt-layout {
        grid-template-columns: 1fr;
    }
    .case-card-minimal.alt-layout .case-minimal-video { order: 1; }
    .case-card-minimal.alt-layout .case-minimal-info {
        order: 2;
        text-align: left;
        padding: 40px 30px;
        align-items: flex-start;
    }
    .case-minimal-info { padding: 40px 30px; }
    .case-min-desc { max-width: 100%; }

    .case-play-btn {
        opacity: 1;
        background: rgba(0,0,0,0.5);
    }
}

/* === WORK / DIRECTOR'S CUT === */
.directors-cut {
    padding: 120px 20px;
    background: #080808;
}

.movie-card {
    display: flex;
    margin-bottom: 120px;
    align-items: center;
}

.movie-visual {
    flex: 1.5;
    position: relative;
    aspect-ratio: 16/9;
    overflow: hidden;
}

.movie-visual video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.6s cubic-bezier(0.25, 1, 0.5, 1);
    filter: grayscale(100%);
}

.movie-visual:hover video {
    filter: grayscale(0%);
    transform: scale(1.03);
}

.movie-overlay-btn {
    position: absolute;
    top: 50%; left: 50%;
    transform: translate(-50%, -50%);
    width: 80px; height: 80px;
    background: rgba(229, 9, 20, 0.9);
    border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    opacity: 0;
    transition: 0.4s;
    pointer-events: none;
}
.movie-visual:hover .movie-overlay-btn {
    opacity: 1;
    transform: translate(-50%, -50%) scale(1.2);
}

.movie-info {
    flex: 1;
    padding: 0 60px;
}

/* === BTS MASONRY === */
.bts-section {
    padding: 100px 20px;
    background: #050505;
}
.bts-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    grid-template-rows: repeat(2, 300px);
    gap: 15px;
    max-width: 1400px;
    margin: 0 auto;
}
.bts-item {
    position: relative;
    overflow: hidden;
    background: #222;
}
.bts-item img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: 0.5s;
    opacity: 0.7;
}
.bts-item:hover img {
    transform: scale(1.1);
    opacity: 1;
}
.bts-item:nth-child(1) { grid-column: span 2; grid-row: span 2; } /* Big image */
.bts-item:nth-child(2) { grid-column: span 1; }

/* === PRICING === */
.pricing-section {
    padding: 100px 20px;
    background: #000;
}
.price-wrapper {
    display: flex;
    justify-content: center;
    gap: 30px;
    flex-wrap: wrap;
}
.price-card {
    background: linear-gradient(145deg, #111, #0a0a0a);
    border: 1px solid #222;
    padding: 40px;
    width: 350px;
    text-align: center;
    transition: 0.3s;
    position: relative;
    flex-shrink: 0; /* Important for horizontal scroll if added */
}
.price-card:hover {
    border-color: var(--primary-red);
    transform: translateY(-10px);
}
.price-tag {
    font-size: 40px;
    font-family: 'Oswald', sans-serif;
    color: var(--primary-red);
    margin: 20px 0;
}

/* === CONTACT === */
/* ===== REDESIGNED CONTACT SECTION ===== */
.contact-wrap {
    background: #080808;
    position: relative;
    padding: 120px 20px;
    overflow: hidden;
}
.contact-wrap::before {
    content: '';
    position: absolute;
    top: -200px; left: 50%;
    transform: translateX(-50%);
    width: 700px; height: 700px;
    background: radial-gradient(circle, rgba(229,9,20,0.08) 0%, transparent 65%);
    pointer-events: none;
}
.contact-overlay {
    position: absolute; inset: 0;
    background: transparent;
}
.contact-inner {
    max-width: 1100px;
    margin: 0 auto;
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 60px;
    align-items: start;
    position: relative;
    z-index: 2;
}
.contact-left {
    padding-top: 10px;
}
.contact-kicker {
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 3px;
    text-transform: uppercase;
    color: var(--primary-red);
    margin-bottom: 20px;
    display: block;
}
.contact-headline {
    font-family: 'Oswald', sans-serif;
    font-size: clamp(38px, 5vw, 62px);
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1.05;
    color: #fff;
    margin-bottom: 24px;
}
.contact-headline span { color: var(--primary-red); }
.contact-body {
    color: #666;
    font-size: 15px;
    line-height: 1.7;
    margin-bottom: 40px;
    max-width: 380px;
}
.contact-perks {
    list-style: none;
    display: flex;
    flex-direction: column;
    gap: 14px;
    margin-bottom: 40px;
}
.contact-perks li {
    display: flex;
    align-items: center;
    gap: 12px;
    font-size: 14px;
    color: #aaa;
    font-weight: 500;
}
.contact-perks li::before {
    content: '';
    width: 6px; height: 6px;
    border-radius: 50%;
    background: var(--primary-red);
    flex-shrink: 0;
    box-shadow: 0 0 8px rgba(229,9,20,0.5);
}
.contact-direct {
    display: flex;
    flex-direction: column;
    gap: 10px;
}
.contact-direct a {
    font-size: 13px;
    color: #555;
    text-decoration: none;
    transition: 0.2s;
    display: flex;
    align-items: center;
    gap: 8px;
}
.contact-direct a:hover { color: #fff; }

/* Form card */
.contact-card {
    background: rgba(255,255,255,0.03);
    border: 1px solid rgba(255,255,255,0.07);
    border-radius: 16px;
    padding: 40px;
    backdrop-filter: blur(10px);
}
.c-field {
    position: relative;
    margin-bottom: 24px;
}
.c-input {
    width: 100%;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.1);
    border-radius: 8px;
    color: #fff;
    font-size: 15px;
    font-family: 'Poppins', sans-serif;
    padding: 16px 18px;
    transition: border-color 0.25s, background 0.25s;
    appearance: none;
    -webkit-appearance: none;
}
.c-input::placeholder { color: #555; font-size: 13px; letter-spacing: 0.5px; }
.c-input:focus {
    outline: none;
    border-color: var(--primary-red);
    background: rgba(229,9,20,0.04);
}
.c-input option {
    background: #1a1a1a;
    color: #fff;
}
.c-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 14px;
}
.c-submit {
    width: 100%;
    padding: 16px;
    background: var(--primary-red);
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 15px;
    font-weight: 700;
    letter-spacing: 1px;
    text-transform: uppercase;
    cursor: pointer;
    transition: 0.3s;
    margin-top: 4px;
}
.c-submit:hover { background: #c10812; transform: translateY(-2px); box-shadow: 0 8px 25px rgba(229,9,20,0.35); }
.c-actions {
    display: flex;
    gap: 10px;
    margin-top: 12px;
}
.c-btn-reset {
    flex: 1;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    padding: 12px;
    background: rgba(255,255,255,0.04);
    border: 1px solid rgba(255,255,255,0.08);
    border-radius: 8px;
    color: #666;
    font-size: 12px; font-weight: 700;
    text-transform: uppercase;
    cursor: pointer;
    transition: 0.25s;
}
.c-btn-reset:hover { background: rgba(255,255,255,0.08); color: #aaa; }
.c-btn-wa {
    flex: 1;
    display: flex; align-items: center; justify-content: center; gap: 6px;
    padding: 12px;
    background: rgba(37,211,102,0.08);
    border: 1px solid rgba(37,211,102,0.2);
    border-radius: 8px;
    color: #25D366;
    font-size: 12px; font-weight: 700;
    text-transform: uppercase;
    text-decoration: none;
    transition: 0.25s;
}
.c-btn-wa:hover { background: rgba(37,211,102,0.15); }

@media (max-width: 860px) {
    .contact-inner { grid-template-columns: 1fr; gap: 40px; }
    .contact-headline { font-size: 38px; }
    .contact-card { padding: 28px 20px; }
    .c-row { grid-template-columns: 1fr; gap: 0; }
    .contact-body { max-width: 100%; }
}

/* === MOBILE FLOATING BAR === */
.mobile-sticky-bar {
    display: none;
    position: fixed;
    bottom: 0;
    left: 0;
    width: 100%;
    padding: 15px 20px;
    background: rgba(0,0,0,0.9);
    backdrop-filter: blur(10px);
    z-index: 8000;
    border-top: 1px solid #222;
    justify-content: space-between;
    align-items: center;
}

/* === RE-DESIGNED FOOTER === */
.vp-footer {
    background: #000;
    padding: 80px 0 40px;
    color: #fff;
    border-top: 1px solid #111;
}
.vp-footer-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}
.vp-footer-content {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
    flex-wrap: wrap;
    gap: 40px;
    margin-bottom: 60px;
}
.vp-footer-brand { flex: 1; min-width: 250px; }
.vp-footer-logo { height: 35px; margin-bottom: 25px; }
.vp-footer-desc { color: #888; font-size: 14px; line-height: 1.6; max-width: 300px; }
.vp-footer-info { display: flex; gap: 60px; flex-wrap: wrap; }
.vp-info-group h4 { 
    font-family: 'Oswald', sans-serif; 
    text-transform: uppercase; 
    font-size: 12px; 
    letter-spacing: 2px; 
    color: var(--primary-red); 
    margin-bottom: 20px; 
}
.vp-info-group p, .vp-info-group a { 
    color: #ccc; 
    font-size: 15px; 
    text-decoration: none; 
    display: block; 
    margin-bottom: 8px; 
    transition: 0.3s; 
}
.vp-info-group a:hover { color: #fff; }
.vp-footer-bottom { 
    border-top: 1px solid #111; 
    padding-top: 30px; 
    display: flex; 
    justify-content: space-between; 
    align-items: center; 
    color: #444; 
    font-size: 12px; 
    text-transform: uppercase; 
    letter-spacing: 1px; 
}

@media (max-width: 767px) {
    .vp-footer-content { flex-direction: column; text-align: center; align-items: center; }
    .vp-footer-info { flex-direction: column; gap: 30px; align-items: center; }
    .vp-footer-brand { text-align: center; }
    .vp-footer-desc { margin: 0 auto 20px; }
    .vp-footer-bottom { flex-direction: column; gap: 15px; text-align: center; }
}

/* RESPONSIVE CREATIVE OVERHAUL */
@media(max-width: 768px) {
    /* TYPOGRAPHY SCALING */
    .hero-title { 
        font-size: 12vw; 
        line-height: 0.9;
        margin-bottom: 20px;
    }
    .manifesto-text { 
        font-size: 32px; 
    }
    .section-header h2 { 
        font-size: 40px; 
    }
    
    /* NAVBAR */
    .nav-menu { display: none; }
    .nav-cta { display: none; } /* Moved to bottom sticky bar */
    .custom-nav { padding: 20px; background: #000; }
    
    /* MOBILE STICKY BAR */
    .mobile-sticky-bar { display: flex; }
    
    /* HERO */
    .hero-content { padding-top: 60px; }
    .play-reel-btn { margin-top: 20px; transform: scale(0.9); }
    
    /* PIPELINE - HORIZONTAL SNAP SCROLL */
    .pipeline-grid {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 20px;
        padding-bottom: 30px; /* Space for scrollbar */
        padding-left: 5vw; /* Offset start */
        padding-right: 5vw;
        max-width: 100vw;
        margin-left: -20px; /* Counteract section padding */
        width: calc(100% + 40px);
    }
    .pipe-card {
        min-width: 85vw; /* Card takes almost full width */
        scroll-snap-align: center;
        margin: 0;
    }

    /* GEAR SECTION - STACKED INTERACTIVE */
    .gear-container { 
        flex-direction: column-reverse; 
        gap: 20px;
    }
    .gear-preview { 
        height: 300px; 
        width: 100%;
    }
    .gear-list {
        display: flex;
        flex-wrap: wrap;
        gap: 10px;
    }
    .gear-item {
        font-size: 16px;
        padding: 10px 15px;
        border: 1px solid #333;
        border-radius: 30px;
        background: #111;
        margin: 0;
        width: auto;
        flex-grow: 1;
        text-align: center;
    }
    .gear-item.active {
        background: var(--primary-red);
        color: #fff;
        border-color: var(--primary-red);
        padding-left: 15px; /* Override desktop hover style */
    }
    .gear-item:hover { padding-left: 15px; color: #fff; }

    /* WORK / DIRECTORS CUT */
    .movie-card { 
        flex-direction: column !important; /* Force column for all */
        margin-bottom: 60px;
        border-bottom: 1px solid #222;
        padding-bottom: 40px;
    }
    .movie-visual { 
        aspect-ratio: 16/9; 
        width: 100%; 
        margin-bottom: 20px;
    }
    .movie-info { padding: 0; }
    .movie-title { font-size: 32px; }
    .movie-overlay-btn { 
        opacity: 1; 
        transform: translate(-50%, -50%) scale(0.8);
        background: rgba(229, 9, 20, 0.7);
    }

    /* BTS - STORY STYLE SCROLL */
    .bts-grid {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 15px;
        grid-template-columns: none;
        grid-template-rows: none;
        height: 350px;
        padding-bottom: 10px;
        margin-left: -20px;
        width: calc(100% + 40px);
        padding-left: 20px;
    }
    .bts-item {
        min-width: 250px;
        height: 100%;
        scroll-snap-align: start;
        border-radius: 10px;
    }
    .bts-item:nth-child(1) { height: 100%; } /* Reset huge grid item */

    /* PRICING SCROLL */
    .price-wrapper {
        flex-wrap: nowrap;
        overflow-x: auto;
        justify-content: flex-start;
        padding-bottom: 30px;
        gap: 20px;
        margin-left: -20px;
        width: calc(100% + 40px);
        padding-left: 20px;
        scroll-snap-type: x mandatory;
    }
    .price-card {
        min-width: 85vw;
        scroll-snap-align: center;
    }
    
    /* PERFORMANCE HORIZONTAL SCROLL FOR MOBILE */
    .perf-scroll-wrap {
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        width: calc(100% + 40px);
        margin-left: -20px;
        padding: 20px 20px 40px;
        -webkit-overflow-scrolling: touch;
    }
    /* Hide Scrollbar */
    .perf-scroll-wrap::-webkit-scrollbar { display: none; }
    .perf-scroll-wrap { -ms-overflow-style: none; scrollbar-width: none; }

    .perf-scroll {
        display: flex;
        grid-template-columns: none;
        gap: 20px;
        width: max-content;
    }
    .perf-card {
        min-width: 300px;
        max-width: 300px;
        scroll-snap-align: center;
    }
    
    .contact-content h2 { font-size: 36px; }
}

@media (max-width: 480px) {
    .perf-card {
        min-width: 280px;
        max-width: 280px;
    }
    .genre-header h2 {
        font-size: 32px;
    }
    .genre-header br {
        display: none;
    }
}
</style>
@endsection

@section('content')
<main>

<!-- Film Grain Overlay -->
<div class="noise-overlay"></div>

<!-- Custom Cursor -->


<!-- Loading Screen -->


<!-- Navigation -->
<nav class="custom-nav" id="navbar">
    <a href="#" class="nav-logo hover-trigger">
        <img src="/assets/img/logo/logo.png" alt="THUMBPIN" style="height: 30px;">
    </a>
    <div class="nav-menu">
        <a href="#hero" class="nav-link hover-trigger">Studio</a>
        <a href="#process" class="nav-link hover-trigger">Process</a>
        <a href="#genre-corporate" class="nav-link hover-trigger">Portfolio</a>
        <a href="#work" class="nav-link hover-trigger">Featured</a>
        <a href="#reviews" class="nav-link hover-trigger">Reviews</a>
    </div>
    <div class="magnetic-wrap">
        <a href="#contact" class="nav-cta hover-trigger magnetic-btn">Book Shoot</a>
    </div>
</nav>

<!-- Mobile Sticky Bottom Bar -->
<div class="mobile-sticky-bar">
    <div style="font-family: 'Oswald', sans-serif; font-weight: 700; font-size: 14px;">THUMBPIN STUDIOS</div>
    <a href="#contact" class="nav-cta" style="display: block; padding: 10px 20px; font-size: 12px;">BOOK NOW</a>
</div>

<!-- Hero Section -->
<section class="hero-section" id="hero">
    <div class="hero-overlay"></div>
    <video class="hero-bg-video" autoplay muted loop playsinline>
        <source src="/assets/img/vidproduction/whatwedo2optimised.mp4" type="video/mp4">
    </video>

    <div class="hero-content">
        <div class="hero-tag reveal active" style="letter-spacing: 5px; margin-bottom: 20px; color: #aaa; font-size: 12px;">EST. 2024 • GURGAON</div>
        
        <div class="glitch-wrapper">
            <h1 class="hero-title reveal active" style="transition-delay: 0.2s;">
                WE DON'T SHOOT<br>
                <span>WE CREATE</span>
            </h1>
        </div>

        <p style="color: #ccc; font-size: 18px; max-width: 600px; margin: 0 auto; line-height: 1.6;" class="reveal active" style="transition-delay: 0.3s;">
            Thumbpin Studios is a narrative-first production house. We combine cinema-grade technology with raw storytelling to build brands.
        </p>

        <div class="magnetic-wrap reveal active" style="transition-delay: 0.5s;">
            <a href="#genre-corporate" class="play-reel-btn hover-trigger magnetic-btn" style="text-decoration: none; color: inherit;">
                <div class="play-icon">
                    <svg width="20" height="24" viewBox="0 0 20 24" fill="none" style="transform: rotate(90deg);"><path d="M20 12L0 24V0L20 12Z" fill="white"/></svg>
                </div>
                <div style="font-family: 'Oswald', sans-serif; letter-spacing: 2px;">EXPLORE OUR FILMS</div>
            </a>
        </div>
    </div>
</section>

<!-- Manifesto Section (NEW - WHITE) -->
<section class="manifesto-section">
    <div class="reveal">
        <p style="font-size: 14px; letter-spacing: 3px; font-weight: 700; color: #999; margin-bottom: 30px;">THE PHILOSOPHY</p>
        <h2 class="manifesto-text">
            CONTENT IS CHEAP. <br>
            <span class="hover-trigger">CINEMA</span> IS ETERNAL. <br>
            WE BUILD VISUAL LEGACIES FOR BRANDS THAT DARE TO BE <span class="hover-trigger">DIFFERENT</span>.
        </h2>
    </div>
    <div class="marquee-container">
        STORYTELLING • CINEMATOGRAPHY • DIRECTION • EDITING • STORYTELLING • CINEMATOGRAPHY • DIRECTION • EDITING
    </div>
</section>

<!-- Client Strip -->
<div class="client-strip">
    <div class="client-grid-top">
        <h2 style="color: #fff; font-weight: 800; font-size: 32px; letter-spacing: 1px; text-transform: uppercase;">BRANDS THAT TRUST OUR CINEMATIC STORYTELLING</h2>
    </div>
    
    <div class="marquee-container-logos">
        <!-- Row 1: Moving Left -->
        <div class="marquee-wrapper marquee-row-1">
            <div class="marquee-content">
                <img src="/assets/img/clients/1.png" class="client-logo" alt="Client Logo 1" loading="lazy">
                <img src="/assets/img/clients/2.png" class="client-logo" alt="Client Logo 2" loading="lazy">
                <img src="/assets/img/clients/3.png" class="client-logo" alt="Client Logo 3" loading="lazy">
                <img src="/assets/img/clients/4.png" class="client-logo" alt="Client Logo 4" loading="lazy">
                <img src="/assets/img/clients/5.png" class="client-logo" alt="Client Logo 5" loading="lazy">
                <img src="/assets/img/clients/6.png" class="client-logo" alt="Client Logo 6" loading="lazy">
                <img src="/assets/img/clients/7.png" class="client-logo" alt="Client Logo 7" loading="lazy">
                <img src="/assets/img/clients/8.png" class="client-logo" alt="Client Logo 8" loading="lazy">
                <img src="/assets/img/clients/9.png" class="client-logo" alt="Client Logo 9" loading="lazy">
                <img src="/assets/img/clients/10.png" class="client-logo" alt="Client Logo 10" loading="lazy">
                <img src="/assets/img/clients/11.png" class="client-logo" alt="Client Logo 11" loading="lazy">
            </div>
            <div class="marquee-content">
                <img src="/assets/img/clients/1.png" class="client-logo" alt="Client Logo 1" loading="lazy">
                <img src="/assets/img/clients/2.png" class="client-logo" alt="Client Logo 2" loading="lazy">
                <img src="/assets/img/clients/3.png" class="client-logo" alt="Client Logo 3" loading="lazy">
                <img src="/assets/img/clients/4.png" class="client-logo" alt="Client Logo 4" loading="lazy">
                <img src="/assets/img/clients/5.png" class="client-logo" alt="Client Logo 5" loading="lazy">
                <img src="/assets/img/clients/6.png" class="client-logo" alt="Client Logo 6" loading="lazy">
                <img src="/assets/img/clients/7.png" class="client-logo" alt="Client Logo 7" loading="lazy">
                <img src="/assets/img/clients/8.png" class="client-logo" alt="Client Logo 8" loading="lazy">
                <img src="/assets/img/clients/9.png" class="client-logo" alt="Client Logo 9" loading="lazy">
                <img src="/assets/img/clients/10.png" class="client-logo" alt="Client Logo 10" loading="lazy">
                <img src="/assets/img/clients/11.png" class="client-logo" alt="Client Logo 11" loading="lazy">
            </div>
        </div>

        <!-- Row 2: Moving Right -->
        <div class="marquee-wrapper marquee-row-2">
            <div class="marquee-content">
                <img src="/assets/img/clients/12.png" class="client-logo" alt="Client Logo 12" loading="lazy">
                <img src="/assets/img/clients/13.png" class="client-logo" alt="Client Logo 13" loading="lazy">
                <img src="/assets/img/clients/14.png" class="client-logo" alt="Client Logo 14" loading="lazy">
                <img src="/assets/img/clients/15.png" class="client-logo" alt="Client Logo 15" loading="lazy">
                <img src="/assets/img/clients/16.png" class="client-logo" alt="Client Logo 16" loading="lazy">
                <img src="/assets/img/clients/17.png" class="client-logo" alt="Client Logo 17" loading="lazy">
                <img src="/assets/img/clients/18.png" class="client-logo" alt="Client Logo 18" loading="lazy">
                <img src="/assets/img/clients/19.png" class="client-logo" alt="Client Logo 19" loading="lazy">
                <img src="/assets/img/clients/20.png" class="client-logo" alt="Client Logo 20" loading="lazy">
                <img src="/assets/img/clients/21.png" class="client-logo" alt="Client Logo 21" loading="lazy">
                <img src="/assets/img/clients/22.png" class="client-logo" alt="Client Logo 22" loading="lazy">
            </div>
            <div class="marquee-content">
                <img src="/assets/img/clients/12.png" class="client-logo" alt="Client Logo 12" loading="lazy">
                <img src="/assets/img/clients/13.png" class="client-logo" alt="Client Logo 13" loading="lazy">
                <img src="/assets/img/clients/14.png" class="client-logo" alt="Client Logo 14" loading="lazy">
                <img src="/assets/img/clients/15.png" class="client-logo" alt="Client Logo 15" loading="lazy">
                <img src="/assets/img/clients/16.png" class="client-logo" alt="Client Logo 16" loading="lazy">
                <img src="/assets/img/clients/17.png" class="client-logo" alt="Client Logo 17" loading="lazy">
                <img src="/assets/img/clients/18.png" class="client-logo" alt="Client Logo 18" loading="lazy">
                <img src="/assets/img/clients/19.png" class="client-logo" alt="Client Logo 19" loading="lazy">
                <img src="/assets/img/clients/20.png" class="client-logo" alt="Client Logo 20" loading="lazy">
                <img src="/assets/img/clients/21.png" class="client-logo" alt="Client Logo 21" loading="lazy">
                <img src="/assets/img/clients/22.png" class="client-logo" alt="Client Logo 22" loading="lazy">
            </div>
        </div>
    </div>
</div>

<!-- Process Section (UPDATED TO WHITE) -->
<section class="pipeline-section" id="process">
    <div class="section-header reveal">
        <h2 style="color: #111;">OUR PRODUCTION PROCESS: FROM <span class="text-red">SCRIPT</span> TO SCREEN</h2>
        <p style="color: #666;">A surgical 3-stage video production pipeline for cinematic results.</p>
    </div>

    <div class="pipeline-grid">
        <div class="pipe-card hover-trigger reveal">
            <div class="pipe-step">01</div>
            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; color:#111;">Pre-Production</h3>
            <p style="color: #555;">Concept development, storyboarding, location scouting, and casting. We blueprint the masterpiece.</p>
        </div>
        <div class="pipe-card hover-trigger reveal" style="transition-delay: 0.1s;">
            <div class="pipe-step">02</div>
            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; color:#111;">Production</h3>
            <p style="color: #555;">4K/8K filming, lighting design, and audio capture. Using RED/Arri ecosystems for cinema fidelity.</p>
        </div>
        <div class="pipe-card hover-trigger reveal" style="transition-delay: 0.2s;">
            <div class="pipe-step">03</div>
            <h3 style="font-size: 24px; font-weight: 700; margin-bottom: 15px; color:#111;">Post-Production</h3>
            <p style="color: #555;">Editing, color grading (DaVinci), VFX, and Sound Design. Where the story truly comes alive.</p>
        </div>
    </div>
    <!-- Mobile Hint -->
    <div style="text-align:center; color:#999; font-size:12px; margin-top:10px; display:none;" class="mobile-only-hint">SWIPE TO EXPLORE →</div>
</section>

<!-- Kinetic Text Divider -->
<div class="kinetic-text-wrap">
    <div class="kinetic-text">
        LIGHTS • CAMERA • ACTION • STORYTELLING • CINEMATOGRAPHY • VISUAL FX • COLOR GRADING • SOUND DESIGN • 
        LIGHTS • CAMERA • ACTION • STORYTELLING • CINEMATOGRAPHY • VISUAL FX • COLOR GRADING • SOUND DESIGN •
    </div>
</div>

<!-- Directing Attention (Films Showcase) -->
<!-- <section class="films-showcase-section sec-padding" id="sec-work-filter">
    <div class="container">
        <div class="section-header-modern" style="margin-bottom: 60px;">
            <h2 style="color: #111; font-size: 48px; text-transform: uppercase;">Directing <br><span class="txt-red">Attention.</span></h2>
        </div>

        <div class="cinema-grid">
            
            <div class="film-item wide" style="border: 1px solid rgba(229, 9, 20, 0.3); background: rgba(229, 9, 20, 0.05); position: relative; margin-bottom: 60px;">
                <div class="film-badge" style="position: absolute; top: -12px; left: 30px; background: #e50914; color: #fff; padding: 4px 12px; font-weight: 700; font-size: 11px; text-transform: uppercase; border-radius: 2px; letter-spacing: 1px; z-index: 5;">
                    Masterpiece
                </div>
                <div class="film-card-cinema">
                    <div class="film-iframe-wrap">
                        <div class="youtube-facade" data-video-id="UJtRgvgHdxQ">
                            <img src="https://img.youtube.com/vi/UJtRgvgHdxQ/hqdefault.jpg" alt="Ramaeri Shoot" loading="lazy" decoding="async">
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
            
            <div class="film-item wide">
                <div class="film-card-cinema">
                    <div class="film-iframe-wrap">
                        <div class="youtube-facade" data-video-id="ncZ3Jh2d_4U">
                            <img src="https://img.youtube.com/vi/ncZ3Jh2d_4U/hqdefault.jpg" alt="Film 1" loading="lazy" decoding="async">
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


            <div class="film-item wide" style="flex-direction: row-reverse;">
                <div class="film-card-cinema">
                    <div class="film-iframe-wrap">
                        <div class="youtube-facade" data-video-id="7OiAfYltdRU">
                            <img src="https://img.youtube.com/vi/7OiAfYltdRU/hqdefault.jpg" alt="Film 2" loading="lazy" decoding="async">
                            <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        </div>
                    </div>
                </div>
                <div class="film-meta" style="padding: 0 40px 0 0; text-align: right;">
                    <div class="film-index" style="left: auto; right: 0;">02</div>
                    <div class="film-content" style="border-left: none; border-right: 2px solid var(--primary-red); margin-left: 0; margin-right: 10px; padding-left: 0; padding-right: 20px;">
                        <h3>Coporate Film - Good Earth Infra</h3>
                        <p>Corporate film for Good Earth Infra.</p>
                    </div>
                </div>
            </div>
            <div class="film-item medium">
                <div class="film-card-cinema">
                    <div class="film-iframe-wrap">
                        <div class="youtube-facade" data-video-id="uOqppmAt2eI">
                            <img src="https://img.youtube.com/vi/uOqppmAt2eI/hqdefault.jpg" alt="Film 3" loading="lazy" decoding="async">
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
</section> -->

<!-- 3. CORPORATE SHOOTS -->
<section class="genre-section genre-corporate" id="genre-corporate">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #fff;">Premium Corporate <br><span style="color: var(--primary-red);">Video Production</span></h2>
            <p class="genre-subtitle">Professional narratives and corporate films in Gurgaon that build authority.</p>
        </div>
        <div class="corp-list">
            <div class="corp-card reveal">
                <div class="corp-card-num">01</div>
                <div class="corp-card-visual" onclick="loadPerfVideo(this,'UJtRgvgHdxQ')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="UJtRgvgHdxQ">
                        <img src="https://img.youtube.com/vi/UJtRgvgHdxQ/hqdefault.jpg" alt="Ramaeri Shoot" loading="lazy">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="corp-card-info">
                    <h4>Ramaeri Brand Shoot</h4>
                    <p>Our best work to date. A cinematic journey through the Ramaeri product line.</p>
                </div>
            </div>
            <div class="corp-card reverse reveal">
                <div class="corp-card-num">02</div>
                <div class="corp-card-visual" onclick="loadPerfVideo(this,'ncZ3Jh2d_4U')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="ncZ3Jh2d_4U">
                        <img src="https://img.youtube.com/vi/ncZ3Jh2d_4U/hqdefault.jpg" alt="Film Shoot — Monko Dog" loading="lazy">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="corp-card-info">
                    <h4>Film Shoot — Monko Dog</h4>
                    <p>A masterpiece of motion and emotion. Capturing the essence of a brand story.</p>
                </div>
            </div>
            <div class="corp-card reveal">
                <div class="corp-card-num">03</div>
                <div class="corp-card-visual" onclick="loadPerfVideo(this,'7OiAfYltdRU')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="7OiAfYltdRU">
                        <img src="https://img.youtube.com/vi/7OiAfYltdRU/hqdefault.jpg" alt="Corporate Film — Good Earth Infra" loading="lazy">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="corp-card-info">
                    <h4>Corporate Film — Good Earth Infra</h4>
                    <p>Corporate film showcasing Good Earth Infra's vision and projects.</p>
                </div>
            </div>
            <div class="corp-card reverse reveal">
                <div class="corp-card-num">04</div>
                <div class="corp-card-visual" onclick="loadPerfVideo(this,'uOqppmAt2eI')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="uOqppmAt2eI">
                        <img src="https://img.youtube.com/vi/uOqppmAt2eI/hqdefault.jpg" alt="Impact Production" loading="lazy">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="corp-card-info">
                    <h4>Impact Production</h4>
                    <p>High stakes, higher quality. A production that delivers powerful visual impact.</p>
                </div>
            </div>
            <div class="corp-card reveal">
                <div class="corp-card-num">05</div>
                <div class="corp-card-visual" onclick="loadPerfVideo(this,'-SHrTmRWpaI')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="-SHrTmRWpaI">
                        <img src="https://img.youtube.com/vi/-SHrTmRWpaI/hqdefault.jpg" alt="Corporate Shoot — Bollhoff" loading="lazy">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="corp-card-info">
                    <h4>Corporate Shoot — Bollhoff</h4>
                    <p>Industrial excellence captured. Precision engineering meets cinematic storytelling.</p>
                </div>
            </div>
        </div>
        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('Corporate Film', 'Corporate Productions')" class="genre-cta-btn">
                Request Similar Production
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>


<!-- ========== GENRE SECTIONS ========== -->

<!-- 1. PERFORMANCE / ADS / UGC -->
<section class="genre-section genre-performance" id="genre-performance">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #fff;">High-Conversion <br><span style="color: var(--primary-red);">Performance Ads & UGC</span></h2>
            <p class="genre-subtitle">Scroll-stopping ad films engineered for ROI and brand growth.</p>
        </div>
        <div class="perf-scroll-wrap">
        <div class="perf-scroll">
            <div class="perf-card">
                <div class="perf-type-badge">Instagram Ad</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'_UagDA4XyFM')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/_UagDA4XyFM/hqdefault.jpg" alt="Product Launch Ad" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>Product Launch Ad</h4>
                    <span>Performance Marketing</span>
                </div>
            </div>
            <div class="perf-card">
                <div class="perf-type-badge">YouTube Short</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'MoEvrnlSy7U')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/MoEvrnlSy7U/hqdefault.jpg" alt="Brand Awareness Reel" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>Brand Awareness Reel</h4>
                    <span>UGC Content</span>
                </div>
            </div>
            <div class="perf-card">
                <div class="perf-type-badge">Meta Ad</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'sQcTZugZne0')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/sQcTZugZne0/hqdefault.jpg" alt="Conversion Campaign" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>Conversion Campaign</h4>
                    <span>Performance Ad</span>
                </div>
            </div>
            <div class="perf-card">
                <div class="perf-type-badge">UGC</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'V_-e9JaCnuM')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/V_-e9JaCnuM/hqdefault.jpg" alt="Testimonial UGC" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>Testimonial UGC</h4>
                    <span>User Generated</span>
                </div>
            </div>
            <div class="perf-card">
                <div class="perf-type-badge">Reel Ad</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'Oj4FmmUoCKA')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/Oj4FmmUoCKA/hqdefault.jpg" alt="App Install Ad" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>App Install Ad</h4>
                    <span>Performance</span>
                </div>
            </div>
            <div class="perf-card">
                <div class="perf-type-badge">Sales Ad</div>
                <div class="perf-card-thumb" onclick="loadPerfVideo(this,'CiKv3ezY9b8')" style="cursor:pointer;">
                    <img src="https://img.youtube.com/vi/CiKv3ezY9b8/hqdefault.jpg" alt="High-Retention Reel" style="position:absolute;top:0;left:0;width:100%;height:100%;object-fit:cover;" loading="lazy">
                    <div class="perf-play-btn">▶</div>
                </div>
                <div class="perf-card-info">
                    <h4>High-Retention Reel</h4>
                    <span>Conversion Focus</span>
                </div>
            </div>
        </div>
        </div>
        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('Short Content / Reels', 'Performance Campaign')" class="genre-cta-btn">
                Build Your Campaign
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 2. PRODUCT SHOOTS -->
<section class="genre-section genre-product" id="genre-product">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #111;">Cinema-Grade <br><span style="color: var(--primary-red);">Product Videography</span></h2>
            <p class="genre-subtitle">Professional product shoots in Gurgaon that capture every detail in 8K.</p>
        </div>
        <div class="product-masonry">
            <div class="product-item reveal" data-row="top" data-col="0" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'x9_rJNK56-I')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/x9_rJNK56-I/hqdefault.jpg" alt="Product 1" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Retinol Oil</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
            <div class="product-item reveal" data-row="top" data-col="1" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'XykK_4Pd0M8')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/XykK_4Pd0M8/hqdefault.jpg" alt="Product 2" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Face Serum</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
            <div class="product-item reveal" data-row="top" data-col="2" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'nl5muDp4t98')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/nl5muDp4t98/hqdefault.jpg" alt="Product 3" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Facewash</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
            <div class="product-item reveal" data-row="bottom" data-col="0" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'VnOrM4-3icc')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/VnOrM4-3icc/hqdefault.jpg" alt="Product 4" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Facewash</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
            <div class="product-item reveal" data-row="bottom" data-col="1" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'6OkcDgWEMoo')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/6OkcDgWEMoo/hqdefault.jpg" alt="Product 5" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Sunscreen</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
            <div class="product-item reveal" data-row="bottom" data-col="2" onclick="loadPerfVideo(this.querySelector('.product-iframe-facade'),'EohAmPwYZR0')" style="cursor:pointer;">
                <div class="product-iframe-facade youtube-facade" style="position:absolute;top:0;left:0;width:100%;height:100%;background:#000;">
                    <img src="https://img.youtube.com/vi/EohAmPwYZR0/hqdefault.jpg" alt="Product 6" style="width:100%;height:100%;object-fit:cover;">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="product-item-overlay">
                    <h4>Ramaeri Moisturizer</h4>
                    <span>Product Shoot</span>
                </div>
            </div>
        </div>
        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('Product Shoot', 'Product Catalog')" class="genre-cta-btn">
                Start Your Product Project
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>



<!-- 4. SHORT CONTENT / ORGANIC -->
<!-- <section class="genre-section genre-short" id="genre-short">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #fff;">Short Content <br><span style="color: var(--primary-red);">& Organic</span></h2>
            <p class="genre-subtitle">Thumb-stopping reels and shorts for daily engagement.</p>
        </div>
        <div class="phone-grid">
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+1" alt="Short Content 1" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Trending Reel</h4>
                    <span class="phone-views">125K views</span>
                </div>
            </div>
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+2" alt="Short Content 2" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Day in the Life</h4>
                    <span class="phone-views">89K views</span>
                </div>
            </div>
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+3" alt="Short Content 3" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Behind the Scenes</h4>
                    <span class="phone-views">210K views</span>
                </div>
            </div>
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+4" alt="Short Content 4" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Quick Tips</h4>
                    <span class="phone-views">67K views</span>
                </div>
            </div>
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+5" alt="Short Content 5" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Meme Content</h4>
                    <span class="phone-views">340K views</span>
                </div>
            </div>
            <div class="phone-frame reveal">
                <div class="phone-notch"></div>
                <div class="phone-screen">
                    <img src="https://placehold.co/300x534/0a0a0a/444?text=Reel+6" alt="Short Content 6" loading="lazy">
                    <div class="phone-play-overlay"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
                <div class="phone-meta">
                    <h4>Product Reveal</h4>
                    <span class="phone-views">156K views</span>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- 5+6. LIFESTYLE & BRAND SHOOTS (Merged Bento) -->
<section class="genre-section genre-lifestyle-brand" id="genre-lifestyle">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #fff;">Aspirational <br><span style="color: var(--primary-red);">Lifestyle & Brand Films</span></h2>
            <p class="genre-subtitle">Where brand identity meets cinematic storytelling in every frame.</p>
        </div>
        <div class="lb-bento reveal">
            <!-- Row 1-2: Hero landscape + 2 portraits -->
            <div class="lb-item hero">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20Face%20Moisturizer.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Face Moisturizer</h4><span>Ramaeri — Lifestyle</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20Face%20Moisturizer.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="lb-item portrait">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20berry%20detox.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Berry Detox</h4><span>Ramaeri — Lifestyle</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20berry%20detox.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="lb-item portrait">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20face%20mist.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Face Mist</h4><span>Ramaeri — Lifestyle</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20face%20mist.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>

            <!-- Row 3: 2 square + 1 landscape -->
            <div class="lb-item">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20face%20wash.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Face Wash</h4><span>Ramaeri — Brand</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20face%20wash.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="lb-item">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20retinol.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Retinol Oil</h4><span>Ramaeri — Brand</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20retinol.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="lb-item landscape">
                <video data-src="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20Face%20Moisturizer%20story.mp4" muted playsinline preload="none"></video>
                <div class="lb-item-overlay">
                    <div class="lb-text"><h4>Moisturizer Story</h4><span>Ramaeri — Lifestyle</span></div>
                    <div class="lb-play-btn hover-trigger" data-video-url="https://assets.thumbpin.in/thumbpin-videos/Lifestyle/Copy%20of%20Face%20Moisturizer%20story.mp4"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>


        </div>
        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('Brand Film', 'Lifestyle & Brand Session')" class="genre-cta-btn">
                Book A Brand Session
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 7. PODCAST SHOOTS -->
<section class="genre-section genre-podcast" id="genre-podcast">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #fff;">Professional <br><span style="color: var(--primary-red);">Podcast Production</span></h2>
            <p class="genre-subtitle">Premium video podcast studio and production services in Gurgaon.</p>
        </div>
        <div class="podcast-list">
            <!-- Episode 01 -->
            <div class="podcast-card reveal">
                <div class="podcast-visual" onclick="loadPerfVideo(this,'KXmvqOlSmb0')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="KXmvqOlSmb0">
                        <img src="https://img.youtube.com/vi/KXmvqOlSmb0/hqdefault.jpg" alt="Episode 01" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="podcast-info">
                    <span class="podcast-ep-badge">EPISODE 01</span>
                    <h4>Insurance Industry Insights</h4>
                    <p>Listen to Mr. Harpreet on the latest Vserv Podcast to know more about the Insurance Industry.</p>
                    <div class="podcast-waveform"></div>
                </div>
            </div>

            <!-- Episode 02 -->
            <div class="podcast-card reverse reveal">
                <div class="podcast-visual" onclick="loadPerfVideo(this,'ZzLgiQ3lwyE')" style="cursor:pointer;">
                    <div class="youtube-facade" data-video-id="ZzLgiQ3lwyE">
                        <img src="https://img.youtube.com/vi/ZzLgiQ3lwyE/hqdefault.jpg" alt="Episode 02" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    </div>
                </div>
                <div class="podcast-info">
                    <span class="podcast-ep-badge">EPISODE 02</span>
                    <h4>How to become a Crorepati in just a year!</h4>
                    <p>Unlock the mindset and strategies needed to achieve massive financial success in a short period.</p>
                    <div class="podcast-waveform"></div>
                </div>
            </div>
        </div>
        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('Podcast', 'Studio Session')" class="genre-cta-btn">
                Record Your Podcast
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- 8. AI VIDEOS -->
<section class="genre-section genre-ai" id="genre-ai">
    <div class="container">
        <div class="genre-header reveal">
            <h2 style="color: #e0e0e0;">AI-Powered <br><span class="ai-glow">Videos</span></h2>
            <p class="genre-subtitle" style="color: #555;">Next-generation content created with artificial intelligence.</p>
        </div>
        <div class="ai-scroll-hint">
            <span>Slide to explore</span>
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="3"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
        </div>
        <div class="ai-scroll-wrap">
            <div class="ai-grid">
                <!-- Video 1 -->
                <div class="ai-card reveal" onclick="loadPerfVideo(this.querySelector('.ai-card-thumb'),'qZxdQCYOV9Q')" style="cursor:pointer;">
                    <div class="ai-card-thumb youtube-facade">
                        <img src="https://img.youtube.com/vi/qZxdQCYOV9Q/hqdefault.jpg" alt="Artificial Branding #5" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        <span class="ai-badge">AI Generated</span>
                    </div>
                    <div class="ai-card-info">
                        <h4>Artistic Branding #5</h4>
                        <p>Fluid AI-driven brand identity</p>
                    </div>
                </div>
                <!-- Video 2 -->
                <div class="ai-card reveal" onclick="loadPerfVideo(this.querySelector('.ai-card-thumb'),'4yJ7K0P250I')" style="cursor:pointer;">
                    <div class="ai-card-thumb youtube-facade">
                        <img src="https://img.youtube.com/vi/4yJ7K0P250I/hqdefault.jpg" alt="Artificial Branding #4" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        <span class="ai-badge">AI Generated</span>
                    </div>
                    <div class="ai-card-info">
                        <h4>Digital Metamorphosis</h4>
                        <p>Dynamic brand evolution visuals</p>
                    </div>
                </div>
                <!-- Video 3 -->
                <div class="ai-card reveal" onclick="loadPerfVideo(this.querySelector('.ai-card-thumb'),'_wZpB1HCAL4')" style="cursor:pointer;">
                    <div class="ai-card-thumb youtube-facade">
                        <img src="https://img.youtube.com/vi/_wZpB1HCAL4/hqdefault.jpg" alt="Artificial Branding #3" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        <span class="ai-badge">AI Generated</span>
                    </div>
                    <div class="ai-card-info">
                        <h4>AI Concept Art</h4>
                        <p>Surreal branding through AI</p>
                    </div>
                </div>
                <!-- Video 4 -->
                <div class="ai-card reveal" onclick="loadPerfVideo(this.querySelector('.ai-card-thumb'),'0myv8Qo3cQU')" style="cursor:pointer;">
                    <div class="ai-card-thumb youtube-facade">
                        <img src="https://img.youtube.com/vi/0myv8Qo3cQU/hqdefault.jpg" alt="Artificial Branding" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        <span class="ai-badge">AI Generated</span>
                    </div>
                    <div class="ai-card-info">
                        <h4>Abstract Branding</h4>
                        <p>Next-gen visual storytelling</p>
                    </div>
                </div>
                <!-- Video 5 -->
                <div class="ai-card reveal" onclick="loadPerfVideo(this.querySelector('.ai-card-thumb'),'i4st8tpqLqc')" style="cursor:pointer;">
                    <div class="ai-card-thumb youtube-facade">
                        <img src="https://img.youtube.com/vi/i4st8tpqLqc/hqdefault.jpg" alt="Artificial Branding #1" loading="lazy" decoding="async">
                        <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                        <span class="ai-badge">AI Generated</span>
                    </div>
                    <div class="ai-card-info">
                        <h4>Synthetic Identity</h4>
                        <p>Exploring digital brand personas</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Horizontal AI Videos (16:9) -->
        <div class="ai-horizontal-row reveal">
            <!-- Horizontal Video 1 -->
            <div class="ai-h-card" onclick="loadPerfVideo(this.querySelector('.ai-h-card-thumb'),'ubNUNlGuCYE')">
                <div class="ai-h-card-thumb youtube-facade" data-video-id="ubNUNlGuCYE">
                    <img src="https://img.youtube.com/vi/ubNUNlGuCYE/hqdefault.jpg" alt="AI Finance Explainer" loading="lazy">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    <span class="ai-badge">AI Generated</span>
                </div>
                <div class="ai-h-card-info">
                    <h4>Stocks for Minors — AI Explainer</h4>
                    <p>Can one open a Demat Account for a Minor?</p>
                </div>
            </div>
            <!-- Horizontal Video 2 -->
            <div class="ai-h-card" onclick="loadPerfVideo(this.querySelector('.ai-h-card-thumb'),'K3_MkyVxNwY')">
                <div class="ai-h-card-thumb youtube-facade" data-video-id="K3_MkyVxNwY">
                    <img src="https://img.youtube.com/vi/K3_MkyVxNwY/hqdefault.jpg" alt="AI Finance Explainer 2" loading="lazy">
                    <div class="yt-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                    <span class="ai-badge">AI Generated</span>
                </div>
                <div class="ai-h-card-info">
                    <h4>Stocks #274 — AI Finance Series</h4>
                    <p>Breaking down finance concepts with AI visuals.</p>
                </div>
            </div>
        </div>

        <div class="genre-cta-wrap reveal">
            <a href="javascript:void(0)" onclick="prefillLeadForm('AI Video', 'AI Production')" class="genre-cta-btn" style="border-color: #00ff88; color: #00ff88;">
                Explore AI Production
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
            </a>
        </div>
    </div>
</section>

<!-- Work Section -->
<section class="directors-cut" id="work">
    <div class="section-header reveal">
        <h2 style="color: #fff;">FEATURED <span class="text-red">PROJECTS</span></h2>
    </div>

    <div style="max-width: 1200px; margin: 0 auto;">
        <!-- Project 1 -->
        <div class="movie-card reveal">
            <div class="movie-visual hover-trigger" onclick="openVideoModal('https://www.youtube.com/embed/XHiyD1saeFk')">
                <video src="/assets/img/vidproduction/casestudy1.mp4" muted loop playsinline onmouseover="this.play()" onmouseout="this.pause()"></video>
                <div class="movie-overlay-btn"><svg width="20" height="24" viewBox="0 0 20 24" fill="none"><path d="M20 12L0 24V0L20 12Z" fill="white"/></svg></div>
            </div>
            <div class="movie-info">
                <span style="color: var(--primary-red); font-weight: 700; letter-spacing: 2px;">VIRAL AD</span>
                <h3 style="font-size: 40px; font-family: 'Oswald', sans-serif; text-transform: uppercase; margin: 10px 0;" class="movie-title">The April Fool's Hijack</h3>
                <p style="color: #999; margin-bottom: 20px;">For College Vidya, we staged a fake news broadcast that broke the internet.</p>

            </div>
        </div>

        <!-- Project 2 -->
        <div class="movie-card reveal" style="flex-direction: row-reverse;">
            <div class="movie-visual hover-trigger" onclick="openVideoModal('https://www.youtube.com/embed/UsGxsuwfmpM')">
                <video src="/assets/img/vidproduction/casestudy2.mp4" muted loop playsinline onmouseover="this.play()" onmouseout="this.pause()"></video>
                <div class="movie-overlay-btn"><svg width="20" height="24" viewBox="0 0 20 24" fill="none"><path d="M20 12L0 24V0L20 12Z" fill="white"/></svg></div>
            </div>
            <div class="movie-info">
                <span style="color: var(--primary-red); font-weight: 700; letter-spacing: 2px;">BRAND FILM</span>
                <h3 style="font-size: 40px; font-family: 'Oswald', sans-serif; text-transform: uppercase; margin: 10px 0;" class="movie-title">Building Legacy</h3>
                <p style="color: #999; margin-bottom: 20px;">An emotional narrative for MRF, focusing on the concept of 'Home'.</p>
                <div style="display:flex; gap: 30px;">
                    <div><b style="font-size: 24px;">TVC</b><br><span style="color:#666; font-size: 12px;">QUALITY</span></div>
                    <div><b style="font-size: 24px;">45%</b><br><span style="color:#666; font-size: 12px;">LEAD UPLIFT</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- The Gear Locker -->
<!-- <section class="gear-section" id="gear">
    <div class="section-header reveal">
        <h2>THE <span class="text-red">ARSENAL</span></h2>
        <p style="color: #666;">Top-tier equipment for top-tier results.</p>
    </div>
    <div class="gear-container reveal">
        <div class="gear-list">
            <div class="gear-item hover-trigger active" onmouseover="showGear(0)" onclick="showGear(0)">RED KOMODO 6K</div>
            <div class="gear-item hover-trigger" onmouseover="showGear(1)" onclick="showGear(1)">SONY FX6 CINEMA LINE</div>
            <div class="gear-item hover-trigger" onmouseover="showGear(2)" onclick="showGear(2)">ARRI SKYPANEL LIGHTING</div>
            <div class="gear-item hover-trigger" onmouseover="showGear(3)" onclick="showGear(3)">DJI RONIN RS3 PRO</div>
            <div class="gear-item hover-trigger" onmouseover="showGear(4)" onclick="showGear(4)">FPV DRONES</div>
        </div>
        <div class="gear-preview">
            <img src="https://placehold.co/600x500/111/FFF?text=RED+KOMODO" class="gear-img show">
            <img src="https://placehold.co/600x500/111/FFF?text=SONY+FX6" class="gear-img">
            <img src="https://placehold.co/600x500/111/FFF?text=ARRI+LIGHTS" class="gear-img">
            <img src="https://placehold.co/600x500/111/FFF?text=GIMBAL" class="gear-img">
            <img src="https://placehold.co/600x500/111/FFF?text=DRONE" class="gear-img">
        </div>
    </div>
</section> -->

<!-- Reviews / Critics Section (NEW - WHITE) -->
<section class="reviews-section" id="reviews">
    <div class="section-header reveal">
        <h2 style="color: #111;">AUDIENCE <span class="text-red">RECEPTION</span></h2>
        <p style="color: #666;">What the industry is saying.</p>
    </div>
    <div class="review-grid reveal">
        <div class="review-card hover-trigger">
            <div class="stars">★★★★★</div>
            <p class="review-text">"Thumbpin doesn't just make videos, they craft experiences. The ROI on our brand film was immediate."</p>
            <div class="reviewer">- Marketing Head, MRF</div>
        </div>
        <div class="review-card hover-trigger">
            <div class="stars">★★★★★</div>
            <p class="review-text">"Visual storytelling at its finest. They understood our chaotic brief and delivered a masterpiece."</p>
            <div class="reviewer">- CEO, College Vidya</div>
        </div>
        <div class="review-card hover-trigger">
            <div class="stars">★★★★★</div>
            <p class="review-text">"Professional, fast, and cinematic. The production quality rivals top Gurgaon agencies."</p>
            <div class="reviewer">- Founder, TechSparks</div>
        </div>
    </div>
</section>


<!-- BTS Masonry Grid -->
<!-- <section class="bts-section">
    <div class="section-header">
        <h2 style="font-size: 30px;">ON THE <span class="text-red">FLOOR</span></h2>
        <p>Behind the scenes of the magic.</p>
    </div>
    <div class="bts-grid reveal">
        <div class="bts-item"><img src="https://placehold.co/600x600/1a1a1a/FFF?text=Director+Cam" alt="BTS"></div>
        <div class="bts-item"><img src="https://placehold.co/300x300/1a1a1a/FFF?text=Lights" alt="BTS"></div>
        <div class="bts-item"><img src="https://placehold.co/300x300/1a1a1a/FFF?text=Action" alt="BTS"></div>
        <div class="bts-item"><img src="https://placehold.co/300x300/1a1a1a/FFF?text=Sound" alt="BTS"></div>
        <div class="bts-item"><img src="https://placehold.co/300x300/1a1a1a/FFF?text=Edit+Suite" alt="BTS"></div>
        <div class="bts-item"><img src="https://placehold.co/300x300/1a1a1a/FFF?text=Setup" alt="BTS"></div>
    </div>
</section> -->

<!-- Pricing -->
<!-- <section class="pricing-section" id="packages">
    <div class="section-header reveal">
        <h2>PRODUCTION <span class="text-red">PACKAGES</span></h2>
    </div>
    <div class="price-wrapper">
        <div class="price-card hover-trigger reveal">
            <h3>SOCIAL REELS</h3>
            <div class="price-tag">STARTER</div>
            <ul style="list-style: none; color: #888; text-align: left; margin-bottom: 20px;">
                <li style="margin-bottom: 10px;">✓ 15-30 Sec Duration</li>
                <li style="margin-bottom: 10px;">✓ Vertical (9:16)</li>
                <li style="margin-bottom: 10px;">✓ Basic Motion Gfx</li>
            </ul>
        </div>
        <div class="price-card hover-trigger reveal" style="border-color: var(--primary-red); transform: scale(1.05);">
            <div style="position: absolute; top: -15px; left: 50%; transform: translateX(-50%); background: var(--primary-red); padding: 5px 15px; font-weight: 700; font-size: 12px;">POPULAR</div>
            <h3>BRAND FILM</h3>
            <div class="price-tag">PRO</div>
            <ul style="list-style: none; color: #888; text-align: left; margin-bottom: 20px;">
                <li style="margin-bottom: 10px;">✓ 60-90 Sec Duration</li>
                <li style="margin-bottom: 10px;">✓ 4K Cinema Cam</li>
                <li style="margin-bottom: 10px;">✓ Script & Storyboard</li>
                <li style="margin-bottom: 10px;">✓ Pro Color Grading</li>
            </ul>
        </div>
        <div class="price-card hover-trigger reveal">
            <h3>TVC / AD</h3>
            <div class="price-tag">ELITE</div>
            <ul style="list-style: none; color: #888; text-align: left; margin-bottom: 20px;">
                <li style="margin-bottom: 10px;">✓ Full Crew & Cast</li>
                <li style="margin-bottom: 10px;">✓ Locations & Art Dir</li>
                <li style="margin-bottom: 10px;">✓ High-End VFX/CGI</li>
            </ul>
        </div>
    </div>
</section> -->

<!-- Contact -->
<style>
@media (max-width: 768px) {
    .vp-clients-grid { grid-template-columns: repeat(3, 1fr) !important; gap: 20px !important; }
}
@keyframes micPulse {
    0%, 100% { box-shadow: 0 0 0 0 rgba(229,9,20,0.6); }
    50% { box-shadow: 0 0 0 14px rgba(229,9,20,0); }
}
#voiceMicBtn.listening {
    background: rgba(229,9,20,0.15) !important;
    border-color: #e50914 !important;
    color: #e50914 !important;
    animation: micPulse 1.2s infinite;
}
#voiceMicBtn.processing { border-color: #f59e0b !important; color: #f59e0b !important; pointer-events: none; }
#voiceMicBtn.done { border-color: #25D366 !important; color: #25D366 !important; }
@keyframes fieldGlow {
    0% { box-shadow: 0 0 0 0 rgba(229,9,20,0.4); }
    50% { box-shadow: 0 0 12px 3px rgba(229,9,20,0.15); }
    100% { box-shadow: none; }
}
.field-filled { animation: fieldGlow 1.5s ease; }
/* Skeleton */
#formSkeleton { display: none; }
.skeleton-row { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 14px; }
.skeleton-box, .skeleton-textarea {
    background: linear-gradient(90deg, rgba(255,255,255,0.05) 25%, rgba(255,255,255,0.09) 50%, rgba(255,255,255,0.05) 75%);
    background-size: 200% 100%;
    animation: sk-pulse 1.5s infinite;
    border-radius: 8px;
}
.skeleton-box { height: 50px; }
.skeleton-textarea { height: 90px; width: 100%; margin-bottom: 14px; }
@keyframes sk-pulse { 0% { background-position: 200% 0; } 100% { background-position: -200% 0; } }
</style>

<section class="contact-wrap" id="contact">
    <div class="contact-overlay"></div>
    <div class="contact-inner reveal">

        <!-- LEFT: Copy & perks -->
        <div class="contact-left">
            <span class="contact-kicker">Let's Create Together</span>
            <h2 class="contact-headline">Ready to <span>Roll?</span></h2>
            <p class="contact-body">You have a vision, we have the crew, cameras, and creative firepower to bring it to life. Drop us a brief — no strings attached.</p>
            <ul class="contact-perks">
                <li>Response within 2 business hours</li>
                <li>End-to-end production — concept to delivery</li>
            </ul>
            <div class="contact-direct">
                <a href="tel:+919773511447">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07A19.5 19.5 0 0 1 4.69 12 19.79 19.79 0 0 1 1.61 3.4 2 2 0 0 1 3.6 1.22h3a2 2 0 0 1 2 1.72c.127.96.361 1.903.7 2.81a2 2 0 0 1-.45 2.11L7.91 8.81a16 16 0 0 0 6.29 6.29l.95-.96a2 2 0 0 1 2.11-.45c.907.339 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                    +91 97735 11447
                </a>
                <a href="mailto:brajesh@thumbpin.in">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect width="20" height="16" x="2" y="4" rx="2"/><path d="m22 7-8.97 5.7a1.94 1.94 0 0 1-2.06 0L2 7"/></svg>
                    brajesh@thumbpin.in
                </a>
            </div>
        </div>

        <!-- RIGHT: Form card -->
        <div class="contact-card">

            <!-- Voice AI -->  
            <div style="margin-bottom: 24px; display:flex; align-items:center; gap:12px; flex-wrap:wrap;">
                <button type="button" id="voiceMicBtn" onclick="startVoiceInput()" style="background: rgba(229,9,20,0.08); border: 1px solid rgba(229,9,20,0.3); border-radius: 8px; padding: 10px 20px; color: #e50914; font-size: 13px; font-weight: 700; cursor: pointer; display: inline-flex; align-items: center; gap: 8px; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px; font-family:'Poppins',sans-serif;">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M12 1a3 3 0 0 0-3 3v8a3 3 0 0 0 6 0V4a3 3 0 0 0-3-3z"/><path d="M19 10v2a7 7 0 0 1-14 0v-2"/><line x1="12" y1="19" x2="12" y2="23"/><line x1="8" y1="23" x2="16" y2="23"/></svg>
                    <span id="micLabel">Speak to Fill Form</span>
                </button>
                <p id="voiceStatus" style="color: #555; font-size: 12px; margin: 0; display: none; flex:1;"></p>
            </div>

            <div id="form-messages" style="display:none; padding: 12px 16px; border-radius: 8px; margin-bottom: 18px; font-size: 14px; font-weight: 600;"></div>

            <!-- Skeleton -->
            <div id="formSkeleton">
                <div class="skeleton-row"><div class="skeleton-box"></div><div class="skeleton-box"></div></div>
                <div class="skeleton-row"><div class="skeleton-box"></div><div class="skeleton-box"></div></div>
                <div class="skeleton-row"><div class="skeleton-box"></div><div class="skeleton-box"></div></div>
                <div class="skeleton-textarea"></div>
                <div class="skeleton-box" style="width:160px;"></div>
            </div>

            <form id="contactForm">
                @csrf
                <div class="c-row">
                    <div class="c-field"><input type="text" name="name" class="c-input" placeholder="Your Name *" required></div>
                    <div class="c-field"><input type="text" name="company_name" class="c-input" placeholder="Brand / Company"></div>
                </div>
                <div class="c-row">
                    <div class="c-field"><input type="email" name="email" class="c-input" placeholder="Email Address *" required></div>
                    <div class="c-field"><input type="tel" name="phone" class="c-input" placeholder="Phone Number *" required></div>
                </div>
                <div class="c-row">
                    <div class="c-field">
                        <select name="video_type" class="c-input" required>
                            <option value="" disabled selected>Video Type *</option>
                            <option value="Corporate Film">Corporate Film</option>
                            <option value="Product Shoot">Product Shoot</option>
                            <option value="Brand Film">Brand Film</option>
                            <option value="Short Content / Reels">Short Content / Reels</option>
                            <option value="Podcast">Podcast</option>
                            <option value="Event Coverage">Event Coverage</option>
                            <option value="AI Video">AI Video</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="c-field">
                        <select name="budget_range" class="c-input" required>
                            <option value="" disabled selected>Budget Range *</option>
                            <option value="1L – 3L">₹1L – ₹3L</option>
                            <option value="3L – 5L">₹3L – ₹5L</option>
                            <option value="5L+">₹5L+</option>
                        </select>
                    </div>
                </div>
                <div class="c-field">
                    <textarea name="message" rows="3" class="c-input" placeholder="Tell us about your project... *" required style="resize:vertical; min-height:90px;"></textarea>
                </div>

                <button type="submit" id="submitBtn" class="c-submit">Send Brief &rarr;</button>

                <div class="c-actions">
                    <button type="button" onclick="resetForm()" class="c-btn-reset">
                        <svg xmlns="http://www.w3.org/2000/svg" width="13" height="13" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M3 12a9 9 0 0 1 9-9 9.75 9.75 0 0 1 6.74 2.74L21 8"/><path d="M21 3v5h-5"/><path d="M21 12a9 9 0 0 1-9 9 9.75 9.75 0 0 1-6.74-2.74L3 16"/><path d="M3 21v-5h5"/></svg>
                        Reset
                    </button>
                    <a href="https://api.whatsapp.com/send?phone=919773511447" target="_blank" class="c-btn-wa">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 24 24" fill="currentColor"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347z"/><path d="M12 2C6.477 2 2 6.477 2 12c0 1.89.525 3.66 1.438 5.168L2 22l4.832-1.438A9.955 9.955 0 0012 22c5.523 0 10-4.477 10-10S17.523 2 12 2zm0 18a8 8 0 01-4.34-1.272l-.31-.186-2.828.84.84-2.828-.186-.31A8 8 0 1112 20z"/></svg>
                        WhatsApp Us
                    </a>
                </div>
            </form>
        </div>

    </div>
</section>

<!-- Custom VP Footer -->
<footer class="vp-footer">
    <div class="vp-footer-container">
        <div class="vp-footer-content">
            <div class="vp-footer-brand">
                <img src="/assets/img/logo/logo.png" alt="Thumbpin Logo" class="vp-footer-logo">
                <p class="vp-footer-desc">Crafting high-impact visual narratives for forward-thinking brands. Based in Gurgaon, available worldwide.</p>
            </div>
            <div class="vp-footer-info">
                <div class="vp-info-group">
                    <h4>Direct Contact</h4>
                    <a href="tel:+919773511447">+91 97735 11447</a>
                    <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
                </div>
                <div class="vp-info-group">
                    <h4>Location</h4>
                    <p>12th floor,<br>Beyond Just Work, Tower A, Spaze iTech park,<br>Sector 49, Gurgaon 122018</p>
                </div>
            </div>
        </div>
        <div class="vp-footer-bottom">
            <span>© {{ date('Y') }} THUMBPIN STUDIOS. ALL RIGHTS RESERVED.</span>
            <span>CINEMA IS ETERNAL.</span>
        </div>
    </div>
</footer>

<!-- Video Modal (Preserved) -->
<div id="videoModal" style="display:none; position:fixed; inset:0; background:rgba(0,0,0,0.95); z-index:10000; align-items:center; justify-content:center;">
    <div style="position:relative; width:90%; max-width:1000px; aspect-ratio:16/9;">
        <span onclick="closeVideoModal()" style="position:absolute; top:-40px; right:0; color:#fff; font-size:40px; cursor:pointer;" class="hover-trigger">&times;</span>
        <iframe id="modalVideo" src="" style="width:100%; height:100%; border:none;" allow="autoplay"></iframe>
    </div>
</div>

<!-- MP4 Video Modal -->
<div id="mp4Modal">
    <div class="mp4-modal-inner">
        <span class="mp4-close hover-trigger" onclick="closeMp4Modal()">&times;</span>
        <video id="mp4ModalVideo" controls playsinline></video>
    </div>
</div>

<script>
// === LAZY VIDEO LOADING VIA INTERSECTIONOBSERVER ===
var lazyVideoObserver = new IntersectionObserver(function(entries) {
    entries.forEach(function(entry) {
        if (entry.isIntersecting) {
            var vid = entry.target;
            if (vid.dataset.src && !vid.src) {
                vid.src = vid.dataset.src;
                // Bento items: thumbnail only (no autoplay). Others: autoplay.
                if (vid.closest('.lb-item')) {
                    vid.preload = 'metadata';
                    vid.load();
                } else {
                    vid.load();
                    vid.play().catch(function(){});
                }
            }
            lazyVideoObserver.unobserve(vid);
        }
    });
}, { rootMargin: '200px' });

document.querySelectorAll('video[data-src]').forEach(function(vid) {
    lazyVideoObserver.observe(vid);
});

// Case study video hover play/pause
document.querySelectorAll('.case-minimal-video').forEach(function(videoWrap) {
    var video = videoWrap.querySelector('video');
    if (video) {
        videoWrap.addEventListener('mouseenter', function() { video.play(); });
        videoWrap.addEventListener('mouseleave', function() { video.pause(); });
    }
});

// === BENTO: CLICK ANYWHERE TO OPEN MP4 MODAL ===
document.querySelectorAll('.lb-item').forEach(function(item) {
    var btn = item.querySelector('.lb-play-btn[data-video-url]');
    if (!btn) return;
    var url = btn.getAttribute('data-video-url');
    item.style.cursor = 'pointer';
    item.addEventListener('click', function() {
        var modal = document.getElementById('mp4Modal');
        var vid = document.getElementById('mp4ModalVideo');
        vid.src = url;
        modal.style.display = 'flex';
        vid.play().catch(function(){});
    });
});

function closeMp4Modal() {
    var modal = document.getElementById('mp4Modal');
    var vid = document.getElementById('mp4ModalVideo');
    vid.pause();
    vid.src = '';
    modal.style.display = 'none';
}
document.getElementById('mp4Modal').addEventListener('click', function(e) {
    if (e.target === this) closeMp4Modal();
});

// === PRODUCT SHOOT HOVER EXPANSION ===
if (window.innerWidth > 991) {
    document.querySelectorAll('.product-item[data-row][data-col]').forEach(function(item) {
        item.addEventListener('mouseenter', function() {
            var row = this.dataset.row;
            var col = this.dataset.col;
            var oppositeRow = row === 'top' ? 'bottom' : 'top';
            var pair = document.querySelector('.product-item[data-row="' + oppositeRow + '"][data-col="' + col + '"]');

            this.classList.add('expanded');
            if (pair) pair.classList.add('hidden-pair');
        });

        item.addEventListener('mouseleave', function() {
            var row = this.dataset.row;
            var col = this.dataset.col;
            var oppositeRow = row === 'top' ? 'bottom' : 'top';
            var pair = document.querySelector('.product-item[data-row="' + oppositeRow + '"][data-col="' + col + '"]');

            this.classList.remove('expanded');
            if (pair) pair.classList.remove('hidden-pair');
        });
    });
}

// === GEAR SECTION INTERACTIVITY ===
function showGear(index) {
    document.querySelectorAll('.gear-item').forEach(el => el.classList.remove('active'));
    document.querySelectorAll('.gear-item')[index].classList.add('active');
    document.querySelectorAll('.gear-img').forEach(img => img.classList.remove('show'));
    document.querySelectorAll('.gear-img')[index].classList.add('show');
}

// === SCROLL REVEAL ===
function reveal() {
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var windowHeight = window.innerHeight;
        var elementTop = reveals[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - 100) reveals[i].classList.add("active");
    }
}
window.addEventListener("scroll", reveal);
reveal();

// === LENIS SMOOTH SCROLL INITIALIZATION ===
// === LENIS SMOOTH SCROLL INITIALIZATION ===
// Initializing Lenis only for larger screens
let lenis;
if (window.innerWidth >= 768) {
    lenis = new Lenis({
        duration: 1.0,
        easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
        smoothWheel: true,
        syncTouch: true,
        syncTouchLerp: 0.1,
        touchMultiplier: 2.5,
        wheelMultiplier: 1.1,
        infinite: false,
    });

    function raf(time) {
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);
}

// === SCROLL EVENTS (LENIS SYNCED IF ENABLED) ===
if (lenis) {
    lenis.on('scroll', (e) => {
        const scrollY = e.scrollY;
        
        // Manage "is-scrolling" state for CSS pointer-event blocking
        if (e.velocity > 0.5 || e.velocity < -0.5) {
            document.body.classList.add('lenis-scrolling');
        } else {
            document.body.classList.remove('lenis-scrolling');
        }

        // Navbar background
        const nav = document.getElementById('navbar');
        if (nav) scrollY > 50 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled');
        
        // Reveal check (synchronized with scroll)
        reveal();
    });
} else {
    // Fallback scroll listener for mobile
    window.addEventListener('scroll', () => {
        const scrollY = window.scrollY;
        const nav = document.getElementById('navbar');
        if (nav) scrollY > 50 ? nav.classList.add('scrolled') : nav.classList.remove('scrolled');
        reveal();
    });
}

// Explicitly stop scrolling on interactive triggers
function stopScroll() { if (lenis) lenis.stop(); }
function startScroll() { if (lenis) lenis.start(); }


function openVideoModal(url) {
    document.getElementById('videoModal').style.display = 'flex';
    document.getElementById('modalVideo').src = url + "?autoplay=1";
}
function closeVideoModal() {
    document.getElementById('videoModal').style.display = 'none';
    document.getElementById('modalVideo').src = "";
}

// Mobile hints
window.onload = function() {
    if(window.innerWidth < 768) {
        document.querySelector('.mobile-only-hint').style.display = 'block';
    }
}

// === PERFORMANCE CARD VIDEO LOADER ===
function loadPerfVideo(thumb, videoId) {
    // Pause marquee
    var scroll = document.querySelector('.perf-scroll');
    if (scroll) scroll.style.animationPlayState = 'paused';
    
    thumb.innerHTML = '<iframe src="https://www.youtube.com/embed/' + videoId + '?rel=0&modestbranding=1&playsinline=1&autoplay=1" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen style="position:absolute;top:0;left:0;width:100%;height:100%;border:none;"></iframe>';
    thumb.style.cursor = 'default';
    thumb.onclick = null;
}

function resetForm() {
    var form = document.getElementById('contactForm');
    form.reset();
    // Reset select text colors
    form.querySelectorAll('select').forEach(function(sel) {
        sel.style.color = '#999';
    });
    // Scroll to top of form
    form.scrollIntoView({ behavior: 'smooth', block: 'center' });
}

function prefillLeadForm(category, context) {
    var form = document.getElementById('contactForm');
    var categorySelect = form.querySelector('select[name="video_type"]');
    var messageTextarea = form.querySelector('textarea[name="message"]');

    // 1. Scroll to form
    form.scrollIntoView({ behavior: 'smooth', block: 'center' });

    // 2. Set category
    if (categorySelect) {
        categorySelect.value = category;
        categorySelect.style.color = '#111';
        categorySelect.classList.add('field-filled');
    }

    // 3. Set message context
    if (messageTextarea) {
        messageTextarea.value = "Hello Thumbpin Studios,\n\nI was just exploring your portfolio and was thoroughly impressed by the creative direction of the '" + context + "' project. I'm looking to produce a " + (category || "project") + " that achieves a similar high-end cinematic feel and narrative impact for my brand.\n\nI'd love to discuss how your team can help us translate our vision into a cinematic masterpiece. Looking forward to connecting!";
        messageTextarea.classList.add('field-filled');
        messageTextarea.focus();
    }

    // 4. Cleanup animation class after 2s
    setTimeout(function() {
        if (categorySelect) categorySelect.classList.remove('field-filled');
        if (messageTextarea) messageTextarea.classList.remove('field-filled');
    }, 2000);
}

// === VOICE AI FORM FILLER ===
var voiceRecognition = null;
var isListening = false;

function startVoiceInput() {
    var micBtn = document.getElementById('voiceMicBtn');
    var micLabel = document.getElementById('micLabel');
    var statusEl = document.getElementById('voiceStatus');

    // If already listening, stop
    if (isListening && voiceRecognition) {
        voiceRecognition.stop();
        return;
    }

    // Check browser support
    var SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
    if (!SpeechRecognition) {
        statusEl.textContent = 'Voice input is not supported in this browser. Please use Chrome.';
        statusEl.style.color = '#e50914';
        statusEl.style.display = 'block';
        return;
    }

    voiceRecognition = new SpeechRecognition();
    voiceRecognition.lang = 'en-IN';
    voiceRecognition.continuous = true;
    voiceRecognition.interimResults = false;
    voiceRecognition.maxAlternatives = 1;

    var fullTranscript = '';

    voiceRecognition.onstart = function() {
        isListening = true;
        micBtn.className = 'listening';
        micLabel.textContent = 'Listening... Tap to stop';
        statusEl.textContent = 'Speak naturally about your project, name, email, phone, budget...';
        statusEl.style.color = '#666';
        statusEl.style.display = 'block';
    };

    voiceRecognition.onresult = function(event) {
        for (var i = event.resultIndex; i < event.results.length; i++) {
            if (event.results[i].isFinal) {
                fullTranscript += event.results[i][0].transcript + ' ';
            }
        }
        statusEl.textContent = '"' + fullTranscript.trim().substring(0, 80) + '..."';
    };

    voiceRecognition.onerror = function(event) {
        isListening = false;
        micBtn.className = '';
        micLabel.textContent = 'Speak to Fill Form';
        if (event.error === 'not-allowed') {
            statusEl.textContent = 'Microphone access denied. Please allow mic access and try again.';
        } else {
            statusEl.textContent = 'Error: ' + event.error + '. Please try again.';
        }
        statusEl.style.color = '#e50914';
        statusEl.style.display = 'block';
    };

    voiceRecognition.onend = function() {
        isListening = false;
        if (fullTranscript.trim().length > 5) {
            processWithAI(fullTranscript.trim());
        } else {
            micBtn.className = '';
            micLabel.textContent = 'Speak to Fill Form';
            statusEl.textContent = 'Could not hear you clearly. Please try again.';
            statusEl.style.color = '#e50914';
            statusEl.style.display = 'block';
        }
    };

    voiceRecognition.start();
}

function processWithAI(transcript) {
    var micBtn = document.getElementById('voiceMicBtn');
    var micLabel = document.getElementById('micLabel');
    var statusEl = document.getElementById('voiceStatus');
    var form = document.getElementById('contactForm');
    var skeleton = document.getElementById('formSkeleton');

    // UI Feedback
    micBtn.className = 'processing';
    micLabel.textContent = 'AI is thinking...';
    statusEl.textContent = 'Processing your speech with AI...';
    statusEl.style.color = '#f59e0b';
    
    // Hide Form, Show Skeleton with Fade
    form.style.opacity = '0';
    setTimeout(function() {
        form.style.display = 'none';
        skeleton.style.display = 'block';
        skeleton.style.opacity = '1';
        skeleton.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }, 300);

    var csrfToken = document.querySelector('meta[name="csrf-token"]')
        ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        : (document.querySelector('input[name="_token"]') ? document.querySelector('input[name="_token"]').value : '');

    fetch('/api/voice-parse', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ transcript: transcript, _token: csrfToken })
    })
    .then(function(res) { return res.json(); })
    .then(function(result) {
        // Hide Skeleton, Show Form
        skeleton.style.display = 'none';
        form.style.display = 'block';
        setTimeout(function() { form.style.opacity = '1'; }, 50);

        if (result.success && result.data) {
            fillFormWithAI(result.data);
            micBtn.className = 'done';
            micLabel.textContent = '✓ Form Filled!';
            statusEl.textContent = 'Review the fields below and hit Send Brief.';
            statusEl.style.color = '#25D366';
            setTimeout(function() {
                micBtn.className = '';
                micLabel.textContent = 'Speak to Fill Form';
            }, 5000);
        } else {
            micBtn.className = '';
            micLabel.textContent = 'Speak to Fill Form';
            statusEl.textContent = result.message || 'Could not process. Please try again or fill manually.';
            statusEl.style.color = '#e50914';
        }
    })
    .catch(function(err) {
        skeleton.style.display = 'none';
        form.style.display = 'block';
        form.style.opacity = '1';
        
        micBtn.className = '';
        micLabel.textContent = 'Speak to Fill Form';
        statusEl.textContent = 'Network error. Please try again.';
        statusEl.style.color = '#e50914';
    });
}

function fillFormWithAI(data) {
    var form = document.getElementById('contactForm');
    var fields = ['name', 'company_name', 'email', 'phone', 'message'];
    var delay = 0;

    fields.forEach(function(field) {
        if (data[field]) {
            setTimeout(function() {
                var el = form.querySelector('[name="' + field + '"]');
                if (el) {
                    el.value = data[field];
                    el.classList.add('field-filled');
                    setTimeout(function() { el.classList.remove('field-filled'); }, 1500);
                }
            }, delay);
            delay += 150;
        }
    });

    // Handle dropdowns (video_type, budget_range)
    ['video_type', 'budget_range'].forEach(function(field) {
        if (data[field]) {
            setTimeout(function() {
                var sel = form.querySelector('[name="' + field + '"]');
                if (sel) {
                    for (var i = 0; i < sel.options.length; i++) {
                        if (sel.options[i].value === data[field]) {
                            sel.selectedIndex = i;
                            sel.style.color = '#111';
                            sel.classList.add('field-filled');
                            setTimeout(function() { sel.classList.remove('field-filled'); }, 1500);
                            break;
                        }
                    }
                }
            }, delay);
            delay += 150;
        }
    });
}

// === FORM SUBMISSION HANDLER ===
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    var form = this;
    var submitBtn = document.getElementById('submitBtn');
    var messagesDiv = document.getElementById('form-messages');
    var formData = new FormData(form);

    var csrfToken = document.querySelector('meta[name="csrf-token"]')
        ? document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        : (document.querySelector('input[name="_token"]') ? document.querySelector('input[name="_token"]').value : '');

    if (csrfToken) {
        formData.set('_token', csrfToken);
    }

    submitBtn.disabled = true;
    submitBtn.textContent = 'SENDING...';
    messagesDiv.style.display = 'none';

    fetch('/video-production-lead', {
        method: 'POST',
        body: formData,
        headers: {
            'X-Requested-With': 'XMLHttpRequest',
            'X-CSRF-TOKEN': csrfToken
        }
    })
    .then(function(response) {
        if (response.status === 419) {
            throw new Error('CSRF_TOKEN_MISMATCH');
        }
        return response.json();
    })
    .then(function(data) {
        if (data.success) {
            messagesDiv.textContent = data.message;
            messagesDiv.style.background = 'rgba(37, 211, 102, 0.15)';
            messagesDiv.style.color = '#25D366';
            messagesDiv.style.borderLeft = '4px solid #25D366';
            messagesDiv.style.display = 'block';
            form.reset();
        } else {
            var errorMsg = data.message || 'Something went wrong. Please try again.';
            if (data.errors) {
                var allErrors = [];
                for (var key in data.errors) {
                    allErrors = allErrors.concat(data.errors[key]);
                }
                errorMsg = allErrors.join(', ');
            }
            messagesDiv.textContent = errorMsg;
            messagesDiv.style.background = 'rgba(229, 9, 20, 0.15)';
            messagesDiv.style.color = '#e50914';
            messagesDiv.style.borderLeft = '4px solid #e50914';
            messagesDiv.style.display = 'block';
        }
    })
    .catch(function(error) {
        if (error.message === 'CSRF_TOKEN_MISMATCH') {
            messagesDiv.textContent = 'Security token expired. Refreshing page...';
            messagesDiv.style.background = 'rgba(229, 9, 20, 0.15)';
            messagesDiv.style.color = '#e50914';
            messagesDiv.style.borderLeft = '4px solid #e50914';
            messagesDiv.style.display = 'block';
            setTimeout(function() { window.location.reload(); }, 3000);
        } else {
            messagesDiv.textContent = 'Network error. Please try again.';
            messagesDiv.style.background = 'rgba(229, 9, 20, 0.15)';
            messagesDiv.style.color = '#e50914';
            messagesDiv.style.borderLeft = '4px solid #e50914';
            messagesDiv.style.display = 'block';
        }
    })
    .finally(function() {
        submitBtn.disabled = false;
        submitBtn.textContent = 'SEND BRIEF';
    });
});

// AI Scroll Hint Toggle
document.addEventListener('DOMContentLoaded', function() {
    const aiScroll = document.querySelector('.ai-scroll-wrap');
    const aiHint = document.querySelector('.ai-scroll-hint');
    if (aiScroll && aiHint) {
        aiScroll.addEventListener('scroll', function() {
            if (aiScroll.scrollLeft > 30) {
                aiHint.classList.add('hidden');
            } else {
                aiHint.classList.remove('hidden');
            }
        });
    }
});
</script>
</main>
@endsection