<?php
// dashboard.php
$pageTitle = 'Dashboard — UltraWallet';
require_once __DIR__ . '/config/session.php';
requireLogin();

$user = getCurrentUser();

// Fetch user data from MongoDB
require_once __DIR__ . '/config/database.php';

try {
    $users = Database::getCollection('users');
    $userData = Database::findOne('users', ['_id' => $_SESSION['user_id']]);
} catch (Exception $e) {
    $userData = null;
}

// Demo portfolio data (in real app, fetched from DB)
$portfolio = [
    ['name' => 'Bitcoin',    'ticker' => 'BTC',   'type' => 'crypto',  'amount' => '1.84',   'value' => 124840, 'change' => 4.2,  'icon' => '₿',  'color' => 'yellow'],
    ['name' => 'Ethereum',   'ticker' => 'ETH',   'type' => 'crypto',  'amount' => '12.5',   'value' => 48002,  'change' => 1.8,  'icon' => 'Ξ',  'color' => 'blue'],
    ['name' => 'Gold',       'ticker' => 'XAU',   'type' => 'metal',   'amount' => '12 oz',  'value' => 28101,  'change' => -0.3, 'icon' => '⚡', 'color' => 'amber'],
    ['name' => 'Apple Inc.', 'ticker' => 'AAPL',  'type' => 'stock',   'amount' => '100 sh', 'value' => 18940,  'change' => 0.9,  'icon' => '🍎', 'color' => 'gray'],
    ['name' => 'Tesla',      'ticker' => 'TSLA',  'type' => 'stock',   'amount' => '30 sh',  'value' => 7467,   'change' => -1.2, 'icon' => '⚡', 'color' => 'red'],
    ['name' => 'RE Token',   'ticker' => 'NYCT',  'type' => 'realty',  'amount' => '500 tk', 'value' => 64519,  'change' => 0.5,  'icon' => '🏢', 'color' => 'green'],
    ['name' => 'Solana',     'ticker' => 'SOL',   'type' => 'crypto',  'amount' => '185',    'value' => 31931,  'change' => 5.2,  'icon' => '◎',  'color' => 'purple'],
    ['name' => 'Silver',     'ticker' => 'XAG',   'type' => 'metal',   'amount' => '30 oz',  'value' => 883,    'change' => 0.7,  'icon' => '⚪', 'color' => 'slate'],
];

$totalValue = array_sum(array_column($portfolio, 'value'));

