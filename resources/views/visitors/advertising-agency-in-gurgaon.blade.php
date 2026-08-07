@extends('layout.visitor', [
'title' => 'Best Advertising Agency in Gurgaon',
'description' => 'Leading advertising agency in Gurgaon offering creative branding, digital marketing, and strategic
solutions for businesses',
'hideDefaultHeader' => true,
'hideWhatsApp' => true,
])

@section('head')
<!-- CSRF Token for AJAX requests -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- PRELOAD CRITICAL ASSETS (Speed Boost) -->
<link rel="preload" href="/assets/img/logo/logo.png" as="image">
<link rel="preload" href="/assets/img/vidproduction/aaigbg.svg" as="image">
<!-- Load HLS.js immediately -->
<script src="https://cdn.jsdelivr.net/npm/hls.js@1.4.0/dist/hls.min.js"></script>

<style>
    :root {
        --primary-red: #ff0000;
        --dark-bg: #050505;
        --card-bg: #111;
        --text-white: #ffffff;
        --text-gray: #a1a1a1;
        --transition-smooth: all 0.4s cubic-bezier(0.165, 0.84, 0.44, 1);
    }

    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }

    html {
        scroll-behavior: smooth;
        overflow-x: hidden;
        width: 100%;
    }

    body {
        background-color: #fff;
        color: #000;
        overflow-x: hidden;
        width: 100%;
        position: relative;
    }

    /* Hide default header */
    .main-header,
    .navbar,
    nav:not(.custom-nav),
    header {
        display: none !important;
    }

    /* === CREATIVE SVG LOADING SCREEN === */
    #creative-loader {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100vh;
        background-color: #000;
        z-index: 9999;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        transition: opacity 0.6s ease-out, visibility 0.6s ease-out;
        background-image:
            linear-gradient(rgba(20, 20, 20, 0.5) 1px, transparent 1px),
            linear-gradient(90deg, rgba(20, 20, 20, 0.5) 1px, transparent 1px);
        background-size: 40px 40px;
    }

    #creative-loader.fade-out {
        opacity: 0;
        visibility: hidden;
    }

    .loader-wrapper {
        position: relative;
        width: 200px;
        height: 200px;
        display: flex;
        align-items: center;
        justify-content: center;
        perspective: 1000px;
    }

    .loader-box {
        position: absolute;
        width: 150px;
        height: 150px;
        transform-style: preserve-3d;
        animation: rotate3D 3s linear infinite;
    }

    .box-face {
        position: absolute;
        width: 150px;
        height: 150px;
        background: url('/assets/img/home/box.svg') center center / contain no-repeat;
        opacity: 0.8;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.5));
    }

    .front {
        transform: rotateY(0deg) translateZ(75px);
    }

    .back {
        transform: rotateY(180deg) translateZ(75px);
    }

    .right {
        transform: rotateY(90deg) translateZ(75px);
    }

    .left {
        transform: rotateY(-90deg) translateZ(75px);
    }

    .top {
        transform: rotateX(90deg) translateZ(75px);
    }

    .bottom {
        transform: rotateX(-90deg) translateZ(75px);
    }

    .loader-logo-container {
        width: 80px;
        height: auto;
        position: relative;
        z-index: 10;
        animation: breathe 3s ease-in-out infinite;
    }

    .loader-img {
        width: 100%;
        height: auto;
        object-fit: contain;
        filter: drop-shadow(0 0 20px rgba(255, 0, 0, 0.2));
    }

    .loader-text {
        margin-top: 30px;
        font-size: 14px;
        letter-spacing: 4px;
        color: #fff;
        text-transform: uppercase;
        font-weight: 600;
        opacity: 0;
        animation: fadeInUp 1s ease-out 0.5s forwards;
    }

    .loader-text span {
        color: var(--primary-red);
    }

    .loader-progress-line {
        position: absolute;
        bottom: 0;
        left: 0;
        height: 3px;
        background: var(--primary-red);
        width: 0%;
        box-shadow: 0 -2px 10px rgba(255, 0, 0, 0.5);
        animation: progressLine 2.5s cubic-bezier(0.23, 1, 0.32, 1) forwards;
    }

    @keyframes rotate3D {
        0% {
            transform: rotateX(0deg) rotateY(0deg) rotateZ(0deg);
        }

        33% {
            transform: rotateX(360deg) rotateY(180deg) rotateZ(120deg);
        }

        66% {
            transform: rotateX(180deg) rotateY(360deg) rotateZ(240deg);
        }

        100% {
            transform: rotateX(360deg) rotateY(360deg) rotateZ(360deg);
        }
    }

    @keyframes breathe {

        0%,
        100% {
            transform: scale(0.95);
            opacity: 0.8;
        }

        50% {
            transform: scale(1.05);
            opacity: 1;
            filter: drop-shadow(0 0 30px rgba(255, 0, 0, 0.4));
        }
    }

    @keyframes fadeInUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes progressLine {
        0% {
            width: 0%;
        }

        40% {
            width: 70%;
        }

        100% {
            width: 100%;
        }
    }

    @media(max-width: 768px) {
        .loader-wrapper {
            width: 160px;
            height: 160px;
        }

        .loader-box {
            width: 120px;
            height: 120px;
        }

        .box-face {
            width: 120px;
            height: 120px;
        }

        .front,
        .back {
            transform: rotateY(0deg) translateZ(60px);
        }

        .right {
            transform: rotateY(90deg) translateZ(60px);
        }

        .left {
            transform: rotateY(-90deg) translateZ(60px);
        }

        .top {
            transform: rotateX(90deg) translateZ(60px);
        }

        .bottom {
            transform: rotateX(-90deg) translateZ(60px);
        }

        .loader-logo-container {
            width: 60px;
        }
    }

    /* --- UTILITY CLASSES --- */
    .text-red {
        color: var(--primary-red) !important;
    }

    .text-white {
        color: var(--text-white) !important;
    }

    .fw-900 {
        font-weight: 900;
    }

    .reveal {
        opacity: 0;
        transform: translateY(30px);
        transition: all 0.8s ease;
    }

    .reveal.active {
        opacity: 1;
        transform: translateY(0);
    }

    .clip-reveal {
        opacity: 0;
        clip-path: inset(0 50% 0 50%);
        transition: all 1s cubic-bezier(0.77, 0, 0.175, 1);
    }

    .clip-reveal.active {
        opacity: 1;
        clip-path: inset(0 0 0 0);
    }

    .stagger-up {
        opacity: 0;
        transform: translateY(100px) scale(0.9);
        filter: blur(10px);
        transition: all 0.8s cubic-bezier(0.23, 1, 0.32, 1);
    }

    .stagger-up.active {
        opacity: 1;
        transform: translateY(0) scale(1);
        filter: blur(0);
    }

    /* --- CUSTOM NAVBAR --- */
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
        background: transparent;
    }

    .custom-nav.scrolled {
        background: rgba(0, 0, 0, 0.8);
        backdrop-filter: blur(15px);
        padding: 15px 50px;
        border-bottom: 1px solid rgba(255, 255, 255, 0.1);
    }

    .nav-logo {
        font-size: 24px;
        font-weight: 900;
        color: #fff;
        letter-spacing: -1px;
        text-decoration: none;
        display: flex;
        align-items: center;
        gap: 5px;
    }

    .nav-logo span {
        color: var(--primary-red);
        font-size: 30px;
        line-height: 0;
        margin-bottom: 5px;
    }

    .nav-logo-img {
        height: 24px;
        width: auto;
        display: block;
        object-fit: contain;
    }

    @media(max-width: 480px) {
        .nav-logo-img {
            max-width: 120px;
            height: auto;
        }
    }

    .nav-menu {
        display: flex;
        gap: 40px;
    }

    .nav-link {
        color: #fff;
        text-decoration: none;
        font-size: 14px;
        font-weight: 500;
        text-transform: uppercase;
        letter-spacing: 1px;
        position: relative;
        padding: 5px 0;
        opacity: 0.9;
        transition: opacity 0.3s;
    }

    .nav-link:hover {
        opacity: 1;
    }

    .nav-link::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 0;
        width: 0;
        height: 2px;
        background-color: var(--primary-red);
        transition: width 0.3s ease;
    }

    .nav-link:hover::after {
        width: 100%;
    }

    .nav-cta {
        padding: 10px 25px;
        background: #fff;
        color: #000;
        border-radius: 30px;
        font-weight: 700;
        text-decoration: none;
        font-size: 14px;
        transition: transform 0.3s ease, background-color 0.3s;
    }

    .nav-cta:hover {
        transform: scale(1.05);
        background-color: var(--primary-red);
        color: #fff;
    }

    .nav-cta-highlight {
        color: var(--primary-red);
        transition: color 0.3s;
    }

    .nav-cta:hover .nav-cta-highlight {
        color: #fff;
    }

    @media(max-width: 768px) {
        .custom-nav {
            padding: 20px;
        }

        .nav-menu {
            display: none;
        }
    }

    /* --- HERO SECTION --- */
    .hero-section {
        background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.1)), url('/assets/img/vidproduction/aaigbg.svg') center center / cover no-repeat;
        height: 100vh;
        min-height: 700px;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        overflow: hidden;
        /* Speed optimization for background */
        will-change: transform;
    }

    .hero-overlay {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: radial-gradient(circle at center, transparent 0%, rgba(0, 0, 0, 0.4) 100%);
        z-index: 1;
    }

    /* Animated Floating Elements */
    .float-shape {
        position: absolute;
        background: url('/assets/img/home/box.svg') no-repeat center center / contain;
        opacity: 0.8;
        z-index: 2;
        pointer-events: none;
        filter: drop-shadow(0 10px 20px rgba(0, 0, 0, 0.5));
    }

    .shape-1 {
        top: 15%;
        right: 15%;
        width: 150px;
        height: 150px;
        animation: float1 8s ease-in-out infinite;
    }

    .shape-2 {
        bottom: 20%;
        left: 10%;
        width: 120px;
        height: 120px;
        animation: float2 10s ease-in-out infinite;
    }

    @keyframes float1 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg);
        }

        50% {
            transform: translate(-20px, -30px) rotate(8deg);
        }
    }

    @keyframes float2 {

        0%,
        100% {
            transform: translate(0, 0) rotate(0deg);
        }

        50% {
            transform: translate(20px, 20px) rotate(-8deg);
        }
    }

    .hero-content {
        max-width: 1400px;
        text-align: center;
        position: relative;
        z-index: 3;
        padding: 0 20px;
        margin-top: 60px;
    }

    .hero-title {
        font-size: 100px;
        font-weight: 900;
        color: #fff;
        line-height: 0.95;
        letter-spacing: -3px;
        margin-bottom: 22px;
        text-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);

    }

    /* --- UPDATED STRATEGY ANIMATION (Gradient Shimmer) --- */
    .hero-title .highlight {
        /* Base Styling */
        position: relative;
        display: inline-block;
        padding: 8px 0px;
        color: var(--primary-red);
        
        /* Shimmer Effect */
        background: linear-gradient(110deg, var(--primary-red) 30%, #ff9999 50%, var(--primary-red) 70%);
        background-size: 200% auto;
        
        /* Text Clip magic */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
        background-clip: text;
        
        /* Animation */
        animation: shimmerText 5s linear infinite;
        
        /* Reset messy old properties */
        -webkit-text-stroke: 0; 
        text-shadow: none;
    }

    @keyframes shimmerText {
        0% {
            background-position: 0% center;
        }
        100% {
            background-position: 200% center;
        }
    }
    
    /* --- END ANIMATION UPDATE --- */

    .tagline-wrapper {
        margin-bottom: 40px;
        display: inline-block;
    }

    .hero-tagline {
        background: rgba(255, 0, 0, 0.9);
        padding: 12px 60px;
        border-radius: 100px;
        box-shadow: 0 10px 30px rgba(255, 0, 0, 0.4);
        transition: transform 0.3s;
        display: inline-flex;
        gap: 20px;
        align-items: center;
    }

    .hero-tagline:hover {
        transform: skewX(-12deg) scale(1.05);
    }

    .hero-tagline span {
        display: flex;
        align-items: baseline;
        font-size: 42px;
        color: #fff;
        font-weight: 800;
        letter-spacing: 1px;
    }

    .tiny-box {
        width: 38px;
        height: 38px;
        object-fit: contain;
        margin-top: 8px;
        padding-top: 18px;
        margin-left: 2px;
        display: inline-block;
    }

    @media(max-width: 650px) {
        .hero-tagline {
            flex-direction: column;
            gap: 0px;
            padding: 8px 24px;
            border-radius: 15px;
        }

        .hero-tagline span {
            font-size: 38px;
            line-height: 1.2;
            white-space: nowrap;
            justify-content: center;
        }

        .tiny-box {
            width: 20px;
            height: 20px;
            padding-top: 6px;
            margin-top: 2px;
        }
    }

    .hero-subtitle {
        font-size: 22px;
        color: rgba(255, 255, 255, 0.9);
        margin-top: 30px;
        max-width: 700px;
        margin-left: auto;
        margin-right: auto;
        font-weight: 300;
        letter-spacing: 0.5px;
    }

    .typing-text {
        color: var(--primary-red);
        font-weight: 700;
        position: relative;
    }

    .typing-cursor {
        display: inline-block;
        width: 3px;
        height: 1em;
        background-color: var(--primary-red);
        margin-left: 2px;
        vertical-align: middle;
        animation: blink 1s step-end infinite;
    }

    @keyframes blink {
        50% {
            opacity: 0;
        }
    }

    /* Scroll Down Arrow */
    .scroll-down {
        position: absolute;
        bottom: 35px;
        left: 50%;
        transform: translateX(-50%);
        z-index: 4;
        cursor: pointer;
        opacity: 0.4;
        transition: opacity 0.3s;
    }

    .scroll-down:hover {
        opacity: 1;
    }

    .scroll-arrow {
        width: 20px;
        height: 20px;
        border: 2px solid #fff;
        border-right: none;
        border-top: none;
        transform: rotate(-45deg);
        animation: scrollBounce 2s infinite;
        margin: 0 auto 12px;
    }

    .scroll-text {
        color: #fff;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
    }

    @keyframes scrollBounce {

        0%,
        100% {
            transform: translateY(0) rotate(-45deg);
        }

        50% {
            transform: translateY(8px) rotate(-45deg);
        }
    }

    /* Hero CTA Button for Mobile */
    .hero-cta {
        display: none;
        margin-top: 40px;
        padding: 15px 40px;
        background: rgba(255, 255, 255, 0.1);
        color: #fff;
        border: 2px solid rgba(255, 255, 255, 0.3);
        border-radius: 50px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        cursor: pointer;
        transition: all 0.3s;
        backdrop-filter: blur(10px);
        text-decoration: none;
        display: inline-block;
    }

    .hero-cta:hover {
        transform: translateY(-3px);
        background: rgba(255, 255, 255, 0.2);
        border-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 15px 40px rgba(255, 255, 255, 0.1);
    }

    @media(max-width: 768px) {
        .hero-cta {
            display: inline-block;
            margin-top: 30px;
        }
    }

    @media(min-width: 769px) {
        .hero-cta {
            display: none !important;
        }
    }

    /* Video Modal Styles - Fixed to Show Actual Size */
    .video-modal {
        display: none;
        position: fixed;
        z-index: 10000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.95);
        backdrop-filter: blur(5px);
        display: none;
        /* hidden by default */
        align-items: center;
        justify-content: center;
    }

    .modal-content {
        position: relative;
        /* Remove fixed aspect ratio to allow full video size */
        width: auto;
        height: auto;
        max-width: 95%;
        max-height: 95vh;
        box-shadow: 0 0 50px rgba(0, 0, 0, 0.5);
        background: #000;
        border-radius: 10px;
        overflow: hidden;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .modal-content iframe,
    .modal-content video {
        display: block;
        max-width: 100%;
        max-height: 90vh;
        /* Ensure video controls layout */
        width: auto;
        height: auto;
        object-fit: contain;
    }

    /* Special case for YouTube iframes which need size hints */
    .modal-content.is-youtube iframe {
        width: 80vw;
        height: 45vw;
        max-width: 1200px;
        max-height: 675px;
    }


    .close-modal {
        position: absolute;
        top: -40px;
        right: 0;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
        z-index: 10001;
        transition: 0.3s;
    }

    .close-modal:hover {
        color: var(--primary-red);
        transform: rotate(90deg);
    }

    /* --- WHAT WE DO SECTION --- */
    .what-we-do-section {
        padding: 120px 20px;
        background: #fff;
        position: relative;
    }

    .section-container {
        max-width: 1300px;
        margin: 0 auto;
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 80px;
    }

    .video-container {
        flex: 1.5;
        background-color: #f0f0f0;
        border-radius: 20px;
        overflow: hidden;
        position: relative;
        aspect-ratio: 16/9;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.15);
        transform-style: preserve-3d;
        perspective: 1000px;
        transition: transform 0.5s ease;
        cursor: pointer;
    }

    .video-container:hover {
        transform: translateY(-10px);
    }

    /* Unified Play Overlay for all clickable videos */
    .click-play-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.3);
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.3s;
        z-index: 2;
    }

    .video-container:hover .click-play-overlay,
    .case-video:hover .click-play-overlay,
    .mockup-screen:hover .click-play-overlay {
        background: rgba(0, 0, 0, 0.1);
    }

    .big-play-btn {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.2);
        backdrop-filter: blur(10px);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s, background 0.3s;
        border: 2px solid rgba(255, 255, 255, 0.5);
    }

    .big-play-btn svg {
        width: 30px;
        height: 30px;
        fill: #fff;
        /* Optical centering - triangle needs slight offset */
    }

    .video-container:hover .big-play-btn,
    .case-video:hover .big-play-btn,
    .mockup-screen:hover .big-play-btn {
        transform: scale(1.1);
        background: var(--primary-red);
        border-color: var(--primary-red);
    }

    .video-content {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .what-we-do-text {
        flex: 1;
        text-align: left;
        position: relative;
    }

    .what-we-do-text h2 {
        font-size: 110px;
        font-weight: 900;
        color: var(--primary-red);
        line-height: 0.9;
        letter-spacing: -4px;
        position: relative;
        z-index: 2;
    }

    .what-we-do-text h2::after {
        content: '?';
        position: absolute;
        top: -60px;
        right: 20px;
        font-size: 250px;
        color: rgba(0, 0, 0, 0.03);
        z-index: -1;
    }

    @media(max-width: 768px) {
        .what-we-do-text h2::after {
            right: 0;
            font-size: 180px;
            top: -40px;
        }
    }

    .what-we-do-desc {
        font-size: 20px;
        margin-top: 30px;
        color: #333;
        line-height: 1.6;
    }

    /* --- SERVICES (BENTO GRID) --- */
    .services-section {
        padding: 120px 20px;
        background: #050505;
        color: #fff;
    }

    .services-header {
        max-width: 1200px;
        margin: 0 auto 60px;
        text-align: center;
    }

    .services-header h2 {
        font-size: 50px;
        font-weight: 800;
        letter-spacing: -1px;
    }

    .services-header span {
        color: var(--primary-red);
    }

    .services-container {
        max-width: 1200px;
        margin: 0 auto;
    }

    .bento-grid-v2 {
        display: grid;
        grid-template-columns: repeat(12, 1fr);
        gap: 24px;
    }

    /* Bento Grid Layout Logic */
    .grid-item {
        background-color: #111;
        border: 1px solid #222;
        border-radius: 24px;
        padding: 40px;
        position: relative;
        overflow: hidden;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        transition: var(--transition-smooth);
        background-size: cover;
        background-position: center;
        min-height: 300px;
    }

    .grid-item::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(to top, rgba(0, 0, 0, 0.9) 10%, rgba(0, 0, 0, 0.3) 100%);
        z-index: 1;
    }

    .grid-item:hover {
        transform: translateY(-8px);
        border-color: #333;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
    }

    .grid-item.span-6 {
        grid-column: span 12;
    }

    @media(min-width: 900px) {
        .grid-item.span-6 {
            grid-column: span 6;
        }
    }

    .grid-marquee-item {
        grid-column: span 12;
        width: 100vw;
        position: relative;
        left: 50%;
        right: 50%;
        margin-left: -50vw;
        margin-right: -50vw;
        background: var(--primary-red);
        height: 50px;
        overflow: hidden;
        display: flex;
        align-items: center;
        border-radius: 0;
        margin-bottom: -15px;
    }

    .expertise-marquee-wrapper {
        display: flex;
        width: 100%;
        overflow: hidden;
    }

    .expertise-marquee-content {
        display: flex;
        white-space: nowrap;
        animation: expertiseMarquee 25s linear infinite;
    }

    .expertise-marquee-content span {
        color: #fff;
        font-weight: 800;
        font-size: 20px;
        text-transform: uppercase;
        margin-right: 50px;
        letter-spacing: 2px;
        display: flex;
        align-items: center;
        height: 50px;
    }

    @keyframes expertiseMarquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    .grid-item.span-12 {
        grid-column: span 12;
        display: flex;
        flex-direction: row;
        align-items: center;
        justify-content: space-between;
        min-height: 350px;
    }

    .bg-card-1 {
        background-image: url('/assets/img/vidproduction/cardbg.webp');
    }

    .bg-card-2 {
        background-image: url('/assets/img/vidproduction/cardbg2.webp');
    }

    .bg-card-3 {
        background-image: url('/assets/img/vidproduction/cardbg3.webp');
    }

    .bg-card-4 {
        background-image: url('/assets/img/vidproduction/cardbg4.webp');
    }

    .bg-card-full {
        background: linear-gradient(135deg, #1a1a1a 0%, #000 100%);
    }

    .b-content {
        position: relative;
        z-index: 2;
        width: 100%;
    }

    .b-number {
        font-size: 180px;
        font-weight: 900;
        color: rgba(255, 255, 255, 0.03);
        position: absolute;
        top: -50px;
        left: -20px;
        line-height: 1;
        pointer-events: none;
        z-index: 0;
    }

    .b-icon {
        width: 80px;
        height: 80px;
        background: rgba(255, 255, 255, 0.05);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: auto;
        position: absolute;
        top: 30px;
        right: 30px;
        z-index: 2;
        backdrop-filter: blur(5px);
        border: 1px solid rgba(255, 255, 255, 0.1);
    }

    @media(max-width: 768px) {
        .b-icon {
            position: absolute;
            top: 20px;
            right: 20px;
            width: 60px;
            height: 60px;
        }
    }

    .b-icon img {
        width: 80%;
    }

    .b-title {
        font-size: 32px;
        font-weight: 700;
        color: #fff;
        margin-bottom: 15px;
        line-height: 1.1;
        padding-right: 14px;
        max-width: calc(100% - 120px);
        overflow-wrap: break-word;
        word-break: break-word;
    }

    .b-title span {
        color: var(--primary-red);
    }

    @media (max-width: 900px) {
        .b-title {
            max-width: calc(100% - 90px);
            font-size: 30px;
            padding-right: 12px;
        }
    }

    @media (max-width: 480px) {
        .b-title {
            max-width: calc(100% - 60px);
            font-size: 24px;
            padding-right: 10px;
        }
    }

    .b-desc {
        font-size: 16px;
        color: #aaa;
        max-width: 90%;
    }

    .tailored-content {
        width: 50%;
        z-index: 2;
        padding-left: 20px;
    }

    .tailored-img {
        width: 40%;
        height: auto;
        z-index: 2;
        filter: drop-shadow(0 0 30px rgba(255, 0, 0, 0.1));
    }

    @media(max-width: 900px) {
        .grid-item.span-12 {
            flex-direction: column-reverse;
            padding: 30px;
            text-align: center;
        }

        .tailored-content {
            width: 100%;
            padding-left: 0;
            text-align: center;
        }

        .tailored-content .b-title {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .tailored-content .b-desc {
            margin-left: auto;
            margin-right: auto;
            text-align: center;
        }

        .tailored-img {
            width: 60%;
            margin: 20px auto 30px;
            display: block;
        }
    }

    .btn-chat {
        display: inline-block;
        margin-top: 25px;
        background: var(--primary-red);
        color: #fff;
        padding: 15px 40px;
        border-radius: 50px;
        text-decoration: none;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        transition: 0.3s;
        box-shadow: 0 10px 20px rgba(255, 0, 0, 0.3);
    }

    .btn-chat:hover {
        background: #cc0000;
        transform: translateY(-3px);
    }

    .btn-book {
        display: inline-block;
        margin-top: 18px;
        padding: 10px 18px;
        border-radius: 12px;
        border: 1px solid rgba(255, 255, 255, 0.12);
        color: #fff;
        background: transparent;
        text-decoration: none;
        font-weight: 700;
        font-size: 14px;
        transition: all 0.18s ease;
    }

    .btn-book:hover {
        background: rgba(255, 255, 255, 0.04);
        transform: translateY(-2px);
        border-color: rgba(255, 255, 255, 0.2);
    }

    /* --- CLIENTS SECTION --- */
    .clients-section {
        padding: 80px 0;
        background: #fff;
        border-bottom: 1px solid #eee;
    }

    .clients-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 40px;
        max-width: 1400px;
        margin: 40px auto 0;
        padding: 0 20px;
    }

    .client-logo {
        /* Removed grayscale filter for 'real' look */
        filter: none;
        opacity: 1;
        transition: 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100px;
        padding: 10px;
    }

    .client-logo:hover {
        transform: scale(1.1);
    }

    .client-logo img {
        width: 100%;
        height: 100%;
        object-fit: contain;
    }

    /* --- TESTIMONIALS (CAROUSEL SLIDER) --- */
    .testimonials-section {
        padding: 80px 0;
        background: #fff;
        overflow: hidden;
        position: relative;
    }

    .testimonials-wrapper {
        max-width: 1400px;
        margin: 0 auto;
        position: relative;
        padding: 20px;
    }

    .testimonial-track {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        position: relative;
        height: 500px;
        perspective: 1000px;
    }

    /* Testimonial Card Styling matching the image provided */
    .testi-card-v2 {
        width: 350px;
        background: #fff;
        border-radius: 20px;
        padding: 40px 30px;
        box-shadow: 0 15px 40px rgba(0, 0, 0, 0.08);
        text-align: center;
        position: absolute;
        transition: all 0.5s cubic-bezier(0.4, 0.0, 0.2, 1);
        opacity: 0.5;
        transform: scale(0.85);
        z-index: 1;
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    .testi-card-v2.active {
        opacity: 1;
        transform: scale(1.1);
        z-index: 10;
        box-shadow: 0 30px 60px rgba(255, 0, 0, 0.15);
    }

    .testi-card-v2.prev {
        transform: translateX(-110%) scale(0.85);
        opacity: 0.5;
        z-index: 1;
    }

    .testi-card-v2.next {
        transform: translateX(110%) scale(0.85);
        opacity: 0.5;
        z-index: 1;
    }

    .testi-card-v2.hidden {
        opacity: 0;
        z-index: 0;
        pointer-events: none;
    }

    /* Logo at top */
    .testi-v2-logo {
        height: 60px;
        width: auto;
        margin-bottom: 20px;
        object-fit: contain;
    }

    /* Name and Role */
    .testi-v2-meta {
        margin-bottom: 20px;
        font-family: 'Arial', sans-serif;
    }

    .testi-v2-role {
        color: var(--primary-red);
        font-weight: 700;
        font-size: 14px;
        text-transform: uppercase;
    }

    .testi-v2-name {
        color: #000;
        font-weight: 700;
        font-size: 16px;
    }

    /* Quote Area */
    .testi-v2-quote-area {
        position: relative;
        margin-top: 10px;
    }

    /* Big Quote marks background */
    .testi-v2-quote-area::before {
        content: '“';
        position: absolute;
        top: -30px;
        left: -10px;
        font-size: 120px;
        color: #f2f2f2;
        font-family: serif;
        line-height: 1;
        z-index: -1;
    }
    
     .testi-v2-quote-area::after {
        content: '”';
        position: absolute;
        bottom: -60px;
        right: -10px;
        font-size: 120px;
        color: #f2f2f2;
        font-family: serif;
        line-height: 1;
        z-index: -1;
    }

    .testi-v2-text {
        color: #444;
        font-size: 15px;
        line-height: 1.6;
        position: relative;
        z-index: 2;
    }

    /* Slider Buttons */
    .testi-controls {
        display: flex;
        justify-content: center;
        gap: 20px;
        margin-top: 20px;
        z-index: 20;
        position: relative;
    }

    .testi-btn {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #fff;
        border: 1px solid #eee;
        color: #000;
        font-size: 20px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: 0.3s;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
    }

    .testi-btn:hover {
        background: var(--primary-red);
        color: #fff;
        border-color: var(--primary-red);
    }

    @media(max-width: 768px) {
        .testimonial-track {
            height: 450px;
        }

        .testi-card-v2 {
            width: 280px;
            padding: 30px 20px;
        }

        .testi-card-v2.active {
            transform: scale(1);
        }

        .testi-card-v2.prev,
        .testi-card-v2.next {
            opacity: 0; 
            /* Hide non-active cards on mobile for cleaner look */
        }
    }


    /* --- PORTFOLIO --- */
    /* --- PORTFOLIO --- */
    .portfolio-section {
        background: #000;
        padding: 100px 0;
        color: #fff;
    }

    .portfolio-showcase {
        width: 100%;
        height: 80vh;
        overflow-x: auto;
        overflow-y: hidden;
        position: relative;
        margin: 60px 0;
        /* Hide scrollbar but keep functionality */
        scrollbar-width: none; /* Firefox */
        -ms-overflow-style: none; /* IE/Edge */
    }
    
    .portfolio-showcase::-webkit-scrollbar {
        display: none; /* Chrome/Safari */
    }

    .portfolio-scroller {
        position: relative;
        width: max-content;
        height: 100%;
        display: flex;
    }

    .portfolio-img {
        height: 100%;
        width: auto;
        display: block;
        object-fit: cover; /* Use cover to fill height */
        flex-shrink: 0;
        min-width: 100vw; /* Ensure image is at least full viewport width */
    }
    
    .portfolio-img:nth-child(2) {
        display: none;
    }
    
    /* Scroll hint arrow for mobile */
    .portfolio-scroll-hint {
        position: absolute;
        right: 15px;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.4);
        color: #fff;
        padding: 8px;
        border-radius: 50%;
        display: none;
        align-items: center;
        justify-content: center;
        z-index: 10;
        pointer-events: none;
        transition: opacity 0.3s ease;
    }
    
    .portfolio-scroll-hint svg {
        width: 18px;
        height: 18px;
        animation: slideHintBounce 1.5s ease-in-out infinite;
    }
    
    @keyframes slideHintBounce {
        0%, 100% { transform: translateX(0); }
        50% { transform: translateX(5px); }
    }
    
    @media(max-width: 768px) {
        .portfolio-showcase {
            cursor: grab;
        }
        
        .portfolio-showcase:active {
            cursor: grabbing;
        }
        
        .portfolio-scroll-hint {
            display: flex;
        }
        
        .portfolio-scroll-hint.hidden {
            opacity: 0;
            pointer-events: none;
        }
    }
    }
    
    /* Responsive adjustments */
    @media (max-width: 1024px) {
        .portfolio-showcase {
            height: 60vh;
        }
    }
    
    @media (max-width: 768px) {
        .portfolio-showcase {
            height: 40vh;
        }
        
        .portfolio-img {
            min-width: 320vw; /* Wider on mobile to ensure full content visibility */
        }
    }
    
    @media (max-width: 480px) {
        .portfolio-showcase {
            height: 35vh;
        }
        
        .portfolio-img {
            min-width: 320vw; /* Even wider on smaller screens */
        }
    }


    /* Case Studies */
    .case-wrapper {
        max-width: 1300px;
        margin: 0 auto;
        padding: 0 20px;
    }

    .case-card {
        background: #111;
        border-radius: 30px;
        overflow: hidden;
        margin-bottom: 60px;
        display: flex;
        flex-direction: column;
        border: 1px solid #222;
    }

    @media(min-width: 800px) {
        .case-card {
            flex-direction: row;
            height: 500px;
        }

        .card-info {
            padding: 20px
        }
    }

    .case-video {
        flex: 1.5;
        position: relative;
        overflow: hidden;
        cursor: pointer;
    }

    /* When a video is used as a thumbnail, object-fit cover ensures it fills */
    .case-video video, 
    .case-video img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: 0.5s;
        display: block;
    }

    .case-card:hover .case-video video,
    .case-card:hover .case-video img {
        transform: scale(1.05);
    }

    .case-info {
        flex: 1;
        padding: 60px;
        display: flex;
        flex-direction: column;
        justify-content: center;
    }

    .case-tag {
        background: var(--primary-red);
        color: #fff;
        padding: 5px 15px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 700;
        align-self: flex-start;
        margin-bottom: 20px;
        text-transform: uppercase;
    }

    .case-desc {
        font-size: 24px;
        color: #ddd;
        line-height: 1.5;
        font-weight: 300;
    }

    .case-desc strong {
        color: #fff;
        font-weight: 700;
    }

    /* --- MOCKUP GRID --- */
    .mockup-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(400px, 1fr));
        gap: 40px;
        max-width: 1200px;
        margin: 100px auto;
        padding: 0 20px;
    }

    .mockup-item {
        /* Wrapper to help transitions */
    }

    .mockup-screen {
        background: #000;
        border-radius: 12px;
        overflow: hidden;
        aspect-ratio: auto; /* Remove fixed aspect ratio */
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
        border: 1px solid #222;
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        max-height: 500px;
    }

    .mockup-screen video, 
    .mockup-screen img {
        width: 100%;
        height: auto;
        max-height: 500px;
        object-fit: contain; /* Changed from cover to contain */
        display: block;
    }

    /* --- SQUARE GALLERY (SOCIAL HIGHLIGHTS) WITH MASONRY FIX --- */
    .square-gallery {
        max-width: 1400px;
        margin: 100px auto;
        padding: 0 20px;
    }

    @media (min-width: 768px) {
        .square-gallery {
            display: flex;
            flex-direction: column;
            gap: 30px;
            overflow: hidden;
            padding: 0;
        }

        .marquee-row {
            display: flex;
            width: fit-content;
            gap: 30px;
            animation-duration: 40s;
            animation-timing-function: linear;
            animation-iteration-count: infinite;
        }

        .marquee-row-1 {
            animation-name: marqueeLeft;
        }

        .marquee-row-2 {
            animation-name: marqueeRight;
        }

        .square-item {
            flex-shrink: 0;
            width: auto;
            height: 300px;
            border-radius: 20px;
            overflow: hidden;
            background: transparent;
            position: relative;
        }
        
        .social-vertical-grid {
            display: none;
        }
    }

    /* Mobile Vertical Marquee Fix */
    @media (max-width: 767px) {
        .square-gallery {
            display: none; /* Hide standard marquee */
        }
        
        .social-vertical-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 15px;
            height: 500px; /* Fixed height for viewport effect */
            overflow: hidden;
            position: relative;
            margin: 60px 20px;
        }

        .social-col {
            display: flex;
            flex-direction: column;
            gap: 15px;
        }

        .social-col-inner {
             display: flex;
             flex-direction: column;
             gap: 15px;
        }

        /* Upward Animation */
        .animate-up {
            animation: marqueeUp 16s linear infinite;
        }

        /* Downward Animation */
        .animate-down {
             animation: marqueeDown 16s linear infinite;
        }
        
        .square-item {
             width: 100%;
             border-radius: 12px;
             overflow: hidden;
        }
    }
    
    @keyframes marqueeUp {
        0% { transform: translateY(0); }
        100% { transform: translateY(-50%); }
    }
    
    @keyframes marqueeDown {
         0% { transform: translateY(-50%); }
         100% { transform: translateY(0); }
    }

    .square-item img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        transition: transform 0.3s ease;
        display: block;
        /* Removes bottom spacing */
    }

    .square-item:hover img {
        transform: scale(1.1);
    }

    @keyframes marqueeLeft {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }

    @keyframes marqueeRight {
        0% {
            transform: translateX(-50%);
        }

        100% {
            transform: translateX(0);
        }
    }

    /* --- PRICING --- */
    .pricing-section {
        padding: 120px 20px;
        background: #fff;
        text-align: center;
    }

    .pricing-wrapper {
        display: flex;
        justify-content: center;
        align-items: center;
        gap: 30px;
        max-width: 1200px;
        margin: 60px auto 0;
        flex-wrap: wrap;
    }

    .price-box {
        background: #fff;
        border-radius: 24px;
        padding: 40px 30px;
        width: 320px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.06);
        transition: 0.3s;
        position: relative;
        border: 1px solid transparent;
    }

    .price-box:hover {
        transform: translateY(-10px);
    }

    .price-box.featured {
        background: #050505;
        color: #fff;
        transform: scale(1.1);
        z-index: 2;
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.2);
    }

    .price-box.featured:hover {
        transform: scale(1.15);
    }

    /* Responsive Pricing Adjustments */
    @media(max-width: 900px) {
        .pricing-wrapper {
            gap: 50px;
        }

        .price-box.featured {
            transform: scale(1) !important;
            margin: 20px 0;
            width: 100%;
            max-width: 90vw;
        }

        .price-box {
            width: 100%;
            max-width: 90vw;
        }
    }

    .price-tag {
        font-size: 40px;
        font-weight: 800;
        margin: 15px 0;
    }

    .price-btn {
        display: block;
        width: 100%;
        padding: 15px;
        border-radius: 12px;
        font-weight: 700;
        text-decoration: none;
        margin-top: 20px;
        border: 2px solid var(--primary-red);
        transition: 0.3s;
    }

    .price-box:not(.featured) .price-btn {
        color: var(--primary-red);
        background: transparent;
    }

    .price-box:not(.featured) .price-btn:hover {
        background: var(--primary-red);
        color: #fff;
    }

    .price-box.featured .price-btn {
        background: var(--primary-red);
        color: #fff;
        border: none;
        box-shadow: 0 10px 20px rgba(255, 0, 0, 0.3);
    }

    .price-box.featured .price-btn:hover {
        background: #ff3333;
    }

    .popular-badge {
        position: absolute;
        top: -15px;
        left: 50%;
        transform: translateX(-50%);
        background: linear-gradient(90deg, #ff0000, #ff4d4d);
        color: #fff;
        padding: 8px 20px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 700;
        text-transform: uppercase;
        box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
        white-space: nowrap;
        z-index: 10;
    }

    /* --- CONTACT & FOOTER --- */
    .cta-section {
        background: var(--primary-red);
        color: #fff;
        padding: 100px 20px;
        position: relative;
        overflow: hidden;
        padding-bottom: 40px;
    }

    .cta-container {
        max-width: 1200px;
        margin: 0 auto;
        display: flex;
        flex-wrap: wrap;
        gap: 60px;
        position: relative;
        z-index: 2;
        margin-bottom: 60px;
    }

    .cta-text {
        flex: 1;
        min-width: 280px;
    }

    .cta-text h2 {
        font-size: 50px;
        font-weight: 900;
        line-height: 1;
        margin-bottom: 20px;
        word-break: break-word;
    }

    .cta-text p {
        font-size: 20px;
        opacity: 0.9;
        font-weight: 300;
    }

    .cta-form {
        flex: 1;
        min-width: 280px;
        background: #fff;
        padding: 40px;
        border-radius: 20px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.2);
        box-sizing: border-box;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-input {
        width: 100%;
        padding: 15px;
        border: 1px solid #eee;
        border-radius: 10px;
        background: #f9f9f9;
        outline: none;
        transition: 0.3s;
    }

    .form-input:focus {
        border-color: #000;
        background: #fff;
    }

    .form-btn {
        width: 100%;
        padding: 15px;
        background: #000;
        color: #fff;
        font-weight: 700;
        border: none;
        border-radius: 10px;
        cursor: pointer;
        transition: 0.3s;
    }

    .form-btn:hover {
        background: #333;
    }

    .form-btn:disabled {
        background: #666;
        cursor: not-allowed;
    }

    .form-btn-secondary {
        display: block;
        width: 100%;
        text-align: center;
        margin-top: 15px;
        padding: 12px;
        background: transparent;
        border: 2px solid red;
        color: #000;
        font-weight: 700;
        border-radius: 10px;
        text-decoration: none;
        transition: 0.3s;
    }

    .form-btn-secondary:hover {
        background: red;
        color: #000;
    }

    #form-messages {
        margin-bottom: 15px;
        padding: 10px;
        border-radius: 5px;
        display: none;
    }

    #form-messages.success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    #form-messages.error {
        background: #f8d7da;
        color: #721c24;
        border: 1px solid #f5c6cb;
    }

    /* Slim Footer Strip Styles (Restored White Strip) */
    .footer-strip {
        background: #fff;
        padding: 20px 0;
        border-top: 1px solid rgba(0, 0, 0, 0.05);
        position: relative;
        z-index: 5;
    }

    .footer-strip-content {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 20px;
        display: flex;
        flex-wrap: wrap;
        justify-content: space-between;
        align-items: center;
        gap: 20px;
    }

    .footer-item {
        display: flex;
        align-items: center;
        gap: 10px;
        color: #333;
        font-size: 14px;
        font-weight: 500;
    }

    .footer-item strong {
        color: var(--primary-red);
        font-weight: 700;
        text-transform: uppercase;
        font-size: 12px;
        letter-spacing: 0.5px;
    }

    .footer-item a {
        color: #333;
        text-decoration: none;
        transition: color 0.3s;
    }

    .footer-item a:hover {
        color: var(--primary-red);
    }

    @media(max-width: 768px) {
        .hero-title {
            font-size: 56px;
            letter-spacing: -1px;
        }

        .section-container {
            flex-direction: column;
        }

        .video-container {
            width: 100%;
        }

        .what-we-do-text h2 {
            font-size: 70px;
        }

        .bento-grid-v2 {
            grid-template-columns: 1fr;
        }

        .grid-item,
        .grid-item.span-6,
        .grid-item.span-12 {
            grid-column: span 12 !important;
        }

        .mockup-grid {
            grid-template-columns: 1fr;
        }

        /* Responsive Footer Strip */
        .footer-strip-content {
            flex-direction: column;
            align-items: flex-start;
            gap: 15px;
        }
    }

    @media(max-width: 480px) {
        .custom-nav {
            padding: 15px;
        }

        .nav-logo {
            font-size: 20px;
        }

        .nav-cta {
            padding: 8px 20px;
            font-size: 12px;
        }

        .hero-title {
            font-size: 42px;
            letter-spacing: -1px;                                                                                                                                                                                                                   
            margin-bottom: 15px;
        }

        .hero-subtitle {
            font-size: 18px;
            padding: 0 10px;
        }                                                                                                                   

        .what-we-do-text h2 {
            font-size: 50px;
        }

        .what-we-do-desc {
            font-size: 16px;
        }

        .services-header h2 {
            font-size: 36px;
        }

        .cta-text {HOME ABOUT SERVICES WORK BLOG CONTACT
￼
￼
Home
About
Services
Work
Blog
Contact

            min-width: auto;
        }

        .cta-text h2 {
            font-size: 36px;
        }

        .cta-text p {
            font-size: 16px;
        }

        .cta-form {
            min-width: auto;
            padding: 30px 20px;
        }

        .price-box {
            width: 100%;
            max-width: 90vw;
            padding: 30px 20px;
        }
    }

    @media(max-width: 390px) {
        .custom-nav {
            padding: 10px 15px;
        }

        .nav-logo {
            font-size: 18px;
        }

        .hero-title {
            font-size: 36px;
        }

        .hero-tagline {
            flex-direction: column;
            gap: 0px;
            padding: 12px 18px;
            border-radius: 15px;
        }

        .hero-tagline span {
            font-size: 32px;
            line-height: 1.0;
            white-space: nowrap;
            justify-content: center;
        }

        .tiny-box {
            width: 20px;
            height: 20px;
            padding-top: 6px;
            margin-top: 2px;
        }
        .hero-subtitle {
            font-size: 16px;
        }

        .what-we-do-text h2 {
            font-size: 40px;
        }

        .services-header h2 {
            font-size: 30px;
        }

        .cta-text h2 {
            font-size: 30px;
        }

        .cta-form {
            padding: 25px 15px;
        }

        .form-input {
            padding: 12px;
        }

        .price-box {
            width: 100%;
            max-width: 90vw;
            padding: 25px 15px;
        }

        .grid-item {
            padding: 30px 20px;
        }

        .mockup-grid {
            padding: 0 15px;
        }

        .case-wrapper {
            padding: 0 15px;
        }

        body {
            overflow-x: hidden;
        }

        * {
            max-width: 100%;
        }
    }

    @media (max-width: 480px) {
        .cta-text h2 {
            font-size: 28px;
        }

        .cta-text p {
            font-size: 14px;
        }

        .cta-text div {
            font-size: 60px;
            margin-top: 20px;
        }
    }

    /* Shorts Grid Styles */
    .shorts-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 20px;
        margin-top: 60px;
        padding: 0 20px;
    }

    .short-card {
        position: relative;
        aspect-ratio: 9/16;
        border-radius: 16px;
        overflow: hidden;
        background: #000;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
        transition: transform 0.3s ease;
    }

    .short-card:hover {
        transform: translateY(-5px);
    }

    .short-video {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .mute-toggle {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(0, 0, 0, 0.6);
        border: none;
        color: #fff;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        cursor: pointer;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        backdrop-filter: blur(10px);
    }

    .mute-toggle:hover {
        background: rgba(255, 0, 0, 0.8);
        transform: scale(1.1);
    }

    .mute-toggle.muted::before {
        content: '🔇';
    }

    .mute-toggle:not(.muted)::before {
        content: '🔊';
    }

    @media (max-width: 768px) {
        .shorts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 15px;
        }
    }

    @media (max-width: 480px) {
        .shorts-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 10px;
            padding: 0 10px;
        }
    }

    /* --- MODERN SHORTS SECTION --- */
