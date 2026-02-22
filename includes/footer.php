<?php
// includes/footer.php
if (!defined('DB_USE_MONGO')) define('DB_USE_MONGO', false);
?>
<footer class="border-t border-ultra-border mt-20 bg-ultra-surface/50">
    <div class="max-w-7xl mx-auto px-6 py-16">
        <div class="grid grid-cols-1 md:grid-cols-4 gap-12">
            <div class="md:col-span-2">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-8 h-8 rounded-lg bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-sm">U</div>
                    <span class="font-display font-bold text-xl">Ultra<span class="text-ultra-cyan">Wallet</span></span>
                </div>
                <p class="text-ultra-sub text-sm leading-relaxed max-w-sm">
                    The world's first unified platform to own real-world assets &mdash; gold, equities, real estate, and digital currencies &mdash; all in one wallet.
                </p>
                <div class="flex gap-3 mt-6 flex-wrap">
                    <div class="px-3 py-1 rounded-full border border-ultra-green/30 bg-ultra-green/10 text-ultra-green text-xs font-mono">&#9679; Live</div>
                    <div class="px-3 py-1 rounded-full border border-ultra-cyan/30 bg-ultra-cyan/10 text-ultra-cyan text-xs font-mono">Web3 Native</div>
                    <div class="px-3 py-1 rounded-full border border-ultra-gold/30 bg-ultra-gold/10 text-ultra-gold text-xs font-mono">Multi-Asset</div>
                    <?php if (DB_USE_MONGO ?? false): ?>
                    <div class="px-3 py-1 rounded-full border border-ultra-green/30 bg-ultra-green/10 text-ultra-green text-xs font-mono">&#9679; MongoDB Live</div>
                    <?php else: ?>
                    <div class="px-3 py-1 rounded-full border border-amber-500/30 bg-amber-500/10 text-amber-400 text-xs font-mono">JSON Storage</div>
                    <?php endif; ?>
                </div>
            </div>
            <div>
                <h4 class="font-display font-bold text-sm uppercase tracking-widest text-ultra-sub mb-4">Platform</h4>
                <ul class="space-y-2 text-sm text-ultra-sub">
                    <li><a href="/assets.php" class="hover:text-ultra-cyan transition-colors">Browse Assets</a></li>
                    <li><a href="/wallet.php" class="hover:text-ultra-cyan transition-colors">Connect Wallet</a></li>
                    <li><a href="/dashboard.php" class="hover:text-ultra-cyan transition-colors">Dashboard</a></li>
                    <li><a href="/portfolio.php" class="hover:text-ultra-cyan transition-colors">Portfolio</a></li>
                </ul>
            </div>
            <div>
                <h4 class="font-display font-bold text-sm uppercase tracking-widest text-ultra-sub mb-4">Assets</h4>
                <ul class="space-y-2 text-sm text-ultra-sub">
                    <li><a href="/assets.php?type=crypto" class="hover:text-ultra-cyan transition-colors">Cryptocurrency</a></li>
                    <li><a href="/assets.php?type=gold" class="hover:text-ultra-gold transition-colors">Precious Metals</a></li>
                    <li><a href="/assets.php?type=stocks" class="hover:text-ultra-violet transition-colors">Global Stocks</a></li>
                    <li><a href="/assets.php?type=realestate" class="hover:text-ultra-green transition-colors">Real Estate</a></li>
                </ul>
            </div>
        </div>

        <?php if (!extension_loaded('mongodb')): ?>
        <!-- MongoDB Setup Guide -->
        <div id="mongo-setup" class="mt-16 border-t border-ultra-border pt-12">
            <div class="bg-ultra-card border border-amber-500/20 rounded-2xl p-8">
                <div class="flex items-start gap-4 mb-6">
                    <div class="text-3xl">&#9432;</div>
                    <div>
                        <h3 class="font-display font-bold text-lg text-amber-400 mb-1">Enable Real MongoDB (Optional)</h3>
                        <p class="text-ultra-sub text-sm">The app works fully now with local JSON storage. When you're ready to connect to MongoDB Atlas, follow these steps:</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div class="bg-ultra-surface rounded-xl p-4">
                        <p class="text-[10px] font-mono text-amber-400 uppercase tracking-widest mb-2">Step 1 &mdash; Download DLL</p>
                        <p class="text-xs text-ultra-sub mb-2">Get the MongoDB PHP extension for your PHP version:</p>
                        <a href="https://pecl.php.net/package/mongodb" target="_blank" class="text-xs text-ultra-cyan hover:underline font-mono">pecl.php.net/package/mongodb</a>
                    </div>
                    <div class="bg-ultra-surface rounded-xl p-4">
                        <p class="text-[10px] font-mono text-amber-400 uppercase tracking-widest mb-2">Step 2 &mdash; Place DLL</p>
                        <p class="text-xs text-ultra-sub mb-2">Copy the downloaded .dll to:</p>
                        <code class="text-xs text-ultra-green font-mono">C:\xampp\php\ext\php_mongodb.dll</code>
                    </div>
                    <div class="bg-ultra-surface rounded-xl p-4">
                        <p class="text-[10px] font-mono text-amber-400 uppercase tracking-widest mb-2">Step 3 &mdash; php.ini</p>
                        <p class="text-xs text-ultra-sub mb-2">Open <code class="text-ultra-cyan text-[10px]">C:\xampp\php\php.ini</code> and add:</p>
                        <code class="text-xs text-ultra-violet font-mono">extension=mongodb</code>
                    </div>
                    <div class="bg-ultra-surface rounded-xl p-4">
                        <p class="text-[10px] font-mono text-amber-400 uppercase tracking-widest mb-2">Step 4 &mdash; Restart</p>
                        <p class="text-xs text-ultra-sub">Restart Apache in XAMPP Control Panel, then refresh.</p>
                        <p class="text-xs text-ultra-green mt-2 font-mono">This banner disappears automatically.</p>
                    </div>
                </div>
            </div>
        </div>
        <?php endif; ?>

        <div class="border-t border-ultra-border mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
            <p class="text-ultra-sub text-xs font-mono">&copy; <?= date('Y') ?> UltraWallet. Built on Web3.</p>
            <div class="flex gap-6 text-xs text-ultra-sub">
                <a href="#" class="hover:text-ultra-text transition-colors">Privacy</a>
                <a href="#" class="hover:text-ultra-text transition-colors">Terms</a>
                <a href="#" class="hover:text-ultra-text transition-colors">Security</a>
            </div>
        </div>
    </div>
</footer>
</body>
</html>
