<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, useForm, Link } from "@inertiajs/vue3";

// Propriedades
const props = defineProps({
    problem: {
        type: Object,
        required: true,
    },
});

// Formulário com dados iniciais das props
const form = useForm({
    title: props.problem.title,
    description: props.problem.description,
});

// Enviar requisição de atualização
const submit = () => {
    form.put(`/problems/${props.problem.id}`);
};
</script>

<template>
    <Head title="Editar Problema" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Editar Problema
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <!-- Botão Voltar -->
                        <Link href="/problems">
                            <button
                                class="bg-gray-500 hover:bg-gray-700 text-white text-sm font-semibold py-1 px-3 rounded inline-flex items-center gap-1 mb-4"
                            >
                                🔙 Voltar
                            </button>
                        </Link>

                        <!-- Formulário de Edição -->
                        <form @submit.prevent="submit">
                            <div class="mb-4">
                                <label
                                    for="title"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Título:</label
                                >
                                <input
                                    id="title"
                                    type="text"
                                    v-model="form.title"
                                    placeholder="Digite o título"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                />
                                <div
                                    v-if="form.errors.title"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.title }}
                                </div>
                            </div>

                            <div class="mb-4">
                                <label
                                    for="description"
                                    class="block text-gray-700 text-sm font-bold mb-2"
                                    >Descrição:</label
                                >
                                <textarea
                                    id="description"
                                    v-model="form.description"
                                    placeholder="Digite a descrição"
                                    class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                                ></textarea>
                                <div
                                    v-if="form.errors.description"
                                    class="text-red-500 text-sm mt-1"
                                >
                                    {{ form.errors.description }}
                                </div>
                            </div>

                            <!-- Botão Salvar -->
                            <button
                                type="submit"
                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-2 px-4 rounded inline-flex items-center gap-1"
                                :disabled="form.processing"
                            >
                                💾 Salvar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
