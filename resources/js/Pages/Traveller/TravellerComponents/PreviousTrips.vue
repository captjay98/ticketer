<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

const { trips } = defineProps({
    trips: Object,
});
</script>
<template>
    <AuthenticatedLayout>
        <div class="py-4 px-4 m-auto w-full rounded-md bg-yellow-50/10">
            <div class="py-2 px-2 m-auto mt-1 mb-2 w-full rounded-md">
                <h1
                    class="py-4 text-2xl font-semibold tracking-wide text-center"
                >
                    All trips
                </h1>
                <!-- <Link :href="route('admin.trips.showcreate')"><p>Create trip</p></Link> -->
            </div>
            <div v-show="trips.length < 1">
                <h1 class="pb-4 text-xl font-semibold text-center">
                    No Issued trips
                </h1>
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
                            <th class="py-2 px-2">Trip</th>
                            <th class="py-2 px-2">Seat</th>
                            <th class="py-2 px-2">Class</th>
                            <th class="py-2 px-2">Date</th>
                        </tr>
                    </thead>
                    <tbody class="rounded-lg divide-solid bg-green-50/30">
                        <tr
                            v-for="trip in trips"
                            :key="trip.id"
                            class="rounded-md text-[12px] odd:bg-gray-200/40"
                        >
                            <td
                                class="py-2 px-2 font-bold text-center text-blue-800"
                            >
                                {{ trip.id }}
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                <Link
                                    class=""
                                    :href="route('admin.trips.one', trip.id)"
                                >
                                    {{ trip.title }}
                                </Link>
                            </td>

                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ trip.seat }}
                            </td>

                            <td
                                class="overflow-hidden py-2 px-2 leading-5 min-w-[100px] max-w-[180px] -auto"
                            >
                                {{ trip.class }}
                            </td>
                            <td
                                class="py-2 px-2 leading-5 min-w-[100px] max-w-[180px]"
                            >
                                {{ trip.date }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
