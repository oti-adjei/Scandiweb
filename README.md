
# Test Assignment From Scandiweb

# Frontend

The frontend of this project is responsible for creating an intuitive and engaging user interface for adding products and interacting with the application.

## Pages

### Add Product Page
- **File**: `add-product.php`
- **Description**: This page allows users to input product details and add a new product to the database.
- **Components**:
  - **Input Fields**: Gather details like SKU, name, price, type, and relevant attributes based on the selected type.
  - **Dropdown for Product Type**: Dynamically shows/hides attribute input fields based on the selected product type (e.g., DVD, Book, Furniture).
  - **Submit Button**: Triggers the submission of product details to the backend API.

### Index Page
- **File**: `index.php`
- **Description**: This is the main page where users can view the product list and perform actions like product deletion.
- **Components**:
  - **Product List**: Displays existing products with options for deletion.
  - **Checkbox Selection**: Allows users to select products for deletion.
  - **Delete Button**: Initiates the deletion of selected products via an API call.

## Styles and Scripts

### CSS Styling
- **File**: `styles/index.css`
- **Description**: Contains CSS rules for styling the pages, ensuring a visually appealing user interface.

### Create.js
- **File**: `scripts/create.js`
- **Description**: Handles asynchronous submission of product details from the `add-product.php` page to the backend API (`create.php`). It manages response handling and page redirection based on the API response.

### Delete-func.js
- **File**: `scripts/delete-func.js`
- **Description**: Controls the product deletion functionality on the `index.php` page. It collects selected product IDs, sends a request to the backend API (`delete.php`), and handles the response, updating the page accordingly.

## Usage
- Navigate to the respective pages (`add-product.php` or `index.php`) to interact with the frontend components.
- Follow the provided UI to add products or delete selected products.
- The frontend is tightly integrated with the backend API to ensure a seamless user experience.

---

This section provides a detailed breakdown of the frontend components, including pages, styles, and scripts, making it easier for users and developers to understand how the frontend operates and how they can interact with it.