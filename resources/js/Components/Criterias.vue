<script setup>
import { useForm, Link } from "@inertiajs/vue3";

const props = defineProps({
    criterias: Array,
    contest: Object
})

let form = useForm({
    criteria: '',
    description: '',
    weight: '',
})

const addCriteria = () => {
    form.post('/contest/' + props.contest.id)
};
</script>

<template>
    <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg">
        <div class="flex justify-between mt-4">
            <h1 class="px-4 py-3 text-2xl font-bold">Criterias</h1>
            <button type="button" class="bg-[#f0b55b] text-[#0c0c34] rounded px-4 py-2 text-uppercase font-bold hover:bg-[#0c0c34] hover:text-[#f0b55b] " data-bs-toggle="modal" data-bs-target="#staticCritBackdrop">Add</button>
        </div>
        <div class="mt-2 mb-3">
            <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500">
                <thead>
                    <tr>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Name</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Description</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Weight</th>
                        <th class="text-center px-4 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">...</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <tr v-if="criterias.length === 0">
                        <td colspan="3" class="text-center py-4">No criterias yet</td>
                    </tr>
                    <tr v-for="criteria in criterias" :key="criteria.id">
                        <td class="px-6 py-4 whitespace-no-wrap border border-slate-700">{{ criteria.criteria }}</td>    
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ criteria.description }}</td>
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ criteria.weight }}</td>
                        
                        <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">
                            <button>
                                <Link :href="route('criterias.show', criteria.id )" :active="route().current('contests')">View</Link>
                            </button>
                        </td> 
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="staticCritBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Add Criteria</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form @submit.prevent="addCriteria">
                    
                    <div class="modal-body">
                            <div class="mb-3">
                                <label for="criteria" class="form-label">Criteria</label>
                                <input type="text" class="form-control rounded" id="criteria" v-model="form.criteria">
                            </div>

                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control rounded" id="description" v-model="form.description">
                            </div>

                            <div class="mb-3">
                                <label for="weight" class="form-label">Weight</label>
                                <input type="number" class="form-control rounded" id="weight" v-model="form.weight">
                            </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn bg-gray-400 btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button  class="btn bg-red-600 btn-primary" type="submit" data-bs-dismiss="modal">Add</button>
                    </div>
                </form>

                
            </div>
        </div>
    </div>
</template>