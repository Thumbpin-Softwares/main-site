@extends('layout.visitor', [
    'title' => 'AI Automation Agency in Gurgaon | WhatsApp, Instagram & Email Automation',
    'description' => 'Thumbpin builds AI automation for WhatsApp, Instagram, Facebook, LinkedIn and email — auto-replies, lead capture, follow-up sequences and CRM workflows that run without your team chasing them.',
    'keywords' => 'ai automation agency gurgaon, whatsapp automation india, whatsapp business api agency, instagram dm automation, facebook messenger automation, linkedin outreach automation, email marketing automation agency, ai chatbot for business, marketing automation gurgaon, lead automation system, crm automation agency, business process automation india',
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
$aiFaqs = [
    ['q' => 'What does AI automation actually mean for my business?',
     'a' => "It means the repetitive parts of your day stop needing a person. A customer messages on WhatsApp at 11pm and gets a real answer. A lead fills your form and is followed up in ninety seconds instead of the next morning. An enquiry lands in your CRM already tagged with where it came from. Nothing here replaces your team — it removes the copy-pasting, the chasing, and the forgetting."],

    ['q' => 'Do you use the official WhatsApp Business API?',
     'a' => "Yes. We set up automation on the official WhatsApp Business Platform, which is the only way to send at scale without risking your number. Unofficial tools that automate a personal WhatsApp app get numbers banned, usually right after you have built your entire customer list on them. We would rather do the approval paperwork than hand you something that dies in a month."],

    ['q' => 'Will automated replies sound like a robot?',
     'a' => "That is the main thing we work on. We write the flows in your brand voice, keep answers short, and — crucially — build a clean handoff to a human the moment the conversation goes past what the automation knows. A bot that admits it is fetching a colleague reads far better than one that keeps confidently guessing."],

    ['q' => 'Can you automate Instagram and Facebook DMs and comments?',
     'a' => "Yes, through the official Meta APIs. Common setups: auto-replying to comments on an ad, sending a price list or brochure when someone DMs a keyword, capturing the enquiry into your CRM, and routing anything unusual to a person. Story replies and click-to-WhatsApp ads can feed the same flow so every channel lands in one inbox."],

    ['q' => 'Is LinkedIn automation safe for my account?',
     'a' => "Only within limits, and we are strict about them. LinkedIn actively restricts accounts that behave like software — mass connection requests, identical messages, inhuman volume. We keep outreach to conservative daily caps with personalised copy, and focus more on the parts with no risk at all: routing replies, syncing leads to your CRM, and automating follow-up reminders rather than the first contact."],

    ['q' => 'How long does it take to set up?',
     'a' => "A single-channel setup — WhatsApp auto-replies with lead capture, say — is usually live in two to three weeks including platform approvals. A full multi-channel system with CRM sync and email sequences runs four to eight weeks. Approvals from Meta are the usual bottleneck and are outside anyone's control, so we start those on day one."],

    ['q' => 'Does this work with the tools we already use?',
     'a' => "In most cases, yes. We connect to mainstream CRMs, spreadsheets, calendars, payment tools and email platforms through their APIs. If something in your stack has no integration path, we will tell you before the project starts rather than discovering it halfway through and quietly building a workaround you have to maintain."],

    ['q' => 'What happens after the automation goes live?',
     'a' => "It needs watching. Platforms change their APIs, message templates get rejected, and real customers ask things your flows never anticipated. We review the conversations that failed, fix the gaps, and adjust — automation set up once and never revisited slowly gets worse at exactly the moments that matter."],
];

$aiUrl = url()->current();
$orgId = config('app.url') . '/#organization';

$aiSchema = [
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
            '@id'         => $aiUrl . '/#service',
            'name'        => 'AI Automation',
            'serviceType' => 'AI Automation',
            'url'         => $aiUrl,
            'provider'    => ['@id' => $orgId],
            'areaServed'  => ['@type' => 'City', 'name' => 'Gurugram'],
            'description' => 'AI automation for WhatsApp, Instagram, Facebook, LinkedIn and email — auto-replies, lead capture, follow-up sequences and CRM workflows from Thumbpin, serving Gurgaon and Delhi NCR.',
        ],
        [
            '@type'      => 'FAQPage',
            '@id'        => $aiUrl . '/#faq',
            'mainEntity' => array_map(fn ($faq) => [
                '@type'          => 'Question',
                'name'           => $faq['q'],
                'acceptedAnswer' => ['@type' => 'Answer', 'text' => $faq['a']],
            ], $aiFaqs),
        ],
        [
            '@type' => 'BreadcrumbList',
            '@id'   => $aiUrl . '/#breadcrumb',
            'itemListElement' => [
                ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',          'item' => config('app.url') . '/'],
                ['@type' => 'ListItem', 'position' => 2, 'name' => 'Services',      'item' => route('services')],
                ['@type' => 'ListItem', 'position' => 3, 'name' => 'AI Automation', 'item' => $aiUrl],
            ],
        ],
    ],
];
@endphp
<script type="application/ld+json">
{!! json_encode($aiSchema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT) !!}
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
             style="background-image:url('{{ asset('img/services/ai-automation.webp') }}');"></div>
        <div class="absolute inset-0 z-[2] bg-black/60"></div>
        <div class="absolute inset-0 z-[2]" style="background:radial-gradient(ellipse at center,transparent 30%,#000 85%);"></div>

        <div class="relative z-[3] mx-auto max-w-[900px] text-center">
            <h1 class="m-0 mb-6 text-[clamp(44px,9vw,110px)] font-extrabold uppercase leading-[0.92] tracking-[-2px] text-white opacity-0 translate-y-[30px] animate-hero-reveal [animation-delay:300ms]">
                AI <span class="hero-title-outline">Automation</span>
            </h1>

            <p class="mx-auto mb-10 max-w-[620px] text-[18px] font-light leading-[1.7] text-[#999] opacity-0 animate-hero-reveal [animation-delay:600ms]">
                WhatsApp, Instagram, Facebook, LinkedIn and email — automated to answer, capture and follow up while your team sleeps.
            </p>

            <div class="flex flex-wrap justify-center gap-[50px] opacity-0 animate-hero-reveal [animation-delay:900ms] max-[767px]:gap-[30px]">
                @foreach([['5','Channels Automated'],['24/7','Always Responding'],['6+','Years Experience']] as [$num, $label])
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
                Stop Losing Leads to Slow Replies
            </h2>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                Most businesses do not lose enquiries because their marketing failed. They lose them because
                someone messaged on WhatsApp at 9pm, or dropped a comment under an ad, and nobody got to it
                for eleven hours. We build automation across the channels your customers already use — so
                every message gets answered, every lead lands in one place, and follow-up happens whether
                or not anyone remembers to do it.
            </p>
        </div>
    </section>

    {{-- ====================== SERVICES ====================== --}}
    {{--
        Same editorial row layout as the other service pages: number + title on a
        sticky left rail, copy on the right.
    --}}
    <section class="bg-white pb-20" id="ai-services">
        <div class="mx-auto max-w-[1140px] px-5">
            @php
            $services = [
                [
                    'title' => 'WhatsApp Automation',
                    'lead'  => "Built on the official WhatsApp Business Platform — auto-replies, lead capture, order updates and follow-up sequences on the channel your customers actually check.",
                    'body'  => "Enquiries get an instant, useful reply instead of a read receipt six hours later. Common questions about pricing, availability and location are answered automatically, appointments and quotes are confirmed without a phone call, and anything the automation cannot handle is handed to a human with the conversation history attached. We use the official API rather than an unofficial workaround, because those get numbers banned once your entire customer list is sitting on them.",
                ],
                [
                    'title' => 'Instagram & Facebook Automation',
                    'lead'  => "DM and comment automation through the Meta APIs — turning ad engagement into captured leads instead of unread notifications.",
                    'body'  => "Someone comments on your ad and gets a reply with the details. Someone DMs a keyword and receives your catalogue, price list or booking link straight away. Story replies and click-to-WhatsApp ads feed into the same flow, so a lead from Instagram and a lead from WhatsApp end up in one inbox rather than two apps nobody checks consistently. Every conversation is logged and attributed to the campaign that produced it.",
                ],
                [
                    'title' => 'LinkedIn Automation',
                    'lead'  => "Outreach and follow-up for B2B, kept inside limits that will not get the account restricted.",
                    'body'  => "Connection requests and messages go out at conservative, human-scale volumes with copy written per segment rather than one template blasted at a list. The bigger win is behind the scenes: replies routed to the right person, leads synced into your CRM automatically, and follow-up reminders that fire on schedule. We are deliberately cautious here — LinkedIn restricts accounts that behave like software, and a banned profile costs more than the outreach was worth.",
                ],
                [
                    'title' => 'Email Automation',
                    'lead'  => "Sequences that run themselves — welcome flows, nurture series, abandoned enquiry follow-ups and re-engagement.",
                    'body'  => "Emails triggered by what someone actually did rather than by a calendar: downloaded a brochure, requested a quote, went quiet after three conversations. We handle segmentation, deliverability setup (SPF, DKIM, DMARC — the unglamorous part that decides whether you land in inbox or spam), and reporting that shows which sequence produced revenue instead of which one had a nice open rate.",
                ],
                [
                    'title' => 'Workflow & CRM Automation',
                    'lead'  => "The connective layer — moving leads, data and tasks between the tools you already use so nothing needs manual re-entry.",
                    'body'  => "Form submissions, ad leads and chat enquiries flow into your CRM already tagged with source and campaign. Deals move stages automatically, owners get notified, reports build themselves, and reminders fire when a lead has gone cold. This is the least visible part of the work and usually the highest return, because it removes the copy-pasting between systems where information quietly gets lost.",
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

    {{-- ====================== CHANNELS ====================== --}}
    {{--
        Structural twin of the Tech Stack block on /services/application-development
        (same grid, same card treatment) -- what fills it is channels rather than
        libraries, since that is what a buyer is shopping for here.
    --}}
    <section class="bg-[#f9f9f9] py-20" id="channels">
        <div class="mx-auto max-w-[1140px] px-5">
            <div class="mb-12 max-w-[760px]">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">What We Automate</p>
                <h2 class="m-0 mb-5 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    Channels We Work Across
                </h2>
                <p class="m-0 text-[17px] leading-[1.8] text-[#666]">
                    Every one of these runs on the platform's official API. It is slower to set up than the
                    unofficial tools — and it is the difference between a system you can build a business on
                    and one that gets your account banned in month three.
                </p>
            </div>

            @php
            $channels = [
                ['Messaging', 'Where your customers already are',      ['WhatsApp', 'Instagram DM', 'Facebook Messenger']],
                ['Outreach',  'B2B conversations, at safe volumes',    ['LinkedIn', 'Email']],
                ['Behind It', 'The layer that stops leads going cold', ['CRM Sync', 'Workflows']],
            ];
            @endphp

            <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
                @foreach($channels as [$group, $note, $items])
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
                    Brands We've <span class="text-film-red">Worked With</span>
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
                    Automation applied to an efficient operation<br>
                    will magnify the efficiency.
                </p>
            </div>
        </div>
    </section>

    {{-- ====================== FAQ ====================== --}}
    {{--
        <details>/<summary> rather than a JS accordion: the answers stay in the DOM
        and remain crawlable whether or not the panel is open, and it works with
        no script at all. $aiFaqs is defined in @section('head') so the same array
        feeds the FAQPage schema -- copy and markup cannot drift apart.
    --}}
    <section class="bg-white py-20" id="ai-faq">
        <div class="mx-auto max-w-[900px] px-5">
            <div class="mb-12 text-center">
                <p class="m-0 mb-3 text-[11px] font-bold uppercase tracking-[3px] text-film-red">Common Questions</p>
                <h2 class="m-0 text-[42px] font-bold leading-[1.15] text-black max-[575px]:text-[30px]">
                    AI Automation FAQs
                </h2>
            </div>

            @foreach($aiFaqs as $faq)
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
                <h4 class="m-0 mb-[10px] text-[38px] font-normal text-[#666] max-[575px]:text-[26px]">Answer. Capture. Follow Up.</h4>
                <h2 class="m-0 text-[42px] font-bold text-black max-[575px]:text-[32px]">Systems That Work While You Don't</h2>
            </div>
            <p class="mx-auto m-0 max-w-[900px] text-center text-[18px] leading-[1.8] text-[#666]">
                The point is not to sound clever about AI. It is that a customer who messages you at midnight
                gets an answer, the lead reaches the right person with context attached, and the follow-up
                happens on the fourth day whether or not anyone remembered.
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
