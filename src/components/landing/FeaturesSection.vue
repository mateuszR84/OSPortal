<script setup lang="ts">
import AppIcon from '../AppIcon.vue'

const features = [
  {
    icon: 'users',
    title: 'Strażacy',
    description:
      'Ewidencja druhów, kwalifikacje, badania lekarskie, szkolenia i dostępność.',
  },
  {
    icon: 'bell',
    title: 'Powiadomienia',
    description:
      'Automatyczne przypomnienia o badaniach, szkoleniach i ważnych terminach — nic nie umknie.',
  },
  {
    icon: 'car',
    title: 'Pojazdy',
    description:
      'Przeglądy, badania techniczne i historia wyjazdów pojazdów jednostki — wszystko pod kontrolą.',
  },
  {
    icon: 'box',
    title: 'Wyposażenie',
    description: 'Ewidencja sprzętu, przeglądy i lokalizacja. Nigdy nie zgubisz ważnego wyposażenia.',
  },
  {
    icon: 'file-text',
    title: 'Dokumenty i raporty',
    description: 'Przechowuj dokumenty, twórz raporty i zestawienia na potrzeby zarządu, gminy i PSP.',
  },
  {
    icon: 'bar-chart',
    title: 'Statystyki',
    description: 'Analizuj aktywność jednostki, gotowość bojową i inne kluczowe wskaźniki.',
  },
] as const
</script>

<template>
  <section id="funkcje" class="mx-auto max-w-6xl px-4 py-20">
    <p class="text-center text-sm font-semibold uppercase tracking-wide text-red">Funkcjonalności</p>
    <h2 class="mt-2 text-center text-3xl font-bold text-black">
      Wszystko, czego potrzebuje Twoja jednostka
    </h2>

    <div class="mt-12 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
      <article
        v-for="feature in features"
        :key="feature.title"
        class="rounded-xl border border-gray-200 bg-white p-6"
      >
        <span class="flex h-11 w-11 items-center justify-center rounded-lg bg-red/10 text-red">
          <AppIcon :name="feature.icon" :size="22" />
        </span>
        <h3 class="mt-4 font-bold text-black">{{ feature.title }}</h3>
        <p class="mt-2 text-sm text-gray-600">{{ feature.description }}</p>
      </article>
    </div>
  </section>
</template>
