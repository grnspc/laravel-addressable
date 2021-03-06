
<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAddressesTable extends Migration
{
    public function up()
    {
        Schema::create(config('grnspc.addresses.tables.addresses'), function (Blueprint $table) {
            // Columns
            $table->id();
            $table->morphs('addressable');
            $table->string('label')->nullable();
            $table->string('given_name')->nullable();
            $table->string('family_name')->nullable();
            $table->string('organization')->nullable();
            $table->string('line_1')->nullable();
            $table->string('line_2')->nullable();
            $table->string('city')->nullable();
            $table->string('province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country_code', 2)->nullable();
            $table->jsonb('extra')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();

            foreach(config('grnspc.addresses.flags', ['primary', 'billing', 'shipping']) as $flag) {
                $table->boolean('is_'. $flag)->default(false)->index();
            }

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down()
    {
        Schema::dropIfExists(config('grnspc.addresses.tables.addresses'));
    }
}
