<template>
    <div class="row">
        <div class="col-lg-6">
            <router-link to="/admin/class&teachers">
                <strong>
                    <div class="error danger text-center text-danger text-uppercase text-lg">{{ this.error }}</div>
                </strong>
            </router-link>
            <div class="card card-primary card-outline" v-for="(unit, index) in Units" :key="index">

                <strong>{{ unit.unitCode }} - {{ unit.unitName }}</strong>
                <br>
                My Rating:
                <div class=" p-2 flex-wrap d-flex justify-content-end">
                    <span class="right badge badge-danger fw-light" v-if="students.rating < 2.5">Rating below 2.5</span>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="m-0">Featured</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Special title treatment</h6>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h5 class="m-0">Featured</h5>
                </div>
                <div class="card-body">
                    <h6 class="card-title">Special title treatment</h6>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.
                    </p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Units',
    prop: {
        rating: 1.2,
    },
    data() {
        return {
            Units: [],
            students: [],
            error: null

        }
    },
    mounted() {
        this.getCourses()
        // this.getAllmembers()
    },
    methods: {
        async getCourses() {
            try {
                const response = await axios.get('http://127.0.0.1:8000/admin/details');
                const Units = response.data.user.Units;

                if (!Units) {
                    const error = 'Please Register your units';
                    this.error = error;
                } else {
                    this.Units = JSON.parse(Units);
                    console.log(this.Units);
                }
            } catch (error) {
                console.error('Error fetching data:', error);

                // Handle the error as needed, for example, set an error message
                this.error = 'An error occurred while fetching data.';
            }
        },

        // async getAllmembers() {
        //     await axios
        //         .get('/my-class')
        //         .then(
        //             response => this.students = response.data,
        //             this.showTable = !this.showTable
        //         )

        //         .catch(error => console.error(error))
        // }
    }
}
</script>
