<template>
  <div>
    <modalAddWork :open="open" @close="open = false" @add="addWork" />
    <div class="mt-5">
      <div class="text-lg font-bold">達成率 ({{ toGoal }}%)</div>
      <progress class="progress progress-primary" :value="toGoal" max="100" />
    </div>
    <div class="flex justify-end">
      <button class="btn btn-link" @click="open = true">+ Add Work</button>
    </div>
    <div class="grid grid-cols-3 gap-x-3">
      <div v-for="group in Object.keys(todoGroups)" :key="group">
        <div>
          <h1 class="font-semibold text-lg">{{ group }}</h1>
        </div>
        <draggable
          :list="todoGroups[group]"
          group="TODOS"
          @change="changed($event.added, group)"
          class="min-h-full pt-5"
          :sort="false"
        >
          <CardTodo
            v-for="work in todoGroups[group]"
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
  mounted() {
    const id = this.$route.params.space
    this.$axios
      .get(`api/workspace/${id}/todo`)
      .then((r) => {
        this.todos = r.data.todoList
        this.partition(this.todos)
      })
      .catch((e) => {
        console.log(e)
      })
  },
  computed: {
    toGoal() {
      let doneLen = this.todoGroups.Done.length
      let yetLen =
        this.todoGroups.ToDo.length + this.todoGroups.Progress.length + doneLen
      return doneLen == 0 ? 0 : parseInt((doneLen / yetLen) * 100)
    },
  },
  data() {
    return {
      open: false,
      example,
      todoGroups: {
        ToDo: [],
        Progress: [],
        Done: [],
      },
    }
  },
  methods: {
    partition(works) {
      this.todoGroups.ToDo = works.filter((e) => {
        return e.status == 1
      })
      this.todoGroups.Progress = works.filter((e) => {
        return e.status == 2
      })
      this.todoGroups.Done = works.filter((e) => {
        return e.status == 3
      })
    },
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
      const id = this.$route.params.space
      this.$axios
        .post(`api/workspace/${id}/todo`, {
          user_id: this.$auth.user.id,
          part_id: 1,
          title: wname,
          description: desc,
          status: 1,
        })
        .then((r) => {
          let todo = r.data.todo
          this.todoGroups.ToDo.push(todo)
        })
        .catch((e) => {
          console.log(e)
        })

      this.open = false
    },
  },
}
</script>
