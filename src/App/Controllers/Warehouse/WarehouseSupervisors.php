<?php

// Enforce type checking
declare(strict_types=1);

namespace App\Controllers\Warehouse;

use App\Models\Warehouse\Order;
use Framework\Viewer;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Controller for handling admin-related actions.
 */
class WarehouseSupervisors extends Controller
{
/**
     * Constructor.
     *
     * @param Admin $model The admin model
     */
    public function __construct(private Order $orderModel){}

    public function dashboard(): Response
    {
        $orders = $this->orderModel->getAllWarehousePendingOrders();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "Admin Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Warehouse/WarehouseSupervisors/dashboard.php", ["orders" => $orders]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }

    public function viewOne(string $id): Response
    {
        $orders = $this->orderModel->getAllWarehousePendingOrders();

        // Render the header
        $this->response->appendBody($this->viewer->render("shared/header.php", ["title" => "Admin Dashboard", "heading" => "Admin Dashboard"]));

        // Render the dashboard console
        $this->response->appendBody($this->viewer->render("Warehouse/WarehouseSupervisors/dashboard.php", ["orders" => $orders]));

        // Render the footer
        $this->response->appendBody($this->viewer->render("shared/footer.php", ["creator" => "Mark Tuggle"]));

        return $this->response;
    }
}