@extends('layouts.app')

@section('title', 'About Us')

@section('content')

<style>
    /* ─── PAGE BANNER (about hero) ─── */
    .pbanner {
        background: linear-gradient(140deg, var(--gold-lt) 0%, var(--green-lt) 55%, #f1f8f1 100%);
        padding: 70px 0 64px;
        position: relative;
        overflow: hidden;
        text-align: center
    }

    .pbanner-rays {
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

    .pbanner .hero-tag {
        margin: 0 auto 20px
    }

    .pbanner h1 {
        font-family: var(--serif);
        font-size: clamp(32px, 4.5vw, 54px);
        color: var(--ink);
        line-height: 1.1;
        letter-spacing: -.3px;
        margin-bottom: 16px
    }

    .pbanner h1 em {
        font-style: italic;
        color: var(--green)
    }

    .pbanner p.tagline {
        font-size: 16px;
        color: var(--muted);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8;
        font-style: italic
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
        gap: 8px;
        align-items: center;
        font-size: 12.5px;
        color: var(--muted);
        margin-top: 18px
    }

    .breadcrumb a {
        color: var(--green);
        font-weight: 600
    }

    /* ─── SECTION COMMON (shared) ─── */
    .sec {
        padding: 88px 0
    }

    .sec-alt {
        background: var(--green-lt)
    }

    .sec-gold {
        background: var(--gold-lt)
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
        text-transform: uppercase
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
        margin: 0 auto;
        max-width: 640px
    }

    /* ─── ABOUT (welcome section) ─── */
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

    .cta-row {
        display: flex;
        gap: 12px;
        flex-wrap: wrap;
        margin-top: 10px
    }

    /* ─── TIMELINE (journey) ─── */
    .timeline {
        position: relative;
        max-width: 900px;
        margin: 0 auto;
        padding-left: 0
    }

    .timeline::before {
        content: '';
        position: absolute;
        left: 22px;
        top: 8px;
        bottom: 8px;
        width: 2.5px;
        background: var(--border);
        border-radius: 2px
    }

    .tl-item {
        position: relative;
        padding: 0 0 36px 60px
    }

    .tl-item:last-child {
        padding-bottom: 0
    }

    .tl-dot {
        position: absolute;
        left: 11px;
        top: 2px;
        width: 24px;
        height: 24px;
        border-radius: 50%;
        background: var(--white);
        border: 3px solid var(--green);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
        transition: all .25s
    }

    .tl-item:hover .tl-dot {
        background: var(--green);
        transform: scale(1.12)
    }

    .tl-dot-inner {
        width: 7px;
        height: 7px;
        background: var(--green);
        border-radius: 50%;
        transition: background .25s
    }

    .tl-item:hover .tl-dot-inner {
        background: #fff
    }

    .tl-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 18px 22px;
        transition: all .25s
    }

    .tl-item:hover .tl-card {
        border-color: var(--green);
        transform: translateX(4px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .tl-year {
        font-family: var(--serif);
        font-size: 13px;
        color: var(--red);
        font-weight: 700;
        letter-spacing: .4px;
        margin-bottom: 3px;
        text-transform: uppercase
    }

    .tl-card h4 {
        font-size: 16px;
        color: var(--ink);
        font-weight: 600
    }

    /* ─── VISION / MISSION ─── */
    .vm-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 24px
    }

    .vm-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 34px 30px;
        transition: all .28s
    }

    .vm-card:hover {
        border-color: var(--green);
        transform: translateY(-4px);
        box-shadow: 0 14px 32px rgba(46, 125, 50, .1)
    }

    .vm-icon {
        width: 52px;
        height: 52px;
        background: var(--green-lt);
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-bottom: 18px
    }

    .vm-icon svg {
        width: 24px;
        height: 24px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8
    }

    .vm-card.gold .vm-icon {
        background: var(--gold-lt)
    }

    .vm-card.gold .vm-icon svg {
        stroke: #f57f17
    }

    .vm-card h3 {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--ink);
        margin-bottom: 10px
    }

    .vm-card>p {
        color: var(--muted);
        font-size: 14.5px;
        line-height: 1.75;
        margin-bottom: 18px
    }

    .vm-tags {
        display: flex;
        flex-wrap: wrap;
        gap: 8px
    }

    .vm-tag {
        display: flex;
        align-items: center;
        gap: 6px;
        background: var(--green-lt);
        border: 1px solid var(--border);
        border-radius: 20px;
        padding: 5px 12px;
        font-size: 12px;
        font-weight: 500;
        color: var(--ink2);
        transition: all .2s
    }

    .vm-card.gold .vm-tag {
        background: var(--gold-lt);
        border-color: #ffe082
    }

    .vm-tag:hover {
        background: var(--green);
        color: #fff;
        border-color: var(--green)
    }

    .vm-card.gold .vm-tag:hover {
        background: var(--gold);
        color: var(--ink)
    }

    /* ─── CORE VALUES ─── */
    .values-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .val-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 24px 18px;
        text-align: center;
        transition: all .28s
    }

    .val-card:hover {
        border-color: var(--green);
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(46, 125, 50, .12)
    }

    .val-card:hover .wi {
        background: var(--green)
    }

    .val-card:hover .wi svg {
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

    .val-card h4 {
        font-size: 14px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 5px
    }

    .val-card p {
        font-size: 12px;
        color: var(--muted);
        line-height: 1.55
    }

    /* ─── PHILOSOPHY / METHODOLOGY ─── */
    .phil-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px;
        margin: 32px 0
    }

    .phil-chip {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        padding: 16px 14px;
        text-align: center;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink2);
        transition: all .22s
    }

    .phil-chip:hover {
        background: var(--green-lt);
        border-color: var(--green);
        transform: translateY(-2px)
    }

    .highlight-quote {
        text-align: center;
        font-family: var(--serif);
        font-style: italic;
        font-size: clamp(18px, 2.4vw, 26px);
        color: var(--green);
        padding: 28px 20px;
        border-top: 1.5px dashed var(--border);
        border-bottom: 1.5px dashed var(--border);
        margin-top: 12px
    }

    /* ─── METHOD FLOW ─── */
    .flow-row {
        display: flex;
        align-items: center;
        justify-content: center;
        flex-wrap: wrap;
        gap: 10px;
        margin-bottom: 40px
    }

    .flow-step {
        background: var(--white);
        border: 1.5px solid var(--green-mid);
        border-radius: 30px;
        padding: 10px 22px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--green);
        transition: all .22s
    }

    .flow-step:hover {
        background: var(--green);
        color: #fff;
        transform: translateY(-2px)
    }

    .flow-arrow {
        color: var(--gold);
        font-size: 18px
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

    /* ─── WHY CHOOSE (checklist) ─── */
    .why-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px;
        max-width: 800px;
        margin: 0 auto
    }

    .why-check {
        display: flex;
        align-items: center;
        gap: 10px;
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        padding: 14px 18px;
        font-size: 14px;
        font-weight: 500;
        color: var(--ink2);
        transition: all .22s
    }

    .why-check:hover {
        border-color: var(--green);
        background: var(--green-lt);
        transform: translateX(3px)
    }

    .why-check .ck {
        width: 22px;
        height: 22px;
        background: var(--green);
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0
    }

    .why-check .ck svg {
        width: 11px;
        height: 11px;
        stroke: #fff;
        stroke-width: 3;
        fill: none
    }

    /* ─── CAMPUS STATS TABLE ─── */
    .camp-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .camp-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 16px;
        text-align: center;
        transition: all .25s
    }

    .camp-card:hover {
        border-color: var(--gold-mid);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
    }

    .camp-n {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--green);
        line-height: 1.15
    }

    .camp-l {
        font-size: 11.5px;
        color: var(--muted);
        margin-top: 6px;
        text-transform: uppercase;
        letter-spacing: .4px
    }

    /* ─── INFRASTRUCTURE GRID ─── */
    .infra-grid {
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

    /* ─── PRINCIPAL MESSAGE ─── */
    .prin-grid {
        display: grid;
        grid-template-columns: 280px 1fr;
        gap: 48px;
        align-items: center;
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 22px;
        padding: 44px;
    }

    .prin-photo {
        width: 100%;
        aspect-ratio: 1;
        border-radius: 18px;
        background: var(--green-lt);
        border: 3px solid var(--green-mid);
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--serif);
        font-size: 56px;
        color: var(--green);
    }

    .prin-name {
        font-family: var(--serif);
        font-size: 24px;
        color: var(--ink);
        margin-top: 16px;
        text-align: center
    }

    .prin-role {
        text-align: center;
        font-size: 12px;
        font-weight: 700;
        color: var(--red);
        text-transform: uppercase;
        letter-spacing: .6px;
        margin-top: 4px
    }

    .prin-quote {
        font-family: var(--serif);
        font-style: italic;
        font-size: 19px;
        color: var(--ink2);
        line-height: 1.65;
        margin-bottom: 18px
    }

    .prin-text {
        color: var(--muted);
        font-size: 14.5px;
        line-height: 1.8;
        margin-bottom: 20px
    }

    /* ─── GLANCE STATS ─── */
    .glance-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 14px
    }

    .glance-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 12px;
        text-align: center;
        transition: all .25s
    }

    .glance-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .glance-n {
        font-family: var(--serif);
        font-size: 18px;
        color: var(--green);
        line-height: 1.2
    }

    .glance-l {
        font-size: 10.5px;
        color: var(--muted);
        margin-top: 6px;
        text-transform: uppercase;
        letter-spacing: .3px
    }

    /* ─── CTA ─── */
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
</style>


