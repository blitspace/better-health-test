import React from 'react';
import ReactDOM from 'react-dom';
import App from './App';

document.addEventListener('DOMContentLoaded', function () {
    const rootElement = document.getElementById('betterhealth-react-app');

    if (rootElement) {
        ReactDOM.render(<App />, rootElement);
    }
});
