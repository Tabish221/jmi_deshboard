<template>

    <div class="opendemoaccount openliveaccount"  style="background-image:url('/assets/img/demoaccountbg.jpg');">
        <div class="container">
            <div class="row pdtb40">
                <div id="recaptcha-container" ></div>

                <div class="myFlex">

                    <div class="col-lg-4 col-md-5 col-sm-6 col-xs-12 col-xxs text-left" >
                        <div id="newLogin">
                            <img src ="/assets/m/img/icon.png">
                            <h2> Регистрация</h2>
                        </div>
                        <div class="alert alert-danger" v-if="typeof errors === 'string'">

                        {{errors}}
                    </div>
                    <div class="alert alert-danger" v-for="(value, index) in errors" :key="index" v-if="typeof errors === 'object'">

                        {{errors[0]}}
                    </div>

                        <form id="RegisterForm"  method="post" @submit.prevent="handleSignup" class="registration-form">

                            <div id="recaptcha-container" ></div>


                            <div class="control-group">

                                <div class="col-sm-3 padding-left-0">
                                    <div class="controls">
                                        <select class="form-control" name="title" v-model="form.title"  id="title">
                                            <option v-for="title in title_list" :value="title.value"  >
                                                {{ title.text }}
                                            </option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-9 padding-right-0 ">
                                    <div class="controls">
                                        <input  type="text" class="form-control  " v-model="form.fullname" id="fullname" name="fullname" placeholder="ФИО *" required>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group">
                                <div class="alert alert-danger col-sm-12" id="emailerror" style="display: none;"></div>
                                <div class="alert alert-success col-sm-12" id="emailsentSuccess" style="display: none;"></div>

                                <div class="col-sm-8">
                                    <input type="email" name="email" placeholder="Эл. адрес  :"   v-model="form.email"  class="form-email form-control" id="email" required>
                                </div>
                                <div class="col-sm-4" >
                                    <button type="button"  id="email_send_code"  class="btn btn-success" @click="emailSendAuth()">Send Code</button>
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="col-sm-8">
                                    <input type="number" id="emailverificationCode"  v-model="form.emailverificationCode" name="emailverificationCode" class="form-control" placeholder="введите код подтверждения" style="display:none;" required>
                                </div>
                                <div class="col-sm-4" >
                                    <button type="button" id="email_verify_code"  class="btn btn-success" @click="emailcodeverify()"  style="display:none;">Verify code</button>
                                </div>
                                <div class="alert alert-success col-sm-12" id="emailsuccessRegsiter" style="display: none;"></div>

                            </div>



                            <div class="form-group">
                                <input type="text" name="username"  v-model="form.username"  placeholder="имя пользователя "    class="form-email form-control" id="username" required>
                            </div>


                            <div class="form-group">

                                <div class="alert alert-danger col-sm-12" id="SMSError" style="display: none;">
                                    <span></span>
                                </div>
                                <div class="alert alert-success col-sm-12" id="SMSSuccess" style="display: none;">
                                    <span></span>
                                </div>

                                <div class="col-sm-3">
                                    <select name="countryCode" id="countryCode"  v-model="form.countryCode"  class="form-control"  required>
                                        <option  value="" id="myCode" disabled selected>Code</option>
                                        <option data-countryCode="DZ" value="213">+213</option>
                                        <option data-countryCode="AD" value="376"> +376</option>
                                        <option data-countryCode="AO" value="244"> +244</option>
                                        <option data-countryCode="AI" value="1264"> +1264</option>
                                        <option data-countryCode="AG" value="1268">+1268</option>
                                        <option data-countryCode="AR" value="54"> +54</option>
                                        <option data-countryCode="AM" value="374"> +374</option>
                                        <option data-countryCode="AW" value="297"> +297</option>
                                        <option data-countryCode="AU" value="61"> +61</option>
                                        <option data-countryCode="AT" value="43"> +43</option>
                                        <option data-countryCode="AZ" value="994"> +994</option>
                                        <option data-countryCode="BS" value="1242"> +1242</option>
                                        <option data-countryCode="BH" value="973"> +973</option>
                                        <option data-countryCode="BD" value="880"> +880</option>
                                        <option data-countryCode="BB" value="1246"> +1246</option>
                                        <option data-countryCode="BY" value="375"> +375</option>
                                        <option data-countryCode="BE" value="32"> +32</option>
                                        <option data-countryCode="BZ" value="501"> +501</option>
                                        <option data-countryCode="BJ" value="229"> +229</option>
                                        <option data-countryCode="BM" value="1441"> +1441</option>
                                        <option data-countryCode="BT" value="975"> +975</option>
                                        <option data-countryCode="BO" value="591"> +591</option>
                                        <option data-countryCode="BA" value="387">  +387</option>
                                        <option data-countryCode="BW" value="267"> +267</option>
                                        <option data-countryCode="BR" value="55"> +55</option>
                                        <option data-countryCode="BN" value="673"> +673</option>
                                        <option data-countryCode="BG" value="359"> +359</option>
                                        <option data-countryCode="BF" value="226"> Faso +226</option>
                                        <option data-countryCode="BI" value="257"> +257</option>
                                        <option data-countryCode="KH" value="855"> +855</option>
                                        <option data-countryCode="CM" value="237"> +237</option>
                                        <option data-countryCode="CA" value="1"> +1</option>
                                        <option data-countryCode="CV" value="238"> +238</option>
                                        <option data-countryCode="KY" value="1345">  +1345</option>
                                        <option data-countryCode="CF" value="236">   +236</option>
                                        <option data-countryCode="CL" value="56"> +56</option>
                                        <option data-countryCode="CN" value="86"> +86</option>
                                        <option data-countryCode="CO" value="57"> +57</option>
                                        <option data-countryCode="KM" value="269"> +269</option>
                                        <option data-countryCode="CG" value="242"> +242</option>
                                        <option data-countryCode="CK" value="682">  +682</option>
                                        <option data-countryCode="CR" value="506">  +506</option>
                                        <option data-countryCode="HR" value="385"> +385</option>
                                        <option data-countryCode="CU" value="53"> +53</option>
                                        <option data-countryCode="CY" value="90392">  +90392</option>
                                        <option data-countryCode="CY" value="357">  +357</option>
                                        <option data-countryCode="CZ" value="42">  +42</option>
                                        <option data-countryCode="DK" value="45"> +45</option>
                                        <option data-countryCode="DJ" value="253"> +253</option>
                                        <option data-countryCode="DM" value="1809"> +1809</option>
                                        <option data-countryCode="DO" value="1809">  +1809</option>
                                        <option data-countryCode="EC" value="593"> +593</option>
                                        <option data-countryCode="EG" value="20"> +20</option>
                                        <option data-countryCode="SV" value="503">  +503</option>
                                        <option data-countryCode="GQ" value="240">  +240</option>
                                        <option data-countryCode="ER" value="291"> +291</option>
                                        <option data-countryCode="EE" value="372"> +372</option>
                                        <option data-countryCode="PAK" value="92">+92</option>
                                        <option data-countryCode="ET" value="251"> +251</option>
                                        <option data-countryCode="FK" value="500">  +500</option>
                                        <option data-countryCode="FO" value="298">  +298</option>
                                        <option data-countryCode="FJ" value="679"> +679</option>
                                        <option data-countryCode="FI" value="358"> +358</option>
                                        <option data-countryCode="FR" value="33"> +33</option>
                                        <option data-countryCode="GF" value="594">  +594</option>
                                        <option data-countryCode="PF" value="689">  +689</option>
                                        <option data-countryCode="GA" value="241"> +241</option>
                                        <option data-countryCode="GM" value="220"> +220</option>

                                        <option data-countryCode="GE" value="995"> +995</option>
                                        <option data-countryCode="DE" value="49"> +49</option>
                                        <option data-countryCode="GH" value="233"> +233</option>
                                        <option data-countryCode="GI" value="350"> +350</option>
                                        <option data-countryCode="GR" value="30"> +30</option>
                                        <option data-countryCode="GL" value="299"> +299</option>
                                        <option data-countryCode="GD" value="1473"> +1473</option>
                                        <option data-countryCode="GP" value="590"> +590</option>
                                        <option data-countryCode="GU" value="671"> +671</option>
                                        <option data-countryCode="GT" value="502"> +502</option>
                                        <option data-countryCode="GN" value="224"> +224</option>
                                        <option data-countryCode="GW" value="245"> +245</option>
                                        <option data-countryCode="GY" value="592"> +592</option>
                                        <option data-countryCode="HT" value="509"> +509</option>
                                        <option data-countryCode="HN" value="504"> +504</option>
                                        <option data-countryCode="HK" value="852">  +852</option>
                                        <option data-countryCode="HU" value="36"> +36</option>
                                        <option data-countryCode="IS" value="354"> +354</option>
                                        <option data-countryCode="IN" value="91"> +91</option>
                                        <option data-countryCode="ID" value="62"> +62</option>
                                        <option data-countryCode="IR" value="98"> +98</option>
                                        <option data-countryCode="IQ" value="964"> +964</option>
                                        <option data-countryCode="IE" value="353"> +353</option>
                                        <option data-countryCode="IL" value="972"> +972</option>
                                        <option data-countryCode="IT" value="39"> +39</option>
                                        <option data-countryCode="JM" value="1876"> +1876</option>
                                        <option data-countryCode="JP" value="81"> +81</option>
                                        <option data-countryCode="JO" value="962"> +962</option>
                                        <option data-countryCode="KZ" value="7"> +7</option>
                                        <option data-countryCode="KE" value="254"> +254</option>
                                        <option data-countryCode="KI" value="686"> +686</option>
                                        <option data-countryCode="KP" value="850">  +850</option>
                                        <option data-countryCode="KR" value="82">  +82</option>
                                        <option data-countryCode="KW" value="965"> +965</option>
                                        <option data-countryCode="KG" value="996"> +996</option>
                                        <option data-countryCode="LA" value="856"> +856</option>
                                        <option data-countryCode="LV" value="371"> +371</option>
                                        <option data-countryCode="LB" value="961"> +961</option>
                                        <option data-countryCode="LS" value="266"> +266</option>
                                        <option data-countryCode="LR" value="231"> +231</option>
                                        <option data-countryCode="LY" value="218"> +218</option>
                                        <option data-countryCode="LI" value="417"> +417</option>
                                        <option data-countryCode="LT" value="370"> +370</option>
                                        <option data-countryCode="LU" value="352"> +352</option>
                                        <option data-countryCode="MO" value="853"> +853</option>
                                        <option data-countryCode="MK" value="389"> +389</option>
                                        <option data-countryCode="MG" value="261"> +261</option>
                                        <option data-countryCode="MW" value="265"> +265</option>
                                        <option data-countryCode="MY" value="60"> +60</option>
                                        <option data-countryCode="MV" value="960"> +960</option>
                                        <option data-countryCode="ML" value="223"> +223</option>
                                        <option data-countryCode="MT" value="356"> +356</option>
                                        <option data-countryCode="MH" value="692">  +692</option>
                                        <option data-countryCode="MQ" value="596"> +596</option>
                                        <option data-countryCode="MR" value="222"> +222</option>
                                        <option data-countryCode="YT" value="269"> +269</option>
                                        <option data-countryCode="MX" value="52"> +52</option>
                                        <option data-countryCode="FM" value="691"> +691</option>
                                        <option data-countryCode="MD" value="373"> +373</option>
                                        <option data-countryCode="MC" value="377"> +377</option>
                                        <option data-countryCode="MN" value="976"> +976</option>
                                        <option data-countryCode="MS" value="1664"> +1664</option>
                                        <option data-countryCode="MA" value="212"> +212</option>
                                        <option data-countryCode="MZ" value="258"> +258</option>
                                        <option data-countryCode="MN" value="95"> +95</option>
                                        <option data-countryCode="NA" value="264"> +264</option>
                                        <option data-countryCode="NR" value="674"> +674</option>
                                        <option data-countryCode="NP" value="977"> +977</option>
                                        <option data-countryCode="NL" value="31"> +31</option>
                                        <option data-countryCode="NC" value="687">  +687</option>
                                        <option data-countryCode="NZ" value="64">  +64</option>
                                        <option data-countryCode="NI" value="505"> +505</option>
                                        <option data-countryCode="NE" value="227"> +227</option>
                                        <option data-countryCode="NG" value="234"> +234</option>
                                        <option data-countryCode="NU" value="683"> +683</option>
                                        <option data-countryCode="NF" value="672">  +672</option>
                                        <option data-countryCode="NP" value="670">  +670</option>
                                        <option data-countryCode="NO" value="47"> +47</option>
                                        <option data-countryCode="OM" value="968"> +968</option>
                                        <option data-countryCode="PW" value="680"> +680</option>
                                        <option data-countryCode="PA" value="507"> +507</option>
                                        <option data-countryCode="PG" value="675">   +675</option>
                                        <option data-countryCode="PY" value="595"> +595</option>
                                        <option data-countryCode="PE" value="51"> +51</option>
                                        <option data-countryCode="PH" value="63"> +63</option>
                                        <option data-countryCode="PL" value="48"> +48</option>
                                        <option data-countryCode="PT" value="351"> +351</option>
                                        <option data-countryCode="PR" value="1787">  +1787</option>
                                        <option data-countryCode="QA" value="974"> +974</option>
                                        <option data-countryCode="RE" value="262"> +262</option>
                                        <option data-countryCode="RO" value="40"> +40</option>
                                        <option data-countryCode="RU" value="7"> +7</option>
                                        <option data-countryCode="RW" value="250"> +250</option>
                                        <option data-countryCode="SM" value="378">  +378</option>
                                        <option data-countryCode="ST" value="239"> +239</option>
                                        <option data-countryCode="SA" value="966">  +966</option>
                                        <option data-countryCode="SN" value="221"> +221</option>
                                        <option data-countryCode="CS" value="381"> +381</option>
                                        <option data-countryCode="SC" value="248"> +248</option>
                                        <option data-countryCode="SL" value="232">  +232</option>
                                        <option data-countryCode="SG" value="65"> +65</option>
                                        <option data-countryCode="SK" value="421">  +421</option>
                                        <option data-countryCode="SI" value="386"> +386</option>
                                        <option data-countryCode="SB" value="677">  +677</option>
                                        <option data-countryCode="SO" value="252"> +252</option>
                                        <option data-countryCode="ZA" value="27">  +27</option>
                                        <option data-countryCode="ES" value="34"> +34</option>
                                        <option data-countryCode="LK" value="94">  +94</option>
                                        <option data-countryCode="SH" value="290"> +290</option>
                                        <option data-countryCode="KN" value="1869">+1869</option>
                                        <option data-countryCode="SC" value="1758"> +1758</option>
                                        <option data-countryCode="SD" value="249"> +249</option>
                                        <option data-countryCode="SR" value="597"> +597</option>
                                        <option data-countryCode="SZ" value="268"> +268</option>
                                        <option data-countryCode="SE" value="46"> +46</option>
                                        <option data-countryCode="CH" value="41"> +41</option>
                                        <option data-countryCode="SI" value="963"> +963</option>
                                        <option data-countryCode="TW" value="886"> +886</option>
                                        <option data-countryCode="TJ" value="7"> +7</option>
                                        <option data-countryCode="TH" value="66"> +66</option>
                                        <option data-countryCode="TG" value="228"> +228</option>
                                        <option data-countryCode="TO" value="676"> +676</option>
                                        <option data-countryCode="TT" value="1868">  +1868</option>
                                        <option data-countryCode="TN" value="216"> +216</option>
                                        <option data-countryCode="TR" value="90"> +90</option>
                                        <option data-countryCode="TM" value="993"> +993</option>
                                        <option data-countryCode="TC" value="1649"> +1649</option>
                                        <option data-countryCode="TV" value="688"> +688</option>
                                        <option data-countryCode="UG" value="256"> +256</option>
                                        <option data-countryCode="GB" value="44">+44</option>
                                        <option data-countryCode="UA" value="380"> +380</option>
                                        <option data-countryCode="AE" value="971">+971</option>
                                        <option data-countryCode="UY" value="598"> +598</option>
                                        <option data-countryCode="US" value="1"> +1</option>
                                        <option data-countryCode="UZ" value="7"> +7</option>
                                        <option data-countryCode="VU" value="678"> +678</option>
                                        <option data-countryCode="VA" value="379">  +379</option>
                                        <option data-countryCode="VE" value="58"> +58</option>
                                        <option data-countryCode="VN" value="84"> +84</option>
                                        <option data-countryCode="VG" value="84">  +1284</option>
                                        <option data-countryCode="VI" value="84"> +1340</option>
                                        <option data-countryCode="WF" value="681"> +681</option>
                                        <option data-countryCode="YE" value="969">+969</option>
                                        <option data-countryCode="YE" value="967">+967</option>
                                        <option data-countryCode="ZM" value="260">+260</option>
                                        <option data-countryCode="ZW" value="263"> +263</option>
                                    </select>
                                </div>
                                <div class="col-sm-5">
                                    <input type="number" id="number" v-model="form.phone_number"  class="form-control" name="phone_number" placeholder="Mobile Number" required>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button"  id="send_code"  class="btn btn-success" @click="phoneSendAuth()" >Отправить код</button>
                                </div>
                            </div>
                            <div class="form-group">

                                <div class="col-sm-8">
                                    <input type="number" id="verificationCode" class="form-control"  placeholder="введите код подтверждения" style="display:none;" required>
                                </div>
                                <div class="col-sm-4">
                                    <button type="button" id="verify_code" class="btn btn-success" @click="codeverify();"  style="display:none;">Проверить код</button>
                                </div>
                                <div class="alert alert-success col-sm-12" id="SuccessVerify" style="display: none;"></div>
                                <div class="alert error col-sm-12" id="ErrorVerify" style="display: none;"></div>

                            </div>



                            <div class="control-group">

                                <div class="col-sm-6 padding-left-0">
                                    <div class="controls input-container">
                                        <input  id="password" type="password" class="form-control " v-model="form.password"  placeholder=" пароль *"  name="password" required>
                                        <button class="btnEye" @click="toggleEye('password')" type="button"><i id="open" class="fas fa-eye"></i> <i id="close" class="fas fa-eye-slash"></i></button>
                                    </div>
                                </div>

                                <div class="col-sm-6 padding-right-0 ">
                                    <div class="controls input-container">
                                        <input  type="password" class="form-control  " placeholder="Подтвердите Пароль *" v-model="form.confirmpassword" id="confirmpassword" name="confirmpassword" required>
                                        <button class="btnEye" @click="toggleEye('confirmpassword')" type="button"><i id="open2" class="fas fa-eye"></i> <i id="close2" class="fas fa-eye-slash"></i></button>
                                    </div>
                                </div>
                            </div>




                            <button type="submit" class="btn btn-success submit" id="register" disabled>Зарегистрируйтесь сейчас</button>
                        </form>






                    </div>

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
import $ from "jquery";

