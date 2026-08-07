@extends('layout.visitor', [
    'title' => 'Application Development Company in Gurgaon | Web & App Development',
    'description' => 'Thumbpin builds web and mobile applications with React, Next.js, Node.js and Express, backed by MongoDB and PostgreSQL — from UI design through API architecture to deployment.',
    'keywords' => 'application development company gurgaon, web application development india, react development agency, next js development company, node js development, express js backend, mongodb development, postgresql development, full stack development agency, custom software development gurgaon, api development company, ui ux design agency',
    'footer_black' => 'footer-black',
])

@section('head')
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" media="print" onload="this.media='all'">
<noscript>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
</noscript>
<link rel="stylesheet" href="@asset('css/app.css')">

{{-- The only rule Tailwind has no utility for: -webkit-text-stroke. --}}
<style>
.hero-title-outline { color: transparent; -webkit-text-stroke: 2px rgba(255,255,255,0.6); }
@media (max-width: 767px) { .hero-title-outline { -webkit-text-stroke-width: 1px; } }

/* Inquiry form. Always expanded, so no accordion rules here. */
::placeholder { color: #444; }
@media (max-width: 768px) {
    .inquiry-grid { grid-template-columns: 1fr !important; }
}
</style>

{{--
    One source of truth for the FAQs: this array renders the visible <details>
    list further down AND the FAQPage schema below, so the structured data can
    never claim something the page does not actually say -- which is what
    triggers a manual action.

    Organization @id matches /services, /about and the other service pages so all
    of them describe the same entity rather than several unrelated ones.
--}}
@php
$appFaqs = [
    ['q' => 'What technologies do you build applications with?',
     'a' => "React and Next.js on the front end, Node.js with Express on the back end, and MongoDB or PostgreSQL for data depending on what the application actually needs. We keep to a deliberately small, well-supported stack rather than picking something novel per project — it means any developer can pick the codebase up later, including one who is not us."],

    ['q' => 'How do you choose between MongoDB and PostgreSQL?',
     'a' => "It comes down to the shape of your data. PostgreSQL suits anything with clear relationships and constraints you want enforced at the database level — orders, inventory, accounts, reporting. MongoDB suits flexible or rapidly changing document structures where the schema is still moving. We make the call during architecture rather than by default, because migrating later is expensive."],

    ['q' => 'How long does an application take to build?',
     'a' => "A focused web application typically runs eight to sixteen weeks from kickoff to launch, depending on how many user roles, integrations, and edge cases are involved. We scope in phases so something usable ships early rather than everything arriving at the end, which is also how you find out whether the thing you specified is the thing you needed."],

    ['q' => 'Do you build mobile apps as well as web applications?',
     'a' => "We build responsive web applications that work properly on phones, and progressive web apps where installability matters. For anything needing deep native device access we will tell you honestly whether a native build is the right call rather than stretching the web stack past where it works well."],

    ['q' => 'Will I own the code?',
     'a' => "Yes. On final payment the repository and all associated assets transfer to you, along with deployment documentation. We build on standard open-source frameworks with no proprietary layer, so another team can take over without a rewrite. You are never locked in by the architecture."],

    ['q' => 'Do you handle hosting, deployment and maintenance?',
     'a' => "We set up deployment and hand over the runbook, and can stay on for maintenance if you want it. Applications need ongoing attention — dependency updates, security patches, monitoring — and pretending otherwise is how projects quietly rot. We are explicit about what that costs before you commit."],

    ['q' => 'Can you work on an existing codebase rather than starting fresh?',
     'a' => "Regularly. We start with an audit of the current architecture, dependencies, and test coverage before touching anything, because inherited code usually contains decisions that made sense in context. We will say plainly whether it is worth extending or whether a rebuild would cost less than the workarounds."],

    ['q' => 'Do you design the interface as well as build it?',
     'a' => "Yes. UI and UX design sit inside the same engagement rather than being handed over from a separate team, which removes the usual gap between a design that looks right in a mockup and one that survives real data, long names, empty states, and slow connections."],
];

$appUrl = url()->current();
$orgId  = config('app.url') . '/#organization';

$appSchema = [
    '@context' => 'https://schema.org',
    '@graph'   => [
        [
            '@type' => 'Organization',
            '@id'   => $orgId,
            'name'  => 'Thumbpin',
            'url'   => config('app.url') . '/',
        ],
        [
            '@type'       => 'Service',
            '@id'         => $appUrl . '/#service',
            'name'        => 'Application Development',
            'serviceType' => 'Application Development',
            'url'         => $appUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Web and application development with React, Next.js, Node.js, Express, MongoDB and PostgreSQL from Thumbpin, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $appUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $appFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $appUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',                    'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',                'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Application Development', 'item' => $appUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($appSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
</script>
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
             style="background-image:url('{{ asset('img/services/web-design.jpeg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Application <span class="hero-title-outline">Development</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[600px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Web and product applications built on React, Next.js and Node.js — designed to be maintained, not just delivered.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['40+','Projects Shipped'],['6','Core Technologies'],['6+','Years Experience']] as [$num, $label])
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
                Applications Built to Last
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Most applications are not abandoned because they stopped working. They are abandoned because
                nobody can safely change them any more. We build on a small, boring, well-supported stack —
                React and Next.js on the front end, Node.js and Express behind it, PostgreSQL or MongoDB for
                data — so the codebase you own in three years is still one a developer can pick up and extend.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="app-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Frontend Development',
                    'lead'  => "Interfaces built with React and Next.js — fast on first load, responsive across devices, and structured so features can be added without the whole thing becoming fragile.",
                    'body'  => "Next.js gives us server rendering and static generation where they matter, which means pages that are quick for users and legible to search engines rather than an empty shell that only fills in after JavaScript runs. Component architecture is planned up front so the design system stays consistent as the product grows.",
                ],
                [
                    'title' => 'Backend Development',
                    'lead'  => "APIs and server logic on Node.js with Express — the layer that decides what your application is actually allowed to do.",
                    'body'  => "We build REST APIs with authentication, role-based access, validation, and error handling treated as requirements rather than afterthoughts. Business logic stays on the server where it can be trusted, and integrations with payment gateways, messaging services, and third-party systems are isolated so a change on their side does not cascade through yours.",
                ],
                [
                    'title' => 'Database Design & Architecture',
                    'lead'  => "PostgreSQL or MongoDB, chosen for the shape of your data rather than by habit — because migrating later costs far more than deciding properly now.",
                    'body'  => "PostgreSQL where relationships and constraints matter and you want the database enforcing correctness. MongoDB where documents are flexible and the schema is still moving. Either way we design indexes, plan for the query patterns you will actually run, and set up backups before launch rather than after the first incident.",
                ],
                [
                    'title' => 'UI & UX Design',
                    'lead'  => "Interface design that survives contact with real data — long names, empty states, error conditions, and slow connections.",
                    'body'  => "Design and build sit in the same engagement, which removes the usual gap between a mockup that looks right and a screen that behaves. We work through the unglamorous states most designs skip, because those are where users actually get stuck and abandon what you built.",
                ],
                [
                    'title' => 'API Development & Integration',
                    'lead'  => "Connecting your application to the systems it needs — payments, CRMs, analytics, messaging — and exposing your own APIs where others need to connect to you.",
                    'body'  => "Integrations are where applications quietly break, usually because a third party changed something without warning. We build them with retries, sensible failure handling, and logging that tells you what went wrong, so a partner's outage degrades one feature instead of taking down your product.",
                ],
            ];
            @endphp

            <div class="border-0 border-t border-solid border-[#e8e8e8]">
                @foreach($services as $i => $service)
                <article class="group grid grid-cols-1 gap-x-16 gap-y-6 border-0 border-b border-solid border-[#e8e8e8] py-14 lg:grid-cols-12 max-[767px]:py-10">

                    {{-- Left rail: number + title --}}
                    <div class="lg:col-span-4">
                        <div class="lg:sticky lg:top-32">
                            <span class="mb-3 block font-mono text-[12px] font-bold tracking-[1px] text-film-red">
                                {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}
                            </span>
                            <h3 class="m-0 text-[30px] font-extrabold leading-[1.15] tracking-[-0.5px] text-black transition-colors duration-300 group-hover:text-film-red max-[991px]:text-[26px] max-[575px]:text-[23px]">
                                {{ $service['title'] }}
                            </h3>
                        </div>
                    </div>

                    {{-- Right: copy --}}
                    <div class="lg:col-span-8">
                        <p class="m-0 mb-5 text-[18px] leading-[1.7] text-[#333] max-[575px]:text-[16px]">
                            {{ $service['lead'] }}
                        </p>
                        <p class="m-0 text-[15px] leading-[1.85] text-[#777]">
                            {{ $service['body'] }}
                        </p>
                    </div>
                </article>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== TECH STACK ====================== --}}
    <section class="bg-[#f9f9f9] py-20" id="tech-stack">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-12 max-w-[760px]">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Our Stack</p>
                <h2 class="m-0 mb-5 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Technologies We Build With
                </h2>
                <p class="m-0 text-[17px] leading-[1.8] text-[#666]">
                    A deliberately small stack. Every tool here is mature, widely adopted, and easy to hire for —
                    which matters more than novelty when you are the one who has to live with the codebase.
                </p>
            </div>

            @php
            $stack = [
                ['Frontend',  'The layer your users touch',              ['React', 'Next.js']],
                ['Backend',   'APIs, business logic, authentication',    ['Node.js', 'Express']],
                ['Databases', 'Chosen per project, not by default',      ['PostgreSQL', 'MongoDB']],
            ];
            @endphp

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @foreach($stack as [$group, $note, $items])
                <div class="border-0 border-t-2 border-solid border-film-red bg-white p-7 max-[575px]:p-6">
                    <h3 class="m-0 mb-2 text-[20px] font-extrabold uppercase tracking-[0.5px] text-black">{{ $group }}</h3>
                    <p class="m-0 mb-6 text-[14px] leading-[1.6] text-[#777]">{{ $note }}</p>
                    <ul class="m-0 flex list-none flex-wrap gap-2 p-0">
                        @foreach($items as $tech)
                        <li class="rounded-full border border-solid border-[#e0e0e0] bg-[#fafafa] px-4 py-[7px] text-[14px] font-semibold leading-none text-[#333]">
                            {{ $tech }}
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- ====================== CTA + Inquiry Form ====================== --}}
    <section id="cta-inquiry" class="bg-black">

        {{-- Top strip: centered heading --}}
        <div class="text-center px-5 pt-[72px] pb-[20px]">
            <p class="text-[18px] tracking-[3px] text-tp-red uppercase font-bold mb-[14px]">Work With Us</p>
            <h2 class="text-[clamp(34px,5vw,60px)] font-black uppercase leading-[1.05] text-white mb-[18px] tracking-[-1.5px]">Ready to Get Started?</h2>
            <p class="text-[16px] text-[#888] max-w-[480px] mx-auto leading-[1.65]">Tell us about your project we'll get back within 24 hours.</p>
        </div>

        {{-- Section header. A plain div, not a button: the form below is always
             expanded, so a control that toggles nothing would mislead both users
             and screen readers. --}}
        <div class="w-full bg-black border-0 border-t border-b border-[#1e1e1e] flex items-center justify-between">
            <div class="max-w-[1300px] mx-auto px-5 py-7 flex items-center justify-between w-full gap-6 flex-wrap">
                <div class="text-left">
                    <p class="text-[11px] tracking-[3px] text-tp-red uppercase font-bold mb-[6px]">Start Here</p>
                    <span class="text-[clamp(18px,2.5vw,26px)] font-extrabold text-white uppercase tracking-[-0.5px] block">Let's Get You Onboarded</span>
                </div>
            </div>
        </div>

        {{-- Form body -- always visible --}}
        <div id="svc-inquiry-form-wrap" class="bg-black border-b border-[#1e1e1e]">
            <div class="max-w-[1300px] mx-auto px-5">
                <form action="{{ route('inquiry-form') }}" method="POST" class="py-12">
                    @csrf
                    <input type="hidden" name="url" value="{{ url()->current() }}">

                    <div class="inquiry-grid grid grid-cols-2 gap-x-[60px]">
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="name" required placeholder="Your Name"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="email" name="email" required placeholder="Email Address"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="tel" name="mobile" required placeholder="Contact Number"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <div class="field-diag field-diag-dark relative">
                            <input type="text" name="country" placeholder="Country"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                    </div>

                    <div class="flex items-end gap-4 flex-wrap mt-0">
                        <div class="field-diag field-diag-dark relative flex-1 min-w-[200px]">
                            <input type="text" name="requirement" required placeholder="What do you need?"
                                class="w-full bg-transparent text-white text-[14px] py-4 px-1 outline-none transition-colors duration-200 box-border"
                                style="border:none;border-bottom:1px solid #444;"
                                onfocus="this.style.borderBottomColor='#E50914'" onblur="this.style.borderBottomColor='#444'">
                        </div>
                        <button type="submit"
                            class="bg-tp-red hover:bg-[#c0070f] text-white border-0 py-4 px-9 text-[12px] font-bold uppercase tracking-[1.5px] cursor-pointer whitespace-nowrap flex-shrink-0 transition-colors duration-200 mb-px">
                            Send Enquiry
                        </button>
                    </div>

                    <p class="text-[12px] text-[#444] mt-5">We'll respond within 24 hours. No spam, ever.</p>
                </form>
            </div>
        </div>

    </section>
    {{-- ====================== End CTA + Inquiry Form ====================== --}}

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
                         decoding="async"
                         class="h-auto max-w-full opacity-60 grayscale transition-all duration-300 group-hover:opacity-100 group-hover:grayscale-0">
                </div>
                @endforeach
            </div>

            <div class="mt-6 text-center max-[575px]:mt-10">
                <a href="{{ route('work') }}"
                   class="inline-block rounded border-2 border-solid border-black px-10 py-[14px] text-[14px] font-bold uppercase tracking-[1px] text-black no-underline transition-all duration-300 hover:border-film-red hover:bg-film-red hover:text-white">
                    View Our Work
                </a>
            </div>
        </div>
    </section>

    {{-- ====================== QUOTE ====================== --}}
    <section class="relative bg-black py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            {{-- The oversized quote mark is a ::before in CSS terms; here it is a
                 real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <div class="relative mx-auto max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-80px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/50 max-[575px]:top-[-60px] max-[575px]:text-[150px]">"</span>
                <p class="relative z-[1] m-0 text-[32px] font-medium leading-[1.6] text-white max-[575px]:text-[22px]">
                    Any fool can write code a computer understands.<br>
                    Good programmers write code humans understand.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $appFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="app-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Application Development FAQs
                </h2>
            </div>

            @foreach($appFaqs as $faq)
            <details class="group border-0 border-b border-solid border-[#e8e8e8]">
                <summary class="flex cursor-pointer list-none items-center justify-between gap-4 py-6 [&::-webkit-details-marker]:hidden">
                    <h3 class="m-0 text-[17px] font-bold leading-snug text-black max-[575px]:text-[15px]">{{ $faq['q'] }}</h3>
                    <span aria-hidden="true"
                          class="shrink-0 text-[24px] font-bold leading-none text-film-red transition-transform duration-300 group-open:rotate-45">+</span>
                </summary>
                <p class="m-0 pb-6 text-[15px] leading-[1.8] text-[#666]">{{ $faq['a'] }}</p>
            </details>
            @endforeach
        </div>
    </section>

    {{-- ====================== CTA ====================== --}}
    <section class="bg-white pt-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-10 text-center">
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Design. Build. Maintain.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Software You Can Still Change Next Year</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                We write code for the developer who inherits it, which is usually the same reason our clients
                stay. Clear architecture, documented decisions, and a stack chosen because it is well supported
                rather than because it was interesting that quarter.
            </p>
        </div>
    </section>

    {{-- ====================== BOTTOM ====================== --}}
    <section class="bg-white py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="grid grid-cols-1 items-center gap-12 lg:grid-cols-12">
                <div class="lg:col-span-5">
                    <img src="{{ asset('assets/img/home/home-04.png') }}"
                         alt="Brand Story"
                         loading="lazy"
                         decoding="async"
                         class="h-auto max-w-full">
                </div>

                <div class="lg:col-span-7">
                    <div class="mb-6">
                        <p class="m-0 mb-[10px] text-[56px] font-light text-black max-[575px]:text-[38px]">Brand</p>
                        <b class="text-[66px] font-extrabold text-black max-[575px]:block max-[575px]:text-[42px]">
                            Your St<img src="{{ asset('assets/img/shape-03.png') }}"
                                        alt=""
                                        aria-hidden="true"
                                        class="inline-block w-[78px] -mt-20 -mb-8 -ml-[10px] -mr-4 max-[575px]:mx-0 max-[575px]:mt-0 max-[575px]:mb-0 max-[575px]:w-10 max-[575px]:align-middle">ry
                        </b>
                    </div>

                    <div class="mb-5 text-[18px] leading-[1.8] text-neutral-600">
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
