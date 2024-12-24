<script setup>
import { useForm } from '@inertiajs/vue3'
import { defineProps } from 'vue'

const props = defineProps({
  errors: Object,
  task: Object
})

const searchForm = useForm({
  query: ''
})
</script>

<template>
  <form @submit.prevent="searchForm.post('/parse')">
    <div class="rounded-2xl px-3 py-3 w-full shadow bg-gradient-to-tr from-sky-200/80 from-10% to-90% to-emerald-200/80 flex gap-2">
      <input 
        type="text" 
        v-model="searchForm.query" 
        :disabled="searchForm.processing || task?.status === 'processing'"
        class="flex-grow rounded-lg bg-white border-0 h-9 text-sm text-slate-700 placeholder:text-slate-500 focus:outline-none  disabled:opacity-30" 
        :class="[props.errors.hasOwnProperty('query') ? 'ring ring-red-200 focus:ring focus:ring-red-200' : 'focus:ring focus:ring-sky-300/80']"
        placeholder="Введите слово для поиска"
      >
      <button 
        class="inline-flex flex-none h-9 items-center justify-center whitespace-nowrap py-2 px-4 rounded-lg bg-white/40 font-bold text-emerald-800 text-sm hover:bg-white/50 active:ring active:ring-sky-300/80 disabled:pointer-events-none disabled:opacity-50"
        :disabled="searchForm.processing || task?.status === 'processing'"
      >
        Поиск
      </button>
    </div>
    <p v-if="props.errors.query" class="text-red-500 text-sm">{{ props.errors.query }}</p>
  </form>
</template>