<script setup>
import { Link } from "@inertiajs/vue3";
import { usePage } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    links: Array,
});
// console.log("NAVBAR LINKS!!!".links);
const customer = "customer";
const admin = "admin";

const user = usePage().props.auth.user;

const showLink = (accounttype) => {
    if (user) {
        return user.accounttype == accounttype;
    }
};

const drop = ref(false);
</script>

<template>
    <nav class="hidden text-sm font-semibold md:flex">
        <ul :key="link.name" v-for="link in links" class="flex">
            <li class="ml-10 rounded-md border-green-500 hover:text-green-500 hover:underline hover:underline-offset-4">
                <Link :href="link.path">{{ link.name }}</Link>
            </li>
        </ul>
        <ul>
            <li class="ml-2 hover:text-blue-700" v-show="showLink(customer)">
                <Link :href="route('profile.edit')">Dashboard</Link>
            </li>
            <li class="ml-2 hover:text-black" v-show="showLink(admin)">
                <Link :href="route('admin.dashboard')">Dashboard</Link>
            </li>
        </ul>
    </nav>
    <div class="flex space-x-5 md:hidden">
        <button class="absolute right-10" @click="drop = !drop">
            <img class="py-1 px-1 w-8 h-8" :src="'/storage/icons/hamburger.png'" alt="hamburger" />
        </button>

        <nav v-show="drop" class="absolute right-3 top-12 z-10 bg-green-500 transition-all ease-in duration-400">
            <div class="py-4 px-4 tracking-wider text-yellow-200 bg-green-500 rounded-md">
                <ul :key="link.name" v-for="link in links" class="py-2 px-2 text-left">
                    <li>
                        <Link :href="link.path">{{ link.name }}</Link>
                    </li>
                </ul>
                <ul class="py-2 px-2 text-left">
                    <li v-show="showLink(customer)">
                        <Link :href="route('profile.edit')">Dashboard</Link>
                    </li>
                    <li v-show="showLink(admin)">
                        <Link :href="route('admin.dashboard')">Dashboard</Link>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
