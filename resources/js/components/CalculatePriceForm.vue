<template>
    <v-form v-model="valid" ref="form" lazy-validation>
        <v-container>
            <v-sheet class="w-50 mx-auto">
                <v-select
                    label="Company"
                    :items="companyList"
                    v-model="form.company"
                    item-title="name"
                    item-value="id"
                    class="mb-3"
                    return-object
                    required
                    clearable
                ></v-select>
                <v-text-field
                    :error="v$.form.weight.$error"
                    :error-messages="formErrors.weight || []"
                    label="Weight"
                    v-model="form.weight"
                    class="mb-3"
                    required
                ></v-text-field>

                <v-btn color="success" class="me-4 mb-3" @click="submit">
                    calculate price
                </v-btn>
                <v-alert
                    color="info"
                    title="Delivery price:"
                    :text="deliveryPriceString"
                    v-if="deliveryPriceString"
                >
                </v-alert>
            </v-sheet>
        </v-container>
        <v-overlay
            contained
            class="align-center justify-center"
            v-model="loading"
        >
            <v-progress-circular
                color="primary"
                indeterminate
                size="64"
            ></v-progress-circular
        ></v-overlay>
    </v-form>
</template>

<script>
import { useVuelidate } from "@vuelidate/core";
import { required, minValue, maxValue } from "@vuelidate/validators";
import { ERROR_SNACKBAR } from "../store/modules/snackbar/types/actions";
import { mapActions } from "vuex";
import {
    CALCULATE_DELIVERY_PRICE,
    FETCH_ALL_COMPANIES,
} from "../store/modules/company/types/actions";

export default {
    setup() {
        return { v$: useVuelidate({ $autoDirty: true, $lazy: true }) };
    },
    validations() {
        return {
            form: {
                weight: {
                    required,
                    min: minValue(1),
                    max: maxValue(1000),
                },
            },
        };
    },
    data() {
        return {
            loading: false,
            valid: false,
            form: {
                weight: null,
                company: null,
            },
        };
    },
    computed: {
        companyList() {
            return this.$store.state.company.companies || [];
        },
        deliveryPrice() {
            return this.$store.state.company.deliveryPrice || null;
        },
        deliveryPriceString() {
            if (!this.deliveryPrice) {
                return "";
            }
            return (
                this.deliveryPrice.price + this.deliveryPrice.currency.symbol
            );
        },
        formErrors() {
            let errors = {};
            this.v$.$errors.forEach(
                (error) => (errors[error.$property] = error.$message)
            );
            return errors;
        },
    },

    methods: {
        ...mapActions("company", {
            getCompanies: FETCH_ALL_COMPANIES,
        }),
        ...mapActions("snackbar", {
            errorSnackbar: ERROR_SNACKBAR,
        }),
        ...mapActions("company", {
            calculateDeliveryPrice: CALCULATE_DELIVERY_PRICE,
        }),

        async submit() {
            const valid = await this.v$.$validate();

            if (valid) {
                this.loading = true;

                let formData = {};
                formData["companyId"] = this.form.company.id;
                formData["weight"] = this.form.weight;
                this.calculateDeliveryPrice(formData)
                    .catch((err) => this.errorSnackbar("Error"))
                    .finally(() => {
                        this.loading = false;
                    });
            }
        },
    },
    watch: {
        companyList(newValue) {
            if (newValue.length) {
                this.form.company = newValue[0];
            }
        },
    },

    mounted() {
        this.getCompanies();
    },
};
</script>
