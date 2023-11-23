<template>
    <div class="container">
        <h6>
            <router-link to="/admin/my-class">
                <p class="text-muted">/users/MyUnits</p>
            </router-link>
        </h6>
        <h1>Feedback Form</h1>
        <div class="card" v-if="this.popup == false">
            <strong class="text-center text-uppercase text-lg text-red">{{ $route.params.unitCode }} - {{
                $route.params.unitName }}</strong>
            <strong>
                <p class="text-danger text-center text-uppercase">{{ this.error }}</p>
            </strong>
            <hr>
            <ul>
                <li>
                    <form>
                        1. Which activities in the classroom do you enjoy the most?<br>
                        <input type="radio" name="q1" id="fastFacts" value="5" v-model="this.question.Q1">
                        <label for="Fast_Facts">Fast Facts</label> <br>
                        <input type="radio" name="q1" id="Memory" value="3" v-model="this.question.Q1">
                        <label for="Memory">Memory</label> <br>
                        <input type="radio" name="q1" id="treasureHunt" value="1.5" v-model="this.question.Q1">
                        <label for="treasureHunt">Treasure Hunt</label> <br>
                        <div class="text-uppercase text-black">
                            rate <br>
                        </div>
                        <label for="rate">
                            <vue3starRatings v-model="rateStarQ1" :starSize="40" starColor="#ffbb00" inactiveColor="#333333"
                                :numberOfStars="5" />
                        </label>
                        <p class="badge text-lg">{{ this.rateStarQ1 }}</p>
                    </form>
                </li>
                <br>
                <li>
                    <form>
                        2. Given a chance, what is one change that you would like to see? <br>
                        <input type="radio" name="q2" id="teaching_Method" value="5" v-model="this.question.Q2">
                        <label for="teaching_Method">Teaching method</label> <br>
                        <input type="radio" name="q2" id="Timetaken" value="3" v-model="this.question.Q2">
                        <label for="Timetaken">Time taken to complete a chapter</label> <br>
                        <input type="radio" name="q2" id="Extracurricular_activities" value="1.5"
                            v-model="this.question.Q2">
                        <label for="Extracurricular_activities">Extracurricular activities</label>
                        <div class="text-uppercase text-black">
                            rate <br>
                        </div>
                        <label for="rate">
                            <vue3starRatings v-model="rateStarQ2" :starSize="40" starColor="#ffbb00" inactiveColor="#333333"
                                :numberOfStars="5" />
                        </label>
                        <p class="badge text-lg">{{ this.rateStarQ2 }}</p>
                    </form>
                </li>
                <br>
                <li>
                    <form>
                        3. Do you think that the school provides you with adequate sports facilities? <br>
                        <input type="radio" name="q3" id="Yes" value="5" v-model="this.question.Q3">
                        <label for="Yes">Yes</label> <br>
                        <input type="radio" name="q3" id="No" value="3" v-model="this.question.Q3">
                        <label for="No">No</label> <br>
                        <input type="radio" name="q3" id="NotAlways" value="1.5" v-model="this.question.Q3">
                        <label for="NotAlways">Not Always</label>
                        <div class="text-uppercase text-black">
                            rate <br>
                        </div>
                        <label for="rate">
                            <vue3starRatings v-model="rateStarQ3" :starSize="40" starColor="#ffbb00" inactiveColor="#333333"
                                :numberOfStars="5" />
                        </label>
                        <p class="badge text-lg">{{ this.rateStarQ3 }}</p>
                    </form>
                </li>
                <br>
            </ul>
            <hr>
            <strong>
                <p class="text-uppercase text-center" style="color: red;">{{ this.subError }}</p>
            </strong>
            <button class="badge bg-yellow text-dark text-uppercase text-md" type="submit"
                @click="submitfeedback">submit</button>
        </div>
        <popup v-if="this.popup == true"/>
    </div>
</template>

<script>
import vue3starRatings from "vue3-star-ratings";
import popup from "./popup.vue";
export default {
    name: "Feedback",
    data() {
        return {
            question: {
                Q1: '',
                Q2: '',
                Q3: '',
            },
            student: null,
            error: null,
            rateStarQ1: null,
            rateStarQ2: null,
            rateStarQ3: null,
            unitCode: null,
            subError: null,
            props: {
                unitCode: this.$route.params.unitCode
            },
            popup: false,
        }
    },
    components: {
        vue3starRatings,
        popup
    },
    mounted() {
        this.getMembers(),
            this.msg()
    },

    methods: {
        async msg() {
            if (!this.question.Q1 || this.question.Q2 || this.question.Q3) {
                this.error = 'Please fill all the fields'
            }
        },
        async submitfeedback() {
            if (this.question.Q1 && this.question.Q2 && this.question.Q3) {
                const rate = [this.rateStarQ1, this.rateStarQ1, this.rateStarQ3]
                const valid = rate.filter(rate => rate != null)
                const numberofQs = rate.length
                const summRate =  parseFloat(this.rateStarQ1) + parseFloat(this.rateStarQ2) + parseFloat(this.rateStarQ3)
                const avg = summRate/numberofQs

                try {
                    const res = await axios.get('http://127.0.0.1:8000/admin/details')

                    const lastSubmissionDate = res.data.user.last_submission

                    if (res.data.user.last_submission) {


                        if (this.isEligibleToSubmit(lastSubmissionDate)) {
                            console.log(avg.toFixed(1));
                            const response = await axios.post('/rate', {
                                unitCode: this.$route.params.unitCode,
                                user: res.data.user.id,
                                rate: avg.toFixed(1),
                            })
                            console.log(response);
                            this.popup = true;
                        } else {
                            this.subError = 'Error while Submiting'
                            console.log('Error while Submiting');
                        }

                    } else {
                        console.log('Not eligible to submit');
                        this.subError = 'Not eligible to Submit'
                    }

                } catch (error) {
                    console.error(error);
                }
                // this.question.Q1 = this.question.Q2 = this.question.Q3 = null
            }
        },
        async getMembers() {
            await axios
                .get('/my-class/rep')
                .then(
                    response => this.student = response.data,

                    // console.log(this.props),
                    // this.showTable = !this.showTable
                )
                .catch(error => console.error(error))
        },
        isEligibleToSubmit(lastSubmissionDate) {
            const now = new Date();
            now.setMinutes(now.getMinutes() - 1); // subtract 1 minute
            // console.log(new Date(lastSubmissionDate)<= now);
            return new Date(lastSubmissionDate) <= now;
        },
    },
}
</script>
