<script setup lang="ts">
import AppIcon from '../AppIcon.vue'
import heroBg from '../../assets/hero-bg.jpg'
import heroApp from '../../assets/hero-app1.png'

defineProps<{ appUrl: string }>()

const badges = [
  { icon: 'shield', label: 'Dla każdej OSP' },
  { icon: 'zap', label: 'Łatwe wdrożenie' },
  { icon: 'lock', label: 'Bezpieczne dane' },
] as const
</script>

<template>
  <section class="relative overflow-hidden bg-navy text-white">
    <div
      class="absolute inset-0 bg-cover bg-center"
      :style="{ backgroundImage: `url(${heroBg})` }"
      aria-hidden="true"
    />
    <div class="absolute inset-0 bg-navy/85" aria-hidden="true" />

    <div
      class="pointer-events-none absolute inset-y-[6%] right-0 hidden w-[48%] overflow-hidden rounded-l-2xl ring-1 ring-white/10 shadow-[0_30px_70px_-15px_rgba(0,0,0,0.75)] lg:block xl:w-[50%]"
      aria-hidden="true"
    >
      <img :src="heroApp" alt="" class="h-full w-full object-cover object-left" />
    </div>

    <div class="relative mx-auto w-full max-w-6xl px-4 py-20 lg:py-28">
      <div class="relative z-10 max-w-xl lg:max-w-[30rem]">
        <h1 class="text-4xl font-extrabold leading-snug tracking-tight sm:text-5xl sm:leading-[1.25]">
          Zarządzaj swoją jednostką <span class="text-red-light">OSP</span> w jednym miejscu
        </h1>
        <p class="mt-5 max-w-xl text-lg text-gray-400">
          Nowoczesna aplikacja dla Ochotniczych Straży Pożarnych, która ułatwia zarządzanie
          strażakami, wydarzeniami, pojazdami i wyposażeniem.
        </p>

        <div class="mt-8 flex flex-wrap items-center gap-4">
          <a
            :href="appUrl"
            class="inline-flex items-center gap-2 rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Wypróbuj za darmo
            <AppIcon name="arrow-right" :size="18" />
          </a>
          <a
            href="#funkcje"
            class="inline-flex items-center gap-2 rounded-md bg-gold px-6 py-3 font-semibold text-navy transition-colors hover:bg-gold-light"
          >
            <AppIcon name="play" :size="16" />
            Demo
          </a>
        </div>

        <ul class="mt-10 flex flex-wrap gap-x-8 gap-y-3 text-sm text-gray-400">
          <li v-for="badge in badges" :key="badge.label" class="flex items-center gap-2">
            <AppIcon :name="badge.icon" :size="16" class="text-gold-light" />
            {{ badge.label }}
          </li>
        </ul>
      </div>
    </div>
  </section>
</template>
