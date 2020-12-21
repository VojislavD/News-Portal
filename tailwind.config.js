const defaultTheme = require('tailwindcss/defaultTheme');
require('dotenv').config();
const primary_color = process.env.PRIMARY_COLOR;
const secondary_color = process.env.SECONDARY_COLOR;

module.exports = {
    purge: [
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: primary_color,
                secondary: secondary_color,
                facebook: '#4267B2',
                twitter: '#1DA1F2',
                instagram: '#C13584',
                youtube: '#FF0000'
            },
            spacing: {
                112: '28rem',
                128: '32rem',
            }
        },
    },

    variants: {
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },

    plugins: [require('@tailwindcss/ui')],
};
