<template>
    <div class="container p-5">
        <div class="row row-cols-1 row-cols-md-4 g-4">

            <div v-for="(course,index) in courses.data" class="col">
                <div class="card h-100 shadow-lg border-0">
                    <img :src="course.main_image"
                        class="card-img-top rounded-top" alt="Course image">
                    <div class="card-body d-flex flex-column">
                        <!-- Category Badge -->
                        <span class="badge bg-success mb-2 align-self-start">{{course.category.title}}</span>

                        <h5 class="card-title fw-bold">{{course.title}}</h5>
                        <p class="card-text text-muted">{{course.description}}</p>

                        <!-- Price and button section -->
                        <div class="mt-auto d-flex justify-content-between align-items-center">
                            <h4 class="text-primary fw-bold mb-0">{{ course.price }}</h4>
                            <Link :href="route('checkout.index',course.id)" class="btn btn-primary">Enroll Now</Link>
                        </div>
                    </div>
                </div>

            </div>



        </div>

        <div v-if="courses.links && courses.links.length > 1" >
            <Pagination :links="courses.links" />
        </div>

    </div>


</template>
<script setup>
defineProps({ courses: Object })
import { Link } from '@inertiajs/vue3'

import Pagination from '@/Components/Pagination.vue'
</script>