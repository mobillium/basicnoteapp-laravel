<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Installation

### Deploy to Heroku
1. You need to have Heroku Account for deploy project to Heroku. 
If you don't have one create from [here](https://www.heroku.com/).
3. Login Heroku.
2. Click Deploy to Heroku button.
3. Complete deploy.

[![Deploy](https://www.herokucdn.com/deploy/button.svg)](https://dashboard.heroku.com/new?template=https://github.com/mobillium/basicnoteapp-laravel.git)

### Postman

1. Download [Postman](https://www.postman.com).
2. Download <a href="PostmanCollection.json?raw=true">Postman file</a>
3. Import Collection file to Postman.
4. Create Environment.
5. Add new variable named `api_url`. Your url must be `HerokuAppUrl/api/`, for example `https://noteexample.herokuapp.com/api/`
6. Add new variable named `token`. You can get token by `register` or `login` requests.

### Mobile App Design

1. Download [Adobe XD](https://www.adobe.com/tr/products/xd.html) 
2. Download <a href="ZoneZeroCaseApp.xd?raw=true">Design file</a>

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
