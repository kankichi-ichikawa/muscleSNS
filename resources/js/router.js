import Vue from 'vue'
import VueRouter from 'vue-router'

// ページコンポーネントをインポートする
import Index from './pages/Index.vue'
import PhotoList from './pages/PhotoList.vue'
import Login from './pages/Login.vue'

import store from './store'
import SystemError from './pages/errors/System.vue'

// VueRouterプラグインを使用する
// これによって<RouterView />コンポーネントなどを使うことができる
Vue.use(VueRouter)

// パスとコンポーネントのマッピング
const routes = [
  {
    path: '/',
    component: Index
  },
  {
    path: '/photo',
    component: PhotoList
  },
  {
    path: '/login',
    component: Login,
    beforeEnter (to, from, next) {//ログインチェック、ナビゲーションガード
    if (store.getters['auth/check']) {
      next('/')
    } else {
      next()
    }
  }
  },
  {
    //システムエラー
    path: '/500',
    component: SystemError
  }
]

// VueRouterインスタンスを作成する
const router = new VueRouter({
    mode: 'history',
    routes
})

// VueRouterインスタンスをエクスポートする
// app.jsでインポートするため
export default router