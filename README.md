# Better Health Plugin
![image](https://github.com/blitspace/exam__doubleyolk__better-health-test/assets/167638196/59ca6d93-11ef-4d6e-b7d7-fa962306146f)
![image](https://github.com/blitspace/better-health-test/assets/167638196/4026415e-778d-4b1d-bd1f-1b2d54313ee6)

## Description
### Plugin Overview:
- This plugin creates a user interface (UI) component that features a panel with a list and filter functionality.
- The primary purpose of this UI is to present data to users in an organized manner.

### Data Source:
- The data displayed in the panel originates from a JSON Data setting within the admin.

### Technology Stack:
- The UI component is built using ReactJS with Tailwind.

### Sample Data:
- To demonstrate the functionality, the plugin uses sample data sourced from Mockaroo.
- The sample json data is also located at `src/Data/sample.json`
- The sample csv data is also located at `src/Data/sample.csv`

## Installation
```shell
cd wp-content/plugins

# It is important to add the directory parameter to match the plugin name
git clone git@github.com:blitspace/better-health-test.git better-health-test
```

## Setup

```shell
# cd to the plugin directory
npm install
npm run build

# vendor directory is commited on this repo, run the command below just
# incase you need to update composer packages
composer install
```

On the admin page, click `Get data from sample file` to populate the JSON data text field. **This also automatically saves the data, no need to click on `Save Changes`**.

## How to use

To use the shortcode in a page or post:
```
[betterhealth_shortcode]
```
or the value set on `ShortCode::SHORTCODE`

## Available Filters

### To modify data:
```
betterhealth_shortcode_data
```

### Other filters:

#### To modify dropdown options:
```
betterhealth_technology_options
betterhealth_sub_technology_options
betterhealth_vendor_options
betterhealth_product_type_options
```

#### Sample filter hook:
```php
add_filter('betterhealth_vendor_options', function($options) {
	$new_options = [];

	foreach($options as $row) {
		$new_options[] = [
			'label' => '[updated] ' . $row['label'],
			'value' => $row['label'],
		];
	}

	return $new_options;
});
```

## Test

This uses PHPUnit to run the tests. Php unit is not committed on this repo as the plugin size will increase.

### Installation
```
composer install
```

Make sure to enable the mbstring extension on php.ini
```ini
extension=mbstring
```

```shell
cd src/test
../../vendor/bin/phpunit UnitTest.php
```
