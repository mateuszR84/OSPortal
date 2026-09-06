<script setup lang="ts">
import { ref } from 'vue'
import AppIcon from '../AppIcon.vue'
import ctaBg from '../../assets/cta-bg.jpg'

const unitName = ref('')
const email = ref('')
const website = ref('') // honeypot, musi zostać puste
const status = ref<'idle' | 'sending' | 'success' | 'error'>('idle')

async function submit() {
  status.value = 'sending'
  try {
    const response = await fetch('/form.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({
        type: 'contact',
        unitName: unitName.value,
        email: email.value,
        website: website.value,
      }),
    })
    const data = await response.json()
    status.value = data.success ? 'success' : 'error'
  } catch {
    status.value = 'error'
  }
}
</script>

<template>
  <section id="zgloszenie" class="bg-gray-100 py-16">
    <div class="mx-auto max-w-6xl px-4">
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
          <p class="font-bold">Napisz do nas o swojej jednostce</p>
          <p class="mt-1 text-sm text-gray-600">Odpowiemy i podpowiemy, kiedy dostęp będzie możliwy.</p>

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
            <input
              v-model="website"
              type="text"
              tabindex="-1"
              autocomplete="off"
              class="absolute left-[-9999px] h-0 w-0 opacity-0"
              aria-hidden="true"
            />
            <button
              type="submit"
              :disabled="status === 'sending'"
              class="flex w-full items-center justify-center gap-2 rounded-md bg-red px-4 py-2.5 font-semibold text-white transition-colors hover:bg-red-dark disabled:opacity-60"
            >
              {{ status === 'sending' ? 'Wysyłanie…' : 'Wyślij wiadomość' }}
              <AppIcon v-if="status !== 'sending'" name="arrow-right" :size="16" />
            </button>
          </div>

          <p v-if="status === 'success'" class="mt-3 text-sm font-semibold text-red">
            Dziękujemy! Odezwiemy się wkrótce.
          </p>
          <p v-else-if="status === 'error'" class="mt-3 text-sm font-semibold text-red">
            Coś poszło nie tak. Spróbuj ponownie lub napisz na kontakt@osportal.pl.
          </p>
          <p v-else class="mt-3 flex items-center gap-1.5 text-xs text-gray-600">
            <AppIcon name="check" :size="14" class="text-red" />
            Bez zobowiązań — to tylko wiadomość do nas
          </p>
        </form>
      </div>
    </div>
  </section>
</template>
