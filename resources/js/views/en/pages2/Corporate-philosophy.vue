<template>

     <div class="row gray_bg">
        <img src="/assets/img/Corporate_philosophy.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>

    <div class="row gray_bg mrtb40">
        <div class="container">
            <h1>Corporate  Philosophy</h1>

            <h2>Corporate Mission</h2>
            <p>
                Our mission is to establish JMI Brokers LTD as the world's preferred online FX broker. We are committed to building a  long-term relationship with all of our clients by nurturing our corporate  values and strengthening trust.
                    <br />

                We are dedicated to offering our clients the most competitive and best Market conditions   and believe we can achieve the optimal trading environment, unparalleled in  quality and function. Our priority is to constantly provide new advantages and  seek out innovation. Doing this ensures our clients always get the best from  their trading.
            </p>
</div>
</div>

    <div class="row gray_bg mrtb40">

            <img src="/assets/img/Corporate_mission.jpg" alt="" class="img-responsive center-block" />
</div>


    <div class="row gray_bg mrtb40">
        <div class="container">
            <h2>Corporate  Values</h2>

            <h3>INTEGRITY</h3>
            <p>Our word is our bond. Through delivering on our promises we build a bridge of  trust with our clients. This is the philosophy we instill in our professional  workforce and we believe this will help drive our growth as we expand our  operations in the financial services sector. </p>

            <h3>COMMITMENT TO THE CLIENT</h3>
            <p>JMI Brokers LTD aims to exceed our clients expectations by placing a high  priority on excellence in execution and we are committed to providing the most  professional and individualized service possible. We recognize that the client  is at the core of our existence and we aspire to achieve an intimate level of  understanding as to their professional needs and objectives and then doing our  utmost to accommodate them.   </p>


            <h3>INNOVATION</h3>
            <p>We believe that innovation is an intrinsic element for competitiveness and  growth in todays markets. Our dedication to finding new ways of creating and  delivering value is a major reason why our clients choose to trade with us. By  providing the latest tools, products and services, JMI Brokers LTD is establishing itself as a leader rather than  an operator in the industry.  </p>


            <h3>SOCIAL RESPONSIBILITY</h3>
            <p>It is our goal to grow not only our business but also our level of social  responsibility. We have set ourselves ethical standards and believe it is part  of our professional duty to give back to society. One of our goals is to  develop a sound philanthropic foundation to support our corporate philosophy.</p>


            <div class="speacer20"></div>

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
            site_title: `Corporate  Philosophy`,
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
