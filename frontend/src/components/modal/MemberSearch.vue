<template>
  <div class="mod" :class="open ? 'open' : ''">
    <div class="mod-body w-120">
      <div class="w-full">
        <p class="font-bold text-lg mb-5">メンバー検索</p>
        <div class="flex items-center gap-x-5">
          <input
            v-model="member"
            type="text"
            placeholder="userID"
            class="input input-bordered w-full"
          />
          <button class="btn" @click="addMember(member)">検索</button>
        </div>
        <p v-if="fail" class="text-red-500 text-center py-3">User Not Found</p>
        <div v-if="user">
          <CardMember :member="user" />
        </div>
        <div class="flex items-center justify-end mt-5">
          <button class="btn btn-link" @click="close">cancel</button>
          <button
            class="btn btn-link"
            v-show="user"
            @click="
              $emit('add', user)
              member = null
              $emit('close')
            "
          >
            Add
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import apis from '~/mixins/apis'
export default {
  props: ['open'],
  mixins: [apis],
  data() {
    return {
      member: null,
      user: null,
      fail: false,
    }
  },
  methods: {
    close() {
      this.$emit('close')
    },
    async addMember() {
      let user = await this.searchUser(this.member)
      if (!user) {
        this.fail = true
        this.user = null
        return
      } else {
        this.fail = false
        this.user = user.data.user
      }
    },
  },
}
</script>

<style scoped>
.mod {
  @apply top-0
      left-0
      h-full
      z-999
      fixed
      flex
      items-center
      justify-center
      bg-base-300 bg-opacity-40
      invisible

      w-full;
}

.mod-body {
  @apply bg-base-100 rounded-lg p-10 shadow-lg z-1000;
}

.open {
  @apply !visible;
}
</style>
