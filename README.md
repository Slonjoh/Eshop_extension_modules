# EShop Extension (Add Products To Cart On Pages that are not Eshop Menus)

This project provides an interactive form for selecting probiotics strains, specifying quantities, and adding the selected product to the cart using AJAX. The form is designed to work within a Joomla component (`com_eshop`).


## Reason for design

Since Eshop doesn't have an extension that helps add products from regular pages of website except for shop menus.                                          
This Extension is designed solely for when you want to turn your article page to an interactive shop where users can add products to cart from your article pages.

## Features

- Dynamic selection of probiotics strains with price updates.
- Quantity selection.
- Dynamic creation of the "Add to Cart" button.
- AJAX request to add products to the cart.
- User feedback on successful addition of products to the cart.

## Prerequisites

- Joomla CMS.
- EShop component installed and configured.
- Git clone this repo and modify mod_setup to your products specification.

#### Note: All other files are for a store you can check as reference but you don't need it!!!

## Usage

#### Convert To Zip

![Convert to Zip](/templates/convert_to_zip.png)

#### Install Extension

![Install Extension](/templates/install_extension.png)

#### Pick Extension File

![Pick Extension file](/templates/install_extension1.png)

#### Installation Success

![Installation success](/templates/installation_success.png)

#### All Installed Extensions

![All installed Modules](/templates/mod_screenshots.png)

#### Set Up Modules

![Set up Modules](/templates/setting_up_mods1.png)

#### Set Up Done!

![Set up Done](/templates/setting_up_done.png)



## How It Works FrontEnd

#### The Module!!!

![The Modules!!!](/templates/how_it_works.png)

#### All Products List In Category Herbs Inherited

![All Products](/templates/products_list.png)

#### Selecting Products To Add To Cart

![Adding Products To Cart](/templates/adding_product.png)

#### User Feedback!!!

![UserFeedback](/templates/items_added.png)

#### Wow It Works!!!

![Wow It Works](/templates/cart.png)

## How It Works BackEnd

### Form Initialization

On page load, the `updateForm` function is called to initialize the form with default values and create the "Add to Cart" button.

### Price Update

The `updatePrice` function updates the displayed price based on the selected probiotics strain. This function is called whenever the product selection changes.

### Dynamic Button Creation

The `updateForm` function dynamically creates and updates the "Add to Cart" button based on the selected product ID and quantity. This function is called whenever the product selection or quantity changes.

### Add to Cart

The `addToCart` function sends an AJAX request to add the selected product to the cart. It constructs a `FormData` object with the necessary parameters and handles the response:

1. **Product ID and Quantity Validation**: Ensures that a product is selected and quantity is greater than zero.
2. **AJAX Request**: Sends the form data (`product_id`, `quantity`, and other required fields) to the server-side script that handles adding the product to the cart.
3. **Response Handling**: Parses the server response to check if the product was successfully added to the cart and provides user feedback.

### Summary

- **Dynamic Button Creation**: The button is dynamically created and updated with the correct product ID and quantity whenever the selection changes.
- **Correct Parameter Passing**: The `addToCart` function sends the product ID as `id` and the quantity, matching what the server-side code expects.
- **Event Binding**: The dynamically created button uses an `onclick` attribute to call the `addToCart` function with the appropriate parameters.

## Customization

- **Styles**: You can customize the form's appearance by modifying the provided CSS styles.
- **JavaScript**: You can extend or modify the JavaScript functions to add more features or handle additional form interactions.

## Troubleshooting

- **Product Not Added to Cart**: Ensure that the `product_id` and `quantity` are correctly passed to the server-side script. Check the browser console for any errors.
- **Button Not Updating**: Ensure that the `updateForm` function is called whenever the product selection or quantity changes.

## License

This project is open-source and available under the MIT License.

## Author
- *Slonjoh* [Slonjoh's Github](https://github.com/Slonjoh) - Software Engineer | Occasional Writer | Graphics designer | Chemist.

## Contribution and questions
- Anyone is free to contribute!!! 🧑🏽‍💻 👩🏽‍💻
- Feel free to ask any questions!!! 🙇🏽‍♂️
