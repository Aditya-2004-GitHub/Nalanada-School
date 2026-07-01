<!-- TOP BAR -->
<div class="topbar">
    <div class="wrap">
        <div class="topbar-left">
            <span>📞 <a href="tel:+917622227218">+91 7622 227218</a></span>
            <span>📞 <a href="tel:+916263454820">+91 6263 454820</a></span>
            <span style="opacity:.4">|</span>
            <span>Maharana Pratap Ward, Jhinjhiri, Katni (M.P.)</span>
        </div>
        <div class="topbar-right">
            <span class="chip-sm">CBSE No. 1031141</span>
            <span class="chip-sm">Code 51099</span>
        </div>
    </div>
</div>

<!-- NAV -->
<nav class="nav" id="main-nav">
    <div class="wrap">
        <a href="#" class="logo">
            <img src="{{ asset('logo.jpeg') }}" alt="Nalanda HSS Logo" onerror="this.style.display='none'">
            <div class="logo-text">
                <div class="name">Nalanda Higher Secondary School</div>
                <div class="sub">Katni, Madhya Pradesh · CBSE</div>
            </div>
        </a>
        <div class="nav-links">
            <a href="{{ route('Home') }}">Home</a>
            <a href="{{ route('About') }}">About</a>
            <a href="{{ route('Academics') }}">Academics</a>
            <a href="{{ route('Admissions') }}">Admissions</a>
            <a href="{{ route('CampusFacilities') }}">Campus &amp; Facilities</a>
            <a href="{{ route('StudentLife') }}">Student Life</a>
            <a href="{{ route('FacultyStaff') }}">Faculty &amp; Staff</a>
            <a href="{{ route('CBSECorner') }}">CBSE Corner</a>
            <!-- <a href="#gallery">Gallery</a> -->
            <a href="#events">Book Lists</a>
            <a href="#contact">Contact</a>
        </div>
        <div class="nav-ctas">
            <a href="#contact" class="btn btn-ghost">Enquire Now</a>
            <a href="#admissions" class="btn btn-green">Apply 2026–27</a>
        </div>
        <!-- HAMBURGER -->
        <button class="ham" id="ham-btn" aria-label="Toggle menu" aria-expanded="false">
            <span></span><span></span><span></span>
        </button>
    </div>
</nav>

<!-- MOBILE MENU DRAWER -->
<div class="mobile-menu" id="mobile-menu" aria-hidden="true">
    <div class="mobile-overlay" id="mobile-overlay"></div>
    <div class="mobile-drawer" role="dialog" aria-label="Navigation menu">
        <div class="drawer-header">
            <div class="drawer-logo">
                <img src="{{ asset('logo.jpeg') }}" alt="Logo" onerror="this.style.display='none'">
                <div class="drawer-logo-text">
                    <div class="name">Nalanda H.S.S.</div>
                    <div class="sub">Katni · CBSE</div>
                </div>
            </div>
            <button class="drawer-close" id="drawer-close" aria-label="Close menu">✕</button>
        </div>
        <nav class="drawer-links">
            <a href="{{ route('Home') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>Home</a>
            <a href="{{ route('About') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>About Us</a>
            <a href="{{ route('Admissions') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>Why Choose Us</a>
            <a href="{{ route('Academics') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>Academics</a>
            <a href="{{ route('CampusFacilities') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>Campus & Infrastructure</a>
            <a href="{{ route('StudentLife') }}" onclick="closeMobileMenu()"><span class="dl-dot"></span>Student Life</a>
            <a href="#faculty" onclick="closeMobileMenu()"><span class="dl-dot"></span>Faculty</a>
            <!-- <a href="#gallery" onclick="closeMobileMenu()"><span class="dl-dot"></span>Gallery</a> -->
            <a href="#events" onclick="closeMobileMenu()"><span class="dl-dot"></span>Events</a>
            <a href="#cbse" onclick="closeMobileMenu()"><span class="dl-dot"></span>CBSE Corner</a>
            <a href="#contact" onclick="closeMobileMenu()"><span class="dl-dot"></span>Contact Us</a>
        </nav>
        <div class="drawer-ctas">
            <a href="#admissions" onclick="closeMobileMenu()" class="btn btn-green">Apply for 2026–27</a>
            <a href="#contact" onclick="closeMobileMenu()" class="btn btn-ghost">Enquire Now</a>
        </div>
        <div class="drawer-chips">
            <span class="chip-sm">CBSE No. 1031141</span>
            <span class="chip-sm">Code 51099</span>
            <span class="chip-sm">Est. 2010</span>
        </div>
    </div>
