export { default as NuxtLogo } from '../../components/NuxtLogo.vue'
export { default as Tutorial } from '../../components/Tutorial.vue'
export { default as CardLogin } from '../../components/card/Login.vue'
export { default as CardMember } from '../../components/card/Member.vue'
export { default as CardTodo } from '../../components/card/Todo.vue'
export { default as ModalAddGroup } from '../../components/modal/AddGroup.vue'
export { default as ModalAddWork } from '../../components/modal/AddWork.vue'
export { default as ModalEditWork } from '../../components/modal/EditWork.vue'
export { default as ModalMemberSearch } from '../../components/modal/MemberSearch.vue'
export { default as PageCreateStep1 } from '../../components/page/Create/Step1.vue'
export { default as PageCreateStep2 } from '../../components/page/Create/Step2.vue'
export { default as PageCreateStep3 } from '../../components/page/Create/Step3.vue'
export { default as PageCreateStep4 } from '../../components/page/Create/Step4.vue'
export { default as PageCreateStep5 } from '../../components/page/Create/Step5.vue'
export { default as PageCreate } from '../../components/page/Create/index.vue'

// nuxt/nuxt.js#8607
function wrapFunctional(options) {
  if (!options || !options.functional) {
    return options
  }

  const propKeys = Array.isArray(options.props) ? options.props : Object.keys(options.props || {})

  return {
    render(h) {
      const attrs = {}
      const props = {}

      for (const key in this.$attrs) {
        if (propKeys.includes(key)) {
          props[key] = this.$attrs[key]
        } else {
          attrs[key] = this.$attrs[key]
        }
      }

      return h(options, {
        on: this.$listeners,
        attrs,
        props,
        scopedSlots: this.$scopedSlots,
      }, this.$slots.default)
    }
  }
}
