<?php
// assets.php
$pageTitle = 'Assets — UltraWallet';
$type = $_GET['type'] ?? 'all';

require_once __DIR__ . '/includes/header.php';

$allAssets = [
    'crypto' => [
        ['name' => 'Bitcoin',       'ticker' => 'BTC',   'price' => '$67,420',   'change' => '+2.4%',  'cap' => '$1.3T',   'icon' => '₿',  'pos' => true],
        ['name' => 'Ethereum',      'ticker' => 'ETH',   'price' => '$3,840',    'change' => '+1.8%',  'cap' => '$461B',   'icon' => 'Ξ',  'pos' => true],
        ['name' => 'Solana',        'ticker' => 'SOL',   'price' => '$172.60',   'change' => '+5.2%',  'cap' => '$79B',    'icon' => '◎',  'pos' => true],
        ['name' => 'BNB',           'ticker' => 'BNB',   'price' => '$412.30',   'change' => '+3.1%',  'cap' => '$62B',    'icon' => '🟡', 'pos' => true],
        ['name' => 'Cardano',       'ticker' => 'ADA',   'price' => '$0.62',     'change' => '+4.8%',  'cap' => '$21B',    'icon' => '🔵', 'pos' => true],
        ['name' => 'Polkadot',      'ticker' => 'DOT',   'price' => '$8.94',     'change' => '+2.1%',  'cap' => '$12B',    'icon' => '⚪', 'pos' => true],
        ['name' => 'Avalanche',     'ticker' => 'AVAX',  'price' => '$38.20',    'change' => '-0.8%',  'cap' => '$15B',    'icon' => '🔴', 'pos' => false],
        ['name' => 'Chainlink',     'ticker' => 'LINK',  'price' => '$18.40',    'change' => '+6.3%',  'cap' => '$10B',    'icon' => '🔗', 'pos' => true],
    ],
    'gold' => [
        ['name' => 'Gold',          'ticker' => 'XAU',   'price' => '$2,341/oz', 'change' => '-0.3%',  'cap' => 'Physical Vault', 'icon' => '⚡', 'pos' => false],
        ['name' => 'Silver',        'ticker' => 'XAG',   'price' => '$29.45/oz', 'change' => '+0.7%',  'cap' => 'Physical Vault', 'icon' => '⚪', 'pos' => true],
        ['name' => 'Platinum',      'ticker' => 'XPT',   'price' => '$980/oz',   'change' => '+1.2%',  'cap' => 'Physical Vault', 'icon' => '🔘', 'pos' => true],
        ['name' => 'Palladium',     'ticker' => 'XPD',   'price' => '$1,030/oz', 'change' => '-1.0%',  'cap' => 'Physical Vault', 'icon' => '⭕', 'pos' => false],
        ['name' => 'Gold ETF',      'ticker' => 'GLDX',  'price' => '$187.40',   'change' => '-0.2%',  'cap' => 'ETF Token',      'icon' => '📊', 'pos' => false],
        ['name' => 'Silver ETF',    'ticker' => 'SLVX',  'price' => '$23.10',    'change' => '+0.4%',  'cap' => 'ETF Token',      'icon' => '📊', 'pos' => true],
    ],
    'stocks' => [
        ['name' => 'Apple Inc.',    'ticker' => 'AAPL',  'price' => '$189.40',   'change' => '+0.9%',  'cap' => '$2.9T',   'icon' => '🍎', 'pos' => true],
        ['name' => 'Tesla',         'ticker' => 'TSLA',  'price' => '$248.90',   'change' => '-1.2%',  'cap' => '$792B',   'icon' => '⚡', 'pos' => false],
        ['name' => 'Microsoft',     'ticker' => 'MSFT',  'price' => '$415.60',   'change' => '+0.5%',  'cap' => '$3.1T',   'icon' => '🪟', 'pos' => true],
        ['name' => 'Amazon',        'ticker' => 'AMZN',  'price' => '$192.30',   'change' => '+2.1%',  'cap' => '$2.0T',   'icon' => '📦', 'pos' => true],
        ['name' => 'NVIDIA',        'ticker' => 'NVDA',  'price' => '$875.40',   'change' => '+3.8%',  'cap' => '$2.1T',   'icon' => '🖥️', 'pos' => true],
        ['name' => 'Alphabet',      'ticker' => 'GOOGL', 'price' => '$178.50',   'change' => '-0.4%',  'cap' => '$2.2T',   'icon' => '🔍', 'pos' => false],
        ['name' => 'Saudi Aramco',  'ticker' => '2222',  'price' => '$8.24',     'change' => '+0.2%',  'cap' => '$1.7T',   'icon' => '🛢️', 'pos' => true],
        ['name' => 'LVMH',          'ticker' => 'MC',    'price' => '€750',      'change' => '+1.4%',  'cap' => '€375B',   'icon' => '💎', 'pos' => true],
    ],
    'realestate' => [
        ['name' => 'NYC Midtown',   'ticker' => 'NYCT',  'price' => '$0.50/tk',  'change' => '+0.5%',  'cap' => '$28M',    'icon' => '🏙️', 'pos' => true],
        ['name' => 'Dubai Marina',  'ticker' => 'DXBT',  'price' => '$1.20/tk',  'change' => '+2.3%',  'cap' => '$14M',    'icon' => '🌆', 'pos' => true],
        ['name' => 'London Zone 1', 'ticker' => 'LONZ',  'price' => '£0.80/tk',  'change' => '+0.3%',  'cap' => '£45M',    'icon' => '🎡', 'pos' => true],
        ['name' => 'Tokyo Shibuya', 'ticker' => 'TKYS',  'price' => '¥120/tk',   'change' => '-0.1%',  'cap' => '¥8B',     'icon' => '🗼', 'pos' => false],
        ['name' => 'Singapore CBD', 'ticker' => 'SGCD',  'price' => 'S$2.10/tk', 'change' => '+1.1%',  'cap' => 'S$22M',   'icon' => '🏛️', 'pos' => true],
        ['name' => 'Paris 8th',     'ticker' => 'PRST',  'price' => '€0.75/tk',  'change' => '+0.7%',  'cap' => '€18M',    'icon' => '🗼', 'pos' => true],
    ],
];

