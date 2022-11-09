<template>
    <div>
        <div class="row">
            <router-link to="/book/add" class="btn btn-warning">+Tambah Buku</router-link>
        </div>
        <div class="row">
            <div class="col-4 my-2" v-for="book in books">
                <router-link :to="'/book/'+book.id" class="text-dark text-decoration-none">
                    <div class="card">
                        <img :src="book.image" class="card-img-top image-book">
                        <div class="card-body">
                            <h5 class="card-title text-bold">{{ book.title }}</h5>
                            <div class="card-text">
                                <div class="text-bold text-muted">Penerbit : {{ book.publisher }}</div>
                                <div class="text-bold text-muted">Penulis : {{ book.author }}</div>
                                <div class="text-bold text-muted">Tahun Terbit : {{ book.release }}</div>
                            </div>
                        </div>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                books: []
            }
        },
        watch: {
            '$route':'getBooks'
        },
        mounted() {
            this.getBooks()
        },
        methods: {
            getBooks() {
                axios.get('/api/books').then((response) => {
                    this.books = response.data.data
                })
            }
        }
    }


</script>