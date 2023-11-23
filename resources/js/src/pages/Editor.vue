<template>
  <router-link to="/" class="router__btn">메인으로</router-link>
  <h2 class="header-title">상품 등록 페이지</h2>
  <form class="">
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
    <button
      type="button"
      @click="handleSubmitProductForm"
      class="register__btn"
    >
      상품 등록
    </button>
  </form>
</template>

<script>
import FormInput from '../components/common/FormInput.vue'
import { reactive } from 'vue'
import { useRouter } from 'vue-router'
import axios from 'axios'

export default {
  components: {
    FormInput
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
.header-title {
  text-align: center;
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
.register__btn {
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
}
</style>
