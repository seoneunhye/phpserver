<template>
  <router-link to="/" class="router__btn">메인으로</router-link>
  <h2 class="header-title">상품 수정 페이지</h2>
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
    <button type="button" @click="handleUpdateProduct" class="register__btn">
      상품 등록
    </button>
  </form>
</template>

<script>
import { onMounted, reactive } from 'vue'
import { useRoute, useRouter } from 'vue-router'
import axios from 'axios'

export default {
  setup() {
    const route = useRoute()
    const router = useRouter()
    const product = reactive({ name: '', description: '', price: '' })

    const fetchProducts = async () => {
      try {
        const id = route.params.id
        const response = await axios.get(`/api/products/${id}`)
        product.name = response.data.name
        product.description = response.data.description
        product.price = response.data.price
      } catch (error) {
        console.error(error)
      }
    }

    onMounted(fetchProducts)

    const handleUpdateProduct = async () => {
      try {
        const id = route.params.id
        await axios.put(`/api/products/${id}`, product)
        await router.push({ name: 'home' })
      } catch (error) {
        console.log(error)
      }
    }

    return {
      product,
      fetchProducts,
      handleUpdateProduct
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
