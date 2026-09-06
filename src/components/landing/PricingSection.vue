<script setup lang="ts">
import { computed, ref } from 'vue'
import AppIcon from '../AppIcon.vue'

const MONTHLY_PRICE = 39
const YEARLY_PRICE = 299
const YEARLY_SAVINGS = MONTHLY_PRICE * 12 - YEARLY_PRICE
const YEARLY_SAVINGS_PERCENT = Math.round((YEARLY_SAVINGS / (MONTHLY_PRICE * 12)) * 100)
const YEARLY_MONTHLY_EQUIVALENT = (YEARLY_PRICE / 12).toFixed(2).replace('.', ',')

const features = [
  'Ewidencja strażaków',
  'Ewidencja pojazdów i sprzętu',
  'Zdarzenia i akcje ratownicze',
  'Automatyczne przypomnienia o terminach',
  'Raporty i zestawienia',
  'Bez limitu druhów',
  'Wsparcie e-mail',
] as const

const billing = ref<'monthly' | 'yearly'>('yearly')

const price = computed(() => (billing.value === 'yearly' ? `${YEARLY_PRICE} zł` : `${MONTHLY_PRICE} zł`))
const period = computed(() => (billing.value === 'yearly' ? '/ rok' : '/ mies.'))
</script>

<template>
  <section id="cennik" class="py-20">
    <div class="mx-auto max-w-3xl px-4">
      <p class="text-center text-sm font-semibold uppercase tracking-wide text-red">Cennik</p>
      <h2 class="mt-2 text-center text-3xl font-bold text-black">Jedna, przejrzysta cena</h2>
      <p class="mx-auto mt-4 max-w-xl text-center text-gray-600">
        Bez ukrytych kosztów i bez zobowiązań. W każdej chwili możesz zmienić okres rozliczeniowy
        lub zrezygnować.
      </p>

      <div class="mt-8 flex justify-center">
        <div class="inline-flex rounded-md border border-gray-200 bg-white p-1">
          <button
            type="button"
            class="rounded px-4 py-2 text-sm font-semibold transition-colors"
            :class="billing === 'monthly' ? 'bg-navy text-white' : 'text-gray-600 hover:text-black'"
            @click="billing = 'monthly'"
          >
            Miesięcznie
          </button>
          <button
            type="button"
            class="flex items-center gap-2 rounded px-4 py-2 text-sm font-semibold transition-colors"
            :class="billing === 'yearly' ? 'bg-navy text-white' : 'text-gray-600 hover:text-black'"
            @click="billing = 'yearly'"
          >
            Rocznie
            <span
              class="rounded-full bg-gold px-2 py-0.5 text-xs font-bold text-navy"
              :class="billing === 'yearly' ? '' : 'opacity-80'"
            >
              -{{ YEARLY_SAVINGS_PERCENT }}%
            </span>
          </button>
        </div>
      </div>

      <article class="mt-8 rounded-xl border border-red bg-white p-8 shadow-lg lg:p-10">
        <h3 class="text-lg font-bold text-black">Standard</h3>
        <p class="mt-3 flex items-baseline gap-1">
          <span class="text-4xl font-extrabold text-black">{{ price }}</span>
          <span class="text-sm text-gray-400">{{ period }}</span>
        </p>
        <p v-if="billing === 'yearly'" class="mt-1 text-sm text-gray-600">
          To {{ YEARLY_MONTHLY_EQUIVALENT }} zł / mies. — oszczędzasz {{ YEARLY_SAVINGS }} zł rocznie
          względem rozliczenia miesięcznego.
        </p>
        <p class="mt-3 text-sm text-gray-600">Pełna funkcjonalność dla jednostki OSP każdej wielkości.</p>

        <ul class="mt-6 grid gap-3 sm:grid-cols-2">
          <li v-for="feature in features" :key="feature" class="flex items-start gap-2 text-sm text-gray-800">
            <AppIcon name="check" :size="16" class="mt-0.5 flex-none text-red" />
            {{ feature }}
          </li>
        </ul>

        <a
          href="#zgloszenie"
          class="mt-8 block rounded-md bg-red px-6 py-3 text-center font-semibold text-white transition-colors hover:bg-red-dark"
        >
          Wyślij wiadomość
        </a>
      </article>
    </div>
  </section>
</template>
