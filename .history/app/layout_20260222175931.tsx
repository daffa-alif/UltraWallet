import './globals.css'
import Link from 'next/link'
import type { ReactNode } from 'react'

export const metadata = {
  title: 'UltraWallet — Own Everything',
  description: 'Own crypto, stocks, metals and real estate in one wallet.'
}

function Header() {
  return (
    <nav className="sticky top-0 z-40 bg-ultra-bg/90 backdrop-blur-xl border-b border-ultra-border">
      <div className="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
        <Link href="/" className="flex items-center gap-3 group">
          <div className="w-8 h-8 rounded-lg bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-sm">U</div>
          <span className="font-display font-bold text-xl tracking-tight">Ultra<span className="text-ultra-cyan">Wallet</span></span>
        </Link>
        <div className="hidden md:flex items-center gap-8 text-sm font-medium text-ultra-sub">
          <Link href="/" className="nav-link hover:text-ultra-text">Home</Link>
          <Link href="/dashboard" className="nav-link hover:text-ultra-text">Dashboard</Link>
          <Link href="/assets" className="nav-link hover:text-ultra-text">Assets</Link>
          <Link href="/wallets" className="nav-link hover:text-ultra-text">Wallets</Link>
          <Link href="/portfolio" className="nav-link hover:text-ultra-text">Portfolio</Link>
        </div>
        <div className="flex items-center gap-3">
          <Link href="/login" className="text-sm text-ultra-sub hover:text-ultra-text transition-colors">Sign In</Link>
          <Link href="/register" className="px-4 py-2 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white text-sm font-semibold rounded-lg hover:opacity-90 transition-opacity">Get Started</Link>
        </div>
      </div>
    </nav>
  )
}

function Footer() {
  return (
    <footer className="border-t border-ultra-border mt-20 bg-ultra-surface/50">
      <div className="max-w-7xl mx-auto px-6 py-16">
        <div className="grid grid-cols-1 md:grid-cols-4 gap-12">
          <div className="md:col-span-2">
            <div className="flex items-center gap-3 mb-4">
              <div className="w-8 h-8 rounded-lg bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-sm">U</div>
              <span className="font-display font-bold text-xl">Ultra<span className="text-ultra-cyan">Wallet</span></span>
            </div>
            <p className="text-ultra-sub text-sm leading-relaxed max-w-sm">The world&apos;s first unified platform to own real-world assets — gold, equities, real estate, and digital currencies — all in one wallet.</p>
            <div className="flex gap-3 mt-6 flex-wrap">
              <div className="px-3 py-1 rounded-full border border-ultra-green/30 bg-ultra-green/10 text-ultra-green text-xs font-mono">● Live</div>
              <div className="px-3 py-1 rounded-full border border-ultra-cyan/30 bg-ultra-cyan/10 text-ultra-cyan text-xs font-mono">Web3 Native</div>
              <div className="px-3 py-1 rounded-full border border-ultra-gold/30 bg-ultra-gold/10 text-ultra-gold text-xs font-mono">Multi-Asset</div>
            </div>
          </div>
          <div>
            <h4 className="font-display font-bold text-sm uppercase tracking-widest text-ultra-sub mb-4">Platform</h4>
            <ul className="space-y-2 text-sm text-ultra-sub">
              <li><Link href="/assets" className="hover:text-ultra-cyan transition-colors">Browse Assets</Link></li>
              <li><Link href="/wallets" className="hover:text-ultra-cyan transition-colors">Connect Wallet</Link></li>
              <li><Link href="/dashboard" className="hover:text-ultra-cyan transition-colors">Dashboard</Link></li>
              <li><Link href="/portfolio" className="hover:text-ultra-cyan transition-colors">Portfolio</Link></li>
            </ul>
          </div>
        </div>
        <div className="border-t border-ultra-border mt-12 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
          <p className="text-ultra-sub text-xs font-mono">&copy; {new Date().getFullYear()} UltraWallet. Built on Web3.</p>
          <div className="flex gap-6 text-xs text-ultra-sub">
            <a className="hover:text-ultra-text transition-colors" href="#">Privacy</a>
            <a className="hover:text-ultra-text transition-colors" href="#">Terms</a>
            <a className="hover:text-ultra-text transition-colors" href="#">Security</a>
          </div>
        </div>
      </div>
    </footer>
  )
}

export default function RootLayout({ children }: { children: ReactNode }) {
  return (
    <html lang="en" className="scroll-smooth">
      <body className="noise-bg grid-bg min-h-screen relative">
        <div className="ticker-wrap border-b border-ultra-border bg-ultra-surface/80 backdrop-blur-sm py-2 text-xs font-mono text-ultra-sub z-50 relative">
          <div className="ticker-inner">
            <span className="mx-6 text-ultra-green">● BTC $67,420.50 <span className="text-ultra-green">+2.4%</span></span>
            <span className="mx-6">● ETH $3,840.20 <span className="text-ultra-green">+1.8%</span></span>
            <span className="mx-6 text-ultra-gold">● GOLD $2,341.80/oz <span className="text-ultra-red">-0.3%</span></span>
            <span className="mx-6">● AAPL $189.40 <span className="text-ultra-green">+0.9%</span></span>
            <span className="mx-6">● SOL $172.60 <span className="text-ultra-green">+5.2%</span></span>
          </div>
        </div>
        <Header />
        {children}
        <Footer />
      </body>
    </html>
  )
}
