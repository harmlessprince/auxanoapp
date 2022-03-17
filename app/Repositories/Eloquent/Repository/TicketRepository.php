<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Ticket;

class TicketRepository extends BaseRepository
{
    public function __construct(Ticket $model)
    {
        parent::__construct($model);
    }

    /**
     * @inheritDoc
     */
    public function create(array $payload): Ticket
    {
        $model = $this->model->create([
            'subject' => $payload['ticket_name'],
            'status_id' => $payload['status'],
            'priority_id' => $payload['priority'],
            'category_id' => $payload['category'],
            'customer_id' => $payload['customer'],
            'agent_id' => $payload['assign_to'],
            'fault_reported' => $payload['fault_reported'],
            'fault_observed' => $payload['fault_observed'],
            'due_at' => $payload['due_date'],
            'user_id' => auth()->id()
        ]);
        return $model->fresh();
    }
}
