import { ref, computed, reactive, watch } from 'vue'
import { api } from '@/api/api'
import type { AxiosRequestConfig } from 'axios'
import { getToken } from '@/api/token'

export const useFetch = <T>(url: string, config: AxiosRequestConfig) => {
  const data = ref<T | null>(null)
  const response = ref<any | null>(null)
  const error = ref<any | null>(null)
  const loading = ref<boolean>(false)

  const fetch = async () => {
    loading.value = true
    try {
      if (config.method?.toLowerCase() !== 'get') {
        await getToken()
      }
      const result = await api.request({
        url,
        ...config
      })
      response.value = result
      data.value = await result.data.data
    } catch (err: any) {
      console.error(err)
      error.value = err.response.data
    } finally {
      loading.value = false
    }
  }

  fetch()

  return { response, error, data, loading, fetch }
}
