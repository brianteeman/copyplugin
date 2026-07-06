# CopyCode

A lightweight Joomla 6 system plugin that automatically adds a **Copy** button to code snippets in your articles, making it easy for visitors to copy code to their clipboard with a single click.

Perfect for documentation sites, tutorials, developer blogs, and any website that publishes code examples.

## Features

- Automatically adds a copy button to code blocks
- Uses the modern Clipboard API
- No content changes required
- Lightweight with no external dependencies
- Uses Joomla language strings for button text
- Compatible with Joomla 6
- Loads assets only on the site frontend

## Requirements

- Joomla 6.1 or later
- A modern browser with Clipboard API support

## Installation

1. Download the latest release.
2. In the Joomla Administrator, go to **System → Install → Extensions**.
3. Upload the plugin package.
4. Enable the **System - CopyCode** plugin.

## Usage

Simply add code to your articles using the standard HTML markup:

```html
<pre><code>
echo "Hello World";
</code></pre>
```

When the page is displayed, the plugin automatically adds a copy button to each code block.

No additional editor plugin or custom markup is required.

## Configuration

The plugin has no configuration options.

Enable it and it works automatically.

## Language Strings

The plugin includes language strings for:

- Copy
- Copied
- Copy failed

These can be overridden using Joomla's standard Language Overrides feature.

## Browser Support

The plugin uses the Clipboard API, which is supported by all current major browsers.

Older browsers that do not support the Clipboard API will simply be unable to copy the code.

## License

GNU General Public License version 2 or later.

