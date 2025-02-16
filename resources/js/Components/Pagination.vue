<template>
    <div v-if="links.length > 3">
        <div class="d-flex flex-wrap mt-4 gap-1">
            <template v-for="(link, key) in links" :key="key">
                <span 
                    v-if="link.url === null"
                    class="disabled text-muted px-4 py-3 border rounded"
                    v-html="link.label"
                />
                <Link
                    v-else
                    class="px-4 py-3 border rounded text-decoration-none"
                    :class="{ 'btn btn-primary': link.active, 'btn btn-light': !link.active }"
                    :href="link.url"
                    v-html="link.label"
                />
            </template>
        </div>
    </div>
</template>

<script setup>
import { Link } from '@inertiajs/vue3';

defineProps(['links']);
</script>
