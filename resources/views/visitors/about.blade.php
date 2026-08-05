@extends('layout.visitor', [
    'title' => 'Leading Creative Agency in Gurgaon | About Thumbpin',
    'description' => 'We are a team of creative thinkers, designers, and strategists in Gurgaon helping brands grow through impactful design and intelligent strategy.',
    'keywords' => 'About Thumbpin, Thumbpin, Thumbpin agency, Thumbpin team, branding agency Gurgaon, branding agency Gurugram, creative agency Gurgaon, creative agency Gurugram, advertising agency Gurgaon, advertising agency Gurugram, design agency Gurgaon, design agency Gurugram, marketing agency Gurgaon, marketing agency Gurugram, creative studio Gurgaon, creative studio Gurugram, brand strategy agency Gurgaon, brand strategy agency Gurugram',
    'image' => config('app.url') . '/img/og/about.png',
    'image_alt' => 'About Thumbpin — Creative Agency in Gurgaon',
    'footer_black' => 'footer-black'
])

{{--
    Team data lives at the top level so it feeds both the rendered cards and the
    Person entries in the JSON-LD below -- one source of truth, so schema can't
    drift from what visitors actually see.

    Filenames are written exactly as they appear on disk (spaces and all);
    rawurlencode() at the point of use handles URL escaping. Hand-encoding here
    is what produced a broken "BRAJESH%PATHAK.jpeg" -- a bare % is not valid
    percent-encoding, so the request 404s.
--}}
@php
$team = [
    ['BRAJESH PATHAK.jpeg',   'Brajesh Pathak',   'Founder & Business Head',      'Marketing enthusiast, translating businesses into stories.',        'https://www.linkedin.com/in/brajesh-pathak-415826120'],
    ['DURGESH SINGH.jpg',     'Durgesh Singh',    'Consultant', 'Story-teller by the day, creator by the night.',                    'https://www.linkedin.com/in/durgesh-singh-820b50ab'],
    ['SOHAN ROUT.jpeg',       'Sohan Rout',       'Full Stack Developer',         'Tidies as he builds, writing today for the team that arrives next year.', 'https://www.linkedin.com/in/sohan-rout/'],
    ['SPARSH SHARMA.png',     'Sparsh Sharma',    'Full Stack Developer',         'Ship first, polish after. Working beats perfect, every time.',       'https://www.linkedin.com/in/sparshdev/'],
    ['KOMAL BHADURIA.jpg',    'Komal Bhaduria',   'Digital Specialist',           'Digital marketing maven, and digital connoisseur.',                 null],
    ['NABEEL UR REHMAN.jpg',  'Nabeel Ur Rehman','Junior Art Director',          'Artist, beyond the image that comes to mind.',                      null],
    ['SIDDHARTH SHARMA.jpg',  'Siddharth Sharma','Social Media Manager',         'Social Media is an ocean. The deeper you dive, the more you find.', null],
    ['SHAYREE.jpg',           'Shayree',          'Copywriter',                   'At the end, stories are all that remain.',                          null],
    ['RITU DANU.jpg',         'Ritu Danu',        'HR Manager',                   'Connecting people to places they belong.',                          null],
];

$socialProfiles = [
    'https://www.facebook.com/ThumbpinAgency',
    'https://twitter.com/ThumbpinAgency',
    'https://www.instagram.com/ThumbpinAgency',
    'https://in.linkedin.com/company/thumbpinagency',
    'https://www.behance.net/thumbpinagency',
];
@endphp

@section('head')
<link rel="stylesheet" href="@asset('css/app.css')">

{{--
    Structured data as a single @graph so the entities are linked by @id
    (AboutPage -> about -> Organization) rather than floating independently.
    NAP values match the LocalBusiness block on the home page -- keep them in
    sync, since conflicting addresses across pages undercut local ranking.
--}}
@php
$orgId       = config('app.url') . '/#organization';
$aboutUrl    = config('app.url') . '/about';
$breadcrumbId= $aboutUrl . '/#breadcrumb';

$employees = [];
foreach ($team as [$img, $name, $role, $bio, $linkedin]) {
    $person = [
        '@type'    => 'Person',
        'name'     => $name,
        'jobTitle' => $role,
        'image'    => config('app.url') . '/assets/img/team/' . rawurlencode($img),
        'worksFor' => ['@id' => $orgId],
    ];
    if ($linkedin) {
        $person['sameAs'] = $linkedin;
    }
    $employees[] = $person;
}

