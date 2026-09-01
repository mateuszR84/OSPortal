<script setup lang="ts">
const year = new Date().getFullYear()
</script>

<template>
  <footer id="kontakt" class="bg-black text-gray-400">
    <div class="mx-auto max-w-6xl px-4 py-10 text-sm">
      <p>&copy; {{ year }} OSPortal — oprogramowanie do zarządzania jednostką OSP.</p>
      <p class="mt-1">Kontakt: <a href="mailto:kontakt@osportal.pl" class="hover:text-gold-light">kontakt@osportal.pl</a></p>
    </div>
  </footer>
</template>
