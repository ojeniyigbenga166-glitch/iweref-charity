const fs = require('fs');
const stylePath = 'c:\\Users\\Administrator\\Desktop\\charity\\iwef-website\\css\\style.css';
const appendPath = 'c:\\Users\\Administrator\\Desktop\\charity\\append.css';

const appendData = fs.readFileSync(appendPath, 'utf8');
fs.appendFileSync(stylePath, '\n' + appendData);
console.log('Successfully appended CSS.');
