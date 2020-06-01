# Changelog

All notable changes to this project will be documented in this file.

The format is based on [Keep a Changelog](https://keepachangelog.com/en/1.0.0/),
and this project adheres to [Semantic Versioning](https://semver.org/spec/v2.0.0.html).

## [Unreleased](https://github.com/mll-lab/laravel-graphql-playground/compare/v2.0.0...master)

## [v2.0.0](https://github.com/mll-lab/laravel-graphql-playground/compare/v1.1.0...v2.0.0)

### Added

- Support Lumen
- Load routes through a file: `src/routes.php`

### Changed

- Make the `GraphQLPlaygroundController` use `__invoke()` instead of `get()`
- Move the `route_name` configuration option into `route.uri`

### Removed

- Disable the `route.domain` configuration option by default

## Pre-v2

We just started maintaining a changelog starting from v2.

If someone wants to make one for previous versions, PR's are welcome.
