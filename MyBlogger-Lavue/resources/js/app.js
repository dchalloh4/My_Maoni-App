import './bootstrap';

import 'admin-lte/plugins/jquery/jquery.min.js';

import 'admin-lte/plugins/bootstrap/js/bootstrap.bundle.min.js';

import 'admin-lte/dist/js/adminlte.min.js'

import vue3StarRatings from "vue3-star-ratings";

import { createApp} from 'vue/dist/vue.esm-bundler.js';

import { createRouter, createWebHistory } from 'vue-router';

import Routes from './routes';
import axios from 'axios';

axios.defaults.baseURL = 'http://127.0.0.1:8000/api/admin';

const app  = createApp({});

const router = createRouter({
    routes: Routes,
    history: createWebHistory(),
});


app.use(router)
app.mount('#app')
// .component("vue3-star-ratings", vue3StarRatings);
