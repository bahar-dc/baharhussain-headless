const { spawnSync } = require("node:child_process");

const tasks = [
  ["backend Gutenberg blocks and assets", "npm", ["run", "build:backend"]],
  ["Next.js frontend", "npm", ["run", "build:frontend"]],
];

for (const [label, command, args] of tasks) {
  console.log(`\nBuilding ${label}...`);
  const result = spawnSync(command, args, { stdio: "inherit", shell: true });

  if (result.status !== 0) {
    process.exit(result.status || 1);
  }
}

console.log("\nHeadless build complete.");
