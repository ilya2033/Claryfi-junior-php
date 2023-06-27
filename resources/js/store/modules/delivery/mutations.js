import * as mutations from "./types/mutations";

export default {
    [mutations.SET_COMPANIES]: (state, data) => {
        state.companies = data;
    },
};
