import { readSession } from '@/lib/auth'

type Tx = { type: 'buy'|'sell'; asset: string; ticker: string; amount: string; value: string; date: string; icon: string; status: 'completed'|'pending' }

const transactions: Tx[] = [
  { type: 'buy', asset: 'Bitcoin', ticker: 'BTC', amount: '0.5 BTC', value: '$33,710', date: '2025-02-18', icon: '₿', status: 'completed' },
  { type: 'buy', asset: 'Gold', ticker: 'XAU', amount: '2 oz', value: '$4,682', date: '2025-02-15', icon: 'Au', status: 'completed' },
  { type: 'sell', asset: 'Ethereum', ticker: 'ETH', amount: '1.2 ETH', value: '$4,608', date: '2025-02-10', icon: 'E', status: 'completed' },
  { type: 'buy', asset: 'Apple Inc.', ticker: 'AAPL', amount: '10 shares', value: '$1,894', date: '2025-02-08', icon: 'A', status: 'completed' },
  { type: 'buy', asset: 'RE Token', ticker: 'NYCT', amount: '100 tokens', value: '$50', date: '2025-02-05', icon: 'R', status: 'pending' },
  { type: 'buy', asset: 'Solana', ticker: 'SOL', amount: '50 SOL', value: '$8,630', date: '2025-01-30', icon: 'S', status: 'completed' }
]

export default function PortfolioPage() {
  const session = readSession()
  return (
    <div className="max-w-7xl mx-auto px-6 py-10">
      <div className="mb-10">
        <p className="text-ultra-sub font-mono text-sm uppercase tracking-widest mb-2">My Holdings</p>
        <h1 className="font-display font-extrabold text-4xl">Portfolio Overview</h1>
        {session && <p className="text-ultra-sub text-sm mt-1 font-mono">Signed in as {session.email}</p>}
      </div>
      <div className="grid grid-cols-1 sm:grid-cols-3 gap-5 mb-10">
        <div className="sm:col-span-2 bg-gradient-to-br from-ultra-card to-ultra-surface border border-ultra-cyan/20 rounded-2xl p-7 glow-border">
          <p className="text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">All-Time Portfolio Value</p>
          <p className="font-mono text-4xl font-bold text-ultra-text mb-1">$284,910<span className="text-ultra-cyan">.47</span></p>
          <div className="flex items-center gap-3 mt-3">
            <span className="text-ultra-green text-sm font-mono font-bold">+$48,201.80</span>
            <span className="text-ultra-green text-xs bg-ultra-green/10 px-2 py-0.5 rounded-md font-mono">+20.4% all-time</span>
          </div>
        </div>
        <div className="space-y-4">
          <div className="bg-ultra-card border border-ultra-border rounded-2xl p-5">
            <p className="text-xs font-mono text-ultra-sub mb-1">Best Performer</p>
            <p className="font-display font-bold">Solana</p>
            <p className="text-ultra-green text-sm font-mono">+5.2% today</p>
          </div>
          <div className="bg-ultra-card border border-ultra-border rounded-2xl p-5">
            <p className="text-xs font-mono text-ultra-sub mb-1">Total Assets</p>
            <p className="font-display font-bold text-2xl">8</p>
            <p className="text-ultra-sub text-xs font-mono">across 4 categories</p>
          </div>
        </div>
      </div>
      <div className="bg-ultra-card border border-ultra-border rounded-2xl overflow-hidden">
        <div className="p-6 border-b border-ultra-border flex justify-between items-center">
          <h2 className="font-display font-bold text-lg">Transaction History</h2>
          <span className="text-xs font-mono text-ultra-sub">{transactions.length} transactions</span>
        </div>
        <div className="overflow-x-auto">
          <table className="w-full text-sm">
            <thead>
              <tr className="border-b border-ultra-border text-xs font-mono text-ultra-sub uppercase tracking-widest">
                <th className="text-left px-6 py-3">Type</th>
                <th className="text-left px-4 py-3">Asset</th>
                <th className="text-right px-4 py-3">Amount</th>
                <th className="text-right px-4 py-3">Value</th>
                <th className="text-right px-4 py-3">Date</th>
                <th className="text-right px-6 py-3">Status</th>
              </tr>
            </thead>
            <tbody>
              {transactions.map(tx => (
                <tr key={`${tx.ticker}-${tx.date}-${tx.type}`} className="border-b border-ultra-border/50 hover:bg-ultra-surface/50 transition-colors">
                  <td className="px-6 py-4">
                    <span className={`px-2.5 py-1 rounded-lg text-xs font-mono font-bold ${tx.type === 'buy' ? 'bg-ultra-green/10 text-ultra-green' : 'bg-ultra-red/10 text-ultra-red'}`}>{tx.type.toUpperCase()}</span>
                  </td>
                  <td className="px-4 py-4">
                    <div className="flex items-center gap-3">
                      <div className="w-8 h-8 rounded-lg bg-ultra-surface border border-ultra-border flex items-center justify-center text-xs font-bold text-ultra-cyan">{tx.icon}</div>
                      <div>
                        <p className="font-semibold text-ultra-text text-sm">{tx.asset}</p>
                        <p className="text-xs text-ultra-sub font-mono">{tx.ticker}</p>
                      </div>
                    </div>
                  </td>
                  <td className="px-4 py-4 text-right font-mono text-ultra-sub text-xs">{tx.amount}</td>
                  <td className="px-4 py-4 text-right font-mono font-semibold">{tx.value}</td>
                  <td className="px-4 py-4 text-right font-mono text-xs text-ultra-sub">{tx.date}</td>
                  <td className="px-6 py-4 text-right">
                    <span className={`text-xs font-mono px-2 py-1 rounded-md ${tx.status === 'completed' ? 'text-ultra-green bg-ultra-green/10' : 'text-ultra-gold bg-ultra-gold/10'}`}>
                      {tx.status.charAt(0).toUpperCase() + tx.status.slice(1)}
                    </span>
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
    </div>
  )
}
