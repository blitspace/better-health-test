export function normalizeText(text) {
    return text.toLowerCase().trim().replace(' ', '-');
}

export function capitalizeFirstLetter(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
}
