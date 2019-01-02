<?php

namespace DoeSangue\GraphQL\Type;

use GraphQL;

use GraphQL\Type\Definition\Type;

use Folklore\GraphQL\Support\Type as GraphQLType;

class CampaignType extends GraphQLType
{
  //
  protected $attributes = [
    'name' => 'Campaign',
    'description' => 'Campaigns'
  ];

  public function fields()
  {
    return [
      'id' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The id of campaign'
      ],
      'title' => [
        'type' => Type::nonNull(Type::string()),
        'description' => 'The title of campaign'
      ],
      'description' => [
        'type' => Type::string(),
        'description' => 'The description of campaign'
      ],
      'image' => [
        'type' => Type::string(),
        'description' => 'Campaign image'
      ],
      'expires' => [
        'type' => Type::string(),
        'description' => 'Campaign expiration date'
      ],
      'location' => [
        'type' => Type::string(),
        'description' => 'Location where donation will happen'
      ],
      'bank' => [
        'type' => GraphQL::type('Bank'),
        'description' => 'Blood Bank details'
      ]
    ];
  }
}
