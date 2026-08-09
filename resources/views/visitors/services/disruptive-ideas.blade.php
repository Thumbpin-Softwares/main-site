@extends('layout.visitor', [
    'title' => 'Creative Campaign & Disruptive Ideas Agency in Gurgaon',
    'description' => 'Thumbpin builds campaign ideas that get noticed — guerrilla and ambient marketing, moment marketing, experiential concepts and integrated rollouts for brands in Gurgaon and Delhi NCR.',
    'keywords' => 'creative campaign agency gurgaon, disruptive marketing agency india, guerrilla marketing agency delhi ncr, ambient marketing india, moment marketing agency, experiential marketing agency gurgaon, big idea advertising agency, integrated campaign agency india, out of the box marketing agency, creative concept agency gurugram',
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
$diFaqs = [
    ['q' => 'What counts as a "disruptive idea"?',
     'a' => "Something that earns attention rather than buying it — an idea people stop for, talk about, or share without being paid to. That can be a stunt, an unexpected use of a media space, a fast reaction to something happening in culture, or simply a campaign line sharp enough to cut through. What it is not is being strange for its own sake. Disruption without a point is just noise you paid for."],

    ['q' => 'How is this different from your other services?',
     'a' => "Branding builds the identity, strategy decides the direction, and the channel services execute consistently month after month. This is the layer that makes any of it memorable — the campaign idea itself. It usually rides on top of the others rather than replacing them, and it is the piece brands most often skip, which is why so much marketing is competent and forgettable."],

    ['q' => 'Do you guarantee a campaign will go viral?',
     'a' => "No, and be suspicious of anyone who does. Virality is an outcome, not a deliverable — it depends on timing, cultural mood and luck as much as on craft. What we can do is stack the odds: build ideas with a genuine hook, plan the seeding and amplification rather than hoping, and design so the campaign still works commercially even if it never breaks out."],

    ['q' => 'How does the idea process actually work?',
     'a' => "We start from the business problem and the audience rather than a blank page — the sharpest ideas usually come from a tight brief, not a loose one. From there we develop several distinct routes rather than one polished option with two obvious losers beside it, and pressure-test the shortlist for feasibility, cost and risk before you fall in love with something unbuildable."],

    ['q' => 'Do you handle production, or only the concept?',
     'a' => "Both. An idea that gets handed over as a deck and dies in execution was not worth having, so design, film, fabrication, on-ground and digital rollout run through the same team. Where a specialist supplier is genuinely better than us at something, we bring them in and manage them rather than pretending otherwise."],

    ['q' => 'How do you handle the risk in a bold campaign?',
     'a' => "By naming it upfront. We tell you plainly where an idea could be misread, which audiences might object, and what the recovery plan is if it lands badly — before you commit budget. Then you make an informed call. The genuinely dangerous campaigns are the ones nobody stress-tested because everyone in the room was excited."],

    ['q' => 'How long does a campaign take to develop?',
     'a' => "Two to four weeks from brief to presented routes for most projects, then production timelines depending on what the idea demands. Moment marketing is the exception — reacting to something in culture is worth doing in hours or not at all, which needs pre-agreed approval shortcuts rather than a normal sign-off chain."],

    ['q' => 'How do you measure whether it worked?',
     'a' => "Against what the campaign was for, agreed before launch. Earned reach and share of conversation where the goal was attention; footfall, enquiries or sales where the goal was action. Awards and internal enthusiasm are not results. If a campaign was beautiful and moved nothing, we would rather say so and learn from it than build a case study around impressions."],
];

$diUrl = url()->current();
$orgId = config('app.url') . '/#organization';

$diSchema = [
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
            '@id'         => $diUrl . '/#service',
            'name'        => 'Disruptive Ideas',
            'serviceType' => 'Creative Campaign Development',
            'url'         => $diUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Creative campaign development from Thumbpin — guerrilla and ambient marketing, moment marketing, experiential concepts and integrated rollouts, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $diUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $diFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $diUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',             'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',         'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Disruptive Ideas', 'item' => $diUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($diSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/disruptive-ideas.jpg') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Disruptive <span class="hero-title-outline">Ideas</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Campaigns that earn attention instead of renting it — and still have a commercial point.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['5','Ways In'],['3+','Routes Per Brief'],['6+','Years Experience']] as [$num, $label])
                <div class="text-center">
                    <div class="text-[42px] font-black leading-none text-film-red max-[767px]:text-[32px]">{{ $num }}</div>
                    <div class="mt-[6px] text-[11px] uppercase tracking-[2px] text-[#666]">{{ $label }}</div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Visible breadcrumb, mirroring the BreadcrumbList schema in @section('head'). --}}
    @include('inc.breadcrumb', ['trail' => [
        ['Home',     route('home')],
        ['Services', route('services')],
        ['Disruptive Ideas', null],
    ]])

    {{-- ====================== INTRO ====================== --}}
    <section class="bg-white py-[60px]">
        <div class="mx-auto max-w-[1140px] px-5">
            <h2 class="m-0 mb-[30px] text-center text-[42px] font-bold text-black max-[575px]:text-[32px]">
                Competent Is the Enemy
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Most marketing is not bad. It is correct, on-brand, on-brief — and completely forgettable,
                which is the more expensive failure because it looks like success on every report. Attention
                is the one thing no budget can simply buy any more. This is the part of the work that goes
                after it: a sharper idea, an unexpected place to put it, and enough discipline underneath
                that the idea still sells something.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="di-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Campaign Ideation',
                    'lead'  => "The central idea everything else hangs off — developed from the business problem, not from a blank page.",
                    'body'  => "The sharpest work comes out of a tight brief, so we spend real time narrowing what the campaign is actually for before anyone starts having ideas. Then we develop several genuinely distinct routes rather than one favourite flanked by two obvious losers, and pressure-test the shortlist for cost, feasibility and risk before you commit to something that cannot be built.",
                ],
                [
                    'title' => 'Guerrilla & Ambient Marketing',
                    'lead'  => "Putting the message where nobody expects it — streets, transit, buildings, everyday objects and the spaces between conventional media.",
                    'body'  => "Ambient work trades budget for surprise, which makes it one of the few tactics where a smaller brand can outmanoeuvre a larger one. It also has real constraints: permissions, safety, public liability and the risk of reading as vandalism rather than wit. We handle the clearances and tell you plainly where the line is, because the version of this that goes wrong goes wrong publicly.",
                ],
                [
                    'title' => 'Moment Marketing',
                    'lead'  => "Reacting to what is happening in culture while it is still happening — measured in hours, not weeks.",
                    'body'  => "A good reaction posted late is worthless, so the constraint here is approval speed rather than creative ability. We set up a standing brief, pre-agreed tone boundaries and a shortened sign-off chain so work can ship the same day. We also filter hard: most trending moments have nothing to do with your brand, and forcing a connection reads as desperate to precisely the audience you were trying to impress.",
                ],
                [
                    'title' => 'Experiential Concepts',
                    'lead'  => "Ideas people walk into rather than scroll past — installations, pop-ups and interactive builds designed to be experienced and shared.",
                    'body'  => "Experiential earns attention twice: once from the people present, and again from everyone who sees the footage. That second audience is usually far larger, so we design for the camera as deliberately as for the room — how it reads in a fifteen-second clip, where people will stand, what the shareable moment actually is. Concept, fabrication and installation run through one team.",
                ],
                [
                    'title' => 'Integrated Rollout',
                    'lead'  => "Carrying one idea across every channel without it thinning out into a logo and a colour.",
                    'body'  => "Most campaigns lose their idea in translation — the film is sharp, the social posts are generic, the on-ground activation is unrelated. We plan the rollout as one thing: what the idea becomes on each channel, in what order, and how the parts compound rather than merely coexist. Then we measure against what the campaign was for, agreed before launch rather than chosen afterwards to flatter the result.",
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
                    Friends <span class="text-film-red">On Board</span>
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
                    In advertising, not to be different<br>
                    is virtually suicidal.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $diFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="di-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Disruptive Ideas FAQs
                </h2>
            </div>

            @foreach($diFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Provoke. Build. Rollout.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Ideas Nobody Scrolls Past</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                The safest campaign in the room is usually the one that disappears without trace. We would
                rather bring you three routes with a real hook, tell you honestly where each one could go
                wrong, and let you choose — than deliver something nobody could possibly object to and
                nobody will possibly remember.
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
