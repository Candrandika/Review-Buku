import { createRouter, createWebHistory } from "vue-router";


import Home from '../pages/Home.vue'
import Login from '../pages/Login.vue'
import Register from '../pages/Register.vue'
import Book from '../pages/Book.vue'
import AddBook from '../pages/AddBook.vue'
import AddReview from '../pages/AddReview.vue'
import BookDetails from '../pages/BookDetails.vue'
import Review from '../pages/Review.vue'
import NotFound from '../pages/NotFound.vue'

const routes = [
    {
        path: '/',
        name: 'Home',
        component: Home
    },
    {
        path: '/login',
        name: 'Login',
        component: Login
    },
    {
        path: '/register',
        name: 'Register',
        component: Register
    },
    {
        path: '/book',
        name: 'Book',
        component: Book,
    },
    {
        path: '/book/add',
        name: 'AddBook',
        component: AddBook,
    },
    {
        path: '/book/:id',
        name: 'BookDetails',
        component: BookDetails,
        props: true
    },
    {
        path: '/review',
        name: 'Review',
        component: Review
    },
    {
        path: '/review/:id',
        name: 'AddReview',
        component: AddReview,
        props: true
    },
    {
        path: '/:pathMatch/*)*',
        name: 'NotFound',
        component: NotFound
    },

]

const router = createRouter ({
    history: createWebHistory(),
    routes,
})

export default router