<script setup>
import TicketType from "./TicketType.vue";
const { trip } = defineProps({
    trip: Object,
});

</script>
<template>
    <div class="flex flex-wrap justify-center gap-5 md:w-[40rem]">
        <TicketType v-for="ticket_type in trip.ticket_types" :key="ticket_type.id" :trip="trip"
            :ticket_type="ticket_type" />
    </div>
</template>
