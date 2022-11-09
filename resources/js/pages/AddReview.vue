<template>
    <form @submit.prevent="addReviewSubmit" class="d-flex flex-column justify-content-center h-min" action="/api/book/add" method="post" enctype="multipart/form-data">
        <div class="text-center h1 fw-semibold">Review Buku</div>
        <div class="text-center h4 text-muted">{{ book.title }} ({{ book.release }})</div>
        <div class="row">
            <div class="col-12">
                <div class="form-floating my-2">
                    <input type="text" class="form-control text-left" id="user" value="Candra" readonly>
                    <label for="title">Nama User</label>
                </div>
            </div>
            <div class="col-12 my-2">
                <div class="input-group">
                    <span class="input-group-text" for="description">Review</span>
                    <textarea class="form-control" aria-label="Review" v-model="form.review" id="description"></textarea>
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
        props: ['id'],
        http: {
            headers: {
                'Content-Type': 'multipart/form-data'
            }
        },
        data() {
            return {
                form: {
                    review: '',
                },
                book: [],
            }
        },
        mounted() {
            this.getBook()
        },
        methods: {
            getBook() {
                axios.get('/api/book/'+this.id).then((response) => {
                    this.book = response.data.book
                })
            },
            addReviewSubmit() {
                axios.post('/api/review/'+this.id, this.form).then((response) => {
                    this.$router.push('/book/'+this.id)
                }).catch((error) => {
                    console.log(error)
                })
            },
        }
    }


</script>