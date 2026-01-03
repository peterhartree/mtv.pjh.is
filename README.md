# PHP Blog Template

A minimal, file-based PHP blog. No database, no build tools. Just markdown files and PHP.

## Features

- Static markdown content with YAML-style frontmatter
- Tag-based organisation
- Client-side search on archives page
- Responsive design
- Draft support (prefix filename with `_`)

## Quick start

1. **Clone and configure:**
   ```bash
   git clone https://github.com/HartreeWorks/blog-template.git my-blog
   cd my-blog
   cp htdocs/includes/config.example.php htdocs/includes/config.php
   ```

2. **Edit config.php** with your site details (title, URL, description)

3. **Run local dev server:**
   ```bash
   php -S localhost:8888 -t htdocs htdocs/router.php
   ```

4. **Create posts** in `htdocs/data/posts/` as markdown files:
   ```markdown
   Tags: Topic, Another Tag
   Date: 2024-01-15

   # Post title

   Post content here...
   ```

## Directory structure

```
htdocs/
├── includes/
│   ├── config.php           # Your site config (create from config.example.php)
│   ├── config.example.php   # Template config
│   ├── functions.php        # Core functions
│   ├── functions.site.php   # Your site-specific functions (optional)
│   ├── header.php
│   ├── footer.php
│   └── Parsedown.php
├── css/
│   ├── style.css            # Base styles
│   └── style.site.css       # Your site-specific styles (optional)
├── js/
│   └── search.js
├── data/
│   ├── posts/               # Your markdown posts
│   └── pages/
│       └── About.md
├── index.php
├── post.php
├── archives.php
├── tagged.php
├── about.php
├── router.php               # Local dev server router
└── .htaccess                # Production URL routing
```

## Customisation

### Site-specific functions

Create `htdocs/includes/functions.site.php` to add custom functionality. You can override the `processPostHtml()` function to transform post HTML after markdown parsing:

```php
<?php
/**
 * Process post HTML after markdown parsing
 * This is called for every post's HTML content
 */
function processPostHtml($html) {
    // Example: convert YouTube URLs to embeds
    // $html = convertYouTubeEmbeds($html);
    return $html;
}
```

### Site-specific styles

Create `htdocs/css/style.site.css` to add custom styles. This file is automatically loaded after the base stylesheet.

## Updating from template

If you started from this template and want to pull updates:

```bash
# Add template as a remote (one-time)
git remote add template https://github.com/HartreeWorks/blog-template.git

# Fetch and merge template updates
git fetch template
git merge template/main
```

Your site-specific files (`config.php`, `functions.site.php`, `style.site.css`, `data/posts/*`) are gitignored in the template, so they won't conflict.

## Deployment

### git-ftp

Add to `.git/config`:

```ini
[git-ftp]
    url = ftp://your-host.com/public_html
    user = your-username
    password = your-password
    syncroot = htdocs
```

Then deploy with:

```bash
git ftp push
```

### Manual

Upload the contents of `htdocs/` to your web server. Ensure Apache mod_rewrite is enabled for clean URLs.

## Post format

```markdown
Tags: Tag One, Tag Two
Date: 2024-01-15

# Post title

Your markdown content here. Links, **bold**, *italic*, code blocks, etc.
```

- **Tags:** Comma-separated list
- **Date:** YYYY-MM-DD format (optional time as HHMM or HH:MM)
- **Title:** First `# Heading` becomes the post title and URL slug
- **Drafts:** Prefix filename with `_` to hide from public listings

## Licence

MIT
