module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        'theme': '#ff0096'
      },
      maxWidth: {
        'content': '90rem',
      },
      fontFamily: {
        'serif': ['Bodoni Moda', 'serif'],
        'sans': ['Montserrat', 'Arial', 'sans-serif'],
      }
    },
  },
  plugins: [
    require("tailwindcss-hyphens"),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
