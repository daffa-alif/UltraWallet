import Link from 'next/link'

type Asset = { name: string; ticker: string; price: string; change: string; cap: string; icon: string; pos: boolean }

const data: Record<string, Asset[]> = {
  crypto: [
    { name: 'Bitcoin', ticker: 'BTC', price: '$67,420', change: '+2.4%', cap: '$1.3T', icon: '₿', pos: true },
    { name: 'Ethereum', ticker: 'ETH', price: '$3,840', change: '+1.8%', cap: '$461B', icon: 'Ξ', pos: true },
    { name: 'Solana', ticker: 'SOL', price: '$172.60', change: '+5.2%', cap: '$79B', icon: '◎', pos: true },
    { name: 'BNB', ticker: 'BNB', price: '$412.30', change: '+3.1%', cap: '$62B', icon: '🟡', pos: true },
    { name: 'Cardano', ticker: 'ADA', price: '$0.62', change: '+4.8%', cap: '$21B', icon: '🔵', pos: true },
    { name: 'Polkadot', ticker: 'DOT', price: '$8.94', change: '+2.1%', cap: '$12B', icon: '⚪', pos: true },
    { name: 'Avalanche', ticker: 'AVAX', price: '$38.20', change: '-0.8%', cap: '$15B', icon: '🔴', pos: false },
    { name: 'Chainlink', ticker: 'LINK', price: '$18.40', change: '+6.3%', cap: '$10B', icon: '🔗', pos: true }
  ],
  gold: [
    { name: 'Gold', ticker: 'XAU', price: '$2,341/oz', change: '-0.3%', cap: 'Physical Vault', icon: '⚡', pos: false },
    { name: 'Silver', ticker: 'XAG', price: '$29.45/oz', change: '+0.7%', cap: 'Physical Vault', icon: '⚪', pos: true },
    { name: 'Platinum', ticker: 'XPT', price: '$980/oz', change: '+1.2%', cap: 'Physical Vault', icon: '🔘', pos: true },
    { name: 'Palladium', ticker: 'XPD', price: '$1,030/oz', change: '-1.0%', cap: 'Physical Vault', icon: '⭕', pos: false },
    { name: 'Gold ETF', ticker: 'GLDX', price: '$187.40', change: '-0.2%', cap: 'ETF Token', icon: '📊', pos: false },
    { name: 'Silver ETF', ticker: 'SLVX', price: '$23.10', change: '+0.4%', cap: 'ETF Token', icon: '📊', pos: true }
  ],
  stocks: [
    { name: 'Apple Inc.', ticker: 'AAPL', price: '$189.40', change: '+0.9%', cap: '$2.9T', icon: '🍎', pos: true },
    { name: 'Tesla', ticker: 'TSLA', price: '$248.90', change: '-1.2%', cap: '$792B', icon: '⚡', pos: false },
    { name: 'Microsoft', ticker: 'MSFT', price: '$415.60', change: '+0.5%', cap: '$3.1T', icon: '🪟', pos: true },
    { name: 'Amazon', ticker: 'AMZN', price: '$192.30', change: '+2.1%', cap: '$2.0T', icon: '📦', pos: true },
    { name: 'NVIDIA', ticker: 'NVDA', price: '$875.40', change: '+3.8%', cap: '$2.1T', icon: '🖥️', pos: true },
    { name: 'Alphabet', ticker: 'GOOGL', price: '$178.50', change: '-0.4%', cap: '$2.2T', icon: '🔍', pos: false },
    { name: 'Saudi Aramco', ticker: '2222', price: '$8.24', change: '+0.2%', cap: '$1.7T', icon: '🛢️', pos: true },
    { name: 'LVMH', ticker: 'MC', price: '€750', change: '+1.4%', cap: '€375B', icon: '💎', pos: true }
  ],
  realestate: [
    { name: 'NYC Midtown', ticker: 'NYCT', price: '$0.50/tk', change: '+0.5%', cap: '$28M', icon: '🏙️', pos: true },
    { name: 'Dubai Marina', ticker: 'DXBT', price: '$1.20/tk', change: '+2.3%', cap: '$14M', icon: '🌆', pos: true },
    { name: 'London Zone 1', ticker: 'LONZ', price: '£0.80/tk', change: '+0.3%', cap: '£45M', icon: '🎡', pos: true },
    { name: 'Tokyo Shibuya', ticker: 'TKYS', price: '¥120/tk', change: '-0.1%', cap: '¥8B', icon: '🗼', pos: false },
    { name: 'Singapore CBD', ticker: 'SGCD', price: 'S$2.10/tk', change: '+1.1%', cap: 'S$22M', icon: '🏛️', pos: true },
    { name: 'Paris 8th', ticker: 'PRST', price: '€0.75/tk', change: '+0.7%', cap: '€18M', icon: '🗼', pos: true }
  ]
}

