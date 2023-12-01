<template>
          <div class="row gray_bg">



        <div class="container">
            <div class="row gray_bg mrtb40">
                <h1 >  Forex Calculator</h1>
        <iframe _ngcontent-sc299="" id="all-in-one-calculator" width="100%" frameborder="0" scrolling="no" height="auto" src="https://widgets-m.fxpro.com/en/calculators/all-in-one/9" style="min-height:500px;"></iframe>
            </div>


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
            site_title: `Forex Calculator`,
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
<style>
#all-in-one-calculator {min-height:500px;}
@media only screen and (max-width: 1200px) {
    #all-in-one-calculator {height:680px;}
}
</style>
