<?php
// index.php
$pageTitle = 'UltraWallet — Own Everything';
require_once __DIR__ . '/includes/header.php';
?>

<!-- HERO SECTION -->
<section class="relative min-h-[90vh] flex items-center overflow-hidden">
    <!-- Ambient glows -->
    <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-ultra-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-ultra-violet/10 rounded-full blur-3xl pointer-events-none"></div>
    <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-ultra-gold/5 rounded-full blur-3xl pointer-events-none"></div>

    <div class="max-w-7xl mx-auto px-6 py-20 relative z-10">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Left -->
            <div>
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-ultra-cyan/30 bg-ultra-cyan/10 text-ultra-cyan text-xs font-mono mb-8 animate-pulse-slow">
                    <span class="w-2 h-2 rounded-full bg-ultra-cyan animate-ping inline-flex"></span>
                    Web3 Multi-Asset Platform
                </div>

                <h1 class="font-display font-extrabold text-5xl lg:text-7xl leading-none tracking-tight mb-6">
                    Own the<br>
                    <span class="relative">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan via-ultra-violet to-ultra-gold">Entire World</span>
                    </span><br>
                    in One Wallet
                </h1>

                <p class="text-ultra-sub text-lg leading-relaxed mb-10 max-w-lg">
                    From Bitcoin to gold bars, from Apple stocks to Manhattan real estate — UltraWallet lets you own, trade, and grow <em class="text-ultra-text not-italic">real-world assets</em> through the power of Web3.
                </p>

                <div class="flex flex-wrap gap-4">
                    <a href="/register.php" class="group px-8 py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl text-sm hover:scale-105 transition-transform glow-border">
                        Start Owning →
                    </a>
                    <a href="/assets.php" class="px-8 py-4 border border-ultra-border text-ultra-sub hover:text-ultra-text hover:border-ultra-muted font-medium rounded-xl text-sm transition-colors">
                        Explore Assets
                    </a>
                </div>

                <!-- Stats Row -->
                <div class="grid grid-cols-3 gap-6 mt-14 pt-10 border-t border-ultra-border">
                    <div>
                        <p class="stat-number text-3xl font-bold font-mono">$4.2B</p>
                        <p class="text-xs text-ultra-sub mt-1">Assets Under Custody</p>
                    </div>
                    <div>
                        <p class="stat-number text-3xl font-bold font-mono">180+</p>
                        <p class="text-xs text-ultra-sub mt-1">Asset Classes</p>
                    </div>
                    <div>
                        <p class="stat-number text-3xl font-bold font-mono">2.1M</p>
                        <p class="text-xs text-ultra-sub mt-1">Global Holders</p>
                    </div>
                </div>
            </div>

            <!-- Right — Floating Wallet Card -->
            <div class="flex justify-center lg:justify-end">
                <div class="relative w-full max-w-sm">
                    <!-- Main Card -->
                    <div class="relative bg-gradient-to-br from-ultra-card via-ultra-surface to-ultra-bg border border-ultra-border rounded-2xl p-6 glow-border animate-float">
                        <div class="flex justify-between items-start mb-8">
                            <div>
                                <p class="text-xs text-ultra-sub font-mono uppercase tracking-widest">Total Portfolio</p>
                                <p class="font-mono text-3xl font-bold text-ultra-text mt-1">$284,910.<span class="text-ultra-cyan">47</span></p>
                            </div>
                            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white text-sm font-bold">U</div>
                        </div>

                        <!-- Asset Breakdown -->
                        <div class="space-y-3 mb-6">
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-yellow-500/20 flex items-center justify-center text-xs">₿</div>
                                    <span class="text-sm text-ultra-sub">Bitcoin</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-mono text-ultra-text">$124,840</p>
                                    <p class="text-xs text-ultra-green">+4.2%</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-ultra-gold/20 flex items-center justify-center text-xs text-ultra-gold">Au</div>
                                    <span class="text-sm text-ultra-sub">Gold (12oz)</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-mono text-ultra-text">$28,101</p>
                                    <p class="text-xs text-ultra-red">-0.3%</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-ultra-violet/20 flex items-center justify-center text-xs text-ultra-violet">S</div>
                                    <span class="text-sm text-ultra-sub">Stocks</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-mono text-ultra-text">$67,450</p>
                                    <p class="text-xs text-ultra-green">+1.8%</p>
                                </div>
                            </div>
                            <div class="flex justify-between items-center">
                                <div class="flex items-center gap-2">
                                    <div class="w-6 h-6 rounded-full bg-ultra-green/20 flex items-center justify-center text-xs text-ultra-green">RE</div>
                                    <span class="text-sm text-ultra-sub">Real Estate</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-mono text-ultra-text">$64,519</p>
                                    <p class="text-xs text-ultra-green">+0.5%</p>
                                </div>
                            </div>
                        </div>

                        <!-- Progress bar -->
                        <div class="h-1.5 bg-ultra-border rounded-full overflow-hidden">
                            <div class="h-full rounded-full bg-gradient-to-r from-ultra-cyan via-ultra-violet to-ultra-gold" style="width: 73%"></div>
                        </div>
                        <p class="text-xs text-ultra-sub mt-2 font-mono">Portfolio Health: 73/100</p>
                    </div>

                    <!-- Floating mini badges -->
                    <div class="absolute -top-4 -right-4 bg-ultra-card border border-ultra-green/40 rounded-xl px-3 py-2 glow-green">
                        <p class="text-xs text-ultra-green font-mono font-bold">+12.4% MTD</p>
                    </div>
                    <div class="absolute -bottom-4 -left-4 bg-ultra-card border border-ultra-gold/40 rounded-xl px-3 py-2 glow-gold">
                        <p class="text-xs text-ultra-gold font-mono">GOLD LIVE</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ASSET CATEGORIES -->
