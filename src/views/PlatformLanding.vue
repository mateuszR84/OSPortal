<script setup lang="ts">
import AppFooter from '../components/AppFooter.vue'
import NavBar from '../components/NavBar.vue'

const APP_URL = 'https://app.osportal.pl'

interface Feature {
  title: string
  description: string
}

const features: Feature[] = [
  {
    title: 'Strażacy',
    description:
      'Kartoteki członków jednostki — dane, badania okresowe, uprawnienia, kategorie prawa jazdy.',
  },
  {
    title: 'Pojazdy',
    description: 'Ewidencja pojazdów jednostki wraz z terminami przeglądów i badań technicznych.',
  },
  {
    title: 'Sprzęt',
    description: 'Wykaz wyposażenia i sprzętu ratowniczego jednostki w jednym miejscu.',
  },
  {
    title: 'Zdarzenia',
    description: 'Ewidencja akcji ratowniczo-gaśniczych wraz z obsadą i dowódcą zdarzenia.',
  },
  {
    title: 'Przypomnienia',
    description:
      'Automatyczne powiadomienia o zbliżających się terminach badań, przeglądów i uprawnień.',
  },
  {
    title: 'Jedno konto na jednostkę',
    description: 'Każda jednostka OSP dostaje własny, odseparowany panel do zarządzania.',
  },
]
</script>

<template>
  <div class="flex min-h-screen flex-col">
    <NavBar />

    <main class="flex-1">
      <section class="bg-navy text-white">
        <div class="mx-auto max-w-6xl px-4 py-24 text-center">
          <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl">
            Oprogramowanie do zarządzania jednostką <span class="text-gold-light">OSP</span>
          </h1>
          <p class="mx-auto mt-4 max-w-2xl text-lg text-gray-400">
            Strażacy, pojazdy, sprzęt i zdarzenia — wszystko w jednym, prostym panelu.
            Bez papierowej ewidencji i pilnowania terminów ręcznie.
          </p>
          <a
            :href="APP_URL"
            class="mt-8 inline-block rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Załóż konto swojej jednostki
          </a>
        </div>
      </section>

      <section id="funkcje" class="mx-auto max-w-6xl px-4 py-16">
        <h2 class="text-center text-2xl font-bold text-black">Co daje OSPortal</h2>

        <div class="mt-10 grid gap-6 sm:grid-cols-2 lg:grid-cols-3">
          <article
            v-for="feature in features"
            :key="feature.title"
            class="rounded-lg border border-gray-200 bg-white p-5"
          >
            <h3 class="font-bold text-black">{{ feature.title }}</h3>
            <p class="mt-2 text-sm text-gray-600">{{ feature.description }}</p>
          </article>
        </div>
      </section>

      <section class="bg-gray-100 py-16">
        <div class="mx-auto max-w-6xl px-4">
          <h2 class="text-center text-2xl font-bold text-black">Zobacz panel jednostki</h2>
          <div
            class="mx-auto mt-8 flex h-80 max-w-4xl items-center justify-center rounded-lg bg-gradient-to-br from-navy to-navy-light text-gray-400"
          >
            Zrzut ekranu panelu — do uzupełnienia
          </div>
        </div>
      </section>

      <section class="mx-auto max-w-6xl px-4 py-16 text-center">
        <h2 class="text-2xl font-bold text-black">Gotowi, żeby zacząć?</h2>
        <p class="mt-2 text-gray-600">Załóż konto swojej jednostki OSP w kilka minut.</p>
        <a
          :href="APP_URL"
          class="mt-6 inline-block rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
        >
          Załóż konto
        </a>
      </section>
    </main>

    <AppFooter />
  </div>
</template>
