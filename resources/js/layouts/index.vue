<script setup lang="ts">
const route = useRoute();
</script>
<template>
    <div class="app-layout">
        <div class="content">
            <router-view :key="route.path" />
        </div>
    </div>
</template>
<style lang="scss" scoped></style>
