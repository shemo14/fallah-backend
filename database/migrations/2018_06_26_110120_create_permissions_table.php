<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permissions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('permissions');
            $table->integer('role_id')->unsigned();
            $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });

        $permissions =
            [
                'dashboard',
                'permissionslist',
                'addpermissionspage',
                'addpermission',
                'editpermissionpage',
                'updatepermission',
                'deletepermission'
            ];

        foreach($permissions as $permission)
        {
            $Permission = new \App\Models\Permission();
            $Permission->permissions = $permission;
            $Permission->role_id = 1;
            $Permission->save();
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
}
