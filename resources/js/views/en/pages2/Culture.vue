<template>

  <div class="row gray_bg">
        <img src="/assets/img/lgculture.png" alt="" class="img-responsive center-block picHeight" />
    </div>

    <div class="row gray_bg mrtb40">
        <div class="container">
            <h2>CULTURE</h2>

            <h3>Integrity</h3>
            <p>Our  success is aligned with our customers success; therefore we always act  ethically and honestly. </p>

            <h3>Global Diversity</h3>
            <p>Each employees unique ideas and original talents  reflect the diverse nature of our world-wide business. </p>

            <h3>Dynamic Work Environment</h3>
            <p>We plan for the future, embrace change and  execute with precision.  </p>

            <h3>Industry Leading Customer Service</h3>
            <p>Our unique customer oriented business  model provides unmatched customer service.  </p>

            <h3>Innovation</h3>
            <p>Our Company encourages innovation in the discovery, development and commercialization of breakthrough products.  </p>

            <h3>Collaborative Teamwork</h3>
            <p>Concise and timely communication leads to the  ideal atmosphere for collaboration and unity.  </p>

            <h3>Wellness</h3>
            <p>We understand the importance of  work/family balance, and encourage healthy lifestyles.  </p>

            <h3>Learning and Continuous Improvement</h3>
            <p>We foster a culture that supports  individual growth and personal development.   </p>

            <h3>Making Work Fun</h3>
            <p>Whether its a chili cook-off, foosball tournament, or  renting out a movie theater for the latest premier, we have fun!   </p>

            <div class="speacer20"></div>
            <img src="/assets/img/lg-culture-bottom.jpg" alt="" class="img-responsive center-block" />
        </div>
    </div>

</template>

<script>
import { useHead } from '@vueuse/head'
import {computed, reactive, ref} from "vue";
import axios from 'axios';
import {useRouter} from "vue-router";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `CULTURE`,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => this.site_title),
            meta: [
                {
                    name: `description`,
                    content: computed(() => this.site_description),
                },
                {
                    name: `keywords`,
                    content: computed(() => this.site_keywords),
                },
            ],

        })
    }
});
</script>
