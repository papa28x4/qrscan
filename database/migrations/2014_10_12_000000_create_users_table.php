<?php
// $table->enum('status', ['pending','processing','completed','decline'])->default('pending');
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('last_name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('company')->nullable();
            $table->string('avatar')->nullable();
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->string('job_title')->nullable();
            $table->date('hire_date')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('employee_status', User::$EMPLOYEESTATUS)->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->string('country')->nullable();
            $table->boolean('terms')->default(false);
            $table->boolean('active')->default(1);
            $table->string('type')->nullable();
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
