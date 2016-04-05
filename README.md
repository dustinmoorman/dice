Dice!
=======
Simple dice application, allows you to roll n number of multi-sided die.

## installation
```bash
bourbon:dice dustin$ curl -sS http://getcomposer.org/installer | php
bourbon:dice dustin$ php composer.phar install
```

## usage
```bash
bourbon:dice dustin$ ./bin/roll 10d35
[6, 15, 19, 1, 12, 21, 23, 24, 29, 1]
```

## testing
```bash
bourbon:dice dustin$ ./vendor/bin/phpunit tests/
```
