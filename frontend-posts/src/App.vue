<template>
  <v-app>
    <ParentComponent v-bind:posts="posts" v-on:delete="deletePost"/>
    <!-- <router-view></router-view> -->
  </v-app>
</template>

<script lang="ts">

import ParentComponent from './components/ParentComponent.vue';

export default {
  components: {
    ParentComponent
  },
  data() {
    return {
      posts: []
    };
  },
  async created() {
    try {
      const response = await fetch("http://127.0.0.1:8000/api/posts");
      const result = await response.json();
      result.data.forEach(post => {
        (post.addPostIsNotVisible = true), (post.editPostIsNotVisible = true);
      });
      console.log(result);
      this.posts = result.data;
    } catch (error) {
      console.log("erorrr", error);
    }
  },
  methods:{
    deletePost(id){
      this.posts = this.posts.filter(post => post.id !== id);
    }
  }
};
</script>