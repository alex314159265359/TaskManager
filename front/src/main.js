import Vue from 'vue'
import App from './App.vue'
import VueRouter from 'vue-router'
import SuiVue from 'semantic-ui-vue';
import FileList from './components/FileList.vue'


Vue.config.productionTip = false


Vue.use(VueRouter)
Vue.use(SuiVue);

const Foo = { template: '<div>foo</div>' }

const router = new VueRouter({
  mode: 'history',
  base: __dirname,
  routes: [
    { path: '/',
      // a single route can define multiple named components
      // which will be rendered into <router-view>s with corresponding names.
      component: FileList,
      props: {name: "10"}
    },
    {
      path: '/inprocess',
      components: {
        default: Foo
      }
    }
  ]
})


new Vue({
  router,
  render: h => h(App),
}).$mount('#app')
