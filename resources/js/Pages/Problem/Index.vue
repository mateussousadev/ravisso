<script setup>
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue";
import { Head, Link, useForm } from "@inertiajs/vue3";
import { ref } from "vue";

defineProps({
    problems: {
        type: Array,
        default: () => [],
    },
});

const form = useForm({});
const showDeleteModal = ref(false);
const problemIdToDelete = ref(null);

const deleteProblem = (id) => {
    form.delete(`problems/${id}`);
};

function openDeleteModal(id) {
    problemIdToDelete.value = id;
    showDeleteModal.value = true;
}

function cancelDelete() {
    problemIdToDelete.value = null;
    showDeleteModal.value = false;
}

function confirmDelete() {
    deleteProblem(problemIdToDelete.value);
    showDeleteModal.value = false;
}
</script>

<template>
    <Head title="Gerenciar Problemas" />
    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Gerenciar Problemas
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <Link href="problems/create">
                            <button
                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-1 px-3 rounded my-3 flex items-center gap-1"
                            >
                                Novo Problema
                            </button>
                        </Link>

                        <table class="table-auto w-full">
                            <thead>
                                <tr class="text-left bg-gray-200">
                                    <th class="border px-4 py-2">ID</th>
                                    <th class="border px-4 py-2">Título</th>
                                    <th class="border px-4 py-2">Descrição</th>
                                    <th
                                        class="border px-4 py-2 text-center"
                                        width="180px"
                                    >
                                        Ações
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr
                                    v-for="(problem, index) in problems"
                                    :key="problem.id"
                                    class="text-left hover:bg-gray-100"
                                >
                                    <td class="border px-4 py-2">
                                        {{ index + 1 }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ problem.title }}
                                    </td>
                                    <td class="border px-4 py-2">
                                        {{ problem.description }}
                                    </td>
                                    <td class="border px-4 py-2 text-center">
                                        <Link
                                            :href="`problems/${problem.id}/edit`"
                                        >
                                            <button
                                                class="bg-blue-500 hover:bg-blue-700 text-white text-sm font-semibold py-1 px-2 rounded inline-flex items-center gap-1"
                                            >
                                                Editar
                                            </button>
                                        </Link>
                                        <button
                                            class="bg-red-500 hover:bg-red-700 text-white text-sm font-semibold py-1 px-2 rounded inline-flex items-center gap-1 ml-2"
                                            @click="openDeleteModal(problem.id)"
                                        >
                                            Apagar
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>

    <!-- Delete Confirmation Modal -->
    <div
        v-if="showDeleteModal"
        class="fixed inset-0 flex items-center justify-center z-50 bg-black bg-opacity-50"
    >
        <div class="bg-white rounded-lg shadow-md w-full max-w-sm p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">
                Confirmar deleção
            </h2>
            <p class="text-gray-600 mb-6">
                Tem certeza que quer deletar esse problema?
            </p>
            <div class="flex justify-end space-x-2">
                <button
                    @click="cancelDelete"
                    class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-semibold py-1 px-4 rounded"
                >
                    Cancelar
                </button>
                <button
                    @click="confirmDelete"
                    class="bg-red-500 hover:bg-red-700 text-white font-semibold py-1 px-4 rounded"
                >
                    Sim, Apague
                </button>
            </div>
        </div>
    </div>
</template>
