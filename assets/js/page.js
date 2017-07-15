// I love ES8 <3
// Safari is silly. IE is more sillier. <insertBrowserWhichIsNotSupportingMyCodestyle> is the silliest.

/**
 * Holds my discord user id
 */
const userID = 'jens1o#4193';

/**
 * Returns the element that has the given id, or null on failure.
 *
 * @param {string} id
 * @return {HTMLElement|null}
 */
function eleById(id) {
    return document.getElementById(id);
}

let discordEle = eleById('discord-copy');

if(!discordEle) throw new Error('The element where I should insert an event listener does not exist :(');

discordEle.addEventListener('copy', e => {
    e.clipboardData.setData('text/plain', userID);
    e.clipboardData.setData('text/html', userID);
    e.preventDefault();

    discordEle.children[0].textContent = 'copied...';
    setTimeout(() => {
        discordEle.children[0].textContent = 'discrd';
    }, 3500);
});

discordEle.addEventListener('click', () => document.execCommand('copy'));