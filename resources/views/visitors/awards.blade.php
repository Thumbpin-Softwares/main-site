@extends('layout.visitor', [
    'description' => 'Award-winning creative work by Thumbpin. A look at the campaigns and design that have earned recognition for our clients.','title' => 'Awards | Thumbpin', 'footer_black' => 'footer-black'])

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
                            Awards
                        </h1>
                        <div class="des">
                            <p>
                                The world is huge and constantly running. Competition, race, and the finish line is all we see. The biggest award amidst this chaos is the connection we can make through a single creative. View our collection below, and be your own judge.
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
                    <button type="button" data-filter=".awards">Awards</button>
                </li>
            </ul>
            <div class="row filter_box">
                <div class="col-sm-6 awards">
                    <a href="{{ route('award-page-01') }}" class="card-3">
                        <div class="card-content">
                            <div class="name">
                                Awards
                            </div>
                            <img src="{{ config('app.url') }}/assets/img/work/awards/award-01.jpg" alt="img">
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
