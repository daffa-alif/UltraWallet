import jwt from 'jsonwebtoken'
import { cookies } from 'next/headers'

const COOKIE_NAME = 'ultra_session'

export function signSession(payload: { id: string; email: string; username?: string }) {
  const secret = process.env.JWT_SECRET
  if (!secret) throw new Error('Missing JWT_SECRET')
  return jwt.sign(payload, secret, { expiresIn: '7d' })
}

export function verifySession(token: string) {
  const secret = process.env.JWT_SECRET
  if (!secret) throw new Error('Missing JWT_SECRET')
  return jwt.verify(token, secret) as { id: string; email: string; username?: string; iat: number; exp: number }
}

export function setSessionCookie(token: string) {
  cookies().set(COOKIE_NAME, token, {
    httpOnly: true,
    sameSite: 'strict',
    secure: true,
    path: '/',
    maxAge: 60 * 60 * 24 * 7
  })
}

export function clearSessionCookie() {
  cookies().set(COOKIE_NAME, '', { httpOnly: true, sameSite: 'strict', secure: true, path: '/', maxAge: 0 })
}

export function readSession() {
  const token = cookies().get(COOKIE_NAME)?.value
  if (!token) return null
  try {
    return verifySession(token)
  } catch {
    return null
  }
}
