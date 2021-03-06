<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCompanyIdToUsersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            if (Schema::hasTable('companies')) {
                //
                $table->integer('company_id')->unsigned()->nullable();
                $table->foreign('company_id')->references('id')->on('companies')
                        ->index('users_company_id_company_id')
                        ->onDelete('set null')
                        ->onUpdate('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropForeign('users_company_id_company_id');
            $table->dropColumn('company_id');
        });
    }

}
