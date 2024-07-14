import { ref, computed, reactive } from 'vue'
import { api } from '@/api/api'
import type { AxiosRequestConfig } from 'axios'

export const useFetch = <T>(url: string, config: AxiosRequestConfig) => {
  const data = ref<T | null>(null)
  const response = ref<any | null>(null)
  const error = ref<any | null>(null)
  const loading = ref<boolean>(false)

  const fetch = async () => {
    loading.value = true
    try {
      const result = await api.request({
        url,
        ...config
      })
      response.value = result
      data.value = result.data.data
    } catch (err) {
      console.error(err)
      error.value = err
    } finally {
      loading.value = false
    }
  }

  fetch()

  return { response, error, data, loading, fetch }
}
