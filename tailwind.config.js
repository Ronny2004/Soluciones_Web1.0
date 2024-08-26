/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./resources/**/*.php", // Asegúrate de incluir cualquier otro tipo de archivo que use Tailwind CSS
  ],
  theme: {
    extend: {
      colors: {
        // Define colores personalizados si es necesario
        primary: '#1D4ED8', // Azul oscuro
        secondary: '#3B82F6', // Azul medio
        accent: '#F59E0B', // Amarillo
        background: '#F3F4F6', // Gris claro
        textPrimary: '#111827', // Gris oscuro
        textSecondary: '#6B7280', // Gris medio
      },
    },
  },
  plugins: [],
}
