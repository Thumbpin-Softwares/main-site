@extends('layout.visitor', [
    'title' => 'Our Work | Branding, Websites, Films & Campaigns in Gurgaon',
    'description' => 'Portfolio of work by Thumbpin, a creative agency in Gurgaon — brand identities, packaging and print, websites and applications, films and video, digital campaigns and award-winning projects.',
    'keywords' => 'creative agency portfolio gurgaon, branding portfolio india, brand identity case studies, packaging design portfolio gurgaon, print design work india, website design portfolio gurgaon, web development case studies, film production portfolio india, corporate video work gurgaon, digital marketing case studies, social media campaign examples, advertising campaign portfolio india, logo design portfolio gurgaon, brochure design work, real estate video ad examples, event activation case studies, ad agency work samples gurugram, best creative agency work delhi ncr, award winning design agency india',
])

@section('head')
{{--
    Structured data for the portfolio hub. Built as one @graph so the entities are
    linked by @id rather than floating free: CollectionPage -> about -> Organization,
    and an ItemList mirroring the six category cards below. The list is the machine
    -readable statement of the hub -> category relationship, which is what lets this
    page pass authority down to /work/branding, /work/film and the rest.

    Organization @id matches /services, /about and every service page, so all of
    them describe the same entity instead of several unrelated ones.
--}}
@php
$workUrl = config('app.url') . '/work';
$orgId   = config('app.url') . '/#organization';

// label => [route, what the category actually contains -- the description is what
// gives each entry crawlable meaning; the card itself is a one-word image link.
$categories = [
    'Digital'  => ['digital',  'Digital campaigns, social media creative and online advertising work.'],
    'Print'    => ['print',    'Packaging, brochures, publications and print advertising design.'],
    'Branding' => ['branding', 'Brand identities, logo systems, naming and brand guideline projects.'],
    'Website'  => ['website',  'Website design and development work, from brand sites to web applications.'],
    'Film'     => ['film',     'Film and video production — commercials, corporate films and brand stories.'],
    'Awards'   => ['awards',   'Award-winning campaigns and recognised creative work.'],
];

$items    = [];
$position = 1;
foreach ($categories as $name => [$route, $desc]) {
    $items[] = [
        '@type'    => 'ListItem',
        'position' => $position++,
        'item'     => [
            '@type'       => 'CollectionPage',
            'name'        => $name . ' Work',
            'url'         => route($route),
            'description' => $desc,
        ],
    ];
}

$workSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'Organization',
            '@id'   => $orgId,
            'name'  => 'Thumbpin',
            'url'   => config('app.url') . '/',
        ],
        [
            '@type'       => 'CollectionPage',
            '@id'         => $workUrl . '/#webpage',
            'url'         => $workUrl,
            'name'        => 'Our Work | Branding, Websites, Films & Campaigns in Gurgaon',
            'description' => 'Portfolio of work by Thumbpin, a creative agency in Gurgaon — brand identities, packaging and print, websites and applications, films and video, digital campaigns and award-winning projects.',
            'inLanguage'  => 'en-IN',
            'about'       => ['@id' => $orgId],
            'breadcrumb'  => ['@id' => $workUrl . '/#breadcrumb'],
            'mainEntity'  => ['@id' => $workUrl . '/#worklist'],
        ],
        [
            '@type'           => 'ItemList',
            '@id'             => $workUrl . '/#worklist',
            'name'            => 'Work by Thumbpin',
            'itemListElement' => $items,
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $workUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home', 'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Work', 'item' => $workUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($workSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    <div class="work-hero-sec with-back-img only-main top-sec bg-black">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                {{-- Left column rebuilt to match the /services hero: eyebrow label,
                     oversized two-line headline with the second line in red, and the
                     copy sitting behind a left accent bar.

                     The `title` class is kept for its inherited colour and weight, but
                     the inline style overrides .work-hero-sec .content-box .title.with-img
                     (98px, letter-spacing 5px) -- `with-img` is dropped along with the
                     shape-06 glyph that used to sit inside the word "Work".

                     Breakpoint is 767px here, not the 991px used on /services: the
                     visual beside this is d-none d-md-block, so the text is only ever
                     on its own below 768px and that is the only width worth centring. --}}
                <div class="col-md-6">
                    <div class="content-box max-[767px]:text-center">
                        <span class="block mb-5 font-body text-[14px] font-bold uppercase tracking-[3px] text-tp-red">
                            selected work
                        </span>

                        <h1 class="title max-[991px]:!text-[56px] max-[767px]:!text-[40px]"
                            style="font-size: 80px; line-height: 0.9; font-weight: 800; color: #fff; letter-spacing: -2px; margin-bottom: 30px;">
                            THE WORK <br>
                            <span class="text-red">SPEAKS</span>
                        </h1>

                        {{-- "border-solid" is required: css/shared.css is built without
                             preflight, so a border width on its own renders nothing.
                             Centred text and a left accent bar do not mix, so below
                             768px the bar and its indent are dropped. --}}
                        <div class="max-w-[90%] border-l-4 border-r-0 border-t-0 border-b-0 border-solid border-tp-red pl-[25px] max-[767px]:mx-auto max-[767px]:max-w-full max-[767px]:border-l-0 max-[767px]:pl-0">
                            <p class="m-0 text-base leading-[1.6] text-neutral-400 max-[767px]:text-[17px]">
                                Branding, campaigns, films and packaging built from the first sketch
                                to the final cut. The world&rsquo;s a stage &mdash; this is what we
                                have put on it.
                            </p>
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
        </style>                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- Visible breadcrumb, mirroring the BreadcrumbList schema in @section('head').
         Shipping that schema with nothing on the page is a mismatch -- this is the
         visible half. --}}
    @include('inc.breadcrumb', ['trail' => [
        ['Home', route('home')],
        ['Work', null],
    ]])

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">

            {{-- The six category cards below are a one-word label over an image, so
                 this page carried almost no crawlable text describing what the
                 portfolio actually contains. This block names the disciplines in
                 prose and links each one, which is also what tells a search engine
                 the hub covers every service rather than only "advertising". --}}
            <div class="mb-12 max-w-[760px] max-[991px]:mb-10">
                <h2 class="m-0 mb-4 font-body text-[28px] font-extrabold leading-[1.25] tracking-[-0.5px] text-black max-[767px]:text-[23px]">
                    Work across every discipline we practise
                </h2>
                <p class="m-0 font-body text-[16px] leading-[1.75] text-neutral-600 max-[767px]:text-[15px]">
                    Brand identities and logo systems, packaging and print, websites and
                    applications, films and commercials, and the digital campaigns that carry
                    them. Some projects run through one of these; the ones we are proudest of
                    ran through most. Filter by
                    <a href="{{ route('branding') }}" class="font-semibold text-tp-red no-underline hover:underline">branding</a>,
                    <a href="{{ route('print') }}" class="font-semibold text-tp-red no-underline hover:underline">print</a>,
                    <a href="{{ route('website') }}" class="font-semibold text-tp-red no-underline hover:underline">website</a>,
                    <a href="{{ route('film') }}" class="font-semibold text-tp-red no-underline hover:underline">film</a>,
                    <a href="{{ route('digital') }}" class="font-semibold text-tp-red no-underline hover:underline">digital</a>
                    or
                    <a href="{{ route('awards') }}" class="font-semibold text-tp-red no-underline hover:underline">awards</a>
                    to see a category on its own.
                </p>
            </div>

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
