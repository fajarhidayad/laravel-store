import axios from 'axios'

const URL = import.meta.env.VITE_XSRF_TOKEN_URL

export async function getToken() {
  try {
    await axios.get(URL, {
      withCredentials: true,
      withXSRFToken: true
    })
  } catch (error) {
    console.error(error)
  }
}
