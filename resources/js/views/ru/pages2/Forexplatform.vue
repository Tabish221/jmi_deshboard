<template>
<link rel="canonical" href="https://www.jmibrokers.com/ru/forexplatform " />
         <div class="row gray_bg">
            <img src="/assets/img/forex_platform.jpg" alt="" class="img-responsive center-block picHeight" />
        </div>


        <div class="row gray_bg">
            <div class="container mrtb40">
                <h2> метатрейдер 4 Forex Платформа</h2>


                <div class="item">
                    <ul class="faq">
                        <li class="q">
                            <span class="fa fa-arrow-circle-right"></span>
                            <h3>Ключевые особенности метатрейдер 4 (MT4):  </h3>
                        </li>

                        <li class="a" ><div>

                            <ul class="li1" type="disc">
                                <li> Мгновенное выполнение и выполнение запроса цены (RFQ) </li>
                                         <li> Трейлинг-стоп </li>
                                         <li> Полный пакет технического анализа: более 30 встроенных индикаторов и инструментов для построения графиков, возможность создавать различные пользовательские индикаторы, разные периоды времени (от минут до месяцев); </Li>
                                         <li> Он-лайн новости от Dow Jones. </li>
                                         <li> Многоязычный интерфейс программы; </Li>
                                         <li> Управление базой данных истории и возможностью импорта / экспорта данных в реальном времени; </Li>
                                         <li> сигналы о системных и торговых действиях; </Li>
                                         <li> Внутренняя электронная почта; </Li>
                                         <li> Комплексные торговые отчеты. </Li>
                                         <li> Мобильная торговля: метатрейдер 4 Mobile для КПК и подходящих мобильных телефонов </li>
                                         <li> Встроенные справочные руководства для метатрейдер 4 и MetaQuotes Language 4. </li>
                            </ul>
                            <p align="center">&nbsp;&nbsp;<a href="/ru/signup" class="slide-demo-button" >Скачать демо метатрейдер 4 форекс</a> </p>

        <br />
        <img src="/assets/cimages/ala.jpg" alt="" /><br />




            </div></li>
          </ul>
      </div>



                          <div class="openlivedemoaccountbtn" dir="rtl">
  <a href="/ru/signup" class="slide-demo-button" ><span><strong>Откройте демо-счет</strong></span></a>

    <a href="/ru/signup" class="slide-live-button"><span><strong>Откройте реальный</strong> аккаунт</span></a>
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
            site_title: `Metatrader 4 FX Platform`,
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
