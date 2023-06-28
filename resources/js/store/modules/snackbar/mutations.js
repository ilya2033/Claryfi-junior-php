import * as mutations from "./types/mutations";

export default {
    [mutations.SET_SNACKBAR]: (state, snackbar) => {
        state.snackbar = snackbar;
    },
};
