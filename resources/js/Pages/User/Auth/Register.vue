<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4 w-100" style="max-width: 400px;">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="fw-bold text-uppercase mb-0">Register</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="register">

                    <div class="mb-3">
                        <label class="form-label">Full name</label>
                        <input v-model="form.name" type="text" class="form-control" required>
                        <p v-if="errors.name" class="text-danger">{{ errors.name }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email address</label>
                        <input v-model="form.email" type="email" class="form-control" aria-describedby="emailHelp"
                            required>
                            <p v-if="errors.email" class="text-danger">{{ errors.email }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input v-model="form.password" type="password" class="form-control" required>
                        <p v-if="errors.password" class="text-danger">{{ errors.password }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Phone number</label>
                        <input v-model="form.phone_number" type="text" class="form-control" required>
                        <p v-if="errors.phone_number" class="text-danger">{{ errors.phone_number }}</p>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Register</button>
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

function register() {
    router.post(route('user.auth.registerUser'), form)
}


</script>