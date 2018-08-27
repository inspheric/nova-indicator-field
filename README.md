# Laravel Nova Indicator Field
A colour-coded indicator field for Laravel Nova

[![Latest Version on Packagist](https://img.shields.io/packagist/v/inspheric/nova-indicator-field.svg?style=flat-square)](https://packagist.org/packages/inspheric/nova-indicator-field)
[![Total Downloads](https://img.shields.io/packagist/dt/inspheric/nova-indicator-field.svg?style=flat-square)](https://packagist.org/packages/inspheric/nova-indicator-field)

## Installation

Install the package into a Laravel app that uses [Nova](https://nova.laravel.com) with Composer:

```bash
composer require inspheric/nova-indicator-field
```

## Usage

Add the field to your resource in the ```fields``` method:
```php
use Inspheric\Fields\Indicator;

Indicator::make('Status'),
```

The field extends the base `Laravel\Nova\Fields\Field` field, so all the usual methods are available.

### Options
#### Labels
Add your desired status labels:

```php
Indicator::make('Status')
    ->labels([
        'banned' => 'Banned',
        'active' => 'Active',
        'inactive' => 'Inactive',
    ])
```

The array key is the raw field value and the array value is the desired label.

You can, of course use the Laravel `trans()` function.

If a label is not defined for a value that appears in the field, the "unknown" label will be used (see below).

#### Without Labels

If you do not need to specify a different label, you can simply display the raw field value:

```php
Indicator::make('Status')
    ->withoutLabels()
```

#### Unknown Label

Specify the label when the raw field value does not correspond to one of the labels you defined:

```php
Indicator::make('Status')
    ->unknown('Unknown')
```

You can, of course use the Laravel `trans()` function.

If this is not set, an em dash will be displayed instead.

This setting does not apply when `withoutLabels()` has been used. In that case, an unknown label will display with its raw value.

#### Colours

Add your desired status colours:

```php
Indicator::make('Status')
    ->colors([
        'banned' => 'red',
        'active' => 'green',
        'inactive' => 'grey',
    ])
```

The array key is the raw field value and the array value is the desired colour.

The available colours are the default "base" colours from [Tailwind](https://tailwindcss.com/docs/colors), with the addition of black:
- black (#22292F)
- grey (#B8C2CC)
- red (#E3342F)
- orange (#F6993F)
- yellow (#FFED4A)
- green (#38C172)
- teal (#4DC0B5)
- blue (#3490DC)
- indigo (#6574CD)
- purple (#9561E2)
- pink (#F66D9B)

If a colour is not specified for a status, it will be displayed as grey.

## Appearance

The field is displayed similarly to the built-in `Laravel\Nova\Fields\Boolean` field, with the ability to have more than two values, and different labels and colours defined.

### Index
![index-field](https://raw.githubusercontent.com/inspheric/nova-indicator-field/master/docs/index-field.png)

### Detail
![detail-field](https://raw.githubusercontent.com/inspheric/nova-indicator-field/master/docs/detail-field.png)

### Form
(Same as detail.)

The indicator is not displayed on forms by default. If you choose to display it as a form field, the indicator is not editable and does not write back to the server, as it is intended to come from a read-only or derived model attribute.

If you do need an editable status field, you might want to add your own additional `Laravel\Nova\Fields\Select` field to your resource, referencing the same attribute name, and with `onlyOnForms()` set.
