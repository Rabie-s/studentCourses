<template>
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm py-2">
    <div class="container-fluid">
      <Link class="navbar-brand fw-bold text-uppercase" :href="route('user.home')">
        Ddsgnr
      </Link>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <Link class="nav-link fw-semibold" :href="route('user.home')">Home</Link>
          </li>
          <li class="nav-item">
            <Link class="nav-link fw-semibold" :href="route('user.course.index')">Courses</Link>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle fw-semibold" href="#" role="button" data-bs-toggle="dropdown">
              Categories
            </a>
            <ul class="dropdown-menu">
              <li v-for="(category,index) in $page.props.categories" :key="index">
                <a class="dropdown-item" :href="route('user.course.showCoursesByCategories',category.id)">
                  {{category.title}}
                </a>
              </li>
            </ul>
          </li>
        </ul>

        <template v-if="page.props.auth.user">
          <div class="navbar-nav ms-3">
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" role="button" data-bs-toggle="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor"
                  class="bi bi-person-circle me-1" viewBox="0 0 16 16">
                  <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                  <path fill-rule="evenodd"
                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                </svg>
                <span class="text-nowrap">{{ userName }}</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
                <li><h6 class="dropdown-header">Welcome, {{userName}}</h6></li>
                <li><a class="dropdown-item" :href="route('user.profile.userEnrollments')">Profile</a></li>
                <li><a class="dropdown-item" href="#">Settings</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item text-danger" role="button" @click="logout">Logout</a></li>
              </ul>
            </li>
          </div>
        </template>

        <template v-else>
          <div class="d-flex ms-3">
            <Link class="btn btn-outline-light me-2 px-3 fw-semibold" :href="route('user.auth.showLoginForm')">
              Login
            </Link>
            <Link class="btn btn-primary px-3 fw-semibold" :href="route('user.auth.showRegistrationForm')">
              Sign Up
            </Link>
          </div>
        </template>
      </div>
    </div>
  </nav>
</template>

<script setup>
defineProps({ auth: Object })
import { computed } from 'vue';
import { usePage, Link, router } from '@inertiajs/vue3';

const page = usePage();
const userName = computed(() => {
  return page.props.auth.user ? page.props.auth.user.name : 'Guest';
});

function logout() {
  router.post(route('user.auth.logoutUser'));
}
</script>

<style scoped>
.navbar-nav .nav-link:hover {
  color: #f8f9fa !important;
  text-decoration: underline;
}
.dropdown-menu {
  min-width: 200px;
}
</style>
