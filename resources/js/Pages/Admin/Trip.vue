<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { trip } = defineProps({
    trip: Object,
});

const form = useForm({
    title: "",
    source: "",
    destination: "",
    // 'ticket_type',
    seats: "",
    date: "",
    departure_time: "",
    arrival_time: "",
});

const updateTrip = () => {
    form.patch(route("admin.trips.update"));
};
</script>
<template>
    <AdminLayout>
        <div
            class="min-h-screen flex flex-wrap justify-center items-center w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10"
        >
            <div class="p-8 shadow-2xl">
                <form @submit.prevent="updateTrip">
                    <h3 class="text-xl font-semibold text-center mb-8">Trip Details</h3>
                    <div
                        class="text-slate-900 flex flex-wrap lg:w-[40%] m-auto gap-5 justify-between"
                    >
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Title:</label>
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.title"
                                :placeholder="trip.title"
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Source:</label>
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.source"
                                :placeholder="trip.source"
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Destination:</label>
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.destination"
                                :placeholder="trip.destination"
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Seats:</label>
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.seats"
                                :placeholder="trip.seats"
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Date:</label>
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.date"
                                :placeholder="trip.date"
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title"
                                >Departure Time:</label
                            >
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.departure_time"
                                :placeholder="trip.departure_time"
                            />
                        </div>

                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title"
                                >Arrival Time:</label
                            >
                            <input
                                type="text"
                                class="w-full h-[1.7rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.arrival_time"
                                :placeholder="trip.arrival_time"
                            />
                        </div>
                    </div>
                    <div class="w-[20rem] m-auto mt-8">
                        <Button>Update Trip</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
