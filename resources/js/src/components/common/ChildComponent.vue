<template>
  <h3>{{ title }}</h3>
</template>
<script>
export default {
  name: 'child-component',
  props: {
    title: {
      type: String,
      default: ''
    }
  }
}
</script>
