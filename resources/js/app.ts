import "./bootstrap";
import { createApp } from "vue";
import { createPinia } from 'pinia'
import router from "./router";
import "./assets/index.scss"
import App from "./App.vue";
const app = createApp(App);
app.use(createPinia())
app.use(router);
app.mount("#app");
