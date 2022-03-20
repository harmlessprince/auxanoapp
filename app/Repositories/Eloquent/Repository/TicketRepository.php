<?php

namespace App\Repositories\Eloquent\Repository;

use App\Models\Ticket;
use App\Services\AuditService;

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

    /**
     * @inheritDoc
     */
    public function updateTicket(int $modelId, array $payload): Ticket
    {
        $model = $this->findById($modelId);
        $old = collect($model->getOriginal());
        $model->update([
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
        $new = collect($model->getChanges());
        if ($new->count() > 0) {
            $old = $old->intersectByKeys($new);
            $model->audits()->create([
                'operation' => 'update',
                'action' => 'Updated by' . auth()->user()->full_name,
                'old' => $old,
                'new' => $new,
                'user_id' => auth()->id()
            ]);
        }
        return $model->fresh();
    }

    public function formatOldUpdatedDate($old)
    {
        return $old->toArray()['updated_at']->toDateTimeString();
    }
}
