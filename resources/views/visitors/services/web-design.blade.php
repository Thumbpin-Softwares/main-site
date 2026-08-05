@extends('layout.visitor', [
    'title' => 'Best Web Design & Development Agency in Gurgaon | Thumbpin',
    'description' => 'Thumbpin is a web design and development agency in Gurgaon building high-converting websites, custom software, mobile apps, and UX-first digital experiences.',
    'footer_black' => 'footer-black',
])

@section('head')
<style>
/* ===== TOKENS ===== */
:root {
    --wd-red:   #eb1c24;
    --wd-black: #0d0d0d;
    --wd-gray:  #f5f5f5;
    --wd-text:  #333;
    --wd-muted: #777;
    --wd-border: #e5e5e5;
    --wd-transition: 0.28s ease;
}

/* ===== HERO ===== */
.wd-hero {
    background: var(--wd-black);
    padding: 140px 0 100px;
    position: relative;
    overflow: hidden;
}
.wd-hero::after {
    content: '';
    position: absolute;
    inset: 0;
    background: radial-gradient(ellipse at 80% 50%, rgba(235,28,36,0.07) 0%, transparent 60%);
    pointer-events: none;
}
.wd-hero-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 40px;
    display: flex;
    align-items: center;
    gap: 60px;
}
.wd-hero-content {
    flex: 1;
}
.wd-hero-tag {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: var(--wd-red);
    margin-bottom: 20px;
}
.wd-hero-title {
    font-size: clamp(38px, 5vw, 62px);
    font-weight: 800;
    line-height: 1.1;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: -1px;
    margin-bottom: 22px;
}
.wd-hero-title em {
    font-style: normal;
    color: var(--wd-red);
}
.wd-hero-desc {
    font-size: 17px;
    color: #aaa;
    line-height: 1.75;
    max-width: 520px;
    margin-bottom: 36px;
}
.wd-hero-cta {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--wd-red);
    color: #fff;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    text-decoration: none;
    padding: 16px 36px;
    transition: background var(--wd-transition);
}
.wd-hero-cta:hover { background: #c0151c; color: #fff; }
.wd-hero-img {
    width: 360px;
    flex-shrink: 0;
}
.wd-hero-img img { width: 100%; display: block; }

/* ===== STATS ===== */
.wd-stats {
    background: #fff;
    border-bottom: 1px solid var(--wd-border);
    padding: 0;
}
.wd-stats-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 40px;
    display: grid;
    grid-template-columns: repeat(3, 1fr);
}
.wd-stat-item {
    padding: 44px 40px;
    border-right: 1px solid var(--wd-border);
    text-align: center;
}
.wd-stat-item:last-child { border-right: none; }
.wd-stat-number {
    font-size: 44px;
    font-weight: 800;
    color: var(--wd-red);
    line-height: 1;
    margin-bottom: 8px;
}
.wd-stat-label {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2px;
    color: #999;
}

/* ===== SECTION HEADER ===== */
.wd-section-header {
    max-width: 1160px;
    margin: 0 auto;
    padding: 80px 40px 60px;
    text-align: center;
}
.wd-section-tag {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: var(--wd-red);
    margin-bottom: 16px;
}
.wd-section-title {
    font-size: clamp(30px, 4vw, 46px);
    font-weight: 800;
    text-transform: uppercase;
    color: var(--wd-black);
    line-height: 1.15;
    margin-bottom: 18px;
    letter-spacing: -0.5px;
}
.wd-section-subtitle {
    font-size: 16px;
    color: var(--wd-muted);
    line-height: 1.75;
    max-width: 640px;
    margin: 0 auto;
}

/* ===== SERVICE ROWS ===== */
.wd-services {
    background: #fff;
    border-top: 1px solid var(--wd-border);
}
.wd-service-row {
    display: flex;
    flex-direction: row;
    border-bottom: 1px solid var(--wd-border);
    min-height: 420px;
}
.wd-service-row--reverse {
    flex-direction: row-reverse;
}
.wd-service-img {
    width: 44%;
    flex-shrink: 0;
    overflow: hidden;
}
.wd-service-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    object-position: center;
    display: block;
    transition: transform 0.5s ease;
}
.wd-service-row:hover .wd-service-img img {
    transform: scale(1.03);
}
.wd-service-body {
    flex: 1;
    padding: 60px 64px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    border-left: 4px solid var(--wd-red);
}
.wd-service-row--reverse .wd-service-body {
    border-left: none;
    border-right: 4px solid var(--wd-red);
}
.wd-service-tag {
    font-size: 11px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 2.5px;
    color: var(--wd-red);
    margin-bottom: 16px;
}
.wd-service-title {
    font-size: clamp(22px, 2.5vw, 32px);
    font-weight: 800;
    text-transform: uppercase;
    color: var(--wd-black);
    letter-spacing: -0.3px;
    margin-bottom: 16px;
    line-height: 1.2;
}
.wd-service-desc {
    font-size: 15px;
    color: #555;
    line-height: 1.8;
    margin-bottom: 30px;
    max-width: 480px;
}
.wd-service-link {
    display: inline-flex;
    align-items: center;
    gap: 8px;
    color: var(--wd-black);
    font-size: 12px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    text-decoration: none;
    transition: color var(--wd-transition);
}
.wd-service-link svg {
    width: 16px;
    height: 16px;
    transition: transform 0.3s;
}
.wd-service-link:hover { color: var(--wd-red); }
.wd-service-link:hover svg { transform: translateX(4px); }

