<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>CV | {{ $cvData->nama_lengkap ?? 'Curriculum Vitae' }}</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root{
            --bg: #f6fbff; /* pale background */
            --card: #ffffff;
            --muted: #6b7280;
            --accent: #2563eb; /* primary blue */
            --accent-2: #0ea5a4; /* teal accent */
            --soft: #eef2ff;
            --text: #0f172a;
            --radius: 12px;
            --container-width: 1100px;
            --nav-height: 64px;
        }

        html,body{ height:100%; }
        body{
            font-family: 'Inter', system-ui, -apple-system, 'Segoe UI', Roboto, 'Helvetica Neue', Arial;
            background: linear-gradient(180deg, rgba(6,182,212,0.03), rgba(37,99,235,0.02));
            color:var(--text);
            -webkit-font-smoothing:antialiased;
            -moz-osx-font-smoothing:grayscale;
            padding-bottom:12px;
        }

        .cv-container{ max-width:var(--container-width); }

        /* Cards and panels */
        .profile-card, .bg-white.p-4, .p-3.border, .p-3.border.rounded.h-100{
            background:var(--card);
            border-radius:var(--radius);
            box-shadow: 0 10px 30px rgba(15,23,42,0.07);
        }

        /* Profile panel: subtle blue header feel */
        .profile-card{
            background: linear-gradient(180deg, rgba(37,99,235,0.07), rgba(6,182,212,0.02));
            border: 1px solid rgba(37,99,235,0.06);
        }
        .profile-card h2{ color:var(--text); }

        /* Section title accent */
        .section-title{ position:relative; padding-left:1rem; margin-bottom:.75rem; display:inline-block; }
        .section-title:before{ content:''; width:6px; height:22px; background:var(--accent); position:absolute; left:0; top:50%; transform:translateY(-50%); border-radius:3px; }
        .section-title small{ display:block; color:var(--muted); font-weight:500; }

        /* Make left profile and right content equal height when in two-column layout */
        .row.align-items-stretch > [class*='col-'] { display: flex; }
        .row.align-items-stretch > .col-lg-4 > .profile-card,
        .row.align-items-stretch > .col-lg-8 > .bg-white.p-4{
            display: flex; flex-direction: column; height:100%;
        }

        /* Accents */
        .btn-primary{
            background: linear-gradient(90deg,var(--accent),var(--accent-2));
            border:none;
            box-shadow: 0 8px 22px rgba(37,99,235,0.12);
        }
        .btn-outline-primary{
            border-color: rgba(14,165,164,0.12);
            color:var(--accent);
        }

        .skill-badge{
            background:var(--soft);
            color:var(--text);
            padding:.45rem .7rem;
            border-radius:999px;
            font-weight:600;
        }

        .avatar-placeholder{
            width:160px; height:160px; font-size:48px; background:linear-gradient(135deg,#eef6ff,#f7fbff); color:var(--accent);
            border:1px solid rgba(37,99,235,0.06);
        }

        .profile-avatar img{ width:160px; height:160px; object-fit:cover; border-radius:50%; }

        /* Section headings */
        h3.h5{ color:var(--text); }

        /* Utilities */
        .muted{ color:var(--muted); }

        /* Responsive container spacing */
        @media (min-width:992px){
            .cv-container{ margin:0 auto; }
        }

        /* Small screens adjustments */
        @media (max-width:767px){
            .avatar-placeholder, .profile-avatar img{ width:120px; height:120px; }
            .profile-card{ padding:1rem; }
            .section-title:before{ height:16px; }
        }
        /* Slider styles */
        .cv-slider .cv-slider-nav button{ color:var(--muted); border-radius:6px; }
        .cv-slider .cv-slider-nav button.active{ color:var(--accent); font-weight:700; }
        .cv-slider-viewport{ overflow:hidden; }
        .slides{ transition:transform .5s cubic-bezier(.2,.9,.2,1); will-change:transform; }
        .slide{ padding:0.5rem 0; min-height:280px; }
        .cv-slide-indicator button{ width:10px; height:10px; border-radius:50%; padding:0; border:1px solid rgba(15,23,42,.08); background:transparent; }
        .cv-slide-indicator button.active{ background:var(--accent); border-color:var(--accent); }

        /* Improved focus and hover states for accessibility */
        .cv-slider-nav button,
        .cv-slider-prev,
        .cv-slider-next,
        .cv-slide-indicator button{
            transition:all .15s ease-in-out;
            cursor:pointer;
        }

        .cv-slider-nav button:hover{ color:var(--accent); transform:translateY(-1px); }
        .cv-slider-prev:hover svg, .cv-slider-next:hover svg{ transform:translateX(2px); }

        .cv-slide-indicator button:hover{ background:rgba(37,99,235,0.08); border-color:rgba(37,99,235,0.12); }
        .cv-slide-indicator button:focus-visible,
        .cv-slider-nav button:focus-visible,
        .cv-slider-prev:focus-visible,
        .cv-slider-next:focus-visible{
            outline:3px solid rgba(37,99,235,0.12);
            outline-offset:4px;
        }

        .cv-slide-indicator button.active{ box-shadow: 0 6px 18px rgba(37,99,235,0.12); }

        /* Fixed top navigation */
        .site-nav{
            position:fixed; inset:0 auto auto 0; top:0; left:0; right:0; height:var(--nav-height);
            background: rgba(255,255,255,0.80); backdrop-filter: blur(6px);
            border-bottom:1px solid rgba(15,23,42,0.04);
            z-index:1200;
            display:block;
        }
        .site-nav .navbar-brand{ color:var(--text); }
        .site-nav .navbar-brand.active{ color:var(--accent); font-weight:700; }
        .site-nav a{ color:var(--muted); padding:.5rem .6rem; }
        .site-nav a.active{ color:var(--accent); font-weight:600; }
        @media (max-width:767px){ .site-nav .d-none.d-md-flex{ display:none !important; } }

        /* Mobile nav panel (animated slide) */
        .site-nav-mobile{
            position:fixed; left:0; right:0; top:var(--nav-height); background:var(--card); z-index:1199;
            border-bottom:1px solid rgba(15,23,42,0.04); box-shadow: 0 8px 28px rgba(15,23,42,0.06);
            max-height:0; overflow:hidden; opacity:0; padding:0 0; transition: max-height .28s ease, opacity .22s ease; will-change:max-height,opacity;
        }
        .site-nav.open + .site-nav-mobile{ max-height:360px; opacity:1; padding:10px 0; }
        .mobile-nav-toggle{ background:transparent; border:1px solid rgba(15,23,42,0.04); }
        .mobile-nav-toggle svg{ display:block; }

        /* Dim overlay shown when mobile nav is open */
        .mobile-overlay{ position:fixed; left:0; right:0; top:var(--nav-height); bottom:0; background:rgba(2,6,23,0.35); opacity:0; pointer-events:none; transition:opacity .22s ease; z-index:1198; }
        .mobile-overlay.open{ opacity:1; pointer-events:auto; }

        /* Hero animated background */
        .animated-hero{ position:relative; overflow:hidden; border-radius:12px; }
        .animated-hero:before{ content:''; position:absolute; inset:0; z-index:0; background: radial-gradient(600px 300px at 10% 30%, rgba(37,99,235,0.12), transparent 10%), radial-gradient(500px 250px at 80% 70%, rgba(14,165,164,0.10), transparent 10%); opacity:.95; mix-blend-mode:screen; animation: floatBG 12s linear infinite; }
        .animated-hero > *{ position:relative; z-index:1; }
        @keyframes floatBG{ 0%{transform:translateY(0) rotate(0);}50%{transform:translateY(-10px) rotate(3deg);}100%{transform:translateY(0) rotate(0);} }

        /* SVG icon sizing in lists */
        .icon-sm{ width:18px; height:18px; vertical-align:middle; margin-right:.5rem; fill:currentColor; }
    </style>

</head>
<body>
    <div class="container cv-container">
        @yield('content')
    </div>
    <nav class="site-nav d-flex align-items-center px-3" role="navigation" aria-label="Main navigation">
        <div class="container cv-container d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-3">
                <a class="navbar-brand fw-bold text-decoration-none" href="#home" data-anchor="home">{{ $cvData->nama_lengkap ?? 'CV' }}</a>
            </div>
            <div class="d-none d-md-flex align-items-center gap-2">
                <a href="#home" class="text-decoration-none muted px-2" data-anchor="home">Home</a>
                <a href="#biodata" class="text-decoration-none muted px-2" data-anchor="biodata">Biodata</a>
                <a href="#pendidikan" class="text-decoration-none muted px-2" data-anchor="pendidikan">Pendidikan</a>
                <a href="#pengalaman" class="text-decoration-none muted px-2" data-anchor="pengalaman">Pengalaman</a>
                <a href="#keahlian" class="text-decoration-none muted px-2" data-anchor="keahlian">Keahlian</a>
            </div>
            <div class="d-md-none">
                <button class="mobile-nav-toggle btn btn-sm" aria-expanded="false" aria-controls="mobileNav" aria-label="Open menu">
                    <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"><line x1="3" y1="6" x2="21" y2="6"/><line x1="3" y1="12" x2="21" y2="12"/><line x1="3" y1="18" x2="21" y2="18"/></svg>
                </button>
            </div>
        </div>
    </nav>
    <div id="mobileNav" class="site-nav-mobile d-md-none" aria-hidden="true">
        <div class="container cv-container py-3">
            <div class="d-flex flex-column gap-2">
                <a href="#home" class="text-decoration-none muted py-2" data-anchor="home">Home</a>
                <a href="#biodata" class="text-decoration-none muted py-2" data-anchor="biodata">Biodata</a>
                <a href="#pendidikan" class="text-decoration-none muted py-2" data-anchor="pendidikan">Pendidikan</a>
                <a href="#pengalaman" class="text-decoration-none muted py-2" data-anchor="pengalaman">Pengalaman</a>
                <a href="#keahlian" class="text-decoration-none muted py-2" data-anchor="keahlian">Keahlian</a>
            </div>
        </div>
    </div>
    <div id="mobileOverlay" class="mobile-overlay" aria-hidden="true"></div>
    <footer class="site-footer mt-5 py-4">
        <div class="container cv-container text-center">
            <div class="small text-muted">
                2025 Farhan Fadila. Hak Cipta Dilindungi.<br>
                Dibuat dengan semangat.
            </div>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Small helper for slider nav if present
        document.addEventListener('DOMContentLoaded', function(){
            const slider = document.querySelector('.cv-slider .slides');
            const prev = document.querySelector('.cv-slider-prev');
            const next = document.querySelector('.cv-slider-next');
            if(!slider) return;
            
            const slideCount = slider.children.length;
            const anchors = ['home','biodata','pendidikan','pengalaman','keahlian'];
            let idx = 0;

            // Select nav elements: navbar brand + desktop nav + mobile nav links
            const navBrand = document.querySelector('.navbar-brand[data-anchor]');
            const desktopNavLinks = document.querySelectorAll('.d-none.d-md-flex [data-anchor]');
            const mobileNavLinks = document.querySelectorAll('.site-nav-mobile [data-anchor]');
            const topNavLinks = Array.from([navBrand, ...desktopNavLinks, ...mobileNavLinks]).filter(el => el);
            
            const indicators = document.querySelectorAll('.cv-slide-indicator button');
            
            // Update all UI elements to reflect current slide index
            const updateAllUI = ()=>{
                slider.style.transform = `translateX(${ -100 * idx }%)`;
                indicators.forEach((b,bi)=> b.classList.toggle('active', bi===idx));
                topNavLinks.forEach(a=> {
                    const anchor = a.getAttribute('data-anchor');
                    const anchorIdx = anchors.indexOf(anchor);
                    a.classList.toggle('active', anchorIdx === idx);
                });
            };

            // Set index and update UI
            const setIndex = (i, pushHash = true)=>{
                idx = Math.max(0, Math.min(i, slideCount-1));
                updateAllUI();
                if(pushHash && anchors[idx]){
                    window.location.hash = anchors[idx];
                }
            };

            // Navigation button listeners
            indicators.forEach((b,i)=> b.addEventListener('click',()=> setIndex(i)));
            if(prev) prev.addEventListener('click',()=> setIndex(idx-1));
            if(next) next.addEventListener('click',()=> setIndex(idx+1));
            
            // Keyboard navigation
            document.addEventListener('keydown', (e)=>{ 
                if(e.key==='ArrowRight') setIndex(idx+1); 
                if(e.key==='ArrowLeft') setIndex(idx-1); 
            });

            // Top nav links - handle both desktop and mobile
            if(topNavLinks && topNavLinks.length){
                topNavLinks.forEach(a=> a.addEventListener('click', (ev)=>{ 
                    ev.preventDefault(); 
                    const h = a.getAttribute('data-anchor'); 
                    const i = anchors.indexOf(h); 
                    if(i>=0) setIndex(i); 
                }));
            }
            
            // Mobile nav toggle
            const mobileToggle = document.querySelector('.mobile-nav-toggle');
            const mobilePanel = document.getElementById('mobileNav');
            const siteNav = document.querySelector('.site-nav');
            if(mobileToggle && mobilePanel && siteNav){
                const mobileOverlay = document.getElementById('mobileOverlay');
                const closeMobile = ()=>{
                    siteNav.classList.remove('open');
                    mobileToggle.setAttribute('aria-expanded','false');
                    mobilePanel.setAttribute('aria-hidden','true');
                    if(mobileOverlay) mobileOverlay.classList.remove('open');
                };

                mobileToggle.addEventListener('click', ()=>{
                    const expanded = mobileToggle.getAttribute('aria-expanded') === 'true';
                    mobileToggle.setAttribute('aria-expanded', String(!expanded));
                    mobilePanel.setAttribute('aria-hidden', String(expanded));
                    siteNav.classList.toggle('open');
                    if(mobileOverlay) mobileOverlay.classList.toggle('open');
                });

                // close when a mobile link is clicked
                mobilePanel.querySelectorAll('[data-anchor]').forEach(a=> a.addEventListener('click', (ev)=>{ 
                    ev.preventDefault(); 
                    const h = a.getAttribute('data-anchor'); 
                    const i = anchors.indexOf(h); 
                    if(i>=0) setIndex(i); 
                    closeMobile(); 
                }));

                // close on overlay click
                if(mobileOverlay){ mobileOverlay.addEventListener('click', closeMobile); }

                // close on outside click
                document.addEventListener('click', (ev)=>{ 
                    if(siteNav.classList.contains('open') && !siteNav.contains(ev.target) && !mobilePanel.contains(ev.target)) { 
                        closeMobile(); 
                    } 
                });

                // close on resize to larger view
                window.addEventListener('resize', ()=>{ 
                    if(window.innerWidth >= 768 && siteNav.classList.contains('open')){ 
                        closeMobile(); 
                    } 
                });
            }
            
            // Handle hash changes - when user navigates via browser back/forward or direct URL
            window.addEventListener('hashchange', ()=>{
                const h = location.hash.replace('#','');
                const i = anchors.indexOf(h);
                if(i>=0) {
                    idx = i;
                    updateAllUI();
                }
            });

            // touch / swipe support
            let startX = 0; let deltaX = 0; let isTouch = false;
            slider.addEventListener('touchstart', (e)=>{ isTouch = true; startX = e.touches[0].clientX; });
            slider.addEventListener('touchmove', (e)=>{ if(!isTouch) return; deltaX = e.touches[0].clientX - startX; });
            slider.addEventListener('touchend', ()=>{
                if(Math.abs(deltaX) > 50){ if(deltaX < 0) setIndex(idx+1); else setIndex(idx-1); }
                startX = 0; deltaX = 0; isTouch = false;
            });

            // Initialize from hash on page load
            const hash = location.hash.replace('#','');
            const initialIndex = anchors.indexOf(hash);
            if(initialIndex >= 0) {
                idx = initialIndex;
                updateAllUI();
            } else {
                // Default to home (index 0)
                idx = 0;
                updateAllUI();
                // Only set hash if we're on home, otherwise preserve hashless URL
                if(window.location.hash === '') {
                    // Don't set hash on initial load if none provided
                }
            }
        });
    </script>
        <style>
            /* Footer styles */
            .site-footer{
                background: linear-gradient(180deg, rgba(6,182,212,0.03), rgba(37,99,235,0.02));
                border-top: 1px solid rgba(15,23,42,0.04);
            }
            .site-footer .muted{ color:var(--muted); }
            .site-footer a{ color:var(--muted); transition:color .15s ease-in-out; }
            .site-footer a:hover{ color:var(--accent); text-decoration:none; }
        </style>
</body>
</html>