// https://nuxt.com/docs/api/configuration/nuxt-config
export default defineNuxtConfig({
  app: {
    baseURL: '/nina-van-wijk/',
    buildAssetsDir: 'assets'
  },

  devtools: { enabled: true },
 vite: {
    css: {
      preprocessorOptions: {
        scss: {
          additionalData: '@use "@/assets/scss/vars/_index.scss" as *;',
        },
      },
    },
  },
})
