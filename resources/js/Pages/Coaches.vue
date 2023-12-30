<script setup>
import { Link } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
const { coaches, trip } = defineProps({
    coaches: Object,
    trip: Object,
});
console.log(coaches);
</script>
<template>
    <GuestLayout>
        <div></div>
        <div
            class="bg-yellow-50/50 w-screen h-screen flex flex-col justify-center items-center py-4"
        >
            <h3 class="text-2xl font-medium">Select Coach</h3>
            <div
                class="bg-green-50/50 rounded-md grid grid-cols-3 max-sm:grid-cols-2 m-auto gap-2 px-2 py-8"
            >
                <div
                    class="w-[11rem] h-[9rem] rounded-md shadow-md flex flex-col justify-center items-center bg-green-50/50 hover:bg-green-500/40 hover:shadow-2xl hover:shadow-green-500/50 hover:font-medium shadow-green-300/50 transition-all ease-in duration-200"
                    v-for="coach in coaches"
                >
                    <Link :href="route('seats.all', { trip_id: trip.id, coach_id: coach.id })">
                        <div class="flex justify-start items-center">
                            <span class="text-sm">Coach Name: </span>
                            <h3 class="font-medium">&nbsp{{ coach.coach_name }}</h3>
                        </div>
                        <div class="flex justify-start items-center">
                            <span class="text-sm"> Coach Class: </span>
                            <h3 class="font-medium">&nbsp&nbsp{{ coach.coach_class }}</h3>
                        </div>
                        <div class="flex justify-start items-center">
                            <span class="text-sm"> Total Seats: </span>
                            <h3 class="font-medium">&nbsp&nbsp&nbsp&nbsp{{ coach.capacity }}</h3>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
