import { readSession } from '@/lib/auth'
import Link from 'next/link'

export const dynamic = 'force-dynamic'

export default function DashboardPage() {
  const session = readSession()
  const username = session?.username || 'User'
  
  const portfolio = [
    { name: 'Bitcoin',    ticker: 'BTC',   type: 'crypto',  amount: '1.84',   value: 124840, change: 4.2,  icon: '₿',  color: 'yellow' },
    { name: 'Ethereum',   ticker: 'ETH',   type: 'crypto',  amount: '12.5',   value: 48002,  change: 1.8,  icon: 'Ξ',  color: 'blue' },
    { name: 'Gold',       ticker: 'XAU',   type: 'metal',   amount: '12 oz',  value: 28101,  change: -0.3, icon: '⚡', color: 'amber' },
    { name: 'Apple Inc.', ticker: 'AAPL',  type: 'stock',   amount: '100 sh', value: 18940,  change: 0.9,  icon: '🍎', color: 'gray' },
    { name: 'Tesla',      ticker: 'TSLA',  type: 'stock',   amount: '30 sh',  value: 7467,   change: -1.2, icon: '⚡', color: 'red' },
    { name: 'RE Token',   ticker: 'NYCT',  type: 'realty',  amount: '500 tk', value: 64519,  change: 0.5,  icon: '🏘️', color: 'green' },
    { name: 'Solana',     ticker: 'SOL',   type: 'crypto',  amount: '185',    value: 31931,  change: 5.2,  icon: '◎',  color: 'purple' },
    { name: 'Silver',     ticker: 'XAG',   type: 'metal',   amount: '30 oz',  value: 883,    change: 0.7,  icon: '⚪', color: 'slate' },
  ]

  const totalValue = portfolio.reduce((a, b) => a + b.value, 0)
  const cryptoVal = portfolio.filter(a => a.type === 'crypto').reduce((a, b) => a + b.value, 0)
  const realVal = portfolio.filter(a => ['metal', 'stock', 'realty'].includes(a.type)).reduce((a, b) => a + b.value, 0)

  return (
    <div className="max-w-7xl mx-auto px-6 py-10">

      {/* Page Header */}
      <div className="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4 mb-10">
        <div>
          <p className="text-ultra-sub text-sm font-mono">Welcome back,</p>
          <h1 className="font-display font-extrabold text-3xl">
            {username}
            <span className="text-ultra-cyan ml-2">👋</span>
          </h1>
        </div>
        <div className="flex gap-3">
          <Link href="/assets" className="px-5 py-2.5 border border-ultra-border rounded-xl text-sm font-medium text-ultra-sub hover:text-ultra-text hover:border-ultra-muted transition-colors">
            + Buy Assets
          </Link>
          <Link href="/wallets" className="px-5 py-2.5 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white text-sm font-semibold rounded-xl hover:opacity-90 transition-opacity">
            Wallets
          </Link>
        </div>
      </div>

      {/* Summary Cards Row */}
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5 mb-10">
        <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6 glow-border">
          <p className="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Total Portfolio</p>
          <p className="font-mono text-2xl font-bold text-ultra-text">${totalValue.toLocaleString(undefined, { minimumFractionDigits: 2 })}</p>
          <p className="text-ultra-green text-xs font-mono mt-2">+$3,241.20 today (+1.4%)</p>
        </div>
        <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6">
          <p className="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Crypto Value</p>
          <p className="font-mono text-2xl font-bold text-yellow-400">${cryptoVal.toLocaleString()}</p>
          <p className="text-ultra-sub text-xs font-mono mt-2">{Math.round(cryptoVal / totalValue * 100)}% of portfolio</p>
        </div>
        <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6">
          <p className="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">Real Assets</p>
          <p className="font-mono text-2xl font-bold text-ultra-gold">${realVal.toLocaleString()}</p>
          <p className="text-ultra-sub text-xs font-mono">{Math.round(realVal / totalValue * 100)}% of portfolio</p>
        </div>
        <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6">
          <p className="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-3">24h P&L</p>
          <p className="font-mono text-2xl font-bold text-ultra-green">+$3,241</p>
          <p className="text-ultra-green text-xs font-mono mt-2">↑ Positive day</p>
        </div>
      </div>

      <div className="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {/* Portfolio Table */}
        <div className="lg:col-span-2 bg-ultra-card border border-ultra-border rounded-2xl overflow-hidden">
          <div className="p-6 border-b border-ultra-border flex justify-between items-center">
            <h2 className="font-display font-bold text-lg">Holdings</h2>
            <span className="text-xs font-mono text-ultra-sub">{portfolio.length} assets</span>
          </div>
          <div className="overflow-x-auto">
            <table className="w-full text-sm">
              <thead>
                <tr className="border-b border-ultra-border text-xs font-mono text-ultra-sub uppercase tracking-widest">
                  <th className="text-left px-6 py-3">Asset</th>
                  <th className="text-right px-4 py-3">Amount</th>
                  <th className="text-right px-4 py-3">Value</th>
                  <th className="text-right px-6 py-3">24h</th>
                </tr>
              </thead>
              <tbody>
                {portfolio.map((asset) => (
                  <tr key={asset.ticker} className="border-b border-ultra-border/50 hover:bg-ultra-surface/50 transition-colors">
                    <td className="px-6 py-4">
                      <div className="flex items-center gap-3">
                        <div className="w-9 h-9 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-base">
                          {asset.icon}
                        </div>
                        <div>
                          <p className="font-semibold text-ultra-text">{asset.name}</p>
                          <p className="text-xs text-ultra-sub font-mono">{asset.ticker}</p>
                        </div>
                      </div>
                    </td>
                    <td className="px-4 py-4 text-right font-mono text-ultra-sub text-xs">{asset.amount}</td>
                    <td className="px-4 py-4 text-right font-mono font-semibold">${asset.value.toLocaleString()}</td>
                    <td className="px-6 py-4 text-right">
                      <span className={`font-mono text-xs font-bold px-2 py-1 rounded-md ${asset.change >= 0 ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-red bg-ultra-red/10'}`}>
                        {asset.change >= 0 ? '+' : ''}{asset.change}%
                      </span>
                    </td>
                  </tr>
                ))}
              </tbody>
            </table>
          </div>
        </div>

        {/* Sidebar */}
        <div className="space-y-5">

          {/* Allocation Donut (visual) */}
          <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6">
            <h3 className="font-display font-bold mb-5">Allocation</h3>
            <div className="space-y-3">
              {[
                { label: 'Crypto', pct: 60, color: 'bg-yellow-400' },
                { label: 'Real Estate', pct: 20, color: 'bg-ultra-green' },
                { label: 'Stocks', pct: 11, color: 'bg-ultra-violet' },
                { label: 'Metals', pct: 9, color: 'bg-ultra-gold' },
              ].map((cat) => (
                <div key={cat.label}>
                  <div className="flex justify-between text-xs font-mono mb-1">
                    <span className="text-ultra-sub">{cat.label}</span>
                    <span className="text-ultra-text">{cat.pct}%</span>
                  </div>
                  <div className="h-1.5 bg-ultra-border rounded-full overflow-hidden">
                    <div className="h-full rounded-full ${cat.color}" style={{ width: `${cat.pct}%` }}></div>
                  </div>
                </div>
              ))}
            </div>
          </div>

          {/* Quick Actions */}
          <div className="bg-ultra-card border border-ultra-border rounded-2xl p-6">
            <h3 className="font-display font-bold mb-5">Quick Actions</h3>
            <div className="space-y-3">
              <Link href="/assets?type=crypto" className="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                <span className="text-xl">₿</span>
                <span className="text-sm font-medium">Buy Crypto</span>
                <span className="ml-auto text-ultra-sub text-xs">→</span>
              </Link>
              <Link href="/assets?type=gold" className="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                <span className="text-xl">⚡</span>
                <span className="text-sm font-medium">Buy Gold</span>
                <span className="ml-auto text-ultra-sub text-xs">→</span>
              </Link>
              <Link href="/assets?type=stocks" className="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                <span className="text-xl">📈</span>
                <span className="text-sm font-medium">Buy Stocks</span>
                <span className="ml-auto text-ultra-sub text-xs">→</span>
              </Link>
              <Link href="/wallets" className="flex items-center gap-3 p-3 rounded-xl bg-ultra-surface hover:bg-ultra-border transition-colors">
                <span className="text-xl">🔗</span>
                <span className="text-sm font-medium">Connect Wallet</span>
                <span className="ml-auto text-ultra-sub text-xs">→</span>
              </Link>
            </div>
          </div>

          {/* KYC Status */}
          <div className="bg-ultra-card border border-ultra-gold/30 rounded-2xl p-6 glow-gold">
            <div className="flex items-center gap-3 mb-3">
              <span className="text-2xl">🆔</span>
              <div>
                <p className="font-bold text-sm">KYC Verification</p>
                <p className="text-xs text-ultra-gold font-mono">Status: Pending</p>
              </div>
            </div>
            <p className="text-xs text-ultra-sub mb-4 leading-relaxed">Complete verification to unlock higher limits and real-world asset ownership.</p>
            <Link href="#" className="block w-full text-center py-2 text-xs font-bold text-ultra-gold border border-ultra-gold/30 rounded-lg hover:bg-ultra-gold/10 transition-colors">
              Verify Now →
            </Link>
          </div>
        </div>
      </div>
    </div>
  )
}
