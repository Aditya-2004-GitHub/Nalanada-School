@extends('layouts.app')

@section('title', 'Book List')

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
            max-width: 640px;
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
            grid-template-columns: repeat(5, 1fr);
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
            font-size: 18px;
            color: var(--green);
            line-height: 1.25
        }

        .stat-tile .l {
            font-size: 10.5px;
            color: var(--muted);
            margin-top: 6px;
            text-transform: uppercase;
            letter-spacing: .3px
        }

        /* ─── INFO TABLE (key/value rows) reused for affiliation/disclosure/staff ─── */
        .info-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden
        }

        .info-row {
            display: grid;
            grid-template-columns: 280px 1fr;
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
            align-items: center;
            word-break: break-word
        }

        .info-row .iv a {
            color: var(--green);
            font-weight: 600
        }

        .info-row .iv a:hover {
            color: var(--red)
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
            width: 32px;
            height: 32px;
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

        .doc-item .dl-link {
            margin-left: auto;
            font-size: 11px;
            font-weight: 700;
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: .4px;
            flex-shrink: 0
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

        /* ─── SMC TABLE ─── */
        .smc-table {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            overflow: hidden;
            overflow-x: auto
        }

        table.smc {
            width: 100%;
            border-collapse: collapse;
            min-width: 620px
        }

        table.smc th {
            background: var(--green);
            color: #fff;
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 13px 16px;
            text-align: left;
            font-weight: 700
        }

        table.smc td {
            padding: 13px 16px;
            font-size: 13px;
            color: var(--ink2);
            border-bottom: 1px solid var(--green-lt)
        }

        table.smc tr:last-child td {
            border-bottom: none
        }

        table.smc tr:nth-child(even) td {
            background: var(--cream)
        }

        table.smc td.role-badge span {
            background: var(--green-lt);
            color: var(--green);
            font-size: 11px;
            font-weight: 700;
            padding: 3px 10px;
            border-radius: 12px;
            white-space: nowrap
        }

        /* ─── STAFF DIRECTORY TABLE ─── */
        table.staff {
            width: 100%;
            border-collapse: collapse;
            min-width: 480px
        }

        table.staff th {
            background: var(--gold);
            color: var(--ink);
            font-size: 11.5px;
            text-transform: uppercase;
            letter-spacing: .4px;
            padding: 13px 16px;
            text-align: left;
            font-weight: 700
        }

        table.staff td {
            padding: 13px 16px;
            font-size: 13.5px;
            color: var(--ink2);
            border-bottom: 1px solid var(--gold-lt)
        }

        table.staff tr:last-child td {
            border-bottom: none
        }

        table.staff tr:nth-child(even) td {
            background: var(--cream)
        }

        /* ─── INFRASTRUCTURE ROOM CARDS ─── */
        .room-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 16px
        }

        .room-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 22px;
            transition: all .25s
        }

        .room-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .room-card h4 {
            font-family: var(--serif);
            font-size: 16px;
            color: var(--green);
            margin-bottom: 8px
        }

        .room-dims {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
            margin-bottom: 10px
        }

        .room-dims span {
            background: var(--green-lt);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 4px 10px;
            font-size: 11.5px;
            font-weight: 600;
            color: var(--ink2)
        }

        .room-card p {
            font-size: 12.5px;
            color: var(--muted);
            line-height: 1.65
        }

        /* ─── ANNUAL REPORT ACCORDION-STYLE BLOCKS ─── */
        .report-grid {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 18px
        }

        .report-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 24px;
            transition: all .25s
        }

        .report-card:hover {
            border-color: var(--gold-mid);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(249, 168, 37, .12)
        }

        .report-card h4 {
            font-family: var(--serif);
            font-size: 17px;
            color: var(--ink);
            margin-bottom: 10px
        }

        .report-card p {
            font-size: 13px;
            color: var(--muted);
            line-height: 1.7;
            margin-bottom: 12px
        }

        .report-card ul li {
            font-size: 12.5px;
            color: var(--ink2);
            padding: 3px 0;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .report-card ul li::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--gold);
            border-radius: 50%;
            flex-shrink: 0
        }

        /* ─── ACADEMIC LEVEL CARDS ─── */
        .level-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px
        }

        .level-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 20px 16px;
            transition: all .25s
        }

        .level-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .level-card h5 {
            font-family: var(--serif);
            font-size: 14.5px;
            color: var(--green);
            margin-bottom: 8px
        }

        .level-card ul li {
            font-size: 11.5px;
            color: var(--ink2);
            padding: 2px 0;
            display: flex;
            align-items: center;
            gap: 6px
        }

        .level-card ul li::before {
            content: '';
            width: 4px;
            height: 4px;
            background: var(--green);
            border-radius: 50%;
            flex-shrink: 0
        }

        /* ─── METHOD CARDS ─── */
        .method-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px
        }

        .method-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 20px 16px;
            transition: all .25s
        }

        .method-card:hover {
            border-color: var(--gold-mid);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(249, 168, 37, .12)
        }

        .method-card h5 {
            font-size: 13.5px;
            font-weight: 700;
            color: var(--ink);
            margin-bottom: 6px
        }

        .method-card p {
            font-size: 12px;
            color: var(--muted);
            line-height: 1.6
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
            <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; CBSE Corner</div>
            <div class="hero-tag"><span class="hero-dot"></span>Compliance &amp; Transparency</div>
            <h1>CBSE <em>Corner</em></h1>
            <p>Access all CBSE affiliation details, mandatory disclosures, school reports, certificates, academic
                information and compliance documents.</p>
            <div class="cta-btns">
                <a href="#affiliation" class="btn btn-green btn-lg">Affiliation Details</a>
                <a href="#disclosure" class="btn btn-gold btn-lg">Mandatory Disclosure</a>
                <a href="#smc" class="btn btn-ghost btn-lg">School Managing Committee</a>
            </div>
        </div>
    </section>

    <!-- SUB NAV -->
    <div class="subnav">
        <div class="subnav-inner">
            <a href="#stats">Quick Stats</a>
            <a href="#affiliation">Affiliation Details</a>
            <a href="#disclosure">Mandatory Disclosure</a>
            <a href="#smc">SMC</a>
            <a href="#staff">Staff Details</a>
            <a href="#infrastructure">Infrastructure</a>
            <a href="#annual-report">Annual Report</a>
            <a href="#academic-info">Academic Information</a>
        </div>
    </div>

    <!-- 1: QUICK STATS -->
    <section class="sec" id="stats">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">At a Glance</div>
                <h2 class="sec-title">CBSE Quick Stats</h2>
            </div>
            <div class="stat-grid">
                <div class="stat-tile">
                    <div class="v">1031141</div>
                    <div class="l">CBSE Affiliation No.</div>
                </div>
                <div class="stat-tile">
                    <div class="v">51099</div>
                    <div class="l">School Code</div>
                </div>
                <div class="stat-tile">
                    <div class="v">2010</div>
                    <div class="l">Established</div>
                </div>
                <div class="stat-tile">
                    <div class="v">Senior Secondary</div>
                    <div class="l">School Level</div>
                </div>
                <div class="stat-tile">
                    <div class="v">31 Mar 2029</div>
                    <div class="l">Affiliation Valid Till</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2: AFFILIATION DETAILS -->
    <section class="sec sec-alt" id="affiliation">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Official Record</div>
                <h2 class="sec-title">Affiliation Details</h2>
            </div>
            <div class="info-table" style="max-width:880px;margin:0 auto">
                <div class="info-row"><div class="ic">School Name</div><div class="iv">Nalanda Higher Secondary School</div></div>
                <div class="info-row"><div class="ic">Affiliation Number</div><div class="iv">1031141</div></div>
                <div class="info-row"><div class="ic">Board</div><div class="iv">Central Board of Secondary Education (CBSE)</div></div>
                <div class="info-row"><div class="ic">State</div><div class="iv">Madhya Pradesh</div></div>
                <div class="info-row"><div class="ic">District</div><div class="iv">Katni</div></div>
                <div class="info-row"><div class="ic">Postal Address</div><div class="iv">Maharana Pratap Ward, Jhinjhiri, In Front of Collectorate Office, Katni</div></div>
                <div class="info-row"><div class="ic">PIN Code</div><div class="iv">483501</div></div>
                <div class="info-row"><div class="ic">Website</div><div class="iv"><a href="http://www.nalandaschoolkatni.com">www.nalandaschoolkatni.com</a></div></div>
                <div class="info-row"><div class="ic">Year of Foundation</div><div class="iv">2010</div></div>
                <div class="info-row"><div class="ic">Date of First Opening</div><div class="iv">01 July 2010</div></div>
                <div class="info-row"><div class="ic">Principal / Head of Institution</div><div class="iv">Lata Gupta</div></div>
                <div class="info-row"><div class="ic">Gender</div><div class="iv">Female</div></div>
                <div class="info-row"><div class="ic">Educational Qualification</div><div class="iv">M.A., B.Ed.</div></div>
                <div class="info-row"><div class="ic">Administrative Experience</div><div class="iv">6 Years</div></div>
                <div class="info-row"><div class="ic">Teaching Experience</div><div class="iv">26 Years</div></div>
                <div class="info-row"><div class="ic">School Status</div><div class="iv">Senior Secondary Level</div></div>
                <div class="info-row"><div class="ic">School Type</div><div class="iv">Independent</div></div>
                <div class="info-row"><div class="ic">Affiliation Validity</div><div class="iv">01/04/2024 to 31/03/2029</div></div>
                <div class="info-row"><div class="ic">Managing Society / Trust</div><div class="iv">Takshshila Shiksha Samiti</div></div>
                <div class="info-row"><div class="ic">Remarks</div><div class="iv">Nil</div></div>
                <div class="info-row"><div class="ic">School Affiliation Link</div><div class="iv"><a href="https://saras.cbse.gov.in/saras/AffiliatedList/AfflicationDetails/1031141" target="_blank" rel="noopener">View on CBSE SARAS Portal</a></div></div>
            </div>
        </div>
    </section>

    <!-- 3: MANDATORY PUBLIC DISCLOSURE -->
    <section class="sec" id="disclosure">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">As per CBSE Norms</div>
                <h2 class="sec-title">Mandatory Public Disclosure</h2>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">A. General Information</h3>
            <div class="info-table" style="max-width:780px;margin:0 auto 50px">
                <div class="info-row"><div class="ic">School Name</div><div class="iv">Nalanda Higher Secondary School</div></div>
                <div class="info-row"><div class="ic">Affiliation No.</div><div class="iv">1031141</div></div>
                <div class="info-row"><div class="ic">School Code</div><div class="iv">51099</div></div>
                <div class="info-row"><div class="ic">Year of Establishment</div><div class="iv">2010</div></div>
                <div class="info-row"><div class="ic">School Category</div><div class="iv">Senior Secondary</div></div>
                <div class="info-row"><div class="ic">Managing Society</div><div class="iv">Takshshila Shiksha Samiti</div></div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">B. Documents &amp; Information</h3>
            <div class="doc-grid" style="max-width:780px;margin:0 auto">
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Affiliation Letter<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Recognition Certificate<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>NOC<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Building Safety Certificate<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Fire Safety Certificate<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Water &amp; Sanitation Certificate<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Society Registration Certificate<span class="dl-link">Download</span></div>
                <div class="doc-item"><span class="di"><svg viewBox="0 0 24 24" fill="none" stroke-width="2"><polyline points="20 6 9 17 4 12" /></svg></span>Land Certificate<span class="dl-link">Download</span></div>
            </div>
            <p style="text-align:center;font-size:12px;color:var(--muted);margin-top:18px">Documents are managed and updated by the school administration.</p>
        </div>
    </section>

    <!-- 4: SCHOOL MANAGING COMMITTEE -->
    <section class="sec sec-gold" id="smc">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Governance</div>
                <h2 class="sec-title">School Managing Committee (SMC)</h2>
                <p class="sec-body">The School Managing Committee plays a vital role in guiding the overall
                    development, administration, and academic excellence of Nalanda Higher Secondary School. The
                    committee serves as a governing body that ensures the institution functions effectively in
                    accordance with CBSE guidelines, educational standards, and the school's vision and mission.</p>
            </div>
            <p style="max-width:820px;margin:-24px auto 36px;text-align:center;font-size:13.5px;color:var(--muted);line-height:1.8">
                The SMC comprises experienced education professionals, school representatives, parent
                representatives, and principals from reputed educational institutions. Through collaborative
                decision-making and continuous monitoring, the committee supports the school's commitment to quality
                education and a safe, nurturing learning environment — strengthening parent-school relationships and
                promoting institutional growth, transparency and accountability.
            </p>
            <div class="smc-table" style="max-width:980px;margin:0 auto 36px">
                <table class="smc">
                    <thead>
                        <tr>
                            <th>Sr No</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Role</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>1</td><td>Mr. Jignesh Bhat</td><td class="role-badge"><span>Chairperson</span></td><td>Education Representative</td></tr>
                        <tr><td>2</td><td>Mrs. Lata Gupta</td><td class="role-badge"><span>Secretary</span></td><td>Principal</td></tr>
                        <tr><td>3</td><td>Mrs. Poonam Gautam</td><td class="role-badge"><span>Teacher Member</span></td><td>Teacher</td></tr>
                        <tr><td>4</td><td>Mrs. Sarika Pandey</td><td class="role-badge"><span>Teacher Member</span></td><td>Teacher</td></tr>
                        <tr><td>5</td><td>Mr. Om Prakash Pandey</td><td class="role-badge"><span>Parent Member</span></td><td>Parent Representative</td></tr>
                        <tr><td>6</td><td>Mrs. Rajeshwari Singh</td><td class="role-badge"><span>Parent Member</span></td><td>Parent Representative</td></tr>
                        <tr><td>7</td><td>Mr. Manoj Gautam</td><td class="role-badge"><span>Member</span></td><td>BRC Katni</td></tr>
                        <tr><td>8</td><td>Mrs. Aparna Agnihotri</td><td class="role-badge"><span>Member</span></td><td>Lecturer</td></tr>
                        <tr><td>9</td><td>Mr. R.N. Singh</td><td class="role-badge"><span>Member</span></td><td>Principal, KV NKJ</td></tr>
                        <tr><td>10</td><td>Mr. Vinay Singh</td><td class="role-badge"><span>Member</span></td><td>Principal, KV OFK</td></tr>
                        <tr><td>11</td><td>Mrs. B.R. Nigam</td><td class="role-badge"><span>Member</span></td><td>Principal, Guru Nanak School</td></tr>
                    </tbody>
                </table>
            </div>
            <div class="feat-pills">
                <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Academic Monitoring</div>
                <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>CBSE Compliance</div>
                <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Parent Collaboration</div>
                <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>Student Welfare</div>
                <div class="feat-pill"><span class="pdot" style="background:var(--gold)"></span>School Development</div>
            </div>
        </div>
    </section>

    <!-- 5: STAFF DETAILS -->
    <section class="sec" id="staff">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Our People</div>
                <h2 class="sec-title">Staff Details</h2>
            </div>
            <div class="stat-grid" style="margin-bottom:40px">
                <div class="stat-tile"><div class="v">Principal</div></div>
                <div class="stat-tile"><div class="v">Vice Principal</div></div>
                <div class="stat-tile"><div class="v">PGT Teachers</div></div>
                <div class="stat-tile"><div class="v">TGT Teachers</div></div>
                <div class="stat-tile"><div class="v">PRT Teachers</div></div>
                <div class="stat-tile"><div class="v">NTT Teachers</div></div>
                <div class="stat-tile"><div class="v">Special Educator</div></div>
                <div class="stat-tile"><div class="v">Wellness Teacher</div></div>
                <div class="stat-tile"><div class="v">PET</div></div>
            </div>
            <div class="smc-table" style="max-width:760px;margin:0 auto">
                <table class="staff">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Qualification</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr><td>Lata Gupta</td><td>Principal</td><td>B.Ed</td></tr>
                        <tr><td>Avijit Tripathi</td><td>Vice Principal</td><td>B.Ed</td></tr>
                        <tr><td>Ashish Shukla</td><td>Wellness Teacher</td><td>M.Ed</td></tr>
                        <tr><td>Sweta Rana</td><td>Special Educator</td><td>D.Ed Special MR</td></tr>
                        <tr><td>Ujala Yadav</td><td>PET</td><td>MPED</td></tr>
                    </tbody>
                </table>
            </div>
            <p style="text-align:center;font-size:12px;color:var(--muted);margin-top:16px">For the complete faculty directory, visit our <a href="FacultyStaffPage.html" style="color:var(--green);font-weight:600">Faculty &amp; Staff page</a>.</p>
        </div>
    </section>

    <!-- 6: INFRASTRUCTURE DETAILS -->
    <section class="sec sec-alt" id="infrastructure">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Campus &amp; Buildings</div>
                <h2 class="sec-title">Infrastructure Details</h2>
            </div>

            <div class="info-table" style="max-width:680px;margin:0 auto 50px">
                <div class="info-row"><div class="ic">Total Campus Area</div><div class="iv">8075 Sq. Mtr</div></div>
                <div class="info-row"><div class="ic">Built-up Area</div><div class="iv">2877.2 Sq. Mtr</div></div>
                <div class="info-row"><div class="ic">Playground Area</div><div class="iv">6636.6 Sq. Mtr</div></div>
                <div class="info-row"><div class="ic">Total Classrooms</div><div class="iv">10 (25 ft × 20 ft, 500 Sq. Ft. each)</div></div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Laboratories</h3>
            <div class="room-grid" style="margin-bottom:46px">
                <div class="room-card">
                    <h4>Physics Laboratory</h4>
                    <div class="room-dims"><span>38 ft × 20 ft</span><span>760 Sq. Ft.</span></div>
                    <p>Equipped with modern apparatus and instruments required for CBSE-prescribed practical
                        activities and experiments.</p>
                </div>
                <div class="room-card">
                    <h4>Chemistry Laboratory</h4>
                    <div class="room-dims"><span>38 ft × 20 ft</span><span>760 Sq. Ft.</span></div>
                    <p>Provides access to scientific equipment, chemicals, and practical workstations for safe and
                        effective experiments.</p>
                </div>
                <div class="room-card">
                    <h4>Biology Laboratory</h4>
                    <div class="room-dims"><span>38 ft × 20 ft</span><span>760 Sq. Ft.</span></div>
                    <p>Contains microscopes, specimens, models, and equipment for practical biological observation.</p>
                </div>
                <div class="room-card">
                    <h4>Mathematics Laboratory</h4>
                    <div class="room-dims"><span>25 ft × 20 ft</span><span>500 Sq. Ft.</span></div>
                    <p>Encourages experiential learning through mathematical models, puzzles, charts and
                        activity-based resources.</p>
                </div>
                <div class="room-card">
                    <h4>Computer Laboratory</h4>
                    <div class="room-dims"><span>38 ft × 20 ft</span><span>760 Sq. Ft.</span></div>
                    <p>Equipped with modern computer systems, educational software and internet facilities for
                        digital learning.</p>
                </div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Student Support Facilities</h3>
            <div class="room-grid">
                <div class="room-card">
                    <h4>Library</h4>
                    <div class="room-dims"><span>35 ft × 20 ft</span><span>700 Sq. Ft.</span></div>
                    <p>Houses a rich collection of educational, reference, fiction and general knowledge resources.</p>
                </div>
                <div class="room-card">
                    <h4>Activity Room</h4>
                    <div class="room-dims"><span>25 ft × 20 ft</span><span>500 Sq. Ft.</span></div>
                    <p>Used for creative learning activities, student engagement programs and co-curricular
                        development.</p>
                </div>
                <div class="room-card">
                    <h4>Sports Room</h4>
                    <div class="room-dims"><span>35 ft × 20 ft</span><span>700 Sq. Ft.</span></div>
                    <p>Provides storage and access to sports equipment for indoor and outdoor games.</p>
                </div>
                <div class="room-card">
                    <h4>Counselling Room</h4>
                    <div class="room-dims"><span>20 ft × 12 ft</span><span>240 Sq. Ft.</span></div>
                    <p>Dedicated space for student counseling, guidance sessions and emotional wellbeing support.</p>
                </div>
                <div class="room-card">
                    <h4>Medical Room (Sick Room)</h4>
                    <div class="room-dims"><span>20 ft × 12 ft</span><span>240 Sq. Ft.</span></div>
                    <p>Provides immediate care and first-aid support to students whenever required.</p>
                </div>
                <div class="room-card">
                    <h4>Resource Room</h4>
                    <div class="room-dims"><span>35 ft × 20 ft</span><span>700 Sq. Ft.</span></div>
                    <p>Designed to support specialized educational activities, learning resources and student
                        assistance programs.</p>
                </div>
                <div class="room-card">
                    <h4>Examination Department</h4>
                    <div class="room-dims"><span>25 ft × 20 ft</span><span>500 Sq. Ft.</span></div>
                    <p>Responsible for examination planning, records management, assessment coordination and
                        academic documentation.</p>
                </div>
                <div class="room-card">
                    <h4>Staff Room</h4>
                    <div class="room-dims"><span>35 ft × 20 ft</span><span>700 Sq. Ft.</span></div>
                    <p>A dedicated workspace for teachers to prepare lessons, conduct meetings and collaborate on
                        academic planning.</p>
                </div>
                <div class="room-card">
                    <h4>Principal Office</h4>
                    <div class="room-dims"><span>25 ft × 20 ft</span><span>500 Sq. Ft.</span></div>
                    <p>Administrative office for school leadership, academic management and institutional
                        operations.</p>
                </div>
            </div>

            <div class="sec-head c" style="margin-top:50px;margin-bottom:24px">
                <div class="label" style="justify-content:center">Highlights</div>
                <h2 class="sec-title" style="font-size:22px">Infrastructure Highlights</h2>
            </div>
            <div class="feat-pills">
                <div class="feat-pill"><span class="pdot"></span>Spacious School Campus</div>
                <div class="feat-pill"><span class="pdot"></span>Large Playground Area</div>
                <div class="feat-pill"><span class="pdot"></span>Well-Ventilated Classrooms</div>
                <div class="feat-pill"><span class="pdot"></span>Modern Science Laboratories</div>
                <div class="feat-pill"><span class="pdot"></span>Computer Lab with Digital Resources</div>
                <div class="feat-pill"><span class="pdot"></span>Well-Stocked Library</div>
                <div class="feat-pill"><span class="pdot"></span>Counseling &amp; Medical Facilities</div>
                <div class="feat-pill"><span class="pdot"></span>Activity &amp; Sports Rooms</div>
                <div class="feat-pill"><span class="pdot"></span>Student-Friendly Environment</div>
                <div class="feat-pill"><span class="pdot"></span>Safe &amp; Hygienic Campus</div>
            </div>
        </div>
    </section>

    <!-- 7: ANNUAL REPORT -->
    <section class="sec" id="annual-report">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Year in Review</div>
                <h2 class="sec-title">Annual Report</h2>
                <p class="sec-body">Nalanda Higher Secondary School, Maharana Pratap Ward, Jhinjhiri, Katni (M.P.),
                    is affiliated with the Central Board of Secondary Education (CBSE), New Delhi. Since its
                    establishment in 2010, the school has been committed to providing quality education and
                    nurturing young minds through academic excellence, innovation, and holistic development.</p>
            </div>

            <div class="report-grid">
                <div class="report-card">
                    <h4>About the School</h4>
                    <p>A Senior Secondary institution offering education from Nursery to Class XII, following the
                        CBSE curriculum, combining academic excellence with character building, creativity and life
                        skills.</p>
                    <ul>
                        <li>CBSE Affiliated Senior Secondary School</li>
                        <li>Established in 2010</li>
                        <li>Experienced &amp; Qualified Faculty</li>
                        <li>Smart Classroom Learning</li>
                        <li>Modern Laboratories</li>
                        <li>Well-Equipped Library</li>
                        <li>Sports &amp; Physical Education Programs</li>
                        <li>Student Counseling Support</li>
                        <li>Safe &amp; Student-Friendly Campus</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Academic Excellence</h4>
                    <p>The curriculum is designed to promote conceptual understanding, critical thinking, creativity
                        and problem-solving skills.</p>
                    <ul>
                        <li>Activity-Based Learning</li>
                        <li>Experiential Learning</li>
                        <li>Project-Based Learning</li>
                        <li>Technology Integration</li>
                        <li>Inquiry-Based Teaching</li>
                        <li>Art Integrated Learning</li>
                        <li>Continuous Assessment System</li>
                        <li>Inclusive Education Practices</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Student Development Programs</h4>
                    <p>The school believes in the holistic development of students through co-curricular and
                        extracurricular activities.</p>
                    <ul>
                        <li>Leadership Development</li>
                        <li>Communication Skills</li>
                        <li>Personality Development</li>
                        <li>Life Skills Education</li>
                        <li>Team Building Activities</li>
                        <li>Community Participation</li>
                        <li>Creativity Enhancement</li>
                        <li>Confidence Building</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Sports &amp; Physical Education</h4>
                    <p>Sports build discipline, teamwork, leadership and physical fitness among students.</p>
                    <ul>
                        <li>Indoor &amp; Outdoor Games</li>
                        <li>Physical Fitness Programs</li>
                        <li>Yoga Sessions</li>
                        <li>Martial Arts Activities</li>
                        <li>Self-Defense Training</li>
                        <li>Health Awareness Programs</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Cultural &amp; Creative Activities</h4>
                    <p>Students explore and showcase their talents through cultural and artistic programs and
                        celebrations.</p>
                    <ul>
                        <li>Dance, Music, Theatre &amp; Drama</li>
                        <li>Art &amp; Craft, Drawing &amp; Painting</li>
                        <li>Public Speaking &amp; Debate</li>
                        <li>Annual Day, Children's Day, Grandparents Day</li>
                        <li>Independence Day &amp; Republic Day</li>
                        <li>Cultural Festivals &amp; Talent Competitions</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Student Counseling &amp; Guidance</h4>
                    <p>Counseling services support students' academic, emotional and personal development.</p>
                    <ul>
                        <li>Academic Guidance</li>
                        <li>Emotional Support</li>
                        <li>Behavioral Development</li>
                        <li>Career Awareness</li>
                        <li>Stress Management</li>
                        <li>Goal Setting</li>
                        <li>Personality Development</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Green Initiative Program</h4>
                    <p>Environmental awareness is integrated into the school's educational philosophy.</p>
                    <ul>
                        <li>Tree Plantation Drives</li>
                        <li>Environmental Awareness Campaigns</li>
                        <li>Water Conservation Programs</li>
                        <li>Eco-Friendly Practices</li>
                        <li>Campus Greenery Maintenance</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Educational Tours &amp; Experiential Learning</h4>
                    <p>Educational visits and excursions provide practical learning experiences beyond the
                        classroom.</p>
                    <ul>
                        <li>Historical Monuments</li>
                        <li>Scientific Institutions</li>
                        <li>Educational Centers</li>
                        <li>Cultural Heritage Sites</li>
                        <li>Public Institutions</li>
                    </ul>
                </div>
            </div>

            <div class="sec-head c" style="margin-top:50px">
                <div class="label" style="justify-content:center">Looking Ahead</div>
                <h2 class="sec-title" style="font-size:22px">Conclusion</h2>
                <p class="sec-body">The achievements of the school are the result of the collective efforts of
                    students, teachers, parents, management, and the School Managing Committee. Nalanda Higher
                    Secondary School looks forward to achieving new milestones and creating many more success
                    stories in the years ahead.</p>
            </div>
        </div>
    </section>

    <!-- 8: ACADEMIC INFORMATION -->
    <section class="sec sec-gold" id="academic-info">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Curriculum &amp; Pedagogy</div>
                <h2 class="sec-title">Academic Information</h2>
                <p class="sec-body">Education at Nalanda extends beyond textbooks and examinations — fostering
                    intellectual curiosity, creativity, critical thinking and lifelong learning through the CBSE
                    curriculum and a learner-centered approach.</p>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Curriculum Structure</h3>
            <div class="level-grid" style="margin-bottom:46px">
                <div class="level-card">
                    <h5>Pre-Primary (Nursery, KG-I, KG-II)</h5>
                    <ul>
                        <li>Language Development</li>
                        <li>Motor Skills</li>
                        <li>Social Interaction</li>
                        <li>Creative Expression</li>
                        <li>Foundational Learning</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Primary (Class I–V)</h5>
                    <ul>
                        <li>Literacy &amp; Numeracy</li>
                        <li>Conceptual Understanding</li>
                        <li>Communication Skills</li>
                        <li>Creative Learning</li>
                        <li>Environmental Awareness</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Middle (Class VI–VIII)</h5>
                    <ul>
                        <li>Subject Knowledge</li>
                        <li>Analytical Thinking</li>
                        <li>Practical Learning</li>
                        <li>Research Skills</li>
                        <li>Teamwork &amp; Collaboration</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Secondary (Class IX–X)</h5>
                    <ul>
                        <li>Concept-Based Learning</li>
                        <li>Skill Development</li>
                        <li>Board Exam Preparation</li>
                        <li>Critical Thinking</li>
                        <li>Problem Solving</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Senior Secondary (Class XI–XII)</h5>
                    <ul>
                        <li><strong>Science:</strong> Physics, Chemistry, Biology, Mathematics</li>
                        <li><strong>Commerce:</strong> Accountancy, Business Studies, Economics</li>
                        <li>English Core, Physical Education</li>
                        <li>Computer Applications</li>
                    </ul>
                </div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Teaching Methodology</h3>
            <div class="method-grid" style="margin-bottom:46px">
                <div class="method-card">
                    <h5>Activity-Based Learning</h5>
                    <p>Students learn through participation, exploration, and hands-on experiences.</p>
                </div>
                <div class="method-card">
                    <h5>Experiential Learning</h5>
                    <p>Learning enhanced through practical activities, experiments and real-life applications.</p>
                </div>
                <div class="method-card">
                    <h5>Inquiry-Based Learning</h5>
                    <p>Students ask questions, investigate concepts, and develop independent thinking.</p>
                </div>
                <div class="method-card">
                    <h5>Project-Based Learning</h5>
                    <p>Projects help students apply knowledge and develop research and collaboration skills.</p>
                </div>
                <div class="method-card">
                    <h5>Collaborative Learning</h5>
                    <p>Group activities and teamwork foster communication, leadership and interpersonal skills.</p>
                </div>
                <div class="method-card">
                    <h5>Technology Integration</h5>
                    <p>Digital tools, multimedia resources and technology-enabled teaching support modern learning.</p>
                </div>
                <div class="method-card">
                    <h5>Student-Centered Learning</h5>
                    <p>Teaching strategies accommodate diverse learning styles and individual student needs.</p>
                </div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Assessment System</h3>
            <div class="report-grid" style="margin-bottom:46px">
                <div class="report-card">
                    <h4>Formative Assessment</h4>
                    <p>Conducted throughout the academic session through:</p>
                    <ul>
                        <li>Class Activities</li>
                        <li>Assignments</li>
                        <li>Projects</li>
                        <li>Practical Work</li>
                        <li>Presentations</li>
                        <li>Oral Assessments</li>
                    </ul>
                </div>
                <div class="report-card">
                    <h4>Summative Assessment</h4>
                    <p>Conducted periodically through:</p>
                    <ul>
                        <li>Unit Tests</li>
                        <li>Mid-Term Examinations</li>
                        <li>Annual Examinations</li>
                        <li>CBSE Board Examinations</li>
                    </ul>
                </div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Inclusive Education</h3>
            <div class="feat-pills" style="margin-bottom:46px">
                <div class="feat-pill"><span class="pdot"></span>Special Educator Support</div>
                <div class="feat-pill"><span class="pdot"></span>Individual Attention</div>
                <div class="feat-pill"><span class="pdot"></span>Learning Assistance Programs</div>
                <div class="feat-pill"><span class="pdot"></span>Student Counseling Services</div>
                <div class="feat-pill"><span class="pdot"></span>Inclusive Classroom Practices</div>
            </div>

            <h3 style="font-family:var(--serif);font-size:18px;color:var(--ink);margin-bottom:18px;text-align:center">Holistic Development</h3>
            <div class="level-grid">
                <div class="level-card">
                    <h5>Intellectual</h5>
                    <ul>
                        <li>Academic Excellence</li>
                        <li>Problem Solving</li>
                        <li>Critical Thinking</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Physical</h5>
                    <ul>
                        <li>Sports Activities</li>
                        <li>Yoga Programs</li>
                        <li>Fitness Education</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Emotional</h5>
                    <ul>
                        <li>Counseling Support</li>
                        <li>Self-Confidence Building</li>
                        <li>Stress Management</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Social</h5>
                    <ul>
                        <li>Teamwork</li>
                        <li>Leadership Opportunities</li>
                        <li>Community Participation</li>
                    </ul>
                </div>
                <div class="level-card">
                    <h5>Moral &amp; Ethical</h5>
                    <ul>
                        <li>Values Education</li>
                        <li>Discipline</li>
                        <li>Respect for Diversity</li>
                        <li>Environmental Responsibility</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="wrap">
            <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Have a Query?
            </div>
            <h2>Need More Details on Compliance Documents?</h2>
            <p>Reach out to our administration office for any CBSE-related documentation or affiliation queries.</p>
            <div class="cta-btns">
                <a href="AdmissionsPage.html#enquiry" class="btn btn-green btn-lg">Contact Us</a>
                <a href="tel:+917622227218" class="btn btn-gold btn-lg">Call the School</a>
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

            .room-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .report-grid {
                grid-template-columns: 1fr
            }

            .level-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .method-grid {
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

            .info-row {
                grid-template-columns: 1fr
            }

            .info-row .ic {
                border-bottom: 1px solid var(--border)
            }

            .doc-grid {
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

            .room-grid {
                grid-template-columns: 1fr
            }

            .level-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .method-grid {
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

            .level-grid {
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

        // ── Scroll fade-in animation ──
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => {
                if (e.isIntersecting) {
                    e.target.style.opacity = '1';
                    e.target.style.transform = 'translateY(0)';
                }
            });
        }, { threshold: .08, rootMargin: '0px 0px -30px 0px' });

        document.querySelectorAll('.stat-tile,.room-card,.report-card,.level-card,.method-card,.doc-item')
            .forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(18px)';
                el.style.transition = 'opacity .45s ease, transform .45s ease';
                observer.observe(el);
            });
</script>
@endsection
