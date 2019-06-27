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
        'invited' => 'Invited',
        'inactive' => 'Inactive',
    ])
```

The array key is the raw field value and the array value is the desired label.

You can, of course use the Laravel `trans()` or `__()` functions to translate the labels.

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

You can, of course use the Laravel `trans()` or `__()` functions to translate the unknown label.

If this is not set, an em dash will be displayed instead.

This setting does not apply when `withoutLabels()` has been used. In that case, an unknown label will display with its raw value.

#### Should Hide

The indicator can be hidden if the field value is equal to a given value(s) or a callback:

```php
Indicator::make('Status')
    ->shouldHide('active')
```

```php
Indicator::make('Status')
    ->shouldHide(['invited', 'requested'])
```

```php
Indicator::make('Status')
    ->shouldHide(function($value) {
        return $value == 'inactive';
    })
```

This is useful if you only want to highlight particular values in the grid and hide others, e.g. you want banned users to be displayed with a red indicator and label, and for active (not banned) users, you don't want the indicator displayed at all.

#### Should Hide If No

The indicator can be hidden if the field value is anything that PHP considers as falsy, i.e. `false`, `0`, `null` or `''`:

```php
Indicator::make('Status')
    ->shouldHideIfNo()
```

This is a shortcut for a common scenario for the above `shouldHide()` method.

#### Colours
##### Named Colours

Add your desired status colours:

```php
Indicator::make('Status')
    ->colors([
        'banned' => 'red',
        'active' => 'green',
        'invited' => 'blue',
        'inactive' => 'grey',
    ])
```

The array key is the raw field value and the array value is the desired colour.

If a colour is not specified for a status, it will be displayed as grey.

The available colours are the default "base" colours from [Tailwind](https://tailwindcss.com/docs/colors), with the addition of black:
* 'black'   `#22292F`
* 'grey' or 'gray' `#B8C2CC`
* 'red'     `#E3342F`
* 'orange'  `#F6993F`
* 'yellow'  `#FFED4A`
* 'green'   `#38C172`
* 'teal'    `#4DC0B5`
* 'blue'    `#3490DC`
* 'indigo'  `#6574CD`
* 'purple'  `#9561E2`
* 'pink'    `#F66D9B`

As well as the following Nova variable colours:

* 'success' `var(--success)`
* 'warning' `var(--warning)`
* 'danger'  `var(--danger)`
* 'info'    `var(--info)`

Colour classes are not validated against the lists above, so if you enter an invalid colour, it will fall back to grey.

##### Literal Colours

You can also use your own hexadecimal, RGB/RGBA or HSL/HSLA literal colours or variables, as in CSS:

```php
Indicator::make('Status')
    ->colors([
        '...' => '#ff0000',
        '...' => 'rgb(0, 255, 0)',
        '...' => 'rgba(0, 0, 0, 0.5)',
        '...' => 'hsl(120, 100%, 50%)',
        '...' => 'hsla(120, 100%, 50%, 0.5)',
        '...' => 'var(--success)',
    ])
```

Literal colours are not validated, so if you enter an invalid CSS colour, it will fall back to grey.

##### Additional Colour Classes

If you want to specify your own colours as reusable classes, you can serve your own CSS file using Nova's Asset functionality. The classes must be prefixed with `indicator-`:

```css
.indicator-yourcolourname {
    background: #000000;
}
```

Which you would use in the field definition without the 'indicator-' prefix, as:

```php
Indicator::make('Status')
    ->colors([
        'yourstatus' => 'yourcolourname',
    ])
```

## Appearance

The field is displayed similarly to the built-in `Laravel\Nova\Fields\Boolean` field, with the ability to have more than a true/false value, and different labels and colours defined.

### Index
![index-field](https://raw.githubusercontent.com/inspheric/nova-indicator-field/master/docs/index-field.png)

### Detail
![detail-field](https://raw.githubusercontent.com/inspheric/nova-indicator-field/master/docs/detail-field.png)

### Form
(Same as detail.)

The indicator is not displayed on forms by default. If you choose to display it as a form field with `showOnUpdate()`, the indicator is not editable and does not write back to the server, as it is intended to come from a read-only or derived model attribute.

If you do need an editable status field, you might want to add your own additional `Laravel\Nova\Fields\Select` field to your resource, referencing the same attribute name, and with `onlyOnForms()` set.

## Donate

:purple_heart: If you like this package, you can show your appreciation by [donating any amount via PayPal](https://burtonsenior.com/donate/inspheric/nova-indicator-field) to support ongoing development.
