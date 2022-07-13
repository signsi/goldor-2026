module.exports = {
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        'primary': '#ff0096',
        'secondary': '#F1D9E7',
        'font': '#000',
      },
      opacity:{
        'default': '1',
        'on-hover': '0.8',
        'not-active': '0.25'
      },
      maxWidth: {
        'default': '90rem',   //1440px
        'slimmer': '37.5rem', //600px
        'slim': '47rem',      //752px
        'large': '71.25rem',  //1140px
        'xlarge': '90rem',    //1440px
        'content': '52.5rem',  //840px
      },
      fontFamily: {
        'serif': ['Bodoni Moda', 'serif'],
        'sans': ['Montserrat', 'Arial', 'sans-serif'],
        'icon': '"Font Awesome 6 Pro"'
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
      translate: {
        '11/10': '110%',
      },
      content: {
        'slider-prev': '"\\f177"',
        'slider-next': '"\\f178"',
        'slider-dot': '"\\2022"',
      },
      fontSize: {
        '0': ['0', '0'],
        'icon': ['20px', '1'],
      }
    },
  },
  plugins: [
    require("tailwindcss-hyphens"),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
