<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\ItemType;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling itemtype-related actions.
 */
class ItemTypes extends Controller
{
    /**
     * Constructor.
     *
     * @param ItemType $model The itemtype model
     */
    public function __construct(private ItemType $model){}

    /**
     * Retrieves the itemtype by ID.
     *
     * @param string $id The itemtype ID
     * @return array The itemtype data
     * @throws PageNotFoundException If the item type is not found
     */
    private function getItemTypeID(string $id): array
    {
        // Assign this model's id to the $itemType variable to the 
        $itemType = $this->model->getOne($id);

        // Verify if the item type was found
        if ($itemType === false) {

            throw new PageNotFoundException("No Information Found");
        }

        return $itemType;
    }

    /**
     * Displays all inmates or search results.
     */
    public function viewAll(): Response
    {
        $search = $this->request->get['search'] ?? '';
        $sort = $this->request->get['sort'] ?? 'type';
        $order = $this->request->get['order'] ?? 'asc';

        if ($search) {
            // Perform search query
            $itemTypes = $this->model->searchItemTypes($search, $sort, $order);
        } else {
            // Retrieve all records if no search query
            $itemTypes = $this->model->getAll($sort, $order);
        }

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "All Item Types", "heading" => "All Item Types"]));

        // Render the all itemTypes view
        $this->response->appendBody($this->viewer->render("Warehouse/Types/all_itemTypes.php", ["itemTypes" => $itemTypes]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }


    /**
     * Displays a single itemType by ID.
     *
     * @param string $id The itemType ID
     */
    public function viewOne(string $id)
    {
        $itemType = $this->getItemTypeID($id);

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Showing One", "heading" => "Item Type Details"]));

        // Render the one itemType view
        $this->response->appendBody($this->viewer->render("Warehouse/Types/one_itemType.php", ["itemType" => $itemType]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Renders the form to add a new itemType.
     */
    public function addNewItemType()
    {
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Item Type", "heading" => "Add Item Type"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Types/add_itemType.php"));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Creates a new itemType.
     */
    public function create()
    {
        $data = [
            "type" => $this->request->post["type"],
        ];

        if ($this->model->insertRecord($data)) {
            return $this->redirect("/warehouse/itemtype/one/{$this->model->getInsertID()}");
        } else {

            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Add Item Type", "heading" => "Add Item Type"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Types/add_itemType.php", ["errorMessage" => $this->model->getErrors(), "itemType" => $data]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }


    /**
     * Renders the form to edit an existing itemType.
     *
     * @param string $id The itemType ID
     */
    public function editItemType(string $id)
    {
        $itemType = $this->getItemTypeID($id);

        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Number", "heading" => "Edit Number"]));
        $this->response->appendBody($this->viewer->render("Warehouse/Types/edit_itemType.php", ["itemType" => $itemType]));
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Updates an existing itemType.
     * 
     * @param string $id The itemType ID
     */
    public function updateItemType(string $id): Response
    {
        $itemType = $this->getItemTypeID($id);

        // Get the form data and set empty fields to null
        $itemType["type"] = $this->request->post["type"];

        if ($this->model->updateRecord($id, $itemType)) {
            return $this->redirect("/warehouse/itemtype/one/{$id}");
        } else {

            $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Edit Item Type", "heading" => "Edit Item Type"]));
            $this->response->appendBody($this->viewer->render("Warehouse/Types/edit_itemType.php", ["errorMessage" => $this->model->getErrors(), "itemType" => $itemType]));
            $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

            return $this->response;
        }
    }

    /**
     * Renders the form to delete a itemType.
     *
     * @param string $id The itemType ID
     */
    public function deleteItemType($id)
    {
        // Get the ID of the record
        $itemType = $this->getItemTypeID($id);

        // Render the warehouse_header
        $this->response->appendBody($this->viewer->render("shared/warehouse_header.php", ["title" => "Delete Listing", "heading" => "Delete Listing"]));

        // Render the new itemType form
        $this->response->appendBody($this->viewer->render("Warehouse/Types/delete_itemType.php", ["itemType" => $itemType]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    /**
     * Deletes a itemType.
     *
     * @param string $id The itemType ID
     */
    public function destroyItemType(string $id): Response
    {
        $itemType = $this->getItemTypeID($id);

        $this->model->deleteRecord($id);

        return $this->redirect("/warehouse/itemtype/all");
    }

    /********************************************************************************************************************************* */
    // Custom Action Methods
    
}