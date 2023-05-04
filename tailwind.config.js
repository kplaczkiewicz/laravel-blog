/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
    ],
    theme: {
        extend: {},
    },
    daisyui: {
        themes: [
            {
                lofi: {
                    ...require('daisyui/src/colors/themes')['[data-theme=lofi]'],
                    error: 'hsl(0, 91%, 71%)',
                },
            },
        ],
    },
    plugins: [
        require('@tailwindcss/typography'),
        require('@tailwindcss/forms'),
        require('daisyui'),
    ],
};
