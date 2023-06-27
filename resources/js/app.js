import "./bootstrap";
import App from "./layouts/App.vue";

import { createApp } from "vue";
import { vuetify } from "./plugins/vuetify";
const app = createApp(App, { vuetify });

app.use(vuetify);
app.mount("#app");
