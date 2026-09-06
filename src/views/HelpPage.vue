<script setup lang="ts">
import { onMounted, ref } from 'vue'
import AppFooter from '../components/AppFooter.vue'
import NavBar from '../components/NavBar.vue'
import AppIcon from '../components/AppIcon.vue'

const faqs = [
  {
    question: 'Czym jest OSPortal?',
    answer:
      'Aplikacją do zarządzania jednostką OSP — ewidencja strażaków, pojazdów, wyposażenia, zdarzeń i dokumentów w jednym miejscu.',
  },
  {
    question: 'Dla kogo jest OSPortal?',
    answer:
      'Dla Ochotniczych Straży Pożarnych każdej wielkości — od małych jednostek zaczynających porządkować ewidencję po te aktywnie działające i szkolące się.',
  },
  {
    question: 'Ile kosztuje OSPortal?',
    answer:
      'Jeden plan Standard — 39 zł miesięcznie lub 299 zł rocznie (taniej o 36%). Szczegóły w sekcji Cennik.',
  },
  {
    question: 'Kiedy będę mógł/mogła zacząć korzystać z OSPortal?',
    answer:
      'Trwają ostatnie prace przed uruchomieniem dostępu dla jednostek. Napisz do nas, a odezwiemy się, gdy tylko będzie to możliwe.',
  },
  {
    question: 'Czy moje dane będą bezpieczne?',
    answer:
      'Tak — dostęp do danych Twojej jednostki mają wyłącznie osoby, którym go nadasz. Bezpieczeństwo danych to jeden z priorytetów przy budowie OSPortal.',
  },
] as const

onMounted(() => {
  if (window.location.hash) {
    document.querySelector(window.location.hash)?.scrollIntoView()
  }
})

const openIndex = ref<number | null>(0)
function toggle(index: number) {
  openIndex.value = openIndex.value === index ? null : index
}
</script>

<template>
  <div class="flex min-h-screen flex-col">
    <NavBar />

    <main class="flex-1">
      <section class="bg-navy py-16 text-white">
        <div class="mx-auto max-w-3xl px-4 text-center">
          <h1 class="text-3xl font-bold sm:text-4xl">Centrum pomocy</h1>
          <p class="mt-4 text-gray-400">
            Odpowiedzi na najczęstsze pytania o OSPortal. Nie znalazłeś/aś tego, czego szukasz? Po
            prostu <a href="/#zgloszenie" class="text-gold-light hover:underline">napisz do nas</a>.
          </p>
          <div class="mt-8 flex flex-wrap justify-center gap-3 text-sm font-semibold">
            <a href="#faq" class="rounded-md bg-white/10 px-4 py-2 hover:bg-white/20">FAQ</a>
            <a href="#poradniki" class="rounded-md bg-white/10 px-4 py-2 hover:bg-white/20">Poradniki</a>
            <a href="#zglos-problem" class="rounded-md bg-white/10 px-4 py-2 hover:bg-white/20">
              Zgłoś problem
            </a>
          </div>
        </div>
      </section>

      <section id="faq" class="py-20">
        <div class="mx-auto max-w-3xl px-4">
          <p class="text-center text-sm font-semibold uppercase tracking-wide text-red">FAQ</p>
          <h2 class="mt-2 text-center text-3xl font-bold text-black">Najczęściej zadawane pytania</h2>

          <div class="mt-10 space-y-3">
            <div
              v-for="(faq, index) in faqs"
              :key="faq.question"
              class="rounded-xl border border-gray-200 bg-white"
            >
              <button
                type="button"
                class="flex w-full items-center justify-between gap-4 px-6 py-4 text-left font-semibold text-black"
                @click="toggle(index)"
              >
                {{ faq.question }}
                <AppIcon
                  name="arrow-right"
                  :size="16"
                  class="flex-none text-red transition-transform"
                  :class="openIndex === index ? 'rotate-90' : ''"
                />
              </button>
              <p v-if="openIndex === index" class="px-6 pb-4 text-sm text-gray-600">
                {{ faq.answer }}
              </p>
            </div>
          </div>
        </div>
      </section>

      <section id="poradniki" class="bg-gray-100 py-20">
        <div class="mx-auto max-w-3xl px-4 text-center">
          <span
            class="mx-auto flex h-11 w-11 items-center justify-center rounded-lg bg-red/10 text-red"
          >
            <AppIcon name="file-text" :size="22" />
          </span>
          <h2 class="mt-4 text-3xl font-bold text-black">Poradniki</h2>
          <p class="mx-auto mt-4 max-w-xl text-gray-600">
            Instrukcje krok po kroku pojawią się tutaj, gdy uruchomimy dostęp do OSPortal dla
            jednostek. Masz pytanie o działanie aplikacji już teraz?
          </p>
          <a
            href="/#zgloszenie"
            class="mt-6 inline-flex items-center gap-2 rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Napisz do nas
          </a>
        </div>
      </section>

      <section id="zglos-problem" class="py-20">
        <div class="mx-auto max-w-3xl px-4 text-center">
          <span
            class="mx-auto flex h-11 w-11 items-center justify-center rounded-lg bg-red/10 text-red"
          >
            <AppIcon name="mail" :size="22" />
          </span>
          <h2 class="mt-4 text-3xl font-bold text-black">Zgłoś problem</h2>
          <p class="mx-auto mt-4 max-w-xl text-gray-600">
            Trafiłeś/aś na błąd na tej stronie albo coś działa inaczej, niż powinno? Daj nam znać —
            odpiszemy najszybciej, jak się da.
          </p>
          <a
            href="/#zgloszenie"
            class="mt-6 inline-flex items-center gap-2 rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Napisz do nas
          </a>
        </div>
      </section>
    </main>

    <AppFooter />
  </div>
</template>