$schema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type'       => 'Organization',
            '@id'         => $orgId,
            'name'        => 'Thumbpin',
            'url'         => config('app.url') . '/',
            'logo'        => config('app.url') . '/assets/img/logo/logo-black.png',
            'description' => 'Creative digital agency in Gurgaon offering branding, web design, performance marketing and video production.',
            'telephone'   => '+91-9773511447',
            'address'     => [
                '@type'           => 'PostalAddress',
                'streetAddress'   => 'Spaze Itech Park, Tower B1, 6th floor, office 657, Sector 49',
                'addressLocality' => 'Gurugram',
                'addressRegion'   => 'Haryana',
                'postalCode'      => '122018',
                'addressCountry'  => 'IN',
            ],
            'geo' => [
                '@type'     => 'GeoCoordinates',
                'latitude'  => 28.4132213,
                'longitude' => 77.0434993,
            ],
            'sameAs'   => $socialProfiles,
            'founder'  => ['@type' => 'Person', 'name' => 'Brajesh Pathak'],
            'employee' => $employees,
        ],
        [
            '@type'       => 'AboutPage',
            '@id'         => $aboutUrl . '/#webpage',
            'url'         => $aboutUrl,
            'name'        => 'Leading Creative Agency in Gurgaon | About Thumbpin',
            'description' => 'We are a team of creative thinkers, designers, and strategists in Gurgaon helping brands grow through impactful design and intelligent strategy.',
            'inLanguage'  => 'en-IN',
            'about'       => ['@id' => $orgId],
            'breadcrumb'  => ['@id' => $breadcrumbId],
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $breadcrumbId,
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',  'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'About', 'item' => $aboutUrl],
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

