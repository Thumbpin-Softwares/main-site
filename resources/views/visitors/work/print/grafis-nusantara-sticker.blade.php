@extends('layout.visitor', [
    'description' => 'Sticker and packaging design for Grafis Nusantara. A closer look at the print work Thumbpin produced for the brand.','title' => 'Grafis Nusantara Sticker', 'footer_black' => 'footer-black'])

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
                        <h1 class="main-content-title">Grafis Nusantara — Sticker & Packaging Design</h1>
                        <h2 class="content-title">
                            About the brand
                        </h2>
                        <p>
                            Grafis Nusantara is a collective media that archives the cultural context of visual graphics from all around Indonesian archipelago. This zine is the first volume from Grafis Nusantara, featuring a growing collection of local labels and stickers from the 70s-90s.
                        </p>
                        <p>
                            The zine is divided into two collections. The Label Collection consists of five chapters: Textile, Health, Tea, Cigarette, and Food. The Sticker Collection also consists of five chapters: Erotism, Religion, Cartoon, Classic Text, and Pictorial Text.
                        </p>
                        <p>
                            All labels and stickers featured here are from the personal collection of Rakhmat Jaka Perkasa. The zine was designed by Evan Wijaya. It was produced and supported by Kamengski Foundation and printed in a limited run with special pink ink. The zine is accompanied by stickers, postcards, and a poster sealed together in a folder case.
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
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/1.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/2.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/3.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/4.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/5.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/6.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/7.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/8.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/9.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/11.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/12.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/13.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/14.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/15.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/16.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/17.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/print/grafis_nusantara_sticker/video.gif" alt="img">
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
