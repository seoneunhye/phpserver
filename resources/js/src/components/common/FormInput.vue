<template>
  <label :for="inputId" class="mb-5">{{ labelText }}</label>
  <input
    :type="type"
    :id="inputId"
    :placeholder="placeholder"
    :value="modelValue"
    @input="$emit('update:modelValue', $event.target.value)"
    class="w-52 block border-solid border-2 mb-5 rounded-md"
  />
</template>
<script>
export default {
  props: {
    inputId: {
      type: String,
      default: ''
    },
    labelText: {
      type: String,
      default: ''
    },
    type: {
      type: String,
      default: 'text'
    },
    placeholder: {
      type: String,
      default: '내용을 채워주세요'
    },
    modelValue: {
      default: ''
    }
  }
}
</script>

<style scoped>
/* label {
  margin: 10px;
  font-size: large;
  font-weight: bold;
}
input {
  width: 200px;
  display: block;
  margin-bottom: 10px;
  padding: 10px;
  border-radius: 10px;
} */
</style>
