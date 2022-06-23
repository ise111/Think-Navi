const { colors } = require('laravel-mix/src/Log');

module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
    './resources/css/**/*.css',
  ],
  theme: {
    extend: {},
  },
  variants: {},
  plugins: [
    require('@tailwindcss/ui'),
    // require('flowbite/plugin')
  ]
}
