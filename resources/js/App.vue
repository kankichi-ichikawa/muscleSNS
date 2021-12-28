<template>
  <!--<v-app　:style="{ background: $vuetify.theme.themes.light.background }">-->
  <v-app>
    <div>
      <header>
        <Navbar />
      </header>
      <main>
        <div class="container">
          <RouterView />
        </div>
      </main>
      <Footer />
    </div>
  </v-app>
</template>

<script>
import Navbar from './components/Navbar.vue'
import Footer from './components/Footer.vue'
import { INTERNAL_SERVER_ERROR } from './util'

export default {
  components: {
    Navbar,
    Footer
  },
  // エラーモジュールを監視
  computed: {
    errorCode () {
      return this.$store.state.error.code
    }
  },
  watch: {
    errorCode: {
      handler (val) {
        if (val === INTERNAL_SERVER_ERROR) {
          this.$router.push('/500')
        }
      },
      immediate: true
    },
    $route () {
      this.$store.commit('error/setCode', null)
    }
  }
}
</script>