import firebase from 'firebase/compat/app';
import 'firebase/compat/auth';
import 'firebase/compat/firestore';
import VueClientRecaptcha from 'vue-client-recaptcha'

const firebaseConfig = {
    apiKey: "AIzaSyCFVvsn6dt0WsVQljltQiW-ed-NOLRN9J8",
    authDomain: "jmibrokers.com",
    projectId: "jmi-brokers",
    storageBucket: "jmibrokers.com",
    messagingSenderId: "698047998267",
    appId: "1:698047998267:web:3f68d50ce3c78ef29e2f1e",
    measurementId: "G-FTZC0TXY4K"
}

const firebaseApp = firebase.initializeApp(firebaseConfig);
const db = firebaseApp.firestore();
const auth = firebaseApp.auth();

export default ({

    data(){
        return{
            site_title: `JMI Brokers | Client Register`,
            site_description: `JMI Brokers | Client Register`,
            site_keywords: 'JMI Brokers | Client Register',
            coderesult:'',
            _val:'',
            _attVal:'',
            firebaseConfig:{},
            title_list: [{text: 'Mr',value: '0'},{text: 'Mrs',value: '1'},{text: 'Miss',value: '2'},],
            captchaCode: null,
            isValid: false,

        }
    },
    mounted() {
        VueClientRecaptcha
        this.render()
        this.form.title = this.title_list[0].value,

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
        const jquery_scriptc0 = document.createElement("script");
        jquery_scriptc0.setAttribute("src","https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js");
        jquery_scriptc0.async = true;
        document.head.appendChild(jquery_scriptc0);

        const jquery_scriptc1 = document.createElement("script");
        jquery_scriptc1.setAttribute("src","https://www.gstatic.com/firebasejs/6.0.2/firebase.js");
        jquery_scriptc1.async = true;
        document.head.appendChild(jquery_scriptc1);

        $("#capatcha-quest input").prop('required', true);



        $('select#countryCode option').each(function(){
            this._val=$(this).val();
            this._attVal=$(this).attr('data-countryCode');
            $(this).text(this._attVal+'('+this._val+')');
        });
        $(function() {
            // choose target dropdown
            var select = $('select#countryCode');
            select.html(select.find('option').sort(function(x, y) {
                // to change to descending order switch "<" for ">"
                return $(x).text() > $(y).text() ? 1 : -1;
            }));

            // select default item after sorting (first item)
            // $('select').get(0).selectedIndex = 0;
        });

    },
    methods: {
// Initialize Firebase


        toggleEye(ElementId) {
            var x = document.getElementById(ElementId);
            var open = document.getElementById("open");
            var close = document.getElementById("close");
            if (x.type === "password") {
                x.type = "text";
                open.style.display="block";
                close.style.display="none";
            } else {
                x.type = "password";
                open.style.display="none";
                close.style.display="block";
            }
        },

        codeverify() {


            var code = $("#verificationCode").val();

            this.coderesult.confirm(code).then(function (result) {
                var user=result.user;

                $("#SuccessVerify").text("Code Verified, you can register now.");
                $("#SuccessVerify").show();
                $("#Success").hide();
                $("#verify_code").prop('disabled', true);
                $("#verificationCode").prop('readonly', true);

                $("button#register").prop('disabled', false);

            }).catch(function (error) {
                $("#ErrorVerify").text(error.message);
                $("#ErrorVerify").show();
            });
        },


        emailSendAuth() {
            var email = $("#email").val();

            $.ajax({
                type: "get",
                url :"/api/sendverificationmailCode/"+email+"/",
                success:function(result){
                    if(result==1){

                        $("#emailsentSuccess").text("Email Sent Successfully.");
                        $("#emailsentSuccess").show();
                        $("#emailsuccessRegsiter").hide();
                        // $("#email").prop('readonly', true);
                        // $("#email_send_code").prop('disabled', true);
                        $("#emailverificationCode").show();
                        $("#email_verify_code").show();
                        $("#emailerror").hide();


                    }else if(result==0){
                        $("#emailerror").text('Invalid Code');
                        $("#emailerror").show();
                    }
                },
                error:function(result){
                    $("#emailerror").text('An error has occured');
                    $("#emailerror").show();
                }
            });




        },

        emailcodeverify() {

            var emailcode = $("#emailverificationCode").val();
            var email = $("#email").val();


            $.ajax({
                type: "get",
                url :"/api/verificationmailCode/"+email+"/"+emailcode,
                success:function(result){
                    if(result==1){

                        $("#emailsuccessRegsiter").text("Code Verified, you can resume now.");
                        $("#emailsuccessRegsiter").show();
                        $("#emailsentSuccess").hide();

                    }else if(result==0){
                        $("#emailerror").text('Invalid Code');
                        $("#emailerror").show();
                    }
                },
                error:function(result){
                    $("#emailerror").text('An error has occured');
                    $("#emailerror").show();
                }
            });



        },

         render() {
                window.recaptchaVerifier=new firebase.auth.RecaptchaVerifier('recaptcha-container');
                recaptchaVerifier.render();
            },
        phoneSendAuth(){

            var number = '+'+$("#countryCode").val()+$("#number").val();

            auth.signInWithPhoneNumber(number,window.recaptchaVerifier).then( (confirmationResult) => {

                window.confirmationResult=confirmationResult;
                this.coderesult=confirmationResult;

                $("#SMSSuccess").text("Message Sent Successfully.");
                $("#SMSSuccess").show();
                $("#successRegsiter").hide();
                $("#number").prop('readonly', true);
                $("#countryCode").prop('readonly', true);
                $("#send_code").prop('disabled', true);
                $("#verificationCode").show();
                $("#verify_code").show();
                $("#SMSError").hide();

            }).catch(function (error) {

                $("#SMSError").text(error.message);
                $("#SMSError").show();
            });

        }

    },
    setup() {

        const errors = ref()
        const router = useRouter();
        const form = reactive({
            title: '',
            fullname: '',
            username: '',
             email: '',
            password: '',
            confirmpassword: '',
            phone_number: '',
           //_answer: '',

            "_token": "{{ csrf_token() }}"
        })
        const handleSignup = async () => {

            try {
                const result = await axios.post('/api/user/signup', form)

                if (result.status === 200 && result.data==1) {
                    localStorage.setItem('JMI_User', form.username)
                    await router.push('/ru/cpanel/home')
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.ru || ""
                } else {
                    if(e && e.response.data && e.response.data.errors) {
                        errors.value = Object.values(e.response.data.errors)
                    } else {
                        errors.value = e.response.data.errors || ""
                    }                }

            }
        }




        return {
            form,
            errors,
            handleSignup,
        }
    },
    create() {
        // $.getJSON('https://ipinfo.io/json', function(result) {
        //     $('option[data-countryCode="'+result.country+'"]').prop('selected', true);
        // });
    }
})

