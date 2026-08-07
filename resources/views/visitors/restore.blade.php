@extends('layout.visitor', [
    'title' => 'Social Media Agency in Gurgaon',
    'description' => 'Thumbpin is a digital advertising agency in Gurgaon that can help your business expand and stay connected effectively with your customer throughout their digital journey.'
])

@section('head')

@endsection

@section('content')

<main>

    {{-- ====================== Service-Hero-Sec Area (Three.js Revamp) ====================== --}}
    <div class="service-hero-sec top-sec bg-black" style="position: relative; overflow: hidden; padding: 150px 0 100px;">
        <div class="container h-100-only">
            <div class="row align-items-center h-100-only">
                <div class="col-lg-6">
                    <div class="content-box">
                        <div class="title" style="font-size: 80px; line-height: 0.9; font-weight: 800; color: #fff; letter-spacing: -2px; margin-bottom: 30px;">
                            WE ARE <br>
                            <span class="text-red">BEST AT</span>
                        </div>
                        <div class="des" style="border-left: 4px solid var(--tp-red);">
                            <p style="font-size: 20px; color: #ccc; line-height: 1.6; max-width: 90%;">
                                Creating unique business identities under our roof with integrated marketing solutions. We weave stories that make noise, amplify reach, and create wins.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 d-none d-lg-block">
                    <div style="position: relative; height: 800px; display: flex; align-items: flex-end; justify-content: center; margin-left:20px;">
                        <!-- Three.js Canvas Container (Floating above) -->
                        <div id="cube-canvas-container" style="width: 80%; height: 80%; position: absolute; top: 110px; left: 0; z-index: 10;"></div>
                        
                        <!-- Hand Image -->
                        <div class="hand-img-container" style="position: relative; z-index: 1; width: 100%; text-align: center;">
                            <img src="{{ config('app.url') }}/assets/img/hand.png" alt="hand" style="max-width: 95%; display: block; margin: 0 auto; margin-bottom:-30px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Service-Hero-Sec Area ====================== --}}

    {{-- ====================== Sec-9 Area (Revamped List) ====================== --}}
    <div class="sec-9" id="sec-9" style="padding: 100px 0; background: #fff;">
        <div class="container">
            <div class="service-list">
                <!-- Item 1 -->
                <div class="service-row" >
                    <span class="srv-num">01</span>
                    <h3 class="srv-name">Branding</h3>
                    <p class="srv-desc">Undertaking brand and market research to fathom brand goals and positioning, along with building on the existing voice and visual language.</p>
                </div>
                <!-- Item 2 -->
                <div class="service-row">
                    <span class="srv-num">02</span>
                    <h3 class="srv-name">Strategy</h3>
                    <p class="srv-desc">Deploying a research-based strategy with room for innovative developments, across all forms of traditional & non-traditional media.</p>
                </div>
                <!-- Item 3 -->
                 <a href="{{ route('digital-marketing') }}">
                <div class="service-row">
                    <span class="srv-num">03</span>
                    <h3 class="srv-name">Digital Marketing</h3>
                    <p class="srv-desc">We integrate marketing strategies & solutions to create distinctive conversations and reach a diverse audience through a unique online presence.</p>
                </div>
                </a>
                <!-- Item 4 -->
                <div class="service-row">
                    <span class="srv-num">04</span>
                    <h3 class="srv-name">Film & Video</h3>
                    <p class="srv-desc">We create television commercials, animated films, 360° videos, short films, web series, more in-house talent, and collaborations.</p>
                </div>
                <!-- Item 5 -->
                <div class="service-row">
                    <span class="srv-num">05</span>
                    <h3 class="srv-name">Web Designing</h3>
                    <p class="srv-desc">Working with innovative UI/UX designs and infographics to establish a platform to connect with people.</p>
                </div>
                <!-- Item 6 -->
                <div class="service-row">
                    <span class="srv-num">06</span>
                    <h3 class="srv-name">Events & Live</h3>
                    <p class="srv-desc">We take your brand out on a walk amidst society & concerts.</p>
                </div>
                <!-- Item 7 -->
                <div class="service-row">
                    <span class="srv-num">07</span>
                    <h3 class="srv-name">Disruptive Ideas</h3>
                    <p class="srv-desc">We plan unprecedented solutions and ideas that take your brand to the front line of unique marketing campaigns.</p>
                </div>
                <!-- Item 8 -->
                <div class="service-row">
                    <span class="srv-num">08</span>
                    <h3 class="srv-name">Friendship With Benefits</h3>
                    <p class="srv-desc">Got a specific project for us? We’re here to provide our expertise.</p>
                </div>
            </div>
        </div>

        <style>
            .service-list {
                display: flex;
                flex-direction: column;
            }
            .service-row {
                display: grid;
                grid-template-columns: 80px 300px 1fr;
                align-items: center;
                padding: 40px 0;
                border-bottom: 1px solid #eee;
                transition: 0.4s;
                cursor: default;
            }
            .service-row:first-child { border-top: 1px solid #eee; }
            .service-row:hover {
                border-bottom-color: var(--tp-red);
                transform: translateX(10px);
            }
            .srv-num {
                font-size: 16px;
                font-weight: 700;
                color: var(--tp-red);
                font-family: monospace;
                transition: 0.4s;
            }
            .service-row:hover .srv-num { color: #000; }
            .srv-name {
                font-size: 32px;
                font-weight: 800;
                color: #000;
                margin: 0;
                text-transform: uppercase;
                letter-spacing: -1px;
                transition: 0.4s;
            }
            .service-row:hover .srv-name { color: var(--tp-red); } /* Added Red Hover for Name */
            .srv-desc {
                font-size: 18px;
                color: #666;
                margin: 0;
                max-width: 80%;
                line-height: 1.6;
            }

            @media (max-width: 991px) {
                .service-row {
                    grid-template-columns: 50px 1fr;
                    grid-template-rows: auto auto;
                    gap: 10px;
                }
                .srv-name { grid-column: 2; }
                .srv-desc { grid-column: 2; margin-top: 10px; max-width: 100%; }
            }
        </style>
    </div>
    {{-- ====================== End Sec-9 Area ====================== --}}

    {{-- ====================== Sec-3 Area (Refined) ====================== --}}
    <div class="sec-3 bg-black" style="padding: 120px 0;">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5 mb-5 mb-lg-0">
                    <div class="sec-img-1" style="position: relative;">
                        <div class="img" style="border-radius: 0; overflow: hidden; transition: 0.5s;">
                            <img src="{{ config('app.url') }}/assets/img/service-01.png" alt="img" style="width: 100%; display: block;">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 offset-lg-1">
                    <div class="content-box">
                        <div class="sec-title" style="margin-bottom: 40px;">
                            <p style="font-size: 18px; letter-spacing: 4px; color: var(--tp-red); text-transform: uppercase; margin-bottom: 10px; font-weight: 700;">Brand</p>
                            <b style="font-size: 60px; line-height: 1; color: #fff; font-weight: 800; display: block;">
                                Your St<span style="color: var(--tp-red);">o</span>ry
                            </b>
                        </div>
                        <div class="des" style="color: #ccc; font-size: 18px; line-height: 1.7; margin-bottom: 40px;">
                            <p style="margin-bottom: 20px;">
                                We are creatively strategic and strategically creative. We follow a research-based strategy to create memorable brand identities.
                            </p>
                            <p>
                                Advertising is the aftertaste of a good story. So, Thumbpin weaves a unique tale for your brand punched together with design and production.
                            </p>
                        </div>
                        <div class="link">
                            <!-- Changed button to Red Background -->
                            <a href="{{ route('contact') }}" class="btn" style="background: var(--tp-red); color: #fff; padding: 15px 40px; border-radius: 50px; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; transition: 0.3s; text-decoration: none; display: inline-block;">
                                Get In Touch
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- ====================== End Sec-3 Area ====================== --}}

