# API Resources for PHP

[![Tests](https://img.shields.io/github/actions/workflow/status/artkonekt/resource/tests.yml?branch=master&style=flat-square)](https://github.com/artkonekt/resource/actions?query=workflow%3Atests)
[![Packagist Stable Version](https://img.shields.io/packagist/v/konekt/resource.svg?style=flat-square&label=stable)](https://packagist.org/packages/konekt/resource)
[![Packagist downloads](https://img.shields.io/packagist/dt/konekt/resource.svg?style=flat-square)](https://packagist.org/packages/konekt/resource)
[![StyleCI](https://styleci.io/repos/186131934/shield?branch=master)](https://styleci.io/repos/186131934)
[![MIT Software License](https://img.shields.io/badge/license-MIT-blue.svg?style=flat-square)](LICENSE.md)

## API Resources

When building an HTTP based API, you often need a transformation layer that sits between your models
and the JSON (or XML, etc) responses that are actually returned to API consumers.

The API resource classes allow you to transform your models into HTTP Responses (JSON, XML, etc).

> This project was inspired by the Laravel [API Resources](https://laravel.com/docs/5.8/eloquent-resources)
> concept. The goal is to make this approach available in non-Laravel applications as well.


## Installation

using composer: `composer require konekt/resource`

## Documentation

For detailed usage and examples go to the
[Resource Documentation](https://konekt.dev/resource/) or refer to the markdown files in the
`docs/` folder of this repo.

For the list of changes read the [Changelog](Changelog.md).

## Framework Integrations

### Symfony

### Phalcon

