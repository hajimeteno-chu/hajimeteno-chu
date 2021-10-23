<template>
  <div class="max-w-screen-sm mx-auto mt-20">
    <h1 class="text-2xl">プロジェクト名を設定</h1>
    <div class="form-control mt-10">
      <input
        type="text"
        placeholder="Project Name"
        class="input input-bordered text-xl"
      />
    </div>

    <button class="btn w-full mt-10" @click="$parent.$emit('next')">
      次へ
    </button>
  </div>
</template>
