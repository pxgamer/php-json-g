# PHP JSON-G

A PHP implementation of [JSON-G](https://github.com/Roadcrosser/JSON-G).

## Usage

Include the package using Composer:  
`composer require pxgamer/json-g`

Use the `JsonG::toImageBlob()` or `JsonG::toJson()` to convert between a blob and JSON-G.

## Examples

**Converting an image via POST**
```php
$b64 = base64_decode($_POST['in']);

$im = new Imagick();
$im->readimageblob($b64);

$js = JsonG::toJson($im);

header("Content-Type: text/json");
echo $im;
```

**Converting a JSON-G string to image via POST**
```php
json_decode($_POST['in'], true);

$im = JsonG::toImageBlob();

header("Content-Type: image/png");
echo $im;
```

## Original Repository

https://git.gocode.it/RaidAndFade/PHP_json-g
