<template>
  <nav class="navbar navbar-dark bg-primary fixed-top shadow">
    <div class="container-fluid">
      <!-- Brand Name -->
      <a class="navbar-brand fw-bold text-white" href="#">
        <i class="bi bi-layout-text-sidebar-reverse"></i> Dashboard
      </a>

      <!-- Toggler Button -->
      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Offcanvas Sidebar -->
      <div class="offcanvas offcanvas-start bg-dark text-white" id="offcanvasNavbar">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title fw-bold">
            <i class="bi bi-person-circle"></i> Your name :{{ adminName }}
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>



        <div class="offcanvas-body d-flex flex-column justify-content-between">
          <ul class="navbar-nav">

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center"
                :href="route('admin.categories.index')">
              <i class="bi bi-book-fill me-2"></i> Category
              </Link>
            </li>

            <!-- Students -->
            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center" :href="route('users.index')">
              <i class="bi bi-people-fill me-2"></i> Students
              </Link>
            </li>

            <!-- Courses -->
            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center"
                :href="route('admin.courses.index')">
              <i class="bi bi-book-fill me-2"></i> Courses
              </Link>
            </li>
          </ul>

          <!-- Logout Button -->
          <div class="mt-4">
            <button @click="logout" class="btn btn-danger w-100 d-flex align-items-center justify-content-center">
              <i class="bi bi-box-arrow-right me-2"></i> Logout
            </button>
          </div>
        </div>
      </div>
    </div>
  </nav>



  <div class="p-4">
    <slot></slot>
  </div>
</template>


<script setup>
defineProps({ auth: Object })
import { Link, usePage, router } from '@inertiajs/vue3';
import { computed } from 'vue'
const page = usePage()

const adminName = computed(() => {
  if (!page.props.auth.admin) {
    return 'Guest'
  }
  return page.props.auth.admin.name
})

function logout() {
  router.post(route('admin.auth.logoutAdmin'));
}

</script>
