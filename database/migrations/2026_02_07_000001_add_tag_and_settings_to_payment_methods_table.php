<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payment_methods', function (Blueprint $table) {
            // Add tag column if not exists
            if (!Schema::hasColumn('payment_methods', 'tag')) {
                $table->string('tag', 50)->nullable()->after('name')->comment('Gateway identifier: watchpay, hxpayment, qepay, mapay, etc.');
            }
            
            // Add settings column if not exists
            if (!Schema::hasColumn('payment_methods', 'settings')) {
                $table->text('settings')->nullable()->after('status')->comment('JSON configuration for gateway credentials and settings');
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
        Schema::table('payment_methods', function (Blueprint $table) {
            if (Schema::hasColumn('payment_methods', 'tag')) {
                $table->dropColumn('tag');
            }
            if (Schema::hasColumn('payment_methods', 'settings')) {
                $table->dropColumn('settings');
            }
        });
    }
};
