<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
const { ticket } = defineProps({
    ticket: Object,

});
console.log(ticket);
</script>

<template>
    <AuthenticatedLayout>
        <div class="flex flex-col justify-center items-center h-screen bg-yellow-50/50">
            <div class="py-4 px-2 mx-2 bg-white rounded-lg shadow-lg h-[24rem] w-[24rem]">
                <div class="py-4 w-full text-2xl font-semibold text-center">
                    HERE IS YOUR TICKET
                </div>

                <div class="flex gap-2 justify-between p-4">
                    <div class="flex flex-col justify-between w-1/2">
                        <div class="mb-1 text-lg font-bold">TICKET DETAILS</div>
                        <div class="">
                            <div class="flex justify-between my-1 text-sm">
                                <div class="w-1/3">Name:</div>
                                <div class="w-2/3 font-semibold">
                                    {{ ticket.user.first_name }}
                                    {{  ticket.user.last_name }}
                                </div>
                            </div>

                            <div class="flex justify-between my-1 text-sm">
                                <div class="w-1/3">From:</div>
                                <div class="w-2/3 font-semibold">
                                    {{  ticket.trip.source }}
                                </div>
                            </div>

                            <div class="flex justify-between my-1 text-sm">
                                <div class="w-1/3">To:</div>
                                <div class="w-2/3 font-semibold">
                                    {{  ticket.trip.destination }}
                                </div>
                            </div>

                            <div class="flex justify-between my-1 text-sm">
                                <div class="w-1/3">Class:</div>
                                <div class="w-2/3 font-semibold">
                                    {{  ticket.tickettype.seat_class }}
                                </div>
                            </div>

                            <div class="flex justify-between my-1 text-sm">
                                <div class="w-1/3">Date:</div>
                                <div class="w-2/3 font-semibold">
                                    {{  ticket.trip.date }}
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <div class="flex w-44 -between">
                                <div class="mr-8 w-8 text-sm text-center">
                                    Coach:
                                    <span class="font-bold">{{
                                         ticket.seat.coach.coach_name
                                    }}</span>
                                </div>
                                <div class="mr-4 w-8 text-sm text-center">
                                    Seat:
                                    <span class="font-bold">{{
                                         ticket.seat.seat_number
                                    }}</span>
                                </div>
                                <div class="mr-4 w-16 text-sm text-center">
                                    Departure:
                                    <span class="font-bold">{{
                                         ticket.trip.departure_time
                                    }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col justify-between items-center w-1/3">
                        <!-- Placeholder for QR code -->
                        <div class="bg-gray-300 rounded-md w-[5rem] h-[5rem]"></div>

                        <div class="mt-4 text-lg font-bold">INSTRUCTIONS</div>
                        <ol>
                            <li class="text-xs text-center">
                                Arrive at the station at least 30 minutes before
                                departure.
                            </li>
                            <li class="text-xs text-center">
                                Board the train according to your coach and seat
                                number.
                            </li>
                            <li class="text-xs text-center">
                                Have a safe journey!
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
