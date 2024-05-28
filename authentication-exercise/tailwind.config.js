/** @type {import('tailwindcss').Config} */
export default {
    corePlugins: {
        preflight: false
    },
  content: [
      "./resources/**/**.blade.php",
      "./resources/**/*.js",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
