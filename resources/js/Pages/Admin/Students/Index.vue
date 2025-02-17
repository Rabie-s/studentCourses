<template>
    <div class="container mt-4">
        <!-- Add New Student Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <Link role="button" :href="route('users.create')" class="btn btn-primary btn-lg shadow-lg">Add New Student
            </Link>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Name</th>
                        <th scope="col" class="text-center">Email</th>
                        <th scope="col" class="text-center">Phone Number</th>
                        <th scope="col" class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(user, index) in users.data" :key="index">
                        <td class="align-middle text-center">{{ user.name }}</td>
                        <td class="align-middle text-center">{{ user.email }}</td>
                        <td class="align-middle text-center">{{ user.phone_number }}</td>
                        <td class="text-center">
                            <Link :href="route('users.edit', user.id)" role="button"
                                class="btn btn-warning btn-sm mx-2 shadow-sm hover-shadow">Edit</Link>
                            <button @click="destroy(user.id)" type="button"
                                class="btn btn-danger btn-sm mx-2 shadow-sm hover-shadow">Delete</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Pagination Section -->
        <div v-if="users.links && users.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="users.links" />
        </div>

    </div>
</template>

<script setup>
defineProps({ users: Object })
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function destroy(id) {
    router.delete(route('users.destroy', id));
}
</script>
