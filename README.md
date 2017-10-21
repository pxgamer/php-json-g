# PHP JSON-G

A PHP implementation of [JSON-G](https://github.com/Roadcrosser/JSON-G).

## Usage

Include the package using Composer:  
`composer require pxgamer/json-g`

Use the `JsonG::toImageBlob()` or `JsonG::toJson()` to convert between a blob and JSON-G.

## Examples

**Converting an image via POST**
```php
$base64 = base64_decode($_POST['in']);

$image = new Imagick();
$image->readimageblob($base64);

$json = JsonG::toJson($image);

header("Content-Type: text/json");
echo $json;
```

**Converting a JSON-G string to image via POST**
```php
$jsonArray = json_decode($_POST['in'], true);

$image = JsonG::toImageBlob($jsonArray);

header("Content-Type: image/png");
echo $image;
```

## Original Repository

https://git.gocode.it/RaidAndFade/PHP_json-g
