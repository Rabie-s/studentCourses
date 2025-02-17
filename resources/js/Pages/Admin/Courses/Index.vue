<template>
    <div class="container mt-4">
        <!-- Add New Student Section -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <Link role="button" :href="route('admin.courses.create')" class="btn btn-primary btn-lg shadow-lg">Add New
            course
            </Link>
        </div>

        <!-- Table Section -->
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th scope="col" class="text-center">Title</th>
                        <th scope="col" class="text-center">Price</th>
                        <th scope="col" class="text-center">Teacher Name</th>
                        <th scope="col" class="text-center">Category</th>
                        <th scope="col" class="text-center">Actions</th> <!-- Added missing header -->
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="(course, index) in courses.data" :key="index">
                        <td class="align-middle text-center">{{ course.title }}</td>
                        <td class="align-middle text-center">{{ course.price }}</td>
                        <td class="align-middle text-center">{{ course.admin?.name || 'N/A' }}</td>
                        <!-- Handle potential null admin -->
                        <td class="align-middle text-center">{{ course.category?.title || 'N/A' }}</td>
                        <!-- Handle potential null category -->
                        <td class="text-center">
                            <Link :href="route('admin.courses.edit', course.id)"
                                class="btn btn-warning btn-sm mx-2 shadow-sm">
                            Edit
                            </Link>
                            <button @click="destroy(course.id)" type="button"
                                class="btn btn-danger btn-sm mx-2 shadow-sm">
                                Delete
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


        <!-- Pagination Section -->
        <div v-if="courses.links && courses.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="courses.links" />
        </div>

    </div>
</template>

<script setup>
defineProps({ courses: Object })
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function destroy(id) {
    router.delete(route('admin.courses.destroy', id));
}
</script>
