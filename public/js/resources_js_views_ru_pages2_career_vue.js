"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ru_pages2_career_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js":
/*!*****************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js ***!
  \*****************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _vueuse_head__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! @vueuse/head */ "./node_modules/@unhead/vue/dist/shared/vue.f36acd1f.mjs");
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var vue_router__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-router */ "./node_modules/vue-router/dist/vue-router.mjs");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_2__);
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }





var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "Career",
      site_description: "",
      site_keywords: '',
      file: ''
    };
  },
  mounted: function mounted() {
    var _this = this;
    (0,_vueuse_head__WEBPACK_IMPORTED_MODULE_4__.u)({
      // Can be static or computed
      title: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
        return _this.site_title;
      }),
      meta: [{
        name: "description",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return _this.site_description;
        })
      }, {
        name: "keywords",
        content: (0,vue__WEBPACK_IMPORTED_MODULE_0__.computed)(function () {
          return _this.site_keywords;
        })
      }]
    });
  },
  methods: {
    documentUpload: function documentUpload() {
      this.file = this.$refs.document.files[0];
    },
    career: function career() {
      var _this2 = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var errors, router, formData, result;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
              router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
              formData = new FormData();
              formData.append('document', _this2.file);
              _context.prev = 4;
              _context.next = 7;
              return axios__WEBPACK_IMPORTED_MODULE_1___default().post('/api/career', formData);
            case 7:
              result = _context.sent;
              if (result.status === 200) {
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Success span:first-child").text(result.data.message.ru);
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Success").show();
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Error").hide();
              } else if (result.status === 201) {
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Error > span").text(result.data.errors.ru);
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Error").show();
                jquery__WEBPACK_IMPORTED_MODULE_2___default()("#Success").hide();
              }
              _context.next = 14;
              break;
            case 11:
              _context.prev = 11;
              _context.t0 = _context["catch"](4);
              if (_context.t0.response && _context.t0.response.status === 401) {
                errors.value = _context.t0.response.data.errors.ru || "";
              } else {
                if (_context.t0 && _context.t0.response.data && _context.t0.response.data.errors) {
                  errors.value = Object.values(_context.t0.response.data.errors);
                } else {
                  errors.value = _context.t0.response.data.errors || "";
                }
              }
            case 14:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[4, 11]]);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c":
