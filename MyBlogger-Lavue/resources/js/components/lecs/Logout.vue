<template>
    <div class="container">
        <div class="card p-4">
            @csrf
            <p class="badge">Are you sure you want to Exit?</p>

            <div class="btn-submit d-flex justify-content-center">
                <button class="badge bg-blue wrap text-lg" v-if="this.showLogginOut == false"
                    @click="logout">Confirm</button>
                <button class="badge bg-blue wrap text-lg" v-if="this.showLogginOut == true" @click="logout">Logging
                    Out</button>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Logout',

    data() {
        return {
            showLogginOut: false,
            LogIn: '',
        }
    },
    methods: {
        async logout() {
            this.showLogginOut = !this.showLogginOut
            await axios.get('http://127.0.0.1:8000/admin/logout/1').then(
                response => {
                    console.log(response)
                    this.LogI = response.data
                    // this.$router.push('/admin/login')
                    this.$router.push('/logout');
                    // window.location.reload()
                }

            ).catch((error) => {
                console.log('Logging out Failed', error)
            })
            // this.$router.push('/admin/login')
        }
    }
}
</script>
