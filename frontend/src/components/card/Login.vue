<template>
  <div class="card flex-shrink-0 w-full max-w-sm shadow-2xl bg-base-100">
    <div class="card-body">
      <div class="form-control">
        <label class="label">
          <span class="label-text">Username</span>
        </label>
        <input
          v-model="name"
          type="text"
          placeholder="username"
          class="input input-bordered bg-base-200"
        />
      </div>
      <div class="form-control">
        <label class="label">
          <span class="label-text">Password</span>
        </label>
        <input
          v-model="password"
          type="password"
          placeholder="password"
          class="input input-bordered bg-base-200"
        />
        <label class="label">
          <div>
            <span class="label-text-alt">初めての方ですか？</span
            ><a href="#" class="label-text-alt text-info">会員登録</a>
          </div>
        </label>
      </div>
      <div class="form-control mt-6">
        <input
          type="button"
          value="Login"
          class="btn btn-primary"
          @click="login"
        />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      name: '',
      password: '',
    }
  },
  methods: {
    login() {
      this.$auth
        .loginWith('local', {
          data: { name: this.name, password: this.password },
        })
        .then((r) => {
          console.log(r)
        })
        .catch((e) => {
          console.log(e)
        })
    },
  },
}
</script>
