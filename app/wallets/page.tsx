'use client'
import { useState } from 'react'

type Vendor = { name: string; desc: string; icon: string; chains: string[]; popular?: boolean }

const vendors: Record<'software' | 'hardware' | 'mobile', Vendor[]> = {
  software: [
    { name: 'MetaMask', desc: 'Most popular EVM wallet. ETH, Polygon, BNB and 30+ networks.', icon: '🦊', chains: ['ETH','BNB','Polygon','AVAX'], popular: true },
    { name: 'Phantom', desc: 'The leading Solana wallet. Also supports Ethereum.', icon: '👻', chains: ['SOL','ETH','Polygon'], popular: true },
    { name: 'Trust Wallet', desc: 'Multi-chain wallet with 70+ blockchains. Mobile-first.', icon: '🛡', chains: ['Multi-Chain'], popular: true },
    { name: 'Coinbase', desc: 'Simple, secure wallet by Coinbase. Great for beginners.', icon: '🔵', chains: ['ETH','BTC','SOL'] },
    { name: 'Rainbow', desc: 'Beautiful Ethereum wallet with NFT support.', icon: '🌈', chains: ['ETH','Optimism','Arbitrum'] },
    { name: 'Rabby', desc: 'Smart multi-chain wallet with security checks.', icon: '🐰', chains: ['EVM Multi-Chain'] },
    { name: 'Keplr', desc: 'Leading Cosmos ecosystem wallet. IBC-enabled.', icon: '⚛', chains: ['Cosmos','Osmosis','Juno'] },
    { name: 'OKX Wallet', desc: 'All-in-one Web3 wallet. Supports 70+ networks.', icon: '⭕', chains: ['Multi-Chain'] },
    { name: 'Zerion', desc: 'Portfolio plus wallet for DeFi power users.', icon: '🔷', chains: ['EVM Multi-Chain'] },
    { name: 'Argent', desc: 'Account abstraction wallet on Starknet and zkSync.', icon: '🟠', chains: ['Starknet','zkSync'] }
  ],
  hardware: [
    { name: 'Ledger', desc: 'Industry-leading hardware wallet. Nano X, Nano S Plus, Stax.', icon: '🔐', chains: ['BTC','ETH','SOL','1000+'], popular: true },
    { name: 'Trezor', desc: 'The original hardware wallet. Open-source and trustless.', icon: '💚', chains: ['BTC','ETH','Multi-Chain'], popular: true },
    { name: 'Coldcard', desc: 'Maximum security Bitcoin-only hardware wallet.', icon: '❄', chains: ['BTC only'] },
    { name: 'GridPlus', desc: 'Lattice1 — the smartest hardware wallet.', icon: '🔳', chains: ['ETH','EVM','BTC'] },
    { name: 'Foundation', desc: 'Passport — beautiful open-source Bitcoin hardware wallet.', icon: '📟', chains: ['BTC only'] },
    { name: 'Keystone', desc: 'Air-gapped hardware wallet with QR code signing.', icon: '🔑', chains: ['BTC','ETH','Multi-Chain'] }
  ],
  mobile: [
    { name: 'Exodus', desc: 'Beautifully designed multi-asset mobile wallet.', icon: '🌍', chains: ['BTC','ETH','SOL','260+ assets'], popular: true },
    { name: 'Mycelium', desc: 'Bitcoin specialist wallet with HD features.', icon: '🍄', chains: ['BTC','ETH'] },
    { name: 'Edge', desc: 'Account-based wallet with built-in exchange.', icon: '📱', chains: ['BTC','ETH','Multi-Chain'] },
    { name: 'Bitget', desc: 'Asia-focused multi-chain wallet.', icon: '🅱', chains: ['Multi-Chain'] }
  ]
}

