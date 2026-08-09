@extends('layout.visitor', [
    'description' => 'Website design and development for PSB Logistics. See the site Thumbpin designed and built for the logistics brand.','title' => 'PSB Logistics', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

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
        <h1 class="portfolio-title">PSB Logistics — Website Design & Development</h1>
        <div class="portfolio-img-box">
            {{-- psb-logistics-page.jpg was never on disk, so this rendered a broken
                 image. Falls back to the square mockup, which is the only PSB asset
                 we have; swap in a real full-page capture when one exists. --}}
            <img src="{{ config('app.url') }}/assets/img/work/website/opt/psb-logistics-page.webp"
                 alt="PSB Logistics website designed and built by Thumbpin"
                 loading="lazy" decoding="async">
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
