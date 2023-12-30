<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import { Link  } from "@inertiajs/vue3";

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
        <GuestLayout>
            <div class="min-h-screen w-screen overflow-y-scroll">
                <h1 class="text-2xl text-center font-semibold mt-20">Trips</h1>
                <div class="flex flex-wrap overflow-auto py-8 gap-6 justify-center">
                    <div
                        v-for="trip in trips"
                        class="bg-yellow-50/50 mt-2 shadow-2xl rounded-xl h-[13.5rem] w-[20rem]"
                    >
                        <Link :href="route('trips.one', trip.id)">
                            <div class="w-[20rem] flex justify-center">
                                <div class="w-[50%] h-[65%]">
                                    <img
                                        :src="imagePaths[trip.title].source_image"
                                        alt=""
                                        class="h-[8rem] w-[10rem] rounded-tl-xl"
                                    />

                                    <p class="py-[0.3rem] text-[0.9rem] text-center font-medium">
                                        {{ trip.source }}
                                    </p>
                                </div>
                                <div class="w-[50%] h-[65%] rounded-lg">
                                    <img
                                        :src="imagePaths[trip.title].destination_image"
                                        alt=""
                                        class="h-[8rem] w-[10rem] rounded-tr-xl"
                                    />
                                    <p class="py-[0.3rem] text-[0.9rem] font-medium text-center">
                                        {{ trip.destination }}
                                    </p>
                                </div>
                            </div>
                            <div class="pt-0 px-3 text-center">
                                <p class="mb-1 text-[0.9rem] font-semibold">{{ trip.date }}</p>
                                <p class="text-[1.0rem] font-semibold">NGN{{ trip.price }}</p>
                            </div>
                        </Link>
                    </div>
                </div>
            </div>
        </GuestLayout>
    </AuthenticatedLayout>
</template>
