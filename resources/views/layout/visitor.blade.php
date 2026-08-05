<!DOCTYPE html>
<html lang="en">

<head>
    <title>{{ $title ?? config('app.name') }}</title>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta name="description" content="{{ $description ?? config('app.name') }}" />
    <meta name="robots" content="index, follow, max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="keywords" content="{{ $keywords ?? config('app.name') }}">
    <link rel="canonical" href="{{ $canonical ?? Request::url() }}" />

    <meta name="author" content="{{ config('app.name') }}">
    <meta name="dc.description" content="{{ $description ?? config('app.name') }}" />
    <meta name="dc.language" content="en_US" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:locale" content="en_US" />
    {{-- Must be the URL of THIS page; a site-wide value tells crawlers every page is the homepage. --}}
    <meta property="og:url" content="{{ $canonical ?? Request::url() }}" />
    <meta property="og:type" content="{{ $og_type ?? 'website' }}" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:description" content="{{ $description ?? config('app.name') }}" />
    @php
        // Pages opt in with 'image' => config('app.url').'/img/og/whatever.png'.
        // Dimensions are read off the file rather than hardcoded: a wrong width/height
        // makes some scrapers skip the preview, and share images are not all one size.
        $ogImage = $image ?? config('app.url') . '/assets/img/logo/favicon.jpeg';
        $ogSize  = null;
        if (isset($image)) {
            $localPath = public_path(parse_url($image, PHP_URL_PATH));
            if (is_file($localPath) && ($info = @getimagesize($localPath))) {
                $ogSize = ['width' => $info[0], 'height' => $info[1], 'mime' => $info['mime']];
            }
        }
    @endphp
    <meta property="og:image" content="{{ $ogImage }}" />
    <meta property="og:image:secure_url" content="{{ $ogImage }}" />
    @if($ogSize)
    <meta property="og:image:width" content="{{ $ogSize['width'] }}" />
    <meta property="og:image:height" content="{{ $ogSize['height'] }}" />
    <meta property="og:image:type" content="{{ $ogSize['mime'] }}" />
    @endif
    <meta property="og:image:alt" content="{{ $image_alt ?? ($title ?? config('app.name')) }}" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? '' }}" />
    <meta name="twitter:image" content="{{ $ogImage }}">
    <meta name="twitter:image:alt" content="{{ $image_alt ?? ($title ?? config('app.name')) }}" />
    <meta name="twitter:description" content="{{ $description ?? config('app.name') }}" />

    {{-- Favicon --}}
    <link rel="icon" href="{{ config('app.url') }}/assets/img/logo/favicon.jpeg">

    {{--
        Resource hints. Every third-party origin costs a DNS lookup + TCP connect +
        TLS handshake before its first byte arrives -- roughly 200-300ms each on
        mobile. Warming the connection overlaps that with HTML download.

        Two rules being followed here:

        1. `crossorigin` must match how the resource is actually fetched. A
           crossorigin preconnect opens an anonymous CORS socket, and a normal
           fetch will NOT reuse it -- the browser opens a second connection and
           the warmed one is wasted. Images/video from assets.thumbpin.in are
           fetched without CORS, so no crossorigin there. jsdelivr and cdnjs are
           requested with crossorigin="anonymous" on their tags, so they keep it.

        2. preconnect is capped at ~4 origins. Each held socket costs memory and
           competes for bandwidth on a phone, so anything less critical is
           downgraded to dns-prefetch, which resolves DNS without connecting.
    --}}
    <link rel="preconnect" href="https://assets.thumbpin.in">
    <link rel="preconnect" href="https://cdn.jsdelivr.net" crossorigin>
    <link rel="dns-prefetch" href="https://cdnjs.cloudflare.com">
    <link rel="dns-prefetch" href="https://pro.fontawesome.com">
    <link rel="dns-prefetch" href="https://unpkg.com">
    <link rel="dns-prefetch" href="https://i.ytimg.com">

    {{--
        Font-Awesome Pro v5.10.0 -- loaded non-blocking. It is icon glyphs only, so
        it is not needed for first paint; as a plain stylesheet it blocked rendering
        on a round-trip to a slow origin. media="print" makes the browser fetch it at
        low priority without blocking, and onload promotes it to all media.
    --}}
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet"
          media="print" onload="this.media='all';this.onload=null">
    <noscript>
        <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">
    </noscript>

    {{-- Bootstrap v5.0.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Custom Css --}}
    <link rel="stylesheet" href="@asset('assets/css/style.css')">

    {{-- Tailwind utilities for shared partials (footer). Utilities only, no preflight. --}}
    <link rel="stylesheet" href="@asset('css/shared.css')">

    @yield('head')


    {{-- Google Tag Manager (noscript) --}}
    <noscript>
        <iframe src="https://www.googletagmanager.com/ns.html?id=GTM-M42XGJZ" height="0" width="0"
            style="display:none;visibility:hidden"></iframe>
            </noscript>
    {{-- End Google Tag Manager (noscript) --}}