<!-- 1. PAGE BANNER -->
<section class="pbanner">
    <div class="pbanner-rays"></div>
    <div class="wrap">
        <div class="hero-tag"><span class="hero-dot"></span>About Nalanda Higher Secondary School</div>
        <h1 style="margin-top:18px">Empowering Young Minds Through <em>Excellence, Innovation &amp; Values</em>
        </h1>
        <p class="tagline">"Empowering Young Minds Through Excellence, Innovation &amp; Values Since 2010"</p>
        <div class="breadcrumb"><a href="SimpleHPage.html">Home</a> <span>/</span> <span>About Us</span></div>
    </div>
</section>

<!-- 2. ABOUT THE SCHOOL -->
<section class="sec" id="about">
    <div class="wrap">
        <div class="about-grid">
            <div class="about-img">
                <img src="https://images.unsplash.com/photo-1580582932707-520aed937b7b?w=700&q=80"
                    alt="School building">
                <div class="about-img-badge">Est. 2010 <span>CBSE Affiliated</span></div>
            </div>
            <div class="about-text">
                <div class="label">Welcome</div>
                <h2 class="sec-title">Welcome to Nalanda Higher Secondary School</h2>
                <p>Nalanda Higher Secondary School, Maharana Pratap Ward, Jhinjhiri, Katni (M.P.), was established
                    in 2010 with the vision of providing high-quality education and nurturing future leaders. The
                    school is committed to academic excellence, character development and holistic growth of every
                    student.</p>
                <p>Our experienced and trained faculty members use modern teaching methodologies and
                    activity-based learning techniques to create an engaging educational environment. We believe
                    education should inspire thinking, creativity and problem-solving rather than rote learning.
                </p>
                <p>At Nalanda, students receive equal opportunities to excel in academics, sports, arts and
                    co-curricular activities while developing into confident, responsible and value-driven
                    individuals.</p>
                <div class="cta-row">
                    <a href="CBSCcorner.html" class="btn btn-green">Explore Academics</a>
                    <a href="#contact" class="btn btn-gold">Admission Enquiry</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3. SCHOOL JOURNEY -->
