@extends('layout.visitor', [
    'description' => 'Brand identity design for Kobo. A look at the logo, visual language and brand system Thumbpin developed.','title' => 'Kobo | Thumbpin', 'footer_black' => 'footer-black'])

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
    .work-hero-sec .content-box a{
        color: var(--primary-color);
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
                            Kobo
                        </h1>
                        <p>
                            Helping Africa’s leader in integrated logistics reach the global market
                        </p>
                        <div class="content-title">
                            Always Moving Forward
                        </div>
                        <p>
                            Kobo is Africa’s innovation leader in integrated logistics solutions and truck brokerage services. They aggregate end-to-end haulage operations to help cargo owners, truck owners, drivers, and cargo recipients achieve an efficient supply chain framework.
                        </p>
                        <p>
                            Through their seamless, simple-to-use, mobile and web applications, Kobo reduces supply chain risks, logistics bottlenecks, and manufacturing waste. They achieve this by giving their drivers real-time visibility and creating an effective value chain for all stakeholders in the supply chain.
                        </p>
                        <p>
                            Ahead of a huge expansion effort, we worked with them to create a sophisticated, modern update to their brand that would align with their global pursuits.
                        </p>
                        <div class="content-title">
                            Collaborators:
                        </div>
                        <p>
                            We worked alongside London-based <a href="https://wimbart.com/" target="_blank">Wimbart</a> and <a href="https://www.heistpr.com/" target="_blank">Heist</a> to bring this brand to life.
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
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/1.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/2.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/3.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/4.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/5.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/6.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/7.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/8.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/9.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/video.gif" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/11.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/12.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/13.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/14.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/15.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/16.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/17.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/18.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/19.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/20.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/21.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-12">
                    <a class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo/22.jpg" alt="img">
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
