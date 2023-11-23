import { createWebHistory, createRouter } from 'vue-router'
import Editor from '../components/Editor.vue'
import Home from '../components/Home.vue'
import Modify from '../components/Modify.vue'

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
