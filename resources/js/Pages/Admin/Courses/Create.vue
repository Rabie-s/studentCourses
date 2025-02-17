<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-3 p-4 w-100" style="max-width: 900px;">
            <div class="card-header text-center bg-primary text-white rounded-3">
                <h2 class="fw-bold text-uppercase mb-0">Add New Course</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="store">

                    <div class="mb-3">
                        <label class="form-label">Title</label>
                        <input v-model="form.title" type="text" class="form-control form-control-lg" required>
                        <p v-if="errors.title" class="text-danger mt-2">{{ errors.title }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Price</label>
                        <input v-model="form.price" type="number" class="form-control form-control-lg" required>
                        <p v-if="errors.price" class="text-danger mt-2">{{ errors.price }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Main Image</label>
                        <input v-model="form.main_image" type="text" class="form-control form-control-lg" required>
                        <p v-if="errors.main_image" class="text-danger mt-2">{{ errors.main_image }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea v-model="form.description" class="form-control" rows="3"></textarea>
                        <p v-if="errors.description" class="text-danger mt-2">{{ errors.description }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select v-model="form.category_id" class="form-select" required>
                            <option value="" disabled selected>Select a category</option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                {{ category.title }}
                            </option>
                        </select>
                        <p v-if="errors.category_id" class="text-danger mt-2">{{ errors.category_id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teacher</label>
                        <select v-model="form.admin_id" class="form-select" required>
                            <option value="" disabled selected>Select a teacher</option>
                            <option v-for="(teacher, index) in teachers" :key="index" :value="teacher.id">
                                {{ teacher.name }}
                            </option>
                        </select>
                        <p v-if="errors.teacher_id" class="text-danger mt-2">{{ errors.teacher_id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Hide</label>
                        <select v-model="form.active" class="form-select" required>
                            <option value="" disabled selected></option>
                            <option :value="true">True</option>
                            <option :value="false">False</option>
                        </select>
                        <p v-if="errors.teacher_id" class="text-danger mt-2">{{ errors.teacher_id }}</p>
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 py-2 mt-3 shadow-sm transition-all hover-shadow-lg">Add</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ errors: Object, categories: Array, teachers: Array })
import { useForm, router } from '@inertiajs/vue3'

const form = useForm({
    title: '',
    price: '',
    main_image: '',
    description: '',
    category_id: '',
    admin_id: '',
    active:true
})

function store() {
    router.post(route('admin.courses.store'), form, {
        onSuccess: () => form.reset(),
    })
}
</script>
