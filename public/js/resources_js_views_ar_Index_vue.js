"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_views_ar_Index_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=script&lang=js":
/*!*********************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=script&lang=js ***!
  \*********************************************************************************************************************************************************************************************/
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
/* harmony import */ var v_lazy_image__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! v-lazy-image */ "./node_modules/v-lazy-image/dist/v-lazy-image.mjs");
function _typeof(o) { "@babel/helpers - typeof"; return _typeof = "function" == typeof Symbol && "symbol" == typeof Symbol.iterator ? function (o) { return typeof o; } : function (o) { return o && "function" == typeof Symbol && o.constructor === Symbol && o !== Symbol.prototype ? "symbol" : typeof o; }, _typeof(o); }
function _regeneratorRuntime() { "use strict"; /*! regenerator-runtime -- Copyright (c) 2014-present, Facebook, Inc. -- license (MIT): https://github.com/facebook/regenerator/blob/main/LICENSE */ _regeneratorRuntime = function _regeneratorRuntime() { return e; }; var t, e = {}, r = Object.prototype, n = r.hasOwnProperty, o = Object.defineProperty || function (t, e, r) { t[e] = r.value; }, i = "function" == typeof Symbol ? Symbol : {}, a = i.iterator || "@@iterator", c = i.asyncIterator || "@@asyncIterator", u = i.toStringTag || "@@toStringTag"; function define(t, e, r) { return Object.defineProperty(t, e, { value: r, enumerable: !0, configurable: !0, writable: !0 }), t[e]; } try { define({}, ""); } catch (t) { define = function define(t, e, r) { return t[e] = r; }; } function wrap(t, e, r, n) { var i = e && e.prototype instanceof Generator ? e : Generator, a = Object.create(i.prototype), c = new Context(n || []); return o(a, "_invoke", { value: makeInvokeMethod(t, r, c) }), a; } function tryCatch(t, e, r) { try { return { type: "normal", arg: t.call(e, r) }; } catch (t) { return { type: "throw", arg: t }; } } e.wrap = wrap; var h = "suspendedStart", l = "suspendedYield", f = "executing", s = "completed", y = {}; function Generator() {} function GeneratorFunction() {} function GeneratorFunctionPrototype() {} var p = {}; define(p, a, function () { return this; }); var d = Object.getPrototypeOf, v = d && d(d(values([]))); v && v !== r && n.call(v, a) && (p = v); var g = GeneratorFunctionPrototype.prototype = Generator.prototype = Object.create(p); function defineIteratorMethods(t) { ["next", "throw", "return"].forEach(function (e) { define(t, e, function (t) { return this._invoke(e, t); }); }); } function AsyncIterator(t, e) { function invoke(r, o, i, a) { var c = tryCatch(t[r], t, o); if ("throw" !== c.type) { var u = c.arg, h = u.value; return h && "object" == _typeof(h) && n.call(h, "__await") ? e.resolve(h.__await).then(function (t) { invoke("next", t, i, a); }, function (t) { invoke("throw", t, i, a); }) : e.resolve(h).then(function (t) { u.value = t, i(u); }, function (t) { return invoke("throw", t, i, a); }); } a(c.arg); } var r; o(this, "_invoke", { value: function value(t, n) { function callInvokeWithMethodAndArg() { return new e(function (e, r) { invoke(t, n, e, r); }); } return r = r ? r.then(callInvokeWithMethodAndArg, callInvokeWithMethodAndArg) : callInvokeWithMethodAndArg(); } }); } function makeInvokeMethod(e, r, n) { var o = h; return function (i, a) { if (o === f) throw new Error("Generator is already running"); if (o === s) { if ("throw" === i) throw a; return { value: t, done: !0 }; } for (n.method = i, n.arg = a;;) { var c = n.delegate; if (c) { var u = maybeInvokeDelegate(c, n); if (u) { if (u === y) continue; return u; } } if ("next" === n.method) n.sent = n._sent = n.arg;else if ("throw" === n.method) { if (o === h) throw o = s, n.arg; n.dispatchException(n.arg); } else "return" === n.method && n.abrupt("return", n.arg); o = f; var p = tryCatch(e, r, n); if ("normal" === p.type) { if (o = n.done ? s : l, p.arg === y) continue; return { value: p.arg, done: n.done }; } "throw" === p.type && (o = s, n.method = "throw", n.arg = p.arg); } }; } function maybeInvokeDelegate(e, r) { var n = r.method, o = e.iterator[n]; if (o === t) return r.delegate = null, "throw" === n && e.iterator["return"] && (r.method = "return", r.arg = t, maybeInvokeDelegate(e, r), "throw" === r.method) || "return" !== n && (r.method = "throw", r.arg = new TypeError("The iterator does not provide a '" + n + "' method")), y; var i = tryCatch(o, e.iterator, r.arg); if ("throw" === i.type) return r.method = "throw", r.arg = i.arg, r.delegate = null, y; var a = i.arg; return a ? a.done ? (r[e.resultName] = a.value, r.next = e.nextLoc, "return" !== r.method && (r.method = "next", r.arg = t), r.delegate = null, y) : a : (r.method = "throw", r.arg = new TypeError("iterator result is not an object"), r.delegate = null, y); } function pushTryEntry(t) { var e = { tryLoc: t[0] }; 1 in t && (e.catchLoc = t[1]), 2 in t && (e.finallyLoc = t[2], e.afterLoc = t[3]), this.tryEntries.push(e); } function resetTryEntry(t) { var e = t.completion || {}; e.type = "normal", delete e.arg, t.completion = e; } function Context(t) { this.tryEntries = [{ tryLoc: "root" }], t.forEach(pushTryEntry, this), this.reset(!0); } function values(e) { if (e || "" === e) { var r = e[a]; if (r) return r.call(e); if ("function" == typeof e.next) return e; if (!isNaN(e.length)) { var o = -1, i = function next() { for (; ++o < e.length;) if (n.call(e, o)) return next.value = e[o], next.done = !1, next; return next.value = t, next.done = !0, next; }; return i.next = i; } } throw new TypeError(_typeof(e) + " is not iterable"); } return GeneratorFunction.prototype = GeneratorFunctionPrototype, o(g, "constructor", { value: GeneratorFunctionPrototype, configurable: !0 }), o(GeneratorFunctionPrototype, "constructor", { value: GeneratorFunction, configurable: !0 }), GeneratorFunction.displayName = define(GeneratorFunctionPrototype, u, "GeneratorFunction"), e.isGeneratorFunction = function (t) { var e = "function" == typeof t && t.constructor; return !!e && (e === GeneratorFunction || "GeneratorFunction" === (e.displayName || e.name)); }, e.mark = function (t) { return Object.setPrototypeOf ? Object.setPrototypeOf(t, GeneratorFunctionPrototype) : (t.__proto__ = GeneratorFunctionPrototype, define(t, u, "GeneratorFunction")), t.prototype = Object.create(g), t; }, e.awrap = function (t) { return { __await: t }; }, defineIteratorMethods(AsyncIterator.prototype), define(AsyncIterator.prototype, c, function () { return this; }), e.AsyncIterator = AsyncIterator, e.async = function (t, r, n, o, i) { void 0 === i && (i = Promise); var a = new AsyncIterator(wrap(t, r, n, o), i); return e.isGeneratorFunction(r) ? a : a.next().then(function (t) { return t.done ? t.value : a.next(); }); }, defineIteratorMethods(g), define(g, u, "Generator"), define(g, a, function () { return this; }), define(g, "toString", function () { return "[object Generator]"; }), e.keys = function (t) { var e = Object(t), r = []; for (var n in e) r.push(n); return r.reverse(), function next() { for (; r.length;) { var t = r.pop(); if (t in e) return next.value = t, next.done = !1, next; } return next.done = !0, next; }; }, e.values = values, Context.prototype = { constructor: Context, reset: function reset(e) { if (this.prev = 0, this.next = 0, this.sent = this._sent = t, this.done = !1, this.delegate = null, this.method = "next", this.arg = t, this.tryEntries.forEach(resetTryEntry), !e) for (var r in this) "t" === r.charAt(0) && n.call(this, r) && !isNaN(+r.slice(1)) && (this[r] = t); }, stop: function stop() { this.done = !0; var t = this.tryEntries[0].completion; if ("throw" === t.type) throw t.arg; return this.rval; }, dispatchException: function dispatchException(e) { if (this.done) throw e; var r = this; function handle(n, o) { return a.type = "throw", a.arg = e, r.next = n, o && (r.method = "next", r.arg = t), !!o; } for (var o = this.tryEntries.length - 1; o >= 0; --o) { var i = this.tryEntries[o], a = i.completion; if ("root" === i.tryLoc) return handle("end"); if (i.tryLoc <= this.prev) { var c = n.call(i, "catchLoc"), u = n.call(i, "finallyLoc"); if (c && u) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } else if (c) { if (this.prev < i.catchLoc) return handle(i.catchLoc, !0); } else { if (!u) throw new Error("try statement without catch or finally"); if (this.prev < i.finallyLoc) return handle(i.finallyLoc); } } } }, abrupt: function abrupt(t, e) { for (var r = this.tryEntries.length - 1; r >= 0; --r) { var o = this.tryEntries[r]; if (o.tryLoc <= this.prev && n.call(o, "finallyLoc") && this.prev < o.finallyLoc) { var i = o; break; } } i && ("break" === t || "continue" === t) && i.tryLoc <= e && e <= i.finallyLoc && (i = null); var a = i ? i.completion : {}; return a.type = t, a.arg = e, i ? (this.method = "next", this.next = i.finallyLoc, y) : this.complete(a); }, complete: function complete(t, e) { if ("throw" === t.type) throw t.arg; return "break" === t.type || "continue" === t.type ? this.next = t.arg : "return" === t.type ? (this.rval = this.arg = t.arg, this.method = "return", this.next = "end") : "normal" === t.type && e && (this.next = e), y; }, finish: function finish(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.finallyLoc === t) return this.complete(r.completion, r.afterLoc), resetTryEntry(r), y; } }, "catch": function _catch(t) { for (var e = this.tryEntries.length - 1; e >= 0; --e) { var r = this.tryEntries[e]; if (r.tryLoc === t) { var n = r.completion; if ("throw" === n.type) { var o = n.arg; resetTryEntry(r); } return o; } } throw new Error("illegal catch attempt"); }, delegateYield: function delegateYield(e, r, n) { return this.delegate = { iterator: values(e), resultName: r, nextLoc: n }, "next" === this.method && (this.arg = t), y; } }, e; }
function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }
function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }





