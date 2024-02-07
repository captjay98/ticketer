<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import Pagination from "@/Components/Pagination.vue";
import { Link } from "@inertiajs/vue3";

const { items } = defineProps({
    items: Object,
});

const seats = items.data;
</script>
<template>
    <AdminLayout>
        <div class="py-4 px-4 m-auto w-full rounded-md bg-yellow-50/10">
            <div class="py-2 px-2 m-auto mt-1 mb-2 w-full rounded-md">
                <h1
                    class="py-4 text-2xl font-semibold tracking-wide text-center"
                >
                    All seats
                </h1>
                <!-- <Link :href="route('admin.seats.showcreate')"><p>Create seat</p></Link> -->
            </div>
            <div v-show="seats.length < 1">
                <h1 class="pb-4 text-xl font-semibold text-center">
                    No Seats Created
                </h1>
            </div>
            <div class="m-auto lg:pl-20">
                <div class="w-full">
                    <div v-for="item in items.data" :key="item.id">
                        {{ item.name }}
                    </div>
                    <Pagination :links="items.links" />
                </div>
            </div>
            <div
                class="overflow-auto py-1 m-auto w-full min-h-screen rounded-lg"
            >
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
                            <th class="py-2 px-2">Seat Number</th>
                            <th class="py-2 px-2">seat Status</th>
                            <th class="py-2 px-2">Trip</th>
                            <th class="py-2 px-2">Coach</th>
                            <th class="py-2 px-2">Coach Class</th>
                            <th class="py-2 px-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="rounded-lg divide-solid bg-green-50/30">
                        <tr
                            v-for="seat in seats"
                            class="rounded-md text-[12px] odd:bg-gray-200/40"
                        >
                            <td
                                class="py-2 px-2 font-bold text-center text-blue-800"
                            >
                                {{ seat.id }}
                            </td>

                            <td
                                class="py-2 px-8 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                <Link
                                    class=""
                                    :href="route('admin.seats.one', seat.id)"
                                >
                                    {{ seat.seat_number }}
                                </Link>
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ seat.status }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ seat.trip.title }}
                            </td>
                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ seat.coach.coach_name }}
                            </td>
                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ seat.coach.coach_class }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ seat.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
