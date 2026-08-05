@extends('layout.visitor', [
    'title' => 'Best SEO Service Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="stylesheet" href="{{ config('app.url') }}/assets/css/new-home-page.css">
    <style>
        .sec-1 .sec-img-2 img {
            width: 48%;
        }

        .our-work-sec {
            padding-top: 0px
        }

        .sec-1 .content-box .highlight-text {
            margin-top: 40px;
        }

        .sec-1 {
            padding-bottom: 0px;
        }

        .sec-2 {
            padding: 80px 0px;
        }

        .sec-3 .sec-title p {
            font-size: 56px;
        }

        .sec-3 .sec-title b {
            font-size: 66px;
        }

        .sec-3 .sec-title b img {
            width: 78px;
            margin: -80px -16px -32px -10px;
        }
        
        .sec-new {
           font-family: sans-serif !important;
        }
        .sec-new .container{
            max-width: 1000px;
        }
        .sec-new .sec-2 {
            padding: 0px 0;
        }
        .sec-new .sec-3 {
            padding: 0px 0px 100px;
        }
        .sec-new .about-hero-sec .content-box .des {
    font-family: sans-serif;
    font-weight: 100;
    font-size: 18px;
    color: #fff;
    letter-spacing: 0.2px;
}
        .about-exp  {
            margin: 20px 0px;
        }
        .about-exp .blog-card {
            text-align: center;
        }
        .about-exp .blog-card h5{
            text-transform: uppercase;
        }
        .about-exp .blog-card span{
            font-weight: 400;
    font-size: 32px;
    line-height: 1.0;
    color: #eb1c24;
    margin-bottom: 8px;
        }
        .our-work-sec-title{
            margin: 30px 0px;
        }
        .our-work-sec-title h4, h2{
           font-weight: 600;
    font-size: 42px;
    /*margin-bottom: 20px; */
    text-align:center;
        }
        .our-work-sec-title p{
            margin-bottom: 5px; 
            text-align:center;
            color: #999999;
            font-size:25px;
        }
        .sec-new .our-work-sec{
            background-color: #ffffff;
        }
        .sec-new .our-work-sec .mkt-box{
    display: flex;
    flex-direction: column;
    justify-content: center;
        }
        .sec-new .our-work-sec .case-study-box .des {
    font-size: 18px;
    color: #999999;
}
        .sec-new .our-work-sec .case-study-box .c-pl {
    padding-left: 30px;
}
        .sec-new .our-work-sec .case-study-box .c-pr {
    padding-right: 30px;
}
        .sec-new .our-work-sec .case-study-box .title {
    text-transform: capitalize;
    font-size: 38px;
    color: #101010;
    margin-bottom: 25px;
}
        .sec-new .our-work-sec .cta-btn a {
    color: #101010;
}
        .sec-new .our-work-sec .explore-btn a {
    text-decoration: none;
    font-size: 34px;
    color: #101010;
}
.impact-sec{ 
    margin: 90px 0px;
    
}

.impact-title{
    text-align:center;
        }
.impact-title h4{
           font-weight: 400;
    font-size: 42px;
    text-align:center;
    margin-bottom:0px;
        }
.impact-title span{
           font-weight: 600;
    font-size: 42px;
    text-align:center;
        }
        .impact-sec p{
            margin-bottom: 5px; 
            text-align:center;
            color: #999999;
            font-size:25px;
        }
        .impact-sec .load-btn {
              text-align: center;
              margin-top:50px;
        }
        .impact-sec .load-btn a{
               text-decoration: none;
                font-size: 34px;
                color: #101010;
        }
        .quotes-sec{
            margin-top:50px;
        }
.quote-container {
            position: relative;
    font-family: Arial, sans-serif;
    font-size: 35px;
    font-weight: 500;
    line-height: 1.5;
    color: #000000;
    text-align: center;
    margin: 50px;
        }
.quote-container p{
    margin: 0px;
        }

        .quote-container::before {
                content: '“';
    font-size: 250px;
    color: rgba(255, 182, 193, 0.5);
    position: absolute;
    left: 14%;
    transform: translateX(-50%);
    top: -100px;
    z-index: -1;
        }
        @media screen and (max-width: 575px) {
            .sec-3 .sec-title b img {
                width: 52px;
                margin: -28px -12px 0 -8px;
            }

            .sec-3 .sec-title p {
                font-size: 38px;
                margin-bottom: 5px;
            }

            .sec-3 .sec-title b {
                font-size: 42px;
            }
            .quote-container {
        margin: 0px;
        font-size: 22px;
        }
        .quote-container::before {
    font-size: 190px;
    left: 14%;
    top: -85px;
}
*, ::after, ::before {
    box-sizing: border-box;
}

        @media screen and (min-width: 768px) and (max-width: 1023px) {
            .quote-container {
        margin: 0px;
        }
        .quote-container::before {
    left: 5%;
    top: -100px;
}
        }
    </style>
@endsection

@section('content')
<main>
     {{-- ====================== About-Hero-Sec Area ====================== --}}
     <div class="sec-new">
    <div class="about-hero-sec top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-lg-7">
                    <div class="content-box">
                        <h1 class="title" style="font-family: Arial, sans-serif; text-transform: none;">
                            SEO Service
                        </h1>
                        <div class="des">
                            <p>
                                If you want to distinguish your brand in today’s world with an organic approach, SEO is essential. It enhances your online visibility and discovers potential customers actively searching for your products or services. 
                                This strategic advantage can significantly boost your digital presence and market competitiveness
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/search-engine-optimization.png" alt="search engine optimization Services">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="about-exp">
        <div class="container">
            <div class="row">
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Team Experience</h5>
                                <span>100+</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Audience Reached</h5>
                                <span>1000+</span>
                            </div>
                        </div>
                        <div class="col-sm-12 col-md-4 col-lg-4">
                            <div class="blog-card">
                                <h5>Campaings</h5>
                                <span>10000+</span>
                            </div>
                        </div>

            </div>
        </div>
    </div>
    {{-- ====================== End About-Hero-Sec Area ====================== --}}
    {{-- ====================== Our-Work-Sec-title Area ====================== --}}
    <div class="our-work-sec-title">
            <div class="container">
                    <div class="row">
                        <h2>How does SEO impact your brand?</h2>
                        <!--<h4>How Does SEO Impact -->
                        <!--    Digital Marketing Strategies & Outcomes?</h4>-->
                            <p>Visibility is crucial and SEO is the reason how we are able to decode complex algorithms of search engines to ensure your brand stands out. 
                            While two brands may belong from the same category, they are never identical. That’s where we take part in, using SEO services to elevate your brand.</p>
                    </div>
                </div>
            </div>
    {{-- ====================== End Our-Work-Sec-title Area ====================== --}}
   {{-- ====================== Our-Work-Sec Area ====================== --}}
        <!--<div class="our-work-sec">-->
        <div class="our-work-sec">
            <div class="container">
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/on-page-seo.png" alt="On-Page Seo service">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pl mkt-box">
                            <h3 class="title">
                                On-Page SEO
                            </h3>
                            <div class="des">
                                <p>
                                   On-page SEO services optimize individual web pages to rank higher and earn more relevant traffic. We make sure that your website’s loading at a high speed and is user-friendly.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/off-page-seo.jpg" alt="Off-Page SEO">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pr mkt-box">
                           <h3 class="title">
                               Off-Page SEO
                            </h3>
                            <div class="des">
                                <p>
                                    Off-page SEO focuses on activities outside of 
                                    your website to improve its search engine rankings. The goal is to boost your website's authority and credibility, driving more traffic and improving rankings.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/technical-seo.png" alt="Technical SEO Services">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pl mkt-box">
                            <h3 class="title">
                                Technical SEO
                            </h3>
                            <div class="des">
                                <p>
                                   Technical SEO involves optimising your website's infrastructure to make it easier for search engines to crawl and index your site. 
                                   We ensure your website is fast, secure and easily accessible to search engines. 
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="case-study-box">
                    <div class="row">
                        <div class="col-lg-6 order-lg-1">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/local-seo.png" alt="Local SEO Services">
                            </div>
                        </div>
                        <div class="col-lg-6 c-pr mkt-box">
                            <h3 class="title">
                               Local SEO
                            </h3>
                            <div class="des">
                                <p>
                                    Local SEO is crucial for businesses that serve specific geographic areas. 
                                    It helps you attract local customers who are searching for your products or services. We help you dominate local search results to bring more loyal customers for your business.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="explore-btn">
                    <a href="{{ route('work') }}">
                        <span>
                            Explore More
                        </span>
                        {{-- <i class="fal fa-long-arrow-right"></i> --}}
                        <i class="far fa-long-arrow-alt-right"></i>
                    </a>
                </div>
            </div>
        </div>
        {{-- ====================== End Our-Work-Sec Area ====================== --}}
     {{-- ====================== Sec-2 Area ====================== --}}
        <div class="sec-2">
            <div class="container">
                <div class="sec-title">
                    <div class="title">
                        <b>Friends</b>
                        <p>
                            On B
                            <img src="{{ config('app.url') }}/assets/img/shape-01.png" alt="img">
                            ard
                        </p>
                    </div>
                    {{-- <div class="img">
                    <img src="{{ config('app.url') }}/assets/img/home/home-03.png" alt="img">
                </div> --}}
                </div>
                <div class="brand-images">
                    <div class="row">
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/1.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/2.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/3.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/4.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/5.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/6.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/7.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/8.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/9.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/10.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/11.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/12.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/13.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/14.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/15.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/16.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/17.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/18.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/19.png" alt="img">
                            </div>
                        </div>
                        <div class="col-6 col-md-4 col-lg-3">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/clients/20.png" alt="img">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- ====================== End Sec-2 Area ====================== --}}
          {{-- ====================== Impact-Sec Area ====================== --}}
    <div class="impact-sec">
            <div class="container">
                    <div class="row">
                        <div class="impact-title">
                            <h4>How Does SEO Impact </h4>
                            <span>Digital Marketing Strategies & Outcomes?</span>
                        </div>
                            <p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh 
                                euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad 
                                minim veniam, quis nostrud exerci tation</p>
                    </div>
                </div>
            </div>
    {{-- ====================== End Impact-Sec Area Area ====================== --}}
         {{-- ====================== Start-Project-Sec Area ====================== --}}
        <div class="start-project-sec">
            <div class="container">
                <div class="heading-sec">
                    <span>Start A Project</span>
                </div>
                <div class="form">
                    <form action="{{ route('project-form') }}" method="post">
                        @csrf
                        <input type="hidden" name="url" value="{{ Request::url() }}">
                        <div class="row">
                            <div class="col-md-6 pe-md-4">
                                <div class="input-field">
                                    <input type="text" name="name" placeholder="Your Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="input-field">
                                    <input type="text" name="company_name" placeholder="Company Name" required>
                                </div>
                            </div>
                            <div class="col-md-6 pe-md-4">
                                <div class="input-field">
                                    <input type="email" name="email" placeholder="Email Address" required>
                                </div>
                            </div>
                            <div class="col-md-6 ps-md-4">
                                <div class="input-field">
                                    <input type="number" name="mobile" placeholder="Contact Number" required>
                                </div>
                                @error('mobile')
                                    <div class="alert alert-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="col-md-12">
                                <div class="input-field">
                                    <input type="text" name="requirement" placeholder="Requirement" required>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="form-btn">
                                    <span>Send</span> <i class="fal fa-long-arrow-right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{-- ====================== End Start-Project-Sec Area ====================== --}}
        {{-- ======================  Quotes-Sec Area ====================== --}}
        <div class="quotes-sec">
            <div class="container">
                <div class="row">
                    <div class="quote-container">
                    <p>Good marketing makes the company look smart.</p>
                    <p>Great marketing makes the customer feel smart</p>
    </div>
                </div>
            </div>
            
        </div>
        {{-- ====================== End Quotes-Sec Area ====================== --}}
        
 {{-- ====================== Impact-Sec Area ====================== --}}
    <div class="impact-sec">
            <div class="container">
                    <div class="row">
                        <div class="impact-title">
                            <h4>The Art of Data-Driven Insights to Tell Your Story </h4>
                            <span>Best Advanced SEO Services in Gurgaon</span>
                        </div>
                            <p>As a leading Search Engine Optimisation Company, we specialise in increasing your website traffic and improving your online presence. From increased website traffic to higher conversion rates, every improvement is a win for Thumpin and our clients.
                            We celebrate these victories, big and small, as it ranks your website higher on search engine results pages (SERPs), driving more organic traffic and boosting your revenue.</p>
                    <div class="load-btn">
                    <a href="#">
                        <span>
                            Load More
                        </span>
                        {{-- <i class="fal fa-long-arrow-right"></i> --}}
                        <i class="far fa-long-arrow-alt-right"></i>
                    </a>
                </div>
                    </div>
                </div>
            </div>
    {{-- ====================== End Impact-Sec Area Area ====================== --}}
        {{-- ====================== Sec-3 Area ====================== --}}
        <div class="sec-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="sec-img-1">
                            <div class="img">
                                <img src="{{ config('app.url') }}/assets/img/home/home-04.png" alt="img">
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-7">
                        <div class="content-box">
                            <div class="sec-title">
                                <p>Brand</p>
                                <b>
                                    Your St
                                    <img src="{{ config('app.url') }}/assets/img/shape-03.png" alt="img">
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
        {{-- ====================== End Sec-3 Area ====================== --}}

    </div>
</main>
@endsection

@section('script')

@endsection