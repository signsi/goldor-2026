module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    screens: {
      'tablet': '768px',
      'dekstop': '1280px',
      'full-hd': '1700px',
    },
    extend: {
      colors: {
        'primary': '#ff0096',
        'secondary': '#F1D9E7'
      },
      maxWidth: {
        'slimmer': '37.5rem', //600px
        'slim': '47rem',      //752px
        'large': '71.25',     //1140px
        'xlarge': '90rem',    //1440px
        'content': '90rem',   //1440px
      },
      fontFamily: {
        'serif': ['Bodoni Moda', 'serif'],
        'sans': ['Montserrat', 'Arial', 'sans-serif'],
      },
      spacing: {
        // Abstände zwischen den verschiedenen Sections
        'section-mobile': '30px',
        'section-tablet': '40px',
        'section-desktop': '60px',
        'section-full-hd': '90px',
        // Abstände von Elementen (RocketPager, Bilder Tabellen usw.) innerhalb einer Section
        'element-mobile': '30px',
        'element-tablet': '40px',
        'element-desktop': '60px',
        // Gutter Abstände z.b. Links und Rechts von Alignwide Blöcken oder Abstand zwischen Kinderelementen
        'gutter-mobile': '20px',
        'gutter-display': '30px',
      },
    },
  },
  plugins: [
    require("tailwindcss-hyphens"),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
