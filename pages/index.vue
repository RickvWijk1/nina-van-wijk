<template>
    <div class="cont" style="margin: 1rem;">
        <frames-project v-for="i in 20" :key="i" />
    </div>
</template>
<style lang="scss" scoped>
.cont {
    display: grid;
    grid-template-columns: auto auto auto auto auto;
    gap: 16px;
    height: 100%;
    width: 100%;
}
</style>