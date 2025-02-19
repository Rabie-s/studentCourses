<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-4 p-5 w-100" style="max-width: 900px;">
            <div class="card-header text-center bg-gradient bg-primary text-white rounded-4">
                <h2 class="fw-bold text-uppercase mb-0">Update Student</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="update">
                    
                    <div class="mb-4">
                        <label for="name" class="form-label fw-semibold">Full Name</label>
                        <input v-model="form.name" type="text" id="name" class="form-control form-control-lg rounded-3" required>
                        <p v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="email" class="form-label fw-semibold">Email Address</label>
                        <input v-model="form.email" type="email" id="email" class="form-control form-control-lg rounded-3" required>
                        <p v-if="errors.email" class="text-danger mt-2">{{ errors.email }}</p>
                    </div>

                    <div class="mb-4">
                        <label for="phone_number" class="form-label fw-semibold">Phone Number</label>
                        <input v-model="form.phone_number" type="text" id="phone_number" class="form-control form-control-lg rounded-3" required>
                        <p v-if="errors.phone_number" class="text-danger mt-2">{{ errors.phone_number }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-3 mt-4 shadow-lg fw-bold text-uppercase">Update Student</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ errors: Object, user: Object })
import { useForm, router } from '@inertiajs/vue3'

const form = useForm({
    name: props.user.name,
    email: props.user.email,
    phone_number: props.user.phone_number
})

function update() {
    router.put(route('users.update', props.user.id), form)
    form.reset()
}
</script>

<style scoped>
/* Form Styling Enhancements */
.form-label {
    font-size: 1.1rem;
}

.form-control {
    border-radius: 8px;
    padding: 10px;
    font-size: 1rem;
}

.btn {
    transition: all 0.3s ease;
}

.btn:hover {
    transform: translateY(-2px);
}
</style>
