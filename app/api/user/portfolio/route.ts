import { NextResponse } from 'next/server'
import { readSession } from '@/lib/auth'
import { getDb } from '@/lib/mongodb'
import { ObjectId } from 'mongodb'

export const dynamic = 'force-dynamic'

const defaultPortfolio = [
  { name: 'Bitcoin',    ticker: 'BTC',   type: 'crypto',  amount: '1.84',   value: 124840, change: 4.2,  icon: '₿',  color: 'yellow' },
  { name: 'Ethereum',   ticker: 'ETH',   type: 'crypto',  amount: '12.5',   value: 48002,  change: 1.8,  icon: 'Ξ',  color: 'blue' },
  { name: 'Gold',       ticker: 'XAU',   type: 'metal',   amount: '12 oz',  value: 28101,  change: -0.3, icon: '⚡', color: 'amber' },
  { name: 'Apple Inc.', ticker: 'AAPL',  type: 'stock',   amount: '100 sh', value: 18940,  change: 0.9,  icon: '🍎', color: 'gray' },
  { name: 'Tesla',      ticker: 'TSLA',  type: 'stock',   amount: '30 sh',  value: 7467,   change: -1.2, icon: '⚡', color: 'red' },
  { name: 'RE Token',   ticker: 'NYCT',  type: 'realty',  amount: '500 tk', value: 64519,  change: 0.5,  icon: '🏘️', color: 'green' },
  { name: 'Solana',     ticker: 'SOL',   type: 'crypto',  amount: '185',    value: 31931,  change: 5.2,  icon: '◎',  color: 'purple' },
  { name: 'Silver',     ticker: 'XAG',   type: 'metal',   amount: '30 oz',  value: 883,    change: 0.7,  icon: '⚪', color: 'slate' },
]

export async function GET() {
  const session = readSession()
  if (!session) {
    return NextResponse.json({ error: 'Unauthorized' }, { status: 401 })
  }

  try {
    const db = await getDb()
    const user = await db.collection('users').findOne({ _id: new ObjectId(session.id) })
    
    if (!user) {
      return NextResponse.json({ error: 'User not found' }, { status: 404 })
    }

    const portfolio = (user.portfolio && user.portfolio.length > 0) ? user.portfolio : defaultPortfolio
    
    return NextResponse.json({
      username: user.username,
      email: user.email,
      portfolio: portfolio
    })
  } catch (e: any) {
    return NextResponse.json({ error: e.message }, { status: 500 })
  }
}
