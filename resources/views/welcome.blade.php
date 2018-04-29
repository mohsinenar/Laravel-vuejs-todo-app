<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>hey</title>
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
   
    <div id="app">
       @{{catfiltre}}
 <v-app id="inspire" dark>
    <v-navigation-drawer
      clipped
      fixed
      v-model="drawer"
      app
    >
      <categories  @updatefiltre="updatefiltrep($event)"  categories='categories' ></categories>
    </v-navigation-drawer>
    <v-toolbar app fixed clipped-left>
      <v-toolbar-side-icon @click.stop="drawer = !drawer"></v-toolbar-side-icon>
      <v-toolbar-title>todo</v-toolbar-title>

    </v-toolbar>
    <v-content>
      <v-container fluid fill-height>

        <v-layout justify-center align-center>
           <todo-list v-bind:catfiltre="catfiltre"></todo-list>
        </v-layout>
      </v-container>
    </v-content>
    <v-footer app fixed>
      <span>&copy; 2017</span>
    </v-footer>
  </v-app>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>