/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            screens: {
                xs: "475px",
                ...require("tailwindcss/defaultTheme").screens,
            },
        },
    },
    plugins: [],
};