/* ===== CLIENTS ===== */
.wd-clients {
    background: #fafafa;
    border-top: 1px solid var(--wd-border);
    border-bottom: 1px solid var(--wd-border);
    padding: 80px 0;
}
.wd-clients-inner {
    max-width: 1160px;
    margin: 0 auto;
    padding: 0 40px;
}
.wd-clients-header {
    text-align: center;
    margin-bottom: 50px;
}
.wd-clients-header h2 {
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 3px;
    color: #999;
}
.wd-clients-grid {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 0;
}
.wd-client-item {
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 28px 20px;
    border-right: 1px solid var(--wd-border);
    border-bottom: 1px solid var(--wd-border);
}
.wd-client-item:nth-child(5n) { border-right: none; }
.wd-client-item img {
    max-width: 100px;
    max-height: 44px;
    object-fit: contain;
    filter: grayscale(1) opacity(0.5);
    transition: filter var(--wd-transition);
}
.wd-client-item:hover img { filter: grayscale(0) opacity(1); }

/* ===== QUOTE ===== */
.wd-quote {
    background: var(--wd-black);
    padding: 90px 40px;
    text-align: center;
}
.wd-quote-text {
    max-width: 760px;
    margin: 0 auto;
    font-size: clamp(22px, 3vw, 34px);
    font-weight: 500;
    color: #fff;
    line-height: 1.5;
}
.wd-quote-text span { color: var(--wd-red); }

