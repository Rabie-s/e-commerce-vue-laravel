import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import '../css/app.css'
import 'flowbite'
import DefaultLayout from '@/layouts/DefaultLayout.vue'
import AdminLayout from '@/layouts/AdminLayout.vue'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]
    //page.default.layout = name.startsWith('Admin/') ? AdminLayout : DefaultLayout
    if (name.startsWith('Admin/')) {
      page.default.layout = AdminLayout
    } else if (name.startsWith('User/Auth')) {
      page.default.layout = null;
    } else {
      page.default.layout = DefaultLayout;
    }
    return page

  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(App, props) })
      .use(plugin)
      .use(ZiggyVue)
      .mount(el)
  },
})