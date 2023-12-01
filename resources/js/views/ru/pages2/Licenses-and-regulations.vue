<template>

<link rel="canonical" href="https://www.jmibrokers.com/ru/licenses-and-regulations " />

 <div class="row gray_bg">
        <img src="/assets/img/License.jpg" alt="" class="img-responsive center-block picHeight" />
    </div>


	    <div class="row gray_bg mrtb40">
            <div class="container">
                <h2> Лицензии и правила</h2>
                <p>
                    При выборе брокера важно убедиться, что он лицензирован и регулируется заслуживающим доверия государственным органом. Каждый лицензирующий орган контролирует практику работы финансовых компаний, обеспечивая строгое соблюдение всех норм.
                    <br />

                </p>
                <div class="speacer20"></div>

                <h4> <img src="/wave/img/vanatua-flag.png" style="width:25px;height:25px;" /> Республика Вануату Лицензия</h4>
                <p>
                    JMI Brokers LTD является лицензированным провайдером финансовых услуг от Комиссии по финансовым услугам Вануату и уполномочен вести бизнес по сделкам с ценными бумагами в соответствии с<br /><a href="https://www.vfsc.vu/70-prevention-of-fraud-investments-act/"> регистрационный номер15010</a>

                </p>
                <p>
                    Регулятор VFSC полностью контролирует деятельность участников рынка и обеспечивает соответствие международным стандартам, в частности, предоставление брокерских услуг лицензированными компаниями. Регулятор гарантирует прозрачность работы и подтверждает, что только компании с высокой степенью надежности могут получить право на получение лицензии на финансовую деятельность в юрисдикции регистратора.

                </p>
                <img src="/assets/img/vanuatu-license.png" altr="Vanuatu License" style="width:100%;display:none;"/>

                <h4 style="color: #0059b2; font-weight: bold;">(VFSC) Преимущества лицензии</h4>
                <ul style="padding-left:10px;">
                    <li>Финансовая защита вкладов клиентов до $500 000</li>
                        <li>Облигация в размере 5 миллионов НДС должна быть депонирована и храниться в VFSC.</li>
                        <li style="display:none;"> Облигация была увеличена в 2017 году с 200 000 НДС до 5 млн НДС. </li>

                        <li style="display:none;"> Рекомендательное письмо из банка и недавняя выписка из банка в качестве доказательства источника средств для
                            оплатить Капитал за каждого конечного бенефициарного владельца (владельцев). </li>

                        <li style="display:none;">VFSC запрашивает письмо от банка заявителя, подтверждающее
                            статус и ликвидность как подтверждение источника средств. Столица в этом контексте <br />

                            означает выплату депозита по облигациям, а также средства, необходимые для установления Финансового
                            бизнес в движении. Если клиент не может предоставить выписку/письмо из банка,
                            основание для отказа в приеме. </li>

                        <li style="display:none;"> Заявление с изложением финансового положения, текущих активов и условных
                            обязательства компании</li>

                        <li> Лицензия должна иметь соответствующее страховое покрытие, в том числе профессиональное возмещение.
                            страховое возмещение для партнеров и сотрудников, бывших партнеров и сотрудников, а также
                            консультантов, служить защитой средств инвестора в случае финансовых
                            потеря. Минимальное страховое покрытие для каждого лицензиата было пересмотрено в январе 2019 года.
                            и должно быть: </li>
                    <br/>


                        <li>
                            <ol id="sortedList" type="i">
                                <li>5 000 000 VT (+/- 50 000 долларов США) за каждое требование,</li>
                                <li>с совокупным покрытием не менее 50 000 000 VT (+/- 500 000 долларов США) и,</li>
                                <li>максимальная сумма вычета 10 000 000 VT (+/- 100 000 долларов США)</li>
                            </ol>
                        </li>


                <a class="links" href="/assets/Downloads/JMI BROKERS LIMITED PI COVER.pdf" title="Anti Money Laundering">Договор страхования вкладов</a><br />
                <a href="/assets/Downloads/JMI Brokers Ltd AML New.pdf#toolbar=0" target="_blank" title="Anti Money Laundering">AML & CTF Procedure Manual</a><br />

                <p>VFSC строго следует международным правовым нормам и соблюдает все законы о борьбе с отмыванием денег.</p>


                <h4 style="display-:none;">2- <img src="/assets/img/drawn-switz-icon-dark.png/" style="width:25px;height:25px;" />швейцарский юрист</h4>
                <p style="display-:none;">
                    JMI Brokers AG (100% дочерняя компания JMI Brokers LTD) - это швейцарская юридическая корпорация с зарегистрированным офисом в Цуге с регистрационным номером <a href="/assets/downloads/CHE.pdf" ># CHE 334-229-499 </a> .

                </p>

                </ul>
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
            site_title: `Licenses and Regulations`,
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
.links
{
    text-decoration: underline;
    font-size: 18px;
    color: #337ab7 !important;

}
#sortedList li
{
    list-style-type:inherit;
    padding-left:20px;
    margin-top:5px;
}
</style>
