<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import Details from "@/Pages/Traveller/TravellerComponents/Details.vue";
import Password from "@/Pages/Traveller/TravellerComponents/Password.vue";

const { user } = defineProps({
    user: Object,
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
            <div class="flex flex-wrap justify-between">
                <div class="w-[40%] h-[500px] m-auto">
                    <Details :user="user" />
                </div>
                <div class="w-[40%] h-[500px] m-auto">
                    <h1 class="text-center font-medium py-4">RECENT TRIPS</h1>
                </div>
            </div>

            <!--Password Update-->
            <Password />
        </div>
    </AuthenticatedLayout>
</template>
