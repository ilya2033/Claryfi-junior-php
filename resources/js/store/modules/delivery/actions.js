import deliveryService from "../../../services/delivery";
import * as actions from "./types/actions";
import * as mutations from "./types/mutations";

export default {
    [actions.FETCH_ALL_COMPANIES]: async ({ commit }) => {
        try {
            const companies = await deliveryService.fetchAllCompanies();
            commit(mutations.SET_COMPANIES, companies);
            return companies;
        } catch (error) {
            return await Promise.reject(err.response);
        }
    },

    [actions.CLEAR_COMPANIES]: async ({ commit }) => {
        commit(mutations.SET_COMPANIES, []);
    },

    [actions.CALCULATE_DELIVERY_COST]: async ({ commit }, delivery) => {
        if (!delivery) {
            return;
        }
        try {
            await deliveryService.calculateDeliveyCost(delivery);
            const categories = await categoryService.fetchAllCategories();
            commit(mutations.SET_CATEGORIES, categories);
        } catch (error) {
            return await Promise.reject(err.response);
        }
    },
};
