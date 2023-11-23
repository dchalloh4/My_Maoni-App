<!-- Logout.vue -->
<template>
    <div class="container d-flex align-items-center justify-content-center p-4">
        <div class="card badge p-4 align-items-center justify-content-center">
            <p class="text-lg text-center">
                Logging out...
            </p>
            <button class="badge bg-danger btn-submit d-flex text-center size-lg" @click="logout()">
                <p class="text-md">
                    Logout
                </p>
            </button>
        </div>
    </div>
</template>

<script>
export default {
    methods: {
        logout() {
            async () => {
                // Perform logout API request (you may use axios or another HTTP library)
                await axios.post('/logout')
                    .then(response => {
                        // Logout successful, redirect to login
                        console.log(response.data.message);
                        this.$router.push('http://127.0.0.1:8000/admin/login');
                    })
                    .catch((error) => {
                        console.error('Logout failed', error);
                        // Handle logout failure if needed
                    });
            }
        }
    },
};
</script>
