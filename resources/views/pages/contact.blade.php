@extends('layouts.app')

@section('title', 'Contact Us')

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

        /* ─── QUICK CONTACT CARDS ─── */
        .qc-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 18px
        }

        .qc-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 26px 22px;
            transition: all .25s
        }

        .qc-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .qc-icon {
            width: 46px;
            height: 46px;
            background: var(--green-lt);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 14px
        }

        .qc-icon svg {
            width: 21px;
            height: 21px;
            stroke: var(--green);
            fill: none;
            stroke-width: 1.8
        }

        .qc-card h4 {
            font-family: var(--serif);
            font-size: 16px;
            color: var(--ink);
            margin-bottom: 8px
        }

        .qc-card p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.6
        }

        .qc-card a {
            color: var(--green);
            font-weight: 600
        }

        .qc-card a:hover {
            color: var(--red)
        }

        /* ─── INFO TABLE ─── */
        .info-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden
        }

        .info-row {
            display: grid;
            grid-template-columns: 220px 1fr;
            border-bottom: 1px solid var(--green-lt)
        }

        .info-row:last-child {
            border-bottom: none
        }

        .info-row .ic {
            background: var(--green-lt);
            padding: 15px 20px;
            font-weight: 600;
            font-size: 13px;
            color: var(--green);
            display: flex;
            align-items: center
        }

        .info-row .iv {
            padding: 15px 20px;
            font-size: 13.5px;
            color: var(--ink2);
            display: flex;
            align-items: center
        }

        /* ─── FORM ─── */
        .form-box {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 20px;
            padding: 36px;
            max-width: 780px;
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

        .form-field label .req {
            color: var(--red)
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

        .captcha-box {
            display: flex;
            align-items: center;
            gap: 12px;
            background: var(--green-lt);
            border: 1.5px dashed var(--green-mid);
            border-radius: 10px;
            padding: 12px 16px;
            margin-top: 4px
        }

        .captcha-num {
            font-family: var(--serif);
            font-size: 18px;
            color: var(--green);
            letter-spacing: 3px;
            font-style: italic;
            user-select: none
        }

        .captcha-box input {
            flex: 1
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

        /* ─── OFFICE HOURS ─── */
        .hours-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            max-width: 500px;
            margin: 0 auto
        }

        .hours-row {
            display: grid;
            grid-template-columns: 1fr 1fr;
            border-bottom: 1px solid var(--green-lt)
        }

        .hours-row:last-child {
            border-bottom: none
        }

        .hours-row div {
            padding: 15px 20px;
            font-size: 13.5px
        }

        .hours-row .hd {
            font-weight: 600;
            color: var(--ink);
            background: var(--green-lt)
        }

        .hours-row .ht {
            color: var(--muted)
        }

        /* ─── MAP ─── */
        .map-box {
            border-radius: 20px;
            overflow: hidden;
            border: 1.5px solid var(--border);
            max-width: 980px;
            margin: 0 auto
        }

        .map-box iframe {
            width: 100%;
            height: 420px;
            border: 0;
            display: block
        }

        .map-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 14px;
            background: var(--white);
            padding: 18px 24px
        }

        .map-info-text {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.6
        }

        .map-info-text strong {
            color: var(--ink);
            font-family: var(--serif);
            font-size: 15px;
            display: block;
            margin-bottom: 3px
        }

        .map-btns {
            display: flex;
            gap: 10px;
            flex-wrap: wrap
        }

        /* ─── DEPARTMENT DIRECTORY ─── */
        .dept-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            max-width: 800px;
            margin: 0 auto
        }

        .dept-row {
            display: grid;
            grid-template-columns: 240px 1fr;
            border-bottom: 1px solid var(--green-lt);
            transition: background .2s
        }

        .dept-row:last-child {
            border-bottom: none
        }

        .dept-row:hover {
            background: var(--green-lt)
        }

        .dept-row .dn {
            padding: 16px 20px;
            font-weight: 600;
            font-size: 13.5px;
            color: var(--green);
            display: flex;
            align-items: center;
            gap: 10px
        }

        .dept-row .dn::before {
            content: '';
            width: 7px;
            height: 7px;
            background: var(--green);
            border-radius: 50%;
            flex-shrink: 0
        }

        .dept-row .dp {
            padding: 16px 20px;
            font-size: 13px;
            color: var(--muted);
            display: flex;
            align-items: center
        }

        /* ─── WHY CONTACT CARDS ─── */
        .why-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px
        }

        .why-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 22px 16px;
            text-align: center;
            transition: all .25s
        }

        .why-card:hover {
            border-color: var(--gold-mid);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
        }

        .why-card:hover .wci {
            background: var(--gold);
        }

        .why-card:hover .wci svg {
            stroke: var(--ink)
        }

        .wci {
            width: 44px;
            height: 44px;
            background: var(--gold-lt);
            border: 1.5px solid #ffe082;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            transition: all .28s
        }

        .wci svg {
            width: 20px;
            height: 20px;
            stroke: var(--gold);
            fill: none;
            stroke-width: 1.8;
            transition: stroke .28s
        }

        .why-card h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
            margin-bottom: 6px
        }

        .why-card p {
            font-size: 11.5px;
            color: var(--muted);
            line-height: 1.5
        }

        /* ─── CBSE INFO BOX ─── */
        .cbse-box {
            background: linear-gradient(135deg, var(--gold-lt) 0%, #fffef5 50%, var(--green-lt) 100%);
            border: 2px solid var(--border);
            border-radius: 20px;
            padding: 40px;
            max-width: 720px;
            margin: 0 auto;
            text-align: center
        }

        .cbse-box h3 {
            font-family: var(--serif);
            font-size: 22px;
            color: var(--ink);
            margin-bottom: 22px
        }

        .cbse-rows {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
            margin-bottom: 26px;
            text-align: left
        }

        .cbse-rows > div {
            background: var(--white);
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 12px 16px
        }

        .cbse-rows .cl {
            font-size: 10.5px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            color: var(--muted)
        }

        .cbse-rows .cv {
            font-size: 14px;
            font-weight: 600;
            color: var(--ink);
            margin-top: 3px
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

 <!-- 1: PAGE BANNER -->
    <section class="page-hero" id="banner">
        <div class="page-hero-rays"></div>
        <div class="wrap">
            <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; Contact Us</div>
            <div class="hero-tag"><span class="hero-dot"></span>We'd Love to Hear From You</div>
            <h1>Contact <em>Nalanda</em> Higher Secondary School</h1>
            <p>We are here to assist students, parents, and visitors with admissions, academics, and general
                enquiries.</p>
            <div class="cta-btns">
                <a href="tel:+917622227218" class="btn btn-green btn-lg">Call Now</a>
                <a href="#general-enquiry" class="btn btn-gold btn-lg">Send Enquiry</a>
                <a href="#map" class="btn btn-ghost btn-lg">Get Directions</a>
            </div>
        </div>
    </section>

    <!-- SUB NAV -->
    <div class="subnav">
        <div class="subnav-inner">
            <a href="#quick-contact">Quick Contact</a>
            <a href="#info">School Info</a>
            <a href="#admission-enquiry">Admission Enquiry</a>
            <a href="#general-enquiry">General Enquiry</a>
            <a href="#map">Locate Us</a>
            <a href="#departments">Departments</a>
            <a href="#why-contact">Why Contact Us</a>
            <a href="#cbse-info">CBSE Info</a>
            <a href="#faq">FAQs</a>
        </div>
    </div>

    <!-- 2: QUICK CONTACT CARDS -->
    <section class="sec" id="quick-contact">
        <div class="wrap">
            <div class="qc-grid">
                <div class="qc-card">
                    <div class="qc-icon"><svg viewBox="0 0 24 24"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0118 0z"/><circle cx="12" cy="10" r="3"/></svg></div>
                    <h4>School Address</h4>
                    <p>Nalanda Higher Secondary School<br>Opposite Collectorate Office,<br>Maharana Pratap Ward,
                        Jhinjhiri, Katni,<br>Madhya Pradesh – 483501</p>
                </div>
                <div class="qc-card">
                    <div class="qc-icon"><svg viewBox="0 0 24 24"><path d="M22 16.92v3a2 2 0 01-2.18 2A19.79 19.79 0 013.07 10.8 19.79 19.79 0 01.06 2.22 2 2 0 012.03 0h3a2 2 0 012 1.72 12.84 12.84 0 00.7 2.81 2 2 0 01-.45 2.11L6.09 7.91a16 16 0 006 6l1.27-1.27a2 2 0 012.11-.45 12.84 12.84 0 002.81.7A2 2 0 0122 16.92z"/></svg></div>
                    <h4>Call Us</h4>
                    <p><a href="tel:+917622227218">+91 7622 227218</a><br><a href="tel:+916263454820">+91 6263 454820</a></p>
                </div>
                <div class="qc-card">
                    <div class="qc-icon"><svg viewBox="0 0 24 24"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M9 9h6M9 12h6M9 15h4"/></svg></div>
                    <h4>School Code</h4>
                    <p>51099</p>
                </div>
                <div class="qc-card">
                    <div class="qc-icon"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
                    <h4>CBSE Affiliation</h4>
                    <p>Affiliation No. 1031141</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 3: CONTACT INFORMATION -->
    <section class="sec sec-alt" id="info">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Details</div>
                <h2 class="sec-title">School Information</h2>
            </div>
            <div class="info-table" style="max-width:680px;margin:0 auto 50px">
                <div class="info-row"><div class="ic">School Name</div><div class="iv">Nalanda Higher Secondary School</div></div>
                <div class="info-row"><div class="ic">Board</div><div class="iv">CBSE</div></div>
                <div class="info-row"><div class="ic">Affiliation No.</div><div class="iv">1031141</div></div>
                <div class="info-row"><div class="ic">School Code</div><div class="iv">51099</div></div>
                <div class="info-row"><div class="ic">School Type</div><div class="iv">Independent</div></div>
                <div class="info-row"><div class="ic">School Status</div><div class="iv">Senior Secondary</div></div>
                <div class="info-row"><div class="ic">Established</div><div class="iv">2010</div></div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Office Hours</h3>
            <div class="hours-table">
                <div class="hours-row"><div class="hd">Monday – Saturday</div><div class="ht">8:00 AM – 4:00 PM</div></div>
                <div class="hours-row"><div class="hd">Sunday</div><div class="ht">Closed</div></div>
            </div>
        </div>
    </section>

    <!-- 4: ADMISSION ENQUIRY FORM -->
    <section class="sec" id="admission-enquiry">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Get Started</div>
                <h2 class="sec-title">Interested in Admission?</h2>
                <p class="sec-body">Fill in the details below and our admission team will get back to you shortly.</p>
            </div>
            <div class="form-box">
                <form onsubmit="event.preventDefault(); alert('Thank you! Your admission enquiry has been noted. Our admission team will contact you shortly.'); this.reset();">
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="aStudentName">Student Name <span class="req">*</span></label>
                            <input type="text" id="aStudentName" placeholder="Enter student's full name" required>
                        </div>
                        <div class="form-field">
                            <label for="aParentName">Parent Name <span class="req">*</span></label>
                            <input type="text" id="aParentName" placeholder="Enter parent's full name" required>
                        </div>
                        <div class="form-field">
                            <label for="aMobile">Mobile Number <span class="req">*</span></label>
                            <input type="tel" id="aMobile" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="form-field">
                            <label for="aEmail">Email Address</label>
                            <input type="email" id="aEmail" placeholder="you@example.com">
                        </div>
                        <div class="form-field">
                            <label for="aClass">Class Seeking Admission <span class="req">*</span></label>
                            <select id="aClass" required>
                                <option value="">Select Class</option>
                                <option>Nursery</option>
                                <option>KG-I</option>
                                <option>KG-II</option>
                                <option>I – XII</option>
                            </select>
                        </div>
                        <div class="form-field">
                            <label for="aCurrentSchool">Current School</label>
                            <input type="text" id="aCurrentSchool" placeholder="Name of current school">
                        </div>
                        <div class="form-field full">
                            <label for="aCity">City</label>
                            <input type="text" id="aCity" placeholder="Your city">
                        </div>
                        <div class="form-field full">
                            <label for="aMessage">Message</label>
                            <textarea id="aMessage" placeholder="Any additional information you'd like to share"></textarea>
                        </div>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-green btn-lg">Submit Admission Enquiry</button>
                    </div>
                    <p class="form-note">By submitting, you agree to be contacted by Nalanda Higher Secondary School
                        regarding your enquiry.</p>
                </form>
            </div>
        </div>
    </section>

    <!-- 5: GENERAL ENQUIRY FORM -->
    <section class="sec sec-gold" id="general-enquiry">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Get In Touch</div>
                <h2 class="sec-title">Have a Question?</h2>
                <p class="sec-body">For any general queries, write to us and our team will respond promptly.</p>
            </div>
            <div class="form-box">
                <form id="generalForm" onsubmit="return handleGeneralSubmit(event)">
                    <div class="form-grid">
                        <div class="form-field">
                            <label for="gName">Full Name <span class="req">*</span></label>
                            <input type="text" id="gName" placeholder="Enter your full name" required>
                        </div>
                        <div class="form-field">
                            <label for="gPhone">Phone Number <span class="req">*</span></label>
                            <input type="tel" id="gPhone" placeholder="+91 XXXXX XXXXX" required>
                        </div>
                        <div class="form-field">
                            <label for="gEmail">Email <span class="req">*</span></label>
                            <input type="email" id="gEmail" placeholder="you@example.com" required>
                        </div>
                        <div class="form-field">
                            <label for="gSubject">Subject <span class="req">*</span></label>
                            <input type="text" id="gSubject" placeholder="What is this regarding?" required>
                        </div>
                        <div class="form-field full">
                            <label for="gMessage">Message <span class="req">*</span></label>
                            <textarea id="gMessage" placeholder="Write your message here" required></textarea>
                        </div>
                        <div class="form-field full">
                            <label for="gCaptcha">Verify You're Human <span class="req">*</span></label>
                            <div class="captcha-box">
                                <span class="captcha-num" id="captchaNum">7 + 5 = ?</span>
                                <input type="text" id="gCaptcha" placeholder="Enter answer" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <button type="submit" class="btn btn-green btn-lg">Submit Enquiry</button>
                    </div>
                    <p class="form-note">We typically respond within 1–2 working days.</p>
                </form>
            </div>
        </div>
    </section>

    <!-- 6: GOOGLE MAP -->
    <section class="sec" id="map">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Find Us</div>
                <h2 class="sec-title">Locate Our Campus</h2>
            </div>
            <div class="map-box">
                <iframe
                    src="https://www.google.com/maps?q=Nalanda+Higher+Secondary+School,+Maharana+Pratap+Ward,+Jhinjhiri,+Katni,+MP+483501&output=embed"
                    loading="lazy" referrerpolicy="no-referrer-when-downgrade"
                    title="Nalanda Higher Secondary School Map"></iframe>
                <div class="map-info">
                    <div class="map-info-text">
                        <strong>Nalanda Higher Secondary School</strong>
                        Maharana Pratap Ward, Jhinjhiri, In Front of Collectorate Office, Katni, MP – 483501
                    </div>
                    <div class="map-btns">
                        <a href="https://www.google.com/maps/dir/?api=1&destination=Nalanda+Higher+Secondary+School,+Jhinjhiri,+Katni,+MP+483501"
                            target="_blank" rel="noopener" class="btn btn-green">Get Directions</a>
                        <a href="https://www.google.com/maps?q=Nalanda+Higher+Secondary+School,+Jhinjhiri,+Katni,+MP+483501"
                            target="_blank" rel="noopener" class="btn btn-ghost">Open in Google Maps</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 7: DEPARTMENT DIRECTORY -->
    <section class="sec sec-alt" id="departments">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Direct Lines</div>
                <h2 class="sec-title">Contact School Departments</h2>
            </div>
            <div class="dept-table">
                <div class="dept-row"><div class="dn">Admissions Office</div><div class="dp">New Admissions</div></div>
                <div class="dept-row"><div class="dn">Principal Office</div><div class="dp">Academic &amp; Administrative Matters</div></div>
                <div class="dept-row"><div class="dn">Examination Department</div><div class="dp">Exams &amp; Results</div></div>
                <div class="dept-row"><div class="dn">Accounts Office</div><div class="dp">Fee Related Queries</div></div>
                <div class="dept-row"><div class="dn">Transport Desk</div><div class="dp">Transport Support</div></div>
                <div class="dept-row"><div class="dn">Student Counseling</div><div class="dp">Student Guidance</div></div>
                <div class="dept-row"><div class="dn">Library</div><div class="dp">Library Services</div></div>
            </div>
        </div>
    </section>

    <!-- 8: WHY CONTACT NALANDA -->
    <section class="sec" id="why-contact">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">How We Can Help</div>
                <h2 class="sec-title">Why Contact Nalanda?</h2>
            </div>
            <div class="why-grid">
                <div class="why-card">
                    <div class="wci"><svg viewBox="0 0 24 24"><path d="M22 10v6M2 10l10-5 10 5-10 5z"/><path d="M6 12v5c3 3 9 3 12 0v-5"/></svg></div>
                    <h4>Admission Guidance</h4>
                    <p>Admission process support</p>
                </div>
                <div class="why-card">
                    <div class="wci"><svg viewBox="0 0 24 24"><path d="M4 19.5A2.5 2.5 0 016.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 014 19.5v-15A2.5 2.5 0 016.5 2z"/></svg></div>
                    <h4>Academic Information</h4>
                    <p>Curriculum &amp; class information</p>
                </div>
                <div class="why-card">
                    <div class="wci"><svg viewBox="0 0 24 24"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg></div>
                    <h4>CBSE Information</h4>
                    <p>Affiliation &amp; compliance details</p>
                </div>
                <div class="why-card">
                    <div class="wci"><svg viewBox="0 0 24 24"><path d="M20.84 4.61a5.5 5.5 0 00-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 00-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 000-7.78z"/></svg></div>
                    <h4>Student Support</h4>
                    <p>Counseling &amp; development programs</p>
                </div>
                <div class="why-card">
                    <div class="wci"><svg viewBox="0 0 24 24"><path d="M17 21v-2a4 4 0 00-4-4H5a4 4 0 00-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 00-3-3.87M16 3.13a4 4 0 010 7.75"/></svg></div>
                    <h4>Parent Assistance</h4>
                    <p>Fee &amp; administrative support</p>
                </div>
            </div>
        </div>
    </section>

    <!-- 9: CBSE INFORMATION BOX -->
    <section class="sec sec-gold" id="cbse-info">
        <div class="wrap">
            <div class="cbse-box">
                <h3>CBSE Affiliation Details</h3>
                <div class="cbse-rows">
                    <div><div class="cl">Affiliation Number</div><div class="cv">1031141</div></div>
                    <div><div class="cl">School Code</div><div class="cv">51099</div></div>
                    <div><div class="cl">Board</div><div class="cv">Central Board of Secondary Education (CBSE)</div></div>
                    <div><div class="cl">Affiliation Validity</div><div class="cv">01 April 2024 – 31 March 2029</div></div>
                </div>
                <a href="CBSCcorner.html#affiliation" class="btn btn-green btn-lg">View CBSE Affiliation Details</a>
            </div>
        </div>
    </section>

    <!-- 10: FAQ -->
    <section class="sec" id="faq">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Have Questions?</div>
                <h2 class="sec-title">Frequently Asked Questions</h2>
            </div>
            <div class="faq-list">
                <div class="faq-item">
                    <div class="faq-q">Is the school CBSE affiliated?
                        <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></span>
                    </div>
                    <div class="faq-a"><p>Yes, Affiliation No. 1031141.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-q">Which classes are available?
                        <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></span>
                    </div>
                    <div class="faq-a"><p>Nursery to Class XII.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-q">Does the school have science laboratories?
                        <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></span>
                    </div>
                    <div class="faq-a"><p>Yes, Physics, Chemistry, Biology, Mathematics and Computer Labs.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-q">Does the school provide counseling support?
                        <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></span>
                    </div>
                    <div class="faq-a"><p>Yes, counseling facilities are available.</p></div>
                </div>
                <div class="faq-item">
                    <div class="faq-q">Can parents visit the campus?
                        <span class="fq-icon"><svg viewBox="0 0 24 24" fill="none" stroke-width="2.4"><path d="M12 5v14M5 12h14"/></svg></span>
                    </div>
                    <div class="faq-a"><p>Yes, during office hours with prior permission.</p></div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="wrap">
            <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Still Have
                Questions?</div>
            <h2>We're Just a Call Away</h2>
            <p>Our team is ready to help you with admissions, academics, and any other queries you may have.</p>
            <div class="cta-btns">
                <a href="tel:+917622227218" class="btn btn-green btn-lg">Call Admission Team</a>
                <a href="#general-enquiry" class="btn btn-gold btn-lg">Send Us a Message</a>
            </div>
        </div>
    </section>


<style>

        /* ═══════════════════════════════
           RESPONSIVE
        ═══════════════════════════════ */
        @media (max-width: 1200px) {
            .qc-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .why-grid {
                grid-template-columns: repeat(3, 1fr)
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

            .info-row,
            .dept-row,
            .hours-row {
                grid-template-columns: 1fr
            }

            .info-row .ic,
            .dept-row .dn,
            .hours-row .hd {
                border-bottom: 1px solid var(--border)
            }

            .form-grid {
                grid-template-columns: 1fr
            }

            .cbse-rows {
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

            .qc-grid {
                grid-template-columns: 1fr
            }

            .why-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .map-info {
                flex-direction: column;
                align-items: flex-start
            }

            .footer-grid {
                grid-template-columns: 1fr;
                gap: 24px;
            }

            .sec {
                padding: 48px 0;
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

        // ── FAQ accordion ──
        document.querySelectorAll('.faq-q').forEach(q => {
            q.addEventListener('click', () => {
                const item = q.parentElement;
                const ans = item.querySelector('.faq-a');
                const isOpen = item.classList.contains('open');
                document.querySelectorAll('.faq-item').forEach(i => {
                    i.classList.remove('open');
                    i.querySelector('.faq-a').style.maxHeight = null;
                });
                if (!isOpen) {
                    item.classList.add('open');
                    ans.style.maxHeight = ans.scrollHeight + 'px';
                }
            });
        });

        // ── Simple captcha ──
        let captchaAnswer = 12;
        function newCaptcha() {
            const a = Math.floor(Math.random() * 9) + 1;
            const b = Math.floor(Math.random() * 9) + 1;
            captchaAnswer = a + b;
            const el = document.getElementById('captchaNum');
            if (el) el.textContent = a + ' + ' + b + ' = ?';
        }
        newCaptcha();

        function handleGeneralSubmit(e) {
            e.preventDefault();
            const userAns = parseInt(document.getElementById('gCaptcha').value, 10);
            if (userAns !== captchaAnswer) {
                alert('Incorrect captcha answer. Please try again.');
                newCaptcha();
                document.getElementById('gCaptcha').value = '';
                return false;
            }
            alert('Thank you! Your message has been sent. We will get back to you within 1–2 working days.');
            document.getElementById('generalForm').reset();
            newCaptcha();
            return false;
        }

        // ── Scroll fade-in animation ──
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: .08, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.qc-card,.dept-row,.why-card,.faq-item')
            .forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(18px)';
                el.style.transition = 'opacity .45s ease, transform .45s ease';
                observer.observe(el);
            });
</script>
@endsection
