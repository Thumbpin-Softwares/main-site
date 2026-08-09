@extends('layout.visitor', [
    'description' => 'Brand identity design for PSB Logistics. The logo and visual identity Thumbpin built for the logistics brand.','title' => 'PSB Logistics', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

@section('head')

@endsection
<style>
    .portfolio-img-box{
        padding-top: 150px;
        padding-bottom: 50px;
    }
    .portfolio-img-box img{
        width: 100%;
    }
    .portfolio-img-box video{
        width: 100%;
    }
    .portfolio-img-box .set-video{
        position: relative;
    }
    .portfolio-img-box .set-video .video,
    .portfolio-img-box .set-video video{
        width: 100%;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        z-index: 1;
        /* display: none; */
    }
    @media screen and (max-width: 575px){
        .portfolio-img-box{
            padding-top: 100px;
            padding-bottom: 30px;
        }
    }
</style>
@section('content')

<main>

    <div class="container">
        <h1 class="portfolio-title">PSB Logistics — Brand Identity Design</h1>
        <div class="portfolio-img-box">
            <div class="set-video">
                <img src="{{ config('app.url') }}/assets/img/work/branding/psb_logistics/1.jpg" alt="img">
            </div>
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