<section class="sec sec-alt" id="journey">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Milestones</div>
            <h2 class="sec-title">Our Journey Since 2010</h2>
            <p class="sec-body">Growing year on year — from a new school to a leading CBSE institution in the Katni
                region.</p>
        </div>
        <div class="timeline">
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">2010</div>
                    <h4>School Established</h4>
                </div>
            </div>
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">CBSE Affiliation</div>
                    <h4>Affiliated with CBSE, New Delhi</h4>
                </div>
            </div>
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">Expansion Phase</div>
                    <h4>Development of Laboratories &amp; Infrastructure</h4>
                </div>
            </div>
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">Smart Learning</div>
                    <h4>Implementation of Smart Classrooms</h4>
                </div>
            </div>
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">Senior Secondary Education</div>
                    <h4>Expansion up to Class XII</h4>
                </div>
            </div>
            <div class="tl-item">
                <div class="tl-dot">
                    <div class="tl-dot-inner"></div>
                </div>
                <div class="tl-card">
                    <div class="tl-year">Present</div>
                    <h4>Leading CBSE School in the Katni Region</h4>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4. VISION & MISSION -->
<section class="sec" id="vision-mission">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Guiding Principles</div>
            <h2 class="sec-title">Vision &amp; Mission</h2>
        </div>
        <div class="vm-grid">
            <div class="vm-card">
                <div class="vm-icon"><svg viewBox="0 0 24 24">
                        <path d="M2 12s3.5-7 10-7 10 7 10 7-3.5 7-10 7-10-7-10-7z" />
                        <circle cx="12" cy="12" r="3" />
                    </svg></div>
                <h3>Our Vision</h3>
                <p>To develop well-rounded, confident and responsible individuals who aspire to achieve their
                    fullest potential.</p>
                <div class="vm-tags">
                    <span class="vm-tag">Safe &amp; Welcoming Environment</span>
                    <span class="vm-tag">Equal Opportunities for All</span>
                    <span class="vm-tag">Recognition of Achievements</span>
                    <span class="vm-tag">Innovation in Education</span>
                    <span class="vm-tag">Academic &amp; Personal Development</span>
                    <span class="vm-tag">Future Ready Learning</span>
                </div>
            </div>
            <div class="vm-card gold">
                <div class="vm-icon"><svg viewBox="0 0 24 24">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg></div>
                <h3>Our Mission</h3>
                <p>To provide an educational environment that promotes intellectual, emotional, social and moral
                    growth, enabling every student to realize their full potential and achieve the highest
                    academic standards.</p>
                <div class="vm-tags">
                    <span class="vm-tag">Integrity &amp; Ethical Values</span>
                    <span class="vm-tag">Responsibility &amp; Self Discipline</span>
                    <span class="vm-tag">Hard Work &amp; Perseverance</span>
                    <span class="vm-tag">Leadership &amp; Confidence</span>
                    <span class="vm-tag">Environmental Awareness</span>
                    <span class="vm-tag">Human Rights</span>
                    <span class="vm-tag">Democratic Values</span>
                    <span class="vm-tag">Social Harmony</span>
                    <span class="vm-tag">Parent-Teacher Collaboration</span>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5. CORE VALUES -->
