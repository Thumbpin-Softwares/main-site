{{-- ====================== Footer Area ====================== --}}
{{--
    Styled with Tailwind utilities from css/shared.css (utilities only, no
    preflight). Because preflight is off here, resets that markup relies on
    (list-none, pl-0, m-0) are spelled out explicitly -- and border utilities
    must always be paired with `border-solid`, since without preflight the
    border-style defaults to `none` and a width alone renders nothing.

    The footer is unconditionally dark, so there is no light variant. The
    `footer_black` value some pages still pass through @extends is kept on the
    element for backwards compatibility but no longer changes anything.

    Mobile: the three link groups are <details> elements. They ship open, so
    with no JS (and for crawlers) every link is present and visible exactly as
    before; the inline script below collapses them only on narrow viewports,
    which takes the footer from roughly 2500px of centred list to one screen.
--}}
<footer class="{{ $footer_black ?? '' }} relative bg-black">

    {{-- Hairline + red bloom: gives the footer a top edge so it reads as its own
         plane rather than the page simply running out of content. --}}
    <div aria-hidden="true" class="h-px w-full bg-[#242424]"></div>
    <div aria-hidden="true" class="pointer-events-none absolute inset-x-0 top-0 h-[220px]"
         style="background:radial-gradient(ellipse 50% 100% at 50% 0,rgba(206,45,51,0.10),transparent 70%);"></div>

    <div class="relative mx-auto w-full max-w-[1200px] px-5">
        <div class="py-16 max-[991px]:py-14 max-[767px]:py-12 max-[575px]:py-10">

            {{-- ---------- Top: brand + contact ---------- --}}
            {{-- Left-aligned on mobile. The old max-[767px]:text-center stacked
                 everything on the centre line, which removed the one edge a
                 reader can scan down and is most of why this felt shapeless. --}}
            <div class="flex items-start justify-between gap-10 pb-10 max-[767px]:flex-col max-[767px]:gap-8 max-[767px]:pb-8">

                <div class="max-w-[320px]">
                    <a href="{{ route('home') }}" class="inline-block rounded focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-tp-red">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="Thumbpin"
                             class="inline-block w-full max-w-[220px] max-[767px]:max-w-[190px]">
                    </a>
                    <p class="mt-4 mb-0 font-body text-[13px] font-medium leading-[1.7] text-[#8f8f8f]">
                        A creative agency building brands, campaigns and the
                        systems that carry them.
                    </p>
                </div>

                {{-- Contact details. A footer with no way to reach the company is
                     the most common thing missing from one. --}}
                <div class="max-[767px]:w-full">
                    <span class="mb-4 block font-body text-[11px] font-bold uppercase tracking-[2px] text-white">
                        Get In Touch
                    </span>
                    <ul class="m-0 flex list-none flex-col gap-3 p-0">
                        @foreach([
                            ['mailto:brajesh@thumbpin.in', 'brajesh@thumbpin.in', 'far fa-envelope'],
                            ['tel:+919773511447',          '+91 97735 11447',     'fas fa-phone-alt'],
                        ] as [$href, $label, $icon])
                        <li>
                            <a href="{{ $href }}"
                               class="group inline-flex items-center gap-3 font-body text-[14px] font-medium text-[#c4c4c4] no-underline transition-colors duration-200 hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-4 focus-visible:outline-tp-red">
                                <span aria-hidden="true"
                                      class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-solid border-[#2a2a2a] text-[12px] text-[#8f8f8f] transition-colors duration-200 group-hover:border-tp-red group-hover:text-tp-red">
                                    <i class="{{ $icon }}"></i>
                                </span>
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                        <li class="flex items-start gap-3 pt-1 font-body text-[13px] leading-[1.6] text-[#8f8f8f]">
                            <span aria-hidden="true"
                                  class="inline-flex h-8 w-8 shrink-0 items-center justify-center rounded-full border border-solid border-[#2a2a2a] text-[12px]">
                                <i class="fas fa-map-marker-alt"></i>
                            </span>
                            <span class="max-w-[260px] pt-[6px]">
                                Spaze Itech Park, Tower B1, 6th Floor, Office 657,<br>
                                Sector 49, Gurugram &ndash; 122018
                            </span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- ---------- Middle: link groups ---------- --}}
            <div class="grid grid-cols-3 gap-x-12 gap-y-10 border-t border-solid border-[#1c1c1c] py-12 max-[991px]:gap-x-8 max-[767px]:grid-cols-2 max-[767px]:gap-y-8 max-[575px]:grid-cols-1 max-[575px]:gap-y-0 max-[575px]:py-4">
                @php
                $sections = [
                    ['Services', [
                        ['branding-agency',                         'Branding'],
                        ['strategy-agency',                         'Strategy'],
                        ['search-engine-optimization-seo-services', 'SEO Services'],
                        ['application-development',                 'Application Development'],
                        ['ai-automation',                           'AI Automation'],
                        ['digital-marketing',                       'Digital Marketing'],
                        ['social-media-management',                 'Social Media Management'],
                        ['video-production-in-gurgaon',             'Video Production'],
                    ]],
                    ['Solutions', [
                        ['performance-marketing-agency',  'Performance Marketing'],
                        ['real-estate-ads',               'Real Estate Ads'],
                        ['events-live',                   'Events & Live'],
                        ['disruptive-ideas',              'Disruptive Ideas'],
                        ['friendship-with-benefits',      'Friendship With Benefits'],
                        // Video Production moved up to Services; this column keeps only
                        // the location-targeted landing pages.
                        ['advertising-agency-in-gurgaon', 'Advertising Agency in Gurgaon'],
                    ]],
                    ['Company', [
                        ['home',     'Home'],
                        ['about',    'About Us'],
                        ['services', 'All Services'],
                        ['work',     'Our Work'],
                        ['contact',  'Contact Us'],
                        ['terms',    'Terms & Conditions'],
                    ]],
                ];
                @endphp

                {{-- No rule under the last group on mobile: the social row below
                     already opens with a border-t, and the two together drew a
                     pair of parallel lines with a gap between them. --}}
                @foreach($sections as [$heading, $links])
                <details open class="foot-group border-solid border-[#1c1c1c] {{ $loop->last ? '' : 'max-[575px]:border-b' }}">
                    {{-- min-h keeps the mobile tap target above 44px. On desktop
                         the summary is an inert heading: pointer-events-none stops
                         it toggling, and the chevron is hidden. --}}
                    <summary class="flex min-h-[52px] cursor-pointer list-none items-center justify-between gap-4 py-0 min-[576px]:pointer-events-none min-[576px]:min-h-0 min-[576px]:py-0 [&::-webkit-details-marker]:hidden">
                        <h4 class="m-0 font-body text-[12px] font-bold uppercase tracking-[1.5px] text-white">
                            {{ $heading }}
                        </h4>
                        <span aria-hidden="true"
                              class="foot-chev text-[13px] leading-none text-[#777] transition-transform duration-300 min-[576px]:hidden">
                            <i class="fas fa-chevron-down"></i>
                        </span>
                    </summary>

                    <ul class="m-0 flex list-none flex-col gap-[10px] p-0 pt-4 max-[575px]:gap-3 max-[575px]:pb-5 max-[575px]:pt-1">
                        @foreach($links as [$route, $label])
                        <li>
                            <a href="{{ route($route) }}"
                               class="inline-block font-body text-[13px] font-medium leading-[1.6] text-[#9a9a9a] no-underline transition-colors duration-200 hover:text-tp-red focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-tp-red max-[575px]:py-1 max-[575px]:text-[14px]">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </details>
                @endforeach
            </div>

            {{-- ---------- Social ---------- --}}
            <div class="flex items-center gap-4 border-t border-solid border-[#1c1c1c] py-8 max-[575px]:flex-col max-[575px]:items-start max-[575px]:gap-4 max-[575px]:py-7">
                <span class="font-body text-[11px] font-bold uppercase tracking-[2px] text-[#777]">
                    Follow Us
                </span>
                <ul class="m-0 flex list-none gap-3 p-0">
                    @foreach([
                        ['https://www.facebook.com/ThumbpinAgency',        'Facebook',  'fab fa-facebook-f'],
                        ['https://twitter.com/ThumbpinAgency',            'Twitter',   'fab fa-twitter'],
                        ['https://www.instagram.com/ThumbpinAgency',      'Instagram', 'fab fa-instagram'],
                        ['https://in.linkedin.com/company/thumbpinagency','LinkedIn',  'fab fa-linkedin-in'],
                        ['https://www.behance.net/thumbpinagency',        'Behance',   'fab fa-behance'],
                    ] as [$url, $label, $icon])
                    <li>
                        {{-- 44px on mobile: the old 36px circles sat under the
                             minimum comfortable touch target. --}}
                        <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $label }}"
                           class="inline-flex h-10 w-10 items-center justify-center rounded-full border border-solid border-[#242424] text-[15px] text-[#9a9a9a] no-underline transition-all duration-200 hover:border-tp-red hover:bg-tp-red hover:text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-tp-red max-[575px]:h-11 max-[575px]:w-11">
                            <i class="{{ $icon }}"></i>
                        </a>
                    </li>
                    @endforeach
                </ul>
            </div>

            {{-- ---------- Bottom: copyright ---------- --}}
            <div class="flex items-center justify-between gap-4 border-t border-solid border-[#1c1c1c] pt-7 max-[575px]:flex-col max-[575px]:items-start max-[575px]:gap-2 max-[575px]:pt-6">
                <p class="m-0 font-body text-[12px] font-medium text-[#7d7d7d]">
                    &copy; {{ date('Y') }} Thumbpin. All rights reserved.
                </p>
                <p class="m-0 font-body text-[12px] font-medium text-[#7d7d7d]">
                    Designed by Developers at Thumbpin
                </p>
            </div>

        </div>
    </div>
</footer>

<style>
/* Chevron flips when the group is open. Mobile only -- on desktop the summary
   is inert and the marker is hidden. */
.foot-group[open] .foot-chev { transform: rotate(180deg); }
@media (prefers-reduced-motion: reduce) {
    .foot-chev { transition: none; }
}
</style>

<script>
/* The groups are authored `open` so that a no-JS visitor -- and any crawler --
   sees the full link list. This closes them on phones only, where eight stacked
   link lists otherwise make the footer taller than the page above it.
   Runs once on load; resizing across the breakpoint is not worth re-syncing. */
(function () {
    if (window.matchMedia('(max-width: 575px)').matches) {
        document.querySelectorAll('.foot-group').forEach(function (d) { d.open = false; });
    }
})();
</script>
{{-- ====================== End Footer Area ====================== --}}
