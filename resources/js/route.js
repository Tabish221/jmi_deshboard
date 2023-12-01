import {createRouter, createWebHistory} from 'vue-router';
import EnLayout from './views/en/partials/Layout.vue';
import EnCpanelLayout from './views/en/cpanel/partials/Layout.vue';
import ArLayout from './views/ar/partials/Layout.vue';
import ArCpanelLayout from './views/ar/cpanel/partials/Layout.vue';
import RuLayout from './views/ru/partials/Layout.vue';
import RUCpanelLayout from './views/ru/cpanel/partials/Layout.vue';
import axios from "axios";

const router = createRouter({
    history: createWebHistory(),
    routes: [

        //EN Routes
        {
            path:'/en',
            name:'EnIndex',
            component: EnLayout,
            children:[
                {
                    path:'/',
                    component: () => import('./views/en/Index.vue')
                },
                {
                    path:'/en',
                    component: () => import('./views/en/Index.vue')
                },
                {
                    path: '/en/logout',
                    component:  handleLogout

                },
                {
                    path: '/en/slogin',
                    component: () => import('./views/en/pages/Slogin')
                },
                {
                    path: '/en/login',
                    component: () => import('./views/en/pages/login')
                },
                {
                    path: '/en/signup',
                    component: () => import('./views/en/pages/Signup.vue')
                },
                {
                    path: '/en/forgot-password',
                    component: () => import('./views/en/pages/ForgetPassword.vue')
                },
                {
                    path: '/en/reset-password',
                    component: () => import('./views/en/pages/ResetPassword.vue')
                },
                {
                    path: '/en/404',
                    component: () => import('./views/en/pages/404.vue')
                },
                {
                    path: '/en/commodities',
                    component: () => import('./views/en/pages/Commodities.vue')
                },
                {
                    path: '/en/stocks2',
                    component: () => import('./views/en/pages/Stocks2.vue')
                },

                {path: '/en/about-jmi',component: () => import('./views/en/pages2/about-jmi')},
                {path: '/en/become-partner',component: () => import('./views/en/pages2/become-partner')},
                {path: '/en/become-partner/msg',component: () => import('./views/en/pages2/Becomepartnermsg')},
                {path: '/en/callbackrequest',component: () => import('./views/en/pages2/callbackrequest')},
                {path: '/en/callbackrequest/msg',component: () => import('./views/en/pages2/Callbackrequestmsg')},
                {path: '/en/career',component: () => import('./views/en/pages2/career')},
                {path: '/en/contact-us',component: () => import('./views/en/pages2/contact-us')},
                {path: '/en/culture',component: () => import('./views/en/pages2/culture')},
                {path: '/en/corporate-philosophy',component: () => import('./views/en/pages2/corporate-philosophy')},
                {path: '/en/conflicts-of-interest-policy',component: () => import('./views/en/pages2/conflicts-of-interest-policy')},
                {path: '/en/dailyfundamental',component: () => import('./views/en/pages2/Dailyfundamental')},
                {path: '/en/dailytechnical/:type',component: () => import('./views/en/pages2/Dailytechnical')},
                {path: '/en/dailytechnical',component: () => import('./views/en/pages2/Dailytechnical')},
                {path: '/en/dailytechnical/more',component: () => import('./views/en/pages2/Dailytechnical')},
                {path: '/en/centralbanks',component: () => import('./views/en/pages2/centralbanks')},
                {path: '/en/contractsizes',component: () => import('./views/en/pages2/contractsizes')},
                {path: '/en/coinbase',component: () => import('./views/en/pages2/Coinbase')},
                {path: '/en/dailytechnical/technical/:technicalId',component: () => import('./views/en/pages2/viewtechnical')},
                {path: '/en/dailytechnical/more/:type',component: () => import('./views/en/pages2/viewmoretechnical')},
                {path: '/en/dailyfundamental/fundamental/:fundamentalId',component: () => import('./views/en/pages2/viewfundamental')},
                {path: '/en/diversification',component: () => import('./views/en/pages2/diversification')},
                {path: '/en/calendar',component: () => import('./views/en/pages2/Economic-calendar')},
                {path: '/en/economicindicators',component: () => import('./views/en/pages2/Economicindicators')},
                {path: '/en/education',component: () => import('./views/en/pages2/Education')},
                {path: '/en/elliotwavetheory',component: () => import('./views/en/pages2/Elliotwavetheory')},
                {path: '/en/faq',component: () => import('./views/en/pages2/Faq')},
                {path: '/en/forex',component: () => import('./views/en/pages2/Forex')},
                {path: '/en/forexprices',component: () => import('./views/en/pages2/Forexprices')},
                {path: '/en/forexvsequities',component: () => import('./views/en/pages2/Forexvsequities')},
                {path: '/en/forexvsfutures',component: () => import('./views/en/pages2/Forexvsfutures')},
                {path: '/en/forexbroker',component: () => import('./views/en/pages2/Forexbroker')},
                {path: '/en/advantageoftradingforex',component: () => import('./views/en/pages2/Advantageoftradingforex')},
                {path: '/en/forexmargin',component: () => import('./views/en/pages2/Forexmargin')},
                {path: '/en/forexplatform',component: () => import('./views/en/pages2/Forexplatform')},
                {path: '/en/forex-calculator/',component: () => import('./views/en/pages2/Forex-calculator')},
                {path: '/en/futurecurrencies',component: () => import('./views/en/pages2/Futurecurrencies')},
                {path: '/en/futureenergies',component: () => import('./views/en/pages2/Futureenergies')},
                {path: '/en/futuretrading',component: () => import('./views/en/pages2/Futuretrading')},
                {path: '/en/heatmap/',component: () => import('./views/en/pages2/Heatmap')},
                {path: '/en/future',component: () => import('./views/en/pages2/Future')},
                {path: '/en/trading-hours',component: () => import('./views/en/pages2/trading-hours')},
                {path: '/en/licenses-and-regulations',component: () => import('./views/en/pages2/licenses-and-regulations')},
                {path: '/en/risk-management-strategy',component: () => import('./views/en/pages2/risk-management-strategy')},
                {path: '/en/jmiaccounts',component: () => import('./views/en/pages2/jmiaccounts')},
                {path: '/en/privacy-policy',component: () => import('./views/en/pages2/privacy-policy')},
                {path: '/en/risk-disclosure',component: () => import('./views/en/pages2/risk-disclosure')},
                {path: '/en/partnership-programs',component: () => import('./views/en/pages2/partnership-programs')},
                {path: '/en/metatrader4',component: () => import('./views/en/pages2/Metatrader4')},
                {path: '/en/mt4-platform-overview',component: () => import('./views/en/pages2/mt4-platform-overview')},
                {path: '/en/iphone-and-ipad',component: () => import('./views/en/pages2/iphone-and-ipad')},
                {path: '/en/android',component: () => import('./views/en/pages2/android')},
                {path: '/en/advofjmi',component: () => import('./views/en/pages2/advofjmi')},
                {path: '/en/preciousmetals',component: () => import('./views/en/pages2/preciousmetals')},
                {path: '/en/usshares',component: () => import('./views/en/pages2/usshares')},
                {path: '/en/tradewithjmi',component: () => import('./views/en/pages2/tradewithjmi')},
                {path: '/en/downloadfiles',component: () => import('./views/en/pages2/downloadfiles')},
                {path: '/en/businesswithjmi',component: () => import('./views/en/pages2/businesswithjmi')},
                {path: '/en/introducingbrokers',component: () => import('./views/en/pages2/Introducingbrokers')},
                {path: '/en/moneymanagers',component: () => import('./views/en/pages2/Moneymanagers')},
                {path: '/en/becomeamoneymanager',component: () => import('./views/en/pages2/becomeamoneymanager')},
                {path: '/en/whitelabel',component: () => import('./views/en/pages2/whitelabel')},
                {path: '/en/understandingcurrencypairs',component: () => import('./views/en/pages2/understandingcurrencypairs')},
                {path: '/en/understandingmargin',component: () => import('./views/en/pages2/understandingmargin')},
                {path: '/en/majorspipes',component: () => import('./views/en/pages2/majorspipes')},
                {path: '/en/intrototechana',component: () => import('./views/en/pages2/Intrototechana')},
                {path: '/en/basicconcepts',component: () => import('./views/en/pages2/basicconcepts')},
                {path: '/en/patternrecognition',component: () => import('./views/en/pages2/patternrecognition')},
                {path: '/en/supportresistance',component: () => import('./views/en/pages2/supportresistance')},
                {path: '/en/movingaverages',component: () => import('./views/en/pages2/Movingaverages')},
                {path: '/en/supportresistance2',component: () => import('./views/en/pages2/supportresistance2')},
                {path: '/en/macd',component: () => import('./views/en/pages2/Macd')},
                {path: '/en/introtofundamentalana',component: () => import('./views/en/pages2/Introtofundamentalana')},
                {path: '/en/4majorusfundamental',component: () => import('./views/en/pages2/4majorusfundamental')},
                {path: '/en/majorusgross',component: () => import('./views/en/pages2/Majorusgross')},
                {path: '/en/majorusindicators',component: () => import('./views/en/pages2/Majorusindicators')},
                {path: '/en/majorusemployment',component: () => import('./views/en/pages2/Majorusemployment')},
                {path: '/en/learningyourrisk',component: () => import('./views/en/pages2/Learningyourrisk')},
                {path: '/en/pivottable',component: () => import('./views/en/pages2/Pivottable')},
                {path: '/en/ideasontrading',component: () => import('./views/en/pages2/Ideasontrading')},
                {path: '/en/tradebreakouts',component: () => import('./views/en/pages2/tradebreakouts')},
                {path: '/en/foundationsofganntheory',component: () => import('./views/en/pages2/Foundationsofganntheory')},
                {path: '/en/whyjmi',component: () => import('./views/en/pages2/whyjmi')},
                {path: '/en/partnership',component: () => import('./views/en/pages2/partnership')},
                {path: '/en/trading',component: () => import('./views/en/pages2/trading')},
                {path: '/en/indices',component: () => import('./views/en/pages2/indices')},
                {path: '/en/mt4',component: () => import('./views/en/pages2/mt4')},
                {path: '/en/stocks',component: () => import('./views/en/pages2/stocks')},
                {path: '/en/pip-calculator/',component: () => import('./views/en/pages2/Pip-calculator')},
                {path: '/en/unionpaycard',component: () => import('./views/en/pages2/unionpaycard')},

            ]
        },
        {
            path:'/en/shownews',
            component: () => import('./views/en/pages/Reuters.vue')
        },
        //AR Routes
        {
            path:'/ar',
            name:'ARIndex',
            component: ArLayout,
            children:[
                {
                    path:'/',
                    component: () => import('./views/ar/Index.vue')
                },
                {
                    path:'/ar',
                    component: () => import('./views/ar/Index.vue')
                },
                {
                    path: '/ar/logout',
                    component:  handleLogout

                },
                {
                    path: '/ar/slogin',
                    component: () => import('./views/ar/pages/Slogin')
                },
                {
                    path: '/ar/login',
                    component: () => import('./views/ar/pages/login')
                },
                {
                    path: '/ar/signup',
                    component: () => import('./views/ar/pages/Signup.vue')
                },
                {
                    path: '/ar/forgot-password',
                    component: () => import('./views/ar/pages/ForgetPassword.vue')
                },
                {
                    path: '/ar/reset-password',
                    component: () => import('./views/ar/pages/ResetPassword.vue')
                },
                {
                    path: '/ar/404',
                    component: () => import('./views/ar/pages/404.vue')
                },
                {
                    path: '/ar/commodities',
                    component: () => import('./views/ar/pages/Commodities.vue')
                },
                {
                    path: '/ar/stocks2',
                    component: () => import('./views/ar/pages/Stocks2.vue')
                },

                {path: '/ar/about-jmi',component: () => import('./views/ar/pages2/about-jmi')},
                {path: '/ar/become-partner',component: () => import('./views/ar/pages2/become-partner')},
                {path: '/ar/become-partner/msg',component: () => import('./views/ar/pages2/Becomepartnermsg')},
                {path: '/ar/callbackrequest',component: () => import('./views/ar/pages2/callbackrequest')},
                {path: '/ar/callbackrequest/msg',component: () => import('./views/ar/pages2/Callbackrequestmsg')},
                {path: '/ar/career',component: () => import('./views/ar/pages2/career')},
                {path: '/ar/contact-us',component: () => import('./views/ar/pages2/contact-us')},
                {path: '/ar/culture',component: () => import('./views/ar/pages2/culture')},
                {path: '/ar/corporate-philosophy',component: () => import('./views/ar/pages2/corporate-philosophy')},
                {path: '/ar/conflicts-of-interest-policy',component: () => import('./views/ar/pages2/conflicts-of-interest-policy')},
                {path: '/ar/dailyfundamental',component: () => import('./views/ar/pages2/Dailyfundamental')},
                {path: '/ar/dailytechnical/:type',component: () => import('./views/ar/pages2/Dailytechnical')},
                {path: '/ar/dailytechnical',component: () => import('./views/ar/pages2/Dailytechnical')},
                {path: '/ar/dailytechnical/more',component: () => import('./views/ar/pages2/Dailytechnical')},
                {path: '/ar/centralbanks',component: () => import('./views/ar/pages2/centralbanks')},
                {path: '/ar/contractsizes',component: () => import('./views/ar/pages2/contractsizes')},
                {path: '/ar/coinbase',component: () => import('./views/ar/pages2/Coinbase')},
                {path: '/ar/dailytechnical/technical/:technicalId',component: () => import('./views/ar/pages2/viewtechnical')},
                {path: '/ar/dailytechnical/more/:type',component: () => import('./views/ar/pages2/viewmoretechnical')},
                {path: '/ar/dailyfundamental/fundamental/:fundamentalId',component: () => import('./views/ar/pages2/viewfundamental')},
                {path: '/ar/diversification',component: () => import('./views/ar/pages2/diversification')},
                {path: '/ar/calendar',component: () => import('./views/ar/pages2/Economic-calendar')},
                {path: '/ar/economicindicators',component: () => import('./views/ar/pages2/Economicindicators')},
                {path: '/ar/education',component: () => import('./views/ar/pages2/Education')},
                {path: '/ar/elliotwavetheory',component: () => import('./views/ar/pages2/Elliotwavetheory')},
                {path: '/ar/faq',component: () => import('./views/ar/pages2/Faq')},
                {path: '/ar/forex',component: () => import('./views/ar/pages2/Forex')},
                {path: '/ar/forexprices',component: () => import('./views/ar/pages2/Forexprices')},
                {path: '/ar/forexvsequities',component: () => import('./views/ar/pages2/Forexvsequities')},
                {path: '/ar/forexvsfutures',component: () => import('./views/ar/pages2/Forexvsfutures')},
                {path: '/ar/forexbroker',component: () => import('./views/ar/pages2/Forexbroker')},
                {path: '/ar/advantageoftradingforex',component: () => import('./views/ar/pages2/Advantageoftradingforex')},
                {path: '/ar/forexmargin',component: () => import('./views/ar/pages2/Forexmargin')},
                {path: '/ar/forexplatform',component: () => import('./views/ar/pages2/Forexplatform')},
                {path: '/ar/forex-calculator/',component: () => import('./views/ar/pages2/Forex-calculator')},
                {path: '/ar/futurecurrencies',component: () => import('./views/ar/pages2/Futurecurrencies')},
                {path: '/ar/futureenergies',component: () => import('./views/ar/pages2/Futureenergies')},
                {path: '/ar/futuretrading',component: () => import('./views/ar/pages2/Futuretrading')},
                {path: '/ar/heatmap/',component: () => import('./views/ar/pages2/Heatmap')},
                {path: '/ar/future',component: () => import('./views/ar/pages2/Future')},
                {path: '/ar/trading-hours',component: () => import('./views/ar/pages2/trading-hours')},
                {path: '/ar/licenses-and-regulations',component: () => import('./views/ar/pages2/licenses-and-regulations')},
                {path: '/ar/risk-management-strategy',component: () => import('./views/ar/pages2/risk-management-strategy')},
                {path: '/ar/jmiaccounts',component: () => import('./views/ar/pages2/jmiaccounts')},
                {path: '/ar/privacy-policy',component: () => import('./views/ar/pages2/privacy-policy')},
                {path: '/ar/risk-disclosure',component: () => import('./views/ar/pages2/risk-disclosure')},
                {path: '/ar/partnership-programs',component: () => import('./views/ar/pages2/partnership-programs')},
                {path: '/ar/metatrader4',component: () => import('./views/ar/pages2/Metatrader4')},
                {path: '/ar/mt4-platform-overview',component: () => import('./views/ar/pages2/mt4-platform-overview')},
                {path: '/ar/iphone-and-ipad',component: () => import('./views/ar/pages2/iphone-and-ipad')},
                {path: '/ar/android',component: () => import('./views/ar/pages2/android')},
                {path: '/ar/advofjmi',component: () => import('./views/ar/pages2/advofjmi')},
                {path: '/ar/preciousmetals',component: () => import('./views/ar/pages2/preciousmetals')},
                {path: '/ar/usshares',component: () => import('./views/ar/pages2/usshares')},
                {path: '/ar/tradewithjmi',component: () => import('./views/ar/pages2/tradewithjmi')},
                {path: '/ar/downloadfiles',component: () => import('./views/ar/pages2/downloadfiles')},
                {path: '/ar/businesswithjmi',component: () => import('./views/ar/pages2/businesswithjmi')},
                {path: '/ar/introducingbrokers',component: () => import('./views/ar/pages2/Introducingbrokers')},
                {path: '/ar/moneymanagers',component: () => import('./views/ar/pages2/Moneymanagers')},
                {path: '/ar/becomeamoneymanager',component: () => import('./views/ar/pages2/becomeamoneymanager')},
                {path: '/ar/whitelabel',component: () => import('./views/ar/pages2/whitelabel')},
                {path: '/ar/understandingcurrencypairs',component: () => import('./views/ar/pages2/understandingcurrencypairs')},
                {path: '/ar/understandingmargin',component: () => import('./views/ar/pages2/understandingmargin')},
                {path: '/ar/majorspipes',component: () => import('./views/ar/pages2/majorspipes')},
                {path: '/ar/intrototechana',component: () => import('./views/ar/pages2/Intrototechana')},
                {path: '/ar/basicconcepts',component: () => import('./views/ar/pages2/basicconcepts')},
                {path: '/ar/patternrecognition',component: () => import('./views/ar/pages2/patternrecognition')},
                {path: '/ar/supportresistance',component: () => import('./views/ar/pages2/supportresistance')},
                {path: '/ar/movingaverages',component: () => import('./views/ar/pages2/Movingaverages')},
                {path: '/ar/supportresistance2',component: () => import('./views/ar/pages2/supportresistance2')},
                {path: '/ar/macd',component: () => import('./views/ar/pages2/Macd')},
                {path: '/ar/introtofundamentalana',component: () => import('./views/ar/pages2/Introtofundamentalana')},
                {path: '/ar/4majorusfundamental',component: () => import('./views/ar/pages2/4majorusfundamental')},
                {path: '/ar/majorusgross',component: () => import('./views/ar/pages2/Majorusgross')},
                {path: '/ar/majorusindicators',component: () => import('./views/ar/pages2/Majorusindicators')},
                {path: '/ar/majorusemployment',component: () => import('./views/ar/pages2/Majorusemployment')},
                {path: '/ar/learningyourrisk',component: () => import('./views/ar/pages2/Learningyourrisk')},
                {path: '/ar/pivottable',component: () => import('./views/ar/pages2/Pivottable')},
                {path: '/ar/ideasontrading',component: () => import('./views/ar/pages2/Ideasontrading')},
                {path: '/ar/tradebreakouts',component: () => import('./views/ar/pages2/tradebreakouts')},
                {path: '/ar/foundationsofganntheory',component: () => import('./views/ar/pages2/Foundationsofganntheory')},
                {path: '/ar/whyjmi',component: () => import('./views/ar/pages2/whyjmi')},
                {path: '/ar/partnership',component: () => import('./views/ar/pages2/partnership')},
                {path: '/ar/trading',component: () => import('./views/ar/pages2/trading')},
                {path: '/ar/indices',component: () => import('./views/ar/pages2/indices')},
                {path: '/ar/mt4',component: () => import('./views/ar/pages2/mt4')},
                {path: '/ar/stocks',component: () => import('./views/ar/pages2/stocks')},
                {path: '/ar/pip-calculator/',component: () => import('./views/ar/pages2/Pip-calculator')},
                {path: '/ar/unionpaycard',component: () => import('./views/ar/pages2/unionpaycard')},

            ]
        },
        {
            path:'/ar/shownews',
            component: () => import('./views/ar/pages/Reuters.vue')
        },

        //RU Routes
        {
            path:'/ru',
            name:'RUIndex',
            component: RuLayout,
            children:[
                {
                    path:'/',
                    component: () => import('./views/ru/Index.vue')
                },
                {
                    path:'/ru',
                    component: () => import('./views/ru/Index.vue')
                },
                {
                    path: '/ru/logout',
                    component:  handleLogout

                },
                {
                    path: '/ru/slogin',
                    component: () => import('./views/ru/pages/Slogin')
                },
                {
                    path: '/ru/login',
                    component: () => import('./views/ru/pages/login')
                },
                {
                    path: '/ru/signup',
                    component: () => import('./views/ru/pages/Signup.vue')
                },
                {
                    path: '/ru/forgot-password',
                    component: () => import('./views/ru/pages/ForgetPassword.vue')
                },
                {
                    path: '/ru/reset-password',
                    component: () => import('./views/ru/pages/ResetPassword.vue')
                },
                {
                    path: '/ru/404',
                    component: () => import('./views/ru/pages/404.vue')
                },
                {
                    path: '/ru/commodities',
                    component: () => import('./views/ru/pages/Commodities.vue')
                },
                {
                    path: '/ru/stocks2',
                    component: () => import('./views/ru/pages/Stocks2.vue')
                },

                {path: '/ru/about-jmi',component: () => import('./views/ru/pages2/about-jmi')},
                {path: '/ru/become-partner',component: () => import('./views/ru/pages2/become-partner')},
                {path: '/ru/become-partner/msg',component: () => import('./views/ru/pages2/Becomepartnermsg')},
                {path: '/ru/callbackrequest',component: () => import('./views/ru/pages2/callbackrequest')},
                {path: '/ru/callbackrequest/msg',component: () => import('./views/ru/pages2/Callbackrequestmsg')},
                {path: '/ru/career',component: () => import('./views/ru/pages2/career')},
                {path: '/ru/contact-us',component: () => import('./views/ru/pages2/contact-us')},
                {path: '/ru/culture',component: () => import('./views/ru/pages2/culture')},
                {path: '/ru/corporate-philosophy',component: () => import('./views/ru/pages2/corporate-philosophy')},
                {path: '/ru/conflicts-of-interest-policy',component: () => import('./views/ru/pages2/conflicts-of-interest-policy')},
                {path: '/ru/dailyfundamental',component: () => import('./views/ru/pages2/Dailyfundamental')},
                {path: '/ru/dailytechnical/:type',component: () => import('./views/ru/pages2/Dailytechnical')},
                {path: '/ru/dailytechnical',component: () => import('./views/ru/pages2/Dailytechnical')},
                {path: '/ru/dailytechnical/more',component: () => import('./views/ru/pages2/Dailytechnical')},
                {path: '/ru/centralbanks',component: () => import('./views/ru/pages2/centralbanks')},
                {path: '/ru/contractsizes',component: () => import('./views/ru/pages2/contractsizes')},
                {path: '/ru/coinbase',component: () => import('./views/ru/pages2/Coinbase')},
                {path: '/ru/dailytechnical/technical/:technicalId',component: () => import('./views/ru/pages2/viewtechnical')},
                {path: '/ru/dailytechnical/more/:type',component: () => import('./views/ru/pages2/viewmoretechnical')},
                {path: '/ru/dailyfundamental/fundamental/:fundamentalId',component: () => import('./views/ru/pages2/viewfundamental')},
                {path: '/ru/diversification',component: () => import('./views/ru/pages2/diversification')},
                {path: '/ru/calendar',component: () => import('./views/ru/pages2/Economic-calendar')},
                {path: '/ru/economicindicators',component: () => import('./views/ru/pages2/Economicindicators')},
                {path: '/ru/education',component: () => import('./views/ru/pages2/Education')},
                {path: '/ru/elliotwavetheory',component: () => import('./views/ru/pages2/Elliotwavetheory')},
                {path: '/ru/faq',component: () => import('./views/ru/pages2/Faq')},
                {path: '/ru/forex',component: () => import('./views/ru/pages2/Forex')},
                {path: '/ru/forexprices',component: () => import('./views/ru/pages2/Forexprices')},
                {path: '/ru/forexvsequities',component: () => import('./views/ru/pages2/Forexvsequities')},
                {path: '/ru/forexvsfutures',component: () => import('./views/ru/pages2/Forexvsfutures')},
                {path: '/ru/forexbroker',component: () => import('./views/ru/pages2/Forexbroker')},
                {path: '/ru/advantageoftradingforex',component: () => import('./views/ru/pages2/Advantageoftradingforex')},
                {path: '/ru/forexmargin',component: () => import('./views/ru/pages2/Forexmargin')},
                {path: '/ru/forexplatform',component: () => import('./views/ru/pages2/Forexplatform')},
                {path: '/ru/forex-calculator/',component: () => import('./views/ru/pages2/Forex-calculator')},
                {path: '/ru/futurecurrencies',component: () => import('./views/ru/pages2/Futurecurrencies')},
                {path: '/ru/futureenergies',component: () => import('./views/ru/pages2/Futureenergies')},
                {path: '/ru/futuretrading',component: () => import('./views/ru/pages2/Futuretrading')},
                {path: '/ru/heatmap/',component: () => import('./views/ru/pages2/Heatmap')},
                {path: '/ru/future',component: () => import('./views/ru/pages2/Future')},
                {path: '/ru/trading-hours',component: () => import('./views/ru/pages2/trading-hours')},
                {path: '/ru/licenses-and-regulations',component: () => import('./views/ru/pages2/licenses-and-regulations')},
                {path: '/ru/risk-management-strategy',component: () => import('./views/ru/pages2/risk-management-strategy')},
                {path: '/ru/jmiaccounts',component: () => import('./views/ru/pages2/jmiaccounts')},
                {path: '/ru/privacy-policy',component: () => import('./views/ru/pages2/privacy-policy')},
                {path: '/ru/risk-disclosure',component: () => import('./views/ru/pages2/risk-disclosure')},
                {path: '/ru/partnership-programs',component: () => import('./views/ru/pages2/partnership-programs')},
                {path: '/ru/metatrader4',component: () => import('./views/ru/pages2/Metatrader4')},
                {path: '/ru/mt4-platform-overview',component: () => import('./views/ru/pages2/mt4-platform-overview')},
                {path: '/ru/iphone-and-ipad',component: () => import('./views/ru/pages2/iphone-and-ipad')},
                {path: '/ru/android',component: () => import('./views/ru/pages2/android')},
                {path: '/ru/advofjmi',component: () => import('./views/ru/pages2/advofjmi')},
                {path: '/ru/preciousmetals',component: () => import('./views/ru/pages2/preciousmetals')},
                {path: '/ru/usshares',component: () => import('./views/ru/pages2/usshares')},
                {path: '/ru/tradewithjmi',component: () => import('./views/ru/pages2/tradewithjmi')},
                {path: '/ru/downloadfiles',component: () => import('./views/ru/pages2/downloadfiles')},
                {path: '/ru/businesswithjmi',component: () => import('./views/ru/pages2/businesswithjmi')},
                {path: '/ru/introducingbrokers',component: () => import('./views/ru/pages2/Introducingbrokers')},
                {path: '/ru/moneymanagers',component: () => import('./views/ru/pages2/Moneymanagers')},
                {path: '/ru/becomeamoneymanager',component: () => import('./views/ru/pages2/becomeamoneymanager')},
                {path: '/ru/whitelabel',component: () => import('./views/ru/pages2/whitelabel')},
                {path: '/ru/understandingcurrencypairs',component: () => import('./views/ru/pages2/understandingcurrencypairs')},
                {path: '/ru/understandingmargin',component: () => import('./views/ru/pages2/understandingmargin')},
                {path: '/ru/majorspipes',component: () => import('./views/ru/pages2/majorspipes')},
                {path: '/ru/intrototechana',component: () => import('./views/ru/pages2/Intrototechana')},
                {path: '/ru/basicconcepts',component: () => import('./views/ru/pages2/basicconcepts')},
                {path: '/ru/patternrecognition',component: () => import('./views/ru/pages2/patternrecognition')},
                {path: '/ru/supportresistance',component: () => import('./views/ru/pages2/supportresistance')},
                {path: '/ru/movingaverages',component: () => import('./views/ru/pages2/Movingaverages')},
                {path: '/ru/supportresistance2',component: () => import('./views/ru/pages2/supportresistance2')},
                {path: '/ru/macd',component: () => import('./views/ru/pages2/Macd')},
                {path: '/ru/introtofundamentalana',component: () => import('./views/ru/pages2/Introtofundamentalana')},
                {path: '/ru/4majorusfundamental',component: () => import('./views/ru/pages2/4majorusfundamental')},
                {path: '/ru/majorusgross',component: () => import('./views/ru/pages2/Majorusgross')},
                {path: '/ru/majorusindicators',component: () => import('./views/ru/pages2/Majorusindicators')},
                {path: '/ru/majorusemployment',component: () => import('./views/ru/pages2/Majorusemployment')},
                {path: '/ru/learningyourrisk',component: () => import('./views/ru/pages2/Learningyourrisk')},
                {path: '/ru/pivottable',component: () => import('./views/ru/pages2/Pivottable')},
                {path: '/ru/ideasontrading',component: () => import('./views/ru/pages2/Ideasontrading')},
                {path: '/ru/tradebreakouts',component: () => import('./views/ru/pages2/tradebreakouts')},
                {path: '/ru/foundationsofganntheory',component: () => import('./views/ru/pages2/Foundationsofganntheory')},
                {path: '/ru/whyjmi',component: () => import('./views/ru/pages2/whyjmi')},
                {path: '/ru/partnership',component: () => import('./views/ru/pages2/partnership')},
                {path: '/ru/trading',component: () => import('./views/ru/pages2/trading')},
                {path: '/ru/indices',component: () => import('./views/ru/pages2/indices')},
                {path: '/ru/mt4',component: () => import('./views/ru/pages2/mt4')},
                {path: '/ru/stocks',component: () => import('./views/ru/pages2/stocks')},
                {path: '/ru/pip-calculator/',component: () => import('./views/ru/pages2/Pip-calculator')},
                {path: '/ru/unionpaycard',component: () => import('./views/ru/pages2/unionpaycard')},

            ]
        },
        {
            path:'/ru/shownews',
            component: () => import('./views/ru/pages/Reuters.vue')
        },

        // {
        //     path:'/en/cpanel/home',
        //     name:'cpanel',
        //
        //     component: EnCpanelLayout,
        //     children:[
        //         {
        //             path:'/en/cpanel/home',
        //             name:'cpanel',
        //             alias: ['/en/cpanel'],
        //             component: () => import('./views/en/cpanel/Index.vue')
        //         }
        //     ]
        // },
        {
            path:'/en/spanel/home',
            name:'spanel',
            beforeEnter(to, from, next) {
                window.location.href = "/en/spanel/home";
            }
        },
        {
            path:'/en/cpanel/home',
            name:'spanel',
            beforeEnter(to, from, next) {
                window.location.href = "/en/cpanel/home";
            }
        },

    ],
})

// router.addRoute({ path: '/', component:  () => import('./views/en/RedirectToMain.vue')})

// Logout function
const handleLogout = async () => {
    try {
        const req =  await axios.get('/api/user/logout')
        localStorage.removeItem('JMI_User')
        window.location.href = "/en/login";
    } catch (e) {
        if(e && e.response.data && e.response.data.errors) {
            errors.value = Object.values(e.response.data.errors)
        } else {
            errors.value = e.response.data.message || ""
        }
    }
}
// Check If user logged
router.beforeEach((to, from, next) => {
    if (to.path.includes('/cpanel')  && !isAuthenticated()) {
        return next({path: '/en/login'})
    }
    if (to.path.includes('/logout')) {
        return handleLogout()
    }
    return next()
})

function isAuthenticated() {
    return Boolean(localStorage.getItem('JMI_User'))
}

export default router;
