/**
 * Preflight-free Tailwind build. Output is css/shared.css, which the layout loads
 * on EVERY page, so anything listed in `content` below can use Tailwind utilities.
 *
 * The main tailwind.config.js emits `@tailwind base` (preflight), which resets
 * heading sizes and list/paragraph margins. That is correct for pages written
 * against it (about, real-estate-ads), but dropping it on a legacy Bootstrap page
 * flattens its <h2>/<h3> to body size and strips <p> margins. Hence this second
 * build: utilities only, safe to mix with Bootstrap and style.css.
 *
 * To Tailwind-ify another legacy page, add it to `content` here -- do NOT link
 * css/app.css into it, or preflight will come along and restyle the page.
 * Trade-off: shared.css is global, so every page pays for the utilities added.
 *
 * @type {import('tailwindcss').Config}
 */
module.exports = {
  corePlugins: {
    preflight: false,
  },
  content: [
    // Shared partials, on every page.
    './resources/views/inc/**/*.blade.php',
    './resources/views/layout/**/*.blade.php',
    // Legacy pages progressively adopting Tailwind utilities.
    './resources/views/visitors/services.blade.php',
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
