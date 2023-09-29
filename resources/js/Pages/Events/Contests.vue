<script setup>
import AuthLayout from '@/Layouts/AuthLayout.vue'
import { useForm, Link } from '@inertiajs/vue3';

const props = defineProps({
    contest: Object,
    'criterias': Array,
})

console.log(props.contest);
// let form = useForm({
//     contest: props.contest.contest,
//     description: props.contest.description,
// })

</script>

<template>
    
    <AuthLayout>
        <template #header>
            
            <h2 class="font-semibold text-xl text-[#ffbd59] leading-tight">
                {{ contest.name }}
            </h2>
        </template>
        <div class="py-12">
            <div>
                <div>
                    <div v-for="criteria in criterias" :key="criteria.id">
                        <h1>{{ criteria.name }}</h1>
                    </div>
                </div>
            </div>
        </div>
        
    </AuthLayout>
    

</template>