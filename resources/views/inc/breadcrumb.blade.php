{{--
    Visible breadcrumb trail.

    Pairs with the BreadcrumbList JSON-LD each page already emits. Google treats
    the structured data as a description of a real navigational path, so shipping
    the schema with nothing on the page is a mismatch -- this is the visible half.

    Usage (last item is the current page and is rendered as plain text, not a link):

        @include('inc.breadcrumb', ['trail' => [
            ['Home',     route('home')],
            ['Services', route('services')],
            ['Branding', null],
        ]])

    Styled with Tailwind from css/app.css, so include it only on pages that load
    that build. aria-current marks the current page for screen readers; the
    separators are aria-hidden since they carry no meaning when read aloud.
--}}
<nav aria-label="Breadcrumb" class="mx-auto max-w-[1140px] px-5 pt-8 pb-2">
    <ol class="m-0 flex list-none flex-wrap items-center gap-x-2 gap-y-1 p-0 text-[13px] leading-none text-[#999]">
        @foreach($trail as $i => [$label, $url])
        <li class="flex items-center gap-x-2">
            @if($url)
                <a href="{{ $url }}"
                   class="no-underline text-[#999] transition-colors duration-200 hover:text-film-red">{{ $label }}</a>
            @else
                <span aria-current="page" class="font-semibold text-[#333]">{{ $label }}</span>
            @endif

            @unless($loop->last)
                <span aria-hidden="true" class="text-[#ccc]">/</span>
            @endunless
        </li>
        @endforeach
    </ol>
</nav>
