<template>
    <div class="container d-flex justify-content-center align-items-center min-vh-100 px-3">
        <div class="card shadow-lg rounded-4 p-4 w-100" style="max-width: 600px; background: #f8f9fa; border: none;">
            <div class="card-header text-center bg-gradient bg-primary text-white rounded-top-4 py-4">
                <h2 class="fw-bold text-uppercase mb-0">Update Course</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="update" class="needs-validation" novalidate>
                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Title</label>
                        <input v-model="form.title" type="text" class="form-control form-control-lg border-0 shadow-sm"
                            placeholder="Enter course title" required>
                        <p v-if="errors.title" class="text-danger mt-2 small">{{ errors.title }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Price</label>
                        <input v-model="form.price" type="number"
                            class="form-control form-control-lg border-0 shadow-sm" placeholder="Enter course price"
                            required>
                        <p v-if="errors.price" class="text-danger mt-2 small">{{ errors.price }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Main Image URL</label>
                        <input @input="form.main_image = $event.target.files[0]" ref="inputMainImage" type="file"
                            class="form-control form-control-lg border-0 shadow-sm" required>
                        <p v-if="errors.main_image" class="text-danger mt-2 small">{{ errors.main_image }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Description</label>
                        <QuillEditor v-model:content="form.description" contentType="html" theme="snow" />
                        <p v-if="errors.description" class="text-danger mt-2 small">{{ errors.description }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Category</label>
                        <select v-model="form.category_id" class="form-select border-0 shadow-sm" required>
                            <option value="" disabled>Select a category</option>
                            <option v-for="(category, index) in categories" :key="index" :value="category.id">
                                {{ category.title }}
                            </option>
                        </select>
                        <p v-if="errors.category_id" class="text-danger mt-2 small">{{ errors.category_id }}</p>
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold text-secondary">Teacher</label>
                        <select v-model="form.admin_id" class="form-select border-0 shadow-sm" required>
                            <option value="" disabled>Select a teacher</option>
                            <option v-for="(teacher, index) in teachers" :key="index" :value="teacher.id">
                                {{ teacher.name }}
                            </option>
                        </select>
                        <p v-if="errors.teacher_id" class="text-danger mt-2 small">{{ errors.teacher_id }}</p>
                    </div>

                    <button type="submit"
                        class="btn btn-primary w-100 py-3 mt-3 shadow fw-semibold transition-all position-relative"
                        :disabled="form.processing">
                        <span v-if="form.processing" class="spinner-border spinner-border-sm me-2"></span>
                        Update Course
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3'
import { ref } from 'vue';
import { QuillEditor } from '@vueup/vue-quill'
import '@vueup/vue-quill/dist/vue-quill.snow.css';
const props = defineProps({
    errors: Object,
    course: Object,
    categories: Array,
    teachers: Array
})

const form = useForm({
    title: props.course.title,
    price: props.course.price,
    main_image: null,
    description: props.course.description,
    category_id: props.course.category_id,
    admin_id: props.course.admin_id
})
const inputMainImage = ref(null);

function update() {
    router.post(route('admin.courses.update', props.course.id), {
        _method: 'put',
        forceFormData: true,
        ...form
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
