import { createApp, h } from 'vue'
import { createInertiaApp } from '@inertiajs/vue3'
import { ZiggyVue } from '../../vendor/tightenco/ziggy'
import '../css/app.css'
import 'flowbite'
import DefaultLayout from '@/Layouts/DefaultLayout.vue'
import AdminLayout from '@/Layouts/AdminLayout.vue'
import UserProfileLayout from '@/Layouts/UserProfileLayout.vue'
import 'vue3-toastify/dist/index.css';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    let page = pages[`./Pages/${name}.vue`]

    // تقسيم الاسم إلى أجزاء بناءً على '/'
    const parts = name.split('/')

    // تحديد التخطيط بناءً على أجزاء المسار
    if (parts[0] === 'Admin' && parts[1] === 'Auth') {
      page.default.layout = null
    } else if (parts[0] === 'User' && parts[1] === 'Profile') {
      page.default.layout = [DefaultLayout, UserProfileLayout]
    } else if (parts[0] === 'User') {
      page.default.layout = DefaultLayout
    } else if (parts[0] === 'Admin') {

      page.default.layout = AdminLayout
    }
    else {
      page.default.layout = DefaultLayout
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
