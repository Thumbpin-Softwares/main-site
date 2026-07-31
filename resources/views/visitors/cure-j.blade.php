@extends('layout.visitor', [
    'description' => 'Print and packaging design for Cure J. See the collateral Thumbpin created to bring the brand to life across printed touchpoints.','title' => 'Cure J | Thumbpin', 'footer_black' => 'footer-black'])

@section('head')
<style>
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
    <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-md-12">
                    <div class="content-box">
                        <h1 class="main-content-title">Cure J — Print & Packaging Design</h1>
                        <h2 class="content-title">
                            About The Brand
                        </h2>
                        <p>
                            In this stressful society, negative pressures follow, Cure j provides healing products, which may be healed by fragrance, may be healed by effects, and the unpleasant mood will also improve. It doesn't matter if you are hurt, we should all love ourselves! I hope everyone can find a way to be cured.
                        </p>
                        <p>
                            Taking the warm sunshine as the concept, transforming the form of "fragrance" into daily life, creating a new life experience. Sunlight plays an important role. When it falls on the ground, it can warm your heart, so three main visuals "Warm Sun" are designed. Visually, lines are used to show the divergence of the early sunlight, and it is presented with warm orange colors.
                        </p>
                        <p>
                            Because the epidemic has changed our lives and increased the time for dialogue with ourselves
                        </p>
                        <p>
                            Looking forward to the warm sun, bringing you more beauty
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
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/1.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/2.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/3.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/4.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/5.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/cure-j/6.jpg" alt="img">
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
