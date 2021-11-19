# RodoModule

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Total Downloads][ico-downloads]][link-downloads]
[![Build Status][ico-travis]][link-travis]
[![StyleCI][ico-styleci]][link-styleci]

Rodo service

## Installation

Via Composer

``` bash
$ composer require zdrojowa/rodo-module
```


## NPM required:

``` bash
"intl-tel-input": "^17.0.13",
```

## Usage
- Add in webpack.mix.js

``` bash
mix.module('RodoModule', 'vendor/zdrojowa/rodo-module');
```

- Add module RodoModule in config/selene.php

``` bash
'modules' => [
    RodoModule::class,
],

'rodo' => [
        'email' => email,
        'username' => user name for RODO service,
        'password' => password for RODO service,
        'url' => url to RODO service,
        'source' => source in RODO service,
        'mail_title' => Title for email,
        'consents' => [
            'phone' => [id of consent in RODO service],
            'email' => [id of consent in RODO service]
        ]
    ],
```

- Add provider RodoModule in config/app.php

``` bash
'providers' => [
    RodoModuleServiceProvider::class,
],
```

- Add translations RodoModule for popup in resources/lang/{lang}/rodo.php

``` bash
<?php

return [
    'A problem occured' => 'A problem occured',
    'address' => 'Comapny address',
    'after' => 'after',
    'before' => 'before',
    'Choose' => 'Choose',
    'Choose the contact form' => 'Choose the contact form',
    'Correct the field' => 'Correct the field',
    'email' => 'email',
    'Email contact' => 'E-mail contact',
    'message' => 'Message',
    'Message sent successfully' => 'Message sent successfully',
    'Name and Surname' => 'Name & Surname',
    'Our advisor will contact you' => 'Our advisor will contact you',
    'Phone' => 'Phone',
    'phone' => 'phone',
    'Phone contact' => 'Phone contact',
    'Phone in hours' => 'Phone in hours',
    'Phone number' => 'Phone number',
    'phone_link' => 'link to phone',
    'Please try again later or directly' => 'Please try again later or directly',
    'required' => 'Required',
    'send message' => 'Send message',
    'We will contact you' => 'We will contact you',
    'phone_consent' => 'Phone consent',
    'email_consent' => 'Email consent',
];
```

- Add in base view to show popup

``` bash
<link rel="stylesheet" href="{{ asset('vendor/css/RodoModule.css') }}">
@include('RodoModule::popup', ['key' => 'GoogleEnterpriseKey'])
<script src="{{ mix('vendor/js/RodoModule.js') }}"></script>
```

## Change log

Please see the [changelog](changelog.md) for more information on what has changed recently.

## Testing

``` bash
$ composer test
```

## Contributing

Please see [contributing.md](contributing.md) for details and a todolist.

## Security

If you discover any security related issues, please email author email instead of using the issue tracker.

## Credits

- [author name][link-author]
- [All Contributors][link-contributors]

## License

license. Please see the [license file](license.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/zdrojowa/rodo-module.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/zdrojowa/rodo-module.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/zdrojowa/rodo-module/master.svg?style=flat-square
[ico-styleci]: https://styleci.io/repos/12345678/shield

[link-packagist]: https://packagist.org/packages/zdrojowa/rodo-module
[link-downloads]: https://packagist.org/packages/zdrojowa/rodo-module
[link-travis]: https://travis-ci.org/zdrojowa/rodo-module
[link-styleci]: https://styleci.io/repos/12345678
[link-author]: https://github.com/zdrojowa
[link-contributors]: ../../contributors
