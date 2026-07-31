@extends('layout.visitor', [
    'description' => 'Brand identity design for Tobako House. See the logo and visual identity Thumbpin created for the brand.','title' => 'Tobako House | Thumbpin', 'header_black' => 'bg-black', 'footer_black' => 'footer-black'])

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
        <h1 class="portfolio-title">Tobako House — Brand Identity Design</h1>
        <div class="portfolio-img-box">
            <img src="{{ config('app.url') }}/assets/img/work/branding/tobako_house/1.jpg" alt="tobako_house">
        </div>
    </div>

</main>

@endsection

@section('script')

@endsection
