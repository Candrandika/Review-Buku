<template>
    <div class="container text-center">
        <main class="form-signin w-50 m-auto">
            <form class="mx-5" @submit.prevent="loginSubmit" method="post">
                <h3 class="fw-bolder">ReBook</h3>
                <h4 class="h4 mb-3 fw-normal">Login</h4>

                <div class="form-floating my-2">
                    <input type="email" class="form-control text-left" id="email" v-model="form.email" placeholder="name@example.com">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" class="form-control text-left" id="password" v-model="form.password" placeholder="Password">
                    <label for="password">Password</label>
                </div>

                <div>
                    <label>
                        Belum punya akun? <router-link to="/register">Daftar</router-link>
                    </label>
                </div>
                <button class="btn btn-md btn-warning" type="submit">Login</button>
            </form>
        </main>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                form: {
                    email: '',
                    password: '',
                }
            }
        },
        mounted() {

        },
        methods: {
            loginSubmit() {
                axios.post('/api/login', this.form).then((res) => {
                    console.log(res)
                }).catch((error) => {
                    console.log(error)
                })
            }
        }
    }
</script>