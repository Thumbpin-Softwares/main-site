@extends('layout.visitor', [
    'description' => 'Website design and development work by Thumbpin. Browse the sites we have designed and built for brands across sectors.','title' => 'Website', 'footer_black' => 'footer-black'])

@section('head')

@endsection

@section('content')

<main>

    {{-- ====================== Work-Hero-Sec Area ====================== --}}
    <div class="work-hero-sec with-back-img top-sec bg-black">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-md-6">
                    <div class="content-box">
                        <h1 class="title with-img">
                            Website
                        </h1>
                        <div class="des">
                            <p>
                                Our team creates a website for your brand that creates impressions, achieves goals, and creates new ones. Keep your customers scrolling as long as you want.
                            </p>
                        </div>
                    </div>
                </div>
                {{-- <div class="col-lg-6 d-none d-lg-block">
                    <div class="sec-img">
                        <div class="img">
                            <img src="{{ config('app.url') }}/assets/img/work-sec.png" alt="img">
                        </div>
                    </div>
                </div> --}}
            </div>
        </div>
        <div class="back-img">
            <div class="img">
                <img src="{{ config('app.url') }}/assets/img/work-sec-2.png" alt="img">
            </div>
        </div>
    </div>
    {{-- ====================== End Work-Hero-Sec Area ====================== --}}

    {{-- ====================== Website Preview Modal ====================== --}}
    <div class="website-preview-modal" id="websitePreviewModal">
        <div class="modal-overlay" onclick="closeWebsiteModal()"></div>
        <div class="modal-container">
            <div class="modal-header">
                <div class="modal-title" id="modalTitle">Website Preview</div>
                <button class="close-btn" onclick="closeWebsiteModal()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="browser-frame">
                <div class="browser-toolbar">
                    <div class="browser-dots">
                        <span class="dot red"></span>
                        <span class="dot yellow"></span>
                        <span class="dot green"></span>
                    </div>
                    <div class="browser-url-bar" id="browserUrlBar">
                        <i class="fas fa-lock"></i>
                        <span id="urlDisplay">https://example.com</span>
                    </div>
                    {{-- "Visit site" replaces the old refresh button, which only made
                         sense for a live frame. Hidden entirely for projects whose
                         domain is no longer reachable -- see $sites below. --}}
                    <div class="browser-controls">
                        <a id="visitSite" href="#" target="_blank" rel="noopener noreferrer nofollow" title="Visit site">
                            <i class="fas fa-external-link-alt"></i>
                        </a>
                    </div>
                </div>
                {{-- Was an <iframe> loading the client's live site. That could never be
                     reliable: we do not control those domains. Two had already stopped
                     resolving, and a third served X-Frame-Options: DENY, which blocks
                     framing outright. It also meant the portfolio showed whatever the
                     site looks like today rather than what we delivered.

                     Now a full-page screenshot, scrolled inside the same browser chrome
                     so the presentation is unchanged. --}}
                <div class="iframe-container">
                    <img id="websiteShot" src="" alt="" decoding="async">
                </div>
            </div>
        </div>
    </div>

    <style>
        .website-preview-modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: 9999;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .website-preview-modal.active {
            display: flex;
            align-items: center;
            justify-content: center;
            opacity: 1;
        }
        .modal-overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.85);
            backdrop-filter: blur(10px);
        }
        .modal-container {
            position: relative;
            width: 90%;
            max-width: 1400px;
            height: 85vh;
            background: #1a1a1a;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 25px 80px rgba(0,0,0,0.5);
            display: flex;
            flex-direction: column;
            animation: modalSlideIn 0.3s ease;
        }
        @keyframes modalSlideIn {
            from {
                transform: scale(0.9) translateY(20px);
                opacity: 0;
            }
            to {
                transform: scale(1) translateY(0);
                opacity: 1;
            }
        }
        .modal-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 16px;
            background: #0d0d0d;
            border-bottom: 1px solid #333;
        }
        .modal-title {
            font-size: 14px;
            font-weight: 500;
            color: #fff;
        }
        .close-btn {
            width: 32px;
            height: 32px;
            border: none;
            background: rgba(255,255,255,0.1);
            color: #fff;
            border-radius: 6px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 14px;
            transition: background 0.2s;
        }
        .close-btn:hover {
            background: rgba(255,255,255,0.2);
        }
        .browser-frame {
            flex: 1;
            display: flex;
            flex-direction: column;
            background: #fff;
        }
        .browser-toolbar {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 12px 16px;
            background: #2d2d2d;
        }
        .browser-dots {
            display: flex;
            gap: 8px;
        }
        .browser-dots .dot {
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        .browser-dots .dot.red { background: #ff5f56; }
        .browser-dots .dot.yellow { background: #ffbd2e; }
        .browser-dots .dot.green { background: #27c93f; }
        .browser-url-bar {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 8px 16px;
            background: #1a1a1a;
            border-radius: 8px;
            color: #aaa;
            font-size: 14px;
        }
        .browser-url-bar i {
            color: #27c93f;
            font-size: 12px;
        }
        .browser-controls button {
            width: 32px;
            height: 32px;
            border: none;
            background: transparent;
            color: #aaa;
            cursor: pointer;
            border-radius: 6px;
            transition: background 0.2s, color 0.2s;
        }
        .browser-controls button:hover {
            background: rgba(255,255,255,0.1);
            color: #fff;
        }
        .iframe-container {
            flex: 1;
            position: relative;
            background: #fff;
        }
        /* .iframe-loader and .spinner removed along with the <iframe>: a local
           screenshot has nothing to wait for, so a loading state would only ever
           flash. */
        /* The screenshot is a tall full-page capture, so the container scrolls it
           rather than the image being squashed to fit. width:100% + height:auto
           means it scales to the frame and the page reads at its real proportions. */
        .iframe-container {
            overflow-y: auto;
            overflow-x: hidden;
            background: #fff;
            -webkit-overflow-scrolling: touch;
        }
        #websiteShot {
            display: block;
            width: 100%;
            height: auto;
            border: none;
        }
        .browser-controls a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 32px;
            height: 32px;
            border-radius: 6px;
            color: #aaa;
            font-size: 13px;
            text-decoration: none;
            transition: background 0.2s, color 0.2s;
        }
        .browser-controls a:hover {
            background: rgba(255,255,255,0.12);
            color: #fff;
        }
        /* Set by JS when a project's domain is no longer reachable. */
        .browser-controls a.is-hidden {
            display: none;
        }
        @media (max-width: 768px) {
            .modal-container {
                width: 100%;
                height: 100%;
                border-radius: 0;
            }
            .modal-header {
                padding: 12px 16px;
            }
            .modal-title {
                font-size: 14px;
            }
            .visit-btn span {
                display: none;
            }
            .browser-dots {
                display: none;
            }
        }
    </style>
    {{-- ====================== End Website Preview Modal ====================== --}}

    {{-- ====================== Sec-10 Area ====================== --}}
    <div class="sec-10">
        <div class="container">
            {{-- Filter buttons and cards both come from $sites so they cannot drift apart.
                 Ramaeri is gone: it had no screenshot on disk, and its domain now
                 answers 402 with framing blocked. --}}
            @php
            $sites = [
                ['slug' => 'psb-logistics', 'name' => 'PSB Logistics', 'url' => null,
                 'alt'  => 'PSB Logistics website designed and built by Thumbpin'],
                ['slug' => 'zero-waste',    'name' => 'Zero Waste',    'url' => 'https://www.zerowaste.ae/',
                 'alt'  => 'Zero Waste recycling website designed and built by Thumbpin'],
                ['slug' => 'mr-furniture',  'name' => 'Mr Furniture',  'url' => 'https://www.mrfurniture.ae',
                 'alt'  => 'Mr Furniture e-commerce website designed and built by Thumbpin'],
                ['slug' => 'mr-skips',      'name' => 'Mr Skips',      'url' => null,
                 'alt'  => 'Mr Skips waste collection website designed and built by Thumbpin'],
                ['slug' => 'probity',       'name' => 'Probity',       'url' => 'https://www.probitycorporate.ae/',
                 'alt'  => 'Probity corporate services website designed and built by Thumbpin'],
            ];
            $shots = config('app.url') . '/assets/img/work/website/opt';
            @endphp

            <ul class="filter_nav">
                <li>
                    <button type="button" data-filter="*" class="active">All</button>
                </li>
                @foreach($sites as $site)
                <li>
                    <button type="button" data-filter=".{{ $site['slug'] }}">{{ $site['name'] }}</button>
                </li>
                @endforeach
            </ul>
            <div class="row filter_box">
                @foreach($sites as $site)
                <div class="col-sm-6 {{ $site['slug'] }}">
                    {{-- Card image was a .mp4 scroll clip; none of those six files exist
                         on disk, so every card rendered an empty <video>. --}}
                    <div class="card-3" onclick="openWebsiteModal('{{ $site['slug'] }}', @js($site['name']), @js($site['url']), @js($site['alt']))">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <img src="{{ $shots }}/{{ $site['slug'] }}-card.webp"
                                 alt="{{ $site['alt'] }}"
                                 loading="lazy"
                                 decoding="async">
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>

    <style>
        .card-3 {
            cursor: pointer;
            position: relative;
        }
        .card-3 .preview-hint {
            position: absolute;
            bottom: 20px;
            left: 50%;
            transform: translateX(-50%);
            padding: 8px 16px;
            background: rgba(0,0,0,0.8);
            color: #fff;
            border-radius: 20px;
            font-size: 12px;
            opacity: 0;
            transition: opacity 0.3s ease;
            display: flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
        .card-3:hover .preview-hint {
            opacity: 1;
        }
    </style>
    {{-- ====================== End Sec-10 Area ====================== --}}


</main>

@endsection

@section('script')

<script>
    // Website Preview Modal. Shows a screenshot rather than framing the live site:
    // client domains expire, get redesigned, or send X-Frame-Options, and all three
    // had already happened here.
    const SHOT_BASE = '{{ config('app.url') }}/assets/img/work/website/opt';

    function openWebsiteModal(slug, title, url, alt) {
        const modal      = document.getElementById('websitePreviewModal');
        const shot       = document.getElementById('websiteShot');
        const modalTitle = document.getElementById('modalTitle');
        const urlDisplay = document.getElementById('urlDisplay');
        const visit      = document.getElementById('visitSite');

        modalTitle.textContent = title;
        // The URL bar is presentational -- it still reads as the project's address
        // even where that domain no longer resolves, because it is showing what the
        // site was, not linking to it. The visit button is what gates on reachability.
        urlDisplay.textContent = url || (title.toLowerCase().replace(/\s+/g, '') + '.com');

        shot.src = SHOT_BASE + '/' + slug + '-page.webp';
        shot.alt = alt || (title + ' website by Thumbpin');

        if (url) {
            visit.href = url;
            visit.classList.remove('is-hidden');
        } else {
            visit.removeAttribute('href');
            visit.classList.add('is-hidden');
        }

        // Always reopen scrolled to the top of the page capture.
        const scroller = shot.parentElement;
        if (scroller) scroller.scrollTop = 0;

        modal.classList.add('active');
        document.body.style.overflow = 'hidden';
    }

    function closeWebsiteModal() {
        const modal = document.getElementById('websitePreviewModal');
        modal.classList.remove('active');
        document.body.style.overflow = '';
        // The screenshot is left in place: it is a cached local file, so there is
        // nothing to stop loading and clearing it only causes a flash on reopen.
    }

    // Close modal on Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape') {
            closeWebsiteModal();
        }
    });