.shorts-modern-section {
    padding: 20px 10px;
    background: #000; /* Seamless dark blend */
    overflow: hidden;
}

.shorts-header-modern {
    text-align: center;
    margin-bottom: 60px;
    position: relative;
    z-index: 2;
}

.shorts-header-modern h2 {
    font-size: 48px;
    font-weight: 900;
    color: #fff;
    letter-spacing: -1px;
}

/* THE GRID CONTAINER */
.modern-reel-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 25px;
    max-width: 1400px;
    margin: 0 auto;
    perspective: 1000px; /* For 3D feel */
}

/* FOCUS EFFECT: When hovering the grid, dim non-hovered items */
.modern-reel-grid:hover .reel-card-wrap:not(:hover) {
    opacity: 0.4;
    filter: blur(3px) grayscale(60%);
    transform: scale(0.95);
}

/* CARD WRAPPER */
.reel-card-wrap {
    position: relative;
    aspect-ratio: 9/16;
    border-radius: 20px;
    overflow: hidden;
    background: #111;
    border: 1px solid rgba(255, 255, 255, 0.1);
    box-shadow: 0 10px 30px rgba(0,0,0,0.5);
    transition: all 0.5s cubic-bezier(0.25, 1, 0.5, 1);
    cursor: pointer;
    
    /* Floating Animation Base */
    animation: floatCard 6s ease-in-out infinite;
}

