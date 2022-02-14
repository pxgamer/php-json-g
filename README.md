# PHP JSON-G

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Style CI][ico-styleci]][link-styleci]
[![Code Coverage][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

A PHP implementation of [JSON-G](https://github.com/Roadcrosser/JSON-G).

## Install

Via Composer

```bash
$ composer require pxgamer/json-g
```

## Usage

Use the `JsonG::toImageBlob()` or `JsonG::toJson()` to convert between a blob and JSON-G.

#### Examples

**Converting an image via POST**

```php
use RaidAndFade\JsonG\JsonG;

$base64 = base64_decode($_POST['in']);

$image = new Imagick();
$image->readimageblob($base64);

$json = JsonG::toJson($image);

header("Content-Type: text/json");
echo $json;
```

**Converting a JSON-G string to image via POST**

```php
use RaidAndFade\JsonG\JsonG;

$jsonArray = json_decode($_POST['in'], true);

$image = JsonG::toImageBlob($jsonArray);

header("Content-Type: image/png");
echo $image;
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Testing

```bash
$ composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) and [CODE_OF_CONDUCT](.github/CODE_OF_CONDUCT.md) for details.

## Security

If you discover any security related issues, please email security@pxgamer.xyz instead of using the issue tracker.

## Credits

- [pxgamer][link-author]
- [RaidAndFade](https://git.gocode.it/RaidAndFade/PHP_json-g)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/pxgamer/json-g.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/pxgamer/php-json-g/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/107679531/shield
[ico-code-quality]: https://img.shields.io/codecov/c/github/pxgamer/php-json-g.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/json-g.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/json-g
[link-travis]: https://travis-ci.org/pxgamer/php-json-g
[link-styleci]: https://styleci.io/repos/107679531
[link-code-quality]: https://codecov.io/gh/pxgamer/php-json-g
[link-downloads]: https://packagist.org/packages/pxgamer/json-g
[link-author]: https://github.com/pxgamer
[link-contributors]: ../../contributors
