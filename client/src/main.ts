import './assets/main.css'

import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import PrimeVue from 'primevue/config'
import Lara from '@/presets'

const app = createApp(App)
app
  .use(PrimeVue, {
    unstyled: true,
    pt: Lara
  })
  .use(router)
  .mount('#app')
