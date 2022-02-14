# PHP JSON-G

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-github-actions]][link-github-actions]
[![Style CI][ico-styleci]][link-styleci]
[![Total Downloads][ico-downloads]][link-downloads]
[![Buy us a tree][ico-treeware-gifting]][link-treeware-gifting]

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

```shell
composer test
```

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security

If you discover any security related issues, please email security@voke.dev instead of using the issue tracker.

## Credits

- [Owen Voke][link-author]
- [RaidAndFade](https://git.gocode.it/RaidAndFade/PHP_json-g)
- [All Contributors][link-contributors]

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

## Treeware

You're free to use this package, but if it makes it to your production environment you are required to buy the world a tree.

It’s now common knowledge that one of the best tools to tackle the climate crisis and keep our temperatures from rising above 1.5C is to plant trees. If you support this package and contribute to the Treeware forest you’ll be creating employment for local families and restoring wildlife habitats.

You can buy trees [here][link-treeware-gifting].

Read more about Treeware at [treeware.earth][link-treeware].

[ico-version]: https://img.shields.io/packagist/v/pxgamer/json-g.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-github-actions]: https://img.shields.io/github/workflow/status/pxgamer/php-json-g/Tests.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/107679531/shield
[ico-downloads]: https://img.shields.io/packagist/dt/pxgamer/json-g.svg?style=flat-square
[ico-treeware-gifting]: https://img.shields.io/badge/Treeware-%F0%9F%8C%B3-lightgreen?style=flat-square

[link-packagist]: https://packagist.org/packages/pxgamer/json-g
[link-github-actions]: https://github.com/pxgamer/php-json-g/actions
[link-styleci]: https://styleci.io/repos/107679531
[link-downloads]: https://packagist.org/packages/pxgamer/json-g
[link-treeware]: https://treeware.earth
[link-treeware-gifting]: https://ecologi.com/owenvoke?gift-trees
[link-author]: https://github.com/owenvoke
[link-contributors]: ../../contributors
