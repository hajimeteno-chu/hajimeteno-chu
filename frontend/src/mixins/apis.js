export default {
  methods: {
    async searchUser(username) {
      try {
        let user = await this.$axios.get('/api/user', {
          params: { q: username },
        })
        return user
      } catch (e) {
        return false
      }
    },
    async createWorkspace(data) {
      try {
        let workspace = await this.$axios.post('/api/workspace', { ...data })
        return workspace
      } catch (e) {
        return false
      }
    },
  },
}
