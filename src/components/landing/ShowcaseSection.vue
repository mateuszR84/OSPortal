<script setup lang="ts">
import AppIcon from '../AppIcon.vue'
import devices from '../../assets/devices.png'

defineProps<{ appUrl: string }>()

const points = [
  'Responsywny interfejs — komputer, tablet i telefon',
  'Przejrzysty pulpit z najważniejszymi informacjami',
  'Automatyczne przypomnienia o terminach',
  'Bezpieczne dane, dostęp tylko dla Twojej jednostki',
] as const
</script>

<template>
  <section class="relative overflow-hidden bg-gray-100 py-20 lg:py-28">
    <div
      class="pointer-events-none absolute inset-y-0 left-0 hidden items-center lg:flex lg:w-[50%] xl:w-[52%]"
      aria-hidden="true"
    >
      <img :src="devices" alt="" class="w-full" />
    </div>

    <div class="relative mx-auto max-w-6xl px-4">
      <div class="relative z-10 lg:ml-auto lg:max-w-md">
        <p class="text-sm font-semibold uppercase tracking-wide text-red">Dostępna wszędzie</p>
        <h2 class="mt-2 text-3xl font-bold text-black">Aplikacja, która działa tam, gdzie Ty</h2>
        <p class="mt-4 max-w-md text-gray-600">
          Korzystaj z OSPortal na komputerze, tablecie i smartfonie. Wszystkie dane zawsze pod
          ręką — w remizie, w akcji i w terenie.
        </p>

        <ul class="mt-6 space-y-3">
          <li v-for="point in points" :key="point" class="flex items-center gap-3 text-gray-800">
            <AppIcon name="check-circle" :size="18" class="flex-none text-red" />
            {{ point }}
          </li>
        </ul>

        <div class="mt-8 flex flex-wrap items-center gap-4">
          <a
            :href="appUrl"
            class="inline-block rounded-md bg-red px-6 py-3 font-semibold text-white transition-colors hover:bg-red-dark"
          >
            Wypróbuj za darmo
          </a>
          <a
            href="#funkcje"
            class="inline-flex items-center gap-2 rounded-md bg-gold px-6 py-3 font-semibold text-navy transition-colors hover:bg-gold-light"
          >
            <AppIcon name="play" :size="16" />
            Demo
          </a>
        </div>
      </div>

      <div class="relative z-10 mt-10 lg:hidden">
        <img :src="devices" alt="OSPortal na laptopie i telefonie" class="w-full" />
      </div>
    </div>
  </section>
</template>
