<template>

    <div class="row gray_bg">


        <div class="container">
            <div class="row gray_bg mrtb40">
                <h1>{{this.site_title}}</h1>


            <div class="table-responsive">
                <table class="pipCalcResults table table-responsive" id="results">
                    <iframe src="/ar/pip-calculator2/" scrolling="no" style="width: 100%;height:100%;min-height: 1200px;"></iframe>
                </table>




            </div>
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


    directives: {
        'raw-html': (el, binding) => {
    el.innerHTML = binding.value;
    }
    },
    data(){
        return{
            site_title: ``,
            site_description: ``,
            site_keywords: '',
            calculator2:'',
            calculator:''
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

        this.getData()
    },
    methods:{

        async getData() {
            const router = useRouter();

            try {
                const result = await axios.get('/api/pip-calculator')

                if (result.status === 200) {

                    this.site_title=result.data.title.ar;
                    this.site_keywords=result.data.keywords.ar;
                    this.site_description=result.data.description.ar;
                    this.calculator=result.data.calculator_ar;


                }else{
                    console.log('Error')
                }

            } catch (e) {
                console.log('Error')
            }
        },
    },
});
</script>

<style>
table thead tr th{text-align: center;}
</style>
