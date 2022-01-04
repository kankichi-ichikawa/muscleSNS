require('./bootstrap');
import './bootstrap'
import Vue from 'vue'
// ルーティングの定義をインポートする
import router from './router'
// ルートコンポーネントをインポートする
import App from './App.vue'
// ストア
import store from './store'
// CSRF対策
import './bootstrap'
// vuetifyインポート
import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
Vue.use(Vuetify);
import '@mdi/font/css/materialdesignicons.css';

export default new Vuetify({
  theme: {
    themes: {
      light: {
        background: "#f5f5f5",
      }
    }
  },
  icons: {
      iconfont: 'mdi', // 追加
    },

});

const createApp = async () => {
  await store.dispatch('auth/currentUser')

new Vue({
  el: '#app',
  vuetify: new Vuetify(),//vuetify
  router, // ルーティングの定義を読み込む
  store,
  components: { App }, // ルートコンポーネントの使用を宣言する
  template: '<App />' // ルートコンポーネントを描画する
})
}

createApp()