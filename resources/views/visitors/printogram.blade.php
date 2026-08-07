@extends('layout.visitor', [
    'description' => 'Brand identity design for Printogram. A look at the logo and brand system Thumbpin developed.','title' => 'Printogram', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

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
        <h1 class="portfolio-title">Printogram — Brand Identity Design</h1>
        <div class="portfolio-img-box">
            <div class="set-video">
                <img src="{{ config('app.url') }}/assets/img/work/branding/printogram/1.jpg" alt="img">
                <img src="{{ config('app.url') }}/assets/img/work/branding/printogram/video.gif" alt="img" class="video">
            </div>
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
