/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./*.html"],
  theme: {
    extend: {
      colors: {
        'bgnerdx-gray': '#F9FBFF',
        'nerdx-green': '#53B36A',
        'nerdx-blue' : '#192740'
      },
      backgroundImage: {
        'hero-pattern': "url('../assets/motif.png')",
        'first-formation-patern' : "url('../assets/closeup-shot-pretty-young-afro-american-female-looking-excitedly-her-laptop-screen 2.png')"
      },
      backgroundSize: {
        '50%': '50%'
      }
    },
  },
  plugins: [],
}

