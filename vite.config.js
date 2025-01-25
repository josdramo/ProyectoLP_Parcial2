import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/bootstrap/dist/css/bootstrap.min.css',
                'resources/js/bootstrap/dist/js/bootstrap.bundle.min.js',
                'resources/js/main.js',
            ],
            refresh: true,
        }),
        vue(),
    ],
    resolve: {
        alias: {
            vue: 'vue/dist/vue.esm-bundler.js', // Alias para Vue
            '@': '/resources/js', // Alias para rutas más cortas
        },
    },
});
