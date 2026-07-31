@extends('layout.visitor', [
    'title' => 'Creative Agency Services in Gurgaon & Gurugram | Thumbpin',
    'description' => 'Branding, digital marketing, SEO, web design, video production and performance marketing from Thumbpin, a creative agency in Gurgaon and Gurugram.',
    'image' => config('app.url') . '/img/og/services.png',
    'image_alt' => 'Thumbpin creative agency services in Gurgaon and Gurugram',
    'keywords' => 'Thumbpin services, branding agency Gurgaon, branding agency Gurugram, advertising agency Gurgaon, advertising agency Gurugram, digital marketing agency Gurgaon, digital marketing agency Gurugram, creative agency Gurgaon, creative agency Gurugram, social media marketing Gurgaon, social media marketing Gurugram, web design agency Gurgaon, web design agency Gurugram, website development Gurgaon, website development Gurugram, video production agency Gurgaon, video production agency Gurugram, event marketing agency Gurgaon, event marketing agency Gurugram, real estate marketing agency Gurgaon, real estate advertising agency Gurgaon'
])

@section('head')
{{--
    Structured data. Built as one @graph so the entities are linked by @id rather
    than floating free: CollectionPage -> about -> Organization, and an ItemList of
    Service entries that mirrors the cards below. The Service urls double as a
    machine-readable statement of the hub -> service-page relationship.

    Organization @id matches the one on /about, so both pages describe the same
    entity instead of two unrelated ones.
--}}
@php
$servicesUrl  = config('app.url') . '/services';
$orgId        = config('app.url') . '/#organization';
$breadcrumbId = $servicesUrl . '/#breadcrumb';

// name => route (null where no dedicated page exists yet)
$serviceEntries = [
    'Branding'               => null,
    'Strategy'               => null,
    'Digital Marketing'      => 'digital-marketing',
    'Real Estate Video Ads'  => 'real-estate-ads',
    'Web Design'             => 'web-design-agency',
    'SEO Services'           => 'search-engine-optimization-seo-services',
    'Social Media Marketing' => 'social-media-marketing-agency',
    'Performance Marketing'  => 'performance-marketing-agency',
];

$itemList = [];
$position = 1;
foreach ($serviceEntries as $name => $route) {
    $service = [
        '@type'       => 'Service',
        'name'        => $name,
        'serviceType' => $name,
        'provider'    => ['@id' => $orgId],
        'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
    ];
    if ($route) {
        $service['url'] = route($route);
    }
    $itemList[] = ['@type' => 'ListItem', 'position' => $position++, 'item' => $service];
}