const labels: Record<string, string> = {
  all: 'All Assets',
  crypto: 'Crypto',
  gold: 'Metals',
  stocks: 'Stocks',
  realestate: 'Real Estate'
}

export default function AssetsPage({ searchParams }: { searchParams?: { type?: string } }) {
  const type = (searchParams?.type || 'all') as keyof typeof data | 'all'
  const display = type === 'all' ? Object.values(data).flat() : data[type] || []
  return (
    <div className="max-w-7xl mx-auto px-6 py-10">
      <div className="mb-10">
        <p className="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-2">Marketplace</p>
        <h1 className="font-display font-extrabold text-4xl">Asset Universe</h1>
        <p className="text-ultra-sub mt-3 max-w-lg">Own fractions of the world&apos;s most valuable assets — starting from $1.</p>
      </div>
      <div className="flex flex-wrap gap-3 mb-8">
        {Object.entries(labels).map(([key, label]) => (
          <Link
            key={key}
            href={`/assets?type=${key}`}
            className={`px-5 py-2 rounded-full text-sm font-medium transition-all ${
              type === key
                ? 'bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white'
                : 'border border-ultra-border text-ultra-sub hover:text-ultra-text hover:border-ultra-muted'
            }`}
          >
            {label}
          </Link>
        ))}
      </div>
      <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
        {display.map((asset) => (
          <div key={asset.ticker + asset.name} className="asset-card bg-ultra-card border border-ultra-border rounded-2xl p-5 hover:border-ultra-muted transition-all group">
            <div className="flex justify-between items-start mb-4">
              <div className="w-12 h-12 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                {asset.icon}
              </div>
              <span className={`text-xs font-mono font-bold px-2.5 py-1 rounded-full ${asset.pos ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-red bg-ultra-red/10'}`}>
                {asset.change}
              </span>
            </div>
            <h3 className="font-display font-bold text-base mb-1">{asset.name}</h3>
            <p className="text-xs text-ultra-sub font-mono mb-4">{asset.ticker}</p>
            <div className="flex justify-between items-end">
              <div>
                <p className="text-xl font-mono font-bold text-ultra-text">{asset.price}</p>
                <p className="text-xs text-ultra-sub mt-0.5">{asset.cap}</p>
              </div>
              <Link href="/register" className="px-4 py-2 bg-gradient-to-r from-ultra-cyan/20 to-ultra-violet/20 border border-ultra-cyan/30 text-ultra-cyan text-xs font-semibold rounded-lg hover:from-ultra-cyan/30 hover:to-ultra-violet/30 transition-all">
                Buy →
              </Link>
            </div>
          </div>
        ))}
      </div>
      <div className="mt-16 text-center bg-ultra-card border border-ultra-border rounded-2xl p-10">
        <p className="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-3">Unlock Everything</p>
        <h2 className="font-display font-extrabold text-3xl mb-4">Start with $1. Own the World.</h2>
        <p className="text-ultra-sub mb-8 max-w-md mx-auto">Fractional ownership means you can own a piece of Manhattan real estate or 100g of gold with any budget.</p>
        <Link href="/register" className="inline-block px-8 py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl hover:opacity-90 transition-opacity">
          Create Free Account →
        </Link>
      </div>
    </div>
  )
}
