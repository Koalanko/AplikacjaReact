// webpack.config.js
// ...
import Encore from "@symfony/webpack-encore/lib/WebpackConfig";

Encore
    // ...
    .enableReactPreset()
    // uncomment to define the assets of the project
    .addEntry('js/app', './assets/js/app.js');