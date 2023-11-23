<template>
    <div>
        <!-- <button @click="showPopup = true">Rate</button> -->
        <div v-if="showPopup" class="popup">
            <p>Successfully rated</p>
            <button @click="closeRedirect">Close</button>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            showPopup: true,
        };
    },
    methods: {
        closeRedirect(){
            this.showPopup = false;
            this.$router.push({name: 'admin.dashboard'});
        }
    }
};
</script>

<style>
.popup {
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    background-color: #fff;
    padding: 20px;
    border: 1px solid #ccc;
}
</style>