var errors = (0,vue__WEBPACK_IMPORTED_MODULE_0__.ref)();
var router = (0,vue_router__WEBPACK_IMPORTED_MODULE_3__.useRouter)();
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  data: function data() {
    return {
      site_title: "",
      site_description: "",
      site_keywords: '',
      fundamentalanalysises: [],
      url: '',
      action: 'click',
      speed: 500,
      img: '',
      head: '',
      slideIndex: '1',
      slideIndexx: '1',
      i: '',
      slides: '',
      slidess: '',
      dots: '',
      dotss: ''
    };
  },
  mounted: function mounted() {
    this.getData();
    this.fundamentalanalysises;
    this.plusSlides(1);
  },
  components: {
    VLazyImage: v_lazy_image__WEBPACK_IMPORTED_MODULE_2__["default"]
  },
  methods: {
    getData: function getData() {
      var _this = this;
      return _asyncToGenerator( /*#__PURE__*/_regeneratorRuntime().mark(function _callee() {
        var result;
        return _regeneratorRuntime().wrap(function _callee$(_context) {
          while (1) switch (_context.prev = _context.next) {
            case 0:
              _context.prev = 0;
              _context.next = 3;
              return axios__WEBPACK_IMPORTED_MODULE_1___default().get('/api/index');
            case 3:
              result = _context.sent;
              if (result.status === 200 && result.data) {
                _this.fundamentalanalysises = result.data.data.ar.fundamentalanalysis;
                _this.site_title = result.data.data.ar.title;
                _this.site_description = result.data.data.ar.description;
                _this.site_keywords = result.data.data.ar.keywords;
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
              }
              _context.next = 10;
              break;
            case 7:
              _context.prev = 7;
              _context.t0 = _context["catch"](0);
              if (_context.t0 && _context.t0.response.data && _context.t0.response.data.errors) {
                errors.value = Object.values(_context.t0.response.data.errors);
              } else {
                errors.value = _context.t0.response.data.message || "";
              }
            case 10:
            case "end":
              return _context.stop();
          }
        }, _callee, null, [[0, 7]]);
      }))();
    },
    plusSlides: function plusSlides(n) {
      this.slideIndex = this.slideIndex + n;
      this.showSlides(this.slideIndex += n);
    },
    currentSlide: function currentSlide(n) {
      this.showSlides(this.slideIndex = n);
    },
    plusSlidess: function plusSlidess(n) {
      this.slideIndexx = this.slideIndexx + n;
      this.showSlidess(this.slideIndexx += n);
    },
    currentSlidee: function currentSlidee(n) {
      this.showSlidess(this.slideIndexx = n);
    },
    showSlides: function showSlides(n) {
      this.slides = document.getElementsByClassName("mySlides");
      this.dots = document.getElementsByClassName("dot");
      if (n > this.slides.length) {
        this.slideIndex = 1;
      }
      if (n < 1) {
        this.slideIndex = this.slides.length;
      }
      for (this.i = 0; this.i < this.slides.length; this.i++) {
        this.slides[this.i].style.display = "none";
      }
      for (this.i = 0; this.i < this.dots.length; this.i++) {
        this.dots[this.i].className = this.dots[this.i].className.replace(" active", "");
      }
      this.slideIndex = this.slideIndex - 1;
      this.slides[this.slideIndex].style.display = "block";
      this.dots[this.slideIndex].className += " active";
    },
    showSlidess: function showSlidess(n) {
      this.slidess = document.getElementsByClassName("Slides");
      this.dotss = document.getElementsByClassName("dott");
      if (n > this.slidess.length - 1) {
        this.slideIndexx = 1;
      }
      if (n < 1) {
        this.slideIndexx = this.slidess.length;
      }
      for (this.i = 0; this.i < this.slidess.length; this.i++) {
        this.slidess[this.i].style.display = "none";
      }
      for (this.i = 0; this.i < this.dotss.length; this.i++) {
        this.dotss[this.i].className = this.dotss[this.i].className.replace(" active", "");
      }
      this.slideIndexx = this.slideIndexx - 1;
      this.slidess[this.slideIndexx].style.display = "block";
      this.dotss[this.slideIndexx].className += " active";
    }
  },
  created: function created() {
    var _this2 = this;
    setInterval(function () {
      _this2.plusSlides(1), _this2.plusSlidess(1);
    }, 8000);
  },
  setup: function setup() {}
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a":
/*!*************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a ***!
  \*************************************************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* binding */ render)
