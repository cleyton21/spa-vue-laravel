// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from 'vue'
import App from './App'
import router from './router'
import axios from 'axios';

Vue.config.productionTip = false
//criar instancia do axios para usar nas paginas
Vue.prototype.$http = axios
//mudar url em um unuco lugar para quando for colocar em produção
Vue.prototype.$urlAPI = 'http://127.0.0.1:8000/api/'

/* eslint-disable no-new */
new Vue({
  el: '#app',
  router,
  components: { App },
  template: '<App/>'
})
