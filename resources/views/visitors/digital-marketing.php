@extends('layout.visitor', [
    'title' => 'Social Media Agency in Gurgaon',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.'
])

@section('head')

@endsection

@section('content')
<main>
    {{-- ====================== About-Hero-Sec Area ====================== --}}
    <div class="about-hero-sec top-sec bg-black">
        <div class="container h-100-only">
            <div class="row h-100-only">
                <div class="col-lg-7">
                    <div class="content-box">
                        <div class="title">
                            About Us
                        </div>
                        <div class="des">
                            <p>
                                Our team of creative writers, designers, planners, strategists, and tech professionals together houses diverse marketing solutions for your brand.
                            </p>
                            <p>
                                As an independent advertising agency, we are on a mission to transform the way brands and consumers connect through creative content & designs focused on insights, proven analysis, focused strategies, and accessible storytelling mediums.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/about-sec.png" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End About-Hero-Sec Area ====================== --}}
</main>
@endsection

@section('script')

@endsection