<section class="sec sec-alt" id="values">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">What We Stand For</div>
            <h2 class="sec-title">Values We Live By</h2>
        </div>
        <div class="values-grid">
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Integrity</h4>
                <p>Acting with honesty and strong moral principles.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 8v4l3 3" />
                    </svg></div>
                <h4>Responsibility</h4>
                <p>Owning actions and commitments.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg></div>
                <h4>Self Discipline</h4>
                <p>Building consistency and accountability.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h4>Leadership</h4>
                <p>Developing future leaders.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22c5.523 0 10-4.477 10-10S17.523 2 12 2 2 6.477 2 12s4.477 10 10 10z" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                    </svg></div>
                <h4>Environmental Awareness</h4>
                <p>Protecting nature and resources.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Human Rights</h4>
                <p>Respecting dignity and equality.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Democratic Values</h4>
                <p>Promoting fairness and participation.</p>
            </div>
            <div class="val-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h4>Social Harmony</h4>
                <p>Building respectful communities.</p>
            </div>
        </div>
    </div>
</section>

<!-- 6. EDUCATIONAL PHILOSOPHY -->
<section class="sec" id="philosophy">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">How We Teach</div>
            <h2 class="sec-title">Our Educational Approach</h2>
            <p class="sec-body">Nalanda follows a student-centered educational model designed to nurture critical
                thinkers, innovators and lifelong learners.</p>
        </div>
        <div class="phil-grid">
            <div class="phil-chip">Student-Centered Learning</div>
            <div class="phil-chip">Activity-Based Learning</div>
            <div class="phil-chip">Collaborative Learning</div>
            <div class="phil-chip">Project-Based Learning</div>
            <div class="phil-chip">Critical Thinking</div>
            <div class="phil-chip">Problem Solving</div>
            <div class="phil-chip">Design Thinking</div>
            <div class="phil-chip">Creativity &amp; Innovation</div>
        </div>
        <div class="highlight-quote">"Learning by Doing, Exploring and Creating."</div>
    </div>
</section>

<!-- 7. LEARNING METHODOLOGY -->
<section class="sec sec-gold" id="methodology">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Our Process</div>
            <h2 class="sec-title">How We Teach</h2>
        </div>
        <div class="flow-row">
            <span class="flow-step">Learn</span><span class="flow-arrow">→</span>
            <span class="flow-step">Explore</span><span class="flow-arrow">→</span>
            <span class="flow-step">Practice</span><span class="flow-arrow">→</span>
            <span class="flow-step">Apply</span><span class="flow-arrow">→</span>
            <span class="flow-step">Innovate</span>
        </div>
        <div class="ftags">
            <span class="ftag">Interactive Classroom Learning</span>
            <span class="ftag">Experiential Learning</span>
            <span class="ftag">Inquiry-Based Learning</span>
            <span class="ftag">Project-Based Activities</span>
            <span class="ftag">Technology Integration</span>
            <span class="ftag">Collaborative Learning</span>
            <span class="ftag">Art Integrated Learning</span>
            <span class="ftag">Cross-Curricular Learning</span>
        </div>
    </div>
