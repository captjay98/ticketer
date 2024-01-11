<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Details from "@/Pages/Traveller/TravellerComponents/Details.vue";
import PreviousTrips from "@/Pages/Traveller/TravellerComponents/PreviousTrips.vue";
import Password from "@/Pages/Traveller/TravellerComponents/Password.vue";
import { Link } from "@inertiajs/vue3";
import Button from "@/Components/Button.vue";

const { user, trips } = defineProps({
    user: Object,
    trips: Object
    // message: Object,
});
// if (message) {
// console.log("MESSAGE", message.detail);
// }
</script>
<template>
    <AuthenticatedLayout>
        <!-- <div v-show="message" class="w-screen h-screen bg-blue-400">UPDATE SUCCESFUL</div> -->
        <div class="mt-20 w-[95%] m-auto rounded-md py-2 bg-yellow-50/20">
            <!-- Profile Details -->
            <div class="flex flex-wrap justify-between my-5">
                <div class="md:w-[50%]lg:w-[40%] h-[500px] m-auto">
                    <Details :user="user" />
                </div>
                <div class="md:w-[40%] h-[500px] m-auto">
                    <h1 class="py-4 font-medium text-center">RECENT TRIPS</h1>
                    <PreviousTrips :trips="trips" />
                </div>
            </div>

            <!--Password Update-->
            <Password class="my-5" />
            <Link class="" as="button" method="Post" :href="route('logout')">
            <Button>Logout</Button>
            </Link>
        </div>
    </AuthenticatedLayout>
</template>
