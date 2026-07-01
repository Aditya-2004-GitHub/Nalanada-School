@extends('layouts.app')

@section('title', 'Home')

@section('content')

<!-- Common Style -->
<style>
    /* ─── SECTION COMMON ─── */
    .sec {
        padding: 88px 0
    }

    .sec-alt {
        background: var(--green-lt)
    }

    .sec-gold {
        background: var(--gold-lt)
    }

    .label {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        font-size: 11px;
        font-weight: 700;
        letter-spacing: 1.2px;
        text-transform: uppercase;
        color: var(--green);
        margin-bottom: 12px
    }

    .label::before {
        content: '';
        width: 14px;
        height: 2.5px;
        background: currentColor;
        border-radius: 2px
    }

    h2.sec-title {
        font-family: var(--serif);
        font-size: clamp(26px, 3.2vw, 42px);
        line-height: 1.12;
        color: var(--ink);
        letter-spacing: -.2px;
        margin-bottom: 12px
    }

    .sec-body {
        font-size: 15.5px;
        color: var(--muted);
        max-width: 540px;
        line-height: 1.78
    }

    .sec-head {
        margin-bottom: 48px
    }

    .sec-head.c {
        text-align: center
    }

    .sec-head.c .sec-body {
        margin: 0 auto
    }
</style>

<!-- HERO -->
<style>
    /* ─── HERO ─── */
    .hero {
        background: linear-gradient(140deg, var(--gold-lt) 0%, var(--green-lt) 55%, #f1f8f1 100%);
        min-height: 88vh;
        display: flex;
        align-items: center;
        position: relative;
        overflow: hidden;
        padding: 80px 0 60px
    }

    .hero-rays {
        position: absolute;
        top: -120px;
        right: -80px;
        width: 560px;
        height: 560px;
        opacity: .07;
        background: conic-gradient(from 180deg, var(--gold) 0 8deg, transparent 8deg 18deg, var(--gold) 18deg 26deg, transparent 26deg 36deg, var(--gold) 36deg 44deg, transparent 44deg 54deg, var(--gold) 54deg 62deg, transparent 62deg 72deg, var(--gold) 72deg 80deg, transparent 80deg 90deg, var(--gold) 90deg 98deg, transparent 98deg 108deg, var(--gold) 108deg 116deg, transparent 116deg 126deg, var(--gold) 126deg 134deg, transparent 134deg 144deg, var(--gold) 144deg 152deg, transparent 152deg 162deg, var(--gold) 162deg 170deg, transparent 170deg 360deg);
        border-radius: 50%;
        pointer-events: none
    }

    .hero-inner {
        display: grid;
        grid-template-columns: 1fr 420px;
        gap: 56px;
        align-items: center
    }

    .hero-tag {
        display: inline-flex;
        align-items: center;
        gap: 7px;
        background: var(--red-lt);
        border: 1px solid #ffcdd2;
        border-radius: 20px;
        padding: 5px 14px;
        font-size: 12px;
        font-weight: 600;
        color: var(--red);
        letter-spacing: .6px;
        text-transform: uppercase;
        margin-bottom: 20px
    }

    .hero-dot {
        width: 7px;
        height: 7px;
        background: var(--red);
        border-radius: 50%;
        animation: pulse 2s infinite
    }

    @keyframes pulse {

        0%,
        100% {
            opacity: 1;
            transform: scale(1)
        }

        50% {
            opacity: .5;
            transform: scale(.75)
        }
    }

    .hero h1 {
        font-family: var(--serif);
        font-size: clamp(34px, 4.5vw, 60px);
        color: var(--ink);
        line-height: 1.08;
        letter-spacing: -.3px;
        margin-bottom: 18px
    }

    .hero h1 em {
        font-style: italic;
        color: var(--green)
    }

    .hero-desc {
        font-size: 16px;
        color: var(--muted);
        max-width: 500px;
        line-height: 1.8;
        margin-bottom: 32px
    }

    .hero-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        margin-bottom: 32px
    }

    .hero-pill {
        display: flex;
        align-items: center;
        gap: 6px;
        background: var(--white);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 5px 13px;
        font-size: 12.5px;
        color: var(--ink2);
        font-weight: 500;
        transition: all .2s
    }

    .hero-pill:hover {
        background: var(--green-lt);
        border-color: var(--green-mid)
    }

    .pill-dot {
        width: 5px;
        height: 5px;
        background: var(--green);
        border-radius: 50%;
        flex-shrink: 0
    }

    .hero-btns {
        display: flex;
        gap: 12px;
        flex-wrap: wrap
    }

    .hero-panel {
        display: flex;
        flex-direction: column;
        gap: 12px
    }

    .stat-box {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 24px 20px;
        transition: all .25s
    }

    .stat-box:hover {
        border-color: var(--green-mid);
        box-shadow: 0 8px 24px rgba(46, 125, 50, .1);
        transform: translateY(-2px)
    }

    .stat-box.gold-accent {
        background: var(--gold-lt);
        border-color: var(--gold-mid)
    }

    .stat-box-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 12px
    }

    .stat-n {
        font-family: var(--serif);
        font-size: 36px;
        color: var(--green);
        line-height: 1
    }

    .stat-n.sm {
        font-size: 24px
    }

    .stat-l {
        font-size: 11.5px;
        color: var(--muted);
        margin-top: 4px;
        text-transform: uppercase;
        letter-spacing: .4px
    }

    .stat-sub {
        font-size: 10.5px;
        color: var(--muted);
        opacity: .7;
        margin-top: 1px
    }

    .school-logo-box {
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 14px;
        padding: 20px
    }

    .school-logo-box img {
        width: 80px;
        height: 80px;
        border-radius: 50%
    }

    .school-logo-box .sname {
        font-family: var(--serif);
        font-size: 16px;
        color: var(--green)
    }

    .school-logo-box .saff {
        font-size: 11px;
        color: var(--muted);
        margin-top: 3px
    }
