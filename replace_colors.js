const fs = require('fs');
const path = require('path');

const filesToUpdate = [
    'assets/css/shop.css',
    'assets/css/cart.css',
    'assets/css/checkout.css',
    'assets/css/product.css',
    'assets/css/main.css'
];

const colorMap = {
    '#22c55e': '#E6007E', // Accent / Green -> Magenta
    '#a3e635': '#7C3AED', // Accent Hover / Light Green -> Purple
    '#111827': '#141217', // Text Primary -> Near Black
    '#0b0f0d': '#141217', // Navy -> Near Black
    '#123d2a': '#E6007E', // Navy Light -> Magenta
    '#6b7280': '#6F625D', // Text Secondary
    '#9ca3af': '#5E5363', // Text Muted
    '#e5e7eb': '#EEE5EF', // Border
    '#f7f8f5': '#F6F5F7', // Background Subtle
    'rgba(34, 197, 94': 'rgba(230, 0, 126', // #22C55E rgb
    'rgba(17, 24, 39': 'rgba(20, 18, 23', // #111827 rgb
    'rgba(11, 15, 13': 'rgba(20, 18, 23' // #0B0F0D rgb
};

const baseDir = 'c:\\xampp\\htdocs\\wp-content\\themes\\da_theme';

filesToUpdate.forEach(file => {
    const filePath = path.join(baseDir, file);
    if (!fs.existsSync(filePath)) {
        console.log(`File not found: ${filePath}`);
        return;
    }

    let content = fs.readFileSync(filePath, 'utf8');
    let originalContent = content;

    for (const [oldColor, newColor] of Object.entries(colorMap)) {
        const regex = new RegExp(oldColor, 'gi');
        content = content.replace(regex, newColor);
    }

    if (content !== originalContent) {
        fs.writeFileSync(filePath, content, 'utf8');
        console.log(`Updated colors in ${file}`);
    } else {
        console.log(`No colors to update in ${file}`);
    }
});
