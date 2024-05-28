<template>
    <div class="q-pa-md">
        <q-table
            :rows="pacientes"
            :columns="columns"
            row-key="id"
            :loading="loading"
        >
            <template v-slot:top>
                <q-toolbar>
                    <q-toolbar-title>Lista de Pacientes</q-toolbar-title>
                    <q-btn flat dense color="primary" icon="refresh" @click="fetchPacientes">Recarregar</q-btn>
                </q-toolbar>
            </template>
            <template v-slot:body-cell-index="props">
                <q-td :props="props">
                    {{ props.rowIndex + 1 }}
                </q-td>
            </template>
            <template v-slot:body-cell-actions="props">
                <q-td :props="props">
                    <q-btn dense flat icon="edit" color="primary" @click="alterarPaciente(props.row)"/>
                    <q-btn dense flat icon="delete" color="negative" @click="deletarPaciente(props.row)"/>
                </q-td>
            </template>
        </q-table>
    </div>
</template>

<script>
import { ref, onMounted } from 'vue'
import axios from 'axios'

export default {
    setup () {
        const pacientes = ref([])
        const loading = ref(true)
        const columns = [
            { name: 'index', required: true, label: '#', align: 'left', field: 'index' },
            { name: 'nome', required: true, label: 'Nome', align: 'left', field: 'pac_nome' },
            { name: 'dataNascimento', label: 'Data de Nascimento', align: 'left', field: 'pac_dataNascimento' },
            { name: 'actions', label: 'Ações', align: 'right', field: 'actions' }
        ]

        const fetchPacientes = async () => {
            loading.value = true
            try {
                const token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vMTI3LjAuMC4xOjgwMDAvYXBpL2xvZ2luIiwiaWF0IjoxNzE2ODU3MjA3LCJleHAiOjE3MTY4NjA4MDcsIm5iZiI6MTcxNjg1NzIwNywianRpIjoiemp4THk5Rkw2MHluWVBnUSIsInN1YiI6IjEiLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.il4e6m-x8IJd9W_6l1L8P3ypvC5n9FoHHdVFFF-cmGY'
                const response = await axios.get('http://127.0.0.1:8000/api/pacientes', {
                    method: 'get',
                    headers: {
                        Authorization: `Bearer ${token}`
                    }
                })
                pacientes.value = response.data
            } catch (error) {
                console.error('Erro ao buscar pacientes:', error)
            } finally {
                loading.value = false
            }
        }

        const alterarPaciente = (paciente) => {
            console.log('Alterar paciente:', paciente)
            // Adicione a lógica de alteração aqui
        }

        const deletarPaciente = (paciente) => {
            console.log('Deletar paciente:', paciente)
            // Adicione a lógica de exclusão aqui
        }

        onMounted(() => {
            fetchPacientes()
        })

        return {
            pacientes,
            loading,
            columns,
            fetchPacientes,
            alterarPaciente,
            deletarPaciente
        }
    }
}
</script>

<style scoped>
.item-flex {
    display: flex;
    flex-direction: column;
    justify-content: space-between;
}

.bottom-aligned {
    align-self: flex-end;
}
</style>
