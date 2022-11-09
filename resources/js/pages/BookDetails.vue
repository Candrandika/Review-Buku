<template>
    <div class="row mb-2">
        <router-link :to="'/review/'+id" class="btn btn-warning">+ Review Buku</router-link>
    </div>
    <div class="row">
        <div class="col-4 card border-0">
            <img :src="book.image" :alt="book.title" class="rounded">
        </div>
        <div class="col-8 text-center d-flex flex-column justify-content-center">
            <h3 class="fw-bold">{{ book.title }}</h3>
            <div class="text-dark fw-semibold">{{ book.publisher }} - {{ book.release }}</div>
            <div class="text-dark fw-semibold">di tulis oleh {{ book.author }}</div>
            <div class="text-muted">{{ book.description }}</div>
        </div>
    </div>

    <div class="mt-5 text-center fw-bold h4">Review</div>

    <div class="row">
        <div class="col-4 p-0" v-for="review in reviews">
            <div class="card p-3 m-1">
                <div class="fw-semibold mb-2">Review oleh <span class="fw-bold">{{ review.name }}</span></div>
                <div class="text-dark mb-2">
                    {{ review.review }}
                </div>
                <div class="text-end text-muted fw-lighter review-date">{{ review.time }}</div>
            </div>
        </div>
        <div class="col-12" v-if="!reviews.length">
            <div class="text-muted text-center">--- belum ada review ---</div>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['id'],
        data() {
            return {
                book: [],
                reviews: []
            }
        },
        mounted() {
            this.getBook()
            this.getReview()
        },
        methods: {
            getBook() {
                axios.get('/api/book/'+this.id).then((response) => {
                    this.book = response.data.book
                })
            },
            getReview() {
                axios.get('/api/review/'+this.id).then((response) => {
                    this.reviews = response.data.review
                })
            }
        }
    }
</script>