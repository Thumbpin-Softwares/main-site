@extends('layout.visitor', [
    'description' => 'Website design and development work by Thumbpin. Browse the sites we have designed and built for brands across sectors.','title' => 'Website | Thumbpin', 'footer_black' => 'footer-black'])

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
                    <div class="browser-controls">
                        <button onclick="refreshIframe()" title="Refresh">
                            <i class="fas fa-sync-alt"></i>
                        </button>
                    </div>
                </div>
                <div class="iframe-container">
                    <div class="iframe-loader" id="iframeLoader">
                        <div class="spinner"></div>
                        <p>Loading website...</p>
                    </div>
                    <iframe id="websiteIframe" src="" frameborder="0" allowfullscreen></iframe>
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
        .iframe-loader {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            background: #f5f5f5;
            z-index: 10;
            transition: opacity 0.3s;
        }
        .iframe-loader.hidden {
            opacity: 0;
            pointer-events: none;
        }
        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid #e0e0e0;
            border-top-color: #667eea;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
        @keyframes spin {
            to { transform: rotate(360deg); }
        }
        .iframe-loader p {
            margin-top: 16px;
            color: #666;
            font-size: 14px;
        }
        #websiteIframe {
            width: 100%;
            height: 100%;
            border: none;
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
            <ul class="filter_nav">
                <li>
                    <button type="button" class="active" onclick="window.open('{{ route('work') }}','_self')">All</button>
                </li>
                <li>
                    <button type="button" data-filter=".psb-logistics">PSB Logistics</button>
                </li>
                <li>
                    <button type="button" data-filter=".zero-waste">Zero Waste</button>
                </li>
                <li>
                    <button type="button" data-filter=".mr-furniture">Mr Furniture</button>
                </li>
                <li>
                    <button type="button" data-filter=".mr-skips">Mr Skips</button>
                </li>
                <li>
                    <button type="button" data-filter=".probity">Probity</button>
                </li>
                <li>
                    <button type="button" data-filter=".ramaeri">Ramaeri</button>
                </li>
            </ul>
            <div class="row filter_box">
                <div class="col-sm-6 psb-logistics">
                    <div class="card-3" onclick="openWebsiteModal('https://psblogistics.co.uk', 'PSB Logistics')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/psb-logistics.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 zero-waste">
                    <div class="card-3" onclick="openWebsiteModal('https://www.zerowaste.ae/', 'Zero Waste')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/zero-waste.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mr-furniture">
                    <div class="card-3" onclick="openWebsiteModal('https://www.mrfurniture.ae', 'Mr Furniture')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/mr-furniture.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 mr-skips">
                    <div class="card-3" onclick="openWebsiteModal('https://mrskips.co.uk', 'Mr Skips')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/mr-skips.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 probity">
                    <div class="card-3" onclick="openWebsiteModal('https://www.probitycorporate.ae/', 'Probity')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/probity.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 ramaeri">
                    <div class="card-3" onclick="openWebsiteModal('https://www.ramaeri.com', 'Ramaeri')">
                        <div class="card-content">
                            <div class="name">
                                website
                            </div>
                            <video src="{{ config('app.url') }}/assets/img/work/website/ramaeri.mp4" muted autoplay loop></video>
                            <div class="preview-hint">
                                <i class="fas fa-expand"></i> Click to preview
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
    // Website Preview Modal Functions
    let currentUrl = '';

    function openWebsiteModal(url, title) {
        currentUrl = url;
        const modal = document.getElementById('websitePreviewModal');
        const iframe = document.getElementById('websiteIframe');
        const loader = document.getElementById('iframeLoader');
        const modalTitle = document.getElementById('modalTitle');
        const urlDisplay = document.getElementById('urlDisplay');

        // Set title and URL display
        modalTitle.textContent = title;
        urlDisplay.textContent = url;

        // Show loader and reset iframe
        loader.classList.remove('hidden');
        iframe.src = '';

        // Show modal
        modal.classList.add('active');
        document.body.style.overflow = 'hidden';

        // Load the website
        setTimeout(() => {
            iframe.src = url;
        }, 100);

        // Hide loader when iframe loads
        iframe.onload = function() {
            loader.classList.add('hidden');
        };

        // Fallback: hide loader after 5 seconds even if onload doesn't fire
        setTimeout(() => {
            loader.classList.add('hidden');
        }, 5000);
    }

    function closeWebsiteModal() {
        const modal = document.getElementById('websitePreviewModal');
        const iframe = document.getElementById('websiteIframe');

        modal.classList.remove('active');
        document.body.style.overflow = '';

        // Clear iframe to stop loading
        setTimeout(() => {
            iframe.src = '';
        }, 300);
    }

    function refreshIframe() {
        const iframe = document.getElementById('websiteIframe');
        const loader = document.getElementById('iframeLoader');

        loader.classList.remove('hidden');
        iframe.src = currentUrl;
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
