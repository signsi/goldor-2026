/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./blocks/**/*.{php,js}",
    "./template-parts/**/*.php",
    "./inc/**/*.php",
    "./index.php",
    "./functions.php",
    "./src/**/*.js"
  ],
  theme: {
    extend: {
      spacing: {
        medium: '2rem'
      }
    },
  },
  plugins: [],
}

