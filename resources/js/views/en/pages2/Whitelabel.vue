<template>



<div class="row gray_bg">
            <img src="/assets/img/whitelabel.jpg" alt="" class="img-responsive  picHeight" />
        </div>

        <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>White Labels</h2>
				<p>JMI Brokers LTD can help grow your brand with our cost-effective turn-key solutions. Our White Label products are designed for flexibility so you can maximise your earning potential faster.</p>



                <h2>White Label Program</h2>
        <br />
		<p>Leverage our technological expertise in the MT4 and institutional market space to grow your brand. JMI Brokers can help you expand with our cost-effective turnkey solutions. Our white label solutions are designed for flexibility so you can maximize your earning potential faster.</p>


                <h2>Offering access to multiple platforms, including:</h2>
					 <ul class="li1">
					<li>1.	Multilingual products and support</li>
					<li>2.	Advanced charting</li>
					<li>3.	Algorithmic trading solutions</li>
					<li>4.	Educational services</li>
					<li>5.	Complete back office solution</li>
					<li>6.	Money Manager allocation solution</li>
					<li>7.	Advanced dealing solutions</li>

					</ul>
                <div class="speacer20"></div>
                 <div class="speacer20"></div>


                <p>Call one of our professional sales representatives to discuss how JMI Brokers can help grow your brand using our White Label Program. +97144096705</p>

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
            site_title: `White Labels`,
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
