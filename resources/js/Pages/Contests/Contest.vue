<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    contest: Object,
    'criterias': Array,
})

console.log(props.contest);
console.log(props.criterias);

let form = useForm({
    name: props.contest.name,
    description: props.contest.description,
})

const submit = () => {
    form.put('/events/contest/' + props.event.id)
}


</script>

<template>

    <AuthLayout>
        <template #header>

            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                Contest
                {{ contest.name }}
            </h2>
        </template>
        <div class="py-12">
            <div>
                <div>
                    <div class="bg-white overflow-hidden border px-2 border-gray-900 shadow-xl sm:rounded-lg max-w-sm">
                        <form @submit.prevent="submit">
                            <div class="flex px-4 my-2 gap-x-2 ">
                                <div class="px-6">
                                    <label for="name">Contest</label>
                                    <input type="text" v-model="form.name" id="name" class="ml-1 mb-2 form-control rounded font-bold text-md">
                                </div>
                                <div class="px-6">
                                    <label for="description">Description</label>
                                    <input type="text" v-model="form.description" id="description" class="ml-1 mb-2 form-control rounded font-bold  text-md">
                                </div>
                                
                                <div class="mt-2 px-6">
                                    <button class="rounded p-16 py-3 bg-green-400 font-bold" type="submit">Save</button>
                                </div>
                                <div class="mt-2 px-6">
                                    <button class="rounded p-16 py-3 bg-red-500 font-bold"  data-bs-toggle="modal" data-bs-target="#staticBackdrop" @click="confirmDelete(event.id)">Delete</button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
                
                <div class="mt-12">
                    <table class="min-w-full divide-y divide-gray-200 border-separate border-spacing-2 border border-slate-500">
                        <thead>
                            <tr>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Name</th>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Description</th>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">Weight</th>
                                <th class="text-center px-24 py-3 text-left text-xs leading-4 font-bold text-white uppercase tracking-wider bg-blue-900">...</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            <tr v-if="criterias.length === 0">
                                <td colspan="3" class="text-center py-4">No criterias yet</td>
                            </tr>
                            <tr v-for="criteria in criterias" :key="criteria.id">
                                <td class="px-6 py-4 whitespace-no-wrap border border-slate-700">{{ criteria.name }}</td>    
                                <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">{{ criteria.description }}</td>    
                                
                                <td class="px-6 py-4 whitespace-no-wrap text-center border border-slate-700">
                                    <button>
                                        <Link :href="route('criterias.show', criteria.id )" :active="route().current('events')">View</Link>
                                    </button>
                                </td> 
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </AuthLayout>


</template>