/* harmony export */ });
/* harmony import */ var vue__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue */ "./node_modules/vue/dist/vue.esm-bundler.js");

var _hoisted_1 = {
  "class": "slideshow-container"
};
var _hoisted_2 = {
  "class": "mySlides fade_slide",
  style: {
    "display": "none"
  }
};
var _hoisted_3 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "display": "none"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px",
    "display": "none"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_4 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ar/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب حقيقى</a><a href=\"/ar/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب تجريبى</a></div>", 1);
var _hoisted_5 = {
  "class": "mySlides fade_slide",
  style: {
    "display": "none"
  }
};
var _hoisted_6 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "display": "none"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px",
    "display": "none"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_7 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ar/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب حقيقى</a><a href=\"/ar/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب تجريبى</a></div>", 1);
var _hoisted_8 = {
  "class": "mySlides fade_slide"
};
var _hoisted_9 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text",
  style: {
    "display": "none"
  }
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_10 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ar/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب حقيقى</a><a href=\"/ar/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب تجريبى</a></div>", 1);
var _hoisted_11 = {
  "class": "mySlides fade_slide"
};
var _hoisted_12 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text",
  style: {
    "display": "none"
  }
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'"
  }
}, "Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_13 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay\"><a href=\"/ar/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب حقيقى</a><a href=\"/ar/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب تجريبى</a></div>", 1);
var _hoisted_14 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"buttons-overlay2\"><a href=\"/ar/signup\" class=\"slide-live-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب حقيقى</a><a href=\"/ar/signup\" class=\"slide-demo-button uk-border-rounded\"><i class=\"fas fa-scroll uk-margin-small-right\"></i>فتح حساب تجريبى</a></div>", 1);
var _hoisted_15 = {
  id: "dot_navigation"
};
var _hoisted_16 = {
  "class": "row",
  id: "main-features"
};
var _hoisted_17 = {
  "class": "col-md-9 col-sm-12 col-md-push-3",
  id: "main-features-left"
};
var _hoisted_18 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_19 = {
  "class": ""
};
var _hoisted_20 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "سحب وايداع بدون عمولة")], -1 /* HOISTED */);
var _hoisted_21 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_22 = {
  "class": ""
};
var _hoisted_23 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "أقل ايداع فقط $100")], -1 /* HOISTED */);
var _hoisted_24 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_25 = {
  "class": ""
};
var _hoisted_26 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "تنفيذ سريع بدون عمولة")], -1 /* HOISTED */);
var _hoisted_27 = {
  "class": "col-md-3 col-xs-6"
};
var _hoisted_28 = {
  "class": ""
};
var _hoisted_29 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": ""
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("p", null, "أدوات تحليل مجانا")], -1 /* HOISTED */);
var _hoisted_30 = {
  "class": "col-md-3 col-sm-12 col-md-pull-9",
  id: "main-features-right"
};
var _hoisted_31 = {
  "class": ""
};
var _hoisted_32 = {
  href: "/ar/signup"
};
var _hoisted_33 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "start-trading"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, "أبدأ التداول"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", null, "لكي تصبح محترف تداول"), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("b", null, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
  href: "/ar/signup"
}, "انضم لنا الأن")])], -1 /* HOISTED */);
var _hoisted_34 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"uk-container in-wave-4uk-container in-wave-4\"><div class=\"uk-grid uk-flex uk-flex-center\"><div class=\"col-sm-12\" id=\"main-section-2\"><div class=\"col-sm-12\"><div class=\"\" id=\"left-section\"><p class=\"uk-margin-remove-bottom\">مجموعة كاملة من خيارات الاستثمار</p></div></div><div class=\"col-sm-12\" id=\"right-section\"><div class=\"\"><p class=\"uk-text-lead uk-text-muted uk-margin-small-top uk-margin-bottom\">احصل على أسعار أفضل كلما زاد حجم تداولاتك.</p></div></div></div><div class=\"col-sm-12\" id=\"main-section-3\"><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><p class=\"main_title\"><span class=\"Bold_blue\">FX أسبريد يبدأ من</span></p><div class=\"col-sm-12\" id=\"content\"><h1 class=\"uk-margin-top\">0$ لكل صفقة</h1><p class=\"Bold_blue hint\">0.1 نقطة</p><p class=\"mr-b\"> تداول 182 زوجًا من أزواج العملات الأجنبية و 140 عقدًا آجلًا عبر العملات الرئيسية والثانوية والغريبة والمعادن.</p></div><a href=\"/ar/forexbroker\">المزيد &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><p class=\"main_title\"><span class=\"Bold_blue\">الأسهم</span></p><div class=\"col-sm-12\" id=\"content\"><h1 class=\"uk-margin-top\">0.2$ لكل سهم</h1><p>استثمر في الأسهم العالمية.</p><p class=\"mr-b\">قم بالشراء أو البيع على أكثر من 9000 أداة مع فروق أسعار صغيرة وعمولات منخفضة.</p></div><a href=\"/ar/stocks2\">المزيد &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><p class=\"main_title\"><span class=\"Bold_blue\" style=\"font-size:20px;\">السلع</span></p><div class=\"col-sm-12\" id=\"content\"><h1 class=\"uk-margin-top\">0$ لكل صفقة</h1><p>نوّع محفظتك مع مجموعة كبيرة من السلع.</p><p class=\"mr-b\">تداول في نطاق واسع من السلع مثل العقود مقابل الفروقات والعقود الآجلة والخيارات والأزواج الفورية والمزيد.</p></div><a href=\"/ar/commodities\">المزيد &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><p class=\"main_title\"><span class=\"Bold_blue\">تداول المعادن الثمينة</span></p><div class=\"col-sm-12\" id=\"content\"><h1 class=\"uk-margin-top\">0$ لكل صفقة</h1><p>تداول الذهب والفضة والنحاس والبلاتين والبلاديوم مقابل العملات الرئيسية.</p><p class=\"mr-b\"> الوصول إلى أكثر من 19000 سهم عبر الأسواق الأساسية والناشئة في 36 بورصة حول العالم.</p></div><a href=\"/ar/preciousmetals\">المزيد &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">تداول الطاقات المستقبليه </span></p><h1 class=\"uk-margin-top\"> 0$ لكل صفقة</h1><p> الطاقة المستقبلية المتداولة لدى JMI Brokers هي: النفط الخام الخفيف والغاز الطبيعي.</p></div><a href=\"/ar/futureenergies\">المزيد &gt;&gt;</a></div><div class=\"col-md-4 col-sm-4 col-xs-6 main-column\"><div class=\"col-sm-12\" id=\"content\"><p class=\"main_title\"><span class=\"Bold_blue\">تداول المؤشرات</span></p><h1 class=\"uk-margin-top\"> 0$ لكل صفقة</h1><p> تقدم JMI Brokers التداول في مؤشرات الأسهم الأكثر تداولًا في جميع أنحاء العالم ، مثل مؤشر Dow ​​Jones و E-mini S&amp;P 500 و E-mini NASDAQ 100.</p></div><a href=\"/ar/futuretrading\">المزيد &gt;&gt;</a></div></div></div></div>", 1);
var _hoisted_35 = {
  "class": "",
  id: "main-section-6"
};
var _hoisted_36 = {
  "class": "uk-container in-wave-4",
  id: "main-section-66"
};
var _hoisted_37 = {
  "class": "uk-grid uk-flex"
};
var _hoisted_38 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "uk-width-4-5@m"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "section-6-title"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", null, "الاستثمارات البديلة")])], -1 /* HOISTED */);
var _hoisted_39 = {
  "class": "col-sm-12",
  id: "main-pricing-list"
};
var _hoisted_40 = {
  "class": "in-wave-pricing-list"
};
var _hoisted_41 = {
  "class": "col-md-6 col-sm-6 col-xs-12 margin-top-10"
};
var _hoisted_42 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"package\"><h4>نسخ التداول</h4><ul class=\"package-features-list package-features-list1\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>حساب نسخ مجاني مع نسبة المحفظة المفضلة</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>تحويل لحظى داخلى بين كل حساباتك</li></ul><a href=\"#\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">ابدأ و أحصل على محفظتك الان</a></div>", 1);
var _hoisted_43 = {
  "class": "col-md-6 col-sm-6 col-xs-12 margin-top-10"
};
var _hoisted_44 = {
  "class": "slideshow-container"
};
var _hoisted_45 = {
  "class": "Slides fade_slide",
  style: {
    "display": "none"
  }
};
var _hoisted_46 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  "class": "slide-text"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#ffc926",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "display": "none"
  }
}, " Scalping "), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  style: {
    "color": "#0059b2",
    "font-weight": "bold",
    "text-transform": "uppercase",
    "font-size": "50px",
    "font-family": "'Roboto-Bold'",
    "margin-top": "-18px",
    "display": "none"
  }
}, "For a living")], -1 /* HOISTED */);
var _hoisted_47 = {
  "class": "package"
};
var _hoisted_48 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h4", null, " التحليل الأساسى", -1 /* HOISTED */);
var _hoisted_49 = {
  "class": "package-features-list package-features-list1"
};
var _hoisted_50 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("i", {
  "class": "fa fa-check",
  "aria-hidden": "true"
}, null, -1 /* HOISTED */);
var _hoisted_51 = ["href", "title"];
var _hoisted_52 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", {
  id: "dot_navigation"
}, [/*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "dott",
  number: "1",
  onclick: "currentSlide(1)"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "dott",
  number: "2",
  onclick: "currentSlide(2)"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "dott",
  number: "3",
  onclick: "currentSlide(3)"
}), /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
  "class": "dott",
  number: "4",
  onclick: "currentSlide(4)"
})], -1 /* HOISTED */);
var _hoisted_53 = {
  id: "main-section-5",
  "class": "uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center"
};
var _hoisted_54 = {
  "class": "col-sm-12"
};
var _hoisted_55 = {
  "class": "col-sm-12"
};
var _hoisted_56 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"col-md-6 col-sm-12\"><h1 class=\"\">Market analysis and trade inspiration</h1><p>JMI Brokers continue to challenge ourselves to provide traders with what they need to succeed to be Expert Trader in forex in addition to have experience in this trade</p><div class=\"col-sm-12 uk-text-center padding-left-0\"><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">Strategies &amp; Discussions</h5></div><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">Forecasts &amp; Educations</h5></div></div><div class=\"col-sm-12 margin-top-10\"><div class=\"col-sm-4\"><i class=\"fa fa-trophy\"></i><p class=\"\">Award-winning support</p></div><div class=\"col-sm-4\"><i class=\"fa fa-university\"></i><p class=\"\">REGULATED BY Republic of Vanuatu</p></div><div class=\"col-sm-4\"><i class=\"fa fa-history\"></i><p class=\"\">12 years experience</p></div></div></div>", 1);
var _hoisted_57 = {
  "class": "col-md-6 col-sm-12"
};
var _hoisted_58 = {
  "class": "uk-inline uk-dark in-wave-video uk-margin-small-bottom"
};
var _hoisted_59 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"uk-position-center\"><a href=\"#modal-media-youtube\" data-uk-toggle><div class=\"in-play-button\"></div><i class=\"fa fa-play\"></i></a></div><div id=\"modal-media-youtube\" class=\"uk-flex-top\" data-uk-modal><div class=\"uk-modal-dialog uk-width-auto uk-margin-auto-vertical in-iframe\"><button class=\"uk-modal-close-outside\" type=\"button\" data-uk-close></button></div></div>", 2);
var _hoisted_61 = {
  id: "main-section-5",
  "class": "uk-section uk-section-muted uk-padding-large in-wave-3 uk-background-contain uk-background-center"
};
var _hoisted_62 = {
  "class": "col-sm-12"
};
var _hoisted_63 = {
  "class": "col-sm-12"
};
var _hoisted_64 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"col-md-6 col-sm-12\"><h1 class=\"\">تحليل السوق والتداول</h1><p>نتواصل فى JMI Brokers تحدى انفسنا لتزويد المتداولين بما يحتاجون اليه للنجاح وليكونوا خبراء فى الفوركس.</p><div class=\"col-sm-12 uk-text-center padding-left-0\"><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">التخطيط والتحليل</h5></div><div class=\"col-sm-6 padding-left-0\"><h5 class=\"uk-margin-small-top\">التنبأ والتعلم</h5></div></div><div class=\"col-sm-12 margin-top-10\"><div class=\"col-sm-4\"><i class=\"fa fa-trophy\"></i><p class=\"\">دعم فنى 24/7</p></div><div class=\"col-sm-4\"><i class=\"fa fa-university\"></i><p class=\"\">مرخصة من احدى دول الكومنولث البريطاني</p></div><div class=\"col-sm-4\"><i class=\"fa fa-history\"></i><p class=\"\">12 سنة من الخبرة</p></div></div></div>", 1);
var _hoisted_65 = {
  "class": "col-md-6 col-sm-12"
};
var _hoisted_66 = {
  "class": "uk-inline uk-dark in-wave-video uk-margin-small-bottom"
};
var _hoisted_67 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"uk-position-center\"><a href=\"#modal-media-youtube\" data-uk-toggle><div class=\"in-play-button\"></div><i class=\"fa fa-play\"></i></a></div><div id=\"modal-media-youtube\" class=\"uk-flex-top\" data-uk-modal><div class=\"uk-modal-dialog uk-width-auto uk-margin-auto-vertical in-iframe\"><button class=\"uk-modal-close-outside\" type=\"button\" data-uk-close></button></div></div>", 2);
var _hoisted_69 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createStaticVNode)("<div class=\"\" id=\"main-section-6\"><div class=\"uk-container in-wave-4\"><div class=\"uk-grid uk-flex\"><div class=\"uk-width-4-5@m\"><div id=\"section-6-title\"><h1 class=\"uk-margin-medium-bottom\">مجموعة متكاملة لكل المتداولين</h1></div></div><div class=\"col-sm-12\" id=\"main-pricing-list\"><div class=\"in-wave-pricing-list\"><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">أقل ايداع<span class=\"price\">100 USD </span></p><h2 class=\"title\">حساب اسبريد ثابت</h2><p class=\"desc\">احصل على فروق أسعار قليلة</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>اسبريد ثابت 1 نقطة فقط</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>رافعة مالية تصل الى 1:500</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل ايداع 100$</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>عملة الحساب الدولار الامريكى</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>جميع الحسابات الأسلامية</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل لوت 0.01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>متاح الأكسبرت</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>مسموح بالهيدج</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>4 خانات</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>غير مسموح بالأسكالبينج</li></ul><a href=\"/ar/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">فتح حساب</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">أقل ايداع<span class=\"price\">500 USD </span></p><h2 class=\"title\">حساب اسبريد متغير</h2><p class=\"desc\">احصل على فروق أسعار قليلة</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i> اسبريد يبدأ من 0.1</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>رافعة مالية تصل الى 1:200</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل ايداع 500$</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>عملة الحساب الدولار الأمريكى</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>جميع الحسابات الأسلامية</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل لوت 0.01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>متاح الأكسبرت</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>مسموح بالهيدج</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>5 خانات</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>غير مسموح بالأسكالبينج</li></ul><a href=\"/ar/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">فتح حساب</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">أقل ايداع<span class=\"price\"> 1000 USD</span></p><h2 class=\"title\">حساب سكالبينج</h2><p class=\"desc\">احصل على فروق أسعار قليلة</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>اسبريد يبدأ من 1.7</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>رافعة مالية تصل الى 1:100</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل ايداع 1000$</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>عملة الحساب الدولار الأمريكى</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>جميع الحسابات الأسلامية</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل لوت 0.01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>متاح الأكسبرت</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>مسموح بالهيدج</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>5 خانات</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>مسموح بالاسكالبينج</li></ul><a href=\"/ar/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">فتح حساب</a></div></div><div class=\"col-lg-3 col-md-6 col-sm-6 col-xs-12 margin-top-10\"><div class=\"package\"><p class=\"minimum\">أقل ايداع<span class=\"price\"> 100 USD</span></p><h2 class=\"title\">حساب بونص</h2><p class=\"desc\">احصل على فروق أسعار قليلة</p><hr><ul class=\"package-features-list package-features-list2\"><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>اسبريد ثابت 2 نقطة فقط</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>رافعة مالية تصل الى 1:500</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل ايداع 100$</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>عملة الحساب الدولار الأمريكى</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>جميع الحسابات الأسلامية</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>أقل لوت 0.01</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>متاح الأكسبرت</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>مسموح بالهيدج</li><li><i class=\"fa fa-check\" aria-hidden=\"true\"></i>4 خانات</li><li class=\"false\"><i class=\"fa fa-times\" aria-hidden=\"true\"></i>غير مسموح بالأسكالبينج</li></ul><a href=\"/ar/signup\" class=\"uk-button uk-button-default uk-border-rounded uk-align-center\">فتح حساب</a></div></div></div></div></div></div></div><div class=\"row\" id=\"main-section-88\"><div class=\"\" id=\"main-section-8\"><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-history\"></i><h4 class=\"uk-margin-small-top uk-margin-remove-bottom\">تاريخ</h4><p class=\"uk-text-small uk-margin-remove-top\">الشركة تعمل فى الاسواق منذ عام 2008. حيث اصبحنا واحدة من اكبر الشركات الوساطة</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-shield\"></i><h6 class=\"uk-margin-small-top uk-margin-remove-bottom\">الأمان</h6><p class=\"uk-text-small uk-margin-remove-top\">نحن حاصلين على التراخيص التى تضمن سلامة امولاك</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-user\"></i><h6 class=\"uk-margin-small-top uk-margin-remove-bottom\">مساعده بشكل شخصي</h6><p class=\"uk-text-small uk-margin-remove-top\">هذه المساعده يحصل عليها كبار العملاء فى الشركات الاخرى .. نحن نقدمها للجميع</p></div><div class=\"col-md-3 col-xs-6\"><i class=\"fa fa-video-camera\"></i><h6 class=\"uk-margin-small-top uk-margin-remove-bottom\">دخول غير محدود إلى الفيديوهات التعليمية</h6><p class=\"uk-text-small uk-margin-remove-top\">الشركة تقدم لكم فيديوهات تعليمية مجانية مع اتاحة الوصول اليها فى اى وقت</p></div></div></div>", 2);
var _hoisted_71 = {
  "class": "col-sm-12",
  id: "main-section-7"
};
var _hoisted_72 = {
  "class": "col-md-6",
  style: {
    "position": "absolute",
    "bottom": "20px",
    "padding-left": "0px"
  }
};
var _hoisted_73 = {
  "class": "col-md-6 col-sm-12",
  id: "mobile-app"
};
var _hoisted_74 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h1", {
  id: "animate1",
  "class": ""
}, " منصة ميتاتريدر 4", -1 /* HOISTED */);
var _hoisted_75 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  id: "animate1",
  "class": ""
}, " ابدأ التداول ", -1 /* HOISTED */);
var _hoisted_76 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h3", {
  id: "animate2",
  "class": ""
}, "على تطبيق JMI Brokers للموبايل", -1 /* HOISTED */);
var _hoisted_77 = /*#__PURE__*/(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("h6", {
  id: "animate3",
  "class": ""
}, "متاح على منصات مختلفة", -1 /* HOISTED */);
var _hoisted_78 = {
  id: "animate4",
  href: "/ar/signup"
};
var _hoisted_79 = {
  id: "animate5",
  href: "/ar/signup"
};
var _hoisted_80 = {
  id: "animate6",
  href: "/ar/signup"
};
function render(_ctx, _cache, $props, $setup, $data, $options) {
  var _this = this;
  var _component_v_lazy_image = (0,vue__WEBPACK_IMPORTED_MODULE_0__.resolveComponent)("v-lazy-image");
  return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("main", null, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_1, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_2, [_hoisted_3, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)("                <link rel=\"preload\" fetchpriority=\"high\" as=\"image\" href=\"/img/1.webp\" type=\"image/webp\">"), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/ar/1.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow",
    width: "100%",
    height: "auto"
  }), _hoisted_4]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_5, [_hoisted_6, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/ar/2.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_7]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_8, [_hoisted_9, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/ar/3.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_10]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_11, [_hoisted_12, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/img/ar/4.webp",
    style: {
      "width": "100%"
    },
    alt: "SlideShow"
  }), _hoisted_13]), _hoisted_14, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_15, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "1",
    onClick: _cache[0] || (_cache[0] = function ($event) {
      return _this.currentSlide(1);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "2",
    onClick: _cache[1] || (_cache[1] = function ($event) {
      return _this.currentSlide(2);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "3",
    onClick: _cache[2] || (_cache[2] = function ($event) {
      return _this.currentSlide(3);
    })
  }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("span", {
    "class": "dot",
    number: "4",
    onClick: _cache[3] || (_cache[3] = function ($event) {
      return _this.currentSlide(4);
    })
  })])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_16, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_17, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_18, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_19, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/nofees-icon1.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "57px",
    height: "50px"
  })]), _hoisted_20]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_21, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_22, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/deposit-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_23]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_24, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_25, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/fast-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_26]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_27, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_28, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/analysis-icon.png",
    alt: "wave-icon",
    "data-uk-img": "",
    width: "48px",
    height: "50px"
  })]), _hoisted_29])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_30, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_31, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_32, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ico11.png",
    id: "ico11",
    alt: "wave-icon",
    "data-uk-img": ""
  })])]), _hoisted_33])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), _hoisted_34, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content end "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_35, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_36, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_37, [_hoisted_38, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_39, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_40, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_41, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/social-trade-offer1.jpg",
    style: {
      "height": "300px"
    },
    alt: "Social Trading"
  }), _hoisted_42]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_43, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_44, [((0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(true), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)(vue__WEBPACK_IMPORTED_MODULE_0__.Fragment, null, (0,vue__WEBPACK_IMPORTED_MODULE_0__.renderList)(this.fundamentalanalysises, function (fundamentalanalysis) {
    return (0,vue__WEBPACK_IMPORTED_MODULE_0__.openBlock)(), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementBlock)("div", _hoisted_45, [_hoisted_46, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
      src: "/assets/img/Fund-Analy.jpeg",
      style: {
        "width": "100%",
        "height": "300px"
      },
      alt: "Fundamental Analysis"
    }), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_47, [_hoisted_48, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("ul", _hoisted_49, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("li", null, [_hoisted_50, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createTextVNode)((0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(fundamentalanalysis.title), 1 /* TEXT */)])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", {
      href: "/ar/dailyfundamental/fundamental/".concat(fundamentalanalysis.id),
      title: "".concat(fundamentalanalysis.title),
      "class": "uk-button uk-button-default uk-border-rounded uk-align-center"
    }, "المزيد من " + (0,vue__WEBPACK_IMPORTED_MODULE_0__.toDisplayString)(fundamentalanalysis.title), 9 /* TEXT, PROPS */, _hoisted_51)])]);
  }), 256 /* UNKEYED_FRAGMENT */)), _hoisted_52])])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_53, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_54, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_55, [_hoisted_56, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_57, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_58, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    "class": "uk-border-rounded uk-width-1-1",
    src: "/wave/img/in-wave-image-1.jpg",
    alt: "wave-video",
    width: "533",
    height: "355",
    "data-uk-img": ""
  }), _hoisted_59])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content end "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_61, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_62, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_63, [_hoisted_64, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_65, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_66, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    "class": "uk-border-rounded uk-width-1-1",
    src: "/wave/img/in-lazy.gif",
    "data-src": "/wave/img/in-wave-image-1.jpg",
    alt: "wave-video",
    width: "533",
    height: "355",
    "data-uk-img": ""
  }), _hoisted_67])])])])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content end "), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createCommentVNode)(" section content begin "), _hoisted_69, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_71, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_72, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/trading-platforms-bg5.jpg",
    id: "responsive1-img-trading1",
    alt: "Trading Platforms"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("div", _hoisted_73, [_hoisted_74, _hoisted_75, _hoisted_76, _hoisted_77, (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_78, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ar/ios-store.png",
    alt: "IOS",
    width: "140px",
    height: "44px"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_79, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ar/play-store.png",
    alt: "Android",
    width: "140px",
    height: "44px"
  })]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createElementVNode)("a", _hoisted_80, [(0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/ar/win-store.png",
    alt: "Windows",
    width: "140px",
    height: "44px"
  })])]), (0,vue__WEBPACK_IMPORTED_MODULE_0__.createVNode)(_component_v_lazy_image, {
    src: "/elis/img/trading-platforms-bg5.jpg",
    id: "responsive1-img-trading2",
    alt: "Trading Platforms"
  })])])]);
}

