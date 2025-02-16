<template>

    <div class="container-fluid vh-100 d-flex flex-column flex-lg-row p-0 bg-white">
      <!-- Image Column - First on mobile, Second on desktop -->
      <div class="order-1 order-lg-2 col-lg-6 h-100">
        <img src="https://images.pexels.com/photos/14939166/pexels-photo-14939166.jpeg" class="img-fluid h-100 w-100 object-fit-cover" alt="Hero image">
      </div>
    
      <!-- Content Column - Second on mobile, First on desktop -->
      <div class="order-2 order-lg-1 col-lg-6 d-flex flex-column justify-content-center gap-4 p-5 p-lg-0 ps-lg-5 pe-lg-4">
        <div class="d-flex flex-column gap-4">
          <h1 class="display-4 fw-bold mb-0 lh-1">
            Medium length hero headline goes here
          </h1>
          
          <p class="fs-5 mb-0 lh-base">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Suspendisse varius enim in eros elementum tristique.
          </p>
        </div>
    
        <div class="d-flex flex-column flex-sm-row gap-3 pt-4">
          <button class="btn btn-dark px-4 py-2 fs-6">
            Primary Action
          </button>
          <button class="btn btn-outline-dark px-4 py-2 fs-6">
            Secondary Action
          </button>
        </div>
      </div>
    </div>
    
    </template>
    <script setup>
    import { Link } from '@inertiajs/vue3'
    </script>
    
    