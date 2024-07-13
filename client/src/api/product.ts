import { api } from './api'

export async function getLatestProducts() {
  try {
    const res = await api.get('/products/latest')

    return res.data
  } catch (error) {
    console.error(error)
  }
}
