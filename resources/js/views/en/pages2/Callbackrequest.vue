<template>

 <div class="row-fluid">
    <div class="callbackrequest loginpage">
        <div class="container">
            <div class="col-lg-6 col-sm-8 col-xs-12 col-xxs" >

                <div class="login">
                    <h1 class="title color-white" ><span class="fa fa-arrow-circle-right  callbackrequestarrow jmiyellow"></span> Call Back <strong>Request</strong> </h1>
                        <div class="form">
                             <form id="callbackrequest" autocomplete="off" method="post" @submit.prevent="callback" class="form-horizontal">


                                <div class="control-group col-sm-12">

                                    <div class="col-sm-3">
                                      <div class="controls">
                                        <select class="form-control txt-box" name="title" v-model="form.title" id="title"  required>
                                          <option value="0">Mr</option>
                                          <option value="1">Mrs</option>
                                          <option value="2">Miss</option>
                                        </select>
                                      </div>
                                  </div>

                                  <div class="col-sm-9">
                                    <div class="controls">
                                        <input  type="text" class="form-control txt-box col-lg-8" id="fullname" v-model="form.fullname" name="fullname"  placeholder="Full Name *"  required>
                                    </div>
                                  </div>
                                </div>
                                <div class="control-group col-sm-12">
                                <div class="col-sm-6">
                                  <div class="controls">
                                    <select name="department"  class="form-control txt-box" title="Select Department" v-model="form.department" id="department"   required>
                                      <option disabled selected>--Select Department--</option>
                                      <option value="0">Sales</option>
                                      <option value="1">Customer Service</option>
                                      <option value="2">Account Openings</option>
                                    </select>
                                  <label class="error" for="username"></label>
                                  </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="controls">
                                      <input   type="text" class="form-control txt-box" id="email" name="email" v-model="form.email"  placeholder="Email *"  required>
                                      <label class="error" for="email"></label>
                                    </div>
                                  </div>
                                </div>

                                <div class="control-group col-sm-12">

                                    <div class="col-sm-6">
                                      <div class="controls">

                              <select name="country" title="select your country!" v-model="form.country" id="country" class="form-control txt-box"   required>
                              <option disabled selected>--Select Country--</option>
                              <option value="1">Afghanistan</option>
                              <option value="2">Albania</option>
                              <option value="3">Algeria</option>
                              <option value="4">American Samoa</option>
                              <option value="5">Andorra</option>
                              <option value="6">Angola</option>
                              <option value="7">Anguilla</option>
                              <option value="8">Antarctica</option>
                              <option value="9">Antigua and Barbuda</option>
                              <option value="10">Argentina</option>
                              <option value="11">Armenia</option>
                              <option value="12">Aruba</option>
                              <option value="13">Australia</option>
                              <option value="14">Austria</option>
                              <option value="15">Azerbaijan</option>
                              <option value="16">Bahamas</option>
                              <option value="17">Bahrain</option>
                              <option value="18">Bangladesh</option>
                              <option value="19">Barbados</option>
                              <option value="20">Belarus</option>
                              <option value="21">Belgium</option>
                              <option value="22">Belize</option>
                              <option value="23">Benin</option>
                              <option value="24">Bermuda</option>
                              <option value="25">Bhutan</option>
                              <option value="26">Bolivia</option>
                              <option value="27">Bosnia and Herzegovina</option>
                              <option value="28">Botswana</option>
                              <option value="29">Brazil</option>
                              <option value="30">British Indian Ocean Territory</option>
                              <option value="31">British Virgin Islands</option>
                              <option value="32">Brunei</option>
                              <option value="33">Bulgaria</option>
                              <option value="34">Burkina Faso</option>
                              <option value="35">Burundi</option>
                              <option value="36">Cambodia</option>
                              <option value="37">Cameroon</option>
                              <option value="38">Canada</option>
                              <option value="39">Cape Verde</option>
                              <option value="40">Cayman Islands</option>
                              <option value="41">Central African Republic</option>
                              <option value="42">Chad</option>
                              <option value="43">Chile</option>
                              <option value="44">China</option>
                              <option value="45">Christmas Island</option>
                              <option value="46">Cocos Islands</option>
                              <option value="47">Colombia</option>
                              <option value="48">Comoros</option>
                              <option value="49">Cook Islands</option>
                              <option value="50">Costa Rica</option>
                              <option value="51">Croatia</option>
                              <option value="52">Cuba</option>
                              <option value="53">Curacao</option>
                              <option value="54">Cyprus</option>
                              <option value="55">Czech Republic</option>
                              <option value="56">Democratic Republic of the Congo</option>
                              <option value="57">Denmark</option>
                              <option value="58">Djibouti</option>
                              <option value="59">Dominica</option>
                              <option value="60">Dominican Republic</option>
                              <option value="61">East Timor</option>
                              <option value="62">Ecuador</option>
                              <option value="63">Egypt</option>
                              <option value="64">El Salvador</option>
                              <option value="65">Equatorial Guinea</option>
                              <option value="66">Eritrea</option>
                              <option value="67">Estonia</option>
                              <option value="68">Ethiopia</option>
                              <option value="69">Falkland Islands</option>
                              <option value="70">Faroe Islands</option>
                              <option value="71">Fiji</option>
                              <option value="72">Finland</option>
                              <option value="73">France</option>
                              <option value="74">French Polynesia</option>
                              <option value="75">Gabon</option>
                              <option value="76">Gambia</option>
                              <option value="77">Georgia</option>
                              <option value="78">Germany</option>
                              <option value="79">Ghana</option>
                              <option value="80">Gibraltar</option>
                              <option value="81">Greece</option>
                              <option value="82">Greenland</option>
                              <option value="83">Grenada</option>
                              <option value="84">Guam</option>
                              <option value="85">Guatemala</option>
                              <option value="86">Guernsey</option>
                              <option value="87">Guinea</option>
                              <option value="88">Guinea-Bissau</option>
                              <option value="89">Guyana</option>
                              <option value="90">Haiti</option>
                              <option value="91">Honduras</option>
                              <option value="92">Hong Kong</option>
                              <option value="93">Hungary</option>
                              <option value="94">Iceland</option>
                              <option value="95">India</option>
                              <option value="96">Indonesia</option>
                              <option value="97">Iran</option>
                              <option value="98">Iraq</option>
                              <option value="99">Ireland</option>
                              <option value="100">Isle of Man</option>
                              <option value="101">Palestine</option>
                              <option value="102">Italy</option>
                              <option value="103">Ivory Coast</option>
                              <option value="104">Jamaica</option>
                              <option value="105">Japan</option>
                              <option value="106">Jersey</option>
                              <option value="107">Jordan</option>
                              <option value="108">Kazakhstan</option>
                              <option value="109">Kenya</option>
                              <option value="110">Kiribati</option>
                              <option value="111">Kosovo</option>
                              <option value="112">Kuwait</option>
                              <option value="113">Kyrgyzstan</option>
                              <option value="114">Laos</option>
                              <option value="115">Latvia</option>
                              <option value="116">Lebanon</option>
                              <option value="117">Lesotho</option>
                              <option value="118">Liberia</option>
                              <option value="119">Libya</option>
                              <option value="120">Liechtenstein</option>
                              <option value="121">Lithuania</option>
                              <option value="122">Luxembourg</option>
                              <option value="123">Macao</option>
                              <option value="124">Macedonia</option>
                              <option value="125">Madagascar</option>
                              <option value="126">Malawi</option>
                              <option value="127">Malaysia</option>
                              <option value="128">Maldives</option>
                              <option value="129">Mali</option>
                              <option value="130">Malta</option>
                              <option value="131">Marshall Islands</option>
                              <option value="132">Mauritania</option>
                              <option value="133">Mauritius</option>
                              <option value="134">Mayotte</option>
                              <option value="135">Mexico</option>
                              <option value="136">Micronesia</option>
                              <option value="137">Moldova</option>
                              <option value="138">Monaco</option>
                              <option value="139">Mongolia</option>
                              <option value="140">Montenegro</option>
                              <option value="141">Montserrat</option>
                              <option value="142">Morocco</option>
                              <option value="143">Mozambique</option>
                              <option value="144">Myanmar</option>
                              <option value="145">Namibia</option>
                              <option value="146">Nauru</option>
                              <option value="147">Nepal</option>
                              <option value="148">Netherlands</option>
                              <option value="149">Netherlands Antilles</option>
                              <option value="150">New Caledonia</option>
                              <option value="151">New Zealand</option>
                              <option value="152">Nicaragua</option>
                              <option value="153">Niger</option>
                              <option value="154">Nigeria</option>
                              <option value="155">Niue</option>
                              <option value="156">North Korea</option>
                              <option value="157">Northern Mariana Islands</option>
                              <option value="158">Norway</option>
                              <option value="159">Oman</option>
                              <option value="160">Pakistan</option>
                              <option value="161">Palau</option>
                              <option value="162">Palestine</option>
                              <option value="163">Panama</option>
                              <option value="164">Papua New Guinea</option>
                              <option value="165">Paraguay</option>
                              <option value="166">Peru</option>
                              <option value="167">Philippines</option>
                              <option value="168">Pitcairn</option>
                              <option value="169">Poland</option>
                              <option value="170">Portugal</option>
                              <option value="171">Puerto Rico</option>
                              <option value="172">Qatar</option>
                              <option value="173">Republic of the Congo</option>
                              <option value="174">Reunion</option>
                              <option value="175">Romania</option>
                              <option value="176">Russia</option>
                              <option value="177">Rwanda</option>
                              <option value="178">Saint Barthelemy</option>
                              <option value="179">Saint Helena</option>
                              <option value="180">Saint Kitts and Nevis</option>
                              <option value="181">Saint Lucia</option>
                              <option value="182">Saint Martin</option>
                              <option value="183">Saint Pierre and Miquelon</option>
                              <option value="184">Saint Vincent and the Grenadines</option>
                              <option value="185">Samoa</option>
                              <option value="186">San Marino</option>
                              <option value="187">Sao Tome and Principe</option>
                              <option value="188">Saudi Arabia</option>
                              <option value="189">Senegal</option>
                              <option value="190">Serbia</option>
                              <option value="191">Seychelles</option>
                              <option value="192">Sierra Leone</option>
                              <option value="193">Singapore</option>
                              <option value="194">Sint Maarten</option>
                              <option value="195">Slovakia</option>
                              <option value="196">Slovenia</option>
                              <option value="197">Solomon Islands</option>
                              <option value="198">Somalia</option>
                              <option value="199">South Africa</option>
                              <option value="200">South Korea</option>
                              <option value="201">South Sudan</option>
                              <option value="202">Spain</option>
                              <option value="203">Sri Lanka</option>
                              <option value="204">Sudan</option>
                              <option value="205">Suriname</option>
                              <option value="206">Svalbard and Jan Mayen</option>
                              <option value="207">Swaziland</option>
                              <option value="208">Sweden</option>
                              <option value="209">Switzerland</option>
                              <option value="210">Syria</option>
                              <option value="211">Taiwan</option>
                              <option value="212">Tajikistan</option>
                              <option value="213">Tanzania</option>
                              <option value="214">Thailand</option>
                              <option value="215">Togo</option>
                              <option value="216">Tokelau</option>
                              <option value="217">Tonga</option>
                              <option value="218">Trinidad and Tobago</option>
                              <option value="219">Tunisia</option>
                              <option value="220">Turkey</option>
                              <option value="221">Turkmenistan</option>
                              <option value="222">Turks and Caicos Islands</option>
                              <option value="223">Tuvalu</option>
                              <option value="224">U.S. Virgin Islands</option>
                              <option value="225">Uganda</option>
                              <option value="226">Ukraine</option>
                              <option value="227">United Arab Emirates</option>
                              <option value="228">United Kingdom</option>
                              <option value="229">United States</option>
                              <option value="230">Uruguay</option>
                              <option value="231">Uzbekistan</option>
                              <option value="232">Vanuatu</option>
                              <option value="233">Vatican</option>
                              <option value="234">Venezuela</option>
                              <option value="235">Vietnam</option>
                              <option value="236">Wallis and Futuna</option>
                              <option value="237">Western Sahara</option>
                              <option value="238">Yemen</option>
                              <option value="239">Zambia</option>
                              <option value="240">Zimbabwe</option>
                            </select>
                                              </div>
                                          </div>

                                          <div class="col-sm-6">
                                            <div class="controls">
                                                <input  type="text" class="form-control txt-box col-lg-8" v-model="form.city" id="city" name="city"  placeholder="City *"  required>
                                            </div>
                                          </div>
                                        </div>
                                        <div class="control-group col-sm-12">

                                            <div class="col-sm-5">
                                              <div class="controls">
                                                <input  type="text" class="form-control txt-box col-lg-8" v-model="form.code" id="code" name="code" placeholder="Code * : use 00 for +"   required>
                                              </div>
                                          </div>
                                            <div class="col-sm-7">
                                              <div class="controls">
                                                <input  type="text" class="form-control txt-box col-lg-8" id="phone" v-model="form.phone" name="phone"  placeholder="Phone *" required>
                                              </div>
                                          </div>

                                        </div>
                                            <div class="col-sm-12" >
                                              <div class="col-sm-12">
                                               <input type="text" class="form-control txt-box" name="timetocall" v-model="form.timetocall" id="timetocall" placeholder="Time To Call * : Ex. 9 AM to 6 PM" required/>
                                              </div>
                                            </div>
                                        <div class="col-sm-12 text-center" >
                                            <input type="submit" name="callbackrequest" value="Request"  id="loginsubmit" class="form-btn" style="max-width:250px;margin:10px auto;" />
                                        </div>
                            </form>

                        </div>
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
import $ from "jquery";
const errors = ref()
const router = useRouter();

export default ({
    data(){
        return{
            site_title: `Call Back Request`,
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
                    content: computed(() => ''),
                },
                {
                    name: `keywords`,
                    content: computed(() => ''),
                },
            ],

        })
    },
    setup(){
        const errors = ref()
        const router = useRouter();
        const form = reactive({
            title: '',
            timetocall: '',
            email: '',
            fullname: '',
            code: '',
            country: '',
            phone: '',
            city: '',
            department: '',
        })
        const callback = async () => {

            try {
                const result = await axios.post('/api/callbackrequest', form)

                if (result.status === 200) {
                    await router.push('/en/callbackrequest/msg')
                }else if(result.status === 201){
                    $("#Error > span").text(result.data.errors.en);
                    $("#Error").show();
                    $("#Success").hide();
                }
            } catch (e) {
                if (e.response && e.response.status === 401) {
                    errors.value = e.response.data.errors.en || ""
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
            callback,
        }
    }
});
</script>