</style>

<section class="hero">
    <div class="hero-rays"></div>
    <div class="wrap">
        <div class="hero-inner">
            <div>
                <div class="hero-tag"><span class="hero-dot"></span>CBSE Affiliated Senior Secondary</div>
                <h1>Shaping Future <em>Leaders</em> Through Excellence</h1>
                <p class="hero-desc">Nalanda Higher Secondary School, Katni — where every student discovers their
                    full potential through rigorous academics, character building, and holistic development since
                    2010.</p>
                <div class="hero-pills">
                    <div class="hero-pill"><span class="pill-dot"></span>CBSE Affiliated</div>
                    <div class="hero-pill"><span class="pill-dot"></span>Est. 2010</div>
                    <div class="hero-pill"><span class="pill-dot"></span>Smart Classrooms</div>
                    <div class="hero-pill"><span class="pill-dot"></span>Modern Labs</div>
                    <div class="hero-pill"><span class="pill-dot"></span>Experienced Faculty</div>
                    <div class="hero-pill"><span class="pill-dot"></span>Holistic Growth</div>
                </div>
                <div class="hero-btns">
                    <a href="#admissions" class="btn btn-green btn-lg">Apply for 2026–27</a>
                    <a href="#academics" class="btn btn-gold btn-lg">Explore Academics</a>
                </div>
            </div>
            <div class="hero-panel">
                <div class="stat-box gold-accent school-logo-box">
                    <img src="assets/logo.jpeg" alt="logo" onerror="this.style.display='none'">
                    <div>
                        <div class="sname">Nalanda H.S.S.</div>
                        <div class="saff">Katni, Madhya Pradesh</div>
                    </div>
                </div>
                <div class="stat-box-row">
                    <div class="stat-box">
                        <div class="stat-n">15+</div>
                        <div class="stat-l">Years of Excellence</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-n">XII</div>
                        <div class="stat-l">Highest Class</div>
                        <div class="stat-sub">Nursery to XII</div>
                    </div>
                </div>
                <div class="stat-box-row">
                    <div class="stat-box">
                        <div class="stat-n sm">4044+</div>
                        <div class="stat-l">Library Books</div>
                    </div>
                    <div class="stat-box">
                        <div class="stat-n sm">35+</div>
                        <div class="stat-l">Computers</div>
                    </div>
                </div>
                <div class="stat-box">
                    <div class="stat-n sm" style="font-size:20px">8,075 m²</div>
                    <div class="stat-l">Campus Area</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- TICKER -->
<style>
    /* ─── TICKER ─── */
    .ticker {
        background: var(--green);
        padding: 12px 0;
        overflow: hidden
    }

    .ticker-inner {
        display: flex;
        gap: 52px;
        animation: scroll 28s linear infinite;
        white-space: nowrap;
        width: max-content
    }

    @keyframes scroll {
        0% {
            transform: translateX(0)
        }

        100% {
            transform: translateX(-50%)
        }
    }

    .ticker-item {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 13px;
        font-weight: 500;
        color: var(--gold-lt)
    }

    .tdot {
        width: 4px;
        height: 4px;
        background: var(--gold);
        border-radius: 50%
    }
</style>

<div class="ticker">
    <div class="ticker-inner">
        <span class="ticker-item"><span class="tdot"></span>CBSE Affiliation No. 1031141</span>
        <span class="ticker-item"><span class="tdot"></span>Admissions Open 2026–27</span>
        <span class="ticker-item"><span class="tdot"></span>Nursery to Class XII</span>
        <span class="ticker-item"><span class="tdot"></span>Science &amp; Commerce Streams</span>
        <span class="ticker-item"><span class="tdot"></span>4044+ Library Books</span>
        <span class="ticker-item"><span class="tdot"></span>Smart Classrooms Available</span>
        <span class="ticker-item"><span class="tdot"></span>School Code 51099</span>
        <span class="ticker-item"><span class="tdot"></span>Maharana Pratap Ward, Katni</span>
        <span class="ticker-item"><span class="tdot"></span>CBSE Affiliation No. 1031141</span>
        <span class="ticker-item"><span class="tdot"></span>Admissions Open 2026–27</span>
        <span class="ticker-item"><span class="tdot"></span>Nursery to Class XII</span>
        <span class="ticker-item"><span class="tdot"></span>Science &amp; Commerce Streams</span>
        <span class="ticker-item"><span class="tdot"></span>4044+ Library Books</span>
        <span class="ticker-item"><span class="tdot"></span>Smart Classrooms Available</span>
        <span class="ticker-item"><span class="tdot"></span>School Code 51099</span>
        <span class="ticker-item"><span class="tdot"></span>Maharana Pratap Ward, Katni</span>
    </div>
</div>

