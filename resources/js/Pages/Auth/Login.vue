<script setup>
import { Link, useForm } from "@inertiajs/vue3";
import GuestLayout from "@/Layouts/GuestLayout.vue";
import Button from "@/Components/Button.vue";

const form = useForm({
    email: "",
    password: "",
    remember: false,
});

const submit = () => {
    form.post(route("login")),
        {
            onFinish: () => form.reset("passowrd"),
        };
};
</script>
<template>
    <GuestLayout>
        <div class="flex fixed flex-col justify-center items-center w-full">
            <div class="grid w-full h-full md:grid-cols-2">
                <div
                    class="m-auto max-sm:mb-[1rem] w-[22rem] rouned-lg md:w-[24rem] lg:w-[29rem] xl:w-[40rem]"
                >
                    <img
                        :src="'/storage/home-images/kano-station.webp'"
                        class="w-full h-full rounded-lg"
                        alt="Inside Train"
                    />
                </div>
                <div
                    class="pt-4 m-auto rounded-md h-[22.5rem] w-[26rem] max-sm:w-full"
                >
                    <div class="">
                        <p
                            class="mt-4 text-3xl font-semibold text-center text-gray-800"
                        >
                            Welcome Back!
                        </p>
                    </div>
                    <div class="py-2 px-2 my-2 w-full rounded-md bg-slate">
                        <form
                            class="my-2 w-full text-gray-700 rounded-sm"
                            @submit.prevent="submit"
                        >
                            <div class="m-auto w-full text-center">
                                <div class="">
                                    <label for="email"></label>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="text"
                                        name="email"
                                        v-model="form.email"
                                        placeholder="Email"
                                        required
                                    />
                                    <div v-show="form.errors.email">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.email }}
                                        </p>
                                    </div>
                                </div>
                                <div>
                                    <label for="password"></label>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl focus:outline-green-500 focus:border-none focus:ring-0"
                                        type="password"
                                        name="password"
                                        v-model="form.password"
                                        placeholder="Password"
                                        required
                                    />
                                    <div v-show="form.errors.password">
                                        <p class="text-sm text-red-500">
                                            {{ form.errors.password }}
                                        </p>
                                    </div>
                                </div>
                                <div
                                    class="flex justify-between py-2 px-4 text-xs"
                                >
                                    <div class="">
                                        <input
                                            class="mx-1 rounded-md focus:border-none focus:ring-0 active:bg-green-500 focus:outline-green-500"
                                            type="checkbox"
                                            id="Remember me"
                                        />
                                        <label for="email">remember me</label>
                                    </div>
                                    <Link :href="route('password.request')"
                                        >Forgot password?</Link
                                    >
                                </div>

                                <div>
                                    <Button> Login </Button>
                                </div>
                                <Link :href="route('register')">
                                    <p class="px-4 pt-2 text-xs text-left">
                                        Don't have an account?
                                        <span class="text-green-500">
                                            Sign up.</span
                                        >
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
