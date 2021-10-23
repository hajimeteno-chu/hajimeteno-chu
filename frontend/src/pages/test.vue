<template>
  <div>
    <button class="btn" @click="getCsrf">GETCSRF</button>
    <button class="btn" @click="login">LOGIN</button>
  </div>
</template>

<script>
export default {
  methods: {
    async getCsrf() {
      let res = await this.$axios.get('/sanctum/csrf-cookie')
      console.log(res)
    },
    async login() {
      let res = await this.$axios.post('/login')
      console.log(res)
    },
  },
}
</script>
