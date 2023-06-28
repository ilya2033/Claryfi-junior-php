import companyService from "../../../services/company";
import * as actions from "./types/actions";
import * as mutations from "./types/mutations";

export default {
    [actions.FETCH_ALL_COMPANIES]: async ({ commit }) => {
        try {
            const companies = await companyService.fetchAllCompanies();
            commit(mutations.SET_COMPANIES, companies);
            return companies;
        } catch (error) {
            return await Promise.reject(err.response);
        }
    },

    [actions.CLEAR_COMPANIES]: async ({ commit }) => {
        commit(mutations.SET_COMPANIES, []);
    },

    [actions.CALCULATE_DELIVERY_PRICE]: async (
        { commit },
        { companyId, weight }
    ) => {
        if (!companyId || !weight) {
            return;
        }

        try {
            const price = await companyService.calculateDeliveyPrice({
                companyId,
                weight,
            });
            commit(mutations.SET_DELIVERY_PRICE, price);
        } catch (error) {
            commit(mutations.SET_DELIVERY_PRICE, null);
            return await Promise.reject(err.response);
        }
    },
};
