/** @type {import('tailwindcss').Config} */
export default {
  content: [
      './resources/**/**.blade.php',
      './resources/**/*.js',
      './resources/**/*.vue',
      /*TODO: If tailwind isn't work on .php files add .php*/
  ],
    theme: {
    extend: {},
  },
    plugins: [],
    corePlugins: {
      preflight: false,
  },
}

