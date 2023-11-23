<template>
    <div class="container">
        <div class="card p-4">
            <div>

                <body>
                    <div class="container d-flex justify-contents-center p-9">
                        <div class="text-uppercase text-yellow">
                            <h1 class="text-yellow">My Maoni App</h1>
                        </div>
                        <div class="card">
                            <form method="POST">
                                <!-- @csrf -->
                                <div class="form-outline">
                                    <input type="email" v-model="email" name="email" placeholder="EMAIL" id="form2Example1"
                                        class="form-control" />
                                    <label class="form-label" for="form2Example1"></label>
                                </div>

                                <!-- Password input -->
                                <div class="form-outline ">
                                    <input type="password" v-model="password" id="form2Example2" name="password"
                                        placeholder="PASSWORD" class="form-control" />
                                    <label class="form-label" for="form2Example2"></label>
                                </div>

                                <!-- 2 column grid layout for inline styling -->
                                <div class="row mb-4">
                                    <div class="col ">
                                        <!-- Checkbox -->
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="" id="form2Example31"
                                                checked />
                                            <label class="form-check-label" for="form2Example31"> Remember me </label>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <!-- Simple link -->
                                        <a href="#!">Forgot password?</a>
                                    </div>
                                </div>

                                <!-- Submit button -->
                                <div class="btn btn-submit d-flex justify-contents-center">
                                    <button type="submit" @click="submit()"
                                        class="btn badge btn-primary mb-4 text-uppercase">
                                        <h5>Login</h5>
                                    </button>
                                </div>

                                <!-- Register buttons -->
                            </form>
                        </div>
                    </div>
                </body>
            </div>

            <!-- <div class="btn-submit d-flex justify-content-center">
                <button class="badge bg-light wrap" type="submit">Yes</button>
                <router-link to="/admin/dashbourd">
                    <button class="badge wrap bg-blue">No</button>
                </router-link>
            </div> -->
        </div>
    </div>
</template>

<style scoped>
.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    /* Horizontally center the content */
    justify-content: center;
    /* Vertically center the content */
    height: 100vh;
    /* Make the container full viewport height */
}
</style>

<script>
export default {
    name: 'Login',
    data() {
        return {
            email: '',
            password: ''
        }
    },
    methods: {
        async submit() {
            try {
                if (this.email == null || this.password == null) {
                    return response().json('error, Empty email or password');
                } else {
                    response = await axios.post('http://127.0.0.1:8000/admin/login', {
                        email: this.email,
                        password: this.password
                    }).then(
                        response => {
                            console.log(response.data);
                            return response
                        }
                    );
                }
            } catch (error) {
                error => { console.error(error) }
            }
        }
    }
}
</script>
