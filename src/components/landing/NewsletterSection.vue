<script setup lang="ts">
import { ref } from 'vue'
import AppIcon from '../AppIcon.vue'

const email = ref('')

function submit() {
  const subject = encodeURIComponent('Zapis do newslettera OSPortal')
  const body = encodeURIComponent(`E-mail: ${email.value}`)
  window.location.href = `mailto:kontakt@osportal.pl?subject=${subject}&body=${body}`
}
</script>

<template>
  <section class="border-t border-gray-200 py-12">
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

      <form class="flex w-full max-w-md gap-2" @submit.prevent="submit">
        <input
          v-model="email"
          type="email"
          required
          placeholder="Twój email"
          class="w-full rounded-md border border-gray-200 px-4 py-2.5 text-sm outline-none focus:border-red"
        />
        <button
          type="submit"
          class="flex-none rounded-md bg-navy px-5 py-2.5 text-sm font-semibold text-white transition-colors hover:bg-navy-light"
        >
          Zapisz mnie
        </button>
      </form>
    </div>
  </section>
</template>
