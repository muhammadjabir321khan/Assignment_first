import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                // "/resources/assets/css/dashlite.css",
                // // "./resources/assets/css/theme.css",
                // // "resources/assets/js/bundle.js?ver=2.9.1 ",
                // // "resources/assets/js/scripts.js?ver=2.9.1",
                "resources/js/app.js",
            ],
            refresh: true,
        }),
    ],
});