/*!*********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c ***!
  \*********************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }

var _hoisted_1 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "row"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("img", {
  src: "/assets/img/career.jpg",
  alt: "",
  "class": "img-responsive center-block picHeight"
})], -1 /* HOISTED */);
var _hoisted_2 = {
  "class": "row mrtb40"
};
var _hoisted_3 = {
  "class": "container"
};
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<h1>Карьера</h1><h2>В JMI Brokers LTD главное — люди и карьера</h2><p> JMI Brokers LTD считает, что ее бизнес развивается вместе с личным и профессиональным ростом ее сотрудников. По этой причине JMI Brokers постоянно инвестирует в курсы, семинары, программы обучения лидерству и навыкам, а также формальные образовательные квалификации; все разработано для того, чтобы ее сотрудники были на переднем крае своей профессии и могли предоставлять услуги, которые ожидают клиенты и партнеры. </p><h3>Университет JMI – Добивайтесь профессиональных успехов и достигайте личных целей</h3><p> Университет JMI Brokers — это инициатива внутреннего развития, которая предлагает программы и курсы для всех сотрудников JMI Brokers. Курсы охватывают темы, которые, по мнению JMI Brokers, способствуют успеху за счет дальнейшего развития индивидуальных компетенций и помощи сотрудникам в достижении личных и профессиональных карьерных целей.<br> <br> JMI Brokers реализует структурированную программу развития сотрудников — «План личного развития» — и программу развития лидерских качеств с помощью модели «Конвейер лидерства». У JMI Brokers также есть программа образцов для подражания, которая представляет собой программу личного развития для специалистов и руководителей, которые демонстрируют последовательное поведение образца для подражания и соответствуют Корпоративному заявлению и семи ценностям JMI Brokers.<br> JMI Brokers использует внутреннюю модель развития в качестве основы для описания трех основных этапов развития карьеры в JMI: этапа введения, этапа высокой эффективности и этапа моделирования ролей.<br> JMI Brokers любит обучать и развивать своих собственных менеджеров и лидеров и приняла подход лидерства для развития компетенций. Это поддерживает установление постоянной организационный процесс, обеспечивающий лидерство на всех уровнях организации. Лидеры развивают свои собственные навыки и рабочие ценности в соответствии со своим уровнем конвейера и стремятся развивать своих непосредственных подчиненных до следующего уровня организации. </p><h3>Цель JMI</h3><p> Цель JMI — стать самым прибыльным и профессиональным посредником в мире на глобальных рынках капитала.<br> Его заинтересованные стороны включают акционеров, сотрудников, клиентов и партнеров, которые поддерживают Банк в достижении результатов, мотивации и развитии персонала и построении успешных отношений посредством превосходного обслуживания и инноваций.<br> Заинтересованные стороны в успехе Банка следуют фундаментальным ценностям и правилам взаимодействия, установленным для расширения возможностей отдельных лиц в достижении личных и деловых целей. </p><h3>В центре внимания сотрудники</h3><p> Сотрудники JMI Brokers увлечены своим делом и стремятся к достижению результатов. Фактически, недавний внутренний опрос показал, что 92,3% сотрудников гордятся тем, что работают в JMI. В общем, сотрудники JMI Brokers высоко оценивают удовлетворенность работой, командный дух и страсть к работе.<br><br> JMI Brokers LTD — это динамично развивающаяся организация, состоящая из талантливых людей из разных сфер деятельности: от трейдеров и аналитиков фронт-офиса до разработчиков программного обеспечения, бизнес-контролеров, бизнес-разработчики, маркетологи и талантливые специалисты по кадрам. JMI Brokers предлагает возможности как для личного, так и для профессионального развития посредством обучения, курсов и множества внутренних ресурсов, доступных для повышения уровня обучения и дальнейшей карьеры. Уверенные и вдохновляющие менеджеры также вносят свой вклад в силу компании, поощряя новые идеи, развитие процессов и продвигая личную ответственность за проекты и задачи. </p><h3>Возможности международной карьеры</h3><p>Поскольку JMI Brokers продолжает расширяться по всему миру, сотрудники могут реализовывать карьерные устремления в различных международных условиях. Выдающиеся сотрудники, которым предлагается возможность представлять JMI Brokers за границей, могут получить ценные знания и развить много новых компетенций, которые могут принести пользу их будущему в Банке. JMI Brokers поощряет и поддерживает желание реализовать международные амбиции и ищет способы расширить индивидуальные знания и опыт, продвигая культуру JMI Brokers.</p><h3>Здоровье JMI</h3><p> JMI Brokers уделяет большое внимание здоровью и хочет облегчить сотрудникам выбор здорового образа жизни как в профессиональной, так и в личной жизни. Столовая JMI предлагает разнообразную здоровую пищу в течение дня. Также приветствуются различные занятия фитнесом, и Банк считает, что социальные и сетевые элементы exe </p><div class=\"speacer20\"></div><h3>be a member of the community</h3>", 15);
var _hoisted_19 = {
  "class": "col-sm-12"
};
var _hoisted_20 = {
  key: 0,
  "class": "alert alert-danger"
};
var _hoisted_21 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "alert alert-danger col-sm-12",
  id: "Error",
  style: {
    "display": "none"
  }
}, null, -1 /* HOISTED */);
var _hoisted_22 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "alert alert-success col-sm-12",
  id: "Success",
  style: {
    "display": "none"
  }
}, null, -1 /* HOISTED */);
var _hoisted_23 = {
  "class": "row"
};
var _hoisted_24 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("label", {
  style: {
    "font-size": "2rem"
  },
  "class": "col-sm-12"
}, " Upload Your CV", -1 /* HOISTED */);
var _hoisted_25 = {
  "class": "col-sm-12"
};
var _hoisted_26 = {
  "class": "controls"
};
var _hoisted_27 = {
  "class": "input-group"
};
var _hoisted_28 = {
  "class": "input-group-btn"
};
var _hoisted_29 = {
  "class": "btn btn-primary btn-file"
};
var _hoisted_30 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  style: {
    "color": "red"
  }
}, "Допустимый тип: .PDF — максимальный размер: 2 МБ", -1 /* HOISTED */);
var _hoisted_31 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "col-sm-12"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "controls"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("br"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
  style: {
    "padding": "0px",
    "max-width": "150px"
  },
  "class": "btn btn-success form-control",
  type: "submit",
  value: "Upload"
})])], -1 /* HOISTED */);
function render(_ctx, _cache, $props, $setup, $data, $options) {
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, [_hoisted_1, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_3, [_hoisted_4, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("form", {
    onSubmit: _cache[1] || (_cache[1] = (0,vue__WEBPACK_IMPORTED_MODULE_0__.withModifiers)(function () {
      return $options.career && $options.career.apply($options, arguments);
    }, ["prevent"])),
    enctype: "multipart/form-data"
  }, [typeof _ctx.errors === 'string' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_20, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.errors), 1 /* TEXT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), _typeof(_ctx.errors) === 'object' ? ((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, {
    key: 1
  }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(_ctx.errors, function (value, index) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", {
      "class": "alert alert-danger",
      key: index
    }, (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(_ctx.errors[0]), 1 /* TEXT */);
  }), 128 /* KEYED_FRAGMENT */)) : (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("v-if", true), _hoisted_21, _hoisted_22, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_23, [_hoisted_24, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_26, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_28, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", _hoisted_29, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("input", {
    type: "file",
    id: "document",
    name: "document",
    onChange: _cache[0] || (_cache[0] = function () {
      return $options.documentUpload && $options.documentUpload.apply($options, arguments);
    }),
    accept: "application/pdf",
    ref: "document",
    required: ""
  }, null, 544 /* NEED_HYDRATION, NEED_PATCH */)])])])]), _hoisted_30]), _hoisted_31])], 32 /* NEED_HYDRATION */)])])])], 64 /* STABLE_FRAGMENT */);
}

/***/ }),

/***/ "./resources/js/views/ru/pages2/career.vue":
/*!*************************************************!*\
  !*** ./resources/js/views/ru/pages2/career.vue ***!
  \*************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _career_vue_vue_type_template_id_d53abf1c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./career.vue?vue&type=template&id=d53abf1c */ "./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c");
/* harmony import */ var _career_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./career.vue?vue&type=script&lang=js */ "./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_career_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_career_vue_vue_type_template_id_d53abf1c__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ru/pages2/career.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js":
/*!*************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_career_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_career_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./career.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c":
/*!*******************************************************************************!*\
  !*** ./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c ***!
  \*******************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_career_vue_vue_type_template_id_d53abf1c__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_career_vue_vue_type_template_id_d53abf1c__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./career.vue?vue&type=template&id=d53abf1c */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ru/pages2/career.vue?vue&type=template&id=d53abf1c");


/***/ })

}]);