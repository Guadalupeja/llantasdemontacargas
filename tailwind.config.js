/** @type {import('tailwindcss').Config} */
import defaultTheme from 'tailwindcss/defaultTheme'

export default {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './resources/**/*.vue',

  ],
  theme: {
    extend: {
      fontFamily: {
        // Cuerpo / UI
        sans: ['"Roboto Variable"', 'Roboto', ...defaultTheme.fontFamily.sans],
        // Títulos (slab)
        slab: ['"Roboto Slab Variable"', 'Roboto Slab', 'serif'],
      },
    },
  },
  plugins: [],
}

