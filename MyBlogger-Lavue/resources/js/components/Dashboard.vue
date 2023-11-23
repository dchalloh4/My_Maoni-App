<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Dashboard</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="btn btn-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                        data-bs-content="Top popover">
                        <div class="login_frm">
                            <Login v-if="!isLoggedin" />
                        </div>
                        <router-link to="/admin/profile">
                           <vue3starRatings />
                        </router-link>
                    </div>
                </div>
                <br>
            </div>
        </div>
        <p class="text-lg text-uppercase ">My Units</p>
        <units />
    </div>
</template>

<script>
import vue3starRatings from './rating_stars.vue';
import units from './../pages/units.vue';
import Login from './../pages/Login.vue'
import axios from 'axios';
export default {
    name: 'Dashboard',
    data() {
        return {
            rating: '',
            showTable: false,
            unitDescription: [],
            user: null,
            units: [],
            // userData: window.userData,
        }
    },
    components: {
        vue3starRatings,
        units,
    },
    computed: {
        async isLoggedin() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/admin/details')
                // console.log(response)
                this.user = response.data.user;
                this.rating = response.data.user.rating;

            } catch (error) {
                console.error(error);
                return false;
            }
        }
    },
    mounted() {
        this.getSession()
    },
    methods: {

        async getSession() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/admin/details')
                console.log(response)
                this.user = response.data.user;
                this.rating = response.data.user.rating;
                this.units = response.data.user.Units

            } catch (error) {
                console.error(error);
            }
        },
        async units() {

        }
    }
}
</script>
