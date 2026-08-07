{{-- ====================== Footer Area ====================== --}}
{{--
    Styled with Tailwind utilities from css/shared.css (utilities only, no
    preflight). Because preflight is off here, resets that markup relies on
    (list-none, pl-0, m-0) are spelled out explicitly.

    The footer is unconditionally dark, so there is no light variant. The
    `footer_black` value some pages still pass through @extends is kept on the
    element for backwards compatibility but no longer changes anything.
--}}
<footer class="{{ $footer_black ?? '' }} bg-black">
    <div class="mx-auto w-full max-w-[1200px] px-5">
        <div class="py-16 max-[991px]:py-14 max-[767px]:py-12 max-[575px]:py-10">

            {{-- Top Row: Logo + Social --}}
            <div class="flex items-start justify-between gap-8 pb-10 border-b border-[#1e1e1e] max-[767px]:flex-col max-[767px]:items-center max-[767px]:gap-6 max-[767px]:text-center max-[767px]:pb-8">
                <div>
                    <a href="{{ route('home') }}" class="inline-block">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="Thumbpin"
                             class="inline-block w-full max-w-[240px] max-[767px]:max-w-[200px] max-[575px]:max-w-[180px]">
                    </a>
                    <p class="mt-3 mb-0 font-body text-[13px] font-medium text-[#777]">
                        Best Creative Agency
                    </p>
                </div>

                <div class="max-[767px]:w-full">
                    <span class="block mb-3 font-body text-[11px] font-semibold uppercase tracking-[2px] text-[#888]">
                        Follow Us
                    </span>
                    <ul class="flex list-none gap-3 p-0 m-0 max-[767px]:justify-center">
                        @foreach([
                            ['https://www.facebook.com/ThumbpinAgency',        'Facebook',  'fab fa-facebook-f'],
                            ['https://twitter.com/ThumbpinAgency',            'Twitter',   'fab fa-twitter'],
                            ['https://www.instagram.com/ThumbpinAgency',      'Instagram', 'fab fa-instagram'],
                            ['https://in.linkedin.com/company/thumbpinagency','LinkedIn',  'fab fa-linkedin-in'],
                            ['https://www.behance.net/thumbpinagency',        'Behance',   'fab fa-behance'],
                        ] as [$url, $label, $icon])
                        <li>
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="{{ $label }}"
                               class="inline-flex items-center justify-center w-9 h-9 rounded-full no-underline text-[16px] text-[#999] transition-colors duration-200 hover:text-white hover:bg-tp-red">
                                <i class="{{ $icon }}"></i>
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>

            {{-- Middle Row: Services Grid --}}
            <div class="grid grid-cols-3 gap-x-12 gap-y-10 py-12 max-[991px]:gap-x-8 max-[767px]:grid-cols-2 max-[767px]:gap-y-8 max-[575px]:grid-cols-1 max-[575px]:text-center max-[575px]:py-10 max-[575px]:gap-y-8">
                @php
                $sections = [
                    ['Services', [
                        ['branding-agency',                         'Branding'],
                        ['strategy-agency',                         'Strategy'],
                        ['search-engine-optimization-seo-services', 'SEO Services'],
                        ['application-development',                    'Application Development'],
                        ['digital-marketing',                       'Digital Marketing'],
                        ['social-media-marketing-agency',           'Social Media Marketing'],
                    ]],
                    ['Solutions', [
                        ['performance-marketing-agency',  'Performance Marketing'],
                        ['real-estate-ads',               'Real Estate Ads'],
                        ['advertising-agency-in-gurgaon', 'Advertising Agency in Gurgaon'],
                        ['video-production-in-gurgaon',   'Video Production in Gurgaon'],
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

                @foreach($sections as [$heading, $links])
                <div>
                    <h4 class="mt-0 mb-5 font-body text-[12px] font-bold uppercase tracking-[1.5px] text-white">
                        {{ $heading }}
                    </h4>
                    <ul class="list-none p-0 m-0 flex flex-col gap-[6px]">
                        @foreach($links as [$route, $label])
                        <li>
                            <a href="{{ route($route) }}"
                               class="no-underline font-body text-[13px] font-medium leading-[1.6] text-[#999] transition-colors duration-200 hover:text-tp-red">
                                {{ $label }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </div>

            {{-- Bottom Row: Copyright --}}
            <div class="flex items-center justify-between gap-4 pt-8 border-t border-[#1e1e1e] max-[575px]:flex-col max-[575px]:text-center max-[575px]:gap-2 max-[575px]:pt-6">
                <p class="m-0 font-body text-[12px] font-medium text-[#777]">
                    &copy; {{ date('Y') }} Thumbpin. All rights reserved.
                </p>
                <p class="m-0 font-body text-[12px] font-medium text-[#777]">
                    Designed by Developers at Thumbpin
                </p>
            </div>

        </div>
    </div>
</footer>
{{-- ====================== End Footer Area ====================== --}}