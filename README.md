# Wordpress Acorn Blocks Boilerplate

Boilerplate for building WordPress server-rendered blocks using Acorn (Laravel-style), Livewire, and acorn-fse-helper.

Example project structure:

```
acorn-blocks/
├─ acorn-blocks.php
├─ composer.json
├─ blocks/               # block.json, edit.js, index.js per block
│   ├─ hero/
│   │   └─ block.json
│   ├─ testimonial/
│   │   └─ block.json
│   └─ counter/
│       └─ block.json
├─ app/Blocks/
│       ├─ Hero.php      # The block Class.
│       ├─ Testimonial.php
│       └─ Counter.php
├─ resources/views/blocks
|                   ├─ hero.blade.php
|                   ├─ testimonial.blade.php
|                   └─ counter.blade.php
└─ assets/
    ├─ hero.js
    ├─ testimonial.js
    └─ counter.js
```

### Requirements

- PHP, Composer, Node.js + npm/yarn
- WordPress with Acorn available (or locally via the included `vendor/bin/acorn`)

### Installation

1. Install PHP dependencies:

```bash
composer install
```

2. Install JS dependencies and build assets:

```bash
npm install
npm run dev   # or `npm run build` for production
```

3. Generate an application key required by Livewire / Acorn:

```bash
wp acorn key:generate
```
4. Generate Storage (make sure first the plugin is running and activated on Wordpress):
```bash
wp acorn acorn:init storage
```
### Testing and viewing blocks

Blocks appear in the WordPress editor's block inserter — select a block and add it to a post or page.

### Development

- Use Acorn's commands via `wp acorn` or the bundled `vendor/bin/acorn` when WordPress is available. Acorn expect this plugin to be up and running in Wordpress enviroment for the command to run.
- Edit blocks under `blocks/` and server-rendered templates under `resources/views/blocks/`.

Logging

- The logging configuration is in [config/logging.php](config/logging.php).
- Logs may be written to `storage/logs/` (Laravel-style) or the top-level `logs/` folder depending on configuration.
- To enable daily log rotation, set the channel in [config/logging.php](config/logging.php) to `daily` and configure `days` as needed.
- Tail logs locally:

```bash
tail -f storage/logs/laravel.log
```

Contributing

- Open issues and pull requests are welcome. Keep changes focused and documented.


