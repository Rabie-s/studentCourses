<template>
    <div class="container py-5">
        <div class="row row-cols-1 row-cols-md-3 row-cols-lg-4 g-4">
            <div v-for="(course, index) in courses.data" :key="index" class="col">
                <Link :href="route('user.course.show', course.id)" class="text-decoration-none">
                    <div class="card hover-effect h-100 shadow-sm border-0 rounded-3 overflow-hidden">
                        <img :src="course.main_image_url" class="card-img-top" alt="Course image"
                            style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <span class="badge bg-success mb-2 align-self-start px-3 py-1">
                                {{ course.category.title }}
                            </span>
                            <h5 class="card-title fw-bold text-dark">{{ course.title }}</h5>
                            <!--<p class="card-text text-muted small">{{ course.description }}</p>-->
                            <div class="mt-auto d-flex justify-content-between align-items-center">
                                <h4 class="text-primary fw-bold mb-0">${{ course.price }}</h4>
                                <Link :href="route('checkout.index', course.id)" class="btn btn-primary rounded-pill px-4">
                                    Enroll Now
                                </Link>
                            </div>
                        </div>
                    </div>
                </Link>
            </div>
        </div>

        <!-- Pagination -->
        <div v-if="courses.links && courses.links.length > 1" class="mt-4 d-flex justify-content-center">
            <Pagination :links="courses.links" />
        </div>
    </div>
</template>

<script setup>
defineProps({ courses: Object })
import { Link } from '@inertiajs/vue3'
import Pagination from '@/Components/Pagination.vue'
</script>

<style scoped>
.hover-effect {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
}

.hover-effect:hover {
    transform: scale(1.05);
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15);
}
</style>
