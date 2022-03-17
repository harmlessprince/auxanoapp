const defaultTheme = require("tailwindcss/defaultTheme");
const colors = require("tailwindcss/colors");
console.log(colors.cyan);
module.exports = {
    mode: "jit",
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/views/*.blade.php",
        "./resources/js/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Nunito", ...defaultTheme.fontFamily.sans],
            },
            colors: {},
            opacity: ["disabled"],
            cursor: ["disabled"],
        },
    },
    plugins: [require("@tailwindcss/forms"), require('tailwind-scrollbar')],

};
