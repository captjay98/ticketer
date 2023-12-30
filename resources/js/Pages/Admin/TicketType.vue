<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { tickettype } = defineProps({
    tickettype: Object,
});

const form = useForm({
    seat_class: "",
    price: "",
    trip: "",
});

const seat_classes = ["Economy", "Business"];
const prices = ["4000", "5000", "6000", "7000", "8000", "9000", "10000"];

const updateTicketType = () => {
    form.patch(route("admin.tickettypes.create"));
};
</script>
<template>
    <AdminLayout>
        <div
            class="min-h-screen flex flex-wrap justify-center items-center w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10"
        >
            <div class="p-10 shadow-2xl bg-green-50/30">
                <form @submit.prevent="updateTicketType">
                    <h3 class="text-xl font-semibold text-center mb-8">Ticket Type Details</h3>
                    <div class="text-slate-900 flex flex-wrap m-auto gap-5 justify-between">
                        <div class="w-[12rem]">
                            <label for="seat_class">Class:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="seat_class"
                                id="seat_class"
                                v-model="form.seat_class"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="seat_class in seat_classes"
                                    :key="seat_class"
                                    :value="seat_class"
                                >
                                    {{ seat_class }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="seat_class">Price:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="price"
                                id="price"
                                v-model="form.price"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="price in prices"
                                    :key="price"
                                    :value="price"
                                >
                                    {{ price }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="seat_class">Trip:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="price"
                                id="price"
                                v-model="form.trip"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="trip in trips"
                                    :key="trip"
                                    :value="trip.id"
                                >
                                    {{ trip.title }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="w-[20rem] m-auto mt-8">
                        <Button>Update Ticket Type</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
