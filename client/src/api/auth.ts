import axios from 'axios'

axios.defaults.withCredentials = true
axios.defaults.withXSRFToken = true
export const auth = axios.create({
  baseURL: import.meta.env.VITE_BASE_URL_API,
  withCredentials: true,
  withXSRFToken: true
})
