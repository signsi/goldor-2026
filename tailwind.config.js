module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        'primary': '#ff0096',
        'secondary': '#F1D9E7'
      },
      maxWidth: {
        'content': '90rem',
      },
      fontFamily: {
        'serif': ['Bodoni Moda', 'serif'],
        'sans': ['Montserrat', 'Arial', 'sans-serif'],
      },
      spacing: {
        'luca': '3rem'
      },
    },
  },
  plugins: [
    require("tailwindcss-hyphens"),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
