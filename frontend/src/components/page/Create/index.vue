<template>
  <div>
    <pageCreateStep1 v-if="step == 1" />
    <pageCreateStep2 v-if="step == 2" />
    <pageCreateStep3 v-if="step == 3" />
    <pageCreateStep4 v-if="step == 4" />
    <pageCreateStep5 v-if="step == 5" />
  </div>
</template>

<script>
export default {
  props: ['step'],
}
</script>
