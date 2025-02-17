<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-3 p-4 w-100" style="max-width: 900px;">
            <div class="card-header text-center bg-primary text-white rounded-3">
                <h2 class="fw-bold text-uppercase mb-0">Add New Category</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="store">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input v-model="form.title" type="text" class="form-control form-control-lg" required>
                        <p v-if="errors.title" class="text-danger mt-2">{{ errors.title }}</p>
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 py-2 mt-3 shadow-sm transition-all hover-shadow-lg">Add</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ errors: Object })
import { useForm, router } from '@inertiajs/vue3'

const form = useForm({
    title: '',
})

function store() {
    router.post(route('admin.categories.store'), form, {
        onSuccess: () => form.reset(),
    })
}
</script>
