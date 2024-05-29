<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling product-related actions.
 */
class Products extends Controller
{
    /**
     * Constructor.
     *
     * @param Product $model The product model
     */
    public function __construct(private Product $model){}

    /**
     * Retrieves the product by ID.
     *
     * @param string $id The product ID
     * @return array The product data
     * @throws PageNotFoundException If the product is not found
     */
    private function getProductID(string $id): array
    {
        // Assign this model's id to the $product variable to the 
        $product = $this->model->getOne($id);

        // Verify if the product was found
        if ($product === false) {

            throw new PageNotFoundException("No Product Found");
        }

        return $product;
    }

    /**
     * Displays all products.
     */
    public function viewAll(): Response
    {
        // Retrieve all the records for the product's table
        $products = $this->model->getAll();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing all Products", "heading" => "All Products"]));

        // Render the all products view and show the total records
        $this->response->appendBody($this->viewer->render("Products/all_products.php", ["products" => $products, "total" => $this->model->getTotalProducts()]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Displays a single product by ID.
     *
     * @param string $id The product ID
     */
    public function viewOne(string $id)
    {
        $product = $this->getProductID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing all Products", "heading" => "Showing One Product"]));

        // Render the one product view
        $this->response->appendBody($this->viewer->render("Products/one_product.php", ["product" => $product]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new product.
     */
    public function addNewProduct()
    {
        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Product", "heading" => "Add a Add Product"]));

        // Render the new product form
        $this->response->appendBody($this->viewer->render("Products/new_product.php"));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new product.
     */
    public function createProduct()
    {
        // Get the form data
        $data = ["name" => $this->request->post["name"], 
                 "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"]];

        // Attempt to insert the new product record
        if ($this->model->insertRecord($data)) {

            // Redirect to the newly created product's page
            return $this->redirect("/products/viewOne/{$this->model->getInsertID()}");

        } else {

            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Product", "heading" => "Add a Add Product"]));

            $this->response->appendBody($this->viewer->render("Products/new_product.php", ["errorMessage" => $this->model->getErrors(), "product" => $data]));
    
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to edit an existing product.
     *
     * @param string $id The product ID
     */
    public function editProduct(string $id)
    {
        $product = $this->getProductID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Product", "heading" => "Edit Product"]));

        // Render the one product view
        $this->response->appendBody($this->viewer->render("Products/edit_product.php", ["product" => $product]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing product.
     *
     * @param string $id The product ID
     */
    public function updateProduct(string $id)
    {
        $product = $this->getProductID($id);

        // Get the form data
        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        // Attempt to insert the new product record
        if ($this->model->updateRecord($id, $product)) {

            // Redirect to the newly created product's page
            return $this->redirect("/products/viewone/{$id}");

        } else {

            // Render the form again with error messages
            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Product", "heading" => "Edit Product"]));

            $this->response->appendBody($this->viewer->render("Products/edit_product.php", ["errorMessage" => $this->model->getErrors(), "product" => $product]));
    
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a product.
     *
     * @param string $id The product ID
     */
    public function deleteProduct($id)
    {
        // Get the ID of the record
        $product = $this->getProductID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Product", "heading" => "Delete a Add Product"]));

        // Render the new product form
        $this->response->appendBody($this->viewer->render("Products/delete_product.php", ["product" => $product]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a product.
     *
     * @param string $id The product ID
     */
    public function destroyProduct(string $id): Response
    {
        $product = $this->getProductID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/products/viewall");
    }

    public function hello(): Response
    {
        $this->response->appendBody($this->viewer->render("Products/hello.php"));

        return $this->response;
    }
}