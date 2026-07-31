@extends('layout.visitor', [
    'description' => 'Brand identity design for Mr Furniture. The logo, palette and visual system Thumbpin built for the furniture brand.','title' => 'Mr Furniture | Thumbpin', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

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
        width: 84%;
        position: absolute;
        top: 24.76%;
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
        <h1 class="portfolio-title">Mr Furniture — Brand Identity Design</h1>
        <div class="portfolio-img-box">
            <div class="set-video">
                <img src="{{ config('app.url') }}/assets/img/work/branding/mr_furniture/1.jpg" alt="mr_furniture">
                <img src="{{ config('app.url') }}/assets/img/work/branding/mr_furniture/video.gif" alt="mr_furniture" class="video">
                {{-- <video src="{{ config('app.url') }}/assets/img/work/branding/mr_furniture_page.mp4" controls loop></video> --}}
            </div>
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
