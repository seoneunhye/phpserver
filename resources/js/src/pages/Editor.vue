<template>
  <router-link to="/" class="router__btn">메인으로</router-link>
  <h2 class="text-center text-2xl font-extrabold">상품 등록 페이지</h2>
  <form>
    <FormInput
      inputId="productName"
      labelText="상품명"
      placeholder="15자 이내로 작성"
      v-model="product.name"
    />
    <FormInput
      inputId="productDesc"
      labelText="설명 상세"
      placeholder="50자 이내로 작성"
      v-model="product.description"
    />
    <FormInput
      inputId="productPrice"
      labelText="상품 가격"
      placeholder="10만원 이하만 입력"
      v-model="product.price"
    />
    <HashTagInp />
    <!-- <Button buttonTxt="상품 등록" @click-button="handleSubmitProductForm" /> -->
    <button
      type="button"
      @click="handleSubmitProductForm"
      class="rounded-lg border-2 p-2"
    >
      상품 등록
    </button>
  </form>
</template>

<script>
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'
import FormInput from '../components/common/FormInput.vue'
import HashTagInp from '../components/common/HashTagInp.vue'
import Button from '../components/common/Button.vue'

export default {
  components: {
    FormInput,
    HashTagInp,
    Button
  },
  setup() {
    const product = reactive({ name: '', description: '', price: '' })
    const router = useRouter()

    const handleSubmitProductForm = async () => {
      try {
        await axios.post('/api/products', product)

        await router.push({ name: 'home' })
      } catch (error) {
        console.log(error)
      }
    }

    return {
      product,
      handleSubmitProductForm
    }
  }
}
</script>

<style scoped>
.router__btn {
  display: block;
  margin: 5%;
  width: 100px;
  text-align: center;
  border: 1px solid black;
  text-decoration-line: none;
  padding: 10px;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
}

form {
  padding: 3rem;
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
}
label {
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
}
</style>