/* Stagger animations for organic feel */
.reel-card-wrap:nth-child(1) { animation-delay: 0s; }
.reel-card-wrap:nth-child(2) { animation-delay: 1.5s; }
.reel-card-wrap:nth-child(3) { animation-delay: 0.5s; }
.reel-card-wrap:nth-child(4) { animation-delay: 2s; }

/* HOVER STATE FOR ACTIVE CARD */
.reel-card-wrap:hover {
    transform: scale(1.05) translateY(-10px) !important; /* Override float */
    z-index: 10;
    border-color: var(--primary-red);
    box-shadow: 0 20px 50px rgba(255, 0, 0, 0.25);
    animation-play-state: paused; /* Stop floating when interacting */
}

/* VIDEO STYLING */
.modern-reel-video {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transform: scale(1.01); /* Prevents pixel border gaps */
    transition: transform 0.7s;
}

.reel-card-wrap:hover .modern-reel-video {
    transform: scale(1.1); /* Slight zoom in on video */
}

/* GLASS UI OVERLAYS */
.reel-overlay-gradient {
    position: absolute;
    bottom: 0;
    left: 0;
    width: 100%;
    height: 50%;
    background: linear-gradient(to top, rgba(0,0,0,0.9), transparent);
    z-index: 2;
    pointer-events: none;
}

