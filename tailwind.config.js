module.exports = {
  important: true,
  content: [
    './app/**/*.php', './resources/**/*.{php,vue,js}',
    './safelist.txt'
  ],
  theme: {
    fluidTypeSettings: {

    },
    fluidType: {
      settings: {
        fontSizeMin: 1.125,
        fontSizeMax: 1.25,
        ratioMin: 1.125,
        ratioMax: 1.2,
        screenMin: 26.25,
        screenMax: 90,
        unit: 'rem',
        prefix: ''
      },
      values: {
        'xs': [-2, 1.4],
        'sm': [-1, 1.4],
        'base': [0, 1.4],
        'lg': [1, 1.2],
        'xl': [2, 1.2],
        '2xl': [3, 1.2],
        '3xl': [4, 1.2],
        '4xl': [5, 1.1],
        '5xl': [6, 1.1],
        '6xl': [7, 1.1],
        '7xl': [8, 1],
        '8xl': [9, 1],
        '9xl': [10, 1],
      }
    },
    extend: {
      colors: {
        primary: 'rgb(var(--color-primary))',
        primarydark: 'rgb(var(--color-primarydark))',
        primarylight: 'rgb(var(--color-primarylight))',
        primarytransparent: 'rgb(var(--color-primarytransparent))',
        secondary: 'rgb(var(--color-secondary))',
        secondarydark: 'rgb(var(--color-secondarydark))',
        secondarylight: 'rgb(var(--color-secondarylight))',
        pink: 'rgb(var(--color-pink))',
        pinkdark: 'rgb(var(--color-pinkdark))',
        pinklight: 'rgb(var(--color-pinklight))',
        font: 'rgb(var(--color-font))',
        grey: 'rgb(var(--color-grey))',
        white: 'rgb(var(--color-white))',
        aubergine: 'rgb(var(--color-aubergine))',
        auberginedark: 'rgb(var(--color-auberginedark))',
        auberginelight: 'rgb(var(--color-auberginelight))',
        petrol: 'rgb(var(--color-petrol))',
        petroldark: 'rgb(var(--color- petroldark))',
        petrollight: 'rgb(var(--color- petrollight))',
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
        large: '90rem', //1440px
        xlarge: '90vw', //90vw
      },
      fontFamily: {
        serif: ['Crete Round', 'serif'],
        sans: ['Raleway', 'Arial', 'sans-serif'],
        icon: '"Font Awesome 6 Pro"',
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
      content: {
        default: '""',
        'slider-prev': '"\\f177"',
        'slider-next': '"\\f178"',
        'slider-dot': '"\\2022"',
        'check-circle': '"\\f111"',
        'square': '"\\f0c8"',
        'square-checked': '"\\f14a"',
        'arrow-right-long': '"\\f178"',
      },
      fontSize: {
        0: ['0', '0'],
        icon: ['20px', '1'],
        '5.5xl': ['56px', '1.1'],
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
        'hero-pattern-1': "url('../images/zodas-logo-cluster-1.svg')",
        'hero-pattern-2': "url('../images/zodas-logo-cluster-2.svg')",
        'hero-pattern-3': "url('../images/zodas-logo-cluster-3.svg')",
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
      // typography: ({ theme }) => ({
      //   DEFAULT: {
      //     css: {
      //       color: 'rgb(var(--color-font))',
      //     },
      //     sm: {
      //       css: {
      //         ul: {
      //           marginTop: theme('spacing.element-mobile'),
      //           marginBottom: theme('spacing.element-mobile'),
      //         },
      //       },
      //     },
      //     md: {
      //       css: {
      //         ul: {
      //           marginTop: theme('spacing.element-tablet'),
      //           marginBottom: theme('spacing.element-tablet'),
      //         },
      //       },
      //     },
      //     xl: {
      //       css: {
      //         ul: {
      //           marginTop: theme('spacing.element-desktop'),
      //           marginBottom: theme('spacing.element-desktop'),
      //         },
      //       },
      //     },
      //   },
      // }),
      backgroundColor: ({ theme }) => ({
        'primary': 'rgb(var(--color-primary))',
      }),
    },
  },
  plugins: [
    require('tailwindcss-hyphens'),
    require('@tailwindcss/forms'),
    // require('@tailwindcss/typography'),
    require('tailwindcss-fluid-type'),
  ],
}
