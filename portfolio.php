<?php
// portfolio.php
$pageTitle = 'Portfolio — UltraWallet';
require_once __DIR__ . '/config/session.php';
requireLogin();
require_once __DIR__ . '/includes/header.php';

$transactions = [
    ['type' => 'buy',  'asset' => 'Bitcoin',   'ticker' => 'BTC',  'amount' => '0.5 BTC',   'value' => '$33,710', 'date' => '2025-02-18', 'icon' => '₿', 'status' => 'completed'],
    ['type' => 'buy',  'asset' => 'Gold',       'ticker' => 'XAU',  'amount' => '2 oz',      'value' => '$4,682',  'date' => '2025-02-15', 'icon' => 'Au', 'status' => 'completed'],
    ['type' => 'sell', 'asset' => 'Ethereum',   'ticker' => 'ETH',  'amount' => '1.2 ETH',   'value' => '$4,608',  'date' => '2025-02-10', 'icon' => 'E',  'status' => 'completed'],
    ['type' => 'buy',  'asset' => 'Apple Inc.', 'ticker' => 'AAPL', 'amount' => '10 shares', 'value' => '$1,894',  'date' => '2025-02-08', 'icon' => 'A',  'status' => 'completed'],
    ['type' => 'buy',  'asset' => 'RE Token',   'ticker' => 'NYCT', 'amount' => '100 tokens','value' => '$50',     'date' => '2025-02-05', 'icon' => 'R',  'status' => 'pending'],
    ['type' => 'buy',  'asset' => 'Solana',     'ticker' => 'SOL',  'amount' => '50 SOL',    'value' => '$8,630',  'date' => '2025-01-30', 'icon' => 'S',  'status' => 'completed'],
];
?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="mb-10">
        <p class="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-2">My Holdings</p>
        <h1 class="font-display font-extrabold text-4xl">Portfolio Overview</h1>
    </div>

    <!-- Performance Banner -->
    <div class="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-10">
        <div class="sm:col-span-2 bg-gradient-to-br from-ultra-card to-ultra-surface border border-ultra-cyan/20 rounded-2xl p-7 glow-border">
            <p class="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">All-Time Portfolio Value</p>
            <p class="font-mono text-4xl font-bold text-ultra-text mb-1">$284,910<span class="text-ultra-cyan">.47</span></p>
            <div class="flex items-center gap-3 mt-3">
                <span class="text-ultra-green text-sm font-mono font-bold">+$48,201.80</span>
                <span class="text-ultra-green text-xs bg-ultra-green/10 px-2 py-0.5 rounded-md font-mono">+20.4% all-time</span>
            </div>
        </div>
        <div class="space-y-4">
            <div class="bg-ultra-card border border-ultra-border rounded-2xl p-5">
                <p class="text-xs font-mono text-ultra-sub mb-1">Best Performer</p>
                <p class="font-display font-bold">Solana</p>
                <p class="text-ultra-green text-sm font-mono">+5.2% today</p>
            </div>
            <div class="bg-ultra-card border border-ultra-border rounded-2xl p-5">
                <p class="text-xs font-mono text-ultra-sub mb-1">Total Assets</p>
                <p class="font-display font-bold text-2xl">8</p>
                <p class="text-ultra-sub text-xs font-mono">across 4 categories</p>
            </div>
        </div>
    </div>

    <!-- Transaction History -->
    <div class="bg-ultra-card border border-ultra-border rounded-2xl overflow-hidden">
        <div class="p-6 border-b border-ultra-border flex justify-between items-center">
            <h2 class="font-display font-bold text-lg">Transaction History</h2>
            <span class="text-xs font-mono text-ultra-sub"><?= count($transactions) ?> transactions</span>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm">
                <thead>
                    <tr class="border-b border-ultra-border text-xs font-mono text-ultra-sub uppercase tracking-widest">
                        <th class="text-left px-6 py-3">Type</th>
                        <th class="text-left px-4 py-3">Asset</th>
                        <th class="text-right px-4 py-3">Amount</th>
                        <th class="text-right px-4 py-3">Value</th>
                        <th class="text-right px-4 py-3">Date</th>
                        <th class="text-right px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($transactions as $tx): ?>
                    <tr class="border-b border-ultra-border/50 hover:bg-ultra-surface/50 transition-colors">
                        <td class="px-6 py-4">
                            <span class="px-2.5 py-1 rounded-lg text-xs font-mono font-bold <?= $tx['type'] === 'buy' ? 'bg-ultra-green/10 text-ultra-green' : 'bg-ultra-red/10 text-ultra-red' ?>">
                                <?= strtoupper($tx['type']) ?>
                            </span>
                        </td>
                        <td class="px-4 py-4">
                            <div class="flex items-center gap-3">
                                <div class="w-8 h-8 rounded-lg bg-ultra-surface border border-ultra-border flex items-center justify-center text-xs font-bold text-ultra-cyan">
                                    <?= $tx['icon'] ?>
                                </div>
                                <div>
                                    <p class="font-semibold text-ultra-text text-sm"><?= $tx['asset'] ?></p>
                                    <p class="text-xs text-ultra-sub font-mono"><?= $tx['ticker'] ?></p>
                                </div>
                            </div>
                        </td>
                        <td class="px-4 py-4 text-right font-mono text-ultra-sub text-xs"><?= $tx['amount'] ?></td>
                        <td class="px-4 py-4 text-right font-mono font-semibold"><?= $tx['value'] ?></td>
                        <td class="px-4 py-4 text-right font-mono text-xs text-ultra-sub"><?= $tx['date'] ?></td>
                        <td class="px-6 py-4 text-right">
                            <span class="text-xs font-mono px-2 py-1 rounded-md <?= $tx['status'] === 'completed' ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-gold bg-ultra-gold/10' ?>">
                                <?= ucfirst($tx['status']) ?>
                            </span>
                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
