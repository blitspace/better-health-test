const path = require('path');

module.exports = {
    entry: './src/Frontend/src/index.js',
    output: {
        path: path.resolve(__dirname, 'src/Frontend/build'),
        filename: 'bundle.js',
    },
    module: {
        rules: [
        {
            test: /\.js$/,
            exclude: /node_modules/,
            use: {
                loader: 'babel-loader',
                options: {
                    presets: ['@babel/preset-env', '@babel/preset-react'],
                },
            },
        },
        {
            test: /\.css$/i,
            include: path.resolve(__dirname, 'src/Frontend/src'),
            use: ['style-loader', 'css-loader', 'postcss-loader'],
        },
        ],
    },
};
