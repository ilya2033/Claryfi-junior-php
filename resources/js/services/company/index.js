import requestService from "../requestService.js";
const apiEndpoint = "/company";
const deliveryService = {
    async fetchAllCompanies() {
        const response = await requestService.get(apiEndpoint);
        return response?.data?.data;
    },

    async calculateDeliveyPrice({ companyId, weight }) {
        const response = await requestService.post(apiEndpoint + "/price", {
            company_id: companyId,
            weight,
        });

        return response?.data?.data;
    },
};
export default deliveryService;
