<template>
  <div id="app">
    <h1 class="header__title">10만원 이하만 파는 의류 쇼핑몰</h1>
    <router-link to="/editor" class="editor__btn">상품 등록하기</router-link>
    <ul class="productList">
      <li
        class="productList__item"
        v-for="product in products"
        :key="product.id"
      >
        <span class="product__category">✔️상품명</span>
        <span class="product__content">{{ product.name }}</span>
        <span class="product__category">✔️설명 상세 </span>
        <span class="product__content"> {{ product.description }}</span>
        <span class="product__category">✔️상품 가격</span>
        <span class="product__content">
          {{ product.price.toLocaleString() }}</span
        >
        <button class="btn" @click="handleDeleteProduct(product.id)">
          삭제
        </button>
        <button class="btn" @click="handleMoveToUpdateForm(product.id)">
          수정
        </button>
      </li>
    </ul>
  </div>
</template>
<script setup>
import axios from 'axios'
import { ref, onMounted } from 'vue'
import { useRouter } from 'vue-router'

const products = ref([])
const router = useRouter()

const fetchProducts = async () => {
  try {
    const response = await axios.get('/api/products')
    products.value = response.data
  } catch (error) {
    console.error(error)
  }
}

const handleMoveToUpdateForm = async id => {
  router.push(`/modify/${id}`)
}

const handleDeleteProduct = async id => {
  try {
    if (confirm('상품을 삭제하시겠습니까?')) {
      await axios.delete(`/api/products/${id}`)
      products.value = products.value.filter(product => product.id !== id)
    }
  } catch (error) {
    console.error(error)
  }
}

onMounted(fetchProducts)
</script>

<style>
.header__title {
  margin: 1.5rem;
  text-align: center;
  font-size: 1.4rem;
}
.product__category {
  display: block;
  margin: 0.5rem;
  line-height: 1.5;
}
.product__content {
  display: block;
  margin-bottom: 1rem;
}
.productList {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr;
  list-style-type: none;
  padding: 0;
  text-align: center;
}
.productList__item {
  border: 1px solid black;
  border-radius: 10px;
  margin: 10px;
  padding: 10px;
}
.editor__btn {
  border: 1px solid black;
  text-decoration-line: none;
  padding: 10px;
  margin: 5%;
  border-radius: 10px;
  font-weight: bolder;
  cursor: pointer;
}

.btn {
  padding: 10px;
  margin: 10px;
  border-radius: 10px;
  font-weight: bold;
  cursor: pointer;
}
</style>
