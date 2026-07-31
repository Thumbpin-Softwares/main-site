@extends('layout.visitor', [
    'description' => 'A closer look at one of Thumbpin’s award-winning campaigns — the brief, the challenge and the creative solution behind it.','title' => 'Award | Thumbpin', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

@section('head')

@endsection
<style>
    .portfolio-img-box{
        padding: 60px 0;
    }
    .portfolio-img-box img{
        width: 100%;
    }
    @media screen and (max-width: 767px){
        .portfolio-img-box{
            padding: 40px 0;
        }
    }

    .work-hero-sec.top-sec{
        padding: 140px 0 60px !important;
    }
    .work-hero-sec .content-box .main-content-title{
        text-transform: capitalize;
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

    @media screen and (max-width: 767px){
        .work-hero-sec .content-box .main-content-title{
            font-size: 32px;
        }
        .work-hero-sec .content-box .content-title{
            font-size: 22px;
            margin-top: 25px;
        }
        .work-hero-sec .content-box p{
            text-align: justify;
            font-size: 15px;
        }
    }

    @media screen and (max-width: 575px){
        .work-hero-sec.top-sec{
            padding: 92px 0 40px !important;
        }
    }
</style>
@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="content-box">
                        <h1 class="main-content-title">Thumbpin — Award-Winning Campaign Work</h1>
                        <h2 class="content-title">
                            Brief:
                        </h2>
                        <p>
                            Times Groups’ 4th edition of Print of Power had centered around “The Mask” in light of the Covid-19 pandemic. The objective was to shift the mentality from “I need to protect myself with a mask” to “I need to protect the world with my mask.”
                        </p>
                        <div class="content-title">
                            Challenge:
                        </div>
                        <p>
                            We were tasked to create a campaign that highlights the importance of masks during Covid-19. The campaign’s purpose was to encourage people to keep their masks on.
                        </p>
                        <div class="content-title">
                            Solution:
                        </div>
                        <p>
                            Our creatives featured the Nazi leader - Adolf Hitler, Former President of the Soviet Union - Joseph Stalin, and the former military dictator & President of Uganda - Idi Amin, all wearing a mask with a copy that warns against a mass massacre. Signifying the importance of keeping a mask on at all times.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    <div class="container">
        <div class="portfolio-img-box">
            <img src="{{ config('app.url') }}/assets/img/work/awards/award-page-01.jpg" alt="award-page-01">
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
