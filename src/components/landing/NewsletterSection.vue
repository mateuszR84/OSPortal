<script setup lang="ts">
import { ref } from 'vue'
import AppIcon from '../AppIcon.vue'

const email = ref('')
const website = ref('') // honeypot, musi zostać puste
const status = ref<'idle' | 'sending' | 'success' | 'error'>('idle')

async function submit() {
  status.value = 'sending'
  try {
    const response = await fetch('/form.php', {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify({ type: 'newsletter', email: email.value, website: website.value }),
    })
    const data = await response.json()
    status.value = data.success ? 'success' : 'error'
  } catch {
    status.value = 'error'
  }
}
</script>

<template>
  <section class="bg-gray-100 py-12">
    <div class="mx-auto flex max-w-6xl flex-col gap-6 px-4 sm:flex-row sm:items-center sm:justify-between">
      <div class="flex items-start gap-4">
        <span class="flex h-11 w-11 flex-none items-center justify-center rounded-lg bg-red/10 text-red">
          <AppIcon name="mail" :size="20" />
        </span>
        <div>
          <p class="font-bold text-black">Bądź na bieżąco</p>
          <p class="mt-1 max-w-sm text-sm text-gray-600">
            Zapisz się do newslettera i otrzymuj informacje o nowych funkcjonalnościach OSPortal.
          </p>
        </div>
      </div>

      <div class="flex w-full max-w-md flex-col gap-1.5">
        <form class="flex gap-2" @submit.prevent="submit">
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
            class="flex-none rounded-md bg-navy px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-navy-light disabled:opacity-60"
          >
            {{ status === 'sending' ? 'Wysyłanie…' : 'Zapisz mnie' }}
          </button>
        </form>
        <p v-if="status === 'success'" class="text-xs font-semibold text-navy">Zapisano! Dziękujemy.</p>
        <p v-else-if="status === 'error'" class="text-xs font-semibold text-red">
          Coś poszło nie tak, spróbuj ponownie.
        </p>
      </div>
    </div>
  </section>
</template>
