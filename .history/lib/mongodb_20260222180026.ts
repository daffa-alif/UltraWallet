import { MongoClient } from 'mongodb'

const uri = process.env.MONGODB_URI || process.env.MONGO_URI || ''
if (!uri) {
  // leave empty; API routes will throw if used without URI
}

let client: MongoClient | null = null
let clientPromise: Promise<MongoClient> | null = null

export async function getClient() {
  if (!uri) throw new Error('Missing MONGODB_URI')
  if (client && client.topology?.isConnected()) return client
  if (!clientPromise) {
    client = new MongoClient(uri)
    clientPromise = client.connect()
  }
  client = await clientPromise
  return client
}

export async function getDb(dbName = process.env.MONGODB_DB || 'ultrawallet') {
  const c = await getClient()
  return c.db(dbName)
}
