<template>
    <q-page class="q-pa-md flex flex-center">
        <q-card style="width: 400px;">
            <q-card-section>
                <div class="text-h6">Login</div>
            </q-card-section>

            <q-card-section>
                <q-form @submit="handleSubmit">
                    <q-input
                        v-model="form.email"
                        filled
                        label="Email"
                        type="email"
                        :error="errors.email"
                        error-message="Email inválido"
                        required
                    />
                    <q-input
                        v-model="form.password"
                        filled
                        label="Senha"
                        type="password"
                        :error="errors.password"
                        error-message="Senha inválida"
                        required
                    />

                    <q-card-actions align="right">
                        <q-btn type="submit" color="primary" label="Login" />
                    </q-card-actions>
                </q-form>
            </q-card-section>
        </q-card>
    </q-page>
</template>

<script>
import { ref } from 'vue'
import { useForm } from '@inertiajs/vue3'

export default {
    setup() {
        const form = useForm({
            email: '',
            password: ''
        })

        const errors = ref({})

        const handleSubmit = () => {
            form.post('/login', {
                onError: (page) => {
                    errors.value = page.props.errors
                }
            })
        }

        return {
            form,
            errors,
            handleSubmit
        }
    }
}
</script>

<style scoped>
.q-page {
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
}
</style>
