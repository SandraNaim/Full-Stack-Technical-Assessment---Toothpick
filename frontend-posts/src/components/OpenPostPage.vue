<template>
  <div>
    <span class="go_back">  
      <!-- <button @click="GoBack">  Go Back</button> -->
      <v-btn @click="GoBack" class="ma-2" color="cyan darken-2" dark>
        <v-icon dark left>mdi-arrow-left</v-icon>go Back
      </v-btn>
    </span>

    <v-container fluid grid-list-lg v-bind:key="post.id">
      <v-card class="cardStyle">
      <div style="margin-bottom: 20px">
        <h4>Title</h4>
        <div>{{post.title}}</div>
      </div>
      <div>
        <h4>Description</h4>
        <div>{{post.description}}</div>
      </div>
      </v-card>
    </v-container>
  </div>
</template>

<script>
// import VueRouter from 'vue-router'
export default {
  name: "OpenPostPage",
  props: ["post"],
  methods:{
    GoBack(){
      // return this.$router.go(-1);
      // return this.$router.push('/');
      window.location.reload();
    }
  }
};
</script>

<style scoped>
.go_back{
  display: flex;
  cursor: pointer;
  /* border: solid 1px gray; */
  width: 90px;
  padding: 10px;
  margin-left: 20px;
  margin-top: 20px;
  border-radius: 5%
}
.cardStyle{
  padding: 30px
}
</style>