const theme = require('./theme.json');
const tailconf = require('@rocket-gmbh/tailconf_helpers');

// https://tailwindcss.com/docs/configuration
module.exports = {
  important: true,
  content: ['./index.php', './app/**/*.php', './resources/**/*.{php,vue,js}', './safelist.txt', './node_modules/flowbite/**/*.js'
  ],
  theme: {
    fluidTypeSettings: {

    },
    fluidType: {
      settings:{
        screenMin: 768,
        screenMax: 1280,
      },
      values: {
        'xs': [12, 14, 1.5],
        'sm': [15, 18, 1.5],
        'base': [16, 20, 1.4],
        'lg': [18, 24, 1.4],
        'xl': [20, 28, 1.4],
        '2xl': [22, 32, 1.3],
        '3xl': [24, 40, 1.2],
        '4xl': [28, 44, 1.2],
        '5xl': [32, 52, 1.1],
        '6xl': [44, 64, 1.1],
        '7xl': [64, 72, 1],
        '8xl': [72, 96, 1],
        '9xl': [96, 128, 1],
        'icon': ['20px', {'lineHeight':'1'}],
        'icon-big': ['32px', {'lineHeight':'1'}],
        '0': 0,
      }
    },
    extend: {
      colors: {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)',
        tertiary: 'var(--color-tertiary)',
        quaternary: 'var(--color-quaternary)',

        hellgelb: 'var(--color-hellgelb)',
        dunkelrot: 'var(--color-dunkelrot)',

        font: 'var(--color-font)',
        grey: 'var(--color-grey)',
        greylight: 'var(--color-greylight)',
        greydark: 'var(--color-greydark)',
        black: 'var(--color-black)',
        white: 'var(--color-white)',
        transparent: 'transparent',
        inherit: 'inherit',
        'gray-300': 'var(--color-gray-300)'
      },
      boxShadow: {
        'scrolldown': 'inset 0 0 0 1px var(--color-white)',
      },

      opacity: {
        default: '1',
        'on-hover': '0.8',
        'not-active': '0.25',
      },
      maxWidth: {
        tiny: '37.5rem', //600px
        slim: '45rem', //720px
        default: '71.25rem', //1140px
        medium: '80rem', //1280px
        large: '90rem', //1440px
        xlarge: '71.875vw',
        '2xlarge': '90vw',
      },
      screens: {
        '3xl': '1680px',
      },
      fontFamily: {
        serif: ['Crete Round', 'serif'],
        sans: ['DM Sans', 'Helvetica', 'sans-serif'],
        icon:  '"Font Awesome 6 Pro"',
        'icon-sharp': 'var(--fa-style-family-sharp)'
      },
      spacing: {
        // Abstände zwischen den typographischen Elementen
        'typography-tiny': '15px',
        'typography-mobile': '20px',
        'typography-tablet': '25px',
        'typography-desktop': '30px',
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
        // oft gebrauchte Werte
        '1/10': '10%',
        '2/10': '20%',
        '3/10': '30%',
        '4/10': '40%',
        '6/10': '60%',
        '7/10': '70%',
        '8/10': '80%',
        '9/10': '90%',
        '11/10': '110%',
        '12/10': '120%',
      },
      gap: {
        // Gap-Abstände
        'tiny': '15px',
        'mobile': '30px',
        'tablet': '40px',
        'desktop': '60px',
        'full-hd': '90px',
      },
      height: {
        'menu-items': '30px',
        'menu-items-mobile': '30px',
        '25vh': '25vh',
        '33vh': '33.33vh',
        '50vh': '50vh',
        '60vh': '60vh',
        '75vh': '75vh',
      },
      content: {
        default: '""',
        'slider-prev': '"\\f177"',
        'slider-next': '"\\f178"',
        'slider-dot': '"\\2022"',

        'arrow-left-long': '"\\f177"',
        'arrow-right-long': '"\\f178"',
        'arrow-down-long': '"\\f175"',

        'arrow-left': '"\\f060"',
        'arrow-right': '"\\f061"',
        'arrow-down': '"\\f063"',

        'chevron-left': '"\\f053"',
        'chevron-right': '"\\f054"',
        'chevron-down': '"\\f078"',
        'chevron-up': '"\\f077"',

        'angle-right': '"\\f105"',

        'circle-empty': '"\\f111"',
        'circle-check': '"\\f058"',
        'circle-small': '"\\e122"',
        'arrow-down-to-line': '"\\f33d"',
        'square-checked': '"\\f14a"',
        'pdf': '"\\f1c1"',

      },
      lineHeight: {
        0: '0',
        'extra-loose': '1.1',
      },
      borderWidth: {
        3: '3px',
      },
      backgroundPosition: {
        100: '100%',
        '0_100': '0% 100%',
      },
      backgroundImage: {
        'hero-pattern-1': "url('../images/logo-rocket-pink.svg')",
        'gradient': 'linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%)',
      },
      backgroundSize: {
        '25%': '25%',
        '50%': '50%',
        '75%': '75%',
      },
      animation: {
        'pulse-scale': 'pulse_scale 1s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        pulse_scale: {
          '0%, 100%': { transform: 'scale(1)' },
          '70%': { transform: 'scale(0.9)' },
        },
      },
    },
  },
  plugins: [
    require('tailwindcss-hyphens'),
    require('@tailwindcss/forms'),
    // require('tw-elements/dist/plugin.cjs'),
    require('flowbite/plugin'),
    tailconf.useFluidPlugin(),
    require('tailwind-children'),
  ],
};