</section>

<!-- 8. WHY CHOOSE NALANDA -->
<section class="sec" id="why">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Trust &amp; Confidence</div>
            <h2 class="sec-title">Why Parents Trust Nalanda</h2>
        </div>
        <div class="why-grid">
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>CBSE Affiliated School</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Smart Classrooms</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Experienced Faculty</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Modern Science Labs</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Computer Laboratory</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Large Playground</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Activity-Based Learning</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Character Building</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Safe &amp; Nurturing Environment</div>
            <div class="why-check"><span class="ck"><svg viewBox="0 0 24 24">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Holistic Development</div>
        </div>
    </div>
</section>

<!-- 9. CAMPUS OVERVIEW -->
<section class="sec sec-alt" id="campus">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Infrastructure</div>
            <h2 class="sec-title">Modern Campus Infrastructure</h2>
        </div>
        <div class="camp-grid">
            <div class="camp-card">
                <div class="camp-n">8,075 m²</div>
                <div class="camp-l">Campus Area</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">2,877.2 m²</div>
                <div class="camp-l">Built-up Area</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">6,636.6 m²</div>
                <div class="camp-l">Playground Area</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">08</div>
                <div class="camp-l">Drinking Water Points</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">04 + 08</div>
                <div class="camp-l">Boys Toilets / Urinals</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">08</div>
                <div class="camp-l">Girls Toilets</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">02</div>
                <div class="camp-l">Disabled-Friendly Toilets</div>
            </div>
            <div class="camp-card">
                <div class="camp-n">03</div>
                <div class="camp-l">Staff Toilets</div>
            </div>
        </div>
    </div>
</section>

<!-- 10. ACADEMIC INFRASTRUCTURE -->
<section class="sec" id="infrastructure">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Facilities</div>
            <h2 class="sec-title">Facilities Supporting Excellence</h2>
        </div>
        <div class="infra-grid">
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" />
                        <path d="M7 12h10M12 7v10" />
                    </svg></div>
                <h4>Smart Classrooms</h4>
                <p>10 Rooms · 500 sq.ft. each</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Biology Laboratory</h4>
                <p>760 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z" />
                    </svg></div>
                <h4>Chemistry Laboratory</h4>
                <p>760 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Physics Laboratory</h4>
                <p>760 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z" />
                    </svg></div>
                <h4>Mathematics Laboratory</h4>
                <p>500 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Computer Laboratory</h4>
                <p>760 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Library</h4>
                <p>700 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                    </svg></div>
                <h4>Activity Room</h4>
                <p>500 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Sports Room</h4>
                <p>700 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Counseling Room</h4>
                <p>240 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg></div>
                <h4>Medical Room</h4>
                <p>240 sq.ft.</p>
            </div>
            <div class="c-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <path d="M9 9h6M9 12h6M9 15h4" />
                    </svg></div>
                <h4>Resource Room</h4>
                <p>700 sq.ft.</p>
            </div>
        </div>
    </div>
</section>

<!-- 11. PRINCIPAL'S MESSAGE -->
<section class="sec sec-gold" id="principal">
    <div class="wrap">
        <div class="prin-grid">
            <div>
                <div class="prin-photo">LG</div>
                <div class="prin-name">Mrs. Lata Gupta</div>
                <div class="prin-role">Principal</div>
            </div>
            <div>
                <div class="label" style="color:var(--red)">From the Desk Of</div>
                <h2 class="sec-title" style="margin-bottom:18px">Message from the Principal</h2>
                <p class="prin-quote">"At Nalanda, we believe every child carries the spark of greatness — our role
                    is simply to nurture it with patience, purpose and care."</p>
                <p class="prin-text">With nearly two decades of educational leadership, Mrs. Lata Gupta guides
                    Nalanda Higher Secondary School with a vision rooted in academic rigour, strong values, and a
                    genuinely caring school culture — ensuring every student is supported on their journey toward
                    excellence.</p>
                <a href="#" class="btn btn-green">Read Full Message</a>
            </div>
        </div>
    </div>
