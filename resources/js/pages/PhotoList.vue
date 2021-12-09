<template>
  <h1>Photo List</h1>

</template>
<script>
import Post from '../components/Post.vue'

export default {
  components: {
    Post
  },
  data () {
    return {
      photos: []
    }
  }
}
</script>