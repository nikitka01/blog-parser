<script setup>
import { defineProps } from 'vue'
import PostItem from './PostItem.vue'

const props = defineProps(['posts'])
</script>

<template>
  <div class="w-full rounded-2xl p-0 bg-transparent border border-slate-200 text-sm flex flex-col divide-y divide-slate-200">
    <PostItem v-for="post in props.posts" :key="post.id" :post="post" />
  </div>
</template>