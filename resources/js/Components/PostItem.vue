<script setup>
import { defineProps } from 'vue'

const props = defineProps(['post'])
</script>

<template>
  <a :href="props.post.link">
    <div class="px-6 py-3 flex items-center gap-3">
      <div class="flex-grow space-y-2">
        <h4 class="font-semibold text-sm text-slate-700 leading-5">{{ post.title }}</h4>
        <p class="text-slate-500">{{ post.descr }}</p>
      </div>
      <div class="flex-none">
        <button class="inline-flex items-center justify-center whitespace-nowrap rounded-lg bg-slate-100 border-0 h-9 w-9">
          <svg xmlns="http://www.w3.org/2000/svg" width="21" height="21" viewBox="0 0 21 21">
            <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" d="m9.5 14.5l4-4l-4-4" />
          </svg>
        </button>
      </div>
    </div>
  </a>
</template>