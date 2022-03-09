const colors = require('tailwindcss/colors')
const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    darkMode: 'class',
    theme: {
        extend: {
            colors: {
                green: colors.emerald,
                yellow: colors.amber,
                purple: colors.violet,
                red: colors.red,
                blue: colors.blue,
                orange: colors.orange,
                gray: colors.gray,
                white: colors.white,
                black: colors.black,
                primary: colors.blue,
                secondary: colors.orange,
                success: colors.green,
                info: colors.blue,
                warning: colors.yellow,
                danger: colors.red,
                light: colors.gray,
                dark: colors.black,
                text: colors.gray,
                background: colors.white,
                border: colors.gray[200],
                placeholder: colors.gray[200],
                highlight: colors.blue[100],
                hover: colors.blue[100],
                focus: colors.blue[100],
                active: colors.blue[100],
                disabled: colors.gray[200],
                'on-background': colors.white,
                'on-surface': colors.black,
                'on-primary': colors.white,
                'on-secondary': colors.white,
                'on-success': colors.white,
                'on-info': colors.white,
                'on-warning': colors.white,
                'on-danger': colors.white,
                'on-light': colors.black,
                'on-dark': colors.white,
                'on-text': colors.black,
                'on-background-hover': colors.gray[100],
                'on-background-focus': colors.gray[100],
                'on-background-active': colors.gray[100],
                'on-surface-hover': colors.black,
                'on-surface-focus': colors.black,
                'on-surface-active': colors.black,
                'on-primary-hover': colors.white,
                'on-primary-focus': colors.white,
                'on-primary-active': colors.white,
                'on-secondary-hover': colors.white,
                'on-secondary-focus': colors.white,

            },
            typography: {
                DEFAULT: {
                    css: {
                          p: {
                           marginBottom: '0.25rem',
                           marginTop: '0.25rem',
                        },
                    },
                },
            },
            fontFamily: {
                sans: ['Inter var', ...defaultTheme.fontFamily.sans],
              },
        },

    },
    content: [
        './app/**/*.php',
        './resources/**/*.html',
        './resources/**/*.js',
        './resources/**/*.jsx',
        './resources/**/*.ts',
        './resources/**/*.tsx',
        './resources/**/*.php',
        './resources/**/*.vue',
        './resources/**/*.twig',
    ],

    typography: {
        default: {
            css: {
                p: {
                    marginBottom: '0.5rem',
                    marginTop: '0.5rem',
                }
            }
        }
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/line-clamp'),
    ],
};
