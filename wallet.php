<?php
// wallet.php
$pageTitle = 'Connect Wallet — UltraWallet';
require_once __DIR__ . '/includes/header.php';

$walletVendors = [
    'software' => [
        ['name' => 'MetaMask',     'desc' => 'Most popular EVM wallet. ETH, Polygon, BNB and 30+ networks.',  'icon' => 'fox',   'chains' => ['ETH','BNB','Polygon','AVAX'], 'popular' => true],
        ['name' => 'Phantom',      'desc' => 'The leading Solana wallet. Also supports Ethereum.',            'icon' => 'ghost', 'chains' => ['SOL','ETH','Polygon'],         'popular' => true],
        ['name' => 'Trust Wallet', 'desc' => 'Multi-chain wallet with 70+ blockchains. Mobile-first.',       'icon' => 'shield', 'chains' => ['Multi-Chain'],                'popular' => true],
        ['name' => 'Coinbase',     'desc' => 'Simple, secure wallet by Coinbase. Great for beginners.',      'icon' => 'circle', 'chains' => ['ETH','BTC','SOL'],            'popular' => false],
        ['name' => 'Rainbow',      'desc' => 'Beautiful Ethereum wallet with NFT support.',                  'icon' => 'rainbow','chains' => ['ETH','Optimism','Arbitrum'],  'popular' => false],
        ['name' => 'Rabby',        'desc' => 'Smart multi-chain wallet with security checks.',               'icon' => 'rabbit', 'chains' => ['EVM Multi-Chain'],            'popular' => false],
        ['name' => 'Keplr',        'desc' => 'Leading Cosmos ecosystem wallet. IBC-enabled.',                'icon' => 'atom',   'chains' => ['Cosmos','Osmosis','Juno'],    'popular' => false],
        ['name' => 'OKX Wallet',   'desc' => 'All-in-one Web3 wallet. Supports 70+ networks.',              'icon' => 'okx',    'chains' => ['Multi-Chain'],                'popular' => false],
        ['name' => 'Zerion',       'desc' => 'Portfolio plus wallet for DeFi power users.',                  'icon' => 'diamond','chains' => ['EVM Multi-Chain'],            'popular' => false],
        ['name' => 'Argent',       'desc' => 'Account abstraction wallet on Starknet and zkSync.',           'icon' => 'orange', 'chains' => ['Starknet','zkSync'],          'popular' => false],
    ],
    'hardware' => [
        ['name' => 'Ledger',     'desc' => 'Industry-leading hardware wallet. Nano X, Nano S Plus, Stax.', 'icon' => 'lock',   'chains' => ['BTC','ETH','SOL','1000+'], 'popular' => true],
        ['name' => 'Trezor',     'desc' => 'The original hardware wallet. Open-source and trustless.',     'icon' => 'trezor', 'chains' => ['BTC','ETH','Multi-Chain'], 'popular' => true],
        ['name' => 'Coldcard',   'desc' => 'Maximum security Bitcoin-only hardware wallet.',               'icon' => 'cold',   'chains' => ['BTC only'],                'popular' => false],
        ['name' => 'GridPlus',   'desc' => 'Lattice1 — the smartest hardware wallet.',                     'icon' => 'grid',   'chains' => ['ETH','EVM','BTC'],         'popular' => false],
        ['name' => 'Foundation', 'desc' => 'Passport — beautiful open-source Bitcoin hardware wallet.',   'icon' => 'pass',   'chains' => ['BTC only'],                'popular' => false],
        ['name' => 'Keystone',   'desc' => 'Air-gapped hardware wallet with QR code signing.',             'icon' => 'key',    'chains' => ['BTC','ETH','Multi-Chain'], 'popular' => false],
    ],
    'mobile' => [
        ['name' => 'Exodus',    'desc' => 'Beautifully designed multi-asset mobile wallet.',   'icon' => 'globe',  'chains' => ['BTC','ETH','SOL','260+ assets'], 'popular' => true],
        ['name' => 'Mycelium',  'desc' => 'Bitcoin specialist wallet with HD features.',       'icon' => 'myc',    'chains' => ['BTC','ETH'],                    'popular' => false],
        ['name' => 'Edge',      'desc' => 'Account-based wallet with built-in exchange.',      'icon' => 'edge',   'chains' => ['BTC','ETH','Multi-Chain'],      'popular' => false],
        ['name' => 'Bitget',    'desc' => 'Asia-focused multi-chain wallet.',                  'icon' => 'bitget', 'chains' => ['Multi-Chain'],                  'popular' => false],
    ],
];

