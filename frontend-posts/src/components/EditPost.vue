<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="290" >
      <template v-slot:activator="{ on, attrs }">
        <v-btn v-bind="attrs" v-on="on" class="mx-2" fab dark small color="cyan">
          <v-icon dark>mdi-pencil</v-icon>
        </v-btn>
        <!--  -->
      </template>
      <v-card >
        <v-card-title>
          <span class="headline">Update Your Post</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Title" v-model="title"></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-textarea label="Description" v-model="description"></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" text @click="editSavePost(post.id), dialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
export default {
  name: "EditPost",
  props: ["post"],
  data() {
    return {
      dialog: false,
      title:this.post.title,
      description:this.post.description,
    };
  },
  methods: {
    async editSavePost(id) {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/posts/${id}`, {
          method: "PUT",
          body:JSON.stringify({
            title:this.title,
            description:this.description
          }),
           headers:{
              "Content-Type": "application/json",
          }
        });
        const result = await response.json();
        console.log("result ->", result);
        //    post.editPostIsNotVisible = false;
      } catch (error) {
        console.log("here is the error", error);
      }
    }
  }
};
</script>




