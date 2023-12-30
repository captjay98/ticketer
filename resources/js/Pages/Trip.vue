<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Tickettypes from "./Tickettypes.vue";

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
}; // "imagePaths.KD_ABJ.source_image"
// "imagePaths.KD_ABJ.destination_image"
const { trip } = defineProps({
    trip: Object,
});
</script>

<template>
    <GuestLayout>
        <div class="min-h-screen w-screen mt-12">
            <h1 class="text-2xl text-center mt-24 mb-6">Select a Ticket</h1>
            {{ console.log(imagePaths[trip.title].source_image) }}
            <div class="flex flex-col overflow-auto py- gap-6 justify-center items-center">
                <Tickettypes :trip="trip" />
                <div class="bg-yellow-50/50 mt-2 shadow-2xl rounded-xl h-[17.0rem] w-[20rem]">
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
                    <div
                        class="mt-3 px-3 text-center grid grid-cols-2 gap-1 justify-center items-center"
                    >
                        <p class="mb-1 text-[0.8rem] font-semibold flex flex-col">
                            Date:<span class="text-[0.9rem]">{{ trip.date }}</span>
                        </p>
                        <p class="mb-1 text-[0.8rem] font-semibold flex flex-col">
                            Seats Available:<span class="text-[0.9rem]">{{ trip.seats }}</span>
                        </p>
                        <p class="mb-1 text-[0.8rem] font-semibold flex flex-col">
                            Departure:<span class="text-[0.9rem]">{{ trip.departure_time }}</span>
                        </p>
                        <p class="mb-1 text-[0.8rem] font-semibold flex flex-col">
                            Arrival:<span class="text-[0.9rem]">{{ trip.arrival_time }}</span>
                        </p>
                        <!-- 'title', 'source', 'destination', 'seats', 'date', 'departure_time', -->
                        <!-- 'arrival_time', -->
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
