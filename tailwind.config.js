import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/* @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/protonemedia/laravel-splade/lib/**/*.vue",
        "./vendor/protonemedia/laravel-splade/resources/views/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.vue",
        // "./app/Forms/*.php",
        // "./app/Tables/*.php",
    ],

    theme: {
        extend: {
            colors: {
                putih: '#ebeff2',
                hijau: '#0abf7d',
                hitam: '#333140',
                biru: '#1ba0f2'
              },
        },
        container:{
            center: true,
            padding: {
              DEFAULT: '20px',
              md: "55px"
            }
        },
    },

    plugins: [forms, typography],
};
