<template>
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-uppercase text-primary mb-3 mb-md-0">Categories</h2>
            <Link role="button" :href="route('admin.categories.create')" class="btn btn-primary btn-lg shadow">
                + Add New Category
            </Link>
        </div>

        <!-- Table Section -->
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-gradient bg-dark text-white">
                            <tr>
                                <th scope="col">Title</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(category, index) in categories.data" :key="index">
                                <td class="fw-semibold text-wrap">{{ category.title }}</td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <Link :href="route('admin.categories.edit', category.id)"
                                            class="btn btn-warning btn-sm shadow">
                                            Edit
                                        </Link>
                                        <button @click="confirmDelete(category.id)" class="btn btn-danger btn-sm shadow">
                                            Delete
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination Section -->
        <div v-if="categories.links && categories.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="categories.links" />
        </div>
    </div>
</template>

<script setup>
defineProps({ categories: Object });
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function confirmDelete(id) {
    if (confirm("Are you sure you want to delete this category?")) {
        router.delete(route('admin.categories.destroy', id));
    }
}
</script>

<style scoped>
/* Table Styling */
.table th,
.table td {
    vertical-align: middle;
    padding: 12px;
}

/* Buttons */
.btn {
    min-width: 90px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Responsive Adjustments */
@media (max-width: 768px) {
    .table th,
    .table td {
        padding: 8px;
        font-size: 14px;
    }

    .btn {
        min-width: 70px;
        font-size: 0.8rem;
    }
}
</style>
