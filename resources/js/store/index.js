import { createStore } from "vuex";
import delivery from "./modules/delivery";

export const store = createStore({
    modules: {
        delivery,
    },
});
