<template>
  <nav class="navbar navbar-dark bg-primary fixed-top shadow">
    <div class="container-fluid">
      <!-- Brand Name -->
      <a class="navbar-brand fw-bold text-white d-flex align-items-center gap-2" href="#">
        <i class="bi bi-layout-text-sidebar-reverse fs-4"></i>
        <span>Dashboard</span>
      </a>

      <!-- Toggler Button -->
      <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>

      <!-- Offcanvas Sidebar -->
      <div class="offcanvas offcanvas-start bg-dark text-white shadow-lg rounded-end" id="offcanvasNavbar">
        <div class="offcanvas-header border-bottom">
          <h5 class="offcanvas-title fw-bold d-flex align-items-center gap-2">
            <i class="bi bi-person-circle fs-4"></i>
            <span>Welcome, {{ adminName }}</span>
          </h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column justify-content-between">
          <ul class="navbar-nav gap-3">

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-3 rounded"
                :href="route('dashboard.index')">
                <i class="bi bi-book-fill"></i>
                <span>Home</span>
              </Link>
            </li>

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-3 rounded"
                :href="route('admin.categories.index')">
                <i class="bi bi-book-fill"></i>
                <span>Category</span>
              </Link>
            </li>

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-3 rounded"
                :href="route('users.index')">
                <i class="bi bi-people-fill"></i>
                <span>Students</span>
              </Link>
            </li>

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-3 rounded"
                :href="route('admin.courses.index')">
                <i class="bi bi-book-fill"></i>
                <span>Courses</span>
              </Link>
            </li>

            <li class="nav-item">
              <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-3 rounded"
                :href="route('admin.enrollments.index')">
                <i class="bi bi-mortarboard-fill"></i>
                <span>Enrollments</span>
              </Link>
            </li>
          </ul>

          <!-- Logout Button -->
          <div class="mt-4">
            <button @click="confirmLogout" class="btn btn-danger w-100 d-flex align-items-center justify-content-center py-2 rounded-3 shadow">
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
import { computed } from "vue";
import { Link, usePage, router } from "@inertiajs/vue3";

const page = usePage();

const adminName = computed(() => {
  return page.props.auth.admin ? page.props.auth.admin.name : "Guest";
});

function confirmLogout() {
  if (confirm("Are you sure you want to log out?")) {
    router.post(route("admin.auth.logoutAdmin"));
  }
}
</script>

<style scoped>
/* Sidebar Styling */
.offcanvas {
  max-width: 280px;
  background: linear-gradient(135deg, #1c1f2b, #212534);
  color: white;
}

.nav-link {
  transition: all 0.3s ease;
  border-radius: 8px;
}

.nav-link:hover {
  background: rgba(255, 255, 255, 0.1);
  transform: translateX(5px);
}

/* Logout Button */
.btn-danger {
  font-weight: bold;
  transition: all 0.3s ease;
}

.btn-danger:hover {
  background: #dc3545;
  transform: scale(1.05);
}
</style>
