// Determines if the string is url
// str - the string to check
function isUrl(str) {
    let url_string;
    try {
        url_string = new URL(str);
    } catch (_) {
        return false;
    }
    return url_string.protocol === "http:" || url_string.protocol === "https:";
}
