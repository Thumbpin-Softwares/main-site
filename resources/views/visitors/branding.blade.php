@extends('layout.visitor', [
    'description' => 'Brand identity work by Thumbpin. We build identities that resonate with your customers and scale across every demographic you want to reach.','title' => 'Branding', 'footer_black' => 'footer-black'])

@section('head')

@endsection

@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-md-6">
                    <div class="content-box">
                        <h1 class="title with-img">
                            Branding
                        </h1>
                        <div class="des">
                            <p>
                                We create a unique brand identity for you that resonates, reflects, and relates to your consumers and grows your brand across all desired demographics.
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6 d-none d-lg-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/work-sec.png" alt="img">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="back-img">
            <div class="img">
                <img src="{{ config('app.url') }}/assets/img/work-sec-2.png" alt="img">
            </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">
            <ul class="filter_nav">
                <li>
                    <button type="button" class="active" onclick="window.open('{{ route('work') }}','_self')">All</button>
                </li>
                <li>
                    <button type="button" data-filter=".mr_furniture">Mr Furniture</button>
                </li>
                <li>
                    <button type="button" data-filter=".tobako_house">Tobako House</button>
                </li>
                <li>
                    <button type="button" data-filter=".bloom">Bloom</button>
                </li>
                <li>
                    <button type="button" data-filter=".kobo">Kobo</button>
                </li>
                <li>
                    <button type="button" data-filter=".printogram">Printogram</button>
                </li>
                <li>
                    <button type="button" data-filter=".psb_logistics">PSB Logistics</button>
                </li>
            </ul>
            <div class="row filter_box">
                <div class="col-sm-6 mr_furniture">
                    <a href="{{ route('mr_furniture') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Mr Furniture
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/mr_furniture.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 tobako_house">
                    <a href="{{ route('tobako_house') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Tobako House
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/tobako_house.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 bloom">
                    <a href="{{ route('bloom') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Bloom
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/bloom.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 kobo">
                    <a href="{{ route('kobo') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Kobo
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/kobo.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 printogram">
                    <a href="{{ route('printogram') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Printogram
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/printogram.jpg" alt="img">
                        </div>
                    </a>
                </div>
                <div class="col-sm-6 psb_logistics">
                    <a href="{{ route('psb_logistics') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                PSB Logistics
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/branding/psb_logistics.jpg" alt="img">
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
