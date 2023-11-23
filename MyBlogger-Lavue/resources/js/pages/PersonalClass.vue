<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Personal Class</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Personal Class</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-10">
                        <div class="card">
                            <table id="selectedColumn" class="table table-borderless caption-top">
                                <caption>List of users</caption>
                                <thead class="">
                                    <tr>
                                        <th class="th-sm" scope="col">#</th>
                                        <th scope="col" class="th-sm"></th>
                                        <th scope="col" class="th-sm">Rating</th>
                                        <th scope="col" class="th-sm">Name</th>
                                        <th scope="col" class="th-sm">Email</th>
                                        <th scope="col" class="th-sm">Contact</th>
                                        <!-- <th scope="col">Handle</th> -->
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(student, index) in students" :key="student.id">
                                        <td>{{ index + 1 }}</td>
                                        <td>
                                            <div v-if="student.is_class_rep == true">
                                                <router-link to="/admin/feedback">
                                                    <span class="right badge badge-danger">Class Leader</span>
                                                    <i class="fa fa-star-half-o" aria-hidden="true"></i>
                                                </router-link>
                                            </div>
                                        </td>
                                        <td class="badge text-wrap"
                                            :class="{ 'bg-red': student.rating < 1.2, 'bg-blue': student.rating >= 1.2 }">
                                            {{ student.rating }}</td>
                                        <td>{{ student.name }}</td>
                                        <td>{{ student.email }}</td>
                                        <td>{{ student.Contact }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>
</template>

<script>
import { onMounted, ref } from 'vue';

import axios from 'axios';
export default {
    name: 'PersonalClass',
    data() {
        return {
            students: [],
            showTable: false,
            is_class_rep: null,
        }
    },
    mounted() {
        this.getAllmembers()
    },
    methods: {
        async getAllmembers() {
            await axios
                .get('/my-class')
                .then(
                    response => this.students = response.data,
                    this.showTable = !this.showTable
                )

                .catch(error => console.error(error))
        }
    }
}
</script>
