# Develo Design - FACT-Finder Hyvä Compat Module

## Overview
A Magento 2 module that adds Hyvä compatibility to the [FACT-Finder-Web-Components/magento2-module](https://github.com/FACT-Finder-Web-Components/magento2-module) /  [omikron/magento2-factfinder](https://github.com/FACT-Finder-Web-Components/magento2-module) compatibility* for [Hvyä Themes](https://hyva.io/) projects.

> *Note: this is purely a compatibility project, not a full reimplementation.

## Requirements
Magento 2 with a version of [Hyvä Themes](https://docs.hyva.io/). You will then need to install and setup [FACT-Finder-Web-Components/magento2-module](https://github.com/FACT-Finder-Web-Components/magento2-module) before continuing.

## Features
* Adding FACT-Finder search form wrapper to the default search block in the header.
* Load FACT-Finder JS without the need for requirejs.
* Load FACT-Finder CSS.

## Compatibility
Magento 2.4.2 (Open Source or Commerce), PHP 7.4 are recommended as a minimum*. You'll also need a version of [Hyvä Themes](https://docs.hyva.io/).

> *2.4.0/2.4.1 (or patch versions) and PHP 7.3 may work, but have not been tested, nor will they be supported.

## Installation / Configuration
 
1. Install via composer
```
composer require develo/module-factfinderhyvacompat
```

2. Enable the module
```
bin/magento module:enable Develo_FactfinderHyvaCompat
```

3. Run setup:upgrade
```
bin/magento setup:upgrade
```

4. Flush the cache
```
bin/magento cache:flush
```

5. Copy the CSS to your projects Hyvä based theme
```
cp vendor/develo/module-factfinderhyvacompat/view/frontend/web/tailwind/factfinder-bridge/ {PATH_TO_YOUR_THEME}/web/tailwind/theme/factfinder-bridge/
```
> Note: Any styling changes you would like to make to the FACT-Finder, do so within the {PATH_TO_YOUR_THEME}/web/tailwind/theme/factfinder-bridge/ folder.

6. Add CSS to your Tailwind CSS output
   Edit the `{PATH_TO_YOUR_THEME}/web/tailwind/tailwind-source.css` file and import the above CSS file by adding `@import url(theme/factfinder-bridge/import.css);` **after** the line containing the `/* purgecss start ignore */` comment but **before** the line containing the `/* purgecss end ignore */` comment.

> Note: It is important you add this between the comments stated above otherwise they may not be included once purged as FACT-Finder classes are dynamically added via JS to elements on the page.

7. Rebuild Tailwind CSS output

From the `{PATH_TO_YOUR_THEME}/web/tailwind` directory, run either of the below based on your target environment.

For development
```
npm run build-dev
```

For production
```
npm run build-prod
```

## FAQ
* > Error: Call to a member function isSuggestionsAllowed() on null
    * This is fixed by installing and fully setting up (including FACT-Finder API credentials) the [FACT-Finder-Web-Components/magento2-module](https://github.com/FACT-Finder-Web-Components/magento2-module) first **before installing this compat module.**
