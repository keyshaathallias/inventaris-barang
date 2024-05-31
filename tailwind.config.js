/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif']
      },
      colors: {
        primary: '#555FB8',
        secondary: '#BBC0F2',
        light: '#E6E6FA',
        dark: '#3C4381',
        gray: '#64748B'
      },
    },
  },
  plugins: [],
}

