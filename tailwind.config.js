/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            dropShadow: {
                'pink': '0 4px 4px rgba(250,158,240, 1)',
            },
            strokeWidth: {
                '0.5': '0.5px'
            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
}

