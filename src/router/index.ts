import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
  history: createWebHistory(),
  routes: [
    {
      path: '/',
      name: 'landing',
      component: () => import('../views/PlatformLanding.vue'),
    },
    {
      path: '/pomoc',
      name: 'help',
      component: () => import('../views/HelpPage.vue'),
    },
  ],
})

export default router
