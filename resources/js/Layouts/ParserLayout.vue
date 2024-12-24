<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed } from 'vue';
import UserDropdown from '@/Components/UserDropdown.vue';

const page = usePage()
const user = computed(() => page.props.auth.user)
</script>

<template>
  <div class="min-h-[100dvh] bg-white h-full flex flex-col">
    <!-- Навигационное меню -->
    <nav class="border-b border-slate-200/70  bg-white">
      <div class="max-w-6xl mx-auto px-5 lg:px-8">
        <div class="flex justify-end h-14">
          <div class=" flex items-center">
            <UserDropdown :user="user" />
          </div>
         
        </div>
      </div>
    </nav>
    <main class="w-full px-5 lg:px-8 flex flex-col flex-grow">
      <slot />
    </main>
  </div>
</template>