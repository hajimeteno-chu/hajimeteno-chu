<template>
  <div class="mod" :class="open ? 'open' : ''">
    <div class="mod-body w-120">
      <div class="w-full">
        <p class="font-bold text-lg mb-5">Work追加</p>
        <div class="form-control">
          <label class="label">
            <span class="label-text">work title</span>
          </label>
          <input
            v-model="wname"
            type="text"
            placeholder="work title"
            class="input input-bordered"
          />
        </div>

        <div class="form-control">
          <label class="label">
            <span class="label-text">description</span>
          </label>
          <textarea
            v-model="desc"
            class="textarea h-24 textarea-bordered"
            placeholder="description"
          ></textarea>
        </div>

        <div>
          <label class="label">
            <span class="label-text">Team</span>
          </label>
          <select
            v-model="part"
            class="select select-bordered select-sm w-full"
          >
            <option selected="selected">frontend</option>
            <option>backend</option>
          </select>
        </div>
      </div>
      <div class="mt-5 flex justify-end gap-x-5">
        <button class="btn" @click="$emit('close')">Cancel</button>
        <button class="btn" @click="$emit('add', wname, desc, part, 'Suumokr')">
          Add
        </button>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ['open'],
  data() {
    return {
      wname: '',
      desc: '',
      part: 'frontend',
    }
  },
  watch: {
    open() {
      this.wname = ''
      this.desc = ''
    },
  },
}
</script>

<style>
select > option {
  @apply w-full;
}
</style>
