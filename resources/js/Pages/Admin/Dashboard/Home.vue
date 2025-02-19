<template>
    <div class="container mt-4">
        <div class="row g-4">

            <!-- Total Users Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-primary shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-people-fill fs-1 me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Users</h5>
                            <h3 class="fw-bold">{{ totalUsers }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Revenue Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-success shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-cash-stack fs-1 me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Enrollments</h5>
                            <h3 class="fw-bold">{{ totalEnrollments }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Orders Card -->
            <div class="col-lg-3 col-md-6">
                <div class="card text-white bg-warning shadow-sm h-100">
                    <div class="card-body d-flex align-items-center">
                        <i class="bi bi-cart-fill fs-1 me-3"></i>
                        <div>
                            <h5 class="card-title mb-1">Total Courses</h5>
                            <h3 class="fw-bold">{{ totalCourses }}</h3>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</template>
<script setup>
defineProps({ 'totalUsers':Number,'totalEnrollments':Number,'totalCourses':Number })
</script>


<style scoped>
.card {
    transition: transform 0.2s ease-in-out;
}

.card:hover {
    transform: translateY(-5px);
}
</style>