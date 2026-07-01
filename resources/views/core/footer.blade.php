<style>
    /* ─── FOOTER ─── */
    .footer {
        background: #1b3a1c;
        color: rgba(255, 255, 255, .6);
        padding: 56px 0 0
    }

    .footer-grid {
        display: grid;
        grid-template-columns: 2fr 1fr 1fr 1fr;
        gap: 40px
    }

    .footer-col h5 {
        font-size: 11.5px;
        font-weight: 700;
        letter-spacing: .8px;
        text-transform: uppercase;
        color: var(--gold);
        margin-bottom: 14px
    }

    .footer-col a {
        display: block;
        font-size: 13px;
        color: rgba(255, 255, 255, .55);
        padding: 3px 0;
        transition: color .2s
    }

    .footer-col a:hover {
        color: var(--gold)
    }

    .footer-col p {
        font-size: 13px;
        line-height: 1.75
    }

    .footer-logo-n {
        font-family: var(--serif);
        font-size: 18px;
        color: #fff;
        margin-bottom: 4px
    }

    .f-badge {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        background: rgba(255, 255, 255, .07);
        border: 1px solid rgba(255, 255, 255, .12);
        border-radius: 5px;
        padding: 4px 9px;
        font-size: 11px;
        color: var(--gold);
        font-weight: 600;
        margin-top: 7px;
        width: fit-content
    }

    .footer-bottom {
        background: rgba(0, 0, 0, .35);
        margin-top: 44px;
        padding: 14px 0;
        text-align: center;
        font-size: 12px;
        color: rgba(255, 255, 255, .3)
    }

    @media (max-width: 1200px) {
        .why-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .acad-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .campus-grid {
            grid-template-columns: repeat(3, 1fr);
        }

        .footer-grid {
            grid-template-columns: repeat(2, 1fr);
        }
    }

    @media (max-width: 992px) {
        .footer-grid {
            grid-template-columns: 1fr 1fr;
            gap: 28px;
        }
    }

    @media (max-width: 768px) {
        .footer-grid {
            grid-template-columns: 1fr;
            gap: 24px;
        }
    }
</style>

<!-- FOOTER -->
<footer class="footer">
    <div class="wrap">
        <div class="footer-grid">
            <div class="footer-col">
                <div style="display:flex;align-items:center;gap:10px;margin-bottom:14px">
                    <img src="assets/logo.jpeg" style="width:52px;height:52px;border-radius:50%;" alt="logo"
                        onerror="this.style.display='none'">
                    <div>
                        <div class="footer-logo-n">Nalanda H.S.S.</div>
                        <div
                            style="font-size:10px;color:var(--gold);font-weight:600;letter-spacing:.6px;text-transform:uppercase">
                            Katni, M.P. · CBSE</div>
                    </div>
                </div>
                <p style="color:rgba(255,255,255,.5)">A CBSE Affiliated Senior Secondary School committed to
                    academic excellence, character development, and holistic growth since 2010.</p>
                <div class="f-badge" style="margin-top:12px">✓ CBSE Affiliation No. 1031141</div>
                <div class="f-badge">✓ School Code: 51099</div>
            </div>
            <div class="footer-col">
                <h5>Quick Links</h5>
                <a href="#">Home</a><a href="#about">About Us</a><a href="#admissions">Admissions</a><a
                    href="#gallery">Gallery</a><a href="#contact">Contact Us</a>
            </div>
            <div class="footer-col">
                <h5>Academics</h5>
                <a href="#academics">Pre-Primary</a><a href="#academics">Primary School</a><a
                    href="#academics">Middle School</a><a href="#academics">Secondary (IX–X)</a><a
                    href="#academics">Senior Secondary</a>
            </div>
            <div class="footer-col">
                <h5>Contact Details</h5>
                <p style="margin-bottom:10px;color:rgba(255,255,255,.5)">Maharana Pratap Ward, Jhinjhiri, Katni,
                    M.P.</p>
                <a href="tel:+917622227218" style="color:var(--gold)">+91 7622 227218</a>
                <a href="tel:+916263454820" style="color:var(--gold)">+91 6263 454820</a>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap">© 2025 Nalanda Higher Secondary School, Katni &nbsp;|&nbsp; CBSE Affiliation No. 1031141
            &nbsp;|&nbsp; School Code 51099</div>
    </div>
</footer>
