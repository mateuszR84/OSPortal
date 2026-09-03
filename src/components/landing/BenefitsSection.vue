<script setup lang="ts">
import AppIcon from '../AppIcon.vue'

const benefits = [
  {
    icon: 'clock',
    title: 'Oszczędność czasu',
    description: 'Automatyzuj zadania i papierkową robotę. Skup się na tym, co najważniejsze.',
  },
  {
    icon: 'shield',
    title: 'Lepsza organizacja',
    description: 'Wszystkie informacje w jednym miejscu. Koniec z chaosem i szukaniem danych.',
  },
  {
    icon: 'users',
    title: 'Integracja zespołu',
    description: 'Lepsza komunikacja i dostęp do informacji dla wszystkich druhów.',
  },
  {
    icon: 'check-circle',
    title: 'Pełna gotowość',
    description: 'Masz pełną kontrolę nad zasobami i gotowością bojową jednostki 24/7.',
  },
] as const
</script>

<template>
  <section id="korzysci" class="mx-auto max-w-6xl px-4 py-20">
    <p class="text-center text-sm font-semibold uppercase tracking-wide text-red">Korzyści</p>
    <h2 class="mt-2 text-center text-3xl font-bold text-black">Dlaczego OSPortal?</h2>

    <div class="mt-12 grid gap-10 sm:grid-cols-2 lg:grid-cols-4">
      <div v-for="benefit in benefits" :key="benefit.title">
        <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-red/10 text-red">
          <AppIcon :name="benefit.icon" :size="22" />
        </span>
        <h3 class="mt-4 font-bold text-black">{{ benefit.title }}</h3>
        <p class="mt-2 text-sm text-gray-600">{{ benefit.description }}</p>
      </div>
    </div>
  </section>
</template>
