<template>
  <div class="h-full">
    <div v-if="!$auth.loggedIn">
      <div class="hero fixed h-full bg-base-200">
        <div class="flex-col justify-center hero-content lg:flex-row">
          <div class="text-center lg:text-left">
            <h1 class="mb-5 text-5xl font-bold">チーム開発Tutorial</h1>
            <p class="mb-5">
              チーム開発が初めてですか？<br />Hajimeteno-Chuのガイドに従って開発をどんどん進めてみてください。
            </p>
          </div>
          <cardLogin />
        </div>
      </div>
    </div>
    <div v-else class="max-w-screen-lg mx-auto mt-10">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">My WorkSpaces</h1>
        <button class="btn" @click="$router.push({ name: 'workspace-create' })">
          + Add Workspace
        </button>
      </div>

      <div class="mt-10">
        <nuxt-link
          :to="{ name: 'workspace-space', params: { space: workspace.id } }"
          class="
            rounded-md
            border border-base-200
            py-4
            px-5
            flex
            justify-between
            items-center
            mt-3
          "
          v-for="workspace in workspaces"
          :key="workspace.id"
        >
          <div>
            <h1 class="text-xl font-semibold">{{ workspace.name }}</h1>
            <div class="flex items-center gap-x-3 pt-3">
              <div class="flex-shrink-0 text-sm">
                {{ workspace.member_count }}メンバー
              </div>
              <progress
                class="progress progress-secondary w-40"
                :value="workspace.progress"
                max="100"
              ></progress>
            </div>
          </div>
          <div class="flex items-center gap-x-7"></div>
        </nuxt-link>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      workspaces: [],
    }
  },
  mounted() {
    this.updateWorkspaces()
    this.$auth.$storage.watchState('loggedIn', this.updateWorkspaces)
  },
  methods: {
    updateWorkspaces() {
      this.$axios
        .get('api/workspace')
        .then((r) => {
          this.workspaces = Object.values(r.data)
        })
        .catch((e) => {
          console.log(e)
        })
    },
  },
}
</script>
