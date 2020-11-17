let mix = require('laravel-mix');

const path = process.env.NODE_ENV === 'production' ? 'dist' : 'dev';

mix.options({
  cleanCss: {
    level: {
      1: {
        specialComments: 'none'
      }
    }
  }
});


mix.js('src/js/vendor.js', `${path}/js`)
   .js('src/js/adminx.js', `${path}/js`)
   .js('src/js/adminx.vanilla.js', `${path}/js`)
   .js('src/js/demo.js', `${path}/js`)

   .sass('src/scss/adminx.scss', `${path}/css`, { outputStyle: 'compressed', comments: false })
   .options({
      processCssUrls: false
   })

   .copyDirectory('src/media', `${path}/media`)

   .copyDirectory('./node_modules/open-iconic/font/fonts', `${path}/fonts/iconic`);

mix.sass('src/scss/demo.scss', 'demo', { outputStyle: 'compressed', comments: false });

mix.browserSync('127.0.0.1:8080');