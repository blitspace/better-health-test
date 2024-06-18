import React from 'react';
import { createRoot } from 'react-dom/client';
import App from './App';

import './style.css';


document.addEventListener('DOMContentLoaded', function () {
    const rootElement = document.getElementById('betterhealth-react-app');

    if (rootElement) {
        const root = createRoot(rootElement);
        root.render(<App />);
    }
});
