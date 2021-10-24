<template>
  <div class="max-w-screen-lg mx-auto mt-10">
    <div class="flex gap-x-5">
      <modalAddGroup :open="open" @close="open = false" @add="addGroup" />
      <div class="w-300px">
        <h2 class="text-lg">メンバー</h2>
        <draggable
          :list="groupMembers"
          group="MEMBERS"
          @change="log"
          class="max-h-500px overflow-y-auto min-h-10"
        >
          <CardMember
            v-for="i in groupMembers"
            :key="i.id"
            class="bg-base-100 cursor-pointer select-none"
            :member="i"
          />
        </draggable>
      </div>
      <div class="w-[calc(100%-300px)]">
        <div class="flex justify-between items-center">
          <div class="w-full text-xl font-semibold">チーム構成</div>
          <button class="btn" @click="open = true">+Add</button>
        </div>
        <div class="grid grid-cols-2 gap-x-3 gap-y-2">
          <div v-for="group in groups" :key="group.name">
            <div class="border-b-3 border-info">
              <h1 class="font-semibold text-lg">{{ group.name }}</h1>
            </div>
            <draggable :list="group.members" group="MEMBERS" class="min-h-20">
              <CardMember
                v-for="(member, i) in group.members"
                :key="i"
                class="bg-base-100 cursor-pointer select-none"
                :member="member"
              />
            </draggable>
          </div>
        </div>
      </div>
    </div>
    <div class="flex items-center gap-x-5 justify-end mt-10">
      <button class="btn btn-link" @click="$parent.$emit('prev')">前へ</button>
      <button class="btn" @click="$parent.$emit('next')">次へ</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value', 'members'],
  computed: {
    dragOptions() {
      return {
        animation: 0,
        group: 'description',
        disabled: false,
        ghostClass: 'ghost',
      }
    },
    groupKeys() {
      return Object.keys(this.groups)
    },
  },
  data() {
    return {
      groupMembers: this.members,
      open: false,
      ex1: [
        { name: 'leesh0', id: 0 },
        { name: 'leesh1', id: 1 },
        { name: 'leesh2', id: 2 },
        { name: 'leesh3', id: 3 },
        { name: 'leesh4', id: 4 },
      ],
      ex2: [{ name: 'leesh4', id: 5 }],
      groups: this.value,
    }
  },
  methods: {
    log() {
      console.log(this.ex2)
    },
    addGroup(name) {
      this.groups.push({ name, members: [] })
      this.open = false
    },
  },
}
</script>
