<template>
  <div class="p-3 border-b border-base-200 flex items-center">
    <div class="font-semibold">
      {{ member.name }}
      <span class="text-base-200 font-normal">#{{ member.id }}</span>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    member: {
      default: {
        id: 0,
        name: 'Seungho Lee',
      },
    },
  },
}
</script>
