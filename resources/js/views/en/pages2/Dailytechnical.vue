<template>
<link rel="canonical" href="https://www.jmibrokers.com/en/dailytechnical " />

	<div class="row">
			<div class="container">
			<h1>Technical Analysis</h1>

<br />

			<div class="row" style="margin:0 auto;">
				<ul class="type-list" >

                    <li v-bind:style= "[this.type == 'gbpusd' || this.type =='GBPUSD' || this.type =='' ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/GBPUSD`" style="color:#ffc926;">GBPUSD</a>
                    </li>
                    <li v-bind:style= "[this.type == 'eurusd' || this.type =='EURUSD'  ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/EURUSD`" style="color:#0059b2;">EURUSD</a>
                    </li>
                    <li v-bind:style= "[this.type == 'usdjpy' || this.type =='USDJPY' ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/USDJPY`" style="color:#ffc926;">USDJPY</a>
                    </li>
                    <li v-bind:style= "[this.type == 'audusd' || this.type =='AUDUSD'  ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/AUDUSD`" style="color:#0059b2;">AUDUSD</a>
                    </li>
                    <li v-bind:style= "[this.type == 'gold' || this.type =='GOLD' ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/GOLD`" style="color:#ffc926;">GOLD</a>
                    </li>
                    <li v-bind:style= "[this.type == 'oil' || this.type =='OIL'  ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/OIL`" style="color:#0059b2;">OIL</a>
                    </li>
                    <li v-bind:style= "[this.type == 'dowjones' || this.type =='DOWJONES' ? 'text-decoration: underline;' : '']">
                        <a :href="`/en/dailytechnical/DOWJONES`" style="color:#ffc926;">DOWJONES</a>
                    </li>

				</ul>
			</div><br />
			<div class="row">
				<div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;padding-left: 20px;text-align: left;border-radius: 20px;">

                    <template v-if="this.type === 'gbpusd' || this.type === 'GBPUSD' || this.type === ''">
                        {{this.technicalanalysis1.title}} <span id="created_at">{{this.technicalanalysis1.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'eurusd' || this.type === 'EURUSD'">
                        {{this.technicalanalysis2.title}} <span id="created_at">{{this.technicalanalysis2.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'usdjpy' || this.type === 'USDJPY'">
                        {{this.technicalanalysis3.title}} <span id="created_at">{{this.technicalanalysis3.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'audusd' || this.type === 'AUDUSD'">
                        {{this.technicalanalysis4.title}} <span id="created_at">{{this.technicalanalysis4.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'gold' || this.type === 'GOLD'">
                        {{this.technicalanalysis5.title}} <span id="created_at">{{this.technicalanalysis5.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'oil' || this.type === 'OIL'">
                        {{this.technicalanalysis6.title}} <span id="created_at">{{this.technicalanalysis6.created_at}}</span>
                    </template>
                    <template v-else-if="this.type === 'dowjones' || this.type === 'DOWJONES'">
                        {{this.technicalanalysis7.title}} <span id="created_at">{{this.technicalanalysis7.created_at}}</span>
                    </template>

				</div>
				<div id="technical-div">
                    <template v-if="this.type === 'gbpusd' || this.type ==='GBPUSD' || this.type ===''" ><div v-html="`${this.technicalanalysis1.details}`"></div></template>
                    <template v-else-if="this.type === 'eurusd' || this.type ==='EURUSD'"><div v-html="`${this.technicalanalysis2.details}`"></div></template>
                    <template v-else-if="this.type === 'usdjpy' || this.type ==='USDJPY'"><div v-html="`${this.technicalanalysis3.details}`"></div></template>
                    <template v-else-if="this.type === 'audusd' || this.type ==='AUDUSD'"><div v-html="`${this.technicalanalysis4.details}`"></div></template>
                    <template v-else-if="this.type === 'gold' || this.type ==='GOLD'"><div v-html="`${this.technicalanalysis5.details}`"></div></template>
                    <template v-else-if="this.type === 'oil' || this.type ==='OIL'"><div v-html="`${this.technicalanalysis6.details}`"></div></template>
                    <template v-else-if="this.type === 'dowjones' || this.type ==='DOWJONES'"><div v-html="`${this.technicalanalysis7.details}`"></div></template>
				</div>
			</div>
<br />
            <a :href="`/en/dailytechnical/more/${this.type}`" style="float:right;color:#333;" class="btn-slide-live-button"> More Technical Analysis</a>

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
            site_title: `Daily Technical Analysis`,
            site_description: ``,
            site_keywords: '',
            technicalanalysis1: '',
            technicalanalysis2: '',
            technicalanalysis3: '',
            technicalanalysis4: '',
            technicalanalysis5: '',
            technicalanalysis6: '',
            technicalanalysis7: '',
            type:this.$route.params.type || ''
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
                const result = await axios.get('/api/dailytechnical')

                if (result.status === 200) {

                    this.technicalanalysis1=result.data.technicalanalysis1;
                    this.technicalanalysis2=result.data.technicalanalysis2;
                    this.technicalanalysis3=result.data.technicalanalysis3;
                    this.technicalanalysis4=result.data.technicalanalysis4;
                    this.technicalanalysis5=result.data.technicalanalysis5;
                    this.technicalanalysis6=result.data.technicalanalysis6;
                    this.technicalanalysis7=result.data.technicalanalysis7;
                    this.site_title=result.data.title.en;
                    this.site_keywords=result.data.keywords.en;
                    this.site_description=result.data.description.en;


                }else{
                    console.log('Error')
                }

            } catch (e) {
                console.log('Error')
            }
        },
    }
});
</script>
<style>

div#post p{color:#000;font-weight: bold;} div#post a{color: #0059b2;font-weight:bold;} div#post h7{color:#0059b2;} div#post{background:#eeeeee;color:black;padding:20px;margin:5px;word-wrap: break-word;height:300px;}
div.left{float:left;text-align:center;height:100%;}
div.right{float:right;height:100%;}
ul.type-list{margin: 0px; padding: 0px;font-weight: bold;}
ul.type-list li{list-style-type: none; width: calc(100%/7); padding: 5px; display: inline-block; text-align: center;margin:auto;}
ul.type-list li:first-child{border-top-left-radius: 20px;border-bottom-left-radius: 20px;}
ul.type-list li:last-child{border-top-right-radius: 20px;border-bottom-right-radius: 20px;}
ul.type-list li:nth-child(odd) a{color-:#000 !important;} ul.type-list li:nth-child(odd) {
                                                              background: #0059b2;
                                                          }
ul.type-list li:nth-child(even) {
    background: #ffc926;
}
div#technical-div img{
    width-:100% !important;
    position: relative; border: 5px solid #ffc926;
    border-radius: 10px;
    margin-bottom: 30px;
}
div#technical-div table {
    background: #bfbfbf;
    width: 100%;
    border-radius: 20px;
    font-size: 18px;
    text-align: center;
    font-weight: bold;
    height: 30px !important;
    line-height: 30px;}
div#technical-div table tr td{
    display: inline-block;
    padding-left: 50px;

}
span#created_at{padding-right:30px;float:right;}

@media only screen and (max-width: 500px) {
    ul.type-list li{list-style-type: none; width: 70%; padding: 5px;  text-align: center;margin:auto;}
    ul.type-list li:first-child{border-top-left-radius: 0px;border-bottom-left-radius: 0px;}
    ul.type-list li:last-child{border-top-right-radius: 0px;border-bottom-right-radius: 0px;}
    span#created_at{padding-left:0px;display:block;}

}
</style>
