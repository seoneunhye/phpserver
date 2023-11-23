import Vue from 'vue'
import { createWebHistory, createRouter } from 'vue-router'
import Editor from '../components/Editor.vue'
import Home from '../components/Home.vue'

const routes = [
  { path: '/', component: Home },
  { path: '/editor', component: Editor }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
