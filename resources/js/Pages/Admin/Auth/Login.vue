<template>
        <FlashMessage v-if="$page.props.flash.message" :type="$page.props.flash.message.type"
        :message="$page.props.flash.message.message" />

    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4 w-100" style="max-width: 400px;">
            <div class="card-header text-center bg-primary text-white">
                <h2 class="fw-bold text-uppercase mb-0">Admin Auth</h2>
            </div>
            <div class="card-body">
                <form @submit.prevent="login">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input v-model="form.email" type="email" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPassword1" class="form-label">Password</label>
                        <input v-model="form.password" type="password" class="form-control" id="exampleInputPassword1"
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Login</button>
                </form>
            </div>
        </div>
    </div>
    
    
    
    
    </template>
    <script setup>
    import { useForm,router } from '@inertiajs/vue3'
    import FlashMessage from '@/Components/FlashMessage.vue'
    const form = useForm({
        email: '',
        password: ''
    })
    
    function login(){
        router.post(route('admin.auth.loginAdmin'),form)
    }
    
    
    
    </script>