<!-- ABOUT -->
<style>
    /* ─── ABOUT ─── */
    .about-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 68px;
        align-items: center
    }

    .about-img {
        border-radius: 20px;
        overflow: hidden;
        border: 3px solid var(--border);
        aspect-ratio: 4/3;
        position: relative
    }

    .about-img img {
        width: 100%;
        height: 100%;
        object-fit: cover
    }

    .about-img-badge {
        position: absolute;
        bottom: 18px;
        left: 18px;
        background: var(--white);
        border: 2px solid var(--green-mid);
        border-radius: 10px;
        padding: 10px 16px;
        font-weight: 600;
        color: var(--green);
        font-size: 14px
    }

    .about-img-badge span {
        font-size: 11px;
        color: var(--muted);
        display: block;
        font-weight: 400
    }

    .about-text p {
        color: var(--muted);
        margin-bottom: 14px;
        line-height: 1.8
    }

    .chips-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 9px;
        margin: 24px 0
    }

    .chip {
        display: flex;
        align-items: center;
        gap: 8px;
        font-size: 13px;
        color: var(--ink2);
        font-weight: 500
    }

    .chip-dot {
        width: 20px;
        height: 20px;
        background: var(--green-lt);
        border: 1.5px solid var(--border);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all .22s
    }

    .chip:hover .chip-dot {
        background: var(--green);
        border-color: var(--green)
    }

    .chip-dot svg {
        width: 10px;
        height: 10px;
        stroke: var(--green);
        transition: stroke .22s
    }

    .chip:hover .chip-dot svg {
        stroke: #fff
    }
</style>

<section class="sec" id="about">
    <div class="wrap">
        <div class="about-grid">
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=700&q=80"
                    alt="School building">
                <div class="about-img-badge">Est. 2010 <span>CBSE Affiliated</span></div>
            </div>
            <div>
                <div class="label">About Nalanda</div>
                <h2 class="sec-title">Building Tomorrow's Leaders Since 2010</h2>
                <p class="sec-body" style="margin-bottom:0">Nalanda Higher Secondary School was established in 2010
                    with the vision of providing quality education and nurturing future leaders. We promote academic
                    excellence, character development, and holistic growth through modern teaching methodologies and
                    activity-based learning.</p>
                <p style="color:var(--muted);line-height:1.8;margin-top:14px;font-size:15px">Every child at Nalanda
                    is encouraged to discover their unique potential in a safe, inclusive, and stimulating
                    environment that bridges tradition with contemporary pedagogy.</p>
                <div class="chips-grid">
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Student-Centered Learning
                    </div>
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Activity-Based Education
                    </div>
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Character Building
                    </div>
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Equal Growth Opportunities
                    </div>
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Academic Excellence
                    </div>
                    <div class="chip">
                        <div class="chip-dot"><svg viewBox="0 0 24 24">
                                <polyline points="20 6 9 17 4 12" stroke-width="3" />
                            </svg></div>Future-Ready Education
                    </div>
                </div>
                <a href="#" class="btn btn-green" style="margin-top:4px">Read More About Us</a>
            </div>
        </div>
    </div>
</section>

<!-- WHY NALANDA -->
<style>
    .why-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .why-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 24px 16px;
        text-align: center;
        transition: all .28s;
        cursor: default
    }

    .why-card:hover {
        border-color: var(--green);
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(46, 125, 50, .12)
    }

    .why-card:hover .wi {
        background: var(--green)
    }

    .why-card:hover .wi svg {
        stroke: #fff
    }

    .wi {
        width: 48px;
        height: 48px;
        background: var(--green-lt);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 14px;
        transition: all .28s
    }

    .wi svg {
        width: 22px;
        height: 22px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .28s
    }

    .why-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink);
        line-height: 1.35
    }

    .why-card p {
        font-size: 11.5px;
        color: var(--muted);
        margin-top: 5px
    }
</style>

<section class="sec sec-alt" id="why">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Why Choose Us</div>
            <h2 class="sec-title">Why Parents Choose Nalanda</h2>
            <p class="sec-body">A school where every child is seen, heard, and empowered to grow into their best
                self.</p>
        </div>
        <div class="why-grid">
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>CBSE Curriculum</h4>
                <p>Nationally recognised board with structured learning</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h4>Experienced Faculty</h4>
                <p>Qualified, caring teachers for every subject</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" />
                        <path d="M7 12h10M12 7v10" />
                    </svg></div>
                <h4>Smart Classrooms</h4>
                <p>Technology-enabled interactive learning spaces</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Modern Laboratories</h4>
                <p>Physics, Chemistry, Biology, Maths &amp; Computer labs</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Rich Library</h4>
                <p>4044+ books, magazines and newspapers</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Sports &amp; PE</h4>
                <p>Comprehensive physical education programme</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                        <path d="M9 9h.01M15 9h.01" />
                    </svg></div>
                <h4>Art &amp; Culture</h4>
                <p>Dance, drama, and creative arts programmes</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Student Counseling</h4>
                <p>Professional guidance for academic &amp; personal growth</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Green Campus</h4>
                <p>8,075 m² eco-friendly and safe campus</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg></div>
                <h4>Holistic Development</h4>
                <p>Balanced focus on mind, body, and character</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" />
                    </svg></div>
                <h4>Affordable Fees</h4>
                <p>Quality education at accessible fee structures</p>
            </div>
            <div class="why-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                    </svg></div>
                <h4>Safe Environment</h4>
                <p>Secure, inclusive and nurturing school atmosphere</p>
            </div>
        </div>
    </div>
</section>

<!-- ACADEMICS -->
<style>
    .acad-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px;
        margin-bottom: 36px
    }

    .level {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 28px 14px;
        text-align: center;
        transition: all .28s;
        cursor: default
    }

    .level:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .12)
    }

    .level.hi {
        background: var(--green-lt);
        border-color: var(--green-mid)
    }

    .level-n {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--green);
        margin-bottom: 6px
    }

    .level-name {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink)
    }

    .level-c {
        font-size: 11px;
        color: var(--muted);
        margin-top: 3px
    }

    .ftags {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        justify-content: center
    }

    .ftag {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        padding: 7px 16px;
        font-size: 13px;
        color: var(--ink2);
        font-weight: 500;
        transition: all .2s
    }

    .ftag:hover {
        background: var(--green-lt);
        border-color: var(--green)
    }
