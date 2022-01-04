<template>
    <div>
        <h3>FOllow</h3>
        <li v-for="(user,index) in users" v-bind:key="index" >
	                <td>{{ user.id }}</td>
	                <!--<td>{{ Auth::user()->App\Models\User::isFollow(user.id) }}</td>-->
	                <!--<td>{{ nowuser()->isFollow(user.id) }}</td>-->
	                <span class="float-right">
                      <button v-if="!followed" type="button" class="btn-sm shadow-none border border-primary p-2" @click="follow(user.id)"><i class="mr-1 fas fa-user-plus"></i>フォロー</button>
                      <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unfollow(user.id)"><i class="mr-1 fas fa-user-check"></i>フォロー中</button>
                  </span>
	     </li>
        <span class="float-right">
            <button v-if="!followed" type="button" class="btn-sm shadow-none border border-primary p-2" @click="follow(user.id)"><i class="mr-1 fas fa-user-plus"></i>フォロー</button>
            <button  v-else type="button" class="btn-sm shadow-none border border-primary p-2 bg-primary text-white" @click="unfollow(user.id)"><i class="mr-1 fas fa-user-check"></i>フォロー中</button>
        </span>
        <div class="follow">
        </div>
    </div>
</template>
<script>
    export default {
        props:['userId', 'defaultFollowed', 'defaultCount'],
        data() {
          return{
              followed: false,
              followCount: 0,
              users: [],
          };
        },
        created() {
          this.followed = this.defaultFollowed
          this.followCount = this.defaultCount
        },

        methods: {
          getUsers(){
            axios.get('/users').then(response => this.users = response.data);
          
          },
          follow(userId) {

            axios.post(`/follow/${userId}`)
            .then(response => {
                this.followed = true;
                this.followCount = response.data.followCount;
            })
            .catch(error => {
              alert(error)
            });
          },
          unfollow(userId) {
            // let url = `/${userId}/unfollow`

            axios.post(`/unfollow/${userId}`)
            .then(response => {
                this.followed = false;
                this.followCount = response.data.followCount;
            })
            .catch(error => {
              alert(error)
            });
          }
        },
        computed: {
          nowuser () {
            return this.$store.getters['auth/user']
          }
        },
        mounted() {
          this.getUsers();
        }
    }
</script>
