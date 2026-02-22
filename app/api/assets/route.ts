import { NextResponse } from 'next/server'

export const dynamic = 'force-dynamic'

const assets = {
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
    { name: 'Platinum', ticker: 'XPT', price: '$980/oz', change: '+1.2%', cap: 'Physical Vault', icon: '💍', pos: true },
    { name: 'Palladium', ticker: 'XPD', price: '$1,030/oz', change: '-1.0%', cap: 'Physical Vault', icon: '⭕', pos: false },
    { name: 'Gold ETF', ticker: 'GLDX', price: '$187.40', change: '-0.2%', cap: 'ETF Token', icon: '📊', pos: false },
    { name: 'Silver ETF', ticker: 'SLVX', price: '$23.10', change: '+0.4%', cap: 'ETF Token', icon: '📊', pos: true }
  ],
  stocks: [
    { name: 'Apple Inc.', ticker: 'AAPL', price: '$189.40', change: '+0.9%', cap: '$2.9T', icon: '🍎', pos: true },
    { name: 'Tesla', ticker: 'TSLA', price: '$248.90', change: '-1.2%', cap: '$792B', icon: '⚡', pos: false },
    { name: 'Microsoft', ticker: 'MSFT', price: '$415.60', change: '+0.5%', cap: '$3.1T', icon: '💻', pos: true },
    { name: 'Amazon', ticker: 'AMZN', price: '$192.30', change: '+2.1%', cap: '$2.0T', icon: '📦', pos: true },
    { name: 'NVIDIA', ticker: 'NVDA', price: '$875.40', change: '+3.8%', cap: '$2.1T', icon: '🖥️', pos: true },
    { name: 'Alphabet', ticker: 'GOOGL', price: '$178.50', change: '-0.4%', cap: '$2.2T', icon: '🔍', pos: false },
    { name: 'Saudi Aramco', ticker: '2222', price: '$8.24', change: '+0.2%', cap: '$1.7T', icon: '🛢️', pos: true },
    { name: 'LVMH', ticker: 'MC', price: '€750', change: '+1.4%', cap: '€375B', icon: '💎', pos: true }
  ],
  realestate: [
    { name: 'NYC Midtown', ticker: 'NYCT', price: '$0.50/tk', change: '+0.5%', cap: '$28M', icon: '🏘️', pos: true },
    { name: 'Dubai Marina', ticker: 'DXBT', price: '$1.20/tk', change: '+2.3%', cap: '$14M', icon: '🏙️', pos: true },
    { name: 'London Zone 1', ticker: 'LONZ', price: '£0.80/tk', change: '+0.3%', cap: '£45M', icon: '🏡', pos: true },
    { name: 'Tokyo Shibuya', ticker: 'TKYS', price: '¥120/tk', change: '-0.1%', cap: '¥8B', icon: '🗼', pos: false },
    { name: 'Singapore CBD', ticker: 'SGCD', price: 'S$2.10/tk', change: '+1.1%', cap: 'S$22M', icon: '🛥️', pos: true },
    { name: 'Paris 8th', ticker: 'PRST', price: '€0.75/tk', change: '+0.7%', cap: '€18M', icon: '🗼', pos: true }
  ]
}

export async function GET(req: Request) {
  const { searchParams } = new URL(req.url)
  const type = searchParams.get('type')
  if (type && type !== 'all') {
    return NextResponse.json((assets as any)[type] || [])
  }
  return NextResponse.json(Object.values(assets).flat())
}
