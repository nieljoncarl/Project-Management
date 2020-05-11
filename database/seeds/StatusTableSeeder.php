<?php

use Illuminate\Database\Seeder;

class StatusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::insert('insert into statuses (id, name, created_at, updated_at) values (?, ?, ?, ?)', [1, 'Proposal',\Carbon\Carbon::now(),\Carbon\Carbon::now()]);
        DB::insert('insert into statuses (id, name, created_at, updated_at) values (?, ?, ?, ?)', [2, 'Pending',\Carbon\Carbon::now(),\Carbon\Carbon::now()]);
        DB::insert('insert into statuses (id, name, created_at, updated_at) values (?, ?, ?, ?)', [3, 'Approved',\Carbon\Carbon::now(),\Carbon\Carbon::now()]);
        DB::insert('insert into statuses (id, name, created_at, updated_at) values (?, ?, ?, ?)', [4, 'In Progress',\Carbon\Carbon::now(),\Carbon\Carbon::now()]);
        DB::insert('insert into statuses (id, name, created_at, updated_at) values (?, ?, ?, ?)', [5, 'Completed',\Carbon\Carbon::now(),\Carbon\Carbon::now()]);
    }
}
