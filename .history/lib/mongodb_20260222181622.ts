import { MongoClient } from 'mongodb'

const uri = process.env.MONGODB_URI || process.env.MONGO_URI || ''

let clientPromise: Promise<MongoClient> | undefined

export async function getClient() {
  if (!uri) throw new Error('Missing MONGODB_URI')
  if (!clientPromise) clientPromise = new MongoClient(uri).connect()
  return clientPromise
}

export async function getDb(dbName = process.env.MONGODB_DB || 'ultrawallet') {
  const c = await getClient()
  return c.db(dbName)
}
