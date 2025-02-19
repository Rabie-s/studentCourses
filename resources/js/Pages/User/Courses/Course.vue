<template>
    <div class="container mt-5">
        <div class="row g-4">
            <!-- Image Carousel Section -->
            <div class="col-md-6 d-flex justify-content-center">
                <div id="productCarousel" class="carousel slide w-100" data-bs-ride="carousel">
                    <div class="carousel-inner">

                        <img :src="course.main_image_url" class="d-block w-100 rounded-3" alt="Product Image"
                            style="max-height: 400px; object-fit: cover;">

                    </div>
                    <!-- Carousel Controls -->
                    <button class="carousel-control-prev" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#productCarousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    </button>
                </div>
            </div>

            <!-- Product Details Section -->
            <div class="col-md-6">
                <!-- Product Title, Category, and Price -->
                <div>
                    <h6 class="text-muted text-uppercase">
                        {{ course.category.title }}
                    </h6>
                    <h1 class="fw-bold text-dark mt-2">
                        {{ course.title }}
                    </h1>
                    <span class="fs-3 fw-bold text-primary mt-3 d-block">
                        ${{ course.price }}
                    </span>
                </div>

                <hr>

                <div class="mt-4">
                    <Link :href="route('checkout.index', course.id)" @click="enroll" type="button"
                        class="btn btn-primary w-100 d-flex align-items-center justify-content-center">
                        Enroll
                    </Link>
                </div>

                <!-- Product Description -->
                <div class="mt-4">
                    <h2 class="h4 fw-semibold mb-3">
                        Description
                    </h2>
                    <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                        <span v-html="course.description"></span>
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({ course: Object })
import { Link } from '@inertiajs/vue3'

</script>

<style scoped>
/* Responsive spacing adjustments */
@media (max-width: 768px) {
    .carousel {
        max-width: 100%;
    }
}
</style>
