<script setup lang="ts">
import { ref } from 'vue'
import AppIcon from './AppIcon.vue'

// Docelowe cele linków, gdy appka pod app.osportal.pl powstanie — na razie placeholder.
const APP_URL = 'https://app.osportal.pl'

const links = [
  { href: '#funkcje', label: 'Funkcjonalności' },
  { href: '#korzysci', label: 'Korzyści' },
  { href: '#cennik', label: 'Cennik' },
  { href: '#kontakt', label: 'Kontakt' },
] as const

const open = ref(false)
</script>

<template>
  <header class="sticky top-0 z-30 bg-navy text-white">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
      <RouterLink to="/" class="flex items-center gap-2 text-lg font-bold tracking-tight">
        <AppIcon name="flame" :size="22" class="text-red-light" />
        OSPortal
      </RouterLink>

      <nav class="hidden items-center gap-6 text-sm font-medium lg:flex">
        <a v-for="link in links" :key="link.href" :href="link.href" class="hover:text-gold-light">
          {{ link.label }}
        </a>
      </nav>

      <div class="hidden items-center gap-4 text-sm font-medium lg:flex">
        <a :href="APP_URL" class="hover:text-gold-light">Zaloguj się</a>
        <a
          :href="APP_URL"
          class="rounded-md bg-red px-4 py-2 text-white transition-colors hover:bg-red-dark"
        >
          Wypróbuj za darmo
        </a>
      </div>

      <button
        type="button"
        class="text-white lg:hidden"
        aria-label="Otwórz menu"
        @click="open = !open"
      >
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round">
          <line x1="3" y1="6" x2="21" y2="6" />
          <line x1="3" y1="12" x2="21" y2="12" />
          <line x1="3" y1="18" x2="21" y2="18" />
        </svg>
      </button>
    </div>

    <div v-if="open" class="border-t border-white/10 px-4 pb-4 lg:hidden">
      <nav class="flex flex-col gap-3 pt-4 text-sm font-medium">
        <a
          v-for="link in links"
          :key="link.href"
          :href="link.href"
          class="hover:text-gold-light"
          @click="open = false"
        >
          {{ link.label }}
        </a>
        <a :href="APP_URL" class="hover:text-gold-light">Zaloguj się</a>
        <a
          :href="APP_URL"
          class="rounded-md bg-red px-4 py-2 text-center text-white transition-colors hover:bg-red-dark"
        >
          Wypróbuj za darmo
        </a>
      </nav>
    </div>
  </header>
</template>