.reel-ui-top {
    position: absolute;
    top: 15px;
    right: 15px;
    z-index: 5;
}

.reel-mute-btn {
    width: 36px;
    height: 36px;
    border-radius: 50%;
    background: rgba(255, 255, 255, 0.1);
    backdrop-filter: blur(10px);
    border: 1px solid rgba(255, 255, 255, 0.2);
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    transition: 0.3s;
    font-size: 16px;
    padding: 0;
}

.reel-mute-btn:hover {
    background: var(--primary-red);
    border-color: var(--primary-red);
    transform: rotate(360deg);
}

.reel-info-bottom {
    position: absolute;
    bottom: 20px;
    left: 20px;
    z-index: 5;
    width: calc(100% - 40px);
}

.reel-stats {
    display: flex;
    gap: 15px;
    font-size: 13px;
    color: #fff;
    font-weight: 600;
    opacity: 0;
    transform: translateY(10px);
    transition: 0.4s;
}

.reel-card-wrap:hover .reel-stats {
    opacity: 1;
    transform: translateY(0);
}

.stat-item {
    display: flex;
    align-items: center;
    gap: 5px;
}

.stat-item svg {
    width: 14px;
    height: 14px;
    fill: #fff;
}

/* FLOATING ANIMATION KEYFRAMES */
@keyframes floatCard {
    0%, 100% { transform: translateY(0); }
    50% { transform: translateY(-10px); }
}