</style>

<section class="sec sec-gold" id="academics">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Academics</div>
            <h2 class="sec-title">Designed for Future Success</h2>
            <p class="sec-body">A structured curriculum from Pre-Primary through Senior Secondary, crafted for every
                stage of your child's growth.</p>
        </div>
        <div class="acad-grid">
            <div class="level">
                <div class="level-n">Pre-Primary</div>
                <div class="level-name">Early Childhood</div>
                <div class="level-c">Nursery · KG-I · KG-II</div>
            </div>
            <div class="level">
                <div class="level-n">I – V</div>
                <div class="level-name">Primary School</div>
                <div class="level-c">Class I to V</div>
            </div>
            <div class="level">
                <div class="level-n">VI – VIII</div>
                <div class="level-name">Middle School</div>
                <div class="level-c">Class VI to VIII</div>
            </div>
            <div class="level">
                <div class="level-n">IX – X</div>
                <div class="level-name">Secondary</div>
                <div class="level-c">Class IX to X</div>
            </div>
            <div class="level hi">
                <div class="level-n">XI – XII</div>
                <div class="level-name">Senior Secondary</div>
                <div class="level-c">Science · Commerce</div>
            </div>
        </div>
        <div class="ftags">
            <span class="ftag">Critical Thinking</span>
            <span class="ftag">Project-Based Learning</span>
            <span class="ftag">Experiential Learning</span>
            <span class="ftag">Technology Integration</span>
            <span class="ftag">Art Integrated Learning</span>
            <span class="ftag">Inclusive Education</span>
        </div>
    </div>
</section>

<!-- CAMPUS -->
<style>
    .campus-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .c-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 18px;
        transition: all .28s;
        cursor: default
    }

    .c-card:hover {
        border-color: var(--gold-mid);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
    }

    .c-card:hover .ci {
        background: var(--gold);
        border-color: var(--gold)
    }

    .c-card:hover .ci svg {
        stroke: var(--ink)
    }

    .ci {
        width: 42px;
        height: 42px;
        background: var(--gold-lt);
        border: 1.5px solid #ffe082;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 12px;
        transition: all .28s
    }

    .ci svg {
        width: 20px;
        height: 20px;
        stroke: var(--gold);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .28s
    }

    .c-card h4 {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink)
    }

    .c-card p {
        font-size: 12px;
        color: var(--muted);
        margin-top: 4px
    }
</style>

<section class="sec" id="campus">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Infrastructure</div>
            <h2 class="sec-title">A World-Class Learning Environment</h2>
            <p class="sec-body">Purpose-built spaces that inspire curiosity, collaboration, and innovation at every
                level.</p>
        </div>
        <div class="campus-grid">
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" />
                        <path d="M7 12h10M12 7v10" />
                    </svg></div>
                <h4>Smart Classrooms</h4>
                <p>Interactive digital boards</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Physics Laboratory</h4>
                <p>Fully equipped experiments</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z" />
                        <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg></div>
                <h4>Chemistry Lab</h4>
                <p>Safe and well-stocked</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Biology Laboratory</h4>
                <p>Specimens &amp; microscopes</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z" />
                    </svg></div>
                <h4>Maths Lab</h4>
                <p>Hands-on maths tools</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Computer Lab</h4>
                <p>35+ modern computers</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Library</h4>
                <p>4044+ books &amp; resources</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Sports Facilities</h4>
                <p>Outdoor &amp; indoor sports</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Counseling Room</h4>
                <p>Student wellbeing support</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg></div>
                <h4>Medical Room</h4>
                <p>First-aid &amp; health care</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                    </svg></div>
                <h4>Activity Room</h4>
                <p>Creative &amp; cultural space</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <path d="M9 9h6M9 12h6M9 15h4" />
                    </svg></div>
                <h4>Resource Room</h4>
                <p>Learning support centre</p>
            </div>
        </div>
    </div>
</section>

<!-- GALLERY -->
<style>
    .gallery-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px
    }

    .gtile {
        border-radius: 16px;
        overflow: hidden;
        aspect-ratio: 4/3;
        position: relative;
        cursor: pointer;
        transition: all .3s
    }

    .gtile:hover {
        transform: scale(1.02);
        box-shadow: 0 16px 40px rgba(0, 0, 0, .12)
    }

    .gtile img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform .5s
    }

    .gtile:hover img {
        transform: scale(1.06)
    }

    .gtile-overlay {
        position: absolute;
        inset: 0;
        background: linear-gradient(to top, rgba(27, 58, 28, .65) 0%, transparent 60%);
        opacity: 0;
        transition: opacity .3s;
        display: flex;
        align-items: flex-end;
        padding: 18px
    }

    .gtile:hover .gtile-overlay {
        opacity: 1
    }

    .gtile-label {
        font-size: 14px;
        font-weight: 600;
        color: #fff
    }

    .gtile.big {
        grid-row: span 2;
        aspect-ratio: unset
    }
</style>

