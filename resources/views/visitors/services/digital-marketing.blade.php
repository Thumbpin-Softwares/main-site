@extends('layout.visitor', [
    'title' => 'Best Digital Marketing Agency in Gurgaon - IND| Thumbpin',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">
    <style>
        /* ====================== HERO SECTION ====================== */
        .dm-hero {
            background: #000;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .dm-hero .content-box .title {
            font-family: Arial, sans-serif;
            font-size: 72px;
            line-height: 1.1;
            font-weight: 800;
            color: #fff;
            letter-spacing: -2px;
            margin-bottom: 30px;
            text-transform: none;
        }

        .dm-hero .content-box .des {
            font-family: sans-serif;
            font-weight: 300;
            font-size: 20px;
            color: #ccc;
            letter-spacing: 0.3px;
            line-height: 1.7;
        }

        .dm-hero .sec-img img {
            max-width: 100%;
            display: block;
        }

        /* ====================== STATS SECTION ====================== */
        .dm-stats {
            padding: 80px 0;
            background: #fff;
        }

        .dm-stats .stat-card {
            text-align: center;
            padding: 40px 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .dm-stats .stat-card:hover {
            border-color: var(--tp-red);
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
        }

        .dm-stats .stat-card h5 {
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
            color: #666;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .dm-stats .stat-card span {
            font-weight: 700;
            font-size: 48px;
            line-height: 1.0;
            color: var(--tp-red);
            display: block;
        }

        /* ====================== INTRO SECTION ====================== */
        .dm-intro {
            padding: 60px 0;
            background: #fff;
        }

        .dm-intro h2 {
            font-weight: 700;
            font-size: 42px;
            text-align: center;
            margin-bottom: 30px;
            color: #000;
        }

        .dm-intro p {
            text-align: center;
            color: #666;
            font-size: 18px;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto;
        }

        /* ====================== SERVICE CARDS SECTION ====================== */
        .dm-services {
            padding: 80px 0;
            background: #fff;
        }

        .dm-service-card {
            margin-bottom: 80px;
            position: relative;
        }

        .dm-service-card .img {
            border-radius: 8px;
            overflow: hidden;
        }

        .dm-service-card .img img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
        }

        .dm-service-card:hover .img img {
            transform: scale(1.05);
        }

        .dm-service-card .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 40px;
        }

        .dm-service-card .title {
            font-size: 36px;
            font-weight: 800;
            color: #000;
            margin-bottom: 20px;
            text-transform: capitalize;
        }

        .dm-service-card .des {
            font-size: 17px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .dm-service-card .cta-btn a {
            display: inline-block;
            color: #000;
            font-size: 16px;
            font-weight: 600;
            text-decoration: none;
            padding: 12px 30px;
            border: 2px solid #000;
            border-radius: 4px;
            transition: all 0.3s ease;
        }

        .dm-service-card .cta-btn a:hover {
            background: var(--tp-red);
            border-color: var(--tp-red);
            color: #000;
        }

        /* ====================== CLIENTS SECTION ====================== */
        .dm-clients {
            padding: 80px 0;
            background: #fff;
        }

        .dm-clients .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .dm-clients .section-title h2 {
            font-size: 56px;
            font-weight: 800;
            color: #000;
            margin-bottom: 10px;
        }

        .dm-clients .section-title .highlight {
            color: var(--tp-red);
        }

        .dm-clients .brand-images .img {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 120px;
            transition: transform 0.3s ease;
        }

        .dm-clients .brand-images .img:hover {
            transform: scale(1.1);
        }

        .dm-clients .brand-images .img img {
            max-width: 100%;
            height: auto;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .dm-clients .brand-images .img:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* ====================== QUOTE SECTION ====================== */
        .dm-quote {
            padding: 100px 0;
            background: #f9f9f9;
            position: relative;
        }

        .dm-quote .quote-container {
            position: relative;
            font-family: Arial, sans-serif;
            font-size: 32px;
            font-weight: 500;
            line-height: 1.6;
            color: #000;
            text-align: center;
            max-width: 900px;
            margin: 0 auto;
        }

        .dm-quote .quote-container p {
            margin: 0 0 10px 0;
        }

        .dm-quote .quote-container::before {
            content: '"';
            font-size: 200px;
            color: rgba(235, 28, 36, 0.1);
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            top: -80px;
            z-index: 0;
            font-family: Georgia, serif;
        }

        /* ====================== CTA SECTION ====================== */
        .dm-cta {
            padding: 100px 0;
            background: #fff;
        }

        .dm-cta .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .dm-cta .section-title h4 {
            font-weight: 400;
            font-size: 38px;
            color: #666;
            margin-bottom: 10px;
        }

        .dm-cta .section-title h2 {
            font-weight: 700;
            font-size: 42px;
            color: #000;
        }

        .dm-cta .description {
            text-align: center;
            color: #666;
            font-size: 18px;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto 50px;
        }

        /* ====================== BOTTOM SECTION ====================== */
        .dm-bottom {
            padding: 100px 0;
            background: #000;
        }

        .dm-bottom .sec-title p {
            font-size: 56px;
            font-weight: 300;
            color: #fff;
            margin-bottom: 10px;
        }

        .dm-bottom .sec-title b {
            font-size: 66px;
            font-weight: 800;
            color: #fff;
        }

        .dm-bottom .sec-title b .shape-img {
            width: 78px;
            margin: -80px -16px -32px -10px;
        }

        .dm-bottom .des {
            font-size: 18px;
            color: #ccc;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .dm-bottom .btn-1 {
            background: var(--tp-red);
            color: #fff;
            padding: 15px 40px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .dm-bottom .btn-1:hover {
            background: #c91820;
            transform: translateY(-2px);
        }

        /* ====================== RESPONSIVE ====================== */
        @media screen and (max-width: 991px) {
            .dm-hero .content-box .title {
                font-size: 52px;
            }

            .dm-service-card .content {
                padding: 40px 0;
            }

            .dm-service-card {
                margin-bottom: 60px;
            }
        }

        @media screen and (max-width: 575px) {
            .dm-hero .content-box .title {
                font-size: 42px;
            }

            .dm-hero .content-box .des {
                font-size: 16px;
            }

            .dm-stats .stat-card span {
                font-size: 36px;
            }

            .dm-intro h2,
            .dm-clients .section-title h2,
            .dm-cta .section-title h2 {
                font-size: 32px;
            }

            .dm-service-card .title {
                font-size: 28px;
            }

            .dm-quote .quote-container {
                font-size: 22px;
            }

            .dm-quote .quote-container::before {
                font-size: 150px;
                top: -60px;
            }

            .dm-bottom .sec-title p {
                font-size: 38px;
            }

            .dm-bottom .sec-title b {
                font-size: 42px;
                display: block; /* Ensure it breaks properly */
            }

            .dm-bottom .sec-title b .shape-img {
                width: 40px; /* Slightly smaller */
                margin: -10px 0 0 0; /* Reset negative margins */
                vertical-align: middle;
                display: inline-block;
            }
            
            .dm-bottom .sec-img-1 {
                margin-bottom: 30px;
            }
            
            .dm-bottom .sec-img-1 img {
                max-width: 100%;
                height: auto;
            }
        }
    </style>
@endsection

@section('content')
<main>
    {{-- ====================== Hero Section ====================== --}}
    <div class="dm-hero">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-lg-7">
                    <div class="content-box">
                        <h1 class="title">Best Digital Marketing Agency</h1>
                        <div class="des">
                            <p>
                                We empower brands to tell their stories authentically and creatively, connecting with audiences on more than a surface level.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sec-img">
                        <img src="{{ config('app.url') }}/assets/img/digital-marketing.png" alt="Digital Marketing Agency">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Hero Section ====================== --}}
    
    {{-- ====================== Stats Section ====================== --}}
    <div class="dm-stats">
        <div class="container">
            <div class="row g-4">
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="stat-card">
                        <h5>Team Experience</h5>
                        <span>100+</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="stat-card">
                        <h5>Audience Reached</h5>
                        <span>1000+</span>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4">
                    <div class="stat-card">
                        <h5>Campaigns</h5>
                        <span>10000+</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Stats Section ====================== --}}
    {{-- ====================== Intro Section ====================== --}}
    <div class="dm-intro">
        <div class="container">
            <h2>Driving Digital Marketing Success and Beyond</h2>
            <p>
                Every day is a new opportunity to shape the digital landscape for your brand and let the synergy of creativity flow with the strategy. 
                We stay ahead in pushing boundaries by utilising AI for personalised marketing and adopting new platforms for enhanced reach. 
                From captivating visuals to content, we create work that leaves a lasting impression on the audience.
            </p>
        </div>
    </div>
    {{-- ====================== End Intro Section ====================== --}}
    {{-- ====================== Services Section ====================== --}}
    <div class="dm-services">
        <div class="container">
            {{-- Social Media Marketing --}}
            <div class="dm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/smo.png" alt="Social Media Marketing">
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="content">
                            <h3 class="title">Social Media Marketing</h3>
                            <div class="des">
                                <p>
                                    Social media marketing leverages number of platforms to cultivate brand communities, engage audiences with relevant content and expand reach through strategic campaigns. 
                                    We harness current trends, influencers and user-generated content to increase the visibility of your brand digitally.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('social-media-marketing-agency') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Performance Marketing --}}
            <div class="dm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/performance_marketing.png" alt="Performance Marketing Agency">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <h3 class="title">Performance Marketing</h3>
                            <div class="des">
                                <p>
                                    Performance marketing focuses on driving measurable outcomes through targeted advertising campaigns and data-driven optimisation techniques. 
                                    It aims to maximise return on investment by analysing key metrics of a brand by aligning it's objective with significant growth.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('performance-marketing-agency') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Web Design --}}
            <div class="dm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/web_design.png" alt="Web Design Services">
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="content">
                            <h3 class="title">Web Design</h3>
                            <div class="des">
                                <p>
                                    Web design is important in creating immersive digital experiences that align with brand identity and optimise user interactions. Through intuitive navigation and responsive design, 
                                    we enhance user experience across devices. It helps in aiming to convert visitors into loyal customers through seamless digital journeys.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('web-design-agency') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- SEO --}}
            <div class="dm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/seo.png" alt="SEO Services">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <h3 class="title">Search Engine Optimization (SEO)</h3>
                            <div class="des">
                                <p>
                                    Search Engine Optimization serves as the backbone of digital visibility strategies, optimising websites to rank higher in search engine results. By strategically using keywords, 
                                    content optimization and technical enhancements, it enhances organic traffic and brand visibility to discover businesses online.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('search-engine-optimization-seo-services') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Services Section ====================== --}}

    {{-- ====================== Clients Section ====================== --}}
    <div class="dm-clients">
        <div class="container">
            <div class="section-title">
                <h2>Friends <span class="highlight">On Board</span></h2>
            </div>
            <div class="brand-images">
                <div class="row">
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/1.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/2.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/3.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/4.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/5.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/6.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/7.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/8.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/9.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/10.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/11.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/12.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/13.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/14.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/15.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/16.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/17.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/18.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/19.png" alt="Client Logo">
                        </div>
                    </div>
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/20.png" alt="Client Logo">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Clients Section ====================== --}}

    {{-- ====================== Quote Section ====================== --}}
    <div class="dm-quote">
        <div class="container">
            <div class="quote-container">
                <p>Good marketing makes the company look smart.</p>
                <p>Great marketing makes the customer feel smart</p>
            </div>
        </div>
    </div>
    {{-- ====================== End Quote Section ====================== --}}

    {{-- ====================== CTA Section ====================== --}}
    <div class="dm-cta">
        <div class="container">
            <div class="section-title">
                <h4>Innovate. Influence. Inspire</h4>
                <h2>Transforming Ideas into Digital Marketing Services</h2>
            </div>
            <div class="description">
                <p>
                    We begin by understanding your brand's aspirations and challenges to track and analyse the overall performance. This makes us an extension of your team, achieving shared goals by incorporating strategy, innovation, 
                    creativity and data driven insights on multiple channels. Our integrated approach works together to enhance brand visibility and drive meaningful engagement.
                </p>
            </div>
        </div>
    </div>
    {{-- ====================== End CTA Section ====================== --}}

    {{-- ====================== Bottom Section ====================== --}}
    <div class="dm-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="sec-img-1">
                        <img src="{{ config('app.url') }}/assets/img/home/home-04.png" alt="Brand Story">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="content-box">
                        <div class="sec-title">
                            <p>Brand</p>
                            <b>
                                Your St
                                <img src="{{ config('app.url') }}/assets/img/shape-03.png" alt="shape" class="shape-img">
                                ry
                            </b>
                        </div>
                        <div class="des">
                            <p>
                                We are creatively strategic and strategically creative. We follow a research-based
                                strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for
                                your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <a href="{{ route('contact') }}" class="btn-1">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Bottom Section ====================== --}}
</main>
@endsection

@section('script')