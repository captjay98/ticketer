<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { trips } = defineProps({
    trips: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">All trips</h1>
                <Link :href="route('admin.trips.showcreate')" as="button" class="w-[15rem]">
                    <Button>
                        <p>Create Trip</p>
                    </Button>
                </Link>
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <table class="min-w-full divide-y divide-green-50/300 divide-solid rounded-md">
                    <thead class="bg-gray-200/40 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-2 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">Title</th>
                            <th class="px-2 py-2">Source</th>
                            <th class="px-2 py-2">Destination</th>
                            <th class="px-2 py-2">Seats</th>
                            <th class="px-2 py-2">Departure Time</th>
                            <th class="px-2 py-2">Arrival Time</th>
                            <th class="px-2 py-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-50/30 divide-solid rounded-lg">
                        <tr v-for="trip in trips" class="text-[12px] odd:bg-gray-200/40 rounded-md">
                            <td class="px-2 py-2 font-bold text-blue-800 text-center">
                                {{ trip.id }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link class="" :href="route('admin.trips.one', trip.id)">
                                    {{ trip.title }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ trip.source }}
                            </td>

                            <td
                                class="px-2 py-2 min-w-[100px] max-w-[180px] -auto overflow-hidden leading-5"
                            >
                                {{ trip.destination }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ trip.seats }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ trip.departure_time }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ trip.arrival_time }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ trip.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
