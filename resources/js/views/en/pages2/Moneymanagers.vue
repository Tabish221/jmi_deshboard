<template>




<div class="row gray_bg">
            <img src="/assets/img/moneymanagers.jpg" alt="" class="img-responsive  picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Money Managers</h2>
				<p>Managers looking for competitive pricing and consistent execution should look no further. With JMI Brokers Money Managers you can trade on multiple accounts from one trading platform. JMI Brokers handles all of the post-trade allocations for you so you can focus solely on trading and customer acquisition.</p>



                <h2>Multiple allocations methods:</h2>
        <br />
					<ul>
					<li>1.	Percent allocation</li>
					<li>2.	Lot allocation</li>
					</ul>

                <h2>Reports:</h2>
					<br />
					<ul>
					<li>1.	Your clients can access their reports 24/7</li>
					<li>2.	Receive daily statements showing trade allocations;</li>
					</ul>


                <h2>Back Office support:</h2>
					<br />
						<p>Our Back Office team will handle the entire end-of-month calculations for you and your clients. This will allow you to spend less time on administrative hassles and more time finding the next trade for your clients.</p>
						<p>Call one of our professional sales representatives to discuss how JMI Brokers can help grow your managed business.</p>
						<p>+97144096705</p>

                <div class="speacer20"></div>
                 <div class="speacer20"></div>


                <p>Call one of our professional sales representatives to discuss how JMI Brokers can help grow your brand using our Money Manger Program. +97144096705</p>

                <a href="/en/become-partner"  class="become-partner slide-live-button">Become Our Partner</a>


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
            site_title: `Money Managers`,
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
