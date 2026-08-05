@extends('layout.visitor', [
    'title' => 'Best Social Media Marketing Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">
    <style>
        /* ====================== HERO SECTION ====================== */
        .smm-hero {
            background: #000;
            padding: 150px 0 100px;
            position: relative;
            overflow: hidden;
        }

        .smm-hero .content-box .title {
            font-family: Arial, sans-serif;
            font-size: 72px;
            line-height: 1.1;
            font-weight: 800;
            color: #fff;
            letter-spacing: -2px;
            margin-bottom: 30px;
            text-transform: none;
        }

        .smm-hero .content-box .des {
            font-family: sans-serif;
            font-weight: 300;
            font-size: 20px;
            color: #ccc;
            letter-spacing: 0.3px;
            line-height: 1.7;
        }

        .smm-hero .sec-img img {
            max-width: 100%;
            display: block;
        }

        /* ====================== STATS SECTION ====================== */
        .smm-stats {
            padding: 80px 0;
            background: #fff;
        }

        .smm-stats .stat-card {
            text-align: center;
            padding: 40px 20px;
            border: 1px solid #eee;
            border-radius: 8px;
            transition: all 0.3s ease;
            background: #fff;
        }

        .smm-stats .stat-card:hover {
            border-color: var(--tp-red);
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.08);
        }

        .smm-stats .stat-card h5 {
            text-transform: uppercase;
            font-size: 14px;
            font-weight: 600;
            color: #666;
            margin-bottom: 15px;
            letter-spacing: 1px;
        }

        .smm-stats .stat-card span {
            font-weight: 700;
            font-size: 48px;
            line-height: 1.0;
            color: var(--tp-red);
            display: block;
        }

        /* ====================== INTRO SECTION ====================== */
        .smm-intro {
            padding: 60px 0;
            background: #fff;
        }

        .smm-intro h2 {
            font-weight: 700;
            font-size: 42px;
            text-align: center;
            margin-bottom: 30px;
            color: #000;
        }

        .smm-intro p {
            text-align: center;
            color: #666;
            font-size: 18px;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto;
        }

        /* ====================== SERVICE CARDS SECTION ====================== */
        .smm-services {
            padding: 80px 0;
            background: #fff;
        }

        .smm-service-card {
            margin-bottom: 80px;
            position: relative;
        }

        .smm-service-card .img {
            border-radius: 8px;
            overflow: hidden;
        }

        .smm-service-card .img img {
            width: 100%;
            height: auto;
            display: block;
            transition: transform 0.4s ease;
        }

        .smm-service-card:hover .img img {
            transform: scale(1.05);
        }

        .smm-service-card .content {
            display: flex;
            flex-direction: column;
            justify-content: center;
            padding: 0 40px;
        }

        .smm-service-card .title {
            font-size: 36px;
            font-weight: 800;
            color: #000;
            margin-bottom: 20px;
            text-transform: capitalize;
        }

        .smm-service-card .des {
            font-size: 17px;
            color: #666;
            line-height: 1.8;
            margin-bottom: 30px;
        }

        .smm-service-card .cta-btn a {
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

        .smm-service-card .cta-btn a:hover {
            background: var(--tp-red);
            border-color: var(--tp-red);
            color: #fff;
        }

        /* ====================== CLIENTS SECTION ====================== */
        .smm-clients {
            padding: 80px 0;
            background: #fff;
        }

        .smm-clients .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .smm-clients .section-title h2 {
            font-size: 56px;
            font-weight: 800;
            color: #000;
            margin-bottom: 10px;
        }

        .smm-clients .section-title .highlight {
            color: var(--tp-red);
        }

        .smm-clients .brand-images .img {
            padding: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 120px;
            transition: transform 0.3s ease;
        }

        .smm-clients .brand-images .img:hover {
            transform: scale(1.1);
        }

        .smm-clients .brand-images .img img {
            max-width: 100%;
            height: auto;
            filter: grayscale(100%);
            opacity: 0.6;
            transition: all 0.3s ease;
        }

        .smm-clients .brand-images .img:hover img {
            filter: grayscale(0%);
            opacity: 1;
        }

        /* ====================== QUOTE SECTION ====================== */
        .smm-quote {
            padding: 100px 0;
            background: #f9f9f9;
            position: relative;
        }

        .smm-quote .quote-container {
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

        .smm-quote .quote-container p {
            margin: 0 0 10px 0;
        }

        .smm-quote .quote-container::before {
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
        .smm-cta {
            padding: 100px 0;
            background: #fff;
        }

        .smm-cta .section-title {
            text-align: center;
            margin-bottom: 40px;
        }

        .smm-cta .section-title h4 {
            font-weight: 400;
            font-size: 38px;
            color: #666;
            margin-bottom: 10px;
        }

        .smm-cta .section-title h2 {
            font-weight: 700;
            font-size: 42px;
            color: #000;
        }

        .smm-cta .description {
            text-align: center;
            color: #666;
            font-size: 18px;
            line-height: 1.8;
            max-width: 900px;
            margin: 0 auto 50px;
        }

        /* ====================== BOTTOM SECTION ====================== */
        .smm-bottom {
            padding: 100px 0;
            background: #000;
        }

        .smm-bottom .sec-title p {
            font-size: 56px;
            font-weight: 300;
            color: #fff;
            margin-bottom: 10px;
        }

        .smm-bottom .sec-title b {
            font-size: 66px;
            font-weight: 800;
            color: #fff;
        }

        .smm-bottom .sec-title b .shape-img {
            width: 78px;
            margin: -80px -16px -32px -10px;
        }

        .smm-bottom .des {
            font-size: 18px;
            color: #ccc;
            line-height: 1.8;
            margin-bottom: 20px;
        }

        .smm-bottom .btn-1 {
            background: var(--tp-red);
            color: #fff;
            padding: 15px 40px;
            border-radius: 4px;
            text-decoration: none;
            display: inline-block;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .smm-bottom .btn-1:hover {
            background: #c91820;
            transform: translateY(-2px);
        }

        /* ====================== RESPONSIVE ====================== */
        @media screen and (max-width: 991px) {
            .smm-hero .content-box .title {
                font-size: 52px;
            }

            .smm-service-card .content {
                padding: 40px 0;
            }

            .smm-service-card {
                margin-bottom: 60px;
            }
        }

        @media screen and (max-width: 575px) {
            .smm-hero .content-box .title {
                font-size: 42px;
            }

            .smm-hero .content-box .des {
                font-size: 16px;
            }

            .smm-stats .stat-card span {
                font-size: 36px;
            }

            .smm-intro h2,
            .smm-clients .section-title h2,
            .smm-cta .section-title h2 {
                font-size: 32px;
            }

            .smm-service-card .title {
                font-size: 28px;
            }

            .smm-quote .quote-container {
                font-size: 22px;
            }

            .smm-quote .quote-container::before {
                font-size: 150px;
                top: -60px;
            }

            .smm-bottom .sec-title p {
                font-size: 38px;
            }

            .smm-bottom .sec-title b {
                font-size: 42px;
            }

            .smm-bottom .sec-title b .shape-img {
                width: 52px;
                margin: -28px -12px 0 -8px;
            }
        }
    </style>
@endsection

@section('content')
<main>
    {{-- ====================== Hero Section ====================== --}}
    <div class="smm-hero">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-lg-7">
                    <div class="content-box">
                        <h1 class="title">Social Media Management</h1>
                        <div class="des">
                            <p>
                                We create the perfect blend of creativity, strategy and engagement to demonstrate your brand's narrative across digital platforms.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sec-img">
                        <img src="{{ config('app.url') }}/assets/img/social-media-marketing.png" alt="Social Media Management">
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Hero Section ====================== --}}
    
    {{-- ====================== Stats Section ====================== --}}
    <div class="smm-stats">
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
    <div class="smm-intro">
        <div class="container">
            <h2>How Does Social Media Management Impact Your Brand?</h2>
            <p>
                We believe in storytelling that would captivate, educate and inspire visuals with impactful messaging. 
                It’s about creating experiences, fostering communities and driving meaningful connections that adapt to the latest trends.
            </p>
        </div>
    </div>
    {{-- ====================== End Intro Section ====================== --}}
    {{-- ====================== Services Section ====================== --}}
    <div class="smm-services">
        <div class="container">
            {{-- Social Media Strategy --}}
            <div class="smm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/social-media-strategy.png" alt="Social Media Strategy">
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="content">
                            <h3 class="title">Social Media Strategy</h3>
                            <div class="des">
                                <p>
                                   Social media strategy is a blueprint that lays the foundation for your success. 
                                   It involves setting clear goals, identifying target audiences and outlining the tactics to achieve desired outcomes.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('work') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Online Reputation Management --}}
            <div class="smm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/online-reputation-management.png" alt="Online Reputation Management">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <h3 class="title">Online Reputation Management</h3>
                            <div class="des">
                                <p>
                                    Online reputation management focuses on monitoring and influencing what people are saying about a brand across social media channels. 
                                    We take proactive measures to enhance positivity, address customer concerns and identify the potential crises.
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('work') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Content Strategy --}}
            <div class="smm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6 order-lg-2">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/content-strategy.jpg" alt="Content Strategy">
                        </div>
                    </div>
                    <div class="col-lg-6 order-lg-1">
                        <div class="content">
                            <h3 class="title">Content Strategy</h3>
                            <div class="des">
                                <p>
                                   Content is the soul of social media which involves creating content that resonates with the target audience. It includes different aspects of social media, 
                                   from informative articles to eye-catching creatives, capturing attention and driving meaningful engagement. 
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('work') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Reel Shoots --}}
            <div class="smm-service-card">
                <div class="row align-items-center">
                    <div class="col-lg-6">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/reel-shoots.png" alt="Reel Shoots">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="content">
                            <h3 class="title">Reel Shoots</h3>
                            <div class="des">
                                <p>
                                After Tiktok got banned, reel shots took over the visual aspect of storytelling in enhancing the content and maximising reach across social media. 
                                It conveys messages, evokes emotions and entertains the audience to act as the most powerful asset. 
                                </p>
                            </div>
                            <div class="cta-btn">
                                <a href="{{ route('work') }}">Explore More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Services Section ====================== --}}
    {{-- ====================== Clients Section ====================== --}}
    <div class="smm-clients">
        <div class="container">
            <div class="section-title">
                <h2>Friends <span class="highlight">On Board</span></h2>
            </div>
            <div class="brand-images">
                <div class="row g-4 justify-content-center">
                    @for ($i = 1; $i <= 20; $i++)
                    <div class="col-6 col-md-4 col-lg-3">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/clients/{{ $i }}.png" alt="Client {{ $i }}">
                        </div>
                    </div>
                    @endfor
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Clients Section ====================== --}}

    {{-- ====================== Quote Section ====================== --}}
    <div class="smm-quote">
        <div class="container">
            <div class="quote-container">
                <p>Good marketing makes the company look smart.</p>
                <p>Great marketing makes the customer feel smart.</p>
            </div>
        </div>
    </div>
    {{-- ====================== End Quote Section ====================== --}}

    {{-- ====================== CTA Section ====================== --}}
    <div class="smm-cta">
        <div class="container">
            <div class="section-title">
                <h4>Innovate. Influence. Inspire</h4>
                <h2>Transforming Ideas into <br>Social Media Success</h2>
            </div>
            <div class="description">
                <p>
                    Social media management makes sure that your brand's presence resonates with millions of people. 
                    We are committed to raising awareness, fostering engagement and advocating for your brand across platforms such as Twitter, Instagram, Facebook and LinkedIn. 
                    Recognizing that each platform is unique, we come up with strategies to make the best use of their distinct algorithms and formats.
                </p>
            </div>
        </div>
    </div>
    {{-- ====================== End CTA Section ====================== --}}

    {{-- ====================== Bottom Section ====================== --}}
    <div class="smm-bottom">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <div class="sec-img">
                        <img src="{{ config('app.url') }}/assets/img/home/home-04.png" alt="Brand Story" style="width: 100%; display: block;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="content-box ps-lg-5">
                        <div class="sec-title">
                            <p>Brand</p>
                            <b>
                                Your St
                                <img src="{{ config('app.url') }}/assets/img/shape-03.png" class="shape-img" alt="shape">
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
                        <div class="link mt-4">
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

    </div>
</main>
@endsection

@section('script')

@endsection