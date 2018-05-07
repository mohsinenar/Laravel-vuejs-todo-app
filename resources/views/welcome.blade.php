<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>todo app</title>
      <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <div id="app">
 <v-app id="inspire" dark>
    <v-navigation-drawer
      clipped
      fixed
      v-model="drawer"
      app
    >
      <categories  @updatefiltre="updatefiltrep($event)"></categories>
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

  </v-app>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>