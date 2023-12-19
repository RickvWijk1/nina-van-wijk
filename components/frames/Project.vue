<template>
    <div class="container">
        <div class="project">
            <nuxt-link to="/project">
                <nuxt-img class="img" src="rickroll.webp" />
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
.container {
    display: flex;
    justify-content: center;
    align-items: center;
    position: relative;
    width: 160px;
    height: 160px;

    background-color: white;

    .project {
        position: relative;
        display: flex;
        z-index: 1;
        height: 80%;
        width: 80%;
        background-color: rgb(45, 45, 45);

        &::after {
            z-index: -1;
            position: absolute;
            bottom: 0;
            color: white;
            padding: 8px 4px;
            content: 'Lol get Rickrolled';
        }

        img {
            height: 100%;
            object-fit: cover;
            // box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 1);


            &:hover {
                transition: .5s ease-in-out;
                transform: rotate(360deg) translate(0px, -40px);

            }

        }


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