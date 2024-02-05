<script setup>
import { Link } from "@inertiajs/vue3";
const { trip, ticket_type } = defineProps({
    trip: Object,
    ticket_type: Object,
});
</script>
<template>
    <Link :href="route('coaches.all', [trip.id, ticket_type.seat_class])">
    <div
        class="flex flex-col justify-center items-center rounded-md shadow-md transition-all duration-300 ease-in hover:font-medium hover:shadow-2xl w-[9rem] h-[9rem] bg-yellow-50/50 shadow-yellow-500/30 hover:bg-yellow-100/50 hover:shadow-yellow-500/50 active:bg-yellow-100/90">
        <h3>{{ ticket_type.seat_class }}</h3>
        <h3 class="text-sm font-semibold">NGN{{ ticket_type.price }}</h3>
    </div>
    </Link>
</template>
