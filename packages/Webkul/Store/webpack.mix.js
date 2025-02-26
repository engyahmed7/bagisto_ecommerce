const mix = require("laravel-mix");
require("laravel-mix-merge-manifest");

mix.setPublicPath("public").mergeManifest();

mix.styles(
    __dirname + "/src/Resources/assets/css/custom.css",
    "public/css/custom.css"
).options({
    processCssUrls: false,
});

mix.js(
    __dirname + "/src/Resources/assets/js/custom.js",
    "js/custom.js"
).disableNotifications();

if (mix.inProduction()) {
    mix.version();
}
