# Product List Page
Test Assignment From Scandiweb

# Backend

The backend of this project comprises the server-side logic, APIs, and database interactions, ensuring seamless communication between the frontend and the database.

## Files and Structure

### API Endpoints
The backend provides the following API endpoints for interacting with the database:

1. **Create Product**
   - **File**: `api/create.php`
   - **Description**: Accepts product details and creates a new product entry in the database.

2. **Read Products**
   - **File**: `api/read.php`
   - **Description**: Fetches a list of existing products from the database.

3. **Read Single Product**
   - **File**: `api/read_single.php`
   - **Description**: Fetches details of a single product based on the provided SKU.

4. **Delete Products**
   - **File**: `api/delete.php`
   - **Description**: Accepts a list of product SKUs for deletion and removes the corresponding products from the database.

### Configuration
- **File**: `config/database.php`
- **Description**: Contains configuration details to establish a connection with the MySQL database.

### Controllers
- **File**: `controllers/productController.php`
- **Description**: Defines controller functions to handle product-related actions, such as creating a new product.

### Models
- **Files**: `models/product.php`, `models/book.php`, `models/dvd.php`, `models/furniture.php`
- **Description**: Defines the data models for products, including specific models for different product types (book, DVD, furniture).

### Environment Variables
- **File**: `Env.php`
- **Description**: Contains sensitive data and credentials securely to be used in the application.

## Database
- **Database Name**: `Georgie_tryicetrap`
- **Database Structure**: Contains tables for storing product information, structured based on the data models.

The database is hosted on filess.io

## SQL Script for Creating Tables

To set up the required database structure, you can use the provided SQL script. The script creates tables needed for this project.

- **File**: `SW_DB.sql`
- **Description**: SQL script to create the database tables for storing product information.

Make sure to run this script in your MySQL environment to set up the appropriate tables and schema for the application.

## Usage
- The backend handles product creation, retrieval, and deletion through the provided API endpoints.
- Ensure the correct API endpoints are called from the frontend (`create.js`, `delete-func.js`) for seamless interaction.s