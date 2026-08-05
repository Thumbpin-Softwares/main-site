{{-- ====================== Header Area ====================== --}}
<header class="header_anime">
    <div class="main-header {{ $header_black ?? '' }}">
        <div class="container-fluid">
            <div class="header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="nav">
                    <ul>
                        <li>
                            <a href="{{ route('home') }}" class="{{ (request()->is('/')) ? 'active' : '' }}">Home</a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="{{ (request()->is('about')) ? 'active' : '' }}">About</a>
                        </li>
                        <li class="has-dropdown">
                            <a href="{{ route('services') }}" class="{{ (request()->is('services') || request()->is('services/*')) ? 'active' : '' }}">
                                Services <span class="dropdown-arrow">&#9660;</span>
                            </a>
                            <div class="nav-dropdown">
                                <div class="nav-dropdown-inner">
                                    <a href="{{ route('digital-marketing') }}" class="{{ request()->is('services/digital-marketing') ? 'active' : '' }}">Digital Marketing</a>
                                    <a href="{{ route('search-engine-optimization-seo-services') }}" class="{{ request()->is('services/seo') ? 'active' : '' }}">SEO</a>
                                    <a href="{{ route('performance-marketing-agency') }}" class="{{ request()->is('services/performance-marketing') ? 'active' : '' }}">Performance Marketing</a>
                                    <a href="{{ route('social-media-marketing-agency') }}" class="{{ request()->is('services/social-media-marketing') ? 'active' : '' }}">Social Media Marketing</a>
                                    <a href="{{ route('web-design-agency') }}" class="{{ request()->is('services/web-design') ? 'active' : '' }}">Web Design</a>
                                    <a href="{{ route('real-estate-ads') }}" class="{{ request()->is('services/real-estate-ads') ? 'active' : '' }}">Real Estate Video Ads</a>
                                    <a href="{{ route('branding-agency') }}" class="{{ request()->is('services/branding') ? 'active' : '' }}">Branding</a>
                                    <a href="{{ route('strategy-agency') }}" class="{{ request()->is('services/strategy') ? 'active' : '' }}">Strategy</a>
                                </div>
                            </div>
                        </li>
                        <li class="has-dropdown">
                            <a href="{{ route('work') }}" class="{{ (request()->is('work') || request()->is('work/*')) ? 'active' : '' }}">
                                Work <span class="dropdown-arrow">&#9660;</span>
                            </a>
                            <div class="nav-dropdown">
                                <div class="nav-dropdown-inner">
                                    <a href="{{ route('digital') }}" class="{{ request()->is('work/digital') ? 'active' : '' }}">Digital</a>
                                    <a href="{{ route('print') }}" class="{{ request()->is('work/print') ? 'active' : '' }}">Print</a>
                                    <a href="{{ route('branding') }}" class="{{ request()->is('work/branding') ? 'active' : '' }}">Branding</a>
                                    <a href="{{ route('website') }}" class="{{ request()->is('work/website') ? 'active' : '' }}">Website</a>
                                    <a href="{{ route('film') }}" class="{{ request()->is('work/film') ? 'active' : '' }}">Film</a>
                                    <a href="{{ route('awards') }}" class="{{ request()->is('work/awards') ? 'active' : '' }}">Awards</a>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('blog') }}" class="{{ (request()->is('blog')) ? 'active' : '' }}">Blog</a>
                        </li>
                        <li>
                            <a href="{{ route('contact') }}" class="{{ (request()->is('contact')) ? 'active' : '' }}">Contact</a>
                        </li>
                    </ul>
                </div>
                <button type="button" class="side_menu_btn">
                    <img src="{{ config('app.url') }}/assets/img/menu.png" alt="menu">
                </button>
            </div>
        </div>
    </div>
</header>
{{-- ====================== End Header Area ====================== --}}

{{-- ====================== Side-Menu Area ====================== --}}
<div class="side-menu-area">
    <div class="side-menu-box">
        <div class="side-menu">
            <div class="header">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo">
                    </a>
                </div>
                <div class="close-btn">
                    <button type="button"><i class="far fa-times"></i></button>
                </div>
            </div>
            <div class="nav">
                <ul>
                    <li>
                        <a href="{{ route('home') }}" class="active">Home</a>
                    </li>
                    <li>
                        <a href="{{ route('about') }}">About</a>
                    </li>
                    <li class="has-dropdown-mobile">
                        <button type="button" class="services-toggle">
                            Services <span class="arrow">&#9660;</span>
                        </button>
                        <ul class="mobile-submenu">
                            <li><a href="{{ route('services') }}">All Services</a></li>
                            <li><a href="{{ route('digital-marketing') }}">Digital Marketing</a></li>
                            <li><a href="{{ route('search-engine-optimization-seo-services') }}">SEO</a></li>
                            <li><a href="{{ route('performance-marketing-agency') }}">Performance Marketing</a></li>
                            <li><a href="{{ route('social-media-marketing-agency') }}">Social Media Marketing</a></li>
                            <li><a href="{{ route('web-design-agency') }}">Web Design</a></li>
                            <li><a href="{{ route('real-estate-ads') }}">Real Estate Video Ads</a></li>
                            <li><a href="{{ route('branding-agency') }}">Branding</a></li>
                            <li><a href="{{ route('strategy-agency') }}">Strategy</a></li>
                        </ul>
                    </li>
                    <li class="has-dropdown-mobile">
                        <button type="button" class="services-toggle">
                            Work <span class="arrow">&#9660;</span>
                        </button>
                        <ul class="mobile-submenu">
                            <li><a href="{{ route('work') }}">All Work</a></li>
                            <li><a href="{{ route('digital') }}">Digital</a></li>
                            <li><a href="{{ route('print') }}">Print</a></li>
                            <li><a href="{{ route('branding') }}">Branding</a></li>
                            <li><a href="{{ route('website') }}">Website</a></li>
                            <li><a href="{{ route('film') }}">Film</a></li>
                            <li><a href="{{ route('awards') }}">Awards</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{ route('blog') }}">Blog</a>
                    </li>
                    <li>
                        <a href="{{ route('contact') }}">Contact</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="overlay"></div>
</div>
{{-- ====================== End Side-Menu Area ====================== --}}
