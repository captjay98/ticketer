<script setup>
import Tickettype from "./Tickettype.vue";
const { trip } = defineProps({
    trip: Object,
});
</script>
<template>
    <div class="flex flex-wrap justify-center gap-5 md:w-[40rem]">
        <Tickettype v-for="tickettype in trip.tickettypes" :trip="trip" :tickettype="tickettype" />
    </div>
</template>
