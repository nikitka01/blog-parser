<script setup>
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';

const props = defineProps({
  user: Object
})
</script>

<template>
  <div class="flex items-center relative ms-3">
    <Dropdown align="right">
      <template #trigger>
        <button 
          type="button"
          class="inline-flex items-center px-3 py-2 bg-white text-sm font-bold leading-4 text-slate-600 transition duration-200 ease-in-out hover:text-slate-800 focus:outline-none"
        >
          {{ user.name }}
          <svg
            class="-me-0.5 ms-2 h-4 w-4"
            xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20"
            fill="currentColor"
          >
            <path
              fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"
            />
          </svg>
        </button>
      </template>
      <template #content>
        <DropdownLink
            :href="route('profile.edit')"
        >
          Profile
        </DropdownLink>
        <DropdownLink
          :href="route('logout')"
          method="post"
          as="button"
        >
          Log Out
        </DropdownLink>
      </template>
    </Dropdown>
  </div>
</template>