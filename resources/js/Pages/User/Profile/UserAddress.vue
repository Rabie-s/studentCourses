<template>
    <div class="billing-form container p-4 bg-white rounded shadow-lg">
      <h4 class="mb-4 text-primary fw-bold text-center">Billing Details</h4>
  
      <form @submit.prevent="enroll" class="p-4 border rounded bg-light shadow-sm">
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">First Name</label>
            <input v-model="form.first_name" type="text" class="form-control form-control-lg text-capitalize border-primary"
              placeholder="Enter first name" required>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Last Name</label>
            <input v-model="form.last_name" type="text" class="form-control form-control-lg text-capitalize border-primary"
              placeholder="Enter last name" required>
          </div>
        </div>
  
        <div class="mb-3">
          <label class="form-label fw-semibold">Country</label>
          <select v-model="form.country" class="form-select form-select-lg border-0 shadow-sm" required>
            <option value="" disabled>Select Country</option>
            <option v-for="country in countries" :key="country.code" :value="country.name">
              {{ country.name }}
            </option>
          </select>
        </div>
  
        <div class="row mb-3">
          <div class="col-md-6">
            <label class="form-label fw-semibold">Area</label>
            <input v-model="form.area" type="text" class="form-control form-control-lg border-primary"
              placeholder="Enter your area" required>
          </div>
          <div class="col-md-6">
            <label class="form-label fw-semibold">Phone Number</label>
            <input v-model="form.phone_number" type="text" class="form-control form-control-lg border-primary"
              placeholder="Enter phone number" required>
          </div>
        </div>
  
    <!--    <button type="submit" class="btn btn-primary btn-lg w-100 d-flex align-items-center justify-content-center">
          Enroll Now
        </button>-->
      </form>
    </div>
  </template>
  
  <script setup>
  import { useForm, router } from '@inertiajs/vue3';
  import { ref } from 'vue';
  
  const props = defineProps({ userAddress: Object });
  
  const form = useForm({
    first_name: props.userAddress?.first_name || '',
    last_name: props.userAddress?.last_name || '',
    country: props.userAddress?.country || '',
    area: props.userAddress?.area || '',
    phone_number: props.userAddress?.phone_number || ''
  });
  
  // Dynamic country list
  const countries = ref([
    { code: 'JO', name: 'Jordan' },
    { code: 'US', name: 'United States' },
    { code: 'CA', name: 'Canada' },
    { code: 'GB', name: 'United Kingdom' },
    { code: 'FR', name: 'France' },
    { code: 'DE', name: 'Germany' },
    { code: 'AU', name: 'Australia' },
    { code: 'IN', name: 'India' }
  ]);
  
  function enroll() {
    router.post(route('checkout.enrollmentCheckout'), form);
  }
  </script>
  
  <style scoped>
  .billing-form {
    max-width: 600px;
    margin: auto;
  }
  
  .btn-primary {
    transition: all 0.3s ease-in-out;
  }
  
  .btn-primary:hover {
    background-color: #0056b3;
    transform: scale(1.02);
  }
  </style>
  