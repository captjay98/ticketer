<script setup>
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";
import Avatar from "primevue/avatar";
const { user } = defineProps({
    user: Object,
});

console.log(user);
const form = useForm({
    // avatar: ref(user.user.avatar),
    first_name: ref(user.first_name),
    last_name: ref(user.last_name),
    phone_number: ref(user.phone_number),
    email: ref(user.email),
});

const updatedFields = computed(() => {
    const updatedFields = {};
    for (const key in form.value) {
        if (form.value[key] !== user.user[key]) {
            updatedFields[key] = form.value[key];
        }
    }
    return updatedFields;
});

const updateUser = () => {
    if (!updatedFields.value.isEmpty) {
        form.patch(route("profile.update"), {
            ...updatedFields.value,
            preserveScroll: true,
        });
    }
    // console.log("DETAILS", updatedFields);
};
// console.log(user);
</script>
<template>
    <!-- {{ console.log("CHANGED DETAILS", updatedFields) }} -->
    <h1 class="py-4 text-lg font-medium text-center">Personal Details</h1>

    <div class="flex flex-wrap justify-center py-2 px-1 w-full rounded-md border-slate-800">
        <form class="py-2 px-1 m-auto w-full rounded-md" @submit.prevent="updateUser">
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
                            type="text" id="first_name" v-model="form.first_name"
                            @input="updatedFields.first_name = true" />
                        <div v-show="form.errors.first_name">
                            <p class="my-2 w-60 text-sm text-red-500">
                                {{ form.errors.first_name }}
                            </p>
                        </div>
                    </div>
                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                        <label for="last_name"><span class="px-2 text-[12px]">Last Name:</span></label>
                        <input
                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                            type="text" id="last_name" v-model="form.last_name" @input="updatedFields.last_name = true" />

                        <div v-show="form.errors.last_name">
                            <p class="my-2 w-60 text-sm text-red-500">
                                {{ form.errors.last_name }}
                            </p>
                        </div>
                    </div>
                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                        <label for="phone_number"><span class="px-2 text-[12px]">Phone Number:</span></label>
                        <input
                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                            type="text" id="phone_number" v-model="form.phone_number"
                            @input="updatedFields.phone_number = true" />
                        <div v-show="form.errors.phone_number">
                            <p class="my-2 w-60 text-sm text-red-500">
                                {{ form.errors.phone_number }}
                            </p>
                        </div>
                    </div>
                    <div class="py-4 px-2 text-left max-sm:w-[160px]">
                        <label for="email"><span class="px-2 text-[12px]">Email:</span></label>
                        <input
                            class="flex w-full h-8 font-semibold rounded-md border-green-200 shadow-sm text-[13px] row bg-yellow-50/40"
                            type="text" id="email" v-model="form.email" @input="updatedFields.email = true" />
                        <div v-show="form.errors.email">
                            <p class="my-2 w-60 text-sm text-red-500">
                                {{ form.errors.email }}
                            </p>
                        </div>
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

                    <!--     <div v-show="form.errors.dateofbirth"> -->
                    <!--         <p class="my-2 w-60 text-sm text-red-500"> -->
                    <!--             {{ form.errors.dateofbirth }} -->
                    <!--         </p> -->
                    <!--     </div> -->
                    <!-- </div> -->
                </div>
            </div>
            <div class="flex justify-center m-auto w-64">
                <Button :disabled="form.processing" type="submit">
                    Update
                </Button>
            </div>
        </form>
    </div>
</template>

<!-- const qualiForm = useForm({ -->
<!--     qualifications: user.qualifications, -->
<!-- }); -->
<!-- const expeForm = useForm({ -->
<!--     experiences: user.experiences, -->
<!-- }); -->
