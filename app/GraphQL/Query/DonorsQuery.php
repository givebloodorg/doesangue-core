<?php

namespace DoeSangue\GraphQL\Query;

use GraphQL;
use DoeSangue\Models\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class DonorsQuery extends Query
{

  protected $attributes = [
    'name' => 'donors'
  ];

  public function type()
  {
    return Type::listOf(GraphQL::type('Donor'));
  }

  public function args()
  {
    return [
      'first_name' => ['name' => 'firs_tname', 'type' => Type::string()],
      'last_name' => ['name' => 'last_name', 'type' => Type::string()],
      'email' => ['name' => 'email', 'type' => Type::string()],
      'username' => ['name' => 'username', 'type' => Type::string()],
      'phone' => ['name' => 'phone', 'type' => Type::string()],
      'country_code' => ['name' => 'country_code', 'type' => Type::string()],
      'bio' => ['name' => 'bio', 'type' => Type::string()],
      'birthdate' => ['name' => 'birthdate', 'type' => Type::string()],
      'active' => ['name' => 'active', 'type' => Type::string()],
      'password' => ['name' => 'password', 'type' => Type::string()],
      'blood_type_id' => ['name' => 'blood_type_id', 'type' => Type::string()],
      'first' => ['name' => 'first', 'type' => Type::int()],
    ];
  }

  public function resolve($root,$args)
  {
    $donor = new User;

    // Limit
    if (isset($args['first'])) {
      $donor = $donor->limit($args['first'])->latest('id');
    }

    if (isset($args['id']))
    {
      $donor = $donor->where('id', $args['id']);
    }

    if (isset($args['email']))
    {
      $donor = $donor->where('email', $args['email']);
    }

    return $donor->get();
  }

}