</div>

<style>
/* ─── NAV ─── */
.nav {
    background: var(--white);
    border-bottom: 2px solid var(--green-lt);
    position: sticky;
    top: 0;
    z-index: 200;
    transition: box-shadow .3s;
}

.nav.scrolled {
    box-shadow: 0 4px 20px rgba(46, 125, 50, .1)
}

.nav .wrap {
    height: 70px;
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* gap: 20px */
}

.logo {
    display: flex;
    align-items: center;
    gap: 10px
}

.logo img {
    width: 52px;
    height: 52px;
    border-radius: 50%;
    object-fit: contain
}

.logo-text .name {
    font-family: var(--serif);
    font-size: 15px;
    color: var(--green);
    line-height: 1.1
}

.logo-text .sub {
    font-size: 10px;
    color: var(--red);
    font-weight: 600;
    letter-spacing: .7px;
    text-transform: uppercase;
    margin-top: 2px
}

.nav-links {
    display: flex;
    align-items: center;
    gap: 1px;
    flex-wrap: wrap
}

.nav-links a {
    font-size: 12px;
    font-weight: 500;
    color: var(--muted);
    padding: 6px 4px;
    border-radius: 6px;
    transition: all .22s;
    white-space: nowrap;
    position: relative
}

.nav-links a::after {
    content: '';
    position: absolute;
    bottom: 3px;
    left: 50%;
    transform: translateX(-50%) scaleX(0);
    width: 14px;
    height: 2px;
    background: var(--green);
    border-radius: 2px;
    transition: transform .22s
}

.nav-links a:hover {
    color: var(--green);
    background: var(--green-lt)
}

.nav-links a:hover::after {
    transform: translateX(-50%) scaleX(1)
}

.nav-ctas {
    display: flex;
    gap: 8px;
    margin-left: 6px;
    flex-shrink: 0
}

.btn {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    padding: 9px 20px;
    font-size: 13px;
    font-weight: 600;
    font-family: var(--sans);
    border-radius: 8px;
    cursor: pointer;
    transition: all .22s;
    border: none;
    white-space: nowrap;
    letter-spacing: .1px
}

.btn-green {
    background: var(--green);
    color: #fff
}

.btn-green:hover {
    background: #1b5e20;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(46, 125, 50, .25)
}

.btn-gold {
    background: var(--gold);
    color: var(--ink)
}

.btn-gold:hover {
    background: #f57f17;
    transform: translateY(-1px);
    box-shadow: 0 6px 18px rgba(249, 168, 37, .3)
}

.btn-ghost {
    background: var(--green-lt);
    color: var(--green);
    border: 1.5px solid var(--green)
}

.btn-ghost:hover {
    background: var(--green);
    color: #fff
}

.btn-lg {
    padding: 13px 30px;
    font-size: 15px;
    border-radius: 10px
}

.wrap {
    margin: 0 auto;
    padding: 0 24px
}

/* ─── HAMBURGER ─── */
.ham {
    display: none;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    gap: 5px;
    width: 42px;
    height: 42px;
    background: var(--green-lt);
    border: 1.5px solid var(--border);
    border-radius: 8px;
    cursor: pointer;
    flex-shrink: 0;
    transition: background .2s;
}

.ham:hover {
    background: var(--green);
}