<section class="sec sec-alt" id="gallery">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Gallery</div>
            <h2 class="sec-title">Life at Nalanda</h2>
            <p class="sec-body">Glimpses of our vibrant campus, learning spaces, and student achievements.</p>
        </div>
        <div class="gallery-grid">
            <div class="gtile big">
                <img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=700&q=80"
                    alt="School campus">
                <div class="gtile-overlay"><span class="gtile-label">🏫 Our Campus</span></div>
            </div>
            <div class="gtile">
                <img src="https://images.unsplash.com/photo-1588072432836-e10032774350?w=500&q=80" alt="Classroom">
                <div class="gtile-overlay"><span class="gtile-label">💻 Smart Classes</span></div>
            </div>
            <div class="gtile">
                <img src="https://images.unsplash.com/photo-1532094349884-543bc11b234d?w=500&q=80" alt="Laboratory">
                <div class="gtile-overlay"><span class="gtile-label">🔬 Laboratories</span></div>
            </div>
            <div class="gtile">
                <img src="https://images.unsplash.com/photo-1546519638-68e109498ffc?w=500&q=80" alt="Sports">
                <div class="gtile-overlay"><span class="gtile-label">🏆 Sports</span></div>
            </div>
            <div class="gtile">
                <img src="https://images.unsplash.com/photo-1503676260728-1c00da094a0b?w=500&q=80"
                    alt="Students studying">
                <div class="gtile-overlay"><span class="gtile-label">📚 Library</span></div>
            </div>
            <div class="gtile">
                <img src="https://images.unsplash.com/photo-1627556592933-439b5e25c08c?w=500&q=80"
                    alt="Cultural events">
                <div class="gtile-overlay"><span class="gtile-label">🎭 Cultural Events</span></div>
            </div>
        </div>
        <div style="text-align:center;margin-top:32px">
            <a href="#" class="btn btn-green btn-lg">View Full Gallery</a>
        </div>
    </div>
</section>

<!-- EVENTS -->
<style>
    .events-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px
    }

    .ev-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        overflow: hidden;
        transition: all .28s
    }

    .ev-card:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 28px rgba(46, 125, 50, .1);
        border-color: var(--green)
    }

    .ev-top {
        height: 7px
    }

    .ev-body {
        padding: 22px
    }

    .ev-cat {
        font-size: 11px;
        font-weight: 700;
        letter-spacing: .7px;
        text-transform: uppercase;
        margin-bottom: 7px
    }

    .ev-body h4 {
        font-size: 15px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 6px;
        line-height: 1.35
    }

    .ev-body p {
        font-size: 13px;
        color: var(--muted);
        line-height: 1.6
    }
</style>

<section class="sec" id="events">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">What's Happening</div>
            <h2 class="sec-title">Latest Events &amp; Activities</h2>
            <p class="sec-body">A peek into the vibrant school life that makes Nalanda a truly enriching experience.
            </p>
        </div>
        <div class="events-grid">
            <div class="ev-card">
                <div class="ev-top" style="background:var(--red)"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:var(--red)">Annual Event</div>
                    <h4>Annual Day Celebration</h4>
                    <p>A vibrant showcase of student talent across dance, drama, music, and academic achievements.
                    </p>
                </div>
            </div>
            <div class="ev-card">
                <div class="ev-top" style="background:var(--green)"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:var(--green)">Sports</div>
                    <h4>Sports Day Activities</h4>
                    <p>Inter-house competitions celebrating athleticism, teamwork, and the sporting spirit of
                        Nalanda students.</p>
                </div>
            </div>
            <div class="ev-card">
                <div class="ev-top" style="background:var(--gold)"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:#f57f17">Health &amp; Wellness</div>
                    <h4>International Yoga Day</h4>
                    <p>School-wide yoga sessions on June 21 promoting mindfulness, fitness, and inner harmony for
                        all.</p>
                </div>
            </div>
            <div class="ev-card">
                <div class="ev-top" style="background:#0b6e72"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:#0b6e72">Academic</div>
                    <h4>Debate Competition</h4>
                    <p>Students sharpening their reasoning and oratory skills in spirited inter-school debate
                        rounds.</p>
                </div>
            </div>
            <div class="ev-card">
                <div class="ev-top" style="background:#9b3080"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:#9b3080">Excursion</div>
                    <h4>Educational Tour</h4>
                    <p>Field visits connecting classroom learning with real-world exploration and cultural
                        discovery.</p>
                </div>
            </div>
            <div class="ev-card">
                <div class="ev-top" style="background:var(--red)"></div>
                <div class="ev-body">
                    <div class="ev-cat" style="color:var(--red)">Cultural</div>
                    <h4>Cultural Programs</h4>
                    <p>Festivals celebrating India's rich heritage and fostering unity in diversity among all
                        students.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- STUDENT LIFE -->
<style>
    .stlife-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px
    }

    .stlife-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        transition: all .28s
    }

    .stlife-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(46, 125, 50, .1)
    }

    .stlife-card img {
        width: 100%;
        height: 160px;
        object-fit: cover
    }

    .stlife-body {
        padding: 18px
    }

    .stlife-body h4 {
        font-family: var(--serif);
        font-size: 18px;
        color: var(--ink);
        margin-bottom: 6px
    }

    .stlife-body p {
        font-size: 13px;
        color: var(--muted)
    }
</style>

