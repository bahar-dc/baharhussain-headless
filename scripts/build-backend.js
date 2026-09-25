const path = require("node:path");
const webpack = require(path.resolve(
  __dirname,
  "../backend/app/public/wp-content/themes/baharhussain/node_modules/webpack"
));
const config = require(path.resolve(__dirname, "../webpack.config.js"));

webpack(config, (error, stats) => {
  if (error) {
    console.error(error.stack || error);
    process.exit(1);
  }

  if (stats.hasErrors()) {
    console.error(stats.toString({ colors: true, preset: "errors-warnings" }));
    process.exit(1);
  }

  console.log(stats.toString({ colors: true, preset: "minimal" }));
});