/* --- RESPONSIVE MOBILE (HORIZONTAL SCROLL APP FEEL) --- */
@media (max-width: 900px) {
    .modern-reel-grid {
        display: flex;
        overflow-x: auto;
        scroll-snap-type: x mandatory;
        gap: 15px;
        padding-bottom: 30px; /* Space for scrollbar/shadow */
        padding-left: 20px;
        padding-right: 20px;
        perspective: none;
    }

    .reel-card-wrap {
        min-width: 260px; /* Fixed width for scrolling */
        width: 70vw;
        scroll-snap-align: center;
        margin-bottom: 0;
        animation: none !important; /* Disable floating on mobile for performance */
        transform: none !important; /* Disable all transforms */
        transition: none !important; /* Disable all transitions */
    }

    /* Disable hover effects completely on mobile */
    .reel-card-wrap:hover {
        transform: none !important;
        filter: none !important;
        box-shadow: 0 10px 30px rgba(0,0,0,0.15) !important;
    }

    .modern-reel-grid:hover .reel-card-wrap:not(:hover) {
        opacity: 1 !important;
        filter: none !important;
        transform: none !important;
    }

    .reel-card-wrap:hover .modern-reel-video {
        transform: none !important;
        filter: none !important;
    }

    .reel-card-wrap:hover .reel-overlay-gradient {
        opacity: 1 !important;
    }
    
    .reel-stats {
        opacity: 1; /* Always show stats on mobile */
        transform: translateY(0);
    }
    
    .shorts-header-modern h2 {
        font-size: 32px;
    }
    
    /* Hide scrollbar */
    .modern-reel-grid::-webkit-scrollbar {
        display: none;
    }
    .modern-reel-grid {
        -ms-overflow-style: none;
        scrollbar-width: none;
    }
}
</style>
@endsection

@section('content')

<!-- Creative SVG Loading Screen -->
<div id="creative-loader">
    <div class="loader-wrapper">
        <div class="loader-box">
            <div class="box-face front"></div>
            <div class="box-face back"></div>
            <div class="box-face right"></div>
            <div class="box-face left"></div>
            <div class="box-face top"></div>
            <div class="box-face bottom"></div>
        </div>

        <div class="loader-logo-container">
            <img src="/assets/img/logo/logo.png" alt="THUMBPIN" class="loader-img">
        </div>
    </div>

    <div class="loader-text">
        LOADING <span>CREATIVITY</span>
    </div>

    <div class="loader-progress-line"></div>
</div>

<!-- Custom Navbar (Fixed Transparent) -->
<nav class="custom-nav" id="navbar">
    <a href="#" class="nav-logo">
        <img src="/assets/img/logo/logo.png" alt="THUMBPIN" class="nav-logo-img" />
    </a>
    <div class="nav-menu">
        <a href="#hero" class="nav-link" onclick="scrollToSection('hero')">Home</a>
        <a href="#what-we-do" class="nav-link" onclick="scrollToSection('what-we-do')">About</a>
        <a href="#services" class="nav-link" onclick="scrollToSection('services')">Services</a>
        <a href="#portfolio" class="nav-link" onclick="scrollToSection('portfolio')">Portfolio</a>
        <a href="#contact" class="nav-link" onclick="scrollToSection('contact')">Contact</a>
    </div>
    <a href="#contact" class="nav-cta">Let's <span class="nav-cta-highlight">Talk</span></a>
</nav>

<!-- Hero Section -->
<section class="hero-section" id="hero">

    <!-- Floating Animated Elements -->
    <div class="float-shape shape-1"></div>
    <div class="float-shape shape-2"></div>

    <div class="hero-content">
        <h1 class="hero-title reveal active">
            Smart <span class="highlight">Strategy.</span>
        </h1>

        <div class="tagline-wrapper reveal active" style="transition-delay: 0.2s;">
            <div class="hero-tagline">
                <span>Bold <span style="color: black; font-style: normal; margin-left: 5px; ">Creativity</span><img
                        src="/assets/img/vidproduction/fullstop.webp" class="tiny-box" alt="."></span>
                <span>Real <span style="color: black; font-style: normal; margin-left: 5px; ">Impact</span><img
                        src="/assets/img/vidproduction/fullstop.webp" class="tiny-box" alt="."></span>
            </div>
        </div>



        <p class="hero-subtitle reveal active" style="transition-delay: 0.4s;">
            From strategy to execution, we craft brands that <span class="typing-text" id="typingText"></span><span
                class="typing-cursor"></span>
        </p>

        <!-- Updated Mobile CTA Text -->
        <a href="#contact" class="hero-cta reveal active" style="transition-delay: 0.6s;">
            Consult With Us
        </a>
    </div>

    <!-- Scroll Down Arrow -->
    <div class="scroll-down" onclick="scrollToSection('what-we-do')">
        <div class="scroll-arrow"></div>
        <div class="scroll-text">Scroll</div>
    </div>
</section>

<!-- What We Do Section -->
<section class="what-we-do-section" id="what-we-do">
    <div class="section-container">
        <!-- Replaced Autoplay Video with Click-to-Play Placeholder -->
        <div class="video-container reveal" onclick="openVideoModal('https://cdn.backternity.dev/api/videos/thumbpin/11a587a8-72ac-41da-a272-956e555bcd39/master.m3u8')">
            <!-- Using the Poster image as the placeholder -->
            <img src="/assets/img/vidproduction/place.png" alt="Video Placeholder" class="video-content" style="object-fit: cover; width:100%; height:100%;">
            
            <div class="click-play-overlay">
                <div class="big-play-btn">
                    <!-- SVG Play Icon -->
                    <svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                </div>
            </div>
        </div>

        <div class="what-we-do-text reveal" style="transition-delay: 0.2s;">
            <h2>WHAT<br>WE DO</h2>
            <p class="what-we-do-desc">
                We don't just make things look pretty. We solve business problems with creative solutions. Our approach
                is data-driven, design-led, and focused on growth.
            </p>
            <a href="#services" class="btn-chat" style="background: #000; color: #fff;">Explore Services</a>
        </div>
    </div>
</section>

<!-- Services Section (Bento Grid) -->
<section class="services-section" id="services">
    <div class="services-header reveal">
        <h2>Our <span>Expertise</span></h2>
        <p style="color: #666; font-size: 18px;">Comprehensive solutions for modern brands</p>
    </div>

    <div class="services-container">
        <div class="bento-grid-v2">
            <!-- Card 1 -->
            <div class="grid-item span-6 bg-card-1 reveal">
                <div class="b-number">01</div>
                <div class="b-icon"><img src="/assets/img/vidproduction/bulb.png" alt="Strategy"></div>
                <div class="b-content">
                    <h3 class="b-title">Branding & <br><span>Strategy</span></h3>
                    <p class="b-desc">Define your brand's voice, identity, and roadmap to success with market-leading
                        insights.</p>
                    <a href="#" class="open-inquiry btn-book">Book a call</a>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="grid-item span-6 bg-card-2 reveal" style="transition-delay: 0.1s;">
                <div class="b-number">02</div>
                <div class="b-icon"><img src="/assets/img/vidproduction/schedule.webp" alt="Web"></div>
                <div class="b-content">
                    <h3 class="b-title">Web Design & <br><span>Development</span></h3>
                    <p class="b-desc">Beautiful, high-performing websites built to convert visitors into customers.</p>
                    <a href="#" class="open-inquiry btn-book">Book a call</a>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="grid-item span-6 bg-card-3 reveal">
                <div class="b-number">03</div>
                <div class="b-icon"><img src="/assets/img/vidproduction/speaker.webp" alt="Marketing"></div>
                <div class="b-content">
                    <h3 class="b-title">Digital Marketing & <br><span>SEO</span></h3>
                    <p class="b-desc">Data-driven campaigns to get you seen, clicked, and remembered.</p>
                    <a href="#" class="open-inquiry btn-book">Book a call</a>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="grid-item span-6 bg-card-4 reveal" style="transition-delay: 0.1s;">
                <div class="b-number">04</div>
                <div class="b-icon"><img src="/assets/img/vidproduction/notebook.png" alt="Video"></div>
                <div class="b-content">
                    <h3 class="b-title">Films & <br><span>Production</span></h3>
                    <p class="b-desc">Cinematic storytelling that elevates your brand narrative.</p>
                    <a href="#" class="open-inquiry btn-book">Book a call</a>
                </div>
            </div>

            <!-- New Marquee Component (Full Width & Slim) -->
            <div class="grid-marquee-item reveal">
                <div class="expertise-marquee-wrapper">
                    <div class="expertise-marquee-content">
                        @for ($i = 0; $i < 7; $i++) <span>STRATEGY •</span>
                            <span>CREATIVE •</span>
                            <span>DIGITAL •</span>
                            <span>GROWTH •</span>
                            <span>INNOVATION •</span>
                            <span>IMPACT •</span>
                            <span>EXCELLENCE •</span>

                            @endfor
                    </div>
                </div>
            </div>

            <!-- Full Width Card -->
            <div class="grid-item span-12 bg-card-full reveal" style="margin-top: 30px;">
                <div class="tailored-content">
                    <h3 class="b-title" style="font-size: 40px;">Tailored Solutions for <br><span>Every Brief</span>
                    </h3>
                    <p class="b-desc" style="font-size: 18px; margin-top: 15px; color: #ccc;">
                        Every brand is unique. So is our approach. We customize strategies to fit your vision, ensuring
                        impact and innovation at every step.
                    </p>
                    <a href="#contact" class="btn-chat">Let's Talk Business</a>
                </div>
                <img src="/assets/img/vidproduction/Letschat.webp" class="tailored-img" alt="Creative">
            </div>
        </div>
    </div>
</section>

<!-- Client Logos (Greyscale to Color on Hover) -->
<section class="clients-section">
    <div class="services-header">
        <h2 style="color: #000; font-size: 36px;">Trusted by <span class="text-red">Industry Leaders</span></h2>
    </div>
    <div class="clients-grid">
        @for ($i = 1; $i < 23; $i++) <div class="client-logo">
            <!-- Added loading=lazy to client logos as they are below fold, but will load quickly due to small size -->
            <img src="/assets/img/clients/{{ $i }}.png" alt="Client {{ $i }}" loading="lazy"
                onerror="this.style.display='none'">
    </div>
    @endfor
    </div>
</section>

