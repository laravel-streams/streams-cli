---
title: Entries
category: basics
intro:
sort: 
enabled: true
---

**Validation is ran.**

## Creating Entries

The following will ask for input following the stream's configuration.

```bash
php artisan entries:create planets
```

Passing an input string.

```bash
php artisan entries:create planets 'id=hoth&name=Hoth&orbital_period=549'
```

Passing JSON input.

```bash
php artisan entries:create planets '{"id":"hoth","name":"Hoth","orbital_period":"549"}' // @todo
php artisan entries:create planets --json='{"id":"hoth","name":"Hoth","orbital_period":"549"}'
```

## Updating Entries

```bash
php artisan entries:update planets hoth
php artisan entries:update planets hoth 'name=Hoth&orbital_period=549'
php artisan entries:update planets hoth '{"name":"Hoth","orbital_period":"549"}' // @todo
php artisan entries:update planets hoth --json='{"name":"Hoth","orbital_period":"549"}'
```
