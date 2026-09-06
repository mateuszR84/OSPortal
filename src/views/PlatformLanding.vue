<script setup lang="ts">
import { onMounted } from 'vue'
import AppFooter from '../components/AppFooter.vue'
import NavBar from '../components/NavBar.vue'
import HeroSection from '../components/landing/HeroSection.vue'
import FeaturesSection from '../components/landing/FeaturesSection.vue'
import ShowcaseSection from '../components/landing/ShowcaseSection.vue'
import BenefitsSection from '../components/landing/BenefitsSection.vue'
import PricingSection from '../components/landing/PricingSection.vue'
import CtaSection from '../components/landing/CtaSection.vue'
import NewsletterSection from '../components/landing/NewsletterSection.vue'

onMounted(() => {
  if (window.location.hash) {
    document.querySelector(window.location.hash)?.scrollIntoView()
  }
})
</script>

<template>
  <div class="flex min-h-screen flex-col">
    <NavBar />

    <main class="flex-1">
      <HeroSection />
      <FeaturesSection />
      <CtaSection />
      <ShowcaseSection />
      <BenefitsSection />
      <PricingSection />
      <NewsletterSection />
    </main>

    <AppFooter />
  </div>
</template>
