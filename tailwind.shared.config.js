/**
 * Tailwind build for partials shared by EVERY page (footer, and later the header).
 *
 * The main tailwind.config.js emits `@tailwind base` (preflight), which resets
 * heading sizes and list/paragraph margins. That is fine on the two pages built
 * against it, but loading it site-wide would land on top of Bootstrap 5 and
 * restyle ~38 legacy pages. So this build ships utilities only, no preflight --
 * which means shared markup must spell out resets it needs (list-none, pl-0, m-0).
 *
 * @type {import('tailwindcss').Config}
 */
module.exports = {
  corePlugins: {
    preflight: false,
  },
  content: [
    './resources/views/inc/**/*.blade.php',
    './resources/views/layout/**/*.blade.php',
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ['Oswald', 'sans-serif'],
        body:    ['Poppins', 'sans-serif'],
      },
      colors: {
        'tp-red': '#ce2d33',
      },
    },
  },
  plugins: [],
}
