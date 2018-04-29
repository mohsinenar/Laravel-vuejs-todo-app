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
			  	<v-flex md8>
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
					       <v-select
					          :items="categories"
					          v-model="task.category"
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
          <v-btn color="blue darken-1" flat @click.native="adddialog = false">Save</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-layout>
</template>
  </v-list>
</template>



	<script>
		export default {
			data(){
				return{
					valid:true,
					task:{
						title:'hey',
						text:'',
						isdone:false,
						category:''
					},
					adddialog:false,
					categories:[
						'cat1','cat2','cat3','cat4'
					]
				}
			}
			,
			methods:{
				save:function () {
					
				}
			}
		}
	</script>