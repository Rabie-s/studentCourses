<template>
<div class="container mt-5">
        <h2 class="mb-4">Course Checkout</h2>
        
        <div class="row">
            <div class="col-md-6">
                <h4>Selected Course</h4>
                <div class="card p-3">
                    <h5>Course Title: {{ props.course.title }}</h5>
                    <!--<p><strong>Instructor:</strong> John Doe</p>-->
                    <p><strong>Price:</strong> ${{props.course.price}}</p>
                </div>
            </div>
            
            <div class="col-md-6">
                <h4>Billing Details</h4>
                
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input v-model="form.userAddress.first_name" type="text" class="form-control" placeholder="Enter first name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input v-model="form.userAddress.last_name" type="text" class="form-control" placeholder="Enter last name" required>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Country</label>
                        <input v-model="form.userAddress.country" type="text" class="form-control" placeholder="Enter your country" required>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label">Area</label>
                            <input v-model="form.userAddress.area" type="text" class="form-control" placeholder="Enter your area" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone Number</label>
                            <input v-model="form.userAddress.phone_number" type="text" class="form-control" placeholder="Enter phone number" required>
                        </div>
                    </div>
                    <button @click="enroll" type="submit" class="btn btn-primary w-100">Enroll Now</button>
               
            </div>
        </div>
    </div>
</template>

<script setup>
const props = defineProps({ course: Object })
import { useForm,router } from '@inertiajs/vue3'

const form = useForm({
    courseId:props.course.id,
    userAddress:{
        first_name:'',
        last_name:'',
        country:'',
        area:'',
        phone_number:''
    }
})

function enroll() {
    router.post(route('checkout.enrollmentCheckout'),form)
}

</script>