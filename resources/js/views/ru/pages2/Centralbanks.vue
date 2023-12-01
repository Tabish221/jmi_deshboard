<template>


                  <div class="row gray_bg mrtb40">
            <div class="container">

        <br />
<table width="680" border="0" align="center">
  <tr>
    <td>

     <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
         <tr>
             <td><span ><strong>&nbsp;&nbsp;&nbsp;Что такое Центральный банк?</strong></span></td>
         </tr>
     </table>
        <br />

        <p align="left">Центральный банк (также иногда называемый резервным банком или органом денежно-кредитного регулирования) является субъектом, отвечающим за денежно-кредитную политику страны или группы государств-членов. Его основная обязанность заключается в поддержании стабильности национальной валюты и денежной массы, но более активные обязанности включают в себя контроль над процентными ставками по субсидированным кредитам, а также оказание финансовой помощи и кредитора последней инстанции для банковского сектора во время финансового кризиса. В большинстве богатых стран сегодня есть независимый и центральный банк, то есть тот, который действует по правилам, разработанным для предотвращения политического вмешательства. </p>

        <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg/">
            <tr>
                <td><span ><strong>&nbsp;&nbsp;&nbsp;Обязанности центрального банка</strong></span></td>
            </tr>
        </table>
        <br />


       <ul>
        <li><span dir="ltr"> </span>Реализация денежно-кредитной политики</li>
        <li><span dir="ltr"> </span>Контролирует денежную массу нации</li>
        <li><span dir="ltr"> </span>Действует как государственный банкир, так и банковский банк (кредитор последней инстанции)&quot;)</li>
        <li><span dir="ltr"> </span>Управляет валютными и золотыми запасами страны, а также государственным реестром акций.</li>
        <li><span dir="ltr"> </span>Устанавливает официальную процентную ставку, используемую для управления как инфляцией, так и обменным курсом страны.</li>
    </ul>


        <table width="680" height="37" border="0" background="/assets/cimages/bg_1.jpg">
            <tr>
                <td><span ><strong>&nbsp;&nbsp;&nbsp;Центральные банки майоров&quot;</strong></span></td>
            </tr>
        </table>
        <br />

        <p>Ниже приведен список центральных банков для нескольких основных мировых валют:</p>
        <table border="0" cellpadding="0">
            <tr>
                <td><p>Банк Канады<br />
                    Банк Англии <br />
                     Федеральный резерв США <br />
                     Швейцарский Национальный Банк <br />
                     Банк Японии <br />
                     Резервный банк Австралии <br />
                     Резервный банк Новой Зеландии <br />
                     Европейский центральный банк </p> </td>
          <td><p><a href="http://www.bankofcanada.ca/" target="_blank">http://www.bankofcanada.ca</a> <br />
                  <a href="http://www.bankofengland.co.uk/" target="_blank">http://www.bankofengland.co.uk</a> <br />
                  <a href="http://www.federalreserve.gov/" target="_blank">http://www.federalreserve.gov</a> <br />
                  <a href="http://www.snb.ch/" target="_blank">http://www.snb.ch</a> <br />
                  <a href="http://www.boj.or.jp/" target="_blank">http://www.boj.or.jp</a> <br />
                  <a href="http://www.rba.gov.au/" target="_blank">http://www.rba.gov.au</a> <br />
                  <a href="http://www.rbnz.govt.nz/" target="_blank">http://www.rbnz.govt.nz</a> <br />
              <a href="http://www.ecb.int/" target="_blank">http://www.ecb.int</a> </p></td>
        </tr>
      </table>      </td>
  </tr>
</table>
</div></div>



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
            site_title: `Central Banks`,
            site_description: ``,
            site_keywords: '',

        }
    },
    mounted() {
        useHead({
            // Can be static or computed
            title: computed(() => 'Central Banks'),
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
    }
});
</script>
