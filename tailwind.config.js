import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: {
                    100: "#FFE3D2",
                    200: "#FFC1A5",
                    300: "#FF9779",
                    400: "#FF6F57",
                    500: "#FF2D20",
                    default: "#FF2D20",
                    600: "#DB171C",
                    700: "#B71022",
                    800: "#930A24",
                    900: "#7A0626",
                },
                success: {
                    100: "#F3FDCE",
                    200: "#E5FB9E",
                    300: "#CFF46D",
                    400: "#B7EA48",
                    500: "#96DD11",
                    600: "#79BE0C",
                    700: "#5F9F08",
                    800: "#488005",
                    900: "#376A03",
                },
                info: {
                    100: "#CCFEFA",
                    200: "#9AFDFD",
                    300: "#67F1FB",
                    400: "#41DEF8",
                    500: "#04C0F4",
                    600: "#0295D1",
                    700: "#0270AF",
                    800: "#01508D",
                    900: "#003975",
                },
                warning: {
                    100: "#FEF4D3",
                    200: "#FDE6A8",
                    300: "#FBD37C",
                    400: "#F8C05B",
                    500: "#F4A227",
                    600: "#D1811C",
                    700: "#AF6413",
                    800: "#8D4A0C",
                    900: "#753707",
                },
                danger: {
                    100: "#FEDCD8",
                    200: "#FEB2B3",
                    300: "#FD8C98",
                    400: "#FB6F8C",
                    500: "#F94078",
                    600: "#D62E71",
                    700: "#B32069",
                    800: "#90145E",
                    900: "#770C56",
                },
                base: {
                    100: "#ffffff",
                    200: "#f1f1f1",
                    light: "#f1f1f1",
                    300: "#e2e2e2",
                    400: "#c4c4c4",
                    500: "#888888",
                    600: "#4d4d4d",
                    700: "#2f2f2f",
                    dark: "#202020",
                    800: "#202020",
                    900: "#111111",
                },
                light: "#f1f1f1",
                muted: "#888888",
                dark: "#202020",
            },
        },
    },

    plugins: [forms],
};
