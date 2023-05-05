/** @type {import('tailwindcss').Config} */

const defaultTheme = require('tailwindcss/defaultTheme')

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        fontSize: {
            '2.5xl': ['1.625rem', '2rem'],
            ...defaultTheme.fontSize
        },

        fontFamily: {
            'sans': ['Poppins', ...defaultTheme.fontFamily.sans],
            'roboto': ['Roboto', ...defaultTheme.fontFamily.sans]
        },
        colors: {
            'black': "#1C1C1C",
            'black-full': "#000000",
            'black-less': "#838383",
            'black-lesser': "#C1C1C1",
            'gray': "#ECECEC",
            'grayv2': "#F4F4F4",
            'gray-less': "#FBFBFB",
            'gray-lesser': "#F9F9F9",
            'blue': "#8DB2C5",
            'green': "#2ACD61",
            'red': "#FF9D87",
            'white': "#FFFFFF",
            ...defaultTheme.colors,
        },
        extend: {
            spacing: {
                'page': "120px",
            }

        },
        screens: {
            'xs': '450px',
            ...defaultTheme.screens
        }
    },
    plugins: [
        require('@tailwindcss/aspect-ratio'),
        require('@tailwindcss/forms')
    ],
}
