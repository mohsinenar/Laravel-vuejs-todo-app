<template>
  <v-layout row justify-center>
    <v-dialog v-model="adddialog" persistent max-width="500px">
      <v-btn color="success" dark slot="activator">
      	add new task
      <v-icon dark right>add</v-icon>
		</v-btn>
      <v-card>
        <v-card-title>
          <span class="headline">User Profile</span>
        </v-card-title>
        <v-card-text>
          <v-container>
			  	<v-flex sm8 md8>
				  	<v-form v-model="task.valid">
					    <v-text-field
					      label="task name"
					      v-model="task.title"
					      required
					    ></v-text-field>
					    <v-text-field multi-line
					      label="text"
					      v-model="task.text"
					      required
					    ></v-text-field>
					    <!-- <v-time-picker v-model="task.timetodo" ></v-time-picker> -->

					       <v-select
					          :items="categories"
					          item-text="name"
					          item-value="id"
					          v-model="task.category_id"
					          label="Select"
					          single-line
					        ></v-select>
				  </v-form>
			  </v-flex>
			  </v-container>
        </v-card-text>
        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="blue darken-1" flat @click.native="adddialog = false">Close</v-btn>
          <v-btn color="blue darken-1" flat @click.native="adddialog = false" @click="save(task)" >Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>
 



	<script>
		export default {
			data(){
				return{
					valid:true,
					task:{
						title:'',
						text:'',
						timetodo:'',
						category_id:''
					},
					adddialog:false,
					categories:[]
				}
			}
			,
			methods:{
				save:function (task) {
					axios.post('/api/tasks',{
						task:task
					})
                  .then(response=>{
                    console.log(response.data);
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