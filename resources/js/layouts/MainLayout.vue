<template>
    <q-layout view="lHh Lpr lFf">
        <q-header elevated>
            <q-toolbar>
                <q-btn
                    flat
                    dense
                    round
                    icon="menu"
                    aria-label="Menu"
                    @click="toggleLeftDrawer"
                />

                <q-toolbar-title>Dash</q-toolbar-title>

                <div>Quasar v{{ $q.version }}</div>
            </q-toolbar>
        </q-header>

        <q-drawer v-model="leftDrawerOpen" show-if-above bordered>
            <q-list>
                <q-item-label header>Menu de Opções</q-item-label>
                <q-separator></q-separator>
                <EssentialLink
                    v-for="link in essentialLinks"
                    :key="link.title"
                    v-bind="link"
                />
            </q-list>
            <q-separator></q-separator>
            <q-card-actions>
                <q-icon name="logout"  />
                <q-item clickable tag="a" :href="link" style="align-items: center;">Logout</q-item>
            </q-card-actions>
        </q-drawer>

        <q-page-container>
            <slot></slot>
        </q-page-container>
    </q-layout>
</template>

<script>
import { defineComponent, ref } from "vue";
import EssentialLink from "../components/EssentialLink.vue";

const linksList = [
    {
        title: 'Pacientes',
        caption: 'Cadastrar pacientes',
        icon: 'settings_accessibility',
        link: 'pacientes'
    },
    {
        title: 'Consultas',
        caption: 'Marcar Consultas',
        icon: 'event_available',
        link: 'about'
    },
    {
        title: 'Medicos',
        caption: 'Lista dos Medicos',
        icon: 'record_voice_over',
        link: 'medicos'
    },
    {
        title: 'Planos de Saúde',
        caption: 'Lista dos Planos de Saúdes',
        icon: 'chat',
        link: 'planos-de-saude'
    },
    {
        title: 'Procedimento',
        caption: 'Lista dos Procedimentos',
        icon: 'dynamic_form',
        link: 'procedimento'
    },
    {
        title: 'Especialidades',
        caption: 'Lista dos Especialidades',
        icon: 'rocket',
        link: 'especialidades'
    }
];

export default defineComponent({
    name: "MainLayout",

    components: {
        EssentialLink,
    },

    setup() {
        const leftDrawerOpen = ref(false);

        return {
            essentialLinks: linksList,
            leftDrawerOpen,
            toggleLeftDrawer() {
                leftDrawerOpen.value = !leftDrawerOpen.value;
            },
        };
    },
});
</script>
