/* Thumbpin — index_new page scripts (extracted from inline blade) */

        AOS.init({ offset: 60, duration: 800, easing: 'ease-out-cubic', once: true });

        // ================= PERFORMANCE: LAZY LOADING SYSTEM =================
        (function() {
            'use strict';
            
            // 1. MOBILE VIDEO LOADER - Only load on small screens
            function initMobileVideo() {
                const container = document.getElementById('hero-video-mobile-container');
                const template = document.getElementById('hero-video-mobile-template');
                
                if (!container || !template) return;
                
                // Only load mobile video on screens <= 768px
                if (window.innerWidth <= 768) {
                    const videoContent = template.content.cloneNode(true);
                    container.appendChild(videoContent);
                }
            }
            
            // 2. LAZY LOAD IFRAMES - Load only when scrolled into view
            function initLazyIframes() {
                // Select all iframes that should be lazy loaded (below hero section)
                const lazyIframes = document.querySelectorAll('.films-showcase-section iframe, .reels-showcase-section iframe');
                
                if ('IntersectionObserver' in window) {
                    const iframeObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const iframe = entry.target;
                                // Store the src and restore it (for iframes already with src)
                                // This triggers the actual load
                                if (iframe.dataset.lazySrc) {
                                    iframe.src = iframe.dataset.lazySrc;
                                    iframe.removeAttribute('data-lazy-src');
                                } else if (!iframe.dataset.loaded) {
                                    // Mark as loaded to prevent re-triggering
                                    iframe.dataset.loaded = 'true';
                                }
                                observer.unobserve(iframe);
                            }
                        });
                    }, {
                        rootMargin: '200px 0px', // Start loading 200px before entering viewport
                        threshold: 0.01
                    });
                    
                    lazyIframes.forEach(iframe => {
                        // Convert src to data-lazy-src for deferred loading
                        if (iframe.src && !iframe.dataset.lazySrc) {
                            iframe.dataset.lazySrc = iframe.src;
                            iframe.removeAttribute('src');
                            // Add a placeholder loading state
                            iframe.style.backgroundColor = '#1a1a1a';
                        }
                        iframeObserver.observe(iframe);
                    });
                }
            }
            
            // 3. LAZY LOAD IMAGES BELOW FOLD (for images without native lazy loading)
            function initLazyImages() {
                const lazyImages = document.querySelectorAll('.main-content-wrapper img:not([loading])');
                
                if ('IntersectionObserver' in window) {
                    const imageObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                const img = entry.target;
                                if (img.dataset.src) {
                                    img.src = img.dataset.src;
                                    img.removeAttribute('data-src');
                                }
                                observer.unobserve(img);
                            }
                        });
                    }, {
                        rootMargin: '100px 0px',
                        threshold: 0.01
                    });
                    
                    lazyImages.forEach(img => imageObserver.observe(img));
                }
            }
            
            // 4. DEFER HEAVY SECTIONS - Load section content only when approaching
            function initDeferredSections() {
                const heavySections = document.querySelectorAll('.films-showcase-section, .reels-showcase-section');
                
                if ('IntersectionObserver' in window) {
                    const sectionObserver = new IntersectionObserver((entries) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                entry.target.classList.add('section-loaded');
                            }
                        });
                    }, {
                        rootMargin: '300px 0px',
                        threshold: 0.01
                    });
                    
                    heavySections.forEach(section => sectionObserver.observe(section));
                }
            }
            
            // 5. HERO PILL VIDEO - Duplicates the hero background clip; defer its
            // load until after the page has settled so it doesn't compete with
            // the hero background video for bandwidth during initial load/LCP.
            function initHeroPillVideo() {
                const pill = document.getElementById('hero-video-pill');
                if (!pill) return;

                // The pill lives inside the headline <h1>, which is display:none
                // below 769px. Without this guard we still called load() there and
                // pulled the full ~6MB desktop clip down on a phone to render
                // nothing -- by far the largest transfer on the mobile homepage.
                // Breakpoint mirrors the max-[768px]:hidden utility on the <h1>.
                if (window.matchMedia('(max-width: 768px)').matches) return;

                const start = () => {
                    pill.load();
                    pill.play().catch(() => {});
                };

                if ('requestIdleCallback' in window) {
                    requestIdleCallback(start, { timeout: 3000 });
                } else {
                    setTimeout(start, 1500);
                }
            }

            // 6. LAZY VIDEOS - Portfolio case-study previews below the fold.
            // preload="none" by default; only assign the real src (and start
            // buffering metadata) once the video scrolls near the viewport.
            function initLazyVideos() {
                const lazyVideos = document.querySelectorAll('video.lazy-video');
                if (!lazyVideos.length) return;

                const loadVideo = (video) => {
                    if (video.dataset.loaded) return;
                    video.dataset.loaded = 'true';
                    video.querySelectorAll('source[data-src]').forEach(source => {
                        source.src = source.dataset.src;
                        source.removeAttribute('data-src');
                    });
                    video.preload = 'metadata';
                    video.load();
                };

                if ('IntersectionObserver' in window) {
                    const videoObserver = new IntersectionObserver((entries, observer) => {
                        entries.forEach(entry => {
                            if (entry.isIntersecting) {
                                loadVideo(entry.target);
                                observer.unobserve(entry.target);
                            }
                        });
                    }, { rootMargin: '300px 0px' });

                    lazyVideos.forEach(video => videoObserver.observe(video));
                } else {
                    lazyVideos.forEach(loadVideo);
                }
            }

            // Initialize all lazy loading on DOM ready
            if (document.readyState === 'loading') {
                document.addEventListener('DOMContentLoaded', function() {
                    initMobileVideo();
                    // Delay iframe loading to prioritize hero section
                    requestAnimationFrame(() => {
                        initLazyIframes();
                        initLazyImages();
                        initDeferredSections();
                        initLazyVideos();
                    });
                });
            } else {
                initMobileVideo();
                requestAnimationFrame(() => {
                    initLazyIframes();
                    initLazyImages();
                    initDeferredSections();
                    initLazyVideos();
                });
            }

            window.addEventListener('load', initHeroPillVideo);
        })();

        window.addEventListener('load', function() {
            $('header').removeClass('header_anime');
            

        });
        $(document).ready(function(){ $(window).scrollTop(0); });
        $(document).ready(function(){ 
            $(window).scrollTop(0); 

            // Contact Form AJAX
            $('.contact-form form').on('submit', function(e){
                e.preventDefault();
                var $form = $(this);
                var $btn = $form.find('button[type="submit"]');
                var originalText = $btn.text();
                
                $btn.prop('disabled', true).text('Sending...');
                
                $.ajax({
                    url: $form.attr('action'),
                    method: 'POST',
                    data: $form.serialize(),
                    success: function(response){
                        $form.fadeOut(300, function(){
                            $(this).parent().append(`
                                <div class="success-message" style="text-align: center; padding: 40px 20px;">
                                    <h3 style="color: var(--tp-red); margin-bottom: 15px; font-size: 28px;">Thank You!</h3>
                                    <p style="font-size: 18px; color: #333;">Your message has been sent successfully.<br>We will get back to you soon.</p>
                                </div>
                            `);
                        });
                        $form[0].reset();
                    },
                    error: function(xhr){
                        $('.contact-form .error-message').remove();
                        $form.prepend(`
                            <div class="error-message" style="color: #fff; background: #ff3333; padding: 10px; border-radius: 4px; margin-bottom: 15px; text-align: center;">
                                Something went wrong. Please check your inputs and try again.
                            </div>
                        `);
                        console.error(xhr);
                    },
                    complete: function(){
                        $btn.prop('disabled', false).text(originalText);
                    }
                });
            });
        });
        
        /* ================= HERO VIDEO BACKGROUND INIT ================= */
        function initHeroVideo() {
            const video = document.getElementById('hero-video-bg');
            if (!video) return;
            
            // MP4 plays natively, just ensure it starts
            video.play().catch(e => console.log('Autoplay prevented:', e));
        }
        
        // Initialize hero video on load
        window.addEventListener('load', function() {
            initHeroVideo();
        });



        /* ================= ADVERTISING AGENCY SCRIPTS ================= */
        
        // Video Modal Functions
        function openVideoModal(videoSource) {
            const modal = document.getElementById('videoModal');
            const modalContent = document.getElementById('modalContent');
            
            if (!modal || !modalContent) return;
            
            // Clear previous content
            const existingVideo = modalContent.querySelector('video');
            if (existingVideo) existingVideo.remove();
            
            // Create video element
            const video = document.createElement('video');
            video.controls = true;
            video.autoplay = true;
            video.style.maxWidth = '100%';
            video.style.maxHeight = '90vh';
            video.src = videoSource;
            
            modalContent.appendChild(video);
            video.play().catch(e => console.log('Autoplay prevented:', e));
            
            modal.style.display = 'flex';
        }
        
        function closeVideoModal() {
            const modal = document.getElementById('videoModal');
            const modalContent = document.getElementById('modalContent');
            
            if (!modal || !modalContent) return;
            
            const video = modalContent.querySelector('video');
            if (video) {
                video.pause();
                video.remove();
            }
            
            modal.style.display = 'none';
        }
        
        // Close modal on outside click
        document.addEventListener('click', function(e) {
            const modal = document.getElementById('videoModal');
            if (e.target === modal) {
                closeVideoModal();
            }
        });
        
        // Toggle Mute Function for Reels
        function toggleMute(videoId, button) {
            const video = document.getElementById(videoId);
            if (video) {
                video.muted = !video.muted;
                button.classList.toggle('muted');
                button.querySelector('span').textContent = video.muted ? '🔇' : '🔊';
            }
        }
        
        // Testimonials Carousel
        let currentTestiIndex = 1;
        const testiCards = document.querySelectorAll('.testi-card-v2');
        const testiPrevBtn = document.getElementById('testiPrev');
        const testiNextBtn = document.getElementById('testiNext');
        
        function updateTestimonials() {
            testiCards.forEach((card, index) => {
                card.classList.remove('active', 'prev', 'next');
                
                if (index === currentTestiIndex) {
                    card.classList.add('active');
                } else if (index === currentTestiIndex - 1 || (currentTestiIndex === 0 && index === testiCards.length - 1)) {
                    card.classList.add('prev');
                } else if (index === currentTestiIndex + 1 || (currentTestiIndex === testiCards.length - 1 && index === 0)) {
                    card.classList.add('next');
                }
            });
        }
        
        if (testiPrevBtn) {
            testiPrevBtn.addEventListener('click', () => {
                currentTestiIndex = (currentTestiIndex - 1 + testiCards.length) % testiCards.length;
                updateTestimonials();
            });
        }
        
        if (testiNextBtn) {
            testiNextBtn.addEventListener('click', () => {
                currentTestiIndex = (currentTestiIndex + 1) % testiCards.length;
                updateTestimonials();
            });
        }
        
        // Reveal Animation on Scroll
        function revealOnScroll() {
            const reveals = document.querySelectorAll('.reveal');
            
            reveals.forEach(element => {
                const elementTop = element.getBoundingClientRect().top;
                const elementVisible = 150;
                
                if (elementTop < window.innerHeight - elementVisible) {
                    element.classList.add('active');
                }
            });
        }
        
        window.addEventListener('scroll', revealOnScroll);
        window.addEventListener('load', revealOnScroll);
        
        // Portfolio Drag Functionality (Mobile)
        const portfolioShowcase = document.querySelector('.portfolio-showcase');
        const portfolioHint = document.querySelector('.portfolio-scroll-hint');
        
        if (portfolioShowcase && portfolioHint) {
            let isDown = false;
            let startX;
            let scrollLeft;
            let hasDragged = false;
            
            portfolioShowcase.addEventListener('mousedown', (e) => {
                isDown = true;
                startX = e.pageX - portfolioShowcase.offsetLeft;
                scrollLeft = portfolioShowcase.scrollLeft;
            });
            
            portfolioShowcase.addEventListener('mouseleave', () => {
                isDown = false;
            });
            
            portfolioShowcase.addEventListener('mouseup', () => {
                isDown = false;
            });
            
            portfolioShowcase.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - portfolioShowcase.offsetLeft;
                const walk = (x - startX) * 2;
                portfolioShowcase.scrollLeft = scrollLeft - walk;
                
                if (!hasDragged) {
                    portfolioHint.classList.add('hidden');
                    hasDragged = true;
                }
            });
            
            // Touch events for mobile
            portfolioShowcase.addEventListener('touchstart', () => {
                if (!hasDragged) {
                    portfolioHint.classList.add('hidden');
                    hasDragged = true;
                }
            });
            
            // Limit drag translation to -155px
            portfolioShowcase.addEventListener('scroll', () => {
                const maxScroll = portfolioShowcase.scrollWidth - portfolioShowcase.clientWidth;
                if (portfolioShowcase.scrollLeft > maxScroll - 155) {
                    portfolioShowcase.scrollLeft = maxScroll - 155;
                }
            });
        }
        
        // YouTube Facade - Load iframe only on click (Performance Optimization)
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.youtube-facade').forEach(function(facade) {
                facade.addEventListener('click', function() {
                    const videoId = this.dataset.videoId;
                    const wrapper = this.parentElement;
                    const iframe = document.createElement('iframe');
                    iframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1';
                    iframe.setAttribute('frameborder', '0');
                    iframe.setAttribute('allowfullscreen', '');
                    iframe.setAttribute('allow', 'accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share');
                    iframe.style.cssText = 'position: absolute; top:0; left:0; width:100%; height:100%;';
                    this.style.display = 'none';
                    wrapper.appendChild(iframe);
                });
            });
        });

        // Initialize HLS for video thumbnails                                                                      
        document.addEventListener('DOMContentLoaded', () => {
            if (typeof Hls !== 'undefined' && Hls.isSupported()) {
                document.querySelectorAll('.hls-thumbnail').forEach(video => {
                    const src = video.querySelector('source')?.src;
                    if (src && src.includes('.m3u8')) {
                        const hls = new Hls({
                            maxBufferLength: 10,
                            maxMaxBufferLength: 20
                        });
                        hls.loadSource(src);
                        hls.attachMedia(video);
                    }
                });
            }
        });
                                                                        
        // Testimonials Carousel with Complete Touch/Swipe Support
        document.addEventListener('DOMContentLoaded', function() {
            const track = document.getElementById('testiTrack');
            const cards = document.querySelectorAll('.testi-card-v2');
            const prevBtn = document.getElementById('testiPrev');
            const nextBtn = document.getElementById('testiNext');
            let currentIndex = 1;
            const totalCards = cards.length;

            function updateCarousel() {
                cards.forEach((card, index) => {
                    card.classList.remove('active', 'prev', 'next', 'hidden');
                    
                    if (index === currentIndex) {
                        card.classList.add('active');
                    } else if (index === (currentIndex - 1 + totalCards) % totalCards) {
                        card.classList.add('prev');
                    } else if (index === (currentIndex + 1) % totalCards) {
                        card.classList.add('next');
                    } else {
                        card.classList.add('hidden');
                    }
                });
            }

            function goToNext() {
                currentIndex = (currentIndex + 1) % totalCards;
                updateCarousel();
            }

            function goToPrev() {
                currentIndex = (currentIndex - 1 + totalCards) % totalCards;
                updateCarousel();
            }

            if (nextBtn && prevBtn) {
                nextBtn.addEventListener('click', goToNext);
                prevBtn.addEventListener('click', goToPrev);
            }

            // Touch/Swipe functionality
            if (track) {
                let touchStartX = 0;
                let touchEndX = 0;
                let touchStartY = 0;
                let touchEndY = 0;
                const swipeThreshold = 50;

                track.addEventListener('touchstart', (e) => {
                    touchStartX = e.changedTouches[0].screenX;
                    touchStartY = e.changedTouches[0].screenY;
                }, { passive: true });

                track.addEventListener('touchend', (e) => {
                    touchEndX = e.changedTouches[0].screenX;
                    touchEndY = e.changedTouches[0].screenY;
                    handleSwipe();
                }, { passive: true });

                // Mouse drag functionality for desktop
                let mouseStartX = 0;
                let mouseEndX = 0;
                let isDragging = false;

                track.addEventListener('mousedown', (e) => {
                    mouseStartX = e.clientX;
                    isDragging = true;
                    track.style.cursor = 'grabbing';
                });

                track.addEventListener('mousemove', (e) => {
                    if (!isDragging) return;
                    e.preventDefault();
                });

                track.addEventListener('mouseup', (e) => {
                    if (!isDragging) return;
                    mouseEndX = e.clientX;
                    isDragging = false;
                    track.style.cursor = 'grab';
                    handleMouseSwipe();
                });

                track.addEventListener('mouseleave', () => {
                    isDragging = false;
                    track.style.cursor = 'grab';
                });

                function handleSwipe() {
                    const deltaX = touchEndX - touchStartX;
                    const deltaY = Math.abs(touchEndY - touchStartY);

                    if (Math.abs(deltaX) > swipeThreshold && deltaY < Math.abs(deltaX)) {
                        if (deltaX > 0) {
                            goToPrev();
                        } else {
                            goToNext();
                        }
                    }
                }

                function handleMouseSwipe() {
                    const deltaX = mouseEndX - mouseStartX;

                    if (Math.abs(deltaX) > swipeThreshold) {
                        if (deltaX > 0) {
                            goToPrev();
                        } else {
                            goToNext();
                        }
                    }
                }

                track.style.cursor = 'grab';
            }

            updateCarousel();
        });

        // Portfolio Enhanced Drag with -155px Limit
        document.addEventListener('DOMContentLoaded', function() {
            const portfolioShowcase = document.querySelector('.portfolio-showcase');
            const portfolioHint = document.querySelector('.portfolio-scroll-hint');
            
            if (portfolioShowcase && portfolioHint) {
                let isDown = false;
                let startX;
                let scrollLeft;
                let hasDragged = false;
                
                portfolioShowcase.addEventListener('mousedown', (e) => {
                    isDown = true;
                    startX = e.pageX - portfolioShowcase.offsetLeft;
                    scrollLeft = portfolioShowcase.scrollLeft;
                    portfolioShowcase.style.cursor = 'grabbing';
                });
                
                portfolioShowcase.addEventListener('mouseleave', () => {
                    isDown = false;
                    portfolioShowcase.style.cursor = 'grab';
                });
                
                portfolioShowcase.addEventListener('mouseup', () => {
                    isDown = false;
                    portfolioShowcase.style.cursor = 'grab';
                });
                
                portfolioShowcase.addEventListener('mousemove', (e) => {
                    if (!isDown) return;
                    e.preventDefault();
                    const x = e.pageX - portfolioShowcase.offsetLeft;
                    const walk = (x - startX) * 2;
                    portfolioShowcase.scrollLeft = scrollLeft - walk;
                    
                    if (!hasDragged) {
                        portfolioHint.classList.add('hidden');
                        hasDragged = true;
                    }
                });
                
                // Touch events for mobile
                portfolioShowcase.addEventListener('touchstart', () => {
                    if (!hasDragged) {
                        portfolioHint.classList.add('hidden');
                        hasDragged = true;
                    }
                });
                
                // Translation limit: -155px maximum
                portfolioShowcase.addEventListener('scroll', () => {
                    const maxScroll = portfolioShowcase.scrollWidth - portfolioShowcase.clientWidth;
                    if (portfolioShowcase.scrollLeft > maxScroll - 155) {
                        portfolioShowcase.scrollLeft = maxScroll - 155;
                    }
                });
            }
        });

        // Reels Section Enhanced Mobile Scroll
        document.addEventListener('DOMContentLoaded', function() {
            const reelGrid = document.querySelector('.modern-reel-grid');
            if (!reelGrid) return;

            reelGrid.style.scrollBehavior = 'smooth';

            let isDown = false;
            let startX;
            let scrollLeft;

            reelGrid.addEventListener('mousedown', (e) => {
                isDown = true;
                reelGrid.style.cursor = 'grabbing';
                startX = e.pageX - reelGrid.offsetLeft;
                scrollLeft = reelGrid.scrollLeft;
            });

            reelGrid.addEventListener('mouseleave', () => {
                isDown = false;
                reelGrid.style.cursor = 'grab';
            });

            reelGrid.addEventListener('mouseup', () => {
                isDown = false;
                reelGrid.style.cursor = 'grab';
            });

            reelGrid.addEventListener('mousemove', (e) => {
                if (!isDown) return;
                e.preventDefault();
                const x = e.pageX - reelGrid.offsetLeft;
                const walk = (x - startX) * 3;
                reelGrid.scrollLeft = scrollLeft - walk;
            });
        });

        // Work Filter Logic & Optimized Lazy Loading
        $(document).ready(function() {
            var $grid = $('.work-grid');
            var $loader = $('.grid-loader');
            
            // Initialize Isotope
            $grid.isotope({
                itemSelector: '.work-grid-item',
                layoutMode: 'fitRows',
                filter: '*'
            });

            // Lazy Load Function
            function loadVisibleImages() {
                // Get all visible items from Isotope
                var visibleItems = $grid.isotope('getFilteredItemElements');
                
                // Use Intersection Observer for visible items
                var observer = new IntersectionObserver(function(entries, observer) {
                    entries.forEach(function(entry) {
                        if (entry.isIntersecting) {
                            var $item = $(entry.target);
                            var $card = $item.find('.work-card');
                            var $media = $item.find('img, video');
                            var src = $media.attr('data-src');
                            
                            if (src && !$media.attr('src')) {
                                // Start loading state
                                $card.addClass('loading');
                                
                                $media.attr('src', src);
                                
                                $media.on('load loadeddata', function() {
                                    $card.removeClass('loading').addClass('loaded');
                                    $item.addClass('content-loaded'); // Remove skeleton
                                    $(this).addClass('loaded');
                                });
                                
                                // For cached images
                                if ($media[0].complete) {
                                    $card.removeClass('loading').addClass('loaded');
                                    $item.addClass('content-loaded');
                                    $media.addClass('loaded');
                                }
                            }
                            observer.unobserve(entry.target);
                        }
                    });
                }, { root: document.querySelector('.work-grid-container'), rootMargin: '50px' });

                // Observe each visible item
                $(visibleItems).each(function() {
                    observer.observe(this);
                });
            }

            // Initial Load
            loadVisibleImages();
            $loader.addClass('hidden');
            $grid.addClass('loaded');

            // Filter items on button click
            $('.filter-group').on( 'click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $grid.isotope({ filter: filterValue });
                
                // Reset scroll position
                $('.work-grid-container').scrollTop(0);
                
                // Active class management
                $('.filter-group button').removeClass('active');
                $(this).addClass('active');
            });
            
            // Re-trigger lazy load after filtering
            $grid.on('arrangeComplete', function() {
                loadVisibleImages();
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const reelItems = document.querySelectorAll('.reel-item-modern');
            const isTouch = ('ontouchstart' in window) || (navigator.maxTouchPoints > 0);
            
            // GLOBAL MUTE STATE (Default: Muted)
            let areReelsMuted = true;

            // Update all mute buttons to reflect the global state
            const updateAllMuteButtons = () => {
                reelItems.forEach(item => {
                    const btn = item.querySelector('.reel-s-mute-btn');
                    const icon = btn.querySelector('i');
                    if (areReelsMuted) {
                        icon.className = 'fas fa-volume-mute';
                        btn.classList.add('muted');
                    } else {
                        icon.className = 'fas fa-volume-up';
                        btn.classList.remove('muted');
                    }
                    
                    // Also update the video if it's currently playing?
                    // Or just let the interaction handle it.
                    // Ideally, if a video is playing, it should update immediately.
                    const video = item.querySelector('video');
                    if(video) video.muted = areReelsMuted;
                });
            };

            // Intersection Observer (Auto-Pause only)
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (!entry.isIntersecting) {
                        const video = entry.target.querySelector('video');
                        if (video && !video.paused) {
                            video.pause();
                            updatePlayIcon(entry.target, 'paused');
                        }
                    }
                });
            }, { threshold: 0.4 });

            // Helper to toggle Play Icon
            const updatePlayIcon = (item, state) => {
                const icon = item.querySelector('.reel-play-icon i');
                if(icon) {
                    if(state === 'playing') {
                        icon.className = 'fas fa-pause';
                    } else {
                        icon.className = 'fas fa-play';
                    }
                }
            };

            reelItems.forEach(item => {
                const video = item.querySelector('video');
                const muteBtn = item.querySelector('.reel-s-mute-btn');
                
                if(!video) return;

                observer.observe(item);

                // MUTE BUTTON CLICK (Global Toggle)
                if(muteBtn) {
                    muteBtn.addEventListener('click', (e) => {
                        e.preventDefault();
                        e.stopPropagation(); // Don't trigger card click
                        
                        areReelsMuted = !areReelsMuted;
                        updateAllMuteButtons();
                    });
                }

                if (window.innerWidth > 991 && !isTouch) {
                    // DESKTOP: Hover to Play
                    item.addEventListener('mouseenter', () => {
                        // Apply global mute state
                        video.muted = areReelsMuted;
                        video.currentTime = 0;
                        
                        const playPromise = video.play();
                        if (playPromise !== undefined) {
                            playPromise.then(_ => {
                                updatePlayIcon(item, 'playing');
                            }).catch(err => {
                                // Autoplay blocked? Mute and try again
                                video.muted = true; 
                                video.play();
                            });
                        }
                    });

                    item.addEventListener('mouseleave', () => {
                        video.pause();
                        video.currentTime = 0;
                        updatePlayIcon(item, 'paused');
                    });

                } else {
                    // MOBILE: Click/Tap to Play
                    item.addEventListener('click', (e) => {
                        // If they clicked the mute button, do nothing (handled above)
                        if(e.target.closest('.reel-s-mute-btn')) return;

                        e.preventDefault();

                        // Pause others
                        reelItems.forEach(other => {
                            if(other !== item) {
                                const v = other.querySelector('video');
                                if(v && !v.paused) {
                                    v.pause();
                                    updatePlayIcon(other, 'paused');
                                }
                            }
                        });

                        video.muted = areReelsMuted; // Sync mute state
                        
                        if (video.paused) {
                            video.play();
                            updatePlayIcon(item, 'playing');
                        } else {
                            video.pause();
                            updatePlayIcon(item, 'paused');
                        }
                    });
                }
            });
            
            // Initial call to set button state
            updateAllMuteButtons();
        });

        // Reset form
        function resetHomeForm() {
            const form = document.getElementById('homeContactForm');
            if (form) {
                form.reset();
                const msgs = document.getElementById('form-messages');
                if (msgs) { msgs.style.display = 'none'; msgs.className = 'form-messages'; }
            }
        }

        // Voice AI Form Fill
        function startFormVoiceInput() {
            if (!('webkitSpeechRecognition' in window) && !('SpeechRecognition' in window)) {
                alert('Voice input is not supported in this browser. Please use Chrome.');
                return;
            }

            const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
            const recognition = new SpeechRecognition();
            recognition.lang = 'en-IN';
            recognition.interimResults = true;
            recognition.maxAlternatives = 1;

            const btn = document.getElementById('voiceFormBtn');
            const label = document.getElementById('formMicLabel');
            const status = document.getElementById('formVoiceStatus');

            btn.classList.add('listening');
            label.textContent = 'Listening...';
            status.style.display = 'block';
            status.textContent = 'Speak naturally: "My name is X, email is Y, phone is Z..."';

            recognition.start();

            recognition.onresult = function(event) {
                let transcript = '';
                for (let i = 0; i < event.results.length; i++) {
                    transcript += event.results[i][0].transcript;
                }
                status.textContent = '"' + transcript + '"';

                if (event.results[0].isFinal) {
                    parseVoiceToForm(transcript);
                }
            };

            recognition.onend = function() {
                btn.classList.remove('listening');
                label.textContent = 'Speak to Fill Form';
                setTimeout(() => { status.style.display = 'none'; }, 3000);
            };

            recognition.onerror = function(e) {
                btn.classList.remove('listening');
                label.textContent = 'Speak to Fill Form';
                status.textContent = 'Error: ' + e.error;
                setTimeout(() => { status.style.display = 'none'; }, 3000);
            };
        }

        function parseVoiceToForm(text) {
            const form = document.getElementById('homeContactForm');
            if (!form) return;
            const t = text.toLowerCase();

            // Name
            const nameMatch = t.match(/(?:my name is|name is|i am|i'm)\s+([a-z\s]+?)(?:,|\.|and|email|phone|mobile|company|from|$)/i);
            if (nameMatch) {
                const nameField = form.querySelector('[name="name"]');
                if (nameField) nameField.value = nameMatch[1].trim().replace(/\b\w/g, l => l.toUpperCase());
            }

            // Email
            const emailMatch = t.match(/(?:email is|email|mail is|mail)\s+([a-z0-9.\-_]+\s*(?:at|@)\s*[a-z0-9.\-]+\s*(?:dot|\.)\s*[a-z]+)/i);
            if (emailMatch) {
                const emailField = form.querySelector('[name="email"]');
                if (emailField) {
                    emailField.value = emailMatch[1].replace(/\s*at\s*/g, '@').replace(/\s*dot\s*/g, '.').replace(/\s/g, '');
                }
            }

            // Phone
            const phoneMatch = t.match(/(?:phone|mobile|number|call me at|call me on)\s*(?:is|number)?\s*([0-9\s]{7,})/i);
            if (phoneMatch) {
                const phoneField = form.querySelector('[name="mobile"]');
                if (phoneField) phoneField.value = phoneMatch[1].replace(/\s/g, '');
            }

            // Company
            const compMatch = t.match(/(?:company is|company name is|from|brand is|work at)\s+([a-z\s]+?)(?:,|\.|and|email|phone|$)/i);
            if (compMatch) {
                const compField = form.querySelector('[name="company_name"]');
                if (compField) compField.value = compMatch[1].trim().replace(/\b\w/g, l => l.toUpperCase());
            }

            // Requirement - use the full text if nothing else matched or append remainder
            const reqMatch = t.match(/(?:project|requirement|need|looking for|want)\s+(?:is\s+)?(.+)/i);
            if (reqMatch) {
                const reqField = form.querySelector('[name="requirement"]');
                if (reqField) reqField.value = reqMatch[1].trim().charAt(0).toUpperCase() + reqMatch[1].trim().slice(1);
            }
        }
