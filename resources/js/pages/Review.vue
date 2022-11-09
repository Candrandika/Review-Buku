<template>
    <div>
        <div class="row">
            <router-link to="/book/add" class="btn btn-warning">+Tambah Buku</router-link>
        </div>
        <div class="row">
            <div class="col-4 my-2" v-for="review in reviews">
                <router-link :to="'/book/'+review.id" class="text-dark text-decoration-none">
                    <div class="card">
                        <img :src="review.image" class="card-img-top image-book">
                        <div class="card-body">
                            <h5 class="card-title text-bold">{{ review.title }}</h5>
                            <div class="card-text">
                                <div class="text-bold text-muted">{{ review.review }}</div>
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
                reviews: []
            }
        },
        watch: {
            '$route':'getReviews'
        },
        mounted() {
            this.getReviews()
        },
        methods: {
            getReviews() {
                axios.get('/api/reviews').then((response) => {
                    this.reviews = response.data.review
                })
            }
        }
    }


</script>