<template>
    <div class="content-wrapper">

        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">MY PROFILE</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">My Profile</li>
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
                            <div class="btn btn-light" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-content="Top popover">
                                <router-link to="#">
                                    <vue3starRatings />
                                </router-link>
                            </div>
                        </div>
                        <div class="card">
                            <div v-for="unit in unitsDone " :key="unit">
                            hello
                            </div>
                            <div class="card-header" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-content="Top popover">
                                <strong>{{ this.unitsDone.unitCode }}</strong>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-content="Top popover">
                                <strong>BAC 2204</strong>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header" data-bs-container="body" data-bs-toggle="popover"
                                data-bs-placement="top" data-bs-content="Top popover">
                                <strong>BAC 2205</strong>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        <div class="card" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
                            data-bs-content="Top popover">
                            <div class="card-header">
                                <strong>BAC 2205</strong>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <p class="card-text">With supporting text below as a natural lead-in to additional content.
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card col-lg-8">
                            <div class="card-header">
                                <h5 class="m-0">Featured</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="card-title">Ooops</h6>
                                <p class="card-text">Working on this
                                </p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </div>
</template>

<script>
import vue3starRatings from "./../components/rating_stars.vue";
export default {
    name: 'MyProfile',
    data() {
        return {
            unitsDone: null,
            error: null,
        }
    },
    components: {
        vue3starRatings
    },
    methods: {
        async currentUser() {
            await axios.get('http://127.0.0.1:8000/admin/details').then(
                response => {
                    const unitsDone = JSON.parse(response.data.user.Units)

                    if (response.user.data.Units) {
                        const error = 'Already registered'
                        this.error = error
                    }
                    this.unitsDone = unitsDone
                    console.log(this.unitsDone)
                }
            )
            for (let i in unitsDone) {
                try {
                    const response = await axios.post('/get/unit/', {
                        Unit: this.unitsDone[i].unitCode
                    })
                    console.log(response.data.unit.unitName)
                    if (response.data.rating == 0) {
                        this.unitsDone[i].rating = 'Please Rate me'
                        this.unitsDone[i].unitName = response.data.unit.unitName
                        this.unitsDone[i].Description = response.data.unit.Description
                    } else {
                        this.unitsDone[i].rating = response.data.rating
                    }
                    console.log(response.data)
                } catch (error) {
                    console.log(error)
                }
            }
        },
    }
}
</script>
