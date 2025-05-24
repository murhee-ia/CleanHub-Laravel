<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cleaning_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('title', 225);
            $table->foreignId('job_category_id')
                ->constrained('job_categories')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('recruiter_id')
                ->constrained('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->text('description');
            $table->text('qualifications');
            $table->string('city');
            $table->string('full_address');
            $table->string('schedule');
            $table->string('payment');
            $table->json('media_paths');
            $table->boolean('approved_status')->default(false);
            $table->boolean('application_status')->default(true);
            $table->boolean('rate_status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
