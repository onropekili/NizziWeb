/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "/resources/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        'dm-sans-bold': ['dm-sans-bold','sans-serif'],
        'dm-sans-medium': ['dm-sans-medium', 'sans-serif'],
        'dm-sans-regular': ['dm-sans-regular', 'sans-serif'],
      },
      colors: {
        // Colores Botones
        NiziViolet:'#7D08F2',
        NiziBlue:'#00C2FF',
        NiziBlue3:'#0500EB',
        // Tarjeta
        NiziBlue1:'#5433FF',
        NiziBlue2:'#20BDFF',
        NiziGreen:'#39EA85',
        //Otros colores
        NiziGray:'#7B7B7B',
        NiziGray1:'#F1F1F1',
        NiziBlue4:'#EEFFFD',
        NiziGreen2:'#09E963',
        NiziBlue5:'#03008C',

        customBlue2: '#00E0F8',
        customGray: '#EAEAEA',
        customGray1: '#FEFEFE',
        customGray2: '#B7B7B7',
        customGray3: '#F0F4FE',
        customGreen1:'#64FFA6',
        customWhite:'#F7F5FB',
      },
      fontSize: {
        'text10':'10px',
        'text13':'13px',
        'text22':'22px',
      },
      height:{
        'contenedor1':'798px',
        'contenedor2':'650px',
        'contenedor3':'340px',
        'contenedor4':'400px',
        'contenedor5':'550px',
        'contenedor6':'700px',
        'contenedor7':'600px',
        'contenedormapa':'350px',
        'contenedormapa1':'550px',
        'contenedormapa2':'700px',
        'tarjeta':'260px',
        '85':'360px'
      },
      width:{
        'contenedorsmall':'120px',
        'tarjeta':'505px',
      }
    },
  },
  plugins: [],
}
