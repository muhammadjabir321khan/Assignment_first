const mix = require("laravel-mix");

mix.js(
    ["resources/js/app.js", "resources/js/bootstrap.js"],
    "public/js"
).postCss("resources/css/app.css", "public/css", [
    // Any postCSS plugins you want to use can be included here
]);
mix.styles(
    ["resources/assets/css/dashlite.css", "resources/assets/css/theme.css"],
    "public/css/theme.css"
);
mix.scripts(
    ["resources/assets/js/bundle.js", "resources/assets/js/scripts.js"],
    "public/js/theme.js"
);
