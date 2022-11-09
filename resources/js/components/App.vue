<template>
    <header class="p-3 text-bg-dark sticky-top">
        <div class="container">
            <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">
                <router-link to="/" class="d-flex align-items-center mb-2 mb-lg-0 text-white text-decoration-none me-4 fs-4 fw-bolder">
                    ReBook
                </router-link>

                <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    <li><router-link to="/" class="nav-link px-2 text-white">Home</router-link></li>
                    <li><router-link to="/review" class="nav-link px-2 text-white">Review</router-link></li>
                    <li><router-link to="/book" class="nav-link px-2 text-white">Book</router-link></li>
                </ul>

                <div class="text-end">
                    <router-link  to="/login" class="btn btn-outline-light me-2">Login</router-link>
                    <router-link to="/register" class="btn btn-warning">Register</router-link>
                </div>
            </div>
        </div>
    </header>
    <div class="container anu my-3">
        <router-view></router-view>
    </div>
    <footer class="d-flex flex-wrap justify-content-between align-items-center py-3 border-top bg-secondary">
        <div class="container">
            <div class="col-md-4 d-flex align-items-center">
                <span class="mb-3 mb-md-0 text-light">© copyright 2022</span>
            </div>
        </div>
    </footer>
</template>

<script>
    export default {
        data() {
            return {
                auth: '',
                user: {
                    name: '',
                    email: '',
                }
            }
        },
        created(){
            axios.get('/api/auth').then((res) => {
                console.log(res)
            })
        },
        method: {
           
        }
    }
</script>