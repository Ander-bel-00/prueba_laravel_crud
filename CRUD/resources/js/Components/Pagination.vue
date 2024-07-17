<!-- Pagination.vue -->
<template>
    <div class="pagination">
        <button
            v-if="links.prev"
            @click="changePage(links.prev)"
            class="pagination-button"
        >
            Anterior
        </button>
        
        <button
            v-for="link in links.pages"
            :key="link.url"
            :class="{ 'is-active': link.active }"
            @click="changePage(link.url)"
            class="pagination-button"
        >
            {{ link.label }}
        </button>

        <button
            v-if="links.next"
            @click="changePage(links.next)"
            class="pagination-button"
        >
            Siguiente
        </button>
    </div>
</template>

<script>
export default {
    props: {
        links: {
            type: Object,
            required: true,
        },
    },
    methods: {
        changePage(url) {
            if (url) {
                this.$inertia.visit(url);
            }
        },
    },
};
</script>

<style>
.pagination {
    display: flex;
    justify-content: center;
    margin-top: 20px;
}

.pagination-button {
    margin: 0 5px;
    padding: 5px 10px;
    border: 1px solid #ccc;
    background: #fff;
    cursor: pointer;
}

.pagination-button.is-active {
    font-weight: bold;
    background: #f0f0f0;
}
</style>