$iconEmoji = [
    'fox' => '🦊', 'ghost' => '👻', 'shield' => '🛡', 'circle' => '🔵',
    'rainbow' => '🌈', 'rabbit' => '🐰', 'atom' => '⚛', 'okx' => '⭕',
    'diamond' => '🔷', 'orange' => '🟠', 'lock' => '🔐', 'trezor' => '💚',
    'cold' => '❄', 'grid' => '🔳', 'pass' => '📟', 'key' => '🔑',
    'globe' => '🌍', 'myc' => '🍄', 'edge' => '📱', 'bitget' => '🅱',
];
?>

<div class="max-w-7xl mx-auto px-6 py-10">

    <div class="text-center mb-14">
        <p class="text-ultra-violet font-mono text-sm uppercase tracking-widest mb-3">Multi-Wallet Support</p>
        <h1 class="font-display font-extrabold text-4xl lg:text-5xl mb-5">
            Connect Your Wallet.<br>
            <span class="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan to-ultra-violet">Any Wallet.</span>
        </h1>
        <p class="text-ultra-sub text-lg max-w-xl mx-auto">UltraWallet works with every major wallet provider. Your keys, your assets.</p>
    </div>

    <!-- How it works -->
    <div class="bg-ultra-card border border-ultra-cyan/20 rounded-2xl p-8 mb-14 glow-border">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
            <?php
            $steps = [
                ['icon' => '🔍', 'n' => '01', 'title' => 'Choose Provider',  'desc' => 'Pick from 25+ wallets'],
                ['icon' => '📲', 'n' => '02', 'title' => 'Scan or Click',    'desc' => 'QR code or extension'],
                ['icon' => '✅', 'n' => '03', 'title' => 'Approve',           'desc' => 'Confirm in your wallet'],
                ['icon' => '🌍', 'n' => '04', 'title' => 'Access Assets',    'desc' => 'Own global assets'],
            ];
            foreach ($steps as $s): ?>
            <div>
                <div class="text-3xl mb-2"><?= $s['icon'] ?></div>
                <div class="text-xs font-mono text-ultra-cyan mb-1">STEP <?= $s['n'] ?></div>
                <p class="font-display font-bold text-sm"><?= $s['title'] ?></p>
                <p class="text-xs text-ultra-sub mt-1"><?= $s['desc'] ?></p>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Software Wallets -->
    <section class="mb-14">
        <div class="flex items-center gap-4 mb-6">
            <h2 class="font-display font-bold text-2xl">Software Wallets</h2>
            <span class="px-3 py-1 text-xs font-mono bg-ultra-cyan/10 text-ultra-cyan border border-ultra-cyan/20 rounded-full"><?= count($walletVendors['software']) ?> providers</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($walletVendors['software'] as $w): ?>
            <div class="wallet-btn relative bg-ultra-card border border-ultra-border hover:border-ultra-muted rounded-2xl p-5 transition-all group cursor-pointer" onclick="connectWallet('<?= htmlspecialchars($w['name']) ?>')">
                <?php if ($w['popular']): ?>
                <div class="absolute top-3 right-3 px-2 py-0.5 text-[10px] font-mono font-bold text-ultra-gold bg-ultra-gold/10 border border-ultra-gold/20 rounded-full">Popular</div>
                <?php endif; ?>
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <?= $iconEmoji[$w['icon']] ?? '🔮' ?>
                    </div>
                    <div class="flex-1 min-w-0">
                        <p class="font-display font-bold text-sm mb-1"><?= htmlspecialchars($w['name']) ?></p>
                        <p class="text-xs text-ultra-sub leading-relaxed mb-3"><?= htmlspecialchars($w['desc']) ?></p>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach ($w['chains'] as $chain): ?>
                            <span class="text-[10px] font-mono px-2 py-0.5 bg-ultra-violet/10 text-ultra-violet border border-ultra-violet/20 rounded-md"><?= $chain ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full py-2.5 border border-ultra-cyan/30 text-ultra-cyan text-xs font-semibold rounded-xl hover:bg-ultra-cyan/10 transition-colors">
                    Connect <?= htmlspecialchars($w['name']) ?> &rarr;
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Hardware Wallets -->
    <section class="mb-14">
        <div class="flex items-center gap-4 mb-6">
            <h2 class="font-display font-bold text-2xl">Hardware Wallets</h2>
            <span class="px-3 py-1 text-xs font-mono bg-ultra-green/10 text-ultra-green border border-ultra-green/20 rounded-full">Maximum Security</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
            <?php foreach ($walletVendors['hardware'] as $w): ?>
            <div class="wallet-btn bg-ultra-card border border-ultra-border hover:border-ultra-green/30 rounded-2xl p-5 transition-all group cursor-pointer" onclick="connectWallet('<?= htmlspecialchars($w['name']) ?>')">
                <div class="flex items-start gap-4">
                    <div class="w-12 h-12 flex-shrink-0 rounded-xl bg-ultra-green/10 border border-ultra-green/20 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                        <?= $iconEmoji[$w['icon']] ?? '🔐' ?>
                    </div>
                    <div>
                        <p class="font-display font-bold text-sm mb-1"><?= htmlspecialchars($w['name']) ?></p>
                        <p class="text-xs text-ultra-sub leading-relaxed mb-3"><?= htmlspecialchars($w['desc']) ?></p>
                        <div class="flex flex-wrap gap-1">
                            <?php foreach ($w['chains'] as $chain): ?>
                            <span class="text-[10px] font-mono px-2 py-0.5 bg-ultra-green/10 text-ultra-green border border-ultra-green/20 rounded-md"><?= $chain ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <button class="mt-4 w-full py-2.5 border border-ultra-green/30 text-ultra-green text-xs font-semibold rounded-xl hover:bg-ultra-green/10 transition-colors">
                    Connect Hardware &rarr;
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Mobile Wallets -->
    <section class="mb-14">
        <div class="flex items-center gap-4 mb-6">
            <h2 class="font-display font-bold text-2xl">Mobile Wallets</h2>
            <span class="px-3 py-1 text-xs font-mono bg-ultra-gold/10 text-ultra-gold border border-ultra-gold/20 rounded-full">iOS &amp; Android</span>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            <?php foreach ($walletVendors['mobile'] as $w): ?>
            <div class="wallet-btn bg-ultra-card border border-ultra-border hover:border-ultra-gold/30 rounded-2xl p-5 transition-all group cursor-pointer" onclick="connectWallet('<?= htmlspecialchars($w['name']) ?>')">
                <div class="text-3xl mb-3 group-hover:scale-110 transition-transform inline-block">
                    <?= $iconEmoji[$w['icon']] ?? '📱' ?>
                </div>
                <p class="font-display font-bold text-sm mb-1"><?= htmlspecialchars($w['name']) ?></p>
                <p class="text-xs text-ultra-sub leading-relaxed mb-3"><?= htmlspecialchars($w['desc']) ?></p>
                <button class="w-full py-2 border border-ultra-gold/30 text-ultra-gold text-xs font-semibold rounded-lg hover:bg-ultra-gold/10 transition-colors">
                    Connect &rarr;
                </button>
            </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Security Note -->
    <div class="bg-ultra-surface border border-ultra-border rounded-2xl p-8 text-center">
        <div class="text-4xl mb-4">🔒</div>
        <h3 class="font-display font-bold text-xl mb-3">Non-Custodial. Your Keys, Your Assets.</h3>
        <p class="text-ultra-sub max-w-lg mx-auto text-sm leading-relaxed">
            UltraWallet never holds your private keys. We only request read-only access for portfolio tracking. All transactions are signed locally in your wallet.
        </p>
    </div>
