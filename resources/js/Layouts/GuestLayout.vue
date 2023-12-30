<script setup>
import PageHeader from "@/Components/PageHeader.vue";

const links = [
    { name: "Home", path: "/" },
    { name: "Trips", path: "/trips" },
    { name: "Login", path: "/login" },
    { name: "Register", path: "/register" },
];
</script>

<template>
    <div
        class="lg:mt-12 h-screen w-full flex flex-col justify-center align-center items-center bg-yellow-50/10"
    >
        <PageHeader :links="links" />

        <slot />
    </div>
</template>
