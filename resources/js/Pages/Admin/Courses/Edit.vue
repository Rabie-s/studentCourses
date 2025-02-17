<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg rounded-3 p-4 w-100" style="max-width: 900px;">
            <div class="card-header text-center bg-primary text-white rounded-3">
                <h2 class="fw-bold text-uppercase mb-0">Update Course</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="update">

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
                            <option value="" disabled>Select a category</option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                {{ category.title }}
                            </option>
                        </select>
                        <p v-if="errors.category_id" class="text-danger mt-2">{{ errors.category_id }}</p>
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Teacher</label>
                        <select v-model="form.admin_id" class="form-select" required>
                            <option value="" disabled>Select a teacher</option>
                            <option v-for="(teacher, index) in teachers" :key="index" :value="teacher.id">
                                {{ teacher.name }}
                            </option>
                        </select>
                        <p v-if="errors.teacher_id" class="text-danger mt-2">{{ errors.teacher_id }}</p>
                    </div>

                    <button type="submit" class="btn btn-success w-100 py-2 mt-3 shadow-sm">Update</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'

// Get props
const props = defineProps({
    errors: Object,
    course: Object,
    categories: Array,
    teachers: Array
})

// Pre-fill the form with existing course data
const form = useForm({
    title: props.course.title,
    price: props.course.price,
    main_image: props.course.main_image,
    description: props.course.description,
    category_id: props.course.category_id,
    admin_id: props.course.admin_id
})

// Function to update the course
function update() {
    router.put(route('admin.courses.update', props.course.id), form)
}
</script>
