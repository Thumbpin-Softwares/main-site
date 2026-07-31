@extends('layout.visitor', [
    'description' => 'Packaging design for Zagovor Brewery’s Seven Sins range. See how Thumbpin built a distinct label system for the beer line.','title' => '7 Sins | Thumbpin', 'footer_black' => 'footer-black'])

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
                        <h1 class="main-content-title">
                            ZAGOVOR BREWERY – SEVEN SINS
                        </h1>
                        <p>
                            To celebrate their seventh birthday, the one of the most famous independent Russian breweries — Zagovor released a special edition of super juicy triple dry hopped New England Double IPA, called 7 SINS and covered in seven different color labels. The t-shirt and glass merchandise was also designed to be a part of the anniversary release. The label was printed on high-gloss silver paper, and given a silk finish with a matte laminate.
                        </p>
                        <p>
                            Zagovor (rus. Заговор) – means “conspiracy”. It means the whole spirit of current Russian craft beer movement, feeling of exploration and creativity and developing the product that was never done before.
                        </p>
                        <p>
                            You can find beer produced by Zagovor throughout Russia in numerous craft beer bars and bottle shops throughout Russia. Zagovor imports beer and represents Russian beer scene all around the globe in countries such as Germany and Denmark, but also in countries like Korea and Australia.
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
                            <img src="{{ config('app.url') }}/assets/img/work/print/7-sins/1.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/7-sins/2.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/7-sins/3.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/7-sins/4.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/7-sins/5.jpg" alt="img">
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
