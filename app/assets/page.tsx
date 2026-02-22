'use client'
import { useState, useEffect } from 'react'
import Link from 'next/link'
import { useSearchParams } from 'next/navigation'

export default function AssetsPage() {
  const searchParams = useSearchParams()
  const type = searchParams.get('type') || 'all'
  const [assets, setAssets] = useState<any[]>([])
  const [loading, setLoading] = useState(true)

  useEffect(() => {
    setLoading(true)
    fetch(`/api/assets?type=${type}`)
      .then(res => res.json())
      .then(d => {
        setAssets(d)
        setLoading(false)
      })
      .catch(() => setLoading(false))
  }, [type])

  const labels: Record<string, string> = {
    all: 'All Assets',
    crypto: 'Crypto',
    gold: 'Metals',
    stocks: 'Stocks',
    realestate: 'Real Estate'
  }

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

      {loading ? (
        <div className="text-ultra-sub font-mono">Loading assets...</div>
      ) : (
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-5">
          {assets.map((asset: any) => (
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
      )}

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
