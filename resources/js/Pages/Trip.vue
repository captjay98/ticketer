<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
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
    <AuthenticatedLayout>
        <div
            class="flex flex-col justify-center w-screen h-screen max-sm:mt-20"
        >
            <h1 class="mt-24 mb-6 text-2xl text-center">Select a Ticket</h1>
            <div
                class="flex overflow-auto flex-col gap-6 justify-center items-center py-"
            >
                <Tickettypes :trip="trip" />
                <div
                    class="mt-2 rounded-xl shadow-2xl bg-yellow-50/50 h-[17.0rem] w-[20rem]"
                >
                    <div class="flex justify-center w-[20rem]">
                        <div class="w-[50%] h-[65%]">
                            <img
                                :src="imagePaths[trip.title].source_image"
                                alt=""
                                class="rounded-tl-xl h-[8rem] w-[10rem]"
                            />

                            <p
                                class="font-medium text-center py-[0.3rem] text-[0.9rem]"
                            >
                                {{ trip.source }}
                            </p>
                        </div>
                        <div class="w-[50%] h-[65%] rounded-lg">
                            <img
                                :src="imagePaths[trip.title].destination_image"
                                alt=""
                                class="rounded-tr-xl h-[8rem] w-[10rem]"
                            />
                            <p
                                class="font-medium text-center py-[0.3rem] text-[0.9rem]"
                            >
                                {{ trip.destination }}
                            </p>
                        </div>
                    </div>
                    <div
                        class="grid grid-cols-2 gap-1 justify-center items-center px-3 mt-3 text-center"
                    >
                        <p
                            class="flex flex-col mb-1 font-semibold text-[0.8rem]"
                        >
                            Date:<span class="text-[0.9rem]">{{
                                trip.date
                            }}</span>
                        </p>
                        <p
                            class="flex flex-col mb-1 font-semibold text-[0.8rem]"
                        >
                            Seats Available:<span class="text-[0.9rem]">{{
                                trip.seats
                            }}</span>
                        </p>
                        <p
                            class="flex flex-col mb-1 font-semibold text-[0.8rem]"
                        >
                            Departure:<span class="text-[0.9rem]">{{
                                trip.departure_time
                            }}</span>
                        </p>
                        <p
                            class="flex flex-col mb-1 font-semibold text-[0.8rem]"
                        >
                            Arrival:<span class="text-[0.9rem]">{{
                                trip.arrival_time
                            }}</span>
                        </p>
                        <!-- 'title', 'source', 'destination', 'seats', 'date', 'departure_time', -->
                        <!-- 'arrival_time', -->
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
