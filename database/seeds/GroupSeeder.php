<?php

use App\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'user_id' => '13',
                'field' => '1',
                'group' => 'A',
                'group_position' => '1',
            ],
            [
                'user_id' => '15',
                'field' => '1',
                'group' => 'A',
                'group_position' => '2',
            ],
            [
                'user_id' => '24',
                'field' => '1',
                'group' => 'A',
                'group_position' => '3',
            ],
            [
                'user_id' => '10',
                'field' => '1',
                'group' => 'A',
                'group_position' => '4',
            ],
            [
                'user_id' => '25',
                'field' => '1',
                'group' => 'A',
                'group_position' => '5',
            ],
            [
                'user_id' => '4',
                'field' => '1',
                'group' => 'A',
                'group_position' => '6',
            ],
            [
                'user_id' => '17',
                'field' => '1',
                'group' => 'B',
                'group_position' => '1',
            ],
            [
                'user_id' => '12',
                'field' => '1',
                'group' => 'B',
                'group_position' => '2',
            ],
            [
                'user_id' => '19',
                'field' => '1',
                'group' => 'B',
                'group_position' => '3',
            ],
            [
                'user_id' => '23',
                'field' => '1',
                'group' => 'B',
                'group_position' => '4',
            ],
            [
                'user_id' => '5',
                'field' => '1',
                'group' => 'B',
                'group_position' => '5',
            ],
            [
                'user_id' => '2',
                'field' => '1',
                'group' => 'B',
                'group_position' => '6',
            ],
            [
                'user_id' => '14',
                'field' => '2',
                'group' => 'C',
                'group_position' => '1',
            ],
            [
                'user_id' => '8',
                'field' => '2',
                'group' => 'C',
                'group_position' => '2',
            ],
            [
                'user_id' => '18',
                'field' => '2',
                'group' => 'C',
                'group_position' => '3',
            ],
            [
                'user_id' => '16',
                'field' => '2',
                'group' => 'C',
                'group_position' => '4',
            ],
            [
                'user_id' => '21',
                'field' => '2',
                'group' => 'C',
                'group_position' => '5',
            ],
            [
                'user_id' => '9',
                'field' => '2',
                'group' => 'C',
                'group_position' => '6',
            ],
            [
                'user_id' => '3',
                'group' => 'D',
                'field' => '2',
                'group_position' => '1',
            ],
            [
                'user_id' => '22',
                'group' => 'D',
                'field' => '2',
                'group_position' => '2',
            ],
            [
                'user_id' => '20',
                'group' => 'D',
                'field' => '2',
                'group_position' => '3',
            ],
            [
                'user_id' => '7',
                'group' => 'D',
                'field' => '2',
                'group_position' => '4',
            ],
            [
                'user_id' => '6',
                'group' => 'D',
                'field' => '2',
                'group_position' => '5',
            ],
            [
                'user_id' => '11',
                'group' => 'D',
                'field' => '2',
                'group_position' => '6',
            ],
        ];

        foreach($groups as $group) {
            Group::create([
                'group' => $group['group'],
                'user_id' => $group['user_id'],
                'field' => $group['field'],
                'group_position' => $group['group_position']
            ]);
        }
    }
}