<!-- Testimonials Section - Carousel Slider Style -->
<section class="testimonials-section">
    <div class="services-header">
        <h2 style="color: #000;">Testimonials</h2>
    </div>

    @php
    $testimonials = [
        ['name' => 'Sarthak garg', 'role' => 'Marketing Head, College Vidya', 'img' => '21.png', 'text' => 'Brajesh has a very sharp eye to find out whats hidden, Their team did our brand audit and since then we grown as a brand then just a name. The energy is at peak at even 2AM. More Power to team.'],

        ['name' => 'Prasad Duja Bhandari', 'role' => 'CEO, Mr. Furniture', 'img' => 'mr.png', 'text' => 'Thumbpin have helped us grow through five years they handled all things for us. Not just marketing but ideas for business and understand better at strategy front we have loved.  More years to go together.'],

        ['name' => 'Vidur Khanna', 'role' => 'Director, Good Earth', 'img' => '6.png', 'text' => 'We did Rebranding from Galaxy Group to Good Earth Infra - "Building Tomorrow, Today", They did Brand Identity and Corporate Film. The Uniqueness they have it self driven. Love the energy they bring on table.'],

        ['name' => 'Ujjwal Sitlani', 'role' => 'Founder, Ramaeri', 'img' => '22.png', 'text' => 'Thumbpin transformed our digital presence. Their innovative approach to marketing and branding helped us connect with our audience in meaningful ways, resulting in increased conversions.'],

        
    ];
    @endphp

    <div class="testimonials-wrapper">
        <div class="testimonial-track" id="testiTrack">
            @foreach($testimonials as $index => $t)
            <div class="testi-card-v2 {{ $index == 1 ? 'active' : ($index == 0 ? 'prev' : 'next') }}" data-index="{{ $index }}">
                <img src="/assets/img/clients/{{$t['img']}}" alt="{{$t['name']}}" class="testi-v2-logo" loading="lazy" onerror="this.src='https://placehold.co/100?text=C'">
                <div class="testi-v2-meta">
                    <div class="testi-v2-role">{{$t['role']}}</div>
                    <div class="testi-v2-name">{{$t['name']}}</div>
                </div>
                <div class="testi-v2-quote-area">
                    <p class="testi-v2-text">
                        {{$t['text']}}
                    </p>
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

<!-- Dark Portfolio Section -->
<section class="portfolio-section" id="portfolio">
    <div class="services-header">
        <h2>Featured <span class="text-red">Work</span></h2>
        <p style="color: #999;">Big ideas. Bigger results.</p>
    </div>

    <!-- Parallax/Seamless Loop Image Showcase -->
    <div class="portfolio-showcase">
        <div class="portfolio-scroller">
            <!-- Original Image -->
            <img src="/assets/img/vidproduction/portfoliofullwidth.webp" alt="Portfolio" class="portfolio-img">
            <!-- Duplicate Image for seamless loop on mobile -->
            <img src="/assets/img/vidproduction/portfoliofullwidth.webp" alt="Portfolio" class="portfolio-img">
        </div>
        <!-- Scroll hint for mobile -->
        <div class="portfolio-scroll-hint">
            <svg fill="currentColor" viewBox="0 0 24 24">
                <path d="M8.59 16.59L13.17 12 8.59 7.41 10 6l6 6-6 6-1.41-1.41z"/>
            </svg>
        </div>
    </div>

    <!-- Case Studies -->
    <div class="case-wrapper">
        <!-- Case 1 -->
        <div class="case-card reveal">
            <!-- HLS video used as clickable placeholder -->
            <div class="case-video" onclick="openVideoModal('https://cdn.backternity.dev/api/videos/thumbpin/d20ac002-04ab-41ee-956b-0bb22556c2e5/master.m3u8')">
                <video class="hls-thumbnail" muted loop playsinline preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/d20ac002-04ab-41ee-956b-0bb22556c2e5/master.m3u8" type="application/x-mpegURL">
                </video>
                <div class="click-play-overlay">
                     <div class="big-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="case-info">
                <span class="case-tag">Case Study</span>
                <img src="/assets/img/clients/mr.png" style="width: 120px; filter: invert(1); margin-bottom: 20px;"
                    alt="Logo">
                <p class="case-desc">From a newcomer to an industry leader. <strong style="color: red;">Strategic
                        branding</strong> and sharp marketing helped this brand carve its niche.</p>
            </div>
        </div>

        <!-- Case 2 -->
        <div class="case-card reveal">
             <div class="case-video" onclick="openVideoModal('https://cdn.backternity.dev/api/videos/thumbpin/0100b0f4-f228-484a-92c9-2eb8be37aa99/master.m3u8')">
                <video class="hls-thumbnail" muted loop playsinline preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/0100b0f4-f228-484a-92c9-2eb8be37aa99/master.m3u8" type="application/x-mpegURL">
                </video>
                 <div class="click-play-overlay">
                     <div class="big-play-btn"><svg viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg></div>
                </div>
            </div>
            <div class="case-info">
                <span class="case-tag">Viral Campaign</span>
                <img src="/assets/img/clients/21.png" style="width: 120px; filter: invert(1); margin-bottom: 20px;"
                    alt="Logo">
                <p class="case-desc">An April Fool's prank that sparked conversation. <strong
                        style="color: red;">Record-breaking engagement</strong> and real impact.</p>
            </div>
        </div>
    </div>

    <!-- Website Showcases -->
    <div class="services-header" style="margin-top: 80px;">
        <h2 style="color: #000;">Website <span class="text-red">Showcases</span></h2>
        <p style="color: #999;">Digital experiences that deliver results.</p>
    </div>

    <!-- Mockups (Minimal Style) - Autoplay Videos -->
    <div class="mockup-grid">
        <div class="mockup-item reveal">
            <div class="mockup-screen">
                 <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/36c9fbae-8a9d-437c-a5ae-efd008b63b9f/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
        <div class="mockup-item reveal" style="transition-delay: 0.2s;">
            <div class="mockup-screen">
                 <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/36163789-c02b-4ad8-81e1-1b24632e71df/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
        <div class="mockup-item reveal" style="transition-delay: 0.2s;">
            <div class="mockup-screen">
                 <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/fb0df31f-e6b8-421b-9ad6-0b9d67ae3253/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
        <div class="mockup-item reveal" style="transition-delay: 0.2s;">
            <div class="mockup-screen">
                 <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/122de18c-2308-4051-b197-640aef8ac785/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
        <div class="mockup-item reveal" style="transition-delay: 0.2s;">
            <div class="mockup-screen">
                 <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/365d0ec2-be01-4f25-8f8a-fc491ce2ff11/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
        <div class="mockup-item reveal" style="transition-delay: 0.2s;">
            <div class="mockup-screen">
                <video class="hls-thumbnail" muted loop playsinline autoplay preload="metadata">
                    <source src="https://cdn.backternity.dev/api/videos/thumbpin/3f1f301c-11e5-4ca7-a037-0236fb9d2704/master.m3u8" type="application/x-mpegURL">
                </video>
            </div>
        </div>
    </div>

    <!-- NEW: Square Images Section (Social Highlights) -->
    <div class="services-header" style="margin-top: 120px;">
        <h2>Social <span class="text-red">Highlights</span></h2>
        <p style="color: #999;">Visual stories that stop the scroll.</p>
    </div>

    <div class="square-gallery">
        <!-- Row 1: Moving Left to Right -->
        <div class="marquee-row marquee-row-1">
            @for ($i = 1; $i <= 4; $i++) <div class="square-item">
                <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
        </div>
        @endfor
        <!-- Duplicate for seamless loop -->
        @for ($i = 1; $i <= 4; $i++) <div class="square-item">
            <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
    </div>
    @endfor
    </div>

    <!-- Row 2: Moving Right to Left -->
    <div class="marquee-row marquee-row-2">
        @for ($i = 5; $i <= 8; $i++) <div class="square-item">
            <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
    </div>
    @endfor
    <!-- Duplicate for seamless loop -->
    @for ($i = 5; $i <= 8; $i++) <div class="square-item">
        <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
        </div>
        @endfor
        </div>
        </div>
        
    <!-- NEW MOBILE VERTICAL MARQUEE GRID -->
    <div class="social-vertical-grid">
        <div class="social-col">
            <div class="social-col-inner animate-up">
                 <!-- Column 1 Images Duplicated for Loop -->
                 @for ($j=0; $j<4; $j++)
                    @for ($i = 1; $i <= 4; $i++) 
                        <div class="square-item">
                            <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                        </div>
                    @endfor
                 @endfor
            </div>
        </div>
        <div class="social-col">
            <div class="social-col-inner animate-down">
                 <!-- Column 2 Images Duplicated for Loop -->
                 @for ($j=0; $j<4; $j++)
                    @for ($i = 5; $i <= 8; $i++) 
                        <div class="square-item">
                            <img src="/assets/img/vidproduction/p{{ $i }}.jpg" loading="lazy" alt="Social Post {{ $i }}">
                        </div>
                    @endfor
                 @endfor
            </div>
        </div>
    </div>

        <!-- NEW: RESTORED GRID FOR SHORT CONTENT (NO 3D CAROUSEL) -->
        <div class="services-header" style="margin-top: 120px;">
            <h2>Short <span class="text-red">Content</span></h2>
            <p style="color: #999;">Engaging vertical content for the mobile-first world.</p>
        </div>

<!-- UNIQUE REELS SECTION -->
<div class="shorts-modern-section">
    <div class="modern-reel-grid">
        
        <!-- REEL 1 -->
        <div class="reel-card-wrap reveal">
            <video class="modern-reel-video" id="reel1" src="https://cdn.backternity.dev/api/videos/thumbpin/e1e0b53c-ab17-4600-b898-2462b35a0f22/master.m3u8" muted autoplay loop playsinline preload="auto"></video>
            
            <div class="reel-overlay-gradient"></div>
            
            <div class="reel-ui-top">
                <button class="reel-mute-btn muted" onclick="toggleMute('reel1', this)">
                    <span>🔇</span>
                </button>
            </div>
            

        </div>

        <!-- REEL 2 -->
        <div class="reel-card-wrap reveal" style="transition-delay: 0.1s;">
            <video class="modern-reel-video" id="reel2" src="https://cdn.backternity.dev/api/videos/thumbpin/0780dbc5-81b5-4fdf-bbda-26fd82dc4acf/master.m3u8" muted autoplay loop playsinline preload="auto"></video>
            <div class="reel-overlay-gradient"></div>
            <div class="reel-ui-top">
                <button class="reel-mute-btn muted" onclick="toggleMute('reel2', this)">
                    <span>🔇</span>
                </button>
            </div>
        </div>

        <!-- REEL 3 -->
        <div class="reel-card-wrap reveal" style="transition-delay: 0.2s;">
            <video class="modern-reel-video" id="reel3" src="https://cdn.backternity.dev/api/videos/thumbpin/e7dc4451-79a5-4a93-b391-1d7bfb05e74c/master.m3u8" muted autoplay loop playsinline preload="auto"></video>
            <div class="reel-overlay-gradient"></div>
            <div class="reel-ui-top">
                <button class="reel-mute-btn muted" onclick="toggleMute('reel3', this)">
                    <span>🔇</span>
                </button>
            </div>

        </div>

        <!-- REEL 4 -->
        <div class="reel-card-wrap reveal" style="transition-delay: 0.3s;">
            <video class="modern-reel-video" id="reel4" src="https://cdn.backternity.dev/api/videos/thumbpin/3de6658f-8751-4b52-99c1-fecf0e1de133/master.m3u8" muted autoplay loop playsinline preload="auto"></video>
            <div class="reel-overlay-gradient"></div>
            <div class="reel-ui-top">
                <button class="reel-mute-btn muted" onclick="toggleMute('reel4', this)">
                    <span>🔇</span>
                </button>
            </div>
        </div>

    </div>
</div>
    
</section>

<!-- Pricing Section -->
<section class="pricing-section">
    <div class="services-header">
        <h2 style="color: #000;">Marketing <span class="text-red">Investment</span></h2>
        <p style="color: #666;">Transparent pricing for measurable growth</p>
    </div>

    <div class="pricing-wrapper reveal">
        <!-- Basic -->
        <div class="price-box">
            <h3 style="font-size: 24px;">Starter</h3>
            <div class="price-tag text-red">₹3-10L</div>
            <p style="color: #666; font-size: 14px;">Perfect for small businesses looking to establish a digital
                presence.</p>
            <a href="#contact" class="price-btn" onclick="selectPackage('Starter Package (₹3-10L)', event)">Get Started</a>
        </div>

        <!-- Advanced -->
        <div class="price-box featured">
            <div class="popular-badge">Most Popular</div>
            <h3 style="font-size: 24px;">Growth</h3>
            <div class="price-tag">₹10-30L</div>
            <p style="color: #ccc; font-size: 14px;">Comprehensive strategy for brands ready to dominate their market.
            </p>
            <a href="#contact" class="price-btn" onclick="selectPackage('Growth Package (₹10-30L)', event)">Get Started</a>
        </div>

        <!-- Pro -->
        <div class="price-box">
            <h3 style="font-size: 24px;">Enterprise</h3>
            <div class="price-tag text-red">₹30L+</div>
            <p style="color: #666; font-size: 14px;">Full-scale 360° transformation and aggressive scaling.</p>
            <a href="#contact" class="price-btn" onclick="selectPackage('Enterprise Package (₹30L+)', event)">Get Started</a>
        </div>
    </div>
