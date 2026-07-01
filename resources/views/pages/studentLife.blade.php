@extends('layouts.app')

@section('title', 'Student Life')

@section('content')

<style>
 /* ─── HERO (compact, inner page) ─── */
        .hero-inner-page {
            background: linear-gradient(140deg, var(--gold-lt) 0%, var(--green-lt) 55%, #f1f8f1 100%);
            padding: 64px 0 56px;
            position: relative;
            overflow: hidden;
            text-align: center
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

        .hero-inner-page h1 {
            font-family: var(--serif);
            font-size: clamp(32px, 4.5vw, 54px);
            color: var(--ink);
            line-height: 1.1;
            letter-spacing: -.3px;
            margin-bottom: 14px
        }

        .hero-inner-page h1 em {
            font-style: italic;
            color: var(--green)
        }

        .hero-desc {
            font-size: 16px;
            color: var(--muted);
            max-width: 560px;
            line-height: 1.8;
            margin: 0 auto 28px
        }

        .hero-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 30px;
            justify-content: center
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
            flex-wrap: wrap;
            justify-content: center
        }

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
            max-width: 560px;
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

        /* ─── OVERVIEW HIGHLIGHT CARDS (reuse why-card) ─── */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
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

        /* ─── ACTIVITY SUB-SECTION (image + text split) ─── */
        .act-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 60px;
            align-items: center
        }

        .act-grid.rev .act-img {
            order: 2
        }
/*         
        .act-img {
            border-radius: 20px;
            overflow: hidden;
            border: 3px solid var(--border);
            aspect-ratio: 4/3
        }

        .act-img img {
            width: 100%;
            height: 100%;
            object-fit: cover
        } */
      
        .act-img {
    width: 100%;
    height: 400px;
    overflow: hidden;
}

