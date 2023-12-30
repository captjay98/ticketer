<script setup>
import NavBar from "@/Components/NavBar.vue";

defineProps({
    links: Array,
});
</script>

<template>
    <header
        class="pt-2 h-12 text-slate-900 px-8 w-full m-auto tracking-wide flex items-center"
        :class="{
            'bg-green-50/20 sticky ': $page.url == '/',
            'bg-yellow-50/10 fixed top-0 z-50': $page.url !== '/',
        }"
    >
        <div class="w-full flex justify-between align-middle">
            <h1 class="font-bold text-lg">Ticketer</h1>
            <NavBar :links="links" />
        </div>
    </header>
</template>
