<template>
  <div class="ui list">
  <div class="item">
    <i class="folder icon"></i>
    <div class="content">
      <div class="header">src</div>
      <div class="list">
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">site</div>
          </div>
        </div>
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">themes</div>
            <div class="list">
              <div class="item">
                <i class="folder icon"></i>
                <div class="content">
                  <div class="header">default</div>
                </div>
              </div>
              <div class="item">
                <i class="folder icon"></i>
                <div class="content">
                  <div class="header">my_theme</div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="item">
          <i class="file icon"></i>
          <div class="content">
            <div class="header">theme.config</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <i class="folder icon"></i>
    <div class="content">
      <div class="header">dist</div>
      <div class="list">
        <div class="item">
          <i class="folder icon"></i>
          <div class="content">
            <div class="header">components</div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="item">
    <i class="file icon"></i>
    <div class="content">
      <div class="header">semantic.json</div>
    </div>
  </div>
</div>
</template>

<script>
export default {
  name: 'FileList'
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
