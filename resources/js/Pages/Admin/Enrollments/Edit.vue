<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 px-3">
        <div class="card shadow-lg rounded-4 p-4 w-100" style="max-width: 600px; background: #f8f9fa; border: none;">
            <div class="card-header text-center bg-gradient bg-primary text-white rounded-top-4 py-4">
                <h2 class="fw-bold text-uppercase mb-0">Edit Enrollment</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="update" class="needs-validation" novalidate>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Category</label>
                        <select v-model="form.status" class="form-select border-0 shadow-sm" required>
                            <option value="active">Active</option>
                            <option value="cancelled">Cancelled</option>
                        </select>
                        <p v-if="errors.status" class="text-danger mt-2 small">{{ errors.status }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="grade" class="form-label fw-semibold text-secondary">Student Grade</label>
                        <input v-model="form.grade" type="number" id="grade" class="form-control form-control-lg border-0 shadow-sm" min="0" max="100">
                        <p v-if="errors.grade" class="text-danger mt-2 small">{{ errors.grade }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 mt-3 shadow fw-semibold transition-all position-relative" :disabled="form.processing">
                        <span v-if="form.processing" class="spinner-border spinner-border-sm me-2"></span>
                        Update Enrollment
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'

const props = defineProps({
    errors: Object,
    enrollment: Object
})

const form = useForm({
    status: props.enrollment.status,
    grade: props.enrollment.grade,
})

function update() {
    router.put(route('admin.enrollments.update', props.enrollment.id), form)
}
</script>

<style scoped>
.transition-all {
    transition: all 0.3s ease-in-out;
}
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
}
.card-header {
    background: linear-gradient(135deg, #007bff, #0056b3);
    border-bottom: none;
}
.form-control:focus {
    box-shadow: 0 0 10px rgba(0, 123, 255, 0.5);
    border-color: #007bff;
}
@media (max-width: 768px) {
    .card {
        padding: 2rem;
    }
    .btn {
        font-size: 1rem;
        padding: 0.75rem;
    }
    .form-control {
        font-size: 1rem;
    }
}
@media (max-width: 480px) {
    .card-header h2 {
        font-size: 1.25rem;
    }
    .btn {
        font-size: 0.9rem;
    }
    .form-control {
        font-size: 0.9rem;
    }
}
</style>
