@extends('layout.visitor', [
    'description' => 'Website design and development for PSB Logistics. See the site Thumbpin designed and built for the logistics brand.','title' => 'PSB Logistics | Thumbpin', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

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
            <img src="{{ config('app.url') }}/assets/img/work/website/psb-logistics-page.jpg" alt="img">
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
