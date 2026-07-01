@extends('layouts.app')

@section('title', 'Faculty & Staff')

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
            font-size: 26px;
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

        /* ─── PROFILE CARD (Leadership) ─── */
        .leader-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 24px
        }

        .leader-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 18px;
            padding: 30px;
            transition: all .25s
        }

        .leader-card:hover {
            border-color: var(--green);
            box-shadow: 0 10px 28px rgba(46, 125, 50, .1);
            transform: translateY(-3px)
        }

        .leader-top {
            display: flex;
            align-items: center;
            gap: 16px;
            margin-bottom: 18px
        }

        .leader-photo {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: var(--green-lt);
            border: 2px solid var(--green-mid);
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--serif);
            font-size: 22px;
            color: var(--green);
            flex-shrink: 0
        }

        .leader-name {
            font-family: var(--serif);
            font-size: 19px;
            color: var(--ink)
        }

        .leader-desig {
            font-size: 12px;
            font-weight: 700;
            color: var(--gold);
            text-transform: uppercase;
            letter-spacing: .5px;
            margin-top: 3px
        }

        .leader-meta {
            display: flex;
            flex-wrap: wrap;
            gap: 8px;
            margin-bottom: 16px
        }

        .leader-meta span {
            background: var(--green-lt);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 5px 11px;
            font-size: 12px;
            color: var(--ink2);
            font-weight: 500
        }

        .leader-resp h5 {
            font-size: 11px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .5px;
            color: var(--green);
            margin-bottom: 8px
        }

        .leader-resp ul li {
            font-size: 13px;
            color: var(--muted);
            padding: 3px 0;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .leader-resp ul li::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--green);
            border-radius: 50%;
            flex-shrink: 0
        }

        .leader-msg {
            background: var(--green-lt);
            border-left: 3px solid var(--green);
            border-radius: 0 12px 12px 0;
            padding: 16px 18px;
            font-size: 13.5px;
            color: var(--ink2);
            line-height: 1.75;
            margin-bottom: 16px;
            font-style: italic
        }

        /* ─── FACULTY MEMBER CARD (grid) ─── */
        .faculty-grid {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 14px
        }

        .faculty-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 14px;
            padding: 20px 14px;
            text-align: center;
            transition: all .25s
        }

        .faculty-card:hover {
            border-color: var(--green);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(46, 125, 50, .1)
        }

        .fc-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: var(--green-lt);
            border: 1.5px solid var(--green-mid);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
            font-family: var(--serif);
            font-size: 17px;
            color: var(--green);
            transition: all .25s
        }

        .faculty-card:hover .fc-avatar {
            background: var(--green);
            color: #fff
        }

        .faculty-card h4 {
            font-size: 13px;
            font-weight: 600;
            color: var(--ink);
            line-height: 1.3
        }

        .fc-tag {
            display: inline-block;
            margin-top: 6px;
            font-size: 10px;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: .4px;
            color: var(--gold);
            background: var(--gold-lt);
            border: 1px solid #ffe082;
            border-radius: 10px;
            padding: 2px 9px
        }

        /* ─── SUPPORT TEAM CARD ─── */
        .support-grid {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 18px
        }

        .support-card {
            background: var(--white);
            border: 1.5px solid var(--border);
            border-radius: 16px;
            padding: 26px 22px;
            transition: all .25s
        }

        .support-card:hover {
            border-color: var(--gold-mid);
            transform: translateY(-3px);
            box-shadow: 0 8px 22px rgba(249, 168, 37, .15)
        }

        .support-top {
            display: flex;
            align-items: center;
            gap: 14px;
            margin-bottom: 14px
        }

        .support-avatar {
            width: 54px;
            height: 54px;
            border-radius: 14px;
            background: var(--gold-lt);
            border: 1.5px solid #ffe082;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--serif);
            font-size: 18px;
            color: var(--gold);
            flex-shrink: 0
        }

        .support-name {
            font-family: var(--serif);
            font-size: 16px;
            color: var(--ink)
        }

        .support-role {
            font-size: 11.5px;
            font-weight: 700;
            color: var(--green);
            text-transform: uppercase;
            letter-spacing: .4px;
            margin-top: 2px
        }

        .support-qual {
            font-size: 12.5px;
            color: var(--muted);
            margin-bottom: 12px;
            font-weight: 500
        }

        .support-card ul li {
            font-size: 12.5px;
            color: var(--ink2);
            padding: 3px 0;
            display: flex;
            align-items: center;
            gap: 7px
        }

        .support-card ul li::before {
            content: '';
            width: 5px;
            height: 5px;
            background: var(--gold);
            border-radius: 50%;
            flex-shrink: 0
        }

        /* ─── DEPT BLOCK HEADER ─── */
        .dept-head {
            display: flex;
            align-items: center;
            justify-content: space-between;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 22px
        }

        .dept-head h3 {
            font-family: var(--serif);
            font-size: 22px;
            color: var(--ink)
        }

        .dept-count {
            background: var(--green);
            color: #fff;
            font-size: 12px;
            font-weight: 700;
            padding: 5px 14px;
            border-radius: 20px
        }

        .dept-block {
            margin-bottom: 52px
        }

        .dept-block:last-child {
            margin-bottom: 0
        }

        /* ─── PHILOSOPHY PILLS / STEPS reuse ─── */
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
            <div class="breadcrumb"><a href="index.html">Home</a> &nbsp;/&nbsp; Faculty &amp; Staff</div>
            <div class="hero-tag"><span class="hero-dot"></span>Our People</div>
            <h1>Faculty &amp; <em>Staff</em></h1>
            <p>Meet the dedicated educators and professionals who nurture academic excellence, character
                development, and holistic growth at Nalanda Higher Secondary School.</p>
            <div class="cta-btns">
                <a href="#leadership" class="btn btn-green btn-lg">Meet Leadership</a>
                <a href="#teaching" class="btn btn-gold btn-lg">Teaching Faculty</a>
                <a href="AdmissionsPage.html#enquiry" class="btn btn-ghost btn-lg">Admission Enquiry</a>
            </div>
        </div>
    </section>

    <!-- SUB NAV -->
    <div class="subnav">
        <div class="subnav-inner">
            <a href="#stats">Faculty Strength</a>
            <a href="#philosophy">Our Philosophy</a>
            <a href="#leadership">Leadership Team</a>
            <a href="#teaching">Teaching Faculty</a>
            <a href="#support">Student Support</a>
            <a href="#admin">Admin &amp; Support Staff</a>
            <a href="#development">Faculty Development</a>
        </div>
    </div>

    <!-- 1: STATISTICS -->
    <section class="sec" id="stats">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Our Team</div>
                <h2 class="sec-title">Faculty &amp; Staff Strength</h2>
                <p class="sec-body">A dedicated team of educators and professionals supporting every stage of your
                    child's growth.</p>
            </div>
            <div class="stat-grid">
                <div class="stat-tile">
                    <div class="v">1</div>
                    <div class="l">Principal</div>
                </div>
                <div class="stat-tile">
                    <div class="v">1</div>
                    <div class="l">Vice Principal</div>
                </div>
                <div class="stat-tile">
                    <div class="v">11</div>
                    <div class="l">PGT Faculty</div>
                </div>
                <div class="stat-tile">
                    <div class="v">5</div>
                    <div class="l">TGT Faculty</div>
                </div>
                <div class="stat-tile">
                    <div class="v">9</div>
                    <div class="l">PRT Faculty</div>
                </div>
                <div class="stat-tile">
                    <div class="v">3</div>
                    <div class="l">NTT Faculty</div>
                </div>
                <div class="stat-tile">
                    <div class="v">1</div>
                    <div class="l">Wellness Teacher</div>
                </div>
                <div class="stat-tile">
                    <div class="v">1</div>
                    <div class="l">Special Educator</div>
                </div>
                <div class="stat-tile">
                    <div class="v">1</div>
                    <div class="l">PET</div>
                </div>
                <div class="stat-tile">
                    <div class="v">2</div>
                    <div class="l">Librarian &amp; Support Staff</div>
                </div>
            </div>
        </div>
    </section>

    <!-- 2: PHILOSOPHY -->
    <section class="sec sec-alt" id="philosophy">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Our Approach</div>
                <h2 class="sec-title">Faculty Philosophy</h2>
                <p class="sec-body">Our educators are guided by a shared philosophy rooted in care, curiosity and
                    consistency — ensuring every child is seen, supported and challenged to grow.</p>
            </div>
            <div class="feat-pills">
                <div class="feat-pill"><span class="pdot"></span>Student-Centered Learning</div>
                <div class="feat-pill"><span class="pdot"></span>Activity-Based Learning</div>
                <div class="feat-pill"><span class="pdot"></span>CBSE Methodology</div>
                <div class="feat-pill"><span class="pdot"></span>Individual Attention</div>
                <div class="feat-pill"><span class="pdot"></span>Continuous Mentoring</div>
                <div class="feat-pill"><span class="pdot"></span>Holistic Development</div>
            </div>
        </div>
    </section>

    <!-- 3: LEADERSHIP TEAM -->
    <section class="sec" id="leadership">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Guiding the School</div>
                <h2 class="sec-title">Leadership Team</h2>
            </div>
            <div class="leader-grid">
                <div class="leader-card">
                    <div class="leader-top">
                        <div class="leader-photo">LG</div>
                        <div>
                            <div class="leader-name">Mrs. Lata Gupta</div>
                            <div class="leader-desig">Principal</div>
                        </div>
                    </div>
                    <div class="leader-meta">
                        <span>B.Ed.</span>
                        <span>26 Years Teaching Experience</span>
                        <span>6 Years Administrative Experience</span>
                    </div>
                    <div class="leader-msg">
                        "Our mission is to nurture every child with care, discipline and a love for learning —
                        building strong foundations for character and academic excellence."
                    </div>
                    <div class="leader-resp">
                        <h5>Key Responsibilities</h5>
                        <ul>
                            <li>Academic Leadership</li>
                            <li>School Administration</li>
                            <li>Staff Development</li>
                            <li>CBSE Compliance</li>
                            <li>Parent Communication</li>
                        </ul>
                    </div>
                </div>
                <div class="leader-card">
                    <div class="leader-top">
                        <div class="leader-photo">AT</div>
                        <div>
                            <div class="leader-name">Mr. Avijit Tripathi</div>
                            <div class="leader-desig">Vice Principal</div>
                        </div>
                    </div>
                    <div class="leader-meta">
                        <span>B.Ed.</span>
                    </div>
                    <div class="leader-resp">
                        <h5>Key Responsibilities</h5>
                        <ul>
                            <li>Academic Monitoring</li>
                            <li>Timetable Management</li>
                            <li>Discipline Management</li>
                            <li>Examination Coordination</li>
                            <li>Staff Coordination</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- 4: TEACHING FACULTY -->
    <section class="sec sec-gold" id="teaching">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Our Educators</div>
                <h2 class="sec-title">Teaching Faculty</h2>
                <p class="sec-body">Our faculty consists of qualified, experienced, and dedicated educators
                    committed to academic excellence and student success.</p>
            </div>

            <!-- PGT -->
            <div class="dept-block">
                <div class="dept-head">
                    <h3>PGT Faculty <span style="color:var(--muted);font-size:13px;font-family:var(--sans);font-weight:500">— Post Graduate Teachers</span></h3>
                    <span class="dept-count">11 Members</span>
                </div>
                <div class="faculty-grid">
                    <div class="faculty-card"><div class="fc-avatar">NK</div><h4>Naveen Kumar</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">PG</div><h4>Poonam Gautam</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">RS</div><h4>Ratna Samanta</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">RS</div><h4>Roma Sharma</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SP</div><h4>Sarika Pandey</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SK</div><h4>Shahina Khatun</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SL</div><h4>Shankar Lal</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SG</div><h4>Shrasti Gupta</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SN</div><h4>Snehlata Nougrahiya</h4><span class="fc-tag">PGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">VR</div><h4>Vandana Rai</h4><span class="fc-tag">PGT</span></div>
                </div>
            </div>

            <!-- TGT -->
            <div class="dept-block">
                <div class="dept-head">
                    <h3>TGT Faculty <span style="color:var(--muted);font-size:13px;font-family:var(--sans);font-weight:500">— Trained Graduate Teachers</span></h3>
                    <span class="dept-count">5 Members</span>
                </div>
                <div class="faculty-grid">
                    <div class="faculty-card"><div class="fc-avatar">CG</div><h4>Chandan Gupta</h4><span class="fc-tag">TGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">MP</div><h4>Maya Pandey</h4><span class="fc-tag">TGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">R</div><h4>Ravikant</h4><span class="fc-tag">TGT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SC</div><h4>Savita Chakrawarti</h4><span class="fc-tag">TGT</span></div>
                </div>
            </div>

            <!-- PRT -->
            <div class="dept-block">
                <div class="dept-head">
                    <h3>PRT Faculty <span style="color:var(--muted);font-size:13px;font-family:var(--sans);font-weight:500">— Primary Teachers</span></h3>
                    <span class="dept-count">8 Members</span>
                </div>
                <div class="faculty-grid">
                    <div class="faculty-card"><div class="fc-avatar">HW</div><h4>Harshita Wadhwani</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">PB</div><h4>Prahalad Bichpuriya</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">PT</div><h4>Pratima Tiwari</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">RS</div><h4>Richa Shrivas</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">RT</div><h4>Roshni Tiwari</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">RK</div><h4>Rupendra Kour</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SJ</div><h4>Sakshi Jaiswal</h4><span class="fc-tag">PRT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">SK</div><h4>Shivanshi Kurele</h4><span class="fc-tag">PRT</span></div>
                </div>
            </div>

            <!-- NTT -->
            <div class="dept-block">
                <div class="dept-head">
                    <h3>NTT Faculty <span style="color:var(--muted);font-size:13px;font-family:var(--sans);font-weight:500">— Nursery Trained Teachers</span></h3>
                    <span class="dept-count">3 Members</span>
                </div>
                <div class="faculty-grid">
                    <div class="faculty-card"><div class="fc-avatar">AS</div><h4>Anjana Soni</h4><span class="fc-tag">NTT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">BR</div><h4>Bhawana Roopchandani</h4><span class="fc-tag">NTT</span></div>
                    <div class="faculty-card"><div class="fc-avatar">MB</div><h4>Monidipa Banerjee</h4><span class="fc-tag">NTT</span></div>
                </div>
            </div>
        </div>
    </section>

    <!-- 5: STUDENT SUPPORT TEAM -->
    <section class="sec" id="support">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Care &amp; Wellbeing</div>
                <h2 class="sec-title">Student Support Team</h2>
                <p class="sec-body">Professionals dedicated to the emotional, physical and inclusive wellbeing of
                    every student.</p>
            </div>
            <div class="support-grid">
                <div class="support-card">
                    <div class="support-top">
                        <div class="support-avatar">AS</div>
                        <div>
                            <div class="support-name">Ashish Shukla</div>
                            <div class="support-role">Wellness Teacher</div>
                        </div>
                    </div>
                    <div class="support-qual">Qualification: M.Ed.</div>
                    <ul>
                        <li>Emotional Wellbeing</li>
                        <li>Mental Health Support</li>
                        <li>Student Counseling</li>
                        <li>Behavioral Support</li>
                    </ul>
                </div>
                <div class="support-card">
                    <div class="support-top">
                        <div class="support-avatar">SR</div>
                        <div>
                            <div class="support-name">Sweta Rana</div>
                            <div class="support-role">Special Educator</div>
                        </div>
                    </div>
                    <div class="support-qual">Qualification: DED Special MR</div>
                    <ul>
                        <li>Inclusive Education</li>
                        <li>Learning Support</li>
                        <li>Individual Learning Plans</li>
                        <li>Special Needs Assistance</li>
                    </ul>
                </div>
                <div class="support-card">
                    <div class="support-top">
                        <div class="support-avatar">UY</div>
                        <div>
                            <div class="support-name">Ujala Yadav</div>
                            <div class="support-role">Physical Education Teacher</div>
                        </div>
                    </div>
                    <div class="support-qual">Qualification: MPED</div>
                    <ul>
                        <li>Sports Training</li>
                        <li>Fitness Programs</li>
                        <li>Yoga Activities</li>
                        <li>Physical Development</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 6: ADMINISTRATIVE & SUPPORT STAFF -->
    <section class="sec sec-alt" id="admin">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center;color:var(--red)">Behind the Scenes</div>
                <h2 class="sec-title">Administrative &amp; Support Staff</h2>
            </div>
            <div class="support-grid">
                <div class="support-card">
                    <div class="support-top">
                        <div class="support-avatar">SM</div>
                        <div>
                            <div class="support-name">Sangeeta Mishra</div>
                            <div class="support-role">Librarian</div>
                        </div>
                    </div>
                    <div class="support-qual">B.LIS &middot; M.LIS &middot; B.Ed.</div>
                    <ul>
                        <li>Library Management</li>
                        <li>Reading Programs</li>
                        <li>Book Resources</li>
                        <li>Student Research Support</li>
                    </ul>
                </div>
                <div class="support-card">
                    <div class="support-top">
                        <div class="support-avatar">SV</div>
                        <div>
                            <div class="support-name">Savita Verma</div>
                            <div class="support-role">Cultural Activities Coordinator</div>
                        </div>
                    </div>
                    <div class="support-qual">Qualification: B Music</div>
                    <ul>
                        <li>Music Programs</li>
                        <li>Cultural Events</li>
                        <li>Annual Function Coordination</li>
                        <li>Talent Development</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- 7: FACULTY DEVELOPMENT -->
    <section class="sec" id="development">
        <div class="wrap">
            <div class="sec-head c">
                <div class="label" style="justify-content:center">Growing Together</div>
                <h2 class="sec-title">Faculty Development</h2>
                <p class="sec-body">We invest in our teachers so they can continue to inspire and equip every
                    student for the future.</p>
            </div>
            <div class="steps">
                <div class="step">
                    <div class="step-n">1</div>
                    <div class="step-card">
                        <h4>Continuous Professional Development</h4>
                        <p>CBSE workshops, teacher training programs, educational seminars and skill enhancement
                            sessions.</p>
                    </div>
                </div>
                <div class="step">
                    <div class="step-n">2</div>
                    <div class="step-card">
                        <h4>Teaching Excellence Framework</h4>
                        <p>Activity based learning, project based learning, technology integration, art integrated
                            learning and inclusive teaching practices.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- CTA -->
    <section class="cta-section">
        <div class="wrap">
            <div class="label" style="justify-content:center;color:var(--red);margin-bottom:14px">Join Our Family
            </div>
            <h2>Be Part of the Nalanda Story</h2>
            <p>Whether you're a parent exploring admissions or an educator looking to make an impact, we'd love to
                hear from you.</p>
            <div class="cta-btns">
                <a href="AdmissionsPage.html#enquiry" class="btn btn-green btn-lg">Admission Enquiry</a>
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

            .faculty-grid {
                grid-template-columns: repeat(3, 1fr)
            }

            .support-grid {
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

            .leader-grid {
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

            .faculty-grid {
                grid-template-columns: repeat(2, 1fr)
            }

            .support-grid {
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

            .faculty-grid {
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

        document.querySelectorAll('.stat-tile,.leader-card,.faculty-card,.support-card,.step-card')
            .forEach(el => {
                el.style.opacity = '0';
                el.style.transform = 'translateY(18px)';
                el.style.transition = 'opacity .45s ease, transform .45s ease';
                observer.observe(el);
            });
    </script>
@endsection
