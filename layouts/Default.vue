<template>
    <div class="layout">
        <header-main />
        <div class="content">

            <nuxt-page />
        </div>
        <div class="footer">
            <footer-main />
        </div>
    </div>
</template>
<style lang="scss" scoped>
.layout {
    display: flex;
    flex-direction: column;
    height: 100%;


    // display: grid;
    // grid-template-rows: 1fr 1fr auto;

    .content {
        display: flex;
        justify-content: flex-start;
        justify-self: flex-start;
        align-items: flex-start;
        align-self: flex-start;
        height: 100%;
    }

    .footer {
        display: flex;
        align-items: flex-end;
    }
}
</style>