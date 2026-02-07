import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    dark: '#0B1F2A',
                    midnight: '#0F2C3F',
                    teal: '#0A3D62',
                },
                metallic: {
                    silver: '#BFC9CA',
                    platinum: '#E5E8E8',
                },
                accent: {
                    gold: '#C9A24D',
                    cyan: '#1ABCFE',
                }
            },
            backgroundImage: {
                'hero-gradient': 'linear-gradient(135deg, #0B1F2A, #0F2C3F, #0A3D62)',
                'accent-gradient': 'linear-gradient(135deg, #C9A24D, #F5D76E)',
                'button-gradient': 'linear-gradient(135deg, #1ABCFE, #0A3D62)',
            }
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
};
