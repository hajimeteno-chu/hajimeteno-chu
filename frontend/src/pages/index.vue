<template>
  <div class="h-full">
    <div v-if="$route.query.loggedIn == 'true'">
      <div class="hero h-screen h-full bg-base-200">
        <div class="flex-col justify-center hero-content lg:flex-row">
          <div class="text-center lg:text-left">
            <h1 class="mb-5 text-5xl font-bold">チーム開発Tutorial</h1>
            <p class="mb-5">
              チーム開発が初めてですか？Hajimeteno-Chuのガイドに従って開発をどんどん進んでみてください。
            </p>
          </div>
          <cardLogin />
        </div>
      </div>
    </div>
    <div v-else class="max-w-screen-lg mx-auto mt-10">
      <div class="flex justify-between items-center">
        <h1 class="text-3xl font-bold">My WorkSpaces</h1>
        <button class="btn">+ Add Workspace</button>
      </div>

      <div class="mt-10">
        <div
          class="
            rounded-md
            border border-base-200
            py-4
            px-5
            flex
            justify-between
            items-center
          "
        >
          <div>
            <h1 class="text-xl font-semibold">@leesh/Hajimeteno-chu</h1>
            <div class="flex items-center gap-x-3 pt-3">
              <div class="flex-shrink-0 text-sm">13メンバー</div>
              <progress
                class="progress progress-secondary w-40"
                value="40"
                max="100"
              ></progress>
            </div>
          </div>
          <div class="flex items-center gap-x-7">
            <div
              class="
                flex
                items-center
                gap-x-2
                text-accent
                select-none
                cursor-pointer
              "
            >
              <i class="icon-play-button-r" />Tutorial
            </div>
            <div
              class="
                flex
                items-center
                gap-x-2
                text-error
                select-none
                cursor-pointer
              "
            >
              <i class="icon-board" />Dashboard
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {}
</script>