</main>

@endsection

@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Scene Setup
        const container = document.getElementById('cube-canvas-container');
        if (!container) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, container.clientWidth / container.clientHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ alpha: true, antialias: true });
        
        renderer.setSize(container.clientWidth, container.clientHeight);
        container.appendChild(renderer.domElement);

        // Lighting (Required for Solid Material)
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.6); // Soft white light
        scene.add(ambientLight);

        const directionalLight = new THREE.DirectionalLight(0xffffff, 0.8);
        directionalLight.position.set(5, 5, 5);
        scene.add(directionalLight);

        // Solid Red Cube
        const geometry = new THREE.BoxGeometry(2.2, 2.2, 2.2);
        // Using MeshStandardMaterial for better lighting reaction
        const material = new THREE.MeshStandardMaterial({ 
            color: 0xff0000, // Red
            roughness: 0.4,
            metalness: 0.1
        });
        const cube = new THREE.Mesh(geometry, material);
        cube.position.y = 0.5; // Move up slightly to float above hand
        scene.add(cube);

        // Camera Position
        camera.position.z = 5;

        // Animation Loop
        function animate() {
            requestAnimationFrame(animate);

            // Rotate Cube
            cube.rotation.x += 0.005;
            cube.rotation.y += 0.005;

            renderer.render(scene, camera);
        }
        animate();

        // Handle Resize
        window.addEventListener('resize', function() {
            if (container) {
                const width = container.clientWidth;
                const height = container.clientHeight;
                renderer.setSize(width, height);
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
            }
        });
    });
</script>
@endsection
