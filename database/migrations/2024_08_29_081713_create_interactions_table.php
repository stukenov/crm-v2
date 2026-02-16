<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInteractionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('interactions', function (Blueprint $table) {
            $table->id(); // ID взаимодействия (Primary Key)
            $table->foreignId('contact_id')->constrained()->onDelete('cascade'); // Foreign Key на таблицу клиентов
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign Key на таблицу пользователей
            $table->string('interaction_type'); // Тип взаимодействия (звонок, письмо и т.д.)
            $table->dateTime('interaction_datetime'); // Дата и время взаимодействия
            $table->string('interaction_summary'); // Краткое описание взаимодействия
            $table->text('interaction_details')->nullable(); // Полный текст взаимодействия или ссылка на файл
            $table->timestamps(); // Поля created_at и updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('interactions');
    }
}
