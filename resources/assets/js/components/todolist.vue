<template>
  <v-flex sm12 xs12 md12>
    <add-todo></add-todo>
    <v-list   three-line>
      <template v-for="todo in filtredtasks">
         <transition name="v-leave" >
          <v-list-tile  @click="">
           <v-list-tile-avatar >
            <v-icon v-if="todo.isdone" color='green' >
              done
            </v-icon>  
           </v-list-tile-avatar>
            <v-list-tile-content>
             <v-list-tile-title>
                {{todo.title}} 
                <span class="green--text"> In </span>
                <span class="red--text"> {{todo.category.name}} </span>
            </v-list-tile-title>

            <v-list-tile-sub-title>
               {{todo.text | limit}}
            </v-list-tile-sub-title>
            </v-list-tile-content>
            
            <v-list-tile-action>
        <v-menu center top >
            <v-btn icon slot="activator" dark>
              <v-icon>more_vert</v-icon>
            </v-btn>
            <v-list>
              <v-btn  icon color='primary'  @click="UpdateTask" >
                <v-icon>mode_edit</v-icon>
              </v-btn>
              <v-btn  color='red' icon @click.native="deletedialog = true , todotoDelet = todo " >
                <v-icon>delete</v-icon>
              </v-btn>
              <v-btn  icon color='success' @click="TasKdone" ><v-icon>done</v-icon>
              </v-btn>
            </v-list>
          </v-menu>  
        </v-list-tile-action>
      </v-list-tile>
     </transition>
          

    </template>


</v-list>


<v-layout row justify-center>
    <v-dialog v-model="deletedialog" persistent max-width="500px">
        </v-btn>
        <v-card>
            <v-card-title>
                <span class="headline">confirme?</span>
            </v-card-title>
            <v-card-text>
                <v-container>
                    are you sure?
                </v-container>
            </v-card-text>
            <v-card-actions>
                <v-spacer></v-spacer>
                <v-btn color="blue darken-1" flat @click.native="deletedialog = false">no</v-btn>
                <v-btn color="blue darken-1" flat @click.native="deletedialog = false" @click="DeletTask(todotoDelet)">yes</v-btn>
            </v-card-actions>
        </v-card>
    </v-dialog>
</v-layout>



</v-flex>


</template>

<script>
 var addtodo = require('./AddTodo.vue');

  export default {


     data:()=>({
          todotoDelet :0 ,
          deletedialog:false,
          drawer: false,
          todos:[]
          // catfiltre:''
     }),



     components:{
          'add-todo': addtodo
        },
    props:['catfiltre'],
    computed:{
      filtredtasks:function (catfiltre) {
        

        return this.todos.filter((todo)=>{
          if (this.catfiltre==0) {
            // alert(0);
          return todo.category.name.match('');
        }else {
          return todo.category.id == this.catfiltre;
        }
        });
      }
    },
    filters:{
      limit: function (text) {
        return text.slice(1,100);
      }
    },
    methods:{
        
        Loadtasks: function() {
            axios.get('api/tasks')
                  .then(response=>{
                    // console.log(response.data.data);
                    this.todos = response.data.data;
                    // console.log(this.todos);

                  })
        },


        TasKdone:function(){

        },


        UnDone:function(){

        },


        UpdateTask:function () {
          
        },


        DeletTask:function(todo) {

          // console.log(taskId);

            axios.delete('api/task/'+todo.id)
                  .then(response=>{
                      this.todos.splice(this.todos.indexOf(todo),1);
                      // console.log(todo);
                      // console.log(this.todos.indexOf(todo));
                  })

        },

        DhowDialoge:function() {

        }
      },
    mounted:function () {
      this.Loadtasks();
    }
  }
</script>   