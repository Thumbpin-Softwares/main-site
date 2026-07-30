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

    <meta name="robots" content="max-snippet:-1, max-image-preview:large, max-video-preview:-1" />
    <meta name="author" content="{{ config('app.name') }}">
    <meta name="dc.description" content="{{ $description ?? config('app.name') }}" />
    <meta name="dc.language" content="en_US" />
    <meta property="og:site_name" content="{{ config('app.name') }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:url" content="{{ config('app.url') }}" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="{{ $title ?? config('app.name') }}" />
    <meta property="og:description" content="{{ $description ?? config('app.name') }}" />
    <meta property="og:image" content="{{ $image ?? config('app.url') . '/assets/img/logo/favicon.jpeg' }}" />
    <meta property="og:image:width" content="1200" />
    <meta property="og:image:height" content="627" />
    <meta property="og:image:alt" content="{{ config('app.name') }} logo" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="{{ $title ?? '' }}" />
    <meta name="twitter:image" content="{{ $image ?? config('app.url') . '/assets/img/logo/favicon.jpeg' }}">
    <meta name="twitter:description" content="{{ $description ?? config('app.name') }}" />

    {{-- Favicon --}}
    <link rel="icon" href="{{ config('app.url') }}/assets/img/logo/favicon.jpeg">

    {{-- Font-Awesome Pro v5.10.0 --}}
    <link href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" rel="stylesheet">

    {{-- Bootstrap v5.0.2 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    {{-- Custom Css --}}
    <link rel="stylesheet" href="@asset('assets/css/style.css')">

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
