<?php

declare(strict_types=1);

namespace App\Middleware;

use Framework\Request;
use Framework\Response;
use Framework\RequestHandlerInterface;
use Framework\MiddlewareInterface;
use App\Models\Warehouse\User;
use App\Models\Warehouse\Item;
use App\Database;

class StoreWSRInfo implements MiddlewareInterface
{
    public function __construct(private Response $response, private Database $db) {}

    public function process(Request $request, RequestHandlerInterface $next): Response
    {
        if ($request->method === 'POST') {
            $post = $request->post;

            if (isset($post['supervisor'])) {
                $selectedSupervisorId = $post['supervisor'];
                $userModel = new User($this->db);
                $supervisor = $userModel->getSupervisorById($selectedSupervisorId);

                $_SESSION['selected_supervisor'] = $supervisor;
            }

            if (isset($post['section'])) {
                $selectedSectionId = $post['section'];
                $sectionModel = new User($this->db);
                $section = $sectionModel->getSectionById($selectedSectionId);

                $_SESSION['selected_section'] = $section;
            }

            if (isset($post['items']) && isset($post['quantity'])) {
                $selectedItems = $post['items'];
                $quantities = $post['quantity'];
                $itemModel = new Item($this->db);
                $items = [];
                foreach ($selectedItems as $itemId) {
                    $item = $itemModel->getItemById((int)$itemId);
                    $item['quantity'] = $quantities[$itemId];
                    $items[] = $item;
                }

                $_SESSION['selected_items'] = $items;
            }
        }

        return $next->handle($request);
    }
}
