<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const { user } = defineProps({
    user: Object,
});
</script>

<template>
    <AdminLayout>
        <div
            class="flex flex-wrap justify-center items-center py-4 px-4 m-auto w-full min-h-screen rounded-md bg-yellow-50/10">
            <!-- Profile Details -->
            <div class="flex flex-wrap justify-between">
                <div class="lg:w-[50%] w-full rounded-md my-4 py-2 m-auto">
                    <div class="flex flex-wrap justify-center py-2 px-1 w-full rounded-md border-slate-800">
                        <div class="py-4 px-1 m-auto w-full rounded-md">
                            <h1 class="text-lg font-semibold text-center">
                                Personal Details
                            </h1>
                        </div>

                        <form class="py-2 px-1 m-auto w-full rounded-md">
                            <div class="flex flex-col justify-center items-center mb-4 w-full">
                                <!-- <div -->
                                <!--     V-show="user.user.avatar === null" -->
                                <!--     class="flex justify-center rounded-full w-[150px]" -->
                                <!-- > -->
                                <!--     <img -->
                                <!--         class="w-28 h-28" -->
                                <!--         :src="'/storage/icons/avatar.png'" -->
                                <!--         alt="user Profile Picture" -->
                                <!--     /> -->
                                <!-- </div> -->

                                <!-- :src="'/storage/avatars/userone/yGRn5HCN11ZwY2eJ0gpxL6hNGugrO5DK3aLuNYTg.jpg'" -->
                                <div class="flex justify-center rounded-full w-[150px]">
                                    <img class="w-28 h-28 bg-green-500 rounded-full" alt="user Profile Picture"
                                        :src="'/storage/public/icons/avatar.png'" />
                                </div>
                                <!-- <input -->
                                <!--     @input="form.avatar = $event.target.files[0]" -->
                                <!--     type="file" -->
                                <!--     id="avatar" -->
                                <!--     class="ml-2 w-12 file:bg-green-50 file:border-none file:outline-white file: text-[10px] file:h-6" -->
                                <!-- /> -->
                                <!-- <Link -->
                                <!--     as="button" -->
                                <!--     method="post" -->
                                <!--     :href="route('user.update')" -->
                                <!--     :data="{ -->
                                <!--         _method: 'put', -->
                                <!--         forceFormData: true, -->
                                <!--         preserveScroll: true, -->
                                <!--         avatar: form.avatar, -->
                                <!--     }" -->
                                <!-- > -->
                                <!--     <button class="py-1 px-1 mt-1 bg-green-50 text-[10px]">Upload</button> -->
                                <!-- </Link> -->
                            </div>
                            <div class="flex flex-wrap justify-around my-4 mx-2 w-full">
                                <div class="flex flex-wrap justify-center m-auto mt-2 rounded-md">
                                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                                        <label for="first_name"><span class="px-2 text-[12px]">First Name:</span></label>
                                        <input
                                            class="flex w-full h-8 font-semibold rounded-md border-green-300 shadow-sm text-[13px] row bg-yellow-50/40"
                                            type="text" id="first_name" v-model="user.first_name" @input="
                                                updatedFields.first_name = true
                                                " />
                                    </div>
                                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                                        <label for="last_name"><span class="px-2 text-[12px]">Last Name:</span></label>
                                        <input
                                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                                            type="text" id="last_name" v-model="user.last_name" @input="
                                                updatedFields.last_name = true
                                                " />
                                    </div>
                                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                                        <label for="phone_number"><span class="px-2 text-[12px]">Phone
                                                Number:</span></label>
                                        <input
                                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                                            type="text" id="phone_number" v-model="user.phone_number" @input="
                                                updatedFields.phone_number = true
                                                " />
                                    </div>
                                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                                        <label for="email"><span class="px-2 text-[12px]">Email:</span></label>
                                        <input
                                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                                            type="text" id="email" v-model="user.email"
                                            @input="updatedFields.email = true" />
                                    </div>
                                    <!-- <div class="py-4 px-2 text-left max-sm:w-[160px]"> -->
                                    <!--     <label for="dateofbirth" -->
                                    <!--         ><span class="px-2 text-[12px]">DOB:</span></label -->
                                    <!--     > -->
                                    <!--     <input -->
                                    <!--         class="flex h-8 font-semibold bg-yellow-50 rounded-md border-green-300 shadow-sm text-[13px] row md:w-[185px]" -->
                                    <!--         type="date" -->
                                    <!--         id="dateofbirth" -->
                                    <!--         v-model="form.dateofbirth" -->
                                    <!--         @input="updatedFields.dateofbirth = true" -->
                                    <!--     /> -->

                                    <!-- </div> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="w-[40%] h-[500px] my-4 py-2 m-auto"></div>
            </div>
        </div>
    </AdminLayout>
</template>
