import * as mutations from "./types/mutations";

export default {
    [mutations.SET_COMPANIES]: (state, data) => {
        state.companies = data;
    },
    [mutations.SET_DELIVERY_PRICE]: (state, data) => {
        state.deliveryPrice = data;
    },
};
