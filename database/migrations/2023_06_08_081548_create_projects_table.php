<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Category;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('bg');
            $table->string('title');
            $table->text('description');
            $table->string('photo');
            $table->string('video');
            $table->string('name');
            $table->string('nim');
            $table->string('profile');
            $table->string('ig');
            $table->string('wa');
            $table->string('qr');
            $table->boolean('highlight');
            $table->foreignIdFor(Category::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('projects');
    }
};
