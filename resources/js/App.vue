<script setup lang="ts">
import viVN from "ant-design-vue/es/locale/vi_VN";
// This starter template is using Vue 3 <script setup> SFCs
// Check out https://vuejs.org/api/sfc-script-setup.html#script-setup
</script>

<template>
    <a-config-provider :locale="viVN">
        <router-view />
    </a-config-provider>
</template>
