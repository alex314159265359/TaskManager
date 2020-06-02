<template>
  <div class="ui list">
  
    <!-- {{post}} -->
    <Directory v-bind:data="post" v-bind:fileList="fileList"></Directory>
    
    <ul class="ui list">
      <li v-for="item in fileList" :key="item[1]">
        {{ item[1] }}
      </li>
    </ul>
  </div>

</template>

<script>
import Vue from 'vue'
import axios from 'axios'
// import Directory from './Directory.vue'


// Vue.component('Directory', require('./Directory.vue'));
Vue.component('Directory', {
  props: {
    data: Object,
    fileList: Array
  },
  methods: {
    list: function(msg) {
      let isFound = false;

      for (var i = 0; i < this.fileList.length; i++) {
        if (this.fileList[i][0] == msg.id) isFound = true;
      }
      if (!isFound) this.fileList.push([msg.id, msg.path]);
      
      console.log(this.fileList);
    }
  },
  template: `<div class="item" v-if="data">
    <i class="folder icon" v-if="data.type=='dir'"></i>
    <i class="file icon" v-if="data.type=='file'"></i>
    <div class="content">
      <div class="header" v-if="data.type=='file'"><a @click="list(data)">{{data.name}}</a></div>
      <div class="header" v-if="data.type=='dir'">{{data.name}}</div>

      <div class="list" v-if="data.type=='dir'">
        <Directory v-for="item in data.children" v-bind:data="item" v-bind:fileList="fileList" :key="item.id"></Directory>      
      </div>
    </div>
  </div>`
})

export default {
  name: 'FileList',
  props: {
    name: {
      type: String,
      default: 'Vue!'
    }
  },
  data() {
    return {
      loading: false,
      post: {
        name: '/', type: 'dir', children: []
      },
      error: null,
      fileList: []
    }
  },
  created() {
    // загружаем данные, когда представление создано
    // и данные реактивно отслеживаются
    this.fetchData()
  },
  watch: {
    // при изменениях маршрута запрашиваем данные снова
    // $route: 'fetchData'
  },
  methods: {
    fetchData() {
      this.error = this.post = null
      this.loading = true

      axios
      .get('http://127.0.0.1:8000/api/user/1')
      .then(response => {
        response
        if (response.data.data) {
          this.post = response.data
        } else {
          this.post = {}
        }
      });
      axios
      .post('http://127.0.0.1:8000/api/add_task', {
        fileIds: [1, 2, 3, 4, 5]
      })
      .then(response => {
        console.log(response.data);
      });
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
</style>
