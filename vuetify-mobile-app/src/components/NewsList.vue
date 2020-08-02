<template>
  <div>
    <v-container fluid grid-list-lg>
      <v-layout row wrap>
        <v-flex xs12>
          <h1 class="post_page_title">My Posts</h1>
          <div v-for="post in posts" v-bind:key="post.id">
            <v-card  class="card_style">
              <div class="row">
                <div class="col-md-10" @click="openPost(post)">
                  <v-container fluid grid-list-lg>
                    <v-layout row>
                      <v-flex xs9>
                        <div>
                          <div class="subheading font-weight-medium title_style">{{post.title}}</div>
                          <div class="desc_style">{{post.description}}</div>
                        </div>
                      </v-flex>
                    </v-layout>
                  </v-container>
                </div>
                <div class="col-md-2 align-self-end">
                  <div class="edit_button">
                    <EditPost v-bind:post="post"/>
                  </div>
                  <v-btn @click="deletePost(post.id)" class="mx-2" fab dark small color="cyan">
                    <v-icon dark>mdi-delete</v-icon>
                  </v-btn>
                </div>
              </div>
            </v-card>
          </div>
          <div style="margin-top:40px" >
          <CreatePost />
          </div>
        </v-flex>
      </v-layout>
    </v-container>
  </div>
</template>

<script>
import EditPost from "./EditPost.vue";
import CreatePost from "./CreatePost.vue";

export default {
  name: "NewsList",
  components: {
    EditPost,
    CreatePost
  },
  props: ["posts"],
  methods: {
    openPost(post) {
      this.$emit("open-post", post);
    },

    async deletePost(id) {
      // console.log("idddd", id)
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/posts/${id}`, {
          method: "DELETE"
        });
        const result = await response.json();
        if (result.success) {
          // console.log('result', result);
          this.$emit('on-delete',id);
        }
      } catch (error) {
        // console.log('errror ===> ', error)
      }
    },

   
  }
  
};
</script>

<style scoped>
.card_style {
  padding-top: 10px;
  padding-bottom: 20px;
  margin-bottom: 10px;
}
.title_style {
  padding-bottom: 5px;
}
.desc_style {
  font-size: 12px;
  color: #aaaaaa;
}
.edit_button {
  margin-left: 10px;
  margin-right: 10px;
  float: left;
}
</style>