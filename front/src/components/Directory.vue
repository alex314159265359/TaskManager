<template>
  <div class="ui list">
    {{name}}
  </div>
</template>

<script>

export default {
  name: 'Directory',
  props: {
    name: {
      type: String,
      default: 'Vue!'
    }
  }
}
</script>

