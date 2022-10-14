/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js"

    ],
    darkMode: 'class',

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito',],
            },
        },
    },

    plugins: [require('@tailwindcss/forms'),
                require('flowbite/plugin'),
            ], 
   
        tailwindcss: {},
        autoprefixer: {},
        ...(process.env.NODE_ENV === 'production' ? { cssnano: {} } : {})
    
};
