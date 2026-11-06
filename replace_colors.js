const fs = require('fs');
const path = require('path');

const cssFile = 'c:\\Users\\Administrator\\Desktop\\charity\\iwef-website\\css\\style.css';
let css = fs.readFileSync(cssFile, 'utf8');

const replacements = [
    // Variables
    { search: /#2E7D32/gi, replace: '#26C6DA' },
    { search: /46,\s*125,\s*50/g, replace: '38, 198, 218' }, // primary rgb
    
    { search: /#65B307/gi, replace: '#7FDBF0' }, // light green to light cyan
    { search: /101,\s*179,\s*7/g, replace: '127, 219, 240' },
    
    { search: /#1B5E20/gi, replace: '#0F4C5C' }, // dark green to deep teal
    { search: /27,\s*94,\s*32/g, replace: '15, 76, 92' },
    
    { search: /#F4C430/gi, replace: '#7FDBF0' }, // yellow accent to light cyan
    { search: /#E5B218/gi, replace: '#4ED1EB' }, // dark yellow to darker light cyan
    
    { search: /#F8F9F2/gi, replace: '#F8FCFD' }, // bg
    
    { search: /#19351D/gi, replace: '#0F4C5C' }, // dark text to deep teal (user asked for deep teal for dark sections, navigation when sticky, etc, but maybe dark text #1E293B for general text)
    // Let's use #1E293B for dark text as user specified
    
    { search: /25,\s*53,\s*29/g, replace: '15, 76, 92' }, // rgb(25, 53, 29) was used for hero overlay and shadows. User says use Deep Teal (#0F4C5C -> 15, 76, 92) for hero overlays, footer, dark sections.
    
    { search: /#5A745F/gi, replace: '#475569' }, // muted text
    
    { search: /#0B190E/gi, replace: '#1E293B' }, // black
    { search: /11,\s*25,\s*14/g, replace: '30, 41, 59' }, // rgb black
];

// Refine text replacements based on prompt:
// Dark Text: #1E293B
css = css.replace(/#19351D/gi, '#1E293B');

replacements.forEach(r => {
    css = css.replace(r.search, r.replace);
});

// Update root variables names if necessary, but it's easier to keep them as is and just change values to not break HTML inline usage or JS.
// Wait, the variable is called --color-light-green. We might want to rename it to --color-light-cyan.
css = css.replace(/--color-light-green/g, '--color-light-cyan');

fs.writeFileSync(cssFile, css);
console.log('CSS colors replaced successfully.');
