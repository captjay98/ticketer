<script setup>
import PageHeader from "@/Components/PageHeader.vue";
import PageFooter from "@/Components/PageFooter.vue";

const links = [
    { name: "Home", path: "/", url: "" },
    { name: "Trips", path: "/trips", url: "" },
    { name: "Account", path: "/dashboard", url: "" },
];
</script>

<template>
    <div class="overflow-hidden max-w-screen">
        <PageHeader :links="links" />
        <div>
            <slot />
        </div>
        <PageFooter />
    </div>
</template>