export default function WalletsPage() {
  const [modal, setModal] = useState<{ open: boolean; name?: string }>(() => ({ open: false }))
  function connect(name: string) {
    setModal({ open: true, name })
    setTimeout(() => {
      setModal({ open: true, name: `${name} connected successfully.` })
      setTimeout(() => setModal({ open: false }), 1500)
    }, 2500)
  }
  return (
    <div className="max-w-7xl mx-auto px-6 py-10">
      <div className="text-center mb-14">
        <p className="text-ultra-violet font-mono text-sm uppercase tracking-widest mb-3">Multi-Wallet Support</p>
        <h1 className="font-display font-extrabold text-4xl lg:text-5xl mb-5">
          Connect Your Wallet.<br />
          <span className="text-transparent bg-clip-text bg-gradient-to-r from-ultra-cyan to-ultra-violet">Any Wallet.</span>
        </h1>
        <p className="text-ultra-sub text-lg max-w-xl mx-auto">UltraWallet works with every major wallet provider. Your keys, your assets.</p>
      </div>

      <div className="bg-ultra-card border border-ultra-cyan/20 rounded-2xl p-8 mb-14 glow-border">
        <div className="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
          {[
            { icon: '🔍', n: '01', title: 'Choose Provider', desc: 'Pick from 25+ wallets' },
            { icon: '📲', n: '02', title: 'Scan or Click', desc: 'QR code or extension' },
            { icon: '✅', n: '03', title: 'Approve', desc: 'Confirm in your wallet' },
            { icon: '🌍', n: '04', title: 'Access Assets', desc: 'Own global assets' }
          ].map(s => (
            <div key={s.n}>
              <div className="text-3xl mb-2">{s.icon}</div>
              <div className="text-xs font-mono text-ultra-cyan mb-1">STEP {s.n}</div>
              <p className="font-display font-bold text-sm">{s.title}</p>
              <p className="text-xs text-ultra-sub mt-1">{s.desc}</p>
            </div>
          ))}
        </div>
      </div>

      <section className="mb-14">
        <div className="flex items-center gap-4 mb-6">
          <h2 className="font-display font-bold text-2xl">Software Wallets</h2>
          <span className="px-3 py-1 text-xs font-mono bg-ultra-cyan/10 text-ultra-cyan border border-ultra-cyan/20 rounded-full">{vendors.software.length} providers</span>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {vendors.software.map(w => (
            <div key={w.name} className="wallet-btn relative bg-ultra-card border border-ultra-border hover:border-ultra-muted rounded-2xl p-5 transition-all group cursor-pointer">
              {w.popular && <div className="absolute top-3 right-3 px-2 py-0.5 text-[10px] font-mono font-bold text-ultra-gold bg-ultra-gold/10 border border-ultra-gold/20 rounded-full">Popular</div>}
              <div className="flex items-start gap-4">
                <div className="w-12 h-12 flex-shrink-0 rounded-xl bg-ultra-surface border border-ultra-border flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                  {w.icon}
                </div>
                <div className="flex-1 min-w-0">
                  <p className="font-display font-bold text-sm mb-1">{w.name}</p>
                  <p className="text-xs text-ultra-sub leading-relaxed mb-3">{w.desc}</p>
                  <div className="flex flex-wrap gap-1">
                    {w.chains.map(c => <span key={c} className="text-[10px] font-mono px-2 py-0.5 bg-ultra-violet/10 text-ultra-violet border border-ultra-violet/20 rounded-md">{c}</span>)}
                  </div>
                </div>
              </div>
              <button onClick={()=>connect(w.name)} className="mt-4 w-full py-2.5 border border-ultra-cyan/30 text-ultra-cyan text-xs font-semibold rounded-xl hover:bg-ultra-cyan/10 transition-colors">
                Connect {w.name} →
              </button>
            </div>
          ))}
        </div>
      </section>

      <section className="mb-14">
        <div className="flex items-center gap-4 mb-6">
          <h2 className="font-display font-bold text-2xl">Hardware Wallets</h2>
          <span className="px-3 py-1 text-xs font-mono bg-ultra-green/10 text-ultra-green border border-ultra-green/20 rounded-full">Maximum Security</span>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-5">
          {vendors.hardware.map(w => (
            <div key={w.name} className="wallet-btn bg-ultra-card border border-ultra-border hover:border-ultra-green/30 rounded-2xl p-5 transition-all group cursor-pointer">
              <div className="flex items-start gap-4">
                <div className="w-12 h-12 flex-shrink-0 rounded-xl bg-ultra-green/10 border border-ultra-green/20 flex items-center justify-center text-2xl group-hover:scale-110 transition-transform">
                  {w.icon}
                </div>
                <div>
                  <p className="font-display font-bold text-sm mb-1">{w.name}</p>
                  <p className="text-xs text-ultra-sub leading-relaxed mb-3">{w.desc}</p>
                  <div className="flex flex-wrap gap-1">
                    {w.chains.map(c => <span key={c} className="text-[10px] font-mono px-2 py-0.5 bg-ultra-green/10 text-ultra-green border border-ultra-green/20 rounded-md">{c}</span>)}
                  </div>
                </div>
              </div>
              <button onClick={()=>connect(w.name)} className="mt-4 w-full py-2.5 border border-ultra-green/30 text-ultra-green text-xs font-semibold rounded-xl hover:bg-ultra-green/10 transition-colors">
                Connect Hardware →
              </button>
            </div>
          ))}
        </div>
      </section>

      <section className="mb-14">
        <div className="flex items-center gap-4 mb-6">
          <h2 className="font-display font-bold text-2xl">Mobile Wallets</h2>
          <span className="px-3 py-1 text-xs font-mono bg-ultra-gold/10 text-ultra-gold border border-ultra-gold/20 rounded-full">iOS &amp; Android</span>
        </div>
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
          {vendors.mobile.map(w => (
            <div key={w.name} className="wallet-btn bg-ultra-card border border-ultra-border hover:border-ultra-gold/30 rounded-2xl p-5 transition-all group cursor-pointer">
              <div className="text-3xl mb-3 group-hover:scale-110 transition-transform inline-block">{w.icon}</div>
              <p className="font-display font-bold text-sm mb-1">{w.name}</p>
              <p className="text-xs text-ultra-sub leading-relaxed mb-3">{w.desc}</p>
              <button onClick={()=>connect(w.name)} className="w-full py-2 border border-ultra-gold/30 text-ultra-gold text-xs font-semibold rounded-lg hover:bg-ultra-gold/10 transition-colors">
                Connect →
              </button>
            </div>
          ))}
        </div>
      </section>

      <div className="bg-ultra-surface border border-ultra-border rounded-2xl p-8 text-center">
        <div className="text-4xl mb-4">🔒</div>
        <h3 className="font-display font-bold text-xl mb-3">Non-Custodial. Your Keys, Your Assets.</h3>
        <p className="text-ultra-sub max-w-lg mx-auto text-sm leading-relaxed">
          UltraWallet never holds your private keys. We only request read-only access for portfolio tracking. All transactions are signed locally in your wallet.
        </p>
      </div>

      {modal.open && (
        <div className="fixed inset-0 z-50 flex items-center justify-center bg-ultra-bg/80 backdrop-blur-sm p-6">
          <div className="bg-ultra-card border border-ultra-cyan/30 rounded-2xl p-8 max-w-sm w-full glow-border text-center">
            <div className="w-16 h-16 rounded-2xl bg-gradient-to-br from-ultra-cyan/20 to-ultra-violet/20 border border-ultra-cyan/30 flex items-center justify-center text-3xl mx-auto mb-5">🔗</div>
            <h3 className="font-display font-bold text-xl mb-2">{String(modal.name).startsWith('Connected') ? 'Connected!' : `Connecting to ${modal.name || 'wallet'}...`}</h3>
            <p className="text-ultra-sub text-sm mb-6">{String(modal.name).includes('successfully') ? String(modal.name) : 'Please approve in your wallet.'}</p>
            <div className="flex items-center justify-center gap-2 mb-6">
              <div className="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style={{ animationDelay: '0s' }} />
              <div className="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style={{ animationDelay: '0.2s' }} />
              <div className="w-2 h-2 rounded-full bg-ultra-cyan animate-bounce" style={{ animationDelay: '0.4s' }} />
            </div>
            <button onClick={()=>setModal({ open: false })} className="w-full py-2.5 border border-ultra-border text-ultra-sub text-sm rounded-xl hover:text-ultra-text transition-colors">Cancel</button>
          </div>
        </div>
      )}
    </div>
  )
}
