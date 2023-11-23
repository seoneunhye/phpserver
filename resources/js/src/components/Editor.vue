<template>
  <router-link to="/" class="router__btn">메인으로</router-link>
  <h2 class="header-title">상품 등록 페이지</h2>
  <form action="" class="">
    <label for="productName">상품명 </label>
    <input
      type="text"
      id="productName"
      placeholder="15자 이내로 작성"
      v-model="product.name"
    />
    <label for="productDesc">설명 상세 </label>
    <input
      type="text"
      id="productDesc"
      placeholder="50자 이내로 작성"
      v-model="product.description"
    />
    <label for="productPrice">상품가격 </label>
    <input
      type="text"
      id="productPrice"
      placeholder="10만원 이하만 입력"
      v-model="product.price"
    />
    <button
      type="submit"
      @click="handleSubmitProductForm"
      class="register__btn"
    >
      상품 등록
    </button>
  </form>
</template>

<script>
import { reactive } from 'vue'
import axios from 'axios'

export default {
  setup() {
    const product = reactive({ name: '', description: '', price: '' })

    const handleSubmitProductForm = async () => {
      try {
        await axios.post('/api/products', product)
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
