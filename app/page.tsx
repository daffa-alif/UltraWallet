import Link from 'next/link'

export default function HomePage() {
  return (
    <main>
      <section className="relative min-h-[90vh] flex items-center overflow-hidden">
        <div className="absolute top-1/4 left-1/4 w-96 h-96 bg-ultra-cyan/10 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute bottom-1/4 right-1/4 w-96 h-96 bg-ultra-violet/10 rounded-full blur-3xl pointer-events-none" />
        <div className="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-64 h-64 bg-ultra-gold/5 rounded-full blur-3xl pointer-events-none" />
        <div className="max-w-7xl mx-auto px-6 py-20 relative z-10">
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <div>
              <div className="inline-flex items-center gap-2 px-4 py-2 rounded-full border border-ultra-cyan/30 bg-ultra-cyan/10 text-ultra-cyan text-xs font-mono mb-8 animate-pulse-slow">
                <span className="w-2 h-2 rounded-full bg-ultra-cyan animate-ping inline-flex" />
                Web3 Multi-Asset Platform
              </div>
              <h1 className="font-display font-extrabold text-5xl lg:text-7xl leading-none tracking-tight mb-6">
                Own the<br />
                <span className="relative">
                  <span className="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan via-ultra-violet to-ultra-gold">Entire World</span>
                </span><br />
                in One Wallet
              </h1>
              <p className="text-ultra-sub text-lg leading-relaxed mb-10 max-w-lg">
                From Bitcoin to gold bars, from Apple stocks to Manhattan real estate — UltraWallet lets you own, trade, and grow real-world assets through the power of Web3.
              </p>
              <div className="flex flex-wrap gap-4">
                <Link href="/register" className="group px-8 py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl text-sm hover:scale-105 transition-transform glow-border">
                  Start Owning →
                </Link>
                <Link href="/assets" className="px-8 py-4 border border-ultra-border text-ultra-sub hover:text-ultra-text hover:border-ultra-muted font-medium rounded-xl text-sm transition-colors">
                  Explore Assets
                </Link>
              </div>
              <div className="grid grid-cols-3 gap-6 mt-14 pt-10 border-t border-ultra-border">
                <div>
                  <p className="stat-number text-3xl font-bold font-mono">$4.2B</p>
                  <p className="text-xs text-ultra-sub mt-1">Assets Under Custody</p>
                </div>
                <div>
                  <p className="stat-number text-3xl font-bold font-mono">180+</p>
                  <p className="text-xs text-ultra-sub mt-1">Asset Classes</p>
                </div>
                <div>
                  <p className="stat-number text-3xl font-bold font-mono">2.1M</p>
                  <p className="text-xs text-ultra-sub mt-1">Global Holders</p>
                </div>
              </div>
            </div>
            <div className="flex justify-center lg:justify-end">
              <div className="relative w-full max-w-sm">
                <div className="relative bg-gradient-to-br from-ultra-card via-ultra-surface to-ultra-bg border border-ultra-border rounded-2xl p-6 glow-border animate-float">
                  <div className="flex justify-between items-start mb-8">
                    <div>
                      <p className="text-xs text-ultra-sub font-mono uppercase tracking-widest">Total Portfolio</p>
                      <p className="font-mono text-3xl font-bold text-ultra-text mt-1">$284,910.<span className="text-ultra-cyan">47</span></p>
                    </div>
                    <div className="w-10 h-10 rounded-full bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white text-sm font-bold">U</div>
                  </div>
                  <div className="space-y-3 mb-6">
                    {[
                      { name: 'Bitcoin', value: '$124,840', change: '+4.2%', icon: '₿' },
                      { name: 'Gold (12oz)', value: '$28,101', change: '-0.3%', icon: 'Au' },
                      { name: 'Stocks', value: '$67,450', change: '+1.8%', icon: 'S' },
                      { name: 'Real Estate', value: '$64,519', change: '+0.5%', icon: 'RE' }
                    ].map((item) => (
                      <div key={item.name} className="flex justify-between items-center">
                        <div className="flex items-center gap-2">
                          <div className="w-6 h-6 rounded-full bg-ultra-surface border border-ultra-border flex items-center justify-center text-xs">{item.icon}</div>
                          <span className="text-sm text-ultra-sub">{item.name}</span>
                        </div>
                        <div className="text-right">
                          <p className="text-sm font-mono text-ultra-text">{item.value}</p>
                          <p className={`text-xs ${item.change.startsWith('+') ? 'text-ultra-green' : 'text-ultra-red'}`}>{item.change}</p>
                        </div>
                      </div>
                    ))}
                  </div>
                  <div className="h-1.5 bg-ultra-border rounded-full overflow-hidden">
                    <div className="h-full rounded-full bg-gradient-to-r from-ultra-cyan via-ultra-violet to-ultra-gold" style={{ width: '73%' }} />
                  </div>
                  <p className="text-xs text-ultra-sub mt-2 font-mono">Portfolio Health: 73/100</p>
                </div>
                <div className="absolute -top-4 -right-4 bg-ultra-card border border-ultra-green/40 rounded-xl px-3 py-2 glow-green">
                  <p className="text-xs text-ultra-green font-mono font-bold">+12.4% MTD</p>
                </div>
                <div className="absolute -bottom-4 -left-4 bg-ultra-card border border-ultra-gold/40 rounded-xl px-3 py-2 glow-gold">
                  <p className="text-xs text-ultra-gold font-mono">GOLD LIVE</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section className="py-24 relative">
        <div className="max-w-7xl mx-auto px-6">
          <div className="text-center mb-16">
            <p className="text-ultra-cyan font-mono text-sm uppercase tracking-widest mb-3">Asset Universe</p>
            <h2 className="font-display font-extrabold text-4xl lg:text-5xl">Everything You Can Own</h2>
          </div>
          <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            {[
              { href: '/assets?type=crypto', title: 'Cryptocurrency', tag: '200+ Tokens' },
              { href: '/assets?type=gold', title: 'Precious Metals', tag: 'Vault-Backed' },
              { href: '/assets?type=stocks', title: 'Global Stocks', tag: '10,000+ Stocks' },
              { href: '/assets?type=realestate', title: 'Real Estate', tag: 'Tokenized' }
            ].map((a) => (
              <Link key={a.title} href={a.href} className="asset-card group bg-ultra-card border border-ultra-border rounded-2xl p-6 hover:border-ultra-muted transition-all cursor-pointer">
                <div className="w-12 h-12 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-2xl mb-5 group-hover:scale-110 transition-transform">★</div>
                <h3 className="font-display font-bold text-lg mb-2">{a.title}</h3>
                <p className="text-ultra-sub text-sm mb-4 leading-relaxed">Explore top assets and diversify.</p>
                <div className="flex justify-between items-center">
                  <span className="text-xs font-mono text-ultra-cyan bg-ultra-cyan/10 px-2 py-1 rounded-md">{a.tag}</span>
                  <span className="text-ultra-sub text-sm group-hover:text-ultra-cyan transition-colors">→</span>
                </div>
              </Link>
            ))}
          </div>
        </div>
      </section>

      <section className="py-20 mx-6 mb-10 rounded-3xl bg-gradient-to-br from-ultra-card via-ultra-surface to-ultra-bg border border-ultra-border relative overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-br from-ultra-cyan/5 via-transparent to-ultra-violet/5 pointer-events-none" />
        <div className="text-center relative z-10 px-6">
          <h2 className="font-display font-extrabold text-4xl lg:text-6xl mb-6">
            Your Wealth.<br />
            <span className="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan to-ultra-gold">No Borders.</span>
          </h2>
          <p className="text-ultra-sub text-lg max-w-xl mx-auto mb-10">Join 2 million people already owning the world through UltraWallet.</p>
          <Link href="/register" className="inline-block px-10 py-5 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold text-lg rounded-2xl hover:scale-105 transition-transform glow-border">
            Create Free Account →
          </Link>
        </div>
      </section>
    </main>
  )
}
