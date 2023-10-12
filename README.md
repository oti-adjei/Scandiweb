---
# Test Assignment

This repository contains the code for the Test Assignment for the Junior Web Developer position at Scandiweb.

## Website Link
- [Visit the Website](https://scwproj.000webhostapp.com)

## Branches
- **Procedural**: Initial version focusing on functionality.
- **OOP**: Backend/API development using an object-oriented approach.
- **Frontend**: User interface development.
- **Main**: Integration of backend and frontend.

## Project Overview

### Backend
The backend comprises the API responsible for managing products. Key components include:

- **API Endpoints**:
  - `create.php`, `delete.php`, `delete-single.php`, `read.php`, and `read-single.php` for different API functionalities.

- **Configuration**:
  - `config/database.php`: Database connection configuration.
  - `config/Env.php`: Environment configuration for sensitive information.

- **Controllers**:
  - `controllers/ProductController.php`: Contains a create schema to create a product type.

- **Models**:
  - Separate model files for different product types like `Book`, `DVD`, and `Furniture`, all extending the base `Product` class in `models/Product.php`.

### Frontend
The frontend involves the user interface and interactions. Key components include:

- **Pages**:
  - `add-product.php`: Interface for adding a product.
  - `index.php`: Main landing page.

- **Styles and Scripts**:
  - `styles/index.css`: CSS for styling.
  - `scripts/create.js`: Handles asynchronous input submission and response handling.
  - `scripts/delete-func.js`: Manages product deletion functionality.

## Usage
- Select the appropriate branch to explore the specific part of the project (Procedural, OOP, or Frontend).
- Visit the provided website link to interact with the deployed application.

Feel free to explore the project, and thank you for your interest!

---

This version provides a clearer structure and a brief explanation of each section, making it easier for anyone interacting with the repository to understand the project's structure and components.
