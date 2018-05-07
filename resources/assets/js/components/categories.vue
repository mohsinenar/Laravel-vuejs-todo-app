<template>
  <v-list >
        <v-list-tile  @click="filtreby(0)">
          <v-list-tile-action>
            <v-icon>dashboard</v-icon>
          </v-list-tile-action>
          <v-list-tile-content>
            <v-list-tile-title>all tasks</v-list-tile-title>
          </v-list-tile-content>
        </v-list-tile>
        <template v-for="category in categories">
          <v-list-tile  @click="filtreby(category.id)">
            <v-list-tile-content>
              <v-list-tile-title>{{category.name}}</v-list-tile-title>
            </v-list-tile-content>
          </v-list-tile>
        </template>
        <template>
  <v-layout row justify-center>
    <v-dialog v-model="addcategorydialog" persistent max-width="500px">
      <v-btn color="primary" dark slot="activator">
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
                <v-text-field v-model='newcategoryname' label="category name " required>
                </v-text-field>
                <h3></h3>
              </v-flex>
            </v-layout>
          </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="addcategorydialog = false">close</v-btn>
          <v-btn color="blue darken-1" flat @click.native="addcategorydialog = false" @click="addcategory" >Save</v-btn>
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
          addcategorydialog:false,
          categories:[],
          newcategoryname:'',
        }
      },
      methods:{
        filtreby: function (categoryid) {
            this.$emit('updatefiltre',categoryid);
            console.log(categoryid);
        },
        addcategory: function () {
          axios.post('/api/category',{
            name:this.newcategoryname
          })
          .then(response => {
            this.categories.push(response);
            
            this.newcategoryname = ' ';
          })
          .catch(function(error) {
            console.log(error)
          })
        },

        loadcategories:function () {
          
            axios.get('api/categories')
                  .then(response=>{
                    // console.log(response.data);
                    this.categories = response.data;
                    console.log(this.categories);
                  })
        }
      },
      mounted:function () {
       this.loadcategories();
      }

  }
</script>