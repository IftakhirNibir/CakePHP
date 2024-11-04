<?php
declare(strict_types=1);

use Migrations\AbstractSeed;

/**
 * Users seed.
 */
class UsersSeed extends AbstractSeed
{
    /**
     * Run Method.
     *
     * Write your database seeder using this method.
     *
     * More information on writing seeds is available here:
     * https://book.cakephp.org/phinx/0/en/seeding.html
     *
     * @return void
     */
    public function run(): void
    {
        $data = [
            [ 'email' => 'nibir@example.com', 
              'password' => password_hash('nibir123', PASSWORD_DEFAULT), 
              'created' => date('Y-m-d H:i:s'), 
              'modified' => date('Y-m-d H:i:s') 
            ], 
            [ 'email' => 'arif@example.com', 
              'password' => password_hash('arif123', PASSWORD_DEFAULT), 
              'created' => date('Y-m-d H:i:s'), 
              'modified' => date('Y-m-d H:i:s') 
            ],
        ];

        $table = $this->table('users');
        $table->insert($data)->save();
    }
}
