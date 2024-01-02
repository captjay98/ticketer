<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { bookings } = defineProps({
    bookings: Object,
});
console.log(bookings);
</script>
<template>
    <AdminLayout>
        <div class="py-4 px-4 m-auto w-full rounded-md bg-yellow-50/10">
            <div class="py-2 px-2 m-auto mt-1 mb-2 w-full rounded-md">
                <h1
                    class="py-4 text-2xl font-semibold tracking-wide text-center"
                >
                    All Bookings
                </h1>
            </div>
            <div
                class="overflow-auto py-1 m-auto w-full min-h-screen rounded-lg"
            >
                <div v-show="bookings.length < 1">
                    <h1 class="pb-4 text-xl font-semibold text-center">
                        No Bookings
                    </h1>
                </div>

                <table
                    class="min-w-full rounded-md divide-y divide-solid divide-green-50/300"
                >
                    <thead
                        class="text-left rounded-lg bg-gray-200/40 text-[13px]"
                    >
                        <tr class="text-left border-inherit">
                            <th class="py-2 px-2 text-center text-blue-800">
                                ID
                            </th>
                            <th class="py-2 px-2">User</th>
                            <th class="py-2 px-2">Trip</th>
                            <th class="py-2 px-2">Ticket</th>
                            <th class="py-2 px-2">Status</th>
                            <th class="py-2 px-2">Reference</th>
                            <th class="py-2 px-2">Date Created</th>
                        </tr>
                    </thead>

                    <tbody class="rounded-lg divide-solid bg-green-50/30">
                        <tr
                            v-for="booking in bookings"
                            :key="booking.id"
                            class="rounded-md text-[12px] odd:bg-gray-200/40"
                        >
                            <td
                                class="py-2 px-2 font-bold text-center text-blue-800"
                            >
                                {{ booking.id }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.user.first_name }}
                                {{ booking.user.last_name }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.trip.title }}
                            </td>
                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.ticket_id }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.status }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.reference }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ booking.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