</section>

<!-- 12. SCHOOL AT A GLANCE -->
<section class="sec" id="glance">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">By the Numbers</div>
            <h2 class="sec-title">School at a Glance</h2>
        </div>
        <div class="glance-grid">
            <div class="glance-card">
                <div class="glance-n">2010</div>
                <div class="glance-l">Established</div>
            </div>
            <div class="glance-card">
                <div class="glance-n">1031141</div>
                <div class="glance-l">CBSE Affiliation No.</div>
            </div>
            <div class="glance-card">
                <div class="glance-n">XII</div>
                <div class="glance-l">Senior Secondary School</div>
            </div>
            <div class="glance-card">
                <div class="glance-n">4044+</div>
                <div class="glance-l">Library Books</div>
            </div>
            <div class="glance-card">
                <div class="glance-n">35</div>
                <div class="glance-l">Computer Systems</div>
            </div>
            <div class="glance-card">
                <div class="glance-n">Experienced</div>
                <div class="glance-l">Faculty Team</div>
            </div>
        </div>
    </div>
</section>

<!-- 13. CTA -->
<section class="cta-section" id="admissions">
    <div class="wrap">
        <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Join Us</div>
        <h2>Become Part of the Nalanda Family</h2>
        <p>Providing quality education, strong values and future-ready learning experiences.</p>
        <div class="cta-btns">
            <a href="#contact" class="btn btn-green btn-lg">Apply for Admission</a>
            <a href="#contact" class="btn btn-gold btn-lg">Contact Us</a>
        </div>
    </div>
</section>

<!-- CONTACT (quick strip, mirrors homepage anchor) -->
<section class="sec sec-alt" id="contact">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Get in Touch</div>
            <h2 class="sec-title">Visit or Reach Us</h2>
            <p class="sec-body">Maharana Pratap Ward, Jhinjhiri, Katni, Madhya Pradesh — Mon to Sat, 7:00 AM – 2:00
                PM.</p>
        </div>
        <div style="display:flex;gap:14px;justify-content:center;flex-wrap:wrap">
            <a href="tel:+917622227218" class="btn btn-green btn-lg">Call +91 7622 227218</a>
            <a href="SimpleHPage.html#contact" class="btn btn-ghost btn-lg">Full Contact Details</a>
        </div>
    </div>
</section>

<!-- ═══════════════════════════════
RESPONSIVE
═══════════════════════════════ -->
<style>
    @media (max-width: 1200px) {
        .values-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .infra-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .camp-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .phil-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .glance-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

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

        .about-grid {
            grid-template-columns: 1fr;
            gap: 36px;
        }

        .vm-grid {
            grid-template-columns: 1fr;
        }

        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .infra-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .camp-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .glance-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .why-grid {
            grid-template-columns: 1fr;
        }

        .prin-grid {
            grid-template-columns: 1fr;
            padding: 30px;
            text-align: center
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }

        .sec {
            padding: 64px 0;
        }
    }

    @media (max-width: 768px) {
        .wrap {
            padding: 0 16px;
        }

        .topbar-left {
            gap: 10px;
            font-size: 12px;
        }

        .pbanner {
            padding: 50px 0 44px;
        }

        .values-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .infra-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .camp-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .phil-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .glance-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .timeline::before {
            left: 16px;
        }

        .tl-item {
            padding-left: 48px;
        }

        .tl-dot {
            left: 5px;
            width: 20px;
            height: 20px;
        }

        .btn-lg {
            padding: 12px 24px;
            font-size: 14px;
        }

        .sec {
            padding: 52px 0;
        }
    }

    @media (max-width: 480px) {
        .values-grid {
            grid-template-columns: 1fr 1fr;
        }

        .infra-grid {
            grid-template-columns: 1fr 1fr;
        }

        .camp-grid {
            grid-template-columns: 1fr 1fr;
        }

        .phil-grid {
            grid-template-columns: 1fr 1fr;
        }

        .glance-grid {
            grid-template-columns: 1fr 1fr;
        }

        .pbanner h1 {
            font-size: 28px;
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
        }, { threshold: .08, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.val-card,.c-card,.vm-card,.tl-item,.camp-card,.glance-card,.why-check,.phil-chip').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity .45s ease, transform .45s ease';
            observer.observe(el);
        });
</script>

@endsection()
