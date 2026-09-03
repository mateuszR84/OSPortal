<script setup lang="ts">
import { ref } from 'vue'
import AppIcon from '../AppIcon.vue'
import ctaBg from '../../assets/cta-bg.jpg'

const unitName = ref('')
const email = ref('')

function submit() {
  const subject = encodeURIComponent('Bezpłatny okres próbny OSPortal')
  const body = encodeURIComponent(
    `Jednostka OSP: ${unitName.value}\nE-mail: ${email.value}\n\nProszę o kontakt w sprawie bezpłatnego okresu próbnego.`,
  )
  window.location.href = `mailto:kontakt@osportal.pl?subject=${subject}&body=${body}`
}
</script>

<template>
  <section class="mx-auto max-w-6xl px-4 py-16">
    <div
      class="relative grid gap-10 overflow-hidden rounded-2xl px-8 py-12 text-white lg:grid-cols-2 lg:items-center lg:px-12"
    >
      <div
        class="absolute inset-0 -scale-x-100 bg-cover bg-center"
        :style="{ backgroundImage: `url(${ctaBg})` }"
        aria-hidden="true"
      />
      <div class="absolute inset-0 bg-red/80" aria-hidden="true" />

      <div class="relative">
        <h2 class="text-3xl font-bold">Gotowy, aby usprawnić działanie swojej jednostki?</h2>
        <p class="mt-4 max-w-md text-white/90">
          Dołącz do jednostek OSP, które porządkują swoją ewidencję z OSPortal i działają
          jeszcze skuteczniej.
        </p>
        <a
          href="#funkcje"
          class="mt-6 inline-flex items-center gap-2 rounded-md bg-gold px-6 py-3 font-semibold text-navy transition-colors hover:bg-gold-light"
        >
          <AppIcon name="play" :size="16" />
          Demo
        </a>
      </div>

      <form class="relative rounded-xl bg-white p-6 text-black" @submit.prevent="submit">
        <p class="font-bold">Wypróbuj za darmo przez 14 dni</p>
        <p class="mt-1 text-sm text-gray-600">Bez zobowiązań. Zrezygnuj w dowolnym momencie.</p>

        <div class="mt-4 space-y-3">
          <input
            v-model="unitName"
            type="text"
            required
            placeholder="Nazwa jednostki OSP"
            class="w-full rounded-md border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-red"
          />
          <input
            v-model="email"
            type="email"
            required
            placeholder="Twój email"
            class="w-full rounded-md border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-red"
          />
          <button
            type="submit"
            class="flex w-full items-center justify-center gap-2 rounded-md bg-red px-4 py-2.5 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Rozpocznij bezpłatny okres próbny
            <AppIcon name="arrow-right" :size="16" />
          </button>
        </div>

        <p class="mt-3 flex items-center gap-1.5 text-xs text-gray-600">
          <AppIcon name="check" :size="14" class="text-red" />
          Nie wymagamy karty kredytowej
        </p>
      </form>
    </div>
  </section>
</template>
