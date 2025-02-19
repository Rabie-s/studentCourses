<template>
  <div class="d-flex">
    <!-- Toggle Button (Now on the Top-Right and Always Visible) -->
    <button class="btn btn-dark position-fixed top-5 end-0 m-4" @click="toggleSidebar">
      ☰
    </button>

    <!-- Sidebar -->
    <nav v-if="isSidebarOpen" class="sidebar bg-dark text-white vh-100 position-fixed shadow-sm" style="width: 280px;">
      <div class="sidebar-header border-bottom border-secondary p-4 d-flex justify-content-between align-items-center">
        <h5 class="fw-bold d-flex align-items-center gap-2">
          <i class="bi bi-person-circle fs-4"></i>
          <span>Welcome, User</span>
        </h5>
        <!-- Close Button (Now Always Visible) -->
        <button class="btn btn-outline-light" @click="toggleSidebar">
          ✕
        </button>
      </div>

      <div class="sidebar-body d-flex flex-column justify-content-between p-3">
        <ul class="nav flex-column gap-2">
          <li class="nav-item">
            <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-2 rounded" :href="route('user.profile.index')">
              <i class="bi bi-book-fill"></i>
              <span>My Profile</span>
            </Link>
          </li>

          <li class="nav-item">
            <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-2 rounded" :href="route('user.profile.userEnrollments')">
              <i class="bi bi-people-fill"></i>
              <span>My Enrollments</span>
            </Link>
          </li>

          <li class="nav-item">
            <Link class="nav-link text-white fw-semibold d-flex align-items-center gap-2 p-2 rounded" :href="route('user.profile.userAddress')">
              <i class="bi bi-people-fill"></i>
              <span>My Billing Address</span>
            </Link>
          </li>
        </ul>

      </div>
    </nav>



    <!-- Main Content -->
    <main class="main-content flex-grow-1 p-4">
      <slot></slot>
    </main>
  </div>
</template>

<script setup>
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const isSidebarOpen = ref(true);

const toggleSidebar = () => {
  isSidebarOpen.value = !isSidebarOpen.value;
};

const handleLogout = () => {
  console.log("Logout clicked");
};
</script>

<style scoped>
/* Sidebar Styling */
.sidebar {
  background-color: var(--bs-dark);
  z-index: 1050;
}

.nav-link {
  transition: all 0.3s ease;
  border-radius: 6px;
}

.nav-link:hover {
  background-color: rgba(255, 255, 255, 0.1);
  transform: translateX(5px);
}

/* Logout Button */
.btn-outline-light {
  font-weight: bold;
  transition: all 0.3s ease;
}

.btn-outline-light:hover {
  background-color: var(--bs-light);
  color: var(--bs-dark);
  transform: scale(1.05);
}

/* Main Content Adjustment */
.main-content {
  margin-left: 280px; /* Default for larger screens */
}



button.position-fixed:hover {
  transform: scale(1.1);
}

/* Overlay to Close Sidebar */
.overlay {
  position: fixed;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.5);
  z-index: 1049;
}
</style>