$filters = [
    'all'        => 'All Assets',
    'crypto'     => 'Crypto',
    'gold'       => 'Metals',
    'stocks'     => 'Stocks',
    'realestate' => 'Real Estate',
];

$displayAssets = $type === 'all'
    ? array_merge(...array_values($allAssets))
    : ($allAssets[$type] ?? []);
?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <!-- Header -->
    <div class="mb-10">
        <p class="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-2">Marketplace</p>
        <h1 class="font-display font-extrabold text-4xl">Asset Universe</h1>
        <p class="text-ultra-sub mt-3 max-w-lg">Own fractions of the world's most valuable assets — starting from $1.</p>
    </div>

    <!-- Filters -->
    <div class="flex flex-wrap gap-3 mb-8">
        <?php foreach ($filters as $key => $label): ?>
        <a href="/assets.php?type=<?= $key ?>"
            class="px-5 py-2 rounded-full text-sm font-medium transition-all <?= $type === $key
                ? 'bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white'
                : 'border border-ultra-border text-ultra-sub hover:text-ultra-text hover:border-ultra-muted' ?>">
            <?= $label ?>
        </a>
        <?php endforeach; ?>
    </div>

    <!-- Assets Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        <?php foreach ($displayAssets as $asset): ?>
        <div class="asset-card bg-ultra-card border border-ultra-border rounded-2xl p-5 hover:border-ultra-muted transition-all group">
            <div class="flex justify-between items-start mb-4">
                <div class="w-12 h-12 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                    <?= $asset['icon'] ?>
                </div>
                <span class="text-xs font-mono font-bold px-2.5 py-1 rounded-full <?= $asset['pos'] ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-red bg-ultra-red/10' ?>">
                    <?= $asset['change'] ?>
                </span>
            </div>

            <h3 class="font-display font-bold text-base mb-1"><?= $asset['name'] ?></h3>
            <p class="text-xs text-ultra-sub font-mono mb-4"><?= $asset['ticker'] ?></p>

            <div class="flex justify-between items-end">
                <div>
                    <p class="text-xl font-mono font-bold text-ultra-text"><?= $asset['price'] ?></p>
                    <p class="text-xs text-ultra-sub mt-0.5"><?= $asset['cap'] ?></p>
                </div>
                <a href="/register.php" class="px-4 py-2 bg-gradient-to-r from-ultra-cyan/20 to-ultra-violet/20 border border-ultra-cyan/30 text-ultra-cyan text-xs font-semibold rounded-lg hover:from-ultra-cyan/30 hover:to-ultra-violet/30 transition-all">
                    Buy →
                </a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>

    <!-- CTA -->
    <div class="mt-16 text-center bg-ultra-card border border-ultra-border rounded-2xl p-10">
        <p class="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-3">Unlock Everything</p>
        <h2 class="font-display font-extrabold text-3xl mb-4">Start with $1. Own the World.</h2>
        <p class="text-ultra-sub mb-8 max-w-md mx-auto">Fractional ownership means you can own a piece of Manhattan real estate or 100g of gold with any budget.</p>
        <a href="/register.php" class="inline-block px-8 py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl hover:opacity-90 transition-opacity">
            Create Free Account →
        </a>
    </div>
</div>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
