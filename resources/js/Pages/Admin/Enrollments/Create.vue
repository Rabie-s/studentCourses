<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 px-3">
        <div class="card shadow-lg rounded-4 p-4 w-100" style="max-width: 700px; background: #f8f9fa; border: none;">
            <div class="card-header text-center bg-gradient bg-primary text-white rounded-top-4 py-4">
                <h2 class="fw-bold text-uppercase mb-0">Add New Student</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="store" class="needs-validation" novalidate>
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Full Name</label>
                        <input 
                            v-model="form.name" 
                            type="text" 
                            class="form-control form-control-lg border-0 shadow-sm" 
                            placeholder="Enter full name" 
                            required
                        >
                        <p v-if="errors.name" class="text-danger mt-2 small">{{ errors.name }}</p>
                    </div>
                    
                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Email Address</label>
                        <input 
                            v-model="form.email" 
                            type="email" 
                            class="form-control form-control-lg border-0 shadow-sm" 
                            placeholder="Enter email address" 
                            required
                        >
                        <p v-if="errors.email" class="text-danger mt-2 small">{{ errors.email }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Password</label>
                        <input 
                            v-model="form.password" 
                            type="password" 
                            class="form-control form-control-lg border-0 shadow-sm" 
                            placeholder="Enter password" 
                            required
                        >
                        <p v-if="errors.password" class="text-danger mt-2 small">{{ errors.password }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold text-secondary">Phone Number</label>
                        <input 
                            v-model="form.phone_number" 
                            type="text" 
                            class="form-control form-control-lg border-0 shadow-sm" 
                            placeholder="Enter phone number" 
                            required
                        >
                        <p v-if="errors.phone_number" class="text-danger mt-2 small">{{ errors.phone_number }}</p>
                    </div>
                    
                    <button 
                        type="submit" 
                        class="btn btn-primary w-100 py-3 mt-3 shadow fw-semibold transition-all position-relative" 
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing" class="spinner-border spinner-border-sm me-2"></span>
                        Add Student
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'

defineProps({ errors: Object })

const form = useForm({
    name: '',
    email: '',
    password: '',
    phone_number: ''
})

function store() {
    router.post(route('users.store'), form, {
        onSuccess: () => form.reset(),
    })
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
.form-control:focus, .form-select:focus {
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
    .form-control, .form-select {
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
    .form-control, .form-select {
        font-size: 0.9rem;
    }
}
</style>