.ham span {
    display: block;
    width: 20px;
    height: 2px;
    background: var(--green);
    border-radius: 2px;
    transition: all .3s;
}

.ham:hover span {
    background: #fff;
}

.ham.open span:nth-child(1) {
    transform: translateY(7px) rotate(45deg);
}

.ham.open span:nth-child(2) {
    opacity: 0;
    transform: scaleX(0);
}

.ham.open span:nth-child(3) {
    transform: translateY(-7px) rotate(-45deg);
}

/* ─── MOBILE MENU DRAWER ─── */
.mobile-menu {
    display: none;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    z-index: 300;
    pointer-events: none;
}

.mobile-menu.open {
    pointer-events: all;
}

.mobile-overlay {
    position: absolute;
    inset: 0;
    background: rgba(27, 58, 28, .5);
    opacity: 0;
    transition: opacity .3s;
    backdrop-filter: blur(2px);
}

.mobile-menu.open .mobile-overlay {
    opacity: 1;
}

.mobile-drawer {
    position: absolute;
    top: 0;
    right: 0;
    width: min(320px, 88vw);
    height: 100%;
    background: var(--white);
    padding: 0;
    transform: translateX(100%);
    transition: transform .32s cubic-bezier(.4, 0, .2, 1);
    overflow-y: auto;
    box-shadow: -8px 0 40px rgba(27, 58, 28, .18);
}

.mobile-menu.open .mobile-drawer {
    transform: translateX(0);
}

.drawer-header {
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 18px 20px;
    border-bottom: 1.5px solid var(--border);
    background: var(--green-lt);
}

.drawer-logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.drawer-logo img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
}

.drawer-logo-text .name {
    font-family: var(--serif);
    font-size: 13px;
    color: var(--green);
    line-height: 1.1;
}

.drawer-logo-text .sub {
    font-size: 9px;
    color: var(--red);
    font-weight: 600;
    letter-spacing: .6px;
    text-transform: uppercase;
    margin-top: 1px;
}

.drawer-close {
    width: 34px;
    height: 34px;
    background: var(--white);
    border: 1.5px solid var(--border);
    border-radius: 8px;
    display: flex;
    align-items: center;
    justify-content: center;
    cursor: pointer;
    flex-shrink: 0;
    transition: all .2s;
    font-size: 18px;
    color: var(--ink2);
}

.drawer-close:hover {
    background: var(--red);
    color: #fff;
    border-color: var(--red);
}

.drawer-links {
    padding: 12px 0;
}

.drawer-links a {
    display: flex;
    align-items: center;
    gap: 10px;
    padding: 13px 20px;
    font-size: 14px;
    font-weight: 500;
    color: var(--ink2);
    border-bottom: 1px solid var(--green-lt);
    transition: all .2s;
}

.drawer-links a:hover {
    background: var(--green-lt);
    color: var(--green);
    padding-left: 26px;
}

.drawer-links a .dl-dot {
    width: 6px;
    height: 6px;
    background: var(--green);
    border-radius: 50%;
    flex-shrink: 0;
}

.drawer-ctas {
    padding: 16px 20px;
    display: flex;
    flex-direction: column;
    gap: 10px;
    border-top: 1.5px solid var(--border);
}

.drawer-ctas .btn {
    justify-content: center;
    width: 100%;
}

.drawer-chips {
    display: flex;
    gap: 8px;
    flex-wrap: wrap;
    padding: 12px 20px;
    border-top: 1px solid var(--border);
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
}

@media (max-width: 768px) {
    .wrap {
        padding: 0 16px;
    }

    .topbar-left {
        gap: 10px;
        font-size: 12px;
    }
}

@media (max-width: 480px) {
    .topbar-left span:nth-child(2) {
        display: none;
    }

    .topbar-left span:nth-child(3) {
        display: none;
    }

    .topbar-left span:nth-child(4) {
        display: none;
    }
}
</style>

<script>
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

// Close on Escape key
document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape') closeMobileMenu();
});
</script>
