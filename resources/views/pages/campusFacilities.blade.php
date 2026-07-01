@extends('layouts.app')

@section('title', 'Campus & Facilities')

@section('content')

<style>
/* ─── PAGE HERO ─── */
        .page-hero {
            background: linear-gradient(140deg, var(--gold-lt) 0%, var(--green-lt) 55%, #f1f8f1 100%);
            padding: 64px 0 56px;
            position: relative;
            overflow: hidden;
            text-align: center
        }

        .page-hero-rays {
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

        .breadcrumb {
            display: inline-flex;
            align-items: center;
            gap: 7px;
            font-size: 12.5px;
            color: var(--muted);
            font-weight: 500;
            margin-bottom: 18px
        }

        .breadcrumb a {
            color: var(--green)
        }

        .breadcrumb a:hover {
            color: var(--red)
        }

        .page-hero h1 {
            font-family: var(--serif);
            font-size: clamp(32px, 4.5vw, 54px);
            color: var(--ink);
            line-height: 1.1;
            margin-bottom: 14px
        }

        .page-hero h1 em {
            font-style: italic;
            color: var(--green)
        }

        .page-hero p {
            font-size: 15.5px;
            color: var(--muted);
            max-width: 600px;
            margin: 0 auto;
            line-height: 1.8
        }

        /* ─── SUB-NAV (jump links) ─── */
        .subnav {
            background: var(--white);
            border-bottom: 1.5px solid var(--border);
            position: sticky;
            top: 70px;
            z-index: 150;
            overflow-x: auto;
            scrollbar-width: none
        }

        .subnav::-webkit-scrollbar {
            display: none
        }

        .subnav-inner {
            display: flex;
            gap: 4px;
            padding: 12px 24px;
            white-space: nowrap;
            width: max-content;
            margin: 0 auto
        }

        .subnav-inner a {
            font-size: 12.5px;
            font-weight: 600;
            color: var(--muted);
            padding: 8px 14px;
            border-radius: 20px;
            border: 1.5px solid var(--border);
            transition: all .2s
        }

        .subnav-inner a:hover {
            background: var(--green-lt);
            border-color: var(--green-mid);
            color: var(--green)
        }

        /* ─── SECTION COMMON ─── */
        .sec {
            padding: 80px 0
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
            font-size: clamp(24px, 3vw, 38px);
            line-height: 1.15;
            color: var(--ink);
            letter-spacing: -.2px;
            margin-bottom: 12px
        }

        .sec-body {
            font-size: 15.5px;
            color: var(--muted);
            max-width: 600px;
            line-height: 1.78
        }

        .sec-head {
            margin-bottom: 44px
        }

        .sec-head.c {
            text-align: center
        }

        .sec-head.c .sec-body {
            margin: 0 auto
        }

        /* ─── STAT GRID ─── */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px
        }

        .stat-tile {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 22px 16px;
            text-align: center;
            transition: all .25s
        }

        .stat-tile:hover {
            border-color: var(--green-mid);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .stat-tile .v {
            font-family: var(--serif);
            font-size: 22px;
            color: var(--green);
            line-height: 1.2
        }

        .stat-tile .l {
            font-size: 11.5px;
            color: var(--muted);
            margin-top: 6px;
            text-transform: uppercase;
            letter-spacing: .4px
        }

        /* ─── HIGHLIGHT CARDS ─── */
        .hl-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px
        }

        .hl-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            display: flex;
            align-items: center;
            gap: 14px;
            transition: all .25s
        }

        .hl-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .hl-icon {
            width: 46px;
            height: 46px;
            background: var(--green-lt);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0
        }

        .hl-icon svg {
            width: 22px;
            height: 22px;
            stroke: var(--green);
            fill: none;
            stroke-width: 1.8
        }

        .hl-card h4 {
            font-size: 14px;
            font-weight: 600;
            color: var(--ink)
        }

        /* ─── FEATURE PILLS ─── */
        .feat-pills {
            display: flex;
            flex-wrap: wrap;
            gap: 9px
        }

        .feat-pill {
            display: flex;
            align-items: center;
            gap: 7px;
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 8px 16px;
            font-size: 13px;
            font-weight: 500;
            color: var(--ink2);
            transition: all .2s
        }

        .feat-pill:hover {
            background: var(--green-lt);
            border-color: var(--green-mid)
        }

        .feat-pill .pdot {
            width: 6px;
            height: 6px;
            background: var(--green);
            border-radius: 50%;
            flex-shrink: 0
        }

        /* ─── INFO SPLIT (image-style left, text right) ─── */
        .info-split {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 56px;
            align-items: center
        }

        .info-split.rev {
            direction: rtl
        }

        .info-split.rev>* {
            direction: ltr
        }

        .info-visual {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 36px;
            display: flex;
            flex-direction: column;
            gap: 16px
        }

        .info-visual .iv-icon {
            width: 56px;
            height: 56px;
            background: var(--green-lt);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center
        }

        .info-visual .iv-icon svg {
            width: 28px;
            height: 28px;
            stroke: var(--green);
            fill: none;
            stroke-width: 1.6
        }

        .info-visual h3 {
            font-family: var(--serif);
            font-size: 22px;
            color: var(--ink)
        }

        .info-dims {
            display: flex;
            gap: 24px;
            margin-top: 6px
        }

        .info-dims div .dv {
            font-family: var(--serif);
            font-size: 20px;
            color: var(--green)
        }

        .info-dims div .dl {
            font-size: 10.5px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-top: 2px
        }

        .about-text p {
            color: var(--muted);
            margin-bottom: 14px;
            line-height: 1.8
        }

        /* ─── LAB CARDS ─── */
        .lab-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        .lab-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            overflow: hidden;
            transition: all .28s
        }

        .lab-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 14px 32px rgba(46, 125, 50, .12);
            border-color: var(--green)
        }

        .lab-top {
            background: var(--green-lt);
            padding: 26px 24px 20px;
            border-bottom: 1.5px solid var(--border)
        }

        .lab-card.gold .lab-top {
            background: var(--gold-lt)
        }

        .lab-ico {
            width: 48px;
            height: 48px;
            background: var(--white);
            border: 1.5px solid var(--green-mid);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px
        }

        .lab-card.gold .lab-ico {
            border-color: var(--gold-mid)
        }

        .lab-ico svg {
            width: 22px;
            height: 22px;
            stroke: var(--green);
            fill: none;
            stroke-width: 1.8
        }

        .lab-card.gold .lab-ico svg {
            stroke: #f57f17
        }

        .lab-top h3 {
            font-family: var(--serif);
            font-size: 19px;
            color: var(--ink)
        }

        .lab-dims {
            display: flex;
            gap: 18px;
            margin-top: 10px
        }

        .lab-dims div .dv {
            font-size: 14px;
            font-weight: 700;
            color: var(--green)
        }

        .lab-card.gold .lab-dims div .dv {
            color: #f57f17
        }

        .lab-dims div .dl {
            font-size: 10px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .3px
        }

        .lab-body {
            padding: 18px 24px 24px
        }

        .lab-feat {
            display: flex;
            align-items: flex-start;
            gap: 8px;
            font-size: 13px;
            color: var(--ink2);
            margin-bottom: 9px
        }

        .lab-feat:last-child {
            margin-bottom: 0
        }

        .lab-feat .fc-dot {
            width: 16px;
            height: 16px;
            background: var(--green-lt);
            border-radius: 5px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            margin-top: 1px
        }

        .lab-feat .fc-dot svg {
            width: 9px;
            height: 9px;
            stroke: var(--green)
        }

        /* ─── LIBRARY STATS TABLE ─── */
        .lib-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden
        }

        .lib-row {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 15px 22px;
            border-bottom: 1px solid var(--green-lt);
            font-size: 14px
        }

        .lib-row:last-child {
            border-bottom: none;
            background: var(--green-lt);
            font-weight: 700;
            color: var(--green)
        }

        .lib-row .lc {
            color: var(--ink2);
            font-weight: 500
        }

        .lib-row:last-child .lc {
            color: var(--green)
        }

        .lib-row .lv {
            font-family: var(--serif);
            font-size: 16px;
            color: var(--green);
            font-weight: 600
        }

        .lib-row:last-child .lv {
            font-size: 18px
        }

        .press-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px
        }

        .press-box {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 22px
        }

        .press-box h4 {
            font-size: 13px;
            font-weight: 700;
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-bottom: 12px
        }

        .press-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 8px
        }

        .press-tag {
            background: var(--green-lt);
            border: 1px solid var(--border);
            border-radius: 20px;
            padding: 5px 13px;
            font-size: 12.5px;
            color: var(--ink2);
            font-weight: 500
        }

        /* ─── SUPPORT FACILITY CARDS ─── */
        .sup-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px
        }

        .sup-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            transition: all .25s
        }

        .sup-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .sup-card .ci {
            width: 42px;
            height: 42px;
            background: var(--gold-lt);
            border: 1.5px solid #ffe082;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px
        }

        .sup-card .ci svg {
            width: 20px;
            height: 20px;
            stroke: var(--gold);
            fill: none;
            stroke-width: 1.8
        }

        .sup-card h4 {
            font-size: 14.5px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 6px
        }

        .sup-dims {
            display: flex;
            gap: 14px;
            margin: 10px 0
        }

        .sup-dims span {
            font-size: 11.5px;
            color: var(--muted);
            background: var(--green-lt);
            border-radius: 6px;
            padding: 3px 9px
        }

        .sup-card p {
            font-size: 12.5px;
            color: var(--muted);
            line-height: 1.6
        }

        /* ─── PLAYGROUND BANNER ─── */
        .play-banner {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 40px;
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 36px;
            align-items: center
        }

        .play-banner .pb-stat {
            font-family: var(--serif);
            font-size: 40px;
            color: var(--green)
        }

        .play-banner .pb-label {
            font-size: 12px;
            color: var(--muted);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-top: 4px
        }

        /* ─── SAFETY GRID ─── */
        .safe-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 14px
        }

        .safe-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 22px;
            text-align: center;
            transition: all .25s
        }

        .safe-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .safe-card .wi {
            width: 46px;
            height: 46px;
            background: var(--green-lt);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px
        }

        .safe-card .wi svg {
            width: 21px;
            height: 21px;
            stroke: var(--green);
            fill: none;
            stroke-width: 1.8
        }

        .safe-card h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink)
        }

        .safe-stat-row {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 18px
        }

        /* ─── AMENITIES ─── */
        .amen-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px
        }

        .amen-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 24px;
            transition: all .25s
        }

        .amen-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .amen-card h4 {
            font-size: 15px;
            font-weight: 600;
            color: var(--ink)
        }

        .amen-card .av {
            font-family: var(--serif);
            font-size: 20px;
            color: var(--green);
            margin-top: 8px
        }

        /* ─── VIRTUAL TOUR ─── */
        .tour-box {
            background: linear-gradient(135deg, var(--gold-lt) 0%, #fffef5 50%, var(--green-lt) 100%);
            border: 2px solid var(--border);
            border-radius: 22px;
            padding: 56px 32px;
            text-align: center
        }

        .tour-play {
            width: 76px;
            height: 76px;
            background: var(--green);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 22px;
            cursor: pointer;
            transition: all .25s;
            box-shadow: 0 10px 28px rgba(46, 125, 50, .3)
        }

        .tour-play:hover {
            transform: scale(1.08);
            background: #1b5e20
        }

        .tour-play svg {
            width: 28px;
            height: 28px;
            fill: #fff;
            margin-left: 4px
        }

        .tour-box h3 {
            font-family: var(--serif);
            font-size: 26px;
            color: var(--ink);
            margin-bottom: 10px
        }

        .tour-box p {
            font-size: 14.5px;
            color: var(--muted);
            max-width: 460px;
            margin: 0 auto 26px
        }

        /* ─── CTA ─── */
        .cta-section {
            background: linear-gradient(135deg, var(--gold-lt) 0%, #fffef5 50%, var(--green-lt) 100%);
            border-top: 2px solid var(--border);
            border-bottom: 2px solid var(--border);
            padding: 70px 0;
            text-align: center
        }

        .cta-section h2 {
            font-family: var(--serif);
            font-size: clamp(24px, 3.2vw, 40px);
            color: var(--ink);
            margin-bottom: 12px
        }

        .cta-section p {
            font-size: 15.5px;
            color: var(--muted);
            max-width: 480px;
            margin: 0 auto 28px
        }

        .cta-btns {
            display: flex;
            gap: 14px;
            justify-content: center;
            flex-wrap: wrap
        }
</style>

{{-- comment added --}}

 <!-- PAGE HERO -->
    <section class="page-hero">
        <div class="page-hero-rays"></div>
        <div class="wrap">
            <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; Campus & Facilities</div>
            <h1>Campus &amp; <em>Infrastructure</em></h1>
            <p>Providing a modern, safe and student-friendly learning environment, planned to support academic
                excellence, innovation and holistic development.</p>
        </div>
    </section>

    <!-- SUB NAV -->
    <div class="subnav">
        <div class="subnav-inner">
            <a href="#overview">Campus Overview</a>
            <a href="#smartclass">Smart Classrooms</a>
            <a href="#academic-infra">Academic Infrastructure</a>
            <a href="#labs">Laboratories</a>
            <a href="#library">Library</a>
            <a href="#support">Student Support</a>
            <a href="#sports">Sports Infrastructure</a>
            <a href="#health-safety">Health &amp; Safety</a>
            <a href="#amenities">Campus Amenities</a>
            <a href="#tour">Virtual Tour</a>
        </div>
    </div>

    <!-- 1 : CAMPUS OVERVIEW -->
    <section class="sec" id="overview">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Campus Overview</div>
                <h2 class="sec-title">About Our Campus</h2>
                <p class="sec-body">Nalanda Higher Secondary School provides a modern campus designed to support
                    academic excellence, innovation and holistic development. The infrastructure is planned to create
                    an engaging and safe learning environment for students.</p>
            </div>

            <div class="stat-grid" style="margin-bottom:48px">
                <div class="stat-tile">
                    <div class="v">8,075 m²</div>
                    <div class="l">Total Campus Area</div>
                </div>
                <div class="stat-tile">
                    <div class="v">2,877.2 m²</div>
                    <div class="l">Built-up Area</div>
                </div>
                <div class="stat-tile">
                    <div class="v">6,636.6 m²</div>
                    <div class="l">Playground Area</div>
                </div>
                <div class="stat-tile">
                    <div class="v">08</div>
                    <div class="l">Drinking Water Points</div>
                </div>
                <div class="stat-tile">
                    <div class="v">04 + 08</div>
                    <div class="l">Boys Toilets + Urinals</div>
                </div>
                <div class="stat-tile">
                    <div class="v">08</div>
                    <div class="l">Girls Toilets</div>
                </div>
                <div class="stat-tile">
                    <div class="v">02</div>
                    <div class="l">Disabled-Friendly Toilets</div>
                </div>
                <div class="stat-tile">
                    <div class="v">03</div>
                    <div class="l">Staff Toilets</div>
                </div>
            </div>

            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Highlights</div>
                <h2 class="sec-title" style="font-size:clamp(22px,2.6vw,32px)">Campus Highlights</h2>
            </div>
            <div class="hl-grid">
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <rect x="2" y="2" width="20" height="20" rx="2" />
                            <path d="M7 12h10M12 7v10" />
                        </svg></div>
                    <h4>Smart Classrooms</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <path
                                d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                        </svg></div>
                    <h4>Science Laboratories</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <path d="M8 21h8M12 17v4" />
                        </svg></div>
                    <h4>Computer Laboratory</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                            <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                        </svg></div>
                    <h4>Library</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="6" />
                            <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                        </svg></div>
                    <h4>Sports Facilities</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                        </svg></div>
                    <h4>Activity Rooms</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h4>Counseling Room</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg></div>
                    <h4>Medical Room</h4>
                </div>
                <div class="hl-card">
                    <div class="hl-icon"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v4l3 3" />
                        </svg></div>
                    <h4>Safe Campus Environment</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 2 : SMART CLASSROOMS -->
    <section class="sec sec-alt" id="smartclass">
        <div class="wrap">
            <div class="info-split">
                <div>
                    <div class="label">Smart Learning Environment</div>
                    <h2 class="sec-title">Smart Classrooms</h2>
                    <div class="about-text">
                        <p>Our Smart Classes bring multimedia-based learning to every subject, replacing rote
                            memorisation with rich visual experiences that make difficult concepts easier to grasp.
                            Interactive teaching tools encourage students to participate actively, ask questions, and
                            engage with lessons in real time.</p>
                        <p>For teachers, Smart Classes mean access to ready digital content, simulations and visual aids
                            that bring textbook chapters to life — improving classroom engagement and helping every
                            learner understand concepts more deeply, regardless of their individual learning pace.</p>
                    </div>
                    <div class="feat-pills">
                        <div class="feat-pill"><span class="pdot"></span>Interactive Learning</div>
                        <div class="feat-pill"><span class="pdot"></span>Audio Visual Content</div>
                        <div class="feat-pill"><span class="pdot"></span>Digital Teaching Tools</div>
                        <div class="feat-pill"><span class="pdot"></span>Concept Visualization</div>
                        <div class="feat-pill"><span class="pdot"></span>Enhanced Participation</div>
                        <div class="feat-pill"><span class="pdot"></span>Better Learning Outcomes</div>
                    </div>
                </div>
                <div class="info-visual">
                    <div class="iv-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--green)" stroke-width="1.6">
                            <rect x="2" y="3" width="20" height="14" rx="2" />
                            <path d="M8 21h8M12 17v4" />
                        </svg></div>
                    <h3>Digital-First Classrooms</h3>
                    <p style="color:var(--muted);font-size:14px;line-height:1.7">Every smart classroom integrates
                        multimedia content directly into daily teaching — turning passive listening into active,
                        visual, and collaborative learning.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 : ACADEMIC INFRASTRUCTURE -->
    <section class="sec" id="academic-infra">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Academic Infrastructure</div>
                <h2 class="sec-title">Spacious, Purpose-Built Classrooms</h2>
                <p class="sec-body">Our infrastructure supports effective academic learning through spacious
                    classrooms and specialised learning spaces.</p>
            </div>
            <div class="stat-grid" style="grid-template-columns:repeat(3,1fr);max-width:680px;margin:0 auto 40px">
                <div class="stat-tile">
                    <div class="v">10</div>
                    <div class="l">Total Classrooms</div>
                </div>
                <div class="stat-tile">
                    <div class="v">25×20 ft</div>
                    <div class="l">Classroom Size</div>
                </div>
                <div class="stat-tile">
                    <div class="v">500 sq.ft</div>
                    <div class="l">Area Each</div>
                </div>
            </div>
            <div class="feat-pills" style="justify-content:center">
                <div class="feat-pill"><span class="pdot"></span>Well Ventilated</div>
                <div class="feat-pill"><span class="pdot"></span>Natural Lighting</div>
                <div class="feat-pill"><span class="pdot"></span>Comfortable Seating</div>
                <div class="feat-pill"><span class="pdot"></span>Student-Friendly Layout</div>
                <div class="feat-pill"><span class="pdot"></span>Activity Based Learning</div>
                <div class="feat-pill"><span class="pdot"></span>Collaborative Learning</div>
                <div class="feat-pill"><span class="pdot"></span>Student-Centered Learning</div>
                <div class="feat-pill"><span class="pdot"></span>Technology Integration</div>
            </div>
        </div>
    </section>

    <!-- 4 : LABORATORIES -->
    <section class="sec sec-gold" id="labs">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Learning Through Practical
                    Experience</div>
                <h2 class="sec-title">Laboratories</h2>
                <p class="sec-body">Our laboratories provide students with practical exposure and scientific
                    experimentation opportunities across every discipline.</p>
            </div>
            <div class="lab-grid">
                <div class="lab-card">
                    <div class="lab-top">
                        <div class="lab-ico"><svg viewBox="0 0 24 24" fill="none" stroke="var(--green)"
                                stroke-width="1.8">
                                <path
                                    d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                            </svg></div>
                        <h3>Physics Laboratory</h3>
                        <div class="lab-dims">
                            <div>
                                <div class="dv">38 × 20 ft</div>
                                <div class="dl">Size</div>
                            </div>
                            <div>
                                <div class="dv">760 sq.ft</div>
                                <div class="dl">Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-body">
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Modern apparatus</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>CBSE practical setup</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Experiment stations</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Scientific observation tools</div>
                    </div>
                </div>
                <div class="lab-card">
                    <div class="lab-top">
                        <div class="lab-ico"><svg viewBox="0 0 24 24" fill="none" stroke="var(--green)"
                                stroke-width="1.8">
                                <path
                                    d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z" />
                                <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                            </svg></div>
                        <h3>Chemistry Laboratory</h3>
                        <div class="lab-dims">
                            <div>
                                <div class="dv">38 × 20 ft</div>
                                <div class="dl">Size</div>
                            </div>
                            <div>
                                <div class="dv">760 sq.ft</div>
                                <div class="dl">Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-body">
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Modern apparatus</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Chemicals &amp; equipment</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Individual workstations</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Practical experiments</div>
                    </div>
                </div>
                <div class="lab-card">
                    <div class="lab-top">
                        <div class="lab-ico"><svg viewBox="0 0 24 24" fill="none" stroke="var(--green)"
                                stroke-width="1.8">
                                <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                            </svg></div>
                        <h3>Biology Laboratory</h3>
                        <div class="lab-dims">
                            <div>
                                <div class="dv">38 × 20 ft</div>
                                <div class="dl">Size</div>
                            </div>
                            <div>
                                <div class="dv">760 sq.ft</div>
                                <div class="dl">Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-body">
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Microscopes</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Specimens</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Biological models</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Observation facilities</div>
                    </div>
                </div>
                <div class="lab-card gold">
                    <div class="lab-top">
                        <div class="lab-ico"><svg viewBox="0 0 24 24" fill="none" stroke="#f57f17" stroke-width="1.8">
                                <path d="M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z" />
                            </svg></div>
                        <h3>Mathematics Laboratory</h3>
                        <div class="lab-dims">
                            <div>
                                <div class="dv">25 × 20 ft</div>
                                <div class="dl">Size</div>
                            </div>
                            <div>
                                <div class="dv">500 sq.ft</div>
                                <div class="dl">Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-body">
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Mathematical tools</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Shapes &amp; models</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Games &amp; puzzles</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Concept learning</div>
                    </div>
                </div>
                <div class="lab-card gold">
                    <div class="lab-top">
                        <div class="lab-ico"><svg viewBox="0 0 24 24" fill="none" stroke="#f57f17" stroke-width="1.8">
                                <rect x="2" y="3" width="20" height="14" rx="2" />
                                <path d="M8 21h8M12 17v4" />
                            </svg></div>
                        <h3>Computer Laboratory</h3>
                        <div class="lab-dims">
                            <div>
                                <div class="dv">38 × 20 ft</div>
                                <div class="dl">Size</div>
                            </div>
                            <div>
                                <div class="dv">760 sq.ft</div>
                                <div class="dl">Area</div>
                            </div>
                        </div>
                    </div>
                    <div class="lab-body">
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>35 Computer Systems</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>High Speed Internet</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Educational Software</div>
                        <div class="lab-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none"
                                    stroke-width="3">
                                    <polyline points="20 6 9 17 4 12" />
                                </svg></span>Practical Computer Learning</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5 : LIBRARY -->
    <section class="sec" id="library">
        <div class="wrap">
            <div class="info-split">
                <div>
                    <div class="label">Knowledge Resource Centre</div>
                    <h2 class="sec-title">Library</h2>
                    <div class="about-text">
                        <p>The school maintains a well-equipped library spanning <strong>700 sq.ft (35 × 20 ft)</strong>
                            that supports both academic and personal growth, offering a calm and resourceful space for
                            reading, research, and reference.</p>
                    </div>
                    <div class="lib-table">
                        <div class="lib-row"><span class="lc">Periodical Books</span><span class="lv">71</span></div>
                        <div class="lib-row"><span class="lc">Story Books</span><span class="lv">222</span></div>
                        <div class="lib-row"><span class="lc">Reference Books</span><span class="lv">1,033</span></div>
                        <div class="lib-row"><span class="lc">Fiction Books</span><span class="lv">110</span></div>
                        <div class="lib-row"><span class="lc">Other Books</span><span class="lv">2,577</span></div>
                        <div class="lib-row"><span class="lc">General Books</span><span class="lv">25</span></div>
                        <div class="lib-row"><span class="lc">Total Collection</span><span class="lv">4,044+</span>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="press-grid">
                        <div class="press-box">
                            <h4>Newspapers Available</h4>
                            <div class="press-tags">
                                <span class="press-tag">Times of India</span>
                                <span class="press-tag">Dainik Bhaskar</span>
                                <span class="press-tag">Haribhoomi</span>
                                <span class="press-tag">Patrika</span>
                                <span class="press-tag">Hitavada</span>
                                <span class="press-tag">Nai Duniya</span>
                            </div>
                        </div>
                        <div class="press-box">
                            <h4>Magazines</h4>
                            <div class="press-tags">
                                <span class="press-tag">India Today</span>
                                <span class="press-tag">Careers 360</span>
                                <span class="press-tag">Champak</span>
                                <span class="press-tag">Digital Learning</span>
                                <span class="press-tag">Pratiyogita Darpan</span>
                                <span class="press-tag">Others</span>
                            </div>
                        </div>
                    </div>
                    <div class="info-visual" style="margin-top:14px">
                        <div class="iv-icon"><svg viewBox="0 0 24 24" fill="none" stroke="var(--green)"
                                stroke-width="1.6">
                                <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                                <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                            </svg></div>
                        <h3>A Space to Read &amp; Discover</h3>
                        <p style="color:var(--muted);font-size:14px;line-height:1.7">With over 4,044 titles spanning
                            reference, fiction, and general knowledge, our library nurtures a genuine love of reading
                            in every student.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 6 : STUDENT SUPPORT FACILITIES -->
    <section class="sec sec-alt" id="support">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Beyond Academics</div>
                <h2 class="sec-title">Student Support Facilities</h2>
                <p class="sec-body">Dedicated spaces that support the creative, physical, emotional and administrative
                    needs of every student.</p>
            </div>
            <div class="sup-grid">
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                        </svg></div>
                    <h4>Activities Room</h4>
                    <div class="sup-dims"><span>25 × 20 ft</span><span>500 sq.ft</span></div>
                    <p>Dedicated space for creative and co-curricular activities.</p>
                </div>
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="6" />
                            <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                        </svg></div>
                    <h4>Sports Room</h4>
                    <div class="sup-dims"><span>35 × 20 ft</span><span>700 sq.ft</span></div>
                    <p>Equipment storage and indoor sports training space.</p>
                </div>
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h4>Counseling Room</h4>
                    <div class="sup-dims"><span>20 × 12 ft</span><span>240 sq.ft</span></div>
                    <p>Confidential space for student guidance and counseling.</p>
                </div>
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg></div>
                    <h4>Medical Room</h4>
                    <div class="sup-dims"><span>20 × 12 ft</span><span>240 sq.ft</span></div>
                    <p>Health support and first-aid facility on campus.</p>
                </div>
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <rect x="3" y="3" width="18" height="18" rx="2" />
                            <path d="M9 9h6M9 12h6M9 15h4" />
                        </svg></div>
                    <h4>Resource Room</h4>
                    <div class="sup-dims"><span>35 × 20 ft</span><span>700 sq.ft</span></div>
                    <p>Learning support centre for additional academic resources.</p>
                </div>
                <div class="sup-card">
                    <div class="ci"><svg viewBox="0 0 24 24">
                            <path d="M9 11l3 3L22 4" />
                            <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                        </svg></div>
                    <h4>Examination Department</h4>
                    <div class="sup-dims"><span>25 × 20 ft</span><span>500 sq.ft</span></div>
                    <p>Dedicated department managing examinations and assessments.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 7 : SPORTS INFRASTRUCTURE -->
    <section class="sec" id="sports">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Sports Infrastructure</div>
                <h2 class="sec-title">Playground</h2>
                <p class="sec-body">A large open ground supporting a full range of physical activities and school
                    events.</p>
            </div>
            <div class="play-banner">
                <div style="text-align:center">
                    <div class="pb-stat">6,636.6 m²</div>
                    <div class="pb-label">Total Playground Area</div>
                </div>
                <div class="feat-pills" style="justify-content:center">
                    <div class="feat-pill"><span class="pdot"></span>Outdoor Sports</div>
                    <div class="feat-pill"><span class="pdot"></span>Athletics</div>
                    <div class="feat-pill"><span class="pdot"></span>Physical Education</div>
                    <div class="feat-pill"><span class="pdot"></span>School Events</div>
                    <div class="feat-pill"><span class="pdot"></span>Annual Sports Meet</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 8 : HEALTH & SAFETY -->
    <section class="sec sec-gold" id="health-safety">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Health &amp; Safety</div>
                <h2 class="sec-title">A Safe Campus for Every Child</h2>
                <p class="sec-body">Hygiene, sanitation, and safety measures designed to keep students healthy and
                    secure throughout the school day.</p>
            </div>
            <div class="safe-stat-row">
                <div class="stat-tile">
                    <div class="v">08</div>
                    <div class="l">Drinking Water Points</div>
                </div>
                <div class="stat-tile">
                    <div class="v">04+08</div>
                    <div class="l">Boys Toilets + Urinals</div>
                </div>
                <div class="stat-tile">
                    <div class="v">08</div>
                    <div class="l">Girls Toilets</div>
                </div>
                <div class="stat-tile">
                    <div class="v">02</div>
                    <div class="l">Disabled-Friendly Toilets</div>
                </div>
            </div>
            <div class="safe-grid">
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path
                                d="M12 2.69l5.66 5.66a8 8 0 11-11.31 0z" />
                        </svg></div>
                    <h4>Drinking Water Facilities</h4>
                </div>
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                        </svg></div>
                    <h4>Separate Toilets for Boys &amp; Girls</h4>
                </div>
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 16v-4M12 8h.01" />
                        </svg></div>
                    <h4>Disabled-Friendly Toilets</h4>
                </div>
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                            <polyline points="22 4 12 14.01 9 11.01" />
                        </svg></div>
                    <h4>Medical Support Room</h4>
                </div>
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h4>Hygiene &amp; Sanitation</h4>
                </div>
                <div class="safe-card">
                    <div class="wi"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="12" r="10" />
                            <path d="M12 8v4l3 3" />
                        </svg></div>
                    <h4>Student Safety Measures</h4>
                </div>
            </div>
        </div>
    </section>

    <!-- 9 : CAMPUS AMENITIES -->
    <section class="sec" id="amenities">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Administrative Facilities</div>
                <h2 class="sec-title">Campus Amenities</h2>
                <p class="sec-body">Well-organised administrative spaces supporting the day-to-day functioning of the
                    school.</p>
            </div>
            <div class="amen-grid">
                <div class="amen-card">
                    <h4>Principal Office</h4>
                    <div class="av">500 sq.ft</div>
                </div>
                <div class="amen-card">
                    <h4>Staff Room</h4>
                    <div class="av">700 sq.ft</div>
                </div>
                <div class="amen-card">
                    <h4>Examination Cell</h4>
                    <div class="av">500 sq.ft</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 10 : VIRTUAL CAMPUS TOUR -->
    <section class="sec sec-alt" id="tour">
        <div class="wrap">
            <div class="tour-box">
                <div class="tour-play">
                    <svg viewBox="0 0 24 24">
                        <polygon points="6 4 20 12 6 20 6 4" />
                    </svg>
                </div>
                <h3>Take a Virtual Campus Tour</h3>
                <p>Explore our classrooms, laboratories, library and playground from wherever you are — book a guided
                    visit or browse our infrastructure gallery.</p>
                <div class="cta-btns">
                    <a href="index.html#gallery" class="btn btn-green btn-lg">View Infrastructure Gallery</a>
                    <a href="index.html#contact" class="btn btn-gold btn-lg">Schedule a Campus Visit</a>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA / ADMISSIONS -->
    <section class="cta-section" id="admissions">
        <div class="wrap">
            <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Admissions 2026–27
            </div>
            <h2>Give Your Child the Education They Deserve</h2>
            <p>Join the Nalanda family and watch your child thrive in a nurturing CBSE environment built for tomorrow's
                leaders.</p>
            <div class="cta-btns">
                <a href="index.html#contact" class="btn btn-green btn-lg">Apply Now — 2026–27</a>
                <a href="index.html#contact" class="btn btn-gold btn-lg">Contact Admission Team</a>
            </div>
        </div>
    </section>


<style>
 /* ═══════════════════════════════
           RESPONSIVE
        ═══════════════════════════════ */
        @media (max-width: 1200px) {
            .stat-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .hl-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .lab-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .sup-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .safe-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .safe-stat-row {
                grid-template-columns: repeat(2, 1fr)
            }

            .amen-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .footer-grid {
                grid-template-columns: repeat(2, 1fr)
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

            .info-split {
                grid-template-columns: 1fr;
                gap: 30px
            }

            .info-split.rev {
                direction: ltr
            }

            .press-grid {
                grid-template-columns: 1fr
            }

            .play-banner {
                grid-template-columns: 1fr
            }

            .sec {
                padding: 60px 0;
            }
        }

        @media (max-width: 768px) {
            .wrap {
                padding: 0 16px;
            }

            .stat-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .hl-grid {
                grid-template-columns: 1fr
            }

            .lab-grid {
                grid-template-columns: 1fr
            }

            .sup-grid {
                grid-template-columns: 1fr
            }

            .safe-grid {
                grid-template-columns: 1fr
            }

            .safe-stat-row {
                grid-template-columns: repeat(2, 1fr)
            }

            .amen-grid {
                grid-template-columns: 1fr
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .sec {
                padding: 48px 0;
            }
        }

        @media (max-width: 480px) {
            .stat-grid {
                grid-template-columns: 1fr 1fr
            }

            .safe-stat-row {
                grid-template-columns: 1fr 1fr
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
      const nav = document.getElementById('main-nav');
        window.addEventListener('scroll', () => nav.classList.toggle('scrolled', window.scrollY > 40));

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

        document.querySelectorAll('.mobile-drawer .drawer-links a').forEach(a => {
            a.addEventListener('click', closeMobileMenu);
        });

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: .08, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.stat-tile,.hl-card,.lab-card,.sup-card,.safe-card,.amen-card').forEach(el => {
            el.style.opacity = '0';
            el.style.transform = 'translateY(18px)';
            el.style.transition = 'opacity .45s ease, transform .45s ease';
            observer.observe(el);
        });

</script>
@endsection
