var express = require('express');
var rewrite = require('express-urlrewrite');
var app = express();

app.use(rewrite('/dist/*', '/dev/$1'));
app.use(express.static('./'));

app.listen(8080, () => console.log('Dev server listening on port 8080!'))