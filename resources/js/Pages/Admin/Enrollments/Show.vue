<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-3 p-4 w-100" style="max-width: 800px;">
            <div class="card-header text-center bg-primary text-white rounded-3">
                <h2 class="fw-bold text-uppercase mb-0">Enrollment Details</h2>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Student:</strong> {{ enrollment.user.name }}</li>
                    <li class="list-group-item"><strong>Course:</strong> {{ enrollment.course.title }}</li>
                    <li class="list-group-item"><strong>Status:</strong> {{ enrollment.status }}</li>
                    <li class="list-group-item"><strong>Grade:</strong> {{ enrollment.grade ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Enrollment Price:</strong> ${{ enrollment.enrollment_price }}</li>
                </ul>

                <div class="mt-4 d-flex justify-content-between">
                    <Link :href="route('admin.enrollments.index')" class="btn btn-secondary shadow-sm">Back</Link>
                    <Link :href="route('admin.enrollments.edit', enrollment.id)" class="btn btn-warning shadow-sm">Edit</Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ enrollment: Object });
import { Link } from '@inertiajs/vue3';
</script>
