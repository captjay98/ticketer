<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Link } from "@inertiajs/vue3";

const { trips } = defineProps({
    trips: Object,
});

const imagePaths = {
    KD_ABJ: {
        source_image: "/storage/home-images/kaduna.webp",
        destination_image: "/storage/home-images/fct.webp",
    },
    ABJ_KD: {
        source_image: "/storage/home-images/fct.webp",
        destination_image: "/storage/home-images/kaduna.webp",
    },
    LAG_IBD: {
        source_image: "/storage/home-images/lagos.webp",
        destination_image: "/storage/home-images/ibadan.webp",
    },
    IBD_LAG: {
        source_image: "/storage/home-images/ibadan.webp",
        destination_image: "/storage/home-images/lagos.webp",
    },
    WAR_IBD: {
        source_image: "/storage/home-images/warri.webp",
        destination_image: "/storage/home-images/ibadan.webp",
    },
    IBD_WAR: {
        source_image: "/storage/home-images/ibadan.webp",
        destination_image: "/storage/home-images/warri.webp",
    },
    KN_KD: {
        source_image: "/storage/home-images/kano.webp",
        destination_image: "/storage/home-images/kaduna.webp",
    },
    KD_KN: {
        source_image: "/storage/home-images/kaduna.webp",
        destination_image: "/storage/home-images/kano.webp",
    },
    ABJ_KN: {
        source_image: "/storage/home-images/fct.webp",
        destination_image: "/storage/home-images/kano.webp",
    },
    KN_ABJ: {
        source_image: "/storage/home-images/kano.webp",
        destination_image: "/storage/home-images/fct.webp",
    },
    WAR_LAG: {
        source_image: "/storage/home-images/warri.webp",
        destination_image: "/storage/home-images/lagos.webp",
    },
    LAG_WAR: {
        source_image: "/storage/home-images/lagos.webp",
        destination_image: "/storage/home-images/warri.webp",
    },
};
</script>
<template>
    <AuthenticatedLayout>
        <div class="overflow-y-scroll w-screen min-h-screen">
            <h1 class="mt-20 text-2xl font-semibold text-center">Trips</h1>
            <div class="flex overflow-auto flex-wrap gap-6 justify-center py-8">
                <div v-if="trips.length === 0">
                    <h1 class="py-10 text-2xl font-semibold text-center">
                        No Trips Found
                    </h1>
                </div>
                <div v-for="trip in trips" :key="trip.id"
                    class="mt-2 rounded-xl shadow-2xl bg-yellow-50/50 h-[13.5rem] w-[20rem]">
                    <Link :href="route('trips.one', trip.id)">
                    <div class="flex justify-center w-[20rem]">
                        <div class="w-[50%] h-[65%]">
                            <img :src="imagePaths[trip.title].source_image" alt=""
                                class="rounded-tl-xl h-[8rem] w-[10rem]" />

                            <p class="font-medium text-center py-[0.3rem] text-[0.9rem]">
                                {{ trip.source }}
                            </p>
                        </div>
                        <div class="w-[50%] h-[65%] rounded-lg">
                            <img :src="imagePaths[trip.title].destination_image
                                " alt="" class="rounded-tr-xl h-[8rem] w-[10rem]" />
                            <p class="font-medium text-center py-[0.3rem] text-[0.9rem]">
                                {{ trip.destination }}
                            </p>
                        </div>
                    </div>
                    <div class="px-3 pt-0 text-center">
                        <p class="mb-1 font-semibold text-[0.9rem]">
                            {{ trip.date }}
                        </p>
                        <p class="font-semibold text-[1.0rem]">
                            NGN{{ trip.price }}
                        </p>
                    </div>
                    </Link>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
