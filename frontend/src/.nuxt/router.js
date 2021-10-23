import Vue from 'vue'
import Router from 'vue-router'
import { normalizeURL, decode } from 'ufo'
import { interopDefault } from './utils'
import scrollBehavior from './router.scrollBehavior.js'

const _297b4a4e = () => interopDefault(import('../pages/test.vue' /* webpackChunkName: "pages/test" */))
const _593bf172 = () => interopDefault(import('../pages/workspace/create.vue' /* webpackChunkName: "pages/workspace/create" */))
const _760526fd = () => interopDefault(import('../pages/workspace/_space.vue' /* webpackChunkName: "pages/workspace/_space" */))
const _b3348880 = () => interopDefault(import('../pages/workspace/_space/index.vue' /* webpackChunkName: "pages/workspace/_space/index" */))
const _1ec3bac6 = () => interopDefault(import('../pages/index.vue' /* webpackChunkName: "pages/index" */))

const emptyFn = () => {}

Vue.use(Router)

export const routerOptions = {
  mode: 'history',
  base: '/',
  linkActiveClass: 'nuxt-link-active',
  linkExactActiveClass: 'nuxt-link-exact-active',
  scrollBehavior,

  routes: [{
    path: "/test",
    component: _297b4a4e,
    name: "test"
  }, {
    path: "/workspace/create",
    component: _593bf172,
    name: "workspace-create"
  }, {
    path: "/workspace/:space?",
    component: _760526fd,
    children: [{
      path: "",
      component: _b3348880,
      name: "workspace-space"
    }]
  }, {
    path: "/",
    component: _1ec3bac6,
    name: "index"
  }],

  fallback: false
}

export function createRouter (ssrContext, config) {
  const base = (config._app && config._app.basePath) || routerOptions.base
  const router = new Router({ ...routerOptions, base  })

  // TODO: remove in Nuxt 3
  const originalPush = router.push
  router.push = function push (location, onComplete = emptyFn, onAbort) {
    return originalPush.call(this, location, onComplete, onAbort)
  }

  const resolve = router.resolve.bind(router)
  router.resolve = (to, current, append) => {
    if (typeof to === 'string') {
      to = normalizeURL(to)
    }
    return resolve(to, current, append)
  }

  return router
}
