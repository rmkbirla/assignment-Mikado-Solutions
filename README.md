# Product Listing App

## Overview

The Product Listing App allows users to view and filter a list of products. Users can apply filters such as category, sale status, and price range. The app also supports pagination to navigate through large sets of products.

## Features

- **Filters**: Filter products by category, sale status, and price range.
- **Pagination**: Navigate through multiple pages of products.
- **Responsive Design**: Optimized for both desktop and mobile devices.

## Technologies Used

- **Frontend**: HTML, CSS, JavaScript
- **Backend**: PHP (MySQL)
- **Database**: MySQL

## Directory Structure
```
├── index.html # Main HTML file
├── style.css # Styles for the application
├── script.js # JavaScript for handling dynamic content and interactions
├── fetch_products.php # PHP script for fetching filtered products from the database
└── db.php # PHP script for database connection

```

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/yourusername/product-listing-app.git
   cd product-listing-app
2. Set Up the Database

Create a MySQL database named product_db.
Import the database schema (provided separately or create your own schema).

3. Configure Database Connection

Edit db.php to match your database credentials.

4. Run the Application

Ensure your PHP server is running.
Access the application via your local server (e.g., http://localhost/product-listing-app/index.html).

## Usage

### Filtering Products
Category: Select a category from the dropdown menu to filter by product category.
Sale Status: Choose whether to view products on sale or not.
Price Range: Specify minimum and maximum prices to filter products by price.
Apply Filters: Click the "Apply Filters" button to update the product list.

### Pagination
Navigate through pages using the pagination controls at the bottom of the product list.

## File Descriptions
index.html
Contains the main structure of the application, including the filters form and product list container.

style.css
Defines the styles for the application, including layout and design for the filters, product list, and pagination.

script.js
Handles dynamic content loading and interactions. It fetches filtered products from the server and updates the product list and pagination controls.

fetch_products.php
Handles server-side logic for fetching filtered products from the database. It processes query parameters and returns product data in JSON format.

db.php
Establishes a connection to the MySQL database. Modify this file to configure database credentials.
