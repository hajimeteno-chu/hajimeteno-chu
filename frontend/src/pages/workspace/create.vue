<template>
  <div class="container mx-auto mt-10 flex justify-center">
    <div class="w-full">
      <div class="max-w-screen-sm mx-auto">
        <h1 class="text-2xl">新しいスペースを追加</h1>
        <div class="form-control mt-10">
          <input
            type="text"
            placeholder="Project Name"
            class="input input-bordered text-xl"
          />
        </div>
        <div class="mt-10">
          <div class="flex justify-between items-center">
            <h2>メンバー</h2>
            <div class="text-right">
              <button class="btn btn-sm">メンバーを招待</button>
            </div>
          </div>
          <div class="py-5">
            <div class="p-3 my-1 border-b border-base-200 flex items-center">
              <div class="avatar mr-3">
                <div class="rounded-full w-10 h-10">
                  <img
                    src="http://daisyui.com/tailwind-css-component-profile-1@94w.png"
                  />
                </div>
              </div>
              <div class="font-semibold">
                Seungho Lee
                <span class="text-base-200 font-normal">#10324</span>
              </div>
            </div>
          </div>
        </div>

        <button class="btn w-full mt-10">Create</button>
      </div>
    </div>
  </div>
</template>

<style>
.border-base-200 {
  --tw-border-opacity: 1;
  border-color: hsla(var(--b2) / var(--tw-border-opacity));
}
</style>
