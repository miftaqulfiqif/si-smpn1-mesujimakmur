import defaultTheme from "tailwindcss/defaultTheme";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },
    daisyui: {
        themes: [
            {
                mytheme: {
                    primary: "#1d4ed8",

                    secondary: "#9ca3af",

                    accent: "#fb923c",

                    neutral: "#67e8f9",

                    "base-100": "#f3f4f6",

                    info: "#3b82f6",

                    success: "#16a34a",

                    warning: "#fde047",

                    error: "#ff0000",
                },
            },
        ],
    },
    plugins: [require("daisyui")],
};
