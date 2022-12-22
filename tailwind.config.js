/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./**/*.{html,php,js}"],
  theme: {
    extend: {},
  },
  plugins: [],
}


///npx tailwindcss build -i ./assets/css/sisepp_input.css -o ./assets/css/sisepp_output.css --watch