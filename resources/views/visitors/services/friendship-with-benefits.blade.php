@extends('layout.visitor', [
    'title' => 'White-Label Creative Partner for Agencies in Gurgaon',
    'description' => 'Partner with Thumbpin for creative execution — white-label design and production, overflow capacity, one-off project collaboration and pitch support for agencies, studios and brand teams.',
    'keywords' => 'white label creative agency india, white label design partner gurgaon, creative production partner for agencies, outsourced design team india, overflow design capacity, agency collaboration india, freelance creative partner gurgaon, pitch support agency, offshore creative studio india, design and production partner delhi ncr',
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
$fwbFaqs = [
    ['q' => 'Who is this for?',
     'a' => "Agencies that have won more than they can staff, studios missing a discipline they do not want to hire for permanently, in-house brand teams without enough hands, and founders who need proper creative for one project rather than a retainer. If you need good work made and do not need a full agency relationship to get it, this is the arrangement."],

    ['q' => 'Do you work white-label under our brand?',
     'a' => "Yes, and it is the most common version of this. Files are delivered unbranded and in your naming conventions, we join client calls as part of your team if that helps or stay entirely invisible if it does not, and we do not claim the work publicly or in our portfolio without your written permission. Your client never needs to know we exist."],

    ['q' => 'What can you actually take on?',
     'a' => "Brand identity and design systems, campaign creative and adaptations, packaging and print, web and application design and build, film and video production, social content at volume, and presentation and pitch design. Where something falls outside what we do well, we will say so rather than accepting the brief and quietly learning on your project."],

    ['q' => 'How fast can you start?',
     'a' => "For overflow work, usually within a week — sometimes days if it is a discipline we have capacity in. That is the whole point of the arrangement: you should not have to run a hiring process to absorb a spike that lasts six weeks. For larger ongoing engagements we scope properly first, because starting fast on the wrong understanding costs more than starting a week later."],

    ['q' => 'How does pricing work?',
     'a' => "Project rates for defined scopes, and monthly retainers where the flow of work is steady and you want reserved capacity. Retainers are cheaper per unit and get priority in scheduling. We quote before starting rather than billing open-ended hours, and where a scope is genuinely unknowable we say that too instead of inventing a number that gets revised upward later."],

    ['q' => 'Who owns the work?',
     'a' => "You do, on final payment — full transfer of files, source assets and rights, so you can pass them to your client with nothing withheld. There is no licensing arrangement where we retain rights to work you paid for, and no editable-source-file upsell. That would make us a liability in your relationship with your client, which defeats the purpose."],

    ['q' => 'How do we communicate on a project?',
     'a' => "One point of contact on our side, working in whatever your team already uses rather than asking you to adopt our tools. For white-label work we adapt to your process, your file structures and your review cycles — the arrangement only works if we reduce coordination load rather than adding another system for you to manage."],

    ['q' => 'What if we only have one project?',
     'a' => "That is fine, and it is where most of these relationships start. One project with no commitment attached is the sensible way to find out whether working together is any good, and we would rather you test us on something real than sign something long before either side knows. Plenty of these stay one-offs, and that is a perfectly good outcome."],
];

$fwbUrl = url()->current();
$orgId  = config('app.url') . '/#organization';

$fwbSchema = [
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
            '@id'         => $fwbUrl . '/#service',
            'name'        => 'Friendship With Benefits',
            'serviceType' => 'White-Label Creative Partnership',
            'url'         => $fwbUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'White-label creative partnership from Thumbpin — design and production support, overflow capacity, project collaboration and pitch support for agencies, studios and brand teams.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $fwbUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $fwbFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $fwbUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',                     'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',                 'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Friendship With Benefits', 'item' => $fwbUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($fwbSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/freinds-with-benefits.avif') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Friendship With <span class="hero-title-outline">Benefits</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Partner with us to make beautiful creatives — under your name, on your timeline, with no strings attached.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['5','Ways To Work'],['0','Strings Attached'],['6+','Years Experience']] as [$num, $label])
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
                Not Every Relationship Needs a Contract
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Sometimes you do not need an agency. You need hands — a team that can take a brief, make
                something genuinely good, and hand it back in your file structure with your name on it.
                That is what this is: creative and production capacity you can borrow when you have won more
                than you can staff, when a discipline is missing, or when there is one project worth doing
                properly and no reason to sign a year to get it done.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="fwb-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'White-Label Creative',
                    'lead'  => "Work delivered under your brand — unbranded files, your naming conventions, and no claim to the credit unless you offer it.",
                    'body'  => "We can join client calls as part of your team, or stay entirely invisible and deal only with you. Files arrive structured the way your team works rather than the way ours does, and nothing appears in our portfolio or on our social without your written permission. Your client relationship stays yours; we are simply where some of the work got made.",
                ],
                [
                    'title' => 'Overflow & Capacity Support',
                    'lead'  => "For the month you won three pitches at once — extra hands without a hiring process for a spike that lasts six weeks.",
                    'body'  => "Hiring against a temporary peak is how agencies end up over-staffed the following quarter, and turning work away is how they lose the client for the year after. We absorb the surge instead: usually starting within a week, sometimes days, working to your existing process rather than importing ours. When the peak passes, it simply stops — no notice period, no awkward conversation.",
                ],
                [
                    'title' => 'Project Collaboration',
                    'lead'  => "One brief, one scope, one price — for when there is a single thing worth doing well and no appetite for a retainer.",
                    'body'  => "Brand identity, a campaign, a website, a film, a packaging range. We scope it, quote it before starting, and deliver it. Most of these relationships begin here, which is as it should be: one real project tells both sides more about whether this works than any amount of credentials, and there is no commitment waiting on the other side of it.",
                ],
                [
                    'title' => 'Retained Design & Production',
                    'lead'  => "Reserved monthly capacity for partners with a steady flow — cheaper per unit, and first in the queue.",
                    'body'  => "Where work arrives predictably, a retainer beats project-by-project on both cost and speed: we hold capacity for you, scheduling stops being a negotiation every time something lands, and the team stays familiar with your clients and standards rather than relearning them each brief. We are explicit about what the retainer covers and what sits outside it, so nobody is surprised at invoicing.",
                ],
                [
                    'title' => 'Pitch Support',
                    'lead'  => "Helping you win it — concepts, decks and mockups produced to the standard the pitch deserves, on the timeline pitches actually run to.",
                    'body'  => "Pitches arrive with impossible deadlines and no spare capacity, which is exactly when creative quality slips and the pitch is lost on the thing you could most have controlled. We build the creative work, the visualisations and the presentation design so your team can concentrate on the argument. Terms for pitch work are agreed upfront, including what happens if you win.",
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

    {{-- No CLIENTS section here, unlike the other service pages. This page sells to
         agencies and studios rather than end clients, and a wall of other people's
         logos reads as competition to that audience rather than reassurance. --}}

    {{-- ====================== QUOTE ====================== --}}
    <section class="relative bg-black py-[100px]">
        <div class="mx-auto max-w-[1140px] px-5">
            {{-- The oversized quote mark is a ::before in CSS terms; here it is a
                 real element so it stays pure Tailwind. aria-hidden as it is decor. --}}
            <div class="relative mx-auto max-w-[900px] text-center">
                <span aria-hidden="true"
                      class="pointer-events-none absolute left-1/2 top-[-80px] z-0 -translate-x-1/2 font-serif text-[200px] leading-none text-film-red/50 max-[575px]:top-[-60px] max-[575px]:text-[150px]">"</span>
                <p class="relative z-[1] m-0 text-[32px] font-medium leading-[1.6] text-white max-[575px]:text-[22px]">
                    If you want to go fast, go alone.<br>
                    If you want to go far, go together.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $fwbFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="fwb-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Partnership FAQs
                </h2>
            </div>

            @foreach($fwbFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Brief. Build. Hand Over.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Your Name On Our Work</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Got a specific project for us? Send it over. No pitch process, no minimum commitment, no
                onboarding deck — just tell us what needs making and when you need it, and we will tell you
                honestly whether we are the right people for it.
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
