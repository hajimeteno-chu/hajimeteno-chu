<template>
  <div>
    <modalAddWork :open="open" @close="open = false" @add="addWork" />
    <div class="mt-5">
      <div class="text-lg font-bold">私の達成率 (30%)</div>
      <progress class="progress progress-primary" value="30" max="100" />
    </div>
    <div class="flex justify-end">
      <button class="btn btn-link" @click="open = true">+ Add Work</button>
    </div>
    <div class="grid grid-cols-3 gap-x-3">
      <div v-for="group in Object.keys(example)" :key="group">
        <div>
          <h1 class="font-semibold text-lg">{{ group }}</h1>
        </div>
        <draggable
          :list="example[group]"
          group="TODOS"
          @change="changed($event.added, group)"
          class="min-h-full pt-5"
          :sort="false"
        >
          <CardTodo
            v-for="work in example[group]"
            :work="work"
            :key="work.title"
            class="mt-2"
          />
        </draggable>
      </div>
    </div>
  </div>
</template>

<script>
const example = {
  ToDo: [
    {
      status: 'ToDo',
      title: 'backendの作成',
      description: '',
      part: 'BACKEND',
      member: 'Suumokr',
    },
    {
      status: 'ToDo',
      title: 'frontendの作成',
      description: '',
      part: 'BACKEND',
      member: 'Suumokr',
    },
  ],
  Progress: [],
  Done: [],
}
export default {
  data() {
    return {
      open: false,
      example,
    }
  },
  methods: {
    changed(evt, group) {
      if (evt) {
        evt.element.status = group
      }
    },
    close() {
      console.log('CL')
      this.open = false
    },
    addWork(wname, desc, part, member) {
      console.log(wname, desc, part, member)
      this.example.ToDo.push({
        status: 'Todo',
        title: wname,
        description: desc,
        part: part,
        member: member,
      })
      this.open = false
    },
  },
}
</script>
