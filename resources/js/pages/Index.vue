<template>
    <div>
        <h1>muscleSNS-</h1>
        <v-btn>テストボタン</v-btn>
        <div class="post">
            <Post />
            <ul>
	            <li v-for="(posts,index) in posts" v-bind:key="index" >
	                <td>{{ posts.id }}</td>
	                <td>{{ posts.type }}</td>
	                <td>{{ posts.title }}</td>
	                <td>{{ posts.img }}</td>
	                <td>{{ posts.body }}</td>
	                <td>{{ posts.user_id }}</td>
	                <td>{{ posts.created_at }}</td>
	            </li>
            </ul>
        </div>
    </div>
</template>
<script>
import Post from '../components/Post.vue'

export default {
  components: {
    Post
  },
  data () {
    return {
      photos: [],
      posts: []
    }
  },
  methods:{
      getPosts(){
          axios.get('/api/posts').then(response => this.posts = response.data);
          
      }
  },
   mounted() {
       this.getPosts();
    }
}
</script>