$schema = [
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
            '@id'         => $servicesUrl . '/#webpage',
            'url'         => $servicesUrl,
            'name'        => 'Creative Agency Services in Gurgaon & Gurugram | Thumbpin',
            'description' => 'Branding, digital marketing, SEO, web design, video production and performance marketing from Thumbpin, a creative agency in Gurgaon and Gurugram.',
            'inLanguage'  => 'en-IN',
            'about'       => ['@id' => $orgId],
            'breadcrumb'  => ['@id' => $breadcrumbId],
            'mainEntity'  => ['@id' => $servicesUrl . '/#servicelist'],
        ],
        [
            '@type'           => 'ItemList',
            '@id'             => $servicesUrl . '/#servicelist',
            'name'            => 'Services offered by Thumbpin',
            'itemListElement' => $itemList,
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $breadcrumbId,
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services', 'item' => $servicesUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
@endsection

@section('content')

<main>

    {{-- ====================== Service-Hero-Sec Area (Three.js Revamp) ====================== --}}
    {{--
        Mobile layout notes:
        * .top-sec forces `padding-top: 0 !important` and <header> is absolutely
          positioned over the page, so the headline collided with the navbar.
          Hence !pt-[110px] -- the ! is required to beat that !important.
        * h-90-only is not defined in any stylesheet, so the container had no
          height and `align-items-center` had nothing to centre within, dropping
          the text to the top. Below 992px the section itself becomes the flex
          container that does the centring.
        Both overrides are max-[991px] only; desktop is untouched.
    --}}
    <div class="service-hero-sec top-sec bg-black max-[991px]:flex max-[991px]:items-center max-[991px]:!pt-[110px] max-[991px]:pb-[60px]" style="position: relative; overflow: hidden;">
        <div class="container h-90-only max-[991px]:w-full">
            <div class="row align-items-center h-90-only">
                <div class="col-lg-6">
                    {{-- Below 992px the Three.js column is hidden by d-none d-lg-block, so
                         the text is on its own and gets centred. text-align inherits, which
                         handles the label, the h1 and the paragraph from this one class. --}}
                    <div class="content-box max-[991px]:text-center">
                        <span class="block mb-5 font-body text-[14px] font-bold uppercase tracking-[3px] text-tp-red">
                        what do we offer
                    </span>
                        <h1 class="title max-[991px]:!text-[56px] max-[767px]:!text-[40px]" style="font-size: 80px; line-height: 0.9; font-weight: 800; color: #fff; letter-spacing: -2px; margin-bottom: 30px;">
                            WE ARE <br>
                            <span class="text-red">BEST AT</span>
                        </h1>
                        {{-- "border-solid" (not border-l-solid -- Tailwind has no per-side
                             style utility) is required here: css/shared.css is built without
                             preflight, which is what normally applies border-style globally,
                             so a width on its own renders nothing.

                             Centred text and a left accent bar do not mix, so below 992px the
                             border and its indent are dropped and the block is centred. --}}
                        <div class="max-w-[90%] border-l-4 border-r-0 border-t-0 border-b-0 border-solid border-tp-red pl-[25px] max-[991px]:mx-auto max-[991px]:max-w-full max-[991px]:border-l-0 max-[991px]:pl-0">
                        <p class="m-0 text-base leading-[1.6] text-neutral-400 max-[767px]:text-[17px]">
                                Creating unique business identities under our roof with integrated marketing solutions. We weave stories that make noise, amplify reach, and create wins.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div style="position: relative; height: 800px; display: flex; align-items: flex-end; justify-content: center; margin-left:20px;">
                        <!-- Three.js Canvas Container (Floating above) -->
                        <div id="cube-canvas-container" style="width: 80%; height: 80%; position: absolute; top: 110px; left: 0; z-index: 10;"></div>
                        
                        <!-- Hand Image -->
                        <div class="hand-img-container" style="position: relative; z-index: 1; width: 100%; text-align: center;">
                            <img src="{{ config('app.url') }}/assets/img/hand.png" alt="hand" style="max-width: 95%; display: block; margin: 0 auto;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Service-Hero-Sec Area ====================== --}}

    {{-- ====================== Marquee Area ====================== --}}
    {{--
        Infinite text carousel. Each row renders the same word list twice inside a
        w-max flex track; the keyframes shift that track by exactly -50%, so the
        loop point lands on the duplicate and there is no visible seam. Speed and
        direction come from the animate-marquee-* utilities defined in
        tailwind.shared.config.js.

        The duplicate pass is aria-hidden so screen readers hear the list once,
        and both rows stop under prefers-reduced-motion.
    --}}
    @php
    $marqueeTop    = ['Branding', 'Real Estate Ads', 'Digital Marketing', 'Web Design', 'Video Production'];
    @endphp

    <section class="relative overflow-hidden bg-none py-12 max-[767px]:py-8" aria-label="What we do">

        {{-- Row 1: solid, scrolling left --}}
        <div class="flex w-max animate-marquee-left motion-reduce:animate-none">
            @foreach([false, true] as $isDuplicate)
            <div class="flex shrink-0 items-center" @if($isDuplicate) aria-hidden="true" @endif>
                @foreach($marqueeTop as $word)
                <span class="whitespace-nowrap px-8 font-display text-[64px] font-bold uppercase leading-none text-black max-[991px]:px-6 max-[991px]:text-[46px] max-[767px]:px-4 max-[767px]:text-[34px]">
                    {{ $word }}
                </span>
                <span class="h-8 w-8 shrink-0 rounded-full bg-tp-red max-[767px]:h-2 max-[767px]:w-2" aria-hidden="true"></span>
                @endforeach
            </div>
            @endforeach
        </div>
    </section>
    {{-- ====================== End Marquee Area ====================== --}}

    {{-- ====================== Sec-9 Area (Services Grid) ====================== --}}
    {{--
        Pure Tailwind. Two things to know before editing:
        * This page loads css/shared.css, which is built WITHOUT preflight, so
          borders need an explicit `border-solid` and headings/paragraphs need
          explicit `m-0` -- Tailwind has not reset Bootstrap's defaults here.
        * Hover states are driven by `group` on the card, so the accent bar,
          number badge, title, copy and arrow all react to one hover.
    --}}
    <div class="sec-9 bg-white py-[70px] max-[991px]:py-[70px]" id="sec-9">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">

            {{-- Intro band: copy left-aligned, CTA on the right. Sits inside the same
                 max-w-[1140px] container as the grid so its left edge lines up with
                 the first card. Vertical spacing is unchanged -- the gap before the
                 cards still comes from the grid's own mt-[60px]. --}}
            <div class="flex items-end justify-between gap-12 max-[991px]:flex-col max-[991px]:items-start max-[991px]:gap-8">
                <div class="max-w-[760px]">
                    {{-- h2, not h1: the hero already owns this page's single h1. --}}
                    <h2 class="m-0 font-display text-[34px] leading-[1.3] tracking-[-0.5px] text-black max-[991px]:text-[28px] max-[767px]:text-[24px]">
                        Our team of experienced professionals understands the ever-changing
                        landscape of marketing and is able to 
                        <span class="text-tp-red">create custom strategies for each client.</span>
                    </h2>
                </div>

                <a href="{{ route('contact') }}"
                   class="group inline-flex shrink-0 items-center gap-3 rounded-full border-0 bg-black px-8 py-4 font-body text-[14px] font-bold uppercase tracking-[1px] text-white no-underline transition-colors duration-300 hover:bg-tp-red hover:text-white max-[991px]:w-full max-[991px]:justify-center">
                    Get Started
                </a>
            </div>

            @php
            $services = [
                    ['01', 'Branding', 'Undertaking brand and market research to fathom brand goals and positioning, along with building on the existing voice and visual language.', null],
                    ['02', 'Strategy', 'Deploying a research-based strategy with room for innovative developments, across all forms of traditional & non-traditional media.', null],
                    ['03', 'Digital Marketing', 'We integrate marketing strategies & solutions to create distinctive conversations and reach a diverse audience through a unique online presence.', 'digital-marketing'],
                    ['04', 'Real Estate Video Ads', 'Cinematic property walkthroughs, drone aerials and promo films that help builders and brokers showcase their projects and sell faster.', 'real-estate-ads'],
                    ['05', 'Web Designing', 'Working with innovative UI/UX designs and infographics to establish a platform to connect with people.', 'web-design-agency'],
                    ['06', 'SEO Services', 'Technical and on-page SEO that grows organic visibility, so the right people find you without paying for every click.', 'search-engine-optimization-seo-services'],
                    ['07', 'Social Media Marketing', 'Content and community management that turns followers into a audience which actually converts.', 'social-media-marketing-agency'],
                    ['08', 'Performance Marketing', 'Paid campaigns built around measurable outcomes, optimised continuously against cost per acquisition.', 'performance-marketing-agency'],
                    ['09', 'Events & Live', 'We take your brand out on a walk amidst society & concerts.', null],
                    ['10', 'Disruptive Ideas', 'We plan unprecedented solutions and ideas that take your brand to the front line of unique marketing campaigns.', null],
                    ['11', 'Friendship With Benefits', 'Got a specific project for us? We\'re here to provide our expertise.', null],
            ];

            $card = 'group relative block overflow-hidden rounded-lg border border-solid border-[#e5e5e5]'
                  . ' bg-white p-[40px_35px] no-underline shadow-[0_2px_8px_rgba(0,0,0,0.04)]'
                  . ' transition-all duration-[400ms] ease-[cubic-bezier(0.4,0,0.2,1)]'
                  . ' hover:-translate-y-2 hover:border-tp-red hover:shadow-[0_12px_24px_rgba(0,0,0,0.12)]'
                  . ' max-[991px]:p-[35px_30px] max-[576px]:p-[30px_25px]';
            @endphp

            <div class="mt-[60px] grid grid-cols-2 gap-[30px] max-[991px]:mt-10 max-[991px]:grid-cols-1 max-[991px]:gap-[25px] max-[576px]:gap-5">
                @foreach($services as [$num, $title, $desc, $route])
                @php $isLink = (bool) $route; @endphp
                <{{ $isLink ? 'a' : 'div' }}
                    @if($isLink) href="{{ route($route) }}" @endif
                    class="{{ $card }} {{ $isLink ? 'cursor-pointer text-inherit' : '' }}">

                    {{-- Accent bar: grows from 0 to full height on hover --}}
                    <span class="absolute left-0 top-0 h-0 w-[4px] bg-tp-red transition-[height] duration-[400ms] ease-[cubic-bezier(0.4,0,0.2,1)] group-hover:h-full"></span>

                    <span class="mb-5 inline-block rounded border border-solid border-tp-red px-3 py-[6px] font-mono text-[14px] font-bold text-tp-red transition-all duration-300 group-hover:bg-tp-red group-hover:text-white max-[576px]:px-[10px] max-[576px]:py-[5px] max-[576px]:text-[12px]">
                        {{ $num }}
                    </span>

                    <h3 class="m-0 mb-[15px] text-[28px] font-extrabold uppercase leading-[1.2] tracking-[-0.5px] text-black transition-colors duration-300 group-hover:text-tp-red max-[991px]:text-[24px] max-[576px]:text-[22px]">
                        {{ $title }}
                    </h3>

                    <p class="m-0 mb-5 text-[16px] leading-[1.7] text-[#666] transition-colors duration-300 group-hover:text-[#333] max-[991px]:text-[15px]">
                        {{ $desc }}
                    </p>

                    <span class="block -translate-x-[10px] text-[24px] leading-none text-[#ccc] opacity-0 transition-all duration-300 group-hover:translate-x-0 group-hover:text-tp-red group-hover:opacity-100" aria-hidden="true">&rarr;</span>
                </{{ $isLink ? 'a' : 'div' }}>
                @endforeach
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-9 Area ====================== --}}

    {{-- ====================== Sec-3 Area (Refined) ====================== --}}
    <div class="sec-3 bg-black" style="padding: 120px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="sec-img-1" style="position: relative;">
                        <div class="img" style="border-radius: 0; overflow: hidden; transition: 0.5s;">
                            <img src="{{ config('app.url') }}/assets/img/service-01.png" alt="img" style="width: 100%; display: block;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content-box">
                        <div class="sec-title" style="margin-bottom: 40px;">
                            <p style="font-size: 18px; letter-spacing: 4px; color: var(--tp-red); text-transform: uppercase; margin-bottom: 10px; font-weight: 700;">Brand</p>
                            <b style="font-size: 60px; line-height: 1; color: #fff; font-weight: 800; display: block;">
                                Your Story
                            </b>
                        </div>
                        <div class="des" style="color: #ccc; font-size: 18px; line-height: 1.7; margin-bottom: 40px;">
                            <p style="margin-bottom: 20px;">
                                We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <!-- Changed button to Red Background -->
                            <a href="{{ route('contact') }}" class="btn" style="background: var(--tp-red); color: #fff; padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; text-decoration: none; display: inline-block;">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scene Setup
        const container = document.getElementById('cube-canvas-container');
        if (!container) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        // Lighting (Required for Solid Material)
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.6); // Soft white light
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Solid Red Cube
        const geometry = new THREE.BoxGeometry(2.2, 2.2, 2.2);
        // Using MeshStandardMaterial for better lighting reaction
        const material = new THREE.MeshStandardMaterial({ 
            color: 0xff0000, // Red
            roughness: 0.4,
            metalness: 0.1
        });
        const cube = new THREE.Mesh(geometry, material);
        cube.position.y = 0.5; // Move up slightly to float above hand
        scene.add(cube);

        // Camera Position
        camera.position.z = 5;

        // Animation Loop
        function animate() {
            requestAnimationFrame(animate);

            // Rotate Cube
            cube.rotation.x += 0.005;
            cube.rotation.y += 0.005;

            renderer.render(scene, camera);
        }
        animate();

        // Handle Resize
        window.addEventListener('resize', function() {
            if (container) {
                const width = container.clientWidth;
                const height = container.clientHeight;
                renderer.setSize(width, height);
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
        });
    });
</script>
@endsection
