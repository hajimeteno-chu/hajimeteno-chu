<template>
  <div>
    <pageCreateStep1 v-model="data.name" v-if="step == 1" />
    <pageCreateStep2
      v-model="data.members"
      @addMember="
        (member) => {
          data.members.push({ id: member.id, name: member.name })
          data.partMembers.push({ id: member.id, name: member.name })
        }
      "
      v-if="step == 2"
    />
    <pageCreateStep3
      v-model="data.parts"
      :members="data.partMembers"
      v-if="step == 3"
    />
    <pageCreateStep4 v-if="step == 4" />
    <div v-if="step > 4">
      <div class="hero mt-20">
        <div class="text-center hero-content">
          <div class="max-w-md">
            <h1 class="mb-5 text-5xl font-bold">おめでとう！</h1>
            <p class="mb-5">
              workspaceの設定が終わりました！これからは下のボタンをクリックしてチーム員の進捗状況を確認しながら楽しくチーム開発を始められます！
            </p>
            <div>
              <div class="btn btn-primary" @click="addWorkspace">
                Get Started
              </div>
              <br />
              <div class="btn btn-link" @click="$emit('prev')">前へ</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import apis from '~/mixins/apis'
export default {
  mixins: [apis],
  props: ['step'],
  data() {
    return {
      data: {
        name: null,
        members: [],
        partMembers: [],
        parts: [
          {
            name: 'frontend',
            members: [],
          },
          {
            name: 'backend',
            members: [],
          },
        ],
      },
    }
  },
  methods: {
    async addWorkspace() {
      let ogData = this.data
      let data = {
        name: ogData.name,
        members: ogData.members.map((e) => {
          return e.id
        }),
        parts: ogData.parts.map((e) => {
          return {
            name: e.name,
            members: e.members.map((e) => {
              return e.id
            }),
          }
        }),
      }
      let res = await this.createWorkspace(data)

      if (res) {
        let id = res.data.workspace_id
        this.$router.push({ name: 'workspace-space', params: { space: id } })
        return true
      } else {
        alert('add workspace is failed')
      }
    },
  },
}
</script>
