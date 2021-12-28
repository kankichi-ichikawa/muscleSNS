<template>
  <!--<h1>Photo List</h1>-->
  <div class="photo-list">
    <div class="grid">
      <Photo
        class="grid__item"
        v-for="photo in photos"
        :key="photo.id"
        :item="photo"
      />
    </div>
  </div>

</template>
<script>
import { OK } from '../util'
import Post from '../components/Post.vue'
import Photo from '../components/Photo.vue'

export default {
  components: {
    Post,
    Photo
  },
  data () {
    return {
      photos: []
    }
  },
  methods: {
    async fetchPhotos () {
      const response = await axios.get('/api/phototo')

      if (response.status !== OK) {
        this.$store.commit('error/setCode', response.status)
        return false
      }
      
      //reponse.dataでレスポンスのJSONを取得、その中の写真一覧
      this.photos = response.data.data
    }
  },
  watch: {
    $route: {
      async handler () {
        await this.fetchPhotos()
      },
      immediate: true
    }
  }
}
</script>