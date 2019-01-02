<?php

namespace DoeSangue\GraphQL\Mutation;

use GraphQL;
use App\User;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;

class CreateCampaignMutation extends Mutation
{

  protected $attributes = [
    'name' => 'createCampaign'
  ];
}