<section class="sec sec-alt" id="students">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Student Life</div>
            <h2 class="sec-title">Beyond the Classroom</h2>
            <p class="sec-body">We nurture every dimension of a child's personality through structured programs and
                creative expression.</p>
        </div>
        <div class="stlife-grid">
            <div class="stlife-card"><img
                    src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=500&q=75" alt="Dance">
                <div class="stlife-body">
                    <h4>Dance</h4>
                    <p>Classical and contemporary forms developing rhythm, coordination, and artistic expression.
                    </p>
                </div>
            </div>
            <div class="stlife-card"><img src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=500&q=75"
                    alt="Yoga">
                <div class="stlife-body">
                    <h4>Yoga</h4>
                    <p>Daily sessions promoting physical health, mental clarity, and emotional well-being for all
                        students.</p>
                </div>
            </div>
            <div class="stlife-card"><img
                    src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=500&q=75" alt="Debate">
                <div class="stlife-body">
                    <h4>Debate &amp; Speaking</h4>
                    <p>Building confidence, critical thinking, and powerful communication skills.</p>
                </div>
            </div>
            <div class="stlife-card"><img
                    src="https://images.unsplash.com/photo-1452860606245-08befc0ff44b?w=500&q=75" alt="Art">
                <div class="stlife-body">
                    <h4>Art &amp; Craft</h4>
                    <p>Fostering imagination, fine motor skills, and cultural appreciation through hands-on
                        workshops.</p>
                </div>
            </div>
            <div class="stlife-card"><img
                    src="https://images.unsplash.com/photo-1508098682722-e99c43a406b2?w=500&q=75" alt="Sports">
                <div class="stlife-body">
                    <h4>Sports</h4>
                    <p>A wide range of activities instilling teamwork, discipline, and healthy competitive spirit.
                    </p>
                </div>
            </div>
            <div class="stlife-card"><img src="https://images.unsplash.com/photo-1551836022-deb4988cc6c0?w=500&q=75"
                    alt="Counseling">
                <div class="stlife-body">
                    <h4>Counseling</h4>
                    <p>Professional support helping students navigate academic and personal challenges with
                        confidence.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FACULTY -->
<style>
    .fac-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px
    }

    .fac-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 32px 24px;
        text-align: center;
        transition: all .28s
    }

    .fac-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 12px 32px rgba(46, 125, 50, .1)
    }

    .fac-av {
        width: 78px;
        height: 78px;
        border-radius: 50%;
        background: var(--green-lt);
        border: 3px solid var(--green-mid);
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 16px;
        font-family: var(--serif);
        font-size: 26px;
        color: var(--green);
        transition: transform .28s
    }

    .fac-card:hover .fac-av {
        transform: scale(1.05)
    }

    .fac-card h3 {
        font-family: var(--serif);
        font-size: 20px;
        color: var(--ink)
    }

    .fac-role {
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: var(--red);
        margin-top: 4px
    }

    .fac-card p {
        font-size: 13px;
        color: var(--muted);
        margin-top: 12px;
        line-height: 1.65
    }
</style>

<section class="sec" id="faculty">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Our Team</div>
            <h2 class="sec-title">Meet Our Academic Leaders</h2>
            <p class="sec-body">Dedicated educators who go beyond textbooks to make learning truly meaningful.</p>
        </div>
        <div class="fac-grid">
            <div class="fac-card">
                <div class="fac-av">LG</div>
                <h3>Mrs. Lata Gupta</h3>
                <div class="fac-role">Principal</div>
                <p>Guiding Nalanda with two decades of educational leadership, committed to nurturing academic
                    rigour and a caring school culture.</p>
            </div>
            <div class="fac-card">
                <div class="fac-av">AT</div>
                <h3>Mr. Avijit Tripathi</h3>
                <div class="fac-role">Vice Principal</div>
                <p>Overseeing academic programs and faculty development, bringing innovation and discipline to every
                    classroom interaction.</p>
            </div>
            <div class="fac-card" style="background:var(--gold-lt);border-color:#ffe082">
                <div class="fac-av" style="background:var(--gold-lt);border-color:var(--gold)"><svg
                        viewBox="0 0 24 24" fill="none" stroke="var(--gold)" stroke-width="1.6" width="36"
                        height="36">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h3>Teaching Team</h3>
                <div class="fac-role" style="color:var(--green)">Qualified &amp; Experienced</div>
                <p>Our faculty are subject specialists and certified educators — dedicated mentors committed to
                    every student's success.</p>
            </div>
        </div>
    </div>
</section>

<!-- CBSE CORNER -->
<style>
    .cbse-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 60px;
        align-items: center
    }

    .cbse-stats {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 14px
    }

    /* ── MOBILE DISPLAY ──
        .display: {
            none;
        } */
</style>

<section class="sec sec-gold" id="cbse">
    <div class="wrap">
        <div class="cbse-grid">
            <div>
                <div class="label" style="color:var(--red)">CBSE Corner</div>
                <h2 class="sec-title">Affiliated with Central Board of Secondary Education</h2>
                <p class="sec-body" style="margin-bottom:24px">Nalanda is proudly affiliated with CBSE, one of
                    India's most prestigious and recognised educational boards.</p>
                <div style="display:flex;flex-direction:column;gap:10px">
                    <a href="#" class="c-row"
                        style="background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;transition:all .22s;color:var(--ink)"><span
                            style="font-size:20px">📋</span><span style="font-weight:500;font-size:14px">Mandatory
                            Disclosure</span></a>
                    <a href="#" class="c-row"
                        style="background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;transition:all .22s;color:var(--ink)"><span
                            style="font-size:20px">📊</span><span style="font-weight:500;font-size:14px">CBSE
                            Results &amp; Performance</span></a>
                    <a href="#" class="c-row"
                        style="background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;transition:all .22s;color:var(--ink)"><span
                            style="font-size:20px">📚</span><span style="font-weight:500;font-size:14px">Book Lists
                            &amp; Syllabus</span></a>
                    <a href="#" class="c-row"
                        style="background:var(--white);border:1.5px solid var(--border);border-radius:10px;padding:14px 16px;display:flex;align-items:center;gap:12px;transition:all .22s;color:var(--ink)"><span
                            style="font-size:20px">📅</span><span style="font-weight:500;font-size:14px">Academic
                            Calendar</span></a>
                </div>
            </div>
            <div class="cbse-stats">
                <div
                    style="background:var(--white);border:1.5px solid var(--border);border-radius:16px;padding:28px 20px;text-align:center">
                    <div style="font-family:var(--serif);font-size:28px;color:var(--green)">1031141</div>
                    <div
                        style="font-size:12px;color:var(--muted);margin-top:4px;text-transform:uppercase;letter-spacing:.4px">
                        CBSE Affiliation No.</div>
                </div>
                <div
                    style="background:var(--white);border:1.5px solid var(--border);border-radius:16px;padding:28px 20px;text-align:center">
                    <div style="font-family:var(--serif);font-size:28px;color:var(--red)">51099</div>
                    <div
                        style="font-size:12px;color:var(--muted);margin-top:4px;text-transform:uppercase;letter-spacing:.4px">
                        School Code</div>
                </div>
                <div
                    style="background:var(--white);border:1.5px solid var(--border);border-radius:16px;padding:28px 20px;text-align:center;grid-column:span 2">
                    <div style="font-family:var(--serif);font-size:20px;color:var(--green)">Senior Secondary</div>
                    <div style="font-size:12px;color:var(--muted);margin-top:4px">Affiliated up to Class XII</div>
                    <div style="display:flex;gap:8px;justify-content:center;margin-top:12px;flex-wrap:wrap"><span
                            style="background:var(--green-lt);border:1px solid var(--border);border-radius:20px;padding:4px 12px;font-size:12px;color:var(--green);font-weight:500">Science
                            Stream</span><span
                            style="background:var(--gold-lt);border:1px solid #ffe082;border-radius:20px;padding:4px 12px;font-size:12px;color:#f57f17;font-weight:500">Commerce
                            Stream</span></div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- CTA / ADMISSIONS -->
