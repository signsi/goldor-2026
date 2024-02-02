const theme = require('./theme.json');
const tailconf = require('@rocket-gmbh/tailconf_helpers');

// https://tailwindcss.com/docs/configuration
module.exports = {
  content: ['./index.php', './app/**/*.php', './resources/views/**/*.{php,vue,js}', './resources/styles/**/*.{php,vue,js}', './resources/scripts/**/*.{php,vue,js}', './safelist.txt', './node_modules/flowbite/**/*.js'],
  theme: {
    fluidTypeSettings: {

    },
    fluidType: {
      settings: {
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
        'icon': ['20px', { 'lineHeight': '1' }],
        'icon-big': ['32px', { 'lineHeight': '1' }],
        '0': 0,
      }
    },
    extend: {
      colors: {
        primary: 'var(--color-primary)',
        secondary: 'var(--color-secondary)',
        tertiary: 'var(--color-tertiary)',
        quaternary: 'var(--color-quaternary)',

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
        // Generelle Max-Widths
        small: 'var(--content--small-size)',
        medium: 'var(--content--medium-size)',
        large: 'var(--content--large-size)',
        xlarge: 'var(--content--xlarge-size)',
        '2xlarge': 'var(--content--2xlarge-size)',

        // Max-Widths für die verschiedenen Layout-Bestandteile
        'header-footer': 'var(--content--header-footer-size)',
        'header': 'var(--content--header-size)',
        'footer': 'var(--content--footer-size)',
        'default': 'var(--content--default-size)',
        'wide': 'var(--content--wide-size)',
      },
      screens: {
        '3xl': '1680px',
        '4xl': '1920px',
      },
      fontFamily: {
        serif: ['Libre Baskerville', 'serif'],
        sans: ['DM Sans', 'sans-serif'],
        icon: '"Font Awesome 6 Pro"',
        'icon-sharp': 'var(--fa-style-family-sharp)'
      },
      spacing: {
        // Fixe Abstände
        'rp-10': 'var(--spacing--rp10)',
        'rp-20': 'var(--spacing--rp20)',
        'rp-30': 'var(--spacing--rp30)',
        'rp-40': 'var(--spacing--rp40)',
        'rp-50': 'var(--spacing--rp50)',
        'rp-60': 'var(--spacing--rp60)',
        'rp-70': 'var(--spacing--rp70)',
        'rp-80': 'var(--spacing--rp80)',

        // dynamische Abstände
        'small': 'var(--spacing-responsive--rp30)',
        'medium': 'var(--spacing-responsive--rp40)',
        'large': 'var(--spacing-responsive--rp50)',
        'xl': 'var(--spacing-responsive--rp60)',
        '2xl': 'var(--spacing-responsive--rp70)',
        '3xl': 'var(--spacing-responsive--rp80)',

        // Abstände für das Grid
        'gutter': 'var(--spacing-responsive--gutter)',

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
        // dynamische Abstände
        'small': 'var(--spacing-responsive--rp30)',
        'medium': 'var(--spacing-responsive--rp40)',
        'large': 'var(--spacing-responsive--rp50)',
        'xl': 'var(--spacing-responsive--rp60)',
        '2xl': 'var(--spacing-responsive--rp70)',
        '3xl': 'var(--spacing-responsive--rp80)',

        // Abstände für das Grid
        'gutter': 'var(--spacing-responsive--gutter)',
      },
      space: {
        // dynamische Abstände
        'small': 'var(--spacing-responsive--rp30)',
        'medium': 'var(--spacing-responsive--rp40)',
        'large': 'var(--spacing-responsive--rp50)',
        'xl': 'var(--spacing-responsive--rp60)',
        '2xl': 'var(--spacing-responsive--rp70)',
        '3xl': 'var(--spacing-responsive--rp80)',

        // Abstände für das Grid
        'gutter': 'var(--spacing-responsive--gutter)',
      },
      outlineWidth: {
        // Abstände für das Grid
        'medium': 'var(--spacing-responsive--rp40)',
        'gutter': 'var(--spacing-responsive--gutter)',
      },

      height: {
        'menu-items': '40px',
        'menu-items-mobile': '35px',
        '25vh': '25vh',
        '33vh': '33.33vh',
        '50vh': '50vh',
        '60vh': '60vh',
        '75vh': '75vh',
        'full-mobile-height': 'var(--full-mobile-height)',
        'full-mobile-height-dyn': 'var(--full-mobile-height-dyn)',
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
        'square': '"\\f0c8"',
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
        // 'hero-pattern-1': "url('../images/logo-rocket-pink.svg')",
        'gradient': 'linear-gradient(180deg, rgba(0, 0, 0, 0.6) 0%, rgba(0, 0, 0, 0) 100%)',
        'gradient-1': 'linear-gradient(90deg, var(--color-tertiary), var(--color-primary))',
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
