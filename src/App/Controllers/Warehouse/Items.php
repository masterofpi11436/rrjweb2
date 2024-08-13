<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Item;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling item-related actions.
 */
class Items extends Controller
{
    /**
     * Constructor.
     *
     * @param Item $model The item model
     */
    public function __construct(private Item $model){}

    /**
     * Retrieves the item by ID.
     *
     * @param string $id The item ID
     * @return array The item data
     * @throws PageNotFoundException If the item is not found
     */
    private function getItemID(string $id): array
    {
        // Assign this model's id to the $item variable to the 
        $item = $this->model->getOne($id);

        // Verify if the item was found
        if ($item === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $item;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';
        $sort = $this->request->get['sort'] ?? 'name';
        $order = $this->request->get['order'] ?? 'asc';

        if ($search) {
            // Perform search query
            $items = $this->model->searchItems($search, '', $sort, $order);
        } else {
            // Retrieve all records if no search query
            $items = $this->model->getAll($sort, $order);
        }

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "All Items", "heading" => "All Items"]));

        // Render the all items view
        $this->response->appendBody($this->viewer->render("Warehouse/Items/all_items.php", ["items" => $items]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single item by ID.
     *
     * @param string $id The item ID
     */
    public function viewOne(string $id)
    {
        $item = $this->getItemID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Showing One", "heading" => "Item Details"]));

        // Render the one item view
        $this->response->appendBody($this->viewer->render("Warehouse/Items/one_item.php", ["item" => $item]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new item.
     */
    public function addNewItem()
    {
        $itemTypes = $this->model->getItemTypes();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Item", "heading" => "Add Item"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Items/add_item.php", ["itemTypes" => $itemTypes]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new item.
     */
    public function create()
    {
        $data = [
            "name" => $this->request->post["name"],
            "item_type" => $this->request->post["item_type"],
            "quantity" => $this->request->post["quantity"]
        ];

        if ($this->model->insertRecord($data)) {
            return $this->redirect("/warehouse/items/one/{$this->model->getInsertID()}");
        } else {
            $itemTypes = $this->model->getItemTypes();

            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Items", "heading" => "Add Item"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Items/add_item.php", ["errorMessage" => $this->model->getErrors(), "item" => $data, "itemTypes" => $itemTypes]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to edit an existing item.
     *
     * @param string $id The item ID
     */
    public function editItem(string $id)
    {
        $item = $this->getItemID($id);
        $itemTypes = $this->model->getItemTypes();

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Item", "heading" => "Edit Item"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Items/edit_item.php", ["item" => $item, "itemTypes" => $itemTypes]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function addPicture(string $id): Response
    {
        $item = $this->getItemID($id);

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Picture", "heading" => "Add/Edit Picture"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Items/add_picture.php", ["item" => $item]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function processPicture(string $id): Response
    {
        $item = $this->getItemID($id);
    
        if (isset($_FILES['fileToUpload']) && $_FILES['fileToUpload']['error'] === UPLOAD_ERR_OK) {
            $uploadDir = 'C:/xampp/htdocs/rrjweb2/public/images/';
            $uploadFile = $uploadDir . basename($_FILES['fileToUpload']['name']);
    
            // Delete the old image if it exists
            if (!empty($item['image'])) {
                $oldImagePath = "C:/xampp/htdocs/rrjweb2" . $item['image'];
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Move the new file to the upload directory
            if (move_uploaded_file($_FILES['fileToUpload']['tmp_name'], $uploadFile)) {
                $imagePath = basename($_FILES['fileToUpload']['name']);
                $success = $this->model->processPhoto((int)$id, $imagePath);
    
                if ($success) {
                    return $this->redirect("/warehouse/items/one/{$id}");
                } else {
                    $errorMessage = "Failed to update image path in database.";
                }
            } else {
                $errorMessage = "Failed to upload image.";
            }
        } else {
            $errorMessage = "No file uploaded or upload error.";
        }
    
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Add Picture", "heading" => "Add/Edit Picture"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Items/add_picture.php", ["errorMessage" => $errorMessage, "item" => $item]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));
    
        return $this->response;
    }
    

    /**
     * Updates an existing item.
     * 
     * @param string $id The item ID
     */
    public function updateItem(string $id): Response
    {
        $item = $this->getItemID($id);

        $item["name"] = $this->request->post["name"];
        $item["item_type"] = $this->request->post["item_type"];
        $item["quantity"] = $this->request->post["quantity"];

        if ($this->model->updateRecord($id, $item)) {
            return $this->redirect("/warehouse/items/one/{$id}");
        } else {
            $itemTypes = $this->model->getItemTypes();

            $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Item", "heading" => "Edit Item"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Items/edit_item.php", ["errorMessage" => $this->model->getErrors(), "item" => $item, "itemTypes" => $itemTypes]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a item.
     *
     * @param string $id The item ID
     */
    public function deleteItem($id)
    {
        // Get the ID of the record
        $item = $this->getItemID($id);

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new item form
        $this->response->appendBody($this->viewer->render("Warehouse/Items/delete_item.php", ["item" => $item]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a item.
     *
     * @param string $id The item ID
     */
    public function destroyItem(string $id): Response
    {
        $item = $this->getItemID($id);

        if (!empty($item['image'])) {

            $image_path = "C:/xampp/htdocs/rrjweb2" . $item['image'];
            unlink($image_path);
        }

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/items/all");
    }
    

    /********************************************************************************************************************************* */
    // Custom Action Methods
    
}