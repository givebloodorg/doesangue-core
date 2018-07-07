<?php

namespace DoeSangue\GraphQL\Type;

use GraphQL;

use GraphQL\Type\Definition\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

class DonorType extends GraphQLType
{
  protected $attributes = [
    'name' => 'Donor',
    'description' => 'Blood Donors'
  ];

  // protected $inputObject = true;

  public function fields()
  {
    return [

      'id' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The id of the donor'
    ],
    'first_name' => [
      'type' => Type::string(),
      'description' => 'The first name of donor'
    ],
    'last_name' => [
      'type' => Type::string(),
      'description' => 'The last name of donor'
    ],
    'email' => [
        'type' => Type::string(),
        'description' => 'The email of donor'
    ],
      'profile' => [
        'type' => GraphQL::type('Profile'),
        'description' => 'Donor profile',
      ]
    ];
  }
}
