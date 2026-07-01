@extends('layouts.app')

@section('title', 'Book List')

@section('content')

<style>
    /* ─── PAGE BANNER ─── */
    .pbanner {
        background: linear-gradient(140deg, var(--gold-lt) 0%, var(--green-lt) 55%, #f1f8f1 100%);
        padding: 70px 0 56px;
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

    .pbanner h1 {
        font-family: var(--serif);
        font-size: clamp(30px, 4.2vw, 50px);
        color: var(--ink);
        line-height: 1.12;
        letter-spacing: -.3px;
        margin: 18px 0 14px
    }

    .pbanner h1 em {
        font-style: italic;
        color: var(--green)
    }

    .pbanner p.tagline {
        font-size: 15.5px;
        color: var(--muted);
        max-width: 600px;
        margin: 0 auto;
        line-height: 1.8
    }

    .breadcrumb {
        display: flex;
        justify-content: center;
        gap: 8px;
        align-items: center;
        font-size: 12.5px;
        color: var(--muted);
        margin-top: 16px
    }

    .breadcrumb a {
        color: var(--green);
        font-weight: 600
    }

    /* ─── SECTION COMMON ─── */
    .sec {
        padding: 60px 0 88px
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
        margin-bottom: 10px
    }

    .sec-body {
        font-size: 15px;
        color: var(--muted);
        max-width: 600px;
        line-height: 1.78
    }

    .sec-head.c {
        text-align: center;
        margin-bottom: 36px
    }

    .sec-head.c .sec-body {
        margin: 0 auto
    }

    /* ─── CLASS TABS ─── */
    .class-tabs-wrap {
        position: sticky;
        top: 70px;
        z-index: 100;
        background: var(--cream);
        padding: 18px 0 10px;
        border-bottom: 1.5px solid var(--border)
    }

    .class-tabs {
        display: flex;
        gap: 8px;
        flex-wrap: wrap;
        justify-content: center
    }

    .ctab {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 22px;
        padding: 8px 18px;
        font-size: 13px;
        font-weight: 600;
        color: var(--ink2);
        cursor: pointer;
        transition: all .22s;
        white-space: nowrap
    }

    .ctab:hover {
        border-color: var(--green);
        background: var(--green-lt)
    }

    .ctab.active {
        background: var(--green);
        border-color: var(--green);
        color: #fff;
        box-shadow: 0 6px 16px rgba(46, 125, 50, .25)
    }

    /* ─── CLASS PANEL ─── */
    .class-panel {
        display: none;
        animation: fadeUp .4s ease
    }

    .class-panel.active {
        display: block
    }

    @keyframes fadeUp {
        from {
            opacity: 0;
            transform: translateY(14px)
        }

        to {
            opacity: 1;
            transform: translateY(0)
        }
    }

    .panel-head {
        text-align: center;
        margin: 36px 0 30px
    }

    .panel-head h3 {
        font-family: var(--serif);
        font-size: clamp(22px, 2.8vw, 32px);
        color: var(--green);
    }

    .panel-head p {
        font-size: 13px;
        color: var(--muted);
        margin-top: 6px
    }

    .table-card {
        background: var(--white);
        border: 1.5px solid var(--border);
        border-radius: 18px;
        overflow: hidden;
        margin-bottom: 24px
    }

    .table-card-head {
        display: flex;
        align-items: center;
        justify-content: space-between;
        gap: 10px;
        padding: 16px 22px;
        background: var(--green-lt);
        border-bottom: 1.5px solid var(--border);
        flex-wrap: wrap
    }

    .table-card-head h4 {
        font-size: 14.5px;
        font-weight: 700;
        color: var(--green);
        letter-spacing: .3px;
        text-transform: uppercase
    }

    .table-scroll {
        overflow-x: auto
    }

    table.dtable {
        width: 100%;
        border-collapse: collapse;
        min-width: 560px
    }

    table.dtable th {
        text-align: left;
        font-size: 11.5px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: .4px;
        color: var(--muted);
        padding: 12px 16px;
        border-bottom: 1.5px solid var(--border);
        background: var(--cream);
        white-space: nowrap
    }

    table.dtable td {
        padding: 12px 16px;
        font-size: 13.5px;
        color: var(--ink2);
        border-bottom: 1px solid var(--green-lt);
        vertical-align: top
    }

    table.dtable tr:last-child td {
        border-bottom: none
    }

    table.dtable tr:hover td {
        background: var(--green-lt)
    }

    table.dtable td.price {
        font-weight: 600;
        color: var(--green);
        white-space: nowrap
    }

    table.dtable td.isbn {
        font-size: 11.5px;
        color: var(--muted);
        font-family: monospace;
        white-space: nowrap
    }

    .total-row {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 16px 22px;
        background: var(--gold-lt);
        border-top: 1.5px solid var(--border)
    }

    .total-row .tl-label {
        font-size: 12.5px;
        font-weight: 700;
        color: var(--ink2);
        text-transform: uppercase;
        letter-spacing: .4px
    }

    .total-row .tl-amt {
        font-family: var(--serif);
        font-size: 22px;
        color: var(--red)
    }

    .panel-grid {
        display: grid;
        grid-template-columns: 1.4fr 1fr;
        gap: 24px;
        align-items: start
    }

    .note-box {
        background: var(--gold-lt);
        border: 1.5px solid #ffe082;
        border-radius: 14px;
        padding: 18px 20px;
        font-size: 13px;
        color: var(--ink2);
        line-height: 1.7;
        margin-bottom: 24px
    }

    .note-box strong {
        color: #f57f17
    }

    .add-list {
        display: flex;
        flex-direction: column;
        gap: 8px;
        padding: 16px 22px
    }

    .add-item {
        display: flex;
        align-items: center;
        gap: 9px;
        font-size: 13.5px;
        color: var(--ink2)
    }

    .add-dot {
        width: 6px;
        height: 6px;
        background: var(--green);
        border-radius: 50%;
        flex-shrink: 0
    }

    .subj-grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        padding: 22px
    }

    .subj-chip {
        background: var(--green-lt);
        border: 1.5px solid var(--border);
        border-radius: 10px;
        padding: 10px 12px;
        font-size: 12.5px;
        color: var(--ink2);
        transition: all .2s
    }

    .subj-chip:hover {
        border-color: var(--green);
        background: var(--white)
    }

    .subj-chip b {
        display: block;
        color: var(--green);
        font-size: 11px;
        font-weight: 700;
        margin-bottom: 2px
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
        max-width: 520px;
        margin: 0 auto 28px
    }

    .cta-btns {
        display: flex;
        gap: 14px;
        justify-content: center;
        flex-wrap: wrap
    }
</style>


<!-- PAGE BANNER -->
<section class="pbanner">
    <div class="pbanner-rays"></div>
    <div class="wrap">
        <div class="hero-tag" style="margin:0 auto;width:fit-content"><span class="hero-dot"></span>Session
            2026–27</div>
        <h1>Class-wise <em>Book &amp; Copy List</em></h1>
        <p class="tagline">Official textbooks, workbooks and notebook requirements for Nursery to Class XII —
            Session 2026–27.</p>
        <div class="breadcrumb"><a href="SimpleHPage.html">Home</a> <span>/</span> <span>Book List</span></div>
    </div>
</section>

<!-- CLASS TABS -->
<div class="class-tabs-wrap">
    <div class="wrap">
        <div class="class-tabs" id="class-tabs"></div>
    </div>
</div>

<!-- CLASS PANELS -->
<section class="sec">
    <div class="wrap">
        <div id="panels"></div>
    </div>
</section>

<!-- CTA -->
<section class="cta-section" id="admissions">
    <div class="wrap">
        <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Need Help?</div>
        <h2>Questions About Books or Admissions?</h2>
        <p>Our admission team is happy to guide you on book lists, fee structures, and the enrolment process for
            2026–27.</p>
        <div class="cta-btns">
            <a href="#contact" class="btn btn-green btn-lg">Contact Admission Team</a>
            <a href="SimpleHPage.html" class="btn btn-gold btn-lg">Back to Home</a>
        </div>
    </div>
</section>

<!-- CONTACT STRIP -->
<section class="sec" id="contact" style="padding:60px 0">
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


<!-- /* ═══════════════════════════════
           RESPONSIVE ═══════════════════════════════ */ -->
<style>
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

        .panel-grid {
            grid-template-columns: 1fr;
        }

        .subj-grid {
            grid-template-columns: repeat(2, 1fr);
        }

        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 28px;
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
            padding: 50px 0 40px;
        }

        .class-tabs-wrap {
            top: 70px;
        }

        .ctab {
            font-size: 12px;
            padding: 7px 14px;
        }

        .table-card-head {
            padding: 14px 16px;
        }

        .total-row {
            padding: 14px 16px;
            flex-direction: column;
            align-items: flex-start;
            gap: 4px;
        }

        .subj-grid {
            grid-template-columns: 1fr 1fr;
            padding: 16px;
        }

        .footer-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }

        .sec {
            padding: 40px 0 60px;
        }
    }

    @media (max-width: 480px) {
        .pbanner h1 {
            font-size: 26px;
        }

        .subj-grid {
            grid-template-columns: 1fr;
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


<script>

</script>
@endsection