</section>

<!-- Conviction Section -->
<section class="what-we-do-section" style="text-align: center; background: #f9f9f9; padding: 80px 20px;">
    <div style="max-width: 800px; margin: 0 auto;" class="reveal">
        <h3 style="font-size: 30px; font-weight: 800;">Transparent Agreements. <span class="text-red">Clear
                Outcomes.</span></h3>
        <p style="font-size: 18px; color: #666; margin-top: 15px;">We believe in clear contracts and measurable results.
            Every project starts with defined goals and transparent timelines.</p>
    </div>
</section>

<!-- Footer / Contact -->
<section class="cta-section" id="contact">
    <div class="cta-container">
        <div class="cta-text">
            <h2>Let's create something<br>Extraordinary.</h2>
            <p>Ready to transform your brand? The coffee is on us.</p>
            <div style="font-size: 80px; font-weight: 900; margin-top: 40px; opacity: 0.2;">THUMBPIN.</div>
        </div>
        <div class="cta-form">
            <form class="c-form" id="contactForm">
                @csrf
                <div id="form-messages"></div>
                
                <!-- Hidden field for selected package -->
                <input type="hidden" name="selected_package" id="selectedPackage" value="">
                
                <!-- Package selection indicator -->
                <div id="packageIndicator" style="display: none; background: rgba(255, 0, 0, 0.1); padding: 12px 20px; border-radius: 8px; margin-bottom: 15px; border-left: 4px solid var(--primary-red);">
                    <small style="color: #666; font-weight: 600;">Selected Investment:</small>
                    <div style="color: var(--primary-red); font-weight: 700; margin-top: 5px;" id="packageName"></div>
                </div>
                
                <div class="form-group">
                    <input type="text" name="name" class="form-input" placeholder="Your Name*" required>
                </div>
                <div class="form-group">
                    <input type="email" name="email" class="form-input" placeholder="Work Email (Preferred)*" required>
                </div>
                <div class="form-group">
                    <input type="tel" name="phone" class="form-input" placeholder="Phone Number*" required>
                </div>
                <div class="form-group">
                    <input type="text" name="company_name" class="form-input" placeholder="Company Name*" required>
                </div>
                <div class="form-group">
                    <textarea rows="4" name="message" class="form-input" placeholder="Tell us about your project*"
                        required></textarea>
                </div>
                <!-- Updated Buttons -->
                <button type="submit" class="form-btn" id="submitBtn">BOOK A CALL</button>
                <a href="https://api.whatsapp.com/send?phone=919773511447" target="_blank" class="form-btn-secondary">
                    Urgent? <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="5px" width="40" height="40"
                        viewBox="0 0 48 48">
                        <path fill="#fff"
                            d="M4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98c-0.001,0,0,0,0,0h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303z">
                        </path>
                        <path fill="#fff"
                            d="M4.868,43.803c-0.132,0-0.26-0.052-0.355-0.148c-0.125-0.127-0.174-0.312-0.127-0.483l2.639-9.636c-1.636-2.906-2.499-6.206-2.497-9.556C4.532,13.238,13.273,4.5,24.014,4.5c5.21,0.002,10.105,2.031,13.784,5.713c3.679,3.683,5.704,8.577,5.702,13.781c-0.004,10.741-8.746,19.48-19.486,19.48c-3.189-0.001-6.344-0.788-9.144-2.277l-9.875,2.589C4.953,43.798,4.911,43.803,4.868,43.803z">
                        </path>
                        <path fill="#cfd8dc"
                            d="M24.014,5c5.079,0.002,9.845,1.979,13.43,5.566c3.584,3.588,5.558,8.356,5.556,13.428c-0.004,10.465-8.522,18.98-18.986,18.98h-0.008c-3.177-0.001-6.3-0.798-9.073-2.311L4.868,43.303l2.694-9.835C5.9,30.59,5.026,27.324,5.027,23.979C5.032,13.514,13.548,5,24.014,5 M24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974C24.014,42.974,24.014,42.974,24.014,42.974 M24.014,4C24.014,4,24.014,4,24.014,4C12.998,4,4.032,12.962,4.027,23.979c-0.001,3.367,0.849,6.685,2.461,9.622l-2.585,9.439c-0.094,0.345,0.002,0.713,0.254,0.967c0.19,0.192,0.447,0.297,0.711,0.297c0.085,0,0.17-0.011,0.254-0.033l9.687-2.54c2.828,1.468,5.998,2.243,9.197,2.244c11.024,0,19.99-8.963,19.995-19.98c0.002-5.339-2.075-10.359-5.848-14.135C34.378,6.083,29.357,4.002,24.014,4L24.014,4z">
                        </path>
                        <path fill="#40c351"
                            d="M35.176,12.832c-2.98-2.982-6.941-4.625-11.157-4.626c-8.704,0-15.783,7.076-15.787,15.774c-0.001,2.981,0.833,5.883,2.413,8.396l0.376,0.597l-1.595,5.821l5.973-1.566l0.577,0.342c2.422,1.438,5.2,2.198,8.032,2.199h0.006c8.698,0,15.777-7.077,15.78-15.776C39.795,19.778,38.156,15.814,35.176,12.832z">
                        </path>
                        <path fill="#fff" fill-rule="evenodd"
                            d="M19.268,16.045c-0.355-0.79-0.729-0.806-1.068-0.82c-0.277-0.012-0.593-0.011-0.909-0.011c-0.316,0-0.83,0.119-1.265,0.594c-0.435,0.475-1.661,1.622-1.661,3.956c0,2.334,1.7,4.59,1.937,4.906c0.237,0.316,3.282,5.259,8.104,7.161c4.007,1.58,4.823,1.266,5.693,1.187c0.87-0.079,2.807-1.147,3.202-2.255c0.395-1.108,0.395-2.057,0.277-2.255c-0.119-0.198-0.435-0.316-0.909-0.554s-2.807-1.385-3.242-1.543c-0.435-0.158-0.751-0.237-1.068,0.238c-0.316,0.474-1.225,1.543-1.502,1.859c-0.277,0.317-0.554,0.357-1.028,0.119c-0.474-0.238-2.002-0.738-3.815-2.354c-1.41-1.257-2.362-2.81-2.639-3.285c-0.277-0.474-0.03-0.731,0.208-0.968c0.213-0.213,0.474-0.554,0.712-0.831c0.237-0.277,0.316-0.475,0.474-0.791c0.158-0.317,0.079-0.594-0.04-0.831C20.612,19.329,19.69,16.983,19.268,16.045z"
                            clip-rule="evenodd"></path>
                    </svg>
                </a>
            </form>
        </div>
    </div>
</section>

<!-- Slim Footer Strip -->
<div class="footer-strip">
    <div class="footer-strip-content">
        <div class="footer-item">
            <strong>Email:</strong> <a href="mailto:brajesh@thumbpin.in">brajesh@thumbpin.in</a>
        </div>
        <div class="footer-item">
            <strong>Phone:</strong> <a href="tel:+919773511447">+91 97735 11447</a>
        </div>
        <div class="footer-item">
            <strong>Address:</strong> <span>Spaze IT Park, Gurgaon, India</span>
        </div>
    </div>
</div>

<!-- Video Modal -->
<div id="videoModal" class="video-modal">
    <div class="modal-content" id="modalContent">
        <span class="close-modal" onclick="closeVideoModal()">&times;</span>
        <!-- Content injected via JS -->
    </div>
</div>

<!-- Scripts -->
<script>
// HLS.js Implementation Logic
document.addEventListener('DOMContentLoaded', () => {
    // Only init HLS for thumbnails if they are not placeholders
    // We can run this to initialize background videos if any
});

// Toggle Mute Function for Reels
function toggleMute(videoId, button) {
    const video = document.getElementById(videoId);
    if (video) {
        video.muted = !video.muted;
        button.classList.toggle('muted');
    }
}

// Smooth Scroll Function
function scrollToSection(sectionId) {
    const element = document.getElementById(sectionId);
    if (element) {
        const offsetTop = element.offsetTop - 80; // Account for navbar height
        window.scrollTo({
            top: offsetTop,
            behavior: 'smooth'
        });
    }
}

// Package Selection Function
function selectPackage(packageName, event) {
    event.preventDefault();
    
    // Set the hidden field value
    document.getElementById('selectedPackage').value = packageName;
    
    // Show the package indicator
    const indicator = document.getElementById('packageIndicator');
    const nameDisplay = document.getElementById('packageName');
    
    indicator.style.display = 'block';
    nameDisplay.textContent = packageName;
    
    // Add a small animation
    indicator.style.animation = 'none';
    setTimeout(() => {
        indicator.style.animation = 'fadeInUp 0.5s ease';
    }, 10);
    
    // Scroll to contact form
    scrollToSection('contact');
    
    // Optional: Focus on the first input after scroll
    setTimeout(() => {
        const firstInput = document.querySelector('#contactForm input[name="name"]');
        if (firstInput) {
            firstInput.focus();
        }
    }, 800);
}

