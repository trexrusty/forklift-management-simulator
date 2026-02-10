import './bootstrap';
import { createInertiaApp, type ResolvedComponent } from '@inertiajs/svelte'
import { mount } from 'svelte'

createInertiaApp({
    resolve: (name): ResolvedComponent => {
        const pages = import.meta.glob<ResolvedComponent>('./Pages/**/*.svelte', { eager: true })
        return pages[`./Pages/${name}.svelte`]
    },
    setup({ el, App, props }) {
        if (!el) return
        mount(App, { target: el, props })
    },
})