<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">CLASS & LECTURES</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">CLASS & LECTURES</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>


        <div class="content">
            <div class="container-fluid">
                <div class="row ">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-header">
                                <strong class="text-uppercase">Unit Selection</strong>
                            </div>
                            <div class="card-body">
                                <!-- <h5 class="card-title">Special title treatment</h5> -->
                                <p class="card-text">Below is a the Units offered please choose between <strong>3-5
                                        Units.</strong>
                                </p>
                                <div class="">
                                    <strong class="chosen btn badge bg-blue btn-sm mr-2"
                                        v-for="(selected_unit, index) in selected_units" :key="index">
                                        {{ selected_unit.unitCode }}-{{ selected_unit.unitName }}
                                    </strong>
                                    <br>
                                    <strong class="text text-danger text-uppercase text-center">{{ this.error }}</strong>
                                    <hr class="hr" />
                                    <div class="btn-submit d-flex justify-content-center"
                                        v-if="selected_units.length >= 3 && !this.error">
                                        <button class="badge bg-yellow btn-md text-uppercase"
                                            @click="submitUnits">submit</button>
                                    </div>
                                </div>
                                <h4>
                                    <strong class="btn badge bg-light btn-sm" @click="unit_selected(Unit)"
                                        v-for="(Unit, index) in Units" :key="index">
                                        {{ Unit.unitCode }} - {{ Unit.unitName }}</strong>
                                </h4>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card col-lg-8">
                            <div class="card-header">
                                <h5 class="m-0">My Units</h5>
                            </div>
                            <div class="card-body" v-for="(unit, index) in unitsDone" :key="index">
                                <h6 class="card-title">{{ unit.unitCode }}</h6><br>
                                <div class="d-flex justify-content-between">
                                    <p class="card-text ">{{ unit.unitName }}</p>
                                    <div class="align-items-right justify-content-right text-right">
                                        <strong :class="['badge', 'text-uppercase', 'text-lg', (unit.rating == 'Please Rate me' ? 'text-danger' : 'text-success')]">{{ unit.rating }}</strong>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-right align-items-right">
                                    <router-link
                                    v-if="unit.rating == 'Please Rate me'"
                                        :to="{ name: 'admin.feedback', params: { unitCode: unit.unitCode, unitName: unit.unitName } }"
                                        class="btn btn-primary">Rate</router-link>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Class_Teacher',
    props: {
        chosen_units: [],
    },
    data() {
        return {
            Units: [],
            selected_units: [],
            user_data: {},
            error: '',
            unitsDone: null,
        }
    },
}
</script>

