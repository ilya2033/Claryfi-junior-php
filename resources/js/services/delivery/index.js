import requestService from "../requestService.js";
const apiEndpoint = "/delivery";
const commentService = {
    async fetchAllCompanies() {
        const response = await requestService.get(apiEndpoint);
        return response?.data?.data;
    },

    async calculateDeliveyCost(category) {
        const response = await requestService.post(apiEndpoint, category);
        return response?.data?.data;
    },
};
export default commentService;
