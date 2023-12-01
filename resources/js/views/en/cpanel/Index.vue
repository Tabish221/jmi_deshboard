<template>

    <div class="col-lg-9 col-md-12 col-sm-12 mainContent">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title"> {{title}}</h4>
            </div>

            <div class="panel-body" id="newhomepage">


                <div class="col-sm-10 col-sm-push-1">

                    <div class="row" id="">
                        <!-- <div class="col-sm-4">


                        {!! Form::open(['url'=>'en/cpanel/profilepicture','files'=>true])  !!}

                        @if($user->profilePicture != '')
                          <img  src="/assets/cpanel/profilePictures/{{$user->profilePicture}}" id="Profileimg" />
                          @else
                          <img  src="/assets/cpanel/img/empty-person.png" id="Profileimg" />

                          @endif
                          <span class="fa fa-edit" onclick="changeProfilePicture()" style=" width: 25px; height: 25px; position: absolute; left: 83px; bottom: -20px; font-size: 30px; color: #0059b2;cursor: pointer;" ></span>
                            <input type="file" class="form-control" name="profilePicture" id="profilePicture" onchange="form.submit()" style="display:none;" />
                            <script>function changeProfilePicture(){$('input#profilePicture').click();}</script>
                          {!! Form::close() !!}


                        </div> -->

                        <div class="col-sm-8">
                            <h2>

                                Welcome, <span class="userName">{{ user.fullname }}</span>

                            </h2>
                        </div>
                    </div>

                    <div class="row" id="homepage_headline1" >
                        <div  id="homepage_headline2" >
                        </div>
                    </div>

                    <div class="row" >
                        <div class="col-sm-8">

                            <h4><span style="width:15px;height:15px;border-radius:50%;background:#ffc926;display: inline-block;"></span> FOREX ACCOUNTS</h4>
                        </div>
                        <div class="col-sm-4">
                            <h5>  {{ total_equities }} <span>USD</span></h5>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-8">

                            <h4><span style="width:15px;height:15px;border-radius:50%;background:#0059b2;display: inline-block;"></span> TRADING ACCOUNTS</h4>
                        </div>
                        <div class="col-sm-4">
                            <h5>  0 <span>USD</span></h5>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-sm-8">

                            <h4><span style="width:15px;height:15px;border-radius:50%;display: inline-block;"></span> TOTAL VALUE</h4>
                        </div>
                        <div class="col-sm-4">
                            <h5>  {{ total_equities }} <span>USD</span></h5>
                        </div>
                    </div>

                    <br /><br />

                    <!-- Start of notifications -->



                    <template v-for="(account,index) in accounts" :key=index>
                        <template v-if="balances[index] != ''">
                            <div class="row forexaccount" >
                                <div class="col-sm-8">
                                    <h5 style=" color: #0059b2; ">FOREX {{account.account_id }}</h5>
                                    <h5> {{names[index] }}</h5>
                                </div>
                                <div class="col-sm-4">
                                    <br />
                                    <h5>  {{equities[index] }} <span>USD</span></h5>
                                </div>
                            </div>
                        </template>
                    </template>

                    <template v-if="this.$store.state.pending_account==1">
                        <div class="row forexaccount">
                            <div class="col-sm-12">
                                <h5 style=" color: #0059b2; ">FOREX ACCOUNT</h5>
                                <h5> Your account opening request is currently under review</h5>
                            </div>
                        </div>
                    </template>

                    <!-- End of notifications -->

            </div>





            <!--End content-->
        </div>
        </div>
    </div>



</template>
<script>
import {computed, onMounted, ref} from "vue";
import {useRouter} from "vue-router";
import $ from 'jquery'
import jquery from 'jquery'
window.jQuery = jquery
//require('bootstrap')

import axios from "axios";
import {useHead} from "@vueuse/head";
const errors = ref()
const router = useRouter();


export default {
    name: 'Home',
    data(){
        return{
            notifications_all:'',
            notifications_unseen:'',
            pending_account:'',
            LoggedUser: '',
            user:'',
            accounts:'',
            equities:'',
            total_equities:'',
            names:'',
            balances:'',
            currentPage:'',
            title:'',
            pageType:'',
            request_i:0,
            request_accept_i:0,
            request_denied_i:0,

        }
    },

    mounted() {
        this.getData()
    },

    methods:{


        head: document.getElementById("head"),

        coll: document.getElementsByClassName("collapsible"),

        async getData() {
            const router = useRouter();

            try {
                const result = await axios.get('/api/cpanel/home')

                if (result.status === 200) {

                    this.$store.commit('setTitle',result.data.title.en );

                    this.$store.commit('setuser', result.data.user);
                    this.$store.commit('setaccounts', result.data.accounts);
                    this.$store.commit('setequities', result.data.equities);
                    this.$store.commit('setnames', result.data.names);
                    this.$store.commit('setbalances',result.data.balances );
                    this.$store.commit('setcurrentPage', result.data.currentPage);
                    this.$store.commit('setpageType', result.data.pageType);

                    this.user=result.data.user || "";
                    this.accounts=result.data.accounts || "";
                    this.equities=result.data.equities || "";
                    this.total_equities=result.data.total_equities;

                    this.names=result.data.names || "";
                    this.balances=result.data.balances || "";
                    this.currentPage=result.data.currentPage || "";
                    this.pageType=result.data.pageType || "";
                    this.title=result.data.title.en || "";

                    useHead({
                        // Can be static or computed
                        title: computed(() => this.title),
                    })

                }else{

                    await router.push('/en/login')
                }

            } catch (e) {
                await router.push('/en/login')
            }
        },

    },

    setup() {

    },
    beforeCreate() {
    }
}

</script>
