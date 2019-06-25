const autoprefixer = require('autoprefixer');

module.exports = {
    syntax: 'postcss-scss',
    plugins: [
        require('tailwindcss'),
        autoprefixer({
            add: true,
            grid: true
        }),
    ]
}
