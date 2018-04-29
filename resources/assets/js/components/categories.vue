<template>
  <v-list >
        <v-list-tile  @click="filtreby()">
          <v-list-tile-action>
            <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>all tasks</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <template v-for="category in categories">
          <v-list-tile  @click="filtreby(category.name)">
            <v-list-tile-content>
              <v-list-tile-title>{{category.name}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
        <template>
  <v-layout row justify-center>
    <v-dialog v-model="addcategory" persistent max-width="500px">
      <v-btn color="primary"   dark slot="activator">
          add new category  <v-icon dark right>add</v-icon>
      </v-btn>
      <v-card>
        <v-card-title>
          <span class="headline">add new category</span>
        </v-card-title>
        <v-card-text>
          <v-container grid-list-md>
            <v-layout wrap>
              <v-flex xs12>
                <v-text-field v-model='addcategoryname' label="category name " required>
                </v-text-field>
                <h3></h3>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="addcategory = false">{{addcategoryname}}</v-btn>
          <v-btn color="blue darken-1" flat @click.native="addcategory = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>
  </v-list>
</template>
<script>
  export default{
      data(){
        return {
          addcategory:false,
          categories:[
            {id:1,name:'cat3'},
            {id:1,name:'cat4'},
            {id:1,name:'cat2'},
            ],
          addcategoryname:'',
        }
      },
      methods:{
        filtreby: function (categoryname) {
            this.$emit('updatefiltre',categoryname);
            console.log(categoryname);
        }
      }

  }
</script>