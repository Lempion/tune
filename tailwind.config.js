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
                'pink-1': '0 4px 4px rgba(250,158,240, 1)',
                'pink-2': '0 4px 2px rgba(250,158,240, 1)',
                'red-1': '0 4px 3px rgba(222, 38, 56, 0.4)',
                'red-2': '0 4px 2px rgba(222, 38, 56, 0.6)',
                'blue-1': '0 4px 3px rgba(85, 146, 242, 0.4)',
                'blue-2': '0 4px 2px rgba(85, 146, 242, 0.6)',
                'gray-1': '0 4px 3px rgba(55, 65 ,81 , 0.4)',
                'gray-2': '0 4px 2px rgba(55, 65 ,81 , 0.4)',
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

