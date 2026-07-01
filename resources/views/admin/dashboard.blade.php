<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nalanda Admin — TC Records</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&family=Playfair+Display:wght@600;700&display=swap"
        rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    <style>
        :root {
            --green: #2e7d32;
            --green-lt: #e8f5e9;
            --green-mid: #4caf50;
            --gold: #f9a825;
            --gold-lt: #fffde7;
            --gold-mid: #fdd835;
            --red: #e53935;
            --red-lt: #ffebee;
            --white: #ffffff;
            --cream: #fafdf6;
            --ink: #1b3a1c;
            --ink2: #2e4a2f;
            --muted: #5a7a5b;
            --border: #c8e6c9;
            --sans: 'Poppins', system-ui, sans-serif;
            --serif: 'Playfair Display', Georgia, serif;
            --sidebar-w: 260px;
            --topbar-h: 64px;
            --radius: 10px;
            --shadow: 0 2px 12px rgba(46, 125, 50, 0.10);
            --shadow-lg: 0 6px 32px rgba(46, 125, 50, 0.14);
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: var(--sans);
            background: var(--cream);
            color: var(--ink);
            min-height: 100vh;
        }

        /* ── SIDEBAR ── */
        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-w);
            height: 100vh;
            background: var(--green);
            display: flex;
            flex-direction: column;
            z-index: 200;
            transition: transform .3s ease;
            overflow-y: auto;
        }

        .sidebar-brand {
            padding: 20px 20px 14px;
            border-bottom: 1px solid rgba(255, 255, 255, .15);
        }

        .brand-logo {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            border: 2px solid var(--gold);
            object-fit: cover;
            margin-bottom: 8px;
        }

        .brand-name {
            font-family: var(--serif);
            color: #fff;
            font-size: 1rem;
            line-height: 1.2;
        }

        .brand-sub {
            color: var(--gold-mid);
            font-size: .7rem;
            font-weight: 500;
            letter-spacing: .04em;
            text-transform: uppercase;
        }

        .nav-section {
            padding: 18px 12px 6px;
            color: rgba(255, 255, 255, .45);
            font-size: .65rem;
            font-weight: 600;
            letter-spacing: .1em;
            text-transform: uppercase;
        }

        .nav-item {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 16px;
            margin: 2px 8px;
            border-radius: 8px;
            color: rgba(255, 255, 255, .8);
            text-decoration: none;
            font-size: .86rem;
            font-weight: 500;
            cursor: pointer;
            transition: all .18s;
        }

        .nav-item:hover {
            background: rgba(255, 255, 255, .12);
            color: #fff;
        }

        .nav-item.active {
            background: var(--gold);
            color: var(--ink) !important;
            font-weight: 600;
        }

        .nav-item i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
        }

        .sidebar-footer {
            margin-top: auto;
            padding: 14px 16px;
            border-top: 1px solid rgba(255, 255, 255, .12);
        }

        .sidebar-footer small {
            color: rgba(255, 255, 255, .4);
            font-size: .67rem;
        }

        /* ── TOPBAR ── */
        .topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-w);
            right: 0;
            height: var(--topbar-h);
            background: #fff;
            border-bottom: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 100;
            gap: 12px;
            box-shadow: 0 1px 6px rgba(46, 125, 50, .06);
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.4rem;
            color: var(--green);
            cursor: pointer;
        }

        .page-title {
            font-family: var(--serif);
            font-size: 1.15rem;
            color: var(--ink);
            font-weight: 700;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-badge {
            background: var(--gold-lt);
            color: var(--ink2);
            padding: 3px 10px;
            border-radius: 20px;
            font-size: .72rem;
            font-weight: 600;
            border: 1px solid var(--gold-mid);
        }

        .admin-avatar {
            width: 36px;
            height: 36px;
            border-radius: 50%;
            background: var(--green);
            color: #fff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 700;
            font-size: .85rem;
        }

        /* ── MAIN ── */
        .main {
            margin-left: var(--sidebar-w);
            padding-top: var(--topbar-h);
            min-height: 100vh;
        }

        .page-content {
            padding: 28px 28px 40px;
        }

        /* ── STAT CARDS ── */
        .stat-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 16px;
            margin-bottom: 28px;
        }

        .stat-card {
            background: #fff;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            padding: 20px 20px 16px;
            position: relative;
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 3px;
            background: var(--accent, var(--green));
        }

        .stat-card.gold::before {
            background: var(--gold);
        }

        .stat-card.red::before {
            background: var(--red);
        }

        .stat-card.green-mid::before {
            background: var(--green-mid);
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
            margin-bottom: 12px;
        }

        .stat-num {
            font-family: var(--serif);
            font-size: 2rem;
            font-weight: 700;
            color: var(--ink);
            line-height: 1;
        }

        .stat-label {
            font-size: .72rem;
            color: var(--muted);
            margin-top: 4px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        /* ── CONTROLS BAR ── */
        .controls-bar {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            padding: 16px 20px;
            margin-bottom: 20px;
            display: flex;
            align-items: center;
            gap: 12px;
            flex-wrap: wrap;
            box-shadow: var(--shadow);
        }

        .search-wrap {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        .search-wrap i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--muted);
        }

        .search-wrap input {
            padding-left: 36px;
            border-color: var(--border);
            border-radius: 8px;
            font-size: .85rem;
            background: var(--cream);
        }

        .search-wrap input:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, .1);
            outline: none;
        }

        .btn-primary-g {
            background: var(--green);
            border: none;
            color: #fff;
            padding: 8px 18px;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all .18s;
        }

        .btn-primary-g:hover {
            background: #1b5e20;
            color: #fff;
        }

        .btn-outline-g {
            background: transparent;
            border: 1.5px solid var(--green);
            color: var(--green);
            padding: 7px 16px;
            border-radius: 8px;
            font-size: .85rem;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 6px;
            cursor: pointer;
            transition: all .18s;
        }

        .btn-outline-g:hover {
            background: var(--green-lt);
        }

        /* ── TABLE / CARD TOGGLE ── */
        .view-toggle {
            display: flex;
            gap: 4px;
            background: var(--green-lt);
            border-radius: 8px;
            padding: 3px;
        }

        .view-toggle button {
            background: none;
            border: none;
            padding: 5px 10px;
            border-radius: 6px;
            color: var(--green);
            cursor: pointer;
            font-size: .9rem;
            transition: all .15s;
        }

        .view-toggle button.active {
            background: #fff;
            box-shadow: 0 1px 4px rgba(0, 0, 0, .1);
            color: var(--green);
        }

        /* ── RECORD CARDS ── */
        #cardsView {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 18px;
        }

        .rec-card {
            background: #fff;
            border: 1px solid var(--border);
            border-radius: var(--radius);
            overflow: hidden;
            box-shadow: var(--shadow);
            transition: box-shadow .2s;
        }

        .rec-card:hover {
            box-shadow: var(--shadow-lg);
        }

        .rec-card-thumb {
            height: 140px;
            background: var(--green-lt);
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            overflow: hidden;
        }

        .rec-card-thumb img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .rec-card-thumb .no-doc {
            color: var(--muted);
            font-size: .8rem;
            text-align: center;
        }

        .rec-card-thumb .no-doc i {
            font-size: 2rem;
            display: block;
            margin-bottom: 4px;
            color: var(--border);
        }

        .doc-badge {
            position: absolute;
            top: 8px;
            right: 8px;
            background: var(--gold);
            color: var(--ink);
            font-size: .62rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
            text-transform: uppercase;
            letter-spacing: .05em;
        }

        .tc-badge {
            position: absolute;
            top: 8px;
            left: 8px;
            background: var(--green);
            color: #fff;
            font-size: .62rem;
            font-weight: 700;
            padding: 2px 7px;
            border-radius: 20px;
        }

        .rec-card-body {
            padding: 14px 16px 12px;
        }

        .rec-name {
            font-weight: 700;
            font-size: .95rem;
            color: var(--ink);
            margin-bottom: 2px;
        }

        .rec-meta {
            font-size: .75rem;
            color: var(--muted);
            display: flex;
            flex-direction: column;
            gap: 2px;
            margin-bottom: 10px;
        }

        .rec-meta span {
            display: flex;
            align-items: center;
            gap: 5px;
        }

        .rec-actions {
            display: flex;
            gap: 8px;
            flex-wrap: wrap;
        }

        .btn-sm-g {
            padding: 5px 12px;
            border-radius: 7px;
            font-size: .76rem;
            font-weight: 600;
            border: none;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 4px;
            transition: all .15s;
        }

        .btn-view {
            background: var(--green-lt);
            color: var(--green);
        }

        .btn-view:hover {
            background: var(--green);
            color: #fff;
        }

        .btn-dl {
            background: var(--gold-lt);
            color: #7a5c00;
        }

        .btn-dl:hover {
            background: var(--gold);
            color: var(--ink);
        }

        .btn-edit {
            background: #e3f2fd;
            color: #1565c0;
        }

        .btn-edit:hover {
            background: #1565c0;
            color: #fff;
        }

        .btn-del {
            background: var(--red-lt);
            color: var(--red);
        }

        .btn-del:hover {
            background: var(--red);
            color: #fff;
        }

        /* ── TABLE VIEW ── */
        #tableView {
            display: none;
        }

        .rec-table {
            width: 100%;
            background: #fff;
            border-radius: var(--radius);
            border: 1px solid var(--border);
            overflow: hidden;
            box-shadow: var(--shadow);
        }

        .rec-table thead th {
            background: var(--green);
            color: #fff;
            font-size: .76rem;
            font-weight: 600;
            padding: 12px 14px;
            letter-spacing: .03em;
            border: none;
        }

        .rec-table tbody tr {
            border-bottom: 1px solid var(--border);
            transition: background .15s;
        }

        .rec-table tbody tr:hover {
            background: var(--green-lt);
        }

        .rec-table tbody td {
            padding: 10px 14px;
            font-size: .82rem;
            vertical-align: middle;
            color: var(--ink2);
        }

        .rec-table tbody td:first-child {
            font-weight: 600;
            color: var(--ink);
        }

        .thumb-sm {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            object-fit: cover;
            border: 1px solid var(--border);
        }

        .thumb-sm-placeholder {
            width: 36px;
            height: 36px;
            border-radius: 6px;
            background: var(--green-lt);
            border: 1px solid var(--border);
            display: flex;
            align-items: center;
            justify-content: center;
            color: var(--muted);
            font-size: .75rem;
        }

        /* ── PAGINATION ── */
        .pagination-wrap {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-top: 20px;
            flex-wrap: wrap;
            gap: 10px;
        }

        .page-info {
            font-size: .78rem;
            color: var(--muted);
        }

        .pagination {
            gap: 4px;
            margin: 0;
        }

        .page-link {
            border-color: var(--border);
            color: var(--green);
            border-radius: 7px !important;
            font-size: .8rem;
            padding: 5px 11px;
        }

        .page-item.active .page-link {
            background: var(--green);
            border-color: var(--green);
            color: #fff;
        }

        .page-link:hover {
            background: var(--green-lt);
            border-color: var(--green-mid);
            color: var(--green);
        }

        /* ── MODALS ── */
        .modal-content {
            border: none;
            border-radius: 14px;
            box-shadow: var(--shadow-lg);
        }

        .modal-header {
            background: var(--green);
            color: #fff;
            border-radius: 14px 14px 0 0;
            padding: 18px 24px;
        }

        .modal-header .btn-close {
            filter: invert(1);
        }

        .modal-title {
            font-family: var(--serif);
            font-size: 1.1rem;
        }

        .modal-body {
            padding: 24px;
        }

        .modal-footer {
            border-top: 1px solid var(--border);
            padding: 14px 24px;
        }

        .form-label {
            font-size: .8rem;
            font-weight: 600;
            color: var(--ink2);
            margin-bottom: 4px;
        }

        .form-control,
        .form-select {
            border-color: var(--border);
            border-radius: 8px;
            font-size: .85rem;
            background: var(--cream);
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--green);
            box-shadow: 0 0 0 3px rgba(46, 125, 50, .1);
        }

        .section-divider {
            border-top: 1.5px dashed var(--border);
            margin: 18px 0 14px;
            position: relative;
        }

        .section-divider span {
            position: absolute;
            top: -10px;
            left: 12px;
            background: var(--green);
            color: #fff;
            font-size: .65rem;
            font-weight: 700;
            padding: 1px 8px;
            border-radius: 10px;
            letter-spacing: .07em;
            text-transform: uppercase;
        }

        /* ── DOC UPLOAD ── */
        .doc-upload-area {
            border: 2px dashed var(--green-mid);
            border-radius: 10px;
            padding: 24px;
            text-align: center;
            background: var(--green-lt);
            cursor: pointer;
            transition: all .18s;
        }

        .doc-upload-area:hover {
            border-color: var(--green);
            background: #d7f0d8;
        }

        .doc-upload-area i {
            font-size: 2rem;
            color: var(--green);
            display: block;
            margin-bottom: 6px;
        }

        .doc-upload-area p {
            font-size: .8rem;
            color: var(--muted);
            margin: 0;
        }

        .doc-preview-wrap {
            margin-top: 10px;
            display: none;
        }

        .doc-preview-wrap img {
            max-height: 120px;
            border-radius: 8px;
            border: 1px solid var(--border);
        }

        /* ── DETAIL MODAL ── */
        .detail-header {
            background: linear-gradient(135deg, var(--green) 0%, #1b5e20 100%);
            color: #fff;
            border-radius: 10px;
            padding: 20px;
            margin-bottom: 20px;
            display: flex;
            gap: 16px;
            align-items: center;
        }

        .detail-avatar {
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, .2);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: var(--serif);
            font-size: 1.6rem;
            color: #fff;
            border: 2px solid var(--gold);
            flex-shrink: 0;
        }

        .detail-title {
            font-family: var(--serif);
            font-size: 1.2rem;
        }

        .detail-sub {
            font-size: .78rem;
            opacity: .8;
            margin-top: 2px;
        }

        .detail-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
        }

        .detail-field {
            background: var(--cream);
            border: 1px solid var(--border);
            border-radius: 8px;
            padding: 10px 14px;
        }

        .detail-field label {
            font-size: .65rem;
            color: var(--muted);
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: .07em;
        }

        .detail-field p {
            font-size: .85rem;
            color: var(--ink);
            font-weight: 500;
            margin: 0;
            margin-top: 2px;
        }

        .doc-preview-full {
            border: 1px solid var(--border);
            border-radius: 10px;
            overflow: hidden;
            margin-top: 16px;
        }

        .doc-preview-full iframe {
            width: 100%;
            height: 300px;
            border: none;
        }

        .doc-preview-full img {
            width: 100%;
            max-height: 300px;
            object-fit: contain;
            background: var(--green-lt);
        }

        /* ── STATUS BADGE ── */
        .status-badge {
            display: inline-flex;
            align-items: center;
            gap: 4px;
            padding: 3px 10px;
            border-radius: 20px;
            font-size: .7rem;
            font-weight: 600;
        }

        .status-issued {
            background: var(--green-lt);
            color: var(--green);
        }

        .status-pending {
            background: var(--gold-lt);
            color: #7a5c00;
        }

        /* ── EMPTY STATE ── */
        .empty-state {
            text-align: center;
            padding: 60px 20px;
            color: var(--muted);
        }

        .empty-state i {
            font-size: 3.5rem;
            display: block;
            margin-bottom: 12px;
            color: var(--border);
        }

        .empty-state h5 {
            color: var(--ink2);
            font-size: 1rem;
            margin-bottom: 6px;
        }

        .empty-state p {
            font-size: .82rem;
        }

        /* ── TOAST ── */
        .toast-container {
            z-index: 9999;
        }

        .toast-success {
            background: var(--green);
            color: #fff;
            border: none;
        }

        .toast-danger {
            background: var(--red);
            color: #fff;
            border: none;
        }

        /* ── DELETE CONFIRM ── */
        .del-modal .modal-header {
            background: var(--red);
        }

        /* ── RESPONSIVE ── */
        @media(max-width:991px) {
            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media(max-width:768px) {
            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.open {
                transform: translateX(0);
            }

            .main {
                margin-left: 0;
            }

            .topbar {
                left: 0;
            }

            .sidebar-toggle {
                display: block;
            }

            .page-content {
                padding: 18px 14px 40px;
            }

            .stat-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 10px;
            }

            #cardsView {
                grid-template-columns: 1fr;
            }

            .detail-grid {
                grid-template-columns: 1fr;
            }

            .controls-bar {
                gap: 8px;
            }
        }

        @media(max-width:480px) {
            .stat-grid {
                grid-template-columns: 1fr 1fr;
            }

            .stat-num {
                font-size: 1.5rem;
            }

            .topbar {
                padding: 0 14px;
            }
        }

        /* ── OVERLAY ── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0, 0, 0, .45);
            z-index: 199;
        }

        .sidebar-overlay.active {
            display: block;
        }

        /* ── SCROLLBAR ── */
        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: var(--border);
            border-radius: 10px;
        }

        /* filter select */
        .filter-select {
            border-color: var(--border);
            border-radius: 8px;
            font-size: .82rem;
            background: var(--cream);
            padding: 6px 12px;
            color: var(--ink2);
        }

        .filter-select:focus {
            outline: none;
            border-color: var(--green);
        }
    </style>
