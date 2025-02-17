<template>
    <div class="container mt-4">
        <!-- Add New Student Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <Link role="button" :href="route('admin.categories.create')" class="btn btn-primary btn-lg shadow-lg">Add New
            category
            </Link>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Actions</th> <!-- Added missing header -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(category, index) in categories.data" :key="index">
                        <td class="align-middle text-center">{{ category.title }}</td>
                        <td class="text-center">
                            <Link :href="route('admin.categories.edit', category.id)"
                                class="btn btn-warning btn-sm mx-2 shadow-sm">
                            Edit
                            </Link>
                            <button @click="destroy(category.id)" type="button"
                                class="btn btn-danger btn-sm mx-2 shadow-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- Pagination Section -->
        <div v-if="categories.links && categories.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="categories.links" />
        </div>

    </div>
</template>

<script setup>
defineProps({ categories: Object })
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function destroy(id) {
    router.delete(route('admin.categories.destroy', id));
}
</script>
