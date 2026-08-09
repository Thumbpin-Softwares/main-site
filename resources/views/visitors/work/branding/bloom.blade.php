@extends('layout.visitor', [
    'description' => 'Brand identity design for Bloom. See the logo, palette and visual system Thumbpin built for the brand.','title' => 'Bloom', 'footer_black' => 'footer-black'])

@section('head')
<style>
    .card-3::after,
    .card-3:hover::after{
        background-image: none;
        background-color: transparent;
    }

    .work-hero-sec.top-sec{
        /* min-height: auto !important;
        height: auto !important;
        padding: 220px 0 85px !important; */
        /* padding: 200px 0 80px !important; */
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

    /* @media screen and (min-width: 1200px){
        .sec-10 > .container{
            max-width: 860px;
        }
    } */

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
    <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-md-12 d-flex align-items-center">
                    <div class="content-box">
                        <h1 class="main-content-title">Bloom — Brand Identity Design</h1>
                        <h2 class="content-title">
                            About The Brand
                        </h2>
                        <p>
                            In the rush of our everyday life, we often feel suffocated at the end of the day.
                        </p>
                        <p>
                            We are increasingly searching for more healthy habits to calm our minds and find peace. Taking care of your houseplants can be on of these habits.
                        </p>
                        <p>
                            Bloom is the app designed to guide and help you in this journey.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">
            <div class="row filter_box">
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/1.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/2.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/3.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/4.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/5.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/6.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/7.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/8.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/9.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/10.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/11.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/12.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/13.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom/14.jpg" alt="img">
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
