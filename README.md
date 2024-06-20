# Better Health Plugin

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

## Setup

```shell
# cd to the plugin directory
npm install
npm run build

# vendor directory is commited on this repo, run the command below just
# incase you need to update composer packages
composer install
```

On the admin page, click `Get data from sample file` to populate the JSON data text field. This also automatically saves the data.

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

To modify dropdown options:
```
betterhealth_technology_options
betterhealth_sub_technology_options
betterhealth_vendor_options
betterhealth_product_type_options
```