{{--
    Styled entirely with Tailwind utilities. Breakpoints are desktop-first
    (max-[991px]/max-[767px]) to mirror the Bootstrap lg/md widths this page
    previously used, rather than Tailwind's defaults which sit at 1024/768.
--}}
<main>

    {{-- ====================== 1. HERO ====================== --}}
    <section class="relative overflow-hidden bg-black pt-[180px] pb-[100px] max-[991px]:pt-[140px] max-[991px]:pb-[70px]">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">
            <div class="grid grid-cols-12 items-center gap-[30px]">
                <div class="col-span-7 max-[991px]:col-span-12">
                    <span class="block mb-5 font-body text-[14px] font-bold uppercase tracking-[3px] text-tp-red">
                        Who We Are
                    </span>
                    <h1 class="relative z-[2] mb-10 font-body text-[72px] text-white font-extrabold uppercase leading-[0.95] max-[767px]:text-[48px]">
                        Ideas That <br>
                        <span class="text-tp-red">Inspire Action.</span>
                    </h1>
                    <div class="max-w-[90%] border-l-4 border-tp-red pl-[25px] max-[767px]:max-w-full">
                        <p class="m-0 text-base leading-[1.6] text-neutral-400 max-[767px]:text-[17px]">
                            We are a team of creative thinkers, designers, planners, strategists, and tech experts who share one objective: to help brands like yours grow with ideas that matter. We define how brands connect with people through thoughtful storytelling, impactful design, and intelligent strategy.
                        </p>
                    </div>
                </div>
                <div class="col-span-5 max-[991px]:col-span-12 max-[991px]:mt-10">
                    {{-- The offset red block is a ::before, so it needs before:* utilities. --}}
                    <div class="group relative z-[1] before:absolute before:left-5 before:top-5 before:-z-[1] before:h-full before:w-full before:bg-tp-red before:transition-all before:duration-[400ms] before:content-[''] hover:before:left-[10px] hover:before:top-[10px]">
                        <img src="{{ config('app.url') }}/assets/img/about-sec.png" alt="About Thumbpin Agency"
                             class="block h-auto w-full grayscale transition-[filter] duration-[400ms] group-hover:grayscale-0">
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== 2. MISSION & VISION ====================== --}}
    <section class="relative bg-white py-[100px] max-[991px]:py-[70px]">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">
            <div class="grid grid-cols-2 gap-[30px] max-[991px]:grid-cols-1">
                @foreach([
                    ['Our', 'Mission', 'To empower brands with meaningful creativity that moves people and makes a measurable difference. We combine strategic insight with unique design to help you express your story with confidence. We deliver branding solutions that are powerful, purpose-led, and visually compelling.'],
                    ['Our', 'Vision',  'To become the most trusted and performance-driven creative partner for brands. We strive to lead the future of brand communication through creativity, technology, and human understanding. Our goal is to set new creative standards while helping businesses succeed.'],
                ] as $i => [$lead, $accent, $body])
                {{-- Divider sits between the two cards: left border on desktop, top border once stacked. --}}
                <div class="{{ $i === 1 ? 'border-l border-[#ddd] px-5 max-[991px]:border-l-0 max-[991px]:border-t max-[991px]:px-0 max-[991px]:pt-[30px]' : 'px-5 max-[991px]:px-0' }}">
                    <h2 class="mb-[25px] mt-0 font-body text-[42px] font-extrabold uppercase leading-[1.1] text-black max-[767px]:text-[32px]">
                        {{ $lead }} <span class="text-tp-red">{{ $accent }}</span>
                    </h2>
                    <p class="m-0 text-[17px] leading-[1.7] text-[#666]">{{ $body }}</p>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== 3. CORE VALUES ====================== --}}
    <section class="bg-[#f8f8f8] py-[120px] max-[991px]:py-[80px]">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">
            <h2 class="mb-12 mt-0 text-center font-body text-[48px] font-extrabold uppercase leading-[1.1] text-black max-[767px]:text-[34px]">
                Core <span class="text-tp-red">Values</span>
            </h2>

            @php
            // span = desktop 12-col width; the 6/3/3 + 3/9 pattern fills exactly two rows.
            $values = [
                ['01', 'Customer Focus',      'We begin every project by listening. Understanding your target audience ensures our designs and strategies address real requirements, not assumptions.', 6],
                ['02', 'Quality',             'Meticulous review processes to ensure every pixel is perfect.', 3],
                ['03', 'Innovation',          'Pushing boundaries to create advertising that feels future-ready.', 3],
                ['04', 'Integrity',           'Complete transparency in budgeting, timelines, and expectations.', 3],
                ['05', 'Passion for Branding','Our passion drives us to create identities that feel alive. We approach every logo and campaign with curiosity, creativity, and strategic thinking to create memorable brands.', 9],
            ];
            $spans = [
                3 => 'col-span-3 max-[991px]:col-span-6 max-[767px]:col-span-12',
                6 => 'col-span-6 max-[991px]:col-span-12',
                9 => 'col-span-9 max-[991px]:col-span-12',
            ];
            @endphp

            <div class="grid grid-cols-12 gap-6">
                @foreach($values as [$num, $title, $desc, $span])
                <div class="{{ $spans[$span] }}">
                    <div class="group relative h-full border border-transparent bg-white p-10 shadow-[0_5px_20px_rgba(0,0,0,0.03)] transition-all duration-[400ms] hover:-translate-y-[10px] hover:border-b-4 hover:border-b-tp-red hover:shadow-[0_15px_40px_rgba(0,0,0,0.08)] max-[767px]:p-7">
                        <span class="absolute right-[30px] top-5 font-body text-[50px] font-black leading-none text-[#eee] transition-all duration-[400ms] group-hover:text-tp-red group-hover:opacity-20">
                            {{ $num }}
                        </span>
                        <h3 class="relative z-[2] mb-5 mt-0 font-body text-[24px] font-extrabold uppercase leading-[1.2] text-black">
                            {{ $title }}
                        </h3>
                        <p class="relative z-[2] m-0 text-[16px] leading-[1.7] text-[#666]">{{ $desc }}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== 4. STRATEGY ====================== --}}
    <section class="border-b border-[#f0f0f0] bg-white py-[120px] max-[991px]:py-[80px]">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">
            <div class="grid grid-cols-12 gap-[30px]">
                <div class="col-span-4 max-[991px]:col-span-12">
                    <div class="sticky top-[100px] max-[991px]:static">
                        <h2 class="mb-[30px] mt-0 font-body text-[60px] font-extrabold uppercase leading-none tracking-[-2px] text-black max-[767px]:text-[48px]">
                            Why <br><span class="text-tp-red">Us?</span>
                        </h2>
                        <p class="mb-[50px] max-w-[90%] text-[18px] leading-[1.7] text-[#666] max-[991px]:mb-[30px]">
                            We don't just design; we define. Our commitment is to deliver work that reflects honesty, reliability, and excellence.
                        </p>
                        <a href="{{ route('contact') }}"
                           class="mt-5 inline-block rounded-full bg-black px-[30px] py-[15px] font-body text-[15px] font-bold text-white no-underline transition-colors duration-200 hover:bg-tp-red">
                            Start a Project
                        </a>
                    </div>
                </div>

                {{-- offset-lg-1: start at column 6 so 4 + 1 gap + 7 fills the row --}}
                <div class="col-span-7 col-start-6 max-[991px]:col-span-12 max-[991px]:col-start-1">
                    <div class="grid grid-cols-2 gap-10 max-[767px]:grid-cols-1 max-[767px]:gap-[30px]">
                        @foreach([
                            ['01', 'Strategic Branding',   'We dig deep. Research-based positioning to align your brand values with audience expectations, ensuring every move is calculated.'],
                            ['02', 'Creative Excellence',  'Beauty with a purpose. We create ideas that look stunning and serve a strategic function through meticulous design craftsmanship.'],
                            ['03', 'Client-Centric',       'Your goals are our north star. We collaborate closely, keeping you at the center of the process to optimize ROI and impact.'],
                            ['04', 'End-to-End Solutions', 'From the first spark of an idea to the final digital execution. We handle brand research, design, development, and performance optimization.'],
                        ] as [$num, $title, $text])
                        <div class="relative border-t border-[#ddd] py-10 transition-all duration-[400ms] hover:-translate-y-[5px] hover:border-t-tp-red">
                            <span class="mb-5 block font-body text-[14px] font-bold uppercase tracking-[2px] text-tp-red">{{ $num }}</span>
                            <h4 class="mb-[15px] mt-0 font-body text-[28px] font-extrabold uppercase leading-[1.2] text-black max-[767px]:text-[24px]">
                                {{ $title }}
                            </h4>
                            <p class="m-0 text-[16px] leading-[1.6] text-[#666]">{{ $text }}</p>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ====================== 5. TEAM ====================== --}}
    <section class="bg-white py-[100px] max-[991px]:py-[70px]">
        <div class="mx-auto w-full max-w-[1140px] px-[15px]">
            <h2 class="mb-[70px] mt-0 text-center font-body text-[50px] font-extrabold uppercase leading-[1.1] text-black max-[767px]:mb-10 max-[767px]:text-[34px]">
                Meet The <span class="text-tp-red">Team</span>
            </h2>


            <div class="grid grid-cols-3 gap-[30px] max-[991px]:grid-cols-2 max-[767px]:grid-cols-1">
                @foreach($team as [$img, $name, $role, $bio, $linkedin])
                <div class="group border border-[#f0f0f0] bg-white transition-all duration-300 hover:-translate-y-[5px] hover:border-[#ddd] hover:shadow-[0_15px_30px_rgba(0,0,0,0.05)]">
                    <div class="relative h-[380px] w-full overflow-hidden max-[767px]:h-[320px]">
                        @if(is_file(public_path('assets/img/team/'.$img)))
                        <img src="{{ config('app.url') }}/assets/img/team/{{ rawurlencode($img) }}" alt="{{ $name }}"
                             loading="lazy" decoding="async"
                             class="h-full w-full object-cover grayscale transition-all duration-500 group-hover:grayscale-0">
                        @else
                        {{-- No photo on disk yet: initials beat a broken image icon. --}}
                        @php
                            $initials = '';
                            foreach (array_slice(explode(' ', $name), 0, 2) as $word) {
                                $initials .= mb_substr($word, 0, 1);
                            }
                        @endphp
                        <div class="flex h-full w-full items-center justify-center bg-[#f0f0f0] font-body text-[64px] font-extrabold uppercase text-[#ccc]">
                            {{ $initials }}
                        </div>
                        @endif
                    </div>
                    <div class="p-[25px] text-left">
                        <h4 class="mb-[5px] mt-0 font-body text-[22px] font-extrabold uppercase leading-[1.2] text-black">{{ $name }}</h4>
                        <span class="mb-[15px] block font-body text-[13px] font-bold uppercase tracking-[1px] text-tp-red">{{ $role }}</span>
                        <p class="mb-[15px] mt-0 min-h-[42px] text-[14px] leading-[1.5] text-[#777]">{{ $bio }}</p>
                        @if($linkedin)
                        <div>
                            <a href="{{ $linkedin }}" target="_blank" rel="noopener noreferrer"
                               aria-label="{{ $name }} on LinkedIn"
                               class="mr-[15px] text-[16px] text-[#aaa] no-underline transition-colors duration-300 hover:text-black">
                                <i class="fab fa-linkedin-in"></i>
                            </a>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

</main>

@endsection
