import "./bootstrap";
import App from "./layouts/App.vue";
import { store } from "./store";

import { createApp } from "vue";
import { vuetify } from "./plugins/vuetify";
const app = createApp(App, { vuetify });

app.use(vuetify);
app.use(store);
app.mount("#app");