require_once __DIR__ . '/includes/header.php';
?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Page Header -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
        <div>
            <p class="text-ultra-sub text-sm font-mono">Welcome back,</p>
            <h1 class="font-display font-extrabold text-3xl">
                <?= htmlspecialchars($user['username'] ?? 'User') ?> 
                <span class="text-ultra-cyan">👋</span>
            </h1>
        </div>
        <div class="flex gap-3">
            <a href="/assets.php" class="px-5 py-2.5 border border-ultra-border rounded-xl text-sm font-medium text-ultra-sub hover:text-ultra-text hover:border-ultra-muted transition-colors">
                + Buy Assets
            </a>
            <a href="/wallet.php" class="px-5 py-2.5 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white text-sm font-semibold rounded-xl hover:opacity-90 transition-opacity">
                Wallets
            </a>
        </div>
    </div>

    <!-- Summary Cards Row -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6 glow-border">
            <p class="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Total Portfolio</p>
            <p class="font-mono text-2xl font-bold text-ultra-text">$<?= number_format($totalValue, 2) ?></p>
            <p class="text-ultra-green text-xs font-mono mt-2">+$3,241.20 today (+1.4%)</p>
        </div>
        <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6">
            <p class="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Crypto Value</p>
            <?php $cryptoVal = array_sum(array_column(array_filter($portfolio, fn($a) => $a['type'] === 'crypto'), 'value')); ?>
            <p class="font-mono text-2xl font-bold text-yellow-400">$<?= number_format($cryptoVal) ?></p>
            <p class="text-ultra-sub text-xs font-mono mt-2"><?= round($cryptoVal/$totalValue*100, 1) ?>% of portfolio</p>
        </div>
        <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6">
            <p class="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Real Assets</p>
            <?php $realVal = array_sum(array_column(array_filter($portfolio, fn($a) => in_array($a['type'], ['metal', 'stock', 'realty'])), 'value')); ?>
            <p class="font-mono text-2xl font-bold text-ultra-gold">$<?= number_format($realVal) ?></p>
            <p class="text-ultra-sub text-xs font-mono mt-2"><?= round($realVal/$totalValue*100, 1) ?>% of portfolio</p>
        </div>
        <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6">
            <p class="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">24h P&L</p>
            <p class="font-mono text-2xl font-bold text-ultra-green">+$3,241</p>
            <p class="text-ultra-green text-xs font-mono mt-2">↑ Positive day</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- Portfolio Table -->
        <div class="lg:col-span-2 bg-ultra-card border border-ultra-border rounded-2xl overflow-hidden">
            <div class="p-6 border-b border-ultra-border flex justify-between items-center">
                <h2 class="font-display font-bold text-lg">Holdings</h2>
                <span class="text-xs font-mono text-ultra-sub"><?= count($portfolio) ?> assets</span>
            </div>
            <div class="overflow-x-auto">
                <table class="w-full text-sm">
                    <thead>
                        <tr class="border-b border-ultra-border text-xs font-mono text-ultra-sub uppercase tracking-widest">
                            <th class="text-left px-6 py-3">Asset</th>
                            <th class="text-right px-4 py-3">Amount</th>
                            <th class="text-right px-4 py-3">Value</th>
                            <th class="text-right px-6 py-3">24h</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($portfolio as $asset): ?>
                        <tr class="border-b border-ultra-border/50 hover:bg-ultra-surface/50 transition-colors">
                            <td class="px-6 py-4">
                                <div class="flex items-center gap-3">
                                    <div class="w-9 h-9 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-base">
                                        <?= $asset['icon'] ?>
                                    </div>
                                    <div>
                                        <p class="font-semibold text-ultra-text"><?= $asset['name'] ?></p>
                                        <p class="text-xs text-ultra-sub font-mono"><?= $asset['ticker'] ?></p>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-4 text-right font-mono text-ultra-sub text-xs"><?= $asset['amount'] ?></td>
                            <td class="px-4 py-4 text-right font-mono font-semibold">$<?= number_format($asset['value']) ?></td>
                            <td class="px-6 py-4 text-right">
                                <span class="font-mono text-xs font-bold px-2 py-1 rounded-md <?= $asset['change'] >= 0 ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-red bg-ultra-red/10' ?>">
                                    <?= $asset['change'] >= 0 ? '+' : '' ?><?= $asset['change'] ?>%
                                </span>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-5">

            <!-- Allocation Donut (static visual) -->
            <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6">
                <h3 class="font-display font-bold mb-5">Allocation</h3>
                <div class="space-y-3">
                    <?php
                    $categories = [
                        ['label' => 'Crypto',      'pct' => 60, 'color' => 'bg-yellow-400'],
                        ['label' => 'Real Estate',  'pct' => 20, 'color' => 'bg-ultra-green'],
                        ['label' => 'Stocks',       'pct' => 11, 'color' => 'bg-ultra-violet'],
                        ['label' => 'Metals',       'pct' => 9,  'color' => 'bg-ultra-gold'],
                    ];
                    foreach ($categories as $cat): ?>
                    <div>
                        <div class="flex justify-between text-xs font-mono mb-1">
                            <span class="text-ultra-sub"><?= $cat['label'] ?></span>
                            <span class="text-ultra-text"><?= $cat['pct'] ?>%</span>
                        </div>
                        <div class="h-1.5 bg-ultra-border rounded-full overflow-hidden">
                            <div class="h-full rounded-full <?= $cat['color'] ?>" style="width: <?= $cat['pct'] ?>%"></div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-ultra-card border border-ultra-border rounded-2xl p-6">
                <h3 class="font-display font-bold mb-5">Quick Actions</h3>
                <div class="space-y-3">
                    <a href="/assets.php?type=crypto" class="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                        <span class="text-xl">₿</span>
                        <span class="text-sm font-medium">Buy Crypto</span>
                        <span class="ml-auto text-ultra-sub text-xs">→</span>
                    </a>
                    <a href="/assets.php?type=gold" class="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                        <span class="text-xl">⚡</span>
                        <span class="text-sm font-medium">Buy Gold</span>
                        <span class="ml-auto text-ultra-sub text-xs">→</span>
                    </a>
                    <a href="/assets.php?type=stocks" class="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                        <span class="text-xl">📈</span>
                        <span class="text-sm font-medium">Buy Stocks</span>
                        <span class="ml-auto text-ultra-sub text-xs">→</span>
                    </a>
                    <a href="/wallet.php" class="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                        <span class="text-xl">🔗</span>
                        <span class="text-sm font-medium">Connect Wallet</span>
                        <span class="ml-auto text-ultra-sub text-xs">→</span>
                    </a>
                </div>
            </div>

            <!-- KYC Status -->
            <div class="bg-ultra-card border border-ultra-gold/30 rounded-2xl p-6 glow-gold">
                <div class="flex items-center gap-3 mb-3">
                    <span class="text-2xl">🔐</span>
                    <div>
                        <p class="font-bold text-sm">KYC Verification</p>
                        <p class="text-xs text-ultra-gold font-mono">Status: Pending</p>
                    </div>
                </div>
                <p class="text-xs text-ultra-sub mb-4 leading-relaxed">Complete verification to unlock higher limits and real-world asset ownership.</p>
                <a href="#" class="block w-full text-center py-2 text-xs font-bold text-ultra-gold border border-ultra-gold/30 rounded-lg hover:bg-ultra-gold/10 transition-colors">
                    Verify Now →
                </a>
            </div>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
