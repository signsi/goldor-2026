module.exports = {
  important: true,
  content: ['./app/**/*.php', './resources/**/*.{php,vue,js}'],
  theme: {
    extend: {
      colors: {
        primary: 'rgb(var(--color-primary))',
        darkgreen: 'rgb(var(--color-darkgreen))',
        secondary: 'rgb(var(--color-secondary))',
        font: 'rgb(var(--color-font))',
        'black-transparent': 'rgb(var(--color-font) / 50%)',
        orange: 'rgb(var(--color-orange))',
        yellow: 'rgb(var(--color-yellow))',
        raspberry: 'rgb(var(--color-raspberry))',
        grey: 'rgb(var(--color-grey))',
        darkgrey: 'rgb(var(--color-darkgrey))',
        lightgray: 'rgb(var(--color-lightgray))',
      },
      opacity: {
        default: '1',
        'on-hover': '0.8',
        'not-active': '0.25',
      },
      maxWidth: {
        default: '90rem', //1440px
        slimmer: '37.5rem', //600px
        slim: '47rem', //752px
        large: '71.25rem', //1140px
        xlarge: '90rem', //1440px
        content: '52.5rem', //840px
        // 'content': '80%',
      },
      fontFamily: {
        serif: ['Crete Round', 'serif'],
        sans: ['Open Sans', 'Arial', 'sans-serif'],
        icon: '"Font Awesome 6 Pro"',
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
        'element-full-hd': '90px',
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
      content: {
        default: '""',
        'slider-prev': '"\\f177"',
        'slider-next': '"\\f178"',
        'slider-dot': '"\\2022"',
        'check-circle': '"\\f111"',
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
      animation: {
        'pulse-scale': 'pulse_scale 1s cubic-bezier(0.4, 0, 0.6, 1) infinite',
      },
      keyframes: {
        pulse_scale: {
          '0%, 100%': { transform: 'scale(1)' },
          '70%': { transform: 'scale(0.9)' },
        },
      },
      typography: ({ theme }) => ({
        DEFAULT: {
          css: {
            color: 'rgb(var(--color-font))',
            'h4 + ul': {
              marginTop: 0,
            },
            p: {
              color: theme('rgb(var(--color-primary))'),
            }
          },
          sm: {
            css: {
              ul: {
                marginTop: theme('spacing.element-mobile'),
                marginBottom: theme('spacing.element-mobile'),
              },
            },
          },
          md: {
            css: {
              ul: {
                marginTop: theme('spacing.element-tablet'),
                marginBottom: theme('spacing.element-tablet'),
              },
            },
          },
          xl: {
            css: {
              ul: {
                marginTop: theme('spacing.element-desktop'),
                marginBottom: theme('spacing.element-desktop'),
              },
            },
          },
        },
        font: {
          css: {
            '--tw-prose-body': theme('rgb(var(--color-primary))'),
            '--tw-prose-headings': theme('rgb(var(--color-primary))'),
            '--tw-prose-lead': theme('rgb(var(--color-primary))'),
            '--tw-prose-links': theme('rgb(var(--color-primary))'),
            '--tw-prose-bold': theme('rgb(var(--color-primary))'),
            '--tw-prose-counters': theme('rgb(var(--color-primary))'),
            '--tw-prose-bullets': theme('rgb(var(--color-primary))'),
            '--tw-prose-hr': theme('rgb(var(--color-primary))'),
            '--tw-prose-quotes': theme('rgb(var(--color-primary))'),
            '--tw-prose-quote-borders': theme('rgb(var(--color-primary))'),
            '--tw-prose-captions': theme('rgb(var(--color-primary))'),
            '--tw-prose-code': theme('rgb(var(--color-primary))'),
            '--tw-prose-pre-code': theme('colors.font[100]'),
            '--tw-prose-pre-bg': theme('rgb(var(--color-primary))'),
            '--tw-prose-th-borders': theme('rgb(var(--color-primary))'),
            '--tw-prose-td-borders': theme('colors.font[200]'),
            '--tw-prose-invert-body': theme('colors.font[200]'),
            '--tw-prose-invert-headings': theme('colors.white'),
            '--tw-prose-invert-lead': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-links': theme('colors.white'),
            '--tw-prose-invert-bold': theme('colors.white'),
            '--tw-prose-invert-counters': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-bullets': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-hr': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-quotes': theme('colors.font[100]'),
            '--tw-prose-invert-quote-borders': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-captions': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-code': theme('colors.white'),
            '--tw-prose-invert-pre-code': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-pre-bg': 'rgb(0 0 0 / 50%)',
            '--tw-prose-invert-th-borders': theme('rgb(var(--color-primary))'),
            '--tw-prose-invert-td-borders': theme('rgb(var(--color-primary))'),
          },
        },
      }),
    },
  },
  plugins: [
    require('tailwindcss-hyphens'),
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
}
