<template>
    <div class="row">
            <div class="container">
<br />


            <div class="row" style="margin:0 auto;">
              <ul class="type-list" >

                  <li v-bind:style= "[this.type == 'gbpusd' || this.type =='GBPUSD' || this.type =='' ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/GBPUSD`" style="color:#ffc926;">GBPUSD</a>
                  </li>
                  <li v-bind:style= "[this.type == 'eurusd' || this.type =='EURUSD'  ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/EURUSD`" style="color:#0059b2;">EURUSD</a>
                  </li>
                  <li v-bind:style= "[this.type == 'usdjpy' || this.type =='USDJPY' ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/USDJPY`" style="color:#ffc926;">USDJPY</a>
                  </li>
                  <li v-bind:style= "[this.type == 'audusd' || this.type =='AUDUSD'  ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/AUDUSD`" style="color:#0059b2;">AUDUSD</a>
                  </li>
                  <li v-bind:style= "[this.type == 'gold' || this.type =='GOLD' ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/GOLD`" style="color:#ffc926;">GOLD</a>
                  </li>
                  <li v-bind:style= "[this.type == 'oil' || this.type =='OIL'  ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/OIL`" style="color:#0059b2;">OIL</a>
                  </li>
                  <li v-bind:style= "[this.type == 'dowjones' || this.type =='DOWJONES' ? 'text-decoration: underline;' : '']">
                      <a :href="`/ru/dailytechnical/DOWJONES`" style="color:#ffc926;">DOWJONES</a>
                  </li>
              </ul>
            </div><br />

                <template v-if="this.type === 'gbpusd' || this.type === 'GBPUSD' || this.type === ''">
                    <template v-for="technicalanalysis in this.technicalanalysis1">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'eurusd' || this.type === 'EURUSD'">
                    <template v-for="technicalanalysis in this.technicalanalysis2">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'usdjpy' || this.type === 'USDJPY'">
                    <template v-for="technicalanalysis in this.technicalanalysis4">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'audusd' || this.type === 'AUDUSD'">
                    <template v-for="technicalanalysis in this.technicalanalysis4">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'gold' || this.type === 'GOLD'">
                    <template v-for="technicalanalysis in this.technicalanalysis5">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'oil' || this.type === 'OIL'">
                    <template v-for="technicalanalysis in this.technicalanalysis6">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>
                <template v-else-if="this.type === 'dowjones' || this.type === 'DOWJONES'">
                    <template v-for="technicalanalysis in this.technicalanalysis7">
                        <div class="row">
                            <div style="width: 100%;background: #0059b2;font-size: 18px;color: #fff;min-height: 30px;line-height: 30px;text-align: left;padding-left:20px;border-radius: 20px;">
                                {{technicalanalysis.title}} <span id="created_at">{{technicalanalysis.created_at}}</span>
                            </div>
                            <div style="border:1px solid gray;">
                                <div v-html="`${technicalanalysis.details}`"></div>
                            </div>
                        </div>
                    </template>
                </template>

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
import $ from 'jquery'
import jquery from 'jquery'
window.jQuery = jquery

export default ({
    data(){
        return{
            site_title: ``,
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
                const result = await axios.get('/api/dailytechnical/more/'+this.type)

                if (result.status === 200) {

                    this.technicalanalysis1=result.data.technicalanalysis1;
                    this.technicalanalysis2=result.data.technicalanalysis2;
                    this.technicalanalysis3=result.data.technicalanalysis3;
                    this.technicalanalysis4=result.data.technicalanalysis4;
                    this.technicalanalysis5=result.data.technicalanalysis5;
                    this.technicalanalysis6=result.data.technicalanalysis6;
                    this.technicalanalysis7=result.data.technicalanalysis7;
                    this.site_title=result.data.title.ru;

                }else{

                    //  await router.push('/ru/login')
                }

            } catch (e) {
                // await router.push('/ru/login')
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
ul.type-list li{list-style-type: none; width:calc(100%/7); padding: 5px; display: inline-block; text-align: center;margin:auto;}
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
span#created_at{padding-left:50px;}

@media only screen and (max-width: 500px) {
    ul.type-list li{list-style-type: none; width: 70%; padding: 5px;  text-align: center;margin:auto;}
    ul.type-list li:first-child{border-top-left-radius: 0px;border-bottom-left-radius: 0px;}
    ul.type-list li:last-child{border-top-right-radius: 0px;border-bottom-right-radius: 0px;}
    span#created_at{padding-left:0px;display:block;}

}
</style>
