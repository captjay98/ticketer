<script setup>
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import { nextTick } from "vue";

const { seats } = defineProps({
    seats: Object,
});
// console.log("SEATS", seats);
const oneSeat = seats[0];

let selectedSeat = ref(0);

let seatInfo = {};

const selectSeat = (seat) => {
    if (selectedSeat !== seat) {
        selectedSeat.value = seat.id;
        seatInfo = seat;
        nextTick(() => {
            console.log("SEAT", seat);
            // console.log("SELECTED", selectedSeat.value);
        });
    } else {
        selectedSeat.value = 0;
        nextTick(() => {
            // console.log("UNSELECTED", selectedSeat.value);
        });
    }
};
</script>
<template>
    <GuestLayout>
        <div
            class="grid items-center py-8 px-4 m-auto mt-10 bg-green-100 rounded-b-sm rounded-t-full max-sm:mt-28 max-sm-:py-4 max-sm:px-4 w-[18rem] h-[35rem] max-sm:w-[16.8rem] max-sm:h-[32rem]">
            <h4 class="m-auto mt-4 w-11/12 text-xl font-semibold text-center">
                {{ oneSeat.coach.coach_name }}
            </h4>

            <div v-if="oneSeat.coach.coach_class === 'Economy'"
                class="grid grid-cols-6 gap-3 justify-center items-center px-1 pt-10 pb-4 bg-green-100 max-sm:gap-2">
                <div v-for="seat in seats" :key="seat.id"
                    class="flex justify-center items-center py-2 px-2 w-6 h-7 text-sm bg-green-300 rounded-b-sm rounded-t-lg odd:mx-3 max-sm:w-[1.2rem] max-sm:h-[1.5rem]"
                    :class="{
                        'bg-white shadow-2xl': selectedSeat === seat.id,
                        'bg-red-500/80 shadow-2xl disabled':
                            seat.status === 'booked',
                        'bg-yellow-500/70 shadow-2xl disabled':
                            seat.status === 'reserved',
                    }">
                    <button @click="selectSeat(seat)">
                        {{ seat.seat_number }}
                    </button>
                </div>
            </div>

            <div v-if="oneSeat.coach.coach_class === 'Business'"
                class="grid grid-cols-4 gap-3 items-center px-2 pt-10 pb-4 bg-green-100 max-sm:gap-2">
                <div v-for="seat in seats" :key="seat.id"
                    class="flex justify-center items-center py-2 px-2 w-6 h-7 text-sm bg-green-300 rounded-b-sm rounded-t-lg odd:mx-5 max-sm:w-[1.2rem] max-sm:h-[1.5rem]"
                    :class="{
                        'bg-white shadow-2xl': selectedSeat === seat.id,
                        'bg-red-500/80 shadow-2xl disabled':
                            seat.status === 'booked',
                        'bg-yellow-500/70 shadow-2xl disabled':
                            seat.status === 'reserved',
                    }">
                    <button @click="selectSeat(seat)">
                        {{ seat.seat_number }}
                    </button>
                </div>
            </div>
            <!-- <div -->
            <!--     v-show="oneSeat.coach.coach_class === 'Business'" -->
            <!--     class="grid grid-cols-4 gap-4 items-center px-4 pt-10 pb-10 bg-green-100" -->
            <!-- > -->
            <!--     <div -->
            <!--         v-for="seat in seats" -->
            <!--         :key="seat.id" -->
            <!--         class="flex justify-center items-center py-2 px-2 w-6 h-7 text-sm bg-green-300 rounded-b-sm rounded-t-lg" -->
            <!--     > -->
            <!--         {{ seat.seat_number }} -->
            <!--     </div> -->
            <!-- </div> -->
            <!-- 'trip_id':seat.trip_id, -->
            <!--                     'coach_id':seat.coach_id, -->
            <div class="m-auto my-4 w-[15rem]">
                <Link class="w-full" method="post" as="button" :href="route('seats.reserve')" v-if="seatInfo &&
                    seatInfo.id &&
                    seatInfo.trip_id &&
                    seatInfo.coach_id &&
                    seatInfo.coach &&
                    seatInfo.coach.coach_class
                    " :data="{
        seat_id: seatInfo.id,
        trip_id: seatInfo.trip_id,
        coach_id: seatInfo.coach_id,
        coach_class: seatInfo.coach.coach_class,
    }">
                <Button>Reserve</Button></Link>
            </div>
        </div>
    </GuestLayout>
</template>
