<script setup>
import AdminLayout from "@/Layouts/AdminLayout.vue";

const { user } = defineProps({
    user: Object,
});
</script>

<template>
    <AdminLayout>
        <div
            class="min-h-screen flex flex-wrap justify-center items-center w-full rounded-md px-4 py-4 m-auto bg-yellow-50/10"
        >
            <!-- Profile Details -->
            <div class="flex flex-wrap justify-between">
                <div class="xl:w-[40%] lg:w-[50%] w-full rounded-md my-4 py-2 m-auto">
                    <div
                        class="w-full flex flex-wrap justify-center rounded-md px-1 py-2 border-slate-800"
                    >
                        <div class="m-auto w-full px-1 py-4 rounded-md">
                            <h1 class="text-lg text-center font-semibold">Personal Details</h1>
                        </div>

                        <form class="w-full m-auto px-1 py-2 rounded-md">
                            <div class="w-full flex flex-col items-center justify-center mb-4">
                                <!-- <div -->
                                <!--     V-show="user.user.avatar === null" -->
                                <!--     class="rounded-full flex justify-center w-[150px]" -->
                                <!-- > -->
                                <!--     <img -->
                                <!--         class="w-28 h-28" -->
                                <!--         :src="'/storage/icons/avatar.png'" -->
                                <!--         alt="user Profile Picture" -->
                                <!--     /> -->
                                <!-- </div> -->

                                <!-- :src="'/storage/avatars/userone/yGRn5HCN11ZwY2eJ0gpxL6hNGugrO5DK3aLuNYTg.jpg'" -->
                                <div class="rounded-full flex justify-center w-[150px]">
                                    <img
                                        class="w-28 h-28 rounded-full bg-green-500"
                                        alt="user Profile Picture"
                                        :src="'/storage/public/icons/avatar.png'"
                                    />
                                </div>
                                <!-- <input -->
                                <!--     @input="form.avatar = $event.target.files[0]" -->
                                <!--     type="file" -->
                                <!--     id="avatar" -->
                                <!--     class="file:bg-green-50 file:border-none file:outline-white w-12 ml-2 file: text-[10px] file:h-6" -->
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
                                <!--     <button class="bg-green-50 px-1 py-1 mt-1 text-[10px]">Upload</button> -->
                                <!-- </Link> -->
                            </div>
                            <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                                <div class="flex flex-wrap mt-2 m-auto justify-center rounded-md">
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="first_name"
                                            ><span class="text-[12px] px-2"
                                                >First Name:</span
                                            ></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-300 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="first_name"
                                            v-model="user.first_name"
                                            @input="updatedFields.first_name = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="last_name"
                                            ><span class="text-[12px] px-2">Last Name:</span></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="last_name"
                                            v-model="user.last_name"
                                            @input="updatedFields.last_name = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="phone_number"
                                            ><span class="text-[12px] px-2"
                                                >Phone Number:</span
                                            ></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="phone_number"
                                            v-model="user.phone_number"
                                            @input="updatedFields.phone_number = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="email"
                                            ><span class="text-[12px] px-2">Email:</span></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="email"
                                            v-model="user.email"
                                            @input="updatedFields.email = true"
                                        />
                                    </div>
                                    <!-- <div class="text-left py-4 px-2 max-sm:w-[160px]"> -->
                                    <!--     <label for="dateofbirth" -->
                                    <!--         ><span class="text-[12px] px-2">DOB:</span></label -->
                                    <!--     > -->
                                    <!--     <input -->
                                    <!--         class="flex h-8 md:w-[185px] text-[13px] row bg-yellow-50 border-green-300 shadow-sm rounded-md font-semibold" -->
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
                <div class="w-[40%] h-[500px] my-4 py-2 m-auto">
                    <div
                        class="w-full flex flex-wrap justify-center rounded-md px-1 py-2 border-slate-800"
                    >
                        <div class="m-auto w-full px-1 py-4 rounded-md">
                            <h1 class="text-lg text-center font-semibold">Previous Trips</h1>
                        </div>

                        <form class="w-full m-auto px-1 py-2 rounded-md">
                            <div class="w-full flex flex-col items-center justify-center mb-4">
                                <!-- <div -->
                                <!--     V-show="user.user.avatar === null" -->
                                <!--     class="rounded-full flex justify-center w-[150px]" -->
                                <!-- > -->
                                <!--     <img -->
                                <!--         class="w-28 h-28" -->
                                <!--         :src="'/storage/icons/avatar.png'" -->
                                <!--         alt="user Profile Picture" -->
                                <!--     /> -->
                                <!-- </div> -->

                                <!-- :src="'/storage/avatars/userone/yGRn5HCN11ZwY2eJ0gpxL6hNGugrO5DK3aLuNYTg.jpg'" -->
                                <div class="rounded-full flex justify-center w-[150px]">
                                    <img
                                        class="w-28 h-28 rounded-full bg-green-500"
                                        alt="user Profile Picture"
                                        :src="'/storage/public/icons/avatar.png'"
                                    />
                                </div>
                                <!-- <input -->
                                <!--     @input="form.avatar = $event.target.files[0]" -->
                                <!--     type="file" -->
                                <!--     id="avatar" -->
                                <!--     class="file:bg-green-50 file:border-none file:outline-white w-12 ml-2 file: text-[10px] file:h-6" -->
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
                                <!--     <button class="bg-green-50 px-1 py-1 mt-1 text-[10px]">Upload</button> -->
                                <!-- </Link> -->
                            </div>
                            <div class="mx-2 my-4 w-full flex flex-wrap justify-around">
                                <div class="flex flex-wrap mt-2 m-auto justify-center rounded-md">
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="first_name"
                                            ><span class="text-[12px] px-2"
                                                >First Name:</span
                                            ></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-300 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="first_name"
                                            v-model="user.first_name"
                                            @input="updatedFields.first_name = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="last_name"
                                            ><span class="text-[12px] px-2">Last Name:</span></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="last_name"
                                            v-model="user.last_name"
                                            @input="updatedFields.last_name = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="phone_number"
                                            ><span class="text-[12px] px-2"
                                                >Phone Number:</span
                                            ></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="phone_number"
                                            v-model="user.phone_number"
                                            @input="updatedFields.phone_number = true"
                                        />
                                    </div>
                                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                                        <label for="email"
                                            ><span class="text-[12px] px-2">Email:</span></label
                                        >
                                        <input
                                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                                            type="text"
                                            id="email"
                                            v-model="user.email"
                                            @input="updatedFields.email = true"
                                        />
                                    </div>
                                    <!-- <div class="text-left py-4 px-2 max-sm:w-[160px]"> -->
                                    <!--     <label for="dateofbirth" -->
                                    <!--         ><span class="text-[12px] px-2">DOB:</span></label -->
                                    <!--     > -->
                                    <!--     <input -->
                                    <!--         class="flex h-8 md:w-[185px] text-[13px] row bg-yellow-50 border-green-300 shadow-sm rounded-md font-semibold" -->
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
            </div>
        </div>
    </AdminLayout>
</template>
