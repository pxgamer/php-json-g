# Changelog

All notable changes to `php-json-g` will be documented in this file.

Updates should follow the [Keep a CHANGELOG](https://keepachangelog.com) principles.

## Unreleased

## [v2.2.0] - 2022-02-14

### Added
- Add array shaping for static analysis
- Add static analysis testing in CI

### Changed
- Add strict return types for methods
- Replace Travis CI with GitHub Actions

## [v2.1.0] - 2019-03-11

### Added
- Add support for PHPUnit 8 ([#2](https://github.com/pxgamer/php-json-g/pull/2))
- Add missing extension references to the Composer JSON ([b2ee756b](https://github.com/pxgamer/php-json-g/commit/b2ee756b126ed910151e2fe5d25244b89e126cc0))

### Changed
- Update the directory structure formatting ([70dfbf55](https://github.com/pxgamer/php-json-g/commit/70dfbf5536e7d45816c2bbd9c7505676321ece7a))
- Move test resources to the `tests` directory ([dcf5d675](https://github.com/pxgamer/php-json-g/commit/dcf5d675eb490f24b4d39b777099a72c55936826))

### Deprecated
- Remove support for PHP 7.1 ([19d12ecb](https://github.com/pxgamer/php-json-g/commit/19d12ecba15ef32be52c5ee552d28fbec6d99218))

## [v2.0.3] - 2017-12-06

### Added
- Bumped `squizlabs/php_codesniffer` dependency to `^3.1`
- Updated PhpDoc styling
- Added a `ColoursTest` class to get 100% in the Colours coverage

## [v2.0.2] - 2017-12-06

### Fixed
- Changed to legal name in the LICENSE

## [v2.0.1] - 2017-11-20

### Fixed
- Corrected the LICENSE file

## [v2.0.0] - 2017-11-08

### Added
- Added new README style
- Added namespacing for tests
- Added missing OS files

### Fixed
- Fixed the styling using StyleCI and PHP_CodeSniffer
- Fixed TravisCI testing using PECL/Imagick

## v1.0.0 - 2017-10-20

### Added
- Added 2 classes for managing JSON-G image conversion
- Added Composer support
- Added unit testing
- Added namespacing

[v2.2.0]: https://github.com/pxgamer/php-json-g/compare/v2.1.0...v2.2.0
[v2.1.0]: https://github.com/pxgamer/php-json-g/compare/v2.0.3...v2.1.0
[v2.0.3]: https://github.com/pxgamer/php-json-g/compare/v2.0.2...v2.0.3
[v2.0.2]: https://github.com/pxgamer/php-json-g/compare/v2.0.1...v2.0.2
[v2.0.1]: https://github.com/pxgamer/php-json-g/compare/v2.0.0...v2.0.1
[v2.0.0]: https://github.com/pxgamer/php-json-g/compare/v1.0.0...v2.0.0
