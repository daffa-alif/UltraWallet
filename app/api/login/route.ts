import { NextResponse } from 'next/server'
import { getDb } from '@/lib/mongodb'
import bcrypt from 'bcryptjs'
import { signSession, setSessionCookie } from '@/lib/auth'

export async function POST(req: Request) {
  try {
    const body = await req.json().catch(() => ({}))
    const email = String(body.email || '').trim().toLowerCase()
    const password = String(body.password || '')

    if (!email || !password) {
      return NextResponse.json({ error: 'Email and password are required' }, { status: 400 })
    }

    // Backend Connection with better error handling
    let db;
    try {
      db = await getDb()
    } catch (dbError: any) {
      console.error('DATABASE_CONNECTION_ERROR:', dbError.message)
      return NextResponse.json({ 
        error: 'Backend connection failed. Please check if your IP is whitelisted in MongoDB Atlas.',
        details: dbError.message 
      }, { status: 503 })
    }

    const users = db.collection('users')
    const user = await users.findOne({ email })

    if (!user) {
      return NextResponse.json({ error: 'Invalid email or password' }, { status: 401 })
    }

    const isMatch = await bcrypt.compare(password, user.password)
    if (!isMatch) {
      return NextResponse.json({ error: 'Invalid email or password' }, { status: 401 })
    }

    const token = signSession({ id: String(user._id), email, username: user.username })
    setSessionCookie(token)

    return NextResponse.json({ ok: true, message: 'Logged in successfully' })
  } catch (e: any) {
    console.error('AUTH_API_ERROR:', e.message)
    return NextResponse.json({ error: 'Server error: ' + e.message }, { status: 500 })
  }
}