/***/ }),

/***/ "./resources/js/views/ar/Index.vue":
/*!*****************************************!*\
  !*** ./resources/js/views/ar/Index.vue ***!
  \*****************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _Index_vue_vue_type_template_id_cb7f715a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Index.vue?vue&type=template&id=cb7f715a */ "./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a");
/* harmony import */ var _Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Index.vue?vue&type=script&lang=js */ "./resources/js/views/ar/Index.vue?vue&type=script&lang=js");
/* harmony import */ var _node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/dist/exportHelper.js */ "./node_modules/vue-loader/dist/exportHelper.js");




;
const __exports__ = /*#__PURE__*/(0,_node_modules_vue_loader_dist_exportHelper_js__WEBPACK_IMPORTED_MODULE_2__["default"])(_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_1__["default"], [['render',_Index_vue_vue_type_template_id_cb7f715a__WEBPACK_IMPORTED_MODULE_0__.render],['__file',"resources/js/views/ar/Index.vue"]])
/* hot reload */
if (false) {}


/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (__exports__);

/***/ }),

/***/ "./resources/js/views/ar/Index.vue?vue&type=script&lang=js":
/*!*****************************************************************!*\
  !*** ./resources/js/views/ar/Index.vue?vue&type=script&lang=js ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__["default"])
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_script_lang_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Index.vue?vue&type=script&lang=js */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=script&lang=js");
 

/***/ }),

/***/ "./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a":
/*!***********************************************************************!*\
  !*** ./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   render: () => (/* reexport safe */ _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_template_id_cb7f715a__WEBPACK_IMPORTED_MODULE_0__.render)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_use_0_node_modules_vue_loader_dist_templateLoader_js_ruleSet_1_rules_2_node_modules_vue_loader_dist_index_js_ruleSet_0_use_0_Index_vue_vue_type_template_id_cb7f715a__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!../../../../node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!../../../../node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./Index.vue?vue&type=template&id=cb7f715a */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5.use[0]!./node_modules/vue-loader/dist/templateLoader.js??ruleSet[1].rules[2]!./node_modules/vue-loader/dist/index.js??ruleSet[0].use[0]!./resources/js/views/ar/Index.vue?vue&type=template&id=cb7f715a");


/***/ })

}]);