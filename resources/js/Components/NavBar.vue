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
    <nav class="hidden md:flex font-semibold text-sm">
        <ul v-for="link in links" class="flex">
            <li
                class="border-green-500 ml-10 rounded-md hover:text-green-500 hover:underline hover:underline-offset-4"
            >
                <!-- hover:text-green-900 hover:bg-green-500  -->
                <Link :href="link.path">{{ link.name }}</Link>
            </li>
        </ul>
        <ul>
            <li class="ml-2 hover:text-blue-700" v-show="showLink(customer)">
                <Link :href="route('profile.edit')">Dashboard</Link>
                <!-- :href="route('customer.dashboard')" -->
            </li>
            <li class="ml-2 hover:text-black" v-show="showLink(admin)">
                <Link :href="route('admin.dashboard')">Dashboard</Link>
                <!-- :href="route('admin.dashboard')" -->
            </li>
        </ul>
    </nav>
    <div class="md:hidden flex space-x-5">
        <button class="absolute right-10" @click="drop = !drop">
            <img
                class="h-8 w-8 py-1 px-1"
                :src="'/storage/icons/hamburger.png'"
                alt="Profile Avatar"
            />
        </button>

        <nav v-show="drop" class="transition ease-in duration-400 bg-green-500">
            <div
                class="transition ease-in duration-400 text-yellow-200 bg-green-500 tracking-wider absolute top-12 right-3 px-4 py-4 rounded-md"
            >
                <ul v-for="link in links" class="px-2 py-2 text-left">
                    <li>
                        <Link :href="link.path">{{ link.name }}</Link>
                    </li>
                </ul>
                <ul class="px-2 py-2 text-left">
                    <li v-show="showLink(customer)">
                        <Link :href="route('profile.edit')">Dashboard</Link>
                        <!-- :href="route('customer.dashboard')" -->
                    </li>
                    <li v-show="showLink(admin)">
                        <Link :href="route('admin.dashboard')">Dashboard</Link>
                        <!-- :href="route('admin.dashboard')" -->
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
