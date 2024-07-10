/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    ],

    darkMode: 'class',
  theme: {
    extend: {
        colors: {
            primary: '#3940da',
            secondary: '#da8f39',
            accent: '#95da8a',
            default: '#9a9de0',
            muted: '#325651',
            retro: '#e04997',
        },
    },
  },
  plugins: [],
}

