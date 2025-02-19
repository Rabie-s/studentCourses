<template>
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-uppercase text-primary mb-3 mb-md-0">Students</h2>
            <Link role="button" :href="route('users.create')" class="btn btn-primary btn-lg shadow">Add New Student</Link>
        </div>

        <!-- Table Section -->
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-gradient bg-dark text-white">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Phone Number</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(user, index) in users.data" :key="index">
                                <td class="fw-semibold text-wrap">{{ user.name }}</td>
                                <td class="text-wrap">{{ user.email }}</td>
                                <td class="fw-bold">{{ user.phone_number }}</td>
                                <td>
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <Link :href="route('users.edit', user.id)" class="btn btn-warning btn-sm shadow">Edit</Link>
                                        <button @click="destroy(user.id)" class="btn btn-danger btn-sm shadow">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination Section -->
        <div v-if="users.links && users.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="users.links" />
        </div>
    </div>
</template>

<script setup>
defineProps({ users: Object });
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function destroy(id) {
    if (confirm("Are you sure you want to delete this student?")) {
        router.delete(route('users.destroy', id));
    }
}
</script>

<style scoped>
/* Enhancing Table */
.table th,
.table td {
    vertical-align: middle;
    padding: 12px;
}

/* Buttons - Rounded with shadow */
.btn {
    min-width: 90px;
    font-size: 0.9rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}

/* Custom Responsive Adjustments */
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
