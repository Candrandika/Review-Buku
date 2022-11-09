<template>
    <form @submit.prevent="addBookSubmit" class="d-flex flex-column justify-content-center h-min" action="/api/book/add" method="post" enctype="multipart/form-data">
        <div class="text-center h1 fw-semibold">Tambah Buku</div>
        <div class="row">
            <div class="col-6">
                <div class="form-floating my-2">
                    <input type="text" class="form-control text-left" id="title" v-model="form.title" placeholder="Judul Buku">
                    <label for="title">Judul Buku</label>
                </div>
                <div class="form-floating my-2">
                    <input type="text" class="form-control text-left" id="author" v-model="form.author" placeholder="Nama Penulis">
                    <label for="author">Penulis</label>
                </div>
            </div>
            <div class="col-6">
                <div class="form-floating my-2">
                    <input type="text" class="form-control text-left" id="publisher" v-model="form.publisher" placeholder="Publisher Buku">
                    <label for="publisher">Publisher Buku</label>
                </div>
                <div class="form-floating my-2">
                    <input type="number" class="form-control text-left" id="release" v-model="form.release" min="1000" max="2022" placeholder="2022">
                    <label for="release">Tahun Rilis</label>
                </div>
            </div>
            <div class="col-12 my-2">
                <div class="input-group">
                    <span class="input-group-text" for="description">Deskripsi / Sinopsis</span>
                    <textarea class="form-control" aria-label="Deskripsi / Sinopsis" v-model="form.description" id="description"></textarea>
                </div>
            </div>
            <div class="col-12">
                <label for="image">Foto Buku</label>
                <div class="input-group mb-3">
                    <input type="file" class="form-control" id="image" name="image" v-on:change="handleFileUpload">
                    <!-- v-on:change="handleFileUpload" -->
                </div>
            </div>
        </div>
        <div class="row">
            <button type="submit" class="btn btn-warning">+Tambah Buku</button>
        </div>
        
    </form>
</template>

<script>
    export default {
        http: {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        },
        data() {
            return {
                form: {
                    title: '',
                    publisher: '',
                    author: '',
                    release: '',
                    description: '',
                },
                image: '',
                book_id: ''
            }
        },
        methods: {
            addBookSubmit() {
                const fd = new FormData()
                fd.append('image', this.image, this.image.name)

                axios.post('/api/book/add', this.form).then((response) => {
                    this.book_id = response.data.book_id
                    axios.post('/api/book/image/'+this.book_id , fd).then((res) => {
                        if(res.status == 200){
                            this.$router.push('/book')
                        }
                    }).catch((err) => {
                        console.log(err)
                    })
                }).catch((error) => {
                    console.log(error)
                })
            },
            handleFileUpload(event) {
                this.image = event.target.files[0]                
;            }
        }
    }


</script>