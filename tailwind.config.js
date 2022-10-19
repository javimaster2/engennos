const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
           
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'bluee':'#033142',
                'bluelogo':'#02599cff',
            },
            height:{
                '640':'40rem',
                '520':'32.5rem',
            },
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['checked','active'],
        },
    },

    corePlugins: {
        // ...
       container: false,
      },
  

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
