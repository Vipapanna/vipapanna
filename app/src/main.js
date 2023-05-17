import './assets/tailwind.css'
import { createApp } from 'vue'
import App from './App.vue'
import router from './router'
import store from './store'
import PrimeVue from 'primevue/config';

import "primevue/resources/themes/lara-light-indigo/theme.css";     
import "primevue/resources/primevue.min.css";

const app = createApp(App)
    .use(router)
    .use(store)
    .use(PrimeVue)

router.isReady().then(() => {
    app.mount('#app')
})