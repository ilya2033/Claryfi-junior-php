import { createStore } from "vuex";
import company from "./modules/company";
import snackbar from "./modules/snackbar";

export const store = createStore({
    modules: {
        company,
        snackbar,
    },
});
