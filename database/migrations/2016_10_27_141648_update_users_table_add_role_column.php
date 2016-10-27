<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateUsersTableAddRoleColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Adding a role to a user
        Schema::table('users', function ($table) {
            $table->string('role')->default('viewer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Removing a role from a user
        Schema::table('users', function ($table) {
            $table->dropColumn('role');
        });
    }
}
