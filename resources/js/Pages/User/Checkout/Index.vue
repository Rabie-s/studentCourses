<template>
  <div class="container mt-5">
    <h2 class="mb-4 text-center text-primary">Course Checkout</h2>

    <div class="row">
      <div class="col-md-6">
        <h4 class="mb-3 text-secondary">Selected Course</h4>
        <div class="card shadow-lg p-4 border-0 rounded">
          <h5 class="fw-bold text-dark">{{ props.course.title }}</h5>
          <p class="text-muted mb-2">Price: <span class="fw-semibold text-success">${{ props.course.price }}</span></p>
        </div>
      </div>

      <div class="col-md-6">
        <h4 class="mb-3 text-secondary">Billing Details</h4>
        <form @submit.prevent="enroll" class="p-4 border rounded shadow-sm bg-light">
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">First Name</label>
              <input v-model="form.userAddress.first_name" type="text" class="form-control border-primary"
                placeholder="Enter first name" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Last Name</label>
              <input v-model="form.userAddress.last_name" type="text" class="form-control border-primary"
                placeholder="Enter last name" required>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label fw-semibold">Country</label>
            <select v-model="form.userAddress.country" class="form-select border-0 shadow-sm" required>
              <option value="" disabled>Select Country</option>
              <option value="jordan">Jordan</option>
            </select>
          </div>
          <div class="row mb-3">
            <div class="col-md-6">
              <label class="form-label fw-semibold">Area</label>
              <input v-model="form.userAddress.area" type="text" class="form-control border-primary"
                placeholder="Enter your area" required>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-semibold">Phone Number</label>
              <input v-model="form.userAddress.phone_number" type="text" class="form-control border-primary"
                placeholder="Enter phone number" required>
            </div>
          </div>
          <button type="submit" class="btn btn-primary w-100 d-flex align-items-center justify-content-center">Enroll
            Now</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm, router } from '@inertiajs/vue3';

const props = defineProps({ course: Object, userAddress: Object });

const form = useForm({
  courseId: props.course.id,
  userAddress: {
    first_name: props.userAddress?.first_name || '',
    last_name: props.userAddress?.last_name || '',
    country: props.userAddress?.country || '',
    area: props.userAddress?.area || '',
    phone_number: props.userAddress?.phone_number || ''
  }
});

function enroll() {
  router.post(route('checkout.enrollmentCheckout'), form);
}
</script>