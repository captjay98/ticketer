<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { ticket_type } = defineProps({
    ticket_type: Object,
});

const form = useForm({
    seat_class: "",
    price: "",
    trip: "",
});

const seat_classes = ["Economy", "Business"];
const prices = ["4000", "5000", "6000", "7000", "8000", "9000", "10000"];

const updateticket_type = () => {
    form.patch(route("admin.ticket_types.create"));
};
</script>
<template>
    <AdminLayout>
        <div
            class="flex flex-wrap justify-center items-center py-4 px-4 m-auto w-full min-h-screen rounded-md bg-yellow-50/10">
            <div class="p-10 shadow-2xl bg-green-50/30">
                <form @submit.prevent="updatetTicketType">
                    <h3 class="mb-8 text-xl font-semibold text-center">
                        Ticket Type Details
                    </h3>
                    <div class="flex flex-wrap gap-5 justify-between m-auto text-slate-900">
                        <div class="w-[12rem]">
                            <label for="seat_class">Class:</label>
                            <select
                                class="py-1 px-2 w-full bg-yellow-50 rounded-md focus:border-none focus:ring-0 h-[2.0rem] focus:outline-green-500"
                                name="seat_class" id="seat_class" v-model="form.seat_class">
                                <option class="py-2 bg-green-50 rounded-md" v-for="seat_class in seat_classes"
                                    :key="seat_class" :value="seat_class">
                                    {{ seat_class }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="seat_class">Price:</label>
                            <select
                                class="py-1 px-2 w-full bg-yellow-50 rounded-md focus:border-none focus:ring-0 h-[2.0rem] focus:outline-green-500"
                                name="price" id="price" v-model="form.price">
                                <option class="py-2 bg-green-50 rounded-md" v-for="price in prices" :key="price"
                                    :value="price">
                                    {{ price }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="seat_class">Trip:</label>
                            <select
                                class="py-1 px-2 w-full bg-yellow-50 rounded-md focus:border-none focus:ring-0 h-[2.0rem] focus:outline-green-500"
                                name="price" id="price" v-model="form.trip">
                                <option class="py-2 bg-green-50 rounded-md" v-for="trip in trips" :key="trip"
                                    :value="trip.id">
                                    {{ trip.title }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="m-auto mt-8 w-[20rem]">
                        <Button>Update Ticket Type</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
