<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-3 p-4 w-100" style="max-width: 900px;">
            <div class="card-header text-center bg-primary text-white rounded-3">
                <h2 class="fw-bold text-uppercase mb-0">Add New Student</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="store">

                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input v-model="form.name" type="text" id="name" class="form-control form-control-lg" required>
                        <p v-if="errors.name" class="text-danger mt-2">{{ errors.name }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Email Address</label>
                        <input v-model="form.email" type="email" id="email" class="form-control form-control-lg" required>
                        <p v-if="errors.email" class="text-danger mt-2">{{ errors.email }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input v-model="form.password" type="password" id="password" class="form-control form-control-lg" required>
                        <p v-if="errors.password" class="text-danger mt-2">{{ errors.password }}</p>
                    </div>

                    <div class="mb-3">
                        <label for="phone_number" class="form-label">Phone Number</label>
                        <input v-model="form.phone_number" type="text" id="phone_number" class="form-control form-control-lg" required>
                        <p v-if="errors.phone_number" class="text-danger mt-2">{{ errors.phone_number }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 py-2 mt-3 shadow-sm transition-all hover-shadow-lg">Add</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ errors: Object })
import { useForm, router } from '@inertiajs/vue3'

const form = useForm({
    name: '',
    email: '',
    password: '',
    phone_number: ''
})

function store() {
    router.post(route('users.store'),form)
    form.reset()
}
</script>