</div>

<!-- Modal -->
<div id="connectModal" class="fixed inset-0 z-50 hidden items-center justify-center bg-ultra-bg/80 backdrop-blur-sm p-6">
    <div class="bg-ultra-card border border-ultra-cyan/30 rounded-2xl p-8 max-w-sm w-full glow-border text-center">
        <div class="w-16 h-16 rounded-2xl bg-gradient-to-br from-ultra-cyan/20 to-ultra-violet/20 border border-ultra-cyan/30 flex items-center justify-center text-3xl mx-auto mb-5">🔗</div>
        <h3 class="font-display font-bold text-xl mb-2" id="modalTitle">Connecting...</h3>
        <p class="text-ultra-sub text-sm mb-6" id="modalDesc">Please approve in your wallet.</p>
        <div class="flex items-center justify-center gap-2 mb-6">
            <div class="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style="animation-delay:0s"></div>
            <div class="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style="animation-delay:0.2s"></div>
            <div class="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style="animation-delay:0.4s"></div>
        </div>
        <button onclick="closeModal()" class="w-full py-2.5 border border-ultra-border text-ultra-sub text-sm rounded-xl hover:text-ultra-text transition-colors">Cancel</button>
    </div>
</div>

<script>
function connectWallet(name) {
    var modal = document.getElementById('connectModal');
    document.getElementById('modalTitle').textContent = 'Connecting to ' + name;
    document.getElementById('modalDesc').textContent = 'Please approve the connection in your ' + name + ' wallet.';
    modal.classList.remove('hidden');
    modal.classList.add('flex');
    setTimeout(function() {
        document.getElementById('modalTitle').textContent = 'Connected!';
        document.getElementById('modalDesc').textContent = name + ' connected successfully.';
        setTimeout(function() { closeModal(); }, 1500);
    }, 2500);
}
function closeModal() {
    var modal = document.getElementById('connectModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>

<?php require_once __DIR__ . '/includes/footer.php'; ?>
