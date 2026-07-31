@extends('layout.visitor', ['title' => 'Advertising and Packaging Agency in Gurgaon',
        'description'=>'Leading advertising and packaging agency in Gurgaon offering creative branding, design, and marketing solutions to help businesses stand out and grow.'])

@section('head')

@endsection

@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    <div class="work-hero-sec with-back-img only-main top-sec bg-black">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-md-6">
                    <div class="content-box">
                        <div>
                            <h1 class="title with-img">
                                W<img src="{{ config('app.url') }}/assets/img/shape-06.png" alt="img">rk
                            </h1>
                            <div class="des">
                                <p>
                                    Get your brand recognized by customers in every corner through a proven history of modern advertising. The world’s a stage. Let the show commence.
                                </p>
                            </div>
                        </div>
                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <div class="col-md-6 d-none d-md-block">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <div class="reveal-container" style="position: relative; height: 600px; display: flex; justify-content: center; align-items: center;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <!-- Below Hand (Static) -->
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ config('app.url') }}/assets/img/belowhand.png" alt="hand" class="below-hand" style="position: absolute; bottom: 0; left: 64%; transform: translateX(-50%); z-index: 1; width: 100%;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <!-- Above Hand (Animated) -->
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            <img src="{{ config('app.url') }}/assets/img/abovehand.png" alt="hand" class="above-hand" style="position: absolute; top: 92px; left: 60%; transform: translateX(-50%); z-index: 3; width: 70%;">
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </div>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <style>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        @keyframes revealUp {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            0% { top: 40px; } /* Start lower */
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            100% { top: -40px; } /* Move up higher */
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        .above-hand {
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                            animation: revealUp 2s linear forwards;
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    </style>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">
            <ul class="filter_nav">
                <li>
                    <button type="button" data-filter="*" class="active">All</button>
                </li>
                <li>
                    <button type="button" data-filter=".digital">Digital</button>
                </li>
                <li>
                    <button type="button" data-filter=".print">Print</button>
                </li>
                <li>
                    <button type="button" data-filter=".branding">Branding</button>
                </li>
                <li>
                    <button type="button" data-filter=".website">Website</button>
                </li>
                <li>
                    <button type="button" data-filter=".film">Film & Videos</button>
                </li>
                <li>
                    <button type="button" data-filter=".awards">Awards</button>
                </li>
            </ul>
            <div class="row filter_box">
                <div class="col-sm-6 digital">
                    <a href="{{ route('digital') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                digital
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-01.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 print">
                    <a href="{{ route('print') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                print
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-02.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 branding">
                    <a href="{{ route('branding') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                branding
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-03.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 website">
                    <a href="{{ route('website') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-04.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 film">
                    <a href="{{ route('film') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                film
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-05.png" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 awards">
                    <a href="{{ route('awards') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                awards
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/work-06.png" alt="img">
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-10 Area ====================== --}}

    {{-- ====================== Sec-3 Area ====================== --}}
    <div class="sec-3 bg-black">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="sec-img-1">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/service-01.png" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="content-box">
                        <div class="sec-title">
                            <p>Brand</p>
                            <b>
                                Your St
                                <img src="{{ config('app.url') }}/assets/img/shape-03.png" alt="img">
                                ry
                            </b>
                        </div>
                        <div class="des">
                            <p>
                                We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <a href="{{ route('contact') }}" class="btn-1">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-3 Area ====================== --}}

</main>

@endsection

@section('script')

<!-- iso-Tope Filter -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" integrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

<script>

    // Set Filteration  Function ======================

    var filter_navs = $('.sec-10 .filter_nav li button[data-filter]');

    var filter_box = $('.sec-10 .filter_box');

    var $filter = $(filter_box).isotope({
        getSortData: {
            category: '[data-category]',
        },
    });

    $filter.imagesLoaded().progress( function() {
        $filter.isotope('layout');
    });

    $(filter_navs).click(function () {

        $('.sec-10 .filter_nav li button').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');

        var filter_Mode = 'sortBy'; // sortBy | filter

        if(filter_Mode == 'sortBy'){

            $(filter_box).find(' > div').removeAttr('data-category');

            var categories = 'original-order';  // original-order | random

            if(selector != '*'){
                $(filter_box).find(' > div').attr({'data-category' : 'second'});
                categories = $(filter_box).find(selector);
                $(categories).attr({'data-category' : 'first'});
                selector = 'category';
            }else{
                selector = categories;
            };

            $filter.isotope(
                'updateSortData', $(filter_box).find(' > div')
            );

        };

        $filter.isotope({
            sortBy: selector,
        });

        return false;

    });

</script>

@endsection