</head>

<body>

    <!-- SIDEBAR OVERLAY (mobile) -->
    <div class="sidebar-overlay" id="sidebarOverlay" onclick="closeSidebar()"></div>

    <!-- SIDEBAR -->
    <aside class="sidebar" id="sidebar">
        <div class="sidebar-brand">
            <!-- Inline SVG logo placeholder matching school emblem colors -->
            <div
                style="width:72px;height:72px;border-radius:50%;background:var(--gold);border:2px solid #fff;display:flex;align-items:center;justify-content:center;margin-bottom:8px;overflow:hidden;">
                <!-- <svg viewBox="0 0 52 52" width="52" height="52" xmlns="http://www.w3.org/2000/svg">
                    <circle cx="26" cy="26" r="26" fill="#2e7d32" />
                    <circle cx="26" cy="26" r="22" fill="#f9a825" />
                    <circle cx="26" cy="26" r="18" fill="#2e7d32" />
                    <g fill="#e53935">
                        <polygon points="26,10 24,20 28,20" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(30,26,26)" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(60,26,26)" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(-30,26,26)" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(-60,26,26)" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(90,26,26)" />
                        <polygon points="26,10 24,20 28,20" transform="rotate(-90,26,26)" />
                    </g>
                    <circle cx="26" cy="26" r="8" fill="#f9a825" />
                    <rect x="20" y="29" width="6" height="7" rx="1" fill="#fff" />
                    <rect x="26" y="29" width="6" height="7" rx="1" fill="#fff" />
                    <line x1="26" y1="29" x2="26" y2="36" stroke="#2e7d32" stroke-width="1" />
                    <text x="26" y="28" text-anchor="middle" font-size="3" fill="#1b3a1c" font-weight="bold">N</text>
                </svg> -->
                <img src="{{ asset('logo.jpeg') }}" alt="logo" style="width:100%;height:100%;object-fit:cover;">
            </div>
            <div class="brand-name">Nalanda Higher<br>Secondary School</div>
            <div class="brand-sub">CBSE • Jhinjhiri, Katni (M.P.)</div>
        </div>

        <div class="nav-section">Records</div>
        <a class="nav-item active" onclick="showPage('records')">
            <i class="bi bi-file-earmark-person"></i> TC Records
        </a>
        <a class="nav-item" onclick="showPage('dashboard')">
            <i class="bi bi-grid-1x2"></i> Dashboard
        </a>

        <!--
        <div class="nav-section">Management</div>
        <a class="nav-item" onclick="showToast('Students module coming soon','info')">
            <i class="bi bi-people"></i> Students
        </a>
        <a class="nav-item" onclick="showToast('Staff module coming soon','info')">
            <i class="bi bi-person-badge"></i> Staff
        </a>
        <a class="nav-item" onclick="showToast('Reports module coming soon','info')">
            <i class="bi bi-bar-chart-line"></i> Reports
        </a>

        <div class="nav-section">System</div>
        <a class="nav-item" onclick="showToast('Settings module coming soon','info')">
            <i class="bi bi-gear"></i> Settings
        </a>
        -->
        <a href="#" class="nav-item" onclick="event.preventDefault(); localStorage.clear(); sessionStorage.clear(); document.getElementById('logout-form').submit();">
            <i class="bi bi-box-arrow-left"></i> Logout
        </a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none" style="display: none;">
            @csrf
        </form>

        <div class="sidebar-footer">
            <small>Admin Panel v1.0 &nbsp;•&nbsp; CBSE Affiliated</small>
        </div>
    </aside>

    <!-- TOPBAR -->
    <div class="topbar">
        <div class="topbar-left">
            <button class="sidebar-toggle" onclick="toggleSidebar()"><i class="bi bi-list"></i></button>
            <div class="page-title" id="topbarTitle">TC Records</div>
        </div>
        <div class="topbar-right">
            <span class="topbar-badge"><i class="bi bi-shield-check me-1"></i>CBSE Verified</span>
            <div class="admin-avatar">AD</div>
        </div>
    </div>

    <!-- MAIN CONTENT -->
    <main class="main">
        <div class="page-content">

            <!-- ── DASHBOARD PAGE ── -->
            <div id="dashboardPage" style="display:none;">
                <div class="stat-grid mb-3">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:var(--green-lt);color:var(--green);"><i
                                class="bi bi-file-earmark-person"></i></div>
                        <div class="stat-num" id="statTotal">0</div>
                        <div class="stat-label">Total TC Records</div>
                    </div>
                    <div class="stat-card gold">
                        <div class="stat-icon" style="background:var(--gold-lt);color:#7a5c00;"><i class="bi bi-clock-history"></i>
                        </div>
                        <div class="stat-num" id="statPending">0</div>
                        <div class="stat-label">TC Pending</div>
                    </div>
                    <div class="stat-card red">
                        <div class="stat-icon" style="background:var(--red-lt);color:var(--red);"><i class="bi bi-person-dash"></i>
                        </div>
                        <div class="stat-num" id="statLeft">0</div>
                        <div class="stat-label">Students Left</div>
                    </div>
                    <div class="stat-card green-mid">
                        <div class="stat-icon" style="background:#e8f5e9;color:var(--green-mid);"><i class="bi bi-check-circle"></i>
                        </div>
                        <div class="stat-num" id="statIssued">0</div>
                        <div class="stat-label">TC Issued</div>
                    </div>
                </div>
                <div
                    style="background:#fff;border:1px solid var(--border);border-radius:var(--radius);padding:28px;text-align:center;box-shadow:var(--shadow);">
                    <i class="bi bi-bar-chart-line"
                        style="font-size:3rem;color:var(--border);display:block;margin-bottom:12px;"></i>
                    <h5 style="color:var(--ink2);font-size:1rem;">Analytics Coming Soon</h5>
                    <p style="font-size:.82rem;color:var(--muted);">Detailed charts and CBSE compliance reports will appear here.
                    </p>
                </div>
            </div>

            <!-- ── TC RECORDS PAGE ── -->
            <div id="recordsPage">
                <!-- Stats strip -->
                <div class="stat-grid">
                    <div class="stat-card">
                        <div class="stat-icon" style="background:var(--green-lt);color:var(--green);"><i
                                class="bi bi-file-earmark-person"></i></div>
                        <div class="stat-num" id="statTotal2">0</div>
                        <div class="stat-label">Total Records</div>
                    </div>
                    <div class="stat-card gold">
                        <div class="stat-icon" style="background:var(--gold-lt);color:#7a5c00;"><i
                                class="bi bi-hourglass-split"></i></div>
                        <div class="stat-num" id="statPending2">0</div>
                        <div class="stat-label">TC Pending</div>
                    </div>
                    <div class="stat-card red">
                        <div class="stat-icon" style="background:var(--red-lt);color:var(--red);"><i class="bi bi-person-x"></i>
                        </div>
                        <div class="stat-num" id="statLeft2">0</div>
                        <div class="stat-label">Students Left</div>
                    </div>
                    <div class="stat-card green-mid">
                        <div class="stat-icon" style="background:#e8f5e9;color:var(--green-mid);"><i class="bi bi-patch-check"></i>
                        </div>
                        <div class="stat-num" id="statIssued2">0</div>
                        <div class="stat-label">TC Issued</div>
                    </div>
                </div>

                <!-- Controls -->
                <div class="controls-bar">
                    <div class="search-wrap">
                        <i class="bi bi-search"></i>
                        <input type="text" class="form-control" id="searchInput" placeholder="Search by name, parent, class…"
                            oninput="filterRecords()">
                    </div>
                    <select class="filter-select" id="filterStatus" onchange="filterRecords()">
                        <option value="">All Status</option>
                        <option value="issued">TC Issued</option>
                        <option value="pending">Pending</option>
                    </select>
                    <select class="filter-select" id="filterClass" onchange="filterRecords()">
                        <option value="">All Classes</option>
                    </select>
                    <div class="view-toggle">
                        <button class="active" id="btnCard" onclick="setView('card')"><i class="bi bi-grid-3x2-gap"></i></button>
                        <button id="btnTable" onclick="setView('table')"><i class="bi bi-table"></i></button>
                    </div>
                    <button class="btn-primary-g" onclick="openAddModal()">
                        <i class="bi bi-plus-lg"></i> Add Record
                    </button>
                </div>

                <!-- Cards View -->
                <div id="cardsView"></div>

                <!-- Table View -->
                <div id="tableView">
                    <div class="table-responsive">
                        <table class="rec-table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>TC Doc</th>
                                    <th>Student Name</th>
                                    <th>Class</th>
                                    <th>Father's Name</th>
                                    <th>Contact</th>
                                    <th>Reason</th>
                                    <th>Date</th>
                                    <th>TC Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="tableBody"></tbody>
                        </table>
                    </div>
                </div>

                <!-- Empty state -->
                <div class="empty-state" id="emptyState" style="display:none;">
                    <i class="bi bi-folder-x"></i>
                    <h5>No records found</h5>
                    <p>Add a new TC record or try a different search term.</p>
                    <button class="btn-primary-g mt-3 mx-auto" style="display:inline-flex;" onclick="openAddModal()">
                        <i class="bi bi-plus-lg"></i> Add First Record
                    </button>
                </div>

                <!-- Pagination -->
                <div class="pagination-wrap" id="paginationWrap" style="display:none;">
                    <div class="page-info" id="pageInfo"></div>
                    <nav>
                        <ul class="pagination" id="pageList"></ul>
                    </nav>
                    <select class="filter-select" id="perPageSelect" onchange="changePerPage()" style="width:auto;">
                        <option value="6">6 / page</option>
                        <option value="12" selected>12 / page</option>
                        <option value="24">24 / page</option>
                    </select>
                </div>
            </div>

        </div>
    </main>

    <!-- ══════════════════════════════════════════
     ADD / EDIT MODAL
