<!-- MyComponent.vue -->
<template>
    <div class="btn btn-light" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="top"
        data-bs-content="Top popover">
        <router-link to="#">
            <div class="card-body">
                <h5 class="card-title">
                    <p class="card-text">MY RATING</p>
                </h5>
                <br>
                <div class="my-rating row gx-2">
                    <div class="col p-2">
                        <vue3starRatings v-model="rating" :starSize="85" starColor="#ffbb00" inactiveColor="#333333"
                            :numberOfStars="5" :disableClick="true" />
                    </div>
                    <div class="col w-20 h1">
                        <div class="badge bg-blue text-wrap bg-blue">{{ rating }}</div>
                    </div>
                </div>
            </div>
        </router-link>
    </div>
</template>

<script>
import { defineComponent } from "vue";
import vue3starRatings from "vue3-star-ratings";

export default defineComponent({
    components: {
        vue3starRatings,
    },
    data() {
        return {
            rating: '',
            user: null,
        };
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
            }
        }
    },

    mounted() {
        this.isLoggedin
    }
});
</script>

