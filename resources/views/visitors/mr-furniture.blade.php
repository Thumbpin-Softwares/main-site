@extends('layout.visitor', [
    'description' => 'Print and packaging design for Mr Furniture. A look at the collateral Thumbpin created to carry the brand across retail and print touchpoints.','title' => 'Mr Furniture', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

@section('head')
<style>
    main{
        padding-top: 100px;
    }

    .card-3::after,
    .card-3:hover::after{
        background-image: none;
        background-color: transparent;
    }

    .work-hero-sec.top-sec{
        padding: 150px 0 80px !important;
    }
    .work-hero-sec .content-box .main-content-title{
        text-transform: uppercase;
        font-size: 38px;
        font-weight: 600;
        color: var(--primary-color);
        margin-bottom: 10px;
    }
    .work-hero-sec .content-box .content-title{
        text-transform: capitalize;
        letter-spacing: 2px;
        font-size: 28px;
        font-weight: 600;
        color: var(--primary-color);
        margin-top: 40px;
        margin-bottom: 10px;
    }
    .work-hero-sec .content-box p{
        color: #fff;
    }

    @media screen and (max-width: 991px){
        .work-hero-sec.top-sec{
            padding: 140px 0 50px !important;
        }
    }

    @media screen and (max-width: 767px){
        .work-hero-sec .content-box .content-title{
            margin-top: 25px;
        }
        .work-hero-sec .content-box p{
            text-align: justify;
        }
        .sec-10{
            padding: 40px 0;
        }
    }

    @media screen and (max-width: 575px){
        .work-hero-sec.top-sec{
            padding: 100px 0 40px !important;
        }
    }
</style>
@endsection

@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    {{-- <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-md-12">
                    <div class="content-box">
                        <div class="main-content-title">
                            About the brand
                        </div>
                        <p>
                            Zero Waste is a UAE-based waste recycling company that focuses on cultivating sustainable cities by implementing innovative waste management practices to promote a green future for all coming generations. They set up cost-efficient waste collection & management systems including a number of services involving recycling and at times, destruction to build a healthier, habitable urban civilization.
                        </p>
                        <div class="content-title">
                            Challenge
                        </div>
                        <p>
                            We were tasked with creating a promotional tool that connects directly with Zero Waste’s cause of recycling.
                        </p>
                        <div class="content-title">
                            Solution
                        </div>
                        <p>
                            To conquer this mission, we decided to design a brochure that resembles recycled paper. We turned it brand new to signify how recycled material can be reused & be elegant at the same time. Through the vibrant graphics, we set across a message pronouncing how important it is to protect the one Mother Earth we’ve been gifted with.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">
        <h1 class="portfolio-title">Mr Furniture — Print & Packaging Design</h1>
            <div class="row filter_box">
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/1.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/2.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/3.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/4.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/5.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/6.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/7.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/8.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/9.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/10.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/mr_furniture/11.png" alt="img">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-10 Area ====================== --}}


</main>

@endsection

@section('script')

@endsection
