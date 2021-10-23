<template>
  <div>
    <div>
      <modalEditWork :todo="work" v-if="open" @close="open = false" />
    </div>
    <div
      class="min-w-50 py-2 px-4 border-l-3 border-accent"
      :class="statusColor"
      @click="open = true"
    >
      <!-- <div class="badge badge-outline badge-sm" :class="statusColor">
      {{ work.status }}
    </div> -->
      <div class="text-lg font-bold truncate">{{ work.title }}</div>
      <div class="flex items-center text-xs">
        <div>{{ work.part }}</div>
        ・
        <div>{{ work.member }}</div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      open: false,
    }
  },
  props: ['work'],
  computed: {
    statusColor() {
      return this.color(this.work.status)
    },
  },
  methods: {
    color(status) {
      if (this.work.status == 'ToDo') {
        return '!border-accent'
      } else if (this.work.status == 'Progress') {
        return '!border-primary'
      } else if (this.work.status == 'Done') {
        return '!border-secondary'
      }
    },
  },
}
</script>
