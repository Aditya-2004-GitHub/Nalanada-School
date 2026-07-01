@extends('layouts.app')

@section('title', 'Academics')

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
        margin-bottom: 12px
    }

    .page-hero h1 em {
        font-style: italic;
        color: var(--green)
    }

    .page-hero .ph-sub {
        font-size: 15px;
        font-weight: 600;
        color: var(--green);
        margin-bottom: 16px
    }

    .page-hero p {
        font-size: 15.5px;
        color: var(--muted);
        max-width: 640px;
        margin: 0 auto 28px;
        line-height: 1.8
    }

    .cta-btns {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap
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
        max-width: 620px;
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

    /* ─── OVERVIEW LIST ─── */
    .ov-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 10px 24px
    }

    .ov-item {
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
        color: var(--ink2);
        font-weight: 500;
        padding: 4px 0
    }

    .ov-dot {
        width: 20px;
        height: 20px;
        background: var(--green-lt);
        border: 1.5px solid var(--border);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0
    }

    .ov-dot svg {
        width: 10px;
        height: 10px;
        stroke: var(--green);
        stroke-width: 3
    }

    /* ─── 9 ICON CARDS ─── */
    .vis-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px
    }

    .vis-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 24px 18px;
        text-align: center;
        transition: all .28s
    }

    .vis-card:hover {
        border-color: var(--green);
        transform: translateY(-4px);
        box-shadow: 0 10px 28px rgba(46, 125, 50, .12)
    }

    .vis-card:hover .wi {
        background: var(--green)
    }

    .vis-card:hover .wi svg {
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

    .vis-card h4 {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink)
    }

    /* ─── OBJECTIVES ─── */
    .obj-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 16px
    }

    .obj-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        overflow: hidden;
        transition: all .28s
    }

    .obj-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 12px 28px rgba(46, 125, 50, .1);
        border-color: var(--green)
    }

    .obj-top {
        background: var(--green-lt);
        padding: 18px 22px;
        border-bottom: 1.5px solid var(--border)
    }

    .obj-top h4 {
        font-family: var(--serif);
        font-size: 17px;
        color: var(--ink)
    }

    .obj-body {
        padding: 18px 22px
    }

    .obj-feat {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 13px;
        color: var(--ink2);
        margin-bottom: 9px
    }

    .obj-feat:last-child {
        margin-bottom: 0
    }

    .obj-feat .fc-dot {
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

    .obj-feat .fc-dot svg {
        width: 9px;
        height: 9px;
        stroke: var(--green);
        stroke-width: 3
    }

    /* ─── TABS ─── */
    .tabs-bar {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-bottom: 32px
    }

    .tab-btn {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 11px 20px;
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink2);
        cursor: pointer;
        transition: all .22s;
        font-family: var(--sans)
    }

    .tab-btn:hover {
        border-color: var(--green-mid);
        background: var(--green-lt)
    }

    .tab-btn.active {
        background: var(--green);
        border-color: var(--green);
        color: #fff
    }

    .tab-panel {
        display: none
    }

    .tab-panel.active {
        display: block;
        animation: fadein .35s ease
    }

    @keyframes fadein {
        from {
            opacity: 0;
            transform: translateY(8px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .tab-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 32px;
        max-width: 760px;
        margin: 0 auto
    }

    .tab-card h3 {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--ink);
        margin-bottom: 16px;
        text-align: center
    }

    .tab-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 8px;
        justify-content: center;
        margin-bottom: 18px
    }

    .stream-block {
        margin-top: 18px
    }

    .stream-block h5 {
        font-size: 12px;
        font-weight: 700;
        letter-spacing: .6px;
        text-transform: uppercase;
        color: var(--green);
        margin-bottom: 10px
    }

    .stream-block.commerce h5 {
        color: #f57f17
    }

    /* ─── TIMETABLE ─── */
    .tt-box {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        padding: 36px;
        text-align: center
    }

    .tt-box .tt-icon {
        width: 60px;
        height: 60px;
        background: var(--green-lt);
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 18px
    }

    .tt-box .tt-icon svg {
        width: 28px;
        height: 28px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.6
    }

    .tt-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 8px;
        margin-top: 24px
    }

    .tt-day {
        background: var(--green-lt);
        border: 1px solid var(--border);
        border-radius: 8px;
        padding: 10px 6px;
        font-size: 11.5px;
        font-weight: 600;
        color: var(--green)
    }

    /* ─── LIBRARY ─── */
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

    .info-split {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 56px;
        align-items: center
    }

    .about-text p {
        color: var(--muted);
        margin-bottom: 14px;
        line-height: 1.8
    }

    .lib-rule-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
        margin-top: 18px
    }

    .lib-foot-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px;
        margin-top: 28px
    }

    .lib-foot-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 20px;
        text-align: center
    }

    .lib-foot-card .v {
        font-family: var(--serif);
        font-size: 16px;
        color: var(--green)
    }

    .lib-foot-card .l {
        font-size: 11px;
        color: var(--muted);
        text-transform: uppercase;
        letter-spacing: .4px;
        margin-top: 4px
    }

    /* ─── SCHOLASTIC SUBJECT CARDS ─── */
    .subj-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .subj-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 14px;
        text-align: center;
        transition: all .25s
    }

    .subj-card:hover {
        border-color: var(--gold-mid);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
    }

    .subj-card:hover .ci {
        background: var(--gold);
        border-color: var(--gold)
    }

    .subj-card:hover .ci svg {
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
        margin: 0 auto 12px;
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

    .subj-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink)
    }

    /* ─── CO-SCHOLASTIC ─── */
    .cos-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 18px
    }

    .cos-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        overflow: hidden;
        transition: all .28s
    }

    .cos-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 14px 32px rgba(46, 125, 50, .12);
        border-color: var(--green)
    }

    .cos-top {
        background: var(--green-lt);
        padding: 24px;
        border-bottom: 1.5px solid var(--border);
        display: flex;
        align-items: center;
        gap: 14px
    }

    .cos-card.gold .cos-top {
        background: var(--gold-lt)
    }

    .cos-ico {
        width: 46px;
        height: 46px;
        background: var(--white);
        border: 1.5px solid var(--green-mid);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0
    }

    .cos-card.gold .cos-ico {
        border-color: var(--gold-mid)
    }

    .cos-ico svg {
        width: 22px;
        height: 22px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8
    }

    .cos-card.gold .cos-ico svg {
        stroke: #f57f17
    }

    .cos-top h3 {
        font-family: var(--serif);
        font-size: 18px;
        color: var(--ink)
    }

    .cos-body {
        padding: 18px 24px 24px
    }

    .cos-feat {
        display: flex;
        align-items: flex-start;
        gap: 8px;
        font-size: 13px;
        color: var(--ink2);
        margin-bottom: 8px
    }

    .cos-feat:last-child {
        margin-bottom: 0
    }

    .cos-feat .fc-dot {
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

    .cos-feat .fc-dot svg {
        width: 9px;
        height: 9px;
        stroke: var(--green);
        stroke-width: 3
    }

    /* ─── METHODOLOGY PILLS ─── */
    .feat-pills {
        display: flex;
        flex-wrap: wrap;
        gap: 9px;
        justify-content: center
    }

    .feat-pill {
        display: flex;
        align-items: center;
        gap: 7px;
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        padding: 9px 18px;
        font-size: 13.5px;
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

    /* ─── ASSESSMENT ─── */
    .assess-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .assess-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 16px;
        text-align: center;
        transition: all .25s
    }

    .assess-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .assess-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink)
    }

    /* ─── HOLISTIC PILLARS ─── */
    .pillar-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px
    }

    .pillar-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 26px 14px;
        text-align: center;
        transition: all .28s
    }

    .pillar-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .12)
    }

    .pillar-n {
        font-family: var(--serif);
        font-size: 26px;
        color: var(--green);
        margin-bottom: 8px
    }

    .pillar-name {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink)
    }

    /* ─── RESOURCES ─── */
    .res-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 14px
    }

    .res-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 20px 22px;
        display: flex;
        align-items: center;
        gap: 14px;
        transition: all .22s
    }

    .res-card:hover {
        border-color: var(--green);
        background: var(--green-lt)
    }

    .res-card .ri {
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

    .res-card:hover .ri {
        background: var(--green)
    }

    .res-card .ri svg {
        width: 18px;
        height: 18px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .22s
    }

    .res-card:hover .ri svg {
        stroke: #fff
    }

    .res-card span {
        font-size: 13.5px;
        font-weight: 600;
        color: var(--ink)
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
</style>


<!-- 1: HERO -->
<section class="page-hero">
    <div class="page-hero-rays"></div>
    <div class="wrap">
        <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; Academics</div>
        <h1>Academics</h1>
        <div class="ph-sub">Building Knowledge, Skills, Values and Leadership Through CBSE Education</div>
        <p>At Nalanda Higher Secondary School, the academic program is designed to promote intellectual,
            physical, emotional, social and moral development. The curriculum follows CBSE guidelines while
            fostering critical thinking, creativity, innovation and lifelong learning.</p>
        <div class="cta-btns">
            <a href="#structure" class="btn btn-green btn-lg">Curriculum Overview</a>
            <a href="#resources" class="btn btn-gold btn-lg">Download Academic Calendar</a>
        </div>
    </div>
</section>

<!-- SUB NAV -->
<div class="subnav">
    <div class="subnav-inner">
        <a href="#overview">Overview</a>
        <a href="#vision">Curriculum Vision</a>
        <a href="#objectives">Objectives</a>
        <a href="#structure">Academic Structure</a>
        <a href="#timetable">Time Table</a>
        <a href="#library">Library</a>
        <a href="#scholastic">Scholastic Areas</a>
        <a href="#coscholastic">Co-Scholastic</a>
        <a href="#methodology">Teaching Methodology</a>
        <a href="#assessment">Assessment</a>
        <a href="#art-integrated">Art Integrated</a>
        <a href="#holistic">Holistic Development</a>
        <a href="#resources">Resources</a>
    </div>
</div>

<!-- 2: ACADEMIC OVERVIEW -->
<section class="sec" id="overview">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Academic Overview</div>
            <h2 class="sec-title">Academic Excellence with Holistic Development</h2>
            <p class="sec-body">The academic framework is designed around clear, balanced objectives that shape
                every learner's journey at Nalanda.</p>
        </div>
        <div class="ov-grid" style="max-width:680px;margin:0 auto">
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Develop strong conceptual understanding</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Encourage critical thinking</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Build problem-solving abilities</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Foster creativity and innovation</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Develop leadership qualities</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Promote value-based education</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Prepare students for future challenges</div>
            <div class="ov-item"><span class="ov-dot"><svg viewBox="0 0 24 24" fill="none" stroke-width="3">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Support emotional and social growth</div>
        </div>
    </div>
</section>

<!-- 3: CURRICULUM VISION -->
<section class="sec sec-alt" id="vision">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Our Philosophy</div>
            <h2 class="sec-title">Our Curriculum Vision</h2>
        </div>
        <div class="vis-grid">
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 2a7 7 0 00-4 12.74V17a2 2 0 002 2h4a2 2 0 002-2v-2.26A7 7 0 0012 2z" />
                        <path d="M9 21h6" />
                    </svg></div>
                <h4>Intellectual Development</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Physical Development</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h4>Social Development</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M12 16v-4M12 8h.01" />
                    </svg></div>
                <h4>Critical Thinking</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 2l2.39 7.26H22l-6.18 4.49 2.36 7.25L12 16.5l-6.18 4.5 2.36-7.25L2 9.26h7.61z" />
                    </svg></div>
                <h4>Value-Based Education</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Leadership Development</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Technology Integration</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Environmental Awareness</h4>
            </div>
            <div class="vis-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                    </svg></div>
                <h4>Inclusive Education</h4>
            </div>
        </div>
    </div>
</section>

<!-- 4: CURRICULUM OBJECTIVES -->
<section class="sec" id="objectives">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Learning Objectives</div>
            <h2 class="sec-title">What We Aim to Develop in Every Student</h2>
        </div>
        <div class="obj-grid">
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Academic Excellence</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Conceptual understanding</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Research-based learning</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Cognitive development</div>
                </div>
            </div>
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Personal Development</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Self-awareness</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Confidence building</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Lifelong learning habits</div>
                </div>
            </div>
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Values &amp; Citizenship</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Constitutional values</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Equality &amp; respect</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Responsible citizenship</div>
                </div>
            </div>
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Technology &amp; Innovation</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Digital learning</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Creative thinking</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Innovation</div>
                </div>
            </div>
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Health &amp; Well-being</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Physical fitness</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Mental wellness</div>
                </div>
            </div>
            <div class="obj-card">
                <div class="obj-top">
                    <h4>Arts &amp; Creativity</h4>
                </div>
                <div class="obj-body">
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Talent development</div>
                    <div class="obj-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Cultural appreciation</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 5: ACADEMIC STRUCTURE -->
<section class="sec sec-gold" id="structure">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Curriculum by Level</div>
            <h2 class="sec-title">Academic Levels</h2>
            <p class="sec-body">A structured curriculum from Pre-Primary through Senior Secondary.</p>
        </div>
        <div class="tabs-bar">
            <button class="tab-btn active" data-tab="t1">Pre-Primary</button>
            <button class="tab-btn" data-tab="t2">Primary (I–V)</button>
            <button class="tab-btn" data-tab="t3">Middle (VI–VIII)</button>
            <button class="tab-btn" data-tab="t4">Secondary (IX–X)</button>
            <button class="tab-btn" data-tab="t5">Senior Secondary (XI–XII)</button>
        </div>

        <div class="tab-panel active" id="t1">
            <div class="tab-card">
                <h3>Pre-Primary — Nursery, KG-I, KG-II</h3>
                <div class="tab-pills">
                    <span class="press-tag">Nursery</span>
                    <span class="press-tag">KG-I</span>
                    <span class="press-tag">KG-II</span>
                </div>
                <div class="stream-block">
                    <h5>Focus Areas</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>Language Development</div>
                        <div class="feat-pill"><span class="pdot"></span>Number Concepts</div>
                        <div class="feat-pill"><span class="pdot"></span>Motor Skills</div>
                        <div class="feat-pill"><span class="pdot"></span>Social Interaction</div>
                        <div class="feat-pill"><span class="pdot"></span>Creative Activities</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-panel" id="t2">
            <div class="tab-card">
                <h3>Primary Wing — Class I to V</h3>
                <div class="stream-block">
                    <h5>Subjects</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>English</div>
                        <div class="feat-pill"><span class="pdot"></span>Hindi</div>
                        <div class="feat-pill"><span class="pdot"></span>Mathematics</div>
                        <div class="feat-pill"><span class="pdot"></span>EVS / Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Social Science</div>
                        <div class="feat-pill"><span class="pdot"></span>General Knowledge</div>
                        <div class="feat-pill"><span class="pdot"></span>Moral Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Computer Education</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-panel" id="t3">
            <div class="tab-card">
                <h3>Middle Wing — Class VI to VIII</h3>
                <div class="stream-block">
                    <h5>Subjects</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>English</div>
                        <div class="feat-pill"><span class="pdot"></span>Hindi</div>
                        <div class="feat-pill"><span class="pdot"></span>Sanskrit</div>
                        <div class="feat-pill"><span class="pdot"></span>Mathematics</div>
                        <div class="feat-pill"><span class="pdot"></span>Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Social Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Information Technology</div>
                        <div class="feat-pill"><span class="pdot"></span>General Knowledge</div>
                        <div class="feat-pill"><span class="pdot"></span>Moral Science</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-panel" id="t4">
            <div class="tab-card">
                <h3>Secondary Wing — Class IX to X</h3>
                <div class="stream-block">
                    <h5>Subjects</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>English</div>
                        <div class="feat-pill"><span class="pdot"></span>Hindi</div>
                        <div class="feat-pill"><span class="pdot"></span>Mathematics</div>
                        <div class="feat-pill"><span class="pdot"></span>Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Social Science</div>
                        <div class="feat-pill"><span class="pdot"></span>Information Technology</div>
                    </div>
                </div>
            </div>
        </div>

        <div class="tab-panel" id="t5">
            <div class="tab-card">
                <h3>Senior Secondary — Class XI &amp; XII</h3>
                <div class="stream-block">
                    <h5>Science Stream</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>Physics</div>
                        <div class="feat-pill"><span class="pdot"></span>Chemistry</div>
                        <div class="feat-pill"><span class="pdot"></span>Biology</div>
                        <div class="feat-pill"><span class="pdot"></span>Mathematics</div>
                        <div class="feat-pill"><span class="pdot"></span>English Core</div>
                        <div class="feat-pill"><span class="pdot"></span>Physical Education</div>
                        <div class="feat-pill"><span class="pdot"></span>Computer Applications</div>
                    </div>
                </div>
                <div class="stream-block commerce">
                    <h5>Commerce Stream</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Accountancy</div>
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Business Studies</div>
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Economics</div>
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>English Core</div>
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Physical Education</div>
                        <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Computer Applications</div>
                    </div>
                </div>
                <div class="stream-block">
                    <h5>Additional Subject</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>Hindi Elective</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 6: TIME TABLE -->
<section class="sec" id="timetable">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Daily Schedule</div>
            <h2 class="sec-title">Time Table</h2>
            <p class="sec-body">A well-paced weekly schedule balances scholastic and co-scholastic learning across
                every grade.</p>
        </div>
        <div class="tt-box">
            <div class="tt-icon"><svg viewBox="0 0 24 24">
                    <rect x="3" y="4" width="18" height="18" rx="2" />
                    <path d="M16 2v4M8 2v4M3 10h18" />
                </svg></div>
            <h3 style="font-family:var(--serif);font-size:20px;color:var(--ink)">Class-wise Time Tables</h3>
            <p style="color:var(--muted);font-size:14px;max-width:460px;margin:10px auto 0">Detailed period-wise
                time tables for each class are shared with students at the start of every academic session and
                posted on the notice board.</p>
            <div class="tt-grid">
                <div class="tt-day">MON</div>
                <div class="tt-day">TUE</div>
                <div class="tt-day">WED</div>
                <div class="tt-day">THU</div>
                <div class="tt-day">FRI</div>
                <div class="tt-day">SAT</div>
            </div>
            <a href="#contact" class="btn btn-green" style="margin-top:24px">Request Class Time Table</a>
        </div>
    </div>
</section>

<!-- 7: LIBRARY -->
<section class="sec sec-alt" id="library">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Knowledge Resource Centre</div>
            <h2 class="sec-title">Welcome to the School Library</h2>
            <p class="sec-body">The Library of Nalanda Higher Secondary School serves as a dynamic learning
                resource centre that supports the academic, intellectual, and personal development of students,
                offering access to a diverse collection of books, references, journals, magazines, and digital
                resources.</p>
        </div>

        <div class="info-split">
            <div>
                <div class="about-text">
                    <p><strong>Library Vision:</strong> To create a vibrant learning environment that inspires
                        students to become independent readers, lifelong learners, and informed global citizens.
                    </p>
                    <p>The library cultivates reading habits, enhances knowledge acquisition, and develops
                        critical thinking skills — offering a quiet, enriching space to explore ideas and foster a
                        love for literature and learning.</p>
                </div>
                <div class="stream-block">
                    <h5>Library Objectives</h5>
                    <div class="feat-pills" style="justify-content:flex-start">
                        <div class="feat-pill"><span class="pdot"></span>Promote reading habits</div>
                        <div class="feat-pill"><span class="pdot"></span>Support classroom learning</div>
                        <div class="feat-pill"><span class="pdot"></span>Encourage independent research</div>
                        <div class="feat-pill"><span class="pdot"></span>Develop critical thinking</div>
                        <div class="feat-pill"><span class="pdot"></span>Provide diverse resources</div>
                        <div class="feat-pill"><span class="pdot"></span>Foster creativity &amp; curiosity</div>
                    </div>
                </div>
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

        <div class="press-grid" style="margin-top:28px">
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

        <div class="press-grid" style="margin-top:14px">
            <div class="press-box">
                <h4>Library Services</h4>
                <div class="press-tags">
                    <span class="press-tag">Book Issue &amp; Return</span>
                    <span class="press-tag">Reference Assistance</span>
                    <span class="press-tag">Reading Support</span>
                    <span class="press-tag">Research Guidance</span>
                    <span class="press-tag">Current Affairs Resources</span>
                    <span class="press-tag">Teacher Resource Support</span>
                </div>
            </div>
            <div class="press-box">
                <h4>Reading Programs</h4>
                <div class="press-tags">
                    <span class="press-tag">Reading Sessions</span>
                    <span class="press-tag">Storytelling</span>
                    <span class="press-tag">Book Review Competitions</span>
                    <span class="press-tag">Reading Challenges</span>
                    <span class="press-tag">Literary Events</span>
                    <span class="press-tag">Knowledge Enrichment</span>
                </div>
            </div>
        </div>

        <div class="lib-rule-grid">
            <div class="press-box">
                <h4>Benefits of the Library</h4>
                <div class="about-text" style="font-size:13px">
                    <p style="margin-bottom:8px">Enhancing vocabulary and language skills, improving
                        concentration and comprehension, encouraging independent learning, strengthening research
                        abilities, developing creativity, and promoting lifelong learning habits.</p>
                </div>
            </div>
            <div class="press-box">
                <h4>Library Rules</h4>
                <div class="about-text" style="font-size:13px">
                    <p style="margin-bottom:8px">Maintain silence, handle books with care, return books on time,
                        keep the library clean, respect resources, and follow the librarian's instructions.</p>
                </div>
            </div>
        </div>

        <div class="lib-foot-grid">
            <div class="lib-foot-card">
                <div class="v">Mon – Sat</div>
                <div class="l">School Working Hours</div>
            </div>
            <div class="lib-foot-card">
                <div class="v">Closed</div>
                <div class="l">Sunday</div>
            </div>
            <div class="lib-foot-card">
                <div class="v">Mrs. Sangeeta Mishra</div>
                <div class="l">Librarian · B.LIS, M.LIS, B.Ed.</div>
            </div>
        </div>
    </div>
</section>

<!-- 8: SCHOLASTIC AREAS -->
<section class="sec" id="scholastic">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Core Curriculum</div>
            <h2 class="sec-title">Scholastic Learning</h2>
            <p class="sec-body">The scholastic curriculum focuses on academic learning, conceptual understanding
                and skill development across all grade levels.</p>
        </div>
        <div class="subj-grid">
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M4 19.5A2.5 2.5 0 016.5 17H20" />
                        <path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z" />
                    </svg></div>
                <h4>Languages</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z" />
                    </svg></div>
                <h4>Mathematics</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Science</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M2 12h20M12 2a15 15 0 010 20a15 15 0 010-20z" />
                    </svg></div>
                <h4>Social Science</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Information Technology</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M12 2v20M17 5H9.5a3.5 3.5 0 000 7h5a3.5 3.5 0 010 7H6" />
                    </svg></div>
                <h4>Commerce</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Humanities</h4>
            </div>
            <div class="subj-card">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Physical Education</h4>
            </div>
        </div>
    </div>
</section>

<!-- 9: CO-SCHOLASTIC AREAS -->
<section class="sec sec-gold" id="coscholastic">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Beyond Academics</div>
            <h2 class="sec-title">Learning Beyond the Classroom</h2>
        </div>
        <div class="cos-grid">
            <div class="cos-card">
                <div class="cos-top">
                    <div class="cos-ico"><svg viewBox="0 0 24 24">
                            <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                        </svg></div>
                    <h3>Art Education</h3>
                </div>
                <div class="cos-body">
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Drawing &amp; Painting</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Craft Activities</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Music &amp; Dance</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Theatre &amp; Drama</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Cultural Activities</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Local Arts &amp; Crafts</div>
                </div>
            </div>
            <div class="cos-card gold">
                <div class="cos-top">
                    <div class="cos-ico"><svg viewBox="0 0 24 24">
                            <circle cx="12" cy="8" r="6" />
                            <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                        </svg></div>
                    <h3>Health &amp; Physical Education</h3>
                </div>
                <div class="cos-body">
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Sports &amp; Yoga</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Indigenous Games</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Martial Arts</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>NCC</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Fitness Programs</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Self-Defense Training</div>
                </div>
            </div>
            <div class="cos-card">
                <div class="cos-top">
                    <div class="cos-ico"><svg viewBox="0 0 24 24">
                            <path
                                d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                        </svg></div>
                    <h3>Work Experience &amp; Life Skills</h3>
                </div>
                <div class="cos-body">
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Community Service</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Leadership Programs</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Communication Skills</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Team Building</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Problem Solving</div>
                    <div class="cos-feat"><span class="fc-dot"><svg viewBox="0 0 24 24" fill="none">
                                <polyline points="20 6 9 17 4 12" />
                            </svg></span>Practical Learning</div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 10: TEACHING METHODOLOGY -->
<section class="sec" id="methodology">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Pedagogy</div>
            <h2 class="sec-title">How We Teach</h2>
        </div>
        <div class="feat-pills">
            <div class="feat-pill"><span class="pdot"></span>Interactive Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Experiential Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Project-Based Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Inquiry-Based Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Technology Integration</div>
            <div class="feat-pill"><span class="pdot"></span>Collaborative Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Art Integrated Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Cross-Curricular Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Teacher as Facilitator Approach</div>
        </div>
    </div>
</section>

<!-- 11: ASSESSMENT & EVALUATION -->
<section class="sec sec-alt" id="assessment">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Evaluation</div>
            <h2 class="sec-title">Continuous Assessment System</h2>
            <p class="sec-body">Regular feedback and remedial support ensure continuous student improvement.</p>
        </div>
        <div class="assess-grid">
            <div class="assess-card">
                <h4>Academic Progress</h4>
            </div>
            <div class="assess-card">
                <h4>Skill Development</h4>
            </div>
            <div class="assess-card">
                <h4>Practical Application</h4>
            </div>
            <div class="assess-card">
                <h4>Critical Thinking</h4>
            </div>
            <div class="assess-card">
                <h4>Creativity</h4>
            </div>
            <div class="assess-card">
                <h4>Activity Participation</h4>
            </div>
            <div class="assess-card">
                <h4>Personality Development</h4>
            </div>
        </div>
    </div>
</section>

<!-- 12: ART INTEGRATED LEARNING -->
<section class="sec" id="art-integrated">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Cross-Curricular Approach</div>
            <h2 class="sec-title">Creativity in Every Subject</h2>
        </div>
        <div class="feat-pills">
            <div class="feat-pill"><span class="pdot"></span>Better Concept Understanding</div>
            <div class="feat-pill"><span class="pdot"></span>Improved Communication Skills</div>
            <div class="feat-pill"><span class="pdot"></span>Enhanced Creativity</div>
            <div class="feat-pill"><span class="pdot"></span>Confidence Building</div>
            <div class="feat-pill"><span class="pdot"></span>Real-Life Learning Connection</div>
            <div class="feat-pill"><span class="pdot"></span>Multidisciplinary Thinking</div>
        </div>
    </div>
</section>

<!-- 13: HOLISTIC DEVELOPMENT -->
<section class="sec sec-gold" id="holistic">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">The Bigger Picture</div>
            <h2 class="sec-title">Developing Future Leaders</h2>
        </div>
        <div class="pillar-grid">
            <div class="pillar-card">
                <div class="pillar-n">01</div>
                <div class="pillar-name">Academic Growth</div>
            </div>
            <div class="pillar-card">
                <div class="pillar-n">02</div>
                <div class="pillar-name">Social Growth</div>
            </div>
            <div class="pillar-card">
                <div class="pillar-n">03</div>
                <div class="pillar-name">Emotional Growth</div>
            </div>
            <div class="pillar-card">
                <div class="pillar-n">04</div>
                <div class="pillar-name">Physical Growth</div>
            </div>
            <div class="pillar-card">
                <div class="pillar-n">05</div>
                <div class="pillar-name">Creative Growth</div>
            </div>
        </div>
        <p style="text-align:center;color:var(--muted);font-size:14.5px;max-width:620px;margin:28px auto 0;line-height:1.8">
            The curriculum is designed to nurture responsible citizens, lifelong learners and future leaders
            through a balanced combination of scholastic and co-scholastic education.</p>
    </div>
</section>

<!-- 14: ACADEMIC RESOURCES -->
<section class="sec" id="resources">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Quick Links</div>
            <h2 class="sec-title">Academic Resources</h2>
        </div>
        <div class="res-grid">
            <a href="#" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <span>Book Lists (Nursery–XII)</span>
            </a>
            <a href="#" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <rect x="3" y="4" width="18" height="18" rx="2" />
                        <path d="M16 2v4M8 2v4M3 10h18" />
                    </svg></div>
                <span>Academic Calendar</span>
            </a>
            <a href="#" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <path d="M9 11l3 3L22 4" />
                        <path d="M21 12v7a2 2 0 01-2 2H5a2 2 0 01-2-2V5a2 2 0 012-2h11" />
                    </svg></div>
                <span>Examination Schedule</span>
            </a>
            <a href="CBSCcorner.html" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <span>CBSE Information</span>
            </a>
            <a href="#" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <path d="M12 15V3" />
                    </svg></div>
                <span>Downloads</span>
            </a>
            <a href="#contact" class="res-card">
                <div class="ri"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <span>Student Support</span>
            </a>
        </div>
    </div>
</section>

<!-- 15: CTA -->
<section class="cta-section" id="admissions">
    <div class="wrap">
        <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Join Nalanda</div>
        <h2>Empowering Students for Academic Excellence and Lifelong Success</h2>
        <p>Join the Nalanda family and watch your child thrive in a nurturing CBSE environment built for
            tomorrow's leaders.</p>
        <div class="cta-btns">
            <a href="index.html#contact" class="btn btn-green btn-lg">Admission Enquiry</a>
            <a href="index.html#contact" class="btn btn-gold btn-lg">Contact School</a>
        </div>
    </div>
</section>


<!-- Responsive -->
<style>
    @media (max-width: 1200px) {
        .vis-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .obj-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .subj-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .cos-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .assess-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .pillar-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .res-grid {
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

        .ov-grid {
            grid-template-columns: 1fr
        }

        .info-split {
            grid-template-columns: 1fr;
            gap: 30px
        }

        .press-grid {
            grid-template-columns: 1fr
        }

        .tt-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .sec {
            padding: 60px 0;
        }
    }

    @media (max-width: 768px) {
        .wrap {
            padding: 0 16px;
        }

        .vis-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .obj-grid {
            grid-template-columns: 1fr
        }

        .subj-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .cos-grid {
            grid-template-columns: 1fr
        }

        .assess-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .pillar-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .res-grid {
            grid-template-columns: 1fr
        }

        .lib-rule-grid {
            grid-template-columns: 1fr
        }

        .lib-foot-grid {
            grid-template-columns: 1fr
        }

        .tt-grid {
            grid-template-columns: repeat(2, 1fr)
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
        .vis-grid {
            grid-template-columns: 1fr 1fr
        }

        .subj-grid {
            grid-template-columns: 1fr 1fr
        }

        .assess-grid {
            grid-template-columns: 1fr 1fr
        }

        .pillar-grid {
            grid-template-columns: 1fr 1fr
        }

        .tt-grid {
            grid-template-columns: repeat(2, 1fr)
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

</script>
@endsection()