<style>
    .cta-section {
        background: linear-gradient(135deg, var(--gold-lt) 0%, #fffef5 50%, var(--green-lt) 100%);
        border-top: 2px solid var(--border);
        border-bottom: 2px solid var(--border);
        padding: 80px 0;
        text-align: center
    }

    .cta-section h2 {
        font-family: var(--serif);
        font-size: clamp(26px, 3.5vw, 44px);
        color: var(--ink);
        margin-bottom: 12px
    }

    .cta-section p {
        font-size: 16px;
        color: var(--muted);
        max-width: 500px;
        margin: 0 auto 32px
    }

    .cta-btns {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap
    }

    /* ─── CONTACT ─── */
    .contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 52px
    }

    .c-rows {
        display: flex;
        flex-direction: column;
        gap: 14px;
        margin-top: 24px
    }

    .c-row {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 16px;
        border-radius: 12px;
        border: 1.5px solid var(--border);
        background: var(--white);
        transition: all .22s
    }

    .c-row:hover {
        border-color: var(--green);
        background: var(--green-lt)
    }

    .c-icon {
        width: 38px;
        height: 38px;
        background: var(--green-lt);
        border: 1px solid var(--border);
        border-radius: 9px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: all .22s
    }

    .c-row:hover .c-icon {
        background: var(--green)
    }

    .c-icon svg {
        width: 18px;
        height: 18px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .22s
    }

    .c-row:hover .c-icon svg {
        stroke: #fff
    }

    .c-lbl {
        font-size: 11px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .6px;
        color: var(--muted)
    }

    .c-val {
        font-size: 14px;
        font-weight: 500;
        color: var(--ink);
        margin-top: 2px
    }

    .c-val a {
        color: var(--green);
        transition: color .2s
    }

    .c-val a:hover {
        color: var(--red)
    }

    .map-box {
        background: var(--green-lt);
        border-radius: 18px;
        border: 2px solid var(--border);
        overflow: hidden;
        min-height: 340px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        padding: 32px
    }

    .map-placeholder {
        font-size: 11px;
        color: var(--muted);
        margin-top: 10px
    }
</style>

<section class="cta-section" id="admissions">
    <div class="wrap">
        <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Admissions 2026–27
        </div>
        <h2>Give Your Child the Education They Deserve</h2>
        <p>Join the Nalanda family and watch your child thrive in a nurturing CBSE environment built for tomorrow's
            leaders.</p>
        <div class="cta-btns">
            <a href="#contact" class="btn btn-green btn-lg">Apply Now — 2026–27</a>
            <a href="#contact" class="btn btn-gold btn-lg">Contact Admission Team</a>
        </div>
    </div>
</section>

