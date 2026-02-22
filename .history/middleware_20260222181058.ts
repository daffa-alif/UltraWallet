import { NextResponse } from 'next/server'
import type { NextRequest } from 'next/server'
import jwt from 'jsonwebtoken'

const COOKIE_NAME = 'ultra_session'

export function middleware(req: NextRequest) {
  const protectedPaths = ['/dashboard', '/portfolio']
  if (protectedPaths.some(p => req.nextUrl.pathname.startsWith(p))) {
    const token = req.cookies.get(COOKIE_NAME)?.value
    if (!token) {
      const url = new URL('/login', req.url)
      return NextResponse.redirect(url)
    }
    try {
      const secret = process.env.JWT_SECRET
      if (!secret) throw new Error('Missing JWT_SECRET')
      jwt.verify(token, secret)
    } catch {
      const url = new URL('/login', req.url)
      return NextResponse.redirect(url)
    }
  }
  return NextResponse.next()
}

export const config = {
  matcher: ['/dashboard/:path*']
}
