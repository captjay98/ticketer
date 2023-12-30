<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link, useForm } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const form = useForm({
    coach_name: "",
    coach_class: "",
    capacity: "",
    is_active: "",
});

const coach_names = [
    "ECO10",
    "ECO20",
    "ECO30",
    "ECO40",
    "ECO50",
    "ECO60",
    "ECO70",
    "BUS80",
    "BUS90",
    "BUS100",
];
const classes = ["economy", "business"];
const capacities = [25, 50];
const coachStates = [true, false];

const createCoach = () => {
    form.post(route("admin.coaches.create"));
};
</script>
<template>
    <AdminLayout>
        <div
            class="min-h-screen flex flex-wrap justify-center items-center w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10"
        >
            <div class="p-10 shadow-2xl bg-green-50/30">
                <form @submit.prevent="createCoach">
                    <h3 class="text-xl font-semibold text-center mb-8">Create Coach</h3>
                    <div class="text-slate-900 flex flex-wrap m-auto gap-5 justify-between">
                        <div class="w-[12rem]">
                            <label for="name">Coach Name:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="coach_name"
                                id="coach_name"
                                v-model="form.coach_name"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="coach_name in coach_names"
                                    :key="coach_name"
                                    :value="coach_name"
                                >
                                    {{ coach_name }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="name">Class:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="class"
                                id="class"
                                v-model="form.coach_class"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="coach_class in classes"
                                    :key="coach_class"
                                    :value="coach_class"
                                >
                                    {{ coach_class }}
                                </option>
                            </select>
                        </div>

                        <div class="w-[12rem]">
                            <label for="">Capacity:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="capacity"
                                id="capacity"
                                v-model="form.capacity"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="capacity in capacities"
                                    :key="capacity"
                                    :value="capacity"
                                >
                                    {{ capacity }}
                                </option>
                            </select>
                        </div>
                        <div class="w-[12rem]">
                            <label for="">Coach Active?:</label>
                            <select
                                class="bg-yellow-50 rounded-md w-full px-2 py-1 h-[2.0rem] focus:outline-green-500 focus:border-none focus:ring-0"
                                name="is_active"
                                id="is_active"
                                v-model="form.is_active"
                            >
                                <option
                                    class="bg-green-50 rounded-md py-2"
                                    v-for="coachState in coachStates"
                                    :key="coachState"
                                    :value="coachState"
                                >
                                    {{ coachState }}
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="w-[20rem] m-auto mt-8">
                        <Button>Create Coach</Button>
                    </div>
                </form>
            </div>
        </div>
    </AdminLayout>
</template>
