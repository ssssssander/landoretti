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
    shownCategory: 'all',
  },
  methods: {
    showCategory: function(category) {
      this.shownCategory = category;
    },
  },
});
