<template>
    <nav>
        <ul class="left">
            <li>
                <nuxt-link to="/about">
                    Over mij
                </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/about">
                    Werk
                </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/about">
                    Projecten
                </nuxt-link>
            </li>
        </ul>
        <ul class="right">
            <li>
                <nuxt-link to="/about">
                    <at-icon />
                </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/about">
                    <instagram-icon fillColor="purple" />
                </nuxt-link>
            </li>
            <li>
                <nuxt-link to="/about">
                    <instagram-icon fillColor="purple" />
                </nuxt-link>
            </li>
        </ul>
    </nav>
</template>
<script lang="ts" setup>
import InstagramIcon from 'vue-material-design-icons/Instagram.vue';
import AtIcon from 'vue-material-design-icons/At.vue';
</script>
<style lang="scss" scoped>
nav {
    display: flex;
    justify-content: space-between;
    height: 40px;

    ul {
        display: flex;

        li {
            display: flex;

            a {
                display: flex;
                justify-content: center;
                align-items: center;
                padding: $size-s;
                border: $size-xxxs solid $color-black;
                border-top: $size-none;


                span {
                    display: flex;
                }

                &:hover {
                    background-color: lightgray;
                }
            }
        }
    }

    .left li a {
        border-right: $size-none;

        &:first-child {
            border-left: $size-none;
        }

        &:last-child {
            border-right: $size-xxxs solid $color-black;
        }


    }

    .right li a {
        border-left: $size-none;

        &:first-child {
            border-left: $size-xxxs solid $color-black;
        }

        &:last-child {
            border-right: $size-none;
        }
    }
}
</style>