<?php
// includes/header.php
require_once __DIR__ . '/../config/session.php';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$user = getCurrentUser();
?>
<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageTitle ?? 'UltraWallet' ?> — Own Everything</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Syne:wght@400;600;700;800&family=Space+Mono:wght@400;700&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        display: ['Syne', 'sans-serif'],
                        mono: ['Space Mono', 'monospace'],
                        body: ['DM Sans', 'sans-serif'],
                    },
                    colors: {
                        ultra: {
                            bg:      '#050810',
                            surface: '#0d1117',
                            card:    '#111827',
                            border:  '#1f2937',
                            muted:   '#374151',
                            text:    '#f9fafb',
                            sub:     '#9ca3af',
                            gold:    '#f59e0b',
                            cyan:    '#06b6d4',
                            violet:  '#8b5cf6',
                            green:   '#10b981',
                            red:     '#ef4444',
                        }
                    },
                    animation: {
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4,0,0.6,1) infinite',
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'scan': 'scan 3s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-10px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px #06b6d4, 0 0 10px #06b6d4' },
                            '100%': { boxShadow: '0 0 20px #06b6d4, 0 0 40px #06b6d4, 0 0 80px #06b6d440' },
                        },
                        scan: {
                            '0%': { transform: 'translateY(-100%)' },
                            '100%': { transform: 'translateY(100vh)' },
                        }
                    }
                }
            }
        }
    </script>
    <style>
        body { background: #050810; color: #f9fafb; font-family: 'DM Sans', sans-serif; }

        .noise-bg::before {
            content: '';
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 256 256' xmlns='http://www.w3.org/2000/svg'%3E%3Cfilter id='n'%3E%3CfeTurbulence type='fractalNoise' baseFrequency='0.9' numOctaves='4' stitchTiles='stitch'/%3E%3C/filter%3E%3Crect width='100%25' height='100%25' filter='url(%23n)' opacity='0.04'/%3E%3C/svg%3E");
            pointer-events: none; z-index: 0; opacity: 0.4;
        }

        .grid-bg {
            background-image:
                linear-gradient(rgba(6,182,212,0.04) 1px, transparent 1px),
                linear-gradient(90deg, rgba(6,182,212,0.04) 1px, transparent 1px);
            background-size: 60px 60px;
        }

        .glow-border { box-shadow: 0 0 0 1px rgba(6,182,212,0.3), 0 0 20px rgba(6,182,212,0.1); }
        .glow-gold   { box-shadow: 0 0 0 1px rgba(245,158,11,0.3), 0 0 20px rgba(245,158,11,0.1); }
        .glow-violet { box-shadow: 0 0 0 1px rgba(139,92,246,0.3), 0 0 20px rgba(139,92,246,0.1); }
        .glow-green  { box-shadow: 0 0 0 1px rgba(16,185,129,0.3), 0 0 20px rgba(16,185,129,0.1); }

        .nav-link {
            position: relative;
            transition: color 0.2s;
        }
        .nav-link::after {
            content: '';
            position: absolute;
            bottom: -4px; left: 0; right: 0; height: 1px;
            background: #06b6d4;
            transform: scaleX(0);
            transition: transform 0.3s;
        }
        .nav-link:hover::after, .nav-link.active::after { transform: scaleX(1); }

        .asset-card {
            transition: transform 0.3s, box-shadow 0.3s;
        }
        .asset-card:hover {
            transform: translateY(-4px);
        }

        .wallet-btn {
            position: relative; overflow: hidden;
            transition: all 0.3s;
        }
        .wallet-btn::before {
            content: '';
            position: absolute;
            top: 0; left: -100%; width: 100%; height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.05), transparent);
            transition: left 0.5s;
        }
        .wallet-btn:hover::before { left: 100%; }

        .ticker-wrap {
            overflow: hidden;
            white-space: nowrap;
        }
        .ticker-inner {
            display: inline-block;
            animation: ticker 30s linear infinite;
        }
        @keyframes ticker {
            0%   { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        ::-webkit-scrollbar { width: 4px; }
        ::-webkit-scrollbar-track { background: #0d1117; }
        ::-webkit-scrollbar-thumb { background: #06b6d4; border-radius: 2px; }

        .stat-number {
            font-family: 'Space Mono', monospace;
            background: linear-gradient(135deg, #06b6d4, #8b5cf6);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
    </style>
</head>
<body class="noise-bg grid-bg min-h-screen relative">

<?php if (!extension_loaded("mongodb")): ?>
<div style="position:relative;z-index:50;background:rgba(120,53,15,0.4);border-bottom:1px solid rgba(245,158,11,0.3);padding:.4rem 1.5rem;text-align:center;font-size:.7rem;font-family:Space Mono,monospace;color:#fcd34d;display:flex;align-items:center;justify-content:center;gap:.75rem;flex-wrap:wrap;">
  <span style="color:#f59e0b;font-weight:bold"><body class="noise-bg grid-bg min-h-screen relative">#9888; Dev Mode</span>
  <span style="color:rgba(253,230,138,0.7)">MongoDB extension not loaded <body class="noise-bg grid-bg min-h-screen relative">mdash; using local JSON storage. Fully functional.</span>
  <a href="#mongo-setup" style="color:#f59e0b;text-decoration:underline;">Enable MongoDB <body class="noise-bg grid-bg min-h-screen relative">rarr;</a>
</div>
<?php endif; ?>

<!-- Live Ticker -->
<div class="ticker-wrap border-b border-ultra-border bg-ultra-surface/80 backdrop-blur-sm py-2 text-xs font-mono text-ultra-sub z-50 relative">
    <div class="ticker-inner">
        <span class="mx-6 text-ultra-green">● BTC $67,420.50 <span class="text-ultra-green">+2.4%</span></span>
        <span class="mx-6">● ETH $3,840.20 <span class="text-ultra-green">+1.8%</span></span>
        <span class="mx-6 text-ultra-gold">● GOLD $2,341.80/oz <span class="text-ultra-red">-0.3%</span></span>
        <span class="mx-6">● AAPL $189.40 <span class="text-ultra-green">+0.9%</span></span>
        <span class="mx-6">● SOL $172.60 <span class="text-ultra-green">+5.2%</span></span>
        <span class="mx-6 text-ultra-gold">● SILVER $29.45/oz <span class="text-ultra-green">+0.7%</span></span>
        <span class="mx-6">● TSLA $248.90 <span class="text-ultra-red">-1.2%</span></span>
        <span class="mx-6">● BNB $412.30 <span class="text-ultra-green">+3.1%</span></span>
        <span class="mx-6">● MSFT $415.60 <span class="text-ultra-green">+0.5%</span></span>
        <span class="mx-6 text-ultra-violet">● ADA $0.62 <span class="text-ultra-green">+4.8%</span></span>
        <!-- duplicate for seamless loop -->
        <span class="mx-6 text-ultra-green">● BTC $67,420.50 <span class="text-ultra-green">+2.4%</span></span>
        <span class="mx-6">● ETH $3,840.20 <span class="text-ultra-green">+1.8%</span></span>
        <span class="mx-6 text-ultra-gold">● GOLD $2,341.80/oz <span class="text-ultra-red">-0.3%</span></span>
        <span class="mx-6">● AAPL $189.40 <span class="text-ultra-green">+0.9%</span></span>
        <span class="mx-6">● SOL $172.60 <span class="text-ultra-green">+5.2%</span></span>
        <span class="mx-6 text-ultra-gold">● SILVER $29.45/oz <span class="text-ultra-green">+0.7%</span></span>
        <span class="mx-6">● TSLA $248.90 <span class="text-ultra-red">-1.2%</span></span>
        <span class="mx-6">● BNB $412.30 <span class="text-ultra-green">+3.1%</span></span>
    </div>
</div>

<!-- Navigation -->
<nav class="sticky top-0 z-40 bg-ultra-bg/90 backdrop-blur-xl border-b border-ultra-border">
    <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <!-- Logo -->
        <a href="/index.php" class="flex items-center gap-3 group">
            <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-sm animate-glow">U</div>
            <span class="font-display font-bold text-xl tracking-tight">Ultra<span class="text-ultra-cyan">Wallet</span></span>
        </a>

        <!-- Nav Links -->
        <div class="hidden md:flex items-center gap-8 text-sm font-medium text-ultra-sub">
            <a href="/index.php" class="nav-link <?= $currentPage === 'index' ? 'text-ultra-text active' : 'hover:text-ultra-text' ?>">Home</a>
            <a href="/dashboard.php" class="nav-link <?= $currentPage === 'dashboard' ? 'text-ultra-text active' : 'hover:text-ultra-text' ?>">Dashboard</a>
            <a href="/assets.php" class="nav-link <?= $currentPage === 'assets' ? 'text-ultra-text active' : 'hover:text-ultra-text' ?>">Assets</a>
            <a href="/wallet.php" class="nav-link <?= $currentPage === 'wallet' ? 'text-ultra-text active' : 'hover:text-ultra-text' ?>">Wallets</a>
            <a href="/portfolio.php" class="nav-link <?= $currentPage === 'portfolio' ? 'text-ultra-text active' : 'hover:text-ultra-text' ?>">Portfolio</a>
        </div>

        <!-- CTA -->
        <div class="flex items-center gap-3">
            <?php if (isLoggedIn() && $user): ?>
                <div class="flex items-center gap-3">
                    <div class="text-right hidden sm:block">
                        <p class="text-xs text-ultra-sub font-mono">Logged in as</p>
                        <p class="text-sm font-semibold text-ultra-cyan"><?= htmlspecialchars($user['username'] ?? 'User') ?></p>
                    </div>
                    <a href="/logout.php" class="px-4 py-2 text-sm font-medium text-ultra-red border border-ultra-red/30 rounded-lg hover:bg-ultra-red/10 transition-colors">Logout</a>
                </div>
            <?php else: ?>
                <a href="/login.php" class="text-sm text-ultra-sub hover:text-ultra-text transition-colors">Sign In</a>
                <a href="/register.php" class="px-4 py-2 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity">Get Started</a>
            <?php endif; ?>
        </div>
    </div>
</nav>
