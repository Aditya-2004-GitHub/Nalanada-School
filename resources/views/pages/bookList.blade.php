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
    // ══════════ DATA ══════════
    const DATA = {
        nursery: {
            label: "Nursery",
            title: "Class – Nursery",
            sub: "Pre-Primary",
            books: [
                ["Start Smart Kit Nursery", "SKY BOOKS", "9789351871120", "₹1399"],
                ["अक्षरलेखन", "Redeemer Publication", "9789389363494", "₹170"],
                ["अक्षरज्ञान", "Redeemer Publication", "9789389363517", "₹160"],
                ["गीतसरगम-1", "Vista Educational Books", "9788178303505", "₹80"]
            ],
            total: "₹1809",
            copies: [
                ["3 in 1", "2", "General"],
                ["4 Line", "1", "EVS"],
                ["Plain Drawing Book", "1", "Drawing"]
            ],
            copyTotal: "4 Copies"
        },
        kg1: {
            label: "KG-1",
            title: "Class – KG-1",
            sub: "Pre-Primary",
            books: [
                ["Start Smart Kit LKG", "SKY BOOKS", "9789356871342", "₹1599"],
                ["शब्दलेखन", "Redeemer Publication", "9789389363487", "₹160"],
                ["शब्दज्ञान", "Redeemer Publication", "9789389363524", "₹160"],
                ["गीतसरगम-2", "Vista Educational Books", "9788178303512", "₹80"]
            ],
            total: "₹1999",
            copies: [
                ["4 Line", "4", "—"],
                ["Square (Maths)", "2", "—"],
                ["2 Line", "2", "—"],
                ["Plain Drawing Book", "1", "—"]
            ],
            copyTotal: "9 Copies"
        },
        kg2: {
            label: "KG-2",
            title: "Class – KG-2",
            sub: "Pre-Primary",
            books: [
                ["Start Smart Kit UKG", "SKY BOOKS", "9789356871601", "₹1699"],
                ["स्वरलेखन", "Redeemer Publication", "9789389363470", "₹160"],
                ["स्वरज्ञान", "Redeemer Publication", "9789389363500", "₹160"],
                ["गीतसरगम-3", "Vista Educational Books", "9788178303635", "₹80"]
            ],
            total: "₹2099",
            copies: [
                ["4 Line", "4", "—"],
                ["Square (Maths)", "2", "—"],
                ["2 Line", "2", "—"],
                ["Plain Drawing Book", "1", "—"]
            ],
            copyTotal: "9 Copies"
        },
        "1": {
            label: "I",
            title: "Class – I",
            sub: "Primary",
            books: [
                ["English (Mridang)", "NCERT", "9789352924394", "₹65"],
                ["English (Mridang) Workbook", "Arihant", "9789364370387", "₹150"],
                ["Hindi (Sarangi)", "NCERT", "9789352924233", "₹65"],
                ["Hindi (Sarangi) Workbook", "Arihant", "9789364370257", "₹160"],
                ["Smart Maths", "S. Chand", "9789355019110", "₹430"],
                ["My Green World-1 (EVS)", "Millennium Booksource", "9789394041295", "₹329"],
                ["Computer Magic", "RatnaSagar", "9789387208209", "₹284"],
                ["Knowledge Garden (GK)", "Devsiddh", "9788194325338", "₹250"],
                ["Righteous (Moral Values)", "Devsiddh", "9788193783498", "₹200"]
            ],
            total: "₹1933",
            copies: [
                ["Four Line (200 Pg)", "2", "English, GK, Moral Science"],
                ["Two Line (200 Pg)", "1", "Hindi"],
                ["Square (200 Pg)", "1", "Maths"],
                ["Plain Drawing Copy", "1", "Drawing"],
                ["Practical Four Line", "2", "EVS, Computer"],
                ["Test Copies (100 Pg)", "6", "All Subjects"],
                ["Rough Register", "1", "All Subjects"]
            ],
            copyTotal: "14 Copies"
        },
        "2": {
            label: "II",
            title: "Class – II",
            sub: "Primary",
            books: [
                ["English (Mridang)", "NCERT", "9789352924349", "₹65"],
                ["English (Mridang) Workbook", "Arihant Prakashan", "9789364373289", "₹150"],
                ["Hindi (Sarangi)", "NCERT", "9789352924387", "₹65"],
                ["Hindi (Sarangi) Workbook", "Arihant Prakashan", "9789364370813", "₹175"],
                ["Smart Maths", "S. Chand", "9789355019127", "₹435"],
                ["Maths Workbook", "Arihant Prakashan", "—", "—"],
                ["My Green World-2 (EVS)", "Millennium Booksource", "9394041281", "₹369"],
                ["Computer Magic", "RatnaSagar", "9789387208216", "₹329"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658564", "₹280"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849507", "₹210"]
            ],
            total: "₹2078",
            copies: [
                ["Four Line (200 Pg)", "2", "English, GK, Moral Science"],
                ["Two Line (200 Pg)", "1", "Hindi"],
                ["Maths Copy / Square (200 Pg)", "1", "Mathematics"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"],
                ["Practical Four Line (200 Pg)", "2", "EVS, Computer"],
                ["Test Copies (100 Pg)", "6", "All Subjects"],
                ["Rough Register", "1", "All Subjects"]
            ],
            copyTotal: "7 Regular + 6 Test + 1 Rough"
        },
        "3": {
            label: "III",
            title: "Class – III",
            sub: "Primary",
            books: [
                ["English (Santoor)", "NCERT", "9789352929917", "₹65"],
                ["English (Santoor) Workbook", "Arihant Prakashan", "9789364374996", "₹160"],
                ["Hindi (Veena)", "NCERT", "9789352929498", "₹65"],
                ["Hindi (Veena) Workbook", "Arihant Prakashan", "9789364371117", "₹175"],
                ["Smart Maths", "S. Chand", "9789364682152", "₹535"],
                ["Maths Mela (Workbook)", "Arihant Prakashan", "—", "—"],
                ["Our Wondrous World (EVS)", "NCERT", "9789352928637", "₹65"],
                ["EVS Workbook", "Arihant Prakashan", "—", "—"],
                ["Computer Magic", "RatnaSagar", "9789387208223", "₹364"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658922", "₹280"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849514", "₹210"]
            ],
            total: "₹1919",
            copies: [
                ["Four Line (200 Pg)", "2", "English, GK, Moral Science"],
                ["Two Line (200 Pg)", "1", "Hindi"],
                ["Square Copy (200 Pg)", "1", "Mathematics"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"],
                ["Practical Four Line (200 Pg)", "2", "EVS, Computer"]
            ],
            copyTotal: "7 Regular + 6 Test + 1 Rough"
        },
        "4": {
            label: "IV",
            title: "Class – IV",
            sub: "Primary",
            books: [
                ["English (Santoor)", "NCERT", "9789357299329", "₹65"],
                ["Hindi (Veena)", "NCERT", "9789357293372", "₹65"],
                ["Smart Maths", "S. Chand", "9789369583645", "₹550"],
                ["Math-Magic (Workbook)", "Arihant Prakashan", "—", "₹160"],
                ["Our Wondrous World (EVS)", "NCERT", "9789357291231", "₹65"],
                ["EVS Workbook", "Arihant Prakashan", "—", "₹175"],
                ["Computer Magic", "RatnaSagar", "9789387208230", "₹279"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658472", "₹280"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849521", "₹220"]
            ],
            total: "₹1859",
            copies: [
                ["Single Line Register (200 Pg)", "3", "English, Maths, Hindi"],
                ["Practical Register (200 Pg)", "2", "Computer, EVS"],
                ["Rough Register (200 Pg)", "1", "All Subjects"],
                ["One Line Copy (100 Pg)", "4", "GK, Moral Science, Eng Grammar, Hindi Grammar"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"]
            ],
            copyTotal: "11 Copies + 6 Test"
        },
        "5": {
            label: "V",
            title: "Class – V",
            sub: "Primary",
            books: [
                ["English (Santoor)", "NCERT", "9789357290623", "₹65"],
                ["Hindi (Veena)", "NCERT", "9789357296670", "₹65"],
                ["Smart Maths", "S. Chand", "9789369584390", "₹580"],
                ["Math-Magic (Workbook)", "Arihant Prakashan", "9789364372756", "₹160"],
                ["Our Wondrous World (EVS)", "NCERT", "9789357290302", "₹65"],
                ["Computer Magic", "RatnaSagar", "9789387208247", "₹399"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658540", "₹280"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849538", "₹220"]
            ],
            total: "₹1834",
            copies: [
                ["Single Line Register (200 Pg)", "3", "English, Maths, Hindi"],
                ["Practical Register (200 Pg)", "2", "Computer, EVS"],
                ["Rough Register (200 Pg)", "1", "All Subjects"],
                ["One Line Copy (100 Pg)", "4", "GK, Moral Science, Eng Grammar, Hindi Grammar"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"]
            ],
            copyTotal: "11 Copies + 6 Test"
        },
        "6": {
            label: "VI",
            title: "Class – VI",
            sub: "Middle School",
            books: [
                ["English (Poorvi)", "NCERT", "9789352929825", "₹65"],
                ["Grammar World (English, optional)", "Devsiddh", "9788193783450", "₹350"],
                ["Hindi (Malhar)", "NCERT", "9789352929467", "₹65"],
                ["नई किरण हिंदी व्याकरण (optional)", "Devsiddh", "9789391658090", "₹320"],
                ["Sanskrit (Deepkam)", "NCERT", "9789352929238", "₹65"],
                ["Ganita Prakash", "NCERT", "9789352927173", "₹65"],
                ["Curiosity (Science)", "NCERT", "9789352929726", "₹65"],
                ["Exploring Society: India &amp; Beyond", "NCERT", "9789352926930", "₹65"],
                ["Computer Magic (IT)", "RatnaSagar", "9789387208254", "₹459"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658755", "₹300"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849545", "₹240"],
                ["Drawing Book (Blank)", "—", "—", "—"]
            ],
            total: "₹2059",
            copies: [
                ["Single Line Register (200 Pg)", "4", "English, Hindi, Maths, Sanskrit"],
                ["Practical Register (200 Pg)", "3", "Computer, Geography, Science"],
                ["Single Line Register (100 Pg)", "4", "History, Hindi/Eng Grammar, GK & Moral"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"],
                ["Music Copy (50 Pg)", "1", "Music"],
                ["Rough Copy (200 Pg)", "1", "All Subjects"],
                ["Test Copies (50 Pg)", "7", "All Subjects"]
            ],
            copyTotal: "21 Copies"
        },
        "7": {
            label: "VII",
            title: "Class – VII",
            sub: "Middle School",
            books: [
                ["English (Poorvi)", "NCERT", "9789357297592", "₹65"],
                ["Grammar World (English, optional)", "Devsiddh", "9788193783467", "₹300"],
                ["Hindi (Malhar)", "NCERT", "9789357299572", "₹65"],
                ["नई किरण हिंदी व्याकरण (optional)", "Devsiddh", "9789391658106", "₹340"],
                ["Sanskrit (Deepkam)", "NCERT", "9789357296861", "₹65"],
                ["Ganita Prakash Part-I", "NCERT", "9789357299831", "₹65"],
                ["Ganita Prakash Part-II", "NCERT", "9789357291569", "₹65"],
                ["Curiosity (Science)", "NCERT", "9789357290395", "₹65"],
                ["Exploring Society Part-I", "NCERT", "9789357292870", "₹65"],
                ["Exploring Society Part-II", "NCERT", "9789357261415", "₹65"],
                ["Computer Magic (IT)", "RatnaSagar", "9789387208261", "₹469"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9789391658588", "₹300"],
                ["Righteous (Moral, optional)", "Devsiddh", "9788193849552", "₹230"],
                ["Drawing Book (Blank)", "—", "—", "—"]
            ],
            total: "₹2159",
            copies: [
                ["Single Line Register (200 Pg)", "6", "English, Hindi, Maths, Sanskrit, Civics, History"],
                ["Practical Register (200 Pg)", "3", "Computer, Geography, Science"],
                ["Single Line Register (100 Pg)", "3", "Hindi/Eng Grammar, GK & Moral"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"],
                ["Music Copy (50 Pg)", "1", "Music"],
                ["Rough Copy (200 Pg)", "1", "All Subjects"],
                ["Test Copies (50 Pg)", "7", "All Subjects"]
            ],
            copyTotal: "22 Copies"
        },
        "8": {
            label: "VIII",
            title: "Class – VIII",
            sub: "Middle School",
            books: [
                ["English (Poorvi)", "NCERT", "9789357299404", "₹65"],
                ["Grammar World (English, optional)", "Devsiddh", "9788193783474", "₹360"],
                ["Hindi (Malhar)", "NCERT", "9789357293600", "₹65"],
                ["नई किरण हिंदी व्याकरण (optional)", "Devsiddh", "9789391658120", "₹360"],
                ["Sanskrit (Deepkam)", "NCERT", "9789357292948", "₹65"],
                ["Ganita Prakash Part-I", "NCERT", "9789357296427", "₹65"],
                ["Ganita Prakash Part-II", "NCERT", "9789357291064", "₹65"],
                ["Curiosity (Science)", "NCERT", "9789357297721", "₹65"],
                ["Exploring Society Part-I", "NCERT", "9789357292931", "₹65"],
                ["Computer Magic (IT)", "RatnaSagar", "9789387208278", "₹459"],
                ["Knowledge Garden (GK, optional)", "Devsiddh", "9788193871461", "₹250"],
                ["Righteous (Moral, optional)", "Devsiddh", "9789193849569", "₹250"],
                ["Drawing Book (Blank)", "—", "—", "—"]
            ],
            total: "₹2134",
            copies: [
                ["Single Line Register (200 Pg)", "4", "English, Hindi, Maths, Sanskrit"],
                ["Practical Register (200 Pg)", "3", "Computer, Geography, Science"],
                ["Single Line Register (100 Pg)", "4", "History, Hindi/Eng Grammar, GK & Moral"],
                ["Plain Drawing Copy (50 Pg)", "1", "Drawing"],
                ["Music Copy (50 Pg)", "1", "Music"],
                ["Rough Copy (200 Pg)", "1", "All Subjects"],
                ["Test Copies (50 Pg)", "7", "All Subjects"]
            ],
            copyTotal: "21 Copies"
        },
        "9": {
            label: "IX",
            title: "Class – IX",
            sub: "Secondary",
            books: [
                ["Beehive (English Lit.)", "NCERT", "—", "₹65"],
                ["Moment (English Supp.)", "NCERT", "—", "₹40"],
                ["Kshitij (Hindi Course-A)", "NCERT", "—", "₹55"],
                ["Kritika (Hindi Supp.)", "NCERT", "—", "₹25"],
                ["Mathematics", "NCERT", "—", "₹160"],
                ["Science", "NCERT", "—", "₹149"],
                ["History", "NCERT", "—", "₹115"],
                ["Geography", "NCERT", "—", "₹55"],
                ["Civics", "NCERT", "—", "₹90"],
                ["Economics", "NCERT", "—", "₹45"],
                ["Information Technology", "Dhanpat Rai & Co.", "—", "₹495"]
            ],
            total: "₹1294",
            copies: [],
            copyTotal: ""
        },
        "10": {
            label: "X",
            title: "Class – X",
            sub: "Secondary",
            books: [
                ["First Flight (English Lit.)", "NCERT", "—", "₹65"],
                ["Foot Prints (English Supp.)", "NCERT", "—", "₹40"],
                ["Kshitij (Hindi Course-A)", "NCERT", "—", "₹55"],
                ["Kritika (Hindi Supp.)", "NCERT", "—", "₹25"],
                ["Mathematics", "NCERT", "—", "—"],
                ["Science", "NCERT", "—", "—"],
                ["History", "NCERT", "—", "₹125"],
                ["Geography", "NCERT", "—", "₹68"],
                ["Civics", "NCERT", "—", "₹90"],
                ["Economics", "NCERT", "—", "₹65"],
                ["Information Technology (402)", "Dhanpat Rai & Co.", "—", "₹495"]
            ],
            total: "₹963",
            copies: [],
            copyTotal: ""
        },
        "11": {
            label: "XI",
            title: "Class – XI",
            sub: "Senior Secondary",
            subjects: [
                ["102", "Hindi Elective"],
                ["301", "English Core"],
                ["083", "Computer Science"],
                ["048", "Physical Education"],
                ["054", "Business Studies"],
                ["030", "Economics"],
                ["055", "Accountancy"],
                ["041", "Mathematics"],
                ["042", "Physics"],
                ["043", "Chemistry"],
                ["044", "Biology"]
            ],
            note: "ISBN, price and copy list are not specified for Class XI in the official book list — all listed textbooks are published by NCERT. Please contact the school office for current pricing."
        },
        "12": {
            label: "XII",
            title: "Class – XII",
            sub: "Senior Secondary",
            subjects: [
                ["102", "Hindi Elective"],
                ["301", "English Core"],
                ["083", "Computer Science"],
                ["048", "Physical Education"],
                ["054", "Business Studies"],
                ["030", "Economics"],
                ["055", "Accountancy"],
                ["041", "Mathematics"],
                ["042", "Physics"],
                ["043", "Chemistry"],
                ["044", "Biology"]
            ],
            note: "ISBN, price and copy list are not specified for Class XII in the official book list — all listed textbooks are published by NCERT. Please contact the school office for current pricing."
        }
    };

    const ORDER = ["nursery", "kg1", "kg2", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12"];

    function buildTabs() {
        const wrap = document.getElementById('class-tabs');
        ORDER.forEach((key, i) => {
            const b = document.createElement('button');
            b.className = 'ctab' + (i === 0 ? ' active' : '');
            b.textContent = DATA[key].label;
            b.dataset.key = key;
            b.onclick = () => selectClass(key);
            wrap.appendChild(b);
        });
    }

    function renderBookTable(d) {
        let rows = d.books.map(b => `<tr><td>${b[0]}</td><td>${b[1]}</td><td class="isbn">${b[2]}</td><td class="price">${b[3]}</td></tr>`).join('');
        return `<div class="table-card">
                <div class="table-card-head"><h4>📚 Text Books &amp; Workbooks</h4></div>
                <div class="table-scroll"><table class="dtable">
                    <thead><tr><th>Book Name</th><th>Publisher</th><th>ISBN</th><th>Price</th></tr></thead>
                    <tbody>${rows}</tbody>
                </table></div>
                <div class="total-row"><span class="tl-label">Total Book Cost</span><span class="tl-amt">${d.total}</span></div>
            </div>`;
    }

    function renderCopyTable(d) {
        if (!d.copies.length) return '';
        let rows = d.copies.map(c => `<tr><td>${c[0]}</td><td>${c[1]}</td><td>${c[2]}</td></tr>`).join('');
        return `<div class="table-card">
                <div class="table-card-head"><h4>📓 Copy / Notebook List</h4></div>
                <div class="table-scroll"><table class="dtable">
                    <thead><tr><th>Copy Type</th><th>Qty</th><th>Subject / Purpose</th></tr></thead>
                    <tbody>${rows}</tbody>
                </table></div>
                <div class="total-row"><span class="tl-label">Total Copies</span><span class="tl-amt" style="font-size:18px">${d.copyTotal}</span></div>
            </div>`;
    }

    function renderSubjectPanel(d) {
        let chips = d.subjects.map(s => `<div class="subj-chip"><b>${s[0]}</b>${s[1]}</div>`).join('');
        return `<div class="note-box"><strong>Note:</strong> ${d.note}</div>
            <div class="table-card">
                <div class="table-card-head"><h4>📘 Subject-wise Book List (Publisher: NCERT)</h4></div>
                <div class="subj-grid">${chips}</div>
            </div>`;
    }

    function buildPanels() {
        const wrap = document.getElementById('panels');
        ORDER.forEach((key, i) => {
            const d = DATA[key];
            const panel = document.createElement('div');
            panel.className = 'class-panel' + (i === 0 ? ' active' : '');
            panel.id = 'panel-' + key;
            let inner = `<div class="panel-head"><h3>${d.title}</h3><p>${d.sub} · Session 2026–27</p></div>`;
            if (d.subjects) {
                inner += renderSubjectPanel(d);
            } else {
                inner += `<div class="panel-grid"><div>${renderBookTable(d)}</div><div>${renderCopyTable(d)}</div></div>`;
            }
            panel.innerHTML = inner;
            wrap.appendChild(panel);
        });
    }

    function selectClass(key) {
        document.querySelectorAll('.ctab').forEach(b => b.classList.toggle('active', b.dataset.key === key));
        document.querySelectorAll('.class-panel').forEach(p => p.classList.toggle('active', p.id === 'panel-' + key));
        document.querySelector('.class-tabs-wrap').scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }

    buildTabs();
    buildPanels();
</script>
@endsection
