export interface Product {
  id: number
  name: string
  image: string
  description: string
  price: number
  stock: number
  status: boolean
  category_id: number
  created_at: Date
  updated_at: Date
}
