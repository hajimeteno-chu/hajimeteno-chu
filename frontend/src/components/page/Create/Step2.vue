<template>
  <div class="mt-10 max-w-screen-md mx-auto">
    <modalMemberSearch
      :open="memberSearch"
      @close="memberSearch = false"
      @add="(member) => $emit('addMember', member)"
    />
    <div class="flex justify-between items-center">
      <h2>メンバー</h2>
      <div class="text-right">
        <button class="btn btn-sm" @click="memberSearch = !memberSearch">
          メンバーを招待
        </button>
      </div>
    </div>
    <div class="py-5">
      <cardMember v-for="member in members" :key="member.id" :member="member" />
    </div>
    <div class="flex items-center gap-x-5 justify-end">
      <button class="btn btn-link" @click="$parent.$emit('prev')">前へ</button>
      <button class="btn" @click="$parent.$emit('next')">次へ</button>
    </div>
  </div>
</template>

<script>
export default {
  props: ['value'],
  data() {
    return {
      members: this.value,
      memberSearch: false,
    }
  },
}
</script>
