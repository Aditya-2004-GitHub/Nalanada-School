@extends('layouts.app')

@section('title', 'Admissions')

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
        margin-bottom: 18px
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

    /* ─── HIGHLIGHT GRID ─── */
    .hl-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px
    }

    .hl-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 14px;
        text-align: center;
        transition: all .25s
    }

    .hl-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .hl-card:hover .wi {
        background: var(--green)
    }

    .hl-card:hover .wi svg {
        stroke: #fff
    }

    .wi {
        width: 46px;
        height: 46px;
        background: var(--green-lt);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px;
        transition: all .28s
    }

    .wi svg {
        width: 21px;
        height: 21px;
        stroke: var(--green);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .28s
    }

    .hl-card h4 {
        font-size: 12.5px;
        font-weight: 600;
        color: var(--ink);
        line-height: 1.35
    }

    /* ─── PROCESS STEPS ─── */
    .steps {
        position: relative;
        max-width: 760px;
        margin: 0 auto
    }

    .step {
        display: flex;
        gap: 22px;
        padding-bottom: 36px;
        position: relative
    }

    .step:last-child {
        padding-bottom: 0
    }

    .step::before {
        content: '';
        position: absolute;
        left: 23px;
        top: 50px;
        bottom: 0;
        width: 2px;
        background: var(--border)
    }

    .step:last-child::before {
        display: none
    }

    .step-n {
        width: 48px;
        height: 48px;
        border-radius: 50%;
        background: var(--green);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        font-family: var(--serif);
        font-size: 18px;
        flex-shrink: 0;
        z-index: 1
    }

    .step-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 18px 22px;
        flex: 1;
        transition: all .22s
    }

    .step-card:hover {
        border-color: var(--green);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .step-card h4 {
        font-size: 15px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 5px
    }

    .step-card p {
        font-size: 13.5px;
        color: var(--muted);
        line-height: 1.6
    }

    /* ─── WING CARDS ─── */
    .wing-grid {
        display: grid;
        grid-template-columns: repeat(5, 1fr);
        gap: 14px
    }

    .wing-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        padding: 22px 16px;
        transition: all .25s
    }

    .wing-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .wing-card.hi {
        background: var(--green-lt);
        border-color: var(--green-mid);
        grid-column: span 2
    }

    .wing-card h4 {
        font-family: var(--serif);
        font-size: 16px;
        color: var(--green);
        margin-bottom: 10px
    }

    .wing-card ul li {
        font-size: 12.5px;
        color: var(--ink2);
        padding: 3px 0;
        display: flex;
        align-items: center;
        gap: 6px
    }

    .wing-card ul li::before {
        content: '';
        width: 5px;
        height: 5px;
        background: var(--green);
        border-radius: 50%;
        flex-shrink: 0
    }

    .stream-mini {
        margin-top: 10px
    }

    .stream-mini h5 {
        font-size: 10.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: var(--green);
        margin-bottom: 5px
    }

    .stream-mini.commerce h5 {
        color: #f57f17
    }

    /* ─── ELIGIBILITY TABLE ─── */
    .elig-table {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 16px;
        overflow: hidden
    }

    .elig-row {
        display: grid;
        grid-template-columns: 200px 1fr;
        border-bottom: 1px solid var(--green-lt)
    }

    .elig-row:last-child {
        border-bottom: none
    }

    .elig-row .ec {
        background: var(--green-lt);
        padding: 16px 20px;
        font-weight: 600;
        font-size: 13.5px;
        color: var(--green);
        display: flex;
        align-items: center
    }

    .elig-row .ev {
        padding: 16px 20px;
        font-size: 13.5px;
        color: var(--ink2);
        display: flex;
        align-items: center
    }

    /* ─── DOCUMENTS GRID ─── */
    .doc-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 12px
    }

    .doc-item {
        display: flex;
        align-items: center;
        gap: 12px;
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 12px;
        padding: 14px 16px;
        font-size: 13.5px;
        font-weight: 500;
        color: var(--ink2);
        transition: all .2s
    }

    .doc-item:hover {
        border-color: var(--green);
        background: var(--green-lt)
    }

    .doc-item .di {
        width: 30px;
        height: 30px;
        background: var(--green-lt);
        border-radius: 8px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0
    }

    .doc-item .di svg {
        width: 15px;
        height: 15px;
        stroke: var(--green);
        stroke-width: 2
    }

    /* ─── FEATURE PILLS ─── */
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

    /* ─── FACILITY GRID ─── */
    .fac-mini-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .fac-mini {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 20px 14px;
        text-align: center;
        transition: all .25s
    }

    .fac-mini:hover {
        border-color: var(--gold-mid);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
    }

    .fac-mini:hover .ci {
        background: var(--gold);
        border-color: var(--gold)
    }

    .fac-mini:hover .ci svg {
        stroke: var(--ink)
    }

    .ci {
        width: 40px;
        height: 40px;
        background: var(--gold-lt);
        border: 1.5px solid #ffe082;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        transition: all .28s
    }

    .ci svg {
        width: 19px;
        height: 19px;
        stroke: var(--gold);
        fill: none;
        stroke-width: 1.8;
        transition: stroke .28s
    }

    .fac-mini h4 {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink)
    }

    /* ─── STAT GRID ─── */
    .stat-grid {
        display: grid;
        grid-template-columns: repeat(6, 1fr);
        gap: 14px
    }

    .stat-tile {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 14px;
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
        font-size: 19px;
        color: var(--green);
        line-height: 1.2
    }

    .stat-tile .l {
        font-size: 10.5px;
        color: var(--muted);
        margin-top: 6px;
        text-transform: uppercase;
        letter-spacing: .3px
    }

    /* ─── ENQUIRY FORM ─── */
    .form-box {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 20px;
        padding: 36px;
        max-width: 760px;
        margin: 0 auto
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 16px
    }

    .form-field {
        display: flex;
        flex-direction: column;
        gap: 6px
    }

    .form-field.full {
        grid-column: 1 / -1
    }

    .form-field label {
        font-size: 12px;
        font-weight: 600;
        color: var(--ink2)
    }

    .form-field input,
    .form-field select,
    .form-field textarea {
        font-family: var(--sans);
        font-size: 13.5px;
        padding: 11px 14px;
        border: 1.5px solid var(--border);
        border-radius: 9px;
        background: var(--cream);
        color: var(--ink);
        outline: none;
        transition: border-color .2s
    }

    .form-field input:focus,
    .form-field select:focus,
    .form-field textarea:focus {
        border-color: var(--green-mid)
    }

    .form-field textarea {
        resize: vertical;
        min-height: 90px;
        font-family: var(--sans)
    }

    .form-submit {
        margin-top: 20px;
        text-align: center
    }

    .form-note {
        font-size: 12px;
        color: var(--muted);
        text-align: center;
        margin-top: 14px
    }

    /* ─── DOWNLOADS ─── */
    .dl-grid {
        display: grid;
        grid-template-columns: repeat(4, 1fr);
        gap: 14px
    }

    .dl-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        padding: 22px 18px;
        text-align: center;
        transition: all .25s
    }

    .dl-card:hover {
        border-color: var(--green);
        transform: translateY(-3px);
        box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
    }

    .dl-card .di2 {
        width: 44px;
        height: 44px;
        background: var(--green-lt);
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 12px
    }

    .dl-card .di2 svg {
        width: 20px;
        height: 20px;
        stroke: var(--green);
        stroke-width: 1.8
    }

    .dl-card h4 {
        font-size: 13px;
        font-weight: 600;
        color: var(--ink);
        margin-bottom: 10px
    }

    /* ─── FAQ ─── */
    .faq-list {
        max-width: 760px;
        margin: 0 auto;
        display: flex;
        flex-direction: column;
        gap: 10px
    }

    .faq-item {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 14px;
        overflow: hidden
    }

    .faq-q {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 18px 22px;
        cursor: pointer;
        font-size: 14.5px;
        font-weight: 600;
        color: var(--ink)
    }

    .faq-q .fq-icon {
        width: 24px;
        height: 24px;
        background: var(--green-lt);
        border-radius: 6px;
        display: flex;
        align-items: center;
        justify-content: center;
        flex-shrink: 0;
        transition: transform .25s
    }

    .faq-item.open .fq-icon {
        transform: rotate(45deg)
    }

    .faq-q .fq-icon svg {
        width: 12px;
        height: 12px;
        stroke: var(--green);
        stroke-width: 2.4
    }

    .faq-a {
        max-height: 0;
        overflow: hidden;
        transition: max-height .3s ease
    }

    .faq-a p {
        padding: 0 22px 18px;
        font-size: 13.5px;
        color: var(--muted);
        line-height: 1.7
    }

    /* ─── CONTACT ADMISSION ─── */
    .adm-contact-grid {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 40px;
        align-items: center
    }

    .c-rows {
        display: flex;
        flex-direction: column;
        gap: 12px
    }

    .c-row {
        display: flex;
        align-items: flex-start;
        gap: 13px;
        padding: 15px;
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

    .adm-cta-box {
        background: linear-gradient(135deg, var(--gold-lt) 0%, #fffef5 50%, var(--green-lt) 100%);
        border: 2px solid var(--border);
        border-radius: 20px;
        padding: 36px;
        text-align: center
    }

    .adm-cta-box h3 {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--ink);
        margin-bottom: 10px
    }

    .adm-cta-box p {
        font-size: 13.5px;
        color: var(--muted);
        margin-bottom: 22px
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


<!-- PAGE BANNER -->
<section class="page-hero" id="banner">
    <div class="page-hero-rays"></div>
    <div class="wrap">
        <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; Admissions</div>
        <div class="hero-tag"><span class="hero-dot"></span>Admissions Open 2026–27</div>
        <h1>Admissions Open <em>2026–27</em></h1>
        <p>Join Nalanda Higher Secondary School — A CBSE Affiliated Senior Secondary School focused on academic
            excellence &amp; holistic development.</p>
        <div class="cta-btns">
            <a href="#enquiry" class="btn btn-green btn-lg">Apply Now</a>
            <a href="#enquiry" class="btn btn-gold btn-lg">Admission Enquiry</a>
            <a href="#downloads" class="btn btn-ghost btn-lg">Download Admission Form</a>
            <a href="tel:+917622227218" class="btn btn-ghost btn-lg">Call Us</a>
        </div>
    </div>
</section>

<!-- SUB NAV -->
<div class="subnav">
    <div class="subnav-inner">
        <a href="#welcome">Why Nalanda</a>
        <a href="#journey">Admission Journey</a>
        <a href="#classes">Classes Open</a>
        <a href="#eligibility">Eligibility</a>
        <a href="#documents">Documents</a>
        <a href="#academic-excellence">Academics</a>
        <a href="#facilities">Facilities</a>
        <a href="#beyond">Beyond Academics</a>
        <a href="#stats">School Stats</a>
        <a href="#enquiry">Enquiry Form</a>
        <a href="#downloads">Downloads</a>
        <a href="#faq">FAQs</a>
        <a href="#contact">Contact</a>
    </div>
</div>

<!-- 1: WELCOME -->
<section class="sec" id="welcome">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Welcome to Nalanda</div>
            <h2 class="sec-title">Why Choose Nalanda Higher Secondary School?</h2>
            <p class="sec-body">Nalanda Higher Secondary School, established in 2010 and affiliated with CBSE, is
                committed to nurturing confident, responsible and future-ready learners through quality education
                and holistic development.</p>
        </div>
        <div class="hl-grid">
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>CBSE Affiliated School</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Senior Secondary Level</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" />
                        <path d="M7 12h10M12 7v10" />
                    </svg></div>
                <h4>Smart Classrooms</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2" />
                        <circle cx="9" cy="7" r="4" />
                        <path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75" />
                    </svg></div>
                <h4>Experienced Faculty</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Modern Science Labs</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Computer Lab</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Rich Library Resources</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Student Counseling Support</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Sports &amp; Physical Education</h4>
            </div>
            <div class="hl-card">
                <div class="wi"><svg viewBox="0 0 24 24">
                        <polygon
                            points="12 2 15.09 8.26 22 9.27 17 14.14 18.18 21.02 12 17.77 5.82 21.02 7 14.14 2 9.27 8.91 8.26 12 2" />
                    </svg></div>
                <h4>Holistic Development</h4>
            </div>
        </div>
    </div>
</section>

<!-- 2: ADMISSION JOURNEY -->
<section class="sec sec-alt" id="journey">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Step by Step</div>
            <h2 class="sec-title">Simple Admission Process</h2>
        </div>
        <div class="steps">
            <div class="step">
                <div class="step-n">1</div>
                <div class="step-card">
                    <h4>Admission Enquiry</h4>
                    <p>Parents can submit an enquiry online or visit the school campus.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-n">2</div>
                <div class="step-card">
                    <h4>Counselling &amp; School Interaction</h4>
                    <p>Meet the admission counselor and understand academics, facilities, curriculum and school
                        culture.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-n">3</div>
                <div class="step-card">
                    <h4>Application Submission</h4>
                    <p>Submit the admission form along with required documents.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-n">4</div>
                <div class="step-card">
                    <h4>Assessment / Interaction</h4>
                    <p>Age-appropriate interaction for students.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-n">5</div>
                <div class="step-card">
                    <h4>Admission Confirmation</h4>
                    <p>Verification and fee submission.</p>
                </div>
            </div>
            <div class="step">
                <div class="step-n">6</div>
                <div class="step-card">
                    <h4>Welcome to Nalanda Family</h4>
                    <p>Student onboarding and orientation.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 3: CLASSES OPEN FOR ADMISSION -->
<section class="sec" id="classes">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Enrolment</div>
            <h2 class="sec-title">Classes Open for Admission</h2>
        </div>
        <div class="wing-grid">
            <div class="wing-card">
                <h4>Pre-Primary Wing</h4>
                <ul>
                    <li>Nursery</li>
                    <li>KG-I</li>
                    <li>KG-II</li>
                </ul>
            </div>
            <div class="wing-card">
                <h4>Primary Wing</h4>
                <ul>
                    <li>Class I</li>
                    <li>Class II</li>
                    <li>Class III</li>
                    <li>Class IV</li>
                    <li>Class V</li>
                </ul>
            </div>
            <div class="wing-card">
                <h4>Middle Wing</h4>
                <ul>
                    <li>Class VI</li>
                    <li>Class VII</li>
                    <li>Class VIII</li>
                </ul>
            </div>
            <div class="wing-card">
                <h4>Secondary Wing</h4>
                <ul>
                    <li>Class IX</li>
                    <li>Class X</li>
                </ul>
            </div>
            <div class="wing-card hi">
                <h4>Senior Secondary Wing</h4>
                <div class="stream-mini">
                    <h5>Science Stream</h5>
                    <ul>
                        <li>Physics</li>
                        <li>Chemistry</li>
                        <li>Biology</li>
                        <li>Mathematics</li>
                    </ul>
                </div>
                <div class="stream-mini commerce">
                    <h5>Commerce Stream</h5>
                    <ul>
                        <li>Accountancy</li>
                        <li>Business Studies</li>
                        <li>Economics</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 4: ELIGIBILITY CRITERIA -->
<section class="sec sec-gold" id="eligibility">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Requirements</div>
            <h2 class="sec-title">Eligibility Criteria</h2>
        </div>
        <div class="elig-table" style="max-width:780px;margin:0 auto">
            <div class="elig-row">
                <div class="ec">Nursery</div>
                <div class="ev">Minimum age as per school norms.</div>
            </div>
            <div class="elig-row">
                <div class="ec">KG-I</div>
                <div class="ev">Completed Nursery.</div>
            </div>
            <div class="elig-row">
                <div class="ec">KG-II</div>
                <div class="ev">Completed KG-I.</div>
            </div>
            <div class="elig-row">
                <div class="ec">Classes I – VIII</div>
                <div class="ev">Previous class passed from a recognized school.</div>
            </div>
            <div class="elig-row">
                <div class="ec">Classes IX – X</div>
                <div class="ev">Transfer and academic records required.</div>
            </div>
            <div class="elig-row">
                <div class="ec">Classes XI – XII</div>
                <div class="ev">Admission based on previous academic performance and stream availability.</div>
            </div>
        </div>
    </div>
</section>

<!-- 5: DOCUMENTS REQUIRED -->
<section class="sec" id="documents">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Paperwork</div>
            <h2 class="sec-title">Documents Required</h2>
            <p class="sec-body">Mandatory documents to be submitted at the time of admission.</p>
        </div>
        <div class="doc-grid" style="max-width:760px;margin:0 auto">
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Student Birth Certificate</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Aadhaar Card (Student)</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Aadhaar Card (Parents)</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Passport Size Photographs</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Previous School Report Card</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Transfer Certificate (if applicable)</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Migration Certificate (if applicable)</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Address Proof</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Caste Certificate (if applicable)</div>
            <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2">
                        <polyline points="20 6 9 17 4 12" />
                    </svg></span>Medical Information (if applicable)</div>
        </div>
    </div>
</section>

<!-- 6: ACADEMIC EXCELLENCE -->
<section class="sec sec-alt" id="academic-excellence">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Curriculum</div>
            <h2 class="sec-title">Academic Excellence</h2>
            <p class="sec-body">The school follows the CBSE curriculum, designed to promote intellectual,
                emotional, social and moral development.</p>
        </div>
        <div class="feat-pills">
            <div class="feat-pill"><span class="pdot"></span>Student Centered Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Activity Based Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Project Based Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Experiential Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Inquiry Based Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Technology Integration</div>
            <div class="feat-pill"><span class="pdot"></span>Art Integrated Learning</div>
            <div class="feat-pill"><span class="pdot"></span>Continuous Assessment</div>
        </div>
    </div>
</section>

<!-- 7: FACILITIES -->
<section class="sec" id="facilities">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Infrastructure</div>
            <h2 class="sec-title">Facilities Your Child Will Get</h2>
        </div>
        <div class="fac-mini-grid">
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="2" width="20" height="20" rx="2" />
                        <path d="M7 12h10M12 7v10" />
                    </svg></div>
                <h4>Smart Classrooms</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M9 3H5a2 2 0 00-2 2v4m6-6h10a2 2 0 012 2v4M9 3v18m0 0h10a2 2 0 002-2v-4M9 21H5a2 2 0 01-2-2v-4m0 0h18" />
                    </svg></div>
                <h4>Physics Laboratory</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M14.5 10c-.83 0-1.5-.67-1.5-1.5v-5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5v5c0 .83-.67 1.5-1.5 1.5z" />
                        <path d="M20.5 10H19V8.5c0-.83.67-1.5 1.5-1.5s1.5.67 1.5 1.5-.67 1.5-1.5 1.5z" />
                    </svg></div>
                <h4>Chemistry Laboratory</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Biology Laboratory</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M4 4h6v6H4zM14 4h6v6h-6zM14 14h6v6h-6zM4 14h6v6H4z" />
                    </svg></div>
                <h4>Mathematics Laboratory</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="2" y="3" width="20" height="14" rx="2" />
                        <path d="M8 21h8M12 17v4" />
                    </svg></div>
                <h4>Computer Laboratory</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 014 4v14a3 3 0 00-3-3H2z" />
                        <path d="M22 3h-6a4 4 0 00-4 4v14a3 3 0 013-3h7z" />
                    </svg></div>
                <h4>Well Equipped Library</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="10" />
                        <path d="M8 12.5s1 1.5 4 1.5 4-1.5 4-1.5" />
                    </svg></div>
                <h4>Activity Room</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <circle cx="12" cy="8" r="6" />
                        <path d="M15.477 12.89L17 22l-5-3-5 3 1.523-9.11" />
                    </svg></div>
                <h4>Sports Room</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path
                            d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z" />
                    </svg></div>
                <h4>Counseling Room</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M22 11.08V12a10 10 0 11-5.93-9.14" />
                        <polyline points="22 4 12 14.01 9 11.01" />
                    </svg></div>
                <h4>Medical Room</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <rect x="3" y="3" width="18" height="18" rx="2" />
                        <path d="M9 9h6M9 12h6M9 15h4" />
                    </svg></div>
                <h4>Resource Room</h4>
            </div>
            <div class="fac-mini">
                <div class="ci"><svg viewBox="0 0 24 24">
                        <path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z" />
                    </svg></div>
                <h4>Playground</h4>
            </div>
        </div>
    </div>
</section>

<!-- 8: BEYOND ACADEMICS -->
<section class="sec sec-gold" id="beyond">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Co-Curricular</div>
            <h2 class="sec-title">Holistic Development Programs</h2>
        </div>
        <div class="feat-pills">
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Dance</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Yoga</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Debate &amp; Public Speaking</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Art &amp; Craft</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Sports &amp; Physical Education</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Student Counseling</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Green Initiative Program</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Educational Tours</div>
            <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Cultural Programs</div>
        </div>
    </div>
</section>

<!-- 9: SCHOOL STATISTICS -->
<section class="sec" id="stats">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">At a Glance</div>
            <h2 class="sec-title">School Statistics</h2>
        </div>
        <div class="stat-grid">
            <div class="stat-tile">
                <div class="v">2010</div>
                <div class="l">Established Since</div>
            </div>
            <div class="stat-tile">
                <div class="v">1031141</div>
                <div class="l">CBSE Affiliation No.</div>
            </div>
            <div class="stat-tile">
                <div class="v">4044+</div>
                <div class="l">Library Books</div>
            </div>
            <div class="stat-tile">
                <div class="v">XII</div>
                <div class="l">Senior Secondary School</div>
            </div>
            <div class="stat-tile">
                <div class="v">Dedicated</div>
                <div class="l">Faculty Team</div>
            </div>
            <div class="stat-tile">
                <div class="v">Modern</div>
                <div class="l">Campus Infrastructure</div>
            </div>
        </div>
    </div>
</section>

<!-- 10: ADMISSION ENQUIRY FORM -->
<section class="sec sec-alt" id="enquiry">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Get Started</div>
            <h2 class="sec-title">Admission Enquiry Form</h2>
            <p class="sec-body">Fill in the details below and our admission team will get back to you shortly.</p>
        </div>
        <div class="form-box">
            <form onsubmit="event.preventDefault(); alert('Thank you! Your enquiry has been noted. Our admission team will contact you shortly.'); this.reset();">
                <div class="form-grid">
                    <div class="form-field">
                        <label for="studentName">Student Name</label>
                        <input type="text" id="studentName" placeholder="Enter student's full name" required>
                    </div>
                    <div class="form-field">
                        <label for="parentName">Parent Name</label>
                        <input type="text" id="parentName" placeholder="Enter parent's full name" required>
                    </div>
                    <div class="form-field">
                        <label for="mobile">Mobile Number</label>
                        <input type="tel" id="mobile" placeholder="+91 XXXXX XXXXX" required>
                    </div>
                    <div class="form-field">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" placeholder="you@example.com">
                    </div>
                    <div class="form-field">
                        <label for="classSeeking">Class Seeking Admission</label>
                        <select id="classSeeking">
                            <option>Nursery</option>
                            <option>KG-I</option>
                            <option>KG-II</option>
                            <option>Class I – V</option>
                            <option>Class VI – VIII</option>
                            <option>Class IX – X</option>
                            <option>Class XI (Science)</option>
                            <option>Class XI (Commerce)</option>
                        </select>
                    </div>
                    <div class="form-field">
                        <label for="currentSchool">Current School</label>
                        <input type="text" id="currentSchool" placeholder="Name of current school">
                    </div>
                    <div class="form-field full">
                        <label for="city">City</label>
                        <input type="text" id="city" placeholder="Your city">
                    </div>
                    <div class="form-field full">
                        <label for="message">Message</label>
                        <textarea id="message" placeholder="Any additional information you'd like to share"></textarea>
                    </div>
                </div>
                <div class="form-submit">
                    <button type="submit" class="btn btn-green btn-lg">Submit Enquiry</button>
                </div>
                <p class="form-note">By submitting, you agree to be contacted by Nalanda Higher Secondary School
                    regarding your enquiry.</p>
            </form>
        </div>
    </div>
</section>

<!-- 11: DOWNLOAD CENTRE -->
<section class="sec" id="downloads">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Resources</div>
            <h2 class="sec-title">Download Centre</h2>
        </div>
        <div class="dl-grid">
            <div class="dl-card">
                <div class="di2"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <path d="M12 15V3" />
                    </svg></div>
                <h4>Admission Form (PDF)</h4>
                <a href="#" class="btn btn-ghost">Download</a>
            </div>
            <div class="dl-card">
                <div class="di2"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <path d="M12 15V3" />
                    </svg></div>
                <h4>School Prospectus</h4>
                <a href="#" class="btn btn-ghost">Download</a>
            </div>
            <div class="dl-card">
                <div class="di2"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <path d="M12 15V3" />
                    </svg></div>
                <h4>Fee Structure</h4>
                <a href="#" class="btn btn-ghost">Download</a>
            </div>
            <div class="dl-card">
                <div class="di2"><svg viewBox="0 0 24 24" fill="none" stroke-width="1.8">
                        <path d="M21 15v4a2 2 0 01-2 2H5a2 2 0 01-2-2v-4" />
                        <polyline points="7 10 12 15 17 10" />
                        <path d="M12 15V3" />
                    </svg></div>
                <h4>Academic Calendar</h4>
                <a href="#" class="btn btn-ghost">Download</a>
            </div>
        </div>
    </div>
</section>

<!-- 12: FAQ -->
<section class="sec sec-gold" id="faq">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center;color:var(--red)">Have Questions?</div>
            <h2 class="sec-title">Frequently Asked Questions</h2>
        </div>
        <div class="faq-list">
            <div class="faq-item">
                <div class="faq-q">Is the school CBSE affiliated?
                    <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4">
                            <path d="M12 5v14M5 12h14" />
                        </svg></span>
                </div>
                <div class="faq-a">
                    <p>Yes, the school is affiliated with CBSE (Affiliation No. 1031141).</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Which classes are available?
                    <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4">
                            <path d="M12 5v14M5 12h14" />
                        </svg></span>
                </div>
                <div class="faq-a">
                    <p>Nursery to Class XII, with Science and Commerce streams at the Senior Secondary level.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Are transport facilities available?
                    <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4">
                            <path d="M12 5v14M5 12h14" />
                        </svg></span>
                </div>
                <div class="faq-a">
                    <p>Please contact the admission office for the latest information on transport facilities.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-q">What is the admission procedure?
                    <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4">
                            <path d="M12 5v14M5 12h14" />
                        </svg></span>
                </div>
                <div class="faq-a">
                    <p>Enquiry → Application → Verification → Confirmation.</p>
                </div>
            </div>
            <div class="faq-item">
                <div class="faq-q">Does the school provide co-curricular activities?
                    <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4">
                            <path d="M12 5v14M5 12h14" />
                        </svg></span>
                </div>
                <div class="faq-a">
                    <p>Yes. Sports, yoga, dance, debate, art &amp; craft, educational tours and cultural activities
                        are available.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- 13: CONTACT ADMISSION OFFICE -->
<section class="sec" id="contact">
    <div class="wrap">
        <div class="sec-head c">
            <div class="label" style="justify-content:center">Reach Out</div>
            <h2 class="sec-title">Contact Admission Office</h2>
        </div>
        <div class="adm-contact-grid">
            <div class="c-rows">
                <div class="c-row">
                    <div class="c-icon"><svg viewBox="0 0 24 24">
                            <path d="M3 9l9-7 9 7v11a2 2 0 01-2 2H5a2 2 0 01-2-2z" />
                            <polyline points="9 22 9 12 15 12 15 22" />
                        </svg></div>
                    <div>
                        <div class="c-lbl">Admission Help Desk</div>
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
                        <div class="c-val">Opposite Collectorate Office, Maharana Pratap Ward, Jhinjhiri, Katni,
                            Madhya Pradesh – 483501</div>
                    </div>
                </div>
                <div class="c-row">
                    <div class="c-icon"><svg viewBox="0 0 24 24">
                            <path
                                d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 013.07 10.8 19.79 19.79 0 01.06 2.22 2 2 0 012.03 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z" />
                        </svg></div>
                    <div>
                        <div class="c-lbl">Contact Numbers</div>
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
                        <div class="c-lbl">School Code &amp; CBSE Affiliation</div>
                        <div class="c-val">School Code: 51099 &nbsp;|&nbsp; CBSE Affiliation No. 1031141</div>
                    </div>
                </div>
            </div>
            <div class="adm-cta-box">
                <h3>Visit Our Campus</h3>
                <p>See our classrooms, laboratories, library and playground in person — meet our admission
                    counselor and get all your questions answered.</p>
                <a href="#enquiry" class="btn btn-green btn-lg">Book a Campus Visit</a>
            </div>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section">
    <div class="wrap">
        <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Admissions 2026–27
        </div>
        <h2>Give Your Child the Education They Deserve</h2>
        <p>Join the Nalanda family and watch your child thrive in a nurturing CBSE environment built for
            tomorrow's leaders.</p>
        <div class="cta-btns">
            <a href="#enquiry" class="btn btn-green btn-lg">Apply Now — 2026–27</a>
            <a href="tel:+917622227218" class="btn btn-gold btn-lg">Call Admission Team</a>
        </div>
    </div>
</section>



<!-- /* ═══════════════════════════════
       RESPONSIVE
    ═══════════════════════════════ */ -->
<style>
    @media (max-width: 1200px) {
        .hl-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .wing-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .wing-card.hi {
            grid-column: span 3
        }

        .fac-mini-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .stat-grid {
            grid-template-columns: repeat(3, 1fr)
        }

        .dl-grid {
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

        .adm-contact-grid {
            grid-template-columns: 1fr;
            gap: 28px
        }

        .elig-row {
            grid-template-columns: 1fr
        }

        .elig-row .ec {
            border-bottom: 1px solid var(--border)
        }

        .doc-grid {
            grid-template-columns: 1fr
        }

        .form-grid {
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

        .hl-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .wing-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .wing-card.hi {
            grid-column: span 2
        }

        .fac-mini-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .stat-grid {
            grid-template-columns: repeat(2, 1fr)
        }

        .dl-grid {
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
        .hl-grid {
            grid-template-columns: 1fr 1fr
        }

        .wing-grid {
            grid-template-columns: 1fr 1fr
        }

        .wing-card.hi {
            grid-column: span 2
        }

        .fac-mini-grid {
            grid-template-columns: 1fr 1fr
        }

        .stat-grid {
            grid-template-columns: 1fr 1fr
        }

        .step {
            gap: 14px
        }

        .step-n {
            width: 38px;
            height: 38px;
            font-size: 15px
        }

        .step::before {
            left: 18px
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

@endsection()
