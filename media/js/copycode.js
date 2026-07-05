/**
 * @package     Joomla.Plugin
 * @subpackage  System.copycode
 *
 * @copyright   (C) 2026 Brian Teeman.
 * @license     GNU General Public License version 2 or later
 */
const COPY_ICON = `
<svg viewBox="0 0 24 24" width="16" height="16">
    <path fill="currentColor" d="M16 1H4C2.9 1 2 1.9 2 3v14h2V3h12V1zm3 4H8C6.9 5 6 5.9 6 7v14c0 1.1.9 2 2 2h11c1.1 0 2-.9 2-2V7c0-1.1-.9-2-2-2zm0 16H8V7h11v14z"/>
</svg>`;

const CHECK_ICON = `
<svg viewBox="0 0 24 24" width="16" height="16">
    <path fill="currentColor" d="M9 16.2 4.8 12l-1.4 1.4L9 19 21 7l-1.4-1.4z"/>
</svg>`;

class CopyCode {

    constructor() {
        this.init();
    }

    init() {
        document.querySelectorAll('pre > code').forEach(code => {
            const pre = code.parentElement;

            if (pre.dataset.copyInit) return;
            pre.dataset.copyInit = "1";

            const wrapper = document.createElement('div');
            wrapper.className = 'copy-code-wrapper';

            pre.parentNode.insertBefore(wrapper, pre);
            wrapper.appendChild(pre);

            const button = document.createElement('button');
            button.type = 'button';
            button.className = 'copy-code-button';

            const icon = document.createElement('span');
            icon.className = 'copy-icon';
            icon.innerHTML = COPY_ICON;

            const text = document.createElement('span');
            text.className = 'copy-text';
            text.textContent = 'Copy';

            button.appendChild(icon);
            button.appendChild(text);

            button.addEventListener('click', async () => {
                try {
                    await navigator.clipboard.writeText(code.textContent);

                    icon.innerHTML = CHECK_ICON;
                    text.textContent = 'Copied';

                    setTimeout(() => {
                        icon.innerHTML = COPY_ICON;
                        text.textContent = 'Copy';
                    }, 2000);

                } catch (e) {
                    text.textContent = 'Failed';

                    setTimeout(() => {
                        text.textContent = 'Copy';
                    }, 2000);
                }
            });

            wrapper.appendChild(button);
        });
    }
}

document.addEventListener('DOMContentLoaded', () => new CopyCode());