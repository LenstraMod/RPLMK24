/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
        fontFamily:{
        'poppins':['Poppins','sans-serif'],
        'honk' : ['Honk','system-ui'],
    },
    boxShadow: {
        'profile': '2px 5px 5px 5px rgba(0, 0, 0, 0.3)',
      }
    }
  },
  plugins: [],
}