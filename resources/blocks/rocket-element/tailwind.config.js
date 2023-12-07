/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./blocks/**/*.{php,js}",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./index.php",
    "./functions.php",
    "./src/**/*.js",
    "./whitelist"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

