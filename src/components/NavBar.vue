<script setup lang="ts">
// Docelowe cele linków, gdy appka pod app.osportal.pl powstanie — na razie placeholder.
const APP_URL = 'https://app.osportal.pl'
</script>

<template>
  <header class="bg-navy text-white">
    <div class="mx-auto flex max-w-6xl items-center justify-between px-4 py-4">
      <RouterLink to="/" class="flex items-center gap-2 text-lg font-bold tracking-tight">
        <span class="inline-block h-2.5 w-2.5 rounded-full bg-gold" />
        OSPortal
      </RouterLink>

      <nav class="flex items-center gap-6 text-sm font-medium">
        <a href="#funkcje" class="hidden hover:text-gold-light sm:inline">Funkcje</a>
        <a href="#kontakt" class="hidden hover:text-gold-light sm:inline">Kontakt</a>
        <a :href="APP_URL" class="hover:text-gold-light">Zaloguj się</a>
        <a
          :href="APP_URL"
          class="rounded-md bg-red px-3 py-1.5 text-white transition-colors hover:bg-red-dark"
        >
          Załóż konto
        </a>
      </nav>
    </div>
  </header>
</template>
