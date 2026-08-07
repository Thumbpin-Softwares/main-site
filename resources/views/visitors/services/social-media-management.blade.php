@extends('layout.visitor', [
    'title' => 'Social Media Management Agency in Gurgaon',
    'description' => 'Thumbpin manages social media for brands in Gurgaon and Delhi NCR — content calendars, community management, reels and short-form video, reputation management and monthly reporting.',
    'keywords' => 'social media management agency gurgaon, social media management company india, instagram management agency, facebook page management, linkedin content agency, community management agency, reel production gurgaon, short form video agency, online reputation management india, social media content calendar, social media agency delhi ncr',
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
$smmFaqs = [
    ['q' => "What is the difference between social media management and social media marketing?",
     'a' => "Management is the ongoing running of your channels — planning the calendar, producing content, publishing, replying to comments and DMs, and reporting on what happened. Marketing usually means the paid layer on top: ad budgets, targeting and campaign optimisation. We do both, but they are separate engagements, and confusing the two is how brands end up paying for ads pointing at an account nobody is maintaining."],

    ['q' => "Which platforms do you manage?",
     'a' => "Instagram and Facebook for most consumer brands, LinkedIn where the audience is B2B, and X where the category has a real conversation happening. Short-form video — Reels and YouTube Shorts — runs across whichever of those apply. We would rather run three channels properly than seven badly, so part of the first month is deciding which ones actually deserve your time."],

    ['q' => "How much content do you produce each month?",
     'a' => "It depends on the channels and the format mix, and we set it during planning rather than selling a fixed number. A typical retainer covers a monthly calendar of static posts, carousels and reels, plus stories through the month. Volume matters far less than consistency — an account that posts eight considered things a month beats one that posts twenty forgettable ones and then goes quiet."],

    ['q' => "Do you handle replying to comments and DMs?",
     'a' => "Yes, community management sits inside the retainer rather than being an add-on. Someone asking about price under a post is a lead, and leaving it unanswered for three days is the most common way brands waste the reach they just paid for. We agree response guidelines with you up front, and escalate anything sensitive rather than improvising."],

    ['q' => "Do you shoot reels and video, or only edit?",
     'a' => "Both. We run shoot days for reels and short-form video, and we also work with footage you already have — product clips, event coverage, founder pieces. Short-form is where organic reach still exists on Instagram, so it is treated as a core part of the calendar rather than something added when there is budget left over."],

    ['q' => "How do you report on results?",
     'a' => "A monthly report covering reach, engagement, follower growth, saves and shares, and — where the tracking allows — the enquiries and website traffic that came from social. We are explicit about what the platforms can and cannot attribute. Follower count on its own is the easiest number to make look good and the least useful, so it is never the headline."],

    ['q' => "What do you need from us to get started?",
     'a' => "Access to your accounts, whatever brand assets and past content exist, and one person on your side who can approve the calendar without a committee. The last one matters more than people expect — most social delays are approval delays, not production delays. Onboarding usually takes two weeks before the first calendar goes live."],

    ['q' => "Is there a minimum commitment?",
     'a' => "We work on retainers of three months minimum, because social does not produce anything meaningful in four weeks. The first month is largely setup, testing formats and finding out what your audience responds to; the results that justify the spend generally show up in months two and three."],
];

$smmUrl = url()->current();
$orgId  = config('app.url') . '/#organization';

$smmSchema = [
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
            '@id'         => $smmUrl . '/#service',
            'name'        => 'Social Media Management',
            'serviceType' => 'Social Media Management',
            'url'         => $smmUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'Social media management from Thumbpin — content calendars, community management, reels and short-form video, reputation management and monthly reporting, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $smmUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $smmFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $smmUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',                    'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',                'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'Social Media Management', 'item' => $smmUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($smmSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/digital-marketing.webp') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                Social Media <span class="hero-title-outline">Management</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                Calendars, content, community and reporting — your channels run properly, every week, not in bursts.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['6','Platforms Managed'],['5','Core Deliverables'],['6+','Years Experience']] as [$num, $label])
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
                Consistency Beats Bursts
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Most brands do not have a content problem. They have a rhythm problem — three weeks of good
                posts, then a month of silence while everyone is busy, then a scramble to catch up. Social
                media management is the discipline of turning that into something steady: a calendar planned
                in advance, content produced before it is needed, comments answered the same day, and a
                monthly read on what actually worked.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="smm-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'Social Media Strategy',
                    'lead'  => "The blueprint before the posting — who you are talking to, on which platforms, about what, and how you will know whether it worked.",
                    'body'  => "We start with your audience and your category rather than a template calendar: what your competitors are doing, where your buyers actually spend time, and which formats earn attention in your space. That produces clear goals, a channel mix, content pillars and a measurement plan — so every post afterwards has a reason to exist beyond filling a slot.",
                ],
                [
                    'title' => 'Content Strategy & Calendar',
                    'lead'  => "A month planned in advance — static posts, carousels, reels and stories mapped to pillars rather than assembled the night before.",
                    'body'  => "Content is the part of social people see, and the part that most often gets rushed. We build the calendar ahead of the month, produce against it, and route everything through one approval cycle instead of a rolling scramble. Mixing formats deliberately matters too: carousels for saves, reels for reach, stories for the daily presence that keeps an account from looking dormant.",
                ],
                [
                    'title' => 'Community Management',
                    'lead'  => "Comments, DMs and mentions answered the same day — because an unanswered question under a post is a lead you already paid to get.",
                    'body'  => "Someone asking about price, availability or delivery in your comments is further down the funnel than anyone you will reach with the next post. We agree tone and response guidelines with you, handle the routine questions, and escalate anything sensitive rather than improvising. Conversations that turn into enquiries get passed to your team with the context attached.",
                ],
                [
                    'title' => 'Reels & Short-Form Video',
                    'lead'  => "Shoots and edits for the format where organic reach still exists — treated as core to the calendar, not an occasional extra.",
                    'body'  => "We run shoot days for reels and short-form video, and cut from footage you already have — product clips, event coverage, founder pieces, customer stories. Hooks are written for sound-off viewing, captions are burned in, and formats are adapted per platform rather than one export posted everywhere. Volume is planned so the account is never waiting on a shoot.",
                ],
                [
                    'title' => 'Reputation Management & Reporting',
                    'lead'  => "Monitoring what is being said about you, and a monthly report that separates the numbers that matter from the ones that flatter.",
                    'body'  => "We track mentions and reviews, respond to criticism in a way that does not escalate it, and flag the patterns worth acting on rather than only the individual complaints. Reporting covers reach, engagement, saves, shares, follower growth and — where tracking allows — enquiries and site traffic from social. Follower count is never the headline; it is the easiest number to make look good and the least useful.",
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

    {{-- ====================== PLATFORMS ====================== --}}
    {{--
        Structural twin of the Tech Stack block on /services/application-development
        and the Channels block on /services/ai-automation -- same grid and card
        treatment, filled with what a buyer is shopping for on this page.
    --}}
    <section class="bg-[#f9f9f9] py-20" id="platforms">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-12 max-w-[760px]">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Where We Work</p>
                <h2 class="m-0 mb-5 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Platforms We Manage
                </h2>
                <p class="m-0 text-[17px] leading-[1.8] text-[#666]">
                    Not all of them, and not all at once. Part of the first month is working out which of these
                    your audience is genuinely on — three channels run properly will always beat seven kept
                    barely alive.
                </p>
            </div>

            @php
            $platforms = [
                ['Consumer',     'Where most brands need daily presence', ['Instagram', 'Facebook']],
                ['Professional', 'B2B audiences and company voice',       ['LinkedIn', 'X (Twitter)']],
                ['Video First',  'Where organic reach still lives',       ['Reels', 'YouTube Shorts']],
            ];
            @endphp

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @foreach($platforms as [$group, $note, $items])
                <div class="border-0 border-t-2 border-solid border-film-red bg-white p-7 max-[575px]:p-6">
                    <h3 class="m-0 mb-2 text-[20px] font-extrabold uppercase tracking-[0.5px] text-black">{{ $group }}</h3>
                    <p class="m-0 mb-6 text-[14px] leading-[1.6] text-[#777]">{{ $note }}</p>
                    <ul class="m-0 flex list-none flex-wrap gap-2 p-0">
                        @foreach($items as $item)
                        <li class="rounded-full border border-solid border-[#e0e0e0] bg-[#fafafa] px-4 py-[7px] text-[14px] font-semibold leading-none text-[#333]">
                            {{ $item }}
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
                    Social media is not a media.<br>
                    The key is to listen, engage and build relationships.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $smmFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="smm-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Social Media Management FAQs
                </h2>
            </div>

            @foreach($smmFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Innovate. Influence. Inspire.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Channels That Stay Alive</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Every platform has its own algorithm, its own formats and its own reasons people open it, so
                the same post shipped everywhere performs nowhere. We plan per channel, produce ahead of the
                month, and stay in the comments — which is the unglamorous half of social media that decides
                whether the rest of it was worth doing.
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
