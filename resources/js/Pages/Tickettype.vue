<script setup>
import { Link } from "@inertiajs/vue3";
const { trip, tickettype } = defineProps({
    trip: Object,
    tickettype: Object,
});
</script>
<template>
    <Link :href="route('coaches.all', [trip.id, tickettype.seat_class])">
        <div
            class="w-[9rem] h-[9rem] rounded-md shadow-md flex flex-col justify-center items-center bg-yellow-50/50 active:bg-yellow-100/90 hover:bg-yellow-100/50 hover:shadow-2xl hover:shadow-yellow-500/50 hover:font-medium shadow-yellow-500/30 transition-all ease-in duration-300"
        >
            <h3>{{ tickettype.seat_class }}</h3>
            <h3 class="text-sm">NGN{{ tickettype.price }}</h3>
        </div>
    </Link>
</template>
