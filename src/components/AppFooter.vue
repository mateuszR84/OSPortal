<script setup lang="ts">
import AppIcon from './AppIcon.vue'
import footerBg from '../assets/footer-bg.jpg'

const year = new Date().getFullYear()

const productLinks = [
  { href: '#funkcje', label: 'Funkcjonalności' },
  { href: '#korzysci', label: 'Korzyści' },
  { href: '#cennik', label: 'Cennik' },
] as const

const helpLinks = [
  { href: '#', label: 'Centrum pomocy' },
  { href: '#', label: 'FAQ' },
  { href: '#', label: 'Poradniki' },
  { href: '#', label: 'Zgłoś problem' },
] as const
</script>

<template>
  <footer id="kontakt" class="relative overflow-hidden bg-black text-gray-200">
    <div
      class="absolute inset-0 bg-[length:70%] bg-no-repeat bg-center"
      :style="{ backgroundImage: `url(${footerBg})` }"
      aria-hidden="true"
    />
    <div class="absolute inset-0 bg-black/85" aria-hidden="true" />

    <div class="relative mx-auto max-w-6xl px-4 py-12 lg:flex lg:items-start lg:justify-between">
      <div class="max-w-xs">
        <div class="flex items-center gap-2 text-lg font-bold text-white">
          <AppIcon name="flame" :size="20" class="text-red-light" />
          OSPortal
        </div>
        <p class="mt-3 text-sm">
          Nowoczesne narzędzie do zarządzania jednostką OSP. Tworzone z myślą o strażakach
          ochotnikach w całej Polsce.
        </p>
      </div>

      <div class="mt-10 grid grid-cols-2 gap-x-8 gap-y-10 sm:grid-cols-3 lg:mt-0 lg:flex lg:gap-16">
        <div>
          <p class="text-sm font-semibold text-white">Produkt</p>
          <ul class="mt-4 space-y-2 text-sm">
            <li v-for="link in productLinks" :key="link.href">
              <a :href="link.href" class="hover:text-gold-light">{{ link.label }}</a>
            </li>
          </ul>
        </div>

        <div>
          <p class="text-sm font-semibold text-white">Pomoc</p>
          <ul class="mt-4 space-y-2 text-sm">
            <li v-for="link in helpLinks" :key="link.label">
              <a :href="link.href" class="hover:text-gold-light">{{ link.label }}</a>
            </li>
          </ul>
        </div>

        <div class="col-span-2 sm:col-span-1">
          <p class="text-sm font-semibold text-white">Kontakt</p>
          <ul class="mt-4 space-y-2 text-sm">
            <li class="flex items-center gap-2">
              <AppIcon name="mail" :size="16" />
              <a href="mailto:kontakt@osportal.pl" class="hover:text-gold-light">kontakt@osportal.pl</a>
            </li>
            <li class="flex items-center gap-2">
              <AppIcon name="phone" :size="16" />
              <a href="tel:724414081" class="hover:text-gold-light">724 414 081</a>
            </li>
            <li class="flex items-center gap-2">
              <AppIcon name="clock" :size="16" />
              Pn-Pt 8:00 - 16:00
            </li>
          </ul>
        </div>
      </div>
    </div>

    <div class="relative border-t border-white/10">
      <div class="mx-auto max-w-6xl px-4 py-6 text-xs">
        &copy; {{ year }} OSPortal. Wszelkie prawa zastrzeżone.
      </div>
    </div>
  </footer>
</template>
