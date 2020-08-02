<template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="290">
      <template v-slot:activator="{ on, attrs }">
        <v-btn v-bind="attrs" v-on="on" class="mx-2" fab dark large color="success">
          <v-icon dark>mdi-plus</v-icon>
        </v-btn>
        <!--  -->
      </template>
      <v-card >
        <v-card-title>
          <span class="headline">Create Your Post</span>
        </v-card-title>
        <v-card-text>
          <v-container>
            <v-row>
              <v-col cols="12">
                <v-text-field label="Title*" v-model="title" required></v-text-field>
              </v-col>
              <v-col cols="12">
                <v-textarea label="Description*" v-model="description" required></v-textarea>
              </v-col>
            </v-row>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" text @click="dialog = false">Close</v-btn>
          <v-btn color="blue darken-1" text @click="createSavePost(), dialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>


<script>
export default {
  data() {
    return {
      dialog: false,
      title:"",
      description:""
    };
  },
  methods: {
    async createSavePost() {
      try {
        const response = await fetch(`http://127.0.0.1:8000/api/posts`, {
           
          method: "POST",
          body: JSON.stringify({
              title:this.title,
              description:this.description
          }) ,
          headers:{
              "Content-Type": "application/json",
          }
        });
        const result = await response.json();
        console.log("result ->", result);
      } catch (error) {
        console.log("here is the error", error);
      }
    }
  }
};
</script>




