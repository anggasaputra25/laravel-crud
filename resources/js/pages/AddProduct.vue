<script setup lang="ts">
import { Head, useForm, Link } from '@inertiajs/vue3';

const form = useForm({
    name: '',
    color: '',
    category: '',
    price: null as number | null,
});

const submit = () => {
    form.post(route("product.store"));
};
</script>

<template>
    <Head title="Add New Product">
        <link rel="preconnect" href="https://rsms.me/" />
        <link rel="stylesheet" href="https://rsms.me/inter/inter.css" />
    </Head>

    <div class="flex min-h-screen flex-col items-center justify-center p-6 bg-background text-foreground">
        <div class="w-full max-w-lg bg-card border border-border shadow-lg rounded-xl p-8 transition-all duration-300 hover:shadow-xl">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-2xl font-bold tracking-tight text-foreground">Add New Product</h1>
                <p class="text-sm text-muted-foreground mt-1">Create a new item in your product catalog.</p>
            </div>

            <!-- Form -->
            <form @submit.prevent="submit" class="space-y-6">
                <!-- Product Name -->
                <div class="space-y-2">
                    <label for="name" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-foreground">
                        Product Name
                    </label>
                    <input
                        id="name"
                        v-model="form.name"
                        type="text"
                        placeholder="e.g. iPhone 15 Pro"
                        class="flex h-10 w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                        :class="{ 'border-destructive focus-visible:ring-destructive': form.errors.name }"
                        required
                    />
                    <p v-if="form.errors.name" class="text-sm font-medium text-destructive mt-1">
                        {{ form.errors.name }}
                    </p>
                </div>

                <!-- Grid for Color & Price -->
                <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                    <!-- Color -->
                    <div class="space-y-2">
                        <label for="color" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-foreground">
                            Color
                        </label>
                        <input
                            id="color"
                            v-model="form.color"
                            type="text"
                            placeholder="e.g. Titanium Grey"
                            class="flex h-10 w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            :class="{ 'border-destructive focus-visible:ring-destructive': form.errors.color }"
                            required
                        />
                        <p v-if="form.errors.color" class="text-sm font-medium text-destructive mt-1">
                            {{ form.errors.color }}
                        </p>
                    </div>

                    <!-- Price -->
                    <div class="space-y-2">
                        <label for="price" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-foreground">
                            Price ($)
                        </label>
                        <input
                            id="price"
                            v-model.number="form.price"
                            type="number"
                            placeholder="e.g. 999"
                            min="0"
                            class="flex h-10 w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50"
                            :class="{ 'border-destructive focus-visible:ring-destructive': form.errors.price }"
                            required
                        />
                        <p v-if="form.errors.price" class="text-sm font-medium text-destructive mt-1">
                            {{ form.errors.price }}
                        </p>
                    </div>
                </div>

                <!-- Category -->
                <div class="space-y-2">
                    <label for="category" class="text-sm font-medium leading-none peer-disabled:cursor-not-allowed peer-disabled:opacity-70 text-foreground">
                        Category
                    </label>
                    <select
                        id="category"
                        v-model="form.category"
                        class="flex h-10 w-full rounded-md border border-input bg-transparent px-3 py-2 text-sm ring-offset-background placeholder:text-muted-foreground focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:cursor-not-allowed disabled:opacity-50 text-foreground dark:bg-card"
                        :class="{ 'border-destructive focus-visible:ring-destructive': form.errors.category }"
                        required
                    >
                        <option value="" disabled selected>Select a category</option>
                        <option value="Electronics" class="text-foreground bg-card">Electronics</option>
                        <option value="Clothing" class="text-foreground bg-card">Clothing</option>
                        <option value="Home & Kitchen" class="text-foreground bg-card">Home & Kitchen</option>
                        <option value="Books" class="text-foreground bg-card">Books</option>
                        <option value="Sports" class="text-foreground bg-card">Sports</option>
                        <option value="Other" class="text-foreground bg-card">Other</option>
                    </select>
                    <p v-if="form.errors.category" class="text-sm font-medium text-destructive mt-1">
                        {{ form.errors.category }}
                    </p>
                </div>

                <!-- Actions -->
                <div class="flex items-center justify-end gap-x-4 pt-4 border-t border-border mt-8">
                    <Link
                        href="/"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none hover:bg-accent hover:text-accent-foreground h-10 px-4 py-2 border border-input text-foreground bg-transparent"
                    >
                        Cancel
                    </Link>
                    <button
                        type="submit"
                        :disabled="form.processing"
                        class="inline-flex items-center justify-center rounded-md text-sm font-medium transition-colors focus-visible:outline-none focus-visible:ring-2 focus-visible:ring-ring focus-visible:ring-offset-2 disabled:opacity-50 disabled:pointer-events-none bg-primary text-primary-foreground hover:bg-primary/90 h-10 px-4 py-2"
                    >
                        <span v-if="form.processing">Saving...</span>
                        <span v-else>Save Product</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</template>