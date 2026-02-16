<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id(); // id INT PRIMARY KEY AUTO_INCREMENT
            $table->string('title'); // title VARCHAR(255)
            $table->text('description')->nullable(); // description TEXT
            $table->decimal('amount', 15, 2); // amount DECIMAL(15,2)
            $table->enum('status', ['lead', 'proposal', 'negotiation', 'closed_won', 'closed_lost']); // status ENUM
            $table->foreignId('contact_id')->constrained('contacts')->onDelete('cascade'); // contact_id INT (Foreign Key)
            $table->foreignId('assigned_to')->constrained('users')->onDelete('cascade'); // assigned_to INT (Foreign Key)
            $table->timestamp('closed_at')->nullable(); // closed_at TIMESTAMP
            $table->timestamps(); // created_at and updated_at TIMESTAMPS
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
