'use client'
import { useState } from 'react'
import { useRouter } from 'next/navigation'

export default function RegisterPage() {
  const router = useRouter()
  const [username, setUsername] = useState('')
  const [email, setEmail] = useState('')
  const [password, setPassword] = useState('')
  const [password2, setPassword2] = useState('')
  const [error, setError] = useState('')
  const [success, setSuccess] = useState('')
  const [loading, setLoading] = useState(false)

  async function onSubmit(e: React.FormEvent) {
    e.preventDefault()
    setError('')
    setSuccess('')
    if (password !== password2) { setError('Passwords do not match'); return }
    setLoading(true)
    try {
      const res = await fetch('/api/register', { method: 'POST', headers: { 'Content-Type': 'application/json' }, body: JSON.stringify({ username, email, password }) })
      const data = await res.json()
      if (!res.ok) throw new Error(data.error || 'Registration failed')
      setSuccess('Account created! You can now sign in.')
      setTimeout(()=>router.push('/login'), 1000)
    } catch (e: any) {
      setError(e.message)
    } finally {
      setLoading(false)
    }
  }

  return (
    <div className="min-h-[80vh] flex items-center justify-center py-16 px-6">
      <div className="absolute top-1/3 left-1/3 w-80 h-80 bg-ultra-violet/10 rounded-full blur-3xl pointer-events-none"></div>
      <div className="absolute bottom-1/3 right-1/3 w-80 h-80 bg-ultra-cyan/10 rounded-full blur-3xl pointer-events-none"></div>
      <div className="w-full max-w-md relative z-10">
        <div className="text-center mb-10">
          <div className="w-16 h-16 rounded-2xl bg-gradient-to-br from-ultra-cyan to-ultra-violet flex items-center justify-center text-white font-bold font-display text-2xl mx-auto mb-4">U</div>
          <h1 className="font-display font-extrabold text-3xl">Create Account</h1>
          <p className="text-ultra-sub mt-2">Join 2M+ global asset owners</p>
        </div>
        {error && <div className="mb-6 px-4 py-3 rounded-xl border border-ultra-red/30 bg-ultra-red/10 text-ultra-red text-sm">⚠ {error}</div>}
        {success && <div className="mb-6 px-4 py-3 rounded-xl border border-ultra-green/30 bg-ultra-green/10 text-ultra-green text-sm">✓ {success}</div>}
        <form onSubmit={onSubmit} className="bg-ultra-card border border-ultra-border rounded-2xl p-8 space-y-5">
          <div>
            <label className="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Username</label>
            <input required value={username} onChange={e=>setUsername(e.target.value)} className="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors font-mono" placeholder="satoshi_nakamoto" />
          </div>
          <div>
            <label className="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Email</label>
            <input type="email" required value={email} onChange={e=>setEmail(e.target.value)} className="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors" placeholder="you@email.com" />
          </div>
          <div>
            <label className="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Password</label>
            <input type="password" required value={password} onChange={e=>setPassword(e.target.value)} className="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors" placeholder="Min 8 characters" />
          </div>
          <div>
            <label className="block text-xs font-mono text-ultra-sub uppercase tracking-widest mb-2">Confirm Password</label>
            <input type="password" required value={password2} onChange={e=>setPassword2(e.target.value)} className="w-full bg-ultra-surface border border-ultra-border rounded-xl px-4 py-3 text-sm text-ultra-text focus:outline-none focus:border-ultra-cyan transition-colors" placeholder="Repeat password" />
          </div>
          <button disabled={loading} className="w-full py-4 bg-gradient-to-r from-ultra-cyan to-ultra-violet text-white font-display font-bold rounded-xl text-sm hover:opacity-90 transition-opacity">
            {loading ? 'Creating…' : 'Create My Account →'}
          </button>
        </form>
        <p className="text-center text-ultra-sub text-sm mt-6">Already have an account? <a href="/login" className="text-ultra-cyan hover:underline">Sign in</a></p>
      </div>
    </div>
  )
}
