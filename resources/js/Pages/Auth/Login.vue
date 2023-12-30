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
        <div class="w-full fixed flex flex-col justify-center items-center">
            <div class="h-full w-full grid md:grid-cols-2">
                <div
                    class="max-sm:mb-[1rem] m-auto w-[22rem] md:w-[24rem] lg:w-[29rem] xl:w-[40rem] rouned-lg"
                >
                    <img
                        :src="'/storage/home-images/kano-station.webp'"
                        class="rounded-lg w-full h-full"
                        alt="Inside Train"
                    />
                </div>
                <div
                    class="pt-4 h-[22.5rem] w-[26rem] max-sm:w-full m-auto rounded-md"
                >
                    <div class="">
                        <p class="text-3xl mt-4 text-center font-semibold text-gray-800">
                            Welcome Back!
                        </p>
                    </div>
                    <div class="w-full bg-slate rounded-md px-2 py-2 my-2">
                        <form class="w-full my-2 text-gray-700 rounded-sm" @submit.prevent="submit">
                            <div class="text-center m-auto w-full">
                                <div class="">
                                    <label for="email"></label>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl"
                                        type="text"
                                        name="email"
                                        v-model="form.email"
                                        placeholder="Email"
                                        required
                                    />
                                    <div v-show="form.errors.email">
                                        <p class="text-sm text-red-500">{{ form.errors.email }}</p>
                                    </div>
                                </div>
                                <div>
                                    <label for="password"></label>
                                    <input
                                        class="mx-2 my-2 border-green-200 bg-green-50/20 rounded-md w-[90%] m-auto shadow-xl"
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
                                <div class="flex justify-between px-4 py-2 text-xs">
                                    <div class="">
                                        <input
                                            class="rounded-md mx-1"
                                            type="checkbox"
                                            id="Remember me"
                                        />
                                        <label for="email">remember me</label>
                                    </div>
                                    <Link :href="route('password.request')">Forgot password?</Link>
                                </div>

                                <div>
                                    <Button> Login </Button>
                                </div>
                                <Link :href="route('register')"
                                    ><p class="text-xs text-left px-4 pt-2">
                                        Don't have an account?
                                        <span class="text-green-500"> Sign up.</span>
                                    </p></Link
                                >
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </GuestLayout>
</template>
