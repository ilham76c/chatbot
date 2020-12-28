<?php

namespace App\Gateway;

use Illuminate\Database\ConnectionInterface;

class UserGateway
{
    /**
     * @var ConnectionInterface
     */
    private $db;

    public function __construct()
    {
        $this->db = app('db');
    }

    // users 
    public function getUser(string $userId)
    {
        $user = $this->db->table('users')->where('user_id', $userId)->first();

        if ($user) 
        {
            return (array) $user;
        }

        return null;
    }

    public function saveUser(string $userId, string $displayName)
    {
        $thin->db->table('user')->insert([
            'user_id' => $userId,
            'display_name' => $displayName
        ]);
    }

    function setUserProgress(string $userId, int $questionNumer)
    {
        $this->db->table('users')->update([
            'number' => $questionNumer,
            'user_id' => $userId
        ]);
    }

    function setScore(string $userId, int $score)
    {
        $this->db->table('users')->update([
            'score' => $score,
            'user_id' => $userId
        ]);
    }
}