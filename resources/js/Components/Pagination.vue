<script setup>
import { Link } from "@inertiajs/vue3";
const { links } = defineProps({
    links: Array,
});
</script>
<template>
    <div v-if="links.length > 3">
        <div class="flex flex-wrap mb-1">
            <template v-for="(link, key) in links" :key="key">
                <div
                    v-if="link.url === null"
                    class="py-3 px-4 mr-1 mb-1 text-sm leading-4 text-gray-400 rounded border"
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="py-3 px-4 mr-1 mb-1 text-sm leading-4 rounded border hover:bg-white focus:text-indigo-500 focus:border-indigo-500"
                    :class="{ 'bg-white': link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>
