import { createWebHistory, createRouter } from 'vue-router'
import Editor from '../pages/Editor.vue'
import Home from '../pages/Home.vue'
import Modify from '../pages/Modify.vue'

const routes = [
  { path: '/', component: Home, name: 'home' },
  { path: '/editor', component: Editor, name: 'editor' },
  { path: '/modify/:id', component: Modify, name: 'modify' }
]

const router = createRouter({
  history: createWebHistory(),
  routes
})

export default router
