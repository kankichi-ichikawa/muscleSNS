<template>
  <v-card class="overflow-hidden">
    <v-app-bar
        absolute
        color="red"
        elevate-on-scroll
        scroll-target="#scrolling-techniques-7"
        app
      >
        <v-app-bar-nav-icon style="z-index:1000;color:white;"></v-app-bar-nav-icon>
  
        <v-toolbar-title>Title</v-toolbar-title>
  
        <v-spacer></v-spacer>
  
        <v-btn icon>
          <v-icon>mdi-magnify</v-icon>
        </v-btn>
  
        <v-btn icon>
          <v-icon>mdi-heart</v-icon>
        </v-btn>
  
        <v-btn icon>
          <v-icon>mdi-dots-vertical</v-icon>
        </v-btn>
    </v-app-bar>
    <v-main>
    <!--<v-sheet-->
    <!--    id="scrolling-techniques-7"-->
    <!--    class="overflow-y-auto"-->
    <!--    max-height="600"-->
    <!--  >-->
    <!--    <v-container style="height: 1500px;">-->
          <nav class="navbar">
            <RouterLink class="navbar__brand" to="/">
              MuscleSNS
            </RouterLink>
            <div class="navbar__menu">
              <div v-if="isLogin" class="navbar__item">
                <button class="button" @click="showForm = ! showForm">
                  <i class="icon ion-md-add"></i>
                  Submit a photo
                </button>
              </div>
              <span v-if="isLogin" class="navbar__item">
                <h5>ログインユーザー：{{ username }}</h5>
              </span>
               <div v-else class="navbar__item">
                <RouterLink class="button button--link" to="/login">
                  Login / Register
                </RouterLink>
              </div>
            </div>
            <PhotoForm v-model="showForm" />
          </nav>
      <!--  </v-container>-->
      <!--</v-sheet>-->
      </v-main>
  </v-card>
</template>

<script>
import PhotoForm from './PhotoForm.vue'
export default {
   components: {
    PhotoForm
  },
  data () {
    return {
      showForm: false
    }
  },
  computed: {
    isLogin () {
      return this.$store.getters['auth/check']
    },
    username () {
      return this.$store.getters['auth/username']
    }
  }
}
</script>