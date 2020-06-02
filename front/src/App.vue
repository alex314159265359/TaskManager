<template>
  <div id="app">
    <div class="ui menu">
      <div class="header item">
        TaskManager
      </div>
      <router-link to="/" class="item">Main</router-link>
      <router-link to="/inprocess" class="item">In process</router-link>
    </div>

    <div class="ui container grid">
      <div class="row">
        <router-view class="view"></router-view>
      </div>
    
    </div>

  </div>
</template>


<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  /*text-align: center;*/
  color: #2c3e50;
  /*margin-top: 60px;*/
}
</style>
