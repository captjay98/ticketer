<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";
import { Link } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { coaches } = defineProps({
    coaches: Object,
});
</script>
<template>
    <AdminLayout>
        <div class="w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10">
            <div class="mb-2 mt-1 m-auto w-full px-2 py-2 rounded-md">
                <h1 class="text-2xl tracking-wide text-center font-semibold py-4">
                    All Ticket Types
                </h1>
                <Link :href="route('admin.coaches.showcreate')" as="button" class="w-[15rem]">
                    <Button>
                        <p>Create Coach</p>
                    </Button>
                </Link>
                <!-- <Link :href="route('admin.coachetypes.showcreate')"><p>Create ticket</p></Link> -->
            </div>
            <div class="py-1 w-full min-h-screen m-auto rounded-lg overflow-auto">
                <div v-show="coaches.length < 1">
                    <h1 class="text-xl font-semibold text-center pb-4">No Issued Ticket Types</h1>
                </div>

                <table class="min-w-full divide-y divide-green-50/300 divide-solid rounded-md">
                    <thead class="bg-gray-200/40 text-left text-[13px] rounded-lg">
                        <tr class="text-left border-inherit">
                            <th class="px-2 py-2 text-center text-blue-800">ID</th>
                            <th class="px-2 py-2">Name</th>
                            <th class="px-2 py-2">Class</th>
                            <th class="px-2 py-2">Capacity</th>
                            <th class="px-2 py-2">Is_active</th>
                            <th class="px-2 py-2">Date Created</th>
                        </tr>
                    </thead>
                    <tbody class="bg-green-50/30 divide-solid rounded-lg">
                        <tr
                            v-for="coach in coaches"
                            class="text-[12px] odd:bg-gray-200/40 rounded-md"
                        >
                            <td class="px-2 py-2 font-bold text-blue-800 text-center">
                                {{ coach.id }}
                            </td>
                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                <Link class="" :href="route('admin.coaches.one', coach.id)">
                                    {{ coach.coach_name }}
                                </Link>
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ coach.coach_class }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ coach.capacity }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ coach.is_active }}
                            </td>

                            <td class="px-2 py-2 min-w-[100px] max-w-[180px] leading-5">
                                {{ coach.created_at }}
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </AdminLayout>
</template>
