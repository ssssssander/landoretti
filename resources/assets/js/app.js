require('./bootstrap');
window.Vue = require('vue');

var login = new Vue({
  el: '#login',
  data: {
    loginFormIsShown: false,
    borderLeft: '',
    paddingLeft: '',
  },
  methods: {
    showLoginForm: function () {
      this.loginFormIsShown = true;
      this.borderLeft = '0';
      this.paddingLeft = '0';
    },
  },
});

var bids = new Vue({
  el: '#bids',
  data: {
    bidsAreShown: false,
  },
  methods: {
    toggleBids: function () {
      this.bidsAreShown = !this.bidsAreShown;
    },
  },
});

var watchlistCategories = new Vue({
  el: '#watchlist-categories',
  data: {
    allAreShown: true,
    activeAreShown: false,
    expiredAreShown: false,
    soldAreShown: false,
  },
  methods: {
    showAll: function () {
      this.allAreShown = true;
      this.activeAreShown = false;
      this.expiredAreShown = false;
      this.soldAreShown = false;
    },
    showActive: function () {
        this.allAreShown = false;
        this.activeAreShown = true;
        this.expiredAreShown = false;
        this.soldAreShown = false;
    },
    showExpired: function () {
        this.allAreShown = false;
        this.activeAreShown = false;
        this.expiredAreShown = true;
        this.soldAreShown = false;
    },
    showSold: function () {
        this.allAreShown = false;
        this.activeAreShown = false;
        this.expiredAreShown = false;
        this.soldAreShown = true;
    },
  },
});
