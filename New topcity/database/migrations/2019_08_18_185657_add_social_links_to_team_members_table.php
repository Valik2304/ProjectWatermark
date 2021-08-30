<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSocialLinksToTeamMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->string('fb_link')->nullable();
            $table->string('instagram_link')->nullable();
            $table->string('linkedIn_link')->nullable();
            $table->string('position');
        });

        Schema::table('vacancies', function (Blueprint $table) {
            $table->string('price');
            $table->string('image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('team_members', function (Blueprint $table) {
            $table->dropColumn(['fb_link','instagram_link','linkedIn_link','position']);
        });

        Schema::table('vacancies', function (Blueprint $table) {
            $table->dropColumn(['price','image']);
        });
    }
}