{{-- Google Tag Manager --}}
<script>
(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M42XGJZ');
</script>
 {{-- End Google Tag Manager --}}
 {{-- Microsoft Clarity --}}
<script type="text/javascript">
    (function(c,l,a,r,i,t,y){
        c[a]=c[a]||function(){(c[a].q=c[a].q||[]).push(arguments)};
        t=l.createElement(r);t.async=1;t.src="https://www.clarity.ms/tag/"+i;
        y=l.getElementsByTagName(r)[0];y.parentNode.insertBefore(t,y);
    })(window, document, "clarity", "script", "ueswfpugy0");
</script>
{{-- End Microsoft Clarity --}}

    <style>
        .whatsapp-btn {
            position: fixed;
            right: 60px;
            bottom: 40px;
            z-index: 99;
            display: flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            background-color: #25d366;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            animation: whatsapp-btn 0.8s ease-in-out 0.5s infinite alternate;
            text-decoration: none;
        }

        @keyframes whatsapp-btn {
            0% {
                transform: scale(1, 1);
            }

            100% {
                transform: scale(0.8, 0.8);
            }
        }

        .whatsapp-btn i {
            font-size: 32px;
            color: #fff;
        }

        @media screen and (max-width: 767px) {
            .whatsapp-btn {
                right: 25px;
                bottom: 30px;
            }
        }
    </style>
</head>

<body>

    {{-- ========================= Loader-Sec Area ========================= --}}
    {{-- <div id="loader">
        <img src="{{ config('app.url') }}/assets/img/loader.gif" alt="loader">
    </div> --}}
    {{-- ========================= End Loader-Sec Area ========================= --}}

    @unless(isset($hideDefaultHeader) && $hideDefaultHeader)
        @include('inc.header')
    @endunless

    @yield('content')

    @unless(isset($hideDefaultFooter) && $hideDefaultFooter)
        @include('inc.footer')
    @endunless

    {{-- ========================= Inquiry-Form Area ========================= --}}
    <div class="inquiry-form-sec">
        <div class="inquiry-form">
            <div class="over">
                <div class="close-btn">
                    <button type="button">
                        <i class="far fa-times"></i>
                    </button>
                </div>
                <div class="title">
                    <span>Inquiry Form</span>
                </div>
                <div class="form">
                    <form action="{{ route('inquiry-form') }}" method="post">
                        @csrf
                        <input type="hidden" name="url" value="{{ Request::url() }}">
                        <div class="input-field">
                            <input type="text" placeholder="NAME" name="name" required>
                        </div>
                        <div class="input-field">
                            <input type="email" placeholder="E-MAIL ID" name="email" required>
                        </div>
                        <div class="input-field">
                            <input type="number" placeholder="PHONE NO." name="mobile" required>
                        </div>
                        <div class="input-field">
                            <input type="text" placeholder="COMPANY NAME" name="country" required>
                        </div>
                        <div class="input-field">
                            <textarea rows="3" placeholder="REQUIREMENT" name="requirement"></textarea>
                        </div>
                        <div class="input-field input-submit">
                            <input type="submit" value="SUBMIT">
                        </div>
                    </form>
                </div>
            </div>
            <button type="button" class="inquiry-form-btn blink">
                Inquiry
            </button>
        </div>
        <div class="overlay"></div>
    </div>
    {{-- ========================= End Inquiry-Form Area ========================= --}}

    {{-- whatsapp (hidden per-view if `hideWhatsApp` is set) --}}
    @unless(isset($hideWhatsApp) && $hideWhatsApp)
        <a href="https://api.whatsapp.com/send?phone=919773511447" target="_blank" class="whatsapp-btn" title="Chat with Thumbpin on WhatsApp" aria-label="Chat with Thumbpin on WhatsApp">
            <i class="fab fa-whatsapp"></i>
        </a>
    @endunless
    {{-- whatsapp --}}

    {{-- Bootstrap v5.0.2 --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    {{-- Jquery v3.6.0 --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    {{-- Custom Js --}}
    <script src="{{ config('app.url') }}/assets/js/script.js"></script>

    <script>
        // Loader Function ==================

        // $(window).scrollTop(0);

        // $('body').css({'overflow' : 'hidden'});

        // setTimeout(function(){
        //     $('#loader').fadeOut();
        //     $('body').css({'overflow' : ''});
        // }, 3500);
    </script>

    @yield('script')

    <script>
        $('.owl-carousel .owl-nav button.owl-prev').html('<i class="fal fa-chevron-left"></i>');
        $('.owl-carousel .owl-nav button.owl-next').html('<i class="fal fa-chevron-right"></i>');
    </script>

    <script>
        // Open inquiry form when links with .open-inquiry are clicked (delegated)
        $(document).on('click', '.open-inquiry', function(e){
            e.preventDefault();
            $('.inquiry-form-sec').addClass('active');
            $('body').css({'overflow' : 'hidden'});
            // focus first input after opening for accessibility
            setTimeout(function(){
                $('.inquiry-form-sec').find('input[name="name"]').focus();
            }, 300);
        });
    </script>

</body>

</html>
