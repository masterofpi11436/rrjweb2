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
            "image" => $this->request->post["image"],
            "quantity" => $this->request->post["quantity"],
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

        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Items/edit_item.php", ["item" => $item, "itemTypes" => $itemTypes]));
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
        $item["image"] = $this->request->post["image"];
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

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/items/all");
    }

    /********************************************************************************************************************************* */
    // Custom Action Methods
    
}