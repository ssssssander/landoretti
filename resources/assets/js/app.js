require('./bootstrap');
window.Vue = require('vue');

Vue.component('example-component', require('./components/ExampleComponent.vue'));

var login = new Vue({
  el: '#login',
  data: {
    clickedLoginBtn: false
  },
  methods: {
    showLoginInputs: function () {
      this.clickedLoginBtn = true;
    }
  }
});

var bids = new Vue({
  el: '#bids',
  data: {
    clickedBidsBtn: false
  },
  methods: {
    toggleBids: function () {
      this.clickedBidsBtn = !this.clickedBidsBtn;
    }
  }
});
