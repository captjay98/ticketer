<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { tickets } = defineProps({
    tickets: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="py-4 px-4 m-auto w-full rounded-md bg-yellow-50/10">
            <div class="py-2 px-2 m-auto mt-1 mb-2 w-full rounded-md">
                <h1 class="py-4 text-2xl font-semibold tracking-wide text-center">
                    All tickets
                </h1>
                <!-- <Link :href="route('admin.tickets.showcreate')"><p>Create ticket</p></Link> -->
            </div>
            <div v-show="tickets.length < 1">
                <h1 class="pb-4 text-xl font-semibold text-center">
                    No Issued Tickets
                </h1>
            </div>
            <div class="overflow-auto py-1 m-auto w-full min-h-screen rounded-lg">
                <table class="min-w-full rounded-md divide-y divide-solid divide-green-50/300">
                    <thead class="text-left rounded-lg bg-gray-200/40 text-[13px]">
                        <tr class="text-left border-inherit">
                            <th class="py-2 px-2 text-center text-blue-800">
                                ID
                            </th>
                            <th class="py-2 px-2">Trip</th>
                            <th class="py-2 px-2">Trip Date</th>
                            <th class="py-2 px-2">Ticket Type</th>
                            <th class="py-2 px-2">Seat</th>
                            <th class="py-2 px-2">Serial</th>
                            <th class="py-2 px-2">Expiry Date</th>
                            <th class="py-2 px-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="rounded-lg divide-solid bg-green-50/30">
                        <tr :key="ticket.id" v-for="ticket in tickets" class="rounded-md text-[12px] odd:bg-gray-200/40">
                            <td class="py-2 px-2 font-bold text-center text-blue-800">
                                {{ console.log(ticket) }}
                                {{ ticket.id }}
                            </td>

                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                <Link class="" :href="route('admin.tickets.one', ticket.id)
                                    ">
                                {{ ticket.trip.title }}
                                </Link>
                            </td>

                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                {{ ticket.trip.date }}
                            </td>

                            <td class="overflow-hidden py-2 px-2 leading-5 min-w-[100px] max-w-[180px] -auto">
                                {{ ticket.ticket_type.seat_class }}
                            </td>
                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                {{ ticket.seat.seat_number }}
                            </td>
                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                {{ ticket.serial_number }}
                            </td>
                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                {{ ticket.expires_at }}
                            </td>

                            <td class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]">
                                {{ ticket.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