<section class="py-24 relative">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-ultra-cyan font-mono text-sm uppercase tracking-widest mb-3">Asset Universe</p>
            <h2 class="font-display font-extrabold text-4xl lg:text-5xl">Everything You Can Own</h2>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <!-- Crypto -->
            <a href="/assets.php?type=crypto" class="asset-card group bg-ultra-card border border-ultra-border rounded-2xl p-6 hover:border-yellow-500/40 hover:glow-border transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-xl bg-yellow-500/10 border border-yellow-500/20 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition-transform">₿</div>
                <h3 class="font-display font-bold text-lg mb-2">Cryptocurrency</h3>
                <p class="text-ultra-sub text-sm mb-4 leading-relaxed">BTC, ETH, SOL, ADA & 200+ tokens across all major chains.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-mono text-yellow-500 bg-yellow-500/10 px-2 py-1 rounded-md">200+ Tokens</span>
                    <span class="text-ultra-sub text-sm group-hover:text-ultra-cyan transition-colors">→</span>
                </div>
            </a>

            <!-- Gold -->
            <a href="/assets.php?type=gold" class="asset-card group bg-ultra-card border border-ultra-border rounded-2xl p-6 hover:border-ultra-gold/40 hover:glow-gold transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-xl bg-ultra-gold/10 border border-ultra-gold/20 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition-transform">⚡</div>
                <h3 class="font-display font-bold text-lg mb-2">Precious Metals</h3>
                <p class="text-ultra-sub text-sm mb-4 leading-relaxed">Gold, silver, platinum & palladium — backed by physical vaults.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-mono text-ultra-gold bg-ultra-gold/10 px-2 py-1 rounded-md">Vault-Backed</span>
                    <span class="text-ultra-sub text-sm group-hover:text-ultra-gold transition-colors">→</span>
                </div>
            </a>

            <!-- Stocks -->
            <a href="/assets.php?type=stocks" class="asset-card group bg-ultra-card border border-ultra-border rounded-2xl p-6 hover:border-ultra-violet/40 hover:glow-violet transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-xl bg-ultra-violet/10 border border-ultra-violet/20 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition-transform">📈</div>
                <h3 class="font-display font-bold text-lg mb-2">Global Stocks</h3>
                <p class="text-ultra-sub text-sm mb-4 leading-relaxed">NYSE, NASDAQ, LSE, and 20+ global exchanges. Fractional shares available.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-mono text-ultra-violet bg-ultra-violet/10 px-2 py-1 rounded-md">10,000+ Stocks</span>
                    <span class="text-ultra-sub text-sm group-hover:text-ultra-violet transition-colors">→</span>
                </div>
            </a>

            <!-- Real Estate -->
            <a href="/assets.php?type=realestate" class="asset-card group bg-ultra-card border border-ultra-border rounded-2xl p-6 hover:border-ultra-green/40 hover:glow-green transition-all cursor-pointer">
                <div class="w-12 h-12 rounded-xl bg-ultra-green/10 border border-ultra-green/20 flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition-transform">🏢</div>
                <h3 class="font-display font-bold text-lg mb-2">Real Estate</h3>
                <p class="text-ultra-sub text-sm mb-4 leading-relaxed">Tokenized properties in NYC, London, Dubai, Tokyo & more.</p>
                <div class="flex justify-between items-center">
                    <span class="text-xs font-mono text-ultra-green bg-ultra-green/10 px-2 py-1 rounded-md">Tokenized</span>
                    <span class="text-ultra-sub text-sm group-hover:text-ultra-green transition-colors">→</span>
                </div>
            </a>
        </div>
    </div>
</section>

