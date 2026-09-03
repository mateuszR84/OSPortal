<script setup lang="ts">
import AppIcon from '../AppIcon.vue'

defineProps<{ appUrl: string }>()

const plans = [
  {
    name: 'Start',
    price: 'Bezpłatnie',
    period: '',
    description: 'Dla mniejszych jednostek, które zaczynają porządkować swoją ewidencję.',
    cta: 'Wypróbuj za darmo',
    highlighted: false,
    features: ['Ewidencja strażaków', 'Ewidencja pojazdów i sprzętu', 'Do 30 druhów', 'Wsparcie e-mail'],
  },
  {
    name: 'Standard',
    price: '49 zł',
    period: '/ mies.',
    description: 'Pełna funkcjonalność dla jednostek aktywnie działających i szkolących się.',
    cta: 'Wypróbuj za darmo',
    highlighted: true,
    features: [
      'Wszystko z planu Start',
      'Zdarzenia i akcje ratownicze',
      'Automatyczne przypomnienia o terminach',
      'Raporty i zestawienia',
      'Bez limitu druhów',
    ],
  },
  {
    name: 'Gmina',
    price: 'Wycena indywidualna',
    period: '',
    description: 'Dla gmin zarządzających wieloma jednostkami OSP na swoim terenie.',
    cta: 'Skontaktuj się z nami',
    highlighted: false,
    features: [
      'Wszystko z planu Standard',
      'Wiele jednostek w jednym miejscu',
      'Zbiorcze raporty dla gminy',
      'Opiekun wdrożenia',
    ],
  },
] as const
</script>

<template>
  <section id="cennik" class="bg-gray-100 py-20">
    <div class="mx-auto max-w-6xl px-4">
      <p class="text-center text-sm font-semibold uppercase tracking-wide text-red">Cennik</p>
      <h2 class="mt-2 text-center text-3xl font-bold text-black">Wybierz plan dla swojej jednostki</h2>
      <p class="mx-auto mt-4 max-w-xl text-center text-gray-600">
        Bez ukrytych kosztów i bez zobowiązań. W każdej chwili możesz zmienić plan lub
        zrezygnować.
      </p>

      <div class="mt-12 grid gap-6 lg:grid-cols-3 lg:items-start">
        <article
          v-for="plan in plans"
          :key="plan.name"
          class="rounded-xl border bg-white p-8"
          :class="plan.highlighted ? 'border-red shadow-lg lg:-translate-y-3' : 'border-gray-200'"
        >
          <p v-if="plan.highlighted" class="mb-3 inline-block rounded-full bg-red px-3 py-1 text-xs font-semibold text-white">
            Najpopularniejszy
          </p>
          <h3 class="text-lg font-bold text-black">{{ plan.name }}</h3>
          <p class="mt-3 flex items-baseline gap-1">
            <span class="text-3xl font-extrabold text-black">{{ plan.price }}</span>
            <span v-if="plan.period" class="text-sm text-gray-400">{{ plan.period }}</span>
          </p>
          <p class="mt-3 text-sm text-gray-600">{{ plan.description }}</p>

          <ul class="mt-6 space-y-3">
            <li v-for="feature in plan.features" :key="feature" class="flex items-start gap-2 text-sm text-gray-800">
              <AppIcon name="check" :size="16" class="mt-0.5 flex-none text-red" />
              {{ feature }}
            </li>
          </ul>

          <a
            :href="appUrl"
            class="mt-8 block rounded-md px-6 py-3 text-center font-semibold transition-colors"
            :class="
              plan.highlighted
                ? 'bg-red text-white hover:bg-red-dark'
                : 'bg-navy text-white hover:bg-navy-light'
            "
          >
            {{ plan.cta }}
          </a>
        </article>
      </div>
    </div>
  </section>
</template>
