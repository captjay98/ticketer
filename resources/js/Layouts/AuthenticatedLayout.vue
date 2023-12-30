<script setup>
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "About", path: "/about", url: "" },
    { name: "Trips", path: "/trips", url: "" },
    { name: "Account", path: "/dashboard", url: "" },
];
</script>

<template>
    <div class="max-w-screen overflow-hidden">
        <PageHeader :links="links" />
        <div><slot /></div>
        <PageFooter />
    </div>
</template>
