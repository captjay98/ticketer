<script setup>
import { Link, Head } from "@inertiajs/vue3";
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const { coaches, trip } = defineProps({
    coaches: Object,
    trip: Object,
});
</script>
<template>
    <Head title="Select Coach" />
    <AuthenticatedLayout>
        <div></div>
        <div class="md:w-[80%] lg:w-[60%] xl:w-[50%] m-auto flex flex-col justify-center w-screen h-screen max-sm:mt-20">
            <h1 class="mt-24 mb-6 text-2xl text-center">Select a Coach</h1>
            <div class="flex overflow-auto flex-wrap gap-6 justify-center items-center py-">
                <div class="flex flex-col justify-center items-center rounded-md shadow-md transition-all duration-200 ease-in hover:font-medium hover:shadow-2xl w-[11rem] h-[9rem] bg-green-50/50 shadow-green-300/50 hover:bg-green-500/40 hover:shadow-green-500/50"
                    v-for="coach in coaches" :key="coach.id">
                    <Link :href="route('seats.all', {
                        trip_id: trip.id,
                        coach_id: coach.id,
                    })
                        ">
                    <div class="flex justify-start items-center">
                        <span class="text-sm">Coach Name: </span>
                        <h3 class="font-semibold pl-[2px]">
                            {{ coach.coach_name }}
                        </h3>
                    </div>
                    <div class="flex justify-start items-center">
                        <span class="text-sm"> Coach Class: </span>
                        <h3 class="font-semibold pl-[7px]">
                            {{ coach.coach_class }}
                        </h3>
                    </div>
                    <div class="flex justify-start items-center">
                        <span class="text-sm"> Total Seats: </span>
                        <h3 class="font-semibold pl-[15px]">
                            {{ coach.capacity }}
                        </h3>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
