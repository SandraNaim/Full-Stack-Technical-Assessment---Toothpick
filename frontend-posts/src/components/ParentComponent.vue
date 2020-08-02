<template>
  <div>
    <component :is="componentName" v-on:on-delete="deletePost" v-bind:posts="posts" v-bind:post="post" v-on:open-post="openPost"></component>
  </div>
</template>

<script>
    import OpenPostPage from './OpenPostPage.vue';
    import NewsList from './NewsList.vue';

    export default {
    name:'ParentComponent',
    props: ["posts"],
    data(){
        return{
            componentName:NewsList,
            post:""
        }
    },
    component:{
        OpenPostPage,
        NewsList
    },
    methods:{
        openPost(post){
            this.post=post;
            this.componentName = OpenPostPage;
        },
        deletePost(id){
          this.$emit('delete',id);
        }
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
</style>