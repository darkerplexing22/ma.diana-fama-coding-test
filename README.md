<a name="readme-top"></a>

<div align="center">
    <h3 align="center">Backend Developer coding test</h3>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-test">About the test</a>
    </li>
    <li>
      <a href="#requirements">Requirements</a>
      <ul>
        <li><a href="#product-specifications">Product specifications</a></li>
        <li><a href="#api-requirements">API Requirements</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li>
      <a href="#bonus-points">Bonus points</a>
    </li>
  </ol>
</details>

<!-- ABOUT THE TEST -->
## About the test

You're tasked to create a simple REST web service application for a fictional e-commerce business using Laravel.

You need to develop the following REST APIs:

* Products list
* Product detail
* Create product
* Update product
* Delete product

<!-- REQUIREMENTS -->
## Requirements

### Product specifications

A product needs to have the following information:

* Product name
* Product description
* Product price
* Created at
* Updated at

### API requirements

* Products list API
    * The products list API must be paginated.
* Create and Update product API
    * The product name, description, and price must be required.
    * The product name must accept a maximum of 255 characters.
    * The product price must be numeric in type and must accept up to two decimal places.
    * The created at and updated at fields must be in timestamp format.

Others:
* You are required to use MYSQL for the database storage in this test.
* You are free to use any library or component just as long as it can be installed using Composer.
* Don't forget to provide instructions on how to set the application up.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- GETTING STARTED -->
## Getting Started

### Prerequisites

* Git
* Composer
* PHP ^8.0.2
* MySQL

### Installation

#### Automatically generate a new repository
Click <a href="https://github.com/QualityTrade/backend-dev-coding-test/generate" target="_blank">here</a> to generate a new repository from this template.

* Select your GitHub username as the owner.
* Name the repository `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Make sure to set the repository visibility to Public.
* Clone your generated repository.

#### Manual
If automatically generating a new repository does not work, follow these steps instead.

* Click <a href="https://github.com/QualityTrade/backend-dev-coding-test/archive/refs/heads/main.zip">here</a> to download the ZIP archive of the test.
* Create a new repository named `{FIRST NAME}-{LAST NAME}-coding-test`. (e.g. `john-doe-coding-test`)
* Push your code to the new repository.

<p align="right">(<a href="#readme-top">back to top</a>)</p>

<!-- BONUS POINTS -->
## Bonus points

#### For bonus points:

* Cache the response of the Product detail API. You are free to use any cache driver.
* Use the Service layer and Repository design patterns.
* Create automated tests for the app.

#### Answer the question below by updating this file.

Q: The management requested a new feature where in the fictional e-commerce app must have a "featured products" section.
How would you go about implementing this feature in the backend?

A: First, construct a new table with an id, a productid, a boolean for feature or not, and other specifications for featured products. Next, create an administrator with authentication so that it can modify those featured products. Then, develop an API that allows the admin to retrieve all featured products, add, remove, and get the details of featured products. Caching should be implemented in the featured list. There is an automated process in Laravel to schedule tasks and update the list of featured products based on their popularity. Document how to set it up and check if there is anything that needs to be added or modified to the feature. Test it, and make sure only authorized administrators have access to it.

## Setup
* git clone
* run xampp control panel
* Open the project and use the terminal to type "composer update".
* Add the.env file and setup the database.
* Type "php artisan migrate" and "php artisan serve" into the terminal.
* Open HTTP/API clients such as Postman or Insomnia.
    Add the following HTTP request:
    POST: Create Product
    GET: Product List
    GET: Get Product Detail
    PITCH : Update Product
    DEL: Delete Product

* For creating products and product lists, send this: http://127.0.0.1:8000/api/product 
  For paginated product list: http://127.0.0.1:8000/api/product?2

  For Product Detail, Update Product, and Delete Product: http://127.0.0.1:8000/api/product/id