<!-- WALLET VENDORS SECTION -->
<section class="py-24 bg-ultra-surface/50 relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-b from-transparent via-ultra-cyan/3 to-transparent pointer-events-none"></div>
    <div class="max-w-7xl mx-auto px-6 relative z-10">
        <div class="text-center mb-16">
            <p class="text-ultra-violet font-mono text-sm uppercase tracking-widest mb-3">Multi-Wallet</p>
            <h2 class="font-display font-extrabold text-4xl lg:text-5xl">Connect Any Wallet</h2>
            <p class="text-ultra-sub mt-4 max-w-xl mx-auto">We support every major wallet — hardware, software, and mobile — so you're never locked in.</p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
            <?php
            $wallets = [
                ['name' => 'MetaMask',   'color' => '#E2761B', 'icon' => '🦊', 'chains' => 'EVM'],
                ['name' => 'WalletConnect', 'color' => '#3B99FC', 'icon' => '🔗', 'chains' => 'Multi'],
                ['name' => 'Coinbase',   'color' => '#0052FF', 'icon' => '🔵', 'chains' => 'EVM'],
                ['name' => 'Phantom',    'color' => '#AB9FF2', 'icon' => '👻', 'chains' => 'Solana'],
                ['name' => 'Ledger',     'color' => '#00C4B4', 'icon' => '🔐', 'chains' => 'Hardware'],
                ['name' => 'Trust',      'color' => '#3375BB', 'icon' => '🛡️', 'chains' => 'Multi'],
                ['name' => 'Rainbow',    'color' => '#FF6B6B', 'icon' => '🌈', 'chains' => 'EVM'],
                ['name' => 'Trezor',     'color' => '#00854D', 'icon' => '💚', 'chains' => 'Hardware'],
                ['name' => 'OKX',        'color' => '#FFFFFF', 'icon' => '⭕', 'chains' => 'Multi'],
                ['name' => 'Rabby',      'color' => '#7084FF', 'icon' => '🐰', 'chains' => 'EVM'],
                ['name' => 'Keplr',      'color' => '#6D4AFF', 'icon' => '⚛️', 'chains' => 'Cosmos'],
                ['name' => 'Argent',     'color' => '#FF875B', 'icon' => '🟠', 'chains' => 'Starknet'],
            ];
            foreach ($wallets as $wallet): ?>
            <a href="/wallet.php" class="wallet-btn group bg-ultra-card border border-ultra-border rounded-xl p-4 text-center hover:border-ultra-muted transition-all">
                <div class="text-3xl mb-3 group-hover:scale-110 transition-transform inline-block"><?= $wallet['icon'] ?></div>
                <p class="font-display font-bold text-sm"><?= $wallet['name'] ?></p>
                <p class="text-xs text-ultra-sub font-mono mt-1"><?= $wallet['chains'] ?></p>
            </a>
            <?php endforeach; ?>
        </div>

        <div class="text-center mt-10">
            <a href="/wallet.php" class="inline-flex items-center gap-2 text-ultra-cyan text-sm font-medium hover:gap-3 transition-all">
                View all 50+ supported wallets <span>→</span>
            </a>
        </div>
    </div>
</section>

<!-- HOW IT WORKS -->
<section class="py-24">
    <div class="max-w-7xl mx-auto px-6">
        <div class="text-center mb-16">
            <p class="text-ultra-gold font-mono text-sm uppercase tracking-widest mb-3">Process</p>
            <h2 class="font-display font-extrabold text-4xl lg:text-5xl">Own Assets in 3 Steps</h2>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 relative">
            <!-- connector line -->
            <div class="hidden md:block absolute top-12 left-1/6 right-1/6 h-px bg-gradient-to-r from-ultra-cyan via-ultra-violet to-ultra-gold opacity-30"></div>

            <?php
            $steps = [
                ['num' => '01', 'title' => 'Connect Wallet', 'desc' => 'Link your existing crypto wallet or create a new one. We support 50+ providers.', 'color' => 'ultra-cyan'],
                ['num' => '02', 'title' => 'Choose Assets', 'desc' => 'Browse gold, stocks, real estate, and digital assets. Buy fractions from $1.', 'color' => 'ultra-violet'],
                ['num' => '03', 'title' => 'Own & Earn', 'desc' => 'Track performance, earn yields, and trade globally 24/7 with instant settlement.', 'color' => 'ultra-gold'],
            ];
            foreach ($steps as $i => $step): ?>
            <div class="relative bg-ultra-card border border-ultra-border rounded-2xl p-8">
                <div class="w-12 h-12 rounded-xl border border-<?= $step['color'] ?>/30 bg-<?= $step['color'] ?>/10 flex items-center justify-center font-mono font-bold text-<?= $step['color'] ?> text-sm mb-6">
                    <?= $step['num'] ?>
                </div>
                <h3 class="font-display font-bold text-xl mb-3"><?= $step['title'] ?></h3>
                <p class="text-ultra-sub leading-relaxed"><?= $step['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- CTA BANNER -->
<section class="py-20 mx-6 mb-10 rounded-3xl bg-gradient-to-br from-ultra-card via-ultra-surface to-ultra-bg border border-ultra-border relative overflow-hidden">
    <div class="absolute inset-0 bg-gradient-to-br from-ultra-cyan/5 via-transparent to-ultra-violet/5 pointer-events-none"></div>
    <div class="text-center relative z-10 px-6">
        <h2 class="font-display font-extrabold text-4xl lg:text-6xl mb-6">
            Your Wealth.<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan to-ultra-gold">No Borders.</span>
        </h2>
        <p class="text-ultra-sub text-lg max-w-xl mx-auto mb-10">Join 2 million people already owning the world through UltraWallet.</p>
        <a href="/register.php" class="inline-block px-10 py-5 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold text-lg rounded-2xl hover:scale-105 transition-transform glow-border">
            Create Free Account →
        </a>
    </div>
</section>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
