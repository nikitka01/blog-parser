<script setup>
import { Head } from '@inertiajs/vue3'
import ParserLayout from '@/Layouts/ParserLayout.vue'
import { usePoll } from '@inertiajs/vue3'
import SearchForm from '@/Components/SearchForm.vue'
import PostList from '@/Components/PostList.vue'

const props = defineProps({
  errors: Object,
  task: Object,
  posts: Array
})
const poll = usePoll(2000)

</script>

<template>
  <Head title="Blog parser" />

  <ParserLayout>
    <div class="w-full h-28 pb-8 flex items-end">
      <div class="mx-auto w-fit">
        <h1 class="text-3xl font-black text-slate-700">Blog parser</h1>
      </div>
    </div>
    <div class="max-w-[580px] w-full space-y-5 mx-auto pb-8">
      <SearchForm :errors="props.errors" :task="props.task" />
      <div v-if="props.task?.status === 'processing'" class="space-y-2">
        <p class="font-semibold text-slate-700">Выполняется парсинг:</p>
        <div class="relative w-full rounded-md bg-slate-200/60 h-4 overflow-hidden">
          <div 
            class="abdolute top-0 left-0 bg-emerald-400 rounded-md h-full transition-all duration-300" 
            :style="{ width: Math.round(props.task.processed_pages / props.task.page_count * 100) + '%' }"
          >
          </div>
        </div>
      </div> 
      <div v-if="posts?.length > 0" class="space-y-2 text-slate-700">
        <h3 class="font-semibold text-lg">Результаты парсинга</h3>
        <PostList :posts="posts" />
      </div>
    </div>
  </ParserLayout>
</template>