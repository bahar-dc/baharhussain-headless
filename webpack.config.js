/**
 * Root build entry point for WordPress assets.
 *
 * The existing theme webpack configurations remain the source of truth for
 * WordPress-specific output paths and block.json discovery. This root entry
 * lets the monorepo invoke them from one command without changing the theme's
 * generated asset locations.
 */
module.exports = [
  require("./backend/app/public/wp-content/themes/baharhussain/webpack.config.assets.js"),
  require("./backend/app/public/wp-content/themes/baharhussain/webpack.config.blocks.js"),
];