<!-- CONTACT -->
<section class="sec" id="contact">
    <div class="wrap">
        <div class="sec-head">
            <div class="label">Get in Touch</div>
            <h2 class="sec-title">Contact &amp; Location</h2>
        </div>
        <div class="contact-grid">
            <div>
                <div class="c-rows">
                    <div class="c-row">
                        <div class="c-icon"><svg viewBox="0 0 24 24">
                                <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                                <polyline points="9 22 9 12 15 12 15 22" />
                            </svg></div>
                        <div>
                            <div class="c-lbl">School Name</div>
                            <div class="c-val">Nalanda Higher Secondary School</div>
                        </div>
                    </div>
                    <div class="c-row">
                        <div class="c-icon"><svg viewBox="0 0 24 24">
                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z" />
                                <circle cx="12" cy="10" r="3" />
                            </svg></div>
                        <div>
                            <div class="c-lbl">Address</div>
                            <div class="c-val">Maharana Pratap Ward, Jhinjhiri, Katni, Madhya Pradesh</div>
                        </div>
                    </div>
                    <div class="c-row">
                        <div class="c-icon"><svg viewBox="0 0 24 24">
                                <path
                                    d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 013.07 10.8 19.79 19.79 0 01.06 2.22 2 2 0 012.03 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                            </svg></div>
                        <div>
                            <div class="c-lbl">Phone Numbers</div>
                            <div class="c-val"><a href="tel:+917622227218">+91 7622 227218</a> &nbsp;|&nbsp; <a
                                    href="tel:+916263454820">+91 6263 454820</a></div>
                        </div>
                    </div>
                    <div class="c-row">
                        <div class="c-icon"><svg viewBox="0 0 24 24">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <path d="M8 21h8M12 17v4" />
                            </svg></div>
                        <div>
                            <div class="c-lbl">CBSE Affiliation</div>
                            <div class="c-val">No. 1031141 &nbsp;|&nbsp; School Code: 51099</div>
                        </div>
                    </div>
                    <div class="c-row">
                        <div class="c-icon"><svg viewBox="0 0 24 24">
                                <circle cx="12" cy="12" r="10" />
                                <path d="M12 8v4l3 3" />
                            </svg></div>
                        <div>
                            <div class="c-lbl">School Hours</div>
                            <div class="c-val">Mon – Sat &nbsp;|&nbsp; 7:00 AM – 2:00 PM</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="map-box">
                <svg viewBox="0 0 64 64" width="56" height="56" fill="none" stroke="var(--green)" stroke-width="1.5"
                    opacity=".4">
                    <circle cx="32" cy="26" r="10" />
                    <path d="M32 4C19.85 4 10 13.85 10 26c0 16 22 34 22 34s22-18 22-34C54 13.85 44.15 4 32 4z" />
                    <circle cx="32" cy="26" r="4" fill="var(--red)" stroke="none" opacity="1" />
                </svg>
                <p class="map-placeholder" style="font-weight:600;color:var(--ink);font-size:14px;margin-top:12px">
                    Nalanda Higher Secondary School</p>
                <p class="map-placeholder">Maharana Pratap Ward, Jhinjhiri, Katni</p>
                <a href="https://maps.google.com/?q=Nalanda+Higher+Secondary+School+Katni" target="_blank"
                    class="btn btn-green" style="margin-top:20px">Open in Google Maps</a>
            </div>
        </div>
    </div>
</section>

<!-- /* ═══════════════════════════════
RESPONSIVE
═══════════════════════════════ */ -->
<style>
    /* Large screens */
    @media (max-width: 1200px) {
        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .acad-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .campus-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    /* Tablet */
    @media (max-width: 992px) {

        .nav-links,
        .nav-ctas {
            display: none;
        }

        .ham {
            display: flex;
        }

        .mobile-menu {
            display: block;
        }

        .topbar-right {
            display: none;
        }

        .hero-inner {
            grid-template-columns: 1fr;
        }

        .hero-panel {
            display: none;
        }

        .about-grid {
            grid-template-columns: 1fr;
            gap: 36px;
        }

        .contact-grid {
            grid-template-columns: 1fr;
            gap: 32px;
        }

        .cbse-grid {
            grid-template-columns: 1fr;
            gap: 36px;
        }

        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .acad-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .campus-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .fac-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .events-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stlife-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .gtile.big {
            grid-row: span 1;
            aspect-ratio: 4/3;
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .sec {
            padding: 64px 0;
        }
    }

    /* Mobile */
    @media (max-width: 768px) {
        .wrap {
            padding: 0 16px;
        }

        .topbar-left {
            gap: 10px;
            font-size: 12px;
        }

        .hero {
            min-height: auto;
            padding: 60px 0 50px;
            text-align: center;
        }

        .hero-desc {
            margin-left: auto;
            margin-right: auto;
        }

        .hero-pills {
            justify-content: center;
        }

        .hero-btns {
            justify-content: center;
        }

        .why-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .acad-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .campus-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .fac-grid {
            grid-template-columns: 1fr;
        }

        .events-grid {
            grid-template-columns: 1fr;
        }

        .gallery-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .stlife-grid {
            grid-template-columns: 1fr;
        }

        .cbse-stats {
            grid-template-columns: 1fr 1fr;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .about-grid {
            gap: 28px;
        }

        .chips-grid {
            grid-template-columns: 1fr;
        }

        .btn-lg {
            padding: 12px 24px;
            font-size: 14px;
        }

        .sec {
            padding: 52px 0;
        }
    }

    /* Small mobile */
    @media (max-width: 480px) {
        .why-grid {
            grid-template-columns: 1fr 1fr;
        }

        .acad-grid {
            grid-template-columns: 1fr 1fr;
        }

        .campus-grid {
            grid-template-columns: 1fr 1fr;
        }

        .gallery-grid {
            grid-template-columns: 1fr;
        }

        .gtile.big {
            grid-row: span 1;
            aspect-ratio: 4/3;
        }

        .hero h1 {
            font-size: 30px;
        }

        .cta-btns {
            flex-direction: column;
            align-items: center;
        }

        .cta-btns .btn {
            width: 100%;
            max-width: 320px;
            justify-content: center;
        }

        .hero-btns {
            flex-direction: column;
            align-items: center;
        }

        .hero-btns .btn {
            width: 100%;
            max-width: 280px;
            justify-content: center;
        }

        .topbar-left span:nth-child(2) {
            display: none;
        }

        .topbar-left span:nth-child(3) {
            display: none;
        }

        .topbar-left span:nth-child(4) {
            display: none;
        }
    }

    @media (prefers-reduced-motion: reduce) {

        *,
        *::before,
        *::after {
            animation: none !important;
            transition: none !important;
            scroll-behavior: auto !important;
        }
    }
</style>

<script>
    // ── Scroll fade-in animation ──
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(e => {
            if (e.isIntersecting) {
                e.target.style.opacity = '1';
                e.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: .08,
        rootMargin: '0px 0px -30px 0px'
    });

    document.querySelectorAll('.why-card,.c-card,.ev-card,.fac-card,.level,.stat-box,.gtile,.stlife-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(18px)';
        el.style.transition = 'opacity .50s ease, transform .50s ease';
        observer.observe(el);
    });
</script>
@endsection
