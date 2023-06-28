<template>
    <v-app>
        <v-main>
            <v-container><CalculatePriceForm /> </v-container>
        </v-main>
        <v-snackbar
            v-model="snackbar.active"
            :timeout="4000"
            :color="snackbar.color"
            location="bottm right"
        >
            {{ snackbar.message }}
        </v-snackbar>
    </v-app>
</template>

<script>
import { mapState } from "vuex";
import CalculatePriceForm from "../components/CalculatePriceForm.vue";

export default {
    components: { CalculatePriceForm },

    computed: {
        ...mapState("snackbar", {
            snackbar: "snackbar",
        }),
    },
    components: { CalculatePriceForm },
};
</script>
