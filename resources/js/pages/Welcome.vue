<script setup lang="ts">
import { Head } from '@inertiajs/vue3';
type Product = {
    id: number | string;
    name: string;
    color: string;
    category: string;
    price: number;
};

defineProps({
    products: Array as () => Product[]
})
</script>

<template>
    <Head title="Welcome">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>
    <div class="flex min-h-screen flex-col items-center lg:justify-center lg:p-8">
        <h1 class="font-semibold text-2xl mb-3">My Product</h1>
        <a :href='route("product.add")' class="mb-5 rounded-md border border-transparent bg-green-500 px-4 py-2.5 text-sm font-medium leading-5 text-white shadow-sm hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
            Add New Product
        </a>
        
        <!-- Table -->
        <div class="relative overflow-x-auto bg-neutral-primary-soft shadow-xs rounded-base border border-default w-full">
            <table class="w-full text-sm text-left rtl:text-right text-body">
                <thead class="text-sm text-body bg-neutral-secondary-medium border-b border-default-medium">
                    <tr>
                        <th scope="col" class="px-6 py-3 font-medium">
                            No
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Product name
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Color
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Category
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Price
                        </th>
                        <th scope="col" class="px-6 py-3 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-neutral-primary-soft border-b  border-default" v-for="(product, index) in products" :key="product.id">
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ index + 1 }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ product.name }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-heading whitespace-nowrap">
                            {{ product.name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ product.color }}
                        </td>
                        <td class="px-6 py-4">
                            {{ product.category }}
                        </td>
                        <td class="px-6 py-4">
                            ${{ product.price.toFixed(2) }}
                        </td>
                        <td class="px-6 py-4">
                            <button type="button" class="rounded-md border border-transparent bg-yellow-500 px-4 py-2.5 text-sm font-medium leading-5 text-white shadow-sm hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300 me-2">
                                Edit
                            </button>
                            <button type="button" class="rounded-md border border-transparent bg-red-500 px-4 py-2.5 text-sm font-medium leading-5 text-white shadow-sm hover:bg-red-600 focus:outline-none focus:ring-4 focus:ring-red-300">
                                Remove
                            </button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</template>
