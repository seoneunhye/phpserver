<template>
  <form>
    <label for="hashtagInp" class="mb-5">해시태그</label>
    <div class="flex gap-5">
      <input
        type="text"
        id="hashtagInp"
        maxlength="10"
        required
        placeholder="10자 이내로 작성"
        class="border-2 rounded-md w-32"
      />

      <Button buttonTxt="등록" />
    </div>
  </form>
</template>

<script>
import Button from './Button.vue'
export default {
  name: 'HashTagInp',
  components: { Button }
}
</script>

<style></style>
