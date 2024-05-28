import "@quasar/extras/material-icons/material-icons.css";
import "@quasar/extras/mdi-v6/mdi-v6.css";
import "quasar/src/css/index.sass";

import { createInertiaApp } from "@inertiajs/vue3";
import { resolvePageComponent } from "laravel-vite-plugin/inertia-helpers";
import { Quasar } from "quasar";
import quasarIconSet from "quasar/icon-set/svg-mdi-v6";
import { createApp, h } from "vue";
import MainLayout from './layouts/MainLayout.vue';

createInertiaApp({
    resolve: (name) => {
        let page = resolvePageComponent(`./pages/${name}.vue`, import.meta.glob('./pages/**/*.vue'));
        page.then((module) => {
            module.default.layout = module.default.layout || MainLayout;
        });
        return page;
    },

    setup({ el, App, props, plugin }) {
        createApp({ render: () => h(App, props) })
            .use(plugin)
            .use(Quasar, {
                plugins: {}, // import Quasar plugins and add here
                iconSet: quasarIconSet,
                config: {}, // quasar config see: https://quasar.dev/start/vite-plugin/
            })
            .mount(el);
    },
});
