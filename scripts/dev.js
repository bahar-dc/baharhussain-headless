const { spawn } = require("node:child_process");

const processes = [
  ["backend", "npm", ["run", "dev:backend"]],
  ["frontend", "npm", ["run", "dev:frontend"]],
];

const children = processes.map(([label, command, args]) => {
  const child = spawn(command, args, { stdio: "inherit", shell: true });
  child.on("exit", (code) => {
    if (code && code !== 0) {
      console.error(`${label} exited with status ${code}`);
    }
  });
  return child;
});

function stop() {
  children.forEach((child) => child.kill("SIGTERM"));
}

process.on("SIGINT", stop);
process.on("SIGTERM", stop);
