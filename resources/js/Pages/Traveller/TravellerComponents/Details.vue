<script setup>
import Button from "@/Components/Button.vue";
import { useForm, Link } from "@inertiajs/vue3";
import { ref, computed } from "vue";

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
    <h1 class="text-lg text-center font-medium py-4">Personal Details</h1>

    <div class="w-full flex flex-wrap justify-center rounded-md px-1 py-2 border-slate-800">
        <form class="w-full m-auto px-1 py-2 rounded-md" @submit.prevent="updateUser">
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
                            ><span class="text-[12px] px-2">First Name:</span></label
                        >
                        <input
                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-300 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="first_name"
                            v-model="form.first_name"
                            @input="updatedFields.first_name = true"
                        />
                        <div v-show="form.errors.first_name">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.first_name }}
                            </p>
                        </div>
                    </div>
                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                        <label for="last_name"
                            ><span class="text-[12px] px-2">Last Name:</span></label
                        >
                        <input
                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="last_name"
                            v-model="form.last_name"
                            @input="updatedFields.last_name = true"
                        />

                        <div v-show="form.errors.last_name">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.last_name }}
                            </p>
                        </div>
                    </div>
                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                        <label for="phone_number"
                            ><span class="text-[12px] px-2">Phone Number:</span></label
                        >
                        <input
                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="phone_number"
                            v-model="form.phone_number"
                            @input="updatedFields.phone_number = true"
                        />
                        <div v-show="form.errors.phone_number">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.phone_number }}
                            </p>
                        </div>
                    </div>
                    <div class="text-left py-4 px-2 max-sm:w-[160px]">
                        <label for="email"><span class="text-[12px] px-2">Email:</span></label>
                        <input
                            class="flex h-8 w-full text-[13px] row bg-yellow-50/40 border-green-200 shadow-sm rounded-md font-semibold"
                            type="text"
                            id="email"
                            v-model="form.email"
                            @input="updatedFields.email = true"
                        />
                        <div v-show="form.errors.email">
                            <p class="text-sm my-2 text-red-500 w-60">
                                {{ form.errors.email }}
                            </p>
                        </div>
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

                    <!--     <div v-show="form.errors.dateofbirth"> -->
                    <!--         <p class="text-sm my-2 text-red-500 w-60"> -->
                    <!--             {{ form.errors.dateofbirth }} -->
                    <!--         </p> -->
                    <!--     </div> -->
                    <!-- </div> -->
                </div>
            </div>
            <div class="flex justify-center w-64 m-auto">
                <Button :disabled="form.processing" type="submit"> Update </Button>
            </div>
        </form>
    </div>
    <Link
        class="bg-green-500/70 px-4 py-1 rounded-md"
        as="button"
        method="Post"
        :href="route('logout')"
        >Logout</Link
    >
</template>

<!-- const qualiForm = useForm({ -->
<!--     qualifications: user.qualifications, -->
<!-- }); -->
<!-- const expeForm = useForm({ -->
<!--     experiences: user.experiences, -->
<!-- }); -->
