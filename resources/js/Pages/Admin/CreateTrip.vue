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
    "KD_ABJ",
    "KD_KN",
    "KD_LAG",
    "ABJ_KD",
    "ABJ_KN",
    "ABJ_LAG",
    "KN_KD",
    "KN_ABJ",
    "KN_LAG",
    "LAG_KD",
    "LAG_KN",
    "LAG_ABJ",
    "LAG_IBD",
    "LAG_WAR",
    "WAR_IBD",
    "WAR_LAG",
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
            class="flex flex-wrap justify-center items-center py-4 px-4 m-auto w-full min-h-screen rounded-md bg-yellow-50/10">
            <div class="p-8 shadow-2xl bg-green-50/30 lg:w-[50rem]">
                <form @submit.prevent="createTrip">
                    <h3 class="mb-8 text-xl font-semibold text-center">
                        Create Trip
                    </h3>
                    <div class="flex flex-wrap gap-5 justify-center m-auto lg:gap-10 lg:justify-between text-slate-900">
                        <div class="w-[12rem]">
                            <label for="title">Title:</label>
                            <select
                                class="py-1 px-2 w-full rounded-md border-green-200 focus:border-none focus:ring-0 bg-yellow-50/50 h-[1.7rem] focus:outline-green-500"
                                name="title" id="title" v-model="form.title">
                                <option value="title" disbaled>Title</option>
                                <option class="py-2 bg-green-50 rounded-md" v-for="title in titles" :key="title"
                                    :value="title">
                                    {{ title }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="source">Source:</label>
                            <select
                                class="py-1 px-2 w-full rounded-md border-green-200 focus:border-none focus:ring-0 bg-yellow-50/50 h-[1.7rem] focus:outline-green-500"
                                name="source" id="source" v-model="form.source">
                                <option class="py-2 bg-green-50 rounded-md" v-for="source in sources" :key="source"
                                    :value="source">
                                    {{ source }}
                                </option>
                            </select>
                        </div>
                        <div class="w-[12rem]">
                            <label for="destination">Destination:</label>
                            <select
                                class="py-1 px-2 w-full rounded-md border-green-200 focus:border-none focus:ring-0 bg-yellow-50/50 h-[1.7rem] focus:outline-green-500"
                                name="destination" id="destination" v-model="form.destination">
                                <option class="py-2 bg-green-50 rounded-md" v-for="destination in destinations"
                                    :key="destination" :value="destination">
                                    {{ destination }}
                                </option>
                            </select>
                        </div>
                        <div class="w-[12rem]">
                            <label class="py-1 text-sm font-medium" for="title">Seats:</label>
                            <input type="number"
                                class="w-full rounded-md border-green-200 focus:border-none focus:ring-0 h-[1.8rem] bg-yellow-50/50 focus:outline-green-500"
                                v-model="form.seats" required />
                        </div>
                        <div class="w-[12rem]">
                            <label class="py-1 text-sm font-medium" for="title">Departure Time:</label>
                            <input type="time"
                                class="w-full rounded-md border-green-200 focus:border-none focus:ring-0 h-[1.8rem] bg-yellow-50/50 focus:outline-green-500"
                                v-model="form.departure_time" required />
                        </div>

                        <div class="w-[12rem]">
                            <label class="py-1 text-sm font-medium" for="title">Arrival Time:</label>
                            <input type="time"
                                class="w-full rounded-md border-green-200 focus:border-none focus:ring-0 h-[1.8rem] bg-yellow-50/50 focus:outline-green-500"
                                v-model="form.arrival_time" required />
                        </div>
                        <div class="w-[12rem]">
                            <label class="py-1 text-sm font-medium" for="title">Date:</label>
                            <input type="date"
                                class="w-full rounded-md border-green-200 focus:border-none focus:ring-0 h-[1.8rem] bg-yellow-50/50 focus:outline-green-500"
                                v-model="form.date" required />
                        </div>
                        <div class="max-md:w-[12rem] lg:max-w-[64%]">
                            <label class="py-1 px-2 text-sm font-medium" for="title">Select Coaches:</label>
                            <SelectButton class="flex flex-wrap gap-2 w-full bg-yellow-50/50" v-model="form.coaches"
                                :options="coaches" optionLabel="coach_name" multiple aria-labelledby="multiple" />
                            <!-- <Multiselect v-model="form.coaches" :options="coaches"></Multiselect> -->
                        </div>

                        <!-- <div class="w-[22rem]"> -->
                        <!--                            <label for="coaches">Select Coaches:</label> -->
                        <!--                            <select -->
                        <!--                                multiple -->
                        <!--                                class="py-1 px-2 w-full rounded-md border-green-200 focus:border-none focus:ring-0 bg-yellow-50/50 h-[1.7rem] focus:outline-green-500" -->
                        <!--                                name="coaches[]" -->
                        <!--                                id="coaches" -->
                        <!--                                v-model="form.coaches" -->
                        <!--                            > -->
                        <!--                                <option -->
                        <!--                                    class="py-2 bg-green-50 rounded-md" -->
                        <!--                                    v-for="coach in coaches" -->
                        <!--                                    :key="coach.id" -->
                        <!--                                    :value="coach.id" -->
                        <!--                                > -->
                        <!--                                    {{ coach.coach_name }} -->
                        <!--                                </option> -->
                        <!--                            </select> -->
                        <!--                        </div> -->

                        <!-- <div class="w-[12rem]"> -->
                        <!--     <label class="py-1 text-sm font-medium" for="title">Ticket Type:</label> -->
                        <!--     <input -->
                        <!--         type="checkbox" -->
                        <!--         class="w-full rounded-md border-green-200 focus:border-none focus:ring-0 h-[1.8rem] bg-yellow-50/50 focus:outline-green-500" -->
                        <!--         v-model="form.tickettype" -->
                        <!--         required -->
                        <!--     /> -->
                        <!-- </div> -->
                    </div>

                    <div class="m-auto mt-8 w-[20rem]">
                        <Button>Create Trip</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