/* ===== CTA / FORM ===== */
.wd-cta {
    background: #fff;
    padding: 100px 40px;
    border-top: 1px solid var(--wd-border);
}
.wd-cta-inner {
    max-width: 860px;
    margin: 0 auto;
}
.wd-cta-header {
    text-align: center;
    margin-bottom: 56px;
}
.wd-cta-header h2 {
    font-size: clamp(28px, 3.5vw, 42px);
    font-weight: 800;
    text-transform: uppercase;
    color: var(--wd-black);
    letter-spacing: -0.5px;
    margin-bottom: 12px;
}
.wd-cta-header p {
    font-size: 15px;
    color: var(--wd-muted);
}
.wd-form {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 0;
}
.wd-form-field {
    position: relative;
    padding-bottom: 36px;
}
.wd-form-field:nth-child(odd)  { padding-right: 28px; }
.wd-form-field:nth-child(even) { padding-left:  28px; }
.wd-form-field--full {
    grid-column: 1 / -1;
    padding-right: 0;
    padding-left: 0;
}
.wd-form-field input {
    width: 100%;
    background: transparent;
    border: none;
    border-bottom: 1px solid #ccc;
    padding: 12px 0;
    font-size: 14px;
    color: var(--wd-black);
    outline: none;
    font-family: inherit;
    transition: border-color var(--wd-transition);
}
.wd-form-field input::placeholder { color: #aaa; }
.wd-form-field input:focus { border-bottom-color: var(--wd-black); }
.wd-form-submit {
    grid-column: 1 / -1;
    display: flex;
    justify-content: center;
    margin-top: 10px;
}
.wd-form-btn {
    display: inline-flex;
    align-items: center;
    gap: 10px;
    background: var(--wd-red);
    color: #fff;
    border: none;
    padding: 16px 44px;
    font-size: 13px;
    font-weight: 700;
    text-transform: uppercase;
    letter-spacing: 1.5px;
    cursor: pointer;
    transition: background var(--wd-transition);
    font-family: inherit;
}
.wd-form-btn:hover { background: #c0151c; }
.wd-form-btn svg { width: 16px; height: 16px; }

/* ===== RESPONSIVE ===== */
@media (max-width: 1024px) {
    .wd-hero-img { width: 260px; }
    .wd-service-body { padding: 50px 44px; }
}
@media (max-width: 768px) {
    .wd-hero { padding: 100px 0 70px; }
    .wd-hero-inner {
        flex-direction: column;
        padding: 0 24px;
        gap: 36px;
    }
    .wd-hero-img { width: 100%; max-width: 320px; margin: 0 auto; }
    .wd-stats-inner { grid-template-columns: 1fr; padding: 0 24px; }
    .wd-stat-item { border-right: none; border-bottom: 1px solid var(--wd-border); }
    .wd-stat-item:last-child { border-bottom: none; }
    .wd-section-header { padding: 60px 24px 40px; }
    .wd-service-row,
    .wd-service-row--reverse { flex-direction: column; min-height: unset; }
    .wd-service-img { width: 100%; height: 240px; }
    .wd-service-body {
        padding: 36px 24px 42px;
        border-left: 4px solid var(--wd-red) !important;
        border-right: none !important;
    }
    .wd-clients-grid { grid-template-columns: repeat(3, 1fr); }
    .wd-client-item:nth-child(5n) { border-right: 1px solid var(--wd-border); }
    .wd-client-item:nth-child(3n) { border-right: none; }
    .wd-form { grid-template-columns: 1fr; }
    .wd-form-field:nth-child(odd),
    .wd-form-field:nth-child(even) { padding-left: 0; padding-right: 0; }
    .wd-cta { padding: 70px 24px; }
    .wd-clients-inner { padding: 0 24px; }
    .wd-quote { padding: 60px 24px; }
}
@media (max-width: 480px) {
    .wd-clients-grid { grid-template-columns: repeat(2, 1fr); }
    .wd-client-item:nth-child(3n) { border-right: 1px solid var(--wd-border); }
    .wd-client-item:nth-child(2n) { border-right: none; }
}
</style>
@endsection

@section('content')
<main>

    {{-- ===== HERO ===== --}}
    <section class="wd-hero">
        <div class="wd-hero-inner">
            <div class="wd-hero-content">
                <div class="wd-hero-tag">Web Design & Development</div>
                <h1 class="wd-hero-title">Best Web Design<br><em>Agency</em> in Gurgaon</h1>
                <p class="wd-hero-desc">
                    We create detail-oriented websites that resonate with your audience and increase your brand presence and visibility.
                </p>
                <a href="{{ route('contact') }}" class="wd-hero-cta">
                    Start a Project
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
            </div>
            <div class="wd-hero-img">
                <img src="{{ config('app.url') }}/assets/img/artboard.png" alt="Web Design Agency Gurgaon">
            </div>
        </div>
    </section>

    {{-- ===== STATS ===== --}}
    <div class="wd-stats">
        <div class="wd-stats-inner">
            <div class="wd-stat-item">
                <div class="wd-stat-number">100+</div>
                <div class="wd-stat-label">Years Team Experience</div>
            </div>
            <div class="wd-stat-item">
                <div class="wd-stat-number">1000+</div>
                <div class="wd-stat-label">Audience Reached</div>
            </div>
            <div class="wd-stat-item">
                <div class="wd-stat-number">10,000+</div>
                <div class="wd-stat-label">Campaigns Run</div>
            </div>
        </div>
    </div>

    {{-- ===== SECTION HEADER ===== --}}
    <div class="wd-section-header">
        <div class="wd-section-tag">Our Services</div>
        <h2 class="wd-section-title">How Web Design<br>Impacts Your Brand</h2>
        <p class="wd-section-subtitle">
            We dive into understanding your brand's essence, target audience and industry landscape to ensure every design decision aligns with your objectives — creating intuitive journeys that turn curiosity into engagement.
        </p>
    </div>

    {{-- ===== SERVICE ROWS ===== --}}
    <div class="wd-services">

        {{-- Row 1: text left, image right --}}
        <div class="wd-service-row">
            <div class="wd-service-body">
                <div class="wd-service-tag">Website Design & Development</div>
                <h2 class="wd-service-title">Web Design &<br>Development</h2>
                <p class="wd-service-desc">
                    Web design and development are the foundational elements of creating and maintaining a website. It involves both the design and the technical functionalities that make a website functional and attractive. It is our responsibility to ensure that the design aligns with the brand's identity and communicates effectively with the target audience.
                </p>
                <a href="{{ route('contact') }}" class="wd-service-link">
                    Get a Quote
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
            </div>
            <div class="wd-service-img">
                <img src="{{ config('app.url') }}/assets/img/web-design-&-Development.png" alt="website design and development Company">
            </div>
        </div>

        {{-- Row 2: image left, text right --}}
        <div class="wd-service-row wd-service-row--reverse">
            <div class="wd-service-body">
                <div class="wd-service-tag">Software Development Agency in Gurgaon</div>
                <h2 class="wd-service-title">Software<br>Development</h2>
                <p class="wd-service-desc">
                    Software development creates applications and programs that run on a variety of platforms, including desktops, mobile devices and web browsers. Software development involves custom solutions and integrating existing software to enhance the functionality of a website.
                </p>
                <a href="{{ route('contact') }}" class="wd-service-link">
                    Get a Quote
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
            </div>
            <div class="wd-service-img">
                <img src="{{ config('app.url') }}/assets/img/software-development.png" alt="Software Development Agency in Gurgaon">
            </div>
        </div>

        {{-- Row 3: text left, image right --}}
        <div class="wd-service-row">
            <div class="wd-service-body">
                <div class="wd-service-tag">App and Website Developer</div>
                <h2 class="wd-service-title">Mobile Apps<br>Development</h2>
                <p class="wd-service-desc">
                    Mobile app development focuses on creating applications specifically designed to run on mobile devices such as smartphones and tablets. While web design primarily caters to websites accessed via web browsers, mobile app development involves building apps on iOS or Android that are user friendly.
                </p>
                <a href="{{ route('contact') }}" class="wd-service-link">
                    Get a Quote
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
            </div>
            <div class="wd-service-img">
                <img src="{{ config('app.url') }}/assets/img/mobile-apps-development.png" alt="App and Website developer">
            </div>
        </div>

        {{-- Row 4: image left, text right --}}
        <div class="wd-service-row wd-service-row--reverse">
            <div class="wd-service-body">
                <div class="wd-service-tag">UX Design Agency in Gurgaon</div>
                <h2 class="wd-service-title">UX Design</h2>
                <p class="wd-service-desc">
                    UX design enhances user satisfaction by improving the usability and accessibility provided in the interaction between users and a product — whether a website, web application or mobile app. We conduct research, create user personas and develop prototypes to understand user behaviour.
                </p>
                <a href="{{ route('contact') }}" class="wd-service-link">
                    Get a Quote
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                </a>
            </div>
            <div class="wd-service-img">
                <img src="{{ config('app.url') }}/assets/img/ux-design.png" alt="UX Design agency in Gurgaon">
            </div>
        </div>

    </div>

    {{-- ===== CLIENTS ===== --}}
    <section class="wd-clients">
        <div class="wd-clients-inner">
            <div class="wd-clients-header">
                <h2>Brands We've Worked With</h2>
            </div>
            <div class="wd-clients-grid">
                @for ($i = 1; $i <= 20; $i++)
                <div class="wd-client-item">
                    <img src="{{ config('app.url') }}/assets/img/clients/{{ $i }}.png" alt="Client {{ $i }}">
                </div>
                @endfor
            </div>
        </div>
    </section>

    {{-- ===== QUOTE ===== --}}
    <section class="wd-quote">
        <p class="wd-quote-text">
            Good marketing makes the company look smart.<br>
            <span>Great marketing makes the customer feel smart.</span>
        </p>
    </section>

    {{-- ===== CTA FORM ===== --}}
    <section class="wd-cta">
        <div class="wd-cta-inner">
            <div class="wd-cta-header">
                <h2>Start a Project</h2>
                <p>Tell us about your project and we'll get back to you within 24 hours.</p>
            </div>
            <form action="{{ route('project-form') }}" method="post" class="wd-form">
                @csrf
                <input type="hidden" name="url" value="{{ Request::url() }}">
                <div class="wd-form-field">
                    <input type="text" name="name" placeholder="Your Name" required>
                </div>
                <div class="wd-form-field">
                    <input type="text" name="company_name" placeholder="Company Name" required>
                </div>
                <div class="wd-form-field">
                    <input type="email" name="email" placeholder="Email Address" required>
                </div>
                <div class="wd-form-field">
                    <input type="number" name="mobile" placeholder="Contact Number" required>
                </div>
                <div class="wd-form-field wd-form-field--full">
                    <input type="text" name="requirement" placeholder="Requirement" required>
                </div>
                <div class="wd-form-submit">
                    <button type="submit" class="wd-form-btn">
                        Send Enquiry
                        <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5"><path d="M5 12h14m-7-7 7 7-7 7"/></svg>
                    </button>
                </div>
            </form>
        </div>
    </section>

</main>
@endsection

@section('script')
@endsection
