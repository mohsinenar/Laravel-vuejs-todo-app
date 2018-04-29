<template>
  <v-flex  md12>
    <add-todo></add-todo>
  <v-list  dense three-line>
    <template v-for="todo in filtredtasks">
      <v-divider></v-divider>
      <v-list-tile avatar @click="">
        <v-list-tile-content>
         <v-list-tile-title>
            <h3>{{todo.title}}</h3>
        </v-list-tile-title>
        <v-list-tile-sub-title>{{todo.category}}</v-list-tile-sub-title>

        <p>{{todo.text}}</p>
        </v-list-tile-content>
        
        <v-list-tile-action>
            <v-btn  icon color='primary' ><v-icon>mode_edit</v-icon></v-btn>
        </v-list-tile-action>
        <v-list-tile-action>
            <v-btn  color='red' icon ><v-icon>delete</v-icon></v-btn>
        </v-list-tile-action>
        <v-list-tile-action>
            <v-btn  icon color='success' ><v-icon>done</v-icon></v-btn>
        </v-list-tile-action>

      </v-list-tile>
    </template>
  </v-list>
  </v-flex>
</template>

<script>
 var addtodo = require('./AddTodo.vue');

  export default {
     data:()=>({
          drawer: false,
          todos:[
          {category:"cat2",title:'task1',text:"Lorem LoremLorem ipsum dolor sit amet.",isdone:true},
          {category:"cat3",title:'task2',text:"Lorem ipsum timetimetime sit amet.",isdone:false},
          {category:"cat4",title:'task3',text:"Lorem ipsum time Loremtime  time sit amet.",isdone:true}
          ],
          // catfiltre:''
     }),
     components:{
          'add-todo': addtodo
        },
    props:['catfiltre'],
    computed:{
      filtredtasks:function (catfiltre) {
        return this.todos.filter((todo)=>{
          return todo.category.match(this.catfiltre);
        });
      }
    },
     methods:{
      
      Loadtasks: function() {
             
      },


      TasKdone:function(){

      },


      UnDone:function(){

      },


      UpdateTask:function () {
        
      },


      DeletTask:function() {

      },

      DhowDialoge:function() {

      },

      }
  }
</script>   