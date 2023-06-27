import requestService from "../requestService.js";
const apiEndpoint = "/delivery";
const deliveryService = {
    async fetchAllCompanies() {
        const response = await requestService.get(apiEndpoint);
        return response?.data?.data;
    },

    async calculateDeliveyCost(delivery) {
        const response = await requestService.post(apiEndpoint, delivery);
        return response?.data?.data;
    },
};
export default deliveryService;
