<template>

 <div class="row gray_bg mrtb40">
            <div class="container">
                <h2>Our Business Model</h2>
                <p>
                    All client orders are automatically passed on to the ECN (Electronic Communication Network) market via MetaTrader 4 Bridge technology which connects JMI's servers to the ECN. Trades are executed at market prices using Market Execution.
                </p>
                <div class="speacer20"></div>
                <h2>Details:</h2>
                <p>
                   Higher level of liquidity<br />
                    Instant Execution<br />
                    No requoting<br />
                    Commission charged
                </p>
                <div class="speacer20"></div>
            </div>
        </div>

 <div class="row gray_bg mrtb40">
                <img src="/assets/img/dataflow.jpg" alt="" class="img-responsive center-block w100" />
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
            site_title: `Our Business Model`,
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
