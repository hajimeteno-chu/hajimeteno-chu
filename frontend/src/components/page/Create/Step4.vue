<template>
  <div class="max-w-screen-md mx-auto mt-10">
    <div>
      <h1 class="text-lg font-semibold text-white border-l-3 pl-3 border-info">
        Gitを使ってみましょう
      </h1>
      <div class="mt-5 flex flex-wrap gap-x-5">
        <img src="/logos/github.png" class="w-40" />
        <img src="/logos/gitlab.png" class="w-40" />
        <img src="/logos/bitbucket.svg" class="w-40" />
      </div>
    </div>
    <div class="mt-10">
      <h1 class="text-lg font-semibold text-white border-l-3 pl-3 border-info">
        Dockerを使ってみましょう
      </h1>
      <div class="mt-5 flex flex-wrap gap-x-5">
        <img
          src="https://www.docker.com/sites/default/files/d8/2019-07/horizontal-logo-monochromatic-white.png"
          class="w-40"
        />
      </div>
    </div>

    <div class="mt-10">
      <h1 class="text-lg font-semibold text-white border-l-3 pl-3 border-info">
        デプロイ環境
      </h1>
      <div class="mt-5 flex flex-wrap gap-x-5">
        <img
          src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/amazonwebservices/amazonwebservices-original-wordmark.svg"
          class="w-40"
        />

        <img
          src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/googlecloud/googlecloud-original-wordmark.svg"
          class="w-40"
        />
        <!-- https://www.vectorlogo.zone/logos/travis-ci/travis-ci-ar21.svg -->
        <img
          src="https://cdn.jsdelivr.net/gh/devicons/devicon/icons/oracle/oracle-original.svg"
          class="w-40"
        />
      </div>
    </div>
    <div class="flex items-center gap-x-5 justify-end mt-10">
      <button class="btn btn-link" @click="$parent.$emit('prev')">前へ</button>
      <button class="btn" @click="$parent.$emit('next')">次へ</button>
    </div>
  </div>
</template>