</script>

<!-- iso-Tope Filter -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.imagesloaded/4.1.4/imagesloaded.pkgd.min.js" integrity="sha512-S5PZ9GxJZO16tT9r3WJp/Safn31eu8uWrzglMahDT4dsmgqWonRY9grk3j+3tfuPr9WJNsfooOR7Gi7HL5W2jw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js" integrity="sha512-Zq2BOxyhvnRFXu0+WE6ojpZLOU2jdnqbrM1hmVdGzyeCa1DgM3X5Q4A/Is9xA1IkbUeDd7755dNNI/PzSf2Pew==" crossorigin="anonymous"></script>

<script>
    // Set Filteration  Function ======================

    var filter_navs = $('.sec-10 .filter_nav li button[data-filter]');

    var filter_box = $('.sec-10 .filter_box');

    // var $filter = $(filter_box).isotope({
    //     getSortData: {
    //         category: '[data-category]',
    //     },
    // });

    // $filter.imagesLoaded().progress( function() {
    //     $filter.isotope('layout');
    // });

    $(filter_navs).click(function () {

        var $filter = $(filter_box).isotope({
            getSortData: {
                category: '[data-category]',
            },
        });

        $('.sec-10 .filter_nav li button').removeClass('active');
        $(this).addClass('active');

        var selector = $(this).attr('data-filter');

        var filter_Mode = 'sortBy'; // sortBy | filter

        if(filter_Mode == 'sortBy'){

            $(filter_box).find(' > div').removeAttr('data-category');

            var categories = 'original-order';  // original-order | random

            if(selector != '*'){
                $(filter_box).find(' > div').attr({'data-category' : 'second'});
                categories = $(filter_box).find(selector);
                $(categories).attr({'data-category' : 'first'});
                selector = 'category';
            }else{
                selector = categories;
            };

            $filter.isotope(
                'updateSortData', $(filter_box).find(' > div')
            );

        };

        $filter.isotope({
            sortBy: selector,
        });

        return false;

    });

</script>

@endsection
