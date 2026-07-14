{{-- ====================== Footer Area ====================== --}}
<footer class="{{ $footer_black ?? '' }}">
    <div class="container">
        <div class="footer">
            <div class="logo">
                <a href="{{ route('home') }}">
                    <img src="{{ config('app.url') }}/assets/img/logo/logo.png" alt="logo" class="logo-white">
                    <img src="{{ config('app.url') }}/assets/img/logo/logo-black.png" alt="logo" class="logo-black">
                </a>
            </div>
            <div class="social-links">
                <ul>
                    <li>
                        <a href="https://www.facebook.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://twitter.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-twitter"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.instagram.com/ThumbpinAgency" target="_blank">
                            <i class="fab fa-instagram"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://in.linkedin.com/company/thumbpinagency" target="_blank">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </li>
                    <li>
                        <a href="https://www.behance.net/thumbpinagency" target="_blank">
                            <i class="fab fa-behance"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <ul class="footer-services">
                <li><a href="{{ route('search-engine-optimization-seo-services') }}">SEO Services</a></li>
                <li><a href="{{ route('web-design-agency') }}">Web Design</a></li>
                <li><a href="{{ route('digital-marketing') }}">Digital Marketing</a></li>
                <li><a href="{{ route('social-media-marketing-agency') }}">Social Media Marketing</a></li>
                <li><a href="{{ route('performance-marketing-agency') }}">Performance Marketing</a></li>
                <li><a href="{{ route('real-estate-ads') }}">Real Estate Ads</a></li>
                <li><a href="{{ route('advertising-agency-in-gurgaon') }}">Advertising Agency in Gurgaon</a></li>
                <li><a href="{{ route('video-production-in-gurgaon') }}">Video Production in Gurgaon</a></li>
            </ul>

            <div class="msg">
                <a href="{{ route('terms') }}">
                    © <?php echo date('Y'); ?> Thumbpin
                </a>
                {{-- Desig By Thumbpin --}}
            </div>
        </div>
    </div>
</footer>
{{-- ====================== EndFooter Area ====================== --}}
