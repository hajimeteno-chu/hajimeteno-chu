<template>
  <div class="flex h-full">
    <div
      class="
        fixed
        h-full
        w-400px
        bg-base-200
        px-5
        py-10
        border-t border-base-300
      "
    >
      <!-- <div>
        <h3 class="font-semibold">backend</h3>
        <div class="flex items-center gap-x-5 py-2">
          <progress class="progress progress-primary" value="40" max="100" />
          <span>40%</span>
        </div>
      </div> -->
      <div class="mt-5" v-for="part in partWithMembers" :key="part.name">
        <h1 class="font-semibold text-lg pb-2 border-b-3 border-info">
          {{ part.name }}
        </h1>
        <div>
          <CardMember
            v-for="member in part.members"
            :key="member.user.id"
            :member="member.user"
          />
        </div>
      </div>
    </div>
    <div class="w-[calc(100%-400px)] ml-400px">
      <nuxt-child class="px-5" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      workspace: null,
    }
  },
  computed: {
    partWithMembers() {
      let parts = []
      if (this.workspace) {
        console.log('ws=>', this.workspace)
        let members = Object.values(this.workspace.member)
        parts = new Set(
          members.map((e) => {
            return e.name
          })
        )
        let partMembers = []
        for (let part of parts) {
          partMembers.push({
            name: part,
            members: members.filter((e) => {
              return e.name == part
            }),
          })
        }
        return partMembers
      }
      return parts
    },
  },
  mounted() {
    let id = this.$route.params.space
    this.$axios
      .get(`/api/workspace/${id}`)
      .then((r) => {
        console.log(r.data)
        this.workspace = r.data
      })
      .catch((e) => {
        console.log(e)
      })
  },
  layout: 'dashboard',
}
</script>