</script>


<style>
#newLogin
{
    display: flex;
    align-items: center;
}
#newLogin h2
{
    color:#0059b2;
    font-family: 'Roboto-Bold';
    margin: 0px 10px;
}
input:-webkit-autofill,
input:-webkit-autofill:hover,
input:-webkit-autofill:focus,
input:-webkit-autofill:active
{
    -webkit-box-shadow: 0 0 0 30px white inset !important;
}
#capatcha-quest *
{
    color: #777777;
    font-weight:bold;
}
#send_code , #email_send_code , #register
{
    background-color: #fdbe01 !important;
    color: white !important;
    border-radius: 4px;
    border: 1px solid #bfbfbf !important;
    padding: 6px 10px !important;
    width: auto !important;
    display: flex;
}
#open  , #open2
{
    display:none ;
}
#open , #open2, #close , #close2
{
    font-size: 15px;
    padding-right: 5px;

}
.btnEye
{
    border: none;
    background-color: white;
    padding: 0px;
    border-radius: inherit;
}
.input-container
{
    display: flex;
    background-color: white;
    border: 1px solid #bfbfbf;
    margin-bottom:10px;
    max-width: 270px !important;
    border-radius: 4px;
}
#password , #confirmpassword
{
    width: calc(100% - 19px);
    margin-bottom: 0px !important;
    border: none;
}
.container
{
    width: 100% !important;
}
@media only screen and (max-width:768px)
{
    div.col-sm-3.padding-left-0, div.col-sm-8 ,div.col-sm-6.padding-left-0
    {
        padding:0px !important;

    }
    .myFlex
    {
        display:flex;
        justify-content:center;
    }
    div.form-group
    {
        margin-bottom:5px;
    }
    .input-container
    {
        max-width:100% !important;
    }
    #RegisterForm
    {
        width:100%;
    }
    .pdtb40
    {

    }
    div.col-xs-12.text-left
    {
        padding:0px;
    }
    .container
    {
        max-width:390px;
    }
}
@media only screen and (max-width:402px)
{
    #newLogin h2
    {
        font-size:25px;
    }
}
</style>
