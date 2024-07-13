import { api } from './api'

export async function getCategories() {
  try {
    const res = await api.get('/categories')
    return res.data
  } catch (error) {
    console.error(error)
  }
}
