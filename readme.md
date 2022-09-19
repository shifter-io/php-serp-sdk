# Shifter's SERP PHP SDK
Shifter [SERP](https://shifter.io/services/serp-scraping) is an API that allows scraping various search engines such as Google, Bing, Yandex, etc. while using rotating proxies to prevent bans. This SDK for PHP makes the usage of the API easier to implement in any project you have.

## Dependencies 

The only dependency of this package is related to the php-curl library from [here](https://www.php.net/manual/en/book.curl.php)

To install it, simply run:

```
sudo apt-get install php-curl
```

## Installation

Run the following command in the main folder of your project:

```
composer require shifter/php-serp-sdk
```

## API Key
To use the API and the SDK you will need an API Key. You can get one by registering at [Shifter](https://shifter.io)

## Classes
This SDK provides a class for each search engine from shifter.io. Here is the list:

| Class                           | Usage                            |
|---------------------------------|----------------------------------|
| SerpGoogleSearch          | google searches                  |
| SerpBingSearch            | bing searches                    |
| SerpYandexSearch          | yandex searches                  |
| SerpGoogleAutocomplete    | google autocomplete searches     |
| SerpGoogleEvents          | google events searches           |
| SerpGoogleJobs            | google jobs searches             |
| SerpGoogleJobsListing     | google jobs listing searches     |
| SerpGoogleMaps            | google maps searches             |
| SerpGoogleMapsReviews     | google maps reviews searches     |
| SerpGoogleProduct         | google product searches          |
| SerpGoogleReverseImage    | google reverse image searches    |
| SerpGoogleScholar         | google scholar searches          |
| SerpGoogleScholarAuthor   | google scholar author searches   |
| SerpGoogleScholarCite     | google scholar cite searches     |
| SerpGoogleScholarProfiles | google scholar profiles searches |
| SerpLocations             | locations api                    |

## Usage

Using the SDK it's quite easy. An example of a GET call to the API is the following:

```
<?php 

require_once __DIR__ . '/vendor/autoload.php';

use SerpSDK\SerpGoogleSearch;
use SerpSDK\SerpLocations;

$googleSearch = new SerpGoogleSearch('YOUR_API_KEY');
$locationsAPI = new SerpLocations();

try {
    $locations = $locationsAPI->execute('New York', 1)['body'];

    $googleSearch->set_q('test');
    $googleSearch->set_device('mobile');
    $googleSearch->set_lr('lang_en|lang_ar');
    $googleSearch->set_location($locations[0]['location']);

    $response = $googleSearch->execute();
    echo json_encode($response['body']);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

Alternatively, you can use the function executeRaw, which will allow you to send the parameters in an associative array:

```
<?php 

require_once __DIR__ . '/vendor/autoload.php';

use SerpSDK\SerpGoogleSearch;
use SerpSDK\SerpLocations;

$googleSearch = new SerpGoogleSearch('YOUR_API_KEY');
$locationsAPI = new SerpLocations();

try {
    $locations = $locationsAPI->execute('New York', 1)['body'];

    $response = $googleSearch->executeRaw([
        'q' => 'test',
        'device' => 'mobile',
        'lr' => 'lang_en|lang_ar',
        'location' => $locations[0]['location']
    ]);
    echo json_encode($response['body']);
} catch (Exception $e) {
    echo $e->getMessage();
}
```

For a better understanding of the parameters, please check out [our documentation](https://developers.shifter.io/).
