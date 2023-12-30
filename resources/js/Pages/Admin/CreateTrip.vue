<script setup>
import Multiselect from "vue-multiselect";
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";
import SelectButton from "primevue/selectbutton";

const { coaches } = defineProps({
    coaches: Object,
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
    coaches: [],
});

const titles = [
    "KD-ABJ",
    "KD-KN",
    "KD-LAG",
    "ABJ-KD",
    "ABJ-KN",
    "ABJ-LAG",
    "KN-KD",
    "KN-ABJ",
    "KN-LAG",
    "LAG-KD",
    "LAG-KN",
    "LAG-ABJ",
    "LAG-IBD",
    "LAG-WAR",
    "WAR-IBD",
    "WAR-LAG",
];

const sources = ["Abuja", "Kaduna", "Kano", "Lagos", "Warri", "Ibadan"];

const destinations = ["Abuja", "Kaduna", "Kano", "Lagos", "Warri", "Ibadan"];

const createTrip = () => {
    form.post(route("admin.trips.create"));
};
</script>
<template>
    <AdminLayout>
        <div
            class="min-h-screen flex flex-wrap justify-center items-center w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10"
        >
            <div class="p-8 shadow-2xl bg-green-50/30 lg:w-[50rem]">
                <form @submit.prevent="createTrip">
                    <h3 class="text-xl font-semibold text-center mb-8">Create Trip</h3>
                    <div
                        class="text-slate-900 flex flex-wrap m-auto gap-5 lg:gap-10 lg:justify-between justify-center"
                    >
                        <div class="w-[12rem]">
                            <label for="title">Title:</label>
                            <select
                                class="bg-yellow-50/50 rounded-md w-full px-2 py-1 h-[1.7rem] border-green-200 focus:outline-green-500 focus:border-none focus:ring-0"
                                name="title"
                                id="title"
                                v-model="form.title"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="title in titles"
                                    :key="title"
                                    :value="title"
                                >
                                    {{ title }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="source">Source:</label>
                            <select
                                class="bg-yellow-50/50 rounded-md w-full px-2 py-1 h-[1.7rem] border-green-200 focus:outline-green-500 focus:border-none focus:ring-0"
                                name="source"
                                id="source"
                                v-model="form.source"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="source in sources"
                                    :key="source"
                                    :value="source"
                                >
                                    {{ source }}
                                </option>
                            </select>
                        </div>
                        <div class="w-[12rem]">
                            <label for="destination">Destination:</label>
                            <select
                                class="bg-yellow-50/50 rounded-md w-full px-2 py-1 h-[1.7rem] border-green-200 focus:outline-green-500 focus:border-none focus:ring-0"
                                name="destination"
                                id="destination"
                                v-model="form.destination"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="destination in destinations"
                                    :key="destination"
                                    :value="destination"
                                >
                                    {{ destination }}
                                </option>
                            </select>
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Seats:</label>
                            <input
                                type="number"
                                class="w-full h-[1.8rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.seats"
                                required
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title"
                                >Departure Time:</label
                            >
                            <input
                                type="time"
                                class="w-full h-[1.8rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.departure_time"
                                required
                            />
                        </div>

                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title"
                                >Arrival Time:</label
                            >
                            <input
                                type="time"
                                class="w-full h-[1.8rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.arrival_time"
                                required
                            />
                        </div>
                        <div class="w-[12rem]">
                            <label class="text-sm py-1 font-medium" for="title">Date:</label>
                            <input
                                type="date"
                                class="w-full h-[1.8rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0"
                                v-model="form.date"
                                required
                            />
                        </div>
                        <div class="max-md:w-[12rem] lg:max-w-[64%]">
                            <label class="text-sm py-1 px-2 font-medium" for="title"
                                >Select Coaches:</label
                            >
                            <SelectButton
                                class="flex w-full gap-2 flex-wrap bg-yellow-50/50"
                                v-model="form.coaches"
                                :options="coaches"
                                optionLabel="coach_name"
                                multiple
                                aria-labelledby="multiple"
                            />
                            <!-- <Multiselect v-model="form.coaches" :options="coaches"></Multiselect> -->
                        </div>

                        <!-- <div class="w-[22rem]"> -->
                        <!--                            <label for="coaches">Select Coaches:</label> -->
                        <!--                            <select -->
                        <!--                                multiple -->
                        <!--                                class="bg-yellow-50/50 rounded-md w-full px-2 py-1 h-[1.7rem] border-green-200 focus:outline-green-500 focus:border-none focus:ring-0" -->
                        <!--                                name="coaches[]" -->
                        <!--                                id="coaches" -->
                        <!--                                v-model="form.coaches" -->
                        <!--                            > -->
                        <!--                                <option -->
                        <!--                                    class="bg-green-50 rounded-md py-2" -->
                        <!--                                    v-for="coach in coaches" -->
                        <!--                                    :key="coach.id" -->
                        <!--                                    :value="coach.id" -->
                        <!--                                > -->
                        <!--                                    {{ coach.coach_name }} -->
                        <!--                                </option> -->
                        <!--                            </select> -->
                        <!--                        </div> -->

                        <!-- <div class="w-[12rem]"> -->
                        <!--     <label class="text-sm py-1 font-medium" for="title">Ticket Type:</label> -->
                        <!--     <input -->
                        <!--         type="checkbox" -->
                        <!--         class="w-full h-[1.8rem] bg-yellow-50/50 border-green-200 rounded-md focus:border-none focus:outline-green-500 focus:ring-0" -->
                        <!--         v-model="form.tickettype" -->
                        <!--         required -->
                        <!--     /> -->
                        <!-- </div> -->
                    </div>

                    <div class="w-[20rem] m-auto mt-8">
                        <Button>Create Trip</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
