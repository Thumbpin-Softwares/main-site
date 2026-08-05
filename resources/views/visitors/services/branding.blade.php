@extends('layout.visitor', [
    'title' => 'Best Branding Agency in Gurgaon | Brand Identity & Strategy | Thumbpin',
    'description' => 'Thumbpin is a top branding agency in Gurgaon. We craft compelling brand identities, logos, brand guidelines, and brand strategies that make your business unforgettable.',
    'keywords' => 'branding agency gurgaon, brand identity design, logo design agency, brand strategy, brand guidelines, brand naming, creative branding agency india',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@500;700&family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>
<link rel="stylesheet" href="@asset('css/app.css')">

{{-- The only rule Tailwind has no utility for: -webkit-text-stroke. --}}
<style>
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }
</style>
@endsection

@section('content')
<main class="bg-white font-body overflow-x-hidden">

    {{-- ====================== HERO ====================== --}}
    {{--
        pt-[180px] clears the navbar: `header` is position:absolute; top:0
        (assets/css/style.css), so it floats over this section rather than
        pushing it down.
    --}}
    <section class="relative min-h-[70vh] flex items-center justify-center overflow-hidden bg-black px-5 pt-[180px] pb-[110px] max-[767px]:min-h-0 max-[767px]:pt-[150px] max-[767px]:pb-20">
        <div class="absolute inset-0 z-[1] bg-center bg-cover grayscale contrast-[1.1] opacity-40"
             style="background-image:url('{{ asset('img/services/branding.jpeg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Branding <span class="hero-title-outline">Agency</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                We build brands that mean something. From logo to language, identity to strategy — every element crafted with intention and precision.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['50+','Brands Built'],['20+','Industries'],['7+','Years Experience']] as [$num, $label])
                <div class="text-center">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[32px]">{{ $num }}</div>
                    <div class="mt-[6px] text-[11px] uppercase tracking-[2px] text-[#666]">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white py-[60px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <h2 class="m-0 mb-[30px] text-center text-[42px] font-bold text-black max-[575px]:text-[32px]">
                Building Brands That People Remember
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                A brand is more than a logo — it's the feeling people get when they hear your name.
                At Thumbpin, we develop brand identities that are rooted in strategy, brought to life through design,
                and built to last across every touchpoint. Whether you're starting from scratch or ready for a rebrand,
                we bring clarity, creativity, and consistency to your story.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    <section class="bg-white py-20">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Brand Identity Design',
                    'img'   => 'brand-identity.png',
                    'desc'  => "Your visual identity is the first impression your brand makes — and we make it count. We design logos, colour systems, typography, and visual languages that feel distinct, consistent, and unmistakably yours across every medium.",
                ],
                [
                    'title' => 'Brand Strategy',
                    'img'   => 'brand-strategy.png',
                    'desc'  => "Before design, comes direction. We define your brand's positioning, purpose, voice, and values — giving every future decision a foundation to stand on. Our strategy work ensures your brand communicates with intent, not accident.",
                ],
                [
                    'title' => 'Brand Guidelines',
                    'img'   => 'brand-guidelines.png',
                    'desc'  => "Consistency is what turns a brand into a legacy. We create comprehensive brand guidelines that document how your brand looks, sounds, and behaves — so every team, vendor, and platform stays aligned.",
                ],
                [
                    'title' => 'Brand Naming',
                    'img'   => 'brand-naming.png',
                    'desc'  => "The right name carries your brand further than any ad ever could. We develop brand names that are memorable, meaningful, and built for longevity — tested for sound, feel, and market fit before a single penny is spent.",
                ],
            ];
            @endphp

            @foreach($services as $i => $service)
            {{-- Odd rows flip so the image alternates side to side on desktop. --}}
            <div class="group mb-20 grid grid-cols-1 items-center gap-10 last:mb-0 lg:grid-cols-2 lg:gap-16 max-[991px]:mb-[60px]">
                <div class="overflow-hidden rounded-lg {{ $i % 2 === 1 ? 'lg:order-2' : '' }}">
                    <img src="{{ asset('img/services/branding/' . $service['img']) }}"
                         alt="{{ $service['title'] }}"
                         loading="lazy"
                         class="block h-auto w-full transition-transform duration-[400ms] group-hover:scale-105">
                </div>

                <div class="flex flex-col justify-center {{ $i % 2 === 1 ? 'lg:order-1' : '' }}">
                    <h3 class="m-0 mb-5 text-[36px] font-extrabold capitalize text-black max-[575px]:text-[28px]">
                        {{ $service['title'] }}
                    </h3>
                    <p class="m-0 mb-[30px] text-[17px] leading-[1.8] text-[#666]">
                        {{ $service['desc'] }}
                    </p>
                    <div>
                        {{-- border-solid is required: app.css ships preflight, but being
                             explicit keeps this correct if the bundle ever changes. --}}
                        <a href="{{ route('contact') }}"
                           class="inline-block rounded border-2 border-solid border-black px-[30px] py-3 text-[16px] font-semibold text-black no-underline transition-all duration-300 hover:border-film-red hover:bg-film-red hover:text-white">
                            Start a Project
                        </a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </section>

    {{-- ====================== CLIENTS ====================== --}}
    <section class="bg-white py-20">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-[60px] text-center">
                <h2 class="m-0 text-[56px] font-extrabold text-black max-[575px]:text-[32px]">
                    Brands We've <span class="text-film-red">Built For</span>
                </h2>
            </div>

            <div class="grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
                @foreach(range(1, 20) as $i)
                <div class="group flex min-h-[120px] items-center justify-center p-5 transition-transform duration-300 hover:scale-110">
                    <img src="{{ asset('assets/img/clients/' . $i . '.png') }}"
                         alt="Client Logo"
                         loading="lazy"
                         class="h-auto max-w-full opacity-60 grayscale transition-all duration-300 group-hover:opacity-100 group-hover:grayscale-0">
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== QUOTE ====================== --}}
    <section class="relative bg-[#f9f9f9] py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            {{-- The oversized decorative quote mark is a ::before in CSS terms; here it
                 is a real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <div class="relative mx-auto max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-80px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/10 max-[575px]:top-[-60px] max-[575px]:text-[150px]">"</span>
                <p class="relative z-[1] m-0 text-[32px] font-medium leading-[1.6] text-black max-[575px]:text-[22px]">
                    A brand is the set of expectations, memories,<br>
                    stories and relationships that account for a consumer's decision.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="bg-white py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-10 text-center">
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Think. Create. Launch.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Branding That Works as Hard as You Do</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                We treat every branding project as if we were building our own brand from scratch.
                That means deep research, honest strategy, and design that doesn't just look good on a slide —
                it holds up in the real world, at every scale, in every context.
            </p>
        </div>
    </section>

    {{-- ====================== BOTTOM ====================== --}}
    <section class="bg-black py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <img src="{{ asset('assets/img/home/home-04.png') }}"
                         alt="Brand Story"
                         loading="lazy"
                         class="h-auto max-w-full">
                </div>

                <div class="lg:col-span-7">
                    <div class="mb-6">
                        <p class="m-0 mb-[10px] text-[56px] font-light text-white max-[575px]:text-[38px]">Brand</p>
                        <b class="text-[66px] font-extrabold text-white max-[575px]:block max-[575px]:text-[42px]">
                            Your St<img src="{{ asset('assets/img/shape-03.png') }}"
                                        alt=""
                                        aria-hidden="true"
                                        class="inline-block w-[78px] -mt-20 -mb-8 -ml-[10px] -mr-4 max-[575px]:mx-0 max-[575px]:mt-0 max-[575px]:mb-0 max-[575px]:w-10 max-[575px]:align-middle">ry
                        </b>
                    </div>

                    <div class="mb-5 text-[18px] leading-[1.8] text-[#ccc]">
                        <p class="m-0 mb-5">
                            We are creatively strategic and strategically creative. We follow a research-based
                            strategy to create memorable brand identities.
                        </p>
                        <p class="m-0">
                            Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for
                            your brand punched together with design and production.
                        </p>
                    </div>

                    <a href="{{ route('contact') }}"
                       class="inline-block rounded bg-film-red px-10 py-[15px] font-semibold text-white no-underline transition-all duration-300 hover:-translate-y-[2px] hover:bg-[#c91820]">
                        Get In Touch
                    </a>
                </div>
            </div>
        </div>
    </section>

</main>
@endsection
