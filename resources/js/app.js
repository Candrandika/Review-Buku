import './bootstrap';

import { createApp } from 'vue';

// const app = createApp({});
import app from './components/App.vue';

// import ExampleComponent from './components/ExampleComponent.vue';
// import HeaderComponent from './components/Header.vue';
// import FooterComponent from './components/Footer.vue';

// app.component('example-component', ExampleComponent);
// app.component('header-component', HeaderComponent);
// app.component('footer-component', FooterComponent);

import router from './router'

createApp(app).use(router).mount('#app')