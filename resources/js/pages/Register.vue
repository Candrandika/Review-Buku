<template>
    <div class="container text-center flex-shrink-0">
        <main class="form-signin w-50 m-auto">
            <form class="mx-5" @submit.prevent="registerSubmit" action="/api/register" method="POST">
                
                <h3 class="fw-bolder">ReBook</h3>
                <h4 class="h4 mb-3 fw-normal">Daftar</h4>

                <div class="form-floating my-2">
                    <input type="email" class="form-control" id="email" v-model="form.email" placeholder="name@example.com">
                    <label for="email">Alamat Email</label>
                </div>
                <div class="form-floating my-2">
                    <input type="text" class="form-control" id="name" v-model="form.name" placeholder="Password">
                    <label for="name">Nama</label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" class="form-control" id="password" v-model="form.password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <div class="form-floating my-2">
                    <input type="password" class="form-control" id="confirm_password" v-model="form.confirm_password" placeholder="Password">
                    <label for="confirm_password" name="confirm_password">Konfirmasi Password</label>
                </div>

                <div>
                    <label>
                        Sudah memiliki akun? <router-link to="/login">Masuk</router-link>
                    </label>
                </div>
                <button class="btn btn-md btn-warning" type="submit">Daftar</button>
            </form>
        </main>
    </div>
</template>

<script>
    export default {
        http: {
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('content')
            }
        },
        data() {
            return {
                form: {
                    email: '',
                    name: '',
                    password: '',
                    confirm_password: ''
                }
            }
        },
        methods: {
            registerSubmit() {
                axios.post('/api/register', this.form).then((response) => {
                    console.log(response);
                }).catch((error) => {
                    console.log(error);
                }) 

                //fetch
                // const response = await fetch('/api/register', {
                //     methods: 'POST',
                //     headers: {
                //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf_token"]').getAttribute('')
                //     },
                //     body: JSON.stringify(data)
                // })
                // return response.json()
            }
        }

    }
</script>