<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->longText('fault_reported');
            $table->longText('fault_observed');
            $table->unsignedBigInteger('status_id');
            $table->foreignId('priority_id');
            $table->foreignId('user_id');
            $table->unsignedInteger('updated_by')->nullable();
            $table->unsignedInteger('created_by')->nullable();
            $table->foreignId('agent_id')->constrained('users', 'id');
            $table->foreignId('customer_id');
            $table->foreignId('category_id');
            $table->date('completed_at')->nullable();
            $table->date('due_at')->nullable();
            $table->foreign('status_id')->references('id')->on('ticket_statuses');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tickets');
    }
}
