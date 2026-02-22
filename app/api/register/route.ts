import { NextResponse } from 'next/server'
import { getDb } from '@/lib/mongodb'
import bcrypt from 'bcryptjs'

export async function POST(req: Request) {
  try {
    const body = await req.json()
    const username = String(body.username || '').trim()
    const email = String(body.email || '').trim().toLowerCase()
    const password = String(body.password || '')
    if (!username || !email || !password) {
      return NextResponse.json({ error: 'Missing fields' }, { status: 400 })
    }
    if (password.length < 8) {
      return NextResponse.json({ error: 'Password too short' }, { status: 400 })
    }
    const db = await getDb()
    const users = db.collection('users')
    const exists = await users.findOne({ $or: [{ email }, { username }] })
    if (exists) {
      return NextResponse.json({ error: 'Username or email already in use' }, { status: 409 })
    }
    const hash = await bcrypt.hash(password, 10)
    const doc = { username, email, password: hash, created_at: new Date().toISOString(), portfolio: [], wallets: [], kyc_status: 'pending' }
    const result = await users.insertOne(doc)
    return NextResponse.json({ ok: true, id: result.insertedId.toString() })
  } catch (e: any) {
    return NextResponse.json({ error: e.message || 'Registration failed' }, { status: 500 })
  }
}
