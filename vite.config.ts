import tailwindcss from '@tailwindcss/vite'
import vue from '@vitejs/plugin-vue'
import { defineConfig } from 'vite'

// https://vite.dev/config/
export default defineConfig({
  plugins: [vue(), tailwindcss()],
  server: {
    proxy: {
      // `php -S localhost:8082 -t public` serves form.php locally (see README).
      '/form.php': 'http://localhost:8082',
    },
  },
})
