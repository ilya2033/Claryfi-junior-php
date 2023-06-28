import * as actions from "./types/actions";

export default {
    [actions.SUCCESS_SNACKBAR]: async ({ commit }, message) => {
        commit("SET_SNACKBAR", {
            active: true,
            color: "success",
            message,
        });
    },
    [actions.ERROR_SNACKBAR]: async ({ commit }, message) => {
        console.log(message);
        commit("SET_SNACKBAR", {
            active: true,
            color: "error",
            message,
        });
    },
};
