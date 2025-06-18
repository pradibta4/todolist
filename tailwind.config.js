    /** @type {import('tailwindcss').Config} */
    export default {
      content: [
        './resources/**/*.blade.php', // PASTIKAN BARIS INI ADA
        './resources/**/*.js',
        './resources/**/*.vue',
      ],
      theme: {
        extend: {
          colors: {
            'nugas-bg-dark': '#2D274A',
            'nugas-button': '#443C68',
            'nugas-button-hover': '#281F50',
            'nugas-link': '#6B46C1',
            'nugas-link-hover': '#5A3F99',
          },
        },
      },
      plugins: [],
    }
    