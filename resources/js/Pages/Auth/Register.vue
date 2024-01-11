<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";

const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    phone_number: "",
    password: "",
    password_confirmation: "",
});

const submit = () => {
    form.post(route("register"), {
        onFinish: () => form.reset("password", "password_confirmation"),
    });
};
</script>

<template>
    <GuestLayout>

        <Head title="Register" />
        <div class="flex fixed flex-col justify-center items-center w-full">
            <div class="grid w-full h-full md:grid-cols-2">
                <div class="m-auto max-sm:mb-[1rem] w-[22rem] rouned-lg md:w-[24rem] lg:w-[29rem] xl:w-[40rem]">
                    <img :src="'/storage/home-images/kano-station.webp'" class="w-full h-full rounded-lg"
                        alt="Inside Train" />
                </div>
                <div class="m-auto rounded-md shadow-m w-[25rem] h-[31rem]">
                    <div class="py-4 mb-4 h-4 rounded-md">
                        <p class="text-lg font-semibold text-center text-green-600">
                            Create a Free Account
                        </p>
                    </div>

                    <div class="px-2 w-full rounded-md bg-slate">
                        <form class="my-2 w-full text-gray-700 rounded-sm" @submit.prevent="submit">
                            <div class="m-auto w-full text-center">
                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="text" id="first_name" placeholder="First Name" v-model="form.first_name"
                                        required />
                                    <div v-show="form.errors.first_name">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.first_name }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="text" id="last_name" placeholder="Last Name" v-model="form.last_name"
                                        required />
                                    <div v-show="form.errors.last_name">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.last_name }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="text" id="email" placeholder="Email" v-model="form.email" required />
                                    <div v-show="form.errors.email">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.email }}
                                        </p>
                                    </div>
                                </div>

                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="text" id="phone_number" placeholder="Phone Number" v-model="form.phone_number"
                                        required />
                                    <div v-show="form.errors.phone_number">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.phone_number }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="password" id="password" placeholder="Password" v-model="form.password"
                                        required />
                                    <div v-show="form.errors.password">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.password }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="password" id="password" placeholder="Confirm Password"
                                        v-model="form.password_confirmation" required />
                                    <div v-show="form.errors.password_confirmation
                                        ">
                                        <p class="text-sm text-red-500">
                                            {{
                                                form.errors
                                                    .password_confirmation
                                            }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <Button class="w-[90%] bg-green-500 my-4 px-2 py-1 rounded-md text-white shadow-xl">
                                        Register
                                    </Button>
                                </div>
                                <Link :href="route('login')">
                                <p class="px-6 pt-2 text-xs text-left">
                                    Already a Member?
                                    <span class="text-sm text-green-500">
                                        Sign in.</span>
                                </p>
                                </Link>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