.act-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}

        .act-text .sec-body {
            max-width: none;
            margin-bottom: 20px
        }

        .ftags {
            display: flex;
            flex-wrap: wrap;
            gap: 9px
        }

        .ftags.c {
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

        .subhead {
            font-size: 11px;
            font-weight: 700;
            letter-spacing: 1px;
            text-transform: uppercase;
            color: var(--muted);
            margin: 22px 0 10px
        }

        /* ─── CAMPUS-STYLE CARD GRID (reuse c-card) ─── */
        .campus-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px
        }

        .campus-grid.three {
            grid-template-columns: repeat(3, 1fr)
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

        /* ─── EVENTS-STYLE CARDS (reuse ev-card) ─── */
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

        /* ─── GALLERY ─── */
        .gallery-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
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

        /* ─── ACHIEVEMENTS STRIP ─── */
        .ach-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px
        }

        .ach-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 26px 16px;
            text-align: center;
            transition: all .28s
        }

        .ach-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 10px 26px rgba(46, 125, 50, .1)
        }

        .ach-ico {
            font-size: 26px;
            margin-bottom: 10px
        }

        .ach-card h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink)
        }

        /* ─── SECTION NAV JUMP LINKS ─── */
        .jumpnav {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            justify-content: center;
            padding: 22px 0;
            background: var(--white);
            border-bottom: 1.5px solid var(--border);
            position: sticky;
            top: 70px;
            z-index: 150
        }

        .jumpnav a {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--ink2);
            background: var(--green-lt);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 7px 15px;
            transition: all .2s;
            white-space: nowrap
        }

        .jumpnav a:hover {
            background: var(--green);
            color: #fff;
            border-color: var(--green)
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


 <!-- HERO -->
    <section class="hero-inner-page">
        <div class="hero-rays"></div>
        <div class="wrap">
            <div class="hero-tag"><span class="hero-dot"></span>Student Life at Nalanda</div>
            <h1>Learning <em>Beyond</em> Classrooms</h1>
            <p class="hero-desc">At Nalanda Higher Secondary School, student life extends far beyond academics —
                sports, arts, culture, leadership, wellness, and community come together to shape confident, capable
                young people.</p>
            <div class="hero-pills">
                <div class="hero-pill"><span class="pill-dot"></span>Holistic Development</div>
                <div class="hero-pill"><span class="pill-dot"></span>Sports & Fitness</div>
                <div class="hero-pill"><span class="pill-dot"></span>Arts & Creativity</div>
                <div class="hero-pill"><span class="pill-dot"></span>Leadership & Life Skills</div>
                <div class="hero-pill"><span class="pill-dot"></span>Cultural Excellence</div>
                <div class="hero-pill"><span class="pill-dot"></span>Student Well-being</div>
            </div>
            <div class="hero-btns">
                <a href="#overview" class="btn btn-green btn-lg">Explore Activities</a>
                <a href="#gallery" class="btn btn-gold btn-lg">View Gallery</a>
            </div>
        </div>
    </section>

    <!-- TICKER -->
    <!-- <div class="ticker">
        <div class="ticker-inner">
            <span class="ticker-item"><span class="tdot"></span>Sports & Physical Education</span>
            <span class="ticker-item"><span class="tdot"></span>Yoga & Wellness</span>
            <span class="ticker-item"><span class="tdot"></span>Dance & Music</span>
            <span class="ticker-item"><span class="tdot"></span>Debate & Public Speaking</span>
            <span class="ticker-item"><span class="tdot"></span>Student Counseling</span>
            <span class="ticker-item"><span class="tdot"></span>Educational Tours</span>
            <span class="ticker-item"><span class="tdot"></span>Green Initiatives</span>
            <span class="ticker-item"><span class="tdot"></span>Cultural Programs</span>
            <span class="ticker-item"><span class="tdot"></span>Leadership Development</span>
            <span class="ticker-item"><span class="tdot"></span>Sports & Physical Education</span>
            <span class="ticker-item"><span class="tdot"></span>Yoga & Wellness</span>
            <span class="ticker-item"><span class="tdot"></span>Dance & Music</span>
            <span class="ticker-item"><span class="tdot"></span>Debate & Public Speaking</span>
            <span class="ticker-item"><span class="tdot"></span>Student Counseling</span>
            <span class="ticker-item"><span class="tdot"></span>Educational Tours</span>
            <span class="ticker-item"><span class="tdot"></span>Green Initiatives</span>
        </div>
    </div> -->

    <!-- JUMP NAV -->
    <div class="jumpnav">
        <a href="#overview">Overview</a>
        <a href="#arts">Art & Culture</a>
        <a href="#sports">Sports</a>
        <a href="#yoga">Yoga & Wellness</a>
        <a href="#leadership">Leadership</a>
        <a href="#counseling">Counseling</a>
        <a href="#green">Green Initiative</a>
        <a href="#tours">Educational Tours</a>
        <a href="#achievements">Achievements</a>
        <a href="#gallery">Gallery</a>
    </div>

    <!-- 1. OVERVIEW -->
    <section class="sec" id="overview">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Student Life Overview</div>
                <h2 class="sec-title">A Balanced Journey of Learning, Leadership & Growth</h2>
                <p class="sec-body">At Nalanda Higher Secondary School, student life extends beyond academics. The
                    school provides opportunities for students to participate in sports, arts, cultural activities,
                    leadership programs, life skill development, environmental initiatives, educational tours, and
                    wellness programs to ensure holistic development.</p>
            </div>
            <div class="why-grid">
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="6" />
                            <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                        </svg></div>
                    <h4>Sports & Physical Education</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="9" />
                            <path d="M12 3v18M3 12h18" />
                        </svg></div>
                    <h4>Yoga & Wellness</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M9 18V5l12-2v13" />
                            <circle cx="6" cy="18" r="3" />
                            <circle cx="18" cy="16" r="3" />
                        </svg></div>
                    <h4>Dance & Music</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M12 19l7-7 3 3-7 7-3-3z" />
                            <path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z" />
                        </svg></div>
                    <h4>Art & Craft</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M17 8a5 5 0 00-10 0c0 5-2 6-2 6h14s-2-1-2-6" />
                            <path d="M9 20a3 3 0 006 0" />
                        </svg></div>
                    <h4>Debate & Public Speaking</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h4>Student Counseling</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <rect x="1" y="6" width="15" height="12" rx="1" />
                            <path d="M16 10h3l3 3v5h-6z" />
                            <circle cx="6" cy="20" r="1.6" />
                            <circle cx="17.5" cy="20" r="1.6" />
                        </svg></div>
                    <h4>Educational Tours</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg></div>
                    <h4>Green Initiatives</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg></div>
                    <h4>Cultural Programs</h4>
                </div>
                <div class="why-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                        </svg></div>
                    <h4>Leadership Development</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 2 & 3 & 4. CO-SCHOLASTIC: ART, DANCE, MUSIC -->
    <section class="sec sec-alt" id="arts">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Co-Scholastic Activities</div>
                <h2 class="sec-title">Art, Dance & Performing Arts</h2>
                <p class="sec-body">The school believes education goes beyond textbooks. Co-scholastic activities help
                    students develop creativity, communication skills, confidence, leadership qualities, and teamwork.
                </p>
            </div>

            <!-- Art Education -->
            <div class="act-grid">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1452860606245-08befc0ff44b?w=700&q=80"
                        alt="Art Education"></div>
                <div class="act-text">
                    <div class="label">Art Education</div>
                    <h2 class="sec-title" style="font-size:28px">Expressing Imagination Through Art</h2>
                    <p class="sec-body">Students actively participate in various creative programs that help them
                        express their imagination and artistic abilities.</p>
                    <div class="subhead">Activities</div>
                    <div class="ftags">
                        <span class="ftag">Drawing</span>
                        <span class="ftag">Painting</span>
                        <span class="ftag">Sketching</span>
                        <span class="ftag">Craft Activities</span>
                        <span class="ftag">Music</span>
                        <span class="ftag">Dance</span>
                        <span class="ftag">Theatre & Drama</span>
                        <span class="ftag">Cultural Activities</span>
                        <span class="ftag">Local Arts & Crafts</span>
                    </div>
                </div>
            </div>

            <div style="height:64px"></div>

            <!-- Dance Program -->
            <div class="act-grid rev">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1516589178581-6cd7833ae3b2?w=700&q=80"
                        alt="Dance Program"></div>
                <div class="act-text">
                    <div class="label">Dance Program</div>
                    <h2 class="sec-title" style="font-size:28px">A Vital Part of Cultural Life</h2>
                    <p class="sec-body">Dance is an integral part of the school's cultural and creative development
                        program. Students participate in various dance forms, competitions, annual functions, and
                        cultural celebrations throughout the year.</p>
                    <div class="subhead">Features</div>
                    <div class="ftags">
                        <span class="ftag">Classical Dance</span>
                        <span class="ftag">Folk Dance</span>
                        <span class="ftag">Group Dance</span>
                        <span class="ftag">Cultural Performances</span>
                        <span class="ftag">Annual Day Performances</span>
                        <span class="ftag">Competition Participation</span>
                    </div>
                </div>
            </div>

            <div style="height:64px"></div>

            <!-- Music & Performing Arts -->
            <div class="act-grid">
                <div class="act-img"><img
                        src="://images.unsplash.com/photo-15196https83384663-c9b34271669c?w=700&q=80"
                        alt="Music & Performing Arts"></div>
                <div class="act-text">
                    <div class="label">Music & Performing Arts</div>
                    <h2 class="sec-title" style="font-size:28px">Confidence Through Performance</h2>
                    <p class="sec-body">Students are encouraged to participate in musical and stage activities that
                        develop confidence, expression, and creativity.</p>
                    <div class="subhead">Programs</div>
                    <div class="ftags">
                        <span class="ftag">Vocal Music</span>
                        <span class="ftag">Group Singing</span>
                        <span class="ftag">Cultural Songs</span>
                        <span class="ftag">School Choir</span>
                        <span class="ftag">Stage Performances</span>
                    </div>
                    <div class="subhead">Outcomes</div>
                    <div class="ftags">
                        <span class="ftag">Confidence Building</span>
                        <span class="ftag">Creativity</span>
                        <span class="ftag">Team Coordination</span>
                        <span class="ftag">Public Performance Skills</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5. DEBATE & PUBLIC SPEAKING -->
    <section class="sec" id="debate">
        <div class="wrap">
            <div class="act-grid rev">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1589829545856-d10d557cf95f?w=700&q=80"
                        alt="Debate & Public Speaking"></div>
                <div class="act-text">
                    <div class="label">Debate & Public Speaking</div>
                    <h2 class="sec-title" style="font-size:28px">Sharpening Voice, Logic & Confidence</h2>
                    <p class="sec-body">Debate competitions are organized throughout the academic year to strengthen
                        communication skills, critical thinking, confidence, and decision-making abilities.</p>
                    <div class="subhead">Activities</div>
                    <div class="ftags">
                        <span class="ftag">Debates</span>
                        <span class="ftag">Extempore</span>
                        <span class="ftag">Speech Competitions</span>
                        <span class="ftag">Elocution</span>
                        <span class="ftag">Anchoring Activities</span>
                        <span class="ftag">Group Discussions</span>
                    </div>
                    <div class="subhead">Skills Developed</div>
                    <div class="ftags">
                        <span class="ftag">Public Speaking</span>
                        <span class="ftag">Logical Thinking</span>
                        <span class="ftag">Communication</span>
                        <span class="ftag">Leadership</span>
                        <span class="ftag">Confidence</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6, 7, 8. SPORTS, YOGA, HEALTH -->
    <section class="sec sec-gold" id="sports">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Sports & Physical Education</div>
                <h2 class="sec-title">Fit, Disciplined, Team-Oriented Students</h2>
                <p class="sec-body">The sports program focuses on developing physically fit, disciplined, confident, and
                    team-oriented students.</p>
            </div>
            <div class="ftags c" style="margin-bottom:36px">
                <span class="ftag">Physical Fitness</span>
                <span class="ftag">Teamwork</span>
                <span class="ftag">Leadership</span>
                <span class="ftag">Sportsmanship</span>
                <span class="ftag">Decision Making</span>
                <span class="ftag">Self Confidence</span>
                <span class="ftag">Discipline</span>
            </div>
            <div class="campus-grid three">
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                        </svg></div>
                    <h4>Indoor Sports</h4>
                    <p>Chess · Carrom · Board Games</p>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M2 12h20M12 2a15 15 0 010 20a15 15 0 010-20" />
                        </svg></div>
                    <h4>Outdoor Sports</h4>
                    <p>Athletics · Cricket · Football · Volleyball · Kabaddi · Kho-Kho</p>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg></div>
                    <h4>Sports Gallery</h4>
                    <p>Sports Day · Athletics Events · Team Competitions</p>
                </div>
            </div>
        </div>
    </section>

    <section class="sec" id="yoga">
        <div class="wrap">
            <div class="act-grid">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1544367567-0f2fcb009e0b?w=700&q=80"
                        alt="Yoga & Wellness"></div>
                <div class="act-text">
                    <div class="label">Yoga & Wellness</div>
                    <h2 class="sec-title" style="font-size:28px">Mind, Body & Balance</h2>
                    <p class="sec-body">Yoga sessions are conducted regularly to improve physical fitness, flexibility,
                        concentration, and mental well-being. Students learn yoga postures, breathing exercises,
                        meditation, and relaxation techniques.</p>
                    <div class="subhead">Programs</div>
                    <div class="ftags">
                        <span class="ftag">Daily Yoga</span>
                        <span class="ftag">Meditation</span>
                        <span class="ftag">Breathing Exercises</span>
                        <span class="ftag">Mindfulness Sessions</span>
                        <span class="ftag">Wellness Activities</span>
                    </div>
                    <div class="subhead">Benefits</div>
                    <div class="ftags">
                        <span class="ftag">Improved Concentration</span>
                        <span class="ftag">Better Health</span>
                        <span class="ftag">Emotional Stability</span>
                        <span class="ftag">Stress Reduction</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="sec sec-alt" id="health">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Health & Physical Education</div>
                <h2 class="sec-title">Promoting Healthy Living</h2>
                <p class="sec-body">The school promotes healthy living through a variety of physical education
                    activities.</p>
            </div>
            <div class="ftags c">
                <span class="ftag">Sports Activities</span>
                <span class="ftag">Yoga</span>
                <span class="ftag">Indigenous Games</span>
                <span class="ftag">Martial Arts</span>
                <span class="ftag">NCC Activities</span>
                <span class="ftag">Fitness Programs</span>
                <span class="ftag">Self Defense Training</span>
                <span class="ftag">Health Awareness Programs</span>
            </div>
        </div>
    </section>

    <!-- 9. LIFE SKILLS & LEADERSHIP -->
    <section class="sec" id="leadership">
        <div class="wrap">
            <div class="act-grid rev">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1529156069898-49953e39b3ac?w=700&q=80"
                        alt="Life Skills & Leadership Development"></div>
                <div class="act-text">
                    <div class="label">Life Skills & Leadership Development</div>
                    <h2 class="sec-title" style="font-size:28px">Preparing Students for Real-World Challenges</h2>
                    <p class="sec-body">Students are encouraged to participate in programs that prepare them for
                        real-world challenges and future leadership roles.</p>
                    <div class="subhead">Programs</div>
                    <div class="ftags">
                        <span class="ftag">Leadership Training</span>
                        <span class="ftag">Team Building Exercises</span>
                        <span class="ftag">Communication Development</span>
                        <span class="ftag">Problem Solving Activities</span>
                        <span class="ftag">Practical Learning Activities</span>
                        <span class="ftag">Community Service</span>
                    </div>
                    <div class="subhead">Skills Developed</div>
                    <div class="ftags">
                        <span class="ftag">Leadership</span>
                        <span class="ftag">Responsibility</span>
                        <span class="ftag">Collaboration</span>
                        <span class="ftag">Critical Thinking</span>
                        <span class="ftag">Decision Making</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10. STUDENT COUNSELING -->
    <section class="sec sec-gold" id="counseling">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Student Counseling & Guidance</div>
                <h2 class="sec-title">Support for Academic, Emotional & Personal Well-being</h2>
                <p class="sec-body">The school provides counseling support to help students achieve academic,
                    emotional, social, and personal well-being.</p>
            </div>
            <div class="campus-grid">
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                        </svg></div>
                    <h4>Academic Guidance</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h4>Emotional Well-being</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                        </svg></div>
                    <h4>Behavioral Development</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v4l3 3" />
                        </svg></div>
                    <h4>Stress Management</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                        </svg></div>
                    <h4>Personality Development</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path
                                d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z" />
                        </svg></div>
                    <h4>Career Awareness</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <polygon
                                points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                        </svg></div>
                    <h4>Goal Setting</h4>
                </div>
                <div class="c-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <polyline points="20 6 9 17 4 12" stroke-width="3" />
                        </svg></div>
                    <h4>Increased Confidence</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 11. GREEN INITIATIVE -->
    <section class="sec" id="green">
        <div class="wrap">
            <div class="act-grid">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=700&q=80"
                        alt="Green Initiative Program"></div>
                <div class="act-text">
                    <div class="label">Green Initiative Program</div>
                    <h2 class="sec-title" style="font-size:28px">Growing an Environmentally Aware Generation</h2>
                    <p class="sec-body">Environmental awareness is a key component of student development at Nalanda
                        School.</p>
                    <div class="subhead">Activities</div>
                    <div class="ftags">
                        <span class="ftag">Tree Plantation Drives</span>
                        <span class="ftag">Environmental Awareness Campaigns</span>
                        <span class="ftag">Water Conservation Awareness</span>
                        <span class="ftag">Eco-Friendly Practices</span>
                        <span class="ftag">Campus Greenery Maintenance</span>
                    </div>
                    <div class="subhead">Student Participation</div>
                    <div class="ftags">
                        <span class="ftag">Eco Club Activities</span>
                        <span class="ftag">Awareness Rallies</span>
                        <span class="ftag">Plantation Events</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 12. EDUCATIONAL TOURS -->
    <section class="sec sec-alt" id="tours">
        <div class="wrap">
            <div class="act-grid rev">
                <div class="act-img"><img
                        src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=700&q=80"
                        alt="Educational Tours"></div>
                <div class="act-text">
                    <div class="label">Educational Tours</div>
                    <h2 class="sec-title" style="font-size:28px">Learning Beyond the Classroom Walls</h2>
                    <p class="sec-body">Educational tours provide experiential learning opportunities beyond the
                        classroom environment.</p>
                    <div class="subhead">Tour Categories</div>
                    <div class="ftags">
                        <span class="ftag">Historical Sites</span>
                        <span class="ftag">Scientific Institutions</span>
                        <span class="ftag">Cultural Heritage Locations</span>
                        <span class="ftag">Educational Centers</span>
                        <span class="ftag">Public Institutions</span>
                    </div>
                    <div class="subhead">Learning Outcomes</div>
                    <div class="ftags">
                        <span class="ftag">Practical Exposure</span>
                        <span class="ftag">Real World Understanding</span>
                        <span class="ftag">Cultural Awareness</span>
                        <span class="ftag">Research Skills</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 13. CULTURAL PROGRAMS -->
    <section class="sec" id="cultural">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Cultural Programs</div>
                <h2 class="sec-title">Celebrations That Build Confidence & Culture</h2>
                <p class="sec-body">The school regularly organizes cultural celebrations that promote creativity,
                    teamwork, confidence, and cultural awareness.</p>
            </div>
            <div class="events-grid">
                <div class="ev-card">
                    <div class="ev-top" style="background:var(--red)"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:var(--red)">Major Celebration</div>
                        <h4>Annual Day</h4>
                        <p>A showcase of the year's finest student talent across every discipline.</p>
                    </div>
                </div>
                <div class="ev-card">
                    <div class="ev-top" style="background:var(--green)"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:var(--green)">Major Celebration</div>
                        <h4>Children's Day</h4>
                        <p>A joyful day dedicated to celebrating every child's spirit and creativity.</p>
                    </div>
                </div>
                <div class="ev-card">
                    <div class="ev-top" style="background:var(--gold)"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:#f57f17">Major Celebration</div>
                        <h4>Grandparents Day</h4>
                        <p>Honouring family bonds and the wisdom of the elder generation.</p>
                    </div>
                </div>
                <div class="ev-card">
                    <div class="ev-top" style="background:#0b6e72"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:#0b6e72">Major Celebration</div>
                        <h4>Independence Day</h4>
                        <p>Patriotic performances and programs celebrating the nation's freedom.</p>
                    </div>
                </div>
                <div class="ev-card">
                    <div class="ev-top" style="background:#9b3080"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:#9b3080">Major Celebration</div>
                        <h4>Republic Day</h4>
                        <p>Commemorating the Constitution with flag hoisting and cultural events.</p>
                    </div>
                </div>
                <div class="ev-card">
                    <div class="ev-top" style="background:var(--red)"></div>
                    <div class="ev-body">
                        <div class="ev-cat" style="color:var(--red)">Major Celebration</div>
                        <h4>Cultural Festivals & Talent Competitions</h4>
                        <p>Festivals and competitions that celebrate India's rich heritage and student talent.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 14. STUDENT ACHIEVEMENTS -->
    <section class="sec sec-gold" id="achievements">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Student Achievements</div>
                <h2 class="sec-title">Celebrating Excellence in Every Field</h2>
            </div>
            <div class="ach-grid">
                <div class="ach-card">
                    <div class="ach-ico">🎓</div>
                    <h4>Academic Achievements</h4>
                </div>
                <div class="ach-card">
                    <div class="ach-ico">🏆</div>
                    <h4>Sports Achievements</h4>
                </div>
                <div class="ach-card">
                    <div class="ach-ico">🎭</div>
                    <h4>Cultural Achievements</h4>
                </div>
                <div class="ach-card">
                    <div class="ach-ico">🥇</div>
                    <h4>Competition Winners</h4>
                </div>
                <div class="ach-card">
                    <div class="ach-ico">📜</div>
                    <h4>Certificates & Awards</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 15. PHOTO & VIDEO GALLERY -->
    <section class="sec" id="gallery">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Photo & Video Gallery</div>
                <h2 class="sec-title">Moments from Student Life</h2>
                <p class="sec-body">Glimpses of our students in action — on the field, on stage, and everywhere in
                    between.</p>
            </div>
            <div class="gallery-grid">
                <div class="gtile"><img src="https://images.unsplash.com/photo-1461896836934-ffe607ba8211?w=500&q=80"
                        alt="Sports Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">SPORTS GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?w=500&q=80"
                        alt="Dance Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">DANCE GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1506126613408-eca07ce68773?w=500&q=80"
                        alt="Yoga Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">YOGA GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1513364776144-60967b0f800f?w=500&q=80"
                        alt="Art & Craft Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">ART & CRAFT GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?w=500&q=80"
                        alt="Educational Tour Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">EDUCATIONAL TOUR GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1609220136736-443140cffec6?w=500&q=80"
                        alt="Cultural Event Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">CULTURAL EVENT GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1542601906990-b4d3fb778b09?w=500&q=80"
                        alt="Green Initiative Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">GREEN INITIATIVE GALLERY</span></div>
                </div>
                <div class="gtile"><img src="https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?w=500&q=80"
                        alt="Annual Day Gallery">
                    <div class="gtile-overlay"><span class="gtile-label">CULTURAL PROGRAMS</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section" id="admissions">
        <div class="wrap">
            <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Join Nalanda</div>
            <h2>Give Your Child a Life Beyond the Classroom</h2>
            <p>From sports fields to stages to yoga mats — Nalanda gives every student a space to grow, express, and
                lead.</p>
            <div class="cta-btns">
                <a href="Admissions.html" class="btn btn-green btn-lg">Apply Now — 2026–27</a>
                <a href="Contactus.html#contact" class="btn btn-gold btn-lg">Contact Admission Team</a>
            </div>
        </div>
    </section>

<style>
 /* ═══════════════════════════════
           RESPONSIVE
        ═══════════════════════════════ */
        @media (max-width: 1200px) {
            .why-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .campus-grid {
                grid-template-columns: repeat(3, 1fr);
            }

            .ach-grid {
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

            .why-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .campus-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .campus-grid.three {
                grid-template-columns: repeat(2, 1fr);
            }

            .events-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .ach-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .act-grid {
                grid-template-columns: 1fr;
                gap: 32px;
            }

            .act-grid.rev .act-img {
                order: 0;
            }

            .footer-grid {
                grid-template-columns: 1fr 1fr;
                gap: 28px;
            }

            .sec {
                padding: 64px 0;
            }

            .jumpnav {
                justify-content: flex-start;
                overflow-x: auto;
                top: 0;
                -webkit-overflow-scrolling: touch;
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

            .why-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .campus-grid,
            .campus-grid.three {
                grid-template-columns: repeat(2, 1fr);
            }

            .events-grid {
                grid-template-columns: 1fr;
            }

            .gallery-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .ach-grid {
                grid-template-columns: repeat(2, 1fr);
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 24px;
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
            .why-grid {
                grid-template-columns: 1fr 1fr;
            }

            .campus-grid,
            .campus-grid.three {
                grid-template-columns: 1fr 1fr;
            }

            .gallery-grid {
                grid-template-columns: 1fr 1fr;
            }

            .ach-grid {
                grid-template-columns: 1fr 1fr;
            }

            .hero-inner-page h1 {
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

            .hero-btns {
                flex-direction: column;
                align-items: center;
            }

            .hero-btns .btn {
                width: 100%;
                max-width: 280px;
                justify-content: center;
            }

            .topbar-left span:nth-child(2),
            .topbar-left span:nth-child(3),
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


<>

        // ── Sticky nav shadow ──
        const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));

        // ── Hamburger / Mobile menu ──
        const hamBtn = document.getElementById('ham-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const mobileOverlay = document.getElementById('mobile-overlay');
        const drawerClose = document.getElementById('drawer-close');

        function openMobileMenu() {
            hamBtn.classList.add('open');
            mobileMenu.classList.add('open');
            hamBtn.setAttribute('aria-expanded', 'true');
            mobileMenu.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';
        }

        function closeMobileMenu() {
            hamBtn.classList.remove('open');
            mobileMenu.classList.remove('open');
            hamBtn.setAttribute('aria-expanded', 'false');
            mobileMenu.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
        }

        hamBtn.addEventListener('click', () => {
            mobileMenu.classList.contains('open') ? closeMobileMenu() : openMobileMenu();
        });

        mobileOverlay.addEventListener('click', closeMobileMenu);
        drawerClose.addEventListener('click', closeMobileMenu);

        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape') closeMobileMenu();
        });

        // ── Scroll fade-in animation ──
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: .08, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.why-card,.c-card,.ev-card,.gtile,.ach-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity .45s ease, transform .45s ease';
            observer.observe(el);
        });
</script>
@endsection
