<template>
  <div class="max-w-screen-md mx-auto mt-10">
    <h1 class="text-lg font-semibold text-white border-b-3 border-info">
      Gitを使ってみましょう
    </h1>
    <div class="mt-5 flex flex-wrap gap-x-5">
      <img src="/logos/github.png" class="w-40 h-17" />
      <img src="/logos/gitlab.png" class="w-40 h-17" />
      <img src="/logos/bitbucket.svg" class="w-40 h-17" />
    </div>

    <div class="flex items-center gap-x-5 justify-end mt-10">
      <button class="btn btn-link" @click="$parent.$emit('prev')">前へ</button>
      <button class="btn" @click="$parent.$emit('next')">次へ</button>
    </div>
  </div>
</template>