// Video Modal Functions - UPDATED FOR FULL SIZE & HLS
function openVideoModal(videoSource) {
    const modal = document.getElementById('videoModal');
    const modalContent = document.getElementById('modalContent');
    const isYouTube = videoSource.includes('youtube') || videoSource.includes('youtu.be');
    const isHLS = videoSource.includes('.m3u8');

    modalContent.innerHTML = '<span class="close-modal" onclick="closeVideoModal()">&times;</span>'; // Clear prev content

    if (isYouTube) {
        // Handle YouTube
        modalContent.className = 'modal-content is-youtube';
        const iframe = document.createElement('iframe');
        iframe.src = videoSource + (videoSource.includes('?') ? '&' : '?') + 'autoplay=1';
        iframe.frameBorder = '0';
        iframe.allow = 'autoplay; fullscreen';
        modalContent.appendChild(iframe);
    } else {
        // Handle Direct Video / HLS
        modalContent.className = 'modal-content'; // reset class
        const video = document.createElement('video');
        video.controls = true;
        video.autoplay = true;
        video.playsInline = true;
        
        if (Hls.isSupported() && isHLS) {
            const hls = new Hls();
            hls.loadSource(videoSource);
            hls.attachMedia(video);
            hls.on(Hls.Events.MANIFEST_PARSED, function() {
                video.play();
            });
        } else if (video.canPlayType('application/vnd.apple.mpegurl')) {
             video.src = videoSource;
             video.addEventListener('loadedmetadata', function() {
                video.play();
            });
        } else {
             video.src = videoSource;
             video.play();
        }
        modalContent.appendChild(video);
    }

    modal.style.display = 'flex';
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const modalContent = document.getElementById('modalContent');
    modalContent.innerHTML = ''; // Destroy video instance
    modal.style.display = 'none';
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside
window.onclick = function(event) {
    const modal = document.getElementById('videoModal');
    if (event.target === modal) {
        closeVideoModal();
    }
}

// Close modal on ESC key
document.addEventListener('keydown', function(event) {
    if (event.key === 'Escape') {
        closeVideoModal();
    }
});


// Testimonial Carousel Logic
document.addEventListener('DOMContentLoaded', function() {
    const track = document.getElementById('testiTrack');
    const cards = document.querySelectorAll('.testi-card-v2');
    const prevBtn = document.getElementById('testiPrev');
    const nextBtn = document.getElementById('testiNext');
    let currentIndex = 1; // Start at middle card
    const totalCards = cards.length;

    function updateCarousel() {
        cards.forEach((card, index) => {
            // Remove all classes first
            card.classList.remove('active', 'prev', 'next', 'hidden');

            if (index === currentIndex) {
                card.classList.add('active');
            } else if (index === (currentIndex - 1 + totalCards) % totalCards) {
                card.classList.add('prev');
            } else if (index === (currentIndex + 1) % totalCards) {
                card.classList.add('next');
            } else {
                card.classList.add('hidden');
            }
        });
    }

    function goToNext() {
        currentIndex = (currentIndex + 1) % totalCards;
        updateCarousel();
    }

    function goToPrev() {
        currentIndex = (currentIndex - 1 + totalCards) % totalCards;
        updateCarousel();
    }

    nextBtn.addEventListener('click', goToNext);
    prevBtn.addEventListener('click', goToPrev);

    // Touch/Swipe functionality for horizontal sliding
    let touchStartX = 0;
    let touchEndX = 0;
    let touchStartY = 0;
    let touchEndY = 0;
    const swipeThreshold = 50; // Minimum distance for a swipe

    track.addEventListener('touchstart', (e) => {
        touchStartX = e.changedTouches[0].screenX;
        touchStartY = e.changedTouches[0].screenY;
    }, { passive: true });

    track.addEventListener('touchend', (e) => {
        touchEndX = e.changedTouches[0].screenX;
        touchEndY = e.changedTouches[0].screenY;
        handleSwipe();
    }, { passive: true });

    // Mouse drag functionality for desktop
    let mouseStartX = 0;
    let mouseEndX = 0;
    let isDragging = false;

    track.addEventListener('mousedown', (e) => {
        isDragging = true;
        mouseStartX = e.clientX;
        track.style.cursor = 'grabbing';
    });

    track.addEventListener('mousemove', (e) => {
        if (!isDragging) return;
        e.preventDefault();
    });

    track.addEventListener('mouseup', (e) => {
        if (!isDragging) return;
        isDragging = false;
        mouseEndX = e.clientX;
        track.style.cursor = 'grab';
        handleMouseSwipe();
    });

    track.addEventListener('mouseleave', () => {
        if (isDragging) {
            isDragging = false;
            track.style.cursor = 'grab';
        }
    });

    function handleSwipe() {
        const horizontalDiff = touchEndX - touchStartX;
        const verticalDiff = Math.abs(touchEndY - touchStartY);
        
        // Only trigger swipe if horizontal movement is greater than vertical
        if (Math.abs(horizontalDiff) > verticalDiff && Math.abs(horizontalDiff) > swipeThreshold) {
            if (horizontalDiff > 0) {
                // Swipe right - go to previous
                goToPrev();
            } else {
                // Swipe left - go to next
                goToNext();
            }
        }
    }

    function handleMouseSwipe() {
        const diff = mouseEndX - mouseStartX;
        
        if (Math.abs(diff) > swipeThreshold) {
            if (diff > 0) {
                // Drag right - go to previous
                goToPrev();
            } else {
                // Drag left - go to next
                goToNext();
            }
        }
    }

    // Add grab cursor style
    track.style.cursor = 'grab';

    // Initial state
    updateCarousel();
});

// Reels Section - Enhanced Scroll Behavior
document.addEventListener('DOMContentLoaded', function() {
    const reelGrid = document.querySelector('.modern-reel-grid');
    if (!reelGrid) return;

    // Enable smooth scrolling behavior
    reelGrid.style.scrollBehavior = 'smooth';

    // Mouse drag scrolling for desktop
    let isDown = false;
    let startX;
    let scrollLeft;

    reelGrid.addEventListener('mousedown', (e) => {
        isDown = true;
        reelGrid.style.cursor = 'grabbing';
        reelGrid.style.userSelect = 'none';
        startX = e.pageX - reelGrid.offsetLeft;
        scrollLeft = reelGrid.scrollLeft;
    });

    reelGrid.addEventListener('mouseleave', () => {
        isDown = false;
        reelGrid.style.cursor = 'grab';
    });

    reelGrid.addEventListener('mouseup', () => {
        isDown = false;
        reelGrid.style.cursor = 'grab';
    });

    reelGrid.addEventListener('mousemove', (e) => {
        if (!isDown) return;
        e.preventDefault();
        const x = e.pageX - reelGrid.offsetLeft;
        const walk = (x - startX) * 2; // Scroll speed multiplier
        reelGrid.scrollLeft = scrollLeft - walk;
    });

    // Add grab cursor on hover
    reelGrid.style.cursor = 'grab';

    // Snap to center on scroll end (optional enhancement)
    let scrollTimeout;
    reelGrid.addEventListener('scroll', () => {
        clearTimeout(scrollTimeout);
        scrollTimeout = setTimeout(() => {
            // Snap to nearest card center
            const cards = reelGrid.querySelectorAll('.reel-card-wrap');
            const gridCenter = reelGrid.scrollLeft + (reelGrid.clientWidth / 2);
            
            let closestCard = cards[0];
            let closestDistance = Math.abs(cards[0].offsetLeft + (cards[0].clientWidth / 2) - gridCenter);
            
            cards.forEach(card => {
                const cardCenter = card.offsetLeft + (card.clientWidth / 2);
                const distance = Math.abs(cardCenter - gridCenter);
                
                if (distance < closestDistance) {
                    closestDistance = distance;
                    closestCard = card;
                }
            });
            
            // Smooth scroll to center of closest card
            const targetScroll = closestCard.offsetLeft - (reelGrid.clientWidth / 2) + (closestCard.clientWidth / 2);
            reelGrid.scrollTo({
                left: targetScroll,
                behavior: 'smooth'
            });
        }, 150); // Delay to allow scroll to settle
    });
});

// Typing Effect
const words = ['stand out.', 'engage.', 'grow.', 'inspire.'];
let i = 0;
let timer;

function typingEffect() {
    let word = words[i].split("");
    var loopTyping = function() {
        if (word.length > 0) {
            document.getElementById('typingText').innerHTML += word.shift();
        } else {
            setTimeout(deletingEffect, 2000); // Wait before deleting
            return false;
        }
        timer = setTimeout(loopTyping, 100);
    };
    loopTyping();
}

function deletingEffect() {
    let word = words[i].split("");
    var loopDeleting = function() {
        if (word.length > 0) {
            word.pop();
            document.getElementById('typingText').innerHTML = word.join("");
        } else {
            if (words.length > (i + 1)) {
                i++;
            } else {
                i = 0;
            }
            typingEffect();
            return false;
        }
        timer = setTimeout(loopDeleting, 50);
    };
    loopDeleting();
}

document.addEventListener('DOMContentLoaded', typingEffect);

// Navbar Scroll Effect
window.addEventListener('scroll', function() {
    const nav = document.getElementById('navbar');
    if (window.scrollY > 50) {
        nav.classList.add('scrolled');
    } else {
        nav.classList.remove('scrolled');
    }
});

// Scroll Reveal Animation (UPDATED to include new classes)
function reveal() {
    var windowHeight = window.innerHeight;
    var elementVisible = 100;

    // Existing reveals
    var reveals = document.querySelectorAll(".reveal");
    for (var i = 0; i < reveals.length; i++) {
        var elementTop = reveals[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - elementVisible) {
            reveals[i].classList.add("active");
        }
    }

    // New Clip Reveals
    var clips = document.querySelectorAll(".clip-reveal");
    for (var i = 0; i < clips.length; i++) {
        var elementTop = clips[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - elementVisible) {
            clips[i].classList.add("active");
        }
    }

    // New Stagger Reveals
    var staggers = document.querySelectorAll(".stagger-up");
    for (var i = 0; i < staggers.length; i++) {
        var elementTop = staggers[i].getBoundingClientRect().top;
        if (elementTop < windowHeight - elementVisible) {
            staggers[i].classList.add("active");
        }
    }
}
window.addEventListener("scroll", reveal);
// Trigger once on load
reveal();

// Portfolio Drag Logic (Mobile Only)
document.addEventListener('DOMContentLoaded', function() {
    const portfolioScroller = document.querySelector('.portfolio-scroller');
    const showcase = document.querySelector('.portfolio-showcase');
    const scrollHint = document.querySelector('.portfolio-scroll-hint');

    if (portfolioScroller && showcase && window.innerWidth <= 768) {
        let isDragging = false;
        let startX = 0;
        let currentTranslate = 0;
        let prevTranslate = 0;

        function setTransform(translateX) {
            portfolioScroller.style.transform = `translateX(${translateX}px)`;
        }

        function getMaxTranslate() {
            const imgWidth = portfolioScroller.scrollWidth;
            const showcaseWidth = showcase.offsetWidth;
            return -(imgWidth - showcaseWidth);
        }
        
        function checkScrollEnd() {
            const maxTranslate = getMaxTranslate();
            // Hide hint if user has scrolled to near the end (within 50px)
            if (scrollHint && currentTranslate <= maxTranslate + 50) {
                scrollHint.classList.add('hidden');
            }
        }

        // Touch Events (Mobile)
        showcase.addEventListener('touchstart', (e) => {
            isDragging = true;
            startX = e.touches[0].clientX;
            // Hide hint as soon as user starts dragging
            if (scrollHint) {
                scrollHint.classList.add('hidden');
            }
        }, { passive: true });

        showcase.addEventListener('touchmove', (e) => {
            if(!isDragging) return;
            const currentX = e.touches[0].clientX;
            const diff = currentX - startX;
            currentTranslate = prevTranslate + diff;
            
            // Limit translation to -155px maximum
            if (currentTranslate > 0) currentTranslate = 0;
            if (currentTranslate < -60) currentTranslate = -60;
            
            setTransform(currentTranslate);
        }, { passive: true });

        showcase.addEventListener('touchend', () => {
            isDragging = false;
            prevTranslate = currentTranslate;
        });
    }
});

// Form Submission Handler
document.getElementById('contactForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const form = this;
    const submitBtn = document.getElementById('submitBtn');
    const messagesDiv = document.getElementById('form-messages');
    const formData = new FormData(form);

    // Get fresh CSRF token from meta tag or form
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') ||
        document.querySelector('input[name="_token"]')?.value;

    // Ensure CSRF token is included
    if (csrfToken) {
        formData.set('_token', csrfToken);
    }

    // Disable submit button and show loading state
    submitBtn.disabled = true;
    submitBtn.textContent = 'BOOKING...';
    messagesDiv.style.display = 'none';

    // Submit form via AJAX with enhanced error handling
    fetch('/advertising-agency-contact', {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken || ''
            }
        })
        .then(response => {
            // Handle CSRF token mismatch specifically
            if (response.status === 419) {
                throw new Error('CSRF_TOKEN_MISMATCH');
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Show success message
                messagesDiv.textContent = data.message;
                messagesDiv.className = 'success';
                messagesDiv.style.display = 'block';

                // Reset form
                form.reset();
            } else {
                // Show error message
                let errorMessage = data.message || 'Something went wrong. Please try again.';
                if (data.errors) {
                    errorMessage = Object.values(data.errors).flat().join(', ');
                }
                messagesDiv.textContent = errorMessage;
                messagesDiv.className = 'error';
                messagesDiv.style.display = 'block';
            }
        })
        .catch(error => {
            console.error('Error:', error);

            if (error.message === 'CSRF_TOKEN_MISMATCH') {
                // Handle CSRF token mismatch by refreshing the page
                messagesDiv.textContent = 'Security token expired. Please refresh the page and try again.';
                messagesDiv.className = 'error';
                messagesDiv.style.display = 'block';

                // Optionally auto-refresh after 3 seconds
                setTimeout(() => {
                    window.location.reload();
                }, 3000);
            } else {
                messagesDiv.textContent = 'Network error. Please try again.';
                messagesDiv.className = 'error';
                messagesDiv.style.display = 'block';
            }
        })
        .finally(() => {
            // Re-enable submit button
            submitBtn.disabled = false;
            submitBtn.textContent = 'BOOK A CALL';
        });
});

// Creative Loading Screen Handler (Optimized for Asset Loading)
document.addEventListener('DOMContentLoaded', function() {
    const loader = document.getElementById('creative-loader');

    // Logic: We remove the loader when the window is fully loaded (all images/scripts)
    // OR after a max timeout of 2.5s to prevent getting stuck.

    const hideLoader = () => {
        if (loader && !loader.classList.contains('fade-out')) {
            loader.classList.add('fade-out');
            setTimeout(function() {
                if (loader.parentNode) {
                    loader.parentNode.removeChild(loader);
                }
                document.body.style.overflow = '';
            }, 600);
        }
    };

    window.addEventListener('load', hideLoader);

    // Fallback timeout
    setTimeout(hideLoader, 2500);
});
</script>
@endsection