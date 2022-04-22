<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

trait ModelHelperTesting
{

    abstract protected function model(): Model;

    public function test_insert_data()
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->count(5)->create();

        $count = $data->count();

        $this->assertDatabaseCount($table, $count);
    }

    public function test_insert_has()
    {
        $model = $this->model();
        $table = $model->getTable();

        $data = $model::factory()->make()->toArray();

        if ($model instanceof User) {
            $data['password'] = 123456;
        }

        $model::create($data);

        $this->assertDatabaseHas($table, $data);
    }

}