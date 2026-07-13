/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
  ],
  theme: {
    extend: {
      fontFamily: {
        display: ['Oswald', 'sans-serif'],
        body:    ['Poppins', 'sans-serif'],
      },
      colors: {
        'film-red':   '#E50914',
        'film-black': '#0a0a0a',
        'film-dark':  '#111111',
        'film-card':  '#161616',
        'tp-red':     '#ce2d33',
      },
      keyframes: {
        heroTextReveal: {
          to: { opacity: '1', transform: 'translateY(0)' },
        },
        scrollHintBounce: {
          '0%, 20%, 50%, 80%, 100%': { transform: 'translateX(-50%) translateY(0)' },
          '40%': { transform: 'translateX(-50%) translateY(-10px)' },
          '60%': { transform: 'translateX(-50%) translateY(-5px)' },
        },
        marqueeScroll: {
          '0%': { transform: 'translateX(0)' },
          '100%': { transform: 'translateX(-50%)' },
        },
      },
      animation: {
        'hero-reveal': 'heroTextReveal 1.2s cubic-bezier(0.165, 0.84, 0.44, 1) forwards',
        'scroll-hint': 'scrollHintBounce 2s infinite',
        'marquee-fast': 'marqueeScroll 30s linear infinite',
        'marquee-slow': 'marqueeScroll 60s linear infinite',
      },
    },
  },
  plugins: [],
}
