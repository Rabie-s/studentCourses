<template>
    <div class="container mt-4">
        <!-- Header Section -->
        <div class="d-flex flex-wrap justify-content-between align-items-center mb-4">
            <h2 class="fw-bold text-uppercase text-primary mb-3 mb-md-0">My Enrollments</h2>
        </div>

        <!-- Table Section -->
        <div class="card shadow-lg rounded-4 border-0">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle text-center">
                        <thead class="bg-gradient bg-dark text-white">
                            <tr>
                                <th scope="col">Course</th>
                                <th scope="col">Status</th>
                                <th scope="col">Your Grade</th>
                                <th scope="col">Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(enrollment, index) in userEnrollments.data" :key="index">
                                <td class="text-wrap">{{ enrollment.course.title }}</td>
                                <td>
                                    <span :class="statusClass(enrollment.status)" class="badge px-3 py-2 rounded-pill shadow-sm">
                                        {{ enrollment.status }}
                                    </span>
                                </td>
                                <td class="fw-bold">{{ enrollment.grade ?? 'N/A' }}</td>
                                <td class="fw-bold text-success">${{ enrollment.enrollment_price }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pagination Section -->
        <div v-if="userEnrollments.links && userEnrollments.links.length > 1" class="d-flex justify-content-center mt-4">
            <Pagination :links="userEnrollments.links" />
        </div>
    </div>
</template>

<script setup>
defineProps({ userEnrollments: Object });
import { Link, router } from '@inertiajs/vue3';
import Pagination from '@/Components/Pagination.vue';

function destroy(id) {
    if (confirm("Are you sure you want to delete this enrollment?")) {
        router.delete(route('admin.enrollments.destroy', id));
    }
}

// Function to apply different colors based on status
function statusClass(status) {
    return {
        'badge bg-success text-white': status === 'active', // Vibrant Green
        'badge bg-danger text-white': status === 'cancelled', // Deep Red
        'badge bg-info text-white': status === 'completed', // Soft Blue
    };
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
