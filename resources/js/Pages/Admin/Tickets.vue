<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { tickets } = defineProps({
    tickets: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All tickets</h1>
                <!-- <Link :href="route('admin.tickets.showcreate')"><p>Create ticket</p></Link> -->
            </div>
            <div v-show="tickets.length < 1">
                <h1 class="text-xl font-semibold text-center pb-4">No Issued Tickets</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-green-50/300 divide-solid rounded-md">
                    <thead class="bg-gray-200/40 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-2 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">Trip</th>
                            <th class="px-2 py-2">Trip Date</th>
                            <th class="px-2 py-2">Ticket Type</th>
                            <th class="px-2 py-2">Seat</th>
                            <th class="px-2 py-2">Serial</th>
                            <th class="px-2 py-2">Expiry Date</th>
                            <th class="px-2 py-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-50/30 divide-solid rounded-lg">
                        <tr
                            v-for="ticket in tickets"
                            class="text-[12px] odd:bg-gray-200/40 rounded-md"
                        >
                            <td class="px-2 py-2 font-bold text-blue-800 text-center">
                                {{ ticket.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link class="" :href="route('admin.tickets.one', ticket.id)">
                                    {{ ticket.trip.title }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ ticket.trip.date }}
                            </td>

                            <td
                                class="px-2 py-2 min-w-[100px] max-w-[180px] -auto overflow-hidden leading-5"
                            >
                                {{ ticket.tickettype }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ ticket.seat }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ ticket.expirry_date }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ ticket.created_at }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ ticket.serial }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
