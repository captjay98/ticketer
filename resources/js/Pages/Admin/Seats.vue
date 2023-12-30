<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";

const { seats } = defineProps({
    seats: Object,
});

console.log(seats);
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All seats</h1>
                <!-- <Link :href="route('admin.seats.showcreate')"><p>Create seat</p></Link> -->
            </div>
            <div v-show="seats.length < 1">
                <h1 class="text-xl font-semibold text-center pb-4">No Seats Created</h1>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-green-50/300 divide-solid rounded-md">
                    <thead class="bg-gray-200/40 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-2 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">Seat Number</th>
                            <th class="px-2 py-2">seat Status</th>
                            <th class="px-2 py-2">Trip</th>
                            <th class="px-2 py-2">Coach</th>
                            <th class="px-2 py-2">Coach Class</th>
                            <th class="px-2 py-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-50/30 divide-solid rounded-lg">
                        <tr v-for="seat in seats" class="text-[12px] odd:bg-gray-200/40 rounded-md">
                            <td class="px-2 py-2 font-bold text-blue-800 text-center">
                                {{ seat.id }}
                            </td>

                            <td class="px-8 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link class="" :href="route('admin.seats.one', seat.id)">
                                    {{ seat.seat_number }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ seat.status }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ seat.trip.title }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ seat.coach.coach_name }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ seat.coach.coach_class }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ seat.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
