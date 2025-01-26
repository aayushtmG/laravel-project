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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->text('logo')->nullabe();
            $table->text('banner_image')->nullabe();
            $table->text('toll_free_number');
            $table->string('company_email');
            $table->string('company_name');
            $table->string('address');
            $table->json('home_slider_images')->nullable();
            $table->string('organization_members');
            $table->string('organization_staffs');
            $table->string('organization_branches');
            $table->string('organization_savings');
            $table->string('organization_loans');
            $table->string('organization_shares');
            $table->timestamp('created_at')->useCurrent();
            $table->timeStamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
