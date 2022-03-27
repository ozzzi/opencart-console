# Console tool for OpenCart

## Features
- Clear system cache
- Clear image cache
- Clear modification cache
- Generate fake data: categories and products

## Installation
Create in root directory the file **console** with such code

```php 
#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/config.php';

use Ozzzi\Console\App;

(new App())->run();
```

Install the package

```
composer require ozzzi/opencart-console
```

## Usage

Available commands 
```
php console
```

Clear system cache
```
php console cache:clear
```

Clear image cache
```
php console cache:image
```
Clear modification cache
```
php console cache:modification
```
Create fake categories and products
```
php console faker
```