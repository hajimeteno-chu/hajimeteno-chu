<template>
  <div class="container mx-auto mt-10">
    <ul class="w-full steps">
      <li
        class="step"
        :class="step >= i + 1 ? 'step-primary' : ''"
        v-for="(t, i) in process"
        :key="i"
      >
        {{ t }}
      </li>
    </ul>
    <div class="w-full h-full">
      <pageCreate :step="step" @next="step += 1" @prev="step -= 1" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      process: [
        'プロジェクト名を決める',
        'メンバーを追加',
        'チーム構成を設定',
        '開発環境の設定',
      ],
      step: 1,
    }
  },
}
</script>
