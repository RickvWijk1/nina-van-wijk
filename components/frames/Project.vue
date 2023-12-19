<template>
    <div class="container">
        <div class="project">
            <nuxt-link class="img">
                <nuxt-img src="rickroll.webp" />
            </nuxt-link>
        </div>
        <div class="frame">
            <div v-for="i in 20" :key="i" class="inner-frame"></div>
        </div>
        <svg class="triangle">
            <line x1="0" y1="0" x2="160" y2="160" stroke="black" stroke-width="1" />
        </svg>
        <svg class="triangle">
            <line x1="0" x2="160" y1="160" class="line" stroke="black" stroke-width="1" />
        </svg>
    </div>
</template>
<style lang="scss" scoped>
img {
    height: 100%;
    object-fit: cover;
}

.container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 160px;
    height: 160px;
    background-color: lightgray;

    .project {
        display: flex;
        position: relative;
        z-index: 1;
        height: 80%;
        width: 80%;
        background-color: white;
    }

    .frame {
        display: grid;
        position: absolute;
        grid-template-columns: auto auto auto auto auto;
        inset: 0;
        border: 1px solid $color-black;
        // background-color: blue;

        .inner-frame {
            display: flex;
            position: relative;
            // width: 40px;
            height: 100%;
            border: 1px solid $color-black;

        }
    }

    .triangle {
        display: flex;
        // justify-content: center;
        // align-items: center;
        // justify-self: end;
        // align-self: center;
        position: absolute;
        inset: 0;
        width: 100%;
        height: calc(100%);
        // background-color: red;

    }
}
</style>