══════════════════════════════════════════ -->
    <div class="modal fade" id="recordModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <form class="modal-content" action="{{ route('admin.storeStudent') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitle">Add TC Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                        <input type="hidden" id="editId" name="editId">

                        <div class="section-divider"><span>Student Info</span></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Student Full Name *</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="fName" name="name" placeholder="e.g. Rahul Kumar Sharma" value="{{ old('name') }}">
                                @error('name')
                                <p class="invalid-feedback">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Class *</label>
                                <select class="form-select @error('class') is-invalid @enderror" id="fClass" name="class">
                                    <option value="">Select Class</option>
                                    <option value="class_1">Class 1</option>
                                    <option value="class_2">Class 2</option>
                                    <option value="class_3">Class 3</option>
                                    <option value="class_4">Class 4</option>
                                    <option value="class_5">Class 5</option>
                                    <option value="class_6">Class 6</option>
                                    <option value="class_7">Class 7</option>
                                    <option value="class_8">Class 8</option>
                                    <option value="class_9">Class 9</option>
                                    <option value="class_10">Class 10</option>
                                    <option value="class_11">Class 11</option>
                                    <option value="class_12">Class 12</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label class="form-label">Section</label>
                                <input type="text" class="form-control @error('section') is-invalid @enderror" id="fSection" name="section" placeholder="A / B / C" value="{{ old('section') }}">
                                @error('section')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Roll Number</label>
                                <input type="text" class="form-control @error('roll_number') is-invalid @enderror" id="fRoll" name="roll_number" placeholder="e.g. 2024-101" value="{{ old('roll_number') }}">
                                @error('roll_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Date of Birth</label>
                                <input type="date" class="form-control @error('date_of_birth') is-invalid @enderror" id="fDob" name="date_of_birth">
                                @error('date_of_birth')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-4">
                                <label class="form-label">Admission Number</label>
                                <input type="text" class="form-control @error('admission_number') is-invalid @enderror" id="fAdmNo" name="admission_number" placeholder="e.g. ADM2020-045">
                                @error('admission_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="section-divider mt-4"><span>Parent / Guardian</span></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Father's Name *</label>
                                <input type="text" class="form-control @error('father_name') is-invalid @enderror" id="fFather" name="father_name" placeholder="Father's full name">
                                @error('father_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Mother's Name</label>
                                <input type="text" class="form-control @error('mother_name') is-invalid @enderror" id="fMother" name="mother_name" placeholder="Mother's full name">
                                @error('mother_name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Contact Number *</label>
                                <input type="tel" class="form-control @error('contact_number') is-invalid @enderror" id="fContact" name="contact_number" placeholder="10-digit mobile number" maxlength="10">
                                @error('contact_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Alternate Contact</label>
                                <input type="tel" class="form-control" id="fContact2" name="alternate_contact_number" placeholder="Optional">
                            </div>
                            <div class="col-12">
                                <label class="form-label">Address *</label>
                                <textarea class="form-control @error('address') is-invalid @enderror" id="fAddress" name="address" rows="2" placeholder="Full residential address…"></textarea>
                                @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="section-divider mt-4"><span>Leaving Details</span></div>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Date of Leaving *</label>
                                <input type="date" class="form-control @error('leave_date') is-invalid @enderror" id="fLeaveDate" name="leaving_date">
                                @error('leave_date')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">TC Status *</label>
                                <select class="form-select" id="fStatus" name="tc_status">
                                    <option value="issued">TC Issued</option>
                                    <option value="pending">Pending</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label class="form-label">Reason for Leaving *</label>
                                <textarea class="form-control @error('reason') is-invalid @enderror" id="fReason" name="leaving_reason" rows="2"
                                    placeholder="e.g. Family relocated to another city, Transfer case…"></textarea>
                                @error('reason')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Transfer to School</label>
                                <input type="text" class="form-control" id="fTransferTo" name="transfer_to_school" placeholder="Name of new school (if known)">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">TC Issue Date</label>
                                <input type="date" class="form-control" id="fTcDate" name="tc_date_issued">
                            </div>
                        </div>

                        <div class="section-divider mt-4"><span>TC Certificate Document</span></div>
                        <div class="doc-upload-area" onclick="document.getElementById('fDoc').click()">
                            <i class="bi bi-cloud-upload"></i>
                            <strong style="font-size:.85rem;color:var(--green);">Click to upload TC Certificate</strong>
                            <p>PNG, JPG, PDF, DOCX supported • Max 5MB</p>
                            <input type="file" id="fDoc" accept=".png,.jpg,.jpeg,.pdf,.doc,.docx" style="display:none;" class="@error('document') is-invalid @enderror" onchange="handleDocUpload(event)" name="document">
                            @error('document')
                            <div class="invalidfeedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="doc-preview-wrap" id="docPreviewWrap">
                            <div
                                style="display:flex;align-items:center;gap:10px;background:var(--green-lt);padding:8px 12px;border-radius:8px;border:1px solid var(--border);">
                                <i class="bi bi-file-earmark-check" style="color:var(--green);font-size:1.2rem;"></i>
                                <div>
                                    <div style="font-size:.8rem;font-weight:600;color:var(--ink)" id="docFileName">file.pdf</div>
                                    <div style="font-size:.7rem;color:var(--muted)" id="docFileSize">—</div>
                                </div>
                                <button type="button" onclick="clearDoc()"
                                    style="margin-left:auto;background:none;border:none;color:var(--red);font-size:1.1rem;cursor:pointer;"><i
                                        class="bi bi-x-circle"></i></button>
                            </div>
                            <img id="docImgPreview"
                                style="display:none;margin-top:8px;max-height:120px;border-radius:8px;border:1px solid var(--border);">
                        </div>
                        <div id="existingDocInfo" style="display:none;" class="mt-2">
                            <span style="font-size:.78rem;color:var(--muted);"><i class="bi bi-paperclip"></i> Existing document on
                                file. Upload new to replace.</span>
                        </div>

                        <div id="formError" style="display:none;" class="alert alert-danger mt-3 py-2 px-3 rounded-3"
                            style="font-size:.8rem;"></div>
                    </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-3"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn-primary-g">
                        <i class="bi bi-check-lg"></i> <span id="saveBtnText">Save Record</span>
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- ══════════════════════════════════════════
     VIEW DETAIL MODAL
══════════════════════════════════════════ -->
    <div class="modal fade" id="detailModal" tabindex="-1">
        <div class="modal-dialog modal-lg modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Student TC Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body" id="detailBody"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-3"
                        data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn-sm-g btn-edit" style="padding:7px 16px;" id="detailEditBtn"><i
                            class="bi bi-pencil"></i> Edit</button>
                    <button type="button" class="btn-sm-g btn-dl" style="padding:7px 16px;" id="detailDlBtn"><i
                            class="bi bi-download"></i> Download TC</button>
                </div>
            </div>
        </div>
    </div>

    <!-- ══════════════════════════════════════════
     DELETE CONFIRM MODAL
══════════════════════════════════════════ -->
    <div class="modal fade del-modal" id="deleteModal" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" style="max-width:420px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="bi bi-trash3 me-2"></i>Delete Record</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center py-4">
                    <div
                        style="width:64px;height:64px;background:var(--red-lt);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 16px;font-size:1.8rem;color:var(--red);">
                        <i class="bi bi-exclamation-triangle"></i>
                    </div>
                    <h5 style="color:var(--ink);font-size:1rem;margin-bottom:6px;">Are you sure?</h5>
                    <p style="color:var(--muted);font-size:.85rem;" id="deleteConfirmText">This will permanently delete this TC
                        record. This action cannot be undone.</p>
                </div>
                <div class="modal-footer justify-content-center gap-3">
                    <button type="button" class="btn btn-sm btn-outline-secondary rounded-3 px-4"
                        data-bs-dismiss="modal">Cancel</button>
                    <button type="button" class="btn-sm-g btn-del px-4" style="padding:8px 20px;font-size:.82rem;"
                        onclick="confirmDelete()">
                        <i class="bi bi-trash3"></i> Delete
                    </button>
                </div>
            </div>
        </div>
    </div>

    <!-- TOAST -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="mainToast" class="toast align-items-center border-0" role="alert">
            <div class="d-flex">
                <div class="toast-body fw-semibold" id="toastMsg" style="font-size:.85rem;"></div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"></button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @if(session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            showToast("{{ session('success') }}", 'success');
        });
    </script>
    @endif
    @if($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var myModal = new bootstrap.Modal(document.getElementById('recordModal'));
            myModal.show();
        });
    </script>
    @endif
    <script>
        // ══════════════════════════════════════════
        // DATA STORE
        // ══════════════════════════════════════════
        let records = {!! json_encode($records ?? []) !!};
        let currentPage = 1;
        let perPage = 12;
        let filteredRecords = [];
        let deleteTargetId = null;
        let currentDetailId = null;
        let docDataUrl = null; // base64 of uploaded doc

        // ══════════════════════════════════════════
        // PAGE NAVIGATION
        // ══════════════════════════════════════════
        function showPage(p) {
            document.getElementById('recordsPage').style.display = p === 'records' ? '' : 'none';
            document.getElementById('dashboardPage').style.display = p === 'dashboard' ? '' : 'none';
            document.querySelectorAll('.nav-item').forEach(el => el.classList.remove('active'));
            event.currentTarget.classList.add('active');
            document.getElementById('topbarTitle').textContent = p === 'records' ? 'TC Records' : 'Dashboard';
            if (p === 'dashboard') updateDashStats();
            closeSidebar();
        }

        function updateDashStats() {
            const t = records.length,
                i = records.filter(r => r.status === 'issued').length,
                pe = records.filter(r => r.status === 'pending').length;
            document.getElementById('statTotal').textContent = t;
            document.getElementById('statIssued').textContent = i;
            document.getElementById('statPending').textContent = pe;
            document.getElementById('statLeft').textContent = t;
        }

        // ══════════════════════════════════════════
        // SIDEBAR
        // ══════════════════════════════════════════
        function toggleSidebar() {
            document.getElementById('sidebar').classList.toggle('open');
            document.getElementById('sidebarOverlay').classList.toggle('active');
        }

        function closeSidebar() {
            document.getElementById('sidebar').classList.remove('open');
            document.getElementById('sidebarOverlay').classList.remove('active');
        }

        // ══════════════════════════════════════════
        // FILTER + RENDER
        // ══════════════════════════════════════════
        function filterRecords() {
            const q = document.getElementById('searchInput').value.toLowerCase().trim();
            const st = document.getElementById('filterStatus').value;
            const cls = document.getElementById('filterClass').value;
            filteredRecords = records.filter(r => {
                const matchQ = !q || r.name.toLowerCase().includes(q) || r.father.toLowerCase().includes(q) ||
                    r.contact.includes(q) || r.cls.toLowerCase().includes(q) ||
                    (r.admNo || '').toLowerCase().includes(q);
                const matchSt = !st || r.status === st;
                const matchCls = !cls || r.cls === cls;
                return matchQ && matchSt && matchCls;
            });
            currentPage = 1;
            renderAll();
        }

        function renderAll() {
            updateStats();
            const total = filteredRecords.length;
            const start = (currentPage - 1) * perPage,
                end = Math.min(start + perPage, total);
            const paged = filteredRecords.slice(start, end);

            document.getElementById('emptyState').style.display = total === 0 ? '' : 'none';
            document.getElementById('paginationWrap').style.display = total === 0 ? 'none' : 'flex';

            renderCards(paged);
            renderTable(paged);
            renderPagination(total);
        }

        function updateStats() {
            const t = records.length,
                i = records.filter(r => r.status === 'issued').length,
                pe = records.filter(r => r.status === 'pending').length;
            ['statTotal2', 'statTotal'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = t;
            });
            ['statIssued2', 'statIssued'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = i;
            });
            ['statPending2', 'statPending'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = pe;
            });
            ['statLeft2', 'statLeft'].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.textContent = t;
            });
        }

        // ── CARDS ──
        function renderCards(list) {
            const wrap = document.getElementById('cardsView');
            if (!list.length) {
                wrap.innerHTML = '';
                return;
            }
            wrap.innerHTML = list.map(r => {
                const hasDoc = r.docData || r.docName;
                const isImg = r.docType === 'image' && r.docData;
                const ext = r.docName ? r.docName.split('.').pop().toUpperCase() : '';
                const thumb = isImg ?
                    `<img src="${r.docData}" alt="TC" onerror="this.style.display='none'">` :
                    `<div class="no-doc"><i class="bi bi-${hasDoc ? 'file-earmark-check' : 'file-earmark-x'}"></i>${hasDoc ? ext + ' Document' : 'No Document'}</div>`;
                const initials = r.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
                return `
    <div class="rec-card">
      <div class="rec-card-thumb">
        ${thumb}
        ${hasDoc ? `<span class="doc-badge">${ext || 'DOC'}</span>` : ''}
        <span class="tc-badge">${r.status === 'issued' ? 'TC Issued' : 'Pending'}</span>
      </div>
      <div class="rec-card-body">
        <div class="rec-name">${r.name}</div>
        <div class="rec-meta">
          <span><i class="bi bi-mortarboard" style="color:var(--green)"></i>${r.cls}${r.section ? ' – ' + r.section : ''}</span>
          <span><i class="bi bi-person" style="color:var(--green)"></i>${r.father}</span>
          <span><i class="bi bi-telephone" style="color:var(--green)"></i>${r.contact}</span>
        </div>
        <div class="rec-actions">
          <button class="btn-sm-g btn-view" onclick="viewDetail(${r.id})"><i class="bi bi-eye"></i> View</button>
          <button class="btn-sm-g btn-dl" onclick="downloadDoc(${r.id})" ${!hasDoc ? 'disabled title="No document"' : ''}><i class="bi bi-download"></i> TC</button>
          <button class="btn-sm-g btn-edit" onclick="openEditModal(${r.id})"><i class="bi bi-pencil"></i></button>
          <button class="btn-sm-g btn-del" onclick="openDeleteModal(${r.id})"><i class="bi bi-trash3"></i></button>
        </div>
      </div>
    </div>`;
            }).join('');
        }

        // ── TABLE ──
        function renderTable(list) {
            const tbody = document.getElementById('tableBody');
            if (!list.length) {
                tbody.innerHTML = '';
                return;
            }
            const startIdx = (currentPage - 1) * perPage;
            tbody.innerHTML = list.map((r, i) => {
                const hasDoc = r.docData || r.docName;
                const isImg = r.docType === 'image' && r.docData;
                const ext = r.docName ? r.docName.split('.').pop().toUpperCase() : '';
                const thumbHtml = isImg ?
                    `<img src="${r.docData}" class="thumb-sm" alt="doc">` :
                    `<div class="thumb-sm-placeholder"><i class="bi bi-file-earmark${hasDoc ? '-check' : '-x'}" style="color:${hasDoc ? 'var(--green)' : 'var(--border)'}"></i></div>`;
                const shortReason = r.reason.length > 30 ? r.reason.slice(0, 30) + '…' : r.reason;
                return `<tr>
      <td>${startIdx + i + 1}</td>
      <td>${thumbHtml}</td>
      <td>${r.name}</td>
      <td><span style="background:var(--green-lt);color:var(--green);padding:2px 8px;border-radius:12px;font-size:.72rem;font-weight:600;">${r.cls}</span></td>
      <td>${r.father}</td>
      <td>${r.contact}</td>
      <td title="${r.reason}">${shortReason}</td>
      <td>${r.leaveDate ? formatDate(r.leaveDate) : '—'}</td>
      <td><span class="status-badge ${r.status === 'issued' ? 'status-issued' : 'status-pending'}">${r.status === 'issued' ? 'Issued' : 'Pending'}</span></td>
      <td>
        <div style="display:flex;gap:4px;flex-wrap:wrap;">
          <button class="btn-sm-g btn-view" style="padding:3px 8px;font-size:.7rem;" onclick="viewDetail(${r.id})"><i class="bi bi-eye"></i></button>
          <button class="btn-sm-g btn-dl" style="padding:3px 8px;font-size:.7rem;" onclick="downloadDoc(${r.id})" ${!hasDoc ? 'disabled' : ''}><i class="bi bi-download"></i></button>
          <button class="btn-sm-g btn-edit" style="padding:3px 8px;font-size:.7rem;" onclick="openEditModal(${r.id})"><i class="bi bi-pencil"></i></button>
          <button class="btn-sm-g btn-del" style="padding:3px 8px;font-size:.7rem;" onclick="openDeleteModal(${r.id})"><i class="bi bi-trash3"></i></button>
        </div>
      </td>
    </tr>`;
            }).join('');
        }

        // ── PAGINATION ──
        function renderPagination(total) {
            const pages = Math.ceil(total / perPage);
            const start = (currentPage - 1) * perPage + 1,
                end = Math.min(currentPage * perPage, total);
            document.getElementById('pageInfo').textContent = `Showing ${start}–${end} of ${total} records`;
            const ul = document.getElementById('pageList');
            let html = `<li class="page-item ${currentPage === 1 ? 'disabled' : ''}">
    <a class="page-link" onclick="gotoPage(${currentPage - 1})"><i class="bi bi-chevron-left"></i></a></li>`;
            const range = [];
            for (let i = 1; i <= pages; i++) {
                if (i === 1 || i === pages || Math.abs(i - currentPage) <= 1) range.push(i);
                else if (range[range.length - 1] !== '…') range.push('…');
            }
            range.forEach(p => {
                if (p === '…') html += `<li class="page-item disabled"><span class="page-link">…</span></li>`;
                else html += `<li class="page-item ${p === currentPage ? 'active' : ''}">
      <a class="page-link" onclick="gotoPage(${p})">${p}</a></li>`;
            });
            html += `<li class="page-item ${currentPage === pages ? 'disabled' : ''}">
    <a class="page-link" onclick="gotoPage(${currentPage + 1})"><i class="bi bi-chevron-right"></i></a></li>`;
            ul.innerHTML = html;
        }

        function gotoPage(p) {
            const pages = Math.ceil(filteredRecords.length / perPage);
            if (p < 1 || p > pages) return;
            currentPage = p;
            renderAll();
            document.getElementById('recordsPage').scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }

        function changePerPage() {
            perPage = parseInt(document.getElementById('perPageSelect').value);
            currentPage = 1;
            renderAll();
        }

        // ── VIEW TOGGLE ──
        let currentView = 'card';

        function setView(v) {
            currentView = v;
            document.getElementById('cardsView').style.display = v === 'card' ? 'grid' : 'none';
            document.getElementById('tableView').style.display = v === 'table' ? '' : 'none';
            document.getElementById('btnCard').classList.toggle('active', v === 'card');
            document.getElementById('btnTable').classList.toggle('active', v === 'table');
        }

        // ══════════════════════════════════════════
        // ADD / EDIT MODAL
        // ══════════════════════════════════════════
        function openAddModal() {
            document.getElementById('modalTitle').textContent = 'Add TC Record';
            document.getElementById('saveBtnText').textContent = 'Save Record';
            document.getElementById('editId').value = '';
            clearForm();
            docDataUrl = null;
            new bootstrap.Modal(document.getElementById('recordModal')).show();
        }

        function openEditModal(id) {
            const r = records.find(x => x.id === id);
            if (!r) return;
            document.getElementById('modalTitle').textContent = 'Edit TC Record';
            document.getElementById('saveBtnText').textContent = 'Update Record';
            document.getElementById('editId').value = id;
            document.getElementById('fName').value = r.name || '';
            document.getElementById('fClass').value = r.cls || '';
            document.getElementById('fSection').value = r.section || '';
            document.getElementById('fRoll').value = r.roll || '';
            document.getElementById('fDob').value = r.dob || '';
            document.getElementById('fAdmNo').value = r.admNo || '';
            document.getElementById('fFather').value = r.father || '';
            document.getElementById('fMother').value = r.mother || '';
            document.getElementById('fContact').value = r.contact || '';
            document.getElementById('fContact2').value = r.contact2 || '';
            document.getElementById('fAddress').value = r.address || '';
            document.getElementById('fLeaveDate').value = r.leaveDate || '';
            document.getElementById('fTcDate').value = r.tcDate || '';
            document.getElementById('fStatus').value = r.status || 'pending';
            document.getElementById('fReason').value = r.reason || '';
            document.getElementById('fTransferTo').value = r.transferTo || '';
            docDataUrl = r.docData || null;
            // Show existing doc indicator
            document.getElementById('existingDocInfo').style.display = r.docName ? '' : 'none';
            document.getElementById('docPreviewWrap').style.display = 'none';
            document.getElementById('formError').style.display = 'none';
            // Close detail modal if open
            const dm = bootstrap.Modal.getInstance(document.getElementById('detailModal'));
            if (dm) dm.hide();
            new bootstrap.Modal(document.getElementById('recordModal')).show();
        }

        function clearForm() {
            ['fName', 'fClass', 'fSection', 'fRoll', 'fDob', 'fAdmNo', 'fFather', 'fMother', 'fContact', 'fContact2',
                'fAddress', 'fLeaveDate', 'fTcDate', 'fReason', 'fTransferTo'
            ].forEach(id => {
                const el = document.getElementById(id);
                if (el) el.value = '';
            });
            document.getElementById('fStatus').value = 'issued';
            document.getElementById('docPreviewWrap').style.display = 'none';
            document.getElementById('existingDocInfo').style.display = 'none';
            document.getElementById('fDoc').value = '';
            document.getElementById('formError').style.display = 'none';
            document.getElementById('docImgPreview').style.display = 'none';
        }

        function handleDocUpload(e) {
            const file = e.target.files[0];
            if (!file) return;
            const maxMB = 5;
            if (file.size > maxMB * 1024 * 1024) {
                showToast('File too large. Max 5MB.', 'danger');
                return;
            }
            const reader = new FileReader();
            reader.onload = ev => {
                docDataUrl = ev.target.result;
                document.getElementById('docFileName').textContent = file.name;
                document.getElementById('docFileSize').textContent = (file.size / 1024).toFixed(1) + ' KB';
                document.getElementById('docPreviewWrap').style.display = '';
                const img = document.getElementById('docImgPreview');
                if (file.type.startsWith('image/')) {
                    img.src = docDataUrl;
                    img.style.display = '';
                } else {
                    img.style.display = 'none';
                }
            };
            reader.readAsDataURL(file);
        }

        function clearDoc() {
            docDataUrl = null;
            document.getElementById('fDoc').value = '';
            document.getElementById('docPreviewWrap').style.display = 'none';
            document.getElementById('docImgPreview').style.display = 'none';
        }

        // function saveRecord() removed as form is submitted to backend
        // ══════════════════════════════════════════
        // VIEW DETAIL
        // ══════════════════════════════════════════
        function viewDetail(id) {
            const r = records.find(x => x.id === id);
            if (!r) return;
            currentDetailId = id;
            const initials = r.name.split(' ').map(n => n[0]).join('').slice(0, 2).toUpperCase();
            const hasDoc = r.docData || r.docName;
            const isImg = r.docType === 'image' && r.docData;
            const isPdf = r.docName && r.docName.toLowerCase().endsWith('.pdf');
            let docHtml = '';
            if (isImg) docHtml = `<div class="doc-preview-full"><img src="${r.docData}" alt="TC Document"></div>`;
            else if (hasDoc) docHtml = `<div class="doc-preview-full" style="background:var(--green-lt);padding:20px;text-align:center;border-radius:10px;border:1px solid var(--border);">
    <i class="bi bi-file-earmark-check" style="font-size:2.5rem;color:var(--green);display:block;margin-bottom:8px;"></i>
    <div style="font-size:.85rem;font-weight:600;color:var(--ink);">${r.docName || 'TC Certificate'}</div>
    <div style="font-size:.75rem;color:var(--muted);margin-top:4px;">Document on file</div>
  </div>`;
            else docHtml = `<div style="background:var(--red-lt);border:1px dashed #e57373;border-radius:10px;padding:18px;text-align:center;margin-top:16px;">
    <i class="bi bi-file-earmark-x" style="font-size:2rem;color:var(--red);display:block;margin-bottom:6px;"></i>
    <div style="font-size:.82rem;color:var(--red);font-weight:500;">No TC document uploaded</div>
  </div>`;

            document.getElementById('detailBody').innerHTML = `
    <div class="detail-header">
      <div class="detail-avatar">${initials}</div>
      <div>
        <div class="detail-title">${r.name}</div>
        <div class="detail-sub">${r.cls}${r.section ? ' – Sec ' + r.section : ''} &nbsp;|&nbsp; Adm: ${r.admNo || 'N/A'} &nbsp;|&nbsp; Roll: ${r.roll || 'N/A'}</div>
        <div class="mt-2"><span class="status-badge ${r.status === 'issued' ? 'status-issued' : 'status-pending'}" style="font-size:.72rem;">
          <i class="bi bi-${r.status === 'issued' ? 'check-circle' : 'clock'}"></i> TC ${r.status === 'issued' ? 'Issued' : 'Pending'}
        </span></div>
      </div>
    </div>
    <div class="detail-grid">
      <div class="detail-field"><label>Father's Name</label><p>${r.father}</p></div>
      <div class="detail-field"><label>Mother's Name</label><p>${r.mother || '—'}</p></div>
      <div class="detail-field"><label>Contact</label><p>${r.contact}${r.contact2 ? ' / ' + r.contact2 : ''}</p></div>
      <div class="detail-field"><label>Date of Birth</label><p>${r.dob ? formatDate(r.dob) : '—'}</p></div>
      <div class="detail-field" style="grid-column:1/-1"><label>Address</label><p>${r.address}</p></div>
      <div class="detail-field"><label>Date of Leaving</label><p>${r.leaveDate ? formatDate(r.leaveDate) : '—'}</p></div>
      <div class="detail-field"><label>TC Issue Date</label><p>${r.tcDate ? formatDate(r.tcDate) : '—'}</p></div>
      <div class="detail-field" style="grid-column:1/-1"><label>Reason for Leaving</label><p>${r.reason}</p></div>
      ${r.transferTo ? `<div class="detail-field" style="grid-column:1/-1"><label>Transferred To</label><p>${r.transferTo}</p></div>` : ''}
    </div>
    <div style="font-size:.8rem;font-weight:700;color:var(--ink2);margin:16px 0 8px;text-transform:uppercase;letter-spacing:.05em;">TC Certificate</div>
    ${docHtml}
  `;
            document.getElementById('detailEditBtn').onclick = () => openEditModal(id);
            document.getElementById('detailDlBtn').onclick = () => downloadDoc(id);
            document.getElementById('detailDlBtn').disabled = !hasDoc;
            new bootstrap.Modal(document.getElementById('detailModal')).show();
        }

        // ══════════════════════════════════════════
        // DOWNLOAD
        // ══════════════════════════════════════════
        function downloadDoc(id) {
            const r = records.find(x => x.id === id);
            if (!r) return;
            if (!r.docData && !r.docName) {
                showToast('No document uploaded for this record.', 'danger');
                return;
            }
            if (r.docData) {
                const a = document.createElement('a');
                a.href = r.docData;
                a.download = r.docName || ('TC_' + r.name.replace(/\s+/g, '_') + '.jpg');
                a.click();
                showToast('Downloading TC certificate…', 'success');
            } else {
                showToast('Document name on file: ' + r.docName, 'info');
            }
        }

        // ══════════════════════════════════════════
        // DELETE
        // ══════════════════════════════════════════
        function openDeleteModal(id) {
            deleteTargetId = id;
            const r = records.find(x => x.id === id);
            document.getElementById('deleteConfirmText').textContent =
                `This will permanently delete the TC record for "${r?.name || 'this student'}". This action cannot be undone.`;
            new bootstrap.Modal(document.getElementById('deleteModal')).show();
        }

        function confirmDelete() {
            if (!deleteTargetId) return;
            window.location.href = "{{ url('/admin/dashboard/student/delete') }}/" + deleteTargetId;
        }

        // ══════════════════════════════════════════
        // UTILS
        // ══════════════════════════════════════════
        function handleDocUpload(event) {
            const file = event.target.files[0];
            if (!file) {
                clearDoc();
                return;
            }

            const previewWrap = document.getElementById('docPreviewWrap');
            const fileName = document.getElementById('docFileName');
            const fileSize = document.getElementById('docFileSize');
            const imgPreview = document.getElementById('docImgPreview');

            fileName.textContent = file.name;
            fileSize.textContent = (file.size / 1024 / 1024).toFixed(2) + ' MB';

            previewWrap.style.display = 'block';

            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imgPreview.src = e.target.result;
                    imgPreview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            } else {
                imgPreview.style.display = 'none';
                imgPreview.src = '';
            }
        }

        function clearDoc() {
            const fileInput = document.getElementById('fDoc');
            fileInput.value = '';

            document.getElementById('docPreviewWrap').style.display = 'none';
            document.getElementById('docImgPreview').style.display = 'none';
            document.getElementById('docImgPreview').src = '';
            document.getElementById('docFileName').textContent = '';
            document.getElementById('docFileSize').textContent = '';
        }

        function formatDate(d) {
            if (!d) return '—';
            const [y, m, day] = d.split('-');
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
            return `${parseInt(day)} ${months[parseInt(m) - 1]} ${y}`;
        }

        function showToast(msg, type = 'success') {
            const t = document.getElementById('mainToast');
            t.className = `toast align-items-center border-0 toast-${type === 'info' ? 'success' : type}`;
            document.getElementById('toastMsg').textContent = msg;
            new bootstrap.Toast(t, {
                delay: 3000
            }).show();
        }

        function populateClassFilter() {
            const sel = document.getElementById('filterClass');
            const classes = [...new Set(records.map(r => r.cls))].sort();
            const cur = sel.value;
            sel.innerHTML = '<option value="">All Classes</option>' + classes.map(c => `<option value="${c}">${c}</option>`).join('');
            sel.value = cur && classes.includes(cur) ? cur : '';
        }

        // ══════════════════════════════════════════
        // INIT
        // ══════════════════════════════════════════
        document.addEventListener('DOMContentLoaded', () => {
            populateClassFilter();
            filteredRecords = [...records];
            renderAll();
            setView('card');
        });
    </script>
</body>

</html>
