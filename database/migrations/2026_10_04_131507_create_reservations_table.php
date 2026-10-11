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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            
            // for applicant info
            $table->string('name');
            $table->string('department');
            $table->date('date_applied');
            $table->string('mobile_number');
            $table->text('purpose');

            //for venue
            $table->string('venue');
            $table->string('other_venue')->nullable();

            //for schedule
            $table->date('reserved_date');
            $table->time('time');
            
            //for Requirements
            $table->string('sound_system')->nullable();
            $table->string('microphone')->nullable();
            $table->string('video_wall')->nullable();

            $table->string('flags')->nullable();
            $table->string('podium')->nullable();
            $table->string('platform')->nullable();
            $table->string('tables')->nullable();
            $table->string('chairs')->nullable();
            $table->string('removal_of_rings')->nullable();

            $table->string('other_requirements_1')->nullable();
            $table->string('other_requirements_2')->nullable();


            //for terms and conditions
            $table->boolean('agreed')->default(false);

            //for aproval
            $table->string('applicant_signature')->nullable();
            $table->string('security_signature')->nullable();

            //status
            $table->string('status')->default('pending');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
